<?php

namespace App\Http\Livewire\Customer\Appointment;

use Livewire\Component;
use App\Models\Order;
use DateTime;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use League\CommonMark\Extension\CommonMark\Node\Inline\Link as InlineLink;
use Spatie\CalendarLinks\Link;

class Thanks extends Component
{

    use LivewireAlert;

    public $notes, $order, $orde_id;
    protected $listeners = ['cancelOrder'];


    public function mount($order_id)
    {
        $this->order = Order::with(['cleaner', 'items.service_item.service'])->find($order_id);
    }

    public function generateCalendarLinks()
    {

        $from = DateTime::createFromFormat('Y-m-d H:i', '2018-02-01 09:00');
        $to = DateTime::createFromFormat('Y-m-d H:i', '2018-02-01 18:00');

        $link = Link::create('Sebastian’s birthday', $from, $to)
            ->description('Cookies & cocktails!')
            ->address('Kruikstraat 22, 2018 Antwerpen');

            $googleCalendarLink =  $link->google();
            // dd($googleCalendarLink );
            // $iCal = $link->ics();    //Generate a data uri for an ics file (for iCal & Outlook)
            // Generate a link to create an event on outlook.live.com calendar
            // $microsoftCal = $link->webOutlook();

            return redirect($googleCalendarLink);

    }

    public function saveOrderNotes()
    {
        $this->order->notes = $this->notes;
        $this->order->save();
        $this->alert('success', 'Notes Sent!');
    }

    public function alertConfirm($iid)
    {
        $this->order_id = $iid;

        $this->alert('warning', 'Are you sure do want to delete?', [
            'toast' => false,
            'position' => 'center',
            'showCancelButton' => true,
            'cancelButtonText' => 'Cancel',
            'showConfirmButton' => true,
            'confirmButtonText' => 'Delete it',
            'onConfirmed' => 'cancelOrder',
            'timer' => null
        ]);
    }

    public function cancelOrder()
    {

        $status = Order::where('id', $this->order_id)->update([
            'status' => 'cancelled_by_customer',
        ]);


        return redirect()->route('profile', $this->order->cleaner_id);
    }

    public function render()
    {
        return view('livewire.customer.appointment.thanks')->extends('layouts.app')->section('content');
    }
}

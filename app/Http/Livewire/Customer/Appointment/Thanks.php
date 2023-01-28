<?php

namespace App\Http\Livewire\Customer\Appointment;

use Livewire\Component;
use App\Models\Order;
use DateTime;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use League\CommonMark\Extension\CommonMark\Node\Inline\Link as InlineLink;
use Spatie\CalendarLinks\Link;
use Illuminate\Support\Carbon;
use App\Notifications\Cleaner\OrderCancelled as OrderCancelledNotificationForCleaner;
use App\Notifications\Customer\OrderCancelled as OrderCancelledNotificationForCustomer;

class Thanks extends Component
{

    use LivewireAlert;

    public $notes, $order, $orde_id;
    protected $listeners = ['cancelOrder'];



    public function mount($order_id)
    {
        $this->order = Order::with(['cleaner', 'items.service_item.service'])->find($order_id);

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

        $this->alert('warning', 'Are you surely want to cancel?', [
            'toast' => false,
            'position' => 'center',
            'showCancelButton' => true,
            'cancelButtonText' => 'No',
            'showConfirmButton' => true,
            'confirmButtonText' => 'Yes',
            'onConfirmed' => 'cancelOrder',
            'timer' => null
        ]);
    }

    public function cancelOrder()
    {

        $status = Order::where('id', $this->order_id)->update([
            'status' => 'cancelled_by_customer',
        ]);

        $order = Order::find( $this->order_id );
        $order->cleaner->notify(new OrderCancelledNotificationForCleaner($order));
        $order->user->notify( new CancelledOrderNotificationForCustomer($order) );


        return redirect()->route('profile', $this->order->cleaner_id);
    }

    public function generateCalendarLinks()
    {
        $from = DateTime::createFromFormat('Y-m-d H:i:s', $this->order->cleaning_datetime);

        $to = DateTime::createFromFormat('Y-m-d H:i:s', $this->order->cleaning_datetime);

        $link = Link::create('Canary Cleaner Appointments', $from, $to);
        return $link;
    }

    public function render()
    {
        $link = $this->generateCalendarLinks();
        return view('livewire.customer.appointment.thanks', [
            'link' => $link
        ])->extends('layouts.app')->section('content');
    }
}

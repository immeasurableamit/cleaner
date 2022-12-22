<?php

namespace App\Http\Livewire\Customer\Appointment;

use Livewire\Component;
use App\Models\Order;
use App\Models\OrderItem;

class Appointment extends Component
{
    public $selectedDate, $events;
    public $orders;

    public function mount()
    {
        $this->orders = Order::where('user_id', auth()->user()->id)->first();
        dd($this->orders);

        $this->prepareOrdersPro();
        $this->prepare();
    }

    public function prepareOrdersPro()
    {
        // $events= array();
        $orders = Order::where('user_id',auth()->user()->id)->first();

        // foreach($orders as $order)
        // {
        //     $events[] = [
        //      'first_name' => $order->first_name,
        //         'cleaning_datetime' => $order->cleaning_datetime,
        //     ];
        // }
        // dd($this->orders->status);
       $this->dispatchBrowserEvent('prepareOrdersPro', ['orders' => $orders]);
        return true;
  
    }


    public function prepare()
    {
        $this->selectedDate = $this->selectedDate ?? today()->toDateString();

        // dd($this->selectedDate);

        $this->refreshSelectedTab();
    }



    public function renderCalendar()
    {
        
        $events =  $event = [
            'id' => 'a',
            'title' => 'my events',
            'start' => '2018-09-01',

        ];
        $this->dispatchBrowserEvent('renderCalendar', ['events' => $events]);
        return true;
    }

    protected function refreshSelectedTab()
    {
        $this->renderCalendar();
    }


    public function render()
    {
        return view('livewire.customer.appointment.appointment');
    }
}

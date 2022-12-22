<?php

namespace App\Http\Livewire\Customer\Appointment;

use Livewire\Component;
use App\Models\Order;
use App\Models\OrderItem;
use \Carbon\Carbon;

class Appointment extends Component
{
    public $selectedDate, $events, $selectedDateOrders;
    public $orders;


    public function mount()
    {
        $this->prepare();
    }


    public function prepareOrdersPro()
    {
        $orders = Order::where('user_id', auth()->user()->id)->get();
        // dd( $orders);
        $this->orders = $orders;

      
        $this->dispatchBrowserEvent('prepareOrdersPro', ['orders' => $orders]);

        return  true;
    }


    protected function parseOrdersForCalendarEvents($orders)
    {

        $events = $orders->map(function ($order) {
            $cleaningDateTime = Carbon::parse($order->cleaning_datetime);
          
            $event = [
                'id'    => $order->id,
                'title' => $cleaningDateTime->format("h:i A"),
                'start' => $cleaningDateTime->toDateString(),
            ];
            return $event;
        })->values();
// dd($events);
        return $events;
    }



    public function prepare()
    {
        $this->selectedDate = $this->selectedDate ?? today()->toDateString();

        $this->refreshSelectedTab();
    }



    public function renderCalendar()
    {

        $events = $this->parseOrdersForCalendarEvents($this->orders);
        $this->events = $events;


        $this->dispatchBrowserEvent('renderCalendar', ['events' => $events]);
        return true;
    }

    protected function refreshSelectedTab()
    {
        $this->prepareOrdersPro();
        $this->renderCalendar();
    }



    public function render()
    {
        return view('livewire.customer.appointment.appointment');
    }
}

<?php

namespace App\Http\Livewire\Customer;

use App\Models\Order;
use Livewire\Component;
use \Carbon\Carbon;

class Jobs extends Component
{

    /*
     * @var: selectedTab
     * 1 means MyJobs tab
     * 2 means NewRequests tab
     */
    public $selectedTab  = 1;

    public $selectedDate, $orders, $selectedDateOrders, $events;
    
    public function changeToMyJobsTab()
    {
        $this->selectedTab = 1;
    }

    public function changeToNewRequestsTab()
    {
        $this->selectedTab = 2;
    }

    public function getPendingOrders()
    {
        return $this->orders->where('status', 'pending');
    }

    public function getAcceptedOrders()
    {        
        return $this->orders->where('status','!=', 'pending');
    }

    public function parseOrdersForCalendarEvents($orders)
    {
        $events = $orders->map( function($order) {
            $cleaningDateTime = Carbon::parse( $order->cleaning_datetime );
            $event = [
                'id'    => $order->id,
                'title' => $cleaningDateTime->format("h:m A"),
                'start' => $cleaningDateTime->toDateString(),
            ];
            return $event;  
        });

        return $events;
    }

    public function getOrdersForSelectedTab()
    {
        if ( $this->selectedTab == 1 ) {
            $orders = $this->getAcceptedOrders();                        
        } else {
            $orders = $this->getPendingOrders();
        }

        return $orders;
    }

    public function renderOrders()
    {
        $orders                   = $this->getOrdersForSelectedTab();
        $this->selectedDateOrders = $orders->filter(function($order) {
            return $order->cleaning_datetime->startOfDay()->equalTo( $this->selectedDate );
        });

        $this->dispatchBrowserEvent('renderOrders');
        return true;

    }

    public function renderCalendar()
    {
        $orders = $this->getOrdersForSelectedTab();
        $events = $this->parseOrdersForCalendarEvents($orders);

        $this->events = $events;
        $this->dispatchBrowserEvent('renderCalendar', ['events' => $events]);
        return true;
    }

    public function mount()
    {
        $this->selectedDate = today()->toDateString();
        $this->orders = Order::where('cleaner_id', auth()->user()->id )->get();
        $this->renderCalendar();
        $this->renderOrders();
    }

    public function updated($name)
    {
        if ( $name == "selectedTab" ) {
            $this->renderCalendar();
        }

        if ( $name == "selectedDate") {
            $this->renderOrders();
        }
        
    }

    public function render()
    {
        return view('livewire.customer.jobs');
    }
}

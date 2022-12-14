<?php

namespace App\Http\Livewire\Customer;

use App\Models\Order;
use Livewire\Component;

class Jobs extends Component
{

    /*
     * @var: selectedTab
     * 1 means MyJobs tab
     * 2 means NewRequests tab
     */
    public $selectedTab  = 1;

    public $selectedDate;
    public $orders;

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
    }

    public function getAcceptedOrders()
    {        
    }

    public function parseOrdersForCalendarEvents($orders)
    {
        
    }

    public function renderCalendar()
    {
        if ( $this->selectedTab == 1 ) {
            $orders = $this->getAcceptedOrders();                        
        } else {
            $orders = $this->getPendingOrders();
        }

        $events = $this->parseOrdersForCalendarEvents($orders);
        $this->emit('renderCalendar', $events );
    }

    public function updatedSelectedTab( $value ) 
    {
        $this->renderCalendar();
    }


    public function mount()
    {
        $this->selectedDate = today()->toDateString();
        $this->orders = Order::where('cleaner_id', auth()->user()->id )->get();
    }

    public function render()
    {
        return view('livewire.customer.jobs');
    }
}

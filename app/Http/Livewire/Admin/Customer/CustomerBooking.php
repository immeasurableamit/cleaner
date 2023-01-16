<?php

namespace App\Http\Livewire\Admin\Customer;

use Livewire\Component;
use App\Models\Order;

class CustomerBooking extends Component
{
    public $userId;
    public $allData;
    public $allCount, $scheduledCount, $completedCount, $cancelledCount;
    public $tab = 'all';

    public function mount()
    {
        $this->allData = Order::with('cleaner')->where('user_id', $this->userId)->get();

        $this->countBookings();
    }

    public function countBookings()
    {
        $this->allCount = $this->allData->count();

        $this->scheduledCount = $this->allData->whereIn('status', ['pending', 'accepted', 'payment_collected'])->count();

        $this->completedCount = $this->allData->whereIn('status', ['completed', 'reviewed'])->count();

        $this->cancelledCount = $this->allData->whereIn('status', ['rejected', 'cancelled', 'cancelled_by_customer'])->count();
    }


    public function setTab($tab)
    {
        $this->tab = $tab;
    }

    public function render()
    {
        if($this->tab=='all'){
            $orders = $this->allData;
        }
        else {
            $statusArray = [];
            if($this->tab=='scheduled'){
                $statusArray[] = 'pending';
                $statusArray[] = 'accepted';
                $statusArray[] = 'payment_collected';
            }
            if($this->tab=='completed'){
                $statusArray[] = 'completed';
                $statusArray[] = 'reviewed';
            }
            if($this->tab=='cancelled'){
                $statusArray[] = 'rejected';
                $statusArray[] = 'cancelled';
                $statusArray[] = 'cancelled_by_customer';
            }

            $orders = $this->allData->whereIn('status', $statusArray);
        }
        

        return view('livewire.admin.customer.customer-booking', compact('orders'));
    }
}

<?php

namespace App\Http\Livewire\Admin\Cleaner;

use Livewire\Component;
use App\Models\Order;

class CleanerBooking extends Component
{
    public $userId;
    // public $allData;
    public $dateStart, $dateEnd, $searchResult;
    public $allCount, $scheduledCount, $completedCount, $cancelledCount;
    public $tab = 'all';

    public function mount()
    {

        // $this->allData = Order::with(['user','items.service_item.service'])->where('cleaner_id', $this->userId)->get();
        $this->countBookings();
    }

    public function countBookings()
    {


        $this->allCount = Order::where('cleaner_id', $this->userId)->count();

        $this->scheduledCount = Order::where('cleaner_id', $this->userId)->whereIn('status', ['pending', 'accepted', 'payment_collected'])->count();

        $this->completedCount = Order::where('cleaner_id', $this->userId)->whereIn('status', ['completed', 'reviewed'])->count();

        $this->cancelledCount = Order::where('cleaner_id', $this->userId)->whereIn('status', ['rejected', 'cancelled', 'cancelled_by_customer'])->count();

        // $this->allCount = $this->allData->count();

    }


    public function setTab($tab)
    {
        $this->tab = $tab;
    }

    public function render()
    {
        $orders = Order::with(['user','items.service_item.service'])->where('cleaner_id', $this->userId);

        if($this->tab=='all'){
            $orders = $orders;
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

            $orders = Order::whereIn('status', $statusArray)->where('cleaner_id', $this->userId);
        }

         if(!empty($this->dateStart) && !empty($this->dateEnd)) {
            $orders->whereBetween('cleaning_datetime', [$this->dateStart, $this->dateEnd])
            ->where(function($query) {
                $query->where('cleaner_id', $this->userId);
            });
        }

       
         if(!empty($this->searchResult)){
            $value = $this->searchResult;
            $orders->where('cleaner_id', $this->userId)
                ->where(function($query) use ($value) {
                    $query->where('status', 'like', '%'.$value.'%');
                    $query->orWhereHas('user', function($q) use($value) {
                        $q->where('first_name', 'like', $value.'%');
                    });
                });
        }
 
        $orders = $orders->orderBy('id', 'DESC')->get();

          foreach ($orders as $key => $value) {

            $title = '';
            $title2 = '';
          
            if($value->items){
                foreach ($value->items as $oky => $ord) {
                   if($ord->service_item){
                         $title = $ord->service_item->title;
                         $title2 = $ord->service_item->service->title;
                   }
                        $orders[$key]['title'] = $title;
                        $orders[$key]['title2'] = $title2;
                }
            }
        }

        return view('livewire.admin.cleaner.cleaner-booking', compact('orders'));
    }
}

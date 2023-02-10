<?php

namespace App\Http\Livewire\Admin\Jobs;

use Livewire\Component;
use App\Models\Order;
use App\Models\User;

class Jobs extends Component
{   
 
    public $dateStart, $dateEnd;
    public $searchResult;
    public $allData;
    public $allCount, $scheduledCount, $completedCount, $cancelledCount;
    public $tab = 'all';

    public function mount()
    {   
        // $this->allData = Order::with(['user','cleaner'])->get();
        $this->allData = Order::with(['user','cleaner','items.service_item.service'])->get();
        $this->countUsers();
    }

    public function countUsers()
    {
        $this->allCount = $this->allData->count();

        $this->scheduledCount = $this->allData->whereIn('status', ['accepted', 'payment_collected'])->count();

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
        } else {
            $statusArray = [];
            if($this->tab=='scheduled'){
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
        // $this->orders = Order::with(['user','cleaner'])->get();
 
        if(!empty($this->dateStart) && !empty($this->dateEnd)){

        $orders = $this->allData = Order::with(['user','cleaner'])
        ->whereBetween('cleaning_datetime', [$this->dateStart, $this->dateEnd])
        ->get();
        }

        if(!empty($this->searchResult)){
    
          $orders = $this->allData = Order::with(['user','cleaner'])
            ->where('status', 'like', '%'.$this->searchResult.'%')
            ->get();
       
          }

        return view('livewire.admin.jobs.jobs', compact('orders'));
    }
}

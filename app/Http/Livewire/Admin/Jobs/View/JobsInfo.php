<?php

namespace App\Http\Livewire\Admin\Jobs\View;

use Livewire\Component;
use App\Models\Order;
use App\Models\User;
use App\Models\Transaction;

class JobsInfo extends Component
{   
    public $allData;
    public $order_id;
    public $cleanerPayoutTransaction;

    public function mount(){
        
        $this->allData = Order::with(['user','cleaner','state','transactions','items.service_item'])->where('id', '=', $this->order_id)->get();
        $this->cleanerPayoutTransaction = $this->allData->first()->cleanerTransaction;
    }

    public function render()
    {   
        $value = 'success';

        $orders = $this->allData= Order::with(['transactions' => function ($query) use($value) {
                    $query->where('status','=', $value);

                }])
                ->where('id', '=', $this->order_id)
                ->with(['user','cleaner','state','items.service_item'])
                ->get();

        // $orders = $this->allData = Order::with(['user','cleaner','state','transactions','items.service_item'])->where('id', '=', $this->order_id)
        //     ->whereHas('transactions', function (Builder $query) {
        //          $query->where('status', '=', 'success');
        //          })
        // ->get();
  
        foreach ($orders as $key => $value) {
            if($value->items){
                $title = '';
                foreach ($value->items as $oky => $ord) {
                    if($ord->service_item){
                        $title = $ord->service_item->title;
                        $orders[$key]['items'][$oky]['stitle'] = $title;
                    }
                }
            }
        }

       
       
        return view('livewire.admin.jobs.view.jobs-info', compact('orders'));
    }
}
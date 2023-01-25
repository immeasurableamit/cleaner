<?php

namespace App\Http\Livewire\Admin\Jobs\View;

use Livewire\Component;
use App\Models\Order;
use App\Models\User;
use App\Models\Transaction;

class JobsInfo extends Component
{   
    public $orders;
    public $order_id;

    public function mount(){
        
        $this->orders = Order::with(['user','cleaner','state','transactions'])->where('id', '=', $this->order_id)->first();
    }

    public function render()
    {   

        return view('livewire.admin.jobs.view.jobs-info');
    }
}

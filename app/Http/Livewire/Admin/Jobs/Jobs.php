<?php

namespace App\Http\Livewire\Admin\Jobs;

use Livewire\Component;
use App\Models\Order;
use App\Models\User;

class Jobs extends Component
{   
 
    public $dateStart, $dateEnd, $orders;


    public function render()
    {   
        $this->orders = Order::with(['user','cleaner'])->get();
 
        if(!empty($this->dateStart) && !empty($this->dateEnd)){

        $this->orders = Order::with(['user','cleaner'])
        ->whereBetween('cleaning_datetime', [$this->dateStart, $this->dateEnd])
        ->get();
        }
        return view('livewire.admin.jobs.jobs');
    }
}

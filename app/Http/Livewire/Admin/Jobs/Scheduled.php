<?php

namespace App\Http\Livewire\Admin\Jobs;

use Livewire\Component;
use App\Models\Order;
use App\Models\User;

class Scheduled extends Component
{   
     public $dateStart, $dateEnd, $orders;


    public function render()
    {   
        $this->orders = Order::with(['user','cleaner'])
        ->where(function($query) {
                $query->where('status', '=', 'accepted')
                    ->orWhere('status', '=', 'payment_collected');
            })->get();

        if(!empty($this->dateStart) && !empty($this->dateEnd)){

          $this->orders = Order::with(['user','cleaner'])
            ->whereBetween('cleaning_datetime', [$this->dateStart, $this->dateEnd])
            ->where(function($query) {
                $query->where('status', '=', 'accepted')
                    ->orWhere('status', '=', 'payment_collected');
            })->get();
       
       }
      
        return view('livewire.admin.jobs.scheduled');
    }
}

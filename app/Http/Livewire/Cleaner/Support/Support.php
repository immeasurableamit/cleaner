<?php

namespace App\Http\Livewire\Cleaner\Support;

use Livewire\Component;
use App\Models\Order;

class Support extends Component
{
    public $completedOrders, $cleaner;
    public $jobs;

    public function mount()
    {
        $this->cleaner = auth()->user();
        $this->completedOrders = Order::with([ 'cleaner', 'items.service_item.service'])->where('cleaner_id', $this->cleaner->id )->get(); //whereIn('status', ['payment_collected', 'reviewed'])->get();

        $this->jobs = $this->completedOrders->map(function($order) {

            return [
                'date'    => $order->cleaning_datetime->format('m/d/Y'),
                'service' => $order->service()->title,
                'cleaner' => $order->cleaner->name,
            ];
        });

    }

    public function render()
    {
        return view('livewire.cleaner.support.support');
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use App\Notifications\Customer\OrderCompleted as OrderCompletedNotificationForCustomer;
use App\Notifications\Cleaner\OrderCompleted as OrderCompletedNotificationForCleaner;

class MarkOrdersCompleted extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'markOrdersCompleted';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change status of orders, that have payment_collected status and job time passed, to completed';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $orders        = Order::where('status', 'payment_collected')->where('cleaning_datetime', '<=', now() )->get();
        $updatedOrders = Order::whereIn('id', $orders->pluck('id'))->update(['status' => 'completed']);

        $orders->load('cleaner', 'user');

        foreach ( $orders  as $order ){

            $order->user->notify( new OrderCompletedNotificationForCustomer($order) );
            $order->cleaner->notify( new OrderCompletedNotificationForCleaner($order) );
        }

        return Command::SUCCESS;
    }
}

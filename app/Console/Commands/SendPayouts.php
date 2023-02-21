<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use App\Models\Payout;

class SendPayouts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:payouts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send payouts of the completed orders to cleaners';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $currentDateTime = now()->toDateTimeString();
        $ordersToPayout  = Order::with('cleaner')->where('status', 'completed')
                            ->where('cleaning_datetime', '<=', $currentDateTime )
                            ->where('is_paid_out_to_cleaner', 0 )->get();

        $failedPayoutsOfOrders = Payout::whereIn('order_id', $ordersToPayout->pluck('id') )->get();

        info("[SEND PAYOUTS] searched datetime: $currentDateTime, total orders to payout: ".$ordersToPayout->count() );

        foreach ( $ordersToPayout as $order ) {

            $failedPayoutsOfOrder = $failedPayoutsOfOrders->where('order_id', $order->id );
            
            if ( $failedPayoutsOfOrder->count() == 3 ) {
                info("[SEND PAYOUTS][ORDER ID $order->id] skipping because it already has 3 payouts");
                continue;
            }


            /* send payout */
            $resp = sendPayoutOfOrder( $order );
            
            /* store transaction */
            //$payoutAmount = convertCentsIntoDollars( $resp['response']->amount );

            $transaction = storePayoutTransaction( $order, $resp );

            $payout = Payout::create([
                'cleaner_id'     => $transaction->user_id,
                'transaction_id' => $transaction->id,
                'order_id'       => $order->id,
            ]);

            if ( $resp['status'] == true ) {
                /* update order */
                $order->is_paid_out_to_cleaner = $transaction->status == 'success' ? 1 : 0;
                $order->cleaner_transaction_id = $transaction->id;
                $order->save();
            }

            if ( $resp['status']  == false ) {
                info("[SEND PAYOUTS][ORDER ID $order->id][FAILED] response: ". $resp['exception']->getMessage() );
            }
            
        }

        return Command::SUCCESS;
    }
}

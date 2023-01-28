<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;

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
        $ordersToPayout  = Order::where('status', 'completed')
                            ->where('cleaning_datetime', '<=', $currentDateTime )
                            ->where('is_paid_out_to_cleaner', 0 )->get();

        info("[SEND PAYOUTS] searched datetime: $currentDateTime, total orders to payout: ".$ordersToPayout->count() );

        foreach ( $ordersToPayout as $order ) {

            /* send payout */
            $resp = sendPayoutOfOrder( $order );
            if ( $resp['status'] == false ) {
                info("[SEND PAYOUT][FAILED][ORDER-ID $order->id] response: ".json_encode( $resp['response'] )); // log the error
                continue;
            }

            /* store transaction */
            $payoutAmount = convertCentsIntoDollars( $resp['response']->amount );
            $transaction = storePayoutTransaction(
                $order->user_id,
                $order->id,
                $payoutAmount,
                $resp['response']->id
            );

            /* update order */
            $order->is_paid_out_to_cleaner = 1;
            $order->cleaner_transaction_id = $transaction->id;
            $order->save();
        }

        return Command::SUCCESS;
    }
}

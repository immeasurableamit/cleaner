<?php
use App\Models\Transaction;

function storeRefundOrderTransaction($user_id, $order_id, $amount, $stripe_refund_id )
{
    $transaction = new Transaction;
    $transaction->user_id   = $user_id;
    $transaction->amount    = $amount;
    $transaction->type      = 'credit';
    $transaction->action    = 'refund';
    $transaction->stripe_id = $stripe_refund_id;
    $transaction->transactionable_id   = $order_id;
    $transaction->transactionable_type = Order::class;
    $transaction->save();

    return $transaction;
}
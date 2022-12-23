<?php

use App\Models\Transaction;
use App\Models\ServicesItems;

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

function getDefaultParametersForSearchPage()
{
    $serviceItem = ServicesItems::first();

    $deafultSearch = [
        'serviceItem' => $serviceItem,
        'address'    => 'New York, NY, USA',
        'homeSize'   => 2000,
        'latitude'   => 40.7127753,
        'longitude'  => -74.0059728,
        'serviceItemId' => $serviceItem->id,
    ];

    return $deafultSearch;
}

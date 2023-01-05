<?php

use App\Models\Transaction;
use App\Models\ServicesItems;
use App\Models\Order;
use \Carbon\Carbon;

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

function storePayoutTransaction($user_id, $order_id, $amount, $stripe_transfer_id)
{
    $transaction = new Transaction;
    $transaction->user_id   = $user_id;
    $transaction->amount    = $amount;
    $transaction->type      = 'debit';
    $transaction->action    = 'transfer';
    $transaction->stripe_id = $stripe_transfer_id;
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


function convertDollarsIntoCents($dollars)
{
    $cents = $dollars * 100;
    return (float) number_format( $cents, 2, ".", "" ); // number, number of decimal points, seprator sign of decimal points, jsn
}

function convertCentsIntoDollars($cents)
{
    if ( $cents == 0 ) return 0;

    $dollars = $cents / 100;
    return (float) number_format( $cents, 2, ".", "" ); // number, number of decimal points, seprator sign of decimal points, jsn
}

function formatNumberToDecimalPoints($number, $decimalPointsLimit = 2)
{
    return (float) number_format( $number, $decimalPointsLimit, ".", "" );
}

function formatAvgRating( $avgRating )
{
    $doesHaveDecimalPoints = isset( explode( ".", $avgRating )[1] );
    if (  $doesHaveDecimalPoints ){
        return formatNumberToDecimalPoints( $avgRating, 2 );
    }

    return $avgRating;
}

/*
 * @param array $namesOfWeekdays ( example: [ 'monday', 'tuesday' ] )
 *
 * @return array ( example [ 1,2 ] )
 *
 */
function parseWeekdaysNameIntoWeekDaysNumber(array $namesOfWeekdays): array
{
    $weekdaysInNumbers = [];
    foreach ( $namesOfWeekdays as $weekdayName ){

        $weekdayNumber = Carbon::parse( $weekdayName )->dayOfWeek;
        array_push( $weekdaysInNumbers, $weekdayNumber );
    }

    return $weekdaysInNumbers;
}




<?php

use App\Models\CleanerServices;
use App\Models\BankInfo;
use App\Models\Transaction;
use App\Models\Order;

/*
 * @param: array $services ( Received in store method of Cleaner\ServicesController)
 *
 * @param: \App\Models\User $cleaner
 *
 * @return: bool
 */

function updateServicesOfCleaners($cleaner, $types)
{
    $cleanerServices = CleanerServices::where('users_id', $cleaner->id)->get();
    $newCleanerServies = [];

    foreach ($types as $type) {
        foreach ($type['services'] as $service_data) {

            foreach ($service_data['items'] as $item_data) {

                $item_data['status'] = $item_data['checked'] ? '1' : '0';

                if($item_data['custom']){
                    $item_data['title'] = @$item_data['title'];
                    $item_data['is_recurring'] = $item_data['is_recurring'] ? '1' : '0';
                    $item_data['is_custom'] = '1';
                }



                /* Update if service item already existed */
                if($item_data['custom']){
                    $cleanerService = $cleanerServices->where('services_id', $item_data['id'])->first();
                }
                else {
                    $cleanerService = $cleanerServices->where('services_items_id', $item_data['id'])->first();
                }
                if ($cleanerService) {

                    updateCleanerSerivce($cleanerService, $item_data);
                    continue;
                }

                /* Prepare to store service item if needs to get saved */
                if ($item_data['status'] == '1') {

                    $newCleanerService = generateCleanerServiceBlueprintForSaving($cleaner->id, $item_data);
                    array_push($newCleanerServies, $newCleanerService);
                }

                /* Ignore those items which are neither existed nor checked */
            }
        }
    }

    /* Insert new cleaner services at once */
    CleanerServices::insert($newCleanerServies);

    return true;
}

/*
 * @param: \App\Models\User $cleaner
 *
 * @param: array $item_data ( with keys: price, duration, status )
 *
 * @return: \App\Models\User $cleaner
 */
function updateCleanerSerivce($cleanerService, $item_data)
{
    $cleanerService->price    = $item_data['price'];
    $cleanerService->duration = $item_data['duration'];
    $cleanerService->status   = $item_data['status'];

    if(@$item_data['is_custom']){
        $cleanerService->title   = $item_data['title'];
        $cleanerService->is_recurring   = $item_data['is_recurring'];
        $cleanerService->is_custom   = $item_data['is_custom'];
    }

    $cleanerService->save();

    return $cleanerService;
}

/*
 * @param: int $cleaner_id ( primary key of \App\Models\User instance )
 *
 * @param: array $item_data ( with keys: id, price, duration, status)
 *
 * @return: array
 */
function generateCleanerServiceBlueprintForSaving($cleaner_id, $item_data)
{
    /*$blueprint = [
        'users_id' => $cleaner_id,
        'services_items_id' => $item_data['id'],
        "price"    => $item_data['price'],
        "duration" => $item_data['duration'],
        "status"   => $item_data['status'],

        "title"   => $item_data['title'] ?? null,
        "is_recurring"   => $item_data['is_recurring'] ?? '0',
        "is_custom"   => $item_data['is_custom'] ?? '0',
    ];*/

    $blueprint = [];
    $blueprint['users_id'] = $cleaner_id;

    if($item_data['custom']){
        $blueprint['services_id'] = $item_data['id'];
    }
    else {
        $blueprint['services_items_id'] = $item_data['id'];
    }


    $blueprint['price'] = $item_data['price'];
    $blueprint['duration'] = $item_data['duration'];
    $blueprint['status'] = $item_data['status'];

    $blueprint['title'] = $item_data['title'] ?? null;
    $blueprint['is_recurring'] = $item_data['is_recurring'] ?? '0';
    $blueprint['is_custom'] = $item_data['is_custom'] ?? '0';

    return $blueprint;
}

/*
 * @param App\Models\User $cleaner
 *
 * @return App\Models\BankInfo
 *
 */
function createBankInfoEntry($cleaner)
{
    $account = stripeCreateConnectedAccount( $cleaner->email );

    $bank = BankInfo::create([
        'users_id'   => $cleaner->id,
        'account_id' => $account->id,
        'status'     => 'pending',
    ]);

    $bank->refresh();

    return $bank;
}

/*
 * @param: App\Models\BankInfo $bank
 *
 * @param: array $accountDetails ( with keys: account_holder_name, account_number, routing_number )
 *
 */
function addAccountDetailsInBankInfo($bank, $accountDetails)
{
    $externalAccount = stripeCreateExternalAccount( $bank->account_id, $accountDetails );

    $bank->account_holder_name = $accountDetails['account_holder_name'];
    $bank->account_number      = $accountDetails['account_number'];
    $bank->routing_number      = $accountDetails['routing_number'];
    $bank->save();

    return $bank;
}

/*
 * @param: \App\Models\Order $order
 *
 * @return: array
 */
function refundOrder($order, $description )
{
    $stripeRefundOptions = [
        'charge'   => $order->userTransaction->stripe_id,
    ];

    $resp = stripeRefund( $stripeRefundOptions );
    return $resp;
}



function sendPayoutOfOrder( $order )
{

    $amountInCents = convertDollarsIntoCents( $order->cleanerFee() );
    $accountId     = $order->cleaner->bankInfo->account_id;
    $description   = "CanaryClean, payout for order #$order->id";

    $resp = stripeTransferAmountToConnectedAccount( $amountInCents, $accountId, $description );
    return $resp;

}

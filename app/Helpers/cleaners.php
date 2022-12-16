<?php

use App\Models\CleanerServices;
use App\Models\BankInfo;

/*
 * @param: array $services ( Received in store method of Cleaner\ServicesController)
 * 
 * @param: \App\Models\User $cleaner
 * 
 * @return: bool
 */

function updateServicesOfCleaners($cleaner, $services)
{
    $cleanerServices   = CleanerServices::where('users_id', $cleaner->id)->get();
    $newCleanerServies = [];

    foreach ($services as $service_id => $service_data) {

        foreach ($service_data['item'] as $item_id => $item_data) {

            
            $item_data['status'] = isset($item_data['checked']) ? '1' : '0';

            /* Update if service item already existed */
            $cleanerService = $cleanerServices->where('services_items_id', $item_id)->first();
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
    $blueprint = [
        'users_id' => $cleaner_id,
        'services_items_id' => $item_data['id'],
        "price"    => $item_data['price'],
        "duration" => $item_data['duration'],
        "status"   => $item_data['status'],
    ];

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
    $bank->payouts_enabled     = 1;
    $bank->status              = 'active';
    $bank->save();

    return $bank;
}

function jsn(){
    return 'hello';
}

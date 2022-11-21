<?php

namespace App\Http\Controllers\Cleaner\billing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Stripe;
use App\Models\BankInfo;

class BillingController extends Controller
{

    public function __construct()
    {
        $stripe = new \Stripe\StripeClient(
            config('services.stripe.secret')
        );
    }

    public function index()
    {
        $title = array(
            'title' => 'Billing',
            'active' => 'billing',
        );
        return view('cleaner.billing.billing', compact('title'));
    }

    public function bankAccount()
    {
        return view('cleaner.billing.editBankAccount');
    }
    public function editpayment()
    {
        return view('cleaner.billing.editPaymentMethod');
    }
    

    // create merchant account for cleaner
    public function connectAccount()
    {
        $error = "";
        $user = auth()->user();
        // dd($user);
        $record = BankInfo::where(['users_id' =>  $user->id])->first();

        try {
            $stripe = new \Stripe\StripeClient(
                'sk_test_51M4j6eSAN8a5ET93ihfzcV1vglUCU1fMBs9AejvpIQITbJmuH0QBXXOYH2gsTDhXEHQlPuDFmC2NB1PaU0PSaPku00NZQgYoID'
              );
            if(!$record) {
                $account = $stripe->accounts->create([
                    'type' => 'custom',
                    'country' => 'US',
                    'email' => $user->email,
                    'capabilities' => [
                        'card_payments' => ['requested' => true],
                        'transfers' => ['requested' => true],
                    ],
                ]);
dd($account);
                if(@$account->id) {
                    //save bank account..
                    $info = new BankInfo();
                    $info->user_id = $user->id;
                    $info->account_id = $account->id;
                    $info->status = "pending";
                    // $info->payouts_enabled = "pending";
                    $info->save();

                
                } else {
                    $error = "Error in account create.";
                }
            } else {
                $error = "You have alerady account.";                
            }
        } catch (Exception $ex) {

            return response()->json(['response' => 'Error'], 500);
        }
        return redirect()->back()->with('error', $error);
    }
}

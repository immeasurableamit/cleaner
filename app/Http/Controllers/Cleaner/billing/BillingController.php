<?php

namespace App\Http\Controllers\Cleaner\billing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Stripe;
use App\Models\BankInfo;
use App\Models\State;


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
        $accountinfos = BankInfo::where('users_id', auth()->user()->id)->first();
        $title = array(
            'title' => 'Billing',
            'active' => 'billing',
        );
        return view('cleaner.billing.billing', compact('title', 'accountinfos'));
    }

    public function bankAccount()
    {
        $states = State::all();

        return view('cleaner.billing.editBankAccount', compact('states'));
    }
    public function editpayment()
    {
        return view('cleaner.billing.editPaymentMethod');
    }


    // create merchant connect account for cleaner
    public function connectAccount(Request $request)
    {

        $error = "";
        $user = auth()->user();
        $record = BankInfo::where(['users_id' =>  $user->id])->first();

        try {
            //stripe client..
            $stripe = new \Stripe\StripeClient(
                config('services.stripe.secret')
            );

            if (!$record) {
                $account = $stripe->accounts->create([
                    'type' => 'custom',
                    'country' => 'US',
                    'email' => $user->email,
                    'capabilities' => [
                        'card_payments' => ['requested' => true],
                        'transfers' => ['requested' => true],
                    ],
                ]);

                if (@$account->id) {
                    //save bank account..
                    $info = new BankInfo();
                    $info->users_id = $user->id;
                    $info->account_id = $account->id;
                    $info->status = "pending";
                    $info->payouts_enabled = "pending";
                    $info->save();

                    // create link for account update and send
                    // dd($stripe->accountLinks);
                    $link = $stripe->accountLinks->create([
                        'account' => $account->id,
                        'refresh_url' => 'http://127.0.0.1:8000/cleaner/billing/banking-info-error',
                        'return_url' => 'http://127.0.0.1:8000/cleaner/billing/banking-info-success',
                        'type' => 'account_onboarding',
                    ]);
                    return redirect()->to($link->url);
                } else {
                    $error = "Error in account create.";
                }
            } else {
                $error = "You have alerady account.";
            }

            return redirect()->back()->with('error', $error);
        } catch (\Stripe\Exception\RateLimitException $e) {
            // Too many requests made to the API too quickly
            return redirect()->back()->with('error', $e->getMessage());
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            // Invalid parameters were supplied to Stripe's API
            return redirect()->back()->with('error', $e->getMessage());
        } catch (\Stripe\Exception\AuthenticationException $e) {
            // Authentication with Stripe's API failed
            return redirect()->back()->with('error', $e->getMessage());
            // (maybe you changed API keys recently)
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            // Network communication with Stripe failed
            return redirect()->back()->with('error', $e->getMessage());
        } catch (\Stripe\Exception\ApiErrorException $e) {
            // Display a very generic error to the user, and maybe send
            return redirect()->back()->with('error', $e->getMessage());
            // yourself an email
        } catch (Exception $e) {
            // Something else happened, completely unrelated to Stripe
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->back()->with('error', $error);
    }


    public function bankingInfoError()
    {
        //dd('error');
        $this->flash('error', 'Try again.');
        return redirect()->route('cleaner.billing.billing');
    }

    public function bankingInfoSuccess()
    {
        //dd('success');
        $user = auth()->user();
        $record = BankInfo::where(['users_id' => $user->id])->first();

        if (@$record) {
            $record->status = "active";
            $record->save();
        }
        return view('cleaner.billing.editBankAccount', compact('user', 'record'));
    }


    public function bankingInfoStore(Request $request)
    {

        $request->validate([
            'account_number' => 'required',
            'routing_number' => 'required|min:9',
            'account_holder_name' => 'required',
        ]);
        $user = auth()->user();
        $record = BankInfo::where(['users_id' => $user->id])->first();

        $stripe = new \Stripe\StripeClient(
            config('services.stripe.secret')
        );

        $bank = $stripe->accounts->createExternalAccount(
            $record->account_id,
            [
                'external_account' => [
                    "currency" => "usd",
                    "country" => "us",
                    "object" => "bank_account",
                    "account_holder_name" => $request->account_holder_name,
                    "routing_number" => $request->routing_number,
                    "account_number" => $request->account_number,
                ],
            ]
        );
        // dd($bank['id']);
        if ($bank) {
            BankInfo::where('id', $record->id)->update([
                "account_holder_name" => $request->account_holder_name,
                "routing_number" => $request->routing_number,
                "account_number" => $request->account_number
            ]);
        }

        return redirect()->route('cleaner.billing.billing')->with('success', 'Your bank details are added successfully');
    }
}

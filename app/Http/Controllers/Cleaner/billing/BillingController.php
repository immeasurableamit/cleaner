<?php

namespace App\Http\Controllers\Cleaner\billing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Stripe;
use App\Models\BankInfo;
use App\Models\State;
use Jantinnerezo\LivewireAlert\LivewireAlert;



class BillingController extends Controller
{

    use LivewireAlert;
    public function __construct()
    {
        $stripe = new \Stripe\StripeClient(
            config('services.stripe.secret')
        );
    }

    public function index()
    {
        $bank = BankInfo::where('users_id', auth()->user()->id)->first();

        if ( $bank ){

            $account = stripeRetrieveAccount($bank->account_id);
            if ( $account->payouts_enabled ){
                $bank->status = 'active';
                $bank->payouts_enabled = 1;
                $bank->save();
                $bank->refresh();
            }
        }

        $title = array(
            'title' => 'Billing',
            'active' => 'billing',
        );
        return view('cleaner.billing.billing', compact('title', 'bank'));
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

    /*
     * Stripe Connect account creation and verification
     */
    public function connectStripe()
    {
        $cleaner = auth()->user();
        $bank    = createBankInfoEntry($cleaner);
        $link    = stripeCreateAccountLink( $bank->account_id );
        return redirect( $link );
    }

    public function bankingInfoError()
    {
        $this->flash('error', 'Try again.');
        return redirect()->route('cleaner.billing.billing');
    }

    public function bankingInfoSuccess()
    {

        $user    = auth()->user();
        //$bank    = BankInfo::where(['users_id' => $user->id])->firstOrFail();

        return redirect()->route('cleaner.billing.billing');
    }


    public function bankingInfoStore(Request $request)
    {

        $request->validate([
            'account_number' => 'required',
            'routing_number' => 'required|min:9',
            'account_holder_name' => 'required',
        ]);

        $user = auth()->user();
        $bank = BankInfo::where(['users_id' => $user->id])->first();

        $bank = addAccountDetailsInBankInfo( $bank, $request->all() );


        return redirect()->route('cleaner.billing.billing')->with('success', 'Your bank details are added successfully');
    }

    public function updateConnectAccountStripe()
    {
        $user    = auth()->user();

        $bank = BankInfo::where(['users_id' => $user->id])->firstOrFail();
        $account = stripeRetrieveAccount( $bank->account_id );


        if ( $bank->payouts_enabled == 0 ){
            if ( ! $account->payouts_enabled ) {
                $link = stripeCreateAccountLink($bank->account_id, 'account_update');
                return redirect( $link );
            }

            $bank->payouts_enabled = 1;
            $bank->status = 'active';
            $bank->save();
        }


        $this->flash('success', 'Payouts are enabled for your account');
        return redirect()->route('cleaner.billing.billing');
    }

    public function deleteConnectAccount()
    {
        $user    = auth()->user();
        $bank = BankInfo::where(['users_id' => $user->id])->firstOrFail();


        $bank->delete();

        $this->flash('success', 'Account deleted');
        return redirect()->route('cleaner.billing.billing');
    }
}

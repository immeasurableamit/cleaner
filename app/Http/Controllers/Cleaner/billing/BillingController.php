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
        $bank    = BankInfo::where('users_id', $cleaner->id)->first();

        if ( ! $bank ) {
            $bank = createBankInfoEntry($cleaner);
        }

        if ( ! $bank->charges_enabled ) {
            $link = stripeCreateAccountOnboardingLink( $bank->account_id );
            return redirect( $link );
        }

        return redirect()->route('cleaner.billing.billing')->with('error', 'Account already exists');
    }

    public function bankingInfoError()
    {
        $this->flash('error', 'Try again.');
        return redirect()->route('cleaner.billing.billing');
    }

    public function bankingInfoSuccess()
    {

        $user    = auth()->user();
        $bank    = BankInfo::where(['users_id' => $user->id])->firstOrFail();
        $account = stripeRetrieveAccount( $bank->account_id );

        if ( $account->charges_enabled ) {
            $bank->charges_enabled = 1;
            $bank->save();
            $this->flash('success', 'Address verified');
            return redirect()->route('cleaner.billing.billing');
        }

        $this->flash('error', 'Try again!');
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
}

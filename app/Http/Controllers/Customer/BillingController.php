<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerBillingRequest;
use App\Models\BillingAddress;
use App\Models\UserCard;
use App\Models\User;
use Session;

class BillingController extends Controller
{

    public function index()
    {
        $user = User::with(['card', 'billing_address'])->where("id", auth()->user()->id)->first();
        return view('customer.billing.index', compact('user'));
    }

    public function edit()
    {
        $states = State::all();
        return view('customer.billing.edit', compact('states'));
    }

    public function update(CustomerBillingRequest $request)
    {

        $validated = $request->validated();
        $user = auth()->user();
        $card = [
            'number' => $request->card_number,
            'exp_month' => $request->exp_month,
            'exp_year'  => $request->exp_year,
            'cvc'       => $request->cvc,
        ];

        /* Verify card with stripe */
        $resp = stripeGenerateCardToken($card);
        if ($resp['status'] == false) {
            return redirect()->route('customer.billing.edit')->withInput()->withErrors(['stripe_verification' =>  $resp['error_string']]);
        }

        /* Create or Update card in stripe */
        if ($user->userDetails->stripe_customer_id) {
            $updateSourceResponse = stripeUpdateCustomerSource($user->userDetails->stripe_customer_id, $resp['token_string']);
            if ($updateSourceResponse['status'] == false) {
                return redirect()->route('customer.billing.edit')->withInput()->withErrors(['stripe_verification' =>  $updateSourceResponse['error_string']]);
            }
        } else {
            $stripeCustomer = stripeCreateCustomerWithSource($user->name, $user->email, $resp['token_string']);
            $user->userDetails->stripe_customer_id = $stripeCustomer->id;
            $user->userDetails->save();
        }

        /* Store/update card */
        $userCard = new UserCard;
        if ($user->card) {
            $userCard->exists = true;
            $userCard->id     = $user->card->id;
        }

        $userCard->last4_digits = $resp['token']->card->last4;
        $userCard->brand        = $resp['token']->card->brand;
        $userCard->exp_month    = $resp['token']->card->exp_month;
        $userCard->exp_year     = $resp['token']->card->exp_year;
        $userCard->user_id      = $user->id;
        $userCard->save();


        $existedBillingAddress = BillingAddress::where('user_id', $user->id)->first();

        $billingAdress = new BillingAddress;
        if ($existedBillingAddress) {
            $billingAdress->exists = true;
            $billingAdress->id     = $existedBillingAddress->id;
        }

        $billingAdress->first_name  = $request->first_name;
        $billingAdress->last_name   = $request->last_name;
        $billingAdress->address     = $request->address;
        $billingAdress->city        = $request->city;
        $billingAdress->state_id    = $request->state_id;
        $billingAdress->zip         = $request->zip;
        $billingAdress->apt_or_unit = $request->apt_or_unit;
        $billingAdress->user_id     = $user->id;

        $billingAdress->save();


        return redirect()->route('customer.billing.index')->with('success', 'Billing Information Updated');
    }
}

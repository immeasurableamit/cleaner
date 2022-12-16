<?php

use Stripe\Exception\CardException;
use \Stripe\StripeClient;
/*
 * @param string $email
 * 
 * @return: Stripe\Account
 */
function stripeCreateConnectedAccount($email)
{
    $stripe = new StripeClient( config('services.stripe.secret') );

    $capabilities = [
        'card_payments' => ['requested' => true],
        'transfers'     => ['requested' => true],
    ];

    $options = [
        'type'    => 'custom',
        'country' => 'US',
        'email'   => $email,
        'capabilities' => $capabilities,
    ];

    $account = $stripe->accounts->create($options);

    return $account;
}

/*
 * @param string $account_id
 * 
 * @return string
 */
function stripeCreateAccountOnboardingLink($account_id)
{
    $stripe = new StripeClient( config('services.stripe.secret') );

    $options = [
        'account'     => $account_id,
        'refresh_url' => url('/cleaner/billing/banking-info-error'),
        'return_url'  => url('/cleaner/billing/banking-info-success'),
        'type'        => 'account_onboarding',
    ];

    $link = $stripe->accountLinks->create( $options );

    return $link->url;
}


/*
 * @param string $account_id
 * 
 * @return: Stripe\Account
 */
function stripeRetrieveAccount($account_id)
{
    $stripe  = new StripeClient( config('services.stripe.secret') );
    $account = $stripe->accounts->retrieve( $account_id );

    return $account;
}


/*
 * @param: string $account_id
 * 
 * @param: array $accountDetails ( with keys: account_holder_name, account_number, routing_number ) 
 * 
 */
function stripeCreateExternalAccount($account_id, $accountDetails)
{
    $stripe  = new StripeClient( config('services.stripe.secret') );

    $options = [
        "currency" => "usd",
        "country" => "us",
        "object" => "bank_account",
        "account_holder_name" => $accountDetails['account_holder_name'],
        "routing_number"      => $accountDetails['routing_number'],
        "account_number"      => $accountDetails['account_number']
    ];

    $externalAccount = $stripe->accounts->createExternalAccount($account_id, [ 'external_account' =>  $options]); 

    /* TODO: exception handling is left */

    return $externalAccount;
}

/*
 * @param: array $card ( with keys: number, exp_month, exp_year, cvc )
 * 
 */
function stripeGenerateCardToken($card)
{
    $stripe  = new StripeClient( config('services.stripe.secret') );

    $options = compact('card');

    try {
        
        $token = $stripe->tokens->create($options);
        return ['status' => true, 'token' => $token, 'token_string' => $token->id ];

    } catch(\Stripe\Exception\CardException $e) {

        return ['status' => false, 'error' => $e, 'error_string' => $e->getMessage() ];        
    }
    
    return ['status' => false, 'error_string' => 'Unknown error occured'];
}

/*
 * @param: array $options ( options which are accepted by stripe )
 * 
 * @return: Stripe\Customer
 * 
 */
function stripeCreateCustomer($options)
{
    $stripe   = new StripeClient( config('services.stripe.secret') );

    try {
        $customer = $stripe->customers->create( $options );
        return [ 'status' => true, 'resposne' => $customer ];
        
    } catch ( CardException $e ) {
        return ['status' => false, 'error' => $e, 'error_string' => $e->getMessage() ];
    }

    return $customer;
}

function stripeUpdateCustomer($customer_id, $options)
{
    $stripe   = new StripeClient( config('services.stripe.secret') );

    try {
        $customer = $stripe->customers->update( $customer_id, $options );
        return [ 'status' => true, 'resposne' => $customer ];

    } catch ( CardException $e ) {
        return ['status' => false, 'error' => $e, 'error_string' => $e->getMessage() ];
    }
    
    return $customer;
}

function stripeUpdateCustomerSource($customer_id, $source)
{
    $options = [
        'source' => $source,        
    ];

    $response = stripeUpdateCustomer($customer_id, $options);
    return $response;
}

function stripeCreateCustomerWithSource($name, $email, $source)
{
    $options  = compact('name', 'email', 'source');
    $customer = stripeCreateCustomer($options);
    return $customer;
}

function stripeCharge( $options ) 
{
    $stripe = new StripeClient( config('services.stripe.secret') );

    try { 
        $charge = $stripe->charges->create( $options );
        return ['status' => true, 'response' => $charge, 'charge_id' => $charge->id ];

    } catch ( CardException $e ) {
        return ['status' => false, 'error' => $e, 'error_string' => $e->getMessage() ];
    }
    
    return [ 'status' => false, 'error_string' => 'unknown error'];
}

function stripeChargeCustomer($customer_id, $amount_in_cents, $description)
{
	$options = [
        'customer' => $customer_id,
        'amount'   => $amount_in_cents,
        'description' => $description,
        'currency'    => 'usd',

	];

    $charge  = stripeCharge( $options );
    return $charge;
}

function stripeTransfer( $options ) 
{
    $stripe = new StripeClient( config('services.stripe.secret') );

    $transfer = $stripe->transfers->create( $options );
    return ['status' => true, 'response' => $transfer, 'transfer_id' => $transfer->id ];
}

function stripeTransferAmountToConnectedAccount($amount_in_cents, $account_id, $description)
{
    $options = [
        'currency'    => 'usd',
        'amount'      => $amount_in_cents,
        'destination' => $account_id,
        'description' => $description,
    ];

    $transferResp = stripeTransfer($options);
    return $transferResp;
}

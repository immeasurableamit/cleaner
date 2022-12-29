<?php

/*
 * @param App\Models\User $user
 *
 * @return string
 */
function thimbleGenerateBuyInsuranceLinkFor($user)
{
    $optionsForThimbel = (object) [
        'email_address' => $user->email,
        'first_name'    => $user->first_name,
        'last_name'     => $user->last_name,
        'activity_id'   => "ACT-00025", // cleaners and janitors activity id of thimble
        'zipcode'       => $user->UserDetails->zip_code,
        'primary_insurance_type' => 'gl',
        'coverage_start_timestamp' => 'now',
        'is_annual'     => true,
    ];

    $response = thimbleQuote( $optionsForThimbel );
    return $response->json();
}


/**
* thimble.com Open API X-signature implementation
*
* @param string $appKey: The appkey thimble.com provided.
* @param string $secret: The secret thimble.com provided.
* @param string $timestamp: Epoch Unix Time Stamp.
* @param string $url: The request url, contains query string. For example:
*  a request to 'https://open-api.thimble.com/activities?q=1', the 'url' would be '/activities?q=1'.
* @param string/object $reqBody: The request body.

* @return string
*/
function thimbleSignRequest($appKey, $secret, $timestamp, $url, $reqBody) {

    $bodyData = $reqBody;
    if (is_object($reqBody)) {
      $bodyData = json_encode($reqBody);
    }

    $data = $appKey . $url . $timestamp . $bodyData;

    $xsignature = hash_hmac('sha256', $data, $secret);
    return $xsignature;
}

function thimbleGenerateHeaders( $url, $body )
{
    $appKey     = env("THIMBLE_KEY");
    $secret     = env("THIMBLE_SECRET");
    $timestamp  = time();
    $urlForSign = parse_url( $url )['path'];
    $xsignature = thimbleSignRequest( $appKey, $secret, $timestamp, $urlForSign, $body );

    $headers = [
        'Content-Type' => 'application/json',
        'appkey'       => $appKey,
        'x-timestamp'  => $timestamp,
        'x-signature'  => $xsignature,
    ];

    return $headers;
}

/*
 * @param object $body
 *
 * @return Illuminate\Http\Client\Response
 *
 */
function thimbleQuote($body)
{
    $url      = env('THIMBLE_API_HOST').'/quote';
    $headers  = thimbleGenerateHeaders($url, $body);
    $response = Http::withHeaders($headers)->post( $url, $body );

    return $response;
}

function thimbleSearchPolicyByEmail($email)
{
    $options = (object) [
        'filter' => [ 'client_email_address' => $email ]
    ];

    $response = thimbleSearchPolicy($options);
    if ( ! $response['results'] ){
        return [];
    }

    $policy = collect( $response['results'] )->where('applicant_email', $email)->first();
    return $policy ?? [];
}

function thimbleSearchPolicy($body)
{
    $url      = env('THIMBLE_API_HOST').'/policy/search';
    $headers  = thimbleGenerateHeaders($url, $body);
    $response = Http::withHeaders($headers)->post( $url, $body );

    return $response->json();
}


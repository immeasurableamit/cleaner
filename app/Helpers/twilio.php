<?php

use Twilio\Rest\Client as TwilioClient;
use Twilio\Exceptions\RestException ;

function twilioGetClient()
{
    $sid  = config('services.twilio.sid');
    $token = config('services.twilio.token');
    return new TwilioClient($sid, $token);
}

function twiloSendMessage($phone, $message)
{
    $client    = twilioGetClient();
    $fromPhone = config('services.twilio.phone');

    try {
        $options = ['from' => $fromPhone, 'body' => $message];
        $response = $client->messages->create($phone, $options);
        return ['status' => true, 'response' => $response ];
    } catch ( RestException $e ){
        return ['status' => false, 'response' => $e ];
    }

}

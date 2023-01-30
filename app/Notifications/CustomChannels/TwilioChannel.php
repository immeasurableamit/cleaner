<?php

namespace App\Notifications\CustomChannels;

use Illuminate\Notifications\Notification;
use Twilio\Exceptions\RestException;

class TwilioChannel
{
    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toTwilio($notifiable);
		//return true;

        $resp = twiloSendMessage($message['phone'], $message['body']);
        if ( $resp['status'] == false ){
            info("[TWILIO CHANNEL][FAILED][PHONE ".$message['phone']."] failure message: ".$resp['response']->getMessage());
        }

        return $resp;
    }
}

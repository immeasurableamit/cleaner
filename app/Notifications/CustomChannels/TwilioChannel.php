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

        $resp = twiloSendMessage($message['phone'], $message['body']);
        if ( $resp['status'] == false ){
            info("[TWILIO CHANNEL][FAILED] phone: ", $message);
        }

        return $resp;
    }
}

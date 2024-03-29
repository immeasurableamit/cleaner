<?php
namespace App\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Lang;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;

class VerifyEmail extends VerifyEmailBase
{
//    use Queueable;

    public function toMail($notifiable)
    {
		$notifiable->first_name = ucwords( $notifiable->first_name );
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable);
        }

        return (new MailMessage)
			->greeting("Hello $notifiable->first_name,")
            ->subject('Verify Email Address')
            ->line('Please click the button below to verify your email address.')
            ->action(
                'Verify Email Address',
                $this->verificationUrl($notifiable)
            )
            ->line('If you did not create an account, no further action is required.');
    }
}

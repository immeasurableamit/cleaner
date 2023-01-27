<?php

namespace App\Notifications\Customer;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Mail\Customer\OrderConfirmedMail;
use App\Notifications\CustomChannels\TwilioChannel;

class OrderConfirmed extends Notification implements ShouldQueue
{
    use Queueable;

    public $order;

    /**
     * Create a new notification instance.
     *e
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database', TwilioChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $mailable = new OrderConfirmedMail($notifiable, $this->order);

        return $mailable->to($notifiable->email);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'order_id' => $this->order->id,
        ];
    }

    public function toTwilio($notifiable)
    {
        $phone    = config('app.country_prefix_for_phone_number').(string)$notifiable->contact_number;
        $message  = "Hello ".ucwords($this->order->user->name).",\n\nWe are glad to inform you that your booking has been accepted by the Cleaner.";
        $message .= "\n\nRegards\n".config('app.name');

        return [
            'phone' => $phone,
            'body'  => $message,
        ];
    }
}

<?php

namespace App\Notifications\Cleaner;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Order;
use App\Notifications\CustomChannels\TwilioChannel;


class OrderConfirmed extends Notification implements ShouldQueue
{
    use Queueable;

	protected $order;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Order $order)
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
        return (new MailMessage)->subject('Your Appointment Accepted')
			->markdown('email.cleaner.order-confirmed', [
				'order' => $this->order,
			]);
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
        $phone = config('app.country_prefix_for_phone_number').(string)$notifiable->contact_number;
        $message  = "Your Appointment Accepted";
        $message .= "Hello ".ucwords($this->order->cleaner->name).",\n\nBooking has been confirmed successfully.";
        $message .= "\n\nRegards\n".config('app.name');

        return [
            'phone' => $phone,
            'body' => $message,
        ];
    }
}

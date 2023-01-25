<?php

namespace App\Notifications\Cleaner;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Order;
use App\Mail\Cleaner\NewBookingMail;
use App\Notifications\CustomChannels\TwilioChannel;

class NewBooking extends Notification
{
    use Queueable;

    public $order;

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
        return ['mail','database', TwilioChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
	    $mailable = new NewBookingMail( $this->order );
	    return $mailable->to( $notifiable->email );
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

    /*
     * should return array with keys ( phone, body )
     */
    public function toTwilio($notifiable)
    {
        $url     = route('cleaner.jobs.jobs', ['selectedDate' => $this->order->cleaning_datetime->toDateString() ]);
        $message = "You got a new booking! Click the link to view: $url";

        return [
            'phone'   => "+91$notifiable->contact_number",
            'body' => $message,
        ];
    }
}

<?php

namespace App\Notifications\Customer;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Order;
use App\Notifications\CustomChannels\TwilioChannel;

class NewBooking extends Notification
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
        return (new MailMessage)->subject('CanaryClean - New Booking!')->markdown('email.customer.new-booking', ['order' => $this->order]);
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
        $url      = route('customer.appointment.index', ['selectedDate' => $this->order->cleaning_datetime->toDateString() ]);
        $message  = "Hello ".ucwords( $this->order->cleaner->name )." You have a new booking.";
        $message .= "\n\nBooking Time: ".$this->order->cleaning_datetime->format('F, l d,Y | h:i A');
        $message .="\n\nView Booking: $url";
		$phone    = config("app.country_prefix_for_phone_number").(string)$notifiable->contact_number;

        return [
            'phone'   => $phone,
            'body' => $message,
        ];
    }
}

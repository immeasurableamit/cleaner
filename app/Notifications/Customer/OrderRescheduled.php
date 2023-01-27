<?php

namespace App\Notifications\Customer;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Order;
use App\Notifications\CustomChannels\TwilioChannel;

class OrderRescheduled extends Notification implements ShouldQueue
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
        return (new MailMessage)->subject('CanaryClean Appointment Reschedule')
			->markdown('email.customer.order-rescheduled', [ 'order' => $this->order]);

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
        $url      = route('customer.appointment.index', ['selectedDate' => $this->order->cleaning_datetime->toDateString() ]);
        $phone    = config('app.country_prefix_for_phone_number').(string)$notifiable->contact_number;
        $message  = "Hello ".ucwords($this->order->user->name).", Your booking has been rescheduled. Please see your Appointment schedule below.";
        $message .= "\n\nBooking Time: ".$this->order->cleaning_datetime->format('F, l d,Y | h:i A');
        $message .= "\n\nView appointment: $url\n\nRegards\n".config('app.name');

        return [
            'phone' => $phone,
            'body'  => $message,
        ];
    }
}

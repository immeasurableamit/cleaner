<?php

namespace App\Notifications\Customer;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Order;
use App\Notifications\CustomChannels\TwilioChannel;

class OrderDeclined extends Notification implements ShouldQueue
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
        return (new MailMessage)->subject('Your Appointment Rejected')->markdown('email.customer.order-declined', ['user' => $this->order->user]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $message  = "Hello ".ucwords($this->order->user->name).",\n\nWe are sorry to inform you that your booking has been rejected by the Cleaner. Please re-try to book another one.";
        return [
            'order_id' => $this->order->id,
            'message'  => $message,
        ];
    }

    public function toTwilio($notifiable)
    {
        $phone    = config('app.country_prefix_for_phone_number').(string)$notifiable->contact_number;
        $message  = "Hello ".ucwords($this->order->user->name).",\n\nWe are sorry to inform you that your booking has been rejected by the Cleaner. Please re-try to book another one.";
        $message .= "\n\nRegards\n".config('app.name');

        return [
            'phone' => $phone,
            'body' => $message,
        ];
    }
}

<?php

namespace App\Notifications\Customer;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Order;
use App\Notifications\CustomChannels\TwilioChannel;

class OrderCompleted extends Notification implements ShouldQueue
{
    use Queueable;
    protected $order;
    protected $subject;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
        $this->subject = "Booking Completed Successfully";
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
        return (new MailMessage)->subject($this->subject)
            ->markdown('email.customer.order-completed', [
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
            'message'  => $this->subject,
        ];
    }

    public function toTwilio($notifiable)
    {
        $url = route('customer.appointment.index', ['selectedDate' => $this->order->cleaning_datetime->toDateString() ]);

        $message  = $this->subject . "\n\nHello " . ucwords($notifiable->name) . ",";
        $message .= "\n\nYour Booking has been successfully Completed, Please share your valuable feedback regarding Cleaner service this will help cleaner to perform better in future.";
        $message .= "\n\nBooking Details: ".$this->order->cleaning_datetime->format('F, l d,Y | h:i A');
        $message .= "\n\nView appointment: $url\n\nRegards\n".config('app.name');

        return [
            'phone' => $notifiable->contact_number_with_country_code,
            'body'  => $message,
        ];
    }
}

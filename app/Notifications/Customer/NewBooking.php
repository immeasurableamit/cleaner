<?php

namespace App\Notifications\Customer;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Order;

class NewBooking extends Notification implements ShouldQueue
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
        $channels = ['database'];
        if ( method_exists($notifiable, 'subscribedNotificationChannels') ){
            $channels = array_merge( $channels,  $notifiable->subscribedNotificationChannels() );                               
        }
        
        $finalChannels = array_unique( $channels );
        return $finalChannels;
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)->subject('CanaryClean Appointment  Placed Successfully')->markdown('email.customer.new-booking', ['order' => $this->order]);
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
        $message  = "CanaryClean New Booking\n\n";
        $message  .= "Hello ".ucwords( $this->order->cleaner->name ).",\n\nYour booking has been placed successfully. Please view your Booking schedule below";
        $message .= "\n\nBooking Time: ".$this->order->cleaning_datetime->format('F, l d,Y | h:i A');
        $message .="\n\nView appointment: $url";
		$phone    = config("app.country_prefix_for_phone_number").(string)$notifiable->contact_number;

        return [
            'phone'   => $phone,
            'body' => $message,
        ];
    }
}

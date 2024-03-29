<?php

namespace App\Notifications\Cleaner;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Order;
use App\Mail\Cleaner\NewBookingMail;

class NewBooking extends Notification implements ShouldQueue
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
        $url     = route('cleaner.jobs.jobs', ['selectedDate' => $this->order->cleaning_datetime->toDateString() , 'selectedTab' => 2]);
        $message  = "CanaryClean New Booking\n\n";
        $message .= "Hello ".ucwords( $this->order->cleaner->name ).",\n\nCongratulations you have new Booking!  Please view your Appointment schedule below.";
        $message .= "\n\nBooking Time: ".$this->order->cleaning_datetime->format('F, l d,Y | h:i A');
        $message .="\n\nView appointment: ".route('cleaner.jobs.jobs', ['selectedDate' => $this->order->cleaning_datetime->toDateString()]);

		$phone  = config("app.country_prefix_for_phone_number").(string)$notifiable->contact_number;
        return [
            'phone'   => $phone,
            'body' => $message,
        ];
    }
}

<?php

namespace App\Notifications\Cleaner;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Order;


class OrderCancelled extends Notification implements ShouldQueue
{
    use Queueable;

	protected $order;
    protected $isCancelledByCustomer;
    protected $subject;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
		$this->order = $order;
        $this->isCancelledByCustomer = $order->status == "cancelled_by_customer" ;

        if ( $this->isCancelledByCustomer ) {
            $this->subject = "Appointment Cancelled by Customer";
        } else {
            $this->subject = "Appointment Cancelled by Cleaner";
        }
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
        return (new MailMessage)->subject($this->subject)->markdown('email.cleaner.order-cancelled', ['order' => $this->order, 'isCancelledByCustomer' => $this->isCancelledByCustomer]);
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

     /*
     * should return array with keys ( phone, body )
     */
    public function toTwilio($notifiable)
    {
        $phone = config('app.country_prefix_for_phone_number').(string) $notifiable->contact_number;

        $message  = $this->subject."\n\n";
        $message .= "Hello ".ucwords( $this->order->cleaner->name ).",\n\n";

        if ( $this->isCancelledByCustomer ) {
            $message .= "We  are sorry to inform you that your appointment has been cancelled by the Customer";
        } else {
            $message .= "We  are sorry to inform you that your appointment has been cancelled";
        }

        $message .= "\n\nRegards\n".config('app.name');

        return [
            'phone' => $phone,
            'body'  => $message,
        ];
    }
}

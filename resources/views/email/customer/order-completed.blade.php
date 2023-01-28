<x-mail::message>

Hello {{ ucwords( $order->cleaner->name ) }},

Your Booking has been successfully Completed, Please share your valuable feedback regarding Cleaner service this will help cleaner to perform better in future.

Booking Details: {{ $order->cleaning_datetime->format('F, l d,Y | h:i A') }}

<x-mail::button :url="route('customer.appointment.index', ['selectedDate' => $order->cleaning_datetime->toDateString() ])">View appointment</x-mail::button>

Regards<br>
{{ config('app.name') }}
</x-mail::message>

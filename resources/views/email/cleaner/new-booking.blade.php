<x-mail::message>

Hello {{ ucwords( $order->cleaner->name ) }}, Congratulations you have new Booking!  Please view your Appointment schedule below.

Booking Time: {{ $order->cleaning_datetime->format('F, l d,Y | h:i A') }}

<x-mail::button :url="route('cleaner.jobs.jobs', ['selectedDate' => $order->cleaning_datetime->toDateString()])">View appointment</x-mail::button>


Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

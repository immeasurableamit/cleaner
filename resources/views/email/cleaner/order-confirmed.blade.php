<x-mail::message>

Hello {{ ucwords( $order->cleaner->name ) }}, Your booking has been confirmed. Please view your Booking schedule below

Booking Time: {{ $order->cleaning_datetime->format('F, l d,Y | h:i A') }}

<x-mail::button :url="route('cleaner.jobs.jobs', ['selectedDate' => $order->cleaning_datetime->toDateString() ])">View appointment</x-mail::button>

Regards<br>
{{ config('app.name') }}
</x-mail::message>

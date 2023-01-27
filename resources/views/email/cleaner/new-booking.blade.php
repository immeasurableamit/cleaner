<x-mail::message>

Hello {{ ucwords( $order->cleaner->name ) }}, You have a new booking.

Booking Time: {{ $order->cleaning_datetime->format('F, l d,Y | h:i A') }}

<x-mail::button :url="route('cleaner.jobs.jobs', ['selectedDate' => $order->cleaning_datetime->toDateString()])">View </x-mail::button>


Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

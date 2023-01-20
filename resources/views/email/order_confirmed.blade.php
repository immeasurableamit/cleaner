<x-mail::message>

Hello {{ ucwords( $user->name ) }}, Your booking has been confirmed. Please view your Booking schedule below

Booking Time: {{ $order->cleaning_datetime->format('F, l d,Y | h:i A') }}

<x-mail::button url="https://youtube.com">View appointment</x-mail::button>

Regards<br>
{{ config('app.name') }}
</x-mail::message>

<x-mail::message>

Hello {{ ucwords( $order->cleaner->name ) }}, Booking has been confirmed successfully.

Regards<br>
{{ config('app.name') }}
</x-mail::message>

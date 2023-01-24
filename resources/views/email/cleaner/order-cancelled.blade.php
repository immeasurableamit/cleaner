<x-mail::message>

Hello {{ ucwords( $order->cleaner->name ) }}, We are sorry to inform you that your appointment has been cancelled.

Regards<br>
{{ config('app.name') }}
</x-mail::message>

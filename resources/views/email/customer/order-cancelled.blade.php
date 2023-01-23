<x-mail::message>

Hello {{ ucwords( $order->user->name ) }}, We are sorry to inform you that your appointment has been cancelled by the cleaner. Please try to Book another one.

Regards<br>
{{ config('app.name') }}
</x-mail::message>

<x-mail::message>

Hello {{ ucwords( $order->user->name ) }},

@if ( $isCancelledByCustomer )
We are sorry to inform you that your appointment has been cancelled
@else
We are sorry to inform you that your appointment has been cancelled by the cleaner. Please try to Book another one.
@endif

Regards<br>
{{ config('app.name') }}
</x-mail::message>

<x-mail::message>

Hello {{ ucwords( $order->cleaner->name ) }},

@if ( $isCancelledByCustomer )
We  are sorry to inform you that your appointment has been cancelled by the Customer
@else
We  are sorry to inform you that your appointment has been cancelled
@endif

Regards<br>
{{ config('app.name') }}
</x-mail::message>

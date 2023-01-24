<x-mail::message>

Hello {{ ucwords( $order->user->name ) }}, Your booking has been rescheduled. Please see your Appointment schedule below.


Booking Time: {{ $order->cleaning_datetime->format('F, l d,Y | h:i A') }}


<x-mail::button :url="route('customer.appointment.index', ['selectedDate' => $order->cleaning_datetime->toDateString() ])">View appointment</x-mail::button>

Regards<br>
{{ config('app.name') }}
</x-mail::message>

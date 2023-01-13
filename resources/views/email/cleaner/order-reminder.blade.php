<x-mail::message>
<b>Booking Reminder!</b>

You have a Booking scheduled for {{ $order->cleaning_datetime->toDayDateTimeString() }}, {{ $order->cleaning_datetime->diffForHumans() }}.


<x-mail::button :url="route('cleaner.jobs.jobs', ['selectedDate' => $order->cleaning_datetime->toDateString() ])">
Take me to Booking
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

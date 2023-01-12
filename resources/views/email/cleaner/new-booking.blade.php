<x-mail::message>

You got a new Booking!

Job id: #{{ $order->id }}

Scheduled For: {{ $order->cleaning_datetime->toDayDateTimeString() }}

Total price: ${{ $order->total }}

Address: {{ $order->address }}

City: {{ $order->city }}

State: {{ $order->state->name }}

<x-mail::button :url="route('cleaner.jobs.jobs', ['selectedDate' => $order->cleaning_datetime->toDateString() ])">Go to order</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

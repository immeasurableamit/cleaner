<x-mail::message>

Hello {{ ucwords( $user->name ) }},

We are glad to inform you that your booking has been accepted by the Cleaner.

Regards<br>
{{ config('app.name') }}
</x-mail::message>

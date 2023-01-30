<x-mail::message>

Hello {{ ucwords( $user->name ) }},

We are sorry to inform you that your booking has been rejected by the Cleaner. Please re-try to book another one.

Regards<br>
{{ config('app.name') }}
</x-mail::message>

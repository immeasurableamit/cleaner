<x-mail::message>

Hello, {{ ucwords( $user->name ) }}

Thank you for using our application!

Your account has been successfully created. Please click the link below to complete your profile.

<x-mail::button :url="route('customer.account')">Complete profile</x-mail::button>

Regards,<br>
{{ config('app.name') }}
</x-mail::message>

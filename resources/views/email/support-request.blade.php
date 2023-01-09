<x-mail::message>

New support request

Job id: #{{ $supportRequest->order_id}}

Issue: {{ $supportRequest->issue }}

Requested resolution: {{ $supportRequest->requested_resolution }}

Description: {{ $supportRequest->description }}

@if ( $supportRequest->explanation_for_other_type )
Explanation: {{ $supportRequest->explanation_for_other_type }}
@endif

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

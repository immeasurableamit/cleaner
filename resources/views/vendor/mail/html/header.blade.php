<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block; background-color: #37A9FB;padding: 9px;border-radius: 15px;">
	
{{--
@if (trim($slot) === 'Laravel')
<img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
@else
{{ $slot }}
@endif
--}}

<img src="{{ url('assets/images/logo/logo.svg') }}" class="logo" alt="{{ $slot }}" style="width:100%; height:56px">

</a>
</td>
</tr>

@extends('layouts.app')

@section('content')
<div class="row justify-content-center my-5">
	<div class="col-md-8 verifyemail">

		<div class="bold">{{ __('Verify Your Email Address') }}</div>

		<div class="py-3">


			@if (session('status'))
			<div class="card p-3" role="alert">
				{{ __('A fresh verification link has been sent to your email address.') }}
			</div>
			@endif

			<div class="pt-3">
				{{ __('Before proceeding, please check your email for a verification link.') }}
			{{ __('If you did not receive the email') }},
			</div>
			<form class="d-inline pt-3 d-block" method="POST" action="{{ route('verification.send') }}">
				@csrf
				<button type="submit" class="btn_blue  m-0 align-baseline">{{ __('click here to request another') }}</button>
				
			</form>
		</div>

	</div>
</div>
@endsection
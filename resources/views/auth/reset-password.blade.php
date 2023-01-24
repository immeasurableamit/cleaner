@extends('layouts.app')

@section('content')

<div class="container py-5">
    <div class="row customer-white-wrapper ">
        <div class="col-md-6">
        <div class="blue-bg-wrapper justify-content-center">
            <div class="text-block-auth text-center">
              <h2>Reset Your Password</h2>
              <!-- <p>To the future of cleaning. Simple. Affordable. The Best.</p> -->
            </div>
            <div class="blue-logo-block text-center">
              <a href="#"><img src="{{asset('assets/images/logo/logo.svg')}}"></a>
            </div>
          </div>
        </div>
        <div class="col-md-6">
            <div class=" ">
                <!-- <div class="p-3 text-center pt-5">
                <h4>    {{ __('Reset Password') }}</h4>
                </div> -->

                <div class="auth_form">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                       <input type="hidden" name="token" value="{{ request()->token }}">
                        <div class="form-group row pb-3 ">
                            <!-- <label for="email" class="col-md-3 col-form-label text-md-right">
                                <b>{{ __('E-Mail Address') }}</b>
                            </label> -->

                            <div class="col-md-12 input-design">
                                <input id="email" type="email" placeholder="E-Mail Address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" autocomplete="email" autofocus>

                                @error('email')<span class="alert ">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="form-group row input-design  pb-3">
                            <!-- <label for="password" class="col-md-3 col-form-label text-md-right">
                                <b>{{ __('Password') }}</b>
                            </label> -->

                            <div class="col-md-12 input-design">
                                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')<span class="alert ">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="form-group row pb-3 ">
                            <!-- <label for="password-confirm" class="col-md-3 col-form-label text-md-right">
                                <b>{{ __('Confirm Password') }}</b>
                            </label> -->

                            <div class="col-md-12 input-design">
                                <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                @error('password_confirmation')<span class="alert ">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="form-group row pb-3  mb-0">
                            <div class="col-md-12 pt-3 text-center">
                                <button type="submit" class="submit-btn">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
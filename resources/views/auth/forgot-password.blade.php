@extends('layouts.app')

@section('content')

<section class="authentication-sec light-banner login-page" style="background-image: url('assets/images/white-pattern.png')">
  <div class="container">
    <div class="authentication-form-wrapper">
      <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
          <div class="blue-bg-wrapper justify-content-center">
            <div class="text-block-auth text-center">
              <h2>Forgot Password</h2>
              <p>To the future of cleaning. Simple. Affordable. The Best.</p>
            </div>
            <div class="blue-logo-block text-center">
              <a href="#"><img src="{{asset('assets/images/logo/logo.svg')}}"></a>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
          <div class="d-flex height-100 align-items-center auth_form login">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
            @endif
            <form class="form-design" method="POST" action="{{ route('password.email') }}">
              @csrf

              <div class="form-grouph input-design input-icon-left mb-25">
                <!-- <input type="text" placeholder="Enter your email address"> -->
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your email address" autofocus>

                @error('email')
                <span class="input-icon" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror

                <!-- <span class="input-icon"><img src="assets/images/icons/email.svg"></span> -->
              </div>
              <div class="form-grouph submit-design mb-25">
                <!-- <input type="submit" value="Submit" class="submit-btn"> -->
                <button type="submit" class="submit-btn">
                  {{ __('Send Password Reset Link') }}
                </button>
              </div>
              <div class="auth-bottom-text text-center">
                <p>Not a member yet? <a href="{{ route('signup') }}" class="link-design">Sign Up</a></p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
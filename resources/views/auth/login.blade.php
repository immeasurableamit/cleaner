@extends('layouts.app')

@section('content')

<section class="authentication-sec light-banner login-page" style="background-image: url('assets/images/white-pattern.png')">
  <div class="container">
    <div class="authentication-form-wrapper">
      <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
          <div class="blue-bg-wrapper justify-content-center">
            <div class="text-block-auth text-center">
              <h2>Welcome Back</h2>
              <p>To the future of cleaning. Simple. Affordable. The Best.</p>
            </div>
            <div class="blue-logo-block text-center">
              <a href="#"><img src="{{asset('assets/images/logo/logo.svg')}}"></a>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
          <div class="d-flex height-100 align-items-center auth_form login">
            <form class="form-design" method="post" action="{{route('login')}}">
              @csrf
              <div class="social-buttons">
                <button class="social-auth-btn"><img src="assets/images/icons/google.svg"> Continue with Google</button>
                <button class="social-auth-btn"><img src="assets/images/icons/apple.svg"> Continue with Google</button>
              </div>
              <div class="or-block">
                <p>Or</p>
              </div>
              <div class="form-grouph input-design input-icon-left mb-25">
                <input type="text" placeholder="Enter your email address" name="email">
                <span class="input-icon"><img src="assets/images/icons/email.svg"></span>
              </div>
              <div class="form-grouph input-design input-icon-left mb-25">
                <input type="password" placeholder="Password" name="password">
                <span class="input-icon"><img src="assets/images/icons/lock.svg"></span>
              </div>
              <div class="form-grouph forgot-rember-block d-flex justify-content-spacebw align-items-center mb-25">
                <div class="checkbox-design position-relative d-flex align-items-center">
                  <input type="checkbox" placeholder="">
                  <button class="checkbox-btn"></button>
                  <span class="checkbox-text">Keep me signed in.</span>
                </div>
                <div class="forgot-password-link">
                  <a href="{{ route('password.email') }}" class="link-design">Forgot Password?</a>
                </div>
              </div>
              <div class="form-grouph submit-design mb-25">
                <input type="submit" value="Sign in" class="submit-btn" >
              </div>
              <div class="auth-bottom-text text-center">
                <p>Not a member yet? <a href="{{route('signup')}}" class="link-design">Sign Up</a></p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
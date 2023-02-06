@extends('layouts.cleanerapp')

@section('content')
<section class="light-banner customer-account-page" style="background-image: url('../assets/images/white-pattern.png')">
  <div class="container">
    <div class="customer-white-wrapper">
      <div class="row no-mrg">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 no-padd">
          <div class="blue-bg-wrapper bar_left">
            <div class="blue-bg-heading">
              <h4>Settings</h4>
            </div>
            @include('layouts.common.sidebar')
            <div class="blue-logo-block text-center max-width-100">
              <a href="{{ route('index') }}"><img src="{{asset('assets/images/logo/logo.svg')}}"></a>
            </div>
          </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 no-padd">
          <div class="row no-mrg">
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 no-padd ">

              <div class="customer-account-forms biling_form">
                <div class="form-headeing-second">
                  <h4>Billing Information</h4>
                </div>


                @if ( empty( $bank ) )

                  <div><a href="{{ route('cleaner.billing.stripeConnect') }}" class="btn_blue">Connect Bank Account </a></div>
                @else

                    @include('cleaner.billing.includes.addBankAccount')

                @endif

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@if ( $errors->any() )
<script>console.log( @json( $errors->all() )  )</script>
@endif

@endsection

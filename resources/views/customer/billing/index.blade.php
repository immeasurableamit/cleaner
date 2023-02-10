@extends('layouts.app')

@section('content')
    @include ('layouts.includes.alerts')

    <section class="light-banner customer-account-page" style="background-image: url('/assets/images/white-pattern.png')">
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
                                <a href="{{ route('index') }}"><img src="{{asset('/assets/images/logo/logo.svg')}}"></a>
                            </div>
                        </div>
                    </div>


                    <!-- Billing Info Section -->

                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 no-padd">
                        <div class="row no-mrg">
                            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 no-padd">

                                <div class="customer-account-forms biling_form">
                                    <div class="form-headeing-second">
                                        <h4>Billing Information</h4>
                                    </div>

                                    @if ( !$user->billing_address )
                                        <a href="{{ route('customer.billing.edit') }}">Add Billing Address</a>
                                    @else
                                    <div class="customer-account-information">
                                        <ul class="list-unstyled">
                                            <li class="d-flex justify-content-spacebw three_column">
                                                <h6 class="title-label"> Name:</h6>
                                                <p class="">{{ $user->billing_address->first_name." ". $user->billing_address->last_name }}</p>
                                            </li>
                                            <li class="d-flex justify-content-spacebw three_column">
                                                <h6 class="title-label">Address</h6>
                                                <p>{{ $user->billing_address->address }}</p>
                                            </li>
                                            <li class="d-flex justify-content-spacebw three_column">
                                                <h6 class="title-label">City</h6>
                                                <p>{{ $user->billing_address->city }}</p>
                                            </li>
                                            <li class="d-flex justify-content-spacebw three_column">
                                                <h6 class="title-label">State</h6>
                                                <p>{{ $user->billing_address->state->name }}</p>
                                            </li>

                                            <li class="d-flex justify-content-spacebw three_column">
                                                <h6 class="title-label">Zip Code</h6>
                                                <p>{{ $user->billing_address->zip }}</p>
                                            </li>
                                            <li class="d-flex justify-content-spacebw three_column">
                                                <h6 class="title-label">Apt or Unit</h6>
                                                <p>{{ $user->billing_address->apt_or_unit }}</p>
                                            </li>


                                        </ul>
                                    </div>

                                    <div class="form-headeing-second payment_heading pt-3">
                                        <h4><img src="/assets/images/credit-card.png" class="me-3" />Payment method</h4>
                                    </div>

                                    <div class="customer-account-information">
                                        <ul class="list-unstyled">
                                            <li class="d-flex justify-content-spacebw two_column">
                                                <h6 class="title-label">Card Number:</h6>
                                                <p class="">*****{{ @$user->card->last4_digits }}</p>
                                            </li>
                                            <li class="d-flex justify-content-spacebw two_column">
                                                <h6 class="title-label"> Card Type:</h6>
                                                <p class="">{{ @$user->card->brand }}</p>
                                            </li>
                                            <li class="d-flex justify-content-spacebw three_column">
                                                <h6 class="title-label">Expiry Date:</h6>
                                                <p class=""> {{ @$user->card->exp_month."/".@$user->card->exp_year }}</p>
                                                <a href="{{ route('customer.billing.edit') }}"
                                                    class="link-design-2">Edit</a>
                                            </li>
                                        </ul>
                                    </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Billing Info Section end -->

                </div>
            </div>
        </div>
    </section>
@endsection

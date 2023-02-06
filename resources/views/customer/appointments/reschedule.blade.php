@extends('layouts.app')

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
                                <a href="{{ route('index') }}"><img src="{{ asset('assets/images/logo/logo.svg') }}"></a>
                            </div>
                        </div>
                    </div>
                    @livewire('customer.appointment.reschedule')

                </div>
            </div>
        </div>
    </section>
@endsection

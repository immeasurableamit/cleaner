@extends('layouts.cleanerapp')

@section('content')




<section class="light-banner customer-account-page" style="background-image: url('assets/images/white-pattern.png')">
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
                            <a href="#"><img src="{{asset('assets/images/logo/logo.svg')}}"></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 no-padd cleaner_edit_bank_payment">

                    <div class="row no-mrg">
                        <div class="col-xl-10 col-lg-12 col-md-12 col-sm-12 no-padd">
                            <div class="customer-account-forms edit_form">
                                <div class="row new_payment_rown ">
                                    <div class="col-md-5 col-sm-12">
                                        <div class="form-headeing-second">
                                            <h4><img src="{{asset('assets/images/payout.svg')}}" class="me-3" />New payout location</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-sm-12">
                                        <div class="bank-account-details-btn d-flex justify-content-end">
                                            <button class="bank-account-btn">Bank Account</button>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-headeing-second">
                                    <h4>Billing Name and Address</h4>
                                </div>

                                <div class="biling_edit_form">

                                    @if(@$record->status == 0)

                                    @if(!$record->account_number)
                                    <p class="text-center pb-3">Please fill the bank account to complete your bank account verification.</p>
                                    @endif

                                    <form action="{{route('cleaner.billing.bankInfoStore')}}" method="POST">
                                        @csrf

                                        <div class="form-headeing-second pt-3">
                                            <h4 class="border-0 mb-0">Account Numbers</h4>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-grouph input-design mb-30">
                                                    <input type="text" placeholder="Account Holder Name" name="account_holder_name">
                                                    @error('account_holder_name')<div class="help-block">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-grouph input-design mb-30">
                                                <input type="text" placeholder="Account Number" name="account_number">
                                                @error('account_number')<div class="help-block">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-grouph input-design mb-30">
                                                <input type="text" placeholder="Routing Number" name="routing_number">
                                                @error('routing_number')<div class="help-block">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="text-center">

                                            <button class="btn_c" data-bs-toggle="modal" data-bs-target="#error-bank-details" type="submit">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            @else

                            <a href="{{route('cleaner.billing.connectAccount')}}" class="btn-design-first btn_bank"> Connect Bank Account</a>
                            @endif

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>


</section>


@endsection



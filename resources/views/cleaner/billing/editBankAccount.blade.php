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

                                        <form action="{{route('cleaner.billing.connectAccount')}}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-grouph input-design mb-30">
                                                        <input type="text" placeholder="First name" name="first_name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-grouph input-design mb-30">
                                                        <input type="text" placeholder="Last Name" name="last_name">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-grouph input-design mb-30">
                                                        <input type="text" placeholder="Address" name="address">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-grouph input-design mb-30">
                                                        <input type="text" placeholder="Apt # or Unit #" name="apt_or_unit">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-grouph mb-30 input-select-abs">
                                                        <div class="inputs-box">
                                                            <input type="text" placeholder="City" name="city">
                                                        </div>
                                                        <div class="selecti-box">
                                                            <select class="select-custom-design">
                                                                <option>State</option>
                                                                <option>State</option>
                                                                <option>State</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-grouph input-design mb-30">
                                                        <input type="text" placeholder="Zip" name="zip">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-headeing-second pt-3">
                                                <h4 class="border-0 mb-0">Account Numbers</h4>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-grouph input-design mb-30">
                                                        <input type="text" placeholder="Routing Number" name="routing_number">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-grouph input-design mb-30">
                                                        <input type="text" placeholder="Account Number" name="account_number">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row row_reverse">
                                                <div class="col-md-6 checking_saving_lebals_inputs">
                                                    <div class="label_input mb-3"> <input type="checkbox"><label>Checking</label></div>
                                                    <div class="label_input"> <input type="checkbox"><label>Savings</label></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-grouph input-design mb-30">
                                                        <input type="text" placeholder="Confirm Account Number" name="confirm_account">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <!-- <input type="submit" value= "ok"> -->
                                                <button class="btn_c" data-bs-toggle="modal" data-bs-target="#error-bank-details" type="submit">Save</button>
                                            </div>
                                        </form>
                                       

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
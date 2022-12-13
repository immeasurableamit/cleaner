@extends('layouts.app')

@section('content')

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
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 no-padd customer_edit_payment">
                        <form method="POST" action="{{ route('customer.billing.update') }}">
                            @csrf
                            <div class="row no-mrg">
                                <div class="col-xl-10 col-lg-12 col-md-12 col-sm-12 no-padd">
                                    <div class="customer-account-forms edit_form">
                                        <div class="row new_payment_rown ">
                                            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">
                                                <div class="forms-short-heading">
                                                    <h4><img src="/assets/images/credit-card.png" class="me-3" />New
                                                        payment method</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-headeing-second mt-4">
                                            <h4>Billing Name and Address</h4>
                                        </div>
                                        <div class="biling_edit_form">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-grouph input-design mb-30">
                                                        <input value="{{ old('first_name') }}" type="text" name="first_name" placeholder="First name">
                                                        @error ('first_name') <span class="text-danger"> {{ $message }} </span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-grouph input-design mb-30">
                                                        <input type="text" value="{{ old('last_name') }}" name="last_name" placeholder="Last Name">
                                                        @error ('last_name') <span class="text-danger"> {{ $message }} </span> @enderror

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-grouph input-design mb-30">
                                                        <input type="text" value="{{ old('address') }}" name="address" placeholder="Address">
                                                        @error ('address') <span class="text-danger"> {{ $message }} </span> @enderror
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-grouph input-design mb-30">
                                                        <input type="text" value="{{ old('apt_or_unit') }}" name="apt_or_unit"
                                                            placeholder="Apt # or Unit #">
                                                            @error ('apt_or_unit') <span class="text-danger"> {{ $message }} </span> @enderror

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-grouph mb-30 input-select-abs">
                                                        <div class="inputs-box">
                                                            <input type="text" value="{{ old('city') }}" name="city" placeholder="City">
                                                        </div>
                                                        <div class="selecti-box">
                                                            <select name="state_id" class="select-custom-design">
                                                                @foreach ($states as $state)
                                                                    <option value="{{ $state->id }}" {{ old('state_id') == $state->id ? 'selected' : '' }}> {{ $state->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    @error ('city') <span class="text-danger"> {{ $message }} </span> @enderror
                                                    @error ('state_id') <span class="text-danger"> {{ $message }} </span> @enderror

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-grouph input-design mb-30">
                                                        <input type="text" value="{{ old('zip') }}" name="zip" placeholder="Zip">
                                                    </div>
                                                    @error ('zip') <span class="text-danger"> {{ $message }} </span> @enderror
                                                </div>

                                            </div>
                                            <div class="card-details-sec show">
                                                <div class="form-headeing-second">
                                                    <h4 class="border-0 mb-0">Card details</h4>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-grouph mb-3 card_text_input">
                                                            <input type="text" name="card_number"
                                                                placeholder="Card number">
                                                            <input type="text" id="exp_month_year" name="exp_month_year" placeholder="MM/YY"
                                                                class="mm_input">
                                                            <input type="text" name="cvc" placeholder="CVC"
                                                                class="cvc">
                                                            <input type="hidden" id="exp_month" name="exp_month" />
                                                            <input type="hidden" id="exp_year" name="exp_year" />
                                                        </div>

                                                        @error ('card_number')  <span class="text-danger"> {{ $message }} </span> @enderror
                                                        @error ('exp_month')  <span class="text-danger"> {{ $message }} </span> @enderror
                                                        @error ('exp_year')  <span class="text-danger"> {{ $message }} </span> @enderror
                                                        @error ('stripe_verification')  <span class="text-danger"> {{ $message }} </span> @enderror

                    
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="submit-design text-end">
                                                <input class="yellow-btn-design width-230px" type="submit" value="Save">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            function addSlashes(element) {
                let ele = document.getElementById(element.id);
                ele = ele.value.split('/').join(''); // Remove slash (/) if mistakenly entered.

                if (ele.length < 5 && ele.length > 0) {
                    let finalVal = ele.match(/.{1,2}/g).join('/');
                    document.getElementById(element.id).value = finalVal;
                }
            }

            function expMonthYearStringFormatter() {
                var element = document.getElementById('exp_month_year');
                
                element.addEventListener('keyup', () => {
                    addSlashes(element);
                    var monthYear = document.getElementById('exp_month_year').value;
                    var month, year;
                    [month, year] = monthYear.split('/');

                    document.getElementById('exp_month').value = month;
                    document.getElementById('exp_year').value  = "20"+year;
                });
            }

            expMonthYearStringFormatter();
        </script>
    @endpush
@endsection

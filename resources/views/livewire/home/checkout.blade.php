<div>

    <!-- progressbar -->
    <ul id="progressbar">
        <li class="active">Service</li>
        <li class="{{ in_array($currentlyActiveStep, [2, 3]) ? 'active' : '' }}">Payment</li>
        <li class="{{ $currentlyActiveStep == 3 ? 'active' : '' }}">Success</li>
    </ul>
    <!-- fieldsets -->
    @if ($currentlyActiveStep == 1)

    <fieldset>
        <!-- 1 -->

        <div class="row no-mrg">
            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 no-padd">
                <div class="blue-bg-wrapper">
                    <div class="checkout_div">
                        <div>
                            <h4>Checkout</h4>
                            <p>Order risk free - You are protected by Canary Clean's<b> 100% Satisfaction Money
                                    Back Guarantee!</b> </p>
                        </div>
                    </div>
                    <div class="blue-logo-block text-center max-width-100">
                        <a href="index.html"><img src="/assets/images/logo/logo.svg" /></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 no-padd">
                <div class="something_amazing_div">
                    <h3 class="frst_h3">You’ve built something amazing!</h3>
                    <h3> Confirm These Details</h3>
                </div>
                <div class="built_text_div">

                    <div class="provider_service">
                        <div class="p_s_row two-column">
                            <h6 class="provider-service-label">Provider</h6>
                            <p class="provider-service-value text-capitalize">{{ $cleaner->name }}</p>
                        </div>
                        <!--    <div class="p_s_row two-column">
                    <h6 class="provider-service-label">Address for Cleaning</h6>
                    <p class="provider-service-value">12345 Canary Dr. #121, Austin, TX 78745</p>
                  </div> -->
                        <div class="p_s_row two-column">
                            <h6 class="provider-service-label">Start Date</h6>
                            <p class="provider-service-value">{{ $datetime }}</p>
                        </div>
                        <div class="p_s_row two-column">
                            <h6 class="provider-service-label">Est. Cleaning Duration</h6>
                            <p class="provider-service-value">{{ $estimatedDuration }} hrs</p>
                        </div>
                        <div class="p_s_row two-column">
                            <h6 class="provider-service-label">Frequency</h6>
                            <p class="provider-service-value">{{ $cleanerService->first()->service_title }}</p>
                        </div>
                    </div>
                    <div class="provider_service">
                        <div class="p_s_row three-column">
                            <h6 class="provider-service-label">Service</h6>
                            <p class="provider-service-value">{{ $cleanerService->first()->service_item_title }}
                            </p>
                            <p class="price">${{ $cleanerService->first()->rate }}</p>
                        </div>
                        <div class="p_s_row three-column">
                            <h6 class="provider-service-label">Home Size</h6>
                            <p class="provider-service-value">{{ $homeSize }} sq ft</p>
                            <p class="price"></p>
                        </div>
                    </div>

                    @if (isset($addOns))
                    <div class="provider_service add-ons-serives">

                        @foreach ($addOns as $addOn)
                        <div class="p_s_row three-column">
                            <h6 class="provider-service-label">{{ $loop->first ? 'Add-Ons' : '' }}</h6>
                            <p class="provider-service-value">{{ $addOn->service_item_title }}</p>
                            <p class="price">${{ $addOn->rate }}</p>
                        </div>
                        @endforeach
                    </div>
                    @endif
                    <div class="btn_nxt_prs">
                        <label for="back" class="btn_b " onclick="history.back()">Back</label>
                        <label for="next" class="btn_c">Next</label>
                    </div>
                </div>
            </div>
        </div>
        <input type="button" name="previous" class="d-none previous action-button" id="back" value="Previous" />
        <input type="button" name="next" class="d-none next action-button" id="next" value="Next" wire:click="next" />
    </fieldset>
    @elseif ($currentlyActiveStep == 2)
    <!--Login Modal -->
    <!-- Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
        <button type="button" class="close btn_close" onclick="$('#loginModal').modal('hide')" style="border: none; background: transparent;">
                        <i class="fa fa-times fa-xl" aria-hidden="true"></i>
                    </button>
            <div class="modal-content">
                <div class="modal-header border border-bottom-0">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    
                </div>
                <div class="modal-body">
                    <form class="form-grouph input-design mb-30" wire:submit.prevent="authenticateUser">
                        <div class="mb-3">
                            <input type="email" wire:model.defer="email" placeholder="Email" />
                            @error('email')
                            <span class='text-danger'> {{ $message }}
                                @enderror
                        </div>
                        <div class="mb-3">
                            <input type="password" wire:model.defer="password" placeholder="Password" />
                            @error('password')
                            <span class='text-danger'> {{ $message }}
                                @enderror
                        </div>
                    </form>
                </div>
                <div class="py-3 text-center">

                    <button type="button" wire:click="authenticateUser" class="btn_blue">Login</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Modal End -->
    <fieldset>
        <!-- 2 -->
        <div class="pay-method">
            <div class="row no-mrg">
                <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 no-padd">
                    <div class="blue-bg-wrapper checkout_bg">
                        <div class="checkout_div">
                            <div>
                                <h4>Checkout</h4>
                                <p>Order risk free - You are protected by Canary Clean's<b> 100% Satisfaction
                                        Money Back Guarantee!</b> </p>
                            </div>
                        </div>
                        <div class="blue-logo-block text-center max-width-100">
                            <a href="#"><img src="/assets/images/logo/logo.svg"></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 no-padd">
                    <div class="something_amazing_div pb-3">
                        <h3 class="frst_h3">Almost there! </h3>
                        <h3>Enter Payment Details </h3>
                        <div class="text-center link-design-2 pt-3 bold">You don't pay until cleaning day!</div>
                    </div>
                    <div class="built_text_div">
                        @if (is_null($user))
                        <div class="provider_service pb-5 border-bottom  text-center">

                            <div class="text-center link-design-2 pt-3 bold mb-3" onclick="$('#loginModal').modal('show')">
                                Already a customer ?
                            </div>

                            {{-- Remove payment method selection feature
                                    <div class="btn_right_cards text-center ">
                                        <div class="check-pay-mathoud">
                                            <input type="radio" name="payment_method" id="gpay" value="google_pay" wire:model="paymentMethod">
                                            <button><img src="/assets/images/icons/google.svg" />Pay</button>
                                        </div>
                                        <div class="check-pay-mathoud">
                                            <input type="radio" name="payment_method" id="applepay" value="apple_pay" wire:model="paymentMethod">
                                            <button><img src="/assets/images/icons/apple.svg">Pay</button>
                                        </div>
                                        <div class="check-pay-mathoud">
                                            <input type="radio" name="payment_method" wire:model="paymentMethod" id="credit-card" value="credit_card" checked>
                                            <button>Credit card</button>
                                        </div>
                                    </div>
                                    @error('paymentMethod') <div class="mt-3"><span class="text-danger">PaymentMethod Field is required</span></div> @enderror
                                    --}}
                        </div>
                        @endif

                        <div class="form-headeing-second">
                            <h4 class="border-0 m-0 pt-4">Billing Name and Address</h4>
                        </div>
                        <div class="biling_edit_form">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-grouph input-design mb-30">
                                        <input type="text" name="first_name" wire:model="firstname" placeholder="First name">
                                        @error('firstname')
                                        <span class="text-danger">{{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-grouph input-design mb-30">
                                        <input type="text" name="last_name" wire:model="lastname" placeholder="Last Name">
                                        @error('lastname')
                                        <span class="text-danger">{{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-grouph input-design mb-30">
                                        <input type="email" name="email" wire:model="email" placeholder="Email">
                                        @error('email')
                                        <span class="text-danger">{{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-grouph input-design mb-30">
                                        <input type="contact" name="contact" wire:model="contact" placeholder="Contact number">
                                        @error('contact')
                                        <span class="text-danger">{{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>

                                @if (is_null($user))
                                <div class="col-md-6">
                                    <div class="form-grouph input-design mb-30">
                                        <input type="password" name="password" wire:model="password" placeholder="Password">
                                        @error('password')
                                        <span class="text-danger">{{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-grouph input-design mb-30">
                                        <input type="password" wire:model="confirmPassword" name="confirmPassword" placeholder="Confirm Password">
                                        @error('confirmPassword')
                                        <span class="text-danger">{{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                @endif

                                <div class="col-md-6">
                                    <div class="form-grouph input-design mb-30">
                                        <input type="text" wire:model="address" name="address" placeholder="Address">
                                        @error('address')
                                        <span class="text-danger">{{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-grouph input-design mb-30">
                                        <input type="text" wire:model="aptOrUnit" name="apt_or_unit" placeholder="Apt # or Unit #">

                                        @error('aptOrUnit')
                                        <span class="text-danger">{{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-grouph mb-30 input-select-abs select_state">
                                        <div class="inputs-box">
                                            <input type="text" wire:model="city" name="city" placeholder="City">
                                        </div>
                                        <div class="selecti-box">
                                            <select id="state-selector" name="state" class="select-custom-design" id="state-selector">
                                                <option></option>
                                                @foreach ($states as $state)
                                                <option value="{{ $state->id }}" {{ $state->id == $stateId ? 'selected' : '' }}>
                                                    {{ $state->name }}
                                                </option>
                                                @endforeach

                                            </select>

                                        </div>
                                        @error('state')
                                        <span class="text-danger">{{ $message }} </span>
                                        @enderror
                                        @error('city')
                                        <div>
                                            <span class="text-danger">{{ $message }} </span>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-grouph input-design mb-30">
                                        <input type="text" wire:model="zip" name="zip" placeholder="Zip">
                                        @error('zip')
                                        <span class="text-danger">{{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @if ($paymentMethod == 'credit_card')
                            <div class="card-details-sec show">
                                <div class="form-headeing-second">
                                    <h4 class="border-0 mb-0">Card details</h4>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-grouph mb-3 card_text_input">
                                            <input type="text" name="formattedNumber" id="formattedNumber" placeholder="Card number">
                                            <input type="text" id="exp_month_year" name="exp_month_year" placeholder="MM/YY" class="mm_input">
                                            <input type="password" wire:model="cvc" name="cvc" placeholder="CVC" class="cvc">
                                        </div>
                                        @error('number')
                                        <div class="text-danger">{{ $message }} </div>
                                        @enderror
                                        @error('expMonth')
                                        <div class="text-danger">{{ $message }} </div>
                                        @enderror
                                        @error('expYear')
                                        <div class="text-danger">{{ $message }} </div>
                                        @enderror

                                        @error('cvc')
                                        <div class="text-danger">{{ $message }} </div>
                                        @enderror
                                        @error('stripe_card_verification')
                                        <div class="text-danger">{{ $message }} </div>
                                        @enderror

                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="sub-totel-text">
                            <div class="sub-totel-text-block">
                                <p class="label">Subtotal</p>
                                <p class="price">${{ $subtotal }}</p>
                            </div>
                            <div class="sub-totel-text-block">
                                <p class="label">Tax</p>
                                <p class="price">${{ $tax }}</p>

                            </div>
                            <div class="sub-totel-text-block">
                                <p class="label">Transaction Fees</p>
                                <p class="price">${{ $transactionFees }}( 2% static )</p>
                            </div>
                            <div class="sub-totel-text-block">
                                <p class="label"><strong>Total</strong></p>
                                <p class="price"><strong>${{ $total }}</strong></p>
                            </div>
                        </div>

                        <div class="btn_nxt_prs modal-footer">
                            <label for="back2" class="btn_b" wire:click="previous">Back</label>
                            <label for="next2" class="btn_c" id="schedules" wire:click="schedule">Schedule Now
                            </label>
                        </div>
                        <p class="privacy_link mb-5">By clicking “Schedule Now”, you agree with all Canary
                            Clean’s<a class="link-design-2"> terms and conditions</a> and <a class="link-design-2">privacy policy</a></p>
                    </div>
                </div>
            </div>
        </div>
        <input type="button" name="previous" class="d-none previous action-button" id="back2" value="Previous" />
        <input type="button" name="next" class="d-none next action-button" id="next2" value="Next" />
    </fieldset>
    @else
    <fieldset>
        <!-- 3 -->
        <div class="final-steps-sec">
            <div class="row no-mrg">
                <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 no-padd">
                    <div class="blue-bg-wrapper">
                        <div class="checkout_div">
                            <div>
                                <h4>Checkout</h4>
                                <p>Order risk free - You are protected by Canary Clean's<b> 100% Satisfaction
                                        Money Back Guarantee!</b> </p>
                            </div>
                        </div>
                        <div class="blue-logo-block text-center max-width-100">
                            <a href="#"><img src="/assets/images/logo/logo.svg"></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 no-padd">
                    <div class="something_amazing_div">
                        <h3><span style="color:var(--primary);">Congrats!</span> Your cleaning is scheduled!
                        </h3>
                    </div>
                    <div class="built_text_div">
                        <div class="schedule-bock-search-img">
                            <div class="three_imgs text-center pb-2">
                                <img src="/assets/images/3_step.png" class="img-fluid">
                            </div>
                        </div>
                        <div class="schedule-block-searccntnt">
                            <div class="schduled-text-div">
                                <p class="schedule_label">Provider</p>
                                <span class="schedule_value-text text-capitalize">{{ $cleaner->name }}</span>
                            </div>
                            <div class="schduled-text-div">
                                <p class="schedule_label">Services Address</p>
                                <span class="schedule_value-text">{{ $order->address }}</span>
                            </div>
                            <div class="schduled-text-div">
                                <p class="schedule_label">Service</p>
                                <span class="schedule_value-text">{{ $cleanerService->first()->servicesItems->first()->service->title }}</span>
                            </div>

                            @if ($addOns->isNotEmpty())
                            <div class="schduled-text-div">
                                <p class="schedule_label">Addons</p>
                                <span class="schedule_value-text">
                                    @foreach ($addOns as $addOn)
                                    {{ $addOn->servicesItems->first()->title }}
                                    @endforeach
                                </span>
                            </div>
                            @endif
                            <div class="schduled-text-div">
                                <p class="schedule_label">Start Date</p>

                                <span class="schedule_value-text">{{ $datetime }}</span>

                                <b class="link-design-2">
                                    Add to calendar
                                </b>
                            </div>
                            <div class="schduled-text-div">
                                <p class="schedule_label">Payment Method</p>
                                <span class="schedule_value-text text-capitalize">{{ str_replace('_', ' ', $order->payment_method) }}</span>
                            </div>

                        </div>
                        <div class="sub-totel-text">
                            <div class="sub-totel-text-block">
                                <p class="label">Subtotal</p>
                                <p class="price">${{ $order->subtotal }}</p>
                            </div>
                            <div class="sub-totel-text-block">
                                <p class="label">Tax</p>
                                <p class="price">${{ $order->tax }}</p>

                            </div>
                            <div class="sub-totel-text-block">
                                <p class="label">Transaction Fees</p>
                                <p class="price">${{ $order->transaction_fees }}</p>
                            </div>
                            <div class="sub-totel-text-block">
                                <p class="label"><strong>Total</strong></p>
                                <p class="price"><strong>${{ $order->total }}</strong></p>
                            </div>
                        </div>
                        <div class="third_textarea_div">
                            <textarea placeholder="Notes for cleaner (optional).." class="" wire:model="notes"></textarea>
                        </div>

                        <div class="btn_nxt_prs">
                            <label for="next3" class="btn_c" wire:click="saveOrderNotes"><a href="message.html">Send Notes</a></label>
                        </div>
                        <a href="#" class="link-design-2 d-block pb-3">Please inform your provider about
                            any future changes or cancellations as soon as possible. </a>
                        <div class="py-3 border-top cancel_order_div">
                            <p>Something Wrong? <span class="cancel-order_span"><a href="javascript::void(0)" wire:click="alertConfirm({{ $order->id }})">Cancel order
                                    </a> and start again.</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="button" name="previous" class="d-none previous action-button" id="back3" value="Previous" />
        <input type="button" name="next" class="d-none next action-button" id="next3" value="Next" />
    </fieldset>
    @endif

    <script>
        function initStateSelector() {
            $("#state-selector").select2({
                placeholder: 'State'
            });
            $("#state-selector").on('select2:select', function(e) {
                var data = e.params.data;
                @this.set('stateId', data.id);
            });
        }

        function addSlashes(element) {
            console.log('adding slashes');
            let ele = document.getElementById(element.id);

            ele = ele.value.split('/').join(''); // Remove slash (/) if mistakenly entered.

            if (ele.length < 5 && ele.length > 0) {
                let finalVal = ele.match(/.{1,2}/g).join('/');
                document.getElementById(element.id).value = finalVal;
            }
        }

        function expMonthYearStringFormatter() {
            var element = document.getElementById('exp_month_year');
            if (!element) {
                console.log('not exists');
                return '';
            }

            element.addEventListener('keyup', () => {
                addSlashes(element);
                var monthYear = document.getElementById('exp_month_year').value;
                var month, year;
                [month, year] = monthYear.split('/');

                @this.set('expMonthYear', monthYear);
                @this.set('expMonth', month);
                @this.set('expYear', "20" + year);
            });
        }

        window.addEventListener('load', function() {


            window.livewire.on('componentRendered', step => {
                expMonthYearStringFormatter();


                if (step == 2) {
                    initStateSelector();
                }

            });

        });

        $("#formattedNumber").keyup(function() {
            // debugger;
            var foo = $(this).val().replace(/\s+/g, "").replace(/[^0-9]/gi, ""); // remove non numeric
            foo = foo.split(" ").join(""); // remove spaces
            if (foo.length > 0) {
                foo = foo.match(new RegExp(".{1,4}", "g")).join(" ").slice(-30); // max 23 chars
            }
            $(this).val(foo);
            console.log(foo);
            // @this.set('number',foo);
            var number = foo.replace(/\s/g, ''); //to remove space from numbers
            @this.set('number', number);
            console.log(number);
        });

// loader on schedule button
        $("#schedules").on("click",function(){
            $(".modal-footer").append("<div><i class='fa fa-spinner fa-spin' style='font-size:24px'></i></div>");

  });

    </script>

</div>
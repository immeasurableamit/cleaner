<div>
    <form id="msform" class="step-form-design">
        <!-- progressbar -->
        <ul id="progressbar">
            <li class="active">Account Setup</li>
            <li>Social Profiles</li>
            <li>Personal Details</li>
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
                                <a href="index.html"><img src="assets/images/logo/logo.svg" /></a>
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
                                <label for="back" class="btn_b ">Back</label>
                                <label for="next" class="btn_c">Next</label>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="button" name="previous" class="d-none previous action-button" id="back"
                    value="Previous" />
                <input type="button" name="next" class="d-none next action-button" id="next" value="Next"
                    wire:click="next" />
            </fieldset>
        @elseif ($currentlyActiveStep == 2)

        <!--Login Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
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
                            <div class="blue-bg-wrapper">
                                <div class="checkout_div">
                                    <div>
                                        <h4>Checkout</h4>
                                        <p>Order risk free - You are protected by Canary Clean's<b> 100% Satisfaction
                                                Money Back Guarantee!</b> </p>
                                    </div>
                                </div>
                                <div class="blue-logo-block text-center max-width-100">
                                    <a href="#"><img src="assets/images/logo/logo.svg"></a>
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
                                <div class="provider_service">
                                <div class="text-center link-design-2 pt-3 bold mb-3" data-toggle="modal" data-target="#exampleModal">Already a customer ?</div>
                                    <div class="btn_right_cards text-center pb-5 border-bottom">
                                        <div class="check-pay-mathoud">
                                            <input type="radio" name="payment_method" id="gpay" value="google_pay" wire:model="paymentMethod"> 
                                            <button><img src="assets/images/icons/google.svg" />Pay</button>
                                        </div>
                                        <div class="check-pay-mathoud">
                                            <input type="radio" name="payment_method" id="applepay" value="apple_pay" wire:model="paymentMethod">
                                            <button><img src="assets/images/icons/apple.svg">Pay</button>
                                        </div>
                                        <div class="check-pay-mathoud">
                                            <input type="radio" name="payment_method" wire:model="paymentMethod" id="credit-card" value="credit_card" checked>
                                            <button>Credit card</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-headeing-second">
                                    <h4 class="border-0 m-0 pt-4">Billing Name and Address</h4>
                                </div>
                                <div class="biling_edit_form">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-grouph input-design mb-30">
                                                <input type="text" name="first_name" wire:model="firstname" placeholder="First name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-grouph input-design mb-30">
                                                <input type="text" name="last_name" wire:model="lastname" placeholder="Last Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-grouph input-design mb-30">
                                                <input type="email" name="email" wire:model="email" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-grouph input-design mb-30">
                                                <input type="password" name="password" wire:model="password" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-grouph input-design mb-30">
                                                <input type="confirm_password" wire:model="confirmPassword" name="confirm_password"
                                                    placeholder="Confirm Password">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-grouph input-design mb-30">
                                                <input type="text" wire:model="address" name="address" placeholder="Address">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-grouph input-design mb-30">
                                                <input type="text" wire:model="aptOrUnit" name="apt_or_unit"
                                                    placeholder="Apt # or Unit #">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-grouph mb-30 input-select-abs">
                                                <div class="inputs-box">
                                                    <input type="text" wire:model="city" name="city" placeholder="City">
                                                </div>
                                                <div class="selecti-box">
                                                    <select id="state-selector" name="state" class="select-custom-design"
                                                        id="state-selector">
                                                        <option></option>
                                                        @foreach ( $states as $state )
                                                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                                                        @endforeach
                    
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-grouph input-design mb-30">
                                                <input type="text" wire:model="zip" name="zip" placeholder="Zip">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-details-sec show">
                                        <div class="form-headeing-second">
                                            <h4 class="border-0 mb-0">Card details</h4>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-grouph mb-30 card_text_input">
                                                    <input type="text" placeholder="Card number">
                                                    <input type="text" placeholder="MM/YY" class="mm_input">
                                                    <input type="text" placeholder="CVC" class="cvc">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

                                <div class="btn_nxt_prs">
                                    <label for="back2" class="btn_b" wire:click="previous">Back</label>
                                    <label for="next2" class="btn_c" wire:click="schedule">Schedule Now</label>
                                </div>
                                <p class="privacy_link mb-5">By clicking “Schedule Now”, you agree with all Canary
                                    Clean’s<a class="link-design-2"> terms and conditions</a> and <a
                                        class="link-design-2">privacy policy</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="button" name="previous" class="d-none previous action-button" id="back2"
                    value="Previous" />
                <input type="button" name="next" class="d-none next action-button" id="next2"
                    value="Next" />
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
                                    <a href="#"><img src="assets/images/logo/logo.svg"></a>
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
                                        <img src="assets/images/3_step.png" class="img-fluid">
                                    </div>
                                </div>
                                <div class="schedule-block-searccntnt">
                                    <div class="schduled-text-div">
                                        <p class="schedule_label">Provider</p>
                                        <span class="schedule_value-text">Natasha L.’s Team</span>
                                    </div>
                                    <div class="schduled-text-div">
                                        <p class="schedule_label">Services Address</p>
                                        <span class="schedule_value-text">12125 Canary Dr. #212, Austin, TX
                                            78745</span>
                                    </div>
                                    <div class="schduled-text-div">
                                        <p class="schedule_label">Service</p>
                                        <span class="schedule_value-text">Recurring Clean - Routine Cleaning -
                                            Biweekly</span>
                                    </div>
                                    <div class="schduled-text-div">
                                        <p class="schedule_label">Addons</p>
                                        <span class="schedule_value-text">Disinfecting Service. Garage - 2 Car, Patio
                                            Sweep</span>
                                    </div>
                                    <div class="schduled-text-div">
                                        <p class="schedule_label">Start Date</p>
                                        <span class="schedule_value-text">Thursday, February 22, 2022 - 10:30am</span>
                                        <b class="link-design-2">Add to calendar</b>
                                    </div>
                                    <div class="schduled-text-div">
                                        <p class="schedule_label">Payment Method</p>
                                        <span class="schedule_value-text">Apple Pay</span>
                                    </div>

                                </div>
                                <div class="sub-totel-text">
                                    <div class="sub-totel-text-block">
                                        <p class="label">Subtotal</p>
                                        <p class="price">$100.00</p>
                                    </div>
                                    <div class="sub-totel-text-block">
                                        <p class="label">Tax</p>
                                        <p class="price">$8.25</p>

                                    </div>
                                    <div class="sub-totel-text-block">
                                        <p class="label">Transaction Fees</p>
                                        <p class="price">$5.00</p>
                                    </div>
                                    <div class="sub-totel-text-block">
                                        <p class="label"><strong>Totel</strong></p>
                                        <p class="price"><strong>$113.25</strong></p>
                                    </div>
                                </div>
                                <div class="third_textarea_div">
                                    <textarea placeholder="Notes for cleaner (optional).." class=""></textarea>
                                </div>

                                <div class="btn_nxt_prs">
                                    <!-- <label for="back3" class="btn_b ">Back</label> -->
                                    <label for="next3" class="btn_c"><a href="message.html">Send
                                            Notes</a></label>
                                </div>
                                <a href="#" class="link-design-2 d-block pb-3">Please inform your provider about
                                    any future changes or cancellations as soon as possible. </a>
                                <div class="py-3 border-top cancel_order_div">
                                    <p>Something Wrong? <span class="cancel-order_span"><a href="#">Cancel order
                                            </a> and start again.</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="button" name="previous" class="d-none previous action-button" id="back3"
                    value="Previous" />
                <input type="button" name="next" class="d-none next action-button" id="next3"
                    value="Next" />
            </fieldset>
        @endif
    </form>

  

    <script>
        window.addEventListener('load', function() {

            window.livewire.on('componentRendered', step => {
                
                $("#state-selector").select2({placeholder: 'State'});
            });
            
        });

    </script>

</div>

@extends('layouts.app')
@section('content')

<!-- Checkout Page -->
<section class="light-banner build-checkout-page" style="background-image: url('assets/images/white-pattern.png')">
      <div class="container">
<!-- multistep form -->
<form id="msform" class="step-form-design">
    <!-- progressbar -->
    <ul id="progressbar">
      <li class="active">Account Setup</li>
      <li>Social Profiles</li>
      <li>Personal Details</li>
    </ul>
    <!-- fieldsets -->
    <fieldset>
     <!-- 1 -->
    
        <div class="row no-mrg">
          <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 no-padd">
             <div class="blue-bg-wrapper">
               <div class="checkout_div">
                 <div>
                    <h4>Checkout</h4>
                    <p>Order risk free - You are protected by Canary Clean's<b> 100% Satisfaction Money Back Guarantee!</b>   </p>
                 </div>
               </div>
                <div class="blue-logo-block text-center max-width-100">
                  <a href="index.html"><img src="assets/images/logo/logo.svg"></a>
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
                 <div class="p_s_row two-column">
                    <h6 class="provider-service-label">Address for Cleaning</h6>
                    <p class="provider-service-value"><b>static<b></p>
                  </div>
                  <div class="p_s_row two-column">
                    <h6 class="provider-service-label">Start Date </h6>
                    <p class="provider-service-value">{{ $datetime }}</p>
                  </div>
                  <div class="p_s_row two-column">
                    <h6 class="provider-service-label">Est. Cleaning Duration</h6>
                    <p class="provider-service-value">2.5 hrs <b>( static )</b></p>
                  </div>
                  <div class="p_s_row two-column">
                    <h6 class="provider-service-label">Frequency</h6>
                    <p class="provider-service-value">Recurring - Biweekly <b>( static )</b></p>
                  </div>
               </div>
               <div class="provider_service">
                <div class="p_s_row three-column">
                  <h6 class="provider-service-label">Service</h6>
                  <p class="provider-service-value text-capitalize">{{ $serviceItem->title }}</p>
                  <p class="price">${{ $serviceItem->price }}</p>
                </div>
                <div class="p_s_row three-column">
                    <h6 class="provider-service-label">Home Size</h6>
                    <p class="provider-service-value">{{ $homeSize }} sq. ft.</p>
                    <p class="price"></p>
                </div>
              </div>
              <div class="provider_service add-ons-serives">

              @if ( ! is_null( $addOn ) )
                <div class="p_s_row three-column">
                  <h6 class="provider-service-label">Add-Ons</h6>
                  <p class="provider-service-value text-capitalize">{{ $addOn->title }}</p>
                  <p class="price">${{ $addOn->price }}</p>
                </div>
              @endif
               
              </div>
              <div class="btn_nxt_prs">
                 <label for="back" class="btn_b ">Back</label>
                <label for="next" class="btn_c">Next</label>
              </div>
            </div>
          </div>
         </div>
         <input type="button" name="previous" class="d-none previous action-button" id="back" value="Previous">
         <input type="button" name="next" class="d-none next action-button" id="next" value="Next">
    </fieldset>
    <fieldset>
        <!-- 2 -->
        <div class="pay-method">
        <div class="row no-mrg">
            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 no-padd">
               <div class="blue-bg-wrapper">
                 <div class="checkout_div">
                   <div>
                      <h4>Checkout</h4>
                      <p>Order risk free - You are protected by Canary Clean's<b> 100% Satisfaction Money Back Guarantee!</b>   </p>
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
                    <div class="btn_right_cards text-center pb-5 border-bottom">
                      <div class="check-pay-mathoud">
                        <input type="radio" name="pay-methoud" id="gpay">
                        <button><img src="assets/images/icons/google.svg">Pay</button>
                      </div>
                      <div class="check-pay-mathoud">
                        <input type="radio" name="pay-methoud" id="applepay">
                        <button><img src="assets/images/icons/apple.svg">Pay</button>
                      </div>
                      <div class="check-pay-mathoud">
                        <input type="radio" name="pay-methoud" id="credit-card" checked="">
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
                          <input type="text" placeholder="First name">
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-grouph input-design mb-30">
                              <input type="text" placeholder="Last Name">
                            </div>
                          </div>
                    </div>
  
                    <div class="row">
                      <div class="col-md-6">
                      <div class="form-grouph input-design mb-30">
                          <input type="text" placeholder="Address">
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-grouph input-design mb-30">
                              <input type="text" placeholder="Apt # or Unit #">
                            </div>
                          </div>
                    </div>
                    
                     <div class="row">
                      <div class="col-md-6">
                          <div class="form-grouph mb-30 input-select-abs">
                              <div class="inputs-box">
                              <input type="text" placeholder="City">
                              </div>
                              <div class="selecti-box">
                              <select class="select-custom-design select2-hidden-accessible" data-select2-id="select2-data-7-h0yb" tabindex="-1" aria-hidden="true">
                                <option data-select2-id="select2-data-9-dk4c">State</option>
                                <option>State</option>
                                <option>State</option>
                              </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-8-mbcs" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-j3jo-container" aria-controls="select2-j3jo-container"><span class="select2-selection__rendered" id="select2-j3jo-container" role="textbox" aria-readonly="true" title="State">State</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                              </div>
                            </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-grouph input-design mb-30">
                              <input type="text" placeholder="Zip">
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
  
                <div class="btn_nxt_prs">
                   <label for="back2" class="btn_b ">Back</label>
                  <label for="next2" class="btn_c">Schedule Now</label>
                </div>
                <p class="privacy_link mb-5">By clicking “Schedule Now”, you agree with all Canary Clean’s<a class="link-design-2"> terms and conditions</a> and <a class="link-design-2">privacy policy</a></p>
              </div>
            </div>
        </div>
        </div>
        <input type="button" name="previous" class="d-none previous action-button" id="back2" value="Previous">
        <input type="button" name="next" class="d-none next action-button" id="next2" value="Next">
    </fieldset>
    <fieldset>
      <!-- 3 -->
      <div class="final-steps-sec">
      <div class="row no-mrg">
        <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 no-padd">
           <div class="blue-bg-wrapper">
             <div class="checkout_div">
               <div>
                  <h4>Checkout</h4>
                  <p>Order risk free - You are protected by Canary Clean's<b> 100% Satisfaction Money Back Guarantee!</b>   </p>
               </div>
             </div>
              <div class="blue-logo-block text-center max-width-100">
                <a href="#"><img src="assets/images/logo/logo.svg"></a>
              </div>
           </div>
        </div>
        <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 no-padd">
          <div class="something_amazing_div">
              <h3><span style="color:var(--primary);">Congrats!</span> Your cleaning is scheduled!</h3>
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
                <span class="schedule_value-text">12125 Canary Dr. #212, Austin, TX 78745</span>
              </div>
              <div class="schduled-text-div">
                <p class="schedule_label">Service</p>
                <span class="schedule_value-text">Recurring Clean - Routine Cleaning - Biweekly</span>
              </div>
              <div class="schduled-text-div">
                <p class="schedule_label">Addons</p>
                <span class="schedule_value-text">Disinfecting Service. Garage - 2 Car, Patio Sweep</span>
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
              <label for="next3" class="btn_c"><a href="message.html">Send Notes</a></label>
            </div>
            <a href="#" class="link-design-2 d-block pb-3">Please inform your provider about any future changes or cancellations as soon as possible. </a>
         <div class="py-3 border-top cancel_order_div">
             <p>Something Wrong? <span class="cancel-order_span"><a href="#">Cancel order </a> and start again.</span></p>
         </div>
        </div>
        </div>
       </div>
       </div>
      <input type="button" name="previous" class="d-none previous action-button" id="back3" value="Previous">
      <input type="button" name="next" class="d-none next action-button" id="next3" value="Next">
    </fieldset>
  </form>
      </div>
    </section>
<!-- Checkout Page End -->

@section ('script')
<script>
    
//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({
        'transform': 'scale('+scale+')'
      });
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 0, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'fadeOut'
	});
});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 100, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'fadeOut'
	});
});

$(".submit").click(function(){
	return false;
})

</script>
<script>
  $(document).ready(function(){
  $('#credit-card').change(function(){
    if($(this).is(":checked")) {
        $('.card-details-sec').addClass("show");
    } else {
        $('.card-details-sec').removeClass("show");
    }
});
$('input#gpay,input#applepay').change(function(){
    if($(this).is(":checked")) {
        $('.card-details-sec').removeClass("show");
    } 
});
});
  </script>
  @endsection
@endsection
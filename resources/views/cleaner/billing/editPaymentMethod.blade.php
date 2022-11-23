@extends('layouts.cleanerapp')

@section('content')

<section class="light-banner customer-account-page"
      style="background-image: url('assets/images/white-pattern.png')">
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
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 no-padd customer_edit_payment">
              <form>
              <div class="row no-mrg">
               <div class="col-xl-10 col-lg-12 col-md-12 col-sm-12 no-padd">
               <div class="customer-account-forms edit_form">
                <div class="row new_payment_rown ">
                  <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">
                    <div class="forms-short-heading">
                      <h4><img src="{{asset('assets/images/credit-card.png')}}" class="me-3"/>New payment method</h4>
                    </div>
                  </div>
                  <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12">
                    <!-- <div class="btn_right_cards text-center">
                      <div class="check-pay-mathoud">
                        <input type="radio" name="pay-methoud" id="gpay">
                        <button><img src="assets/images/icons/google.svg"/>Pay</button>
                      </div>
                      <div class="check-pay-mathoud">
                        <input type="radio" name="pay-methoud" id="applepay">
                        <button><img src="assets/images/icons/apple.svg">Pay</button>
                      </div>
                      <div class="check-pay-mathoud">
                        <input type="radio" name="pay-methoud" id="credit-card" checked>
                        <button>Credit card</button>
                      </div>
                     </div> -->
                     <div class="bank-account-details-btn d-flex justify-content-end">
                      <button class="bank-account-btn">Credit card</button>
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
                    <div class="submit-design text-end">
                      <button class="btn_c" data-bs-toggle="modal" data-bs-target="#error-bank-details" type="button">Save</button>
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
@endsection
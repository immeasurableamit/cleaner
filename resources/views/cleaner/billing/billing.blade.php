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
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 no-padd">
              <div class="row no-mrg">
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 no-padd ">

                    <div class="customer-account-forms biling_form">
                       <div class="form-headeing-second">
                         <h4>Billing information</h4>
                       </div>
         
                       <div class="customer-account-information">
                         <ul class="list-unstyled">
                          <!-- <li class="d-flex justify-content-spacebw two_column">
                           <h6 class="title-label"> Next invoice:</h6>
                           <p class="">February 22, 2022</p>
                        </li>
                        <li class="d-flex justify-content-spacebw three_column">
                         <h6 class="title-label">Est. Invoice Amount</h6>
                         <p>$113.25</p>
                         <a href="#" class="link-design-2">View</a>
                      </li> -->
                      <li class="d-flex justify-content-spacebw two_column">
                        <h6 class="title-label">View past invoices</h6>
                        <a href="#" class="link-design-2">View</a>
                     </li>
                         </ul>
                       </div>
                          
                       <div class="form-headeing-second payment_heading pt-3">
                        <h4><img src="{{asset('assets/images/payout.svg')}}" class="me-3"/>Payout location</h4>
                      </div>
                      <div class="customer-account-information">
                        <ul class="list-unstyled">
                          <li class="d-flex justify-content-spacebw two_column">
                             <h6 class="title-label">Account Number:</h6>
                             <p class="">******9914</p>
                          </li>
                          <li class="d-flex justify-content-spacebw two_column">
                            <h6 class="title-label">Account Type:</h6>
                            <p class="">Checking</p>
                         </li>
                         <li class="d-flex justify-content-spacebw three_column">
                          <h6 class="title-label">Bank Name:</h6>
                          <p class=""> Chase Bank</p>
                          <a href="{{route('cleaner.billing.editBankAccount')}}" class="link-design-2">Edit</a>
                       </li>
                        </ul>
                      </div>

                       <div class="form-headeing-second payment_heading pt-3">
                         <h4><img src="{{asset('assets/images/credit-card.png')}}" class="me-3"/>Payment method</h4>
                       </div>
                      
                       <div class="customer-account-information">
                         <ul class="list-unstyled">
                           <li class="d-flex justify-content-spacebw two_column">
                              <h6 class="title-label">Card Number:</h6>
                              <p class="">*****2548</p>
                           </li>
                           <li class="d-flex justify-content-spacebw two_column">
                             <h6 class="title-label">  Card Type:</h6>
                             <p class="">Visa</p>
                          </li>
                          <li class="d-flex justify-content-spacebw three_column">
                           <h6 class="title-label">Expiry Date:</h6>
                           <p class=""> 05/23</p>
                           <a href="{{route('cleaner.billing.editPaymentMethod')}}" class="link-design-2">Edit</a>
                        </li>
                         </ul>
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
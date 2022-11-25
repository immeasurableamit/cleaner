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
                  <a href="#"><img src="assets/images/logo/logo.svg"></a>
                </div>
             </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 no-padd">
              <div class="row no-mrg">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 no-padd cleaner_appoitments_section">
                  <div class="customer-account-forms myjob-main-sec">
                    <div class="jobs-section-layout"> 
                      <!-- Nav tabs -->
                      <div class="jobs-tab-header">
                      <div class="row">
                      <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                      <ul class="nav nav-tabs">
                        <li class="nav-item">
                          <a class="nav-link active" data-bs-toggle="tab" href="#My-Jobs">My Jobs <svg width="30" height="30" viewBox="0 0 43 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.8135 7.09497L9.40598 11.5065L7.68598 9.7865L5.75098 11.7175L8.43848 14.405L9.40598 15.3268L10.3735 14.4036L15.7485 9.02863L13.8135 7.09363V7.09497ZM20.156 9.40622V12.0937H37.6247V9.40622H20.156ZM13.8135 17.845L9.40598 22.2578L7.68598 20.5325L5.75098 22.4675L8.43848 25.155L9.40598 26.0768L10.3735 25.1536L15.7485 19.7786L13.8135 17.8436V17.845ZM20.156 20.1562V22.8437H37.6247V20.1562H20.156ZM13.8135 28.595L9.40598 33.0065L7.68598 31.2865L5.75098 33.2175L8.43848 35.905L9.40598 36.8268L10.3735 35.9036L15.7485 30.5286L13.8135 28.5936V28.595ZM20.156 30.9062V33.5937H37.6247V30.9062H20.156Z" fill="#37A9FB"/>
                            </svg>
                            </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-bs-toggle="tab" href="#New-Requests">New Requests</a>
                        </li>
                      </ul>
                      </div>
                      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                        <div class="time-zone-text">
                          @if ($timezone)
                          <a href="cleaner-account.html">{{$timezone->name}}{{$timezone->current_utc_offset}}{{$timezone->is_currently_dst}}</a>
                          @else
                          <a href="cleaner-account.html">Time Zone:</a>  
                          @endif
                          
                        </div>
                      </div>
                      </div>
                      </div>
                      <!-- Tab panes -->
                      <div class="scheduling-calender-design clender-design">
                        <div id='calendar'></div>
                      </div>
                      <div class="tab-content">
                        <div class="tab-pane active" id="My-Jobs">
                          <div class="date_section">
                            <div class="form-headeing-second">
                              <h4 class="text-center">Select Date Above</h4>
                            </div>
                            <div class="date_show_v">
                             <button>  Date </button>
                             <span>01/02/2022</span>
                            </div>
            
                            <div class="card_service_row appoitments-alternative-row row">
                              <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-2">
                                <div class="select-date-toggles header-main-cntnt-differ">
                                    <button class="service_toggle_s"></button>
                                    <div class="service-main-service-column">   
                                    <div class="card-layout-showcase">
                                      <div class="job-first-details four-column">
                                        <p class="job-d-info blue">Deep clean</p>
                                        <p class="job-d-info">6:00 am</p>
                                        <p class="job-d-info">1:00 hrs</p>
                                        <p class="job-d-info">$130</p>
                                      </div>
                                      <div class="job-first-details two-column">
                                        <p class="job-d-info">Brooklyn Simmons</p>
                                        <p class="job-d-info address">22559 Bear Dr., Applev...</p>
                                      </div>
                                      <div class="response-msg">
                                        <a href="#" class="sucess-msg crd-btn">SUCCESS</a>
                                      </div>
                                    </div>
                                    <div class="altrntive_rw">
                                      <p class="appointment_label">Job</p>
                                      <p class="app-value blue"><strong>Deep clean</strong></p>
                                    </div>   
                                    <div class="altrntive_rw">
                                      <p class="appointment_label">Time</p>
                                      <p class="app-value">5:00 pm</p>
                                    </div>
                                    <div class="altrntive_rw">
                                        <p class="appointment_label">Est Duration</p>
                                          <p class="app-value">1:00 hrs</p>
                                       </div>  
                                       <div class="altrntive_rw">
                                        <p class="appointment_label">Customer</p>
                                          <p class="app-value">Brooklyn S.</p>
                                           <a href="#" class="btn_b" type="button" id="dropdownMenu2"
                                           data-bs-toggle="dropdown" aria-expanded="false">Contact </a>
                                         <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                           <li class="c_text">Contact information</li>
                                           <li><a href="tel:512-558-5876" class="link-design-2 mt-3"><img
                                                 src="assets/images/icons/phone.svg">512-558-5876</a></li>
                                           <li><a href="mailto:example@mail.com" class="link-design-2"><img
                                                 src="assets/images/icons/email.svg">example@mail.com</a></li>
                                           <li><a href="#" class="link-design-2"><img src="assets/images/icons/home.svg">15648
                                               Maple St, Austin, TX 78744</a></li>
                                           <li class="chat_with_member"><a href="message.html" class="btn_chat_member">Chat With
                                               Member<img src="assets/images/icons/email-2.svg" /></a></li>
                                         </ul>
                                       </div>   
                                       <div class="altrntive_rw">
                                        <p class="appointment_label blue">Location</p>
                                          <p class="app-value location blue">22559 Bear Dr., Applev...</p>
                                       </div>  
                                       <div class="altrntive_rw">
                                        <p class="appointment_label">Price</p>
                                          <p class="app-value">$130</p>
                                       </div> 
                                       <div class="altrntive_rw">
                                        <p class="appointment_label">Change</p>
                                           <a class="btn_q">Edit Job</a>
                                           <a class="btn_x">Cancel Job</a>
                                       </div>  
                                       </div>
                                       <div class="collect-payment-btn">
                                        <a href="#" class="sucess-msg crd-btn">SUCCESS</a>
                                       </div>        
                                </div>
            
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-2">
                              <div class="select-date-toggles header-main-cntnt-differ">
                                  <button class="service_toggle_s"></button>
                                  <div class="service-main-service-column">   
                                  <div class="card-layout-showcase">
                                    <div class="job-first-details four-column">
                                      <p class="job-d-info blue">Deep clean</p>
                                      <p class="job-d-info">6:00 am</p>
                                      <p class="job-d-info">1:00 hrs</p>
                                      <p class="job-d-info">$130</p>
                                    </div>
                                    <div class="job-first-details two-column">
                                      <p class="job-d-info">Brooklyn Simmons</p>
                                      <p class="job-d-info address">22559 Bear Dr., Applev...</p>
                                    </div>
                                    <div class="response-msg">
                                      <a href="#" class="failed-msg crd-btn">FAILED - Customer Notified - Try Again in 5-10 Mins</a>
                                    </div>
                                  </div>
                                  <div class="altrntive_rw">
                                    <p class="appointment_label">Job</p>
                                    <p class="app-value blue"><strong>Deep clean</strong></p>
                                  </div>   
                                  <div class="altrntive_rw">
                                    <p class="appointment_label">Time</p>
                                    <p class="app-value">5:00 pm</p>
                                  </div>
                                  <div class="altrntive_rw">
                                      <p class="appointment_label">Est Duration</p>
                                        <p class="app-value">1:00 hrs</p>
                                     </div>  
                                     <div class="altrntive_rw">
                                      <p class="appointment_label">Customer</p>
                                        <p class="app-value">Brooklyn S.</p>
                                         <a href="#" class="btn_b" type="button" id="dropdownMenu2"
                                         data-bs-toggle="dropdown" aria-expanded="false">Contact </a>
                                       <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                         <li class="c_text">Contact information</li>
                                         <li><a href="tel:512-558-5876" class="link-design-2 mt-3"><img
                                               src="assets/images/icons/phone.svg">512-558-5876</a></li>
                                         <li><a href="mailto:example@mail.com" class="link-design-2"><img
                                               src="assets/images/icons/email.svg">example@mail.com</a></li>
                                         <li><a href="#" class="link-design-2"><img src="assets/images/icons/home.svg">15648
                                             Maple St, Austin, TX 78744</a></li>
                                         <li class="chat_with_member"><a href="message.html" class="btn_chat_member">Chat With
                                             Member<img src="assets/images/icons/email-2.svg" /></a></li>
                                       </ul>
                                     </div>   
                                     <div class="altrntive_rw">
                                      <p class="appointment_label blue">Location</p>
                                        <p class="app-value location blue">22559 Bear Dr., Applev...</p>
                                     </div>  
                                     <div class="altrntive_rw">
                                      <p class="appointment_label">Price</p>
                                        <p class="app-value">$130</p>
                                     </div> 
                                     <div class="altrntive_rw">
                                      <p class="appointment_label">Change</p>
                                         <a class="btn_q">Edit Job</a>
                                         <a class="btn_x">Cancel Job</a>
                                     </div>  
                                     </div>
                                     <div class="collect-payment">
                                      <a href="#" class="failed-msg crd-btn">FAILED - Customer Notified - Try Again in 5-10 Mins</a>
                                     </div>        
                              </div>
          
                          </div>
                          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-2">
                            <div class="select-date-toggles header-main-cntnt-differ">
                                <button class="service_toggle_s"></button>
                                <div class="service-main-service-column">   
                                <div class="card-layout-showcase">
                                  <div class="job-first-details four-column">
                                    <p class="job-d-info blue">Deep clean</p>
                                    <p class="job-d-info">6:00 am</p>
                                    <p class="job-d-info">1:00 hrs</p>
                                    <p class="job-d-info">$130</p>
                                  </div>
                                  <div class="job-first-details two-column">
                                    <p class="job-d-info">Brooklyn Simmons</p>
                                    <p class="job-d-info address">22559 Bear Dr., Applev...</p>
                                  </div>
                                  <div class="response-msg">
                                    <a href="#" class="collect_payment crd-btn">Collect Payment</a>
                                  </div>
                                </div>
                                <div class="altrntive_rw">
                                  <p class="appointment_label">Job</p>
                                  <p class="app-value blue"><strong>Deep clean</strong></p>
                                </div>   
                                <div class="altrntive_rw">
                                  <p class="appointment_label">Time</p>
                                  <p class="app-value">5:00 pm</p>
                                </div>
                                <div class="altrntive_rw">
                                    <p class="appointment_label">Est Duration</p>
                                      <p class="app-value">1:00 hrs</p>
                                   </div>  
                                   <div class="altrntive_rw">
                                    <p class="appointment_label">Customer</p>
                                      <p class="app-value">Brooklyn S.</p>
                                       <a href="#" class="btn_b" type="button" id="dropdownMenu2"
                                       data-bs-toggle="dropdown" aria-expanded="false">Contact </a>
                                     <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                       <li class="c_text">Contact information</li>
                                       <li><a href="tel:512-558-5876" class="link-design-2 mt-3"><img
                                             src="assets/images/icons/phone.svg">512-558-5876</a></li>
                                       <li><a href="mailto:example@mail.com" class="link-design-2"><img
                                             src="assets/images/icons/email.svg">example@mail.com</a></li>
                                       <li><a href="#" class="link-design-2"><img src="assets/images/icons/home.svg">15648
                                           Maple St, Austin, TX 78744</a></li>
                                       <li class="chat_with_member"><a href="message.html" class="btn_chat_member">Chat With
                                           Member<img src="assets/images/icons/email-2.svg" /></a></li>
                                     </ul>
                                   </div>   
                                   <div class="altrntive_rw">
                                    <p class="appointment_label blue">Location</p>
                                      <p class="app-value location blue">22559 Bear Dr., Applev...</p>
                                   </div>  
                                   <div class="altrntive_rw">
                                    <p class="appointment_label">Price</p>
                                      <p class="app-value">$130</p>
                                   </div> 
                                   <div class="altrntive_rw">
                                    <p class="appointment_label">Change</p>
                                       <a class="btn_q">Edit Job</a>
                                       <a class="btn_x">Cancel Job</a>
                                   </div>  
                                   </div>
                                   <div class="collect-payment">
                                    <a href="#" class="collect_payment crd-btn">Collect Payment</a>
                                   </div>        
                            </div>
        
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-2">
                          <div class="select-date-toggles header-main-cntnt-differ">
                              <button class="service_toggle_s"></button>
                              <div class="service-main-service-column">   
                              <div class="card-layout-showcase">
                                <div class="job-first-details four-column">
                                  <p class="job-d-info blue">Deep clean</p>
                                  <p class="job-d-info">6:00 am</p>
                                  <p class="job-d-info">1:00 hrs</p>
                                  <p class="job-d-info">$130</p>
                                </div>
                                <div class="job-first-details two-column">
                                  <p class="job-d-info">Brooklyn Simmons</p>
                                  <p class="job-d-info address">22559 Bear Dr., Applev...</p>
                                </div>
                                <div class="response-msg">
                                  <a href="#" class="collect_payment crd-btn">Collect Payment</a>
                                </div>
                              </div>
                              <div class="altrntive_rw">
                                <p class="appointment_label">Job</p>
                                <p class="app-value blue"><strong>Deep clean</strong></p>
                              </div>   
                              <div class="altrntive_rw">
                                <p class="appointment_label">Time</p>
                                <p class="app-value">5:00 pm</p>
                              </div>
                              <div class="altrntive_rw">
                                  <p class="appointment_label">Est Duration</p>
                                    <p class="app-value">1:00 hrs</p>
                                 </div>  
                                 <div class="altrntive_rw">
                                  <p class="appointment_label">Customer</p>
                                    <p class="app-value">Brooklyn S.</p>
                                     <a href="#" class="btn_b" type="button" id="dropdownMenu2"
                                     data-bs-toggle="dropdown" aria-expanded="false">Contact </a>
                                   <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                     <li class="c_text">Contact information</li>
                                     <li><a href="tel:512-558-5876" class="link-design-2 mt-3"><img
                                           src="assets/images/icons/phone.svg">512-558-5876</a></li>
                                     <li><a href="mailto:example@mail.com" class="link-design-2"><img
                                           src="assets/images/icons/email.svg">example@mail.com</a></li>
                                     <li><a href="#" class="link-design-2"><img src="assets/images/icons/home.svg">15648
                                         Maple St, Austin, TX 78744</a></li>
                                     <li class="chat_with_member"><a href="message.html" class="btn_chat_member">Chat With
                                         Member<img src="assets/images/icons/email-2.svg" /></a></li>
                                   </ul>
                                 </div>   
                                 <div class="altrntive_rw">
                                  <p class="appointment_label blue">Location</p>
                                    <p class="app-value location blue">22559 Bear Dr., Applev...</p>
                                 </div>  
                                 <div class="altrntive_rw">
                                  <p class="appointment_label">Price</p>
                                    <p class="app-value">$130</p>
                                 </div> 
                                 <div class="altrntive_rw">
                                  <p class="appointment_label">Change</p>
                                     <a class="btn_q">Edit Job</a>
                                     <a class="btn_x">Cancel Job</a>
                                 </div>  
                                 </div>
                                 <div class="collect-payment">
                                  <a href="#" class="collect_payment crd-btn">Collect Payment</a>
                                 </div>        
                          </div>
      
                      </div>
                          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-2">
                            <div class="select-date-toggles header-main-cntnt-differ">
                                <button class="service_toggle_s"></button>
                                <div class="service-main-service-column">   
                                <div class="card-layout-showcase">
                                  <div class="job-first-details four-column">
                                    <p class="job-d-info blue">Deep clean</p>
                                    <p class="job-d-info">6:00 am</p>
                                    <p class="job-d-info">1:00 hrs</p>
                                    <p class="job-d-info">$130</p>
                                  </div>
                                  <div class="job-first-details two-column">
                                    <p class="job-d-info">Brooklyn Simmons</p>
                                    <p class="job-d-info address">22559 Bear Dr., Applev...</p>
                                  </div>
                                  <div class="response-msg">
                                    <a href="#" class="collect_payment crd-btn">Collect Payment</a>
                                  </div>
                                </div>
                                <div class="altrntive_rw">
                                  <p class="appointment_label">Job</p>
                                  <p class="app-value blue"><strong>Deep clean</strong></p>
                                </div>   
                                <div class="altrntive_rw">
                                  <p class="appointment_label">Time</p>
                                  <p class="app-value">5:00 pm</p>
                                </div>
                                <div class="altrntive_rw">
                                    <p class="appointment_label">Est Duration</p>
                                      <p class="app-value">1:00 hrs</p>
                                   </div>  
                                   <div class="altrntive_rw">
                                    <p class="appointment_label">Customer</p>
                                      <p class="app-value">Brooklyn S.</p>
                                       <a href="#" class="btn_b" type="button" id="dropdownMenu2"
                                       data-bs-toggle="dropdown" aria-expanded="false">Contact </a>
                                     <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                       <li class="c_text">Contact information</li>
                                       <li><a href="tel:512-558-5876" class="link-design-2 mt-3"><img
                                             src="assets/images/icons/phone.svg">512-558-5876</a></li>
                                       <li><a href="mailto:example@mail.com" class="link-design-2"><img
                                             src="assets/images/icons/email.svg">example@mail.com</a></li>
                                       <li><a href="#" class="link-design-2"><img src="assets/images/icons/home.svg">15648
                                           Maple St, Austin, TX 78744</a></li>
                                       <li class="chat_with_member"><a href="message.html" class="btn_chat_member">Chat With
                                           Member<img src="assets/images/icons/email-2.svg" /></a></li>
                                     </ul>
                                   </div>   
                                   <div class="altrntive_rw">
                                    <p class="appointment_label blue">Location</p>
                                      <p class="app-value location blue">22559 Bear Dr., Applev...</p>
                                   </div>  
                                   <div class="altrntive_rw">
                                    <p class="appointment_label">Price</p>
                                      <p class="app-value">$130</p>
                                   </div> 
                                   <div class="altrntive_rw">
                                    <p class="appointment_label">Change</p>
                                       <a class="btn_q">Edit Job</a>
                                       <a class="btn_x">Cancel Job</a>
                                   </div>  
                                   </div>
                                   <div class="collect-payment">
                                    <a href="#" class="collect_payment crd-btn">Collect Payment</a>
                                   </div>        
                            </div>
        
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-2">
                          <div class="select-date-toggles header-main-cntnt-differ">
                              <button class="service_toggle_s"></button>
                              <div class="service-main-service-column">   
                              <div class="card-layout-showcase">
                                <div class="job-first-details four-column">
                                  <p class="job-d-info blue">Deep clean</p>
                                  <p class="job-d-info">6:00 am</p>
                                  <p class="job-d-info">1:00 hrs</p>
                                  <p class="job-d-info">$130</p>
                                </div>
                                <div class="job-first-details two-column">
                                  <p class="job-d-info">Brooklyn Simmons</p>
                                  <p class="job-d-info address">22559 Bear Dr., Applev...</p>
                                </div>
                                <div class="response-msg">
                                  <a href="#" class="collect_payment crd-btn">Collect Payment</a>
                                </div>
                              </div>
                              <div class="altrntive_rw">
                                <p class="appointment_label">Job</p>
                                <p class="app-value blue"><strong>Deep clean</strong></p>
                              </div>   
                              <div class="altrntive_rw">
                                <p class="appointment_label">Time</p>
                                <p class="app-value">5:00 pm</p>
                              </div>
                              <div class="altrntive_rw">
                                  <p class="appointment_label">Est Duration</p>
                                    <p class="app-value">1:00 hrs</p>
                                 </div>  
                                 <div class="altrntive_rw">
                                  <p class="appointment_label">Customer</p>
                                    <p class="app-value">Brooklyn S.</p>
                                     <a href="#" class="btn_b" type="button" id="dropdownMenu2"
                                     data-bs-toggle="dropdown" aria-expanded="false">Contact </a>
                                   <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                     <li class="c_text">Contact information</li>
                                     <li><a href="tel:512-558-5876" class="link-design-2 mt-3"><img
                                           src="assets/images/icons/phone.svg">512-558-5876</a></li>
                                     <li><a href="mailto:example@mail.com" class="link-design-2"><img
                                           src="assets/images/icons/email.svg">example@mail.com</a></li>
                                     <li><a href="#" class="link-design-2"><img src="assets/images/icons/home.svg">15648
                                         Maple St, Austin, TX 78744</a></li>
                                     <li class="chat_with_member"><a href="message.html" class="btn_chat_member">Chat With
                                         Member<img src="assets/images/icons/email-2.svg" /></a></li>
                                   </ul>
                                 </div>   
                                 <div class="altrntive_rw">
                                  <p class="appointment_label blue">Location</p>
                                    <p class="app-value location blue">22559 Bear Dr., Applev...</p>
                                 </div>  
                                 <div class="altrntive_rw">
                                  <p class="appointment_label">Price</p>
                                    <p class="app-value">$130</p>
                                 </div> 
                                 <div class="altrntive_rw">
                                  <p class="appointment_label">Change</p>
                                     <a class="btn_q">Edit Job</a>
                                     <a class="btn_x">Cancel Job</a>
                                 </div>  
                                 </div>
                                 <div class="collect-payment">
                                  <a href="#" class="collect_payment crd-btn">Collect Payment</a>
                                 </div>        
                          </div>
      
                      </div>
                            </div>
                            <div class="quick-links-sec">
                              <h4 class="h4_design border-0">Quick Links</h4>
                              <ul class="list-unstyled">
                                <li><a href="">What do I do if a payment fails?</a></li>
                                <li><a href="">How do I edit or cancel a job?</a></li>
                                <li><a href="">What if I’m not able to make it?</a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="New-Requests">
                          <div class="date_section">
                            <div class="form-headeing-second">
                              <h4 class="text-center">Select Date Above</h4>
                            </div>
                            <div class="date_show_v">
                             <button>  Date </button>
                             <span>01/02/2022</span>
                            </div>
            
                            <div class="card_service_row appoitments-alternative-row row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-2">
                      <div class="select-date-toggles header-main-cntnt-differ">
                          <button class="service_toggle_s"></button>
                          <div class="service-main-service-column">   
                          <div class="card-layout-showcase">
                            <div class="job-first-details four-column">
                              <p class="job-d-info blue">Deep clean</p>
                              <p class="job-d-info">6:00 am</p>
                              <p class="job-d-info">1:00 hrs</p>
                              <p class="job-d-info">$130</p>
                            </div>
                            <div class="job-first-details two-column">
                              <p class="job-d-info">Brooklyn Simmons</p>
                              <p class="job-d-info address">22559 Bear Dr., Applev...</p>
                            </div>
                            <div class="response-msg">
                              <a href="#" class="accept-request-btn crd-btn">Accept Request</a>
                            </div>
                          </div>
                          <div class="altrntive_rw">
                            <p class="appointment_label">Job</p>
                            <p class="app-value blue"><strong>Deep clean</strong></p>
                          </div>   
                          <div class="altrntive_rw">
                            <p class="appointment_label">Time</p>
                            <p class="app-value">5:00 pm</p>
                          </div>
                          <div class="altrntive_rw">
                              <p class="appointment_label">Est Duration</p>
                                <p class="app-value">1:00 hrs</p>
                             </div>  
                             <div class="altrntive_rw">
                              <p class="appointment_label">Customer</p>
                                <p class="app-value">Brooklyn S.</p>
                                 <a href="#" class="btn_b" type="button" id="dropdownMenu2"
                                 data-bs-toggle="dropdown" aria-expanded="false">Contact </a>
                               <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                 <li class="c_text">Contact information</li>
                                 <li><a href="tel:512-558-5876" class="link-design-2 mt-3"><img
                                       src="assets/images/icons/phone.svg">512-558-5876</a></li>
                                 <li><a href="mailto:example@mail.com" class="link-design-2"><img
                                       src="assets/images/icons/email.svg">example@mail.com</a></li>
                                 <li><a href="#" class="link-design-2"><img src="assets/images/icons/home.svg">15648
                                     Maple St, Austin, TX 78744</a></li>
                                 <li class="chat_with_member"><a href="message.html" class="btn_chat_member">Chat With
                                     Member<img src="assets/images/icons/email-2.svg" /></a></li>
                               </ul>
                             </div>   
                             <div class="altrntive_rw">
                              <p class="appointment_label blue">Location</p>
                                <p class="app-value location blue">22559 Bear Dr., Applev...</p>
                             </div>  
                             <div class="altrntive_rw">
                              <p class="appointment_label">Price</p>
                                <p class="app-value">$130</p>
                             </div> 
                             <div class="altrntive_rw">
                              <p class="appointment_label">Change</p>
                                 <a class="btn_q">Propose Change</a>
                                 <a class="btn_x">Refuse Request</a>
                             </div>  
                             </div>
                             <div class="accept-request">
                              <a href="#" class="accept-request-btn crd-btn">Accept Request</a>
                             </div>        
                      </div>
  
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-2">
                      <div class="select-date-toggles header-main-cntnt-differ">
                          <button class="service_toggle_s"></button>
                          <div class="service-main-service-column">   
                          <div class="card-layout-showcase">
                            <div class="job-first-details four-column">
                              <p class="job-d-info blue">Deep clean</p>
                              <p class="job-d-info">6:00 am</p>
                              <p class="job-d-info">1:00 hrs</p>
                              <p class="job-d-info">$130</p>
                            </div>
                            <div class="job-first-details two-column">
                              <p class="job-d-info">Brooklyn Simmons</p>
                              <p class="job-d-info address">22559 Bear Dr., Applev...</p>
                            </div>
                            <div class="response-msg">
                              <a href="#" class="refuse-request-btn crd-btn">Request Refused</a>
                            </div>
                          </div>
                          <div class="altrntive_rw">
                            <p class="appointment_label">Job</p>
                            <p class="app-value blue"><strong>Deep clean</strong></p>
                          </div>   
                          <div class="altrntive_rw">
                            <p class="appointment_label">Time</p>
                            <p class="app-value">5:00 pm</p>
                          </div>
                          <div class="altrntive_rw">
                              <p class="appointment_label">Est Duration</p>
                                <p class="app-value">1:00 hrs</p>
                             </div>  
                             <div class="altrntive_rw">
                              <p class="appointment_label">Customer</p>
                                <p class="app-value">Brooklyn S.</p>
                                 <a href="#" class="btn_b" type="button" id="dropdownMenu2"
                                 data-bs-toggle="dropdown" aria-expanded="false">Contact </a>
                               <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                 <li class="c_text">Contact information</li>
                                 <li><a href="tel:512-558-5876" class="link-design-2 mt-3"><img
                                       src="assets/images/icons/phone.svg">512-558-5876</a></li>
                                 <li><a href="mailto:example@mail.com" class="link-design-2"><img
                                       src="assets/images/icons/email.svg">example@mail.com</a></li>
                                 <li><a href="#" class="link-design-2"><img src="assets/images/icons/home.svg">15648
                                     Maple St, Austin, TX 78744</a></li>
                                 <li class="chat_with_member"><a href="message.html" class="btn_chat_member">Chat With
                                     Member<img src="assets/images/icons/email-2.svg" /></a></li>
                               </ul>
                             </div>   
                             <div class="altrntive_rw">
                              <p class="appointment_label blue">Location</p>
                                <p class="app-value location blue">22559 Bear Dr., Applev...</p>
                             </div>  
                             <div class="altrntive_rw">
                              <p class="appointment_label">Price</p>
                                <p class="app-value">$130</p>
                             </div> 
                             <div class="altrntive_rw">
                              <p class="appointment_label">Change</p>
                                 <a class="btn_q">Propose Change</a>
                                 <a class="btn_x">Refuse Request</a>
                             </div>  
                             </div>
                             <div class="accept-request">
                              <a href="#" class="refuse-request-btn crd-btn">Request Refused</a>
                             </div>        
                      </div>
  
                    </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- <div class="date_section">
                      <div class="form-headeing-second">
                        <h4 class="text-center">Select Date Above</h4>
                      </div>
                      <div class="date_show_v">
                        <button> Date </button>
                        <span>01/02/2022</span>
                      </div>

                      <div class="cleaner_appoitments_table common_table">
                        <table role="table">
                          <thead role="rowgroup">
                            <tr role="row" class="">
                              <th role="columnheader">Time</th>
                              <th role="columnheader">Job</th>
                              <th role="columnheader">Est. Duration</th>
                              <th role="columnheader">Customer Contact Info</th>
                              <th role="columnheader">Location</th>
                              <th role="columnheader">Price</th>
                              <th role="columnheader">Payment</th>
                              <th role="columnheader">Change</th>
                            </tr>
                          </thead>
                          <tbody role="rowgroup">
                            <tr role="row" class="togler_row ">
                              <td role="cell">6:00 am</td>
                              <td role="cell" class="b_link"><b>Deep clean</b></td>
                              <td role="cell">01:00 hrs</td>
                              <td role="cell" class="contact_info view_dropdown">
                                <div class="dropdown">
                                  <span class="name_info">Brooklyn S.’s Team</span>
                                  <button class="border-0 bg-none link-design-2 " type="button" id="dropdownMenu2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="assets/images/icons/contact-card.png" />
                                  </button>
                                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <li class="c_text">Contact information</li>
                                    <li><a href="#" class="link-design-2 mt-3"><img
                                          src="assets/images/icons/phone.svg">512-558-5876</a></li>
                                    <li><a href="#" class="link-design-2"><img
                                          src="assets/images/icons/email.svg">example@mail.com</a></li>
                                    <li><a href="#" class="link-design-2"><img src="assets/images/icons/home.svg">15648
                                        Maple St, Austin, TX 78744</a></li>
                                    <li class="chat_with_member"><a href="#" class="btn_chat_member">Chat With
                                        Member<img src="assets/images/icons/email-2.svg" /></a></li>
                                  </ul>
                                </div>
                              </td>
                              <td role="cell" class="b_link">22559 Bear Dr., Applev...</td>
                              <td role="cell">$130</td>
                              <td role="cell" class=""><a href="#" class="text-success ">Success</a></td>
                              <td role="cell">
                                <a href="#" class="btn_edit me-3"><img src="assets/images/icons/b_pen.svg" /></a>
                                <a href="#" class="btn_delete"><img src="assets/images/icons/x.png" /></a>
                              </td>
                              <td class="d-md-none d-block toggle_r"></td>
                            </tr>

                            <tr role="row" class="togler_row ">
                              <td role="cell">6:00 am</td>
                              <td role="cell" class="b_link"><b>Deep clean</b></td>
                              <td role="cell">01:00 hrs</td>
                              <td role="cell" class="contact_info view_dropdown">
                                <div class="dropdown">
                                  <span class="name_info">Brooklyn S.’s Team</span>
                                  <button class="border-0 bg-none link-design-2 " type="button" id="dropdownMenu2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="assets/images/icons/contact-card.png" />
                                  </button>
                                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <li class="c_text">Contact information</li>
                                    <li><a href="#" class="link-design-2 mt-3"><img
                                          src="assets/images/icons/phone.svg">512-558-5876</a></li>
                                    <li><a href="#" class="link-design-2"><img
                                          src="assets/images/icons/email.svg">example@mail.com</a></li>
                                    <li><a href="#" class="link-design-2"><img src="assets/images/icons/home.svg">15648
                                        Maple St, Austin, TX 78744</a></li>
                                    <li class="chat_with_member"><a href="#" class="btn_chat_member">Chat With
                                        Member<img src="assets/images/icons/email-2.svg" /></a></li>
                                  </ul>
                                </div>
                              </td>
                              <td role="cell" class="b_link">22559 Bear Dr., Applev...</td>
                              <td role="cell">$130</td>
                              <td role="cell" class=""><a href="#" class="text-danger ">Fail</a></td>
                              <td role="cell">
                                <a href="#" class="btn_edit me-3"><img src="assets/images/icons/b_pen.svg" /></a>
                                <a href="#" class="btn_delete"><img src="assets/images/icons/x.png" /></a>
                              </td>
                              <td class="d-md-none d-block toggle_r"></td>
                            </tr>

                            <tr role="row" class="togler_row ">
                              <td role="cell">6:00 am</td>
                              <td role="cell" class="b_link"><b>Deep clean</b></td>
                              <td role="cell">01:00 hrs</td>
                              <td role="cell" class="contact_info view_dropdown">
                                <div class="dropdown">
                                  <span class="name_info">Brooklyn S.’s Team</span>
                                  <button class="border-0 bg-none link-design-2 " type="button" id="dropdownMenu2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="assets/images/icons/contact-card.png" />
                                  </button>
                                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <li class="c_text">Contact information</li>
                                    <li><a href="#" class="link-design-2 mt-3"><img
                                          src="assets/images/icons/phone.svg">512-558-5876</a></li>
                                    <li><a href="#" class="link-design-2"><img
                                          src="assets/images/icons/email.svg">example@mail.com</a></li>
                                    <li><a href="#" class="link-design-2"><img src="assets/images/icons/home.svg">15648
                                        Maple St, Austin, TX 78744</a></li>
                                    <li class="chat_with_member"><a href="#" class="btn_chat_member">Chat With
                                        Member<img src="assets/images/icons/email-2.svg" /></a></li>
                                  </ul>
                                </div>
                              </td>
                              <td role="cell" class="b_link">22559 Bear Dr., Applev...</td>
                              <td role="cell">$130</td>
                              <td role="cell" class=""><a href="#" class="text-primary ">Charge</a></td>
                              <td role="cell">
                                <a href="#" class="btn_edit me-3"><img src="assets/images/icons/b_pen.svg" /></a>
                                <a href="#" class="btn_delete"><img src="assets/images/icons/x.png" /></a>
                              </td>
                              <td class="d-md-none d-block toggle_r"></td>
                            </tr>
                            <tr role="row" class="togler_row ">
                              <td role="cell">6:00 am</td>
                              <td role="cell" class="b_link"><b>Deep clean</b></td>
                              <td role="cell">01:00 hrs</td>
                              <td role="cell" class="contact_info view_dropdown">
                                <div class="dropdown">
                                  <span class="name_info">Brooklyn S.’s Team</span>
                                  <button class="border-0 bg-none link-design-2 " type="button" id="dropdownMenu2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="assets/images/icons/contact-card.png" />
                                  </button>
                                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <li class="c_text">Contact information</li>
                                    <li><a href="#" class="link-design-2 mt-3"><img
                                          src="assets/images/icons/phone.svg">512-558-5876</a></li>
                                    <li><a href="#" class="link-design-2"><img
                                          src="assets/images/icons/email.svg">example@mail.com</a></li>
                                    <li><a href="#" class="link-design-2"><img src="assets/images/icons/home.svg">15648
                                        Maple St, Austin, TX 78744</a></li>
                                    <li class="chat_with_member"><a href="#" class="btn_chat_member">Chat With
                                        Member<img src="assets/images/icons/email-2.svg" /></a></li>
                                  </ul>
                                </div>
                              </td>
                              <td role="cell" class="b_link">22559 Bear Dr., Applev...</td>
                              <td role="cell">$130</td>
                              <td role="cell" class=""><a href="#" class="text-primary ">Charge</a></td>
                              <td role="cell">
                                <a href="#" class="btn_edit me-3"><img src="assets/images/icons/b_pen.svg" /></a>
                                <a href="#" class="btn_delete"><img src="assets/images/icons/x.png" /></a>
                              </td>
                              <td class="d-md-none d-block toggle_r"></td>
                            </tr>
                            <tr role="row" class="togler_row ">
                              <td role="cell">6:00 am</td>
                              <td role="cell" class="b_link"><b>Deep clean</b></td>
                              <td role="cell">01:00 hrs</td>
                              <td role="cell" class="contact_info view_dropdown">
                                <div class="dropdown">
                                  <span class="name_info">Brooklyn S.’s Team</span>
                                  <button class="border-0 bg-none link-design-2 " type="button" id="dropdownMenu2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="assets/images/icons/contact-card.png" />
                                  </button>
                                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <li class="c_text">Contact information</li>
                                    <li><a href="#" class="link-design-2 mt-3"><img
                                          src="assets/images/icons/phone.svg">512-558-5876</a></li>
                                    <li><a href="#" class="link-design-2"><img
                                          src="assets/images/icons/email.svg">example@mail.com</a></li>
                                    <li><a href="#" class="link-design-2"><img src="assets/images/icons/home.svg">15648
                                        Maple St, Austin, TX 78744</a></li>
                                    <li class="chat_with_member"><a href="#" class="btn_chat_member">Chat With
                                        Member<img src="assets/images/icons/email-2.svg" /></a></li>
                                  </ul>
                                </div>
                              </td>
                              <td role="cell" class="b_link">22559 Bear Dr., Applev...</td>
                              <td role="cell">$130</td>
                              <td role="cell" class=""><a href="#" class="text-primary ">Charge</a></td>
                              <td role="cell">
                                <a href="#" class="btn_edit me-3"><img src="assets/images/icons/b_pen.svg" /></a>
                                <a href="#" class="btn_delete"><img src="assets/images/icons/x.png" /></a>
                              </td>
                              <td class="d-md-none d-block toggle_r"></td>
                            </tr>

                            <tr role="row" class="togler_row ">
                              <td role="cell">6:00 am</td>
                              <td role="cell" class="b_link"><b>Deep clean</b></td>
                              <td role="cell">01:00 hrs</td>
                              <td role="cell" class="contact_info view_dropdown">
                                <div class="dropdown">
                                  <span class="name_info">Brooklyn S.’s Team</span>
                                  <button class="border-0 bg-none link-design-2 " type="button" id="dropdownMenu2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="assets/images/icons/contact-card.png" />
                                  </button>
                                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <li class="c_text">Contact information</li>
                                    <li><a href="#" class="link-design-2 mt-3"><img
                                          src="assets/images/icons/phone.svg">512-558-5876</a></li>
                                    <li><a href="#" class="link-design-2"><img
                                          src="assets/images/icons/email.svg">example@mail.com</a></li>
                                    <li><a href="#" class="link-design-2"><img src="assets/images/icons/home.svg">15648
                                        Maple St, Austin, TX 78744</a></li>
                                    <li class="chat_with_member"><a href="#" class="btn_chat_member">Chat With
                                        Member<img src="assets/images/icons/email-2.svg" /></a></li>
                                  </ul>
                                </div>
                              </td>
                              <td role="cell" class="b_link">22559 Bear Dr., Applev...</td>
                              <td role="cell">$130</td>
                              <td role="cell" class=""><a href="#" class="text-primary ">Charge</a></td>
                              <td role="cell">
                                <a href="#" class="btn_edit me-3"><img src="assets/images/icons/b_pen.svg" /></a>
                                <a href="#" class="btn_delete"><img src="assets/images/icons/x.png" /></a>
                              </td>
                              <td class="d-md-none d-block toggle_r"></td>
                            </tr>

                            <tr role="row" class="togler_row ">
                              <td role="cell">6:00 am</td>
                              <td role="cell" class="b_link"><b>Deep clean</b></td>
                              <td role="cell">01:00 hrs</td>
                              <td role="cell" class="contact_info view_dropdown">
                                <div class="dropdown">
                                  <span class="name_info">Brooklyn S.’s Team</span>
                                  <button class="border-0 bg-none link-design-2 " type="button" id="dropdownMenu2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="assets/images/icons/contact-card.png" />
                                  </button>
                                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <li class="c_text">Contact information</li>
                                    <li><a href="#" class="link-design-2 mt-3"><img
                                          src="assets/images/icons/phone.svg">512-558-5876</a></li>
                                    <li><a href="#" class="link-design-2"><img
                                          src="assets/images/icons/email.svg">example@mail.com</a></li>
                                    <li><a href="#" class="link-design-2"><img src="assets/images/icons/home.svg">15648
                                        Maple St, Austin, TX 78744</a></li>
                                    <li class="chat_with_member"><a href="#" class="btn_chat_member">Chat With
                                        Member<img src="assets/images/icons/email-2.svg" /></a></li>
                                  </ul>
                                </div>
                              </td>
                              <td role="cell" class="b_link">22559 Bear Dr., Applev...</td>
                              <td role="cell">$130</td>
                              <td role="cell" class=""><a href="#" class="text-primary ">Charge</a></td>
                              <td role="cell">
                                <a href="#" class="btn_edit me-3"><img src="assets/images/icons/b_pen.svg" /></a>
                                <a href="#" class="btn_delete"><img src="assets/images/icons/x.png" /></a>
                              </td>
                              <td class="d-md-none d-block toggle_r"></td>
                            </tr>
                            <tr role="row" class="togler_row ">
                              <td role="cell">6:00 am</td>
                              <td role="cell" class="b_link"><b>Deep clean</b></td>
                              <td role="cell">01:00 hrs</td>
                              <td role="cell" class="contact_info view_dropdown">
                                <div class="dropdown">
                                  <span class="name_info">Brooklyn S.’s Team</span>
                                  <button class="border-0 bg-none link-design-2 " type="button" id="dropdownMenu2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="assets/images/icons/contact-card.png" />
                                  </button>
                                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <li class="c_text">Contact information</li>
                                    <li><a href="#" class="link-design-2 mt-3"><img
                                          src="assets/images/icons/phone.svg">512-558-5876</a></li>
                                    <li><a href="#" class="link-design-2"><img
                                          src="assets/images/icons/email.svg">example@mail.com</a></li>
                                    <li><a href="#" class="link-design-2"><img src="assets/images/icons/home.svg">15648
                                        Maple St, Austin, TX 78744</a></li>
                                    <li class="chat_with_member"><a href="#" class="btn_chat_member">Chat With
                                        Member<img src="assets/images/icons/email-2.svg" /></a></li>
                                  </ul>
                                </div>
                              </td>
                              <td role="cell" class="b_link">22559 Bear Dr., Applev...</td>
                              <td role="cell">$130</td>
                              <td role="cell" class=""><a href="#" class="text-primary ">Charge</a></td>
                              <td role="cell">
                                <a href="#" class="btn_edit me-3"><img src="assets/images/icons/b_pen.svg" /></a>
                                <a href="#" class="btn_delete"><img src="assets/images/icons/x.png" /></a>
                              </td>
                              <td class="d-md-none d-block toggle_r"></td>
                            </tr>

                          </tbody>
                        </table>
                      </div>

                    </div> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
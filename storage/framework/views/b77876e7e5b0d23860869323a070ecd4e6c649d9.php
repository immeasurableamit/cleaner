<div>
    <section class="light-banner customer-account-page" style="background-image: url('assets/images/white-pattern.png')">
     <div class="container">
      <div class="customer-white-wrapper">
      <div class="row no-mrg">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 no-padd">
          <div class="blue-bg-wrapper bar_left">
            <div class="blue-bg-heading">
              <h4>Settings</h4>
            </div>
            <?php echo $__env->make('layouts.common.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <!--   <div class="customer-side-navigation navigation-tab-desing">
              <ul class="list-unstyled">
                <li class="account_dropdown">
                  <a href="#" class="nav-link  dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Account and Settings</a>
                  <ul class="dropdown_links dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a href="cleaner-account.html" class="">View Account Info</a></li>
                    <li><a href="cleaner-team.html" class="">Team</a></li>
                    <li><a href="cleaner-set-availability.html" class="">Set Availability</a></li>
                    <li><a href="cleaner-set-service.html" class="">Set Services</a></li>
                    <li><a href="cleaner-set-location.html" class="">Set Locations Served</a></li>
                    <li><a href="cleaner-notification.html" class="">Notification Preferences</a></li>
                    <li><a href="cleaner-reviews.html" class="">Reviews</a></li>
                  </ul>
                </li>
                <li><a href="cleaner-appoitments.html" class="">Jobs</a></li>
                <li><a href="cleaner-boosted-listings.html" class="">Boosted Listings</a></li>
                <li><a href="cleaner-insurance-badges.html" class="">Insurance and Badges</a></li>
                <li><a href="cleaner-billing.html" class="">Billing</a></li>
                <li><a href="cleaner-support-past-service.html" class="active">Support</a></li>
              </ul>
            </div> -->
            <div class="blue-logo-block text-center max-width-100">
              <a href="#"><img src="assets/images/logo/logo.svg"></a>
            </div>
         </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 no-padd">
          <div class="row no-mrg">
           <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 no-padd">
            <div class="customer-account-forms support_service_section pe-3">   
              <div class="support_tabs">
                  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                      <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Past services</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Contact Us</button>
                      </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                      <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                          <!-- past-service -->
                         <div class="past-services-container card_service_row">
                          <div class="listing-row">
                            <div class="listing-column lcd-6 lc-12 mb-2">
                              <div class="select-date-toggles header-main-cntnt-differ">
                                <button class="service_toggle_s"></button>
                                <div class="service-main-service-column">   
                                <div class="card-layout-showcase">
                                  <div class="job-first-details four-column">
                                    <p class="job-d-info blue">Time</p>
                                    <p class="job-d-info">5:00 pm</p>
                                    <p class="job-d-info blue">Date</p>
                                    <p class="job-d-info">1 Nov 2022</p>
                                  </div>
                                  <div class="job-first-details  four-column">
                                    <p class="job-d-info">Job</p>
                                    <p class="job-d-info address">Deep clean</p>
                                    <p class="job-d-info">Customer</p>
                                    <p class="job-d-info address">Brooklyn S.</p>
                                  </div>
                                  <div class="response-msg">
                                    <a href="#" class="red-bordered-full-btn">There’s an issue with this job</a>
                                  </div>
                                </div>
                                <div class="altrntive_rw">
                                  <p class="appointment_label">Time</p>
                                  <p class="app-value">5:00 pm</p>
                                </div>
                                <div class="altrntive_rw">
                                  <p class="appointment_label">Job</p>
                                  <p class="app-value blue"><strong>Deep clean</strong></p>
                                </div>   
                                <div class="altrntive_rw">
                                  <p class="appointment_label">Date</p>
                                  <p class="app-value">01 Nov 2022</p>
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
                                    <p class="appointment_label">Cleaner</p>
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
                                    <p class="appointment_label">Price</p>
                                      <p class="app-value">$130</p>
                                   </div> 
                                   <div class="altrntive_rw">
                                    <p class="appointment_label">Payment</p>
                                      <p class="app-value">**2345</p>
                                   </div> 
                                   <div class="altrntive_rw">
                                    <p class="appointment_label">Invoice</p>
                                      <p class="app-value blue"><strong>FB-57382324</strong></p>
                                   </div>  
                                   </div>
                                   <div class="collect-payment-btn">
                                    <a href="#" class="red-bordered-full-btn">There’s an issue with this job</a>
                                   </div>        
                            </div>
                          </div>
                          <div class="listing-column lcd-6 lc-12 mb-2">
                            <div class="select-date-toggles header-main-cntnt-differ">
                              <button class="service_toggle_s"></button>
                              <div class="service-main-service-column">   
                              <div class="card-layout-showcase">
                                <div class="job-first-details four-column">
                                  <p class="job-d-info blue">Time</p>
                                  <p class="job-d-info">5:00 pm</p>
                                  <p class="job-d-info blue">Date</p>
                                  <p class="job-d-info">1 Nov 2022</p>
                                </div>
                                <div class="job-first-details  four-column">
                                  <p class="job-d-info">Job</p>
                                  <p class="job-d-info address">Deep clean</p>
                                  <p class="job-d-info">Customer</p>
                                  <p class="job-d-info address">Brooklyn S.</p>
                                </div>
                                <div class="response-msg">
                                  <a href="#" class="red-bordered-full-btn">There’s an issue with this job</a>
                                </div>
                              </div>
                              <div class="altrntive_rw">
                                <p class="appointment_label">Time</p>
                                <p class="app-value">5:00 pm</p>
                              </div>
                              <div class="altrntive_rw">
                                <p class="appointment_label">Job</p>
                                <p class="app-value blue"><strong>Deep clean</strong></p>
                              </div>   
                              <div class="altrntive_rw">
                                <p class="appointment_label">Date</p>
                                <p class="app-value">01 Nov 2022</p>
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
                                  <p class="appointment_label">Cleaner</p>
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
                                  <p class="appointment_label">Price</p>
                                    <p class="app-value">$130</p>
                                 </div> 
                                 <div class="altrntive_rw">
                                  <p class="appointment_label">Payment</p>
                                    <p class="app-value">**2345</p>
                                 </div> 
                                 <div class="altrntive_rw">
                                  <p class="appointment_label">Invoice</p>
                                    <p class="app-value blue"><strong>FB-57382324</strong></p>
                                 </div>  
                                 </div>
                                 <div class="collect-payment-btn">
                                  <a href="#" class="red-bordered-full-btn">There’s an issue with this job</a>
                                 </div>        
                          </div>
                        </div>
                        <div class="listing-column lcd-6 lc-12 mb-2">
                          <div class="select-date-toggles header-main-cntnt-differ">
                            <button class="service_toggle_s"></button>
                            <div class="service-main-service-column">   
                            <div class="card-layout-showcase">
                              <div class="job-first-details four-column">
                                <p class="job-d-info blue">Time</p>
                                <p class="job-d-info">5:00 pm</p>
                                <p class="job-d-info blue">Date</p>
                                <p class="job-d-info">1 Nov 2022</p>
                              </div>
                              <div class="job-first-details  four-column">
                                <p class="job-d-info">Job</p>
                                <p class="job-d-info address">Deep clean</p>
                                <p class="job-d-info">Customer</p>
                                <p class="job-d-info address">Brooklyn S.</p>
                              </div>
                              <div class="response-msg">
                                <a href="#" class="red-bordered-full-btn">There’s an issue with this job</a>
                              </div>
                            </div>
                            <div class="altrntive_rw">
                              <p class="appointment_label">Time</p>
                              <p class="app-value">5:00 pm</p>
                            </div>
                            <div class="altrntive_rw">
                              <p class="appointment_label">Job</p>
                              <p class="app-value blue"><strong>Deep clean</strong></p>
                            </div>   
                            <div class="altrntive_rw">
                              <p class="appointment_label">Date</p>
                              <p class="app-value">01 Nov 2022</p>
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
                                <p class="appointment_label">Cleaner</p>
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
                                <p class="appointment_label">Price</p>
                                  <p class="app-value">$130</p>
                               </div> 
                               <div class="altrntive_rw">
                                <p class="appointment_label">Payment</p>
                                  <p class="app-value">**2345</p>
                               </div> 
                               <div class="altrntive_rw">
                                <p class="appointment_label">Invoice</p>
                                  <p class="app-value blue"><strong>FB-57382324</strong></p>
                               </div>  
                               </div>
                               <div class="collect-payment-btn">
                                <a href="#" class="red-bordered-full-btn">There’s an issue with this job</a>
                               </div>        
                        </div>
                      </div>
                      <div class="listing-column lcd-6 lc-12 mb-2">
                        <div class="select-date-toggles header-main-cntnt-differ">
                          <button class="service_toggle_s"></button>
                          <div class="service-main-service-column">   
                          <div class="card-layout-showcase">
                            <div class="job-first-details four-column">
                              <p class="job-d-info blue">Time</p>
                              <p class="job-d-info">5:00 pm</p>
                              <p class="job-d-info blue">Date</p>
                              <p class="job-d-info">1 Nov 2022</p>
                            </div>
                            <div class="job-first-details  four-column">
                              <p class="job-d-info">Job</p>
                              <p class="job-d-info address">Deep clean</p>
                              <p class="job-d-info">Customer</p>
                              <p class="job-d-info address">Brooklyn S.</p>
                            </div>
                            <div class="response-msg">
                              <a href="#" class="red-bordered-full-btn">There’s an issue with this job</a>
                            </div>
                          </div>
                          <div class="altrntive_rw">
                            <p class="appointment_label">Time</p>
                            <p class="app-value">5:00 pm</p>
                          </div>
                          <div class="altrntive_rw">
                            <p class="appointment_label">Job</p>
                            <p class="app-value blue"><strong>Deep clean</strong></p>
                          </div>   
                          <div class="altrntive_rw">
                            <p class="appointment_label">Date</p>
                            <p class="app-value">01 Nov 2022</p>
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
                              <p class="appointment_label">Cleaner</p>
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
                              <p class="appointment_label">Price</p>
                                <p class="app-value">$130</p>
                             </div> 
                             <div class="altrntive_rw">
                              <p class="appointment_label">Payment</p>
                                <p class="app-value">**2345</p>
                             </div> 
                             <div class="altrntive_rw">
                              <p class="appointment_label">Invoice</p>
                                <p class="app-value blue"><strong>FB-57382324</strong></p>
                             </div>  
                             </div>
                             <div class="collect-payment-btn">
                              <a href="#" class="red-bordered-full-btn">There’s an issue with this job</a>
                             </div>        
                      </div>
                    </div>
                    <div class="listing-column lcd-6 lc-12 mb-2">
                      <div class="select-date-toggles header-main-cntnt-differ">
                        <button class="service_toggle_s"></button>
                        <div class="service-main-service-column">   
                        <div class="card-layout-showcase">
                          <div class="job-first-details four-column">
                            <p class="job-d-info blue">Time</p>
                            <p class="job-d-info">5:00 pm</p>
                            <p class="job-d-info blue">Date</p>
                            <p class="job-d-info">1 Nov 2022</p>
                          </div>
                          <div class="job-first-details  four-column">
                            <p class="job-d-info">Job</p>
                            <p class="job-d-info address">Deep clean</p>
                            <p class="job-d-info">Customer</p>
                            <p class="job-d-info address">Brooklyn S.</p>
                          </div>
                          <div class="response-msg">
                            <a href="#" class="red-bordered-full-btn">There’s an issue with this job</a>
                          </div>
                        </div>
                        <div class="altrntive_rw">
                          <p class="appointment_label">Time</p>
                          <p class="app-value">5:00 pm</p>
                        </div>
                        <div class="altrntive_rw">
                          <p class="appointment_label">Job</p>
                          <p class="app-value blue"><strong>Deep clean</strong></p>
                        </div>   
                        <div class="altrntive_rw">
                          <p class="appointment_label">Date</p>
                          <p class="app-value">01 Nov 2022</p>
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
                            <p class="appointment_label">Cleaner</p>
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
                            <p class="appointment_label">Price</p>
                              <p class="app-value">$130</p>
                           </div> 
                           <div class="altrntive_rw">
                            <p class="appointment_label">Payment</p>
                              <p class="app-value">**2345</p>
                           </div> 
                           <div class="altrntive_rw">
                            <p class="appointment_label">Invoice</p>
                              <p class="app-value blue"><strong>FB-57382324</strong></p>
                           </div>  
                           </div>
                           <div class="collect-payment-btn">
                            <a href="#" class="red-bordered-full-btn">There’s an issue with this job</a>
                           </div>        
                    </div>
                  </div>
                  <div class="listing-column lcd-6 lc-12 mb-2">
                    <div class="select-date-toggles header-main-cntnt-differ">
                      <button class="service_toggle_s"></button>
                      <div class="service-main-service-column">   
                      <div class="card-layout-showcase">
                        <div class="job-first-details four-column">
                          <p class="job-d-info blue">Time</p>
                          <p class="job-d-info">5:00 pm</p>
                          <p class="job-d-info blue">Date</p>
                          <p class="job-d-info">1 Nov 2022</p>
                        </div>
                        <div class="job-first-details  four-column">
                          <p class="job-d-info">Job</p>
                          <p class="job-d-info address">Deep clean</p>
                          <p class="job-d-info">Customer</p>
                          <p class="job-d-info address">Brooklyn S.</p>
                        </div>
                        <div class="response-msg">
                          <a href="#" class="red-bordered-full-btn">There’s an issue with this job</a>
                        </div>
                      </div>
                      <div class="altrntive_rw">
                        <p class="appointment_label">Time</p>
                        <p class="app-value">5:00 pm</p>
                      </div>
                      <div class="altrntive_rw">
                        <p class="appointment_label">Job</p>
                        <p class="app-value blue"><strong>Deep clean</strong></p>
                      </div>   
                      <div class="altrntive_rw">
                        <p class="appointment_label">Date</p>
                        <p class="app-value">01 Nov 2022</p>
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
                          <p class="appointment_label">Cleaner</p>
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
                          <p class="appointment_label">Price</p>
                            <p class="app-value">$130</p>
                         </div> 
                         <div class="altrntive_rw">
                          <p class="appointment_label">Payment</p>
                            <p class="app-value">**2345</p>
                         </div> 
                         <div class="altrntive_rw">
                          <p class="appointment_label">Invoice</p>
                            <p class="app-value blue"><strong>FB-57382324</strong></p>
                         </div>  
                         </div>
                         <div class="collect-payment-btn">
                          <a href="#" class="red-bordered-full-btn">There’s an issue with this job</a>
                         </div>        
                  </div>
                </div>
                <div class="pagination_search_div text-center pagination-cubic-design mt-5">
                  <div id="pagination-container" class="pagination_list"></div>
                  </div>
                         </div>
                      </div>
                      </div>
                      <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                          <!-- contact-us -->
                          <div class="contact_us_form row">
                              <div class="col-md-8">
                               <p class="contact_form_text">This is a general contact form. If there is an issue with one of your cleanings or providers, please <b>file an issue</b> under your past services instead for a quicker resolution. </p>
                                <div class="row">
                                <div class="col-md-6">
                                   <div class="form-grouph input-design mb-30">
                                       <input type="text" placeholder="Name">
                                     </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="form-grouph input-design mb-30">
                                       <input type="text" placeholder="Order Number (if applicable)">
                                     </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="form-grouph input-design mb-30">
                                       <input type="email" placeholder="Email">
                                     </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="form-grouph input-design mb-30">
                                       <input type="text" placeholder="Phone">
                                     </div>
                                </div>
                                <div class="col-md-12">
                                   <textarea placeholder="Write your message here"></textarea>
                                </div>
                                <div class="col-md-12 pt-3">
                                   <button class="btn_c d-block w-100">Submit</button>
                                </div>
                                </div>
                              </div>
                              <div class="col-md-4 blue_right_card">
                                   <div class="card_b">
                                     <div class="fist_div">
                                       <img src="assets/images/logo/logo.svg"/>
                                     </div>
                                     <div class="scnd_div">
                                      <p>Get in touch with us and our team will get back to you.</p>
                                     </div>
                                     <div class="thrd_div">
                                          <a href=""><img src="assets/images/icons/email.svg">support@canary.com</a>
                                     </div>
                                   </div>
                           </div>
                           </div>
                      </div>
                    </div>
              </div>
               
 
         </div>
           </div>
           </div>
        </div>
       </div>   
       </div>
     </div>
   </section>
</div>
<?php /**PATH /var/www/html/projects/Amandeep Projects/working project/cleaner/cleaner/resources/views/livewire/cleaner/support.blade.php ENDPATH**/ ?>
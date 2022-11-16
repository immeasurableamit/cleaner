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
                            <a href="javascript::void(0)"><img src="{{asset('assets/images/logo/logo.svg')}}"></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 no-padd">
                    

                    <div class="row no-mrg">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 no-padd cleaner_availability_section">
              <div class="customer-account-forms ">
                 <div class="form-headeing-second border-bottom pb-3 top_heading">
                   <h3 class="mb-0">Your Services</h3>
                 </div>
  
                 <div class="service_text border-0">
                  <p>Canary Clean makes it easy to get started! Enter your price and time estimates below to help us give prospective customers an idea of your time and costs.<b>Prices and times are automatically scaled and can be adjusted at any time. </b>  </p>
                  <p>Remember - you will still review any jobs before accepting them, having the chance to raise or lower the price or estimated duration. You can also reach out to the customer at anytime before or after accepting.</p>
                 </div>
                 <h5 class="bg_ylow_h5">Offer Services, Set Prices, and Durations</h5>
                 <!-- home cleaning -->
                 <div class="services-alternate-wrap-sec">
                 <form>
                <div class="alternative-service-block">
                <div class="alternate-service-header">
                 <div class="row">
                  <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="home_cleaning_div">
                   <div class="card_header_tittle">
                     <h3>Full Home Cleanings</h3>
                       <p> enter your rate to match what you would charge 
                        for 1,500 sq ft - prices will scale up or down from there</p>
                   </div>
                </div>
                </div>
                </div>
                </div>
                <!-- One Time Row -->
                <div class="card_service_row">
                <div class="row">
                <div class="col-xl-6 col-md-6 col-sm-12">
                <div class="btn_header_service py-3">
                        <h4 class="mb-0 btn_blue">One Time Cleanings</h4>
                        <div class="form-check form-switch heading-toggle active-toggle">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                          </div>
                </div>
                </div>
                </div>
                <div class="row">
                        <div class="col-xl-6 col-md-6 col-sm-12">
                            <div class="card_collapse_service common_card_service show show-2">
                                <div class="heder_row">
                                 <h3>Make Ready - Empty Home</h3>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                </div>
                                </div>
                                <div class="card-edit-content">
                                    <p class="price-area-text"><span class="price_span">$225</span> <span class="area_span">per 1,500 sq ft</span></p>
                                    <p class="time">1:30 hrs</p>
                                    <p class="card_toggle_s">Edit</p>
                                </div>
                                <div class="card-second-content">
                                     <div class="card_row_3">
                                    <span class="est">Price per sq ft (in USD)</span>
                                    <div class="incremnt_decrmnt number for_alternative">
                                    <span class="minus">-</span>
                                    <input type="text" value="1">
                                    <span class="plus">+</span>   
                                </div>
                                </div>
                                <div class="card_row_3">
                                <span class="est">Est Duration</span>
                                <div class="incremnt_decrmnt number for_alternative">
                                    <span class="minus">-</span>
                                    <input type="text" value="1">
                                    <span class="plus">+</span>   
                                </div>
                                </div>
                                <div class="btn_text">
                                <p class="text_3">This would equal.... <span class="price">$300</span> on the average <span class="area">1,500 sq</span> ft home</p>
                                <button class="btn_blue">Save</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-sm-12">
                            <div class="card_collapse_service common_card_service show">
                                <div class="heder_row">
                                 <h3>Deep Clean - Occupied Home</h3>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                </div>
                                </div>
                                <div class="card-edit-content">
                                    <p class="price-area-text"><span class="price_span">$225</span> <span class="area_span">per 1,500 sq ft</span></p>
                                    <p class="time">1:30 hrs</p>
                                    <p class="card_toggle_s">Edit</p>
                                </div>
                                <div class="card-second-content">
                                     <div class="card_row_3">
                                    <span class="est">Price per sq ft (in USD)</span>
                                    <div class="incremnt_decrmnt number for_alternative">
                                    <span class="minus">-</span>
                                    <input type="text" value="1">
                                    <span class="plus">+</span>   
                                </div>
                                </div>
                                <div class="card_row_3">
                                <span class="est">Est Duration</span>
                                <div class="incremnt_decrmnt number for_alternative">
                                    <span class="minus">-</span>
                                    <input type="text" value="1">
                                    <span class="plus">+</span>   
                                </div>
                                </div>
                                <div class="btn_text">
                                <p class="text_3">This would equal.... <span class="price">$300</span> on the average <span class="area">1,500 sq</span> ft home</p>
                                <button class="btn_blue">Save</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-sm-12">
                            <div class="card_collapse_service common_card_service">
                                <div class="heder_row">
                                 <h3>Construction Cleanup</h3>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                </div>
                                </div>
                                <div class="card-edit-content">
                                    <p class="price-area-text"><span class="price_span">$225</span> <span class="area_span">per 1,500 sq ft</span></p>
                                    <p class="time">1:30 hrs</p>
                                    <p class="card_toggle_s">Edit</p>
                                </div>
                                <div class="card-second-content">
                                     <div class="card_row_3">
                                    <span class="est">Price per sq ft (in USD)</span>
                                    <div class="incremnt_decrmnt number for_alternative">
                                    <span class="minus">-</span>
                                    <input type="text" value="1">
                                    <span class="plus">+</span>   
                                </div>
                                </div>
                                <div class="card_row_3">
                                <span class="est">Est Duration</span>
                                <div class="incremnt_decrmnt number for_alternative">
                                    <span class="minus">-</span>
                                    <input type="text" value="1">
                                    <span class="plus">+</span>   
                                </div>
                                </div>
                                <div class="btn_text">
                                <p class="text_3">This would equal.... <span class="price">$300</span> on the average <span class="area">1,500 sq</span> ft home</p>
                                <button class="btn_blue">Save</button>
                                </div>
                                </div>
                            </div>
                </div>
                </div>
                </div>
                <!-- Recurring Cleaning Row -->
                <div class="card_service_row">
                  <div class="row">
                  <div class="col-xl-6 col-md-6 col-sm-12">
                  <div class="btn_header_service py-3">
                          <h4 class="mb-0 btn_blue">Recurring Cleanings</h4>
                          <div class="form-check form-switch heading-toggle active-toggle">
                              <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                            </div>
                  </div>
                  </div>
                  </div>
                  <div class="row">
                          <div class="col-xl-6 col-md-6 col-sm-12">
                              <div class="card_collapse_service common_card_service show">
                                  <div class="heder_row">
                                   <h3>Routine - Weekly</h3>
                                  <div class="form-check form-switch">
                                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                  </div>
                                  </div>
                                  <div class="card-edit-content">
                                      <p class="price-area-text"><span class="price_span">$225</span> <span class="area_span">per 1,500 sq ft</span></p>
                                      <p class="time">1:30 hrs</p>
                                      <p class="card_toggle_s">Edit</p>
                                  </div>
                                  <div class="card-second-content">
                                     <div class="card_row_3">
                                      <span class="est">Price per sq ft (in USD)</span>
                                      <div class="incremnt_decrmnt number for_alternative">
                                      <span class="minus">-</span>
                                      <input type="text" value="1">
                                      <span class="plus">+</span>   
                                  </div>
                                  </div>
                                  <div class="card_row_3">
                                  <span class="est">Est Duration</span>
                                  <div class="incremnt_decrmnt number for_alternative">
                                      <span class="minus">-</span>
                                      <input type="text" value="1">
                                      <span class="plus">+</span>   
                                  </div>
                                  </div>
                                  <div class="btn_text">
                                  <p class="text_3">This would equal.... <span class="price">$300</span> on the average <span class="area">1,500 sq</span> ft home</p>
                                  <button class="btn_blue">Save</button>
                                  </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-xl-6 col-md-6 col-sm-12">
                              <div class="card_collapse_service common_card_service show">
                                  <div class="heder_row">
                                   <h3>Routine - Every 2 Weeks</h3>
                                  <div class="form-check form-switch">
                                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                  </div>
                                  </div>
                                  <div class="card-edit-content">
                                      <p class="price-area-text"><span class="price_span">$225</span> <span class="area_span">per 1,500 sq ft</span></p>
                                      <p class="time">1:30 hrs</p>
                                      <p class="card_toggle_s">Edit</p>
                                  </div>
                                  <div class="card-second-content">
                                     <div class="card_row_3">
                                      <span class="est">Price per sq ft (in USD)</span>
                                      <div class="incremnt_decrmnt number for_alternative">
                                      <span class="minus">-</span>
                                      <input type="text" value="1">
                                      <span class="plus">+</span>   
                                  </div>
                                  </div>
                                  <div class="card_row_3">
                                  <span class="est">Est Duration</span>
                                  <div class="incremnt_decrmnt number for_alternative">
                                      <span class="minus">-</span>
                                      <input type="text" value="1">
                                      <span class="plus">+</span>   
                                  </div>
                                  </div>
                                  <div class="btn_text">
                                  <p class="text_3">This would equal.... <span class="price">$300</span> on the average <span class="area">1,500 sq</span> ft home</p>
                                  <button class="btn_blue">Save</button>
                                  </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-xl-6 col-md-6 col-sm-12">
                              <div class="card_collapse_service common_card_service show">
                                  <div class="heder_row">
                                   <h3>Routine - Every 4 Weeks</h3>
                                  <div class="form-check form-switch">
                                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                  </div>
                                  </div>
                                  <div class="card-edit-content">
                                      <p class="price-area-text"><span class="price_span">$225</span> <span class="area_span">per 1,500 sq ft</span></p>
                                      <p class="time">1:30 hrs</p>
                                      <p class="card_toggle_s">Edit</p>
                                  </div>
                                  <div class="card-second-content">
                                     <div class="card_row_3">
                                      <span class="est">Price per sq ft (in USD)</span>
                                      <div class="incremnt_decrmnt number for_alternative">
                                      <span class="minus">-</span>
                                      <input type="text" value="1">
                                      <span class="plus">+</span>   
                                  </div>
                                  </div>
                                  <div class="card_row_3">
                                  <span class="est">Est Duration</span>
                                  <div class="incremnt_decrmnt number for_alternative">
                                      <span class="minus">-</span>
                                      <input type="text" value="1">
                                      <span class="plus">+</span>   
                                  </div>
                                  </div>
                                  <div class="btn_text">
                                  <p class="text_3">This would equal.... <span class="price">$300</span> on the average <span class="area">1,500 sq</span> ft home</p>
                                  <button class="btn_blue">Save</button>
                                  </div>
                                  </div>
                              </div>
                         </div>
                         <div class="col-xl-6 col-md-6 col-sm-12">
                          <div class="card_collapse_service common_card_service show">
                              <div class="heder_row">
                               <h3>Routine - Every 8 Weeks</h3>
                              <div class="form-check form-switch">
                                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                              </div>
                              </div>
                              <div class="card-edit-content">
                                  <p class="price-area-text"><span class="price_span">$225</span> <span class="area_span">per 1,500 sq ft</span></p>
                                  <p class="time">1:30 hrs</p>
                                  <p class="card_toggle_s">Edit</p>
                              </div>
                              <div class="card-second-content">
                                 <div class="card_row_3">
                                  <span class="est">Price per sq ft (in USD)</span>
                                  <div class="incremnt_decrmnt number for_alternative">
                                  <span class="minus">-</span>
                                  <input type="text" value="1">
                                  <span class="plus">+</span>   
                              </div>
                              </div>
                              <div class="card_row_3">
                              <span class="est">Est Duration</span>
                              <div class="incremnt_decrmnt number for_alternative">
                                  <span class="minus">-</span>
                                  <input type="text" value="1">
                                  <span class="plus">+</span>   
                              </div>
                              </div>
                              <div class="btn_text">
                              <p class="text_3">This would equal.... <span class="price">$300</span> on the average <span class="area">1,500 sq</span> ft home</p>
                              <button class="btn_blue">Save</button>
                              </div>
                              </div>
                          </div>
                         </div>
                  </div>
                </div>
                <!-- Quotes Sec -->
                <div class="home-quotes-sec">
                   <div class="bigger-home-save-link">
                    <a href="#" class="link-design-2 py-3"> Bigger homes save you time on travel and setup. We recommend offering sq ft discounts to large and extra-large sized homes. Standard discounts are 10% and 20%.</a> 
                   </div>
                   <div class="home-discount-counter">
                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
                      <div class="incremnt_input_div py-3">
              
                          <div class="incremnt_decrmnt number">
                            <input type="text" value="1">
                            <span class="plus">+</span>
                            <span class="minus">-</span>
                          </div>
                          <h5>Large Home Discount (2,001-3,500 sq ft)</h5>
                        </div>
                        <div class="incremnt_input_div pb-3">
              
                          <div class="incremnt_decrmnt number">
                            <input type="text" value="1">
                            <span class="plus">+</span>
                            <span class="minus">-</span>
                          </div>
                          <h5>XL Home Discount (3,501 and up sq ft)</h5>
                        </div>
                   </div>
                   </div>
                   <div class="btn_text_service">
                    <p>A note about Est Durations: We recommend you start on the higher side and lower if you find you are completing jobs faster. Find a rule-of-thumb guide <a href="#" class="link-design-2">here.</a></p>
                   </div>
                </div>
                <!-- Home Add Ons header -->
                <div class="alternate-service-header">
                  <div class="row">
                   <div class="col-xl-6 col-md-6 col-sm-12">
                     <div class="home_cleaning_div">
                    <div class="card_header_tittle">
                      <h3>Home Add-Ons</h3>
                        <p> which add-ons you would like to offer with your full home cleanings</p>
                    </div>
                 </div>
                 </div>
                 </div>
                </div>
                  <!-- Home Add Ons Row -->
                  <div class="card_service_row">
                    <div class="row">
                        <div class="col-xl-6 col-md-6 col-sm-12">
                        <div class="btn_header_service py-3">
                                <h4 class="mb-0 btn_blue">Your Home Add-Ons</h4>
                                <div class="form-check form-switch heading-toggle active-toggle">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                  </div>
                        </div>
                        </div>
                        </div>
                    <div class="row">
                            <div class="col-xl-6 col-md-6 col-sm-12">
                                <div class="card_collapse_service common_card_service show">
                                    <div class="heder_row">
                                     <h3>Garage - up to 2 car size - sweep only</h3>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                    </div>
                                    </div>
                                    <div class="card-edit-content">
                                        <p class="price-area-text"><span class="price_span">$225</span> <span class="area_span">per 1,500 sq ft</span></p>
                                        <p class="time">1:30 hrs</p>
                                        <p class="card_toggle_s">Edit</p>
                                    </div>
                                    <div class="card-second-content">
                                         <div class="card_row_3">
                                        <span class="est">Price (in USD)</span>
                                        <div class="incremnt_decrmnt number for_alternative">
                                        <span class="minus">-</span>
                                        <input type="text" value="1">
                                        <span class="plus">+</span>   
                                    </div>
                                    </div>
                                    <div class="card_row_3">
                                    <span class="est">Est Duration</span>
                                    <div class="incremnt_decrmnt number for_alternative">
                                        <span class="minus">-</span>
                                        <input type="text" value="1">
                                        <span class="plus">+</span>   
                                    </div>
                                    </div>
                                    <div class="btn_text">
                                    <p class="text_3">This would equal.... <span class="price">$300</span> on the average <span class="area">1,500 sq</span> ft home</p>
                                    <button class="btn_blue">Save</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-12">
                                <div class="card_collapse_service common_card_service show">
                                    <div class="heder_row">
                                     <h3>Garage - up to 4 car size - sweep only</h3>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                    </div>
                                    </div>
                                    <div class="card-edit-content">
                                        <p class="price-area-text"><span class="price_span">$225</span> <span class="area_span">per 1,500 sq ft</span></p>
                                        <p class="time">1:30 hrs</p>
                                        <p class="card_toggle_s">Edit</p>
                                    </div>
                                    <div class="card-second-content">
                                         <div class="card_row_3">
                                        <span class="est">Price (in USD)</span>
                                        <div class="incremnt_decrmnt number for_alternative">
                                        <span class="minus">-</span>
                                        <input type="text" value="1">
                                        <span class="plus">+</span>   
                                    </div>
                                    </div>
                                    <div class="card_row_3">
                                    <span class="est">Est Duration</span>
                                    <div class="incremnt_decrmnt number for_alternative">
                                        <span class="minus">-</span>
                                        <input type="text" value="1">
                                        <span class="plus">+</span>   
                                    </div>
                                    </div>
                                    <div class="btn_text">
                                    <p class="text_3">This would equal.... <span class="price">$300</span> on the average <span class="area">1,500 sq</span> ft home</p>
                                    <button class="btn_blue">Save</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-12">
                                <div class="card_collapse_service common_card_service show">
                                    <div class="heder_row">
                                     <h3>Patio/Porch - sweep and dust only</h3>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                    </div>
                                    </div>
                                    <div class="card-edit-content">
                                        <p class="price-area-text"><span class="price_span">$225</span> <span class="area_span">per 1,500 sq ft</span></p>
                                        <p class="time">1:30 hrs</p>
                                        <p class="card_toggle_s">Edit</p>
                                    </div>
                                    <div class="card-second-content">
                                         <div class="card_row_3">
                                        <span class="est">Price (in USD)</span>
                                        <div class="incremnt_decrmnt number for_alternative">
                                        <span class="minus">-</span>
                                        <input type="text" value="1">
                                        <span class="plus">+</span>   
                                    </div>
                                    </div>
                                    <div class="card_row_3">
                                    <span class="est">Est Duration</span>
                                    <div class="incremnt_decrmnt number for_alternative">
                                        <span class="minus">-</span>
                                        <input type="text" value="1">
                                        <span class="plus">+</span>   
                                    </div>
                                    </div>
                                    <div class="btn_text">
                                    <p class="text_3">This would equal.... <span class="price">$300</span> on the average <span class="area">1,500 sq</span> ft home</p>
                                    <button class="btn_blue">Save</button>
                                    </div>
                                    </div>
                                </div>
                           </div>
                           <div class="col-xl-6 col-md-6 col-sm-12">
                            <div class="card_collapse_service common_card_service">
                                <div class="heder_row">
                                 <h3>Disinfecting Service</h3>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                </div>
                                </div>
                                <div class="card-edit-content">
                                    <p class="price-area-text"><span class="price_span">$225</span> <span class="area_span">per 1,500 sq ft</span></p>
                                    <p class="time">1:30 hrs</p>
                                    <p class="card_toggle_s">Edit</p>
                                </div>
                                <div class="card-second-content">
                                     <div class="card_row_3">
                                    <span class="est">Price (in USD)</span>
                                    <div class="incremnt_decrmnt number for_alternative">
                                    <span class="minus">-</span>
                                    <input type="text" value="1">
                                    <span class="plus">+</span>   
                                </div>
                                </div>
                                <div class="card_row_3">
                                <span class="est">Est Duration</span>
                                <div class="incremnt_decrmnt number for_alternative">
                                    <span class="minus">-</span>
                                    <input type="text" value="1">
                                    <span class="plus">+</span>   
                                </div>
                                </div>
                                <div class="btn_text">
                                <p class="text_3">This would equal.... <span class="price">$300</span> on the average <span class="area">1,500 sq</span> ft home</p>
                                <button class="btn_blue">Save</button>
                                </div>
                                </div>
                            </div>
                           </div>
                           <div class="col-xl-6 col-md-6 col-sm-12">
                            <div class="card_collapse_service common_card_service show">
                                <div class="heder_row">
                                 <h3>Appliance In/Out</h3>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                </div>
                                </div>
                                <div class="card-edit-content">
                                    <p class="price-area-text"><span class="price_span">$225</span> <span class="area_span">per 1,500 sq ft</span></p>
                                    <p class="time">1:30 hrs</p>
                                    <p class="card_toggle_s">Edit</p>
                                </div>
                                <div class="card-second-content">
                                     <div class="card_row_3">
                                    <span class="est">Price (in USD)</span>
                                    <div class="incremnt_decrmnt number for_alternative">
                                    <span class="minus">-</span>
                                    <input type="text" value="1">
                                    <span class="plus">+</span>   
                                </div>
                                </div>
                                <div class="card_row_3">
                                <span class="est">Est Duration</span>
                                <div class="incremnt_decrmnt number for_alternative">
                                    <span class="minus">-</span>
                                    <input type="text" value="1">
                                    <span class="plus">+</span>   
                                </div>
                                </div>
                                <div class="btn_text">
                                <p class="text_3">This would equal.... <span class="price">$300</span> on the average <span class="area">1,500 sq</span> ft home</p>
                                <button class="btn_blue">Save</button>
                                </div>
                                </div>
                            </div>
                           </div>
                           <div class="col-xl-6 col-md-6 col-sm-12">
                            <div class="card_collapse_service common_card_service show">
                                <div class="heder_row">
                                 <h3>Inside Windows - under 3,000 sq ft home</h3>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                </div>
                                </div>
                                <div class="card-edit-content">
                                    <p class="price-area-text"><span class="price_span">$225</span> <span class="area_span">per 1,500 sq ft</span></p>
                                    <p class="time">1:30 hrs</p>
                                    <p class="card_toggle_s">Edit</p>
                                </div>
                                <div class="card-second-content">
                                     <div class="card_row_3">
                                    <span class="est">Price (in USD)</span>
                                    <div class="incremnt_decrmnt number for_alternative">
                                    <span class="minus">-</span>
                                    <input type="text" value="1">
                                    <span class="plus">+</span>   
                                </div>
                                </div>
                                <div class="card_row_3">
                                <span class="est">Est Duration</span>
                                <div class="incremnt_decrmnt number for_alternative">
                                    <span class="minus">-</span>
                                    <input type="text" value="1">
                                    <span class="plus">+</span>   
                                </div>
                                </div>
                                <div class="btn_text">
                                <p class="text_3">This would equal.... <span class="price">$300</span> on the average <span class="area">1,500 sq</span> ft home</p>
                                <button class="btn_blue">Save</button>
                                </div>
                                </div>
                            </div>
                           </div>
                           <div class="col-xl-6 col-md-6 col-sm-12">
                            <div class="card_collapse_service common_card_service show">
                                <div class="heder_row">
                                 <h3>Inside Windows - over 3,000 sq ft home</h3>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                </div>
                                </div>
                                <div class="card-edit-content">
                                    <p class="price-area-text"><span class="price_span">$225</span> <span class="area_span">per 1,500 sq ft</span></p>
                                    <p class="time">1:30 hrs</p>
                                    <p class="card_toggle_s">Edit</p>
                                </div>
                                <div class="card-second-content">
                                     <div class="card_row_3">
                                    <span class="est">Price (in USD)</span>
                                    <div class="incremnt_decrmnt number for_alternative">
                                    <span class="minus">-</span>
                                    <input type="text" value="1">
                                    <span class="plus">+</span>   
                                </div>
                                </div>
                                <div class="card_row_3">
                                <span class="est">Est Duration</span>
                                <div class="incremnt_decrmnt number for_alternative">
                                    <span class="minus">-</span>
                                    <input type="text" value="1">
                                    <span class="plus">+</span>   
                                </div>
                                </div>
                                <div class="btn_text">
                                <p class="text_3">This would equal.... <span class="price">$300</span> on the average <span class="area">1,500 sq</span> ft home</p>
                                <button class="btn_blue">Save</button>
                                </div>
                                </div>
                            </div>
                           </div>
                           <div class="col-xl-6 col-md-6 col-sm-12">
                            <div class="card_collapse_service common_card_service">
                                <div class="heder_row">
                                 <h3>Handwash Dishes - per sink full</h3>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                </div>
                                </div>
                                <div class="card-edit-content">
                                    <p class="price-area-text"><span class="price_span">$225</span> <span class="area_span">per 1,500 sq ft</span></p>
                                    <p class="time">1:30 hrs</p>
                                    <p class="card_toggle_s">Edit</p>
                                </div>
                                <div class="card-second-content">
                                     <div class="card_row_3">
                                    <span class="est">Price (in USD)</span>
                                    <div class="incremnt_decrmnt number for_alternative">
                                    <span class="minus">-</span>
                                    <input type="text" value="1">
                                    <span class="plus">+</span>   
                                </div>
                                </div>
                                <div class="card_row_3">
                                <span class="est">Est Duration</span>
                                <div class="incremnt_decrmnt number for_alternative">
                                    <span class="minus">-</span>
                                    <input type="text" value="1">
                                    <span class="plus">+</span>   
                                </div>
                                </div>
                                <div class="btn_text">
                                <p class="text_3">This would equal.... <span class="price">$300</span> on the average <span class="area">1,500 sq</span> ft home</p>
                                <button class="btn_blue">Save</button>
                                </div>
                                </div>
                            </div>
                           </div>
                           <div class="col-xl-6 col-md-6 col-sm-12">
                            <div class="card_collapse_service common_card_service">
                                <div class="heder_row">
                                 <h3>Spot Wipe Walls - per wall</h3>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                </div>
                                </div>
                                <div class="card-edit-content">
                                    <p class="price-area-text"><span class="price_span">$225</span> <span class="area_span">per 1,500 sq ft</span></p>
                                    <p class="time">1:30 hrs</p>
                                    <p class="card_toggle_s">Edit</p>
                                </div>
                                <div class="card-second-content">
                                     <div class="card_row_3">
                                    <span class="est">Price (in USD)</span>
                                    <div class="incremnt_decrmnt number for_alternative">
                                    <span class="minus">-</span>
                                    <input type="text" value="1">
                                    <span class="plus">+</span>   
                                </div>
                                </div>
                                <div class="card_row_3">
                                <span class="est">Est Duration</span>
                                <div class="incremnt_decrmnt number for_alternative">
                                    <span class="minus">-</span>
                                    <input type="text" value="1">
                                    <span class="plus">+</span>   
                                </div>
                                </div>
                                <div class="btn_text">
                                <p class="text_3">This would equal.... <span class="price">$300</span> on the average <span class="area">1,500 sq</span> ft home</p>
                                <button class="btn_blue">Save</button>
                                </div>
                                </div>
                            </div>
                           </div>
                    </div>
                  </div>
                   <!-- Non Standard Cleaning header -->
                   <div class="alternate-service-header">
                    <div class="row">
                     <div class="col-xl-6 col-md-6 col-sm-12">
                       <div class="home_cleaning_div">
                      <div class="card_header_tittle">
                        <h3>Non-Standard Cleanings</h3>
                          <p>Add whatever other cleanings you would like to offer here. </p>
                      </div>
                   </div>
                   </div>
                   </div>
                  </div>
                     <!-- Non Standard Cleaning Row -->
                     <div class="card_service_row">
                      <div class="row">
                        <div class="col-xl-6 col-md-6 col-sm-12">
                        <div class="btn_header_service py-3">
                                <h4 class="mb-0 btn_blue">Custom Offerings</h4>
                                <div class="form-check form-switch heading-toggle active-toggle">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                  </div>
                        </div>
                        </div>
                        </div>
                      <div class="row">
                              <div class="col-xl-6 col-md-6 col-sm-12">
                                  <div class="card_collapse_service common_card_service show">
                                      <div class="heder_row">
                                       <h3>Car - Interior</h3>
                                      <div class="form-check form-switch">
                                          <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                      </div>
                                      </div>
                                      <div class="card-edit-content">
                                          <p class="price-area-text"><span class="price_span">$225</span> <span class="area_span">per 1,500 sq ft</span></p>
                                          <p class="time">1:30 hrs</p>
                                          <p class="card_toggle_s">Edit</p>
                                      </div>
                                      <div class="card-second-content">
                                         <div class="card_row_3">
                                          <span class="est">Price (in USD)</span>
                                          <div class="incremnt_decrmnt number for_alternative">
                                          <span class="minus">-</span>
                                          <input type="text" value="1">
                                          <span class="plus">+</span>   
                                      </div>
                                      </div>
                                      <div class="card_row_3">
                                      <span class="est">Est Duration</span>
                                      <div class="incremnt_decrmnt number for_alternative">
                                          <span class="minus">-</span>
                                          <input type="text" value="1">
                                          <span class="plus">+</span>   
                                      </div>
                                      </div>
                                      <div class="btn_text">
                                      <p class="text_3">This would equal.... <span class="price">$300</span> on the average <span class="area">1,500 sq</span> ft home</p>
                                      <button class="btn_blue">Save</button>
                                      </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-xl-6 col-md-6 col-sm-12">
                                  <div class="card_collapse_service common_card_service">
                                      <div class="heder_row">
                                       <h3>Car - Exterior</h3>
                                      <div class="form-check form-switch">
                                          <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                      </div>
                                      </div>
                                      <div class="card-edit-content">
                                          <p class="price-area-text"><span class="price_span">$225</span> <span class="area_span">per 1,500 sq ft</span></p>
                                          <p class="time">1:30 hrs</p>
                                          <p class="card_toggle_s">Edit</p>
                                      </div>
                                      <div class="card-second-content">
                                         <div class="card_row_3">
                                          <span class="est">Price (in USD)</span>
                                          <div class="incremnt_decrmnt number for_alternative">
                                          <span class="minus">-</span>
                                          <input type="text" value="1">
                                          <span class="plus">+</span>   
                                      </div>
                                      </div>
                                      <div class="card_row_3">
                                      <span class="est">Est Duration</span>
                                      <div class="incremnt_decrmnt number for_alternative">
                                          <span class="minus">-</span>
                                          <input type="text" value="1">
                                          <span class="plus">+</span>   
                                      </div>
                                      </div>
                                      <div class="btn_text">
                                      <p class="text_3">This would equal.... <span class="price">$300</span> on the average <span class="area">1,500 sq</span> ft home</p>
                                      <button class="btn_blue">Save</button>
                                      </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-xl-6 col-md-6 col-sm-12">
                                  <div class="card_collapse_service common_card_service">
                                      <div class="heder_row">
                                       <h3>Car - Interior and Exterior</h3>
                                      <div class="form-check form-switch">
                                          <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                      </div>
                                      </div>
                                      <div class="card-edit-content">
                                          <p class="price-area-text"><span class="price_span">$225</span> <span class="area_span">per 1,500 sq ft</span></p>
                                          <p class="time">1:30 hrs</p>
                                          <p class="card_toggle_s">Edit</p>
                                      </div>
                                      <div class="card-second-content">
                                         <div class="card_row_3">
                                          <span class="est">Price (in USD)</span>
                                          <div class="incremnt_decrmnt number for_alternative">
                                          <span class="minus">-</span>
                                          <input type="text" value="1">
                                          <span class="plus">+</span>   
                                      </div>
                                      </div>
                                      <div class="card_row_3">
                                      <span class="est">Est Duration</span>
                                      <div class="incremnt_decrmnt number for_alternative">
                                          <span class="minus">-</span>
                                          <input type="text" value="1">
                                          <span class="plus">+</span>   
                                      </div>
                                      </div>
                                      <div class="btn_text">
                                      <p class="text_3">This would equal.... <span class="price">$300</span> on the average <span class="area">1,500 sq</span> ft home</p>
                                      <button class="btn_blue">Save</button>
                                      </div>
                                      </div>
                                  </div>
                             </div>
                             <div class="col-xl-6 col-md-6 col-sm-12">
                              <div class="card_collapse_service common_card_service">
                                  <div class="heder_row">
                                   <h3>Truck/SUV - Interior</h3>
                                  <div class="form-check form-switch">
                                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                  </div>
                                  </div>
                                  <div class="card-edit-content">
                                      <p class="price-area-text"><span class="price_span">$225</span> <span class="area_span">per 1,500 sq ft</span></p>
                                      <p class="time">1:30 hrs</p>
                                      <p class="card_toggle_s">Edit</p>
                                  </div>
                                  <div class="card-second-content">
                                     <div class="card_row_3">
                                      <span class="est">Price (in USD)</span>
                                      <div class="incremnt_decrmnt number for_alternative">
                                      <span class="minus">-</span>
                                      <input type="text" value="1">
                                      <span class="plus">+</span>   
                                  </div>
                                  </div>
                                  <div class="card_row_3">
                                  <span class="est">Est Duration</span>
                                  <div class="incremnt_decrmnt number for_alternative">
                                      <span class="minus">-</span>
                                      <input type="text" value="1">
                                      <span class="plus">+</span>   
                                  </div>
                                  </div>
                                  <div class="btn_text">
                                  <p class="text_3">This would equal.... <span class="price">$300</span> on the average <span class="area">1,500 sq</span> ft home</p>
                                  <button class="btn_blue">Save</button>
                                  </div>
                                  </div>
                              </div>
                             </div>
                             <div class="col-xl-6 col-md-6 col-sm-12">
                              <div class="card_collapse_service common_card_service">
                                  <div class="heder_row">
                                   <h3>Truck/SUV - Exterior</h3>
                                  <div class="form-check form-switch">
                                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                  </div>
                                  </div>
                                  <div class="card-edit-content">
                                      <p class="price-area-text"><span class="price_span">$225</span> <span class="area_span">per 1,500 sq ft</span></p>
                                      <p class="time">1:30 hrs</p>
                                      <p class="card_toggle_s">Edit</p>
                                  </div>
                                  <div class="card-second-content">
                                     <div class="card_row_3">
                                      <span class="est">Price (in USD)</span>
                                      <div class="incremnt_decrmnt number for_alternative">
                                      <span class="minus">-</span>
                                      <input type="text" value="1">
                                      <span class="plus">+</span>   
                                  </div>
                                  </div>
                                  <div class="card_row_3">
                                  <span class="est">Est Duration</span>
                                  <div class="incremnt_decrmnt number for_alternative">
                                      <span class="minus">-</span>
                                      <input type="text" value="1">
                                      <span class="plus">+</span>   
                                  </div>
                                  </div>
                                  <div class="btn_text">
                                  <p class="text_3">This would equal.... <span class="price">$300</span> on the average <span class="area">1,500 sq</span> ft home</p>
                                  <button class="btn_blue">Save</button>
                                  </div>
                                  </div>
                              </div>
                             </div>
                             <div class="col-xl-6 col-md-6 col-sm-12">
                              <div class="card_collapse_service common_card_service">
                                  <div class="heder_row">
                                   <h3>Truck/SUV - Interior and Exterior</h3>
                                  <div class="form-check form-switch">
                                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                  </div>
                                  </div>
                                  <div class="card-edit-content">
                                      <p class="price-area-text"><span class="price_span">$225</span> <span class="area_span">per 1,500 sq ft</span></p>
                                      <p class="time">1:30 hrs</p>
                                      <p class="card_toggle_s">Edit</p>
                                  </div>
                                  <div class="card-second-content">
                                     <div class="card_row_3">
                                      <span class="est">Price (in USD)</span>
                                      <div class="incremnt_decrmnt number for_alternative">
                                      <span class="minus">-</span>
                                      <input type="text" value="1">
                                      <span class="plus">+</span>   
                                  </div>
                                  </div>
                                  <div class="card_row_3">
                                  <span class="est">Est Duration</span>
                                  <div class="incremnt_decrmnt number for_alternative">
                                      <span class="minus">-</span>
                                      <input type="text" value="1">
                                      <span class="plus">+</span>   
                                  </div>
                                  </div>
                                  <div class="btn_text">
                                  <p class="text_3">This would equal.... <span class="price">$300</span> on the average <span class="area">1,500 sq</span> ft home</p>
                                  <button class="btn_blue">Save</button>
                                  </div>
                                  </div>
                              </div>
                             </div>
                             <div class="col-xl-6 col-md-6 col-sm-12">
                              <div class="card_collapse_service common_card_service show">
                                  <div class="heder_row">
                                   <h3>Floor Boards Only</h3>
                                  <div class="form-check form-switch">
                                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                  </div>
                                  </div>
                                  <div class="card-edit-content">
                                      <p class="price-area-text"><span class="price_span">$225</span> <span class="area_span">per 1,500 sq ft</span></p>
                                      <p class="time">1:30 hrs</p>
                                      <p class="card_toggle_s">Edit</p>
                                  </div>
                                  <div class="card-second-content">
                                     <div class="card_row_3">
                                      <span class="est">Price (in USD)</span>
                                      <div class="incremnt_decrmnt number for_alternative">
                                      <span class="minus">-</span>
                                      <input type="text" value="1">
                                      <span class="plus">+</span>   
                                  </div>
                                  </div>
                                  <div class="card_row_3">
                                  <span class="est">Est Duration</span>
                                  <div class="incremnt_decrmnt number for_alternative">
                                      <span class="minus">-</span>
                                      <input type="text" value="1">
                                      <span class="plus">+</span>   
                                  </div>
                                  </div>
                                  <div class="btn_text">
                                  <p class="text_3">This would equal.... <span class="price">$300</span> on the average <span class="area">1,500 sq</span> ft home</p>
                                  <button class="btn_blue">Save</button>
                                  </div>
                                  </div>
                              </div>
                             </div>
                             <div class="col-xl-6 col-md-6 col-sm-12">
                              <div class="card_collapse_service common_card_service show">
                                  <div class="heder_row">
                                   <h3>Bathrooms Only - per each</h3>
                                  <div class="form-check form-switch">
                                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                  </div>
                                  </div>
                                  <div class="card-edit-content">
                                      <p class="price-area-text"><span class="price_span">$225</span> <span class="area_span">per 1,500 sq ft</span></p>
                                      <p class="time">1:30 hrs</p>
                                      <p class="card_toggle_s">Edit</p>
                                  </div>
                                  <div class="card-second-content">
                                     <div class="card_row_3">
                                      <span class="est">Price (in USD)</span>
                                      <div class="incremnt_decrmnt number for_alternative">
                                      <span class="minus">-</span>
                                      <input type="text" value="1">
                                      <span class="plus">+</span>   
                                  </div>
                                  </div>
                                  <div class="card_row_3">
                                  <span class="est">Est Duration</span>
                                  <div class="incremnt_decrmnt number for_alternative">
                                      <span class="minus">-</span>
                                      <input type="text" value="1">
                                      <span class="plus">+</span>   
                                  </div>
                                  </div>
                                  <div class="btn_text">
                                  <p class="text_3">This would equal.... <span class="price">$300</span> on the average <span class="area">1,500 sq</span> ft home</p>
                                  <button class="btn_blue">Save</button>
                                  </div>
                                  </div>
                              </div>
                             </div>
                             <div class="col-xl-6 col-md-6 col-sm-12">
                              <div class="card_collapse_service common_card_service">
                                  <div class="heder_row">
                                   <h3>Half Bathrooms Only - per each</h3>
                                  <div class="form-check form-switch">
                                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                  </div>
                                  </div>
                                  <div class="card-edit-content">
                                      <p class="price-area-text"><span class="price_span">$225</span> <span class="area_span">per 1,500 sq ft</span></p>
                                      <p class="time">1:30 hrs</p>
                                      <p class="card_toggle_s">Edit</p>
                                  </div>
                                  <div class="card-second-content">
                                     <div class="card_row_3">
                                      <span class="est">Price (in USD)</span>
                                      <div class="incremnt_decrmnt number for_alternative">
                                      <span class="minus">-</span>
                                      <input type="text" value="1">
                                      <span class="plus">+</span>   
                                  </div>
                                  </div>
                                  <div class="card_row_3">
                                  <span class="est">Est Duration</span>
                                  <div class="incremnt_decrmnt number for_alternative">
                                      <span class="minus">-</span>
                                      <input type="text" value="1">
                                      <span class="plus">+</span>   
                                  </div>
                                  </div>
                                  <div class="btn_text">
                                  <p class="text_3">This would equal.... <span class="price">$300</span> on the average <span class="area">1,500 sq</span> ft home</p>
                                  <button class="btn_blue">Save</button>
                                  </div>
                                  </div>
                              </div>
                             </div>
                             <div class="col-xl-6 col-md-6 col-sm-12">
                              <div class="card_collapse_service common_card_service show">
                                  <div class="heder_row">
                                   <h3>Organize Kids Bedroom - light</h3>
                                  <div class="form-check form-switch">
                                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                  </div>
                                  </div>
                                  <div class="card-edit-content">
                                      <p class="price-area-text"><span class="price_span">$225</span> <span class="area_span">per 1,500 sq ft</span></p>
                                      <p class="time">1:30 hrs</p>
                                      <p class="card_toggle_s">Edit</p>
                                  </div>
                                  <div class="card-second-content">
                                     <div class="card_row_3">
                                      <span class="est">Price (in USD)</span>
                                      <div class="incremnt_decrmnt number for_alternative">
                                      <span class="minus">-</span>
                                      <input type="text" value="1">
                                      <span class="plus">+</span>   
                                  </div>
                                  </div>
                                  <div class="card_row_3">
                                  <span class="est">Est Duration</span>
                                  <div class="incremnt_decrmnt number for_alternative">
                                      <span class="minus">-</span>
                                      <input type="text" value="1">
                                      <span class="plus">+</span>   
                                  </div>
                                  </div>
                                  <div class="btn_text">
                                  <p class="text_3">This would equal.... <span class="price">$300</span> on the average <span class="area">1,500 sq</span> ft home</p>
                                  <button class="btn_blue">Save</button>
                                  </div>
                                  </div>
                              </div>
                             </div>
                             <div class="col-xl-6 col-md-6 col-sm-12">
                              <div class="card_collapse_service common_card_service">
                                  <div class="heder_row">
                                   <h3>Organize Bedroom - light</h3>
                                  <div class="form-check form-switch">
                                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                  </div>
                                  </div>
                                  <div class="card-edit-content">
                                      <p class="price-area-text"><span class="price_span">$225</span> <span class="area_span">per 1,500 sq ft</span></p>
                                      <p class="time">1:30 hrs</p>
                                      <p class="card_toggle_s">Edit</p>
                                  </div>
                                  <div class="card-second-content">
                                     <div class="card_row_3">
                                      <span class="est">Price (in USD)</span>
                                      <div class="incremnt_decrmnt number for_alternative">
                                      <span class="minus">-</span>
                                      <input type="text" value="1">
                                      <span class="plus">+</span>   
                                  </div>
                                  </div>
                                  <div class="card_row_3">
                                  <span class="est">Est Duration</span>
                                  <div class="incremnt_decrmnt number for_alternative">
                                      <span class="minus">-</span>
                                      <input type="text" value="1">
                                      <span class="plus">+</span>   
                                  </div>
                                  </div>
                                  <div class="btn_text">
                                  <p class="text_3">This would equal.... <span class="price">$300</span> on the average <span class="area">1,500 sq</span> ft home</p>
                                  <button class="btn_blue">Save</button>
                                  </div>
                                  </div>
                              </div>
                             </div>
                             <div class="col-xl-6 col-md-6 col-sm-12">
                              <div class="card_collapse_service common_card_service">
                                  <div class="heder_row">
                                   <h3>Laundry - wash and dry - per load</h3>
                                  <div class="form-check form-switch">
                                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                  </div>
                                  </div>
                                  <div class="card-edit-content">
                                      <p class="price-area-text"><span class="price_span">$225</span> <span class="area_span">per 1,500 sq ft</span></p>
                                      <p class="time">1:30 hrs</p>
                                      <p class="card_toggle_s">Edit</p>
                                  </div>
                                  <div class="card-second-content">
                                     <div class="card_row_3">
                                      <span class="est">Price (in USD)</span>
                                      <div class="incremnt_decrmnt number for_alternative">
                                      <span class="minus">-</span>
                                      <input type="text" value="1">
                                      <span class="plus">+</span>   
                                  </div>
                                  </div>
                                  <div class="card_row_3">
                                  <span class="est">Est Duration</span>
                                  <div class="incremnt_decrmnt number for_alternative">
                                      <span class="minus">-</span>
                                      <input type="text" value="1">
                                      <span class="plus">+</span>   
                                  </div>
                                  </div>
                                  <div class="btn_text">
                                  <p class="text_3">This would equal.... <span class="price">$300</span> on the average <span class="area">1,500 sq</span> ft home</p>
                                  <button class="btn_blue">Save</button>
                                  </div>
                                  </div>
                              </div>
                             </div>
                             <div class="col-xl-6 col-md-6 col-sm-12">
                              <div class="card_collapse_service common_card_service show show-2">
                                  <div class="heder_row">
                                   <h3>Make Ready - Empty Home</h3>
                                  <div class="form-check form-switch">
                                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                  </div>
                                  </div>
                                  <div class="card-edit-content">
                                      <p class="price-area-text"><span class="price_span">$225</span> <span class="area_span">per 1,500 sq ft</span></p>
                                      <p class="time">1:30 hrs</p>
                                      <p class="card_toggle_s">Edit</p>
                                  </div>
                                  <div class="card-second-content">
                                     <div class="card_row_3">
                                      <span class="est">Price (in USD)</span>
                                      <div class="incremnt_decrmnt number for_alternative">
                                      <span class="minus">-</span>
                                      <input type="text" value="1">
                                      <span class="plus">+</span>   
                                  </div>
                                  </div>
                                  <div class="card_row_3">
                                  <span class="est">Est Duration</span>
                                  <div class="incremnt_decrmnt number for_alternative">
                                      <span class="minus">-</span>
                                      <input type="text" value="1">
                                      <span class="plus">+</span>   
                                  </div>
                                  </div>
                                  <div class="btn_text">
                                  <p class="text_3">This would equal.... <span class="price">$300</span> on the average <span class="area">1,500 sq</span> ft home</p>
                                  <button class="btn_blue">Save</button>
                                  </div>
                                  </div>
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


                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@extends('layouts.app')
@section('content')
<section class="light-banner customer-account-page" style="background-image: url('assets/images/white-pattern.png')">
    <div class="container">
        <div class="profile_page_section">
            

            @livewire('home.profile', ['cleanerId'=>request()->id])

            <div class="scheduled_div">
                <form>
                    <div class="scheduled_span pb-3">
                        <span>Schedule</span>
                    </div>

                    <div class="service_div pb-5">
                        <h4 class="h4_tittle"><span class="c_number">1</span>Select a service</h4>
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                <div class="row py-5">
                                    <div class="col-md-4 frst_sect select-design">
                                        <label>Cleaning Type</label>
                                        <div class="selecti-box">
                                            <select class="select-custom-design-group">
                                                <optgroup label="One-time">
                                                    <option> Move In / Out Cleans - Empty House</option>
                                                    <option>Deep Cleanings - Occupied House</option>
                                                    <option>Post Construction Cleanings</option>
                                                </optgroup>
                                                <optgroup label="Routine Service">
                                                    <option> Weekly </option>
                                                    <option>Every 2 Weeks</option>
                                                    <option>Every 4 Weeks</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class=" input-design">
                                            <label>Home Size</label>
                                            <input type="text" placeholder="Enter Square Feet">
                                        </div>
                                    </div>
                                    <div class="col-md-4 select-design">
                                        <label>Add-Ons</label>
                                        <div class="selecti-box">
                                            <select class="select-custom-design">
                                                <option>Garage up to 2 car size - sweep only</option>
                                                <option>Garage up to 2 car size - sweep only</option>
                                                <option>Patio/Porch - sweep and dust only</option>
                                                <option>Disinfecting Service</option>
                                                <option>Appliance In/Out</option>
                                                <option>Inside Windows - Homes under 3,000 sq ft</option>
                                                <option>Inside Windows - Homes over 3,000 sq ft</option>
                                                <option>Handwash Dishes - per sink full</option>
                                                <option>Spot wipe walls - per wall</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="time_price_div">
                            <div class="p_t_text">
                                <span class="bg_yellow">Estimated Time:</span>
                                <span class="rate">2.5 hrs</span>
                            </div>
                            <div class="p_t_text">
                                <span class="bg_yellow">Provider’s Price:</span>
                                <span class="rate">$200.00</span>
                            </div>
                        </div>
                        <div class="row justify-content-center pt-3">
                            <div class="col-sm-4 border-bottom">
                            </div>
                        </div>
                    </div>

                    <div class="choose_date_time">

                        <h4 class="h4_tittle"><span class="c_number">2</span>Choose a start date and time</h4>

                        <div class="date_time_calender">
                            <div id="start-end-date" class="calender-column-3"></div>
                        </div>
                        <div class="date_show">
                            <div class="d_text">
                                <span class="bg_yellow">Date:</span>
                                <span class="day_month_year">Wednesday, Feb 15 2022</span>
                            </div>
                            <p class="d-none d-md-block">Future recurring cleanings will be scheduled in the nearest availabel time slot. Please contact your cleaner if you need to reschedule any cleanings.</p>
                        </div>
                        <div class="row block_start_time">
                            <div class="col-md-3 select-design">
                                <div class="selecti-box">
                                    <select class="select-custom-design">
                                        <option>Show available time slots</option>
                                        <option>Early Morning 6a-9a</option>
                                        <option>Late Morning 9a-12p</option>
                                        <option>Early Afternoon 12p-3p</option>
                                        <option>Late Afternoon 3p-6p</option>
                                        <option>Unavailable</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center pt-3 pb-5">
                            <div class="col-sm-4 border-bottom">
                            </div>
                        </div>
                    </div>

                    <div class="click_to_schedule">

                        <h4 class="h4_tittle"><span class="c_number">3</span>Click to schedule </h4>

                        <button class="btn_c"><a href="build-checkout.html">Let’s Go!</a></button>
                        <div class="date_show d-md-none d-block ">
                            <p>Future recurring cleanings will be scheduled in the nearest availabel time slot. Please contact your cleaner if you need to reschedule any cleanings.</p>
                        </div>
                    </div>
                </form>
            </div>

            <div class=" row mx-0 feedback_reviews_section profile_feedback_div">
                <h4 class="h4_tittle text-center">Customer Feedback</h4>
                <div class="card_reviews col-md-7">
                    <div class="name_img_star">
                        <img src="assets/images/reviewr_1.png" class="pr_img" />
                        <h5>Jenny Wilson</h5>
                        <div class="star_2">
                            <div class="input_star me-3">
                                <img src="assets/images/star.svg">
                                <img src="assets/images/star.svg">
                                <img src="assets/images/star.svg">
                                <img src="assets/images/star.svg">
                                <img src="assets/images/e_star.svg">
                            </div>
                            <span class="me-3">4 out of 5</span>
                            <span class="r_date">30 Aug 2021</span>
                        </div>
                    </div>
                    <p class="msg_reviewr">Vitae auctor habitasse viverra tincidunt sed faucibus. Donec nisi, scelerisque sed eget nibh ut vestibulum augue non. Integer faucibus aliquam morbi aliquam justo, bibendum nunc et. Dolor eu euismod luctus amet odio est. Vitae lobortis sed augue ut in integer augue massa.
                    </p>
                    <div class="likes_div">
                        <input type="checkbox" class="like_b">
                        <span class="ms-3"><b>2 </b>Likes</span>
                    </div>
                </div>

                <div class="card_reviews col-md-7">
                    <div class="name_img_star">
                        <img src="assets/images/reviewr_1.png" class="pr_img" />
                        <h5>Jenny Wilson</h5>
                        <div class="star_2">
                            <div class="input_star me-3">
                                <img src="assets/images/star.svg">
                                <img src="assets/images/star.svg">
                                <img src="assets/images/star.svg">
                                <img src="assets/images/star.svg">
                                <img src="assets/images/e_star.svg">
                            </div>
                            <span class="me-3">4 out of 5</span>
                            <span class="r_date">30 Aug 2021</span>
                        </div>
                    </div>
                    <p class="msg_reviewr">Vitae auctor habitasse viverra tincidunt sed faucibus. Donec nisi, scelerisque sed eget nibh ut vestibulum augue non. Integer faucibus aliquam morbi aliquam justo, bibendum nunc et. Dolor eu euismod luctus amet odio est. Vitae lobortis sed augue ut in integer augue massa.
                    </p>
                    <div class="likes_div">
                        <input type="checkbox" class="like_b">
                        <span class="ms-3"><b>2 </b>Likes</span>
                    </div>
                </div>

                <div class="card_reviews col-md-7">
                    <div class="name_img_star">
                        <img src="assets/images/reviewr_1.png" class="pr_img" />
                        <h5>Jenny Wilson</h5>
                        <div class="star_2">
                            <div class="input_star me-3">
                                <img src="assets/images/star.svg">
                                <img src="assets/images/star.svg">
                                <img src="assets/images/star.svg">
                                <img src="assets/images/star.svg">
                                <img src="assets/images/e_star.svg">
                            </div>
                            <span class="me-3">4 out of 5</span>
                            <span class="r_date">30 Aug 2021</span>
                        </div>
                    </div>
                    <p class="msg_reviewr">Vitae auctor habitasse viverra tincidunt sed faucibus. Donec nisi, scelerisque sed eget nibh ut vestibulum augue non. Integer faucibus aliquam morbi aliquam justo, bibendum nunc et. Dolor eu euismod luctus amet odio est. Vitae lobortis sed augue ut in integer augue massa.
                    </p>
                    <div class="likes_div">
                        <input type="checkbox" class="like_b">
                        <span class="ms-3"><b>2 </b>Likes</span>
                    </div>
                </div>

                <div class="btn_show_more">
                    <a href="#" class="">Show more</a>
                </div>

            </div>



        </div>
    </div>
</section>
@endsection
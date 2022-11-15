
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
                <a href="#"><img src="{{asset('assets/images/logo/logo.svg')}}"></a>
              </div>
           </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 no-padd">
          <div class="row no-mrg">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 no-padd cleaner-reviews_section">
                <div class="customer-account-forms ">
          
                    <div class="form-headeing-second top_heading feadback_tittle mb-5">
                      <h3 class=" ">Customer Feedback </h3>
                      <div class="stars_top">
                          <p class="review-totel-no">Totel Reviews: <span class="review-no">10</span></p>
                          <span>Overall Rating</span>
                          <img src="{{asset('assets/images/star.svg')}}" />
                          <span>4.5</span>
                      </div>
                    </div>

                    <div class="feedback_reviews_section">
                        <div class="card_reviews">
                          <div class="name_img_star">
                            <img src="{{asset('assets/images/reviewr_1.png')}}" class="pr_img"/>
                           <h5>Jenny Wilson</h5>
                           <div class="star_2">
                             <div class="input_star me-3">
                              <img src="{{asset('assets/images/star.svg')}}">
                              <img src="{{asset('assets/images/star.svg')}}">
                              <img src="{{asset('assets/images/star.svg')}}">
                              <img src="{{asset('assets/images/star.svg')}}">
                              <img src="{{asset('assets/images/e_star.svg')}}">
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

                        <div class="card_reviews">
                            <div class="name_img_star">
                              <img src="assets/images/reviewr_1.png" class="pr_img"/>
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

                          <div class="card_reviews">
                            <div class="name_img_star">
                              <img src="assets/images/reviewr_1.png" class="pr_img"/>
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
                          <div class="card_reviews">
                            <div class="name_img_star">
                              <img src="assets/images/reviewr_1.png" class="pr_img"/>
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
                          <div class="card_reviews">
                            <div class="name_img_star">
                              <img src="assets/images/reviewr_1.png" class="pr_img"/>
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
           </div>
        </div>
       </div>
       </div>
     </div>
   </section>
   
   @endsection
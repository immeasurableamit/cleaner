@extends('layouts.app')

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
           <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 customer-appoitments-alternative-section no-padd">
           <div class="customer-account-forms pe-4 ps-4">
              <div class="form-headeing-second appointment-heading">
                <h4>Appointments</h4>
              </div>
              <div class="scheduling-calender-design clender-design">
                <div id='calendar'></div>
              </div>

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
                    <div class="select-date-toggles">
                        <button class="service_toggle_s"></button>
                        <div class="service-main-service-column">    
                        <div class="altrntive_rw">
                          <p class="appointment_label">Time</p>
                          <p class="app-value">5:00 pm</p>
                        </div>
                        <div class="altrntive_rw">
                          <p class="appointment_label">Job</p>
                          <p class="app-value blue"><strong>Deep clean</strong></p>
                           </div>  
                           <div class="altrntive_rw">
                            <p class="appointment_label">Est Duration</p>
                              <p class="app-value">1:00 hrs</p>
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
                            <p class="appointment_label blue">Location</p>
                              <p class="app-value location blue">22559 Bear Dr., Applev...</p>
                           </div>  
                           <div class="altrntive_rw">
                            <p class="appointment_label">Price</p>
                              <p class="app-value">$130</p>
                           </div> 
                           <div class="altrntive_rw">
                            <p class="appointment_label">Status</p>
                               <a class="btn_q">Reschedule</a>
                               <a class="btn_x">Cancel</a>
                           </div>  
                           <div class="altrntive_rw">
                            <p class="appointment_label">Payment</p>
                              <p class="app-value">**2345 <a href="#" class="link-design-2">Edit</a></p>
                           </div> 
                           </div>
                           <div class="make-payment-early">
                            <a href="#">Make Payment Early</a>
                           </div>        
                    </div>

                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-2">
                  <div class="select-date-toggles">
                      <button class="service_toggle_s"></button>
                      <div class="service-main-service-column">    
                      <div class="altrntive_rw">
                        <p class="appointment_label">Time</p>
                        <p class="app-value">5:00 pm</p>
                      </div>
                      <div class="altrntive_rw">
                        <p class="appointment_label">Job</p>
                        <p class="app-value blue"><strong>Deep clean</strong></p>
                         </div>  
                         <div class="altrntive_rw">
                          <p class="appointment_label">Est Duration</p>
                            <p class="app-value">1:00 hrs</p>
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
                          <p class="appointment_label blue">Location</p>
                            <p class="app-value location blue">22559 Bear Dr., Applev...</p>
                         </div>  
                         <div class="altrntive_rw">
                          <p class="appointment_label">Price</p>
                            <p class="app-value">$130</p>
                         </div> 
                         <div class="altrntive_rw">
                          <p class="appointment_label">Status</p>
                           <p class="complete-status">Complete</p>
                         </div>  
                         <div class="altrntive_rw">
                          <p class="appointment_label">Payment</p>
                            <p class="app-value">**2345 <a href="#" class="link-design-2">Edit</a></p>
                         </div> 
                         </div>
                         <div class="make-payment-early">
                          <a href="#">Make Payment Early</a>
                         </div>        
                  </div>

              </div>
              <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-2">
                <div class="select-date-toggles">
                    <button class="service_toggle_s"></button>
                    <div class="service-main-service-column">    
                    <div class="altrntive_rw">
                      <p class="appointment_label">Time</p>
                      <p class="app-value">5:00 pm</p>
                    </div>
                    <div class="altrntive_rw">
                      <p class="appointment_label">Job</p>
                      <p class="app-value blue"><strong>Deep clean</strong></p>
                       </div>  
                       <div class="altrntive_rw">
                        <p class="appointment_label">Est Duration</p>
                          <p class="app-value">1:00 hrs</p>
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
                        <p class="appointment_label blue">Location</p>
                          <p class="app-value location blue">22559 Bear Dr., Applev...</p>
                       </div>  
                       <div class="altrntive_rw">
                        <p class="appointment_label">Price</p>
                          <p class="app-value">$130</p>
                       </div> 
                       <div class="altrntive_rw">
                        <p class="appointment_label">Status</p>
                           <a class="btn_q">Reschedule</a>
                           <a class="btn_x">Cancel</a>
                       </div>  
                       <div class="altrntive_rw">
                        <p class="appointment_label">Payment</p>
                          <p class="app-value">**2345 <a href="#" class="link-design-2">Edit</a></p>
                       </div> 
                       </div>
                       <div class="custom-dropdown rate-cleaner-dropdown">
                        <button type="button" class="btn  custom-dropdown-btn">Rate Cleaner</button>
                        <div class="custom-dropdown-block">
                          <div class="dropdown-header-list">
                            <h4>Rate this job</h4>
                            <button class="close"><img src="./assets/images/icons/x.svg"></button>
                          </div>
                          <div class="dropdown-header-cntnt">
                            <form>
                            <div class="star-rating">
                              <input type="radio" id="5-stars" name="rating" value="5" />
                              <label for="5-stars" class="star"><i class="far fa-star"></i></label>
                              <input type="radio" id="4-stars" name="rating" value="4" />
                              <label for="4-stars" class="star"><i class="far fa-star"></i></label>
                              <input type="radio" id="3-stars" name="rating" value="3" />
                              <label for="3-stars" class="star"><i class="far fa-star"></i></label>
                              <input type="radio" id="2-stars" name="rating" value="2" />
                              <label for="2-stars" class="star"><i class="far fa-star"></i></label>
                              <input type="radio" id="1-star" name="rating" value="1" />
                              <label for="1-star" class="star"><i class="far fa-star"></i></label>
                            </div>
                            <div class="form-grouph review-textarea-design">
                              <textarea placeholder="Enter review here"></textarea>
                            </div>
                            <div class="form-grouph submit-design">
                              <input type="submit" value="Submit Rating">
                            </div>
                            </form>
                          </div>
                        </div>
                       </div>        
                </div>

            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-2">
              <div class="select-date-toggles">
                  <button class="service_toggle_s"></button>
                  <div class="service-main-service-column">    
                  <div class="altrntive_rw">
                    <p class="appointment_label">Time</p>
                    <p class="app-value">5:00 pm</p>
                  </div>
                  <div class="altrntive_rw">
                    <p class="appointment_label">Job</p>
                    <p class="app-value blue"><strong>Deep clean</strong></p>
                     </div>  
                     <div class="altrntive_rw">
                      <p class="appointment_label">Est Duration</p>
                        <p class="app-value">1:00 hrs</p>
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
                      <p class="appointment_label blue">Location</p>
                        <p class="app-value location blue">22559 Bear Dr., Applev...</p>
                     </div>  
                     <div class="altrntive_rw">
                      <p class="appointment_label">Price</p>
                        <p class="app-value">$130</p>
                     </div> 
                     <div class="altrntive_rw">
                      <p class="appointment_label">Status</p>
                      <p class="complete-status">Complete</p>
                     </div>  
                     <div class="altrntive_rw">
                      <p class="appointment_label">Payment</p>
                        <p class="app-value">**2345 <a href="#" class="link-design-2">Edit</a></p>
                     </div> 
                     </div>
                     <div class="make-payment-early">
                      <a href="#">Make Payment Early</a>
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

   <script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prevYear,prev,next,nextYear today',
        center: 'title',
        right: 'dayGridMonth,dayGridWeek,dayGridDay'
      },
      initialDate: '2020-09-12',
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      dayMaxEvents: true, // allow "more" link when too many events
      events: [
        {
          title: 'All Day Event',
          start: '2020-09-01'
        },
        {
          title: 'Long Event',
          start: '2020-09-07',
          end: '2020-09-10'
        },
        {
          groupId: 999,
          title: 'Repeating Event',
          start: '2020-09-09T16:00:00'
        },
        {
          groupId: 999,
          title: 'Repeating Event',
          start: '2020-09-16T16:00:00'
        },
        {
          title: 'Conference',
          start: '2020-09-11',
          end: '2020-09-13'
        },
        {
          title: 'Meeting',
          start: '2020-09-12T10:30:00',
          end: '2020-09-12T12:30:00'
        },
        {
          title: 'Lunch',
          start: '2020-09-12T12:00:00'
        },
        {
          title: 'Meeting',
          start: '2020-09-12T14:30:00'
        },
        {
          title: 'Happy Hour',
          start: '2020-09-12T17:30:00'
        },
        {
          title: 'Dinner',
          start: '2020-09-12T20:00:00'
        },
        {
          title: 'Birthday Party',
          start: '2020-09-13T07:00:00'
        },
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2020-09-28'
        }
      ]
    });

    calendar.render();
  });
</script>

  <script>
    $(document).ready(function(){
      $(".toggle_r").click(function(){
        $(this).toggleClass("show");
        $(this).parent(".togler_row").toggleClass('show');
      });
    });
    </script>
     <script>
        $(document).ready(function(){
      $(".custom-dropdown-btn").click(function(){
        $(this).parent().toggleClass("show");
      });
      $(document).ready(function(){
      $(".close").click(function(){
        $(this).parents('.custom-dropdown').removeClass("show");
      });
    });
  });
        </script> 

@endsection 
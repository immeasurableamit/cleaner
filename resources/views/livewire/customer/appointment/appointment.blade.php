<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 no-padd">
    <div class="row no-mrg">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 customer-appoitments-alternative-section no-padd">
            <div class="customer-account-forms pe-4 ps-4">
                <div class="form-headeing-second appointment-heading">
                    <h4>Appointments</h4>
                </div>
                <!-- calender -->
                <div class="scheduling-calender-design clender-design" wire:ignore>
                    <div id='calendar'></div>
                </div>

                <div class="date_section">
                    <div class="form-headeing-second">
                        <h4 class="text-center">Select Date Above</h4>
                    </div>
                    <div class="date_show_v">
                        <button> Date </button>
                        <span>{{ $selectedDate }}</span>
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
                                        <a href="#" class="btn_b" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">Contact </a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <li class="c_text">Contact information</li>
                                            <li><a href="tel:512-558-5876" class="link-design-2 mt-3"><img src="{{asset('assets/images/icons/phone.svg')}}">512-558-5876</a></li>
                                            <li><a href="mailto:example@mail.com" class="link-design-2"><img src="{{asset('assets/images/icons/email.svg')}}">example@mail.com</a></li>
                                            <li><a href="#" class="link-design-2"><img src="{{asset('assets/images/icons/home.svg')}}">15648
                                                    Maple St, Austin, TX 78744</a></li>
                                            <li class="chat_with_member"><a href="message.html" class="btn_chat_member">Chat With
                                                    Member<img src="{{asset('assets/images/icons/email-2.svg')}}" /></a></li>
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
                                        <a href="#" class="btn_b" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">Contact </a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <li class="c_text">Contact information</li>
                                            <li><a href="tel:512-558-5876" class="link-design-2 mt-3"><img src="{{asset('assets/images/icons/phone.svg')}}">512-558-5876</a></li>
                                            <li><a href="mailto:example@mail.com" class="link-design-2"><img src="{{asset('assets/images/icons/email.svg')}}">example@mail.com</a></li>
                                            <li><a href="#" class="link-design-2"><img src="{{asset('assets/images/icons/home.svg')}}">15648
                                                    Maple St, Austin, TX 78744</a></li>
                                            <li class="chat_with_member"><a href="message.html" class="btn_chat_member">Chat With
                                                    Member<img src="{{asset('assets/images/icons/email-2.svg')}}" /></a></li>
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
                                        <a href="#" class="btn_b" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">Contact </a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <li class="c_text">Contact information</li>
                                            <li><a href="tel:512-558-5876" class="link-design-2 mt-3"><img src="{{asset('assets/images/icons/phone.svg')}}">512-558-5876</a></li>
                                            <li><a href="mailto:example@mail.com" class="link-design-2"><img src="{{asset('assets/images/icons/email.svg')}}">example@mail.com</a></li>
                                            <li><a href="#" class="link-design-2"><img src="{{asset('assets/images/icons/home.svg')}}">15648
                                                    Maple St, Austin, TX 78744</a></li>
                                            <li class="chat_with_member"><a href="message.html" class="btn_chat_member">Chat With
                                                    Member<img src="{{asset('assets/images/icons/email-2.svg')}}" /></a></li>
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
                                            <button class="close"><img src="{{asset('./assets/images/icons/x.svg')}}"></button>
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
                                        <a href="#" class="btn_b" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">Contact </a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <li class="c_text">Contact information</li>
                                            <li><a href="tel:512-558-5876" class="link-design-2 mt-3"><img src="{{asset('assets/images/icons/phone.svg')}}">512-558-5876</a></li>
                                            <li><a href="mailto:example@mail.com" class="link-design-2"><img src="{{asset('assets/images/icons/email.svg')}}">example@mail.com</a></li>
                                            <li><a href="#" class="link-design-2"><img src="{{asset('assets/images/icons/home.svg')}}">15648
                                                    Maple St, Austin, TX 78744</a></li>
                                            <li class="chat_with_member"><a href="message.html" class="btn_chat_member">Chat With
                                                    Member<img src="{{asset('assets/images/icons/email-2.svg')}}" /></a></li>
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

@push('scripts')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.js'></script>
<script>
    function renderCalendar(intialDate, events) {
        console.log(events);
        var calendarEl = document.getElementById('calendar');
      
        var event1 = @json($orders);
     
            console.log(event1);

        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next,today',
                center: 'title',
                right: ''
            },
            initialDate: intialDate,
            navLinks: false, // can click day/week names to navigate views
            editable: true,
            dayMaxEvents: true, // allow "more" link when too many events
            events: events,
            selectable: true,
            selectConstraint: {
                start: '00:01',
                end: '23:59',
            },

            dateClick: function(info) {
                console.log('date clicked');
                @this.set('selectedDate', info.dateStr);
                console.log(info.dateStr); //show clicked date
               
            },

        });

        window.calendar = calendar;

        calendar.render();
    }

    function makeBookingsCardToggalable() {
        $(".service_toggle_s").unbind('click');
        $(".service_toggle_s").click(function() {
            $(this).parent().toggleClass("show");
        });
    }

    window.addEventListener('renderCalendar', event => {

        console.log('updating events');
        window.calendarJsnEvents = event.detail.events;
        let date = "{{ $selectedDate }}";
        renderCalendar(date, event.detail.events);
    });

    window.addEventListener('renderOrders', makeBookingsCardToggalable);

    window.addEventListener('load', () => {

        /* Calendar Events */
        let events = @json($events);

        console.log(events);
        let date = "{{ $selectedDate }}";

        renderCalendar(date, events);

        makeBookingsCardToggalable();

    });


window.addEventListener('prepareOrdersPro', event => {
    debugger;
    alert('Name updated to: ' + event.detail.event1);
});



</script>
<script>
    $(document).ready(function() {
        $(".toggle_row").click(function() {
            //$(this).toggleClass("show_row arrow",1000);
            $(this).toggleClass("show_row arrow", 300);
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".toggle_menu").click(function() {
            $(".bar_left").toggleClass("show");
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".toggle_r").click(function() {
            $(this).toggleClass("show");
            $(this).parent(".togler_row").toggleClass('show');
        });
    });
</script>
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.css' rel='stylesheet' />
@endpush
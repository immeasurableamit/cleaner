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
                                        <a class="nav-link {{ $selectedTab == 1 ? 'active' : '' }}"
                                            wire:click="$set('selectedTab', 1 )">My Jobs <svg width="30"
                                                height="30" viewBox="0 0 43 43" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M13.8135 7.09497L9.40598 11.5065L7.68598 9.7865L5.75098 11.7175L8.43848 14.405L9.40598 15.3268L10.3735 14.4036L15.7485 9.02863L13.8135 7.09363V7.09497ZM20.156 9.40622V12.0937H37.6247V9.40622H20.156ZM13.8135 17.845L9.40598 22.2578L7.68598 20.5325L5.75098 22.4675L8.43848 25.155L9.40598 26.0768L10.3735 25.1536L15.7485 19.7786L13.8135 17.8436V17.845ZM20.156 20.1562V22.8437H37.6247V20.1562H20.156ZM13.8135 28.595L9.40598 33.0065L7.68598 31.2865L5.75098 33.2175L8.43848 35.905L9.40598 36.8268L10.3735 35.9036L15.7485 30.5286L13.8135 28.5936V28.595ZM20.156 30.9062V33.5937H37.6247V30.9062H20.156Z"
                                                    fill="#37A9FB" />
                                            </svg>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ $selectedTab == 2 ? 'active' : '' }}"
                                            wire:click="$set('selectedTab', 2 )">New Requests</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                <div class="time-zone-text">
                                    <a href="cleaner-account.html">Time Zone: -5:00 CST, current time 11:11am</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Tab panes -->
                    <div class="scheduling-calender-design clender-design" wire:ignore>
                        <div id='calendar'></div>
                    </div>
                    <!-- Date section -->
                    <div id="date_section" class="date_section">
                        <div class="form-headeing-second">
                            <h4 class="text-center">Select Date Above</h4>
                        </div>
                        <div class="date_show_v">
                            <button> Date </button>
                            <span>{{ $selectedDate }}</span>
                        </div>

                        <div class="card_service_row appoitments-alternative-row row">

                            @forelse ($selectedDateOrders as $order)
                                <!-- Booking Card -->
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-2">
                                    <div class="select-date-toggles header-main-cntnt-differ">
                                        <button class="service_toggle_s"></button>
                                        <div class="service-main-service-column">
                                            <div class="card-layout-showcase">
                                                <div class="job-first-details four-column">
                                                    <p class="job-d-info blue">{{ $order->service_item_titles }}</p>
                                                    <p class="job-d-info">
                                                        {{ $order->cleaning_datetime->format('h:i A') }}</p>
                                                    <p class="job-d-info">{{ $order->estimated_duration_hours }} hrs</p>
                                                    <p class="job-d-info">${{ $order->total }}</p>
                                                </div>
                                                <div class="job-first-details two-column">
                                                    <p class="job-d-info">{{ $order->name }}</p>
                                                    <p class="job-d-info address">{{ $order->address }}</p>
                                                </div>
                                                <div class="response-msg">
                                                    @if ( $order->status == 'pending'  )
                                                             <a href="javascript:void(0);" wire:click="acceptOrder( {{ $order->id }} )" class="accept-request-btn crd-btn">Accept
                                                        Request</a>
                                                    @elseif ( $order->status == 'rejected' )
                                                        <a href="#" class="refuse-request-btn crd-btn">Request Refused</a>
                                                    @elseif ( $order->status == 'accepted')
                                                        <a href="#" wire:click="completeOrder( {{ $order->id }} )" class="sucess-msg crd-btn">Mark as Completed</a>
                                                    @elseif ( $order->status == 'completed')
                                                        <a href="javascript:void(0);"  wire:click="collectPayment( {{ $order->id }} )"  class="collect_payment crd-btn">Collect Payment</a>
                                                    @elseif ( $order->status == 'payment_collected')
                                                        <a href="javascript:void();" class="btn_blue crd-btn">Payment collected!</a>
                                                    @elseif ( $order->status == 'cancelled')
                                                        <a href="javascript:void();" class="refuse-request-btn crd-btn">Cancelled</a>
                                                    @endif                                                                                               
                                                </div>
                                            </div>
                                            <div class="altrntive_rw">
                                                <p class="appointment_label">Job</p>
                                                <p class="app-value blue"><strong>{{ $order->service_item_titles }}</strong></p>
                                            </div>
                                            <div class="altrntive_rw">
                                                <p class="appointment_label">Time</p>
                                                <p class="app-value">{{ $order->cleaning_datetime->format('h:i A') }}
                                                </p>
                                            </div>
                                            <div class="altrntive_rw">
                                                <p class="appointment_label">Est Duration</p>
                                                <p class="app-value">{{ $order->estimated_duration_hours }} hrs</p>
                                            </div>
                                            <div class="altrntive_rw">
                                                <p class="appointment_label">Customer</p>
                                                <p class="app-value text-capitalize">{{ $order->name }}</p>
                                                <a href="#" class="btn_b" type="button" id="dropdownMenu2"
                                                    data-bs-toggle="dropdown" aria-expanded="false">Contact </a>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                    <li class="c_text">Contact information</li>
                                                    <li><a href="tel:512-558-5876" class="link-design-2 mt-3"><img
                                                                src="/assets/images/icons/phone.svg">{{ $order->user->contact_number }}</a>
                                                    </li>
                                                    <li><a href="mailto:example@mail.com" class="link-design-2"><img
                                                                src="/assets/images/icons/email.svg">{{ $order->user->email }}</a>
                                                    </li>
                                                    <li><a href="#" class="link-design-2"><img
                                                                src="/assets/images/icons/home.svg">{{ $order->address }}</a></li>
                                                    <li class="chat_with_member"><a href="message.html"
                                                            class="btn_chat_member">Chat With
                                                            Member<img src="/assets/images/icons/email-2.svg" /></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="altrntive_rw">
                                                <p class="appointment_label blue">Location</p>
                                                <p class="app-value location blue">{{ $order->address }}</p>
                                            </div>
                                            <div class="altrntive_rw">
                                                <p class="appointment_label">Price</p>
                                                <p class="app-value">${{ $order->total }} </p>
                                            </div>
                                            @if ( $order->status == 'pending')
                                            <div class="altrntive_rw">
                                                <p class="appointment_label">Change</p>
                                                <a class="btn_q">Propose Change</a>
                                                <a class="btn_x" wire:click="rejectOrder( {{ $order->id }} )">Refuse Request</a>
                                            </div>
                                            @elseif ( $order->status == 'accepted')
                                                <div class="altrntive_rw">
                                                    <p class="appointment_label">Change</p>                                        
                                                    <a class="btn_x" wire:click="confirmCancelOrderAction( {{ $order->id }} )">Cancel Job</a>
                                                </div>                                            
                                            

                                            @endif

                                        </div>                                    
                                        <div class="accept-request">
                                        @if ( $order->status == 'pending'  )
                                                             <a href="javascript:void(0);" wire:click="acceptOrder( {{ $order->id }} )" class="accept-request-btn crd-btn">Accept
                                                        Request</a>
                                                    @elseif ( $order->status == 'rejected' )
                                                        <a href="#" class="refuse-request-btn crd-btn">Request Refused</a>
                                                    @elseif ( $order->status == 'accepted')
                                                    <a href="#" wire:click="completeOrder( {{ $order->id }} )" class="sucess-msg crd-btn">Mark as Completed</a>

                                                    
                                                    @elseif ( $order->status == 'completed')
                                                        <a href="javascript:void(0);"  wire:click="collectPayment( {{ $order->id }} )" class="collect_payment crd-btn">Collect Payment</a>
                                                    @elseif ( $order->status == 'payment_collected')
                                                        <a href="javascript:void(0);" class="btn_blue crd-btn">Payment collected!</a>
                                                    @elseif ( $order->status == 'cancelled')
                                                        <a href="javascript:void();" class="refuse-request-btn crd-btn">Cancelled</a>


                                        @endif
                                            
                                        </div>
                                    </div>

                                </div>
                                <!-- Booking Card End -->

                            @empty
                                <p>No bookings for selected date </p>
                            @endforelse
                        </div>
                    </div>
                    <!-- Date section end -->
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function renderCalendar(intialDate, events) {
            console.log( events );
            var calendarEl = document.getElementById('calendar');

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
            let events = @json ($events);
            let date = "{{ $selectedDate }}";
            renderCalendar(date, events);
            makeBookingsCardToggalable();

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
@endpush

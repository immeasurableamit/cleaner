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
                     {{--    @forelse($orders as $order)  --}}
                       @forelse($selectedDateOrders as $order) 
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-2">

                            <div class="select-date-toggles">
                                <button class="service_toggle_s"></button>
                                <div class="service-main-service-column">
                                    <div class="altrntive_rw">
                                        <p class="appointment_label">Time</p>
                                        <p class="app-value">{{$order->cleaning_datetime->format('h:i A')}}</p>
                                    </div>
                                    <div class="altrntive_rw">


                                        <p class="appointment_label"> Job </p>
                                        @foreach($order->items as $item)

                                        <p class="app-value blue"><strong>{{@$item->service_item->title}}</strong></p>
                                        @endforeach
                                    </div>
                                    <div class="altrntive_rw">
                                        <p class="appointment_label">Est Duration</p>
                                        <p class="app-value">{{ $order->estimated_duration_hours }} hrs</p>
                                    </div>
                                    <div class="altrntive_rw">
                                        <p class="appointment_label">Cleaner</p>
                                        <p class="app-value">{{@$order->cleaner->name}}</p>
                                        <a href="#" class="btn_b" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">Contact </a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <li class="c_text">Contact information</li>
                                            <li><a href="tel:512-558-5876" class="link-design-2 mt-3"><img src="{{asset('assets/images/icons/phone.svg')}}">{{@$order->cleaner->contact_number}} </a></li>
                                            <li><a href="mailto:example@mail.com" class="link-design-2"><img src="{{asset('assets/images/icons/email.svg')}}">{{@$order->cleaner->email}} </a></li>
                                            {{-- <li><a href="#" class="link-design-2"><img src="{{asset('assets/images/icons/home.svg')}}">15648
                                            Maple St, Austin, TX 78744</a></li> --}}
                                            <li class="chat_with_member"><a href="message.html" class="btn_chat_member">Chat With
                                                    Member<img src="{{asset('assets/images/icons/email-2.svg')}}" /></a></li>
                                        </ul>
                                    </div>
                                    <div class="altrntive_rw">
                                        <p class="appointment_label blue">Location</p>
                                        <p class="app-value location blue">{{$order->address}}</p>
                                    </div>
                                    <div class="altrntive_rw">
                                        <p class="appointment_label">Price</p>
                                        <p class="app-value">${{ $order->total }}</p>
                                    </div>
                                    <div class="altrntive_rw">
                                        <p class="appointment_label">Status</p>
                                        <a class="btn_q">Reschedule</a>
                                        <a href="javascript::void(0)" class="btn_x" wire:click= "cancleOrder({{$order->id}})">Cancel</a> 
                                    </div>
                                    <div class="altrntive_rw">
                                        <p class="appointment_label">Payment</p>
                                        <p class="app-value">**2345 <a href="#" class="link-design-2">Edit</a></p>
                                    </div>
                                </div>
                                <div class="make-payment-early">
                                @if ( $order->status == 'rejected' )
                                        <a href="#" class="refuse-request-btn crd-btn">Request Refused</a>
                                   
                                    @elseif ( $order->status == 'cancelled')
                                        <a href="javascript:void();" class="refuse-request-btn crd-btn">Cancelled</a>
                                        @elseif ( $order->status == ' cancelled_by_customer')
                                        <a href="javascript:void();" class="refuse-request-btn crd-btn">Cancelled By Customer</a>
                                        @elseif ( $order->status == 'accepted')
                                        <a href="#" wire:click="completeOrder( {{ $order->id }} )" class="sucess-msg crd-btn">Make Payment Early</a>
                                        @elseif ( $order->status == 'pending' )
                                        <a href="javascript:void();" class="refuse-request-btn crd-btn">Pending</a>
                                       
                                        @endif
                                   
                                    {{-- <a href="#">Make Payment Early</a> --}}
                                </div>
                            </div>

                        </div>
                        @empty
                        <p>No bookings for selected date </p>
                        @endforelse

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
            // debugger;
            $(this).parent().toggleClass("show");
        });
    }


    window.addEventListener('renderCalendar', event => {
        // debugger;
        console.log('updating events');
        window.calendarJsnEvents = event.detail.events;
        let date = "{{ $selectedDate }}";
        renderCalendar(date, event.detail.events);
    });

    window.addEventListener('renderOrders', makeBookingsCardToggalable);

    window.addEventListener('load', () => {

        /* Calendar Events */
        let events = @json($events);

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
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.css' rel='stylesheet' />
@endpush
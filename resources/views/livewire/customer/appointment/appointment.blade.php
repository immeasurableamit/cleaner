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
                        <span>{{ \Carbon\Carbon::parse($selectedDate)->format('m-d-Y') }}</span>
                    </div>

                    <div class="card_service_row appoitments-alternative-row row">
                        {{-- @forelse($orders as $order)  --}}
                        @forelse($selectedDateOrders as $order)
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-2">

                            <div class="select-date-toggles" wire:ignore.self>
                                <button class="service_toggle_s"></button>
                                <div class="service-main-service-column">
                                    <div class="altrntive_rw">
                                        <p class="appointment_label">Time</p>
                                        <p class="app-value">{{ $order->cleaning_datetime->format('h:i A') }}</p>
                                    </div>
                                    <div class="altrntive_rw">
                                        <p class="appointment_label"> Job </p>
                                        <?php $count = 0; ?>
                                        @foreach ($order->items as $item)
                                        <?php if ($count == 1) break; ?>
                                        <p class="app-value blue">

                                            <strong>{{ @$item->service_item->title }}</strong>
                                        </p>

                                        <?php $count++; ?>

                                        @endforeach

                                        <a type="button" class="text-primary bold btn_view_r" data-bs-toggle="modal" data-bs-target="#exampleModal2" data-id="{{ $order->items }}" wire:click="viewOrderServices({{ $order->id }})">View</a>

                                    </div>
                                    <div class="altrntive_rw">
                                        <p class="appointment_label">Est Duration</p>
                                        <p class="app-value">{{ $order->estimated_duration_hours }} hrs</p>
                                    </div>
                                    <div class="altrntive_rw">
                                        <p class="appointment_label">Cleaner</p>
                                        <p class="app-value">{{ @$order->cleaner->name }}</p>
                                        <a href="#" class="btn_b" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">Contact </a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <li class="c_text">Contact information</li>
                                            <li><a href="tel:512-558-5876" class="link-design-2 mt-3"><img src="{{ asset('/assets/images/icons/phone.svg') }}">{{ @$order->cleaner->contact_number }}
                                                </a></li>
                                            <li><a href="mailto:example@mail.com" class="link-design-2"><img src="{{ asset('/assets/images/icons/email.svg') }}">{{ @$order->cleaner->email }}
                                                </a></li>
                                            {{-- <li><a href="#" class="link-design-2"><img src="{{asset('/assets/images/icons/home.svg')}}">15648
                                            Maple St, Austin, TX 78744</a></li> --}}
                                            <li class="chat_with_member"><a href="{{ route('messages') }}" class="btn_chat_member">Chat With
                                                    Member<img src="{{ asset('/assets/images/icons/email-2.svg') }}" /></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="altrntive_rw">
                                        <p class="appointment_label blue">Location</p>
                                        <p class="app-value location blue">{{ $order->address }}</p>
                                    </div>
                                    <div class="altrntive_rw">
                                        <p class="appointment_label blue">Size</p>
                                        <p class="app-value location blue">{{ $order->home_size_sq_ft }} sq ft</p>
                                    </div>
                                    <div class="altrntive_rw">
                                        <p class="appointment_label">Price</p>
                                        <p class="app-value">${{ $order->total }}</p>
                                    </div>
                                    <div class="altrntive_rw">
                                        <p class="appointment_label">Status</p>
                                        <div class="text-center align-center complete-status" style="margin-right: 5px;">
                                            <!-- 'pending'
'accepted'
'rejected'
'cancelled'
'cancelled_by_customer'
'payment_collected'
'payment_failed'
'completed'
'reviewed' -->

                                            @if ($order->status == 'pending')
                                            <span class="orange_txt">{{$order->statusForCustomer()}}</span>
                                            @elseif ($order->status == 'accepted')
                                            <span class="orange_txt">{{$order->statusForCustomer()}}</span>
                                            @elseif ($order->status == 'rejected')
                                            <span class="orange_txt">{{$order->statusForCustomer()}}</span>
                                            @elseif ($order->status == 'cancelled')
                                            <span class="orange_txt">{{$order->statusForCustomer()}}</span>

                                            @elseif ( $order->status = 'cancelled_by_customer')
                                            <span class="text-danger">{{$order->statusForCustomer()}}</span>
                                            @else
                                            <span class="text-success">{{$order->statusForCustomer()}}</span>
                                            @endif
                                        </div>

                                        @if ($order->status == 'pending')
                                        <a href="javascript::void(0)" class="btn_q" wire:click.prevent="showRescheduleModal({{ $order->id }})">Reschedule</a>
                                        <a href="javascript::void(0)" class="btn_x" wire:click="cancelOrder({{ $order->id }})">Cancel</a>
                                        @endif
                                    </div>
                                    {{--
                                    <div class="altrntive_rw">
                                        <p class="appointment_label">Payment</p>
                                        <p class="app-value">**2345 <a href="#" clas  s="link-design-2">Edit</a></p>
                                    </div>
                                    --}}
                                </div>

                                @if ($order->status == 'payment_failed')
                                <div>
                                    <a href="javascript:void(0);" class="failed-msg crd-btn">{{ $order->statusForCustomer() . ' - ' }}
                                        {{ $order->userTransaction->failure_reason }}</a>
                                </div>
                                @endif
                                @if ($order->status == 'completed' && $order->is_reviewed == 0)
                                <div class="custom-dropdown rate-cleaner-dropdown" wire:ignore.self>
                                    <button type="button" class="btn  custom-dropdown-btn">Rate
                                        Cleaner</button>
                                    <div class="custom-dropdown-block">
                                        <div class="dropdown-header-list">
                                            <h4>Rate this job</h4>
                                            <button class="close"><img src="/assets/images/icons/x.svg"></button>
                                        </div>
                                        <div class="dropdown-header-cntnt">
                                            <form wire:submit.prevent="storeReview( {{ $order->id }})">
                                                <div class="star-rating">
                                                    <input type="radio" id="5-stars" wire:model="rating" name="rating" value="5">
                                                    <label for="5-stars" class="star"><svg class="svg-inline--fa fa-star" aria-hidden="true" focusable="false" data-prefix="far" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                            <path fill="currentColor" d="M287.9 0C297.1 0 305.5 5.25 309.5 13.52L378.1 154.8L531.4 177.5C540.4 178.8 547.8 185.1 550.7 193.7C553.5 202.4 551.2 211.9 544.8 218.2L433.6 328.4L459.9 483.9C461.4 492.9 457.7 502.1 450.2 507.4C442.8 512.7 432.1 513.4 424.9 509.1L287.9 435.9L150.1 509.1C142.9 513.4 133.1 512.7 125.6 507.4C118.2 502.1 114.5 492.9 115.1 483.9L142.2 328.4L31.11 218.2C24.65 211.9 22.36 202.4 25.2 193.7C28.03 185.1 35.5 178.8 44.49 177.5L197.7 154.8L266.3 13.52C270.4 5.249 278.7 0 287.9 0L287.9 0zM287.9 78.95L235.4 187.2C231.9 194.3 225.1 199.3 217.3 200.5L98.98 217.9L184.9 303C190.4 308.5 192.9 316.4 191.6 324.1L171.4 443.7L276.6 387.5C283.7 383.7 292.2 383.7 299.2 387.5L404.4 443.7L384.2 324.1C382.9 316.4 385.5 308.5 391 303L476.9 217.9L358.6 200.5C350.7 199.3 343.9 194.3 340.5 187.2L287.9 78.95z">
                                                            </path>
                                                        </svg>
                                                        <!-- <i class="far fa-star"></i> Font Awesome fontawesome.com --></label>
                                                    <input type="radio" id="4-stars" wire:model="rating" name="rating" value="4">
                                                    <label for="4-stars" class="star"><svg class="svg-inline--fa fa-star" aria-hidden="true" focusable="false" data-prefix="far" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                            <path fill="currentColor" d="M287.9 0C297.1 0 305.5 5.25 309.5 13.52L378.1 154.8L531.4 177.5C540.4 178.8 547.8 185.1 550.7 193.7C553.5 202.4 551.2 211.9 544.8 218.2L433.6 328.4L459.9 483.9C461.4 492.9 457.7 502.1 450.2 507.4C442.8 512.7 432.1 513.4 424.9 509.1L287.9 435.9L150.1 509.1C142.9 513.4 133.1 512.7 125.6 507.4C118.2 502.1 114.5 492.9 115.1 483.9L142.2 328.4L31.11 218.2C24.65 211.9 22.36 202.4 25.2 193.7C28.03 185.1 35.5 178.8 44.49 177.5L197.7 154.8L266.3 13.52C270.4 5.249 278.7 0 287.9 0L287.9 0zM287.9 78.95L235.4 187.2C231.9 194.3 225.1 199.3 217.3 200.5L98.98 217.9L184.9 303C190.4 308.5 192.9 316.4 191.6 324.1L171.4 443.7L276.6 387.5C283.7 383.7 292.2 383.7 299.2 387.5L404.4 443.7L384.2 324.1C382.9 316.4 385.5 308.5 391 303L476.9 217.9L358.6 200.5C350.7 199.3 343.9 194.3 340.5 187.2L287.9 78.95z">
                                                            </path>
                                                        </svg>
                                                        <!-- <i class="far fa-star"></i> Font Awesome fontawesome.com --></label>
                                                    <input type="radio" id="3-stars" wire:model="rating" name="rating" value="3">
                                                    <label for="3-stars" class="star"><svg class="svg-inline--fa fa-star" aria-hidden="true" focusable="false" data-prefix="far" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                            <path fill="currentColor" d="M287.9 0C297.1 0 305.5 5.25 309.5 13.52L378.1 154.8L531.4 177.5C540.4 178.8 547.8 185.1 550.7 193.7C553.5 202.4 551.2 211.9 544.8 218.2L433.6 328.4L459.9 483.9C461.4 492.9 457.7 502.1 450.2 507.4C442.8 512.7 432.1 513.4 424.9 509.1L287.9 435.9L150.1 509.1C142.9 513.4 133.1 512.7 125.6 507.4C118.2 502.1 114.5 492.9 115.1 483.9L142.2 328.4L31.11 218.2C24.65 211.9 22.36 202.4 25.2 193.7C28.03 185.1 35.5 178.8 44.49 177.5L197.7 154.8L266.3 13.52C270.4 5.249 278.7 0 287.9 0L287.9 0zM287.9 78.95L235.4 187.2C231.9 194.3 225.1 199.3 217.3 200.5L98.98 217.9L184.9 303C190.4 308.5 192.9 316.4 191.6 324.1L171.4 443.7L276.6 387.5C283.7 383.7 292.2 383.7 299.2 387.5L404.4 443.7L384.2 324.1C382.9 316.4 385.5 308.5 391 303L476.9 217.9L358.6 200.5C350.7 199.3 343.9 194.3 340.5 187.2L287.9 78.95z">
                                                            </path>
                                                        </svg>
                                                        <!-- <i class="far fa-star"></i> Font Awesome fontawesome.com --></label>
                                                    <input type="radio" id="2-stars" wire:model="rating" name="rating" value="2">
                                                    <label for="2-stars" class="star"><svg class="svg-inline--fa fa-star" aria-hidden="true" focusable="false" data-prefix="far" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                            <path fill="currentColor" d="M287.9 0C297.1 0 305.5 5.25 309.5 13.52L378.1 154.8L531.4 177.5C540.4 178.8 547.8 185.1 550.7 193.7C553.5 202.4 551.2 211.9 544.8 218.2L433.6 328.4L459.9 483.9C461.4 492.9 457.7 502.1 450.2 507.4C442.8 512.7 432.1 513.4 424.9 509.1L287.9 435.9L150.1 509.1C142.9 513.4 133.1 512.7 125.6 507.4C118.2 502.1 114.5 492.9 115.1 483.9L142.2 328.4L31.11 218.2C24.65 211.9 22.36 202.4 25.2 193.7C28.03 185.1 35.5 178.8 44.49 177.5L197.7 154.8L266.3 13.52C270.4 5.249 278.7 0 287.9 0L287.9 0zM287.9 78.95L235.4 187.2C231.9 194.3 225.1 199.3 217.3 200.5L98.98 217.9L184.9 303C190.4 308.5 192.9 316.4 191.6 324.1L171.4 443.7L276.6 387.5C283.7 383.7 292.2 383.7 299.2 387.5L404.4 443.7L384.2 324.1C382.9 316.4 385.5 308.5 391 303L476.9 217.9L358.6 200.5C350.7 199.3 343.9 194.3 340.5 187.2L287.9 78.95z">
                                                            </path>
                                                        </svg>
                                                        <!-- <i class="far fa-star"></i> Font Awesome fontawesome.com --></label>
                                                    <input type="radio" id="1-star" wire:model="rating" name="rating" value="1">
                                                    <label for="1-star" class="star"><svg class="svg-inline--fa fa-star" aria-hidden="true" focusable="false" data-prefix="far" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                            <path fill="currentColor" d="M287.9 0C297.1 0 305.5 5.25 309.5 13.52L378.1 154.8L531.4 177.5C540.4 178.8 547.8 185.1 550.7 193.7C553.5 202.4 551.2 211.9 544.8 218.2L433.6 328.4L459.9 483.9C461.4 492.9 457.7 502.1 450.2 507.4C442.8 512.7 432.1 513.4 424.9 509.1L287.9 435.9L150.1 509.1C142.9 513.4 133.1 512.7 125.6 507.4C118.2 502.1 114.5 492.9 115.1 483.9L142.2 328.4L31.11 218.2C24.65 211.9 22.36 202.4 25.2 193.7C28.03 185.1 35.5 178.8 44.49 177.5L197.7 154.8L266.3 13.52C270.4 5.249 278.7 0 287.9 0L287.9 0zM287.9 78.95L235.4 187.2C231.9 194.3 225.1 199.3 217.3 200.5L98.98 217.9L184.9 303C190.4 308.5 192.9 316.4 191.6 324.1L171.4 443.7L276.6 387.5C283.7 383.7 292.2 383.7 299.2 387.5L404.4 443.7L384.2 324.1C382.9 316.4 385.5 308.5 391 303L476.9 217.9L358.6 200.5C350.7 199.3 343.9 194.3 340.5 187.2L287.9 78.95z">
                                                            </path>
                                                        </svg>
                                                        <!-- <i class="far fa-star"></i> Font Awesome fontawesome.com --></label>
                                                </div>

                                                @if ($reviewOrderId == $order->id && $errors->has('rating'))
                                                <div class="text-center">
                                                    <span class="text-danger">{{ $errors->first('rating') }}</span>
                                                </div>
                                                @endif
                                                <div class="form-grouph review-textarea-design">
                                                    <textarea name="review" wire:model="review" placeholder="Enter review here"></textarea>
                                                </div>
                                                @if ($reviewOrderId == $order->id && $errors->has('review'))
                                                <span class="text-danger">{{ $errors->first('review') }}</span>
                                                @endif
                                                <div class="form-grouph submit-design">
                                                    <input type="submit" value="Submit Rating">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endif
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

    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg modal_style" id="rescheduleModal" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header  d-flex justify-content-center">
                    <h3>Reschedule Booking</h3>
                    <button type="button" class="close btn_close" style="border: none; background: white;top:0px;" wire:click.prevent="hideRescheduleModal">
                        <i class="fa fa-times fa-xl" aria-hidden="true"></i>
                    </button>

                </div>
                <div class="modal-body">

                    <div id="rescheduleCalendar" class="text-center" wire:ignore>
                    </div>
                    @error('rescheduleDate')
                    <div class="alert text-center">{{ $message }}</div>
                    @enderror

                    @if (!empty($rescheduledAvailableTimeSlots))
                    <div class="row block_start_time ">
                        <div class="col-md-5 select-design">
                            <div class="selecti-box" wire:ignore>
                                <select class="select-custom-design" id="reschedule-time-selector">
                                    <option></option>
                                    @foreach ($rescheduledAvailableTimeSlots as $slot)
                                    {{-- <option>{{ $timeSlot['start_time'] }}</option> --}}
                                    <option value="{{ $slot['start_time'] }}" @disabled($slot['is_available']==false) @selected( $slot['start_time']==$rescheduleTime) }}>{{ date("h:i A", strtotime($slot['start_time']) ) }}</option>
                                    @endforeach
                                    {{--
                                        @foreach ($rescheduledAvailableTimeSlots as $timeSlot)
                                            @php $isSelected = false @endphp

                                            @if (isset($rescheduleTime))
                                                @if (\Carbon\Carbon::parse($rescheduleTime)->format('h:i A') == $timeSlot)
                                                    @php $isSelected = true @endphp
                                                @endif
                                            @endif

                                            <option value="{{ $timeSlot }}" @selected($isSelected)>
                                    {{ $timeSlot }}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                        </div>
                        @error('rescheduleTime')
                        <div class="alert text-center">{{ $message }}</div>
                        @enderror
                    </div>
                    @endif

                </div>
                <div class="modal-footer text-center justify-content-center">
                    <button type="button" class="btn_blue" wire:click="rescheduleSelectedOrder">Reschedule order
                        #<span id="reschedule_order_id">{{ $rescheduleOrderId ?? '' }}</span></button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->



    <!-- Modal - View -->
    <div wire:ignore.self class="modal fade modal_style " id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Selected Services</h5>
                    <button type="button" class="btn_close" data-bs-dismiss="modal" aria-label="Close" style="border:0px;">X</button>
                </div>
                <div class="modal-body">
                    {{-- <p class="appointment_label">Service</p> --}}
                    @if ($selectOrderItem)
                    @foreach ($selectOrderItem as $selectOrderItem)
                    <div class="altrntive_rw">

                        @if ($selectOrderItem->services_id == '3')
                        <div class="s_servicsess">
                            <p> Add ons </p>
                            <p class="app-value">{{ $selectOrderItem->title }}</p>
                        </div>
                        @else
                        <div class="s_servicsess">
                            <p> Services </p>
                            <p class="app-value">{{ $selectOrderItem->title }}</p>
                        </div>
                        @endif

                    </div>
                    @endforeach
                    @endif

                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal End -->
</div>
<style>
    .s_servicsess {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .s_servicsess p {
        margin-bottom: 0px;
    }

    .s_servicsess p:first-child {
        min-width: 100px;
    }
</style>
@push('scripts')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/litepicker/dist/litepicker.js"></script>

<script>
    var rescheduleDatePickerInstance = null;
    var allowedWeekDays = @json([]);

    function renderCalendar(intialDate, events) {
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
            eventClick: (eventClickInfo) => {
                let selectedEventDate = eventClickInfo.event.startStr;
                window.calendar.select(selectedEventDate);
                @this.set('selectedDate', selectedEventDate);

            },
            dateClick: function(info) {
                @this.set('selectedDate', info.dateStr);
            },

        });

        window.calendar = calendar;

        calendar.render();
    }

    function renderDatePickerInRescheduleModal() {
        if (rescheduleDatePickerInstance) {
            rescheduleDatePickerInstance.destroy();
        }

        let dateOfToday = new Date();
        let dateOfTomorrow = dateOfToday.setDate(dateOfToday.getDate() + 1);

        rescheduleDatePickerInstance = new Litepicker({
            element: document.getElementById('rescheduleCalendar'),
            numberOfMonths: 2,
            numberOfColumns: 2,
            inlineMode: true,
            singleMode: true,
            minDate: dateOfTomorrow,
            parentEl: document.getElementById('rescheduleCalendar'),
            lockDaysFilter: (date) => {
                let weekday = date.getDay();
                if (allowedWeekDays.includes(weekday)) {
                    return false;
                }

                return true;
            },
            setup: (picker) => {
                picker.on('selected', (date) => {
                    @this.set('rescheduleDate', date.format('YYYY-MM-DD'))
                });
            },
        });
    }


    function makeBookingsCardToggalable() {

        $(".service_toggle_s").unbind('click');

        $(".service_toggle_s").click(function() {
            $(this).parent().toggleClass("show");
        });
    }

    function addClickHandlerForRatingButtons() {
        $('.custom-dropdown-btn').unbind('click');
        $(".close").unbind('click');

        $(".custom-dropdown-btn").click(function() {
            $(this).parent().toggleClass("show");
        });

        $(".close").click(function() {
            $(this).parents('.custom-dropdown').removeClass("show");
        });
    }

    function onRenderOrders() {
        makeBookingsCardToggalable();
        addClickHandlerForRatingButtons();
    }

    function resetRescheduleModalContent() {
        if ($("#reschedule-time-selector")) {
            $("#reschedule-time-selector").empty();
        }

        if (rescheduleDatePickerInstance) {
            rescheduleDatePickerInstance.destroy();
        }
    }


    window.addEventListener('renderCalendar', event => {

        let date = "{{ $selectedDate }}";
        renderCalendar(date, event.detail.events);
    });

    window.addEventListener('renderOrders', onRenderOrders);

    window.addEventListener('showRescheduleModal', (event) => {

        rescheduleDatePickerInstance.destroy();
        renderDatePickerInRescheduleModal();
        allowedWeekDays = event.detail.allowedWeekDays;

        $("#reschedule_order_id").text(event.detail.orderId);
        $("#rescheduleModal").modal('show');
    });

    window.addEventListener('hideRescheduleModal', () => {
        $("#rescheduleModal").modal('hide');
        resetRescheduleModalContent();
    });

    window.addEventListener('enableTimePickerInRescheduleTimeSelect', () => {
        $("#reschedule-time-selector").select2({
            placeholder: 'Select time',
            dropdownParent: $("#rescheduleModal")
        })

        $("#reschedule-time-selector").on('select2:select', function(e) {
            var data = e.params.data;
            @this.set('rescheduleTime', data.id)
        });
    });

    window.addEventListener('load', () => {

        /* Calendar Events */
        let events = @json($events);

        let date = "{{ $selectedDate }}";

        renderCalendar(date, events);

        makeBookingsCardToggalable();
        addClickHandlerForRatingButtons();
        renderDatePickerInRescheduleModal();
    });
</script>

<script>
    $(document).ready(function() {
        $(".toggle_row").click(function() {
            $(this).toggleClass("show_row arrow", 300);
        });

        $(".toggle_menu").click(function() {
            $(".bar_left").toggleClass("show");
        });

        $(".toggle_r").click(function() {
            $(this).toggleClass("show");
            $(this).parent(".togler_row").toggleClass('show');
        });
    });
</script>
@endpush

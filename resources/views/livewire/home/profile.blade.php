<div>
    <div class="row profile_row">
        <div class="col-xl-4 col-lg-6 col-md-12 px-0" style="background-color:#fff;">
            <div class="frst_tm">
                <div class="prfl_img_1">
                    <img src="{{asset('storage/images/'.$cleaner->image)}}">
                </div>

                <div class="folow-us">
                    <ul class="list-unstyled d-flex">
                      <li><span>Share Provider</span></li>
                      <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ $socialMediaSharingInfo['url'] }}"><svg class="svg-inline--fa fa-facebook" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.8 90.69 226.4 209.3 245V327.7h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.3 482.4 504 379.8 504 256z"></path></svg><!-- <i class="fa-brands fa-facebook"></i> Font Awesome fontawesome.com --></a></li>
                      <li><a target="_blank" href="http://twitter.com/intent/tweet?text={{ $socialMediaSharingInfo['title'] }}&url={{ $socialMediaSharingInfo['url'] }}"><svg class="svg-inline--fa fa-twitter" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M459.4 151.7c.325 4.548 .325 9.097 .325 13.65 0 138.7-105.6 298.6-298.6 298.6-59.45 0-114.7-17.22-161.1-47.11 8.447 .974 16.57 1.299 25.34 1.299 49.06 0 94.21-16.57 130.3-44.83-46.13-.975-84.79-31.19-98.11-72.77 6.498 .974 12.99 1.624 19.82 1.624 9.421 0 18.84-1.3 27.61-3.573-48.08-9.747-84.14-51.98-84.14-102.1v-1.299c13.97 7.797 30.21 12.67 47.43 13.32-28.26-18.84-46.78-51.01-46.78-87.39 0-19.49 5.197-37.36 14.29-52.95 51.65 63.67 129.3 105.3 216.4 109.8-1.624-7.797-2.599-15.92-2.599-24.04 0-57.83 46.78-104.9 104.9-104.9 30.21 0 57.5 12.67 76.67 33.14 23.72-4.548 46.46-13.32 66.6-25.34-7.798 24.37-24.37 44.83-46.13 57.83 21.12-2.273 41.58-8.122 60.43-16.24-14.29 20.79-32.16 39.31-52.63 54.25z"></path></svg><!-- <i class="fa-brands fa-twitter"></i> Font Awesome fontawesome.com --></a></li>
                      {{-- <li><a target="_blank" href="#"><svg class="svg-inline--fa fa-instagram" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="instagram" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path></svg><!-- <i class="fa-brands fa-instagram"></i> Font Awesome fontawesome.com --></a></li> --}}

                      <li><a target="_blank" href='http://www.linkedin.com/shareArticle?mini=true&url={{ $socialMediaSharingInfo['url'] }}&title={{ $socialMediaSharingInfo['title'] }}'><svg class="svg-inline--fa fa-linkedin-in" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="linkedin-in" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M100.3 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.6 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.3 61.9 111.3 142.3V448z"></path></svg><!-- <i class="fa-brands fa-linkedin-in"></i> Font Awesome fontawesome.com --></a></li>
                    </ul>
                   </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-12 ps-0">
            <div class="secnd_tm">
                <h5 class="name_tm">{{$cleaner->name}}</h5>
                <span class="link-design-2" style="font-size:14px;">Provider Since {{ $cleaner->created_at->format('Y') }}</span>
                <div class="text_tm">
                    <div class="rating_row">
                        <p>Rating</p>
                        <div>
                            <img src="{{ asset('assets/images/icons/b_star.svg') }}">
                            <span>{{ $cleanerAdditionalInfo['rating'] }}</span>
                        </div>
                    </div>
                    <div class="rating_row">
                        <p>Cleanings Done</p>
                        <div>
                            <img src="{{ asset('assets/images/icons/check.svg') }}">
                            <span>{{ $cleanerAdditionalInfo['completed_orders'] }}</span>
                        </div>
                    </div>
                    <div class="rating_row">
                        <p>Team</p>
                        <div>
                            <img src="{{ asset('assets/images/icons/team.svg') }}">
                            <span>{{ $cleanerAdditionalInfo['total_team'] }}</span>
                        </div>
                    </div>
                    <div class="rating_row">
                        <p>Insured</p>
                        <div>
                            <img src="{{ asset('assets/images/icons/insure.svg') }}">
                            <span>{{ $cleanerAdditionalInfo['is_insured'] ? 'Yes' : 'No' }}</span>
                        </div>
                    </div>
                    <div class="rating_row">
                        <p>Organic</p>
                        <div>
                            <img src="{{ asset('assets/images/icons/organic.svg') }}">
                            <span>{{ $cleanerAdditionalInfo['is_organic'] ? 'Yes' : 'No' }}</span>
                        </div>
                    </div>
                </div>
                <div class="btn_msg_cleaner">
                    @php
                    $messageUrl = route('signup-customers');
                    if(auth()->check()) {
                        $messageUrl = route('messages', ['user'=>$cleaner->id]);
                    }
                    @endphp
                    <a href="{{ $messageUrl }}" class="btn_msg">Message Cleaner <img src="{{ asset('assets/images/icons/email-2.svg') }}"> </a>
                    <p>Ask a <b>question</b> or request a <b>custom proposal.</b></p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-12 col-md-12 about-provider">
            <div class="thrd_tm">
                <h3>About Provider</h3>
                <p>{{@$cleaner->UserDetails->about}}</p>
            </div>
        </div>
    </div>









    <div class="scheduled_div">
        <form >
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


                                    <select class="select-custom-design-group" id="select-service-selector" >

                                        <option></option>
                                        @foreach ( $services->where('types_id', '1') as $service )
                                        <optgroup label="{{ $service['title'] }}" >
                                            @foreach ( $service['serviceItems'] as $serviceItem )
                                            <option value="{{ $serviceItem['id'] }}" @if ( $serviceItemId == $serviceItem['id'] ) selected @endif>{{ $serviceItem['title'] }}</option>
                                            @endforeach
                                        </optgroup>

                                        @endforeach

                                    </select>

                                    @error('serviceItemId') <span class="help-block text-danger"> {{ $message }} </span> @enderror

                                </div>
                            </div>


                            @if ( $itemAddOns )
                            <div class="col-md-4 select-design">
                                <label>Add-Ons</label>
                                <div class="selecti-box">
                                    <select id="addon-selector" class="select-custom-design" multiple>
                                        @foreach ( $itemAddOns as $addOn )
=                                        <option value="{{ $addOn['id'] }}" @if ( in_array( $addOn['id'], $addOnIds ) ) selected @endif>{{ $addOn['title'] }}</option>
                                        @endforeach

                                    </select>
                                    @error('addOnIds') <span class="help-block text-danger"> {{ $message }} </span> @enderror
                                </div>
                            </div>
                            @endif
                            <div class="col-md-4">
                                <div class=" input-design">
                                    <label>Home Size</label>
                                    <input type="number" placeholder="Enter Square Feet" wire:model="homeSize">
                                    @error('homeSize') <span class="help-block text-danger"> {{ $message }} </span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if ( $estimatedPrice > 0 )
                <div class="time_price_div" >
                    <div class="p_t_text">
                        <span class="bg_yellow">Estimated Time:</span>
                        <span class="rate" >{{ $estimatedTime }} hrs</span>
                    </div>
                    <div class="p_t_text">
                        <span class="bg_yellow">Provider’s Price:</span>
                        <span class="rate">${{ $estimatedPrice }}</span>
                    </div>
                </div>
                @endif
                <div class="row justify-content-center pt-3">
                    <div class="col-sm-4 border-bottom">
                    </div>
                </div>
            </div>


            <div class="choose_date_time">
                <h4 class="h4_tittle"><span class="c_number">2</span>Choose a start date and time</h4>
                <div class="date_time_calender" wire:ignore>
                    <div id="start-end-date" class="calender-column-3"></div>
                </div>


                @if($selected_date)
                <div class="date_show">
                    <div class="d_text">
                        <span class="bg_yellow">Date:</span>
                        <span class="day_month_year">{{ @$selected_date ? date('l, M d Y', strtotime($selected_date)) : '' }}</span>
                    </div>
                    <p class="d-none d-md-block">Future recurring cleanings will be scheduled in the nearest availabel time slot. Please contact your cleaner if you need to reschedule any cleanings.</p>
                </div>
                <div class="row block_start_time">
                    <div class="col-md-3 select-design">
                        <div class="selecti-box">
                            <select class="select-custom-design" id="time-selector">
                                <option></option>
                                @foreach($workingDatesTimeSlot as $key => $slot)

                              <option value="{{ date('H:i:s', strtotime($slot['time'])) }}" {{ $slot['is_free']=='no' ? 'disabled' : '' }} {{ date("H:i:s", strtotime( $slot['time'] ) )  == $time ? 'selected' : ''  }}>{{date('h:i A', strtotime($slot['time']))}} </option>
                                {{-- <option value="{{ date('H:i:s', strtotime($slot['time'])) }}" {{ $slot['is_free']=='no' ? 'disabled' : '' }}>{{ $slot['time'] }}</option> --}}
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @error ('time') <span class="help-block text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="row justify-content-center pt-3 pb-5">
                    <div class="col-sm-4 border-bottom">
                    </div>
                </div>
                @endif

            </div>

            @error('selected_date') <span class="help-block text-danger"> {{ $message }} </span> @enderror
            <div class="click_to_schedule">
                <h4 class="h4_tittle"><span class="c_number">3</span>Click to schedule </h4>
                <button class="btn_c" type="button" wire:click="redirectToCheckout">Let’s Go!</button>
                <div class="date_show d-md-none d-block ">
                    <p>Future recurring cleanings will be scheduled in the nearest availabel time slot. Please contact your cleaner if you need to reschedule any cleanings.</p>
                </div>
            </div>
        </form>
    </div>

    @if ( $cleaner->cleanerReviews->isNotEmpty() )
    <div class=" row mx-0 feedback_reviews_section profile_feedback_div">
        <h4 class="h4_tittle text-center">Customer Feedback</h4>

        @foreach ( $cleaner->cleanerReviews as $review)
        <div class="card_reviews">
            <div class="name_img_star">
                @if ($review->user->image)
                <img src="{{ asset('storage/images/' . $review->user->image) }}"  class="pr_img">
            @else
                <img src="/assets/images/iconshow.png" class="pr_img">
            @endif

                <h5 class="text-capitalize">{{ $review->user->name }}</h5>
                <div class="star_2">
                    <div class="input_star me-3">
                        @foreach ( range(1,5) as $i )

                            @if ( $i <= $review->rating )
                            <img src="{{ asset('assets/images/star.svg') }}">
                            @else
                            <img src="{{ asset('assets/images/e_star.svg') }}">
                            @endif
                        @endforeach
                    </div>
                    <span class="me-3">{{ $review->rating}} out of 5</span>
                    <span class="r_date">{{ $review->created_at->toFormattedDateString() }}</span>
                </div>
            </div>
            <p class="msg_reviewr">
                {{ $review->review }}
            </p>
        </div>
        @endforeach
        <div class="btn_show_more">
            <a href="#" class="">Show more</a>
        </div>

    </div>
    @endif


    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/litepicker.js"></script>
    <script>
        const allowedDates = @json(@$workingDates);
        let startDate = new Date();

        getDates(allowedDates, startDate);

        window.livewire.on('fireCalender', (dates, date) => {
            $('#start-end-date').html('');
            let sDate = new Date(date);
            getDates(dates, sDate);
        });

        function getDates(workingDates, startDate) {
            let newEvents = [];

            new Litepicker({
                element: document.getElementById('start-end-date'),
                numberOfMonths: 3,
                numberOfColumns: 3,
                inlineMode: true,
                singleMode: true,
                lockDaysFilter: (date1, date2, pickedDates) => {
                    return !workingDates.includes(date1.format('YYYY-MM-DD'));
                },
                startDate: startDate,
                setup: (picker) => {
                    picker.on('selected', (date) => {
                        @this.set('selected_date', date.format('YYYY-MM-DD'));
                    });

                    picker.on('change:month', (date, calendarIdx) => {
                        // some action
                        @this.set('month_date', date.format('YYYY-MM-DD'));
                    });

                },
            });
        }
    </script>
    <script>
        function setPropInLivewire(name, value) {
            @this.set(name, value);
        }

        function initSelectors() {

            $("#time-selector").select2({
                placeholder: 'Select Time'
            });

            $("#select-service-selector").select2({
                placeholder: 'Select Cleaning Type',
            });

            $("#addon-selector").select2({
                placeholder: 'Select Addon'
            });


            $("#select-service-selector").on('select2:select', function(e) {
                var data = e.params.data;
                @this.set('serviceItemId', data.id);
            });

            $("#addon-selector").on('select2:select', function(e) {
                @this.set('addOnIds', $("#addon-selector").val());
            });

            $("#time-selector").on('select2:select', function(e) {
                var data = e.params.data;
                @this.set('time', data.id );

            });

        }


        window.livewire.on('componentRendered', () => { initSelectors(); });

        $(document).ready( function() {
            initSelectors();
        });
    </script>
    @endpush

</div>

<div class="my-3">
    <!-- Header search -->
    <div class="row routine_service_div mb-3">
        <div class="col-xl-4 col-lg-4 col-md-12 p-0 yellow-bg">

            <p><img src="assets/images/icons/2_weaks.svg" class="me-3">{{ $selectedServiceItem->title }}</p>
            <!-- <p><img src="assets/images/icons/2_weaks.svg" class="me-3">Routine Service - Every 2 Weeks</p> -->
        </div>
        <div class="col-xl-2 col-lg-4 col-md-12 p-0 yellow-bg t-width-auto border-left-sf">
            <p><img src="assets/images/icons/s_feet.svg" class="me-3">{{ $homeSize }} sq. ft.</p>
        </div>
        <div class="col-xl-6 col-lg-4 col-md-16 p-0 white-bordered">
            <p><img src="assets/images/icons/location.svg" class="me-3">{{ $address }}</p>
        </div>
    </div>
    <!-- Header search end -->

    <div class="row car_filter_div">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 left_filter_div">

            <div class="btn_top">
                <button class="btn_filter btn_filter_by me-3" type="button"><img
                        src="{{ asset('assets/images/icons/filter_by.svg') }}" class="me-3">Filter by</button>
                <button class="close-btn hide" type="button"><img
                        src="{{ asset('assets/images/icons/close-circle.svg') }}"></button>
                <div class="select-sort-design" wire:ignore>
                    <select id="sortBy" class="select-custom-design">
                        <option value="">Sort by</option>
                        <option value="price_asc">Price - Low to High</option>
                        <option value="price_desc">Price - High to Low</option>
                        <option value="rating_desc">Rating - High to Low</option>
                        <option value="rating_asc">Rating - Low to High</option>
                        <option value="duration_asc">Duration - Low to High</option>
                        <option value="duration_desc">Duration - High to Low</option>
                    </select>
                </div>
            </div>

            <div class="filter_by_div">
                <div class="card_filter">
                    <h5 class="main-title">Service</h5>

                    @foreach ($services as $service)
                        <h5>{{ $service->title }}</h5>
                        <div class="labels_div">
                            @foreach ($service->servicesItems as $item)
                                <label>
                                    <input type="radio" wire:model="selectedServiceItemId" value="{{ $item->id }}"
                                        {{ $item->id == $selectedServiceItemId ? 'checked' : '' }}>
                                    <span class="label-selection-text">{{ $item->title }}</span></label>
                            @endforeach
                        </div>
                    @endforeach
                </div>
                <div class="card_filter">
                    <h5 class="pb-2">Home Size</h5>
                    <input type="text" placeholder="Update square feet" wire:model="homeSize">
                    @error('homeSize')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="card_filter">
                    <h5 class="pb-2">Location</h5>
                    <input type="text" placeholder="Search by address" id="address" value="{{ $address }}">
                </div>
                <div class="card_filter date-picker-design" wire:ignore>
                    <h5 class="pb-2">Start Date range</h5>
                    <input type="text" placeholder="" id="datepicker" readonly>
                </div>
                <div class="card_filter">
                    <h5 class="pb-2">Price Per Clean</h5>
                    <div class="price_input_div">
                        <input type="text" placeholder="$ 0" class="price_1" wire:model="minPrice">
                        <input type="text" placeholder="$ Max" class="price_2" wire:model="maxPrice">
                    </div>
                </div>
                <div class="card_filter select-design">
                    <h5 class="pb-2">Rating</h5>
                    <div class="selecti-box" wire:ignore>
                        <select class="select-custom-design" id="ratingFilter">
                            <option></option>
                            @foreach (range(1, 5) as $i)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card_filter oferd_select select-design">
                    <h5 class="pb-2">Addons Offered</h5>
                    <div class="selecti-box" wire:ignore>
                        <select class="select-custom-design" multiple onchange="addOnSelectChanged( this )"
                            id="addonsSelector">
                            <option></option>
                            @foreach ($addons->first()->servicesItems as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card_filter">
                    <div class="h5_input_checkbox">
                        <h5 class="">Organic Cleaners Only<img src="assets/images/badges.svg" class="ms-3"></h5>
                        {{--                         <input type="checkbox" wire:click="$toggle('organicOnly')">

 --}}
                        <input type="checkbox" wire:model="organicOnly">

                    </div>
                    <div class="h5_input_checkbox">
                        <h5 class="">Insured Cleaners Only<img src="assets/images/insurance.svg" class="ms-3">
                        </h5>
                        {{--                         <input type="checkbox" wire:click="$toggle('insuredOnly')">
 --}}
                        <input type="checkbox" wire:model="insuredOnly">

                    </div>
                </div>
                <div class="card_filter border-0">
                    <input type="text" placeholder="Search by keywords" class="search_input" wire:model="keyword">
                </div>
                <div class="pb-5 d-flex reset-next-btn">
                    <button class="btn_reset" wire:click="resetFilters"><img src="assets/images/icons/filter_by.svg"
                            class="me-3">Reset</button>
                    {{-- <a class="btn_next">Next</a> --}}
                </div>
            </div>
        </div>

        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 car_right_div py-3">

            @if ($filteredCleaners->isEmpty())
                <p class="text-center display-6"><strong>No cleaners found. Try changing filters.</strong></p>
            @else
                <div class="listing-row">
                    @foreach ($filteredCleaners as $cleaner)
                        <div class="listing-column lcd-4 lc-6">
                            <div class="card_search_result">
                                <div class="like_img">

                                    {{-- working --}}
                                    {{-- @if ($user) --}}
                                    @if(auth()->check())

                                        @if (auth()->user()->role != 'cleaner' && auth()->user()->role != 'admin')
                                            <input type="checkbox" class="like_1"
                                            wire:click="toggleFavouriteCleaner({{ $cleaner->id }})"
                                            {{ $user->favourites->where('cleaner_id', $cleaner->id)->first() == null ? '' : 'checked' }}>
                                        {{-- @elseif(auth()->user()->role == 'customer')
                                            <input type="checkbox" class="like_1"
                                                wire:click="toggleFavouriteCleaner({{ $cleaner->id }})"
                                                {{ $user->favourites->where('cleaner_id', $cleaner->id)->first() == null ? '' : 'checked' }}> --}}
                                        {{-- @else

                                            <input type="checkbox" class="like_1"> --}}
                                        @endif
                                    @else

                                        <input type="checkbox" class="like_1 " wire:click= "signupMove()">


                                    @endif
                                    <div id="" class="profile-pic">
                                        @if ($cleaner->image)
                                            <img src="{{ asset('storage/images/' . $cleaner->image) }}">
                                        @else
                                            <img src="assets/images/iconshow.png">
                                        @endif
                                    </div>
                                </div>
                                <div class="bottom_card_text">
                                    <div class="name_str">
                                        <a href="javascript::void(0)" class="name_s">{{ $cleaner->name }}</a>
                                        <div class="m-hide">
                                            <img src="{{ asset('assets/images/icons/star.svg') }}">
                                            {{ formatAvgRating($cleaner->avg_rating) }}<span>
                                                ({{ $cleaner->cleanerReviews->count() }})
                                            </span>
                                        </div>
                                    </div>
                                    <div class="routine_text">

                                        <p class="font-semibold"> {{ $selectedServiceItem->title }}</p>
                                        <p class="font-medium">{{ $homeSize }} sq. ft.</p>
                                        <p class="font-regular">Est Time :
                                            {{ $cleaner->duration_for_selected_service }}

                                            hours</p>
                                        <p class="font-regular">Buffer Time : {{ $cleaner->UserDetails->buffer }}</p>
                                        <div class="badges_insurnce_img">
                                            @if ($cleaner->UserDetails->provide_organic_service)
                                                <img src="{{ asset('assets/images/badges.svg') }}">
                                            @endif

                                            @if ($cleaner->UserDetails->is_insured)
                                                <img src="{{ asset('assets/images/insurance.svg') }}">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="btn_rate">
                                        <b>${{ $cleaner->price_for_selected_service }}
                                        </b>
                                        <a href="{{ route('profile', $cleaner->id) }}"><button
                                                class="btn_view d-none d-md-block">View</button></a>
                                        <div class="td-hide rating-mobile-listing-design">
                                            <img src="{{ asset('assets/images/icons/star.svg') }}">
                                            4.5<span> (211)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
        <div class="pagination_search_div text-center">
            <div id="pagination-container" class="pagination_list"></div>
        </div>
    </div>







    <script>
        function addDatePickerInStartDateFilter() {
            let picker = new Litepicker({
                element: document.getElementById('datepicker'),
                singleMode: false,
                minDate: new Date(),
                format: 'MM-DD-YYYY',
                tooltipText: {
                    one: 'Start Date',
                    other: 'End Date'
                },
                tooltipNumber: (totalDays) => {
                    return totalDays - 1;
                },

                setup: (picker) => {
                    picker.on('selected', (date1, date2) => {
                        @this.set('dateStart', formatDate(date1.dateInstance));
                        @this.set('dateEnd', formatDate(date2.dateInstance))

                    })
                }
            });

            window.startDateRangePicker = picker;
        }

        function formatDate(dateInstance) {
            let year = dateInstance.getFullYear();
            let month = dateInstance.getMonth() + 1; // adding 1 because getMonth returns month from range 0 to 11
            let day = dateInstance.getDate();
            let date = `${year}-${month}-${day}`;
            return date;
        }

        function addOnSelectChanged(select_elem) {
            @this.set('selectedAddonsIds', $(select_elem).val());
        }

        function addressChanged(gmap_place) {
            console.log(gmap_place);
            @this.set('address', gmap_place.formatted_address);
            @this.set('latitude', gmap_place.geometry.location.lat());
            @this.set('longitude', gmap_place.geometry.location.lng());
        }

        function addEventHandlerInSortByFilter() {
            $("#sortBy").on('select2:select', function(e) {
                var data = e.params.data;
                @this.set('sortBy', data.id);
            });
        }

        function addEventHandlerInRatingFilter() {

            $("#ratingFilter").select2({
                placeholder: 'Min Rating'
            });
            $("#ratingFilter").on('select2:select', (e) => {
                var data = e.params.data;
                @this.set('rating', data.id)
            })
        }

        function addEventHandlers() {
            addEventHandlerInSortByFilter();
            addEventHandlerInRatingFilter();

        }

        window.addEventListener('load', () => {

            addDatePickerInStartDateFilter();
            addEventHandlers();

            $("#addonsSelector").select2({
                placeholder: 'Select'
            });
            var element = document.getElementById('address');
            makeAddressInputAutocompletable(element, addressChanged);
        });

        window.addEventListener('filtersReset', () => {
            $('#ratingFilter').val(null).trigger('change');
            $('#addonsSelector').val([]).trigger('change');
            window.startDateRangePicker.clearSelection();

        });
    </script>
</div>

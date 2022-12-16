<div>
    <div class="row car_filter_div">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 left_filter_div">
            <form>
                <div class="btn_top">
                    <button class="btn_filter btn_filter_by me-3" type="button"><img src="{{ asset('assets/images/icons/filter_by.svg') }}" class="me-3">Filter by</button>
                    <button class="close-btn hide" type="button"><img src="{{ asset('assets/images/icons/close-circle.svg') }}"></button>
                    <div class="select-sort-design">
                        <select class="select-custom-design">
                            <option>Sort by</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                        </select>
                    </div>
                </div>
                <div class="filter_by_div">
                    <div class="card_filter">
                        <h5 class="main-title">Service</h5>
                        @foreach($services as $service)
                        <h5>{{ $service->title }}</h5>
                        <div class="labels_div">
                            @foreach($service->servicesItems as $i => $item)
                            <label><input type="checkbox" wire:model="items.{{$item->id}}" value="{{$item->id}}" {{ in_array($item->id, $items) ? 'checked' : '' }}>
                                <span class="label-selection-text">{{ @$item->title }}</span></label>
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                    <div class="card_filter">
                        <h5 class="pb-2">Home Size</h5>
                        <input type="text" placeholder="Update square feet">
                    </div>
                    <div class="card_filter">
                        <h5 class="pb-2">Location</h5>
                        <input type="text" placeholder="Search by address">
                    </div>
                    <div class="card_filter date-picker-design">
                        <h5 class="pb-2">Start Date range</h5>
                        <input type="text" placeholder="" id="datepicker" readonly>
                    </div>
                    <div class="card_filter">
                        <h5 class="pb-2">Price Per Clean</h5>
                        <div class="price_input_div">
                            <input type="text" placeholder="$ 0" class="price_1">
                            <input type="text" placeholder="$ Max" class="price_2">
                        </div>
                    </div>
                    <div class="card_filter select-design">
                        <h5 class="pb-2">Rating</h5>
                        <div class="selecti-box">
                            <select class="select-custom-design">
                                <option>Select</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                        </div>
                    </div>
                    <div class="card_filter select-design">
                        <h5 class="pb-2">Addons Offered</h5>
                        <div class="selecti-box">
                            <select class="select-custom-design" wire:model="addons">
                                @foreach($itemAddOns as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card_filter">
                        <div class="h5_input_checkbox">
                            <h5 class="">Organic Cleaners Only<img src="assets/images/badges.svg" class="ms-3"></h5>
                            <input type="checkbox">
                        </div>
                        <div class="h5_input_checkbox">
                            <h5 class="">Insured Cleaners Only<img src="assets/images/insurance.svg" class="ms-3"></h5>
                            <input type="checkbox">
                        </div>
                    </div>
                    <div class="card_filter border-0">
                        <input type="text" placeholder="Search by keywords" class="search_input">
                    </div>
                    <div class="pb-5 d-flex reset-next-btn">
                        <button class="btn_reset"><img src="assets/images/icons/filter_by.svg" class="me-3">Reset</button>
                        <a class="btn_next">Next</a>
                    </div>
                </div>
            </form>
        </div>


        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 car_right_div">

            <div class="listing-row">
                @foreach($cleaners as $cleaner)
                <div class="listing-column lcd-4 lc-6">
                    <div class="card_search_result">
                        <div class="like_img">
                            <input type="checkbox" class="like_1">
                            <div id="imagePreview" class="profile-pic">
                                @if($cleaner->image)
                                <img src="{{asset('storage/images/'.$cleaner->image)}}"> 
                                @else
                                <img src="assets/images/iconshow.png"> 
                               @endif
                            </div>
                        </div>
                        <div class="bottom_card_text">
                            <div class="name_str">
                                <a href="javascript::void(0)" class="name_s">{{$cleaner->name}}</a>
                                <div class="m-hide">
                                    <img src="{{asset('assets/images/icons/star.svg')}}">
                                    4.5<span> (211)</span>
                                </div>
                            </div>
                            <div class="routine_text">
                                <p class="font-semibold">Routine - Every 2 Weeks</p>
                                <p class="font-medium">2,700 sq ft</p>
                                <p class="font-regular">Est Time : 3 shours</p>
                                <div class="badges_insurnce_img">
                                    <img src="{{asset('assets/images/badges.svg')}}">
                                    <img src="{{asset('assets/images/insurance.svg')}}">
                                </div>
                            </div>
                            <div class="btn_rate">
                                <b>$150</b>
                                <a href="{{route('profile',$cleaner->id)}}"><button class="btn_view d-none d-md-block">View</button></a>
                                <div class="td-hide rating-mobile-listing-design">
                                    <img src="{{asset('assets/images/icons/star.svg')}}">
                                    4.5<span> (211)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="pagination_search_div text-center">
            <div id="pagination-container" class="pagination_list"></div>
        </div>
    </div>
</div>
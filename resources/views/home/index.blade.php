@extends('layouts.app')
@section('content')
    <div class="banner_home">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="banner_text">
                        <h2 class="h2_tittle">Welcome to the Future of Cleaning.</h2>
                        <p>Finally... a place where you can get EXACTLY what you want, at prices you can afford, from people
                            you can trust. Simple. Affordable. Canary Clean. Your schedule, your Canary Cleaner. Canary
                            Clean is the #1 choice for those who know what they want - and for those who don’t!</p>
                        <h3>Find Canary Cleaners near you!</h3>
                        <form class="search-form"  action="{{ route('search-result') }}" method="GET">
                            <!-- <span class="close-search l-hide"><svg class="svg-inline--fa fa-xmark" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path></svg></span> -->
                            <div class="search-form-wrapper select-design">
                                <div class="select-search-design service-selector">
                                    <select class="select-custom-design-group search-bar select-service" name="selectItem" required>
                                        <option></option>
                                        <option>Any Service</option>
                                        @foreach ($services as $service)
                                            <optgroup label="{{ $service->title }}">
                                                @foreach ($service->servicesItems as $serviceItem)
                                                    <option value="{{ $serviceItem->id }}">{{ $serviceItem->title }}
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="any_size dropdown">
                                    <button class="dropdown-toggle" type="button" id="dropdownMenuButton1"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Any size
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <h3>Home Size</h3>
                                        <div class="input-design">
                                            <input type="number" placeholder="Enter Square Feet" name="homeSize"
                                                oninput="updateTextOfHomeSizeDropdownButton(this)" id="jsn">
                                        </div>
                                        <p>Can update on search page</p>
                                    </div>
                                </div>
                                {{-- <div class="select-search-design">
                                    <select class="select-custom-design search-bar select-homesize" name="homeSize" required>
                                        <option></option>
                                        <option value="1361">1361 sqft</option>
                                        <option value="2178">2178 sqft</option>
                                        <option value="2755">2755 sqft</option>
                                        <option value="3267">3267 sqft</option>
                                    </select>
                                </div> --}}
                                <div class="search-input-design">
                                    <input type="text" id="address_in_banner" name="address"
                                        placeholder="Enter location" required>
                                    <button class="search-btn" type="submit"><img
                                            src="/assets/images/icons/search.svg" class="me-2">Search</button>
                                </div>
                            </div>
                            <input type="text" id="latitude" name="latitude" hidden>
                                    <input type="text" id="longitude" name="longitude" hidden>
                        </form>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="cleaner_home_img">
                        <img src="/assets/images/home_cleaner.png">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="slider_section">
        <div class="container">
            <div class="slider">
                <div class="slides">
                    <div class="card_sliders">
                        <img src="/assets/images/icons/routine_cleanings.svg" />
                        <h5>Routine Cleanings</h5>
                    </div>
                </div>

                <div class="slides">
                    <div class="card_sliders">
                        <img src="/assets/images/icons/routine_cleanings.svg" />
                        <h5>Deep Cleans</h5>
                    </div>
                </div>

                <div class="slides">
                    <div class="card_sliders">
                        <img src="/assets/images/icons/custom_cleanings.svg" />
                        <h5>Custom Cleanings</h5>
                    </div>
                </div>

                <div class="slides">
                    <div class="card_sliders">
                        <img src="/assets/images/icons/speciality_cleaning.svg" />
                        <h5>Specialty Cleanings</h5>
                    </div>
                </div>

                <div class="slides">
                    <div class="card_sliders">
                        <img src="/assets/images/icons/routine_cleanings.svg" />
                        <h5>Routine Cleanings</h5>
                    </div>
                </div>

                <div class="slides">
                    <div class="card_sliders">
                        <img src="/assets/images/icons/routine_cleanings.svg" />
                        <h5>Deep Cleans</h5>
                    </div>
                </div>

                <div class="slides">
                    <div class="card_sliders">
                        <img src="/assets/images/icons/custom_cleanings.svg" />
                        <h5>Custom Cleanings</h5>
                    </div>
                </div>

                <div class="slides">
                    <div class="card_sliders">
                        <img src="/assets/images/icons/speciality_cleaning.svg" />
                        <h5>Specialty Cleanings</h5>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="canary_clean_section">
        <div class="container">
            <div class="row">
                <div class="col-md-5 p-0">
                    <img src="/assets/images/cannery_clean.jpg">
                </div>
                <div class="col-md-7 p-0">
                    <div class="canary_text">
                        <h2>Canary Clean Addresses the Chaos of Clean Home Outsourcing. </h2>
                        <ul>
                            <li>Pick who you want and see how they have performed in the past</li>
                            <li>Choose exactly what services you need - and nothing you don’t</li>
                            <li>Savor the savings - our customers save up to 50% or more over traditional companies </li>
                            <li>Enjoy the flexibility of reaching out to your Canary Cleaner directly</li>
                        </ul>
                        <a href="{{ route('search-result') }}" class="btn_c mt-4">Browse Cleaners</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="why_choose_section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="choose_text">
                        <div class="d-none d-md-block">
                            <h3 class="h3_tittle">Why Choose Us</h3>

                            <p>Canary Clean was born from the need to provide customers with the best cleaners at the lowest
                                cost, while letting cleaners keep more of what they own too! Its a win-win, and we love
                                that!</p>
                        </div>
                        <div class="choose_list">
                            <div class="card_why">
                                <img src="/assets/images/icons/quick_service.svg">
                                <h5>Quick Service</h5>
                                <p>All bookings are scheduled in a two-hour window - and many times you may find
                                    availability that same day!</p>
                            </div>
                            <div class="card_why">
                                <img src="/assets/images/icons/booking_online.svg">
                                <h5>Online Booking</h5>
                                <p>Start or stop service. Add a garage to your next cleaning. Change frquency. Pause.
                                    Anything you need to do related to cleaning you can do online! </p>
                            </div>
                            <div class="card_why">
                                <img src="/assets/images/icons/trust.svg">
                                <h5>Cleaners you can Trust</h5>
                                <p>Because we utilize a rating system, you can see a real track record for the cleaner as it
                                    relates to cleanings. Only paying customers can rate!</p>
                            </div>
                            <div class="card_why">
                                <img src="/assets/images/icons/support.svg">
                                <h5>Top-Notch Support</h5>
                                <p>You can message your Canary Clean team or individual directly! We also offer email
                                    support in case any other issues were to arsise - we always will do the right thing!</p>
                            </div>
                        </div>

                        <div class="why_choose_btns">
                            <a href="#" class="btn_c btn_b">Browse Cleaners</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-block d-md-none">
                        <h3 class="h3_tittle">Why Choose Us</h3>

                        <p>Canary Clean was born from the need to provide customers with the best cleaners at the lowest
                            cost, while letting cleaners keep more of what they own too! Its a win-win, and we love that!
                        </p>
                    </div>
                    <img src="/assets/images/why_choose_us.png" />
                </div>
            </div>
        </div>
    </div>

    @livewire('home.rated-cleaners')

    <div class="join_us_cleaning_services_section">
        <div class="row">
            <div class="col-md-6 join_us_div">
                <div class="card_cleaning_join">
                    <h3>Join Us</h3>
                    <p>Access more money, select more jobs. Canary Clean makes it easy to do more of what you love.</p>
                    <a href="{{ route('signup') }}" class="btn_c">Join Now</a>
                </div>
            </div>
            <div class="col-md-6 cleaning_services_div">
                <div class="card_cleaning_join">
                    <h3>Need Cleaning Services?</h3>
                    <p>Theres no place better to find affordable cleaning providers. Simple, fast, clean. </p>
                    <a href="{{ route('search-result') }}" class="btn_c">Browse Now</a>
                </div>
            </div>
        </div>
    </div>

    <div class="customers_says_sections">
        <div class="container">
            <div class="text-center">
                <h3 class="h3_tittle">What Our Customers Says</h3>
                <p>Transparency is important. When you speak, we listen!</p>
            </div>
            <div class="customer_slider">
                <div class="slides">
                    <div class="card_customers">

                        <div class="top_details">
                            <div class="name_degination">
                                <img src="/assets/images/pr_2.jpg">
                                <h4 class="h4_design border-0 p-0 mb-2">Anna Sarnowska</h4>
                                <span>dress salon</span>
                            </div>
                            <img src="/assets/images/icons/quote.svg">
                        </div>

                        <p class="customers_msg">..........</p>

                    </div>
                </div>

                <div class="slides">
                    <div class="card_customers">

                        <div class="top_details">
                            <div class="name_degination">
                                <img src="/assets/images/pr_2.jpg">
                                <h4 class="h4_design border-0 p-0 mb-2">Anna Sarnowska</h4>
                                <span>dress salon</span>
                            </div>
                            <img src="/assets/images/icons/quote.svg">
                        </div>

                        <p class="customers_msg">..........</p>

                    </div>
                </div>

                <div class="slides">
                    <div class="card_customers">

                        <div class="top_details">
                            <div class="name_degination">
                                <img src="/assets/images/pr_2.jpg">
                                <h4 class="h4_design border-0 p-0 mb-2">Anna Sarnowska</h4>
                                <span>dress salon</span>
                            </div>
                            <img src="/assets/images/icons/quote.svg">
                        </div>

                        <p class="customers_msg">..........</p>

                    </div>
                </div>

                <div class="slides">
                    <div class="card_customers">

                        <div class="top_details">
                            <div class="name_degination">
                                <img src="/assets/images/pr_2.jpg">
                                <h4 class="h4_design border-0 p-0 mb-2">Anna Sarnowska</h4>
                                <span>dress salon</span>
                            </div>
                            <img src="/assets/images/icons/quote.svg">
                        </div>

                        <p class="customers_msg">..........</p>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="news_update_section">
        <div class="container">
            <div class="text-center mb-5">
                <h3 class="h3_tittle">News and Updates</h3>
                <p>More fun bits about Canary Clean and the cleaning industry.</p>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card_rated">
                        <img src="/assets/images/update_1.jpg" class="clnr_img">
                        <div class="bottom_part">
                            <div class="date_coments">
                                <p class="me-3"><img src="/assets/images/icons/timer.svg">Jul 27 2023</p>
                                <p class=""><img src="/assets/images/icons/comments.svg">24 Comments</p>
                            </div>
                            <h5>Fast and efficient cleaning services for everyone.</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card_rated">
                        <img src="/assets/images/update_2.jpg" class="clnr_img">
                        <div class="bottom_part">
                            <div class="date_coments">
                                <p class="me-3"><img src="/assets/images/icons/timer.svg">Jul 27 2023</p>
                                <p class=""><img src="/assets/images/icons/comments.svg">24 Comments</p>
                            </div>
                            <h5>Home cleaning for any budget.</h5>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card_rated">
                        <img src="/assets/images/update_3.jpg" class="clnr_img">
                        <div class="bottom_part">
                            <div class="date_coments">
                                <p class="me-3"><img src="/assets/images/icons/timer.svg">Jul 27 2023</p>
                                <p class=""><img src="/assets/images/icons/comments.svg">24 Comments</p>
                            </div>
                            <h5>Stop paying twice as much for a cleaning company!</h5>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="clean_house_section">
        <div class="container">
            <div class="text-center mb-5">
                <h3 class="h3_tittle text-white">A Clean House Is a Happy House...</h3>
                <p class="text-white">...and a cluttered house is a cluttered mind - start your journey to a cleaner home!
                </p>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form class="search-form"  action="{{ route('search-result') }}" method="GET">
                        <!-- <span class="close-search l-hide"><svg class="svg-inline--fa fa-xmark" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path></svg></span> -->
                        <div class="search-form-wrapper">
                            <div class="select-search-design">
                                <select class="select-custom-design-group service-selector search-bar select-service" name="selectItem" required>
                                    <option></option>
                                    <option>Any Service</option>
                                    @foreach ($services as $service)
                                        <optgroup label="{{ $service->title }}">
                                            @foreach ($service->servicesItems as $serviceItem)
                                                <option value="{{ $serviceItem->id }}">{{ $serviceItem->title }}
                                                </option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>
                            <div class="any_size dropdown">
                                <button class="dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Any size
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <h3>Home Size</h3>
                                    <div class="input-design">
                                        <input type="number" placeholder="Enter Square Feet" name="homeSize"
                                            oninput="updateTextOfHomeSizeDropdownButton(this)" id="jsn">
                                    </div>
                                    <p>Can update on search page</p>
                                </div>
                            </div>
                            {{-- <div class="select-search-design">
                                <select class="select-custom-design search-bar select-homesize" name="homeSize" required>
                                    <option></option>
                                    <option value="1361">1361 sqft</option>
                                    <option value="2178">2178 sqft</option>
                                    <option value="2755">2755 sqft</option>
                                    <option value="3267">3267 sqft</option>
                                </select>
                            </div> --}}

                            <div class="search-input-design">
                                <input type="text" placeholder="Enter location" name="address" id="address_in_footer">
                                <button class="search-btn"><a href="search-result.html" class=""><img
                                            src="/assets/images/icons/search.svg"></a></button>
                            </div>
                        </div>
                        <input type="text" name="latitude" id="latitude_in_footer" hidden>
                        <input type="text" name="longitude" id="longitude_in_footer" hidden>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            window.addEventListener('load', () => {
                var address_input_in_banner = document.getElementById('address_in_banner');

                makeAddressInputAutocompletable(address_input_in_banner, (gmap_place) => {
                    document.getElementById('latitude').value = gmap_place.geometry.location.lat();
                    document.getElementById('longitude').value = gmap_place.geometry.location.lng();
                })

                var address_input_in_footer = document.getElementById('address_in_footer');
                makeAddressInputAutocompletable(address_input_in_footer, (gmap_place) => {
                    document.getElementById('latitude_in_footer').value  = gmap_place.geometry.location.lat();
                    document.getElementById('longitude_in_footer').value = gmap_place.geometry.location.lng();
                })

            });
        </script>


    @endpush
@endsection

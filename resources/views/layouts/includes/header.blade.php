<header id="header" class="{{ auth()->check() ? 'logged-in-user' : 'not-logged-in-user' }}">
    <div class="header-wrapper">
        <div class="container">
            <div class="header-flex">
                <div class="header-flex-item header-flex-item-1">
                    <div class="logo-wrapper">
                        <a href="{{ route('index') }}"><img src="{{ asset('/assets/images/logo/logo.svg') }}"></a>
                    </div>
                </div>

                <div class="header-flex-item header-flex-item-2">
                    <div class="search-form">
                        <span class="close-search l-hide"><i class="fa-solid fa-xmark"></i></span>

                        <form action="{{ route('search-result') }}" method="GET">

                            <div class="search-form-wrapper">
                                <div class="select-search-design">
                                    @php
                                        $services = \App\Models\Services::with('servicesItems')
                                            ->where('types_id', 1)
                                            ->get();
                                    @endphp

                                    <select class="select-custom-design-group search-bar select-service"
                                        name="selectItem" required>
                                        <option></option>
                                        <option value="0" selected>Select service</option>
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
                                        Enter size
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
                                <!-- <div class="select-search-design">
                                    <select class="select-custom-design-group search-bar select-homesize" name="homeSize" required>
                                        <option></option>
                                        <option value="1361">1361 sqft</option>
                                        <option value="2178">2178 sqft</option>
                                        <option value="2755">2755 sqft</option>
                                        <option value="3267">3267 sqft</option>
                                    </select>
                                </div> -->
                                <div class="search-input-design">

                                    <input type="text" id="address_in_header" name="address"
                                        placeholder="Enter location" required>
                                    <input type="text" id="latitude_in_header" name="latitude" hidden>
                                    <input type="text" id="longitude_in_header" name="longitude" hidden>

                                    <button class="search-btn"> <img
                                            src="{{ asset('/assets/images/icons/search.svg') }}"></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <button class="search-toggle l-hide"><img
                            src="{{ asset('/assets/images/icons/search.svg') }}"></button>
                </div>

                @if (Auth::Check())
                    <div class="header-flex-item header-flex-item-3">
                        <ul class="d-flex align-items-center">
                            <li class="nav-item email-notification">
                                <div class="dropdown">
                                    <a href="{{ route('messages') }}"
                                        class="btn dropdown-toggle position-relative btn-transparent">
                                        <img src="{{ asset('/assets/images/icons/email-2.svg') }}">
                                        <span class="notification-alert"></span>
                                    </a>
                                </div>
                            </li>
                            <li class="icon_calender  d-block d-lg-none">
                             <a href="#" class="link_calender">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                             </a>
                            </li>
                            <li class="nav-item signin account-profile">
                                <div class="dropdown">
                                    <button type="button" class="btn dropdown-toggle position-relative btn-transparent"
                                        data-bs-toggle="dropdown">
                                        @if (auth()->user()->image)
                                            <img src="{{ asset('storage/images/' . auth()->user()->image) }}">
                                        @else
                                            <img src="{{ asset('/assets/images/icons/profile-circle.svg') }}">
                                        @endif
                                        <span class="name">{{ auth()->user()->name }}</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <div class="customer_profile-info">
                                            <div class="d-flex align-items-center position-relative">
                                                <div class="customer-pro-img">
                                                    @if (auth()->user()->image)
                                                        <img
                                                            src="{{ asset('storage/images/' . auth()->user()->image) }}">
                                                    @else
                                                        <img
                                                            src="{{ asset('/assets/images/icons/profile-circle.svg') }}">
                                                    @endif
                                                </div>
                                                <div class="customer-pro-cntnt">
                                                    <h4>{{ auth()->user()->name }}</h4>
                                                    <p>{{ auth()->user()->role }}</p>
                                                </div>
                                                <div class="setting-div">
                                                    {{-- <a href="#"><img src="{{ asset('/assets/images/icons/setting.svg') }}"></a> --}}
                                                </div>
                                            </div>
                                            <div class="dropdown-list-design">
                                                <ul class="list-unstyled">
                                                    @if (Auth::user()->role == 'customer')
                                                        <li><a href="{{ route('customer.account') }}"
                                                                class="{{ @$title['active'] == 'account' ? 'active' : '' }}">Account</a>
                                                        </li>
                                                        <li><a href="{{ route('customer.appointment.index') }}"
                                                                class="{{ @$title['active'] == 'appointments' ? 'active' : '' }}">Appointments</a>
                                                        </li>
                                                        <li><a href="{{ route('customer.billing.index') }}"
                                                                class="{{ @$title['active'] == 'billing' ? 'active' : '' }}">Payments</a>
                                                        </li>
                                                        <li><a
                                                                href="{{ route('customer.notification.index') }}">Notifications</a>
                                                        </li>
                                                        <li><a href="{{ route('customer.favourite.index') }}"
                                                                class="{{ @$title['active'] == 'favourite' ? 'active' : '' }}">Favorites</a>
                                                        </li>
                                                        <li><a href="{{ route('customer.support.service') }}"
                                                                class="{{ @$title['active'] == 'support' ? 'active' : '' }}">Support</a>
                                                        </li>
                                                        <li><a
                                                            href="/terms-and-conditions">Terms and Conditions</a>
                                                    </li>
                                                    @elseif(Auth::user()->role == 'cleaner')
                                                        <ul class="list-unstyled">
                                                            <li class="profile_drop_down account_dropdown">
                                                                <a class="" href="#" class="">Account
                                                                    and Settings <img
                                                                        src="{{ asset('/assets/images/icons/drop-arrow.svg') }}"></a>
                                                                <ul class="dropdown_links">
                                                                    <li><a href="{{ route('cleaner.account') }}"
                                                                            class="active">View Account Info</a></li>
                                                                    <li><a href="{{ route('cleaner.team') }}"
                                                                            class="">Team</a></li>
                                                                    <li><a href="{{ route('cleaner.availability.index') }}"
                                                                            class="">Set Availability</a></li>
                                                                    <li><a href="{{ route('cleaner.services.index') }}"
                                                                            class="">Set Services</a></li>
                                                                    <li><a href="{{ route('cleaner.set-location') }}"
                                                                            class="">Set Locations Served</a>
                                                                    </li>
                                                                    <li><a href="{{ route('cleaner.notification.index') }}"
                                                                            class="">Notifications</a></li>
                                                                    <li><a href="{{ route('cleaner.reviews') }}"
                                                                            class="">Reviews</a></li>
                                                                    <li><a
                                                                            href="{{ route('cleaner.billing.billing') }}">Billing</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li><a href="{{ route('cleaner.jobs.jobs') }}">Jobs</a>
                                                            </li>

                                                            {{--   <li><a href="{{route('cleaner.billing.editBankAccount')}}">Billing</a></li> --}}
                                                            <li><a href="{{ route('cleaner.insurance') }}">Insurance
                                                                    and Badges</a></li>
                                                            <li><a
                                                                    href="{{ route('cleaner.support.service') }}">Support</a>
                                                            </li>
                                                            <li><a
                                                                href="/terms-and-conditions">Terms and Conditions</a>
                                                        </li>
                                                        </ul>
                                                    @endif

                                                </ul>
                                            </div>
                                            <div class="dropsown-logout-design">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();">
                                                    <img src="{{ asset('/assets/images/icons/logout.svg') }}">
                                                    {{ __('Logout') }}
                                                </a>
                                                <form action="{{ route('logout') }}" method="post"
                                                    id="logout-form">
                                                    @csrf
                                                    {{--   <button type="submit" style="border: none; background: transparent;"><img src="{{ asset('/assets/images/icons/logout.svg') }}">
                                                    Logout</button>  --}}
                                                </form>

                                            </div>
                                        </div>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                @else
                    <div class="header-flex-item header-flex-item-3 btn_new_3">
                        <div class="btn_sign_in_sign_up">
                            <a href="{{ route('signup') }}" class="btn_sign_up"><img
                                    src="{{ asset('/assets/images/icons/user.svg') }}">Sign Up</a>
                            <a href="{{ route('login') }}" class="btn_sign_in"><img
                                    src="{{ asset('/assets/images/icons/user.svg') }}">Sign in</a>
                        </div>
                        <a href="{{ route('signup-cleaner') }}" class="d-none d-md-block"><span
                                class="b_cleaner">Become a Cleaner!</span></a>
                    </div>

                @endif
                <div class="toggle_menu d-block d-lg-none">
                    <img src="{{ asset('/assets/images/icons/toggle.svg') }}">
                </div>
            </div>
        </div>
    </div>
</header>
<script>
    $(document).ready(function() {

        $(".toggle_menu").click(() => {
            $('.bar_left').toggleClass('show');
        });

    });
</script>


<header id="header">
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


                                    <select class="select-custom-design-group" name="selectItem" required>
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
                                <div class="select-search-design">
                                    <select class="select-custom-design-group" name="homeSize" required>
                                        <option value="1361">1361 sqft</option>
                                        <option value="2178">2178 sqft</option>
                                        <option value="2755">2755 sqft</option>
                                        <option value="3267">3267 sqft</option>
                                    </select>
                                </div>
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
                                    <button type="button" class="btn dropdown-toggle position-relative btn-transparent"
                                        data-bs-toggle="dropdown">
                                        <img src="{{ asset('/assets/images/icons/email-2.svg') }}">
                                        <span class="notification-indicators">11</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="message.html">Link 1</a></li>
                                        <li><a class="dropdown-item" href="message.html">Link 2</a></li>
                                        <li><a class="dropdown-item" href="message.html">Link 3</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item signin account-profile">
                                <div class="dropdown">
                                    <button type="button" class="btn dropdown-toggle position-relative btn-transparent"
                                        data-bs-toggle="dropdown">
                                        <img src="{{ asset('storage/images/' . auth()->user()->image) }}">
                                        <span class="name">{{ auth()->user()->name }}</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <div class="customer_profile-info">
                                            <div class="d-flex align-items-center position-relative">
                                                <div class="customer-pro-img">
                                                    <img src="{{ asset('storage/images/' . auth()->user()->image) }}">
                                                </div>
                                                <div class="customer-pro-cntnt">
                                                    <h4>{{ auth()->user()->name }}</h4>
                                                    <p>{{ auth()->user()->role }}</p>
                                                </div>
                                                <div class="setting-div">
                                                    <a href="customer-account.html"><img
                                                            src="{{ asset('/assets/images/icons/setting.svg') }}"></a>
                                                </div>
                                            </div>
                                            <div class="dropdown-list-design">
                                                <ul class="list-unstyled">
                                                    @if (Auth::user()->role == 'customer')
                                                        <li><a href="{{ route('customer.account') }}">Account</a></li>
                                                        <li><a href="customer-appoitments.html">Appointments</a></li>
                                                        <li><a href="#">Billing</a></li>
                                                        <li><a href="customer-notification.html">Notifications</a></li>
                                                        <li><a href="customer-support-past-service.html">Support</a>
                                                        </li>
                                                    @else
                                                        <li><a href="{{ route('cleaner.account') }}">Account</a></li>
                                                        <li><a href="customer-appoitments.html">Appointments</a></li>
                                                        <li><a
                                                                href="{{ route('cleaner.billing.editBankAccount') }}">Billing</a>
                                                        </li>
                                                        <li><a
                                                                href="{{ route('cleaner.notification.index') }}">Notifications</a>
                                                        </li>
                                                        <li><a
                                                                href="{{ route('cleaner.support.service') }}">Supports</a>
                                                        </li>
                                                    @endif

                                                </ul>
                                            </div>
                                            <div class="dropsown-logout-design">

                                                <form action="{{ route('logout') }}" method="post">
                                                    @csrf
                                                    <button type="submit"
                                                        style="border: none; background: transparent;"><img
                                                            src="{{ asset('/assets/images/icons/logout.svg') }}">
                                                        Logout</button>
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
                        <a href="{{ route('signup-cleaner') }}"><span class="b_cleaner">Become a Cleaner!</span></a>
                    </div>
                    <div class="toggle_menu d-block d-lg-none">
                        <img src="{{ asset('/assets/images/icons/toggle.svg') }}">
                    </div>
                @endif


            </div>
        </div>
    </div>
</header>

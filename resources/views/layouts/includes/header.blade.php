<header id="header">
    <div class="header-wrapper">
        <div class="container">
            <div class="header-flex">
                <div class="header-flex-item header-flex-item-1">
                    <div class="logo-wrapper">
                        <a href="{{route('index')}}"><img src="{{asset('assets/images/logo/logo.svg')}}"></a>
                    </div>
                </div>
                <div class="header-flex-item header-flex-item-2">
                    <div class="search-form">
                        <span class="close-search l-hide"><i class="fa-solid fa-xmark"></i></span>
                        <div class="search-form-wrapper">
                            <div class="select-search-design">
                                <select>
                                    <option>Any service</option>
                                    <option>Service</option>
                                    <option>Service</option>
                                </select>
                            </div>
                            <div class="select-search-design">
                                <select>
                                    <option>Any size</option>
                                    <option>Service</option>
                                    <option>Service</option>
                                </select>
                            </div>
                            <div class="search-input-design">
                                <input type="text" placeholder="Enter location">
                                <button class="search-btn"><a href="search-result.html" class=""><img src="{{asset('assets/images/icons/search.svg')}}"></a></button>
                            </div>
                        </div>
                    </div>
                    <button class="search-toggle l-hide"><img src="{{asset('assets/images/icons/search.svg')}}"></button>
                </div>

                @if (Auth::Check())
                <div class="header-flex-item header-flex-item-3">
                    <ul class="d-flex align-items-center">
                        <li class="nav-item email-notification">
                            <div class="dropdown">
                                <button type="button" class="btn dropdown-toggle position-relative btn-transparent" data-bs-toggle="dropdown">
                                    <img src="{{asset('assets/images/icons/email-2.svg')}}">
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
                                <button type="button" class="btn dropdown-toggle position-relative btn-transparent" data-bs-toggle="dropdown">
                                    <img src="{{asset('storage/images/'.auth()->user()->image)}}">
                                    <span class="name">{{auth()->user()->name}}</span>
                                </button>
                                <ul class="dropdown-menu">
                                    <div class="customer_profile-info">
                                        <div class="d-flex align-items-center position-relative">
                                            <div class="customer-pro-img">
                                                <img src="{{asset('assets/images/thumbnail.png')}}">
                                            </div>
                                            <div class="customer-pro-cntnt">
                                                <h4>{{auth()->user()->name}}</h4>
                                                <p>{{auth()->user()->role}}</p>
                                            </div>
                                            <div class="setting-div">
                                                <a href="customer-account.html"><img src="{{asset('assets/images/icons/setting.svg')}}"></a>
                                            </div>
                                        </div>
                                        <div class="dropdown-list-design">
                                            <ul class="list-unstyled">
                                                @if (Auth::user()->role=="customer")
                                                <li><a href="{{route('customer.account')}}">Account</a></li>
                                                <li><a href="customer-appoitments.html">Appointments</a></li>
                                                <li><a href="#">Billing</a></li>
                                                <li><a href="customer-notification.html">Notifications</a></li>
                                                <li><a href="customer-support-past-service.html">Support</a></li>

                                                @else
                                                <li><a href="{{route('cleaner.account')}}">Account</a></li>
                                                <li><a href="customer-appoitments.html">Appointments</a></li>
                                                <li><a href="{{route('cleaner.billing.editBankAccount')}}">Billing</a></li>
                                                <li><a href="customer-notification.html">Notifications</a></li>
                                                <li><a href="customer-support-past-service.html">Support</a></li>
                                                @endif

                                            </ul>
                                        </div>
                                        <div class="dropsown-logout-design">

                                            <form action="{{ route('logout') }}" method="post">
                                                @csrf
                                                <button type="submit"><img src="{{asset('assets/images/icons/logout.svg')}}"> Logout</button>
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
                        <a href="{{route('signup')}}" class="btn_sign_up"><img src="{{asset('assets/images/icons/user.svg')}}">Sign Up</a>
                        <a href="{{route('login')}}" class="btn_sign_in"><img src="{{asset('assets/images/icons/user.svg')}}">Sign in</a>
                    </div>
                    <a href="{{route('signup-cleaner')}}"><span class="b_cleaner">Become a Cleaner!</span></a>
                </div>
                <div class="toggle_menu d-block d-lg-none">
                    <img src="{{asset('assets/images/icons/toggle.svg')}}">
                </div>
                @endif


            </div>
        </div>
    </div>
</header>
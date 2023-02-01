<header id="header" class="header-second-design">
  <div class="header-wrapper">
    <div class="container">
      <div class="header-flex">
        <div class="header-flex-item header-flex-item-1">
          <div class="logo-wrapper">
            <a href="{{route('index')}}"><img src="{{asset('/assets/images/logo/logo.svg')}}"></a>
          </div>
        </div>
        <div class="header-flex-item header-flex-item-3 cleaner_header_right">
          {{-- <p class="cleaner_text_top">Your profile is paused, click to go live!</p> --}}
          <div class="form-check form-switch">
            @livewire('cleaner-header')

          </div>
          <ul class="d-flex align-items-center">
            <li class="nav-item email-notification">
                <div class="dropdown">
                    <a href="{{ route('messages') }}" class="btn dropdown-toggle position-relative btn-transparent">
                        <img src="{{ asset('/assets/images/icons/email-2.svg') }}">
                        <span class="notification-alert"></span>
                    </a>
                </div>
            </li>
            <li class="nav-item signin account-profile">

              <div class="dropdown">
                <button type="button" class="btn dropdown-toggle position-relative btn-transparent" data-bs-toggle="dropdown" id="header-profile-dropdown-btn">
                  <!-- <img src="{{asset('/assets/images/icons/profile-circle.svg')}}"> -->
                  @if(auth()->user()->image)
                  <img src="{{asset('storage/images/'.auth()->user()->image)}}">
                  @else
                  <img src="{{asset('/assets/images/icons/profile-circle.svg')}}">
                  @endif
                  <span class="name">{{auth()->user()->name}}</span>
                </button>
                <ul class="dropdown-menu" id="header-profile-dropdown-menu">
                  <div class="customer_profile-info">
                    <div class="d-flex align-items-center position-relative">
                      <div class="customer-pro-img">
                      @if(auth()->user()->image)
                        <img src="{{asset('storage/images/'.auth()->user()->image)}}">
                        @else
                        <img src="{{asset('/assets/images/icons/profile-circle.svg')}}">
                        @endif
                      </div>
                      <div class="customer-pro-cntnt">

                        <h4>{{auth()->user()->name}}</h4>
                        <p>{{auth()->user()->role}}</p>
                      </div>
                      <div class="setting-div">
                      {{--  <a href="#"><img src="{{asset('/assets/images/icons/setting.svg')}}"></a> --}}
                      </div>
                    </div>
                    <div class="dropdown-list-design">
                      <ul class="list-unstyled">
                        <li class="profile_drop_down account_dropdown">
                          <a class="" href="#" class="">Account and Settings <img src="{{asset('/assets/images/icons/drop-arrow.svg')}}"></a>
                          <ul class="dropdown_links">
                            <li><a href="{{route('cleaner.account')}}" class="active">View Account Info</a></li>
                            <li><a href="{{route('cleaner.team')}}" class="">Team</a></li>
                            <li><a href="{{route('cleaner.availability.index')}}" class="">Set Availability</a></li>
                            <li><a href="{{route('cleaner.services.index')}}" class="">Set Services</a></li>
                            <li><a href="{{route('cleaner.set-location')}}" class="">Set Locations Served</a></li>
                            <li><a href="{{route('cleaner.notification.index')}}" class="">Notification Preferences</a></li>
                            <li><a href="{{route('cleaner.reviews')}}" class="">Reviews</a></li>
                          </ul>
                        </li>
                        <li><a href="{{route('cleaner.jobs.jobs')}}">Jobs</a></li>
                        <li><a href="{{route('cleaner.billing.editBankAccount')}}">Billing</a></li>
                        <li><a href="{{route('cleaner.notification.index')}}">Notifications</a></li>
                        <li><a href="{{route('cleaner.support.service')}}">Support</a></li>
                      </ul>
                    </div>
                    <div class="dropsown-logout-design">
                      <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" style="border: none; background: transparent"><img src="{{asset('/assets/images/icons/logout.svg')}}"> Logout</button>
                      </form>

                    </div>
                  </div>
                </ul>
              </div>

            </li>
          </ul>
        </div>
        <div class="toggle_menu d-block d-md-none">
          <img src="{{asset('/assets/images/icons/toggle.svg')}}">
        </div>
      </div>
    </div>
  </div>
</header>
<script>
    $(document).ready(function(){

        $(".toggle_menu").click( () => {
            $('.bar_left').toggleClass('show');
        });

    });
    </script>

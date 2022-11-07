<div class="customer-side-navigation navigation-tab-desing">
                <ul class="list-unstyled">
                @if (Auth::user()->role=="customer")
                <li><a class="nav-link {{ request()->routeIs('customer.account') ? ' active' : '' }}" href="{{ route('customer.account') }}">Account </a></li>

                @else
                  <li class="account_dropdown">
                    
                    <a href="#" class="nav-link active dropdown-toggle show" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Account and Settings <img src="{{asset('./assets/images/icons/drop-arrow.svg')}}"></a>
                  <ul class="dropdown_links dropdown-menu show" aria-labelledby="navbarDropdown">
                    <li><a href="{{route('cleaner.account')}}" class="active">View Account Info</a></li>
                    <li><a href="{{route('cleaner.team')}}" class="">Team</a></li>
                    <li><a href="cleaner-set-availability.html" class="">Set Availability</a></li>
                    <li><a href="cleaner-set-service.html" class="">Set Services</a></li>
                    <li><a href="cleaner-set-location.html" class="">Set Locations Served</a></li>
                    <li><a href="cleaner-notification.html" class="">Notification Preferences</a></li>
                    <li><a href="cleaner-reviews.html" class="">Reviews</a></li>
                  </ul>
                  </li>
                  @endif

                  <li><a href="cleaner-appoitments.html">Appointments</a></li>
                  <li><a href="cleaner-billing.html" >Billing</a></li>
                  <li><a href="cleaner-notification.html">Notifications</a></li>
                  <li><a href="cleaner-support-past-service.html">Support</a></li>
                </ul>
              </div>
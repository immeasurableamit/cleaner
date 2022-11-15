<div class="customer-side-navigation navigation-tab-desing">
    <ul class="list-unstyled">
    @if (Auth::user()->role=="customer")
    <li><a class="nav-link {{ request()->routeIs('customer.account') ? ' active' : '' }}" href="{{ route('customer.account') }}">Account </a></li>

    @elseif (Auth::user()->role=="cleaner")
      <li class="account_dropdown">
        
        <a href="#" class="nav-link active dropdown-toggle show" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Account and Settings <img src="{{asset('./assets/images/icons/drop-arrow.svg')}}"></a>
      <ul class="dropdown_links dropdown-menu show" aria-labelledby="navbarDropdown">
        <li><a href="{{route('cleaner.account')}}" class="{{ @$title['active']=='account' ? 'active' : '' }}">View Account Info</a></li>
        <li><a href="{{route('cleaner.team')}}" class="{{ @$title['active']=='team' ? 'active' : '' }}">Team</a></li>
        <li><a href="{{route('cleaner.availability.index')}}" class="{{ @$title['active']=='availability' ? 'active' : '' }}">Set Availability</a></li>
        <li><a href="cleaner-set-service.html" class="">Set Services</a></li>
        <li><a href="cleaner-set-location.html" class="">Set Locations Served</a></li>
        <li><a href="cleaner-notification.html" class="">Notification Preferences</a></li>
        <li><a href="{{route('cleaner.reviews')}}" class="{{ @$title['active']=='reviews' ? 'active' : '' }}">Reviews</a></li>
      </ul>
      </li>
      @endif

      <li><a href="cleaner-appoitments.html">Appointments</a></li>
      <li><a href="cleaner-billing.html" >Billing</a></li>
      <li><a href="cleaner-notification.html">Notifications</a></li>
      <li><a href="{{route('support.service')}}" class="{{ @$title['active']=='support' ? 'active' : '' }}">Support</a></li>
    </ul>
  </div>
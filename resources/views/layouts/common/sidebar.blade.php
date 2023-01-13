<div class="customer-side-navigation navigation-tab-desing">
    <ul class="list-unstyled">
    @if (Auth::user()->role=="customer")
    <li><a class="nav-link {{ request()->routeIs('customer.account') ? ' active' : '' }}" href="{{ route('customer.account') }}">Account </a></li>
    <li><a href="{{route('customer.appointment.index')}}" class="{{ @$title['active']=='appoinment' ? 'active' : '' }}">Appoinments</a></li>
    <li><a href="{{route('customer.billing.index')}}" class="{{ @$title['active']=='billing' ? 'active' : '' }}">Billing</a></li>
    <li><a href="{{ route('customer.notification.index') }}" class="{{ @$title['active'] == 'notification' ? 'active' : '' }}">Notification</a></li>
    <li><a href="{{route('customer.favourite.index') }}" class="{{ @$title['active']=='favourite' ? 'active' : '' }}">Favourite</a></li>
    <li><a href="{{ route('customer.support.service') }}">Support</a></li>


    @elseif (Auth::user()->role=="cleaner")
      <li class="account_dropdown">

        <a href="#" class="nav-link active dropdown-toggle show" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Account and Settings <img src="{{asset('./assets/images/icons/drop-arrow.svg')}}"></a>
      <ul class="dropdown_links dropdown-menu show" aria-labelledby="navbarDropdown">
        <li><a href="{{route('cleaner.account')}}" class="{{ @$title['active']=='account' ? 'active' : '' }}">View Account Info</a></li>
        <li><a href="{{route('cleaner.team')}}" class="{{ @$title['active']=='team' ? 'active' : '' }}">Team</a></li>
        <li><a href="{{route('cleaner.availability.index')}}" class="{{ @$title['active']=='availability' ? 'active' : '' }}">Set Availability</a></li>
        <li><a href="{{ route('cleaner.services.index') }}" class="{{ @$title['active']=='services' ? 'active' : '' }}">Set Services</a></li>
        <li><a href="{{ route('cleaner.set-location') }}" class="">Set Locations Served</a></li>
        <li><a href="{{route('cleaner.notification.index')}}" class="{{ @$title['active']=='notification' ? 'active' : '' }}">Notification Preferences</a></li>
        <li><a href="{{route('cleaner.reviews')}}" class="{{ @$title['active']=='reviews' ? 'active' : '' }}">Reviews</a></li>
        <li><a href="{{route('cleaner.billing.billing')}}" class="{{ @$title['active']=='billing' ? 'active' : '' }}">Billing</a></li>
      </ul>
      </li>

      <li><a href="{{route('cleaner.jobs.jobs')}}" class="{{ @$title['active']=='jobs' ? 'active' : '' }}">Jobs</a></li>
      <li><a href="{{ route('cleaner.insurance') }}">Insurance and Badges </a></li>

      <li><a href="{{route('cleaner.notification.index')}}" class="{{ @$title['active']=='notification' ? 'active' : '' }}">Notifications</a></li>
      <li><a href="{{route('cleaner.support.service')}}" class="{{ @$title['active']=='support' ? 'active' : '' }}">Support</a></li>
      @endif
    </ul>
  </div>

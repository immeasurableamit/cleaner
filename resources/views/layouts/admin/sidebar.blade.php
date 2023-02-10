<div id="admin-sidebar">
    <ul class="list-unstyled admin-ul-first">
        @if (Auth::user()->role=="admin")
      <li><a href="#"><img src="{{ asset('assets/admin/images/icons/Dashboard.svg') }}"> Dashboard</a></li>
      <li class="nav-link {{ request()->routeIs('admin.jobs') ? ' active' : '' }}"><a href="{{route('admin.jobs')}}"><img src="{{ asset('assets/admin/images/icons/jobs.svg') }}"> Jobs</a></li>
      <li class="nav-link {{ request()->routeIs('admin.customer') ? 'active' : '' }}"><a href="{{route('admin.customer')}}" class="{{ @$title['active']=='appointments' ? 'active' : '' }}"><img src="{{ asset('assets/admin/images/icons/customers.svg') }}"> Customers</a></li>
      <li class="nav-link {{ request()->routeIs('admin.cleaner') ? 'active' : '' }}"><a href="{{route('admin.cleaner')}}"><img src="{{ asset('assets/admin/images/icons/cleaners.svg') }}"> Cleaners</a></li>
      <li class="nav-link {{ request()->routeIs('admin.services.index') ? 'active' : '' }}"><a href="{{route('admin.services.index')}}"><img src="{{ asset('assets/admin/images/icons/cleaners.svg') }}"> Services</a></li>
    </ul>
    <ul class="list-unstyled admin-ul-scnd">
      <li class="nav-link {{ request()->routeIs('admin.faqs') ? 'active' : '' }}"><a href="{{route('admin.faqs')}}"><img src="{{ asset('assets/admin/images/icons/faq.svg') }}"> FAQs</a></li>
      <li class="nav-link {{ request()->routeIs('admin.support.service') ? 'active' : '' }}"><a href="{{route('admin.support.service')}}"><img src="{{ asset('assets/admin/images/icons/support.svg') }}"> Support</a></li>
      <li class="nav-link {{ request()->routeIs('admin.setting') ? 'active' : '' }}"><a href="{{route('admin.setting')}}"><img src="{{ asset('assets/admin/images/icons/support.svg') }}"> Settings</a></li>
      <li class="nav-link {{ request()->routeIs('admin.support.contactus') ? 'active' : '' }}"><a href="{{route('admin.support.contactus')}}"><img src="{{ asset('assets/admin/images/icons/support.svg') }}"> Contact us</a></li>
      <!-- <li><a href="#"><img src="{{ asset('assets/admin/images/icons/logout.svg') }}"> Logout</a></li> -->
      @endif
    </ul>
</div>

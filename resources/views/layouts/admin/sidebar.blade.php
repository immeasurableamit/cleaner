<div id="admin-sidebar">
    <ul class="list-unstyled admin-ul-first">
      <li><a href="#"><img src="{{ asset('assets/admin/images/icons/Dashboard.svg') }}"> Dashboard</a></li>
      <li><a href="{{route('admin.jobs')}}"><img src="{{ asset('assets/admin/images/icons/jobs.svg') }}"> Jobs</a></li>
      <li class=""><a href="{{route('admin.customer')}}"><img src="{{ asset('assets/admin/images/icons/customers.svg') }}"> Customers</a></li>
      <li><a href="{{route('admin.cleaner')}}"><img src="{{ asset('assets/admin/images/icons/cleaners.svg') }}"> Cleaners</a></li>
      <li><a href="{{route('admin.services.index')}}"><img src="{{ asset('assets/admin/images/icons/cleaners.svg') }}"> Services</a></li>
    </ul>
    <ul class="list-unstyled admin-ul-scnd">
      <li><a href="#"><img src="{{ asset('assets/admin/images/icons/faq.svg') }}"> FAQs</a></li>
      <li><a href="{{route('admin.support.service')}}"><img src="{{ asset('assets/admin/images/icons/support.svg') }}"> Support</a></li>
      <li><a href="{{route('admin.setting')}}"><img src="{{ asset('assets/admin/images/icons/support.svg') }}"> Settings</a></li>
      <li><a href="{{route('admin.support.contactus')}}"><img src="{{ asset('assets/admin/images/icons/support.svg') }}"> Contact us</a></li>
      <li><a href="#"><img src="{{ asset('assets/admin/images/icons/logout.svg') }}"> Logout</a></li>
    </ul>
</div>

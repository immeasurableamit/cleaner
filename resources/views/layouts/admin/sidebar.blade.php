<div id="admin-sidebar">
    <ul class="list-unstyled admin-ul-first">
      <li><a href="#"><img src="{{ asset('assets/admin/images/icons/Dashboard.svg') }}"> Dashboard</a></li>
      <li><a href="jobs-search.html"><img src="{{ asset('assets/admin/images/icons/jobs.svg') }}"> Jobs</a></li>
      <li class="active"><a href="{{route('admin.customer')}}"><img src="{{ asset('assets/admin/images/icons/customers.svg') }}"> Customers</a></li>
      <li><a href="{{route('admin.cleaner')}}"><img src="{{ asset('assets/admin/images/icons/cleaners.svg') }}"> Cleaners</a></li>
    </ul>
    <ul class="list-unstyled admin-ul-scnd">
      <li><a href="#"><img src="{{ asset('assets/admin/images/icons/faq.svg') }}"> FAQs</a></li>
      <li><a href="{{route('admin.support')}}"><img src="{{ asset('assets/admin/images/icons/support.svg') }}"> Support</a></li>
      <li><a href="#"><img src="{{ asset('assets/admin/images/icons/logout.svg') }}"> Logout</a></li>
    </ul>
</div>
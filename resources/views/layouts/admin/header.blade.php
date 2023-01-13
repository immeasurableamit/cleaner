<header id="admin-header">
   <div class="admin-header-wrapper">
    <div class="admin-left-header">
      <div class="logo-wrapper">
        <a href="#"><img src="{{ asset('assets/images/logo/logo.svg') }}"></a>
       </div>
    </div>

    <div class="admin-right-header">
        <ul class="admin-master-search">
          <li class="search-box position-relative">
          <form>
          <input type="search" placeholder="Search here...">
          <button type="submit" class="admin-search-btn"><img src="{{ asset('assets/images/icons/search.svg') }}"></button>
          </form>
          </li>
          <li class="notification-li">
            <div class="dropdown">
              <button type="button" class="dropdown-toggle position-relative" data-bs-toggle="dropdown">
                <span class="icn"><i class="far fa-bell"></i></span>
                <span class="indicators">01</span>
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Link 1</a></li>
                <li><a class="dropdown-item" href="#">Link 2</a></li>
                <li><a class="dropdown-item" href="#">Link 3</a></li>
              </ul>
            </div>
          </li>
          <li class="email-li position-relative">
            <span class="icn"><i class="far fa-envelope"></i></span>
            <span class="indicators">01</span>
          </li>
          <li class="admin-user-li position-relative">
            <div class="dropdown">
              <button type="button" class="dropdown-toggle position-relative" data-bs-toggle="dropdown">
                  <img src="{{ asset('assets/images/thumbnail.png') }}">
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Link 1</a></li>
                <li><a class="dropdown-item" href="#">Link 2</a></li>
              <!--   <li><a class="dropdown-item" href="#">Link 3</a></li> -->
                <form action="{{ route('logout') }}" method="post">
                                                @csrf
                                                <button type="submit"><img src="{{asset('assets/images/icons/logout.svg')}}"> Logout</button>
                                            </form>
              </ul>
            </div>
          </li>
        </ul>
    </div>
   </div>
</header>
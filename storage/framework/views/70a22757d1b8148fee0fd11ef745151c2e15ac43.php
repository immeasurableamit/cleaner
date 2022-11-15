<header id="header" class="header-second-design">
  <div class="header-wrapper">
    <div class="container">
      <div class="header-flex">
        <div class="header-flex-item header-flex-item-1">
          <div class="logo-wrapper">
            <a href="<?php echo e(route('index')); ?>"><img src="<?php echo e(asset('assets/images/logo/logo.svg')); ?>"></a>
          </div>
        </div>
        <div class="header-flex-item header-flex-item-3 cleaner_header_right">
          <p class="cleaner_text_top">Your profile is paused, click to go live!</p>
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDisabled" disabled>
          </div>
          <ul class="d-flex align-items-center">
            <li class="nav-item email-notification">
              <div class="dropdown">
                <button type="button" class="btn dropdown-toggle position-relative btn-transparent" data-bs-toggle="dropdown">
                  <img src="<?php echo e(asset('assets/images/icons/email-2.svg')); ?>">
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
                  <!-- <img src="<?php echo e(asset('assets/images/icons/profile-circle.svg')); ?>"> -->
                  <img src="<?php echo e(asset('storage/images/'.auth()->user()->image)); ?>">
                  <span class="name"><?php echo e(auth()->user()->name); ?></span>
                </button>
                <ul class="dropdown-menu">
                  <div class="customer_profile-info">
                    <div class="d-flex align-items-center position-relative">
                      <div class="customer-pro-img">
                        <img src="<?php echo e(asset('assets/images/thumbnail.png')); ?>">
                      </div>
                      <div class="customer-pro-cntnt">
                     
                        <h4><?php echo e(auth()->user()->name); ?></h4>
                        <p><?php echo e(auth()->user()->role); ?></p>
                      </div>
                      <div class="setting-div">
                        <a href="#"><img src="<?php echo e(asset('assets/images/icons/setting.svg')); ?>"></a>
                      </div>
                    </div>
                    <div class="dropdown-list-design">
                      <ul class="list-unstyled">
                        <li class="profile_drop_down account_dropdown">
                          <a class="" href="#" class="">Account and Settings <img src="<?php echo e(asset('./assets/images/icons/drop-arrow.svg')); ?>"></a>
                          <ul class="dropdown_links">
                            <li><a href="<?php echo e(route('cleaner.account')); ?>" class="active">View Account Info</a></li>
                            <li><a href="<?php echo e(route('cleaner.team')); ?>" class="">Team</a></li>
                            <li><a href="cleaner-set-availability.html" class="">Set Availability</a></li>
                            <li><a href="cleaner-set-service.html" class="">Set Services</a></li>
                            <li><a href="cleaner-set-location.html" class="">Set Locations Served</a></li>
                            <li><a href="cleaner-notification.html" class="">Notification Preferences</a></li>
                            <li><a href="<?php echo e(route('cleaner.reviews')); ?>" class="">Reviews</a></li>
                          </ul>
                        </li>
                        <li><a href="cleaner-appoitments.html">Appointments</a></li>
                        <li><a href="cleaner-billing.html">Billing</a></li>
                        <li><a href="cleaner-notification.html">Notifications</a></li>
                        <li><a href="cleaner-support-past-service.html">Support</a></li>
                      </ul>
                    </div>
                    <div class="dropsown-logout-design">
                      <form action="<?php echo e(route('logout')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <button type="submit"><img src="<?php echo e(asset('assets/images/icons/logout.svg')); ?>"> Logout</button>
                      </form>

                    </div>
                  </div>
                </ul>
              </div>
            </li>
          </ul>
        </div>
        <div class="toggle_menu d-block d-md-none">
          <img src="<?php echo e(asset('assets/images/icons/toggle.svg')); ?>">
        </div>
      </div>
    </div>
  </div>
</header><?php /**PATH /var/www/html/cleaner/resources/views/layouts/includes/cleanerHeader.blade.php ENDPATH**/ ?>
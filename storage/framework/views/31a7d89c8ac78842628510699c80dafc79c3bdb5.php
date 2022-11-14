<div class="customer-side-navigation navigation-tab-desing">
                <ul class="list-unstyled">
                <?php if(Auth::user()->role=="customer"): ?>
                <li><a class="nav-link <?php echo e(request()->routeIs('customer.account') ? ' active' : ''); ?>" href="<?php echo e(route('customer.account')); ?>">Account </a></li>

                <?php else: ?>
                  <li class="account_dropdown">
                    
                    <a href="#" class="nav-link active dropdown-toggle show" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Account and Settings <img src="<?php echo e(asset('./assets/images/icons/drop-arrow.svg')); ?>"></a>
                  <ul class="dropdown_links dropdown-menu show" aria-labelledby="navbarDropdown">
                    <li><a href="<?php echo e(route('cleaner.account')); ?>" class="active">View Account Info</a></li>
                    <li><a href="<?php echo e(route('cleaner.team')); ?>" class="">Team</a></li>
                    <li><a href="cleaner-set-availability.html" class="">Set Availability</a></li>
                    <li><a href="cleaner-set-service.html" class="">Set Services</a></li>
                    <li><a href="cleaner-set-location.html" class="">Set Locations Served</a></li>
                    <li><a href="cleaner-notification.html" class="">Notification Preferences</a></li>
                    <li><a href="<?php echo e(route('cleaner.reviews')); ?>" class="">Reviews</a></li>
                  </ul>
                  </li>
                  <?php endif; ?>

                  <li><a href="cleaner-appoitments.html">Appointments</a></li>
                  <li><a href="cleaner-billing.html" >Billing</a></li>
                  <li><a href="cleaner-notification.html">Notifications</a></li>
                  <li><a href="<?php echo e(route('support.service')); ?>">Support</a></li>
                </ul>
              </div><?php /**PATH /var/www/html/projects/Amandeep Projects/working project/cleaner/cleaner/resources/views/layouts/common/sidebar.blade.php ENDPATH**/ ?>
<header id="header">
    <div class="header-wrapper">
        <div class="container">
            <div class="header-flex">
                <div class="header-flex-item header-flex-item-1">
                    <div class="logo-wrapper">
                        <a href="<?php echo e(route('index')); ?>"><img src="<?php echo e(asset('assets/images/logo/logo.svg')); ?>"></a>
                    </div>
                </div>
                <div class="header-flex-item header-flex-item-2">
                    <div class="search-form">
                        <span class="close-search l-hide"><i class="fa-solid fa-xmark"></i></span>
                        <div class="search-form-wrapper">
                            <div class="select-search-design">
                                <select>
                                    <option>Any service</option>
                                    <option>Service</option>
                                    <option>Service</option>
                                </select>
                            </div>
                            <div class="select-search-design">
                                <select>
                                    <option>Any size</option>
                                    <option>Service</option>
                                    <option>Service</option>
                                </select>
                            </div>
                            <div class="search-input-design">
                                <input type="text" placeholder="Enter location">
                                <button class="search-btn"><a href="search-result.html" class=""><img src="<?php echo e(asset('assets/images/icons/search.svg')); ?>"></a></button>
                            </div>
                        </div>
                    </div>
                    <button class="search-toggle l-hide"><img src="<?php echo e(asset('assets/images/icons/search.svg')); ?>"></button>
                </div>

                <?php if(Auth::Check()): ?>
                <div class="header-flex-item header-flex-item-3">
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
                                    <img src="<?php echo e(asset('storage/images/'.auth()->user()->image)); ?>">
                                    <span class="name"><?php echo e(auth()->user()->name); ?></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <div class="customer_profile-info">
                                        <div class="d-flex align-items-center position-relative">
                                            <div class="customer-pro-img">
                                                <img src="<?php echo e(asset('storage/images/'.auth()->user()->image)); ?>">
                                            </div>
                                            <div class="customer-pro-cntnt">
                                                <h4><?php echo e(auth()->user()->name); ?></h4>
                                                <p><?php echo e(auth()->user()->role); ?></p>
                                            </div>
                                            <div class="setting-div">
                                                <a href="customer-account.html"><img src="<?php echo e(asset('assets/images/icons/setting.svg')); ?>"></a>
                                            </div>
                                        </div>
                                        <div class="dropdown-list-design">
                                            <ul class="list-unstyled">
                                                <?php if(Auth::user()->role=="customer"): ?>
                                                <li><a href="<?php echo e(route('customer.account')); ?>">Account</a></li>
                                                <li><a href="customer-appoitments.html">Appointments</a></li>
                                                <li><a href="#">Billing</a></li>
                                                <li><a href="customer-notification.html">Notifications</a></li>
                                                <li><a href="customer-support-past-service.html">Support</a></li>

                                                <?php else: ?>
                                                <li><a href="<?php echo e(route('cleaner.account')); ?>">Account</a></li>
                                                <li><a href="customer-appoitments.html">Appointments</a></li>
                                                <li><a href="<?php echo e(route('cleaner.billing.editBankAccount')); ?>">Billing</a></li>
                                                <li><a href="<?php echo e(route('cleaner.notification.index')); ?>">Notifications</a></li>
                                                <li><a href="<?php echo e(route('cleaner.support.service')); ?>">Supports</a></li>
                                                <?php endif; ?>

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
                <?php else: ?>
                <div class="header-flex-item header-flex-item-3 btn_new_3">
                    <div class="btn_sign_in_sign_up">
                        <a href="<?php echo e(route('signup')); ?>" class="btn_sign_up"><img src="<?php echo e(asset('assets/images/icons/user.svg')); ?>">Sign Up</a>
                        <a href="<?php echo e(route('login')); ?>" class="btn_sign_in"><img src="<?php echo e(asset('assets/images/icons/user.svg')); ?>">Sign in</a>
                    </div>
                    <a href="<?php echo e(route('signup-cleaner')); ?>"><span class="b_cleaner">Become a Cleaner!</span></a>
                </div>
                <div class="toggle_menu d-block d-lg-none">
                    <img src="<?php echo e(asset('assets/images/icons/toggle.svg')); ?>">
                </div>
                <?php endif; ?>


            </div>
        </div>
    </div>
</header><?php /**PATH /var/www/html/projects/Amandeep Projects/working project/cleaner/cleaner/resources/views/layouts/includes/header.blade.php ENDPATH**/ ?>
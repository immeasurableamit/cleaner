<?php $__env->startSection('content'); ?>
<section class="authentication-sec light-banner signup-page" style="background-image: url('assets/images/white-pattern.png')">
  <div class="container customer_signup_container signup_all_container">
    <div class="signup-selection-wrapper">
      <div class="selection-wrap d-flex justify-content-spacebw">
        <div class="select-inner-box position-relative customer active">
          <div class="select-signup-img">
            <img src="assets/images/customer.png">
          </div>
          <div class="select-signup-cntnt">
            <p>I’m a Customer</p>
          </div>
          <a href="<?php echo e(route('signup-customers')); ?>" class="link-overlay"></a>
        </div>
        <div class="select-inner-box position-relative cleaner">
          <div class="select-signup-img">
            <img src="assets/images/cleaner.png">
          </div>
          <div class="select-signup-cntnt">
            <p>I’m a Cleaner</p>
          </div>
          <a href="<?php echo e(route('signup-cleaner')); ?>" class="link-overlay"></a>
        </div>
      </div>
    </div>
    <div class="authentication-form-wrapper">
      <form class="form-design" method="post" action="<?php echo e(route('register')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="user_type" value="customer">
        <div class="row no-mrg">
          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 no-padd">
            <div class="blue-bg-wrapper">
              <div class="avatar-upload">
                <div class="avatar-edit">
                  <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                  <label for="imageUpload">Upload a profile pic</label>
                  <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="avatar-preview">
                  <div id="imagePreview" style="background-image: url(assets/images/thumbnail.png);">
                    <button class="delete-btn"><img src="assets/images/icons/delete.svg"></button>
                  </div>
                </div>
              </div>
              <div class="form-grouph textarea-single-design">
                <label>About yourself (Optional)</label>
                <textarea name="about">Efficiently promote best-of-breed customer service after magnetic niche markets.</textarea>
                <?php $__errorArgs = ['about'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="alert "><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
              <div class="folow-us">
                <ul class="list-unstyled d-flex justify-content-center">
                  <li><span>Follow Us</span></li>
                  <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                  <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                </ul>
              </div>
              <div class="blue-logo-block text-center">
                <a href="#"><img src="assets/images/logo/logo.svg"></a>
              </div>
            </div>
          </div>
          <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 no-padd">
            <div class="singup_auth-design">
              <div class="account-header-heading text-center">
                <h4><img src="assets/images/icons/white-circle-user.svg"> Account Info</h4>
              </div>
              <div class="form-heading-h4 text-center">
                <h4>Please enter the following information to create your account</h4>
              </div>
              <div class="signup-form-grouph">
                <div class="form-flex two-column">
                  <div class="form-left-block">
                    <div class="form-grouph input-design mb-30">
                      <input type="text" placeholder="First name" name="first_name" value="<?php echo e(old('first_name')); ?>">
                      <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="alert "><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>


                    <div class="form-grouph input-design mb-30">
                      <input type="text" placeholder="Last Name" name="last_name" value="<?php echo e(old('last_name')); ?>">
                      <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="alert "><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-grouph input-design mb-30">
                      <input type="email" name="email" placeholder="Email (this will be your login)" value="<?php echo e(old('email')); ?>">
                      <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="alert "><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-grouph input-design mb-30">
                      <input type="text" name="address" placeholder="Address" value="<?php echo e(old('address')); ?>">
                      <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="alert "><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-grouph mb-30 input-select-abs">
                      <div class="inputs-box">
                        <input type="text" name="city" placeholder="City" value="<?php echo e(old('city')); ?>">
                        <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="alert "><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>
                      <div class="selecti-box">
                        <select class="select-custom-design" name="state" value="<?php echo e(old('state')); ?>">
                          <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value='<?php echo e($state->id); ?>'><?php echo e($state->name); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="alert "><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>
                    </div>
                  </div>
                  <div class="form-right-block">
                    <div class="form-grouph input-design mb-30">
                      <input type="password" name="password" placeholder="Password" value="<?php echo e(old('password')); ?>">
                      <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="alert "><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-grouph input-design mb-30">
                      <input type="password" name="password_confirmation" placeholder="password_confirmation" value="<?php echo e(old('password_confirmation')); ?>">
                      <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="alert "><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-grouph input-design mb-30">
                      <input type="number" name="contact_number" placeholder="Phone Number" value="<?php echo e(old('contact_number')); ?>">
                      <?php $__errorArgs = ['contact_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="alert "><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-grouph input-design mb-30">
                      <input type="number" name="apt_or_unit" placeholder="Apt # or Unit #" value="<?php echo e(old('apt_or_unit')); ?>">
                      <?php $__errorArgs = ['apt_or_unit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="alert "><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-grouph input-design mb-30">
                      <input type="number" name="zip_code" placeholder="Zip" value="<?php echo e(old('apt_or_unit')); ?>">
                      <?php $__errorArgs = ['zip_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="alert "><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-grouph select-design mb-30">
                      <select class="select-custom-design" name="payment_method" value="<?php echo e(old('payment_method')); ?>">
                        <option disabled>Payment Method</option>
                        <option value="PayPal">PayPal</option>
                        <option value="Direct Deposit">Direct Deposit</option>
                      </select>
                      <?php $__errorArgs = ['payment_method'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="alert "><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  </div>
                </div>
                <input type="checkbox" name="term">
                <?php $__errorArgs = ['term'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="alert "><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <div class="form-flex two-column">
                  <div class="form-left-block">
                    <div class="terms-text">
                      <p>By clicking “Create My Account”, you agree with all Canary Clean’s <a href="#" class="link-design-2">terms and conditions</a> and <a href="#" class="link-design-2">privacy policy</a></p>
                    </div>
                  </div>
                  <div class="form-right-block">
                    <div class="form-grouph submit-design mb-30">
                      <input type="submit" placeholder="Create My Account" value="Create My Account" class="subit-btn-2">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/cleaner/resources/views/auth/register-customer.blade.php ENDPATH**/ ?>
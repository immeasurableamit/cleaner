<?php $__env->startSection('content'); ?>
<section class="authentication-sec light-banner signup-page" style="background-image: url('assets/images/white-pattern.png')">
  <div class="container signup_all_container">
    <div class="signup-selection-wrapper">
      <div class="selection-wrap d-flex justify-content-spacebw">
        <div class="select-inner-box position-relative customer">
          <div class="select-signup-img">
            <img src="assets/images/customer.png">
          </div>
          <div class="select-signup-cntnt">
            <p>I’m a Customer</p>
          </div>
          <a href="<?php echo e(route('signup-customers')); ?>" class="link-overlay"></a>
        </div>
        <div class="select-inner-box position-relative cleaner active">
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

  <?php echo Form::open(['route' => 'register', 'method'=>'post', 'enctype' => 'multipart/form-data', 'class'=>'form-design']); ?>

        <?php echo csrf_field(); ?>
        <input type="hidden" name="latitude">
        <input type="hidden" name="longitude">

      <input type="hidden" name="user_type" value="cleaner">
      <div class="row no-mrg">
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 no-padd">
          <div class="blue-bg-wrapper">
            <div class="avatar-upload">
              <div class="avatar-edit">

                <input type='file' id="upload" accept=".png, .jpg, .jpeg" />
                <?php echo Form::label('upload','Upload a profile pic', ['class' => 'form-label']); ?>

                <?php echo $errors->first('image', '<span class="help-block">:message</span>'); ?>

              </div>

              <div class="lawyer_profile-img mb-3">
                <div class="circle avatar-preview" id="uploaded">
                  <div id="imagePreview" class="profile-pic" style="background-image: url(assets/images/thumbnail.png);">
                    <img class="profile-pic" id="imagePreview" src="">
                  </div>
                </div>
                <div class="p-image">
                  <!-- <span class="pencil_icon"><i class="fa-solid fa-pencil upload-button"></i></span> -->
                  <!-- <input class="file-upload" id="upload" type="file" accept="image/*" /> -->
                  <input type="hidden" name="image" id="upload-img" />
                </div>
              </div>

              <!-- <div class="avatar-preview">
                  <div id="imagePreview" style="background-image: url(assets/images/thumbnail.png);">
                    <button class="delete-btn"><img src="assets/images/icons/delete.svg"></button>
                  </div>
                </div> -->
            </div>

            <div class="form-grouph textarea-single-design">
              <?php echo Form::label('about','About yourself (Optional)', ['class' => 'form-label']); ?>

              <textarea name="about"> Effective</textarea>
              <?php echo $errors->first('about', '<span class="help-block">:message</span>'); ?>

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
              <a href="#"><img src="<?php echo e(asset('assets/images/logo/logo.svg')); ?>"></a>
            </div>
          </div>
        </div>
        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 no-padd">
          <div class="singup_auth-design">
            <div class="account-header-heading text-center">
              <h4><img src="assets/images/icons/white-circle-user.svg"> Cleaner Info</h4>
            </div>
            <div class="form-heading-h4 text-center">
              <h4>Please enter the following information to create your account</h4>
            </div>
            <div class="signup-form-grouph">
              <div class="form-flex two-column">
                <div class="form-left-block">
                  <!-- <input type="hidden" name="role" value="cleaner"> -->
                  <div class="form-grouph input-design mb-30<?php echo ($errors->has('first_name') ? ' has-error' : ''); ?>">
                    <?php echo Form::text('first_name', request()->first_name ?? null, ['placeholder' => 'First name','class' => 'form-control'.($errors->has('first_name') ? ' is-invalid' : '')]); ?>

                    <?php echo $errors->first('first_name', '<span class="alert">:message</span>'); ?>

                  </div>
                  <div class="form-grouph input-design mb-30">

                    <?php echo Form::text('last_name', request()->last_name ?? null, ['placeholder' => 'Last name','class' => 'form-control'.($errors->has('last_name') ? ' is-invalid' : '')]); ?>

                    <?php echo $errors->first('last_name', '<span class="alert">:message</span>'); ?>

                  </div>
                  <div class="form-grouph input-design mb-30">
                    <?php echo Form::email('email', request()->email ?? null, ['placeholder' => 'Email (this will be your login)','class' => 'form-control'.($errors->has('email') ? ' is-invalid' : '')]); ?>

                    <?php echo $errors->first('email', '<span class="alert">:message</span>'); ?>

                  </div>
                  <div class="form-grouph input-design mb-30">
                    <?php echo Form::text('address', request()->address ?? null, ['id'=>'address', 'placeholder' => 'Address','class' => 'form-control'.($errors->has('address') ? ' is-invalid' : '')]); ?>

                    <?php echo $errors->first('address', '<span class="alert">:message</span>'); ?>

                  </div>
                  <div class="form-grouph mb-30 input-select-abs">
                    <div class="inputs-box">
                      <?php echo Form::text('city', request()->city ?? null, ['placeholder' => 'City','class' => 'form-control'.($errors->has('city') ? ' is-invalid' : '')]); ?>

                      <?php echo $errors->first('city', '<span class="alert">:message</span>'); ?>


                    </div>
                    <div class="selecti-box">
                      <select class="select-custom-design" name="state">
                        <option>Select State</option>
                        <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($state->id); ?>"><?php echo e($state->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                      <?php echo $errors->first('state', '<span class="alert">:message</span>'); ?>

                    </div>
                  </div>
                  <div class="form-grouph mb-30">
                    <label>Birth Day</label>
                    <div class="select-three-pair d-flex">
                      <div class="select-box-design-first">
                        <select class="select-custom-design" name="month" value="<?php echo e(old('month')); ?>">
                          <option value="" disabled selected>Month</option>
                          <?php for($i = 1; $i <=12; $i++): ?> <option value="<?php echo e(old('month') ?? $i<=9 ? '0'.$i : $i); ?>"><?php echo e(date('F', mktime(0,0,0,$i))); ?></option>
                            <?php endfor; ?>
                        </select>
                        <?php echo $errors->first('month', '<span class="alert">:message</span>'); ?>


                      </div>
                      <div class="select-box-design-first">
                        <select class="select-custom-design" name="day" value="<?php echo e(old('day')); ?>">
                          <option value="" disabled selected>Day</option>
                          <?php $__currentLoopData = range(1, 31); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e(old('day') ?? $d); ?>"><?php echo e($d); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php echo $errors->first('day', '<span class="alert">:message</span>'); ?>

                      </div>
                      <div class="select-box-design-first">
                        <select class="select-custom-design" name="year">
                          <option value="" disabled selected>Year</option>
                          <?php $__currentLoopData = range(date('Y')-16, date('Y')-70); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $y): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e(old('year') ?? $y); ?>"><?php echo e($y); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php echo $errors->first('year', '<span class="alert">:message</span>'); ?>

                      </div>
                    </div>
                  </div>
                  <div class="form-grouph input-design mb-30">
                    <?php echo Form::number('ssn_or_tax', request()->ssn_or_tax ?? null, ['placeholder' => '9 Digit SSN or Tax ID','class' => 'form-control'.($errors->has('ssn_or_tax') ? ' is-invalid' : '')]); ?>

                    <?php echo $errors->first('ssn_or_tax', '<span class="alert">:message</span>'); ?>

                  </div>
                </div>
                <div class="form-right-block">
                  <div class="form-grouph input-design mb-30">
                    <input type="password" id="password" name="password" class="form-control<?php echo ($errors->has('password') ? ' is-invalid' : ''); ?>" />
                    <?php echo $errors->first('password', '<span class="alert">:message</span>'); ?>

                  </div>
                  <div class="form-grouph input-design mb-30">
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control<?php echo ($errors->has('password_confirmation') ? ' is-invalid' : ''); ?>" />
                    <?php echo $errors->first('password_confirmation', '<span class="alert">:message</span>'); ?>

                  </div>
                  <div class="form-grouph input-design mb-30">
                    <?php echo Form::number('contact_number', request()->contact_number ?? null, ['placeholder' => 'Phone Number','class' => 'form-control'.($errors->has('contact_number') ? ' is-invalid' : '')]); ?>

                    <?php echo $errors->first('contact_number', '<span class="alert">:message</span>'); ?>

                  </div>
                  <div class="form-grouph input-design mb-30">
                    <?php echo Form::number('apt_or_unit', request()->apt_or_unit ?? null, ['placeholder' => 'Apt # or Unit #','class' => 'form-control'.($errors->has('apt_or_unit') ? ' is-invalid' : '')]); ?>

                    <?php echo $errors->first('apt_or_unit', '<span class="alert">:message</span>'); ?>

                  </div>
                  <div class="form-grouph input-design mb-30">
                    <?php echo Form::number('zip_code', request()->zip_code ?? null, ['placeholder' => 'Zip','class' => 'form-control'.($errors->has('zip_code') ? ' is-invalid' : '')]); ?>

                    <?php echo $errors->first('zip_code', '<span class="alert">:message</span>'); ?>

                  </div>
                  <div class="form-grouph select-design mb-30">
                    <?php echo Form::label('payment','Payment Method', ['class' => 'form-label']); ?>


                    <select class="select-custom-design" name="payment_method" value="<?php echo e(old('payment_method')); ?>">
                      <option disabled>Payment Method</option>
                      <option value="PayPal">PayPal</option>
                      <option value="Direct Deposit">Direct Deposit</option>
                    </select>
                    <?php echo $errors->first('payment_method', '<span class="alert">:message</span>'); ?>

                  </div>
                </div>
              </div>
              <input type="checkbox" name="term">
              <?php echo $errors->first('term', '<span class="alert">:message</span>'); ?>

              <div class="form-flex two-column">
                <div class="form-left-block">
                  <div class="terms-text">
                    <p>By clicking “Create My Account”, you agree with all Canary Clean’s <a href="#" class="link-design-2">terms and conditions</a> and <a href="#" class="link-design-2">privacy policy</a></p>
                  </div>
                </div>
                <div class="form-right-block">
                  <div class="form-grouph submit-design mb-30">
                    <input type="submit" placeholder="Create My Account" class="subit-btn-2">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php echo Form::close(); ?>

    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php echo $__env->make('layouts.common.cropper', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script async
    src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(env('GOOGLE_MAPS_API_KEY')); ?>&libraries=places&callback=initMap">
</script>



<script>
    function getLocation(){
      if ("geolocation" in navigator){ //check geolocation available 
        //try to get user current location using getCurrentPosition() method
        navigator.geolocation.getCurrentPosition(function(position){
            $('input[name=latitude]').val(position.coords.latitude);
            $('input[name=longitude]').val(position.coords.longitude);
          });
      }else{
        console.log("Browser doesn't support geolocation!");
      }
    }

    //getLocation();


    function initMap(){

        var autocomplete = new google.maps.places.Autocomplete($("#address")[0], {
            types: ['geocode'],
            componentRestrictions: {
                country: "USA"
            }
        });

        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var place = autocomplete.getPlace();
            //console.log(place.address_components);

            $('input[name=latitude]').val(place.geometry.location.lat());
            $('input[name=longitude]').val(place.geometry.location.lng());
        });
    }

    /*var autocomplete = new google.maps.places.Autocomplete($("#address")[0], {});

    google.maps.event.addListener(autocomplete, 'place_changed', function() {
        var place = autocomplete.getPlace();
        //console.log(place.address_components);

        $('input[name=latitude]').val(near_place.geometry.location.lat());
        $('input[name=longitude]').val(near_place.geometry.location.lng());

    });*/

  </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/projects/Amandeep Projects/working project/cleaner/cleaner/resources/views/auth/register-cleaner.blade.php ENDPATH**/ ?>
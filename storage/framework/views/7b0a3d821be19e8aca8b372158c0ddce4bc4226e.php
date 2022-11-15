<?php $__env->startSection('content'); ?>
<section class="authentication-sec light-banner signup-page" style="background-image: url('assets/images/white-pattern.png')">
     <div class="container sign_up_container">

      <div class="account_type_div pb-5">
          <button>Select your account type</button>
      </div>
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
             <div class="select-inner-box position-relative customer">
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
     </div>
   </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/projects/Amandeep Projects/working project/cleaner/cleaner/resources/views/home/signup.blade.php ENDPATH**/ ?>
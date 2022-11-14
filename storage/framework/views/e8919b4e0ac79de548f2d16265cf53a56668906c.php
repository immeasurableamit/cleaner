<?php $__env->startSection('content'); ?>
<section class="light-banner customer-account-page" style="background-image: url('assets/images/white-pattern.png')">
   <div class="container">
      <div class="customer-white-wrapper search_result_section">
         <div class="result_text">
            <h3>Results that keep you wanting more.</h3>
            <p>See the cleaners available for your selected service and address below. Feel free to filter further using the “Filter by” feature. We hope you enjoy every experience in your journey to find the perfect cleaner. </p>
            <p>Prices listed are for typical cleanings. <strong>If you feel your cleaning needs are unique, send a chat to the cleaner from their profile for a custom quote!</strong></p>
         </div>
         <div class="row routine_service_div">
            <div class="col-xl-4 col-lg-4 col-md-12 p-0 yellow-bg">
               <p><img src="assets/images/icons/2_weaks.svg" class="me-3">Routine Service - Every 2 Weeks</p>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-12 p-0 yellow-bg t-width-auto border-left-sf">
               <p><img src="assets/images/icons/s_feet.svg" class="me-3">2,700 square feet</p>
            </div>
            <div class="col-xl-6 col-lg-4 col-md-16 p-0 white-bordered">
               <p><img src="assets/images/icons/location.svg" class="me-3">12345 East Grandview Avenue #9118, Austin, TX 78787</p>
            </div>
         </div>
         <div class="window_garage py-3">
            <a href="javascript:void(0)" class="link-design-2">(X) Window cleaning</a>
            <span class=" link-design-2 px-2">|</span>
            <a href="javascript:void(0)" class="link-design-2">(X) Garage Sweeping</a>
         </div>
         <div class="row car_filter_div">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 left_filter_div">
               <form>
                  <div class="btn_top">
                     <button class="btn_filter btn_filter_by me-3" type="button"><img src="assets/images/icons/filter_by.svg" class="me-3">Filter by</button>
                     <button class="close-btn hide" type="button"><img src="./assets/images/icons/close-circle.svg"></button>
                     <div class="select-sort-design">
                        <select class="select-custom-design">
                           <option>Sort by</option>
                           <option>1</option>
                           <option>2</option>
                           <option>3</option>
                        </select>
                     </div>
                  </div>
                  <div class="filter_by_div">
                     <div class="card_filter">
                        <h5 class="main-title">Service</h5>
                        <h5>One-time</h5>
                        <div class="labels_div">
                           <label><input type="checkbox" name="service-selection">
                              <span class="label-selection-text">Move In / Out Cleans - Empty House</span></label>
                           <label><input type="checkbox" name="service-selection">
                              <span class="label-selection-text">Deep Cleanings - Occupied House</span></label>
                           <label><input type="checkbox" name="service-selection">
                              <span class="label-selection-text">Post Construction Cleanings</span></label>
                        </div>
                        <h5 class="pt-2">Routine Service </h5>
                        <div class="labels_div">
                           <label><input type="checkbox" name="service-selection">
                              <span class="label-selection-text">Weekly </span></label>
                           <label><input type="checkbox" name="service-selection">
                              <span class="label-selection-text">Every 2 Weeks</span></label>
                           <label><input type="checkbox" name="service-selection">
                              <span class="label-selection-text">Every 4 Weeks</span></label>
                           <label><input type="checkbox" name="service-selection">
                              <span class="label-selection-text">Every 8 Weeks</span></label>
                        </div>
                     </div>

                     <div class="card_filter">
                        <h5 class="pb-2">Home Size</h5>
                        <input type="text" placeholder="Update square feet">
                     </div>

                     <div class="card_filter">
                        <h5 class="pb-2">Location</h5>
                        <input type="text" placeholder="Search by address">
                     </div>

                     <div class="card_filter date-picker-design">
                        <h5 class="pb-2">Start Date range</h5>
                        <input type="text" placeholder="" id="datepicker" readonly>
                     </div>

                     <div class="card_filter">
                        <h5 class="pb-2">Price Per Clean</h5>
                        <div class="price_input_div">
                           <input type="text" placeholder="$ 0" class="price_1">
                           <input type="text" placeholder="$ Max" class="price_2">
                        </div>
                     </div>

                     <div class="card_filter select-design">
                        <h5 class="pb-2">Rating</h5>
                        <div class="selecti-box">
                           <select class="select-custom-design">
                              <option>Select</option>
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                           </select>
                        </div>
                     </div>

                     <div class="card_filter select-design">
                        <h5 class="pb-2">Addons Offered</h5>
                        <div class="selecti-box">
                           <select class="select-custom-design">
                              <option>Garage up to 2 car size - sweep only</option>
                              <option>Garage up to 2 car size - sweep only</option>
                              <option>Patio/Porch - sweep and dust only</option>
                              <option>Disinfecting Service</option>
                              <option>Appliance In/Out</option>
                              <option>Inside Windows - Homes under 3,000 sq ft</option>
                              <option>Inside Windows - Homes over 3,000 sq ft</option>
                              <option>Handwash Dishes - per sink full</option>
                              <option>Spot wipe walls - per wall</option>
                           </select>
                        </div>
                     </div>

                     <div class="card_filter">
                        <div class="h5_input_checkbox">
                           <h5 class="">Organic Cleaners Only<img src="assets/images/badges.svg" class="ms-3"></h5>
                           <input type="checkbox">
                        </div>
                        <div class="h5_input_checkbox">
                           <h5 class="">Insured Cleaners Only<img src="assets/images/insurance.svg" class="ms-3"></h5>
                           <input type="checkbox">
                        </div>
                     </div>

                     <div class="card_filter border-0">

                        <input type="text" placeholder="Search by keywords" class="search_input">

                     </div>
                     <div class="pb-5 d-flex reset-next-btn">
                        <button class="btn_reset"><img src="assets/images/icons/filter_by.svg" class="me-3">Reset</button>
                        <a class="btn_next">Next</a>
                     </div>

                  </div>
               </form>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 car_right_div">
              
                 <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('home.search-result')->html();
} elseif ($_instance->childHasBeenRendered('lVkAgiZ')) {
    $componentId = $_instance->getRenderedChildComponentId('lVkAgiZ');
    $componentTag = $_instance->getRenderedChildComponentTagName('lVkAgiZ');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('lVkAgiZ');
} else {
    $response = \Livewire\Livewire::mount('home.search-result');
    $html = $response->html();
    $_instance->logRenderedChild('lVkAgiZ', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>


               </div>
               <div class="pagination_search_div text-center">
                  <div id="pagination-container" class="pagination_list"></div>
               </div>
            
         </div>
      </div>
   </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/projects/Amandeep Projects/working project/cleaner/cleaner/resources/views/home/search-result.blade.php ENDPATH**/ ?>
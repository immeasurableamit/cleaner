<div>
<div class="top_rated_section">
            <div class="container">
                <div class="tittle_div">
                    <h3 class="h3_tittle">Top Rated Canary Cleaners</h3>
                    <a href="#" class="browse_link">Browse<img src="assets/images/icons/arrow.svg" class="ms-2" /></a>
                </div>
                <div class="row">
                    <?php $__currentLoopData = $cleaners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cleaner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4 col-6">
                        <div class="card_rated">
                            <img src=<?php echo e(asset('storage/images/'.$cleaner->image)); ?> class="clnr_img">
                            <div class="bottom_part">
                                <h5><?php echo e($cleaner->name); ?></h5>
                                <div class="star_rating">
                                    <img src="assets/images/icons/star.svg">
                                    <span>4.5 (211)</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="d-block d-md-none text-center">
                    <a href="search-result.html" class="btn_c" style="background-color:var(--primary);color:#fff;">Browse All</a>
                </div>
            </div>
        </div>
</div>
<?php /**PATH /var/www/html/cleaner/resources/views/livewire/home/rated-cleaners.blade.php ENDPATH**/ ?>
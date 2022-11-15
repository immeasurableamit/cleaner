<script src="<?php echo e(asset('assets/js/jquery-3.6.0.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/custom.js')); ?>"></script>
<!-- <script src="<?php echo e(asset('assets/admin/js/admin.js')); ?>"></script> -->
<!-- <script src="<?php echo e(asset('assets/js/main.js')); ?>"></script> -->
<!-- <script src="<?php echo e(asset('assets/js/croppie.js')); ?>"></script> -->
<script src="<?php echo e(asset('assets/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/slick.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
    $('#all-customer-table').DataTable();
});
    $(document).ready(function () {
    $('#all-cleaner-table').DataTable();
});
    $(document).ready(function(){
$(".dataTables_filter input").attr("placeholder", "Search here...");
});
</script>

<?php echo \Livewire\Livewire::scripts(); ?>

<?php echo $__env->yieldContent('script'); ?>
<?php echo $__env->yieldPushContent('scripts'); ?>
<!-- <script>
    $(document).ready(function() {

        $('.slider').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    });
</script> -->
<!-- <script>
    $(document).ready(function() {

        $('.customer_slider').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 2,
            slidesToScroll: 1,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    });
</script> -->
<!-- <script>
    $(document).ready(function() {
        $(".toggle_menu").click(function() {
            $(".bar_left").toggleClass("show");
        });
    });
</script> -->
<?php /**PATH /var/www/html/cleaner/resources/views/layouts/admin/script.blade.php ENDPATH**/ ?>
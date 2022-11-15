<?php $__env->startSection('content'); ?>

<section class="light-banner customer-account-page" style="background-image: url('assets/images/white-pattern.png')">
        <div class="container">
            <div class="customer-white-wrapper">
                <div class="row no-mrg">
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 no-padd">
                        <div class="blue-bg-wrapper bar_left">
                            <div class="blue-bg-heading">
                                <h4>Settings</h4>
                            </div>
                            <?php echo $__env->make('layouts.common.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="blue-logo-block text-center max-width-100">
                                <a href="javascript::void(0)"><img src="<?php echo e(asset('assets/images/logo/logo.svg')); ?>"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 no-padd">
                        <div class="row no-mrg">
                            <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 no-padd cleaner_account_section">
                            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('cleaner.account')->html();
} elseif ($_instance->childHasBeenRendered('U1ZWWh5')) {
    $componentId = $_instance->getRenderedChildComponentId('U1ZWWh5');
    $componentTag = $_instance->getRenderedChildComponentTagName('U1ZWWh5');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('U1ZWWh5');
} else {
    $response = \Livewire\Livewire::mount('cleaner.account');
    $html = $response->html();
    $_instance->logRenderedChild('U1ZWWh5', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.cleanerapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/cleaner/resources/views/cleaner/account.blade.php ENDPATH**/ ?>
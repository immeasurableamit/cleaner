<?php $__env->startSection('content'); ?>

<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('cleaner.account')->html();
} elseif ($_instance->childHasBeenRendered('yYhqamt')) {
    $componentId = $_instance->getRenderedChildComponentId('yYhqamt');
    $componentTag = $_instance->getRenderedChildComponentTagName('yYhqamt');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('yYhqamt');
} else {
    $response = \Livewire\Livewire::mount('cleaner.account');
    $html = $response->html();
    $_instance->logRenderedChild('yYhqamt', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.cleanerapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/cleaner/resources/views/cleaner/account.blade.php ENDPATH**/ ?>
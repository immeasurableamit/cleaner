<?php $__env->startSection('content'); ?>

<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('cleaner.support')->html();
} elseif ($_instance->childHasBeenRendered('9eqJzmh')) {
    $componentId = $_instance->getRenderedChildComponentId('9eqJzmh');
    $componentTag = $_instance->getRenderedChildComponentTagName('9eqJzmh');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('9eqJzmh');
} else {
    $response = \Livewire\Livewire::mount('cleaner.support');
    $html = $response->html();
    $_instance->logRenderedChild('9eqJzmh', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/projects/Amandeep Projects/working project/cleaner/cleaner/resources/views/cleaner/support.blade.php ENDPATH**/ ?>
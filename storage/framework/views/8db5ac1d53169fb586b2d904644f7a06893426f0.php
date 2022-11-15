<?php $__env->startSection('content'); ?>
 
   <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.customer.customer')->html();
} elseif ($_instance->childHasBeenRendered('Ys39Lwl')) {
    $componentId = $_instance->getRenderedChildComponentId('Ys39Lwl');
    $componentTag = $_instance->getRenderedChildComponentTagName('Ys39Lwl');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Ys39Lwl');
} else {
    $response = \Livewire\Livewire::mount('admin.customer.customer');
    $html = $response->html();
    $_instance->logRenderedChild('Ys39Lwl', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
  
 <?php $__env->stopSection(); ?>  



<?php echo $__env->make('layouts.adminapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/cleaner/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>
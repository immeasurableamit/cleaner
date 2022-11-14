<?php $__env->startSection('content'); ?>
 
   <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.customer.customer')->html();
} elseif ($_instance->childHasBeenRendered('d439PGC')) {
    $componentId = $_instance->getRenderedChildComponentId('d439PGC');
    $componentTag = $_instance->getRenderedChildComponentTagName('d439PGC');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('d439PGC');
} else {
    $response = \Livewire\Livewire::mount('admin.customer.customer');
    $html = $response->html();
    $_instance->logRenderedChild('d439PGC', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
  
 <?php $__env->stopSection(); ?>  



<?php echo $__env->make('layouts.adminapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/cleaner/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>
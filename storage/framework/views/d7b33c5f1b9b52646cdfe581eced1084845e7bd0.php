<?php $__env->startSection('content'); ?>
 
   <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.customer.customer')->html();
} elseif ($_instance->childHasBeenRendered('KFC7pMk')) {
    $componentId = $_instance->getRenderedChildComponentId('KFC7pMk');
    $componentTag = $_instance->getRenderedChildComponentTagName('KFC7pMk');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('KFC7pMk');
} else {
    $response = \Livewire\Livewire::mount('admin.customer.customer');
    $html = $response->html();
    $_instance->logRenderedChild('KFC7pMk', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
  
 <?php $__env->stopSection(); ?>  



<?php echo $__env->make('layouts.adminapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/projects/Amandeep Projects/working project/cleaner/cleaner/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>
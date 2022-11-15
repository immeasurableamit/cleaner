<?php $__env->startSection('content'); ?>
 
   <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.cleaner.cleaner')->html();
} elseif ($_instance->childHasBeenRendered('sEExNbq')) {
    $componentId = $_instance->getRenderedChildComponentId('sEExNbq');
    $componentTag = $_instance->getRenderedChildComponentTagName('sEExNbq');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('sEExNbq');
} else {
    $response = \Livewire\Livewire::mount('admin.cleaner.cleaner');
    $html = $response->html();
    $_instance->logRenderedChild('sEExNbq', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
  
 <?php $__env->stopSection(); ?>  

<?php echo $__env->make('layouts.adminapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/projects/Amandeep Projects/working project/cleaner/cleaner/resources/views/admin/cleaner.blade.php ENDPATH**/ ?>
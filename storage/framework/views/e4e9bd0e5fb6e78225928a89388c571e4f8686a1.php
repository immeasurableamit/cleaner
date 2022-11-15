<?php $__env->startSection('content'); ?>
 
   <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.cleaner.cleaner')->html();
} elseif ($_instance->childHasBeenRendered('TXprdKe')) {
    $componentId = $_instance->getRenderedChildComponentId('TXprdKe');
    $componentTag = $_instance->getRenderedChildComponentTagName('TXprdKe');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('TXprdKe');
} else {
    $response = \Livewire\Livewire::mount('admin.cleaner.cleaner');
    $html = $response->html();
    $_instance->logRenderedChild('TXprdKe', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
  
 <?php $__env->stopSection(); ?>  

<?php echo $__env->make('layouts.adminapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/cleaner/resources/views/admin/cleaner.blade.php ENDPATH**/ ?>
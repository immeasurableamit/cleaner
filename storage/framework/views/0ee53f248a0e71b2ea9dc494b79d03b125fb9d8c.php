<?php $__env->startSection('content'); ?>
<div>
   <section class="table-layout-sec jobs">
      <div class="white-bg-wrapper">
         <div class="account-info-blocks">
            <div class="row">
               <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.customer.customer-update', ["user_id" => $id])->html();
} elseif ($_instance->childHasBeenRendered('X5nIVoG')) {
    $componentId = $_instance->getRenderedChildComponentId('X5nIVoG');
    $componentTag = $_instance->getRenderedChildComponentTagName('X5nIVoG');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('X5nIVoG');
} else {
    $response = \Livewire\Livewire::mount('admin.customer.customer-update', ["user_id" => $id]);
    $html = $response->html();
    $_instance->logRenderedChild('X5nIVoG', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
               <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.customer.account-history')->html();
} elseif ($_instance->childHasBeenRendered('F2jdgc1')) {
    $componentId = $_instance->getRenderedChildComponentId('F2jdgc1');
    $componentTag = $_instance->getRenderedChildComponentTagName('F2jdgc1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('F2jdgc1');
} else {
    $response = \Livewire\Livewire::mount('admin.customer.account-history');
    $html = $response->html();
    $_instance->logRenderedChild('F2jdgc1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            </div>
         </div>
         <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.customer.customer-booking')->html();
} elseif ($_instance->childHasBeenRendered('odSe49h')) {
    $componentId = $_instance->getRenderedChildComponentId('odSe49h');
    $componentTag = $_instance->getRenderedChildComponentTagName('odSe49h');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('odSe49h');
} else {
    $response = \Livewire\Livewire::mount('admin.customer.customer-booking');
    $html = $response->html();
    $_instance->logRenderedChild('odSe49h', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
      </div>
   </section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/projects/Amandeep Projects/working project/cleaner/cleaner/resources/views/admin/customer-edit.blade.php ENDPATH**/ ?>
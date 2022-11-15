<?php $__env->startSection('content'); ?>
<div>
   <section class="table-layout-sec jobs">
      <div class="white-bg-wrapper">
         <div class="account-info-blocks">
            <div class="row">
               <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.customer.customer-update', ["user_id" => $id])->html();
} elseif ($_instance->childHasBeenRendered('cwAZyOi')) {
    $componentId = $_instance->getRenderedChildComponentId('cwAZyOi');
    $componentTag = $_instance->getRenderedChildComponentTagName('cwAZyOi');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('cwAZyOi');
} else {
    $response = \Livewire\Livewire::mount('admin.customer.customer-update', ["user_id" => $id]);
    $html = $response->html();
    $_instance->logRenderedChild('cwAZyOi', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
               <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.customer.account-history')->html();
} elseif ($_instance->childHasBeenRendered('yEUHOnB')) {
    $componentId = $_instance->getRenderedChildComponentId('yEUHOnB');
    $componentTag = $_instance->getRenderedChildComponentTagName('yEUHOnB');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('yEUHOnB');
} else {
    $response = \Livewire\Livewire::mount('admin.customer.account-history');
    $html = $response->html();
    $_instance->logRenderedChild('yEUHOnB', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            </div>
         </div>
         <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.customer.customer-booking')->html();
} elseif ($_instance->childHasBeenRendered('njUPKbH')) {
    $componentId = $_instance->getRenderedChildComponentId('njUPKbH');
    $componentTag = $_instance->getRenderedChildComponentTagName('njUPKbH');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('njUPKbH');
} else {
    $response = \Livewire\Livewire::mount('admin.customer.customer-booking');
    $html = $response->html();
    $_instance->logRenderedChild('njUPKbH', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
      </div>
   </section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/cleaner/resources/views/admin/customer-edit.blade.php ENDPATH**/ ?>
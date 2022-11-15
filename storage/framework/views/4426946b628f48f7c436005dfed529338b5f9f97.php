<?php $__env->startSection('content'); ?>
   <section class="table-layout-sec jobs">
      <div class="white-bg-wrapper">
         <div class="account-info-blocks">
            <div class="row">
               <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.cleaner.cleaner-account', ["user_id" => $id])->html();
} elseif ($_instance->childHasBeenRendered('t80FVpk')) {
    $componentId = $_instance->getRenderedChildComponentId('t80FVpk');
    $componentTag = $_instance->getRenderedChildComponentTagName('t80FVpk');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('t80FVpk');
} else {
    $response = \Livewire\Livewire::mount('admin.cleaner.cleaner-account', ["user_id" => $id]);
    $html = $response->html();
    $_instance->logRenderedChild('t80FVpk', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
               <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.cleaner.cleaner-history')->html();
} elseif ($_instance->childHasBeenRendered('paPPAaC')) {
    $componentId = $_instance->getRenderedChildComponentId('paPPAaC');
    $componentTag = $_instance->getRenderedChildComponentTagName('paPPAaC');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('paPPAaC');
} else {
    $response = \Livewire\Livewire::mount('admin.cleaner.cleaner-history');
    $html = $response->html();
    $_instance->logRenderedChild('paPPAaC', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            </div>
         </div>
         <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.cleaner.cleaner-booking')->html();
} elseif ($_instance->childHasBeenRendered('E0LxdUu')) {
    $componentId = $_instance->getRenderedChildComponentId('E0LxdUu');
    $componentTag = $_instance->getRenderedChildComponentTagName('E0LxdUu');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('E0LxdUu');
} else {
    $response = \Livewire\Livewire::mount('admin.cleaner.cleaner-booking');
    $html = $response->html();
    $_instance->logRenderedChild('E0LxdUu', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
      </div>
   </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/cleaner/resources/views/admin/cleaner/cleaner-edit.blade.php ENDPATH**/ ?>
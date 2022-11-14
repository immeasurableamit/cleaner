<?php $__env->startSection('content'); ?>
<div>
   <section class="table-layout-sec jobs">
      <div class="white-bg-wrapper">
         <div class="account-info-blocks">
            <div class="row">
               <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.cleaner.cleaner-account', ["user_id" => $id])->html();
} elseif ($_instance->childHasBeenRendered('UjrgdLH')) {
    $componentId = $_instance->getRenderedChildComponentId('UjrgdLH');
    $componentTag = $_instance->getRenderedChildComponentTagName('UjrgdLH');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('UjrgdLH');
} else {
    $response = \Livewire\Livewire::mount('admin.cleaner.cleaner-account', ["user_id" => $id]);
    $html = $response->html();
    $_instance->logRenderedChild('UjrgdLH', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
               <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.cleaner.cleaner-history')->html();
} elseif ($_instance->childHasBeenRendered('gQuUCr9')) {
    $componentId = $_instance->getRenderedChildComponentId('gQuUCr9');
    $componentTag = $_instance->getRenderedChildComponentTagName('gQuUCr9');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('gQuUCr9');
} else {
    $response = \Livewire\Livewire::mount('admin.cleaner.cleaner-history');
    $html = $response->html();
    $_instance->logRenderedChild('gQuUCr9', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            </div>
         </div>
         <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.cleaner.cleaner-booking')->html();
} elseif ($_instance->childHasBeenRendered('hJVtECY')) {
    $componentId = $_instance->getRenderedChildComponentId('hJVtECY');
    $componentTag = $_instance->getRenderedChildComponentTagName('hJVtECY');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('hJVtECY');
} else {
    $response = \Livewire\Livewire::mount('admin.cleaner.cleaner-booking');
    $html = $response->html();
    $_instance->logRenderedChild('hJVtECY', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
      </div>
   </section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/cleaner/resources/views/admin/cleaner-edit.blade.php ENDPATH**/ ?>
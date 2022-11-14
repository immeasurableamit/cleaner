<?php $__env->startSection('content'); ?>
<div>
   <section class="table-layout-sec jobs">
      <div class="white-bg-wrapper">
         <div class="account-info-blocks">
            <div class="row">
               <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.customer.customer-update', ["user_id" => $id])->html();
} elseif ($_instance->childHasBeenRendered('uD3I6bP')) {
    $componentId = $_instance->getRenderedChildComponentId('uD3I6bP');
    $componentTag = $_instance->getRenderedChildComponentTagName('uD3I6bP');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('uD3I6bP');
} else {
    $response = \Livewire\Livewire::mount('admin.customer.customer-update', ["user_id" => $id]);
    $html = $response->html();
    $_instance->logRenderedChild('uD3I6bP', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
               <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.customer.account-history')->html();
} elseif ($_instance->childHasBeenRendered('YaRYMme')) {
    $componentId = $_instance->getRenderedChildComponentId('YaRYMme');
    $componentTag = $_instance->getRenderedChildComponentTagName('YaRYMme');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('YaRYMme');
} else {
    $response = \Livewire\Livewire::mount('admin.customer.account-history');
    $html = $response->html();
    $_instance->logRenderedChild('YaRYMme', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            </div>
         </div>
         <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.customer.customer-booking')->html();
} elseif ($_instance->childHasBeenRendered('BRVxZAT')) {
    $componentId = $_instance->getRenderedChildComponentId('BRVxZAT');
    $componentTag = $_instance->getRenderedChildComponentTagName('BRVxZAT');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('BRVxZAT');
} else {
    $response = \Livewire\Livewire::mount('admin.customer.customer-booking');
    $html = $response->html();
    $_instance->logRenderedChild('BRVxZAT', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
      </div>
   </section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/cleaner/resources/views/admin/customer-edit.blade.php ENDPATH**/ ?>
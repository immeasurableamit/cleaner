<?php $__env->startSection('content'); ?>

   <section class="table-layout-sec jobs">
      <div class="white-bg-wrapper">
         <div class="account-info-blocks">
            <div class="row">
               <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.customer.customer-update', ["user_id" => $id])->html();
} elseif ($_instance->childHasBeenRendered('ffkRFp3')) {
    $componentId = $_instance->getRenderedChildComponentId('ffkRFp3');
    $componentTag = $_instance->getRenderedChildComponentTagName('ffkRFp3');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('ffkRFp3');
} else {
    $response = \Livewire\Livewire::mount('admin.customer.customer-update', ["user_id" => $id]);
    $html = $response->html();
    $_instance->logRenderedChild('ffkRFp3', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
               <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.customer.account-history')->html();
} elseif ($_instance->childHasBeenRendered('XQJzJfs')) {
    $componentId = $_instance->getRenderedChildComponentId('XQJzJfs');
    $componentTag = $_instance->getRenderedChildComponentTagName('XQJzJfs');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('XQJzJfs');
} else {
    $response = \Livewire\Livewire::mount('admin.customer.account-history');
    $html = $response->html();
    $_instance->logRenderedChild('XQJzJfs', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            </div>
         </div>
         <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.customer.customer-booking')->html();
} elseif ($_instance->childHasBeenRendered('Z9BN7Pp')) {
    $componentId = $_instance->getRenderedChildComponentId('Z9BN7Pp');
    $componentTag = $_instance->getRenderedChildComponentTagName('Z9BN7Pp');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Z9BN7Pp');
} else {
    $response = \Livewire\Livewire::mount('admin.customer.customer-booking');
    $html = $response->html();
    $_instance->logRenderedChild('Z9BN7Pp', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
      </div>
   </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/cleaner/resources/views/admin/customer/customer-edit.blade.php ENDPATH**/ ?>
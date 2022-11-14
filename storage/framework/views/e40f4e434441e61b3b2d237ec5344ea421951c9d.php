<?php $__env->startSection('content'); ?>
 
   <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.support.contact-service')->html();
} elseif ($_instance->childHasBeenRendered('7D7nak0')) {
    $componentId = $_instance->getRenderedChildComponentId('7D7nak0');
    $componentTag = $_instance->getRenderedChildComponentTagName('7D7nak0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('7D7nak0');
} else {
    $response = \Livewire\Livewire::mount('admin.support.contact-service');
    $html = $response->html();
    $_instance->logRenderedChild('7D7nak0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
  
 <?php $__env->stopSection(); ?>
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?php echo e(asset('assets/js/mdb.min.js')); ?>"></script>
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-alert::components.scripts','data' => []] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('livewire-alert::scripts'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->make('layouts.adminapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/cleaner/resources/views/admin/support-service.blade.php ENDPATH**/ ?>
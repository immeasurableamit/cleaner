<?php $__env->startSection('content'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('cleaner.team')->html();
} elseif ($_instance->childHasBeenRendered('d1j0Bpu')) {
    $componentId = $_instance->getRenderedChildComponentId('d1j0Bpu');
    $componentTag = $_instance->getRenderedChildComponentTagName('d1j0Bpu');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('d1j0Bpu');
} else {
    $response = \Livewire\Livewire::mount('cleaner.team');
    $html = $response->html();
    $_instance->logRenderedChild('d1j0Bpu', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

<?php $__env->stopSection(); ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?php echo e(asset('assets/js/mdb.min.js')); ?>"></script>
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-alert::components.scripts','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('livewire-alert::scripts'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

<?php $__env->startSection('script'); ?>

<script>
  $(document).ready(function() {
    window.livewire.on('close-modal', () => {
      $("#closeexample").click();
    });

    window.livewire.on('close-modal', () => {
      $("#updateModalClose").click();
    });
    // window.livewire.on('updateclosemodal', () => {
    //   $("#updateModalClose").click();
    // });

  });
</script>
<?php $__env->stopSection(); ?>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  
window.addEventListener('swal:modal', event => { 
    swal({
      title: event.detail.message,
      text: event.detail.text,
      icon: event.detail.type,
    });
});

window.addEventListener('swal:confirm', event => { 
    swal({
      title: event.detail.message,
      text: event.detail.text,
      icon: event.detail.type,
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.livewire.emit('delete',event.detail.id);
      }
    });
});
</script>
<?php echo $__env->make('layouts.cleanerapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/cleaner/resources/views/cleaner/team.blade.php ENDPATH**/ ?>
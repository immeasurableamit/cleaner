<?php $__env->startSection('content'); ?>

  <section class="table-layout-sec jobs">
    <div class="white-bg-wrapper">
    <div class="table-header-wrapper">
    <div class="table-tabs-wrap">
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" data-bs-toggle="tab" href="#all">All <span class="data-span">(5,249)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#active">Active <span class="data-span">(199)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#Inactive">Inactive <span class="data-span">(3,949)</span></a>
      </li>
    </ul>
    </div>
    <div class="table-right-block">
      <div class="dropdown">
        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
          All <img src="../assets/admin/images/icons/all-filter.svg">
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Link 1</a></li>
          <li><a class="dropdown-item" href="#">Link 2</a></li>
          <li><a class="dropdown-item" href="#">Link 3</a></li>
        </ul>
      </div>
    </div>
    </div>
    <!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane active" id="all">
        <div class="table-design">

   <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.cleaner.cleaner')->html();
} elseif ($_instance->childHasBeenRendered('sOl393R')) {
    $componentId = $_instance->getRenderedChildComponentId('sOl393R');
    $componentTag = $_instance->getRenderedChildComponentTagName('sOl393R');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('sOl393R');
} else {
    $response = \Livewire\Livewire::mount('admin.cleaner.cleaner');
    $html = $response->html();
    $_instance->logRenderedChild('sOl393R', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
     </div>
      </div>
 
    </div>
    </div>
   </section>

 <?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.adminapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/projects/Amandeep Projects/working project/cleaner/cleaner/resources/views/admin/cleaner/cleaner.blade.php ENDPATH**/ ?>
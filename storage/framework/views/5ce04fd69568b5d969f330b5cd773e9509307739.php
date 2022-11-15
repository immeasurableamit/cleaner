<?php $__env->startSection('content'); ?>
<div>
 <section class="table-layout-sec jobs">
    <div class="white-bg-wrapper">
    <div class="table-header-wrapper">
    <div class="table-tabs-wrap">
    <ul class="nav nav-tabs">
    <!--   <li class="nav-item">
        <a class="nav-link active" data-bs-toggle="tab" href="#all">All <span class="data-span"></span></a>
      </li> -->
     
    </ul>
    </div>
    <div class="table-right-block">
      <div class="dropdown">
        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
          All <img src="<?php echo e(asset('assets/admin/images/icons/all-filter.svg')); ?>">
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
       
             
        <table id="all-customer-table" class="table dt-responsive nowrap" style="width:100%">
          <thead>
              <tr>
                  <th>Name #</th>
                  <th>Email</th>
                  <th>Insured</th>
                  <th>Phone</th>
                  <th>Status</th>
                 
              </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $__currentLoopData = $member->cleanerTeam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <tr>
               <td><?php echo e($mem->first_name); ?> <?php echo e($mem->last_name); ?></td>
               <td><?php echo e($mem->email); ?></td>
               <td><?php echo e($mem->insured); ?></td>
               <td><?php echo e($mem->contact_number); ?></td>
                <td class="status">
                    <span class="active">Active</span>
                  </td>
            </tr>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           
          </tbody>
        </table>
         
        </div>
      </div>
   
    </div>
    </div>
   </section>
 

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/cleaner/resources/views/admin/TeamMember/teammember.blade.php ENDPATH**/ ?>
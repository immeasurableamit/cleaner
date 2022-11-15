<div>
  <table id="all-customer-table22" class="table dt-responsive nowrap" style="width:100%">
    <thead>
      <tr>
        <th>Name #</th>
        <th>Email</th>
        <th>Jobs</th>
        <th>Last Job</th>
        <th>City</th>
        <th>State</th>
        <th>Join date</th>
        <th>Total Spend</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>

      <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


      <tr>
        <td class="name"><a href="<?php echo e(route('admin.customer.show', $user->id)); ?>"><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></a></td>
        <td><?php echo e($user->email); ?></td>
        <td>12</td>
        <td>2/14/22</td>
        <td><?php echo e($user->UserDetails->city); ?></td>
        <td><?php echo e($user->UserDetails->State->code); ?></td>
        <!-- <td>USA</td> -->
        <td>2/14/22</td>
        <td>$2,555</td>
        <td class="status">
          <?php if( $user->status == 1): ?>
          <button type="button" class="btn btn-success" wire:click="confirmStatus(<?php echo e($user->id); ?>)" value="0">Active</button>
          <?php else: ?>
          <button type="button" class="btn btn-danger" wire:click="confirmStatus(<?php echo e($user->id); ?>)" value="1">Inactive</button>
          <?php endif; ?>
        </td>
      </tr>

      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>
  </table>

</div><?php /**PATH /var/www/html/projects/Amandeep Projects/working project/cleaner/cleaner/resources/views/livewire/admin/customer/customer.blade.php ENDPATH**/ ?>
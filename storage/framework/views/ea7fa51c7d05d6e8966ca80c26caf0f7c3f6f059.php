<div>
  <table id="all-cleaner-table22" class="table dt-responsive nowrap" style="width:100%">
    <thead>
      <tr>
        <th>Team Name</th>
        <th>Main Cleaner</th>
        <th>Email</th>
        <th>Jobs</th>
        <th>Last Job</th>
        <th>City</th>
        <th>State</th>
        <th>Country</th>
        <th>Paid Out</th>
        <th>Status</th>
        
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <?php if($user): ?>
        <td class="name"><a href="<?php echo e(route('admin.cleaner.team', $user->id)); ?>"><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></a></td>
        <?php else: ?>
        <td></td>
        <?php endif; ?>
        <td class="name"><a href="<?php echo e(route('admin.cleaner.show', $user->id)); ?>"><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></a></td>
        <td><?php echo e($user->email); ?></td>
        <td>729</td>
        <td>3/19/2022</td>
        <?php if($user->UserDetails): ?>
        <td><?php echo e($user->UserDetails->city); ?></td>
        <?php else: ?>
        <td></td>
        <?php endif; ?>
        <?php if($user->UserDetails): ?>
        <td><?php echo e($user->UserDetails->State->code); ?></td>
        <?php else: ?>
        <td></td>
        <?php endif; ?>
        <td>USA</td>
        <td>$182,695dsffsd</td>
        <!-- <td><a href="">o0k</a></td> -->
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
</div><?php /**PATH /var/www/html/projects/Amandeep Projects/working project/cleaner/cleaner/resources/views/livewire/admin/cleaner/cleaner.blade.php ENDPATH**/ ?>
<div>
    <table id="all-cleaner-table" class="table dt-responsive nowrap" style="width:100%">
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
              
                  <td class="name"><a href="<?php echo e(route('admin.cleaner.show', $user->id)); ?>" ><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></a></td>
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
                  <td>$182,695</td>
                  <td class="status">
                    <span class="active">Active</span>
                  </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          
          </tbody>
        </table>

</div>


<?php /**PATH /var/www/html/cleaner/resources/views/livewire/admin/cleaner/cleaner.blade.php ENDPATH**/ ?>
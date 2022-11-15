<div>
<table id="all-customer-table" class="table dt-responsive nowrap" style="width:100%">
          <thead>
              <tr>
                  <th>Name #</th>
                  <th>Email</th>
                  <th>Order Number</th>
                  <th>Phone</th>
                  <th>Message</th>
                  <th>Status</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
            <!-- <a href="javascript:void(0)" class="link-design-2" wire:click="destroy()">Delete</a> -->
                <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                  <td class="name"><?php echo e($contact->name); ?></td>
                  <td><?php echo e($contact->email); ?></td>
                  <td><?php echo e($contact->order_number); ?></td>
                  <td><?php echo e($contact->phone); ?></td>
                  <td><?php echo e($contact->message); ?></td>
                  <?php if($contact->status == 0): ?>
                  <td><a href="javascript::void(0)" wire:click.prevent="statusClose(<?php echo e($contact->id); ?>)">Open</a></td>
                  <?php else: ?>
                  <td><a href="javascript::void(0)">Closed</a></td>
                  <?php endif; ?>
                  <td><a href="javascript::void(0)" wire:click.prevent="destroy(<?php echo e($contact->id); ?>)">Delete</a></td>
              </tr>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           
          </tbody>
        </table>
             
</div><?php /**PATH /var/www/html/cleaner/resources/views/livewire/admin/support/contact-service.blade.php ENDPATH**/ ?>
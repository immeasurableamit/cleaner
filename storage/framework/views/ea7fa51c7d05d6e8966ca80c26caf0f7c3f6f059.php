<div>
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
                  <td class="name"><a href="/teamMembers/<?php echo e($user->id); ?>"><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></a></td>
                  <?php else: ?>
                  <td></td>
                  <?php endif; ?>

                  <td class="name"><a href="/updateCleaner/<?php echo e($user->id); ?>"><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></a></td>
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
                  <td><a href="" wire:click="changeStatus()"></a></td>
                  <td class="status">
                    <?php if( $user->status == 1): ?>
                    <button type="submit" class="btn btn-success" wire:click="changeStatus(<?php echo e($user->id); ?>)" value="0">Active</button>
                    <?php else: ?>
                    <button type="submit" class="btn btn-danger" wire:click="changeStatus(<?php echo e($user->id); ?>)" value="1">Inactive</button>
                    <?php endif; ?>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              </tbody>
            </table>
          </div>
        </div>
        <!--  <div class="tab-pane fade" id="active">
        <div class="table-design">
          <table id="active-cleaner-table" class="table dt-responsive nowrap" style="width:100%">
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
                <tr>
                    <td class="name"><a href="cleaner-account-info.html">Jenny W.’s Team</a></td>
                    <td class="name"><a href="cleaner-account-info.html">Jenny Wendel</a></td>
                    <td>jjwendell42@gmail.com</td>
                    <td>729</td>
                    <td>3/19/2022</td>
                    <td>New Orleans</td>
                    <td>LA</td>
                    <td>USA</td>
                    <td>$182,695</td>
                    <td class="status">
                      <span class="active">Active</span>
                    </td>
                </tr>
             
    <tr>
      <td class="name"><a href="cleaner-account-info.html">Jenny W.’s Team</a></td>
      <td class="name"><a href="cleaner-account-info.html">Jenny Wendel</a></td>
      <td>jjwendell42@gmail.com</td>
      <td>729</td>
      <td>3/19/2022</td>
      <td>New Orleans</td>
      <td>LA</td>
      <td>USA</td>
      <td>$182,695</td>
      <td class="status">
        <span class="active">Active</span>
      </td>
    </tr>
            </tbody>
          </table>
          </div>
      </div> -->
        <!-- <div class="tab-pane fade" id="Inactive">
        <div class="table-design">
          <table id="inactive-cleaner-table" class="table dt-responsive nowrap" style="width:100%">
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
              <tr>
                <td class="name"><a href="cleaner-account-info.html">Jenny W.’s Team</a></td>
                <td class="name"><a href="cleaner-account-info.html">Jenny Wendel</a></td>
                <td>jjwendell42@gmail.com</td>
                <td>729</td>
                <td>3/19/2022</td>
                <td>New Orleans</td>
                <td>LA</td>
                <td>USA</td>
                <td>$182,695</td>
                <td class="status">
                  <span class="inactive">Inactive</span>
                </td>
            </tr>
            
       
      
           
                 
                  <tr>
                    <td class="name"><a href="cleaner-account-info.html">Jenny W.’s Team</a></td>
                    <td class="name"><a href="cleaner-account-info.html">Jenny Wendel</a></td>
                    <td>jjwendell42@gmail.com</td>
                    <td>729</td>
                    <td>3/19/2022</td>
                    <td>New Orleans</td>
                    <td>LA</td>
                    <td>USA</td>
                    <td>$182,695</td>
                    <td class="status">
                      <span class="inactive">Inactive</span>
                    </td>
                    </tr>
            </tbody>
          </table>
          </div>
      </div> -->
      </div>
    </div>
  </section>


</div>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    
$(document).ready(function () {
    $('#all-customer-table').DataTable();
});
</script> --><?php /**PATH /var/www/html/projects/Amandeep Projects/working project/cleaner/cleaner/resources/views/livewire/admin/cleaner/cleaner.blade.php ENDPATH**/ ?>
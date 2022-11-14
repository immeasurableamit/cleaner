
  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
    <div class="detail-div-block">
      <h4>Customer account info</h4>
      <div class="inner-white-wrapper max-251px">
        <div class="customer-account-forms">
          <div class="customer-account-information">
            <ul class="list-unstyled">
              <li class="position-relative">
                <div class="d-flex justify-content-spacebw three_column edit_frm">
                  <h6 class="title-label"><i class="fas fa-user"></i></h6>
                  <?php if(@$fieldStatus && $action == 'first_name'): ?>
                    <input type="text" wire:model="first_name"/>
                    <span class="edit"><a class="link-design-2" wire:click.prevent="updateData('first_name')"><i class="fas fa-save"></i></a></span>
                    <span class="cancel"><a href="javascript::void(0)" class="link-design-2" wire:click.prevent="cancel"><i class="fas fa-times"></i></a></span>
                  <?php else: ?>
                    <p class="phone"><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></p>
                    <div class="action-block">
                      <span class="edit"><a href="javascript::void(0)" wire:click.prevent="editData('first_name')">Edit</a></span>
                    </div>
                  <?php endif; ?>
                </div>
              </li>
              <!--  <li class="position-relative">
                <form class="d-flex">
                  <h6 class="title-label"><i class="fas fa-user"></i></h6>
                  <input type="text" placeholder="Enter Name" style="display: none;">
                  <p class="name"><strong>Alex Landers</strong></p>
                  <div class="action-block">
                    <button class="edit">Edit</button>
                    <button class="save-icn-btn"><i class="fas fa-save"></i></button>
                    <button class="cancel"><i class="fas fa-times"></i></button>
                  </div>
                </form>
              </li> -->
                  <li class="position-relative">
                <div class="d-flex justify-content-spacebw three_column edit_frm">
                  <h6 class="title-label"><i class="fas fa-phone"></i></h6>
                  <?php if(@$fieldStatus && $action == 'contact_number'): ?>
                    <input type="text" wire:model="contact_number"/>
                    <span class="edit"><a class="link-design-2" wire:click.prevent="updateData('contact_number')"><i class="fas fa-save"></i></a></span>
                    <span class="cancel"><a href="javascript::void(0)" class="link-design-2" wire:click.prevent="cancel"><i class="fas fa-times"></i></a></span>
                  <?php else: ?>
                    <p class="phone"><?php echo e($user->contact_number); ?></p>
                    <div class="action-block">
                      <span class="edit"><a href="javascript::void(0)" wire:click.prevent="editData('contact_number')">Edit</a></span>
                    </div>
                  <?php endif; ?>
                </div>
              </li>
           <!--    <li class="position-relative">
                <form class="d-flex">
                  <h6 class="title-label"><i class="fas fa-phone-alt"></i></h6>
                  <input type="number" placeholder="Enter Phone number" style="display: none;">
                  <p class="phone"><a href="tel:+1 512-559-9582">+1 512-559-9582</a></p>
                  <div class="action-block">
                    <button class="edit">Edit</button>
                    <button class="save-icn-btn"><i class="fas fa-save"></i></button>
                    <button class="cancel"><i class="fas fa-times"></i></button>
                  </div>
                </form>
              </li> -->
              <li class="position-relative">
                <form class="d-flex">
                  <h6 class="title-label"><i class="fas fa-envelope"></i></h6>
                  <input type="email" placeholder="Enter Email" style="display: none;">
                  <p class="mail"><a href="mailto:<?php echo e($user->email); ?>"><?php echo e($user->email); ?></a></p>
                 <!--  <div class="action-block">
                    <button class="edit">Edit</button>
                    <button class="save-icn-btn"><i class="fas fa-save"></i></button>
                    <button class="cancel"><i class="fas fa-times"></i></button>
                  </div> -->
                </form>
              </li>
                  <li class="position-relative">
                <div class="d-flex justify-content-spacebw three_column edit_frm">
                  <h6 class="title-label"><i class="fas fa-home"></i></h6>
                  <?php if(@$fieldStatus && $action == 'address'): ?>
                    <input type="text" wire:model="address"/>
                    <span class="edit"><a class="link-design-2" wire:click.prevent="updateData('address')"><i class="fas fa-save"></i></a></span>
                    <span class="cancel"><a href="javascript::void(0)" class="link-design-2" wire:click.prevent="cancel"><i class="fas fa-times"></i></a></span>
                  <?php else: ?>
                    <p class="phone"><?php echo e($user->UserDetails->address); ?></p>
                    <div class="action-block">
                      <span class="edit"><a href="javascript::void(0)" wire:click.prevent="editData('address')">Edit</a></span>
                    </div>
                  <?php endif; ?>
                </div>
              </li>
            <!--   <li class="position-relative">
                <form class="d-flex">
                  <h6 class="title-label"><i class="fas fa-home"></i></h6>
                  <input type="text" placeholder="Enter Address" style="display: none;">
                  <p>Canary Dr., Austin, TX 78745</p>
                  <div class="action-block">
                    <button class="edit">Edit</button>
                    <button class="save-icn-btn"><i class="fas fa-save"></i></button>
                    <button class="cancel"><i class="fas fa-times"></i></button>
                  </div>
                </form>
              </li> -->
              <li class="d-flex payment-methoud">
                <h6 class="title-label"><i class="far fa-credit-card"></i></h6>
                <p class=""> Payment Method Visa ******3245</p>
                <div class="action-block">
                  <button class="edit">Edit</button>
                  <button class="save-icn-btn"><i class="fas fa-save"></i></button>
                  <button class="cancel"><i class="fas fa-times"></i></button>
                </div>
              </li>
              <li class="reset-password">
                <a href="#"><img src="../assets/admin/images/icons/reset-password.svg"> Reset Password</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div><?php /**PATH /var/www/html/cleaner/resources/views/livewire/admin/customer/customer-update.blade.php ENDPATH**/ ?>
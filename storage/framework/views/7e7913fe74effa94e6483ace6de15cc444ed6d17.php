<div>
    <div class="customer-avatar-upload-div">
        <div class="customer-avatar-upload">
            <div class="customer-avatar-edit">
                <input type='file' id="customerimageUpload" accept=".png, .jpg, .jpeg" />
                <label for="customerimageUpload">Upload a profile pic</label>
            </div>
            <div class="customer-avatar-preview position-relative">

                <div id="uploaded" style="background-image: url('/storage/images/$user->image');">
                    <img src="<?php echo e(asset('storage/images/'.$user->image)); ?>" id="customerimagePreview">
                    <a href="javascript::void(0)" wire:click=""><i class="fas fa-save"></i></a>
                </div>
            </div>
        </div>
        <div class="h3-p-design">
            <h3>Profile Photo</h3>
            <p>Upload a new profile photo.</p>
        </div>
    </div>
    <div class="h4-design">
        <h4>Account Information</h4>
    </div>
    <div class="customer-account-information cleaner_account_2 mt-4">
        <ul class="list-unstyled">
            <li class="d-flex justify-content-spacebw two_column">
                <h6 class="title-label">Name:</h6>
                <p class="name"><?php echo e($user->first_name); ?></p>
            </li>

            <li class="position-relative">
                <form class="d-flex justify-content-spacebw three_column edit_frm">
                    <h6 class="title-label">Phone:</h6>
                    <?php if(@$fieldStatus == true && $action == 'contact_number'): ?>
                    <input type="number" value="<?php echo e($user->contact_number); ?>" wire:model="contact_number" />

                    <span class="edit"><a class="link-design-2" wire:click="update('contact_number')"><i class="fas fa-save"></i></a></span>
                    <span class="cancel"><a href="javascript::void(0)" class="link-design-2" wire:click="cancle"><i class="fas fa-times"></i></a></span>
                    <?php else: ?>
                    <p class="phone"><a href="tel:+1 512-559-9582"><?php echo e($user->contact_number); ?></a></p>
                    <div class="action-block">
                        <span class="edit"><a href="javascript::void(0)" wire:click="edit('<?php echo e(auth()->user()->id); ?>', 'contact_number')">Edit</a></span>
                    </div>
                    <?php endif; ?>
                </form>
            </li>

            <li class="position-relative">
                <form class="d-flex justify-content-spacebw three_column edit_frm">
                    <h6 class="title-label">Email:</h6>
                    <?php if(@$fieldStatus == true && $action == 'email'): ?>

                    <input type="email" value="<?php echo e($user->email); ?>" wire:model="email">
                    <span style="color:red"> <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </span>
                    <span class="edit"><a class="link-design-2" wire:click="emailupdate('email')"><i class="fas fa-save"></i></a></span>
                    <span class="cancel"><a href="javascript::void(0)" class="link-design-2" wire:click="cancle"><i class="fas fa-times"></i></a></span>
                    <?php else: ?>
                    <p class="mail"><?php echo e($user->email); ?></p>
                    <div class="action-block">
                        <span class="edit"><a href="javascript::void(0)" class="link-design-2" wire:click="edit('<?php echo e(auth()->user()->id); ?>', 'email')">Edit</a></span>
                    </div>
                    <?php endif; ?>
                </form>
            </li>

            <li class="position-relative">
                <form class="d-flex justify-content-spacebw three_column edit_frm">
                    <h6 class="title-label">Service Address:</h6>
                    <?php if(@$fieldStatus == true && $action == 'address'): ?>
                    <input type="text" value="<?php echo e($user->UserDetails->address); ?>" wire:model="address" />
                    <span class="save-icn-btn"><a class="link-design-2" wire:click="update('address')"><i class="fas fa-save"></i></a></span>
                    <span class="cancel"><a href="javascript::void(0)" class="link-design-2" wire:click="cancle"><i class="fas fa-times"></i></a></span>
                    <?php else: ?>
                    <p><?php echo e($user->UserDetails->address); ?></p>
                    <div class="action-block">
                        <span class="edit"><a href="javascript::void(0)" class="link-design-2" wire:click="edit('<?php echo e(auth()->user()->id); ?>', 'address')">Edit</a></span>
                    </div>
                    <?php endif; ?>
                </form>
            </li>
            <li class="position-relative">
                <form class="d-flex justify-content-spacebw three_column edit_frm">
                    <h6 class="title-label"> Timezone:</h6>
                    <?php if(@$fieldStatus == true && $action == 'timezone'): ?>
                    <div class="time-zone-select-design">
                        <select wire:model="timezone" id="timezone-offset">
                            <option>Select Time Zone</option>
                            <?php $__currentLoopData = $timezones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timezone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($timezone->id); ?>"><?php echo e($timezone->name); ?><?php echo e($timezone->current_utc_offset); ?><?php echo e($timezone->is_currently_dst); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <span class="save-icn-btn"><a class="link-design-2" wire:click="update('timezone')"><i class="fas fa-save"></i></a></span>
                    <span class="cancel"><a href="javascript::void(0)" class="link-design-2" wire:click="cancle"><i class="fas fa-times"></i></a></span>
                    <?php else: ?>
                    <div class="time-zone-select-design">
                        <input type="text" value="<?php echo e(@$user->userDetails->timeZone->name); ?>" disabled />
                    </div>
                    <div class="action-block">
                        <span class="edit"><a href="javascript::void(0)" class="link-design-2" wire:click="edit('<?php echo e(auth()->user()->id); ?>', 'timezone')">Edit</a></span>
                    </div>
                    <?php endif; ?>
                </form>
            </li>
        </ul>
    </div>

</div><?php /**PATH /var/www/html/projects/Amandeep Projects/working project/cleaner/cleaner/resources/views/livewire/customer/account.blade.php ENDPATH**/ ?>
<div>
    <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 no-padd cleaner_team_section">
        <div class="customer-account-forms pe-5">
            <div class="h4-design text-end">

                <h4>Team Size: <?php echo e($teamMemberCounts); ?> </h4>
            </div>
            <div class="form-headeing-second border-bottom pb-3">
                <h3 class="mb-0">Team Info</h3>

                <span>Add additional team members below</span>
                <button type="button" class="btn btn-primary" style="float:right;" data-bs-toggle="modal" data-bs-target="#teamModal">
                    Add Team Members
                </button>
            </div>

            <!-- Modal -->
            <div wire:ignore.self class="modal fade" id="teamModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Team Members</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" id="closeexample" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="altrntive_rw">
                                <p class="appointment_label">First Name</p>
                                <input type="text" wire:model="first_name" placeholder="Enter your First Name" />
                                <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="alert "><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="altrntive_rw">
                                <p class="appointment_label">Last Name</p>
                                <input type="text" wire:model="last_name" />
                                <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="alert "><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="altrntive_rw">
                                <p class="appointment_label">Insured?</p>
                                <input type="text" wire:model="insured" />
                                <?php $__errorArgs = ['insured'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="alert "><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            </div>
                            <div class="altrntive_rw">
                                <p class="appointment_label">Phone</p>
                                <input type="number" wire:model="contact_number" />
                                <?php $__errorArgs = ['contact_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="alert "><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="altrntive_rw">
                                <p class="appointment_label">Email</p>
                                <input type="email" wire:model="email" />
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="alert "><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="altrntive_rw">
                                <p class="appointment_label">Address</p>
                                <input type="address" wire:model="address" />
                                <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="alert "><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="altrntive_rw">
                                <p class="appointment_label">SSN/TIN</p>
                                <input type="number" wire:model="ssn_or_tax" />
                                <?php $__errorArgs = ['ssn_or_tax'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="alert "><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button wire:click="store()" class="btn btn-primary">Save</button>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- End Model-->

    <div class="teams-table-layout-view">
        <div class="row">
            <?php $__currentLoopData = $teamMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teamMember): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-2">
                <div class="select-date-toggles overflow-hidden ">
                    <button class="service_toggle_s" data-id="<?php echo e($teamMember->id); ?>"></button>
                    <div class="service-main-service-column">

                        <div class="altrntive_rw">
                            <p class="appointment_label">Name</p>
                            <p class="app-value"><?php echo e($teamMember->name); ?></p>
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="alert "><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="altrntive_rw">
                            <p class="appointment_label">Insured?</p>
                            <p class="app-value green"><strong>Yes</strong></p>
                        </div>
                        <div class="altrntive_rw">
                            <p class="appointment_label">Phone</p>
                            <p class="app-value"><a href="tel:512-558-5876"><?php echo e($teamMember->contact_number); ?></a></p>
                        </div>
                        <div class="altrntive_rw">
                            <p class="appointment_label">Email</p>
                            <p class="app-value"><a href="mailto:example@email.com"><?php echo e($teamMember->email); ?></a></p>
                        </div>
                        <div class="altrntive_rw">
                            <p class="appointment_label">Address</p>
                            <p class="app-value location"><?php echo e($teamMember->address); ?></p>
                        </div>
                        <div class="altrntive_rw">
                            <p class="appointment_label">SSN/TIN</p>
                            <p class="app-value"><?php echo e($teamMember->ssn_or_tax); ?></p>
                        </div>

                    </div>
                    <div class="d-flex two-column justify-content-spacebw">

                        <a href="javascript::void(0)" type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal" wire:click="edit(<?php echo e($teamMember->id); ?>)" class="edit-member">Edit Member</a>
                        <a href="javascript::void(0)" wire:click="deleteConfirm(<?php echo e($teamMember->id); ?>)" class="red-bordered-full-btn remove-member">Remove Member</a>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <!-- updateModel -->

    <div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Team Members</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" id="updateModalClose" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="altrntive_rw">
                        <p class="appointment_label">First Name</p>
                        <input type="text" wire:model="first_name" />
                        <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="alert "><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="altrntive_rw">
                        <p class="appointment_label">Last Name</p>
                        <input type="text" wire:model="last_name" />
                        <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="alert "><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="altrntive_rw">
                        <p class="appointment_label">Insured?</p>
                        <input type="text" wire:model="insured" />
                        <?php $__errorArgs = ['insured'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="alert "><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    </div>
                    <div class="altrntive_rw">
                        <p class="appointment_label">Phone</p>
                        <input type="number" wire:model="contact_number" />
                        <?php $__errorArgs = ['contact_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="alert "><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="altrntive_rw">
                        <p class="appointment_label">Email</p>
                        <input type="email" wire:model="email" disabled />
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="alert "><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="altrntive_rw">
                        <p class="appointment_label">Address</p>
                        <input type="address" wire:model="address" />
                        <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="alert "><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="altrntive_rw">
                        <p class="appointment_label">SSN/TIN</p>
                        <input type="number" wire:model="ssn_or_tax" />
                        <?php $__errorArgs = ['ssn_or_tax'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="alert "><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                        <a href="javascript::void(0)" wire:click="update()" class="btn btn-primary">Update</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end updateModel -->

</div><?php /**PATH /var/www/html/projects/Amandeep Projects/working project/cleaner/cleaner/resources/views/livewire/cleaner/team.blade.php ENDPATH**/ ?>
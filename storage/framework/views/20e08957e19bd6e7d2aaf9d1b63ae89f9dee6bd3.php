<?php
$days = \App\Models\User::getDays();
?>


<div class="gernal-availity-sec">
    <form action="<?php echo e(route('cleaner.availability.time')); ?>" method="post">
    <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-xl-10 col-lg-12 col-md-12">
                <div class="form-headeing-second gernal-availity-heading">
                    <h4 class="border-0">General Availability</h4>
                </div>
                <div class="form_availibility">
                    <div class="yellow_header_availibility">
                        
                        <div class="y_text day_of_weak">
                            <span>Day of Week</span>
                        </div>
                        <div class="y_text from_to">
                            <span>from</span>
                            <span class="d-block d-lg-none">-</span>
                            <span>to</span>
                        </div>
                        <div class="y_text add">
                            <span></span>
                        </div>
                    </div>
                    <div class="availability_sheet">
                        
                        <?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            $hours = $user->cleanerHours()->where('day', $day)->get();
                            ?>

                        <div class="availbility_cover <?php echo e($day); ?> <?php echo e(count($hours)>0 ? 'show' : ''); ?>">
                            <div class="availability_row">
                                
                                <div class="btn_switch">
                                    <div class="form-check form-switch form-design-switch-1" data-day="<?php echo e($day); ?>">
                                        <input class="form-check-input" type="checkbox" name="day[<?php echo e($day); ?>][selected]" <?php echo e(count($hours)>0 ? 'checked' : ''); ?>>
                                        <label class="form-check-label d-none d-md-block" for=""><?php echo e($day); ?></label>
                                        <label class="form-check-label d-block d-md-none" for=""><?php echo e($day); ?></label>
                                    </div>
                                </div>


                                <div class="time_input">
                                    <div class="addNewHoursLayout <?php echo e($day); ?>  time-schedule-addon">
                                        
                                        <?php if(count($hours)>0): ?>
                                        <?php $__currentLoopData = $hours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $hour): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                        $j = $i+1;
                                        ?>
                                        <div class="time-input-addon layout layout-<?php echo e($j); ?>">

                                            <?php echo Form::hidden('day['.$day.'][data]['.$j.'][id]', @$hour->id); ?>

                                            
                                            <?php echo Form::hidden('day['.$day.'][data]['.$j.'][delete]', 'no', ['class'=>'delete']); ?>


                                            <?php echo Form::time('day['.$day.'][data]['.$j.'][from_time]', @$hour->from_time ?? null, ['class' => ($errors->has('from_time') ? ' is-invalid' : '')]); ?>

                                            <span class="d-none d-md-inline">-</span>
                                            <?php echo Form::time('day['.$day.'][data]['.$j.'][to_time]', @$hour->to_time ?? null, ['class' => ($errors->has('to_time') ? ' is-invalid' : '')]); ?>


                                            <?php if($i>0): ?>
                                            <button type="button" class="border-0 bg-none btn-empty deleteLayout" data-day="<?php echo e($day); ?>" data-id="<?php echo e($j); ?>">
                                                <img src="<?php echo e(asset('assets/images/icons/delete_2.svg')); ?>">
                                            </button>
                                            <?php endif; ?>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                        <div class="time-input-addon layout layout-1">
                                            <?php echo Form::time('day['.$day.'][data][1][from_time]', null, ['class' => ($errors->has('from_time') ? ' is-invalid' : '')]); ?>

                                            <span class="d-none d-md-inline">-</span>
                                            <?php echo Form::time('day['.$day.'][data][1][to_time]', null, ['class' => ($errors->has('to_time') ? ' is-invalid' : '')]); ?>

                                        </div>
                                        <?php endif; ?>

                                    </div>
                                </div>
                                <div class="add_more">
                                    <button type="button" class="border-0 bg-none add-time-slots" data-day="<?php echo e($day); ?>">+</button>
                                </div>

                                
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </div>
                    
                    <button type="submit" class="btn_blue mt-4">Save</button>
                </div>
            </div>
        </div>
    </form>
</div><?php /**PATH /var/www/html/projects/Amandeep Projects/working project/cleaner/cleaner/resources/views/cleaner/availability/time.blade.php ENDPATH**/ ?>
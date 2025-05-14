<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('menumanage::menuManage.role_based_sidebar_settings'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>
    <div class="role_permission_wrap">
        <div class="permission_title d-flex flex-wrap justify-content-between mb_10">
            <h4><?php echo e(trans('menumanage::menuManage.role_based_sidebar_settings')); ?></h4>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 mb_20">
            <div class="white-box">
                <?php echo Form::open(['route'=>'menumanage.settings', 'method'=>'POST']); ?>

                <?php if(moduleStatusCheck('Saas')): ?>
                    <?php $__currentLoopData = $schools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-3 d-flex pt-10">
                                    <p class="text-uppercase fw-500 mb-10"><?php echo e($school->school_name); ?> </p>
                                </div>
                                <div class="col-lg-9">

                                    <div class="radio-btn-flex ml-20">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="">
                                                    <input type="radio" name="role_based_sidebar[<?php echo e($school->id); ?>]"
                                                           id="role_based_sidebar_<?php echo e($school->id); ?>_enable" value="1"
                                                           class="common-radio relationButton"
                                                           <?php if($school->settings->role_based_sidebar): ?> checked <?php endif; ?>>
                                                    <label for="role_based_sidebar_<?php echo e($school->id); ?>_enable"><?php echo e(__('common.enable')); ?></label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="">
                                                    <input type="radio" name="role_based_sidebar[<?php echo e($school->id); ?>]"
                                                           id="role_based_sidebar_<?php echo e($school->id); ?>_disable" value="0"
                                                           class="common-radio relationButton"
                                                           <?php if(!$school->settings->role_based_sidebar): ?> checked <?php endif; ?>>
                                                    <label for="role_based_sidebar_<?php echo e($school->id); ?>_disable"><?php echo e(__('common.disable')); ?></label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <div class="col-lg-12 text-center">
                        <button class="primary-btn fix-gr-bg small white_space" type="submit" >
                            <span class="ti-check"></span>
                            <?php echo e(__('common.save')); ?>

                        </button>

                        


                    </div>
                <?php endif; ?>
                <?php echo Form::close(); ?>

            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Modules\MenuManage\Resources\views\settings.blade.php ENDPATH**/ ?>
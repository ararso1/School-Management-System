<?php $__env->startSection('mainContent'); ?>
    <div class="main-title mb-25">
        <h3 class="mb-0"><?php echo e(__('user.profile')); ?></h3>
    </div>

    <form action="<?php echo e(route('chat.user.profile.update')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="General_system_wrap_area">
            <div class="single_system_wrap">
                <div class="single_system_wrap_inner text-center">
                    <div class="logo">
                        <span><?php echo e(__('user.avatar')); ?></span>
                    </div>
                    <div class="logo_img" style="width: 170px; height: 68px;">
                        <img src="<?php echo e(asset(auth()->user()->avatar)); ?>" alt="" id="generalSettingLogo" style="height: 68px;">
                    </div>
                    <div class="update_logo_btn">
                        <button class="primary-btn small fix-gr-bg">
                            <input placeholder="Upload Logo" type="file" name="profile_avatar" id="site_logo" onchange="imageChangeWithFile(this,'#generalSettingLogo')">
                            <?php echo e(__('user.upload_avatar')); ?>

                        </button>
                    </div>
                <!--  <a href="#" class="remove_logo"><?php echo e(__('general_settings.remove')); ?></a> -->
                </div>
            </div>

            <div class="single_system_wrap">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="primary_input mb-25">
                            <label class="primary_input_label" for=""><?php echo e(__('user.first_name')); ?></label>
                            <input class="primary_input_field" type="text" id="site_title" name="first_name" value="<?php echo e(auth()->user()->first_name); ?>">
                            <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p required class="text-danger text-sm-left"><em><?php echo e($message); ?></em></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="primary_input mb-25">
                            <label class="primary_input_label" for=""><?php echo e(__('user.last_name')); ?> </label>
                            <input required class="primary_input_field" type="text" name="last_name" value="<?php echo e(auth()->user()->last_name); ?>">
                            <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-danger text-sm-left"><em><?php echo e($message); ?></em></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="primary_input mb-25t">
                            <label class="primary_input_label" for=""><?php echo e(__('user.username')); ?></label>
                            <input required class="primary_input_field" type="text" name="username" value="<?php echo e(auth()->user()->username); ?>">
                            <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-danger text-sm-left"><em><?php echo e($message); ?></em></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="primary_input mb-25t">
                            <label class="primary_input_label" for=""><?php echo e(__('user.email')); ?></label>
                            <input required class="primary_input_field" type="email" name="email" value="<?php echo e(auth()->user()->email); ?>">
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-danger text-sm-left"><em><?php echo e($message); ?></em></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="submit_btn text-center mt-4">
            <button class="primary_btn_large" type="submit"> <i class="ti-check"></i> <?php echo e(__('common.update')); ?></button>
        </div>
    </form>


    <div class="main-title mb-25 mt-5">
        <h3 class="mb-0">Change Password</h3>
    </div>

    <form action="<?php echo e(route('chat.user.password')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="row mt-1">
            <div class="col-xl-4">
                <div class="primary_input mb-25t">
                    <label class="primary_input_label" for=""><?php echo e(__('user.current_password')); ?></label>
                    <input required class="primary_input_field" type="password" name="current_password" placeholder="********">
                    <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-danger text-sm-left"><em><?php echo e($message); ?></em></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="primary_input mb-25t">
                    <label class="primary_input_label" for=""><?php echo e(__('user.password')); ?></label>
                    <input required class="primary_input_field" type="password" name="password" placeholder="********">
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-danger text-sm-left"><em><?php echo e($message); ?></em></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <div class="col-xl-4">
                <div class="primary_input mb-25t">
                    <label class="primary_input_label" for=""><?php echo e(__('user.confirm_password')); ?></label>
                    <input required class="primary_input_field" type="password" name="password_confirmation" placeholder="********">
                    <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-danger text-sm-left"><em><?php echo e($message); ?></em></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
        </div>
        <div class="submit_btn text-center mt-4">
            <button class="primary_btn_large" type="submit"> <i class="ti-check"></i> <?php echo e(__('common.update')); ?></button>
        </div>
    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Modules\Chat\Resources\views\user\profile.blade.php ENDPATH**/ ?>
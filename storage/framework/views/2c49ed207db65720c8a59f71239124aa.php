    <?php $__env->startSection('title'); ?> 
        <?php echo app('translator')->get('fees.fees_carry_forward_settings'); ?>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('fees.fees_forward'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('fees.fees_carry_forward_settings'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="main-title">
                        <h3 class="mb-30"><?php echo app('translator')->get('fees.fees_carry_forward_settings'); ?></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'route' => 'fees-carry-forward-settings-store', 'method' => 'POST'])); ?>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="primary_input">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('common.title'); ?> <span class="text-danger"> *</span></label>
                                        <input class="primary_input_field form-control<?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>" type="text" name="title" autocomplete="off" value="<?php echo e(isset($settings)? @$settings->title : old('title')); ?>">
                                        <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger invalid-select" role="alert">
                                                <?php echo e($message); ?>

                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="primary_input">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('fees.fees_due_days'); ?> <span class="text-danger"> *</span></label>
                                        <input class="primary_input_field form-control<?php echo e($errors->has('fees_due_days') ? ' is-invalid' : ''); ?>" type="text" name="fees_due_days" autocomplete="off" value="<?php echo e(isset($settings)? @$settings->fees_due_days : old('fees_due_days')); ?>">
                                        <?php $__errorArgs = ['fees_due_days'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger invalid-select" role="alert">
                                                <?php echo e($message); ?>

                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.select_a_payment_gateway'); ?><span class="text-danger"> *</span></label>
                                    <select class="primary_select  form-control<?php echo e($errors->has('payment_gateway') ? ' is-invalid' : ''); ?>" name="payment_gateway">
                                        <?php $__currentLoopData = $paymeny_gateway; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($value->method); ?>" <?php echo e(old('payment_gateway') == $value->method? 'selected' : ($settings->payment_gateway == $value->method ? 'selected' : '')); ?>><?php echo e(@$value->method); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['payment_gateway'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($message); ?>

                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-lg-12 mt-20 text-right">
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn fix-gr-bg submit">
                                            <span class="ti-check"></span>
                                                <?php echo app('translator')->get('common.update'); ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\systemSettings\feesCarryForwardSettingsView.blade.php ENDPATH**/ ?>
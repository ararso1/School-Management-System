<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('system_settings.language_settings'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('system_settings.language_settings'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
                    <a href="#"><?php echo app('translator')->get('system_settings.system_settings'); ?></a>
                    <a href="#"><?php echo app('translator')->get('system_settings.language_settings'); ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="admin-visitor-area">
        <div class="container-fluid p-0">
            <?php if(isset($edit_languages)): ?>
            <div class="row">
                <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                    <a href="<?php echo e(route('marks-grade')); ?>" class="primary-btn small fix-gr-bg">
                        <span class="ti-plus pr-2"></span>
                        <?php echo app('translator')->get('common.add'); ?>
                    </a>
                </div>
            </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-lg-12">

                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'translation-term-update', 'method' => 'POST'])); ?>

                    <div class="row row-gap-24">
                        <div class="col-lg-3 mb-30">
                            <div class="white-box onchangeSearch">
                                <div class="row">
                                    <div class="col-lg-12 no-gutters">
                                        <div class="main-title">
                                            <h3 class="mb-30">
                                            <?php echo app('translator')->get('system_settings.language_setup'); ?></h3>
                                        </div>
                                    </div>
                                </div>
                                <select class="primary_select form-control <?php echo e($errors->has('module_id') ? ' is-invalid' : ''); ?>" id="module_id" name="module_id">
                                    <option data-display="Select Module *" value=""><?php echo app('translator')->get('common.select_module'); ?> *</option>
                                    <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <optgroup label="<?php echo e($key); ?>">
                                            <?php $__currentLoopData = $module; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $moduleName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $formattedModuleName = strpos($moduleName, '::') !== false ? last(explode('::', $moduleName)) : $moduleName;
                                                    $formattedModuleName = ucwords(str_replace('_', ' ', $formattedModuleName));
                                                ?>
                                                <option value="<?php echo e($k); ?>"><?php echo e($formattedModuleName); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </optgroup>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->any()): ?>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p class="text-danger"><?php echo e($error); ?></p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="white-box">
                            <input type="hidden" id="url" value="<?php echo e(url('/')); ?>">
                            <input type="hidden" id="language_universal" value="<?php echo e(@$language_universal); ?>" name="language_universal">
                            <table class="table school-table-style" cellspacing="0" width="100%" id="language_table">
                                <tbody>
                                    <tr>
                                        <th>Default Phrases</th>
                                        <th><?php echo e($language_universal); ?> Phrases</th>
                                    </tr>
                                    <?php $count=1; @$sms_languages =[]; ?>
                                    <?php $__currentLoopData = $sms_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(@$row->en); ?></td>
                                        <td>
                                            <div class="primary_input">
                                                <input type="hidden" name="InputId[<?php echo e(@$row->id); ?>]" value="<?php echo e(@$row->id); ?>">
                                                <input class="primary_input_field form-control<?php echo e($errors->has('language_universal') ? ' is-invalid' : ''); ?>"
                                                    type="text" name="LU[<?php echo e(@$row->id); ?>]" autocomplete="off" value="<?php echo e(@$row->$language_universal); ?>">
                                                <?php if($errors->has('language_universal')): ?>
                                                    <span class="text-danger" >
                                                        <?php echo e($errors->first('language_universal')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-end">
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn fix-gr-bg submit" style="display: none;" disabled>
                                            <span class="ti-check"></span>
                                            <?php echo app('translator')->get('system_settings.update_language'); ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\systemSettings\languageSetup.blade.php ENDPATH**/ ?>
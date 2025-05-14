<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('system_settings.language_export'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('style'); ?>
    <style>
        .primary_input {
            border-radius: 30px 0 0 30px;
            background: #ECEEF3;
            border: 0;
            color: #fff;
            text-transform: uppercase;
            padding-left: 27px;
            padding-right: 27px;
            font-size: 14px;
            font-weight: 500;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('system_settings.language_export'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
                    <a href="#"><?php echo app('translator')->get('system_settings.system_settings'); ?></a>
                    <a href="#"><?php echo app('translator')->get('system_settings.language_export'); ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="admin-visitor-area">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    <div class="main-title">
                        <h3 class="mb-30"><?php echo app('translator')->get('common.select_criteria'); ?> </h3>
                    </div>
                </div>
            </div>
            <?php echo e(Form::open(['class' => 'form-horizontal', 'route' => 'file-export', 'method' => 'POST'])); ?>

            <input type="hidden" name="lang" value="<?php echo e($lang); ?>">
            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">
                        <div class="row mb-10">
                            <div class="col-lg-6">
                                <input type="checkbox" id="checkAll" class="common-checkbox" name="checkAll">
                                <label for="checkAll"><?php echo app('translator')->get('common.select_all'); ?></label>
                             </div>
                             <div class="col-lg-6  text-left">
                                <button type="submit" class="primary-btn small fix-gr-bg" type="submit">
                                    <span class="ti-download pr-2"></span>
                                    <?php echo app('translator')->get('common.download'); ?>
                                </button>
                            </div>
                        </div>
                        <label for=""><?php echo e(__('common.select_files')); ?> <span class="text-danger"> *</span></label>
                        <div class="row mb-25">
                            <?php
                            $count= count($files);
                            $half = round($count / 2);
                            ?>                            
                             
                            <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($loop->iteration == 1 or $loop->iteration == $half+1): ?>
                                <div class="col-lg-6">
                                    <?php endif; ?>
                                        <div class="">                                     
                                                <input type="checkbox" id="file<?php echo e(@$key); ?>"
                                                    class="common-checkbox form-control<?php echo e(@$errors->has('file') ? ' is-invalid' : ''); ?>"
                                                    name="lang_files[]" value="<?php echo e($file); ?>">
                                                <label for="file<?php echo e(@$key); ?>"><?php echo e(ucwords(str_replace('_',' ',basename($file, '.php')))); ?></label>
                                           
                                        </div>
                                        <?php if($loop->iteration == $half or $loop->iteration == $count): ?>
                                
                                </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                            
                        </div>
                    </div>
                </div>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\systemSettings\language_export.blade.php ENDPATH**/ ?>
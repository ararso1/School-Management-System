<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('exam.custom_result_setting'); ?>
<?php $__env->startSection('mainContent'); ?>

<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('exam.custom_result_setting'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('system_settings.system_settings'); ?></a>
                <a href="#"><?php echo app('translator')->get('exam.custom_result_setting'); ?></a>
            </div>
        </div>
    </div>
</section>

<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
          
        <div class="row">
            <?php
                @$system_setting=generalSetting();
                @$system_setting=@$system_setting->session_id;

                @$check_exist=App\CustomResultSetting::where('academic_year','=',@$system_setting)->first();
            ?>
          
            <div class="col-lg-12 mt-20">
                <div class="row">
                    <div class="col-lg-4 no-gutters">
                        <div class="main-title">
                            <h3 class="mb-0">  <?php echo app('translator')->get('exam.custom_result_setting'); ?></h3>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">

                        <table id="table_id" class="table" cellspacing="0" width="100%">

                            <thead>
                               
                                <tr>
                                    <th><?php echo app('translator')->get('exam.exam_type'); ?></th>
                                    <th><?php echo app('translator')->get('exam.percentage'); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $custom_settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $custom_setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(@$custom_setting->exam_type); ?></td>
                                    <td><?php echo e(@$custom_setting->percentage); ?>%</td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\systemSettings\custom_result_settings.blade.php ENDPATH**/ ?>
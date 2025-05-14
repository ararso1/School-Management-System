    <?php $__env->startSection('title'); ?> 
        <?php echo app('translator')->get('bulkprint::bulk.lms_certificate'); ?>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20 up_breadcrumb">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('bulkprint::bulk.student_certificate'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('bulkprint::bulk.bulk_print'); ?></a>
                <a href="#"><?php echo app('translator')->get('bulkprint::bulk.lms_certificate'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-8 col-md-6">
                <div class="main-title">
                    <h3 class="mb-30"><?php echo app('translator')->get('common.select_criteria'); ?> </h3>
                </div>
            </div>
        </div>
        <?php echo e(Form::open(['class' => 'form-horizontal', 'method' => 'POST', 'route' => 'lms-certificate-bulk-print-seacrh'])); ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">
                        <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            <div class="col-lg-9 mt-30-md">
                                <select class="primary_select new_test w-100 bb form-control <?php echo e(@$errors->has('course_id') ? ' is-invalid' : ''); ?>" name="course_id">
                                    <option data-display="<?php echo app('translator')->get('lms::lms.course'); ?> <?php echo app('translator')->get('lms::lms.name'); ?> *" value=""><?php echo app('translator')->get('lms::lms.course'); ?> <?php echo app('translator')->get('lms::lms.name'); ?> *</option>
                                    <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($course->id); ?>" <?php echo e(old('course_id')? 'selected':''); ?>><?php echo e($course->course_title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            
                                <?php if($errors->has('course_id')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <strong><?php echo e(@$errors->first('course_id')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-3 mt-30-md">
                                <div class="primary_input">
                                    <input class="primary_input_field form-control<?php echo e($errors->has('grid_gap') ? ' is-invalid' : ''); ?>" type="number" name="grid_gap" autocomplete="off" value="<?php echo e(old('grid_gap')); ?>">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.grid_gap'); ?>(px)<span class="text-danger"> *</span></label>
                                    
    
                                    <?php if($errors->has('grid_gap')): ?>
                                        <span class="text-danger" >
                                            <?php echo e($errors->first('grid_gap')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-lg-12 mt-20 text-right">
                                <button type="submit" class="primary-btn small fix-gr-bg">
                                    <span class="ti-printer pr-2"></span>
                                    <?php echo app('translator')->get('common.print'); ?>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php echo e(Form::close()); ?>

    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Modules\BulkPrint\Resources\views\admin\lmsCertificate.blade.php ENDPATH**/ ?>
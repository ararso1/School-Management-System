    <?php $__env->startSection('title'); ?> 
        <?php echo app('translator')->get('bulkprint::bulk.fees_invoice_bulk_print'); ?>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<input type="hidden" id="classToSectionRoute" value="<?php echo e(route('fees.ajax-get-all-section')); ?>">
<input type="hidden" id="sectionToStudentRoute" value="<?php echo e(route('fees.ajax-section-all-student')); ?>">
<input type="hidden" id="classToStudentRoute" value="<?php echo e(route('fees.ajax-get-all-student')); ?>">
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('bulkprint::bulk.fees_invoice_bulk_print'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('bulkprint::bulk.bulk_print'); ?></a>
                <a href="#"><?php echo app('translator')->get('bulkprint::bulk.fees_invoice_bulk_print'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="white-box">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="main-title">
                                <h3 class="mb-15"><?php echo app('translator')->get('common.select_criteria'); ?> </h3>
                            </div>
                        </div>
                    </div>
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'route' => 'fees-invoice-bulk-print-search', 'method' => 'POST'])); ?>

                        <div class="row">
                            <?php if(moduleStatusCheck('University')==true): ?>
                                <?php if ($__env->exists('university::common.session_faculty_depart_academic_semester_level',['hide'=>['USUB']])) echo $__env->make('university::common.session_faculty_depart_academic_semester_level',['hide'=>['USUB']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <div class="col-lg-4 mt-25" id="selectStudentDiv">
                                    <label class="primary_input_label" for="">
                                        <?php echo e(__('common.student')); ?>

                                            <span class="text-danger"> </span>
                                    </label>
                                    <select class="primary_select" id="selectStudent" name="student">
                                        <option data-display="<?php echo app('translator')->get('common.select_student'); ?>" value=""><?php echo app('translator')->get('common.select_student'); ?></option>
                                    </select>
                                    <div class="pull-right loader loader_style" id="student_section_loader">
                                        <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                    </div>
                                    <?php if($errors->has('student')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('student')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            <?php else: ?>
                            <div class="col-lg-4 mt-30-md">
                                <label class="primary_input_label" for="">
                                    <?php echo e(__('common.class')); ?>

                                        <span class="text-danger"> </span>
                                </label>
                                <select class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>" id="feesSelectClass" name="class">
                                    <option data-display="<?php echo app('translator')->get('common.select_class'); ?>" value=""><?php echo app('translator')->get('common.select_class'); ?></option>
                                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($class->id); ?>" <?php echo e(isset($class_id)? ($class_id == $class->id? 'selected':''):''); ?>><?php echo e($class->class_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('class')): ?>
                                <span class="text-danger invalid-select" role="alert">
                                    <?php echo e($errors->first('class')); ?>

                                </span>
                                <?php endif; ?>
                            </div>
                        
                            <div class="col-lg-4 mt-30-md" id="feesSectionDiv">
                                <label class="primary_input_label" for="">
                                    <?php echo e(__('common.section')); ?>

                                        <span class="text-danger"> </span>
                                </label>
                                <select class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?>" id="feesSection" name="section">
                                    <option data-display="<?php echo app('translator')->get('common.select_section'); ?>" value=""><?php echo app('translator')->get('common.select_section'); ?></option>
                                </select>
                                <div class="pull-right loader loader_style" id="select_section_loader">
                                    <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                </div>
                                <?php if($errors->has('section')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('section')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-4 mt-30-md" id="selectStudentDiv">
                                <label class="primary_input_label" for="">
                                    <?php echo e(__('common.student')); ?>

                                        <span class="text-danger"> </span>
                                </label>
                                <select class="primary_select form-control<?php echo e($errors->has('student') ? ' is-invalid' : ''); ?>" id="selectStudent" name="student">
                                    <option data-display="<?php echo app('translator')->get('common.select_student'); ?>" value=""><?php echo app('translator')->get('common.select_student'); ?></option>
                                </select>
                                <div class="pull-right loader loader_style" id="student_section_loader">
                                    <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                </div>
                                <?php if($errors->has('student')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('student')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>

                            <div class="col-lg-12 mt-20 text-right">
                                <button type="submit" class="primary-btn small fix-gr-bg">
                                    <span class="ti-printer pr-2"></span>
                                    <?php echo app('translator')->get('common.print'); ?>
                                </button>
                            </div>
                        </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<script type="text/javascript" src="<?php echo e(url('Modules\Fees\Resources\assets\js\app.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Modules\BulkPrint\Resources\views\feesInvoice\feesInvoiceBulk.blade.php ENDPATH**/ ?>
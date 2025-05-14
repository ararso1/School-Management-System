<?php $__env->startSection('title'); ?> 
<?php echo app('translator')->get('student.student_export'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20 up_breadcrumb">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('student.student_export'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('admin-dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('student.student_information'); ?></a>
                <a href="#"><?php echo app('translator')->get('student.student_export'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
        <div class="col-lg-12 white-box">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-title">
                        <h3 class="mb-15">
                            <?php echo app('translator')->get('student.all_student_export'); ?>
                        </h3>
                    </div>
                    <div>
                        <div class="add-visitor">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="text-center">
                                        <?php if(userPermission('all-student-export-excel')): ?>
                                            <a class="primary-btn small bg-success text-white border-0  tr-bg" href="<?php echo e(route('all-student-export-excel')); ?>">
                                                <?php echo app('translator')->get('student.export_to_csv'); ?>
                                            </a>  
                                        <?php endif; ?>
                                        <?php if(userPermission('all-student-export-pdf')): ?>
                                            <a class="primary-btn small bg-success text-white border-0  tr-bg" href="<?php echo e(route('all-student-export-pdf')); ?>">
                                                <?php echo app('translator')->get('student.export_to_pdf'); ?>
                                            </a>
                                        <?php endif; ?>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\studentInformation\allStudentExport.blade.php ENDPATH**/ ?>
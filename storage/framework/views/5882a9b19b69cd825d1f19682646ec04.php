<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('exam.exam_schedule'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('exam.examinations'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('exam.examinations'); ?></a>
                <a href="<?php echo e(route('exam')); ?>"><?php echo app('translator')->get('exam.exam'); ?></a>
                <a href="<?php echo e(route('exam_schedule')); ?>"><?php echo app('translator')->get('exam.exam_schedule'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
           
            <div class="row mt-40">
                <div class="col-lg-4 no-gutters">
                    <div class="main-title">
                        <h3 class="mb-0"><?php echo e($exam->name); ?> <?php echo app('translator')->get('exam.exam_status'); ?></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <table id="" class="school-table-data school-table shadow-none" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get('common.class'); ?>(<?php echo app('translator')->get('common.section'); ?>)</th>
                                <th><?php echo app('translator')->get('common.action'); ?></th>
                            </tr>
                        </thead>

                        <tbody>
                           <?php $__currentLoopData = $view_exams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view_exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td width="85%"><?php echo e($view_exam->class !=""?$view_exam->class->class_name:" "); ?> (<?php echo e($view_exam->section !=""?$view_exam->section->section_name:""); ?>)</td>
                                <td width="15%">
                                    <div class="dropdown">
                                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                <?php echo app('translator')->get('common.select'); ?>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item modalLink" title="Exam <?php echo e($exam->name); ?>" data-modal-size="large-modal" href="<?php echo e(route('view_exam_schedule', [$view_exam->class_id,$view_exam->section_id, $view_exam->id])); ?>"><?php echo app('translator')->get('common.view'); ?></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\examination\view_exam_status.blade.php ENDPATH**/ ?>
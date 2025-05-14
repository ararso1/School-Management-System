<?php $__env->startSection('title'); ?> 
<?php echo app('translator')->get('homework.home_work_list'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<?php $__env->startPush('css'); ?>
<style>
    table.dataTable tbody th, table.dataTable tbody td {
        padding-left: 20px !important;
    }

    table.dataTable thead th {
        padding-left: 34px !important;
    }

    table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting:after,table.dataTable thead .sorting_desc:after {
        left: 16px;
        top: 10px;
    }
</style>
<?php $__env->stopPush(); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('homework.home_work_list'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('homework.home_work'); ?></a>
                    <a href="#"><?php echo app('translator')->get('homework.home_work_list'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="row mt-40">
            <!-- Start Student Details -->
            <div class="col-lg-12 student-details up_admin_visitor">
                <div class="white-box">
                    <ul class="nav nav-tabs tabs_scroll_nav ml-0" role="tablist">

                        <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="nav-item mb-0">
                                <a class="nav-link mb-0 <?php if($key== 0): ?> active <?php endif; ?> " href="#tab<?php echo e($key); ?>" role="tab" data-toggle="tab">
                                    <?php if(moduleStatusCheck('University')): ?>
                                    <?php echo e($record->semesterLabel->name); ?> (<?php echo e($record->unSection->section_name); ?>) - <?php echo e(@$record->unAcademic->name); ?>

                               <?php else: ?>
                                    <?php echo e($record->class->class_name); ?> (<?php echo e($record->section->section_name); ?>)
                                <?php endif; ?>
                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
                    </ul>
    
    
                    <!-- Tab panes -->
                    <div class="tab-content">
                    <!-- Start Fees Tab -->
                    <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div role="tabpanel" class="tab-pane fade  <?php if($key== 0): ?> active show <?php endif; ?>" id="tab<?php echo e($key); ?>">
                            <div class="row mt-60">
                                <div class="col-lg-12">
                                        <table id="table_id" class="table" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
    
                                                <th><?php echo app('translator')->get('homework.subject'); ?></th>
                                                <th><?php echo app('translator')->get('exam.marks'); ?></th>
                                                <th><?php echo app('translator')->get('homework.home_work_date'); ?></th>
                                                <th><?php echo app('translator')->get('homework.submission_date'); ?></th>
                                                <th><?php echo app('translator')->get('homework.evaluation_date'); ?></th>
                                                <th><?php echo app('translator')->get('homework.obtained_marks'); ?></th>
                                                <th><?php echo app('translator')->get('common.status'); ?></th>
                                                <th><?php echo app('translator')->get('common.action'); ?></th>
                                            </tr>
                                            </thead>
    
                                            <tbody>
                                                <?php
                                                    if(moduleStatusCheck('University')){
                                                        $homeworks = $record->homeworkContents('is_university');
                                                    }else{
                                                        $homeworks = $record->homeworkContents();
                                                    }
                                                ?>
                                            <?php $__currentLoopData = $homeworks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $student_result = $student_detail->homeworks->where('homework_id',$value->id)->first();
                                                ?>
    
                                                <tr>
    
                                                    <?php if(moduleStatusCheck('University')): ?>
                                                        <td><?php echo e($value->unSubject->subject_name); ?></td>
                                                        <?php else: ?>
                                                        <td><?php echo e(@$value->subjects !=""?@$value->subjects->subject_name:""); ?></td>
                                                    <?php endif; ?>
    
                                                    <td><?php echo e($value->marks); ?></td>
                                                    <td data-sort="<?php echo e(strtotime($value->homework_date)); ?>">
                                                        <?php echo e($value->homework_date != ""? dateConvert($value->homework_date):''); ?>

                                                    </td>
                                                    <td data-sort="<?php echo e(strtotime($value->submission_date)); ?>"><?php echo e($value->submission_date != ""? dateConvert($value->submission_date):''); ?></td>
                                                    <td data-sort="<?php echo e(strtotime($value->evaluation_date)); ?>">
                                                        <?php if(!empty($value->evaluation_date)): ?>
                                                            <?php echo e($value->evaluation_date != ""? dateConvert($value->evaluation_date):''); ?>

    
                                                        <?php endif; ?>
                                                    </td>
    
    
                                                    <td><?php echo e($student_result != ""? $student_result->marks:''); ?></td>
                                                    <td>
                                                        <?php if($student_result != ""): ?>
    
                                                            <?php if($student_result->complete_status == "C"): ?>
                                                                <button class="primary-btn small bg-success text-white border-0"><?php echo app('translator')->get('homework.completed'); ?></button>
                                                            <?php else: ?>
                                                                <button class="primary-btn small bg-warning text-white border-0"><?php echo app('translator')->get('homework.incompleted'); ?></button>
                                                            <?php endif; ?>
    
                                                        <?php else: ?>
                                                            <button class="primary-btn small bg-warning text-white border-0"><?php echo app('translator')->get('homework.incompleted'); ?></button>
                                                        <?php endif; ?>
    
                                                    </td>
                                                    <td>
                                                        <div class="dropdown CRM_dropdown">
                                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                                <?php echo app('translator')->get('common.select'); ?>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <?php if(userPermission('parent_homework_view')): ?>
                                                                <?php if(moduleStatusCheck('University')): ?>
                                                                <a class="dropdown-item modalLink" title="Homework View"
                                                                data-modal-size="modal-lg"
                                                                href="<?php echo e(route('un_student_homework_view', [$value->un_semester_label_id, $value->id])); ?>"><?php echo app('translator')->get('common.view'); ?></a>
                                                                <?php else: ?>
                                                                    <a class="dropdown-item modalLink" title="Homework View"
                                                                       data-modal-size="modal-lg"
                                                                       href="<?php echo e(route('parent_homework_view', [$value->class_id, $value->section_id, $value->id])); ?>"><?php echo app('translator')->get('common.view'); ?></a>
                                                                <?php endif; ?>
                                                                <?php endif; ?>
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
    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!-- End Fees Tab -->
                    </div>
                </div>
            </div>
   <!-- End Student Details -->






        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\parentPanel\homework.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title'); ?> 
<?php echo app('translator')->get('exam.active_exams'); ?>
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
<?php
    $user =$student;
?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('exam.online_exam'); ?> </h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="<?php echo e(route('parent_online_examination',$user->id)); ?>"><?php echo app('translator')->get('exam.active_exams'); ?></a>
            </div>
        </div>
    </div>
</section>

<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-12 student-details up_admin_visitor">
                <ul class="nav nav-tabs tabs_scroll_nav" role="tablist">
                    <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <li class="nav-item mb-0">
                            <a class="nav-link mb-0 <?php if($key== 0): ?> active <?php endif; ?> " href="#tab<?php echo e($key); ?>" role="tab" data-toggle="tab"><?php echo e($record->class->class_name); ?> (<?php echo e($record->section->section_name); ?>) </a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <div role="tabpanel" class="tab-pane fade  <?php if($key== 0): ?> active show <?php endif; ?>" id="tab<?php echo e($key); ?>">
                            <div class="row mt-10">
                                <div class="col-lg-12">
                                    <table id="table_id" class="table" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th><?php echo app('translator')->get('exam.title'); ?></th>
                                            <th><?php echo app('translator')->get('exam.subject'); ?></th>
                                            <th><?php echo app('translator')->get('exam.exam_date'); ?></th>
                                            <th><?php echo app('translator')->get('exam.duration'); ?></th>
                                            <th><?php echo app('translator')->get('common.action'); ?></th>
                                            <th><?php echo app('translator')->get('common.status'); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $record->OnlineExam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $online_exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                @$submitted_answer = $student->studentOnlineExam->where('online_exam_id',$online_exam->id)->first();
                                            ?>
                                            <?php if(!in_array(@$online_exam->id, @$marks_assigned)): ?>
                                                <tr>
                                                    <td><?php echo e(@$online_exam->title); ?></td>
                                                    <td><?php echo e(@$online_exam->subject !=""?@$online_exam->subject->subject_name:""); ?></td>
                                                    <td data-sort="<?php echo e(strtotime(@$online_exam->date)); ?>">
                                                        <?php echo e(@$online_exam->date != ""? dateConvert(@$online_exam->date):''); ?>


                                                        <br>
                                                        Time: <?php echo e(date('h:i A', strtotime(@$online_exam->start_time)).' - '.date('h:i A', strtotime(@$online_exam->end_time))); ?>

                                                    </td>
                                                    <?php

                                                        $totalDuration = $online_exam->end_time !='NULL' ? Carbon::parse($online_exam->end_time)->diffinminutes( Carbon::parse($online_exam->start_time) ) : 0;

                                                    ?>
                                                    <td>
                                                        <?php echo e($online_exam->end_time !='NULL' ? gmdate($totalDuration) : 'Unlimited'); ?>  <?php echo app('translator')->get('exam.minutes'); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo e($online_exam->total_durations); ?> <?php echo app('translator')->get('exam.minutes'); ?>
                                                    </td>

                                                    <td>
                                                    <?php if( !empty( $submitted_answer)): ?>
                                                        <?php if(@$submitted_answer->status == 1): ?>
                                                            <span class="btn primary-btn small  fix-gr-bg"
                                                                style="background:green"><?php echo app('translator')->get('exam.already_submitted'); ?></span>
                                                            
                                                            
                                                        
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        
                                                    <?php
                                                    // date_default_timezone_set("Asia/Dhaka");
                                                        $startTime = strtotime($online_exam->date . ' ' . $online_exam->start_time);
                                                        $endTime = strtotime($online_exam->date . ' ' . $online_exam->end_time);
                                                        $now = date('h:i:s');
                                                        $now =  strtotime("now");
                                                    ?>

                                                        <?php if($startTime <= $now && $now <= $endTime): ?>
                                                            <span class="btn primary-btn small  fix-gr-bg"
                                                                style="background:green"><?php echo app('translator')->get('exam.running'); ?></span>    
                                                        
                                                        <?php elseif($startTime > $now && $now < $endTime): ?>
                                                            <span class="btn primary-btn small  fix-gr-bg"
                                                                style="background:blue"><?php echo app('translator')->get('exam.not_yet_start'); ?></span>
                                                        <?php elseif($now >= $endTime): ?>
                                                            <span class="btn primary-btn small  fix-gr-bg"
                                                                style="background:#dc3545">Closed</span>
                                                        <?php endif; ?>
                                                    
                                                            
                                                        

                                                    <?php endif; ?>
                                                </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade admin-query" id="deleteOnlineExam" >
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo app('translator')->get('common.delete_item'); ?></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="text-center">
                    <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                </div>

                <div class="mt-40 d-flex justify-content-between">
                    <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                     <?php echo e(Form::open(['route' => 'online-exam-delete', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                     <input type="hidden" name="id" id="online_exam_id">
                    <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('common.delete'); ?></button>
                     <?php echo e(Form::close()); ?>

                </div>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\parentPanel\parent_online_exam.blade.php ENDPATH**/ ?>
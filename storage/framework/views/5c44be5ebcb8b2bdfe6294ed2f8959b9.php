<?php
$start = strtotime($leaveDetails->leave_from);
$end = strtotime($leaveDetails->leave_to);
$days_between = ceil(abs($end - $start) / 86400);
$days = $days_between + 1;
?>
<div class="container-fluid">
    <div class="student-details">
        <div class="row">
            <div class="<?php echo e(isset($apply)? 'col-md-12':'col-md-8'); ?>">
                <div class="student-meta-box">
                    <div class="single-meta">
                        <div class="row">
                            <div class="col-lg-2 col-md-5">
                                <div class="value text-left">
                                    <?php echo app('translator')->get('leave.leave_type'); ?>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-7">
                                <div class="name">
                                    <?php if($leaveDetails->leaveDefine !="" && $leaveDetails->leaveDefine->leaveType !=""): ?>
                                        <?php echo e($leaveDetails->leaveDefine->leaveType->type); ?>

                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-5">
                                <div class="value text-left">
                                    <?php echo app('translator')->get('common.duration'); ?>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-7">
                                <div class="name">
                                    <?php echo e($days == 1? $days.' day': $days.' days'); ?>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="single-meta">
                        <div class="row">
                            <div class="col-lg-2 col-md-5">
                                <div class="value text-left">
                                    <?php echo app('translator')->get('leave.leave_from'); ?>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-7">
                                <div class="name">


                                    <?php echo e($leaveDetails->leave_from != ""? dateConvert($leaveDetails->leave_from):''); ?>


                                </div>
                            </div>
                            <div class="col-lg-2 col-md-5">
                                <div class="value text-left">
                                    <?php echo app('translator')->get('leave.leave_to'); ?>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-7">
                                <div class="name">

                                    <?php echo e($leaveDetails->leave_to != ""? dateConvert($leaveDetails->leave_to):''); ?>



                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="single-meta">
                        <div class="row">
                            <div class="col-lg-2 col-md-5">
                                <div class="value text-left">
                                    <?php echo app('translator')->get('leave.apply_date'); ?>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-7">
                                <div class="name">
                                    <?php echo e($leaveDetails->apply_date != ""? dateConvert($leaveDetails->apply_date):''); ?>



                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="single-meta">
                        <div class="row">
                            <div class="col-lg-2 col-md-2">
                                <div class="value text-left">
                                    <?php echo app('translator')->get('leave.reason'); ?>
                                </div>
                            </div>
                            <div class="col-lg-10 col-md-10">
                                <div class="name">
                                    <?php echo e($leaveDetails->reason); ?>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="single-meta">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="value text-left">
                            <?php echo app('translator')->get('common.attach_file'); ?> 
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="name">
                            <?php if(@$leaveDetails->file != ""): ?>
                             <a href="<?php echo e(url(@$leaveDetails->file)); ?>" download>
                                <?php echo app('translator')->get('common.download'); ?>  <span class="pl ti-download"></span>
                             </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
                    


                    <?php if(!isset($apply)): ?>

                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'update-approve-leave',
                                    'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <input type="hidden" name="id" value="<?php echo e($leaveDetails->id); ?>">
                        <div class="single-meta mt-40">
                            <div class="row">
                                <div class="col-lg-2 col-md-5">
                                    <div class="value text-left">
                                        <?php echo app('translator')->get('leave.leave_status'); ?>
                                    </div>
                                </div>
                                <?php if(Auth::user()->role_id==1): ?>
                                    <div class="col-lg-4 col-md-7">
                                        <div class="d-flex radio-btn-flex flex-column">
                                            <div class="">
                                                <input type="radio" name="approve_status" value="P" class="common-radio"
                                                       id="P" <?php echo e($leaveDetails->approve_status == "P"? 'checked':''); ?>>
                                                <label for="P"><?php echo app('translator')->get('common.pending'); ?></label>
                                            </div>
                                            <div class="">
                                                <input type="radio" name="approve_status" value="A" class="common-radio"
                                                       id="A" <?php echo e($leaveDetails->approve_status == "A"? 'checked':''); ?>>
                                                <label for="A"><?php echo app('translator')->get('common.approve'); ?></label>
                                            </div>
                                            <div class="">
                                                <input type="radio" name="approve_status" value="C" class="common-radio"
                                                       id="C" <?php echo e($leaveDetails->approve_status == "C"? 'checked':''); ?>>
                                                <label for="C"><?php echo app('translator')->get('common.cancel'); ?></label>

                                            </div>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="col-lg-4 col-md-7">
                                        <div class="d-flex radio-btn-flex flex-column">
                                            <div class="">
                                                

                                                <?php if($leaveDetails->approve_status == 'P'): ?>
                                                    <button class="primary-btn small tr-bg"><?php echo app('translator')->get('common.pending'); ?></button>
                                                <?php endif; ?>

                                                <?php if($leaveDetails->approve_status == 'A'): ?>
                                                    <button class="primary-btn small tr-bg"><?php echo app('translator')->get('common.approved'); ?></button>
                                                <?php endif; ?>

                                                <?php if($leaveDetails->approve_status == 'C'): ?>
                                                    <button class="primary-btn small bg-danger text-white border-0"><?php echo app('translator')->get('common.cancelled'); ?></button>
                                                <?php endif; ?>
                                            </div>


                                        </div>
                                    </div>
                                <?php endif; ?>


                            </div>
                        </div>
                        <div class="single-meta mt-30">
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <button class="primary-btn fix-gr-bg submit">
                                        <span class="ti-check"></span>
                                        <?php echo app('translator')->get('leave.save_leave_status'); ?>
                                    </button>
                                </div>

                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    <?php endif; ?>
                </div>
            </div>
            <?php if(!isset($apply)): ?>
                <div class="col-md-4">
                    <!-- Start Student Meta Information -->
                    <div class="student-meta-box">
                        <?php if($leaveDetails->role_id == 2): ?>
                            <h5 class="mt-20 mb-20"><?php echo app('translator')->get('hr.user_details'); ?></h5>
                        <?php else: ?>
                            <h5 class="mt-20 mb-20"><?php echo app('translator')->get('hr.staff_details'); ?></h5>
                        <?php endif; ?>
                        <div class="white-box-modal radius-t-y-0">

                            <div class="single-meta mt-50">
                                <div class="d-flex justify-content-between">
                                    <div class="name">
                                        <?php if($leaveDetails->role_id == 2): ?>
                                            <?php echo app('translator')->get('hr.user_name'); ?>
                                        <?php else: ?>
                                            <?php echo app('translator')->get('hr.staff_name'); ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="value">
                                        <?php if($leaveDetails->role_id == 2): ?>
                                            <?php echo e($leaveDetails->student != ""? $leaveDetails->student->full_name:''); ?>

                                        <?php else: ?>
                                            <?php echo e($leaveDetails->staffs != ""? $leaveDetails->staffs->full_name:''); ?>

                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="single-meta">
                                <div class="d-flex justify-content-between">
                                    <div class="name">
                                        <?php if($leaveDetails->role_id == 2): ?>
                                            <?php echo app('translator')->get('hr.user_no'); ?>
                                        <?php else: ?>
                                            <?php echo app('translator')->get('hr.staff_no'); ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="value">
                                        <?php if($leaveDetails->role_id == 2): ?>
                                            <?php echo e($leaveDetails->student != ""? $leaveDetails->student->id:''); ?>

                                        <?php else: ?>
                                            <?php echo e($leaveDetails->staffs != ""? $leaveDetails->staffs->staff_no:''); ?>

                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="single-meta">
                                <div class="d-flex justify-content-between">
                                    <div class="name">
                                        <?php echo app('translator')->get('hr.date_of_joining'); ?>
                                    </div>
                                    <div class="value">
                                        <?php if($leaveDetails->role_id == 2): ?>
                                            <?php echo e($leaveDetails->student->created_at != ""? dateConvert($leaveDetails->student->created_at):''); ?>

                                        <?php else: ?>
                                            <?php echo e($leaveDetails->staffs->date_of_joining != ""? dateConvert($leaveDetails->staffs->date_of_joining):''); ?>

                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="leave-details">
                            <h5 class="mt-20 mb-20"><?php echo app('translator')->get('leave.leave_details'); ?></h5>
                            <table class="table school-table-style-modal" cellspacing="0" width="100%">

                                <thead>

                                <tr>
                                    <th><?php echo app('translator')->get('common.type'); ?></th>
                                    <th><?php echo app('translator')->get('leave.remaining_days'); ?></th>
                                    <th><?php echo app('translator')->get('leave.extra_taken'); ?></th>
                                    <th><?php echo app('translator')->get('leave.total_days'); ?></th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php $__currentLoopData = $staff_leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff_leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php

                                        $approved_leaves = App\SmLeaveRequest::approvedLeaveModal($staff_leave->id, $leaveDetails->role_id, $leaveDetails->staff_id);
                                            $remaining_days = $staff_leave->days - $approved_leaves;
                                    ?>
                                    <tr>
                                        <td><?php echo e($staff_leave->leaveType->type); ?></td>
                                        <td><?php echo e($remaining_days >= 0? $remaining_days:0); ?></td>

                                        <td><?php echo e($remaining_days < 0? $approved_leaves - $staff_leave->days:0); ?></td>
                                        <td><?php echo e($staff_leave->days); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!-- End Student Meta Information -->

                </div>
            <?php endif; ?>
        </div>

    </div>
</div>


<!-- <div class="col-lg-12 text-center mt-40">
    <div class="mt-40 d-flex justify-content-between">
        <button type="button" class="primary-btn tr-bg" data-dismiss="modal">Cancel</button>

        <button class="primary-btn fix-gr-bg" id="" data-dismiss="modal" type="button">save information</button>
    </div>
</div> -->
<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\parentPanel\viewLeaveDetails.blade.php ENDPATH**/ ?>
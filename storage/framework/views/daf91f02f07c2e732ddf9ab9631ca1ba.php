<?php
    $total_hours = 0;
    $grand_total = 0;
?>
<div class="white-box no-search no-paginate no-table-info mb-2">
    <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="white-box mb-20">
        
        <?php if($record->is_promote == 0 && !$record->unSemesterLabel->unExamAttendance): ?>
            <button class="primary-btn-small-input primary-btn small fix-gr-bg pull-right" type="button"
                data-toggle="modal" data-target="#assignClass"> <span class="ti-plus pr-2"></span>
                <?php echo app('translator')->get('university::un.assign_subject'); ?></button>
        <?php endif; ?>
        

        
        <div class="main-title">
            <h3 class="mb-2"><?php echo e(@$record->unSemesterLabel->title); ?></h3>
        </div>
        <div class="table-responsive" style="margin-bottom: 60px;">

            <table class="table school-table school-table-style res_scrol" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th><?php echo app('translator')->get('exam.subject'); ?> </th>
                        <th><?php echo app('translator')->get('university::un.subject_type'); ?></th>
                        <th><?php echo app('translator')->get('common.teacher'); ?></th>
                        <th><?php echo app('translator')->get('university::un.pass_mark'); ?></th>
                        <th><?php echo app('translator')->get('university::un.hours'); ?></th>
                        <th><?php echo app('translator')->get('university::un.cost_hours'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                        <th><?php echo app('translator')->get('exam.total'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                        <th><?php echo app('translator')->get('common.status'); ?></th>
                        <th><?php echo app('translator')->get('common.action'); ?> </th>
                    </tr>
                </thead>
                <tbody>
    
                    <?php $__currentLoopData = $record->unStudentSemesterWiseSubjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <?php
                                $result = labelWiseStudentResult($record, $subject->un_subject_id);
                                $assignDetail = Modules\University\Entities\UnSubjectAssignStudent::assignDetail($subject->un_subject_id, $subject->un_semester_label_id);
                                $total_hours += $subject->subject->number_of_hours;
                                $grand_total += $assignDetail['amount'];
                            ?>
                            <td> <?php echo e(@$subject->subject->subject_name . '[' . $subject->subject->subject_code . ']'); ?></td>
                            <td> <?php echo e(@$subject->subject->subject_type); ?></td>
                            <td> <?php echo e(@$assignDetail['teacher'] ? $assignDetail['teacher']->teacher->full_name : ''); ?></td>
                            <td> <?php echo e(@$subject->subject->pass_mark ? $subject->subject->pass_mark . '%' : ''); ?></td>
                            <td> <?php echo e(@$subject->subject->number_of_hours); ?></td>
                            <td> <?php echo e($assignDetail['cost_per_hours']); ?> </td>
                            <td> <?php echo e($assignDetail['amount']); ?></td>
                            <td><?php echo e($record->is_promote == 0 ? __('common.ongoing') : __('common.completed')); ?></td>
                            <td>
                                <?php if($record->is_promote == 0 && !$record->unSemesterLabel->unExamAttendance): ?>
                                    <a href="#" class="primary-btn icon-only fix-gr-bg" data-toggle="modal"
                                        data-target="#deleteSubject_<?php echo e($subject->id); ?>">
                                        <span class="ti-trash"></span>
                                    </a>
                                <?php endif; ?>
    
                            </td>
                        </tr>
                        <?php if($record->is_promote == 0 && !$record->unSemesterLabel->unExamAttendance): ?>
                            <div class="modal fade admin-query" id="deleteSubject_<?php echo e($subject->id); ?>">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title"><?php echo app('translator')->get('common.delete'); ?></h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
    
                                        <div class="modal-body">
                                            <div class="text-center">
                                                <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                                            </div>
    
                                            <div class="mt-40 d-flex justify-content-between">
                                                <button type="button" class="primary-btn tr-bg"
                                                    data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
    
                                                <form action="<?php echo e(route('university.subject.assign.delete')); ?>"
                                                    method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="hidden" name="un_subject_id"
                                                        value="<?php echo e($subject->subject->id); ?>">
                                                    <input type="hidden" name="student_id"
                                                        value="<?php echo e($record->student_id); ?>">
                                                    <input type="hidden" name="record_id" value="<?php echo e($record->id); ?>">
                                                    <input type="hidden" name="un_semester_label_id"
                                                        value="<?php echo e($subject->un_semester_label_id); ?>">
    
                                                    <button type="submit"
                                                        class="primary-btn fix-gr-bg"><?php echo app('translator')->get('common.delete'); ?></button>
    
                                                </form>
    
                                            </div>
                                        </div>
    
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    
                    
                    <?php $__currentLoopData = $record->unStudentRequestSubjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reqSubject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <?php
                                $result = labelWiseStudentResult($record, $reqSubject->un_subject_id);
                                $assignDetail = Modules\University\Entities\UnSubjectAssignStudent::assignDetail($reqSubject->un_subject_id);
                            ?>
                            <td> <?php echo e(@$reqSubject->unSubject->subject_name . '[' . $reqSubject->unSubject->subject_code . ']'); ?>

                            </td>
                            <td> <?php echo e($reqSubject->unSubject->subject_type); ?></td>
                            <td> <?php echo e($assignDetail['teacher'] ? $assignDetail['teacher']->teacher->full_name : ''); ?></td>
                            <td> <?php echo e($reqSubject->unSubject->pass_mark ? $reqSubject->unSubject->pass_mark . '%' : ''); ?></td>
                            <td> <?php echo e($reqSubject->unSubject->number_of_hours); ?></td>
                            <td> <?php echo e($assignDetail['cost_per_hours']); ?> </td>
                            <td> <?php echo e($assignDetail['amount']); ?></td>
                            <td><?php echo e($record->is_promote == 0 ? __('common.pending') : __('common.completed')); ?></td>
                            <td>
                                <a href="#" class="primary-btn icon-only fix-gr-bg" data-toggle="modal"
                                    data-target="#deleteReqSubject_<?php echo e($reqSubject->id); ?>">
                                    <span class="ti-trash"></span>
                                </a>
                                <a href="#" class="primary-btn icon-only fix-gr-bg" data-toggle="modal"
                                    data-target="#approveReqSubject_<?php echo e($reqSubject->id); ?>">
                                    <span class="ti-check"></span>
                                </a>
                            </td>
                        </tr>
    
                        <div class="modal fade admin-query" id="approveReqSubject_<?php echo e($reqSubject->id); ?>">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">
                                            <?php echo e(@$reqSubject->unSubject->subject_name . '[' . $reqSubject->unSubject->subject_code . ']'); ?>

                                        </h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
    
                                    <div class="modal-body">
                                        <div class="text-center">
                                            <h4><?php echo app('translator')->get('common.are_you_sure_to_approve'); ?></h4>
                                        </div>
    
                                        <div class="mt-40 d-flex justify-content-between">
                                            <button type="button" class="primary-btn tr-bg"
                                                data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
    
                                            <form action="<?php echo e(route('university.subject.request.approve')); ?>"
                                                method="POST">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="record_id" value="<?php echo e($record->id); ?>">
                                                <input type="hidden" name="student_id" value="<?php echo e($record->student_id); ?>">
                                                <input type="hidden" name="un_semester_label_id"
                                                    value="<?php echo e($record->un_semester_label_id); ?>">
                                                <input type="hidden" name="un_subject_id"
                                                    value="<?php echo e($reqSubject->un_subject_id); ?>">
                                                <button type="submit"
                                                    class="primary-btn fix-gr-bg"><?php echo app('translator')->get('common.approve'); ?></button>
    
                                            </form>
    
                                        </div>
                                    </div>
    
                                </div>
                            </div>
                        </div>
    
    
                        <div class="modal fade admin-query" id="deleteReqSubject_<?php echo e($reqSubject->id); ?>">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title"><?php echo app('translator')->get('common.delete'); ?></h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
    
                                    <div class="modal-body">
                                        <div class="text-center">
                                            <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                                        </div>
    
                                        <div class="mt-40 d-flex justify-content-between">
                                            <button type="button" class="primary-btn tr-bg"
                                                data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
    
                                            <form action="<?php echo e(route('university.subject.request.delete')); ?>"
                                                method="POST">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="req_subject_id"
                                                    value="<?php echo e($reqSubject->id); ?>">
    
                                                <button type="submit"
                                                    class="primary-btn fix-gr-bg"><?php echo app('translator')->get('common.delete'); ?></button>
    
                                            </form>
    
                                        </div>
                                    </div>
    
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    
                </tbody>
    
    
    
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th><?php echo app('translator')->get('university::un.total_hours'); ?></th>
                        <th></th>
                        <th><?php echo e($total_hours); ?></th>
                        <th><?php echo app('translator')->get('fees.grand_total'); ?> (<?php echo e(@$currency); ?>)</th>
                        <th><?php echo e($grand_total); ?></th>
                        <th></th>
                        <th> </th>
    
                    </tr>
                </tfoot>
    
    
            </table>
        </div>


        <div class="modal fade admin-query" id="assignClass">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            <?php echo app('translator')->get('university::un.assign_subject'); ?>
                        </h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">

                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'university.assign-student-subject', 'method' => 'POST'])); ?>



                        <input type="hidden" name="record_id" value="<?php echo e($record->id); ?>">
                        <input type="hidden" name="student_id" value="<?php echo e($record->student_id); ?>">

                        <div class="col-lg-12 mt-25 pl-0">
                            <div class="col-lg-12 " id="selectSectionsDiv" style="margin-top: -25px;">
                                <label for="checkbox" class="mb-2"><?php echo app('translator')->get('university::un.assign_more_subject_for_this_student'); ?></label>
                                <select multiple class="multypol_check_select active position-relative " id="selectSectionss" name="subject[]">
                                    <?php $__currentLoopData = $record->withOutPreSubject; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($subject->id); ?>">
                                            <?php echo e($subject->subject_name .
                                                '[' .
                                                $subject->subject_code .
                                                ']' .
                                                '[' .
                                                $subject->subject_type .
                                                ']' .
                                                '[' .
                                                $subject->number_of_hours .
                                                ']'); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                

                                <?php if($errors->has('subject')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('subject')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-5 text-center">
                            <button type="submit" class="primary-btn fix-gr-bg" id="student_promote_submit">
                                <span class="ti-check"></span>
                                <?php echo app('translator')->get('common.assign'); ?>
                            </button>
                        </div>

                        <?php echo e(Form::close()); ?>


                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php echo $__env->make('backEnd.partials.multi_select_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\studentInformation\inc\subject_list.blade.php ENDPATH**/ ?>
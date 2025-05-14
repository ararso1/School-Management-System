<div class="col-lg-12">
    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'university.request-subject', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'request_subject'])); ?>

    <?php $__currentLoopData = $student_detail->orderByStudentRecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($record->is_promote == 0  && !$record->unSemesterLabel->unExamAttendance): ?>
    <button class="primary-btn-small-input primary-btn small fix-gr-bg pull-right" type="button" data-toggle="modal"
        data-target="#requestSubject"> <span class="ti-plus pr-2"></span> <?php echo app('translator')->get('university::un.request_subject'); ?></button>
    <?php endif; ?>
<div class="main-title">
    <h3 class="mb-2"><?php echo e(@$record->unSemesterLabel->title); ?></h3>
  
</div>

<table id="" class="table school-table-style mb-40" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th><?php echo app('translator')->get('exam.subject'); ?> </th>
            <th><?php echo app('translator')->get('university::un.subject_type'); ?></th>
            <th><?php echo app('translator')->get('common.teacher'); ?></th>
            <th><?php echo app('translator')->get('university::un.pass_mark'); ?></th>
            <th><?php echo app('translator')->get('university::un.hours'); ?></th>
            <th><?php echo app('translator')->get('university::un.cost_hours'); ?></th>
            <th><?php echo app('translator')->get('exam.total'); ?></th>
            <th><?php echo app('translator')->get('common.status'); ?></th>
            <th><?php echo app('translator')->get('common.action'); ?> </th>
        </tr>
    </thead>
    <tbody>

        <?php $__currentLoopData = $record->unStudentSemesterWiseSubjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <?php
                    $result = labelWiseStudentResult($record, $subject->un_subject_id);
                    $assignDetail = Modules\University\Entities\UnSubjectAssignStudent::assignDetail($subject->un_subject_id, $subject->un_semester_label_id)
                ?>
                <td> <?php echo e(@$subject->subject->subject_name . '[' . $subject->subject->subject_code . ']'); ?></td>
                <td> <?php echo e(@$subject->subject->subject_type); ?></td>
                <td> <?php echo e(@$assignDetail['teacher']->teacher->full_name); ?></td>
                <td> <?php echo e(@$subject->subject->pass_mark ? $subject->subject->pass_mark .'%' :''); ?></td>
                <td> <?php echo e(@$subject->subject->number_of_hours); ?></td>
                <td> <?php echo e(currency_format($assignDetail['amount'])); ?> </td>
                <td> <?php echo e(currency_format($subject->subject->number_of_hours * $assignDetail['amount'])); ?></td>
                <td><?php echo e($record->is_promote == 0 ? __('common.ongoing') : __('common.completed')); ?></td>
                <td> 
                     
                  
                </td>
            </tr>
            <?php if($record->is_promote == 0  && !$record->unSemesterLabel->unExamAttendance): ?>
            <div class="modal fade admin-query" id="deleteSubject_<?php echo e($subject->id); ?>" >
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
                                <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>

                                <form action="<?php echo e(route('university.subject.assign.delete')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="un_subject_id" value="<?php echo e($subject->subject->id); ?>">
                                    <input type="hidden" name="student_id" value="<?php echo e($record->student_id); ?>">
                                    <input type="hidden" name="record_id" value="<?php echo e($record->id); ?>">
                                    <input type="hidden" name="un_semester_label_id" value="<?php echo e($subject->un_semester_label_id); ?>">
                                  
                                    <button type="submit" class="primary-btn fix-gr-bg"><?php echo app('translator')->get('common.delete'); ?></button>

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
                    $assignDetail = Modules\University\Entities\UnSubjectAssignStudent::assignDetail($reqSubject->un_subject_id)
                ?>
                <td> <?php echo e(@$reqSubject->unSubject->subject_name . '[' . $reqSubject->unSubject->subject_code . ']'); ?></td>
                <td> <?php echo e($reqSubject->unSubject->subject_type); ?></td>
                <td> <?php echo e($assignDetail['teacher'] ? $assignDetail['teacher']->teacher->full_name : ''); ?></td>
                <td> <?php echo e($reqSubject->unSubject->pass_mark ? $reqSubject->unSubject->pass_mark .'%' :''); ?></td>
                <td> <?php echo e($reqSubject->unSubject->number_of_hours); ?></td>
                <td> <?php echo e(currency_format($assignDetail['amount'])); ?> </td>
                <td> <?php echo e(currency_format($reqSubject->unSubject->number_of_hours * $assignDetail['amount'])); ?></td>
                <td><?php echo e($record->is_promote == 0 ? __('common.pending') : __('common.completed')); ?></td>
                <td>                    
                    <a href="#" class="primary-btn icon-only fix-gr-bg" data-toggle="modal" data-target="#deleteReqSubject_<?php echo e($reqSubject->id); ?>">
                        <span class="ti-trash"></span>
                    </a>  
                </td>
            </tr>
          
            <div class="modal fade admin-query" id="deleteReqSubject_<?php echo e($reqSubject->id); ?>" >
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
                                <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>

                                <form action="<?php echo e(route('university.subject.request.delete')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="req_subject_id" value="<?php echo e($reqSubject->id); ?>">
                                  
                                    <button type="submit" class="primary-btn fix-gr-bg"><?php echo app('translator')->get('common.delete'); ?></button>

                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
          
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>

</table>


<?php if($record->is_promote == 0  && !$record->unSemesterLabel->unExamAttendance): ?>
<div class="modal fade admin-query" id="requestSubject">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <?php echo app('translator')->get('university::un.request_subject'); ?>
                </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
               
                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'university.request-subject', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'request_subject'])); ?>



                <input type="hidden" name="record_id" value="<?php echo e($record->id); ?>">
                <input type="hidden" name="student_id" value="<?php echo e($record->student_id); ?>">
                <input type="hidden" name="request_label" id="" value="<?php echo e($record->un_semester_label_id); ?>">
               
                <div class="col-lg-12 mt-25 pl-0">
                    <div class="col-lg-12 " id="selectSectionsDiv" style="margin-top: -25px;">
                        <label for="checkbox"
                            class="mb-2"><?php echo app('translator')->get('university::un.assign_more_subject_for_this_student'); ?></label>
                        <select multiple id="selectSectionss" name="subject[]" class="multypol_check_select active position-relative">
                            <?php $__currentLoopData = $record->withOutPreSubject; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($subject->id); ?>" >
                                <?php echo e($subject->subject_name 
                                . '[' . $subject->subject_code . ']' 
                                .'['. $subject->subject_type.']' 
                                .'['. $subject->number_of_hours.']'); ?> </option>
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
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php echo e(Form::close()); ?>

</div>
<?php echo $__env->make('backEnd.partials.multi_select_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\studentPanel\request_to_subject.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title'); ?> 
<?php echo app('translator')->get('student.subject_wise_attendance'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20 up_breadcrumb">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('student.subject_wise_attendance'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('student.student_information'); ?></a>
                <a href="#"><?php echo app('translator')->get('student.subject_wise_attendance'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="main-title ">
                                    <h3 class="mb-15"><?php echo app('translator')->get('common.select_criteria'); ?> </h3>
                                </div>
                            </div>
                            
                        </div>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'route' => 'subject-attendance-search', 'method' => 'GET', 'id' => 'search_studentA'])); ?>

                            <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">

                            <?php if(moduleStatusCheck('University')): ?>
                                <?php if ($__env->exists('university::common.session_faculty_depart_academic_semester_level',['required'=>['USN','UD', 'UA', 'US','USL', 'USEC', 'USUB']])) echo $__env->make('university::common.session_faculty_depart_academic_semester_level',['required'=>['USN','UD', 'UA', 'US','USL', 'USEC', 'USUB']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <div class="col-lg-3 mt-25">
                                    <div class="row no-gutters input-right-icon">
                                        <div class="col">
                                            <div class="primary_input">
                                                <input class="primary_input_field  primary_input_field date form-control form-control<?php echo e($errors->has('attendance_date') ? ' is-invalid' : ''); ?> <?php echo e(isset($date)? 'read-only-input': ''); ?>" id="startDate" type="text"
                                                    name="attendance_date" autocomplete="off" value="<?php echo e(isset($date)? $date: date('m/d/Y')); ?>">
                                                <label for="startDate"><?php echo app('translator')->get('student.attendance_date'); ?><span class="text-danger"> *</span></label>
                                                
                                                
                                                <?php if($errors->has('attendance_date')): ?>
                                                <span class="text-danger" >
                                                    <?php echo e($errors->first('attendance_date')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <button class="btn-date" type="button">
                                            <label class="m-0 p-0" for="startDate">
                                                <i class="ti-calendar" id="admission-date-icon"></i>
                                            </label>
                                        </button>
                                    </div>
                                    
                                </div>
                            <?php else: ?>   
                            <?php echo $__env->make('backEnd.common.search_criteria', [
                            'div'=>'col-lg-3',
                            'subject'=>true,
                            'required'=>['class', 'section', 'subject'],
                            'visiable'=>['class', 'section', 'subject'],    
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                           
                            <div class="col-lg-3 mt-30-md md_mb_20">
                               
                                <div class="primary_input">
                                    <label for="startDate"><?php echo app('translator')->get('student.attendance_date'); ?><span class="text-danger"> *</span></label>
                                    <div class="primary_datepicker_input">
                                        <div class="no-gutters input-right-icon">
                                            <div class="col">
                                                <div class="">
                                                    <input class="primary_input_field  primary_input_field date form-control<?php echo e($errors->has('attendance_date') ? ' is-invalid' : ''); ?>" id="attendance_date" type="text"
                                                    name="attendance_date" autocomplete="off" value="<?php echo e(isset($date)? $date: date('m/d/Y')); ?>">
                                                </div>
                                            </div>
                                            <button class="btn-date" data-id="#attendance_date" type="button">
                                                <label class="m-0 p-0" for="attendance_date">
                                                    <i class="ti-calendar" id="start-date-icon"></i>
                                                </label>
                                            </button>
                                        </div>
                                    </div>
                                    <span class="text-danger"><?php echo e($errors->first('attendance_date')); ?></span>
                                </div>
                            </div>
                            <?php endif; ?>
                            <div class="col-lg-12 mt-20 text-right">
                                <button type="submit" class="primary-btn small fix-gr-bg">
                                    <span class="ti-search pr-2"></span>
                                    <?php echo app('translator')->get('common.search'); ?>
                                </button>
                            </div>
                            </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
<?php if(isset($already_assigned_students)): ?>
 <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>


            <div class="row mt-40">
                <div class="col-lg-12">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 no-gutters">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php echo app('translator')->get('student.student_attendance'); ?> | <small><?php echo app('translator')->get('common.class'); ?>: <?php echo e($search_info['class_name']); ?>, <?php echo app('translator')->get('common.section'); ?>: <?php echo e($search_info['section_name']); ?>, <?php echo app('translator')->get('common.date'); ?>: <?php echo e(dateConvert($search_info['date'])); ?></small></h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 no-gutters">
                                <?php if($attendance_type != "" && $attendance_type == "H"): ?>
                                <div class="alert alert-warning"><?php echo app('translator')->get('student.attendance_already_submitted_as_holiday'); ?></div>
                                <?php elseif($attendance_type != "" && $attendance_type != "H"): ?>
                                <div class="alert alert-success"><?php echo app('translator')->get('student.attendance_already_submitted'); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6  col-md-6 no-gutters text-md-left mark-holiday">
                                <button type="button" class="primary-btn fix-gr-bg mb-20">
                                <input type="checkbox" id="mark_holiday" class="common-checkbox form-control" name="mark_holiday" value="1" <?php echo e($attendance_type == "H"? 'checked':''); ?>>
                                <label for="mark_holiday"><?php echo app('translator')->get('student.mark_holiday'); ?></label>
                            </button>
                            </div>
                            <?php if(userPermission(534)): ?>
                            <div class="col-lg-6 col-md-6 text-md-right">
                                <button type="submit" class="primary-btn fix-gr-bg mb-20 submit" onclick="javascript: form.action='<?php echo e(route('student-attendance-store')); ?>'">
                                <span class="ti-save pr"></span>
                                    <?php echo app('translator')->get('student.save_attendance'); ?>
                                </button>
                            </div>
                            <?php endif; ?>
                        </div>
    
                        <input type="hidden" name="date" value="<?php echo e(isset($date)? $date: ''); ?>">
                                <?php echo app('translator')->get('student.mark_as_holiday'); ?>
    
                        <div class="row">
                            <div class="col-lg-12">
                                <table id="table_id_table" class="table" cellspacing="0" width="100%">
                                    <thead>
                                        <?php if(session()->has('message-danger') != ""): ?>
                                        <tr>
                                            <td colspan="9">
                                                <?php if(session()->has('message-danger')): ?>
                                                <div class="alert alert-danger">
                                                    <?php echo e(session()->get('message-danger')); ?>

                                                </div>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                        <tr>
                                            <th width="5%"><?php echo app('translator')->get('common.sl'); ?></th>
                                            <th width="10%"><?php echo app('translator')->get('student.admission_no'); ?></th>
                                            <th width="15%"><?php echo app('translator')->get('student.student_name'); ?></th>
                                            <th width="12%"><?php echo app('translator')->get('student.roll_number'); ?></th>
                                            <th width="35%"><?php echo app('translator')->get('student.attendance'); ?></th>
                                            <th width="20%"><?php echo app('translator')->get('common.note'); ?></th>
                                        </tr>
                                    </thead>
    
                                    <tbody>
                                        <?php $count=1; ?>
                                        <?php $__currentLoopData = $already_assigned_students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $already_assigned_student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($already_assigned_student->studentInfo->admission_no); ?><input type="hidden" name="id[]" value="<?php echo e($already_assigned_student->studentInfo->id); ?>"></td>
                                            <td>
                                                <?php if(!empty($already_assigned_student->studentInfo)): ?>
                                                <?php echo e($already_assigned_student->studentInfo->first_name.' '.$already_assigned_student->studentInfo->last_name); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($already_assigned_student->studentInfo!=""?$already_assigned_student->studentInfo->roll_no:""); ?></td>
                                            <td>
                                                <div class="d-flex radio-btn-flex">
                                                    <div class="mr-20">
                                                        <input type="radio" name="attendance[<?php echo e($already_assigned_student->studentInfo->id); ?>]" id="attendanceP<?php echo e($already_assigned_student->studentInfo->id); ?>" value="P" class="common-radio attendanceP" <?php echo e($already_assigned_student->attendance_type == "P"? 'checked':''); ?>>
                                                        <label for="attendanceP<?php echo e($already_assigned_student->studentInfo->id); ?>"><?php echo app('translator')->get('student.present'); ?></label>
                                                    </div>
                                                    <div class="mr-20">
                                                        <input type="radio" name="attendance[<?php echo e($already_assigned_student->studentInfo->id); ?>]" id="attendanceL<?php echo e($already_assigned_student->studentInfo->id); ?>" value="L" class="common-radio" <?php echo e($already_assigned_student->attendance_type == "L"? 'checked':''); ?>>
                                                        <label for="attendanceL<?php echo e($already_assigned_student->studentInfo->id); ?>"><?php echo app('translator')->get('student.late'); ?></label>
                                                    </div>
                                                    <div class="mr-20">
                                                        <input type="radio" name="attendance[<?php echo e($already_assigned_student->studentInfo->id); ?>]" id="attendanceA<?php echo e($already_assigned_student->studentInfo->id); ?>" value="A" class="common-radio" <?php echo e($already_assigned_student->attendance_type == "A"? 'checked':''); ?>>
                                                        <label for="attendanceA<?php echo e($already_assigned_student->studentInfo->id); ?>"><?php echo app('translator')->get('student.absent'); ?></label>
                                                    </div>
                                                    <div>
                                                        <input type="radio" name="attendance[<?php echo e($already_assigned_student->studentInfo->id); ?>]" id="attendanceH<?php echo e($already_assigned_student->studentInfo->id); ?>" value="F" class="common-radio" <?php echo e($already_assigned_student->attendance_type == "F"? 'checked':''); ?>>
                                                        <label for="attendanceH<?php echo e($already_assigned_student->studentInfo->id); ?>"><?php echo app('translator')->get('student.half_day'); ?></label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="primary_input">
                                                    <textarea class="primary_input_field form-control" cols="0" rows="2" name="note[<?php echo e($already_assigned_student->studentInfo->id); ?>]" id=""><?php echo e($already_assigned_student->notes); ?></textarea>
                                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('student.add_note_here'); ?></label>
                                                    
                                                    <span class="text-danger">
                                                        <strong><?php echo app('translator')->get('common.error'); ?></strong>
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php $__currentLoopData = $new_students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($student->admission_no); ?><input type="hidden" name="id[]" value="<?php echo e($student->id); ?>"></td>
                                            <td><?php echo e($student->first_name.' '.$student->last_name); ?></td>
                                            <td><?php echo e($student->roll_no); ?></td>
                                            <td>
                                                <div class="d-flex radio-btn-flex">
                                                    <div class="mr-20">
                                                        <input type="radio" name="attendance[<?php echo e($student->id); ?>]" id="attendanceP<?php echo e($student->id); ?>" value="P" class="common-radio attendanceP" checked>
                                                        <label for="attendanceP<?php echo e($student->id); ?>"><?php echo app('translator')->get('student.present'); ?></label>
                                                    </div>
                                                    <div class="mr-20">
                                                        <input type="radio" name="attendance[<?php echo e($student->id); ?>]" id="attendanceL<?php echo e($student->id); ?>" value="L" class="common-radio">
                                                        <label for="attendanceL<?php echo e($student->id); ?>"><?php echo app('translator')->get('student.late'); ?></label>
                                                    </div>
                                                    <div class="mr-20">
                                                        <input type="radio" name="attendance[<?php echo e($student->id); ?>]" id="attendanceA<?php echo e($student->id); ?>" value="A" class="common-radio">
                                                        <label for="attendanceA<?php echo e($student->id); ?>"><?php echo app('translator')->get('student.absent'); ?></label>
                                                    </div>
                                                    <div>
                                                        <input type="radio" name="attendance[<?php echo e($student->id); ?>]" id="attendanceH<?php echo e($student->id); ?>" value="F" class="common-radio">
                                                        <label for="attendanceH<?php echo e($student->id); ?>"><?php echo app('translator')->get('student.half_day'); ?></label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="primary_input">
                                                    <textarea class="primary_input_field form-control" cols="0" rows="2" name="note[<?php echo e($student->id); ?>]" id=""></textarea>
                                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('student.add_note_here'); ?></label>
                                                    
                                                    <span class="text-danger">
                                                        <strong><?php echo app('translator')->get('common.error'); ?></strong>
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
<?php endif; ?>

    </div>
</section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/backEnd/studentInformation/subject_attendance.blade.php ENDPATH**/ ?>
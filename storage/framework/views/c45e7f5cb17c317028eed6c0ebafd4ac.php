<?php $__env->startSection('title'); ?> 
<?php echo app('translator')->get('student.subject_wise_attendance'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
    <style>
        .school-table-style td {
            vertical-align: middle;
            min-width: 150px;
        }
    </style>
<?php $__env->stopPush(); ?>
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
                            <div class="main-title">
                                <h3 class="mb-15"><?php echo app('translator')->get('common.select_criteria'); ?> </h3>
                            </div>
                        </div>
                    </div>
                    <?php echo e(Form::open(['class' => 'form-horizontal','route' => 'subject-attendance-search', 'method' => 'GET', 'enctype' => 'multipart/form-data', 'id' => 'search_studentA'])); ?>

                        <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>"> 
                        <?php if(moduleStatusCheck('University')): ?>  
                            <?php if ($__env->exists('university::common.session_faculty_depart_academic_semester_level',['required'=>['USN','UD', 'UA', 'US','USL','USUB']])) echo $__env->make('university::common.session_faculty_depart_academic_semester_level',['required'=>['USN','UD', 'UA', 'US','USL','USUB']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="col-lg-3 mt-25">
                                <div class="row no-gutters input-right-icon">
                                    <div class="col">
                                        <div class="primary_input">
                                            <input class="primary_input_field  primary_input_field date form-control form-control<?php echo e($errors->has('attendance_date') ? ' is-invalid' : ''); ?> <?php echo e(isset($date)? 'read-only-input': ''); ?>" id="startDate" type="text"
                                                name="attendance_date" autocomplete="off" value="<?php echo e(isset($date)? $date: date('m/d/Y')); ?>">
                            
                                            <?php if($errors->has('attendance_date')): ?>
                                            <span class="text-danger custom-error-message" role="alert">
                                                <?php echo e($errors->first('attendance_date')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <button class="" type="button">
                                        <i class="ti-calendar" id="start-date-icon"></i>
                                    </button>
                                </div>
                            </div>
                        <?php else: ?> 
                        <div class="col-lg-3 mt-30-md">
                            <select class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>" id="select_class" name="class">
                                <option data-display="<?php echo app('translator')->get('common.select_class'); ?>*" value=""><?php echo app('translator')->get('common.select_class'); ?> *</option>
                                <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($class->id); ?>"  <?php echo e(isset($input['class'])? ($input['class'] == $class->id? 'selected':''):''); ?>><?php echo e($class->class_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('class')): ?>
                            <span class="text-danger invalid-select" role="alert">
                                <?php echo e($errors->first('class')); ?>

                            </span>
                            <?php endif; ?>
                        </div> 
                        <div class="col-lg-3 mt-30-md" id="select_section_div">
                            <select class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?> select_section" id="select_section" name="section">
                                <option data-display="<?php echo app('translator')->get('common.select_section'); ?> *" value=""><?php echo app('translator')->get('common.select_section'); ?> *</option>
                                <?php if(isset($sections)): ?>
                                <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($section->section_id); ?>"  <?php echo e(isset($input['section'])? ($input['section'] == $section->section_id? 'selected':''):''); ?>><?php echo e($section->sectionName->section_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
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
                        <div class="col-lg-3 mt-30-md" id="select_subject_div">
                            <select class="primary_select form-control<?php echo e($errors->has('subject') ? ' is-invalid' : ''); ?> select_subject" id="select_subject" name="subject">
                                <option data-display="<?php echo e(__('student.select_subject')); ?> *" value=""><?php echo e(__('student.select_subject')); ?> *</option>
                                <?php if(isset($subjects)): ?>
                                    <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                        $type = $subject->subject->subject_type == 'T' ? 'Theory' : 'Practical';
                                        ?>
                                        <option value="<?php echo e($subject->subject_id); ?>"  <?php echo e(isset($input['subject'])? ($input['subject'] == $subject->subject_id? 'selected':''):''); ?>><?php echo e($subject->subject->subject_name); ?> (<?php echo e($type); ?>)</option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                            <div class="pull-right loader loader_style" id="select_subject_loader">
                                <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                            </div>
                            <?php if($errors->has('subject')): ?>
                            <span class="text-danger invalid-select" role="alert">
                                <?php echo e($errors->first('subject')); ?>

                            </span>
                            <?php endif; ?>
                        </div> 
                        <div class="col-lg-3 mt-30-md">
                            <div class="row no-gutters input-right-icon">
                                <div class="col">
                                    <div class="primary_input">
                                        <input class="primary_input_field  primary_input_field date form-control form-control<?php echo e($errors->has('attendance_date') ? ' is-invalid' : ''); ?> <?php echo e(isset($date)? 'read-only-input': ''); ?>" id="startDate" type="text"
                                            name="attendance_date" autocomplete="off" value="<?php echo e(isset($date)? $date: date('m/d/Y')); ?>">
                                        
                                        
                                        <?php if($errors->has('attendance_date')): ?>
                                        <span class="text-danger" >
                                            <?php echo e($errors->first('attendance_date')); ?>

                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button class="" type="button">
                                        <i class="ti-calendar" id="start-date-icon"></i>
                                    </button>
                                </div>
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
<?php if(isset($students)): ?>
        <div class="row mt-40">
            <div class="col-lg-12 ">
                <div class=" white-box mb-40">
                    <div class="row"> 
                        <div class="col-lg-12">
                            <div class="main-title">
                                <h3 class="mb-30 text-center"><?php echo app('translator')->get('student.subject_wise_attendance'); ?> </h3>
                            </div>
                        </div>
                        <?php if(moduleStatusCheck('University')): ?>                        
                            <div class="col-lg-3">
                                <strong> <?php echo app('translator')->get('university::un.faculty_department'); ?>: </strong> 
                                <?php echo e(isset($unFaculty) ? $unFaculty->name .'('. (isset($unDepartment) ? $unDepartment->name:'').')':''); ?>

                            </div>
                            <div class="col-lg-3">
                                <strong>  <?php echo app('translator')->get('university::un.semester(label)'); ?>: </strong> 
                                <?php echo e(isset($unSemester) ? $unSemester->name .'('. (isset($unSemesterLabel) ? $unSemesterLabel->name : '') .')' :''); ?>

                            </div>
                            <div class="col-lg-3">
                                <strong> <?php echo app('translator')->get('common.subject'); ?>: </strong> 
                                <?php echo e(isset($unSubject) ? $unSubject->subject_name :''); ?>

                            </div>
                        <?php else: ?>  
                            <div class="col-lg-3">
                                <strong> <?php echo app('translator')->get('common.class'); ?>: </strong> <?php echo e($search_info['class_name']); ?>

                            </div>
                            <div class="col-lg-3">
                                <strong> <?php echo app('translator')->get('common.section'); ?>: </strong> <?php echo e($search_info['section_name']); ?>

                            </div>
                            <div class="col-lg-3">
                                <strong> <?php echo app('translator')->get('common.subject'); ?>: </strong> <?php echo e($search_info['subject_name']); ?>

                            </div>
                        <?php endif; ?>
                        <div class="col-lg-3">
                            <strong> <?php echo app('translator')->get('common.date'); ?>: </strong> <?php echo e(dateConvert($input['attendance_date'])); ?>

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
                
                    <div class="row mb-20">
                        <div class="col-lg-6  col-md-6 no-gutters text-md-left mark-holiday ">
                            <?php if($attendance_type != "H"): ?>
                                <form action="<?php echo e(route('student-subject-holiday-store')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="purpose" value="mark">
                                    <input type="hidden" name="class_id" value="<?php echo e($input['class']); ?>">
                                    <input type="hidden" name="section_id" value="<?php echo e($input['section']); ?>">
                                    <input type="hidden" name="subject_id" value="<?php echo e($input['subject']); ?>">
                                    <?php if(moduleStatusCheck('University')): ?>
                                        <input type="hidden" name="un_session_id" value="<?php echo e(isset($unSession) ? $unSession->id:''); ?>">
                                        <input type="hidden" name="un_faculty_id" value="<?php echo e(isset($unFaculty) ? $unFaculty->id:''); ?>">
                                        <input type="hidden" name="un_department_id" value="<?php echo e(isset($unDepartment) ? $unDepartment->id:''); ?>">
                                        <input type="hidden" name="un_academic_id" value="<?php echo e(isset($unAcademic) ? $unAcademic->id:''); ?>">
                                        <input type="hidden" name="un_semester_id" value="<?php echo e(isset($unSemester) ? $unSemester->id:''); ?>">
                                        <input type="hidden" name="un_semester_label_id" value="<?php echo e(isset($unSemesterLabel) ? $unSemesterLabel->id:''); ?>">
                                        <input type="hidden" name="un_subject_id" value="<?php echo e(isset($unSubject) ? $unSubject->id :''); ?>">
                                    <?php endif; ?>
                                    <input type="hidden" name="attendance_date" value="<?php echo e($input['attendance_date']); ?>">
                                    <button type="submit" class="primary-btn fix-gr-bg mb-20">
                                        <?php echo app('translator')->get('student.mark_holiday'); ?>
                                    </button>
                                </form>
                            <?php else: ?>
                                <form action="<?php echo e(route('student-subject-holiday-store')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                        <input type="hidden" name="purpose" value="unmark">
                                        <input type="hidden" name="class_id" value="<?php echo e($input['class']); ?>">
                                        <input type="hidden" name="section_id" value="<?php echo e($input['section']); ?>">
                                        <input type="hidden" name="subject_id" value="<?php echo e($input['subject']); ?>">
                                    <?php if(moduleStatusCheck('University')): ?>
                                        <input type="hidden" name="un_session_id" value="<?php echo e(isset($unSession) ? $unSession->id:''); ?>">
                                        <input type="hidden" name="un_faculty_id" value="<?php echo e(isset($unFaculty) ? $unFaculty->id:''); ?>">
                                        <input type="hidden" name="un_department_id" value="<?php echo e(isset($unDepartment) ? $unDepartment->id:''); ?>">
                                        <input type="hidden" name="un_academic_id" value="<?php echo e(isset($unAcademic) ? $unAcademic->id:''); ?>">
                                        <input type="hidden" name="un_semester_id" value="<?php echo e(isset($unSemester) ? $unSemester->id:''); ?>">
                                        <input type="hidden" name="un_semester_label_id" value="<?php echo e(isset($unSemesterLabel) ? $unSemesterLabel->id:''); ?>">
                                        <input type="hidden" name="un_subject_id" value="<?php echo e(isset($unSubject) ? $unSubject->id :''); ?>">
                                    <?php endif; ?>
                                    <input type="hidden" name="attendance_date" value="<?php echo e($input['attendance_date']); ?>">
                                    <button type="submit" class="primary-btn fix-gr-bg mb-20">
                                        <?php echo app('translator')->get('student.unmark_holiday'); ?>
                                    </button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div> 
                

                <?php echo e(Form::open(['class' => 'form-horizontal', 'route' => 'subject-attendance-store', 'method' => 'POST'])); ?>

                    <input class="subject_class" type="hidden" name="class" value="<?php echo e($input['class']); ?>">
                    <input class="subject_section" type="hidden" name="section" value="<?php echo e($input['section']); ?>">
                    <input class="subject" type="hidden" name="subject" value="<?php echo e($input['subject']); ?>">
                    <input class="subject_attendance_date" type="hidden" name="attendance_date" value="<?php echo e($input['attendance_date']); ?>">
                    <input type="hidden" name="un_semester_label_id" value="<?php echo e(isset($unSemesterLabel) ? $unSemesterLabel->id:''); ?>">
                    <input type="hidden" name="un_subject_id" value="<?php echo e(isset($unSubject) ? $unSubject->id :''); ?>">
                    <input type="hidden" name="date" value="<?php echo e(isset($input['attendance_date'])? $input['attendance_date']: ''); ?>">
                    <div class="white-box">
                        <div class="row ">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table school-table-style" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th><?php echo app('translator')->get('common.sl'); ?></th>
                                                <th><?php echo app('translator')->get('student.admission_no'); ?></th>
                                                <th><?php echo app('translator')->get('student.student_name'); ?></th>
                                                <th><?php echo app('translator')->get('student.roll_number'); ?></th>
                                                <th><?php echo app('translator')->get('student.attendance'); ?></th>
                                                <th><?php echo app('translator')->get('common.note'); ?></th>
                                            </tr>
                                        </thead>
        
                                        <tbody>
                                            <?php $count=1; ?>
                                         
                                            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            
                                                <tr>
                                                    <td><?php echo e($count++); ?> </td>
                                                    <td><?php echo e($student->studentDetail->admission_no); ?>

                                                        <input type="hidden" name="attendance[<?php echo e($student->id); ?>]" value="<?php echo e($student->id); ?>">
                                                        <input type="hidden" name="attendance[<?php echo e($student->id); ?>][student]" value="<?php echo e($student->student_id); ?>">
                                                        <input type="hidden" name="attendance[<?php echo e($student->id); ?>][class]" value="<?php echo e($student->class_id); ?>">
                                                        <input type="hidden" name="attendance[<?php echo e($student->id); ?>][section]" value="<?php echo e($student->section_id); ?>">
        
                                                        <?php if(moduleStatusCheck('University')): ?>
                                                            <input type="hidden" name="attendance[<?php echo e($student->id); ?>][un_session_id]" value="<?php echo e($student->un_session_id); ?>">
                                                            <input type="hidden" name="attendance[<?php echo e($student->id); ?>][un_faculty_id]" value="<?php echo e($student->un_faculty_id); ?>">
                                                            <input type="hidden" name="attendance[<?php echo e($student->id); ?>][un_department_id]" value="<?php echo e($student->un_department_id); ?>">
                                                            <input type="hidden" name="attendance[<?php echo e($student->id); ?>][un_academic_id]" value="<?php echo e($student->un_academic_id); ?>">
                                                            <input type="hidden" name="attendance[<?php echo e($student->id); ?>][un_semester_id]" value="<?php echo e($student->un_semester_id); ?>">
                                                            <input type="hidden" name="attendance[<?php echo e($student->id); ?>][un_semester_label_id]" value="<?php echo e($student->un_semester_label_id); ?>">
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><?php echo e($student->studentDetail->first_name.' '.$student->studentDetail->last_name); ?></td>
                                                    <td><?php echo e($student->roll_no); ?></td>
                                                    <td>
                                                        <div class="d-flex radio-btn-flex">
                                                            <div class="mr-20">
                                                                <input type="radio" name="attendance[<?php echo e($student->id); ?>][attendance_type]" id="attendanceP<?php echo e($student->id); ?>" value="P" class="common-radio attendanceP subject_attendance_type" <?php echo e($student->studentDetail->DateSubjectWiseAttendances !=null ? ($student->studentDetail->DateSubjectWiseAttendances->attendance_type == "P" ? 'checked' :'') : 'checked'); ?>>
                                                                <label for="attendanceP<?php echo e($student->id); ?>"><?php echo app('translator')->get('student.present'); ?></label>
                                                            </div>
                                                            <div class="mr-20">
                                                                <input type="radio" name="attendance[<?php echo e($student->id); ?>][attendance_type]" id="attendanceL<?php echo e($student->id); ?>" value="L" class="common-radio subject_attendance_type" <?php echo e($student->studentDetail->DateSubjectWiseAttendances !=null ? ($student->studentDetail->DateSubjectWiseAttendances->attendance_type == "L" ? 'checked' :''):''); ?>>
                                                                <label for="attendanceL<?php echo e($student->id); ?>"><?php echo app('translator')->get('student.late'); ?></label>
                                                            </div>
                                                            <div class="mr-20">
                                                                <input type="radio" name="attendance[<?php echo e($student->id); ?>][attendance_type]" id="attendanceA<?php echo e($student->id); ?>" value="A" class="common-radio subject_attendance_type" <?php echo e($student->studentDetail->DateSubjectWiseAttendances !=null ? ($student->studentDetail->DateSubjectWiseAttendances->attendance_type == "A" ? 'checked' :''):''); ?>>
                                                                <label for="attendanceA<?php echo e($student->id); ?>"><?php echo app('translator')->get('student.absent'); ?></label>
                                                            </div>
                                                            <div>
                                                                <input type="radio" name="attendance[<?php echo e($student->id); ?>][attendance_type]" id="attendanceH<?php echo e($student->id); ?>" value="F" class="common-radio subject_attendance_type" <?php echo e($student->studentDetail->DateSubjectWiseAttendances !=null ? ($student->studentDetail->DateSubjectWiseAttendances->attendance_type == "F" ? 'checked' :'') : ''); ?>>
                                                                <label for="attendanceH<?php echo e($student->id); ?>"><?php echo app('translator')->get('student.half_day'); ?></label>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="primary_input">
                                                            <textarea class="primary_input_field form-control note_<?php echo e($student->id); ?>" cols="0" rows="2" name="attendance[<?php echo e($student->id); ?>][note]"><?php echo e($student->studentDetail->DateSubjectWiseAttendances !=null ? $student->studentDetail->DateSubjectWiseAttendances->notes :''); ?></textarea>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-center">
                                                <button type="submit" class="primary-btn mr-40 fix-gr-bg nowrap submit">
                                                      <?php echo app('translator')->get('student.attendance'); ?>
                                                </button>
                                                </td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                    <?php echo e(Form::close()); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php endif; ?>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/backEnd/studentInformation/subject_attendance_list.blade.php ENDPATH**/ ?>
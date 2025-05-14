<?php $__env->startSection('title'); ?> 
<?php echo app('translator')->get('exam.final_mark_sheet'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20 up_breadcrumb">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('exam.final_mark_sheet'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('exam.examination'); ?></a>
                    <a href="#"><?php echo app('translator')->get('exam.final_mark_sheet'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12 d-flex align-items-center justify-content-between flex-wrap">
                    <div class="main-title m-0">
                        <h3 class="mb-30"><?php echo app('translator')->get('common.select_criteria'); ?> </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'finalMarkSheetSearch', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_studentA'])); ?>

                        <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            <?php if(moduleStatusCheck('University')): ?>
                                <?php if ($__env->exists('university::common.session_faculty_depart_academic_semester_level',['mt'=>'mt-30','hide'=>['USUB'], 'required'=>['USEC']])) echo $__env->make('university::common.session_faculty_depart_academic_semester_level',['mt'=>'mt-30','hide'=>['USUB'], 'required'=>['USEC']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                               
                            <?php else: ?>
                            <div class="col-lg-6 col-md-6 ">
                                <select class="primary_select  form-control<?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>"
                                        id="select_class" name="class">
                                    <option data-display="<?php echo app('translator')->get('student.select_class'); ?> *"
                                            value=""><?php echo app('translator')->get('student.select_class'); ?> *
                                    </option>
                                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($class->id); ?>" <?php echo e(isset($class_id)? ($class_id == $class->id? 'selected': ''):''); ?>><?php echo e($class->class_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('class')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('class')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-6 col-md-6" id="select_section_div">
                                <select class="primary_select  form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?>"
                                        id="select_section" name="section">
                                    <option data-display="<?php echo app('translator')->get('student.select_section'); ?> *"
                                            value=""><?php echo app('translator')->get('student.select_section'); ?> *
                                    </option>
                                    <?php if(isset($section_id)): ?>
                                        <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($section->section_id); ?>" <?php echo e(isset($section_id)? ($section_id == $section->section_id? 'selected': ''):''); ?>><?php echo e($section->sectionName->section_name); ?></option>
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
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12 no-gutters">
                                <div class="main-title">
                                    <?php if(isset($search_info)): ?>
                                    <h3 class="mb-30"><?php echo app('translator')->get('student.student_attendance'); ?> | <small>
                                        <?php if(moduleStatusCheck('University')): ?>
                                        <?php echo app('translator')->get('university::un.faculty_department'); ?>
                                            : <?php echo e(isset($unFaculty) ? $unFaculty->name .'('. (isset($unDepartment) ? $unDepartment->name:'').')':''); ?>, <?php echo app('translator')->get('university::un.semester(label)'); ?>
                                            : <?php echo e(isset($unSemester) ? $unSemester->name .'('. (isset($unSemesterLabel) ? $unSemesterLabel->name : '') .')' :''); ?>, <?php echo app('translator')->get('common.date'); ?>
                                        <?php else: ?>
                                        <?php echo app('translator')->get('common.class'); ?>
                                            : <?php echo e($search_info['class_name']); ?>, <?php echo app('translator')->get('common.section'); ?>
                                            : <?php echo e($search_info['section_name']); ?>, <?php echo app('translator')->get('common.date'); ?>
                                        <?php endif; ?>
                                            : <?php echo e(dateConvert($search_info['date'])); ?></small></h3>
                                    <?php endif; ?>
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
                                    <form action="<?php echo e(route('student-attendance-holiday')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="purpose" value="mark">
                                        <input type="hidden" name="class_id" value="<?php echo e($class_id); ?>">
                                        <input type="hidden" name="section_id" value="<?php echo e($section_id); ?>">
                                      
                                        <input type="hidden" name="attendance_date" value="<?php echo e($date); ?>">
                                        <?php if(moduleStatusCheck('University')): ?>
                                        
                                        <input type="hidden" name="un_session_id" value="<?php echo e(isset($unSession) ? $unSession->id:''); ?>">
                                        <input type="hidden" name="un_faculty_id" value="<?php echo e(isset($unFaculty) ? $unFaculty->id:''); ?>">
                                        <input type="hidden" name="un_department_id" value="<?php echo e(isset($unDepartment) ? $unDepartment->id:''); ?>">
                                        <input type="hidden" name="un_academic_id" value="<?php echo e(isset($unAcademic) ? $unAcademic->id:''); ?>">
                                        <input type="hidden" name="un_semester_id" value="<?php echo e(isset($unSemester) ? $unSemester->id:''); ?>">
                                        <input type="hidden" name="un_section_id" value="<?php echo e(isset($unSection) ? $unSection->id:''); ?>">
                                        <?php endif; ?>
                                        <button type="submit" class="primary-btn fix-gr-bg mb-20">
                                            <?php echo app('translator')->get('student.mark_holiday'); ?>
                                        </button>
                                    </form>
                                <?php else: ?>
                                    <form action="<?php echo e(route('student-attendance-holiday')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="purpose" value="unmark">
                                        <input type="hidden" name="class_id" value="<?php echo e($class_id); ?>">
                                        <input type="hidden" name="section_id" value="<?php echo e($section_id); ?>">
                                        <input type="hidden" name="attendance_date" value="<?php echo e($date); ?>">
                                        <?php if(moduleStatusCheck('University')): ?>
                                        
                                        <input type="hidden" name="un_session_id" value="<?php echo e(isset($unSession) ? $unSession->id:''); ?>">
                                        <input type="hidden" name="un_faculty_id" value="<?php echo e(isset($unFaculty) ? $unFaculty->id:''); ?>">
                                        <input type="hidden" name="un_department_id" value="<?php echo e(isset($unDepartment) ? $unDepartment->id:''); ?>">
                                        <input type="hidden" name="un_academic_id" value="<?php echo e(isset($unAcademic) ? $unAcademic->id:''); ?>">
                                        <input type="hidden" name="un_semester_id" value="<?php echo e(isset($unSemester) ? $unSemester->id:''); ?>">
                                        <input type="hidden" name="un_semester_label_id" value="<?php echo e(isset($unSemesterLabel) ? $unSemesterLabel->id:''); ?>">
                                        <input type="hidden" name="un_section_id" value="<?php echo e(isset($unSection) ? $unSection->id:''); ?>">
                                        <?php endif; ?>
                                        <button type="submit" class="primary-btn fix-gr-bg mb-20">
                                            <?php echo app('translator')->get('student.unmark_holiday'); ?>
                                        </button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'route'=>'student-attendance-store','files' => true, 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <input type="hidden" name="date" class="attendance_date" value="<?php echo e(isset($date)? $date: ''); ?>">
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table school-table-style" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th><?php echo app('translator')->get('student.admission_no'); ?></th>
                                        <th><?php echo app('translator')->get('student.student_name'); ?></th>
                                        <th><?php echo app('translator')->get('student.roll_number'); ?></th>
                                        <th><?php echo app('translator')->get('student.attendance'); ?></th>
                                        <th><?php echo app('translator')->get('common.note'); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                   
                                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                        <tr>
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
                                                <input type="hidden" name="attendance[<?php echo e($student->id); ?>][un_section_id]" value="<?php echo e($student->un_section_id); ?>">
                                                <?php endif; ?>
                                           
                                            </td>
                                            <td><?php echo e($student->studentDetail->first_name.' '.$student->studentDetail->last_name); ?></td>
                                            <td><?php echo e($student->roll_no); ?></td>
                                            <td>
                                                <div class="d-flex radio-btn-flex">
                                                    <div class="mr-20">
                                                        <input type="radio" name="attendance[<?php echo e($student->id); ?>][attendance_type]"
                                                               id="attendanceP<?php echo e($student->id); ?>" value="P"
                                                               class="common-radio attendanceP attendance_type" 
    <?php echo e($student->studentDetail->DateWiseAttendances !=null ? ($student->studentDetail->DateWiseAttendances->attendance_type == "P" ? 'checked' :'') : ($attendance_type != "" ? '' :'checked')); ?>>
                                                        <label for="attendanceP<?php echo e($student->id); ?>"><?php echo app('translator')->get('student.present'); ?></label>
                                                    </div>
                                                    <div class="mr-20">
                                                        <input type="radio" name="attendance[<?php echo e($student->id); ?>][attendance_type]"
                                                               id="attendanceL<?php echo e($student->id); ?>" value="L"
                                                               class="common-radio attendance_type" <?php echo e($student->studentDetail->DateWiseAttendances !=null ? ($student->studentDetail->DateWiseAttendances->attendance_type == "L" ? 'checked' :''):''); ?>>
                                                        <label for="attendanceL<?php echo e($student->id); ?>"><?php echo app('translator')->get('student.late'); ?></label>
                                                    </div>
                                                    <div class="mr-20">
                                                        <input type="radio" name="attendance[<?php echo e($student->id); ?>][attendance_type]"
                                                               id="attendanceA<?php echo e($student->id); ?>" value="A"
                                                               class="common-radio attendance_type"  <?php echo e($student->studentDetail->DateWiseAttendances !=null ? ($student->studentDetail->DateWiseAttendances->attendance_type == "A" ? 'checked' :''):''); ?>>
                                                        <label for="attendanceA<?php echo e($student->id); ?>"><?php echo app('translator')->get('student.absent'); ?></label>
                                                    </div>
                                                    <div>
                                                        <input type="radio" name="attendance[<?php echo e($student->id); ?>][attendance_type]"
                                                               id="attendanceH<?php echo e($student->id); ?>" value="F"
                                                               class="common-radio attendance_type"  <?php echo e($student->studentDetail->DateWiseAttendances !=null ? ($student->studentDetail->DateWiseAttendances->attendance_type == "F" ? 'checked' :'') : ''); ?>>
                                                        <label for="attendanceH<?php echo e($student->id); ?>"><?php echo app('translator')->get('student.half_day'); ?></label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="primary_input">
                                                    <textarea class="primary_input_field form-control note_<?php echo e($student->id); ?>" cols="0" rows="2" name="attendance[<?php echo e($student->id); ?>][note]" id=""><?php echo e($student->studentDetail->DateWiseAttendances !=null ? $student->studentDetail->DateWiseAttendances->notes :''); ?></textarea>
                                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('student.add_note_here'); ?></label>
                                                    
                                                    <span class="text-danger">
                                                        <strong><?php echo app('translator')->get('common.error'); ?></strong>
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-center">
                                            <button type="submit" class="primary-btn mr-40 fix-gr-bg nowrap submit">
                                                <?php echo app('translator')->get('student.save_attendance'); ?>
                                            </button>
                                        </td>
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>
                    </div>
                </div>
           <?php endif; ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\examination\finalMarkSheet.blade.php ENDPATH**/ ?>
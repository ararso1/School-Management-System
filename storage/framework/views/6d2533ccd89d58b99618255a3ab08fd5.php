<?php $__env->startPush('css'); ?>
<style type="text/css">
    .slider{
        top:7px !important;
    }
    table td {
        vertical-align: middle !important;
    }
    .switch_toggle {
        height: 28px;
    }
    table.dataTable thead th {
        padding-left: 30px !important;
    }
    table.dataTable thead .sorting::after,
    table.dataTable thead .sorting_asc::after {
        top: 10px !important;
        left: 15px !important;
    }
    table.dataTable tbody th, table.dataTable tbody td {
        padding: 20px 10px 20px 18px !important;
    }
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>
<?php $__env->startSection('title'); ?> 
<?php echo app('translator')->get('student.subject_wise_attendance'); ?>
<?php $__env->stopSection(); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/backEnd/css/login_access_control.css')); ?>"/>
<section class="sms-breadcrumb mb-20 up_breadcrumb">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('student.student_attendance'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('student.student_information'); ?></a>
                <a href="#"><?php echo app('translator')->get('student.student_attendance'); ?></a>
            </div>
        </div>
    </div>
</section>
<style>
    .dataTables_wrapper .dataTables_paginate {
    text-align: right;
}
</style>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="main-title">
                        <h3 class="mb-30"><?php echo app('translator')->get('common.select_criteria'); ?> </h3>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-lg-12">  
                    <div class="white-box">
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'subject-attendance-search', 'method' => 'GET', 'enctype' => 'multipart/form-data', 'id' => 'search_studentA'])); ?>

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
                                            <label for="startDate"><?php echo app('translator')->get('student.attendance_date'); ?><span class="text-danger"> *</span></label>
                                            

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
                                    <option value="<?php echo e($class->id); ?>"  <?php echo e(isset($class_id)? ($class_id == $class->id? 'selected':''):''); ?>><?php echo e($class->class_name); ?></option>
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
                                </select>
                                <?php if($errors->has('section')): ?>
                                <span class="text-danger invalid-select" role="alert">
                                    <?php echo e($errors->first('section')); ?>

                                </span>
                                <?php endif; ?>
                            </div> 
                            <div class="col-lg-3 mt-30-md" id="select_subject_div">
                                <select class="primary_select form-control<?php echo e($errors->has('subject') ? ' is-invalid' : ''); ?> select_subject" id="select_subject" name="subject">
                                    <option data-display="Select subject *" value="">Select subject *</option>
                                </select>
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
                                            <label for="startDate"><?php echo app('translator')->get('student.attendance_date'); ?><span class="text-danger"> *</span></label>
                                            
                                            
                                            <?php if($errors->has('attendance_date')): ?>
                                            <span class="text-danger" >
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



                

 
                    <input class="subject_class" type="hidden" name="class" value="<?php echo e($input['class']); ?>">
                    <input class="subject_section" type="hidden" name="section" value="<?php echo e($input['section']); ?>">
                    <input class="subject" type="hidden" name="subject" value="<?php echo e($input['subject']); ?>">
                    <input class="subject_attendance_date" type="hidden" name="attendance_date" value="<?php echo e($input['attendance_date']); ?>">
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
                                            <b> <?php echo app('translator')->get('common.class'); ?>: </b> <?php echo e($search_info['class_name']); ?>

                                        </div>
                                        <div class="col-lg-3">
                                            <b> <?php echo app('translator')->get('common.section'); ?>: </b> <?php echo e($search_info['section_name']); ?>

                                        </div>
                                        <div class="col-lg-3">
                                            <b> <?php echo app('translator')->get('common.subject'); ?>: </b> <?php echo e($search_info['subject_name']); ?>

                                        </div>
                                        <div class="col-lg-3">
                                            <b> <?php echo app('translator')->get('common.date'); ?>: </b> <?php echo e(dateConvert($search_info['date'])); ?>

                                        </div>
                                    <?php endif; ?>
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
                            <input type="hidden" name="date" value="<?php echo e(isset($date)? $date: ''); ?>">
                            <div class="row ">
                                <div class="col-lg-12">
                                    <form name="frm-example" id="frm-example" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <table id="table_id" class="table" cellspacing="0" width="100%">
                                            <input type="hidden" name="attendance_date" value="<?php echo e($input['attendance_date']); ?>">
                                            <input type="hidden" name="subject" value="<?php echo e($input['subject']); ?>">
                                            <input type="hidden" name="class" value="<?php echo e($input['class']); ?>">
                                            <input type="hidden" name="section" value="<?php echo e($input['section']); ?>">
                                            <thead>
                                                <tr>
                                                    <th><?php echo app('translator')->get('common.sl'); ?></th>
                                                    <th><?php echo app('translator')->get('student.admission_no'); ?></th>
                                                    <th><?php echo app('translator')->get('student.student_name'); ?></th>
                                                    <th><?php echo app('translator')->get('student.id_number'); ?></th>
                                                    <th><?php echo app('translator')->get('student.attendance'); ?></th>
                                                    <th><?php echo app('translator')->get('common.note'); ?></th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php $count=1; ?>

                                                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($count++); ?>


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
                                                    <td><?php echo e($student->studentDetail->admission_no); ?></td>
                                                    <td><?php echo e($student->studentDetail->first_name.' '.$student->studentDetail->last_name); ?></td>
                                                    <td><?php echo e($student->roll_no); ?></td>
                                                    <td>
                                                    

                                                        <label class="switch_toggle">
                                                            <input type="checkbox" value="P" name="attendance[<?php echo e($student->id); ?>][attendance_type]" <?php echo e($student->studentDetail->DateSubjectWiseAttendances !=null ? ($student->studentDetail->DateSubjectWiseAttendances->attendance_type == "P" ? 'checked' :'') : ''); ?>  class="switch-input11">
                                                            <span class="slider round"></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <div class="primary_input">
                                                            <textarea class="primary_input_field form-control note_<?php echo e($student->id); ?>" cols="0" rows="2" name="attendance[<?php echo e($student->id); ?>][note]" id=""><?php echo e($student->studentDetail->DateSubjectWiseAttendances !=null ? $student->studentDetail->DateSubjectWiseAttendances->notes :''); ?></textarea>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                        <div class="row mt-40">
                                            <div class="col-lg-12 text-center">
                                                <button type="submit" class="primary-btn fix-gr-bg save-template">
                                                    <span class="ti-check"></span>
                                                    <?php echo app('translator')->get('common.save'); ?>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                

    </div>
</section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startPush('script'); ?>
<script>
  $(document).ready(function (){
   var table = $('#default_table').DataTable();
   
   // Handle form submission event 
   $('#frm-example').on('submit', function(e){
      e.preventDefault();
      $(".save-template").html('Saving...')

      // Serialize form data
      const formData = new FormData($('#frm-example')[0]);
      console.log(formData);
    //   var data = table.$('input,select,textarea').serialize();
      // Submit form data via Ajax
      $.ajax({
        url : "<?php echo e(route('subject-attendance-store-second')); ?>",
        method : "POST",
        data: formData,
        contentType: false, // The content type used when sending data to the server.
        cache: false, // To unable request pages to be cached
        processData: false,
         success : function (result){
            $(".save-template").html('Save')
             console.log(result);
                    toastr.success('Attendance Has Been Saved', 'Successful', {
                    timeOut: 5000
            })
        }
      });
      
   });      
});
    </script>

    <script>
        $(document).on('change','.subject_attendance_type',function (){
            let studentId = $(this).data('id');
            let subjectAttendanceType ='';
            if ($(this).is(':checked'))
            {
                subjectAttendanceType = $(this).val();
            }
            let subjectClass = $('.subject_class').val();
            let subjectSection = $('.subject_section').val();
            let subject = $('.subject').val();
            let subjectAttendanceDate = $('.subject_attendance_date').val();
            let notes = $('.note_'+studentId).val();
            $.ajax({
                url : "<?php echo e(route('subject-attendance-store-second')); ?>",
                method : "POST",
                data : {
                    class : subjectClass,
                    section : subjectSection,
                    subject : subject,
                    student_id : studentId,
                    attendance_type : subjectAttendanceType,
                    date : subjectAttendanceDate,
                    notes : notes,
                },
                success : function (result){
                    toastr.success('Attendance Has Been Saved', 'Successful', {
                        timeOut: 5000
                    })
                }
            })
        })
    </script>
    <?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\studentInformation\subject_attendance_list2.blade.php ENDPATH**/ ?>
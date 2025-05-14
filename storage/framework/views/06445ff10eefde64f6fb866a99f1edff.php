<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('exam.student_final_mark_sheet'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <style type="text/css">
        .single-report-admit table tr th {
            border: 1px solid #a2a8c5 !important;
            vertical-align: middle;
        }

        #grade_table th {
            border: 1px solid black;
            text-align: center;
            background: #351681;
            color: white;
        }

        #grade_table td {
            color: black;
            text-align: center !important;
            border: 1px solid black;
        }

        hr {
            margin: 0;
        }

        .table-bordered {
            border: 1px solid #a2a8c5;
        }

        .single-report-admit table tr th {
            font-weight: 500;
        }

        #grade_table th {
            border: 1px solid #dee2e6;
            border-top-style: solid;
            border-top-width: 1px;
            text-align: left;
            background: #351681;
            color: white;
            background: #f2f2f2;
            color: var(--base_color);
            font-size: 12px;
            font-weight: 500;
            text-transform: uppercase;
            border-top: 0px;
            padding: 5px 4px;
            background: transparent;
            border-bottom: 1px solid rgba(130, 139, 178, 0.15) !important;
        }

        #grade_table td {
            color: #828bb2;
            padding: 0 7px;
            font-weight: 400;
            background-color: transparent;
            border-right: 0;
            border-left: 0;
            text-align: left !important;
            border-bottom: 1px solid rgba(130, 139, 178, 0.15) !important;
        }

        .single-report-admit table tr th {
            border: 0;
            border-bottom: 1px solid rgba(67, 89, 187, 0.15) !important;
            text-align: left
        }

        .single-report-admit table thead tr th {
            border: 0 !important;
        }

        .single-report-admit table tbody tr:first-of-type td {
            border-top: 1px solid rgba(67, 89, 187, 0.15) !important;
        }

        .single-report-admit table tr td {
            vertical-align: middle;
            font-size: 12px;
            color: #828BB2;
            font-weight: 400;
            border: 0;
            border-bottom: 1px solid rgba(130, 139, 178, 0.15) !important;
            text-align: left
        }

        .single-report-admit table tbody tr th {
            border: 0 !important;
            border-bottom: 1px solid rgba(67, 89, 187, 0.15) !important;
        }

        .single-report-admit table.summeryTable tbody tr:first-of-type td,
        .single-report-admit table.comment_table tbody tr:first-of-type td {
            border-top: 0 !important;
        }

        /* new  style  */
        .single-report-admit {
        }

        .single-report-admit .student_marks_table {
            background: -webkit-linear-gradient(
                    90deg, #d8e6ff 0%, #ecd0f4 100%);
            background: -moz-linear-gradient(90deg, #d8e6ff 0%, #ecd0f4 100%);
            background: -o-linear-gradient(90deg, #d8e6ff 0%, #ecd0f4 100%);
            background: linear-gradient(
                    90deg, #d8e6ff 0%, #ecd0f4 100%);
        }

</style>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('exam.student_final_mark_sheet'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('exam.exam'); ?></a>
                <a href="#"><?php echo app('translator')->get('exam.student_final_mark_sheet'); ?></a>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area mb-40">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    <div class="main-title">
                        <h3 class="mb-30"><?php echo app('translator')->get('common.select_criteria'); ?> </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?php if(session()->has('message-success') != ""): ?>
                    <?php if(session()->has('message-success')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session()->get('message-success')); ?>

                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if(session()->has('message-danger') != ""): ?>
                    <?php if(session()->has('message-danger')): ?>
                        <div class="alert alert-danger">
                            <?php echo e(session()->get('message-danger')); ?>

                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                <div class="white-box">
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'studentFinalMarkSheetSearch', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                    <div class="row">
                        <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                        <?php if(moduleStatusCheck('University')): ?>
                            <div class="col-lg-12">
                                <div class="row">
                                    <?php if ($__env->exists('university::common.session_faculty_depart_academic_semester_level',
                                    ['required' => 
                                        ['USN', 'UD', 'UA', 'US', 'USL'],'hide'=> ['USUB']
                                    ])) echo $__env->make('university::common.session_faculty_depart_academic_semester_level',
                                    ['required' => 
                                        ['USN', 'UD', 'UA', 'US', 'USL'],'hide'=> ['USUB']
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <div class="col-lg-3 mt-30" id="select_un_student_div">
                                        <?php echo e(Form::select('student_id',[""=>__('common.select_student').'*'], null , ['class' => 'primary_select  form-control'. ($errors->has('student_id') ? ' is-invalid' : ''), 'id'=>'select_un_student'])); ?>

                                        
                                        <div class="pull-right loader loader_style" id="select_un_student_loader">
                                            <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                        </div>
                                        <?php if($errors->has('student_id')): ?>
                                            <span class="text-danger custom-error-message" role="alert">
                                                <?php echo e(@$errors->first('student_id')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="col-lg-4 mt-30-md md_mb_20">
                                <select class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>"
                                        id="select_class" name="class">
                                    <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value=""><?php echo app('translator')->get('common.select_class'); ?>
                                        *
                                    </option>
                                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($class->id); ?>" <?php echo e(isset($class_id)? ($class_id == $class->id? 'selected':''):''); ?>><?php echo e($class->class_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('class')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('class')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-4 mt-30-md md_mb_20" id="select_section_div">
                                <select class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?> select_section"
                                        id="select_section" name="section">
                                    <option data-display="<?php echo app('translator')->get('common.select_section'); ?> *"
                                            value=""><?php echo app('translator')->get('common.select_section'); ?> *
                                    </option>
                                    <?php if(isset($studentDetails)): ?>
                                    <option data-display="<?php echo e($studentDetails->section->section_name); ?>"
                                            value="<?php echo e($studentDetails->section->id); ?>" selected><?php echo e($studentDetails->section->section_name); ?>

                                    </option>
                                    <?php endif; ?> 
                                </select>
                                <div class="pull-right loader loader_style" id="select_section_loader">
                                    <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>"
                                        alt="loader">
                                </div>
                                <?php if($errors->has('section')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('section')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-4 mt-30-md md_mb_20" id="select_student_div">
                                <select class="primary_select form-control<?php echo e($errors->has('student') ? ' is-invalid' : ''); ?>"
                                        id="select_student" name="student">
                                    <option data-display="<?php echo app('translator')->get('common.select_student'); ?> *"
                                            value=""><?php echo app('translator')->get('common.select_student'); ?> *
                                    </option>

                                    <?php if(isset($studentDetails)): ?>
                                    <option data-display="<?php echo e($studentDetails->student->full_name); ?>"
                                            value="<?php echo e($studentDetails->student->id); ?>" selected><?php echo e($studentDetails->student->full_name); ?>

                                    </option>
                                    <?php endif; ?> 

                                </select>
                                <div class="pull-right loader loader_style" id="select_student_loader">
                                    <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>"
                                        alt="loader">
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="col-lg-12 mt-20 text-right">
                            <button type="submit" class="primary-btn small fix-gr-bg">
                                <span class="ti-search"></span>
                                <?php echo app('translator')->get('common.search'); ?>
                            </button>
                        </div>
                    </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </section>

<?php if(isset($is_result_available)): ?>
    <?php if(moduleStatusCheck('University')): ?>
        <?php if ($__env->exists('university::exam.progress_card_report')) echo $__env->make('university::exam.progress_card_report', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <section class="student-details">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-lg-12 no-gutters">
                        <div class="main-title d-flex ">
                            <h3 class="mb-30 flex-fill"><?php echo app('translator')->get('exam.student_final_mark_sheet'); ?></h3>
                            <div class="print_button pull-right">
                                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'studentFinalMarkSheetPrint', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student', 'target' => '_blank'])); ?>


                                <input type="hidden" name="class_id" value="<?php echo e($class_id); ?>">
                                <input type="hidden" name="section_id" value="<?php echo e($section_id); ?>">
                                <input type="hidden" name="student_id" value="<?php echo e($student_id); ?>">
                                
                                <button type="submit" class="primary-btn small fix-gr-bg"><i class="ti-printer"> </i> <?php echo app('translator')->get('common.print'); ?>
                                </button>
                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="white-box">
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="single-report-admit">
                                        <div class="card">
                                            <div class="card-header">
                                                    <div class="d-flex">
                                                            <div class="col-lg-2">
                                                            <img class="logo-img" src="<?php echo e(generalSetting()->logo); ?>" alt="<?php echo e(generalSetting()->school_name); ?>">
                                                            </div>
                                                            <div class="col-lg-6 ml-30">
                                                                <h3 class="text-white"> 
                                                                    <?php echo e(isset(generalSetting()->school_name)?generalSetting()->school_name:'Infix School Management ERP'); ?> 
                                                                </h3> 
                                                                <p class="text-white mb-0">
                                                                    <?php echo e(isset(generalSetting()->address)?generalSetting()->address:'Infix School Address'); ?> 
                                                                </p>
                                                                <p class="text-white mb-0">
                                                                    <?php echo app('translator')->get('common.email'); ?>:  <?php echo e(isset(generalSetting()->email)?generalSetting()->email:'hello@aorasoft.com'); ?>,   <?php echo app('translator')->get('common.phone'); ?>:  <?php echo e(isset(generalSetting()->phone)?generalSetting()->phone:'+96897002784'); ?> 
                                                                </p> 
                                                            </div>
                                                            <div class="offset-2">
                                                            </div>
                                                        </div>
                                                <div class="report-admit-img profile_100" style="background-image: url(<?php echo e(file_exists(@$studentDetails->studentDetail->student_photo) ? asset($studentDetails->studentDetail->student_photo) : asset('public/uploads/staff/demo/staff.jpg')); ?>)"></div>

                                            </div>
                                        <div class="card-body">
                                            <div class="student_marks_table">
                                                <div class="row">
                                                    <div class="col-lg-7 text-black"> 
                                                        <h3 style="border-bottm:1px solid #ddd; padding: 15px; text-align:center"> 
                                                            <?php echo app('translator')->get('exam.student_final_mark_sheet'); ?>
                                                        </h3>
                                                        <h3>
                                                            <?php echo e($studentDetails->studentDetail->full_name); ?>

                                                        </h3>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <p class="mb-0">
                                                                    <?php echo app('translator')->get('common.academic_year'); ?> : &nbsp;<span class="primary-color fw-500"><?php echo e(@$studentDetails->academic->year); ?></span>
                                                                </p>
                                                                <p class="mb-0">
                                                                    <?php echo app('translator')->get('common.section'); ?> : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span class="primary-color fw-500"><?php echo e($studentDetails->section->section_name); ?></span>
                                                                </p>
                                                                <p class="mb-0">
                                                                    <?php echo app('translator')->get('common.class'); ?> : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span class="primary-color fw-500"><?php echo e($studentDetails->class->class_name); ?></span>
                                                                </p>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p class="mb-0">
                                                                    <?php echo app('translator')->get('student.admission_no'); ?> : <span class="primary-color fw-500"><?php echo e($studentDetails->studentDetail->admission_no); ?></span>
                                                                </p>
                                                                <p class="mb-0">
                                                                    <?php echo app('translator')->get('student.roll'); ?> : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span class="primary-color fw-500"><?php echo e($studentDetails->roll_no); ?></span>
                                                                </p>
                                                                <p class="mb-0">
                                                                    <?php echo app('translator')->get('exam.pass_mark'); ?> : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span class="primary-color fw-500"><?php echo e(@$studentDetails->class->pass_mark); ?></span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5 text-black">
                                                        <?php if(@$marks_grade): ?>
                                                            <table class="table" id="grade_table">
                                                                <thead>
                                                                <tr>
                                                                    <th><?php echo app('translator')->get('reports.staring'); ?></th>
                                                                    <th> <?php echo app('translator')->get('reports.ending'); ?></th>
                                                                    <?php if(@generalSetting()->result_type != 'mark'): ?>
                                                                        <th><?php echo app('translator')->get('exam.gpa'); ?></th>
                                                                        <th><?php echo app('translator')->get('exam.grade'); ?></th>
                                                                    <?php endif; ?>
                                                                    <th><?php echo app('translator')->get('homework.evalution'); ?></th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php $__currentLoopData = $marks_grade; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade_d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <tr>
                                                                        <td><?php echo e($grade_d->percent_from); ?></td>
                                                                        <td><?php echo e($grade_d->percent_upto); ?></td>
                                                                        <?php if(@generalSetting()->result_type != 'mark'): ?>
                                                                            <td><?php echo e($grade_d->gpa); ?></td>
                                                                            <td><?php echo e($grade_d->grade_name); ?></td>
                                                                        <?php endif; ?>
                                                                        <td class="text-left"><?php echo e($grade_d->description); ?></td>
                                                                    </tr>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </tbody>
                                                            </table>
                                                        <?php endif; ?>
                                                    </div>
                                                    <table class="table mb-0">
                                                        <thead>
                                                        <tr class="text-center">
                                                            <th class="text-center"><?php echo app('translator')->get('common.subjects'); ?></th>
                                                            <th class="text-center"><?php echo app('translator')->get('exam.total_mark'); ?></th>
                                                            <th class="text-center"><?php echo app('translator')->get('exam.pass_mark'); ?></th>
                                                            <?php if(count($result_setting)): ?>
                                                                <?php $__currentLoopData = $result_setting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assinged_exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <th class="text-center"><?php echo e(@$assinged_exam->examTypeName->title); ?> (<?php echo e(@$assinged_exam->exam_percentage); ?>%)</th>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php else: ?> 
                                                                <?php $__currentLoopData = examTypes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assinged_exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <th class="text-center"><?php echo e(@$assinged_exam->title); ?> </th>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endif; ?> 
                                                            <th class="text-center"><?php echo app('translator')->get('exam.average'); ?></th>
                                                            <th class="text-center"><?php echo app('translator')->get('exam.result'); ?></th>
                                                            <th class="text-center"><?php echo app('translator')->get('exam.grade'); ?></th>
                                                        </tr>

                                                        </thead>

                                                        <tbody class="mark_sheet_body">
                                                            <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assignsubject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                  <tr>
                                                                        <td class="text-center"><?php echo e(@$assignsubject->subject->subject_name); ?></td>
                                                                        <?php if(count($result_setting)): ?>
                                                                        <td class="text-center"><?php echo e(subject100PercentMark()); ?></td>
                                                                        <?php else: ?> 
                                                                        <td class="text-center"><?php echo e(@allExamsSubjectTotalMark($assignsubject->subject->id)); ?></td>
                                                                        <?php endif; ?> 
                                                                        <td class="text-center"><?php echo e(@$assignsubject->subject->pass_mark); ?></td>
                                                                        <?php if(count($result_setting)): ?>
                                                                            <?php $__currentLoopData = $result_setting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $examRule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <td class="text-center"><?php echo e(singleSubjectMark($record_id,$assignsubject->subject->id,$examRule->exam_type_id)[0]); ?></td>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php else: ?> 
                                                                       
                                                                            <?php $__currentLoopData = examTypes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $examRule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <td class="text-center"><?php echo e(singleSubjectMark($record_id,$assignsubject->subject->id,$examRule->id,true)[0]); ?></td>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php endif; ?> 
                                                                        <td class="text-center"><?php echo e(@subjectAverageMark($record_id,$assignsubject->subject->id)[0]); ?></td>
                                                                        <td class="text-center"></td>
                                                                        <td class="text-center"><?php echo e(getGrade(subjectAverageMark($record_id,$assignsubject->subject->id)[0],true)); ?></td>
                                                                  </tr>
                                                      
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </tbody>
                                                            <tfoot>
                                                                  <tr>
                                                                     
                                                                        <th class="text-center"><?php echo app('translator')->get('exam.total_average'); ?></th>
                                                                        <th class="text-center"></th>
                                                                        <th class="text-center"><?php echo e(@$studentDetails->class->pass_mark); ?></th>
                                                                        <?php if(count($result_setting)): ?>
                                                                            <?php $__currentLoopData = $result_setting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <th class="text-center"><?php echo e(allExamSubjectMark($record_id,$exam->id)[0]); ?></th>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php else: ?>
                                                                        <?php $__currentLoopData = examTypes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <th class="text-center"><?php echo e(allExamSubjectMark($record_id,$exam->id, null)[0]); ?></th>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php endif; ?> 
                                                                        <th class="text-center"><?php echo e(allExamSubjectMarkAverage($record_id,$all_subject_ids)); ?></th>
                                                                        <th class="text-center">
                                                                              <?php if( allExamSubjectMarkAverage($record_id,$all_subject_ids) >= $studentDetails->class->pass_mark): ?>
                                                                              <?php echo app('translator')->get('exam.pass'); ?>
                                                                              <?php else: ?>
                                                                              <?php echo app('translator')->get('exam.fail'); ?>
                                                                              <?php endif; ?>

                                                                        </th>
                                                                        <th class="text-center"><?php echo e(getGrade(allExamSubjectMarkAverage($record_id, $all_subject_ids),true)); ?></th>
                                                                        
                                                                       
                                                                  </tr>
                                                            </tfoot>
                                                        
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    <?php endif; ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php if(moduleStatusCheck('University')): ?>
    <?php $__env->startPush('script'); ?>
        <script>
            $(document).ready(function() {
                $("#select_semester_label").on("change", function() {

                    var url = $("#url").val();
                    var i = 0;
                    let semester_id = $(this).val();
                    let academic_id = $('#select_academic').val();  
                    let session_id = $('#select_session').val();
                    let faculty_id = $('#select_faculty').val();
                    let department_id = $('#select_dept').val();
                    let un_semester_label_id = $('#select_semester_label').val();

                    if (session_id =='') {
                        setTimeout(function() {
                            toastr.error(
                            "Session Not Found",
                            "Error ",{
                                timeOut: 5000,
                        });}, 500);
                    
                        $("#select_semester option:selected").prop("selected", false)
                        return ;
                    }
                    if (department_id =='') {
                        setTimeout(function() {
                            toastr.error(
                            "Department Not Found",
                            "Error ",{
                                timeOut: 5000,
                        });}, 500);
                        $("#select_semester option:selected").prop("selected", false)

                        return ;
                    }
                    if (semester_id =='') {
                        setTimeout(function() {
                            toastr.error(
                            "Semester Not Found",
                            "Error ",{
                                timeOut: 5000,
                        });}, 500);
                        $("#select_semester option:selected").prop("selected", false)

                        return ;
                    }
                    if (academic_id =='') {
                        setTimeout(function() {
                            toastr.error(
                            "Academic Not Found",
                            "Error ",{
                                timeOut: 5000,
                        });}, 500);
                        return ;
                    }
                    if (un_semester_label_id =='') {
                        setTimeout(function() {
                            toastr.error(
                            "Semester Label Not Found",
                            "Error ",{
                                timeOut: 5000,
                        });}, 500);
                        return ;
                    }

                    var formData = {
                        semester_id : semester_id,
                        academic_id : academic_id,
                        session_id : session_id,
                        faculty_id : faculty_id,
                        department_id : department_id,
                        un_semester_label_id : un_semester_label_id,
                    };
                
                    // Get Student
                    $.ajax({
                        type: "GET",
                        data: formData,
                        dataType: "json",
                        url: url + "/university/" + "get-university-wise-student",
                        beforeSend: function() {
                            $('#select_un_student_loader').addClass('pre_loader').removeClass('loader');
                        },
                        success: function(data) {
                            var a = "";
                            $.each(data, function(i, item) {
                                if (item.length) {
                                    $("#select_un_student").find("option").not(":first").remove();
                                    $("#select_un_student_div ul").find("li").not(":first").remove();

                                    $.each(item, function(i, students) {
                                        console.log(students);
                                        $("#select_un_student").append(
                                            $("<option>", {
                                                value: students.student.id,
                                                text: students.student.full_name,
                                            })
                                        );

                                        $("#select_un_student_div ul").append(
                                            "<li data-value='" +
                                            students.student.id +
                                            "' class='option'>" +
                                            students.student.full_name +
                                            "</li>"
                                        );
                                    });
                                } else {
                                    $("#select_un_student_div .current").html("SELECT STUDENT *");
                                    $("#select_un_student").find("option").not(":first").remove();
                                    $("#select_un_student_div ul").find("li").not(":first").remove();
                                }
                            });
                        },
                        error: function(data) {
                            console.log("Error:", data);
                        },
                        complete: function() {
                            i--;
                            if (i <= 0) {
                                $('#select_un_student_loader').removeClass('pre_loader').addClass('loader');
                            }
                        }
                    });
                });
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php endif; ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\examination\studentFinalMarkSheet.blade.php ENDPATH**/ ?>
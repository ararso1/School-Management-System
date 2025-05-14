<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('reports.merit_list_report'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<style>
    tr {
        border: 1px solid var(--border_color);
    }

    table.meritList {
        width: 100%;
        border: 1px solid var(--border_color);
    }

    table.meritList th {
        padding: 2px;
        text-transform: capitalize !important;
        font-size: 11px !important;
        text-align: center !important;
        border: 1px solid var(--border_color);
        text-align: center;

    }

    table.meritList td {
        padding: 2px;
        font-size: 11px !important;
        border: 1px solid var(--border_color);
        text-align: center !important;
    }

    .single-report-admit table tr td {
        padding: 5px 5px !important;

        border: 1px solid var(--border_color);
    }

    .single-report-admit table tr th {
        padding: 5px 5px !important;
        vertical-align: middle;
        border: 1px solid var(--border_color);
    }

    .main-wrapper {
        display: block !important;
    }

    #main-content {
        width: auto !important;
    }

    hr {
        margin: 0px;
    }

    .gradeChart tbody td {
        padding: 0;
        border: 1px solid var(--border_color);
    }

    table.gradeChart {
        padding: 0px;
        margin: 0px;
        width: 60%;
        text-align: right;
    }

    table.gradeChart thead th {
        border: 1px solid #000000;
        border-collapse: collapse;
        text-align: center !important;
        padding: 0px;
        margin: 0px;
        font-size: 9px;
    }

    table.gradeChart tbody td {
        border: 1px solid #000000;
        border-collapse: collapse;
        text-align: center !important;
        padding: 0px;
        margin: 0px;
        font-size: 9px;
    }

    #grade_table th {
        border: 1px solid black;
        text-align: center;
        background: #351681;
        color: white;
    }

    #grade_table td {
        color: black;
        text-align: center;
        border: 1px solid black;
    }

</style>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('reports.merit_list_report'); ?> </h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('reports.reports'); ?></a>
                <a href="#"><?php echo app('translator')->get('reports.merit_list_report'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="white-box">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="main-title">
                            <h3 class="mb-15"><?php echo app('translator')->get('common.select_criteria'); ?></h3>
                        </div>
                    </div>
                </div>
                <?php echo e(Form::open(['class' => 'form-horizontal', 'route' => 'merit_list_reports', 'method' => 'POST', 'id' => 'search_student'])); ?>

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

                            <div class="col-lg-3 mt-15" id="select_exam_typ_subject_div">
                                <label for=""><?php echo app('translator')->get('exam.select_exam'); ?></label>
                                <?php echo e(Form::select('exam_type',[""=>__('exam.select_exam').'*'], null , ['class' => 'primary_select  form-control'. ($errors->has('exam_type') ? ' is-invalid' : ''), 'id'=>'select_exam_typ_subject'])); ?>


                                <div class="pull-right loader loader_style" id="select_exam_type_loader">
                                    <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>"
                                        alt="loader">
                                </div>
                                <?php if($errors->has('exam_type')): ?>
                                <span class="text-danger custom-error-message" role="alert">
                                    <?php echo e(@$errors->first('exam_type')); ?>

                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="col-lg-4 mt-30-md md_mb_20">
                        <label class="primary_input_label" for=""><?php echo e(__('exam.exam')); ?><span class="text-danger">
                                *</span></label>
                        <select class="primary_select form-control<?php echo e($errors->has('exam') ? ' is-invalid' : ''); ?>"
                            name="exam">
                            <option data-display="<?php echo app('translator')->get('reports.select_exam'); ?>*" value=""><?php echo app('translator')->get('reports.select_exam'); ?> *
                            </option>
                            <?php $__currentLoopData = $exams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($exam->id); ?>"
                                <?php echo e(isset($exam_id)? ($exam_id == $exam->id? 'selected':''):''); ?>><?php echo e($exam->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if($errors->has('exam')): ?>
                        <span class="text-danger invalid-select" role="alert">
                            <?php echo e($errors->first('exam')); ?>

                        </span>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-4 mt-30-md md_mb_20">
                        <label class="primary_input_label" for=""><?php echo e(__('common.class')); ?><span class="text-danger">
                                *</span></label>
                        <select class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>"
                            id="select_class" name="class">
                            <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value=""><?php echo app('translator')->get('common.select_class'); ?>
                                *</option>
                            <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($class->id); ?>"
                                <?php echo e(isset($class_id)? ($class_id == $class->id? 'selected':''):''); ?>><?php echo e($class->class_name); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if($errors->has('class')): ?>
                        <span class="text-danger invalid-select" role="alert">
                            <?php echo e($errors->first('class')); ?>

                        </span>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-4 mt-30-md md_mb_20" id="select_section_div">
                        <label class="primary_input_label" for=""><?php echo e(__('common.section')); ?><span class="text-danger">
                                *</span></label>
                        <select
                            class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?> select_section"
                            id="select_section" name="section">
                            <option data-display="<?php echo app('translator')->get('common.select_section'); ?>*" value="">
                                <?php echo app('translator')->get('common.select_section'); ?> *</option>
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
</section>
<?php if(isset($allresult_data)): ?>
<section class="student-details">
    <div class="container-fluid p-0">
        <div class="row justify-content-end">
            <div class="col-lg-8 pull-right mt-2 pt-2">
                <a href="<?php echo e(route('merit-list/print', [$InputExamId, $InputClassId, $InputSectionId])); ?>"
                    class="primary-btn small fix-gr-bg pull-right" target="_blank"><i class="ti-printer"> </i>
                    <?php echo app('translator')->get('reports.print'); ?></a>
            </div>
        </div>
        <div class="white-box mt-20">
            <div class="row">
                <div class="col-lg-4 no-gutters">
                    <div class="main-title">
                        <h3 class="mb-15 mt-0"><?php echo app('translator')->get('reports.merit_list_report'); ?></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="single-report-admit">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="d-flex">
                                                <div class="offset-2">
                                                </div>
                                                <div class="col-lg-2">
                                                    <img class="logo-img" src="<?php echo e(generalSetting()->logo); ?>"
                                                        alt="<?php echo e(generalSetting()->school_name); ?>">
                                                </div>
                                                <div class="col-lg-6 ml-30">
                                                    <h3 class="text-white">
                                                        <?php echo e(isset(generalSetting()->school_name)?generalSetting()->school_name:'Infix School Management ERP'); ?>

                                                    </h3>
                                                    <p class="text-white mb-0">
                                                        <?php echo e(isset(generalSetting()->address)?generalSetting()->address:'Infix School Address'); ?>

                                                    </p>
                                                    <p class="text-white mb-0"><?php echo app('translator')->get('common.email'); ?>:
                                                        <?php echo e(isset(generalSetting()->email)?generalSetting()->email:'hello@aorasoft.com'); ?>,
                                                        <?php echo app('translator')->get('common.phone'); ?>:
                                                        <?php echo e(isset(generalSetting()->phone)?generalSetting()->phone:'+96897002784'); ?>

                                                    </p>
                                                </div>
                                                <div class="offset-2"></div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    
                                                    <div class="col-lg-8">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <h3><?php echo app('translator')->get('reports.order_of_merit_list'); ?></h3>
                                                                <p class="mb-0">
                                                                    <?php echo app('translator')->get('reports.academic_year'); ?> : <span
                                                                        class="primary-color fw-500"><?php echo e(@generalSetting()->academic_Year->year); ?></span>
                                                                </p>
                                                                <p class="mb-0">
                                                                    <?php echo app('translator')->get('reports.exam'); ?> : <span
                                                                        class="primary-color fw-500"><?php echo e($exam_name); ?></span>
                                                                </p>
                                                                <p class="mb-0">
                                                                    <?php echo app('translator')->get('common.class'); ?> : <span
                                                                        class="primary-color fw-500"><?php echo e($class_name); ?></span>
                                                                </p>
                                                                <p class="mb-0">
                                                                    <?php echo app('translator')->get('common.section'); ?> : <span
                                                                        class="primary-color fw-500"><?php echo e($section->section_name); ?></span>
                                                                </p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <h3><?php echo app('translator')->get('common.subjects'); ?></h3>
                                                                <?php $__currentLoopData = $assign_subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <p class="mb-0">
                                                                    <span
                                                                        class="primary-color fw-500"><?php echo e($subject->subject->subject_name); ?></span>
                                                                </p>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="col-lg-4 text-black">
    
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <h3 class="primary-color fw-500 text-center">
                                                <?php echo app('translator')->get('reports.order_of_merit_list'); ?></h3>
                                            
                                            <div class="table-responsive">
                                                <table class="w-100 mt-30 mb-20 table table-bordered meritList">
                                                    <thead>
                                                        <tr>
                                                            <th><?php echo app('translator')->get('common.name'); ?></th>
                                                            <th><?php echo app('translator')->get('student.admission_no'); ?></th>
                                                            <th><?php echo app('translator')->get('student.roll_no'); ?></th>
                                                            <th><?php echo app('translator')->get('reports.position'); ?></th>
                                                            <th><?php echo app('translator')->get('exam.total_mark'); ?></th>
                                                            <th><?php echo app('translator')->get('reports.gpa_without_additional'); ?></th>
                                                            <th><?php echo app('translator')->get('exam.gpa'); ?></th>
                                                            <?php $__currentLoopData = $subjectlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <th><?php echo e($subject); ?></th>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                            $i = 1; 
                                                        ?>
                                                    
                                                        <?php $__currentLoopData = $allresult_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php
                                                                $student_detail = App\SmStudent::where('id', $row->student_id)->first();
                                                                $optional_subject = App\SmOptionalSubjectAssign::where('student_id', $student_detail->id)
                                                                    ->where('session_id', $student_detail->session_id)
                                                                    ->where('academic_id', getAcademicId())
                                                                    ->first();
                                                                $optional_subject_id = $optional_subject ? $optional_subject->subject_id : null;
                                                    
                                                                $markslist = explode(',', $row->marks_string);
                                                                $get_subject_id = explode(',', $row->subjects_id_string);
                                                                $count = 0;
                                                                $additioncheck = [];
                                                                $subject_mark = [];
                                                                $total_grade_point = 0;
                                                                $total_grade_point_without_optional = 0;
                                                                $number_of_subjects = count($markslist);
                                                                $number_of_subjects_without_optional = 0;
                                                                $current_total_marks = 0;  // NEW variable to store current student's total marks
                                                            ?>
                                                    
                                                            <?php $__currentLoopData = $markslist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mark): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php
                                                                    $is_optional = App\SmOptionalSubjectAssign::is_optional_subject($row->student_id, $get_subject_id[$count]);
                                                                    $grade_gpa = DB::table('sm_marks_grades')
                                                                        ->where('percent_from', '<=', $mark)
                                                                        ->where('percent_upto', '>=', $mark)
                                                                        ->where('academic_id', getAcademicId())
                                                                        ->first();
                                                    
                                                                    $total_grade_point += @$grade_gpa->gpa;
                                                    
                                                                    if (!$is_optional) {
                                                                        $total_grade_point_without_optional += @$grade_gpa->gpa;
                                                                        $number_of_subjects_without_optional++;
                                                                    } else {
                                                                        $additioncheck[] = $mark;
                                                                    }
                                                    
                                                                    $current_total_marks += $mark;
                                                    
                                                                    $count++;
                                                                    $subject_mark[] = $mark;
                                                                ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    
                                                            <?php
                                                                $gpa = number_format((float)$total_grade_point / $number_of_subjects_without_optional, 2, '.', '');
                                                                if ($gpa > 5) {
                                                                    $gpa = 5.00;
                                                                }
                                                                $gpa_without_optional = $number_of_subjects_without_optional ? number_format((float)$total_grade_point_without_optional / $number_of_subjects_without_optional, 2, '.', '') : $failgpa;
                                                            ?>
                                                    
                                                            <tr>
                                                                <td><?php echo e($row->student_name); ?></td>
                                                                <td><?php echo e($row->admission_no); ?></td>
                                                                <td><?php echo e($row->studentinfo->roll_no); ?></td>
                                                                <td><?php echo e($key + 1); ?></td>
                                                                <td><?php echo e($current_total_marks); ?></td> <!-- Use current student's total marks -->
                                                                
                                                                <!-- GPA Without Optional -->
                                                                <td><?php echo e($gpa_without_optional); ?></td>
                                                                
                                                                <!-- GPA With All Subjects -->
                                                                <td><?php echo e(number_format($gpa, 2)); ?></td>
                                                    
                                                                <?php $__currentLoopData = $markslist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mark): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <td><?php echo e(!empty($mark) ? $mark : 0); ?></td>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tbody>
                                                    
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
        </div>
    </div>
</section>

<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php if(moduleStatusCheck('University')): ?>
<?php $__env->startPush('script'); ?>
<script>
    $( document ).ready( function () {
        $( "#select_semester_label" ).on( "change", function () {

            var url = $( "#url" ).val();
            var i = 0;
            let semester_id = $( this ).val();
            let academic_id = $( '#select_academic' ).val();
            let session_id = $( '#select_session' ).val();
            let faculty_id = $( '#select_faculty' ).val();
            let department_id = $( '#select_dept' ).val();
            let un_semester_label_id = $( '#select_semester_label' ).val();

            if ( session_id == '' ) {
                setTimeout( function () {
                    toastr.error(
                        "Session Not Found",
                        "Error ", {
                            timeOut: 5000,
                        } );
                }, 500 );

                $( "#select_semester option:selected" ).prop( "selected", false )
                return;
            }
            if ( department_id == '' ) {
                setTimeout( function () {
                    toastr.error(
                        "Department Not Found",
                        "Error ", {
                            timeOut: 5000,
                        } );
                }, 500 );
                $( "#select_semester option:selected" ).prop( "selected", false )

                return;
            }
            if ( semester_id == '' ) {
                setTimeout( function () {
                    toastr.error(
                        "Semester Not Found",
                        "Error ", {
                            timeOut: 5000,
                        } );
                }, 500 );
                $( "#select_semester option:selected" ).prop( "selected", false )

                return;
            }
            if ( academic_id == '' ) {
                setTimeout( function () {
                    toastr.error(
                        "Academic Not Found",
                        "Error ", {
                            timeOut: 5000,
                        } );
                }, 500 );
                return;
            }
            if ( un_semester_label_id == '' ) {
                setTimeout( function () {
                    toastr.error(
                        "Semester Label Not Found",
                        "Error ", {
                            timeOut: 5000,
                        } );
                }, 500 );
                return;
            }

            var formData = {
                semester_id: semester_id,
                academic_id: academic_id,
                session_id: session_id,
                faculty_id: faculty_id,
                department_id: department_id,
                un_semester_label_id: un_semester_label_id,
            };

            // Get Student
            $.ajax( {
                type: "GET",
                data: formData,
                dataType: "json",
                url: url + "/university/" + "get-university-wise-student",
                beforeSend: function () {
                    $( '#select_un_student_loader' ).addClass( 'pre_loader' ).removeClass(
                        'loader' );
                },
                success: function ( data ) {
                    var a = "";
                    $.each( data, function ( i, item ) {
                        if ( item.length ) {
                            $( "#select_un_student" ).find( "option" ).not(
                                ":first" ).remove();
                            $( "#select_un_student_div ul" ).find( "li" ).not(
                                ":first" ).remove();

                            $.each( item, function ( i, students ) {
                                console.log( students );
                                $( "#select_un_student" ).append(
                                    $( "<option>", {
                                        value: students.student.id,
                                        text: students.student
                                            .full_name,
                                    } )
                                );

                                $( "#select_un_student_div ul" ).append(
                                    "<li data-value='" +
                                    students.student.id +
                                    "' class='option'>" +
                                    students.student.full_name +
                                    "</li>"
                                );
                            } );
                        } else {
                            $( "#select_un_student_div .current" ).html(
                                "SELECT STUDENT *" );
                            $( "#select_un_student" ).find( "option" ).not(
                                ":first" ).remove();
                            $( "#select_un_student_div ul" ).find( "li" ).not(
                                ":first" ).remove();
                        }
                    } );
                },
                error: function ( data ) {
                    console.log( "Error:", data );
                },
                complete: function () {
                    i--;
                    if ( i <= 0 ) {
                        $( '#select_un_student_loader' ).removeClass( 'pre_loader' )
                            .addClass( 'loader' );
                    }
                }
            } );
        } );
    } );

</script>
<?php $__env->stopPush(); ?>
<?php endif; ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\reports\merit_list_report.blade.php ENDPATH**/ ?>
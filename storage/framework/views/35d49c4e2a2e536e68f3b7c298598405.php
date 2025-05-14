<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('reports.progress_card_report_100_percent'); ?>
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
        .profile_100{
            width: 100px;
            height: 100px;
            background-size: cover;
            background-position: center center;
            border-radius: 5px;
            background-repeat: no-repeat;
        }
        .single-report-admit .report-admit-img{
            top: 30px;
        }
    </style>
    <?php if(resultPrintStatus('vertical_boarder')): ?>
        <style>
            .single-report-admit table tr td {
                border: 1px solid rgba(130, 139, 178, 0.15) !important;
            }
            .single-report-admit table thead tr th{
                border: 1px solid rgba(130, 139, 178, 0.15) !important;
            }
            .single-report-admit table tbody tr th{
                border: 1px solid rgba(130, 139, 178, 0.15) !important;
            }

            .gray_header_table thead tr:first-child th {
                border: 1px solid rgba(130, 139, 178, 0.15) !important;
            }
            .gray_header_table thead th{
                padding-left: 10px !important;
            }
            .single-report-admit table tr td{
                padding-left: 8px !important;
            }
            .single-report-admit table tr th{
                padding: 8px !important;
            }
            .text-center th{
                text-align: center !important;
            }
            .text-center td{
                text-align: center !important;
            }
            .mark_sheet_body tr:last-child th{
                text-align: left !important;
            }
            .mark_sheet_body tr td:first-child{
                text-align: left !important;
                font-weight: bold;
            }
            .center-table tr:first-child th:first-child{
                text-align: left !important;
            }
        </style>
    <?php endif; ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('reports.progress_card_report_100_percent'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('reports.reports'); ?></a>
                <a href="#"><?php echo app('translator')->get('reports.progress_card_report_100_percent'); ?></a>
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
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'progress_card_report_search', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

                    <div class="row">
                        <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                        <input type="hidden" name="custom_mark_report" value="custom_mark_report">
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
                                    <span class="invalid-feedback invalid-select" role="alert">
                                        <strong><?php echo e($errors->first('class')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-4 mt-30-md md_mb_20" id="select_section_div">
                                <select class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?> select_section"
                                        id="select_section" name="section">
                                    <option data-display="<?php echo app('translator')->get('common.select_section'); ?> *"
                                            value=""><?php echo app('translator')->get('common.select_section'); ?> *
                                    </option>
                                </select>
                                <div class="pull-right loader loader_style" id="select_section_loader">
                                    <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>"
                                        alt="loader">
                                </div>
                                <?php if($errors->has('section')): ?>
                                    <span class="invalid-feedback invalid-select" role="alert">
                                        <strong><?php echo e($errors->first('section')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-4 mt-30-md md_mb_20" id="select_student_div">
                                <select class="primary_select form-control<?php echo e($errors->has('student') ? ' is-invalid' : ''); ?>"
                                        id="select_student" name="student">
                                    <option data-display="<?php echo app('translator')->get('common.select_student'); ?> *"
                                            value=""><?php echo app('translator')->get('common.select_student'); ?> *
                                    </option>
                                </select>
                                <div class="pull-right loader loader_style" id="select_student_loader">
                                    <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>"
                                        alt="loader">
                                </div>
                            </div>

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
                            <h3 class="mb-30 flex-fill"><?php echo app('translator')->get('reports.progress_card_report'); ?></h3>
                            <div class="print_button pull-right">
                                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'progress-card/print', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student', 'target' => '_blank'])); ?>


                                <input type="hidden" name="class_id" value="<?php echo e($class_id); ?>">
                                <input type="hidden" name="section_id" value="<?php echo e($section_id); ?>">
                                <input type="hidden" name="student_id" value="<?php echo e($studentDetails->id); ?>">
                                <input type="hidden" name="custom_mark_report" value="<?php echo e(@$custom_mark_report); ?>">

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
                                                            <div class="col-lg-8 text-center">
                                                                <h3 class="text-white" style="font-size: 30px; margin-bottom: 0px;">
                                                                    <?php echo e(isset(generalSetting()->school_name)?generalSetting()->school_name:'Infix School Management ERP'); ?>

                                                                </h3>
                                                                <p class="text-white mb-0" style="font-size: 16px;">
                                                                    <?php echo e(isset(generalSetting()->address)?generalSetting()->address:'Infix School Address'); ?>

                                                                </p>
                                                                <p class="text-white mb-0"  style="font-size: 16px;">
                                                                    <?php echo app('translator')->get('common.email'); ?>:  <?php echo e(isset(generalSetting()->email)?generalSetting()->email:'hello@aorasoft.com'); ?>,   <?php echo app('translator')->get('common.phone'); ?>:  <?php echo e(isset(generalSetting()->phone)?generalSetting()->phone:'+96897002784'); ?>

                                                                </p>
                                                            </div>
                                                        </div>
                                                <div class="report-admit-img profile_100" style="background-image: url(<?php echo e(file_exists(@$studentDetails->studentDetail->student_photo) ? asset($studentDetails->studentDetail->student_photo) : asset('public/uploads/staff/demo/staff.jpg')); ?>)"></div>

                                            </div>
                                        <div class="card-body">
                                            <div class="student_marks_table">
                                                <div class="row">
                                                    <div class="col-lg-7 text-black">

                                                        <h3>
                                                            <?php echo e($studentDetails->studentDetail->full_name); ?>

                                                        </h3>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <p class="mb-0">
                                                                    <?php echo app('translator')->get('common.academic_year'); ?> : <span class="primary-color fw-500"><?php echo e(@$studentDetails->academic->year); ?></span>
                                                                </p>
                                                                <p class="mb-0">
                                                                    <?php echo app('translator')->get('student.admission_no'); ?> : <span class="primary-color fw-500"><?php echo e($studentDetails->studentDetail->admission_no); ?></span>
                                                                </p>
                                                                <p class="mb-0">
                                                                    <?php echo app('translator')->get('student.roll'); ?> :<span class="primary-color fw-500"><?php echo e($studentDetails->roll_no); ?></span>
                                                                </p>
                                                                <p class="mb-0">
                                                                    <?php echo app('translator')->get('common.class'); ?> :<span class="primary-color fw-500"><?php echo e($studentDetails->class->class_name); ?></span>
                                                                </p>
                                                                <p class="mb-0">
                                                                    <?php echo app('translator')->get('common.section'); ?> :<span class="primary-color fw-500"><?php echo e($studentDetails->section->section_name); ?></span>
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
                                                    <div class="col-12 text-center mb-3">
                                                        <h3> <span style="border-bottom: 3px double;"><?php echo app('translator')->get('reports.progress_report'); ?></span></h3>
                                                    </div>
                                                    <table class="table mb-0 center-table">
                                                        <thead>
                                                        <tr class="text-center">
                                                            <th rowspan="<?php echo e(@generalSetting()->result_type == 'mark' ? '1' : '2'); ?>"><?php echo app('translator')->get('common.subjects'); ?></th>
                                                            <?php $__currentLoopData = $assinged_exam_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assinged_exam_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php
                                                                    $exam_type = App\SmExamType::examType($assinged_exam_type);
                                                                ?>
                                                                <th colspan="<?php echo e((@generalSetting()->result_type == 'mark')? 1: 1); ?>"><?php echo e($exam_type->title); ?></th>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <th rowspan="<?php echo e(@generalSetting()->result_type == 'mark' ? '1' : '2'); ?>"><?php echo app('translator')->get('exam.total'); ?></th>
                                                                <th rowspan="<?php echo e(@generalSetting()->result_type == 'mark' ? '1' : '2'); ?>"><?php echo app('translator')->get('exam.average'); ?></th>
                                                                <th rowspan="<?php echo e(@generalSetting()->result_type == 'mark' ? '1' : '2'); ?>"><?php echo app('translator')->get('exam.letter_grade'); ?></th>
                                                        </tr>
                                                        <tr class="text-center">
                                                            <?php if(@generalSetting()->result_type == 'mark'): ?>
                                                                <th rowspan="2"></th>
                                                            <?php endif; ?>
                                                            <?php $__currentLoopData = $assinged_exam_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assinged_exam_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <th><?php echo app('translator')->get('exam.marks'); ?></th>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        </tr>
                                                        </thead>
                                                        <tbody class="mark_sheet_body">
                                                        <?php
                                                            $total_fail = 0;
                                                            $total_marks = 0;
                                                            $gpa_with_optional_count=0;
                                                            $gpa_without_optional_count=0;
                                                            $value=0;
                                                            $total_subject = 0;
                                                            $totalGpa  = 0;
                                                            $all_exam_type_full_mark=0;
                                                            $total_additional_subject_gpa=0;
                                                            $totalavgMarkAddition=0;
                                                            $totalavgMarkAddition=0;
                                                            $temp_grade=[];
                                                            $temp_gpa=0;
                                                        ?>
                                                        <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr class="text-center">
                                                                <?php if($optional_subject_setup!='' && $student_optional_subject!=''): ?>
                                                                    <?php if($student_optional_subject->subject_id==$data->subject->id): ?>
                                                                        <td><?php echo e($data->subject !=""?$data->subject->subject_name:""); ?> (<?php echo app('translator')->get('common.optional'); ?>)</td>
                                                                    <?php else: ?>
                                                                        <td><?php echo e($data->subject !=""?$data->subject->subject_name:""); ?></td>
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    <td><?php echo e($data->subject !=""?$data->subject->subject_name:""); ?></td>
                                                                <?php endif; ?>
                                                                <?php
                                                                $totalSumSub = 0;
                                                                $totalSubjectFail = 0;
                                                                $TotalSum = 0;
                                                                foreach($assinged_exam_types as $assinged_exam_type){
                                                                $mark_parts = App\SmAssignSubject::getNumberOfPart($data->subject_id, $class_id, $section_id, $assinged_exam_type);
                                                                $result = App\SmResultStore::GetResultBySubjectId($class_id, $section_id, $data->subject_id, $assinged_exam_type, $studentDetails->id);

                                                                if (!empty($result)) {
                                                                    $final_results = App\SmResultStore::GetFinalResultBySubjectId($class_id, $section_id, $data->subject_id, $assinged_exam_type, $studentDetails->id);

                                                                    $term_base = App\SmResultStore::termBaseMark($class_id, $section_id, $data->subject_id, $assinged_exam_type, $studentDetails->id);
                                                                }
                                                                $total_subject += $assinged_exam_type;
                                                                $subject_full_mark = subjectFullMark($assinged_exam_type, $data->subject_id, $class_id, $section_id);
                                                                $total_additional_subject_gpa += @$optional_subject_setup->gpa_above;
                                                                if($result->count() > 0){
                                                                ?>
                                                                <?php
                                                                    if(@generalSetting()->result_type == 'mark'){
                                                                        $all_exam_type_full_mark += subject100PercentMark();
                                                                    }else{
                                                                        $all_exam_type_full_mark += 100;
                                                                    }
                                                                ?>

                                                                <td>
                                                                    <?php
                                                                        if($final_results != ""){
                                                                            if(@generalSetting()->result_type == 'mark'){
                                                                                $totalMark = subjectPercentageMark(@$final_results->total_marks, $subject_full_mark);
                                                                                echo $totalMark;
                                                                                $totalSumSub += $totalMark;
                                                                                $total_marks += $totalMark;
                                                                            }else{
                                                                                //echo subjectPercentageMark(@$final_results->total_marks, $subject_full_mark);
                                                                                $mark_each = subjectPercentageMark( @$final_results->total_marks, $subject_full_mark);
                                                                                echo number_format($mark_each,2);
                                                                                $totalSumSub += subjectPercentageMark(@$final_results->total_marks, $subject_full_mark);
                                                                                $total_marks += subjectPercentageMark(@$final_results->total_marks, $subject_full_mark);
                                                                            }
                                                                            $totalGpa += $final_results->total_gpa_point;
                                                                        }else{
                                                                            echo 0;
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <?php
                                                                }else{ ?>
        
                                                                        <td>-</td>
                                                                        <?php
                                                                        }
                                                                    }
                                                                ?>
                                                                <td><?php echo e(number_format($totalSumSub,2)); ?></td>
                                                                <td>
                                                                    <?php echo e(number_format($totalSumSub / count($assinged_exam_types), 2)); ?>

                                                                    <?php
                                                                        $totalavgMarkAddition += number_format($totalSumSub / count($assinged_exam_types), 2);
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                        $temp_grade[]=getGrade(number_format($totalSumSub / count($assinged_exam_types), 2));
                                                                        $temp_gpa +=markGpa(number_format($totalSumSub / count($assinged_exam_types), 2))->gpa;
                                                                        echo getGrade(number_format($totalSumSub / count($assinged_exam_types), 2));
                                                                    ?>
                                                                </td>
                                                                <?php
                                                                    if($totalSubjectFail > 0){
                                                                    }else{
                                                                        $totalSumSub = $totalSumSub / count($assinged_exam_types);
                                                                    }
                                                                ?>
                                                            </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php
                                                            $colspan = 4 + count($assinged_exam_types) * 2;
                                                            if ($optional_subject_setup!='') {
                                                            $col_for_result=3;
                                                            } else {
                                                                $col_for_result=2;
                                                            }
                                                        ?>
                                                        <tr class="text-center">

                                                            <?php
                                                                $term_base_gpa  = 0;
                                                                $average_gpa  = 0;
                                                                $with_percent_average_gpa  = 0;
                                                                $optional_subject_total_gpa  = 0;
                                                                $optional_subject_total_above_gpa  = 0;
                                                                $without_additional_subject_total_gpa  = 0;
                                                                $with_additional_subject_addition  = 0;
                                                                $with_optional_percentage  = 0;
                                                                $total_with_optional_percentage  = 0;
                                                                $total_with_optional_subject_extra_gpa  = 0;
                                                                $optional_subject_mark= 0;
                                                            ?>
                                                            <?php $__currentLoopData = $assinged_exam_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assinged_exam_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php
                                                                    $exam_type = App\SmExamType::examType($assinged_exam_type);
                                                                    $term_base_gpa=termWiseGpa($assinged_exam_type, $studentDetails->id);
                                                                    $with_percent_average_gpa +=$term_base_gpa;

                                                                    $term_base_full_mark=termWiseTotalMark($assinged_exam_type, $studentDetails->id);
                                                                    $average_gpa+=$term_base_full_mark;

                                                                    if($optional_subject_setup!='' && $student_optional_subject!=''){

                                                                        $optional_subject_gpa = optionalSubjectFullMark($assinged_exam_type,$studentDetails->id,@$optional_subject_setup->gpa_above,"optional_sub_gpa");
                                                                        $optional_subject_total_gpa += $optional_subject_gpa;

                                                                        $optional_subject_above_gpa = optionalSubjectFullMark($assinged_exam_type,$studentDetails->id,@$optional_subject_setup->gpa_above,"with_optional_sub_gpa");
                                                                        $optional_subject_total_above_gpa += $optional_subject_above_gpa;

                                                                        $without_subject_gpa = optionalSubjectFullMark($assinged_exam_type,$studentDetails->id,@$optional_subject_setup->gpa_above,"without_optional_sub_gpa");
                                                                        $without_additional_subject_total_gpa += $without_subject_gpa;

                                                                        $with_additional_subject_gpa = termWiseAddOptionalMark($assinged_exam_type, $studentDetails->id, @$optional_subject_setup->gpa_above);
                                                                        $with_additional_subject_addition += $with_additional_subject_gpa;

                                                                    $with_optional_percentages=termWiseGpa($assinged_exam_type, $studentDetails->id, @$with_optional_subject_extra_gpa);
                                                                    $total_with_optional_percentage += $with_optional_percentages;
                                                                }
                                                            ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </tr>
                                                        </tbody>
                                                    </table>

                                                    <table style="max-width: 400px; margin-bottom: 20px" class="table border_table gray_header_table mb_30 max-width-400 ml-auto mr-auto report_table ;  <?php if(resultPrintStatus('vertical_boarder')): ?> mt-5 <?php endif; ?>">
                                                        <tbody>
                                                        
                                                        <tr>
                                                            <td colspan="<?php echo e($colspan / $col_for_result - 1); ?>" ><?php echo app('translator')->get('exam.total_marks'); ?></td>
                                                            <?php if($optional_subject_setup!='' && $student_optional_subject!=''): ?>
                                                                <td colspan="<?php echo e($colspan / $col_for_result + 7); ?>" style="padding:10px; font-weight:bold"><?php echo e(number_format($total_marks,2)); ?> <?php echo app('translator')->get('reports.out_of'); ?> <?php echo e($all_exam_type_full_mark); ?></td>
                                                                <?php else: ?>
                                                                <td colspan="<?php echo e($colspan / $col_for_result + 9); ?>" style="padding:10px; font-weight:bold"><?php echo e(number_format($total_marks,2)); ?> <?php echo app('translator')->get('reports.out_of'); ?> <?php echo e($all_exam_type_full_mark); ?></td>
                                                            <?php endif; ?>
                                                        </tr>
                                                        
                                                        <?php if(@generalSetting()->result_type != 'mark'): ?>
                                                            <tr>
                                                                <?php if($optional_subject_setup!='' && $student_optional_subject!=''): ?>
                                                                    <td colspan="<?php echo e($colspan / $col_for_result - 1); ?>" >
                                                                        <?php echo app('translator')->get('reports.optional_total_gpa'); ?>
                                                                        <hr>
                                                                        <?php echo app('translator')->get('reports.gpa_above'); ?> <?php echo e(@$optional_subject_setup->gpa_above); ?>

                                                                    </td>
                                                                    <td colspan="<?php echo e($colspan / $col_for_result + 7); ?>"

                                                                        style="padding:10px; font-weight:bold">
                                                                        <?php echo e($optional_subject_total_gpa); ?>

                                                                        <hr>
                                                                        <?php echo e($optional_subject_total_above_gpa); ?>

                                                                    </td>
                                                                <?php endif; ?>
                                                            </tr>
                                                            <?php
                                                                if ($optional_subject_mark) {
                                                                    $total_marks_without_optional=$total_marks-$optional_subject_mark;
                                                                    $op_subject_count=count($subjects)-1;
                                                                }else{
                                                                    $total_marks_without_optional=$total_marks;
                                                                    $op_subject_count=count($subjects);
                                                                }
                                                            ?>
                                                            <tr>
                                                                <td colspan="<?php echo e($colspan / $col_for_result - 1); ?>"><?php echo app('translator')->get('reports.gpa'); ?></td>
                                                                <?php if($optional_subject_setup!='' && $student_optional_subject!=''): ?>
                                                                    <td colspan="4"
                                                                        style="padding:10px; font-weight:bold">
                                                                        <?php echo e(gradeName(number_format($total_with_optional_percentage,2,'.',''))); ?>

                                                                    </td>
                                                                    <td colspan="3" style="padding:10px;"><?php echo app('translator')->get('reports.without_additional_gpa'); ?></td>
                                                                    <td colspan="2" style="padding:10px;">
                                                                        <?php echo e(gradeName(number_format($with_percent_average_gpa,2,'.',''))); ?>

                                                                    </td>
                                                                <?php else: ?>
                                                                    <td colspan="<?php echo e($colspan / $col_for_result + 9); ?>" style="padding:10px; font-weight:bold">
                                                                        <?php
                                                                            if(in_array($failgpaname->grade_name,$temp_grade)){
                                                                                echo $failgpaname->gpa;
                                                                            }else{
                                                                                $ttl = $temp_gpa / count($subjects);
                                                                                if($max_gpa < $ttl){
                                                                                    echo number_format($max_gpa,2,'.','');
                                                                                }else{
                                                                                    echo number_format($ttl,2,'.','');
                                                                                }
                                                                            }
                                                                        ?>
                                                                    </td>
                                                                <?php endif; ?>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td colspan="<?php echo e($colspan / $col_for_result - 1); ?>"><?php echo app('translator')->get('exam.grade'); ?></td>
                                                                <?php if($optional_subject_setup!='' && $student_optional_subject!=''): ?>
                                                                    <td colspan="4" style="padding:10px;">
                                                                        <?php echo e(number_format($total_with_optional_percentage,2,'.','')); ?>

                                                                    </td>
                                                                    <td colspan="3" style="padding:10px;"><?php echo app('translator')->get('reports.without_additional_grade'); ?></td>
                                                                    <td colspan="2" style="padding:10px;">
                                                                        <?php echo e(number_format($with_percent_average_gpa,2,'.','')); ?>

                                                                    </td>
                                                                <?php else: ?>
                                                                    <td colspan="<?php echo e($colspan / $col_for_result + 9); ?>" style="padding:10px;">
                                                                        <?php
                                                                            if(in_array($failgpaname->grade_name,$temp_grade)){
                                                                                echo $failgpaname->grade_name;
                                                                            }else{
                                                                                $ttl = $temp_gpa / count($subjects);
                                                                                if($max_gpa < $ttl){
                                                                                    echo $maxgpaname->grade_name;
                                                                                }else{
                                                                                    echo getGradeUpdate($temp_gpa / count($subjects))->grade_name;
                                                                                }
                                                                            }
                                                                        ?>
                                                                    </td>
                                                                <?php endif; ?>

                                                            </tr>
                                                            
                                                            
                                                            
                                                            <tr>
                                                                <?php if($optional_subject_setup!='' && $student_optional_subject!=''): ?>
                                                                    <td colspan="<?php echo e($colspan / $col_for_result - 1); ?>">
                                                                        <?php echo app('translator')->get('homework.evaluation'); ?>
                                                                    </td>
                                                                    <td colspan="<?php echo e($colspan / $col_for_result + 7); ?>">
                                                                        <?php echo e(remarks(number_format($total_with_optional_percentage,2,'.',''))); ?>

                                                                    </td>
                                                                <?php else: ?>
                                                                    <td colspan="<?php echo e($colspan / $col_for_result - 1); ?>">
                                                                        <?php echo app('translator')->get('homework.evaluation'); ?>
                                                                    </td>
                                                                    <td colspan="<?php echo e($colspan / $col_for_result + 9); ?>">
                                                                        <?php echo e(remarks(markGpa(number_format($totalavgMarkAddition / $op_subject_count))->gpa)); ?>

                                                                    </td>
                                                                <?php endif; ?>
                                                            </tr>
                                                            
                                                        <?php endif; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <?php
                                                    $examReportSignature = examReportSignatures();
                                                ?>
                                                <?php if($examReportSignature->count() > 1 || !$exam_content): ?>
                                                    <div style="margin-top:auto; margin-bottom:20px; display: flex; justify-content: <?php echo e($examReportSignature->count() == 1 ? 'flex-end' : 'space-between'); ?>; flex-wrap: wrap; align-items: center;">
                                                        <?php $__currentLoopData = $examReportSignature; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $signature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div style="text-align: right; display: flex; align-items: center; justify-content: center; margin-right: 24px; flex-direction: column">
                                                                <div>
                                                                    <img src="<?php echo e(asset($signature->signature)); ?>" width="150px" height="40px"
                                                                         alt="<?php echo e($signature->title); ?>">
                                                                </div>
                                                                <p style="margin-top:8px; text-align: center; width: 100%; border-top: 1px solid rgba(67, 89, 187, 0.15) !important">
                                                                    <?php echo e($signature->title); ?>

                                                                </p>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if($exam_content): ?>
                                                    <table style="width:100%;  <?php if($examReportSignature->count() > 1): ?> border-top: 1px solid #000 !important; <?php else: ?>  margin-top: auto; <?php endif; ?>"
                                                           <?php if($examReportSignature->count() == 1): ?>class="border-0 mt-auto" <?php endif; ?>>
                                                        <tbody>
                                                        <tr>
                                                            <td class="border-0" style="border: 0 !important;">
                                                                <p class="result-date"
                                                                   style="text-align:left; float:left; <?php if($examReportSignature->count() == 1): ?>  margin-top:50px; <?php endif; ?> display:inline-block; padding-left: 0; color: #000;">
                                                                    <?php echo app('translator')->get('exam.date_of_publication_of_result'); ?> :
                                                                    <strong>
                                                                        <?php echo e(dateConvert(@$exam_content->publish_date)); ?>

                                                                    </strong>
                                                                </p>
                                                            </td>
                                                            <td class="border-0" style="border: 0 !important;">
                                                                <?php if($examReportSignature->count() == 1): ?>
                                                                    <div class="text-right d-flex flex-column justify-content-end">
                                                                        <div class="thumb text-right">
                                                                            <img src="<?php echo e(asset(@$examReportSignature->first()->signature)); ?>" width="100px">
                                                                        </div>
                                                                        <p style="text-align:right; float:right; display:inline-block; margin-top:5px;">
                                                                            (<?php echo e(@$examReportSignature->first()->title); ?>)
                                                                        </p>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                <?php endif; ?>
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

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\reports\custom_percent_progress_card_report.blade.php ENDPATH**/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo app('translator')->get('exam.mark_sheet_report'); ?></title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            margin: 0;
            padding: 0;
            -webkit-print-color-adjust: exact !important;
            color-adjust: exact;
        }

        table {
            border-collapse: collapse;
        }

        h1, h2, h3, h4, h5, h6 {
            margin: 0;
        }

        @media print {
            .invoice {
                height: 1350px;
            }
        }

        .invoice_wrapper {
            width: 1100px;
            height: 100%;
            margin: auto;
            background: #fff;
            padding: 20px;
        }

        .meritTableBody, .meritTableBodyCustomReport {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
        }

        .border_none {
            border: 0px solid transparent;
            border-top: 0px solid transparent !important;
        }

        .invoice_part_iner {
            background-color: #fff;
        }

        .invoice_part_iner h4 {
            font-size: 30px;
            font-weight: 500;
            margin-bottom: 40px;

        }

        .invoice_part_iner h3 {
            font-size: 25px;
            font-weight: 500;
            margin-bottom: 5px;

        }

        .table_border thead {
            background-color: #F6F8FA;
        }

        .table_border tr {
            border-bottom: 1px solid #dee2e6 !important;
        }

        th p span, td p span {
            color: #212E40;
        }

        p {
            font-size: 14px;
        }

        h5 {
            font-size: 12px;
            font-weight: 500;
        }

        h6 {
            font-size: 10px;
            font-weight: 300;
        }

        .mt_40 {
            margin-top: 40px !important;
        }

        .table_style th, .table_style td {
            padding: 20px;
        }

        .invoice_info_table td {
            font-size: 10px;
            padding: 0px;
        }

        .invoice_info_table td h6 {
            color: #6D6D6D;
            font-weight: 400;
        }

        .text_right {
            text-align: right;
        }

        .virtical_middle {
            vertical-align: middle !important;
        }

        .thumb_logo {
            max-width: 120px;
        }

        .thumb_logo img {
            width: 100%;
        }

        .line_grid {
            display: flex;
            grid-gap: 10px;
            font-weight: 500;
            font-weight: 600;
            color: #000;
            font-size: 14px
        }

        .line_grid span {
            font-weight: 500;
        }

        .line_grid span {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex: 150px 0 0;
        }

        .line_grid span:first-child {
            font-weight: 500;
            color: #000;
            font-size: 14px;
        }

        p {
            margin: 0;
        }

        .font_18 {
            font-size: 18px;
        }

        .mb-0 {
            margin-bottom: 0;
        }

        .mb_30 {
            margin-bottom: 30px !important;
        }

        .border_table thead tr th {
            padding: 12px 10px;
        }

        .border_table tbody tr td {
            text-align: left;
            border: 0;
            color: #000;
            padding: 8px 8px;
            font-weight: 400;
            font-size: 12px;
        }


        .logo_img {
            display: flex;
            align-items: center;
            background: url(<?php echo e(asset('public/backEnd/img/report-admit-bg.png')); ?>) no-repeat center;
            background-size: auto;
            background-size: cover;
            border-radius: 5px 5px 0px 0px;
            border: 0;
            padding: 20px;
            background-repeat: no-repeat;
            background-position: center center;
        }

        .logo_img h3 {
            font-size: 25px;
            margin-bottom: 5px;
            color: #fff;
        }

        .logo_img h5 {
            font-size: 16px;
            margin-bottom: 0;
            color: #fff;
        }

        .company_info {
            width: 100%;
            text-align: center;
        }

        .table_title {
            text-align: center;
        }

        .table_title h3 {
            font-size: 24px;
            text-transform: uppercase;
            margin-top: 15px;
            font-weight: 500;
            display: inline-block;
            border-bottom: 2px solid #415094;
        }

        .gray_header_table {
            /* border: 1px solid #DDDDDD; */
        }

        .max-width-400 {
            width: 400px;
        }

        .max-width-500 {
            width: 500px;
        }

        .max-width-550 {
            width: 550px;
        }

        .ml_auto {
            margin-left: auto;
            margin-right: 0;
        }

        .mr_auto {
            margin-left: 0;
            margin-right: auto;
        }

        .margin-auto {
            margin: 0 auto;
        }

        .thumb.text-right {
            text-align: right;
        }

        .profile_thumb {
            flex-grow: 0;
            text-align: right;
        }

        .line_grid .student_name {
            font-weight: 500;
            font-size: 14px;
            color: #000;
        }

        .line_grid span {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex: 150px 0 0;
        }

        .line_grid.line_grid2 span {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex: 150px 0 0;
        }

        .student_name_highlight {
            font-weight: 500;
            color: #000;
            line-height: 1.5;
            font-size: 20px;
            text-transform: uppercase;

        }

        .table td, .table th {
            padding: 5px 0;
            vertical-align: top;
            border-top: 0 solid transparent;
            color: #000;
        }

        .report_table th {
            border: 1px solid #dee2e6;
            color: #000;
            font-weight: 500;
            text-transform: uppercase;
            vertical-align: middle;
            font-size: 12px;
        }

        .report_table th, .report_table td {
            background: transparent !important;
        }

        .gray_header_table thead th {
            text-transform: uppercase;
            font-size: 12px;
            color: #000;
            font-weight: 500;
            text-align: left;
            border-bottom: 1px solid #a2a8c5;
            padding: 5px 0px;
            background: transparent !important;
            border-bottom: 1px solid #000 !important;
            padding-left: 0px !important;
        }

        .gray_header_table {
            border: 0;
        }

        .gray_header_table tbody td, .gray_header_table tbody th {
            border-bottom: 1px solid #000 !important;
            text-align: left;
        }

        .max-width-400 {
            width: 400px;
        }

        .max-width-500 {
            width: 500px;
        }

        .ml_auto {
            margin-left: auto;
            margin-right: 0;
        }

        .mr_auto {
            margin-left: 0;
            margin-right: auto;
        }

        .margin-auto {
            margin: auto;
        }

        .thumb.text-right {
            text-align: right;
        }

        .tableInfo_header {
            background: url(<?php echo e(asset('public/backEnd/')); ?>/img/report-admit-bg.png) no-repeat center;
            background-size: cover;
            border-radius: 5px 5px 0px 0px;
            border: 0;
            padding: 30px 30px;
        }

        .tableInfo_header td {
            padding: 30px 40px;
        }

        .company_info p {
            font-size: 14px;
            color: #fff;
            font-weight: 400;
            margin-bottom: 10px;
        }

        .company_info h3 {
            font-size: 30px;
            color: #fff;
            font-weight: 500;
            margin-bottom: 0px
        }

        .meritTableBody {
            padding: 30px;
            background: -webkit-linear-gradient(
                    90deg, #d8e6ff 0%, #ecd0f4 100%);
            background: -moz-linear-gradient(90deg, #d8e6ff 0%, #ecd0f4 100%);
            background: -o-linear-gradient(90deg, #d8e6ff 0%, #ecd0f4 100%);
            background: linear-gradient(
                    90deg, #d8e6ff 0%, #ecd0f4 100%);
        }

        .meritTableBodyCustomReport {
            padding: 30px;
        }

        .subject_title {
            font-size: 18px;
            font-weight: 600;
            font-weight: 500;
            color: #415094;
            line-height: 1.5;
        }

        .subjectList {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-column-gap: 40px;
            grid-row-gap: 9px;
            margin: 0;
            padding: 0;

        }

        .subjectList li {
            list-style: none;
            color: #828bb2;
            font-size: 14px;
            font-weight: 400
        }

        .table_title {
            font-weight: 500;
            color: #415094;
            line-height: 1.5;
            font-size: 18px;
            text-align: left
        }

        .gradeTable_minimal.border_table tbody tr td {
            text-align: left !important;
            border: 0;
            color: #000;
            padding: 8px 8px;
            font-weight: 400;
            font-size: 12px;
            padding: 3px 8px;
        }

        .profile_thumb img {
            border-radius: 5px;
        }

        .gray_header_table thead tr:first-child th {
            border: 0 !important;
            font-weight: bold;
        }

        .gray_header_table thead tr:last-child th {
            border-bottom: 1px solid #000 !important;
        }

        .profile_100 {
            width: 100px;
            height: 100px;
            background-size: cover;
            background-position: center center;
            border-radius: 5px;
            background-repeat: no-repeat;
            margin-left: auto;
        }

        .custom_result_print {
            background-image: none;
        }

        .custom_result_print h3, .custom_result_print h5 {
            color: black;
        }
    </style>
    <?php if(resultPrintStatus('vertical_boarder')): ?>
        <style>
            .gray_header_table tbody td, .gray_header_table tbody th {
                border: 1px solid #000 !important;
            }

            .single-report-admit table tr td {
                border: 1px solid #000 !important;
            }

            .border_table tbody tr td {
                border: 1px solid #000 !important;
            }

            .border_table thead tr th {
                border: 1px solid #000;
                font-weight: bold;
            }

            .gray_header_table thead tr:first-child th {
                border: 1px solid #000 !important;
            }

            .gray_header_table thead th {
                padding-left: 10px !important;
            }

            .align-center thead th {
                text-align: center !important;
            }

            .align-center tbody td {
                text-align: center !important;
            }

            .align-center tbody th {
                text-align: center !important;
            }

            .align-center thead th:first-child {
                text-align: left !important;
            }

            .align-center tbody tr th:first-child {
                text-align: left !important;
                padding-left: 10px;
            }

            .align-center tbody tr td:last-child {
                text-align: left !important;
            }
        </style>
    <?php endif; ?>
</head>

<body >
<div class="invoice_wrapper">
    <!-- invoice print part here -->
    <div class="invoice_print">
        <div class="container">
            <div class="invoice_part_iner">
                <table class="table border_bottom mb-0">
                    <thead>
                    <td style="padding: 0">
                        <div class="<?php echo e((resultPrintStatus('header'))? "logo_img": "logo_img custom_result_print"); ?>">
                            <div class="thumb_logo">
                                <img src="<?php echo e(asset('/')); ?><?php echo e(generalSetting()->logo); ?>"
                                     alt="<?php echo e(generalSetting()->school_name); ?>">
                            </div>
                            <div class="company_info">
                                <h3><?php echo e(isset(generalSetting()->school_name)?generalSetting()->school_name:'Infix School Management ERP'); ?> </h3>
                                <h5><?php echo e(isset(generalSetting()->address)?generalSetting()->address:'Infix School Address'); ?></h5>
                                <h5>
                                    <?php echo app('translator')->get('common.email'); ?>
                                    : <?php echo e(isset(generalSetting()->email)?generalSetting()->email:'hello@aorasoft.com'); ?>

                                    <?php echo app('translator')->get('common.phone'); ?>
                                    : <?php echo e(isset(generalSetting()->phone)?generalSetting()->phone:'+96897002784'); ?>

                                </h5>
                            </div>

                            <?php if(resultPrintStatus('image')): ?>
                                <div class="profile_thumb profile_100">
                                    <img class="report-admit-img"
                                         src="<?php echo e(file_exists(@$studentDetails->studentDetail->student_photo) ? asset($studentDetails->studentDetail->student_photo) : asset('public/uploads/staff/demo/staff.jpg')); ?>"
                                         alt="<?php echo e($student_detail->studentDetail->full_name); ?>" width="100"
                                         height="100">
                                </div>
                            <?php endif; ?>
                        </div>
                    </td>
                    </thead>
                </table>


            </div>
        </div>
    </div>
    <div class="<?php echo e((resultPrintStatus('body'))? "meritTableBody": "meritTableBodyCustomReport"); ?>">
        <!-- middle content  -->

        <table class="table" style="margin-bottom: 0px">
            <tbody>

            <tr>
                <td>
                    <!-- single table  -->
                    <table class="mb_30 mr_auto" style="width: 100%">
                        <tbody>
                        <tr>
                            <td>
                                <div class="student_name_highlight">
                                    <h4><?php echo e($student_detail->studentDetail->full_name); ?></h4>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="line_grid line_grid2">
                                                <span>
                                                    <span><?php echo app('translator')->get('common.academic_year'); ?></span>
                                                    <span>:</span>
                                                </span>

                                    <?php echo e(@$student_detail->academic->year); ?>

                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="line_grid">
                                                <span>
                                                    <span><?php echo app('translator')->get('common.class'); ?></span>
                                                    <span>:</span>
                                                </span>
                                    <span class="student_name bold_text">
                                                    <?php echo e($student_detail->class->class_name); ?>

                                                </span>
                                </p>
                            </td>
                        </tr>

                        <tr>

                            <td>
                                <p class="line_grid">
                                                <span>
                                                    <span><?php echo app('translator')->get('common.section'); ?></span>
                                                    <span>:</span>
                                                </span>
                                    <?php echo e($student_detail->section->section_name); ?>

                                </p>
                            </td>
                        </tr>


                        <tr>

                            <td>
                                <p class="line_grid">
                                                <span>
                                                    <span><?php echo app('translator')->get('student.admission_no'); ?></span>
                                                    <span>:</span>
                                                </span>
                                    <span class="student_name bold_text">
                                                    <?php echo e($student_detail->studentDetail->admission_no); ?>

                                                </span>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="line_grid">
                                                <span>
                                                    <span><?php echo app('translator')->get('student.roll_no'); ?></span>
                                                    <span>:</span>
                                                </span>
                                    <span class="student_name bold_text">
                                                    <?php echo e($student_detail->roll_no); ?>

                                                </span>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="line_grid">
                                                <span>
                                                    <span><?php echo app('translator')->get('common.date_of_birth'); ?></span>
                                                    <span>:</span>
                                                </span>
                                    <?php echo e($student_detail->studentDetail->date_of_birth != ""? dateConvert($student_detail->studentDetail->date_of_birth):''); ?>

                                </p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <!--/ single table  -->
                </td>
                <td>
                    <!-- single table  -->
                    <?php
                        $generalsettingsResultType = generalSetting()->result_type;
                    ?>
                    <?php if(@$grades): ?>
                        <table class="table border_table gray_header_table max-width-400 ml_auto gradeTable_minimal">
                            <thead>
                            <tr>
                                <th><?php echo app('translator')->get('exam.starting'); ?></th>
                                <th><?php echo app('translator')->get('reports.ending'); ?></th>
                                <?php if(@$generalsettingsResultType != 'mark'): ?>
                                    <th><?php echo app('translator')->get('exam.gpa'); ?></th>
                                    <th><?php echo app('translator')->get('exam.grade'); ?></th>
                                <?php endif; ?>
                                <th><?php echo app('translator')->get('homework.evalution'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade_d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($grade_d->percent_from); ?></td>
                                    <td><?php echo e($grade_d->percent_upto); ?></td>
                                    <?php if(@$generalsettingsResultType != 'mark'): ?>
                                        <td><?php echo e($grade_d->gpa); ?></td>
                                        <td><?php echo e($grade_d->grade_name); ?></td>
                                    <?php endif; ?>
                                    <td><?php echo e($grade_d->description); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                    <!--/ single table  -->
                </td>
            </tr>
            </tbody>
        </table>



        <!-- invoice print part end -->

        <div class="student_name_highlight" style="text-align: center; margin-bottom: 20px;">
            <h3 style="font-size: 20px"><?php echo e($exam_details->title); ?></h3>
            <h4><span style="border-bottom: 3px double; font-size: 20px"><?php echo app('translator')->get('reports.mark_sheet'); ?></span></h4>
        </div>
        <table class="table gray_header_table mb-0 border_table" >
            <thead>

            <tr>
                <th><?php echo app('translator')->get('exam.subject_name'); ?></th>
                <th><?php echo app('translator')->get('exam.total_mark'); ?></th>
                <th><?php echo app('translator')->get('exam.highest_marks'); ?></th>
                <th><?php echo app('translator')->get('exam.obtained_marks'); ?></th>
                <?php if(@$generalsettingsResultType != 'mark'): ?>
                    <th><?php echo app('translator')->get('reports.letter_grade'); ?></th>
                <?php endif; ?>
                <th><?php echo app('translator')->get('reports.remarks'); ?></th>
                <?php if(@$generalsettingsResultType == 'mark'): ?>
                    <th><?php echo app('translator')->get('homework.evaluation'); ?></th>
                    <th><?php echo app('translator')->get('exam.pass_fail'); ?></th>
                <?php endif; ?>
            </tr>
            </thead>
            <tbody>
            <?php
                $main_subject_total_gpa=0;
                $Optional_subject_count=0;
                    if($optional_subject!=''){
                        $Optional_subject_count=$subjects->count()-1;
                    }else{
                        $Optional_subject_count=$subjects->count();
                    }
                    
                $sum_gpa= 0;
                $resultCount=1;
                $subject_count=1;
                $tota_grade_point=0;
                $this_student_failed=0;
                $count=1;
                $total_mark=0;
                $temp_grade=[];
                $optional_countable_gpa  = 0;
                $average_passing_mark = averagePassingMark($exam_type_id);
            ?>
            <?php $__currentLoopData = $mark_sheet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $temp_grade[]=$data->total_gpa_grade;
                    if ($data->subject_id==$optional_subject) {
                        continue;
                    }
                ?>
                <tr>
                    <td><?php echo e($data->subject->subject_name); ?></td>
                    <td>
                        <?php if(@$generalsettingsResultType == 'mark'): ?>
                            <?php echo e(subject100PercentMark()); ?>

                        <?php else: ?>
                            <?php echo e(@subjectFullMark($exam_details->id, $data->subject->id, $class_id, $section_id )); ?>

                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if(@$generalsettingsResultType == 'mark'): ?>
                            <?php echo e(subjectPercentageMark(@subjectHighestMark($exam_type_id, $data->subject->id, $class_id, $section_id), @subjectFullMark($exam_details->id, $data->subject->id, $class_id, $section_id))); ?>

                        <?php else: ?>
                            <?php echo e(@subjectHighestMark($exam_type_id, $data->subject->id, $class_id, $section_id)); ?>

                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if(@$generalsettingsResultType == 'mark'): ?>
                            <?php echo e(@singleSubjectMark($data->student_record_id,$data->subject_id,$data->exam_type_id)[0]); ?>

                            <?php
                                $total_mark+=@singleSubjectMark($data->student_record_id,$data->subject_id,$data->exam_type_id)[0];
                            ?>
                        <?php else: ?>
                            <?php echo e(@$data->total_marks); ?>

                        <?php endif; ?>
                    </td>
                    <?php if(@$generalsettingsResultType != 'mark'): ?>
                        <td>
                            <?php
                                $result = markGpa(@subjectPercentageMark(@$data->total_marks , @subjectFullMark($exam_details->id, $data->subject->id, $class_id, $section_id)));
                                $main_subject_total_gpa += $result->gpa;
                                $total_mark+=@$data->total_marks;
                            ?>
                            <?php echo e(@$data->total_gpa_grade); ?>

                        </td>
                    <?php endif; ?>
                    <td><?php echo e(@$data->teacher_remarks); ?></td>
                    <?php if(@$generalsettingsResultType == 'mark'): ?>
                        <td>
                            <?php
                                $evaluation= markGpa(subjectPercentageMark(@$data->total_marks, @subjectFullMark($exam_details->id, $data->subject->id, $class_id, $section_id)));
                            ?>
                            <?php echo e(@$evaluation->description); ?>

                        </td>
                        <td>
                            <?php
                                $totalMark = subjectPercentageMark(@$data->total_marks, @subjectFullMark($exam_details->id, $data->subject->id, $class_id, $section_id));
                                $passMark = $data->subject->pass_mark;
                            ?>
                            <?php if($passMark <= $totalMark): ?>
                                <?php echo app('translator')->get('exam.pass'); ?>
                            <?php else: ?>
                                <?php echo app('translator')->get('exam.fail'); ?>
                            <?php endif; ?>
                        </td>
                    <?php endif; ?>
                    <?php
                        $count++
                    ?>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if(@$optional_subject_setup->gpa_above): ?>
                <tr>
                    <td colspan="7" style="text-align: center"><strong><?php echo app('translator')->get('reports.additional_subject'); ?></strong></td>
                </tr>
                <?php $__currentLoopData = $mark_sheet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        if ($data->subject_id!=$optional_subject) {
                            continue;
                        }
                    ?>
                    <tr>
                        <td><?php echo e($data->subject->subject_name); ?></td>
                        <td><?php echo e(@subjectFullMark($exam_details->id, $data->subject->id , $class_id, $section_id)); ?></td>
                        <td><?php echo e(@subjectHighestMark($exam_type_id, $data->subject->id, $class_id, $section_id)); ?></td>
                        <td><?php echo e(@$data->total_marks); ?>

                            <?php
                                if(@$generalsettingsResultType == 'mark'){
                                    $total_mark+=subjectPercentageMark(@$data->total_marks, @subjectFullMark($exam_details->id, $data->subject->id, $class_id, $section_id));
                                }else{
                                    $total_mark+=@$data->total_marks;
                                }
                            ?>
                        </td>
                        <?php if(@$generalsettingsResultType != 'mark'): ?>
                            <td><?php echo e(@$data->total_gpa_grade); ?></td>
                        <?php endif; ?>
                        <td>
                            <span>
                                <?php
                                    if($data->total_gpa_point > @$optional_subject_setup->gpa_above){
                                        $optional_countable_gpa= $data->total_gpa_point - @$optional_subject_setup->gpa_above;
                                    }else{
                                        $optional_countable_gpa=0;
                                    }
                                ?>
                            </span>
                            <?php echo e(@$data->teacher_remarks); ?>

                        </td>
                        <?php if(@$generalsettingsResultType == 'mark'): ?>
                            <td>
                                <?php
                                    $evaluation= markGpa(subjectPercentageMark(@$data->total_marks, @subjectFullMark($exam_details->id, $data->subject->id, $class_id, $section_id)));
                                ?>
                                <?php echo e(@$evaluation->description); ?>

                            </td>
                            <td>
                                <?php
                                    $totalMark = subjectPercentageMark(@$data->total_marks, @subjectFullMark($exam_details->id, $data->subject->id, $class_id, $section_id));
                                    $passMark = $data->subject->pass_mark;
                                ?>
                                <?php if($passMark <= $totalMark): ?>
                                    <?php echo app('translator')->get('exam.pass'); ?>
                                <?php else: ?>
                                    <?php echo app('translator')->get('exam.fail'); ?>
                                <?php endif; ?>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            </tbody>
        </table>
        <table class="table border_table gray_header_table mb_30 max-width-500 ml_auto margin-auto report_table <?php if(resultPrintStatus('vertical_boarder')): ?> mt_40 <?php endif; ?>">
            <tbody>
            <tr>
                <td class="nowrap"><?php echo app('translator')->get('exam.attendance'); ?></td>
                <?php if(isset($exam_content)): ?>
                    <td class="nowrap"><?php echo e(@$student_attendance); ?> <?php echo app('translator')->get('exam.of'); ?> <?php echo e(@$total_class_days); ?></td>
                <?php else: ?>
                    <td class="nowrap"><?php echo app('translator')->get('exam.no_data_found'); ?></td>
                <?php endif; ?>
                <td class="nowrap"><?php echo app('translator')->get('exam.total_mark'); ?></td>
                <td><?php echo e(@$total_mark); ?></td>
            </tr>
            <?php if($average_passing_mark): ?>
                <tr>
                    <td><?php echo app('translator')->get('reports.average_passing_mark'); ?></td>
                    <td class="nowrap">
                        <p><?php echo e(number_format($average_passing_mark, 2, '.', '')); ?></p>
                    </td>
                    <td><?php echo app('translator')->get('common.status'); ?></td>
                    <td class="nowrap">
                        <?php
                            if(@$optional_subject_setup->gpa_above){
                                $average_mark = $total_mark/$Optional_subject_count;
                            }else{
                                $average_mark = $total_mark/($Optional_subject_count+1);
                            }
                        ?>
                        <p><strong><?php echo e($average_passing_mark <= $average_mark ? __('exam.pass') : __('exam.fail')); ?></strong></p>
                    </td>
                </tr>
            <?php endif; ?>
            <tr>
                <td class="nowrap <?php echo e($generalsettingsResultType == 'mark' ? 'text-center' : ''); ?>" colspan="<?php echo e($generalsettingsResultType == 'mark' ? '2' : ''); ?>"><?php echo app('translator')->get('exam.average_mark'); ?></td>
                <td class="nowrap" colspan="<?php echo e($generalsettingsResultType == 'mark' ? '2' : ''); ?>">
                    <?php
                        if(@$optional_subject_setup->gpa_above){
                            $average_mark = $total_mark/$Optional_subject_count;
                        }else{
                            $average_mark = $total_mark/($Optional_subject_count+1);
                        }
                    ?>
                    <?php echo e(number_format(@$average_mark, 2, '.', '')); ?>

                </td>
                <?php if(@$generalsettingsResultType != 'mark'): ?>
                    <td class="nowrap"><?php echo app('translator')->get('reports.gpa_above'); ?> ( <?php echo e(@$optional_subject_setup->gpa_above); ?> )</td>
                    <td class="nowrap"><?php echo e($optional_countable_gpa); ?></td>
                <?php endif; ?>
            </tr>
            <?php if(@$generalsettingsResultType != 'mark'): ?>
                <tr>
                    <td class="nowrap"><?php echo app('translator')->get('reports.without_optional'); ?></td>
                    <td class="nowrap">
                        <?php
                            $without_optional=$main_subject_total_gpa/$Optional_subject_count;
                        ?>
                        <?php echo e(number_format($without_optional, 2,'.','')); ?>

                    </td>
                    <td class="nowrap"><?php echo app('translator')->get('exam.gpa'); ?></td>
                    <td class="nowrap">
                        <?php
                            $final_result = ($main_subject_total_gpa + $optional_countable_gpa) /$Optional_subject_count;
                            if($final_result >= $maxGrade){
                                echo number_format($maxGrade, 2,'.','');
                            } else {
                                echo number_format($final_result, 2,'.','');
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="nowrap"><?php echo app('translator')->get('exam.grade'); ?></td>
                    <td class="nowrap">
                        <?php
                            if(in_array($failgpaname->grade_name,$temp_grade)){
                                echo $failgpaname->grade_name;
                            }else{
                                if($final_result >= $maxGrade){
                                    $grade_details= App\SmResultStore::remarks($maxGrade);
                                } else {
                                    $grade_details= App\SmResultStore::remarks($final_result);
                                }
                            }
                        ?>
                        <?php echo e(@$grade_details->grade_name); ?>

                    </td>
                    <td class="nowrap"><?php echo app('translator')->get('homework.evaluation'); ?></td>
                    <td class="nowrap">
                        <?php
                            if(in_array($failgpaname->grade_name,$temp_grade)){
                                echo $failgpaname->description;
                            }else{
                                if($final_result >= $maxGrade){
                                    $grade_details= App\SmResultStore::remarks($maxGrade);
                                } else {
                                    $grade_details= App\SmResultStore::remarks($final_result);
                                }
                            }
                        ?>
                        <?php echo e(@$grade_details->description); ?>

                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center">
                        <?php echo app('translator')->get('exam.position'); ?>
                    </td>
                    <td colspan="2" style="text-align: center"><?php echo e(getStudentMeritPosition($class_id, $section_id, $exam_details->id, $student_detail->id)); ?></td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
        <?php if(isset($exam_content)): ?>
            <table style="width:100%; margin-top: auto;" class="border-0">
                <tbody>
                <tr>
                    <td class="border-0">
                        <p class="result-date" style="    text-align: left;
                        float: left;
                        display: inline-block;
                        margin-top: 50px;
                        padding-left: 0;
                        font-weight: 400;
                        color: #000;
                        font-size: 12px;">
                            <?php echo app('translator')->get('exam.date_of_publication_of_result'); ?> :
                            <strong>
                                <?php echo e(dateConvert(@$exam_content->publish_date)); ?>

                            </strong>
                        </p>
                    </td>
                    <td class="border-0">
                        <div class="text-right d-flex flex-column justify-content-end">
                            <div class="thumb text-right">
                                <?php if(@$exam_content->file): ?>
                                    <img src="<?php echo e(asset(@$exam_content->file)); ?>" width="100px">
                                <?php endif; ?>
                            </div>
                            <p style="text-align:right; float:right; display:inline-block; font-size: 12px; margin-top:5px; color: #000;">
                                (<?php echo e(@$exam_content->title); ?>)
                            </p>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>
</body>
</html><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\reports\mark_sheet_report_student_print.blade.php ENDPATH**/ ?>
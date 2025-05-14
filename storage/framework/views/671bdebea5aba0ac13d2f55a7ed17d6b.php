<?php $page_title="All about Infix School management system; School management software"; ?>

<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/')); ?>/frontend/css/new_style.css" />
    <link rel="stylesheet" href="<?php echo e(url('/public/')); ?>/landing/css/toastr.css">
    <link rel="stylesheet" href="<?php echo e(url('/public/')); ?>/backEnd/assets/vendors/static_style2.css">
    <link rel="stylesheet" href="<?php echo e(url('/public/')); ?>/backEnd/assets/vendors/vendors_static_style.css">
    <style>
        th {
            border: 1px solid black;
            text-align: center;
        }

        td {
            text-align: center;
        }

        td.subject-name {
            text-align: left;
            padding-left: 10px !important;
        }

        table.marksheet {
            width: 100%;
            border: 1px solid var(--border_color) !important;
        }

        table.marksheet th {
            border: 1px solid var(--border_color) !important;
        }

        table.marksheet td {
            border: 1px solid var(--border_color) !important;
        }

        table.marksheet thead tr {
            border: 1px solid var(--border_color) !important;
        }

        table.marksheet tbody tr {
            border: 1px solid var(--border_color) !important;
        }

        .studentInfoTable {
            width: 100%;
            padding: 0px !important;
        }

        .studentInfoTable td {
            padding: 0px !important;
            text-align: left;
            padding-left: 15px !important;
        }

        h4 {
            text-align: left !important;
        }

        hr {
            margin: 0px;
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

        .single-report-admit table tr:last-child td {
            border-bottom: 0 !important;
        }

        .single-report-admit table tr td {
            border-color: #dee2e6 !important;
        }

        .custom_table tbody tr th {
            border-color: #dee2e6 !important;
        }

        .spacing tr th {
            padding: 3px 10px !important;
            vertical-align: middle;
            border: 1px solid #dee2e6 !important;
        }

        .spacing tr td {
            padding: 0px 40px !important;
            vertical-align: middle;
        }

        .primary_input_field {
            font-size: 13px !important;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('main_content'); ?>
    <?php if($page): ?>
        <!--================ Home Banner Area =================-->
        <section class="container box-1420">
            <div class="banner-area"
                style="background: linear-gradient(0deg, rgba(124, 50, 255, 0.6), rgba(199, 56, 216, 0.6)), url(<?php echo e($page->image != '' ? $page->image : '../img/client/common-banner1.jpg'); ?>) no-repeat center;">
                <div class="banner-inner">
                    <div class="banner-content">
                        <h2><?php echo e($page->title); ?></h2>
                        <p><?php echo e($page->description); ?></p>
                        <a class="primary-btn fix-gr-bg semi-large"
                            href="<?php echo e($page->button_url); ?>"><?php echo e($page->button_text); ?></a>
                    </div>
                </div>
            </div>
        </section>
        <!--================ End Home Banner Area =================-->
    <?php endif; ?>
    <!--================ Start Facts Area =================-->
    <section class="fact-area section-gap">
        <div class="container">
            <form method="GET" action="<?php echo e(route('examResultSearch')); ?>">
                <div class="row align-items-center">
                    <?php echo csrf_field(); ?>
                    <div class="col-lg-4 mt-30-md md_mb_20 ">
                        <div class="primary_input">
                            <label class="primary_input_label" for=""><?php echo e(__('exam.exam')); ?><span
                                    class="text-danger"> *</span></label>
                            <select class="primary_select form-control<?php echo e($errors->has('exam') ? ' is-invalid' : ''); ?>"
                                name="exam">
                                <option data-display="<?php echo app('translator')->get('exam.select_exam'); ?>*" value=""><?php echo app('translator')->get('exam.select_exam'); ?> *</option>
                                <?php $__currentLoopData = $exam_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($exam->id); ?>"><?php echo e($exam->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('exam')): ?>
                                <span class="text-danger invalid-select" role="alert">
                                    <?php echo e($errors->first('exam')); ?>

                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-30-md md_mb_20">
                        <div class="primary_input">
                            <label class="primary_input_label" for=""><?php echo app('translator')->get('exam.admission_number'); ?><span
                                    class="text-danger"> *</span></label>
                            <input class="primary_input_field form-control<?php echo e($errors->has('admission_number') ? ' is-invalid' : ''); ?>" placeholder="<?php echo app('translator')->get('exam.admission_number'); ?>*" type="text"
                                name="admission_number"
                                value="">
                        </div>
                        <?php if($errors->has('admission_number')): ?>
                            <span class="text-danger invalid-select" role="alert">
                                <?php echo e($errors->first('admission_number')); ?>

                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-4 mt-20 text-right">
                        <button type="submit" class="primary-btn small fix-gr-bg">
                            <span class="ti-search"></span>
                            <?php echo app('translator')->get('common.search'); ?>
                        </button>
                    </div>
                </div>
            </form>

            <?php if(isset($mark_sheet)): ?>
                <style>
                    * {
                        margin: 0;
                        padding: 0;
                    }

                    body {
                        font-size: 12px;
                        font-family: 'Poppins', sans-serif;
                    }

                    .student_marks_table {
                        width: 100%;
                        margin: 0;
                        padding: 30px;
                    }

                    .text_center {
                        text-align: center;
                    }

                    p {
                        margin: 0;
                        font-size: 12px;
                        text-transform: capitalize;
                    }

                    ul {
                        margin: 0;
                        padding: 0;
                    }

                    li {
                        list-style: none;
                    }

                    td {
                        border: 1px solid var(--border_color);
                        padding: .3rem;
                        text-align: center;
                    }

                    th {
                        border: 1px solid var(--border_color);
                        text-transform: capitalize;
                        text-align: center;
                        padding: .5rem;
                        white-space: nowrap;
                    }

                    thead {
                        font-weight: bold;
                        text-align: center;
                        color: var(--base_color);
                        font-size: 10px
                    }

                    .custom_table {
                        width: 100%;
                    }

                    table.custom_table thead th {
                        padding-right: 0;
                        padding-left: 0;
                    }

                    table.custom_table thead tr>th {
                        border: 0;
                        padding: 0;
                    }

                    table.custom_table thead tr th .fees_title {
                        font-size: 12px;
                        font-weight: 600;
                        border-top: 1px solid #726E6D;
                        padding-top: 10px;
                        margin-top: 10px;
                    }

                    .border-top {
                        border-top: 0 !important;
                    }

                    .border_full {
                        border: 1px solid black !important;
                    }

                    .border_bottom {
                        border-bottom: 1px solid black !important;
                    }

                    .border_top {
                        border-top: 1px solid black !important;
                    }

                    .custom_table th ul li {}

                    .custom_table th ul li p {
                        margin-bottom: 10px;
                        font-weight: 500;
                        font-size: 14px;
                    }

                    tbody td {
                        padding: 0.8rem;
                    }

                    table {
                        border-spacing: 10px;
                        width: 65%;
                        margin: auto;
                    }

                    .fees_pay {
                        text-align: center;
                    }

                    .border-0 {
                        border: 0 !important;
                    }

                    .copy_collect {
                        text-align: center;
                        font-weight: 500;
                        color: #000;
                    }

                    .copyies_text {
                        display: flex;
                        justify-content: space-between;
                        margin: 30px 0;
                    }

                    .copyies_text li {
                        text-transform: capitalize;
                        color: #000;
                        font-weight: 500;
                        border-top: 1px dashed #ddd;
                    }

                    .text_left {
                        text-align: left;
                    }

                    .italic_text {}

                    .student_info {}

                    .student_info li {
                        display: flex;
                    }

                    .info_details {
                        display: flex;
                        flex-wrap: wrap;
                        margin-top: 30px;
                        margin-bottom: 30px;
                    }

                    .info_details li>p {
                        flex-basis: 20%;
                    }

                    .info_details li {
                        display: flex;
                        flex-basis: 50%;
                    }

                    .school_name {
                        text-align: center;
                    }

                    .numbered_table_row {
                        display: flex;
                        justify-content: space-between;
                        margin-top: 40px;
                        align-items: center;
                    }

                    .numbered_table_row thead {
                        border: 1px solid var(--base_color)
                    }

                    .numbered_table_row h3 {
                        font-size: 24px;
                        text-transform: uppercase;
                        margin-top: 15px;
                        font-weight: 500;
                        display: inline-block;
                        border-bottom: 2px solid var(--base_color);
                    }

                    .ingle-report-admit .numbered_table_row td {
                        border: 1px solid var(--border_color);
                        padding: .4rem;
                        font-weight: 400;
                        color: var(--base_color);
                    }

                    .table#grade_table_new th {
                        border: 1px solid #726E6D !important;
                        padding: .6rem !important;
                        font-weight: 600;
                        color: var(--base_color);
                        font-size: 10px;
                    }

                    td.border-top.border_left_hide {
                        border-left: 0;
                        text-align: left;
                        font-weight: 600;
                    }

                    .devide_td {
                        padding: 0;
                    }

                    .devide_td p {
                        border-bottom: 1px solid var(--base_color);
                    }

                    .ssc_text {
                        font-size: 20px;
                        font-weight: 500;
                        color: var(--base_color);
                        margin-bottom: 20px;
                    }

                    table#grade_table_new td {
                        padding: 0 !important;
                        font-size: 8px;
                    }

                    table#grade_table_new {
                        border-bottom: 1px solid #726E6D !important;
                    }

                    .marks_wrap_area {
                        display: flex;
                        align-items: center;
                    }

                    .numbered_table_row {
                        display: flex;
                        justify-content: center;
                        margin-top: 40px;
                        align-items: center;
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

                    .single-report-admit table tbody tr:last-of-type td {
                        border-bottom: 1px solid rgba(67, 89, 187, 0.15) !important;
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

                    .single-report-admit table.summeryTable tbody tr:first-of-type td,
                    .single-report-admit table.comment_table tbody tr:first-of-type td {
                        border-top: 0 !important;
                    }

                    .single-report-admit {}

                    .single-report-admit .student_marks_table {
                        background: -webkit-linear-gradient(90deg, #d8e6ff 0%, #ecd0f4 100%);
                        background: -moz-linear-gradient(90deg, #d8e6ff 0%, #ecd0f4 100%);
                        background: -o-linear-gradient(90deg, #d8e6ff 0%, #ecd0f4 100%);
                        background: linear-gradient(90deg, #d8e6ff 0%, #ecd0f4 100%);
                    }

                    .single-report-admit .card-header {
                        background: url(/public/backEnd/assets/img/report-admit-bg.png) no-repeat center;
                        background-size: cover;
                        border-radius: 5px 5px 0px 0px;
                        border: 0;
                        padding: 30px 30px;
                    }

                    .profile_100 {
                        width: 100px;
                        height: 100px;
                        background-size: cover;
                        background-position: center center;
                        border-radius: 5px;
                        background-repeat: no-repeat;
                    }
                </style>
                <?php if(resultPrintStatus('vertical_boarder')): ?>
                    <style>
                        .single-report-admit table tr td {
                            border: 1px solid rgba(130, 139, 178, 0.15) !important;
                        }

                        .single-report-admit table thead tr th {
                            border: 1px solid rgba(130, 139, 178, 0.15) !important;
                        }

                        .gray_header_table thead tr:first-child th {
                            border: 1px solid rgba(130, 139, 178, 0.15) !important;
                        }

                        .gray_header_table thead th {
                            padding-left: 10px !important;
                        }

                        .single-report-admit table tr td {
                            padding-left: 8px !important;
                        }

                        .single-report-admit table tr th {
                            border: 1px solid rgba(130, 139, 178, 0.15) !important;
                            padding: 8px !important;
                        }

                        .custom_table thead th {
                            text-align: center !important;
                        }

                        .custom_table tbody td {
                            text-align: center !important;
                        }

                        .custom_table thead tr:first-child th:first-child {
                            text-align: left !important;
                        }

                        .custom_table thead tr:first-child td:first-child {
                            text-align: center !important;
                        }

                        .custom_table tbody tr td:last-child {
                            text-align: left !important;
                        }
                    </style>
                <?php endif; ?>
                <section class="student-details">
                    <div class="container-fluid p-0">
                        <div class="row mt-40">
                            <div class="col-lg-4 no-gutters">
                                <div class="main-title">
                                    <h3 class="mb-30"><?php echo app('translator')->get('reports.mark_sheet_report'); ?></h3>
                                </div>
                            </div>
                            <div class="col-lg-8 pull-right">
                                <a href="<?php echo e(route('mark_sheet_report_print', [$exam_type_id, $class_id, $section_id, $student_id])); ?>"
                                    class="primary-btn small fix-gr-bg pull-right" target="_blank">
                                    <i class="ti-printer"> </i>
                                    <?php echo app('translator')->get('reports.print'); ?>
                                </a>
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
                                                            <div class=" col-lg-2">
                                                                <img class="logo-img" src="<?php echo e(generalSetting()->logo); ?>"
                                                                    alt="<?php echo e(generalSetting()->school_name); ?>">
                                                            </div>
                                                            <div class="col-lg-8 text-center">
                                                                <h3 class="text-white"
                                                                    style="font-size: 30px;margin-bottom: 0px;">
                                                                    <?php echo e(isset(generalSetting()->school_name) ? generalSetting()->school_name : 'Infix School Management ERP'); ?>

                                                                </h3>
                                                                <p class="text-white mb-0" style="font-size: 16px;">
                                                                    <?php echo e(isset(generalSetting()->address) ? generalSetting()->address : 'Infix School Address'); ?>

                                                                </p>
                                                                <p class="text-white mb-0" style="font-size: 16px;">
                                                                    <?php echo app('translator')->get('common.email'); ?>: <span
                                                                        class="text-lowercase"><?php echo e(isset(generalSetting()->email) ? generalSetting()->email : 'hello@aorasoft.com'); ?></span>,
                                                                    <?php echo app('translator')->get('common.phone'); ?>:
                                                                    <?php echo e(isset(generalSetting()->phone) ? generalSetting()->phone : '+96897002784'); ?>

                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="report-admit-img profile_100"
                                                            style="background-image: url(<?php echo e(file_exists(@$studentDetails->studentDetail->student_photo) ? asset($studentDetails->studentDetail->student_photo) : asset('public/uploads/staff/demo/staff.jpg')); ?>)">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="student_marks_table">
                                                        <table class="custom_table">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="1" class="text_left"
                                                                        style="border: 0px !important;">
                                                                        <div class="main-title">
                                                                            <h2 class="mb-20">
                                                                                <?php echo e($student_detail->studentDetail->full_name); ?>

                                                                            </h2>
                                                                        </div>
                                                                        <div class="marks_wrap_area d-block">
                                                                            <div class="row">
                                                                                <div class="col-lg-8">
                                                                                    <div class="d-flex flex-wrap"
                                                                                        style="grid-gap: 30px;">
                                                                                        <ul class="student_info">
                                                                                            <li>
                                                                                                <p>
                                                                                                    <?php echo app('translator')->get('common.academic_year'); ?>
                                                                                                </p>
                                                                                                <p>
                                                                                                    <strong>
                                                                                                        :
                                                                                                        <?php echo e(@$student_detail->academic->year); ?>

                                                                                                    </strong>
                                                                                                </p>
                                                                                            </li>
                                                                                            <li>
                                                                                                <p>
                                                                                                    <?php echo app('translator')->get('common.class'); ?>
                                                                                                </p>
                                                                                                <p class="italic_text">
                                                                                                    <strong>
                                                                                                        :
                                                                                                        <?php echo e($student_detail->class->class_name); ?>

                                                                                                    </strong>
                                                                                                </p>
                                                                                            </li>
                                                                                            <li>
                                                                                                <p>
                                                                                                    <?php echo app('translator')->get('common.section'); ?>
                                                                                                </p>
                                                                                                <p class="italic_text">
                                                                                                    <strong>
                                                                                                        :
                                                                                                        <?php echo e($student_detail->section->section_name); ?>

                                                                                                    </strong>
                                                                                                </p>
                                                                                            </li>
                                                                                            <li>
                                                                                                <p>
                                                                                                    <?php echo app('translator')->get('student.admission_no'); ?>
                                                                                                </p>
                                                                                                <p class="italic_text">
                                                                                                    <strong>
                                                                                                        :
                                                                                                        <?php echo e(@$student_detail->student->admission_no); ?>

                                                                                                    </strong>
                                                                                                </p>
                                                                                            </li>
                                                                                            <li>
                                                                                                <p>
                                                                                                    <?php echo app('translator')->get('student.roll_no'); ?>
                                                                                                </p>
                                                                                                <p>
                                                                                                    <strong>
                                                                                                        :
                                                                                                        <?php echo e($student_detail->studentDetail->roll_no); ?>

                                                                                                    </strong>
                                                                                                </p>
                                                                                            </li>
                                                                                            <li>
                                                                                                <p>
                                                                                                    <?php echo app('translator')->get('common.date_of_birth'); ?>
                                                                                                </p>
                                                                                                <p>
                                                                                                    <strong>
                                                                                                        :
                                                                                                        <?php echo e($student_detail->studentDetail->date_of_birth != '' ? dateConvert($student_detail->studentDetail->date_of_birth) : ''); ?>

                                                                                                    </strong>
                                                                                                </p>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-4 text-black">
                                                                                    <?php
                                                                                        $generalsettingsResultType = generalSetting()->result_type;
                                                                                    ?>
                                                                                    <?php if(@$grades): ?>
                                                                                        <table class="table "
                                                                                            id="grade_table">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th><?php echo app('translator')->get('reports.staring'); ?>
                                                                                                    </th>
                                                                                                    <th><?php echo app('translator')->get('reports.ending'); ?>
                                                                                                    </th>
                                                                                                    <?php if(@$generalsettingsResultType != 'mark'): ?>
                                                                                                        <th><?php echo app('translator')->get('exam.gpa'); ?>
                                                                                                        </th>
                                                                                                        <th><?php echo app('translator')->get('exam.grade'); ?>
                                                                                                        </th>
                                                                                                    <?php endif; ?>
                                                                                                    <th><?php echo app('translator')->get('homework.evalution'); ?>
                                                                                                    </th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <?php $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade_d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                    <tr>
                                                                                                        <td><?php echo e($grade_d->percent_from); ?>

                                                                                                        </td>
                                                                                                        <td><?php echo e($grade_d->percent_upto); ?>

                                                                                                        </td>
                                                                                                        <?php if(@$generalsettingsResultType != 'mark'): ?>
                                                                                                            <td><?php echo e($grade_d->gpa); ?>

                                                                                                            </td>
                                                                                                            <td><?php echo e($grade_d->grade_name); ?>

                                                                                                            </td>
                                                                                                        <?php endif; ?>
                                                                                                        <td
                                                                                                            class="text-left">
                                                                                                            <?php echo e($grade_d->description); ?>

                                                                                                        </td>
                                                                                                    </tr>
                                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                        <div class="student_name_highlight"
                                                            style="text-align: center; margin-bottom: 20px;">
                                                            <h3><?php echo e($exam_details->title); ?></h3>
                                                            <h4 style="text-align: center !important;"> <span
                                                                    style="border-bottom: 3px double;"><?php echo app('translator')->get('reports.mark_sheet'); ?></span>
                                                            </h4>
                                                        </div>
                                                        <table class="custom_table">
                                                            <thead>
                                                                <tr>
                                                                    <th><?php echo app('translator')->get('reports.subject_name'); ?></th>
                                                                    <th><?php echo app('translator')->get('exam.total_mark'); ?></th>
                                                                    <th><?php echo app('translator')->get('reports.highest_marks'); ?></th>
                                                                    <th><?php echo app('translator')->get('reports.obtained_marks'); ?></th>
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
                                                                    $optional_countable_gpa = 0;
                                                                    $main_subject_total_gpa = 0;
                                                                    $Optional_subject_count = 0;
                                                                    
                                                                    if ($optional_subject != '') {
                                                                        $Optional_subject_count = $subjects->count() - 1;
                                                                    } else {
                                                                        $Optional_subject_count = $subjects->count();
                                                                    }
                                                                    $sum_gpa = 0;
                                                                    $resultCount = 1;
                                                                    $subject_count = 1;
                                                                    $tota_grade_point = 0;
                                                                    $this_student_failed = 0;
                                                                    $count = 1;
                                                                    $total_mark = 0;
                                                                    $temp_grade = [];
                                                                    $average_passing_mark = averagePassingMark($exam_type_id);
                                                                ?>
                                                                <?php $__currentLoopData = $mark_sheet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php
                                                                        $temp_grade[] = $data->total_gpa_grade;
                                                                        if ($data->subject_id == $optional_subject) {
                                                                            continue;
                                                                        }
                                                                    ?>
                                                                    <tr>
                                                                        <th>
                                                                            <?php echo e($data->subject->subject_name); ?>

                                                                        </th>
                                                                        <td>
                                                                            <p>
                                                                                <?php if(@$generalsettingsResultType == 'mark'): ?>
                                                                                    <?php echo e(subject100PercentMark()); ?>

                                                                                <?php else: ?>
                                                                                    <?php echo e(@subjectFullMark($exam_details->id, $data->subject->id, $class_id, $section_id)); ?>

                                                                                <?php endif; ?>
                                                                            </p>
                                                                        </td>
                                                                        <td>
                                                                            <p>
                                                                                <?php if(@$generalsettingsResultType == 'mark'): ?>
                                                                                    <?php echo e(subjectPercentageMark(@subjectHighestMark($exam_type_id, $data->subject->id, $class_id, $section_id), @subjectFullMark($exam_details->id, $data->subject->id, $class_id, $section_id))); ?>

                                                                                <?php else: ?>
                                                                                    <?php echo e(@subjectHighestMark($exam_type_id, $data->subject->id, $class_id, $section_id)); ?>

                                                                                <?php endif; ?>
                                                                            </p>
                                                                        </td>
                                                                        <td>
                                                                            <p>
                                                                                <?php if(@$generalsettingsResultType == 'mark'): ?>
                                                                                    <?php echo e(@singleSubjectMark($data->student_record_id, $data->subject_id, $data->exam_type_id)[0]); ?>

                                                                                <?php else: ?>
                                                                                    <?php echo e(@$data->total_marks); ?>

                                                                                <?php endif; ?>
                                                                                <?php
                                                                                    if (@$generalsettingsResultType == 'mark') {
                                                                                        $total_mark += subjectPercentageMark(@$data->total_marks, @subjectFullMark($exam_details->id, $data->subject->id, $class_id, $section_id));
                                                                                    } else {
                                                                                        $total_mark += @$data->total_marks;
                                                                                    }
                                                                                ?>
                                                                            </p>
                                                                        </td>
                                                                        <?php if(@$generalsettingsResultType != 'mark'): ?>
                                                                            <td>
                                                                                <p>
                                                                                    <?php
                                                                                        $result = markGpa(@subjectPercentageMark(@$data->total_marks, @subjectFullMark($exam_details->id, $data->subject->id, $class_id, $section_id)));
                                                                                        $main_subject_total_gpa += $result->gpa;
                                                                                    ?>
                                                                                    <?php echo e(@$data->total_gpa_grade); ?>

                                                                                </p>
                                                                            </td>
                                                                        <?php endif; ?>
                                                                        <td>
                                                                            <p>
                                                                                <?php echo e(@$data->teacher_remarks); ?>

                                                                            </p>
                                                                        </td>
                                                                        <?php if(@$generalsettingsResultType == 'mark'): ?>
                                                                            <td>
                                                                                <p>
                                                                                    <?php
                                                                                        $evaluation = markGpa(subjectPercentageMark(@$data->total_marks, @subjectFullMark($exam_details->id, $data->subject->id, $class_id, $section_id)));
                                                                                    ?>
                                                                                    <?php echo e(@$evaluation->description); ?>

                                                                                </p>
                                                                            </td>
                                                                            <td>
                                                                                <p>
                                                                                    <?php
                                                                                        $totalMark = subjectPercentageMark(@$data->total_marks, @subjectFullMark($exam_details->id, $data->subject->id, $class_id, $section_id));
                                                                                        $passMark = $data->subject->pass_mark;
                                                                                    ?>
                                                                                    <?php if($passMark <= $totalMark): ?>
                                                                                        <?php echo app('translator')->get('exam.pass'); ?>
                                                                                    <?php else: ?>
                                                                                        <?php echo app('translator')->get('exam.fail'); ?>
                                                                                    <?php endif; ?>
                                                                                </p>
                                                                            </td>
                                                                        <?php endif; ?>
                                                                        <?php
                                                                            $count++;
                                                                        ?>
                                                                    </tr>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if(@$optional_subject_setup->gpa_above): ?>
                                                                    <tr>
                                                                        <td colspan="7"
                                                                            class="border-top text-center pl-3"
                                                                            style="text-align: center !important;">
                                                                            <strong><?php echo app('translator')->get('reports.additional_subject'); ?></strong>
                                                                        </td>
                                                                    </tr>
                                                                    <?php $__currentLoopData = $mark_sheet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php
                                                                            if ($data->subject_id != $optional_subject) {
                                                                                continue;
                                                                            }
                                                                        ?>
                                                                        <tr>
                                                                            <th>
                                                                                <?php echo e($data->subject->subject_name); ?>

                                                                            </th>
                                                                            <td>
                                                                                <p>
                                                                                    <?php echo e(@subjectFullMark($exam_details->id, $data->subject->id, $class_id, $section_id)); ?>

                                                                                </p>
                                                                            </td>
                                                                            <td>
                                                                                <p><?php echo e(@subjectHighestMark($exam_type_id, $data->subject->id, $class_id, $section_id)); ?>

                                                                                </p>
                                                                            </td>
                                                                            <td>
                                                                                <p>
                                                                                    <?php echo e(@$data->total_marks); ?>

                                                                                    <?php
                                                                                        if (@$generalsettingsResultType == 'mark') {
                                                                                            $total_mark += subjectPercentageMark(@$data->total_marks, @subjectFullMark($exam_details->id, $data->subject->id, $class_id, $section_id));
                                                                                        } else {
                                                                                            $total_mark += @$data->total_marks;
                                                                                        }
                                                                                    ?>
                                                                                </p>
                                                                            </td>
                                                                            <?php if(@$generalsettingsResultType != 'mark'): ?>
                                                                                <td>
                                                                                    <p>
                                                                                        <?php echo e(@$data->total_gpa_grade); ?>

                                                                                    </p>
                                                                                </td>
                                                                            <?php endif; ?>
                                                                            <td>
                                                                                <span>
                                                                                    <?php
                                                                                        if ($data->total_gpa_point > @$optional_subject_setup->gpa_above) {
                                                                                            $optional_countable_gpa = $data->total_gpa_point - @$optional_subject_setup->gpa_above;
                                                                                        } else {
                                                                                            $optional_countable_gpa = 0;
                                                                                        }
                                                                                    ?>
                                                                                </span>
                                                                                <p>
                                                                                    <?php echo e(@$data->teacher_remarks); ?>

                                                                                </p>
                                                                            </td>
                                                                            <?php if(@$generalsettingsResultType == 'mark'): ?>
                                                                                <td>
                                                                                    <p>
                                                                                        <?php
                                                                                            $evaluation = markGpa(subjectPercentageMark(@$data->total_marks, @subjectFullMark($exam_details->id, $data->subject->id, $class_id, $section_id)));
                                                                                        ?>
                                                                                        <?php echo e(@$evaluation->description); ?>

                                                                                    </p>
                                                                                </td>
                                                                                <td>
                                                                                    <p>
                                                                                        <?php
                                                                                            $totalMark = subjectPercentageMark(@$data->total_marks, @subjectFullMark($exam_details->id, $data->subject->id, $class_id, $section_id));
                                                                                            $passMark = $data->subject->pass_mark;
                                                                                        ?>
                                                                                        <?php if($passMark <= $totalMark): ?>
                                                                                            <?php echo app('translator')->get('exam.pass'); ?>
                                                                                        <?php else: ?>
                                                                                            <?php echo app('translator')->get('exam.fail'); ?>
                                                                                        <?php endif; ?>
                                                                                    </p>
                                                                                </td>
                                                                            <?php endif; ?>
                                                                        </tr>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php endif; ?>
                                                            </tbody>
                                                        </table>
                                                        <div class="col-md-4 offset-md-4">
                                                            <table
                                                                class="table <?php if(resultPrintStatus('vertical_boarder')): ?> mt-5 <?php endif; ?>">
                                                                <tbody class="spacing">
                                                                    <tr>
                                                                        <td><?php echo app('translator')->get('reports.attendance'); ?></td>
                                                                        <?php if(isset($exam_content)): ?>
                                                                            <td class="nowrap">
                                                                                <p><?php echo e(@$student_attendance); ?>

                                                                                    <?php echo app('translator')->get('reports.of'); ?>
                                                                                    <?php echo e(@$total_class_days); ?></p>
                                                                            </td>
                                                                        <?php else: ?>
                                                                            <td class="nowrap">
                                                                                <p><?php echo app('translator')->get('reports.no_data_found'); ?></p>
                                                                            </td>
                                                                        <?php endif; ?>
                                                                        <td><?php echo app('translator')->get('exam.total_mark'); ?></td>
                                                                        <td><?php echo e(@$total_mark); ?></td>
                                                                    </tr>
                                                                    <?php if($average_passing_mark): ?>
                                                                        <tr>
                                                                            <td class="nowrap"><?php echo app('translator')->get('reports.average_passing_mark'); ?></td>
                                                                            <td class="nowrap">
                                                                                <p><?php echo e(number_format($average_passing_mark, 2, '.', '')); ?>

                                                                                </p>
                                                                            </td>
                                                                            <td><?php echo app('translator')->get('common.status'); ?></td>
                                                                            <td class="nowrap">
                                                                                <?php
                                                                                    
                                                                                    $average_mark = $total_mark / $Optional_subject_count;
                                                                                ?>
                                                                                <p><strong><?php echo e($average_passing_mark <= $average_mark ? __('exam.pass') : __('exam.fail')); ?></strong>
                                                                                </p>
                                                                            </td>
                                                                        </tr>
                                                                    <?php endif; ?>
                                                                    <tr>
                                                                        <td class="nowrap <?php echo e($generalsettingsResultType == 'mark' ? 'text-center' : ''); ?>"
                                                                            colspan="<?php echo e($generalsettingsResultType == 'mark' ? '2' : ''); ?>">
                                                                            <?php echo app('translator')->get('reports.average_mark'); ?></td>
                                                                        <td
                                                                            colspan="<?php echo e($generalsettingsResultType == 'mark' ? '2' : ''); ?>">
                                                                            <?php
                                                                                $average_mark = $total_mark / $Optional_subject_count;
                                                                            ?>
                                                                            <?php echo e(number_format(@$average_mark, 2, '.', '')); ?>

                                                                        </td>
                                                                        <?php if(@$generalsettingsResultType != 'mark'): ?>
                                                                            <td class="nowrap"><?php echo app('translator')->get('reports.gpa_above'); ?> (
                                                                                <?php echo e(@$optional_subject_setup->gpa_above); ?> )
                                                                            </td>
                                                                            <td>
                                                                                <p>
                                                                                    <?php echo e($optional_countable_gpa); ?>

                                                                                </p>
                                                                            </td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <?php if(@$generalsettingsResultType != 'mark'): ?>
                                                                        <tr>
                                                                            <td class="nowrap"><?php echo app('translator')->get('reports.without_optional'); ?></td>
                                                                            <td>
                                                                                <?php
                                                                                    $without_optional = $main_subject_total_gpa / $Optional_subject_count;
                                                                                ?>
                                                                                <?php echo e(number_format($without_optional, 2, '.', '')); ?>

                                                                            </td>
                                                                            <td><?php echo app('translator')->get('exam.gpa'); ?></td>
                                                                            <td>
                                                                                <?php
                                                                                    $final_result = ($main_subject_total_gpa + $optional_countable_gpa) / $Optional_subject_count;
                                                                                    if ($final_result >= $maxGrade) {
                                                                                        echo number_format($maxGrade, 2, '.', '');
                                                                                    } else {
                                                                                        echo number_format($final_result, 2, '.', '');
                                                                                    }
                                                                                ?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><?php echo app('translator')->get('exam.grade'); ?></td>
                                                                            <td>
                                                                                <?php
                                                                                    if (in_array($failgpaname->grade_name, $temp_grade)) {
                                                                                        echo $failgpaname->grade_name;
                                                                                    } else {
                                                                                        if ($final_result >= $maxGrade) {
                                                                                            $grade_details = App\SmResultStore::remarks($maxGrade);
                                                                                        } else {
                                                                                            $grade_details = App\SmResultStore::remarks($final_result);
                                                                                        }
                                                                                    }
                                                                                ?>
                                                                                <?php echo e(@$grade_details->grade_name); ?>

                                                                            </td>
                                                                            <td><?php echo app('translator')->get('homework.evaluation'); ?></td>
                                                                            <td class="nowrap">
                                                                                <?php
                                                                                    if (in_array($failgpaname->grade_name, $temp_grade)) {
                                                                                        echo $failgpaname->description;
                                                                                    } else {
                                                                                        if ($final_result >= $maxGrade) {
                                                                                            $grade_details = App\SmResultStore::remarks($maxGrade);
                                                                                        } else {
                                                                                            $grade_details = App\SmResultStore::remarks($final_result);
                                                                                        }
                                                                                    }
                                                                                ?>
                                                                                <p><?php echo e(@$grade_details->description); ?></p>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2"
                                                                                style="text-align: center !important;">
                                                                                <?php echo app('translator')->get('exam.position'); ?>
                                                                            </td>
                                                                            <td colspan="2"
                                                                                style="text-align: center !important;">
                                                                                <?php echo e(getStudentMeritPosition($class_id, $section_id, $exam_type_id, $student_detail->id)); ?>

                                                                            </td>
                                                                        </tr>
                                                                    <?php endif; ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <script>
                                                            function myFunction(value, subject) {
                                                                if (value != "") {
                                                                    var res = Number(value / subject).toFixed(2);
                                                                } else {
                                                                    var res = 0;
                                                                }
                                                                // document.getElementById("main_subject_total_gpa").innerHTML = res;
                                                            }

                                                            function myFunction2(value, subject, maxGrade) {
                                                                if (value != "") {
                                                                    var totalGrade = Number(value / subject).toFixed(2);
                                                                    if (totalGrade >= maxGrade) {
                                                                        var res = Number(maxGrade).toFixed(2);
                                                                    } else {
                                                                        var res = totalGrade;
                                                                    }
                                                                } else {
                                                                    var res = 0;
                                                                }
                                                                // document.getElementById("final_result").innerHTML = res;
                                                            }
                                                            myFunction(<?php echo e($main_subject_total_gpa); ?>, <?php echo e($Optional_subject_count); ?>);
                                                            myFunction2(<?php echo e($main_subject_total_gpa + $optional_countable_gpa); ?>, <?php echo e($Optional_subject_count); ?>,
                                                                <?php echo e($maxGrade); ?>);
                                                        </script>
                                                        <?php if(isset($exam_content)): ?>
                                                            <table style="width:100%" class="border-0 mark_sheet_footer">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="border-0"
                                                                            style="border: 0 !important;">
                                                                            <p class="result-date"
                                                                                style="text-align:left; float:left; display:inline-block; margin-top:50px; padding-left: 0;">
                                                                                <?php echo app('translator')->get('reports.date_of_publication_of_result'); ?> :
                                                                                <strong>
                                                                                    <?php echo e(dateConvert(@$exam_content->publish_date)); ?>

                                                                                </strong>
                                                                            </p>
                                                                        </td>
                                                                        <td class="border-0"
                                                                            style="border: 0 !important;">
                                                                            <div
                                                                                class="text-right d-flex flex-column justify-content-end">
                                                                                <div class="thumb text-right">
                                                                                    <img src="<?php echo e(@$exam_content->file); ?>"
                                                                                        width="100px">
                                                                                </div>
                                                                                <p
                                                                                    style="text-align:right; float:right; display:inline-block; margin-top:5px;">
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
        </div>
    </section>
    <!--================ End Facts Area =================-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="text/javascript" src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/toastr.min.js"></script>
    <?php echo Toastr::message(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontEnd.home.front_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\frontEnd\home\examResult.blade.php ENDPATH**/ ?>
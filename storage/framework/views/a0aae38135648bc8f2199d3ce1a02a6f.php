<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('reports.mark_sheet_report_student'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
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
            border-bottom: 0 !important ;
        }

        .single-report-admit table tr td {
            border-color: #dee2e6 !important;
        }

        .custom_table tbody tr th{
            border-color: #dee2e6 !important;
        }
        .spacing tr th{
            padding: 3px 10px !important;
            vertical-align: middle;
            border: 1px solid #dee2e6 !important;
        }

        .spacing tr td{
            padding: 0px 40px !important;
            vertical-align: middle;
        }
        @media (max-width: 576px){
            .single-report-admit .report-admit-img{
                position: initial;
                margin: auto;
                margin-top: 20px;
            }
        }

    </style>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('reports.mark_sheet_report_student'); ?> </h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('reports.reports'); ?></a>
                    <a href="#"><?php echo app('translator')->get('reports.mark_sheet_report_student'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area">
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
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'mark_sheet_report_students', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

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
                                            <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                        </div>
                                        <?php if($errors->has('exam_type')): ?>
                                            <span class="text-danger custom-error-message" role="alert">
                                                <?php echo e(@$errors->first('exam_type')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>

                                    <div class="col-lg-3 mt-15" id="select_un_student_div">
                                        <label for=""><?php echo app('translator')->get('common.select_student'); ?></label>
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
                            <div class="col-lg-3 mt-30-md md_mb_20">
                                <label class="primary_input_label" for=""><?php echo e(__('exam.exam')); ?><span class="text-danger"> *</span></label>
                                <select class="primary_select form-control<?php echo e($errors->has('exam') ? ' is-invalid' : ''); ?>"
                                        name="exam">
                                    <option data-display="<?php echo app('translator')->get('reports.select_exam'); ?> *" value=""><?php echo app('translator')->get('reports.select_exam'); ?>
                                        *
                                    </option>
                                    <?php $__currentLoopData = $exams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($exam->id); ?>" <?php echo e(isset($exam_id)? ($exam_id == $exam->id? 'selected':''):''); ?>><?php echo e($exam->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('exam')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('exam')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-3 mt-30-md md_mb_20">
                                <label class="primary_input_label" for=""><?php echo e(__('common.class')); ?><span class="text-danger"> *</span></label>
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
                            <div class="col-lg-3 mt-30-md md_mb_20" id="select_section_div">
                                <label class="primary_input_label" for=""><?php echo e(__('common.section')); ?><span class="text-danger"> *</span></label>
                                <select class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?>" id="select_section" name="section">
                                    <option data-display="<?php echo app('translator')->get('common.select_section'); ?> *" value=""><?php echo app('translator')->get('common.select_section'); ?> *</option>
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

                            <div class="col-lg-3 mt-30-md md_mb_20" id="select_student_div">
                                <label class="primary_input_label" for=""><?php echo e(__('common.student')); ?><span class="text-danger"> *</span></label>
                                <select class="primary_select form-control<?php echo e($errors->has('student') ? ' is-invalid' : ''); ?>"
                                        id="select_student" name="student">
                                    <option data-display="<?php echo app('translator')->get('reports.select_student'); ?> *"
                                            value=""><?php echo app('translator')->get('reports.select_student'); ?> *
                                    </option>
                                </select>
                                <div class="pull-right loader loader_style" id="select_student_loader">
                                    <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                </div>
                                <?php if($errors->has('student')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('student')); ?>

                                    </span>
                                <?php endif; ?>
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

            table.custom_table thead tr > th {
                border: 0;
                padding: 0;
            }

            /* tr:last-child td {
                border: 0 !important;
            }
            tr:nth-last-child(2) td {
                border: 0 !important;
            }
            tr:nth-last-child(3) td {
                border: 0 !important;
            } */

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

            .custom_table th ul li {
            }

            .custom_table th ul li p {
                margin-bottom: 10px;
                font-weight: 500;
                font-size: 14px;
            }

            /* tbody td p{
              text-align: right;
            } */
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

            .italic_text {
            }

            .student_info {

            }

            .student_info li {
                display: flex;
            }

            .info_details {
                display: flex;
                flex-wrap: wrap;
                margin-top: 30px;
                margin-bottom: 30px;
            }

            .info_details li > p {
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
                border-top:0 !important;
            }
            /* new  style  */
            .single-report-admit{}
            .single-report-admit .student_marks_table{
                background: -webkit-linear-gradient(
                        90deg
                        , #d8e6ff 0%, #ecd0f4 100%);
                background: -moz-linear-gradient(90deg, #d8e6ff 0%, #ecd0f4 100%);
                background: -o-linear-gradient(90deg, #d8e6ff 0%, #ecd0f4 100%);
                background: linear-gradient(
                        90deg
                        , #d8e6ff 0%, #ecd0f4 100%);
            }

            .profile_100{
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
                .single-report-admit table thead tr th{
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
                    border: 1px solid rgba(130, 139, 178, 0.15) !important;
                    padding: 8px !important;
                }
                .custom_table thead th{
                    text-align: center !important;
                }
                .custom_table tbody td{
                    text-align: center !important;
                }
                .custom_table thead tr:first-child th:first-child {
                    text-align: left !important;
                }
                .custom_table thead tr:first-child td:first-child {
                    text-align: center !important;
                }
                .custom_table tbody tr td:last-child{
                    text-align: left !important;
                }
            </style>
        <?php endif; ?>
        <?php if(moduleStatusCheck('University')): ?>
            <?php if ($__env->exists('university::exam.mark_sheet_report')) echo $__env->make('university::exam.mark_sheet_report', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>
            <section class="student-details">
                <div class="container-fluid p-0">
                    <div class="white-box mt-40">
                        <div class="row">
                            <div class="col-sm-6 no-gutters">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php echo app('translator')->get('reports.mark_sheet_report'); ?></h3>
                                </div>
                            </div>
                            <div class="col-sm-6 pull-sm-right text-sm-right mb-3 mb-sm-0">
                                <a href="<?php echo e(route('mark_sheet_report_print', [$input['exam_id'], $input['class_id'], $input['section_id'], $input['student_id']])); ?>"
                                   class="primary-btn small fix-gr-bg pull-sm-right" target="_blank">
                                    <i class="ti-printer"> </i>
                                    <?php echo app('translator')->get('reports.print'); ?>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div>
                                    <div class="row justify-content-center">
                                        <div class="col-lg-12">
                                            <div class="single-report-admit">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="row">
                                                            <div class="col-xl-2 col-sm-8 text-center text-xl-left mb-3 mb-xl-0">
                                                                <img class="logo-img" src="<?php echo e(generalSetting()->logo); ?>" alt="<?php echo e(generalSetting()->school_name); ?>">
                                                            </div>
                                                            <div class="col-xl-8  col-sm-8 text-center">
                                                                <h3 class="text-white" style="font-size: 30px;margin-bottom: 0px;"> <?php echo e(isset(generalSetting()->school_name)?generalSetting()->school_name:'Infix School Management ERP'); ?> </h3>
                                                                <p class="text-white mb-0" style="font-size: 16px;">  <?php echo e(isset(generalSetting()->address)?generalSetting()->address:'Infix School Address'); ?> </p>
                                                                <p class="text-white mb-0" style="font-size: 16px;">
                                                                    <?php echo app('translator')->get('common.email'); ?>: <span class="text-lowercase"><?php echo e(isset(generalSetting()->email)?generalSetting()->email:'hello@aorasoft.com'); ?></span>,
                                                                    <?php echo app('translator')->get('common.phone'); ?>: <?php echo e(isset(generalSetting()->phone)?generalSetting()->phone:'+96897002784'); ?> </p>
                                                            </div>
    
                                                        </div>
                                                        <div class="report-admit-img profile_100" style="background-image: url(<?php echo e(file_exists(@$studentDetails->studentDetail->student_photo) ? asset($studentDetails->studentDetail->student_photo) : asset('public/uploads/staff/demo/staff.jpg')); ?>)"></div>
    
                                                    </div>
                                                    
                                                    <div class="student_marks_table">
                                                        <table class="custom_table" >
                                                            <thead>
                                                            <tr>
                                                                <th colspan="1" class="text_left" style="border: 0px !important;">
                                                                    <div class="main-title">
                                                                        <h2 class="mb-20">
                                                                            <?php echo e($student_detail->studentDetail->full_name); ?>

                                                                        </h2>
                                                                    </div>
                                                                    <div class="marks_wrap_area d-block">
                                                                        <div class="row">
                                                                            <div class="col-lg-8">
                                                                                <div class="d-flex flex-wrap" style="grid-gap: 30px;">
                                                                                    <ul class="student_info">
                                                                                        <li>
                                                                                            <p>
                                                                                                <?php echo app('translator')->get('common.academic_year'); ?>
                                                                                            </p>
                                                                                            <p>
                                                                                                <strong>
                                                                                                    : <?php echo e(@$student_detail->academic->year); ?>

                                                                                                </strong>
                                                                                            </p>
                                                                                        </li>
                                                                                        <li>
                                                                                            <p>
                                                                                                <?php echo app('translator')->get('common.class'); ?>
                                                                                            </p>
                                                                                            <p class="italic_text">
                                                                                                <strong>
                                                                                                    : <?php echo e($student_detail->class->class_name); ?>

                                                                                                </strong>
                                                                                            </p>
                                                                                        </li>
                                                                                        <li>
                                                                                            <p>
                                                                                                <?php echo app('translator')->get('common.section'); ?>
                                                                                            </p>
                                                                                            <p class="italic_text">
                                                                                                <strong>
                                                                                                    : <?php echo e($student_detail->section->section_name); ?>

                                                                                                </strong>
                                                                                            </p>
                                                                                        </li>
                                                                                        <li>
                                                                                            <p>
                                                                                                <?php echo app('translator')->get('student.admission_no'); ?>
                                                                                            </p>
                                                                                            <p class="italic_text">
                                                                                                <strong>
                                                                                                    : <?php echo e(@$student_detail->student->admission_no); ?>

                                                                                                </strong>
                                                                                            </p>
                                                                                        </li>
    
                                                                                        <li>
                                                                                            <p>
                                                                                                <?php echo app('translator')->get('student.roll_no'); ?>
                                                                                            </p>
                                                                                            <p>
                                                                                                <strong>
                                                                                                    : <?php echo e($student_detail->studentDetail->roll_no); ?>

                                                                                                </strong>
                                                                                            </p>
                                                                                        </li>
    
                                                                                        <li>
                                                                                            <p>
                                                                                                <?php echo app('translator')->get('common.date_of_birth'); ?>
                                                                                            </p>
                                                                                            <p>
                                                                                                <strong>
                                                                                                    : <?php echo e($student_detail->studentDetail->date_of_birth != ""? dateConvert($student_detail->studentDetail->date_of_birth):''); ?>

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
                                                                                    <div class="table-responsive">
                                                                                    <table class="table " id="grade_table">
                                                                                        <thead>
                                                                                        <tr>
                                                                                            <th><?php echo app('translator')->get('reports.staring'); ?></th>
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
                                                                                                <td class="text-left"><?php echo e($grade_d->description); ?></td>
                                                                                            </tr>
                                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                        </tbody>
                                                                                    </table>
                                                                                    </div>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </th>
                                                            </tr>
                                                            </thead>
                                                        </table>
                                                        <div class="student_name_highlight" style="text-align: center; margin-bottom: 20px;">
                                                            <h3><?php echo e($exam_details->title); ?></h3>
                                                            <h4 style="text-align: center !important;"> <span style="border-bottom: 3px double;"><?php echo app('translator')->get('reports.mark_sheet'); ?></span></h4>
                                                        </div>
    
    
    
                                                        <div class="table-responsive">
                                                        <table class="custom_table">
                                                            <thead>
                                                            <!--                                                            <tr>
    
                                                                    <th colspan="5"><?php echo e($exam_details->title); ?></th>
                                                                </tr>-->
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
                                                                    <th>
                                                                        <?php echo e($data->subject->subject_name); ?>

                                                                    </th>
                                                                    <td>
                                                                        <p>
                                                                            <?php if(@$generalsettingsResultType == 'mark'): ?>
                                                                                <?php echo e(subject100PercentMark()); ?>

                                                                            <?php else: ?>
                                                                                <?php echo e(@subjectFullMark($exam_details->id, $data->subject->id, $class_id, $section_id )); ?>

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
                                                                                <?php echo e(@singleSubjectMark($data->student_record_id,$data->subject_id,$data->exam_type_id)[0]); ?>

                                                                            <?php else: ?>
                                                                                <?php echo e(@$data->total_marks); ?>

                                                                            <?php endif; ?>
    
                                                                            <?php
                                                                                if(@$generalsettingsResultType == 'mark'){
                                                                                    $total_mark+=subjectPercentageMark(@$data->total_marks, @subjectFullMark($exam_details->id, $data->subject->id, $class_id, $section_id));
                                                                                }else{
                                                                                    $total_mark+=@$data->total_marks;
                                                                                }
                                                                            ?>
                                                                        </p>
                                                                    </td>
                                                                    <?php if(@$generalsettingsResultType != 'mark'): ?>
                                                                        <td>
                                                                            <p>
                                                                                <?php
                                                                                    $result = markGpa(@subjectPercentageMark(@$data->total_marks , @subjectFullMark($exam_details->id, $data->subject->id, $class_id, $section_id)));
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
                                                                                    $evaluation= markGpa(subjectPercentageMark(@$data->total_marks, @subjectFullMark($exam_details->id, $data->subject->id, $class_id, $section_id)));
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
                                                                        $count++
                                                                    ?>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if(@$optional_subject_setup->gpa_above): ?>
                                                                <tr>
                                                                    <td class="nowrap"><?php echo app('translator')->get('reports.average_mark'); ?></td>
                                                                    <td class="nowrap">
                                                                        <p><?php echo e(number_format($average_passing_mark, 2, '.', '')); ?></p>
                                                                    </td>
                                                                </tr>
                                                                <?php $__currentLoopData = $mark_sheet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php
                                                                        if ($data->subject_id!=$optional_subject) {
                                                                            continue;
                                                                        }
                                                                    ?>
                                                                    <tr>
                                                                        <th>
                                                                            <?php echo e($data->subject->subject_name); ?>

                                                                        </th>
                                                                        <td>
                                                                            <p>
                                                                                <?php echo e(@subjectFullMark($exam_details->id, $data->subject->id, $class_id, $section_id )); ?>

                                                                            </p>
                                                                        </td>
                                                                        <td>
                                                                            <p><?php echo e(@subjectHighestMark($exam_type_id, $data->subject->id, $class_id, $section_id)); ?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p>
                                                                                <?php echo e(@$data->total_marks); ?>

                                                                                <?php
                                                                                    if(@$generalsettingsResultType == 'mark'){
                                                                                        $total_mark+=subjectPercentageMark(@$data->total_marks, @subjectFullMark($exam_details->id, $data->subject->id, $class_id, $section_id));
                                                                                    }else{
                                                                                        $total_mark+=@$data->total_marks;
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
                                                                                    if($data->total_gpa_point > @$optional_subject_setup->gpa_above){
                                                                                        $optional_countable_gpa= $data->total_gpa_point - @$optional_subject_setup->gpa_above;
                                                                                    }else{
                                                                                        $optional_countable_gpa=0;
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
                                                                                        $evaluation= markGpa(subjectPercentageMark(@$data->total_marks, @subjectFullMark($exam_details->id, $data->subject->id, $class_id, $section_id)));
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
                                                        </div>
                                                        <div class="col-md-6 offset-md-3">
                                                            <div class="table-responsive">
                                                            <table class="table <?php if(resultPrintStatus('vertical_boarder')): ?> mt-5 <?php endif; ?>">
                                                                <tbody class="spacing">
                                                                <tr>
                                                                    <td><?php echo app('translator')->get('reports.attendance'); ?></td>
                                                                    <?php if(isset($exam_content)): ?>
                                                                        <td class="nowrap">
                                                                            <p><?php echo e(@$student_attendance); ?> <?php echo app('translator')->get('reports.of'); ?> <?php echo e(@$total_class_days); ?></p>
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
                                                                            <p><?php echo e(number_format($average_passing_mark, 2, '.', '')); ?></p>
                                                                        </td>
                                                                        <td><?php echo app('translator')->get('common.status'); ?></td>
                                                                        <td class="nowrap">
                                                                            <?php
                                                                                $average_mark = 0;
                                                                                if($Optional_subject_count){
                                                                                $average_mark = $total_mark/($Optional_subject_count);
                                                                                }
    
                                                                            ?>
                                                                            <p><strong><?php echo e($average_passing_mark <= $average_mark ? __('exam.pass') : __('exam.fail')); ?></strong></p>
                                                                        </td>
                                                                    </tr>
                                                                <?php endif; ?>
                                                                <tr>
                                                                    <td class="nowrap <?php echo e($generalsettingsResultType == 'mark' ? 'text-center' : ''); ?>" colspan="<?php echo e($generalsettingsResultType == 'mark' ? '2' : ''); ?>"><?php echo app('translator')->get('reports.average_mark'); ?></td>
                                                                    <td colspan="<?php echo e($generalsettingsResultType == 'mark' ? '2' : ''); ?>">
                                                                        <?php
                                                                            $average_mark = 0;
                                                                            if($Optional_subject_count){
                                                                            $average_mark = $total_mark/($Optional_subject_count);
                                                                            }
                                                                        ?>
                                                                        <?php echo e(number_format(@$average_mark, 2, '.', '')); ?>

                                                                    </td>
    
                                                                    <?php if(@$generalsettingsResultType != 'mark'): ?>
                                                                        <td class="nowrap"><?php echo app('translator')->get('reports.gpa_above'); ?> ( <?php echo e(@$optional_subject_setup->gpa_above); ?> )</td>
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
                                                                                $without_optional = 0;
                                                                                if($Optional_subject_count){
                                                                                $without_optional=$main_subject_total_gpa/$Optional_subject_count;
                                                                                }
    
                                                                            ?>
                                                                            <?php echo e(number_format($without_optional, 2,'.','')); ?>

                                                                        </td>
                                                                        <td><?php echo app('translator')->get('exam.gpa'); ?></td>
                                                                        <td>
                                                                            <?php
                                                                                $final_result= 0;
                                                                                if($Optional_subject_count){
                                                                                 $final_result = ($main_subject_total_gpa + $optional_countable_gpa) /$Optional_subject_count;
                                                                                }
    
                                                                                    if($final_result >= $maxGrade){
                                                                                        echo number_format($maxGrade, 2,'.','');
                                                                                    } else {
                                                                                        echo number_format($final_result, 2,'.','');
                                                                                    }
                                                                            ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?php echo app('translator')->get('exam.grade'); ?></td>
                                                                        <td>
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
                                                                        <td><?php echo app('translator')->get('homework.evaluation'); ?></td>
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
                                                                            <p><?php echo e(@$grade_details->description); ?></p>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2" style="text-align: center !important;">
                                                                            <?php echo app('translator')->get('exam.position'); ?>
                                                                        </td>
                                                                        <td colspan="2" style="text-align: center !important;"><?php echo e(getStudentMeritPosition($class_id, $section_id, $exam_type_id, $student_detail->id)); ?></td>
    
                                                                    </tr>
                                                                <?php endif; ?>
    
                                                                </tbody>
                                                            </table>
                                                            </div>
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
                                                            function myFunction2(value, subject , maxGrade) {
                                                                if (value != "") {
                                                                    var totalGrade = Number(value / subject).toFixed(2);
                                                                    if(totalGrade >= maxGrade){
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
                                                            myFunction2( <?php echo e($main_subject_total_gpa +$optional_countable_gpa); ?>, <?php echo e($Optional_subject_count); ?>, <?php echo e($maxGrade); ?>);
                                                        </script>
    
                                                        <?php if(isset($exam_content)): ?>
                                                            <table style="width:100%" class="border-0 mark_sheet_footer">
                                                                <tbody>
                                                                <tr>
                                                                    <td class="border-0" style="border: 0 !important;">
                                                                        <p class="result-date" style="text-align:left; float:left; display:inline-block; margin-top:50px; padding-left: 0;">
                                                                            <?php echo app('translator')->get('reports.date_of_publication_of_result'); ?> :
                                                                            <strong>
                                                                                <?php echo e(dateConvert(@$exam_content->publish_date)); ?>

                                                                            </strong>
                                                                        </p>
                                                                    </td>
                                                                    <td class="border-0" style="border: 0 !important;">
                                                                        <div class="text-right d-flex flex-column justify-content-end">
                                                                            <div class="thumb text-right">
                                                                                <img src="<?php echo e(@$exam_content->file); ?>" width="100px">
                                                                            </div>
                                                                            <p style="text-align:right; float:right; display:inline-block; margin-top:5px;">
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

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\reports\mark_sheet_report_student.blade.php ENDPATH**/ ?>
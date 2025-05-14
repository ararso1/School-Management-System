<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('reports.merit_list_report'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <?php $__env->startPush('css'); ?>
        <style>
            #grade_table th{
                border: 1px solid black;
                text-align: center;
                background: #351681;
                color: white;
            }

            #grade_table td{
                color: black;
                text-align: center;
                border: 1px solid black;
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

            .single-report-admit table.summeryTable tbody tr:first-of-type td,
            .single-report-admit table.comment_table tbody tr:first-of-type td {
                border-top:0 !important;
            }

            .subjectList{
                display: grid;
                grid-template-columns: repeat(2,1fr);
                grid-column-gap: 50px;
                margin: 0;
                padding: 0;
            }

            .subjectList li{
                list-style: none
            }

            .subjectList li span{
                color: #828bb2;
                font-size: 14px;
            }

            .font-14{
                font-size: 14px;
            }

            .line_grid {
                display: grid;
                grid-template-columns: 120px auto;
                grid-gap: 10px;
            }
            <?php if(resultPrintStatus('vertical_boarder')): ?>
            .single-report-admit table tr td, .single-report-admit table tr th{
                border: 1px solid rgba(130, 139, 178, 0.15) !important;
                padding: 5px
            }
            .single-report-admit table thead tr th{
                border: 1px solid rgba(130, 139, 178, 0.15) !important;
            }
            <?php endif; ?>
        </style>
    <?php $__env->stopPush(); ?>
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
                <div class="white-box">
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'merit_list_reports', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

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
                                        <label for=""> <?php echo app('translator')->get('exam.select_exam'); ?> *</label>
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
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="col-lg-4 mt-30-md">
                                <select class="primary_select form-control<?php echo e($errors->has('exam') ? ' is-invalid' : ''); ?>" name="exam">
                                    <option data-display="<?php echo app('translator')->get('common.select_exam'); ?>*" value=""><?php echo app('translator')->get('common.select_exam'); ?> *</option>
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
                            <div class="col-lg-4 mt-30-md">
                                <select class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>" id="select_class" name="class">
                                    <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value=""><?php echo app('translator')->get('common.select_class'); ?> *</option>
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
                            <div class="col-lg-4 mt-30-md" id="select_section_div">
                                <select class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?> select_section" id="select_section" name="section">
                                    <option data-display="<?php echo app('translator')->get('common.select_section'); ?>*" value=""><?php echo app('translator')->get('common.select_section'); ?> *</option>
                                </select>
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
        <?php if(moduleStatusCheck('University')): ?>
            <?php if ($__env->exists('university::exam.merit_list_report')) echo $__env->make('university::exam.merit_list_report', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>
            <section class="student-details">
                <div class="container-fluid p-0">
                    <div class="row mt-40">
                        <div class="col-lg-4 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-30 mt-0"><?php echo app('translator')->get('reports.merit_list_report'); ?></h3>
                            </div>
                        </div>
                        <div class="col-lg-8 pull-right">
                            <a href="<?php echo e(route('merit-list/print', [$InputExamId, $InputClassId, $InputSectionId])); ?>" class="primary-btn small fix-gr-bg pull-right" target="_blank"><i class="ti-printer"> </i> <?php echo app('translator')->get('common.print'); ?></a>
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
                                                    <div class="row">
                                                        <div class="col-xl-2 text-center mb-3 mb-xl-0 text-xl-left">
                                                            <img class="logo-img" src="<?php echo e(generalSetting()->logo); ?>" alt="<?php echo e(generalSetting()->school_name); ?>">
                                                        </div>
                                                        <div class="col-xl-8 text-center">
                                                            <h3 class="text-white" style="font-size: 30px;margin-bottom: 0px;"> <?php echo e(isset(generalSetting()->school_name)?generalSetting()->school_name:'Infix School Management ERP'); ?> </h3>
                                                            <p class="text-white mb-0" style="font-size: 16px;"> <?php echo e(isset(generalSetting()->address)?generalSetting()->address:'Infix School Address'); ?> </p>
                                                            <p class="text-white mb-0" style="font-size: 16px;"><?php echo app('translator')->get('common.email'); ?>:  <?php echo e(isset(generalSetting()->email)? generalSetting()->email:'hello@aorasoft.com'); ?> ,   <?php echo app('translator')->get('common.phone'); ?>:  <?php echo e(isset(generalSetting()->phone)?generalSetting()->phone:'hello@aorasoft.com'); ?> </p>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-lg-8">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <h3><?php echo app('translator')->get('reports.order_of_merit_list'); ?></h3>
                                                                        <p class="mb-0 font-14 line_grid">
                                                                            <?php echo app('translator')->get('common.academic_year'); ?>  <span class="primary-color fw-500 "> : <?php echo e(@$class->academic->year); ?></span>
                                                                        </p>
                                                                        <p class="mb-0 font-14 line_grid">
                                                                            <?php echo app('translator')->get('exam.exam'); ?> <span class="primary-color fw-500">: <?php echo e($exam_name); ?></span>
                                                                        </p>
                                                                        <p class="mb-0 font-14 line_grid">
                                                                            <?php echo app('translator')->get('common.class'); ?> <span class="primary-color fw-500">: <?php echo e($class_name); ?></span>
                                                                        </p>
                                                                        <p class="mb-0 font-14 line_grid">
                                                                            <?php echo app('translator')->get('common.section'); ?> <span class="primary-color fw-500">: <?php echo e($section->section_name); ?></span>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <h3><?php echo app('translator')->get('common.subjects'); ?></h3>
                                                                        <ul class="subjectList">
                                                                            <?php $__currentLoopData = $assign_subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <li>
                                                                                    <p class="mb-0" >
                                                                                        <span class="primary-color fw-500"><?php echo e($subject->subject->subject_name); ?></span>
                                                                                    </p>
                                                                                </li>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="w-100 mt-30 mb-20 table table-bordered meritList">
                                                            <thead>
                                                            <tr>
                                                                <th><?php echo app('translator')->get('common.name'); ?></th>
                                                                <th><?php echo app('translator')->get('student.admission_no'); ?></th>
                                                                <th><?php echo app('translator')->get('student.roll_no'); ?></th>
                                                                <th><?php echo app('translator')->get('reports.position'); ?></th>
                                                                
                                                                
                                                                <th><?php echo app('translator')->get('exam.total_mark'); ?></th>
                                                                <?php if(generalSetting()->result_type == 'mark'): ?>
                                                                <th><?php echo app('translator')->get('exam.average'); ?></th>
                                                                <?php else: ?> 
                                                                <th><?php echo app('translator')->get('reports.gpa'); ?></th>
                                                                <?php endif; ?> 
                                                                <?php $__currentLoopData = $subjectlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <th><?php echo e($subject); ?></th>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php $__currentLoopData = $allresult_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php
                                                                    $total_student_mark = 0;
                                                                    $total = 0;
                                                                    $markslist = explode(',',$row->marks_string);
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo e($row->student_name); ?></td>
                                                                    <td><?php echo e($row->admission_no); ?></td>
                                                                    <td><?php echo e($row->studentinfo->roll_no); ?></td>
                                                                    <td><?php echo e(@getStudentMeritPosition($InputClassId, $InputSectionId, $InputExamId, $row->studentinfo->studentRecord->id)); ?></td>
                                                                    <td><?php echo e($row->total_marks); ?></td>
                                                                    <?php if(generalSetting()->result_type == 'mark'): ?>
                                                                    <td><?php echo e(number_format(($row->total_marks / count($markslist)),2)); ?></td>
                                                                    <?php else: ?> 
                                                                    <td><?php echo e($row->gpa_point); ?></td>
                                                                    <?php endif; ?> 
                                                                    <?php if(!empty($markslist)): ?>
                                                                        <?php $__currentLoopData = $markslist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mark): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php
                                                                                $subject_mark[]= $mark;
                                                                                $total_student_mark = $total_student_mark + $mark;
                                                                                $total = $total + $subject_total_mark;
                                                                            ?>
                                                                            <td> <?php echo e(!empty($mark)? $mark:0); ?></td>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php endif; ?>
                                                                    
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <?php if($exam_content): ?>
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
            </section>
        <?php endif; ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\reports\merit_list_report_normal.blade.php ENDPATH**/ ?>
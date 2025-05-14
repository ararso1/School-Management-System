<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('reports.progress_card_report'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>
<style type="text/css">
    .single-report-admit table tr th {

    border: 1px solid #a2a8c5 !important;
    vertical-align: middle;
}
    .single-report-admit table tr td {
        
    border: 1px solid #a2a8c5 !important;
}
</style>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('reports.progress_card_report'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('reports.reports'); ?></a>
                <a href="#"><?php echo app('translator')->get('reports.progress_card_report'); ?></a>
            </div>
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
                                    <option data-display="<?php echo app('translator')->get('common.select_section'); ?> *" value=""><?php echo app('translator')->get('common.select_section'); ?> *</option>
                                </select>
                                <?php if($errors->has('section')): ?>
                                <span class="text-danger invalid-select" role="alert">
                                    <?php echo e($errors->first('section')); ?>

                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-4 mt-30-md" id="select_student_div">
                                <select class="primary_select form-control<?php echo e($errors->has('student') ? ' is-invalid' : ''); ?>" id="select_student" name="student">
                                    <option data-display="<?php echo app('translator')->get('common.select_student'); ?> *" value=""><?php echo app('translator')->get('common.select_student'); ?> *</option>
                                </select>
                                <?php if($errors->has('student')): ?>
                                <span class="text-danger invalid-select" role="alert">
                                    <?php echo e($errors->first('student')); ?>

                                </span>
                                <?php endif; ?>
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

    <section class="student-details">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-4 no-gutters">
                    <div class="main-title">
                        <h3 class="mb-30"><?php echo app('translator')->get('reports.progress_card_report'); ?></h3>
                    </div>
                </div>
                <div class="col-lg-8 pull-right mt-0">

                        <div class="print_button pull-right">
                            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'progress-card/print', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student', 'target' => '_blank'])); ?>


                            <input type="hidden" name="class_id" value="<?php echo e($class_id); ?>">
                            <input type="hidden" name="section_id" value="<?php echo e($section_id); ?>">
                            <input type="hidden" name="student_id" value="<?php echo e($student_id); ?>">
                            
                            
                            <button type="submit" class="primary-btn small fix-gr-bg"><i class="ti-printer"> </i> <?php echo app('translator')->get('common.print'); ?>
                            </button>
                           <?php echo e(Form::close()); ?>

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
                                                <div>
                                                    <img class="logo-img" src="<?php echo e(generalSetting()->logo); ?>" alt="">
                                                </div>
                                                <div class="ml-30">
                                                    <h3 class="text-white"> <?php echo e(isset(generalSetting()->school_name)?generalSetting()->school_name:'Infix School Management ERP'); ?> </h3>
                                                <p class="text-white mb-0"> <?php echo e(isset(generalSetting()->address)?generalSetting()->address:'Infix School Address'); ?> </p>
                                                </div>
                                            </div>
                                            <div>
                                                
                                                <img class="report-admit-img" src="<?php echo e(asset($studentDetails->student_photo)); ?>" width="100" height="100" alt="">
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div>
                                                <h3><?php echo e($studentDetails->full_name); ?></h3>
                                                
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <p class="mb-0">
                                                            <?php echo app('translator')->get('common.academic_year'); ?> : <span class="primary-color fw-500"><?php echo e(generalSetting()->session_year); ?></span>
                                                        </p>
                                                        <p class="mb-0">
                                                                <?php echo app('translator')->get('student.roll'); ?> : <span class="primary-color fw-500"><?php echo e($studentDetails->roll_no); ?></span>
                                                            </p>

                                                        
                                                        
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <p class="mb-0">
                                                            <?php echo app('translator')->get('common.class'); ?> : <span class="primary-color fw-500"><?php echo e($studentDetails->class_name); ?></span>
                                                        </p>
                                                        <p class="mb-0">
                                                                <?php echo app('translator')->get('student.admission_no'); ?> : <span class="primary-color fw-500"><?php echo e($studentDetails->admission_no); ?></span>
                                                            </p>
                                                        

                                                        
                                                    </div>

                                                    <div class="col-lg-3">
                                                            <p class="mb-0">
                                                                    <?php echo app('translator')->get('common.section'); ?> : <span class="primary-color fw-500"><?php echo e($studentDetails->section_name); ?></span>
                                                                </p>
                                                   
                                                        
                                                    </div>
                                                </div>
                                            </div>


                                            <table class="w-100 mt-30 mb-20 table table-bordered">
                                                <thead>
                                                    <tr style="text-align: center;">
                                                        <th rowspan="2"><?php echo app('translator')->get('common.subjects'); ?></th>
                                                        <?php $__currentLoopData = $assinged_exam_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assinged_exam_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php
                                                            $exam_type = App\SmExamType::examType($assinged_exam_type);
                                                        ?>
                                                            <th colspan="2" style="text-align: center;"><?php echo e($exam_type->title); ?></th>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <th rowspan="2"><?php echo app('translator')->get('exam.result'); ?></th>
                                                        <th rowspan="2"><?php echo app('translator')->get('exam.grade'); ?></th>
                                                        <th rowspan="2"><?php echo app('translator')->get('exam.gpa'); ?></th>

                                                    </tr>
                                                <tr  style="text-align: center;">
                                                    <?php $__currentLoopData = $assinged_exam_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assinged_exam_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                       
                                                        <th><?php echo app('translator')->get('exam.marks'); ?></th>
                                                        <th><?php echo app('translator')->get('exam.grade'); ?></th>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $total_fail = 0;
                                                        $total_marks = 0;
                                                    ?>
                                                    <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr style="text-align: center">
                                                        <td><?php echo e($data->subject !=""?$data->subject->subject_name:""); ?></td>
                                                        <?php
                                                            $totalSumSub= 0;
                                                            $totalSubjectFail= 0;
                                                            $TotalSum= 0;
                                                        foreach($assinged_exam_types as $assinged_exam_type){

                                                            $mark_parts     =   App\SmAssignSubject::getNumberOfPart($data->subject_id, $class_id, $section_id, $assinged_exam_type);

                                                            $result         =   App\SmResultStore::GetResultBySubjectId($class_id, $section_id, $data->subject_id,$assinged_exam_type ,$student_id);
                                                            if(!empty($result)){
                                                                $final_results = App\SmResultStore::GetFinalResultBySubjectId($class_id, $section_id, $data->subject_id,$assinged_exam_type ,$student_id);

                                                            }

                                                            if($result->count()>0){
                                                                ?>
                                                                    <td>
                                                                    <?php

                                                                        if($final_results != ""){
                                                                            echo $final_results->total_marks;
                                                                            $totalSumSub = $totalSumSub + $final_results->total_marks;
                                                                            $total_marks = $total_marks + $final_results->total_marks;

                                                                        }else{
                                                                            echo 0;
                                                                        }

                                                                    ?>
                                                                </td>
                                                                    <td>
                                                                        <?php

                                                                            if($final_results != ""){
                                                                                if($final_results->total_gpa_grade == "F"){
                                                                                    $totalSubjectFail++;
                                                                                    $total_fail++;
                                                                                }
                                                                                echo $final_results->total_gpa_grade;
                                                                            }else{
                                                                                echo '-';
                                                                            }

                                                                        ?>
                                                                    </td>
                                                        <?php
                                                                }else{ ?>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                <?php

                                                                }
                                                                    }
                                                                ?>

                                                                <td><?php echo e($totalSumSub); ?></td>
                                                                <td>
                                                                    <?php
                                                                        if($totalSubjectFail > 0){
                                                                            echo 'F';
                                                                        }else{
                                                                            $totalSumSub = $totalSumSub / count($assinged_exam_types);

                                                                            $mark_grade = App\SmMarksGrade::where([['percent_from', '<=', $totalSumSub], ['percent_upto', '>=', $totalSumSub]])->where('academic_id', getAcademicId())->first();


                                                                            echo @$mark_grade->grade_name;
                                                                        }
                                                                    ?>
                                                                </td>

                                                                <td>
                                                                    <?php
                                                                        if($totalSubjectFail > 0){
                                                                            echo 'F';
                                                                        }else{

                                                                            $mark_grade = App\SmMarksGrade::where([['percent_from', '<=', $totalSumSub], ['percent_upto', '>=', $totalSumSub]])->where('academic_id', getAcademicId())->first();


                                                                            echo @$mark_grade->gpa;
                                                                        }
                                                                    ?>
                                                                </td>
                                                                
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $colspan = 4 + count($assinged_exam_types) * 2;
                                                        
                                                    ?>
                                                    <tr>
                                                        <td colspan="<?php echo e($colspan / 2 - 1); ?>" class="text-center"><?php echo app('translator')->get('exam.total_marks'); ?></td>
                                                        <td colspan="<?php echo e($colspan / 2 + 1); ?>" class="text-center"><?php echo e($total_marks); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="<?php echo e($colspan / 2 - 1); ?>" class="text-center"><?php echo app('translator')->get('exam.total_grade'); ?></td>
                                                        <td colspan="<?php echo e($colspan / 2 + 1); ?>" class="text-center">
                                                            <?php
                                                                if($total_fail != 0){
                                                                    echo 'F';
                                                                }else{
                                                                    $total_exam_subject = count($subjects) + count($assinged_exam_types);
                                                                    $average_mark = $total_marks / $total_exam_subject;

                                                                    $average_grade = App\SmMarksGrade::where([['percent_from', '<=', $totalSumSub], ['percent_upto', '>=', $totalSumSub]])->where('academic_id', getAcademicId())->first();


                                                                    echo @$average_grade->grade_name;
                                                                }
                                                            ?>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="<?php echo e($colspan / 2 - 1); ?>" class="text-center"><?php echo app('translator')->get('reports.total_gpa'); ?></td>
                                                        <td colspan="<?php echo e($colspan / 2 + 1); ?>" class="text-center">
                                                            <?php
                                                                if($total_fail != 0){
                                                                    echo '0.00';
                                                                }else{
                                                                    $total_exam_subject = count($subjects) + count($assinged_exam_types);
                                                                    $average_mark = $total_marks / $total_exam_subject;

                                                                    $average_grade = App\SmMarksGrade::where([['percent_from', '<=', $totalSumSub], ['percent_upto', '>=', $totalSumSub]])->where('academic_id', getAcademicId())->first();
                                                                    echo @$average_grade->gpa;
                                                                }
                                                            ?>

                                                        </td>
                                                    </tr>
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
    </section>
<?php endif; ?>

            

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\reports\progress_card_report_whole.blade.php ENDPATH**/ ?>

<?php
    $academic_id = $studentDetails->academic_id;
?>
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
    @media (max-width: 576px){
            .single-report-admit .report-admit-img{
                position: initial;
                margin: auto;
                margin-top: 20px;
            }
        }

</style>
<?php endif; ?>
<style>
    .profile_100{
        width: 100px;
        height: 100px;
        background-size: cover;
        background-position: center center;
        border-radius: 5px;
        background-repeat: no-repeat;
    }
</style>


<section class="student-details">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="white-box">
                    <div class="row">
                        <div class="col-lg-12 no-gutters">
                            <div class="main-title d-flex ">
                                <h3 class="mb-15 flex-fill"><?php echo app('translator')->get('reports.progress_card_report'); ?></h3>
                                <div class="print_button pull-right">
                                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'progress-card/print', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student', 'target' => '_blank'])); ?>

            
                                    <input type="hidden" name="class_id" value="<?php echo e($class_id); ?>">
                                    <input type="hidden" name="section_id" value="<?php echo e($section_id); ?>">
                                    <input type="hidden" name="student_id" value="<?php echo e($studentDetails->id); ?>">
                                    <input type="hidden" name="academic_id" value="<?php echo e($academic_id); ?>">
                                    <input type="hidden" name="custom_mark_report" value="<?php echo e(@$custom_mark_report); ?>">
            
                                    <button type="submit" class="primary-btn small fix-gr-bg"><i class="ti-printer"> </i> <?php echo app('translator')->get('common.print'); ?>
                                    </button>
                                    <?php echo e(Form::close()); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="single-report-admit">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-xl-2 col-sm-8 text-center text-xl-left mb-3 mb-xl-0">
                                                <img class="logo-img" src="<?php echo e(generalSetting()->logo); ?>" alt="<?php echo e(generalSetting()->school_name); ?>">
                                            </div>
                                            <div class="col-xl-8 col-sm-8  text-center">
                                                <h3 class="text-white" style="font-size: 30px; margin-bottom: 0px;">
                                                    <?php echo e(isset(generalSetting()->school_name)?generalSetting()->school_name:'Infix School Management ERP'); ?>

                                                </h3>
                                                <p class="text-white mb-0" style="font-size: 16px;">
                                                    <?php echo e(isset(generalSetting()->address)?generalSetting()->address:'Infix School Address'); ?>

                                                </p>
                                                <p class="text-white mb-0" style="font-size: 16px;">
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
                                                                <?php echo app('translator')->get('common.academic_year'); ?> : &nbsp;<span class="primary-color fw-500"><?php echo e(@$studentDetails->academic->year); ?></span>
                                                            </p>
                                                            <p class="mb-0">
                                                                <?php echo app('translator')->get('common.class'); ?> :<span class="primary-color fw-500"><?php echo e($studentDetails->class->class_name); ?></span>
                                                            </p>
                                                            <p class="mb-0">
                                                                <?php echo app('translator')->get('common.section'); ?> : <span class="primary-color fw-500"><?php echo e($studentDetails->section->section_name); ?></span>
                                                            </p>
                                                            <p class="mb-0">
                                                                <?php echo app('translator')->get('student.admission_no'); ?> : <span class="primary-color fw-500"><?php echo e($studentDetails->studentDetail->admission_no); ?></span>
                                                            </p>
                                                            <p class="mb-0">
                                                                <?php echo app('translator')->get('student.roll'); ?> :<span class="primary-color fw-500"><?php echo e($studentDetails->roll_no); ?></span>
                                                            </p>
                                                            <p class="mb-0">
                                                                <?php echo app('translator')->get('common.date_of_birth'); ?> :<span class="primary-color fw-500"><?php echo e($studentDetails->studentDetail->date_of_birth != ""? dateConvert($studentDetails->studentDetail->date_of_birth):''); ?></span>
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
                                                <div class="table-responsive">
                                                <table class="table mb-0 center-table">
                                                    <thead>
                                                    <tr class="text-center">
                                                        <th rowspan="2"><?php echo app('translator')->get('common.subjects'); ?></th>
                                                        <?php $__currentLoopData = $assinged_exam_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assinged_exam_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php
                                                                $exam_type = App\SmExamType::examType($assinged_exam_type);
                                                            ?>
                                                            <th colspan="<?php echo e((@generalSetting()->result_type == 'mark')? 2: 4); ?>"><?php echo e($exam_type->title); ?></th>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <th rowspan="2"><?php echo app('translator')->get('exam.result'); ?></th>
                                                    </tr>
                                                    <tr class="text-center">
                                                        <?php $__currentLoopData = $assinged_exam_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assinged_exam_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <th><?php echo app('translator')->get('reports.full_mark'); ?></th>
                                                            <th><?php echo app('translator')->get('exam.marks'); ?></th>
                                                            <?php if(@generalSetting()->result_type != 'mark'): ?>
                                                                <th><?php echo app('translator')->get('exam.grade'); ?></th>
                                                                <th><?php echo app('translator')->get('exam.gpa'); ?></th>
                                                            <?php endif; ?>
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
                                                            <td>
                                                                <?php
                                                                    if(@generalSetting()->result_type == 'mark'){
                                                                        $all_exam_type_full_mark += subject100PercentMark();
                                                                    }else{
                                                                        $all_exam_type_full_mark += $subject_full_mark;
                                                                    }
                                                                ?>
                                                                <?php if(@generalSetting()->result_type == 'mark'): ?>
                                                                    <?php echo e(subject100PercentMark()); ?>

                                                                <?php else: ?>
                                                                    <?php echo e($subject_full_mark); ?>

                                                                <?php endif; ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                    if($final_results != ""){
                                                                        if(@generalSetting()->result_type == 'mark'){
                                                                            $totalMark = subjectPercentageMark(@$final_results->total_marks, $subject_full_mark);
                                                                            echo $totalMark;
                                                                            $totalSumSub += $totalMark;
                                                                            $total_marks += $totalMark;
                                                                        }else{
                                                                            echo $final_results->total_marks;
                                                                            $totalSumSub += $final_results->total_marks;
                                                                            $total_marks += $final_results->total_marks;
                                                                        }
                                                                        $totalGpa += $final_results->total_gpa_point;
                                                                    }else{
                                                                        echo 0;
                                                                    }
                                                                ?>
                                                            </td>
                                                            <?php if(@generalSetting()->result_type != 'mark'): ?>
                                                                <td>
                                                                    <?php
                                                                        if($final_results != ""){
                                                                            if($final_results->total_gpa_grade == @$fail_grade_name->grade_name){
                                                                                $totalSubjectFail++;
                                                                                $total_fail++;
                                                                            }
                                                                            echo $final_results->total_gpa_grade;
                                                                        }else{
                                                                            echo '-';
                                                                        }
                                                                        if ($student_optional_subject!='') {
                                                                            if ($student_optional_subject->subject_id==$data->subject->id) {
                                                                                $optional_subject_mark=$final_results->total_marks;
                                                                            }
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <td><?php echo e(number_format($final_results->total_gpa_point,2,'.','')); ?></td>
                                                            <?php endif; ?>
                                                                <?php
                                                            }else{ ?>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                                <?php
                                                            }
                                                            }
                                                                ?>
                                                            <td><?php echo e($totalSumSub); ?></td>
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
                                                        <?php if(@generalSetting()->result_type != 'mark'): ?>
                                                            <th><?php echo app('translator')->get('reports.result'); ?></th>
                                                        <?php endif; ?>
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
                                                                $term_base_gpa=termWiseGpa($assinged_exam_type, $student_id, 5.00, $academic_id);
                                                                $with_percent_average_gpa +=$term_base_gpa;

                                                                $term_base_full_mark=termWiseTotalMark($assinged_exam_type, $student_id, null, $academic_id);
                                                                $average_gpa+=$term_base_full_mark;

                                                                if($optional_subject_setup!='' && $student_optional_subject!=''){

                                                                    $optional_subject_gpa = optionalSubjectFullMark($assinged_exam_type,$student_id,@$optional_subject_setup->gpa_above,"optional_sub_gpa", $academic_id);
                                                                    $optional_subject_total_gpa += $optional_subject_gpa;

                                                                    $optional_subject_above_gpa = optionalSubjectFullMark($assinged_exam_type,$student_id,@$optional_subject_setup->gpa_above,"with_optional_sub_gpa", $academic_id);
                                                                    $optional_subject_total_above_gpa += $optional_subject_above_gpa;

                                                                    $without_subject_gpa = optionalSubjectFullMark($assinged_exam_type,$student_id,@$optional_subject_setup->gpa_above,"without_optional_sub_gpa", $academic_id);
                                                                    $without_additional_subject_total_gpa += $without_subject_gpa;

                                                                    $with_additional_subject_gpa = termWiseAddOptionalMark($assinged_exam_type,$student_id,@$optional_subject_setup->gpa_above, $academic_id);
                                                                    $with_additional_subject_addition += $with_additional_subject_gpa;

                                                                    $with_optional_subject_extra_gpa = termWiseTotalMark($assinged_exam_type,$student_id,"optional_subject");
                                                                    $total_with_optional_subject_extra_gpa += $with_optional_subject_extra_gpa;

                                                                    $with_optional_percentages=termWiseGpa($assinged_exam_type, $student_id,$with_optional_subject_extra_gpa);
                                                                    $total_with_optional_percentage += $with_optional_percentages;
                                                                }
                                                            ?>
                                                            <?php if(@generalSetting()->result_type != 'mark'): ?>
                                                                <td colspan="4">
                                                                    <strong>
                                                                        <?php echo app('translator')->get('reports.average_gpa'); ?> :
                                                                        <?php echo e(number_format($term_base_gpa,2,'.','')); ?>

                                                                        </br>
                                                                        <?php echo e($exam_type->title); ?> (<?php echo e($exam_type->percentage); ?>%) : <?php echo e(number_format($term_base_gpa,2,'.','')); ?>

                                                                        </br>
                                                                        <?php echo app('translator')->get('exam.position'); ?> : <?php echo e(getStudentMeritPosition($class_id, $section_id, $assinged_exam_type, $student_id) ?? "null"); ?>

                                                                        <?php if($optional_subject_setup!='' && $student_optional_subject!=''): ?>
                                                                            <hr>
                                                                            <?php echo app('translator')->get('reports.with_optional'); ?> :
                                                                            <?php echo e(number_format($with_optional_subject_extra_gpa,2,'.','')); ?>

                                                                            </br>
                                                                            <?php echo app('translator')->get('reports.with_optional'); ?> (<?php echo e($exam_type->percentage); ?>%) :
                                                                            <?php echo e(number_format($with_optional_percentages,2,'.','')); ?>

                                                                        <?php endif; ?>
                                                                    </strong>
                                                                </td>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if(@generalSetting()->result_type != 'mark'): ?>
                                                            <th>
                                                                <?php echo e(number_format($average_gpa,2,'.','')); ?>

                                                                </br>
                                                                <?php echo e(number_format($with_percent_average_gpa, 2, '.', '')); ?>

                                                                <?php if($optional_subject_setup!='' && $student_optional_subject!=''): ?>
                                                                    <hr>
                                                                    <?php echo e(number_format($total_with_optional_subject_extra_gpa, 2, '.', '')); ?>

                                                                    </br>
                                                                    <?php echo e(number_format($total_with_optional_percentage, 2, '.', '')); ?>

                                                                <?php endif; ?>
                                                            </th>
                                                        <?php endif; ?>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                                </div>
                                                <table style="max-width: 400px; margin-bottom: 20px;" class="table border_table gray_header_table mb_30 max-width-400 ml-auto mr-auto report_table  <?php if(resultPrintStatus('vertical_boarder')): ?> mt-5 <?php endif; ?>">
                                                    <tbody>
                                                    
                                                    <tr>
                                                        <td colspan="<?php echo e($colspan / $col_for_result - 1); ?>" ><?php echo app('translator')->get('exam.total_marks'); ?></td>
                                                        <?php if($optional_subject_setup!='' && $student_optional_subject!=''): ?>
                                                            <td colspan="<?php echo e($colspan / $col_for_result + 7); ?>" style="padding:10px; font-weight:bold"><?php echo e($total_marks); ?> <?php echo app('translator')->get('reports.out_of'); ?> <?php echo e($all_exam_type_full_mark); ?></td>
                                                        <?php else: ?>
                                                            <td colspan="<?php echo e($colspan / $col_for_result + 9); ?>" style="padding:10px; font-weight:bold"><?php echo e($total_marks); ?> <?php echo app('translator')->get('reports.out_of'); ?> <?php echo e($all_exam_type_full_mark); ?></td>
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
                                                            <td colspan="<?php echo e($colspan / $col_for_result - 1); ?>"><?php echo app('translator')->get('reports.total_gpa'); ?></td>

                                                            <?php if($optional_subject_setup!='' && $student_optional_subject!=''): ?>
                                                                <td colspan="4"
                                                                    style="padding:10px; font-weight:bold">
                                                                    <?php echo e(gradeName(number_format($total_with_optional_percentage,2,'.',''), $academic_id)); ?>

                                                                </td>
                                                                <td colspan="3" style="padding:10px;"><?php echo app('translator')->get('reports.without_additional_gpa'); ?></td>
                                                                <td colspan="2" style="padding:10px;">
                                                                    <?php echo e(gradeName(number_format($with_percent_average_gpa,2,'.',''), $academic_id)); ?>

                                                                </td>
                                                            <?php else: ?>
                                                                <td colspan="<?php echo e($colspan / $col_for_result + 9); ?>"
                                                                    style="padding:10px; font-weight:bold">
                                                                    <?php echo e(number_format(termWiseFullMark($assinged_exam_types, $studentDetails->id, $academic_id),2,'.','')); ?>

                                                                </td>
                                                            <?php endif; ?>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td colspan="<?php echo e($colspan / $col_for_result - 1); ?>" ><?php echo app('translator')->get('exam.total_grade'); ?></td>
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
                                                                    <?php echo e(gradeName(number_format(termWiseFullMark($assinged_exam_types, $studentDetails->id, $academic_id),2,'.',''), $academic_id)); ?>

                                                                </td>
                                                            <?php endif; ?>
                                                        </tr>
                                                        
                                                        
                                                        <tr>
                                                            <?php if($optional_subject_setup!='' && $student_optional_subject!=''): ?>
                                                                <td colspan="<?php echo e($colspan / $col_for_result - 1); ?>" ><?php echo app('translator')->get('reports.remarks'); ?></td>
                                                                <td colspan="<?php echo e($colspan / $col_for_result + 7); ?>"  style="padding:10px; font-weight:bold">
                                                                    <?php echo e(remarks(number_format($total_with_optional_percentage,2,'.',''), $academic_id)); ?>

                                                                </td>
                                                            <?php else: ?>
                                                                <td colspan="<?php echo e($colspan / $col_for_result - 1); ?>" ><?php echo app('translator')->get('reports.remarks'); ?></td>
                                                                <td colspan="<?php echo e($colspan / $col_for_result + 9); ?>"  style="padding:10px; font-weight:bold">
                                                                    <?php echo e(remarks(number_format(termWiseFullMark($assinged_exam_types, $studentDetails->id,$academic_id),2,'.',''), $academic_id)); ?>

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
</section><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\reports\_progress_card_report_content.blade.php ENDPATH**/ ?>
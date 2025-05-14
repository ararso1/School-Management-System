<?php $__env->startPush('css'); ?>
    <style>
        table.dataTable thead th {
            padding-left: 30px !important;
        }
        table.dataTable thead .sorting_asc::after,
        table.dataTable thead .sorting::after,
        table.dataTable thead .sorting_desc::after{
            top: 10px !important;
            left: 15px !important;
        }
        .table tbody td {
            padding: 20px 18px 20px 18px !important;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('exam.exam_result'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('exam.examinations'); ?></a>
                <a href="<?php echo e(route('parent_examination', [$student_detail->id])); ?>"><?php echo app('translator')->get('exam.exam_result'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="student-details">
    <div class="container-fluid p-0">
        <div class="row mt-40">
            <div class="col-lg-6 col-md-6">
                <div class="main-title">
                    <h3 class="mb-30"><?php echo app('translator')->get('student.student_information'); ?></h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <!-- Start Student Meta Information -->
                <div class="student-meta-box">
                    <div class="student-meta-top"></div>
                    <img class="student-meta-img img-100" src="<?php echo e(file_exists(@$student_detail->student_photo) ? asset($student_detail->student_photo) : asset('public/uploads/staff/demo/student.jpg')); ?>" alt="">
                    <div class="white-box radius-t-y-0">
                        <div class="single-meta mt-50">
                            <div class="d-flex justify-content-between">
                                <div class="name">
                                    <?php echo app('translator')->get('student.student_name'); ?>
                                </div>
                                <div class="value">
                                    <?php echo e($student_detail->first_name.' '.$student_detail->last_name); ?>

                                </div>
                            </div>
                        </div>
                        <div class="single-meta">
                            <div class="d-flex justify-content-between">
                                <div class="name">
                                    <?php echo app('translator')->get('student.admission_no'); ?>
                                </div>
                                <div class="value">
                                    <?php echo e($student_detail->admission_no); ?>

                                </div>
                            </div>
                        </div>
                        <div class="single-meta">
                            <div class="d-flex justify-content-between">
                                <div class="name">
                                    <?php echo app('translator')->get('student.roll_number'); ?>
                                </div>
                                <div class="value">
                                     <?php echo e($student_detail->roll_no); ?>

                                </div>
                            </div>
                        </div>
                        <div class="single-meta">
                            <div class="d-flex justify-content-between">
                                <div class="name">
                                    <?php echo app('translator')->get('common.class'); ?>
                                </div>
                                <div class="value">
                                    <?php if($student_detail->class !="" && $student_detail->session !=""): ?>
                                   <?php echo e($student_detail->class->class_name); ?> (<?php echo e($student_detail->session->session); ?>)
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="single-meta">
                            <div class="d-flex justify-content-between">
                                <div class="name">
                                    <?php echo app('translator')->get('common.section'); ?>
                                </div>
                                <div class="value">
                                    <?php echo e($student_detail->section !=""?$student_detail->section->section_name:""); ?>

                                </div>
                            </div>
                        </div>
                        <div class="single-meta">
                            <div class="d-flex justify-content-between">
                                <div class="name">
                                    <?php echo app('translator')->get('common.gender'); ?>
                                </div>
                                <div class="value">
                                    <?php echo e($student_detail->gender !=""?$student_detail->gender->base_setup_name:""); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Student Meta Information -->
            </div>
                <div class="col-lg-9">
                    <div class="no-search no-paginate no-table-info mb-2">
                        <?php if(moduleStatusCheck('University')): ?>
                            <?php if ($__env->exists('university::exam.student_exam_tab')) echo $__env->make('university::exam.student_exam_tab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php else: ?>
                        <?php $__currentLoopData = $student_detail->studentRecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $today = date('Y-m-d H:i:s');
                            ?>
                            <?php $__currentLoopData = $exam_terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $get_results = App\SmStudent::getExamResult(@$exam->id, @$record);
                                ?>
                                <?php if($get_results): ?>
                                <div class="main-title">
                                    <h3 class="mb-0"><?php echo e(@$exam->title); ?></h3>
                                </div>
                                <?php
                                    $grand_total = 0;
                                    $grand_total_marks = 0;
                                    $result = 0;
                                    $temp_grade=[];
                                    $total_gpa_point = 0;
                                    $total_subject = count($get_results);
                                    $optional_subject = 0;
                                    $optional_gpa = 0;
                                ?>
                                    <?php if(isset($exam->examSettings->publish_date)): ?>
                                        <?php if($exam->examSettings->publish_date <=  $today): ?>
                                            <table id="table_id" class="table mb-5" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th><?php echo app('translator')->get('common.date'); ?></th>
                                                        <th><?php echo app('translator')->get('exam.subject_full_marks'); ?></th>
                                                        <th><?php echo app('translator')->get('exam.obtained_marks'); ?></th>
                                                        <?php if(@generalSetting()->result_type == 'mark'): ?>
                                                            <th><?php echo app('translator')->get('exam.pass_fail'); ?></th>
                                                        <?php else: ?>
                                                            <th><?php echo app('translator')->get('exam.grade'); ?></th>
                                                            <th><?php echo app('translator')->get('exam.gpa'); ?></th>
                                                        <?php endif; ?>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $__currentLoopData = $get_results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mark): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        if((!is_null($optional_subject_setup)) && (!is_null($student_optional_subject))){
                                                            if($mark->subject_id != @$student_optional_subject->subject_id){
                                                                $temp_grade[]=$mark->total_gpa_grade;
                                                            }
                                                        }else{
                                                            $temp_grade[]=$mark->total_gpa_grade;
                                                        }
                                                        $total_gpa_point += $mark->total_gpa_point;
                                                        if(! is_null(@$student_optional_subject)){
                                                            if(@$student_optional_subject->subject_id == $mark->subject->id && $mark->total_gpa_point  < @$optional_subject_setup->gpa_above ){
                                                                $total_gpa_point = $total_gpa_point - $mark->total_gpa_point;
                                                            }
                                                        }
                                                        $temp_gpa[]=$mark->total_gpa_point;
                                                        $get_subject_marks =  subjectFullMark($mark->exam_type_id, $mark->subject_id, $mark->studentRecord->class_id, $mark->studentRecord->section_id);
                                                        
                                                        $subject_marks = App\SmStudent::fullMarksBySubject($exam->id, $mark->subject_id);
                                                        $schedule_by_subject = App\SmStudent::scheduleBySubject($exam->id, $mark->subject_id, @$record);
                                                        $result_subject = 0;
                                                        if(@generalSetting()->result_type == 'mark'){
                                                            $grand_total_marks += subject100PercentMark();
                                                        }else{
                                                            $grand_total_marks += $get_subject_marks;
                                                        }
                                                        if(@$mark->is_absent == 0){
                                                            if(@generalSetting()->result_type == 'mark'){
                                                                $grand_total += @subjectPercentageMark(@$mark->total_marks, @subjectFullMark($mark->exam_type_id, $mark->subject_id, $mark->studentRecord->class_id, $mark->studentRecord->section_id));
                                                            }else{
                                                                $grand_total += @$mark->total_marks;
                                                            }
                                                            if($mark->marks < $subject_marks->pass_mark){
                                                            $result_subject++;
                                                            $result++;
                                                            }
                                                        }else{
                                                            $result_subject++;
                                                            $result++;
                                                        }
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo e(!empty($schedule_by_subject->date)? dateConvert($schedule_by_subject->date):''); ?>

                                                        </td>
                                                        <td>
                                                            <?php echo e(@$mark->subject->subject_name); ?>

                                                            <?php if(@generalSetting()->result_type == 'mark'): ?>
                                                                (<?php echo e(subject100PercentMark()); ?>)
                                                            <?php else: ?>
                                                                (<?php echo e(@subjectFullMark($mark->exam_type_id, $mark->subject_id, $mark->studentRecord->class_id, $mark->studentRecord->section_id)); ?>)
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <?php if(@generalSetting()->result_type == 'mark'): ?>
                                                                <?php echo e(@subjectPercentageMark(@$mark->total_marks, @subjectFullMark($mark->exam_type_id, $mark->subject_id, $mark->studentRecord->class_id, $mark->studentRecord->section_id))); ?>

                                                            <?php else: ?>
                                                                <?php echo e(@$mark->total_marks); ?>

                                                            <?php endif; ?>
                                                        </td>
                                                        <?php if(@generalSetting()->result_type == 'mark'): ?>
                                                            <td>
                                                                <?php
                                                                    $totalMark = subjectPercentageMark(@$mark->total_marks, @subjectFullMark($mark->exam_type_id, $mark->subject_id, $mark->studentRecord->class_id, $mark->studentRecord->section_id));
                                                                    $passMark = $mark->subject->pass_mark;
                                                                ?>
                                                                <?php if($passMark <= $totalMark): ?>
                                                                    <?php echo app('translator')->get('exam.pass'); ?>
                                                                <?php else: ?>
                                                                    <?php echo app('translator')->get('exam.fail'); ?>
                                                                <?php endif; ?>
                                                            </td>
                                                        <?php else: ?>
                                                            <td>
                                                                <?php echo e(@$mark->total_gpa_grade); ?>

                                                            </td>
                                                            <td>
                                                                <?php echo e(number_format(@$mark->total_gpa_point, 2, '.', '')); ?>

                                                            </td>
                                                        <?php endif; ?>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th></th>
                                                        <th></th>
                                                        <th>
                                                            <?php echo app('translator')->get('exam.grand_total'); ?>: <?php echo e($grand_total); ?>/<?php echo e($grand_total_marks); ?>

                                                        </th>
                                                        <?php if(@generalSetting()->result_type == 'mark'): ?>
                                                            <th></th>
                                                        <?php else: ?>
                                                            <th>
                                                                <?php echo app('translator')->get('exam.grade'); ?>: 
                                                            <?php
                                                                if(in_array($failgpaname->grade_name,$temp_grade)){
                                                                    echo $failgpaname->grade_name;
                                                                    }else {
                                                                        $final_gpa_point = ($total_gpa_point- $optional_gpa) /  ($total_subject - $optional_subject);
                                                                        $average_grade=0;
                                                                        $average_grade_max=0;
                                                                        if($result == 0 && $grand_total_marks != 0){
                                                                            $gpa_point=number_format($final_gpa_point, 2, '.', '');
                                                                            if($gpa_point >= $maxgpa){
                                                                                $average_grade_max = App\SmMarksGrade::where('school_id',Auth::user()->school_id)
                                                                                ->where('academic_id', getAcademicId() )
                                                                                ->where('from', '<=', $maxgpa )
                                                                                ->where('up', '>=', $maxgpa )
                                                                                ->first('grade_name');
                                
                                                                                echo  @$average_grade_max->grade_name;
                                                                            } else {
                                                                                $average_grade = App\SmMarksGrade::where('school_id',Auth::user()->school_id)
                                                                                ->where('academic_id', getAcademicId() )
                                                                                ->where('from', '<=', $final_gpa_point )
                                                                                ->where('up', '>=', $final_gpa_point )
                                                                                ->first('grade_name');
                                                                                echo  @$average_grade->grade_name;  
                                                                            }
                                                                    }else{
                                                                        echo $failgpaname->grade_name;
                                                                    }
                                                                }
                                                                ?>
                                                            </th>
                                                            <th> 
                                                                <?php echo app('translator')->get('exam.gpa'); ?>
                                                                <?php
                                                                    $final_gpa_point = 0;
                                                                    $final_gpa_point = ($total_gpa_point - $optional_gpa)/  ($total_subject - $optional_subject);
                                                                    $float_final_gpa_point=number_format($final_gpa_point,2);
                                                                    if($float_final_gpa_point >= $maxgpa){
                                                                        echo $maxgpa;
                                                                    }else {
                                                                        echo $float_final_gpa_point;
                                                                    }
                                                                ?>
                                                            </th>
                                                        <?php endif; ?>
                                                    </tr>
                                                    </tfoot>
                                            </table>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\parentPanel\student_result.blade.php ENDPATH**/ ?>
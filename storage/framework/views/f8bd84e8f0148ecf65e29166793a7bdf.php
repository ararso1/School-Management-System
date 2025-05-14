<?php if(!empty($promotes)): ?>
    <div class="row">
        <div class="offset-lg-10 col-lg-2 pull-right text-right mt-20 ">
            <a target="_blank" href="<?php echo e(route('session_student', $admission_number)); ?>"
                class="primary-btn small fix-gr-bg "><span class="ti-printer pr-2"></span> <?php echo app('translator')->get('common.print'); ?> </a>
        </div>
    </div>
    <div class="row mt-20">
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
                                            <h3 class="text-white">
                                                <?php echo e(isset(generalSetting()->school_name) ? generalSetting()->school_name : 'Infix School Management ERP'); ?>

                                            </h3>
                                            <p class="text-white mb-0">
                                                <?php echo e(isset(generalSetting()->address) ? generalSetting()->address : 'Infix School Address'); ?>

                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <img class="report-admit-img" 
                                    src="<?php echo e($studentDetails->student_photo ? asset($studentDetails->student_photo) : asset('public/backEnd/assets/img/avatar.png')); ?>" 
                                    width="50" height="50" alt="Student Photo">                               
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="white-box p-5">

                                    <div class="row  mt-40 ">
                                        <div class="col-lg-12 transcript-heading">
                                            <h2 class="text-center text-uppercase"> <?php echo app('translator')->get('reports.official_transcript'); ?> </h2>
                                        </div>
                                        <div class="row mt-20 transcript-heading">
                                            <div class="col-lg-4">
                                                <strong><?php echo app('translator')->get('student.student_name'); ?>
                                                    :</strong> <?php echo e($studentDetails->full_name); ?> <br>

                                                <strong><?php echo app('translator')->get('student.mother_name'); ?>
                                                    :</strong> <?php echo e(@$studentDetails->student->parents->mothers_name); ?>

                                                <br>
                                                <strong><?php echo app('translator')->get('common.school_name'); ?>
                                                    :</strong> <?php echo e(generalSetting()->school_name); ?><br>
                                            </div>
                                            <div class="col-lg-4">
                                                <strong><?php echo app('translator')->get('reports.transcript_no'); ?>
                                                    :</strong> <?php echo e($studentDetails->admission_number); ?><br>
                                                <strong><?php echo app('translator')->get('common.academic_year'); ?>
                                                    : </strong> <?php echo e(generalSetting()->academic_Year->year); ?>

                                                <br>
                                                <strong><?php echo app('translator')->get('student.admission_no'); ?>
                                                    :</strong> <?php echo e($studentDetails->admission_number); ?><br>
                                            </div>

                                            <div class="col-lg-4">
                                                <strong><?php echo app('translator')->get('common.class'); ?>
                                                    :</strong> <?php echo e(@$current_class->class_name); ?><br>
                                                <strong><?php echo app('translator')->get('common.section'); ?>
                                                    :</strong> <?php echo e(@$current_section->section_name); ?><br>
                                                <strong><?php echo app('translator')->get('common.date_of_birth'); ?>
                                                    :</strong>
                                                <?php echo e($studentDetails->date_of_birth != '' ? dateConvert($studentDetails->date_of_birth) : ''); ?>

                                            </div>
                                        </div>
                                    </div>

                                    <?php $__currentLoopData = $promotes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $studentDetails): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $student_id = $studentDetails->student_id;
                                            $class_id = $studentDetails->previous_class_id;
                                            $section_id = $studentDetails->previous_section_id;
                                            $year = $studentDetails->year;

                                            @$current_class = App\SmStudent::where('sm_students.id', $student_id)
                                                ->join('sm_classes', 'sm_classes.id', '=', 'sm_students.class_id')
                                                ->first();
                                            @$current_section = App\SmStudent::where('sm_students.id', $student_id)
                                                ->join('sm_sections', 'sm_sections.id', '=', 'sm_students.section_id')
                                                ->first();
                                            $current_session = App\SmStudent::where('sm_students.id', $student_id)
                                                ->join(
                                                    'sm_academic_years',
                                                    'sm_academic_years.id',
                                                    '=',
                                                    'sm_students.session_id',
                                                )
                                                ->first();

                                            $exams = App\SmExam::where('active_status', 1)
                                                ->where('class_id', $class_id)
                                                ->where('section_id', $section_id)
                                                ->get();
                                            $exam_types = App\SmExamType::where('active_status', 1)
                                                ->where('academic_id', getAcademicId())
                                                ->get();
                                            $classes = App\SmClass::where('active_status', 1)
                                                ->where('academic_id', getAcademicId())
                                                ->get();
                                            $exam_setup = App\SmExamSetup::where([
                                                ['class_id', $class_id],
                                                ['section_id', $section_id],
                                            ])->get();

                                            $subjects = App\SmAssignSubject::where([
                                                ['class_id', $class_id],
                                                ['section_id', $section_id],
                                            ])->get();

                                            $assinged_exam_types = [];
                                            foreach ($exams as $exam) {
                                                $assinged_exam_types[] = $exam->exam_type_id;
                                            }

                                            $assinged_exam_types = array_unique($assinged_exam_types);

                                            foreach ($assinged_exam_types as $assinged_exam_type) {
                                                foreach ($subjects as $subject) {
                                                    $is_mark_available = App\SmResultStore::where([
                                                        ['class_id', $class_id],
                                                        ['section_id', $section_id],
                                                        ['student_id', $student_id],
                                                        ['subject_id', $subject->subject_id],
                                                        ['exam_type_id', $assinged_exam_type],
                                                    ])->first();

                                                    // return $is_mark_available;
                                                    if ($is_mark_available == '') {
                                                        return redirect('session-student')->with(
                                                            'message-danger',
                                                            'Ops! Your result is not found! Please check mark register.',
                                                        );
                                                    }
                                                }
                                            }

                                            $is_result_available = App\SmResultStore::where([
                                                ['class_id', $class_id],
                                                ['section_id', $section_id],
                                                ['student_id', $student_id],
                                            ])->get();

                                        ?>

                                        <?php if($is_result_available->count() > 0): ?>
                                            <div class="row  mt-40 ">
                                                <div class="col-lg-3">
                                                    <strong><?php echo app('translator')->get('reports.exam_terms'); ?>:</strong>
                                                    <?php
                                                        $exam = App\SmExamType::where(
                                                            'id',
                                                            $is_mark_available->exam_type_id,
                                                        )->first();
                                                    ?>
                                                    <?php echo e($exam->title); ?>

                                                </div>
                                                <div class="col-lg-3">
                                                    <strong><?php echo app('translator')->get('student.roll'); ?>:</strong>
                                                    <?php echo e($studentDetails->previous_roll_number); ?>

                                                </div>
                                                <div class="col-lg-3">
                                                    <strong><?php echo app('translator')->get('common.class'); ?>:</strong>
                                                    <?php
                                                        $class = App\SmClass::where(
                                                            'id',
                                                            $is_mark_available->class_id,
                                                        )->first();
                                                    ?>
                                                    <?php echo e($class->class_name); ?>

                                                </div>
                                                <div class="col-lg-3">
                                                    <strong><?php echo app('translator')->get('common.date'); ?>:</strong>
                                                    <?php echo e($is_mark_available->created_at != '' ? dateConvert($is_mark_available->created_at) : ''); ?>


                                                </div>

                                                <table class="w-100  mt-10 mb-20 table table-bordered">
                                                    <thead>
                                                        <tr style="text-align: center;">
                                                            <th rowspan="2"><?php echo app('translator')->get('common.subjects'); ?></th>
                                                            <?php $__currentLoopData = $assinged_exam_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assinged_exam_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php
                                                                    $exam_type = App\SmExamType::examType(
                                                                        $assinged_exam_type,
                                                                    );
                                                                ?>
                                                                <th colspan="2" style="text-align: center;">
                                                                    <?php echo e($exam_type->title); ?></th>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <th rowspan="2"><?php echo app('translator')->get('exam.result'); ?></th>
                                                            <th rowspan="2"><?php echo app('translator')->get('exam.grade'); ?></th>
                                                            <th rowspan="2"><?php echo app('translator')->get('exam.gpa'); ?></th>
                                                        </tr>
                                                        <tr style="text-align: center;">
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
                                                            $sumation = 0;
                                                        ?>
                                                        <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr style="text-align: center">
                                                                <td><?php echo e($data->subject != '' ? $data->subject->subject_name : ''); ?></td>
                                                                
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
                                                                        if ($final_results != '') {
                                                                            echo $final_results->total_marks;
                                                                            $totalSumSub =
                                                                                $totalSumSub +
                                                                                $final_results->total_marks;
                                                                            $total_marks =
                                                                                $total_marks +
                                                                                $final_results->total_marks;
                                                                        } else {
                                                                            echo 0;
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                        if ($final_results != '') {
                                                                            if (
                                                                                $final_results->total_gpa_grade == 'F'
                                                                            ) {
                                                                                $totalSubjectFail++;
                                                                                $total_fail++;
                                                                            }
                                                                            echo $final_results->total_gpa_grade;
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <?php
                                                                    } else { 
                                                                ?>
                                                                    <td>0.00</td>
                                                                    <td>0.00</td>
                                                                <?php
                                                                        }
                                                                    }
                                                                ?>
                                                                <td><?php echo e($totalSumSub); ?></td>

                                                                <td>
                                                                    <?php
                                                                        if ($totalSubjectFail > 0) {
                                                                            echo 'F';
                                                                        } else {
                                                                            $totalSumSub =
                                                                                $totalSumSub /
                                                                                count($assinged_exam_types);
                                                                            $mark_grade = App\SmMarksGrade::where([
                                                                                ['percent_from', '<=', $totalSumSub],
                                                                                ['percent_upto', '>=', $totalSumSub],
                                                                            ])
                                                                                ->where('academic_id', getAcademicId())
                                                                                ->first();
                                                                            echo @$mark_grade->grade_name;
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                        if ($totalSubjectFail > 0) {
                                                                            echo 'F';
                                                                        } else {
                                                                            $mark_grade = App\SmMarksGrade::where([
                                                                                ['percent_from', '<=', $totalSumSub],
                                                                                ['percent_upto', '>=', $totalSumSub],
                                                                            ])
                                                                                ->where('academic_id', getAcademicId())
                                                                                ->first();
                                                                            echo @$mark_grade->gpa;
                                                                            $sumation = $sumation + $mark_grade->gpa;
                                                                        }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php
                                                            $colspan = 4 + count($assinged_exam_types) * 2;
                                                        ?>
                                                        <tr>
                                                            <td colspan="<?php echo e($colspan / 2 - 1); ?>" class="text-center">
                                                                <?php echo app('translator')->get('exam.total_marks'); ?></td>
                                                            <td colspan="<?php echo e($colspan / 2 + 1); ?>" class="text-center">
                                                                <?php echo e($total_marks); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="<?php echo e($colspan / 2 - 1); ?>" class="text-center">
                                                                <?php echo app('translator')->get('exam.total_grade'); ?></td>
                                                            <td colspan="<?php echo e($colspan / 2 + 1); ?>" class="text-center">
                                                                <?php
                                                                    $grade_point_final = '0.00';
                                                                    if ($total_fail != 0) {
                                                                        echo 'F';
                                                                    } else {
                                                                        if ($total_fail != 0) {
                                                                            $grade_point_final = '0.00';
                                                                        } else {
                                                                            if ($sumation != 0) {
                                                                                if ($subjects->count() != 0) {
                                                                                    $grade_point_final =
                                                                                        $sumation / $subjects->count();
                                                                                }
                                                                            } else {
                                                                                $grade_point_final = '0.00';
                                                                            }
                                                                            $sumation = 0;
                                                                        }
                                                                        if ($grade_point_final != '0.00') {
                                                                            $average_grade = App\SmMarksGrade::where([
                                                                                ['from', '<=', $grade_point_final],
                                                                                ['up', '>=', $grade_point_final],
                                                                            ])
                                                                                ->where('academic_id', getAcademicId())
                                                                                ->first();
                                                                            echo @$average_grade->grade_name;
                                                                        } else {
                                                                            echo 'F';
                                                                        }
                                                                    }
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="<?php echo e($colspan / 2 - 1); ?>" class="text-center">
                                                                <?php echo app('translator')->get('reports.total_gpa'); ?></td>
                                                            <td colspan="<?php echo e($colspan / 2 + 1); ?>" class="text-center">
                                                                <?php echo e(number_format($grade_point_final, 2, ',', '')); ?>

                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\reports\previous_result_file.blade.php ENDPATH**/ ?>
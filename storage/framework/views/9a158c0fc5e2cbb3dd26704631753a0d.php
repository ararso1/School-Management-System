<?php if (! $__env->hasRenderedOnce('04bdc63e-6f1c-4ac5-ab78-6c86d140fefe')): $__env->markAsRenderedOnce('04bdc63e-6f1c-4ac5-ab78-6c86d140fefe');
$__env->startPush(config('pagebuilder.site_style_var')); ?>
    <style>
        @media print {

            header,
            footer,
            .bradcrumb_area,
            .mark_sheet_print_btn,
            .backtop {
                display: none !important;
            }

            @page {
                margin: 0 !important;
                size: A4 portrait;
            }

            .section_padding {
                padding: 30px 0;
            }

            table:not(.gpa-table) tr td,
            table:not(.gpa-table) tr th {
                padding: 0px 4px !important;
            }

            .result_info_qr_code {
                height: 100px !important;
                width: 100px !important;
            }
        }
    </style>
<?php $__env->stopPush(); endif; ?>


<?php $__env->startSection(config('pagebuilder.site_section')); ?>
<?php echo e(headerContent()); ?>

    <section class="bradcrumb_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="bradcrumb_area_inner">
                        <h1><?php echo e(__('edulia.individual_result')); ?> <span><a
                                    href="<?php echo e(url('/')); ?>"><?php echo e(__('edulia.home')); ?></a> /
                                <?php echo e(__('edulia.individual_result')); ?></span></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container section_padding px-3 px-sm-0">

        <div class="mark_sheet_print_btn mb-4 d-flex justify-content-end">
            <a href="#" id="printMarksheet"><i class="fas fa-print"></i> <?php echo app('translator')->get('edulia.print'); ?></a>
        </div>

        <div class="marksheet_container" id="print_sheet">
            <div class="institute_info text-center mb-2">
                <h3 class="institute_name text-uppercase mb-0">
                    <?php echo e(isset(generalSetting()->school_name) ? generalSetting()->school_name : 'Infix School Management ERP'); ?>

                </h3>
                <p class="institute_address">
                    <?php echo e(isset(generalSetting()->address) ? generalSetting()->address : 'Infix School Address'); ?></p>
                <p class="institute_address" style="font-size: 16px;">
                    <?php echo app('translator')->get('common.email'); ?>: <span
                        class="text-lowercase"><?php echo e(isset(generalSetting()->email) ? generalSetting()->email : 'hello@aorasoft.com'); ?></span>,
                    <?php echo app('translator')->get('common.phone'); ?>:
                    <?php echo e(isset(generalSetting()->phone) ? generalSetting()->phone : '+96897002784'); ?>

                </p>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-4 order-3 order-md-1 text-center text-md-start">
                    <img src="<?php echo e(file_exists(@$studentDetails->studentDetail->student_photo) ? asset($studentDetails->studentDetail->student_photo) : asset('public/uploads/staff/demo/staff.jpg')); ?>"
                        class="student_photo" alt="">
                </div>
                <div
                    class="col-sm-12 col-md-4 d-flex align-items-center justify-content-center flex-column marksheet_header order-1 order-md-2">
                    <img src="<?php echo e(asset(generalSetting()->logo)); ?>" alt="<?php echo e(generalSetting()->school_name); ?>"
                        class="institute_logo">
                    <h4 class="marksheet_title text-uppercase">
                        <?php echo app('translator')->get('edulia.progress_report'); ?>
                    </h4>
                </div>
                <div class="col-sm-12 col-md-4 d-flex justify-content-end order-2">
                    <?php
                        $gs = App\SmGeneralSettings::where('school_id', Auth::user()->school_id)->first('result_type');
                        $generalsettingsResultType = $gs->result_type;
                    ?>
                    <?php if(@$grades): ?>
                        <table class="table-bordered gpa-table mx-auto mx-md-0 my-4 my-md-0 order-md-3"
                            id="grade_table">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('edulia.starting'); ?>
                                    </th>
                                    <th><?php echo app('translator')->get('edulia.ending'); ?>
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

            <div class="row my-3 student_info_section">
                <div class="col-md-7 col-lg-8">
                    <ul>
                        <li><span class="student_info_type"><?php echo app('translator')->get('edulia.students_name'); ?></span><span class="info_separetor">:</span><b
                                class="text-uppercase"><?php echo e($student_detail->studentDetail->full_name); ?></b></li>
                        <li><span class="student_info_type"><?php echo app('translator')->get('edulia.fathers_name'); ?></span><span class="info_separetor">:</span><b
                                class="text-uppercase"><?php echo e($student->parents->fathers_name); ?></b></li>
                        <li><span class="student_info_type"><?php echo app('translator')->get('edulia.mothers_name'); ?></span><span class="info_separetor">:</span><b
                                class="text-uppercase"><?php echo e($student->parents->mothers_name); ?></b>
                        </li>
                        <li><span class="student_info_type"><?php echo app('translator')->get('edulia.students_id'); ?></span><span
                                class="info_separetor">:</span><b><?php echo e(@$student_detail->student->admission_no); ?></b></li>
                        <li><span class="student_info_type"><?php echo app('translator')->get('edulia.date_of_birth'); ?></span><span
                                class="info_separetor">:</span><b><?php echo e($student_detail->studentDetail->date_of_birth != '' ? dateConvert($student_detail->studentDetail->date_of_birth) : ''); ?></b>
                        </li>
                        <li><span class="student_info_type"><?php echo app('translator')->get('edulia.roll'); ?></span><span
                                class="info_separetor">:</span><b><?php echo e($student_detail->studentDetail->roll_no); ?></b>
                        </li>

                    </ul>
                </div>
                <div class="col-md-5 col-lg-4">
                    <ul>
                        <li><span class="student_info_type"><?php echo app('translator')->get('edulia.class'); ?></span><span
                                class="info_separetor">:</span><b><?php echo e($student_detail->class->class_name); ?></b>
                        </li>
                        <li><span class="student_info_type"><?php echo app('translator')->get('edulia.section'); ?></span><span
                                class="info_separetor">:</span><b><?php echo e($student_detail->section->section_name); ?></b>
                        </li>
                        <li><span class="student_info_type"><?php echo app('translator')->get('edulia.group'); ?></span><span class="info_separetor">:</span><b
                                class="text-uppercase"><?php echo e($student->student_group_id ? $student->group->group : 'N/A'); ?></b>
                        </li>
                        <li><span class="student_info_type"><?php echo app('translator')->get('edulia.examination'); ?></span><span
                                class="info_separetor">:</span><b><?php echo e($exam_details->title); ?></b></li>
                        <li><span class="student_info_type"><?php echo app('translator')->get('edulia.year'); ?></span><span
                                class="info_separetor">:</span><b><?php echo e(@$student_detail->academic->year); ?></b>
                        </li>
                        <li><span class="student_info_type"><?php echo app('translator')->get('edulia.publish_date'); ?></span><span
                                class="info_separetor">:</span><b><?php echo e(dateConvert($exam_content->publish_date)); ?></b></li>
                    </ul>
                </div>
            </div>

            <div class="table-responsive">
                <table class="w-100 table-bordered marksheet_table">
                    <thead>
                        <tr>
                            <th style="width:200px"><?php echo app('translator')->get('edulia.subject'); ?></th>
                            <th><?php echo app('translator')->get('edulia.full_marks'); ?></th>
                            <th><?php echo app('translator')->get('edulia.highest_marks'); ?></th>
                            <th><?php echo app('translator')->get('edulia.obtained_marks'); ?></th>
                            <?php if(@$generalsettingsResultType != 'mark'): ?>
                                <th><?php echo app('translator')->get('edulia.grade_point'); ?></th>
                                <th><?php echo app('translator')->get('edulia.letter_grade'); ?></th>
                            <?php endif; ?>
                            <th><?php echo app('translator')->get('edulia.remarks'); ?></th>
                            <?php if(@$generalsettingsResultType == 'mark'): ?>
                                <th><?php echo app('translator')->get('homework.evaluation'); ?></th>
                                <th><?php echo app('translator')->get('exam.pass_fail'); ?></th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $total_total_obtained_mark = 0;
                            $total_total_full_mark = 0;

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
                            $total_full_mark = 0;
                            $total_obtained_mark = 0;
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
                                <td>
                                    <?php echo e($data->subject->subject_name); ?>

                                </td>
                                <td>
                                    <?php if(@$generalsettingsResultType == 'mark'): ?>
                                        <?php echo e(subject100PercentMark()); ?>

                                    <?php else: ?>

                                        <?php echo e($total_full_mark = @subjectFullMark($exam_details->id, $data->subject->id, $class_id, $section_id)); ?>

                                         <?php $total_total_full_mark += $total_full_mark ?>
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
                                        <?php echo e(@singleSubjectMark($data->student_record_id, $data->subject_id, $data->exam_type_id)[0]); ?>

                                    <?php else: ?>
                                        <?php echo e($total_obtained_mark = @$data->total_marks); ?>

                                        <?php $total_total_obtained_mark += @$total_obtained_mark ?>
                                    <?php endif; ?>
                                    <?php
                                        if (@$generalsettingsResultType == 'mark') {
                                            $total_mark += subjectPercentageMark(@$data->total_marks, @subjectFullMark($exam_details->id, $data->subject->id, $class_id, $section_id));
                                        } else {
                                            $total_mark += @$data->total_marks;
                                        }
                                    ?>
                                </td>
                                <?php if(@$generalsettingsResultType != 'mark'): ?>
                                    <?php
                                        $result = markGpa(@subjectPercentageMark(@$data->total_marks, @subjectFullMark($exam_details->id, $data->subject->id, $class_id, $section_id)));
                                        $main_subject_total_gpa += $result->gpa;
                                    ?>
                                    <td>
                                        <?php echo e(@$result->gpa); ?>

                                    </td>
                                    <td>
                                        <?php echo e(@$data->total_gpa_grade); ?>

                                    </td>
                                <?php endif; ?>
                                <td>
                                    <?php echo e(@$data->teacher_remarks); ?>

                                </td>
                                <?php if(@$generalsettingsResultType == 'mark'): ?>
                                    <td>
                                        <?php
                                            $evaluation = markGpa(subjectPercentageMark(@$data->total_marks, @subjectFullMark($exam_details->id, $data->subject->id, $class_id, $section_id)));
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
                                    $count++;
                                ?>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <tfoot>
                        <?php
                            $final_result = ($main_subject_total_gpa + $optional_countable_gpa) / $Optional_subject_count;
                            if ($final_result >= $maxGrade) {
                                $gpa = number_format($maxGrade, 2, '.', '');
                            } else {
                                $gpa = number_format($final_result, 2, '.', '');
                            }
                            if (in_array($failgpaname->grade_name, $temp_grade)) {
                                $failgpa = $failgpaname->grade_name;
                            } else {
                                if ($final_result >= $maxGrade) {
                                    $grade_details = App\SmResultStore::remarks($maxGrade);
                                } else {
                                    $grade_details = App\SmResultStore::remarks($final_result);
                                }
                            }
                        ?>
                        <tr class="total">
                            <td><?php echo app('translator')->get('edulia.total'); ?></td>
                            <td><?php echo e($total_total_full_mark); ?></td>
                            <td></td>
                            <td><?php echo e($total_total_obtained_mark); ?></td>
                            <td></td>
                            <td><?php echo e(@$grade_details->grade_name); ?></td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="row mt-3">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="table-responsive">
                        <table class="table-bordered w-100 final_result">
                            <tbody>
                                <tr>
                                    <td width="15%"><?php echo app('translator')->get('edulia.gpa'); ?></td>
                                    <td width="5%"><?php echo e($gpa); ?></td>
                                    <td width="15%"><?php echo app('translator')->get('edulia.grade'); ?></td>
                                    <td width="5%"><?php echo e(@$grade_details->grade_name); ?></td>
                                    <td width="15%"><?php echo app('translator')->get('edulia.status'); ?></td>
                                    <td width="15%"><?php echo e(@$grade_details->description); ?></td>
                                    <td width="15%"><?php echo app('translator')->get('edulia.attendance'); ?></td>
                                    <?php if(isset($exam_content)): ?>
                                        <td width="15%">
                                            <?php echo e(@$student_attendance); ?>

                                            <?php echo app('translator')->get('edulia.of'); ?>
                                            <?php echo e(@$total_class_days); ?>

                                        </td>
                                    <?php else: ?>
                                        <td width="15%">
                                            <?php echo app('translator')->get('edulia.no_data_found'); ?>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="remarks mt-3">
                        <?php if(@$grade_details->grade_name == 'F'): ?>
                            <?php echo app('translator')->get('edulia.you_have_failed'); ?>
                        <?php else: ?>
                            <?php echo app('translator')->get('edulia.you_have_passed'); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if(isset($exam_content)): ?>
                <div class="row signature_container">
                    <div class="col-lg-12 col-md-12">
                        <div class="row align-items-end">
                            <div class="col-sm-4">
                                <div class="signature_area"><?php echo app('translator')->get('edulia.guardian'); ?></div>
                            </div>

                            <div class="col-sm-4">
                                <div class="signature_area"><?php echo app('translator')->get('edulia.class_teacher'); ?></div>
                            </div>

                            <div class="col-sm-4 text-center">
                                <div class="soft_signature_area w-75">
                                    <img class="mb-2" src="<?php echo e(asset($exam_content->file)); ?>" width="100px"
                                        alt="">
                                </div>
                                <div class="signature_area"><?php echo e(@$exam_content->title); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <footer>
        <?php echo e(footerContent()); ?>

    </footer>
<?php $__env->stopSection(); ?>
<?php if (! $__env->hasRenderedOnce('e33e1593-f29d-49b5-8c4f-b1d7a82af3f0')): $__env->markAsRenderedOnce('e33e1593-f29d-49b5-8c4f-b1d7a82af3f0');
$__env->startPush(config('pagebuilder.site_script_var')); ?>
    <script>
        $("#printMarksheet").on("click", function(e) {
            e.preventDefault();
            window.print();
        })
    </script>
<?php $__env->stopPush(); endif; ?>


<?php echo $__env->make(config('pagebuilder.site_layout'), ['edit' => false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\frontEnd\theme\edulia\indivisualResult\indivisual_result.blade.php ENDPATH**/ ?>
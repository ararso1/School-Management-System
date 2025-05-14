<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('exam.marking'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('exam.examinations'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('exam.examinations'); ?></a>
                    <a href="<?php echo e(route('online-exam')); ?>"><?php echo app('translator')->get('exam.online_exam'); ?></a>
                    <a href="<?php echo e(route('online_exam_marks_register', [@$online_exam_question->id])); ?>"><?php echo app('translator')->get('exam.marking'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <?php if(isset($studentRecords)): ?>
        <section class="mt-20">
            <div class="container-fluid p-0">
                <div class="row mt-40">
                    <div class="col-lg-6 col-md-6">
                        <div class="main-title">
                            <h3 class="mb-30"><?php echo app('translator')->get('exam.marking'); ?></h3>
                        </div>
                    </div>
                </div>
                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'online_exam_marks_store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'marks_register_store'])); ?>

                <input type="hidden" name="exam_id" value="<?php echo e(@$online_exam_question->id); ?>">
                <input type="hidden" name="subject_id" value="<?php echo e(@$online_exam_question->subject_id); ?>">
                <div class="white-box">
                <div class="row">
                    <div class="col-lg-12">

                        <table class="table school-table-style" cellspacing="0" width="100%">
                            <thead>
                                <tr>


                                    <th><?php echo app('translator')->get('student.admission_no'); ?></th>
                                    <th><?php echo app('translator')->get('common.student'); ?></th>
                                    <?php if(moduleStatusCheck('University')): ?>
                                        <th> <?php echo app('translator')->get('university::un.semester_label'); ?> (<?php echo app('translator')->get('common.section'); ?>)</th>
                                    <?php else: ?>
                                        <th><?php echo app('translator')->get('common.class_Sec'); ?></th>
                                    <?php endif; ?>
                                    <th><?php echo app('translator')->get('exam.exam'); ?></th>
                                    <th><?php echo app('translator')->get('common.subject'); ?></th>
                                    <th><?php echo app('translator')->get('exam.marking'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $studentRecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e(@$student->studentDetail->admission_no); ?></td>
                                        <td><?php echo e(@$student->studentDetail->full_name); ?></td>
                                        <?php if(moduleStatusCheck('University')): ?>
                                            <td><?php echo e(@$student->unSemesterLabel != '' ? @$student->unSemesterLabel->name : ''); ?>

                                                (<?php echo e(@$student->section != '' ? @$student->section->section_name : ''); ?>)</td>
                                        <?php else: ?>
                                            <td><?php echo e(@$student->class != '' ? @$student->class->class_name : ''); ?>

                                                (<?php echo e(@$student->section != '' ? @$student->section->section_name : ''); ?>)</td>
                                        <?php endif; ?>

                                        <td><?php echo e(@$online_exam_question->title); ?></td>
                                        <td><?php echo e(@$online_exam_question->subject != '' ? $online_exam_question->subject->subject_name : ''); ?>

                                        </td>

                                        <td>
                                            <?php if(in_array(@$student->student_id, @$present_students)): ?>
                                                <a class="primary-btn small bg-success text-white border-0"
                                                    href="<?php echo e(route('online_exam_marking', [@$online_exam_question->id, @$student->student_id])); ?>">
                                                    <?php echo app('translator')->get('exam.view_answer_marking'); ?>
                                                </a>
                                            <?php else: ?>
                                                <a class="primary-btn small bg-warning text-white border-0" href="#">
                                                    <?php echo app('translator')->get('student.absent'); ?>
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <td colspan="6" class="text-center py-3">No data found</td>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\examination\online_exam_marks_register.blade.php ENDPATH**/ ?>
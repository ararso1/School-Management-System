<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('exam.mark_sheet_report_section'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('exam.mark_sheet_report_section'); ?> </h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('reports.reports'); ?></a>
                <a href="#"><?php echo app('translator')->get('exam.mark_sheet_report_section'); ?> </a>
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
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'mark_sheet_reports', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

                        <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            <div class="col-lg-4 mt-30-md">
                                <select class="primary_select form-control<?php echo e($errors->has('exam') ? ' is-invalid' : ''); ?>" name="exam">
                                    <option data-display="<?php echo app('translator')->get('exam.select_exam'); ?> *" value=""><?php echo app('translator')->get('exam.select_exam'); ?> *</option>
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
                                    <option data-display="<?php echo app('translator')->get('common.select_section'); ?> *" value=""><?php echo app('translator')->get('common.select_section'); ?> *</option>
                                </select>
                                <?php if($errors->has('section')): ?>
                                <span class="text-danger invalid-select" role="alert">
                                    <?php echo e($errors->first('section')); ?>

                                </span>
                                <?php endif; ?>
                            </div>
                            
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


<?php if(isset($marks_registers)): ?>
<section class="student-details">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-4 no-gutters">
                <div class="main-title">
                    <h3 class="mb-30 mt-30"><?php echo app('translator')->get('exam.mark_sheet_report_wise'); ?> </h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="white-box">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="single-report-admit">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex">
                                            <div>
                                                <img class="logo-img" src="http://localhost/naim/schoolmanagementsystem/public/backEnd/img/logo.png" alt="">
                                            </div>
                                            <div class="ml-30">
                                                <h3 class="text-white">School Management System</h3>
                                                <p class="text-white mb-0">House 25, Road 27, Block B, 54th Floor, New York, United States of America</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h3><?php echo app('translator')->get('exam.emam_info'); ?></h3>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <p class="mb-0">
                                                                <?php echo app('translator')->get('common.academic_year'); ?> : <span class="primary-color fw-500">2018-19</span>
                                                            </p>
                                                            <p class="mb-0">
                                                                <?php echo app('translator')->get('common.year'); ?>Exam : <span class="primary-color fw-500"><?php echo e($exam->name); ?></span>
                                                            </p>
                                                            <p class="mb-0">
                                                                Class : <span class="primary-color fw-500"><?php echo e($class->class_name); ?></span>
                                                            </p>
                                                            <p class="mb-0">
                                                                Section : <span class="primary-color fw-500"><?php echo e($section->section_name); ?></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <h3>Subjects</h3>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <p class="mb-0">
                                                                <span class="primary-color fw-500"><?php echo e($subject->subject !=""?$subject->subject->subject_name:""); ?></span>
                                                            </p>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="w-100 mt-30 mb-20">
                                            <thead>
                                                <tr>
                                                    <th>Student</th>
                                                    <th>Admission No.</th>
                                                    <?php
                                                        $subjects = $marks_register->marksRegisterChilds;
                                                       
                                                    ?>
                                                    <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <th><?php echo e($subject->subject->subject_name); ?></th>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <th>GPA</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                    $registerer_ids = [];
                                                ?>
                                                <?php $__currentLoopData = $marks_registers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $marks_register): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $registerer_ids[] = $marks_register->student_id;
                                                ?>
                                                <tr>
                                                    <td><?php echo e($marks_register->studentInfo->full_name); ?></td>
                                                    <td><?php echo e($marks_register->studentInfo->admission_no); ?></td>
                                                    <?php
                                                        $results = $marks_register->marksRegisterChilds;
                                                        $grand_total = 0;
                                                        $grand_total_marks = 0;
                                                        $final_result = 0;
                                                    ?>
                                                    <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $subjectDetails = App\SmMarksRegister::subjectDetails($marks_register->exam_id, $marks_register->class_id, $marks_register->section_id, $result->subject_id);
                                                        $grand_total_marks += $subjectDetails->full_mark;

                                                        if($result->abs == 0){
                                                            $grand_total += $result->marks;
                                                            if($result->marks < $subjectDetails->pass_mark){
                                                                $final_result++;
                                                            }

                                                        }else{
                                                            $final_result++;
                                                        }
                                                    ?>
                                                    <td><?php echo e($result->abs == 0? $result->marks: 'ABS'); ?> </td>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <td>
                                                        <?php
                                                            if($final_result == 0){
                                                                $percent = $grand_total/$grand_total_marks*100;
                                                                foreach($grades as $grade){
                                                                   if(floor($percent) >= $grade->percent_from && floor($percent) <= $grade->percent_upto){
                                                                       echo $grade->grade_name;
                                                                   }
                                                                }
                                                            }else{
                                                                echo "F";
                                                            }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\reports\mark_sheet_report.blade.php ENDPATH**/ ?>
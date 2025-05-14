<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('reports.online_exam_report'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<input type="text" hidden value="<?php echo e(@$clas->class_name); ?>" id="cls">
<input type="text" hidden value="<?php echo e(@$sec->section_name); ?>" id="sec">
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('reports.online_exam_report'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('reports.reports'); ?></a>
                <a href="#"><?php echo app('translator')->get('reports.online_exam_report'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
        <div class="row">
            <div class="col-lg-12">
           
                <div class="white-box">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="main-title">
                                <h3 class="mb-15"><?php echo app('translator')->get('common.select_criteria'); ?> </h3>
                            </div>
                        </div>
                    </div>
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'online_exam_reports', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

                        <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            <?php if(moduleStatusCheck('University')): ?>
                                <?php if ($__env->exists(
                                    'university::common.session_faculty_depart_academic_semester_level',
                                    ['mt' => 'mt-30', 'hide' => ['USUB'], 'required' => ['USL']]
                                )) echo $__env->make(
                                    'university::common.session_faculty_depart_academic_semester_level',
                                    ['mt' => 'mt-30', 'hide' => ['USUB'], 'required' => ['USL']]
                                , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="col-lg-3 mt-30">
                                <label class="primary_input_label" for=""><?php echo e(__('exam.exam')); ?><span class="text-danger"> *</span></label>
                                <select class="primary_select form-control<?php echo e($errors->has('exam') ? ' is-invalid' : ''); ?>" name="exam">
                                    <option data-display="<?php echo app('translator')->get('reports.select_exam'); ?> *" value=""><?php echo app('translator')->get('reports.select_exam'); ?> *</option>
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
                            <?php else: ?>
                            <div class="col-lg-4 mt-30-md md_mb_20">
                                <label class="primary_input_label" for=""><?php echo e(__('exam.exam')); ?><span class="text-danger"> *</span></label>
                                <select class="primary_select form-control<?php echo e($errors->has('exam') ? ' is-invalid' : ''); ?>" name="exam">
                                    <option data-display="<?php echo app('translator')->get('reports.select_exam'); ?> *" value=""><?php echo app('translator')->get('reports.select_exam'); ?> *</option>
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
                            <div class="col-lg-4 mt-30-md md_mb_20">
                                <label class="primary_input_label" for=""><?php echo e(__('common.class')); ?><span class="text-danger"> *</span></label>
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
                            <div class="col-lg-4 mt-30-md md_mb_20" id="select_section_div">
                                <label class="primary_input_label" for=""><?php echo e(__('common.section')); ?><span class="text-danger"> *</span></label>
                                <select class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?> select_section" id="select_section" name="section">
                                    <option data-display="<?php echo app('translator')->get('common.select_section'); ?> *" value=""><?php echo app('translator')->get('common.select_section'); ?> *</option>
                                    <?php if(isset($class_id)): ?>
                                    <?php $__currentLoopData = $class->classSection ? $class->classSection  : []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($section->sectionName->id); ?>" <?php echo e(old('section')==$section->sectionName->id ? 'selected' : ''); ?> >
                                        <?php echo e($section->sectionName->section_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
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

<?php if(isset($online_exam_question)): ?>
<section class="mt-20">
    <div class="container-fluid p-0">
        <div class="white-box mt-40">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="main-title">
                        <h3 class="mb-15"><?php echo app('translator')->get('reports.result_view'); ?></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                 
                    <div class="table-responsive">
                    <table id="table_id_tt" class="table school-table-style" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get('student.admission_no'); ?></th>
                                <th><?php echo app('translator')->get('student.student'); ?></th>
                                <?php if(moduleStatusCheck('University')): ?>
                                    <th> <?php echo app('translator')->get('university::un.semester_label'); ?> (<?php echo app('translator')->get('common.section'); ?>)</th>
                                <?php else: ?>
                                    <th><?php echo app('translator')->get('common.class_Sec'); ?></th>
                                <?php endif; ?>
                                <th><?php echo app('translator')->get('exam.exam'); ?></th>
                                <th><?php echo app('translator')->get('common.subject'); ?></th>
                                <th><?php echo app('translator')->get('exam.total_mark'); ?></th>
                                <th><?php echo app('translator')->get('exam.obtained_marks'); ?></th>
                                <th><?php echo app('translator')->get('reports.result'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                    
                                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <tr>
                                    <td><?php echo e($student->admission_no); ?></td>
                                    <td><?php echo e($student->full_name); ?></td>
                                    <?php if(moduleStatusCheck('University')): ?>
                                        <td><?php echo e($student->studentRecord->unSemesterLabel ? $student->studentRecord->unSemesterLabel->name : ''); ?> <?php echo e($student->studentRecord->section ? '(' . $student->studentRecord->section->section_name . ')' : ''); ?></td>
                                    <?php else: ?>
                                        <td>
    
                                        <?php if(!empty($student->recordClass)){ echo $student->recordClass->class->class_name; }else { echo ''; } ?>
    
                                                    <?php if($section_id==null): ?>
    
                                                        (<?php $__currentLoopData = $student->recordClasses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php echo e($section->section->section_name); ?>,
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>)
                                                    <?php else: ?>
                                                    (<?php echo e($student->recordSection != ""? $student->recordSection->section->section_name:""); ?>)
                                                    <?php endif; ?>
    
                                        </td>
                                    <?php endif; ?>
                                    <td><?php echo e($online_exam_question->title); ?></td>
                                    <td><?php echo e($online_exam_question->subject !=""?$online_exam_question->subject->subject_name:""); ?></td>
                                    <td><?php echo e($total_marks); ?></td>
                                    <td>
                                        <?php if(in_array($student->id, $present_students)): ?>
                                            <?php
                                                if (moduleStatusCheck('OnlineExam')== TRUE) {
                                                    $obtained_marks = Modules\OnlineExam\Entities\InfixOnlineExam::obtainedMarks($online_exam_question->id, $student->id);
                                                } else {
                                                    $obtained_marks = App\SmOnlineExam::obtainedMarks($online_exam_question->id, $student->id);
                                                }
                                                if($obtained_marks){
                                                    if($obtained_marks->status == 1){
                                                            echo "Waiting for marks";
                                                        }else{
                                                            $result = $obtained_marks->total_marks * 100 / $total_marks;
                                                            if($result >= $online_exam_question->percentage){
                                                                echo "Pass";  
                                                            }else{
                                                                echo "Fail";
                                                            }
                                                        }
                                                }else{
                                                    echo "Waiting for marks";
                                                }
                                                ?>
                                            <?php else: ?>
        
                                                <?php echo app('translator')->get('common.absent'); ?>
                                            <?php endif; ?>
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
</section>

<?php endif; ?>


            

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/backEnd/reports/online_exam_report.blade.php ENDPATH**/ ?>
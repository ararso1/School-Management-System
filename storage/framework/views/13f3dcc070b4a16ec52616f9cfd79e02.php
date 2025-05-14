<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('exam.subject_mark_sheet'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('reports.subject_mark_sheet'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(url('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('exam.examination'); ?></a>
                    <a href="#"><?php echo app('translator')->get('exam.subject_mark_sheet'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="main-title">
                        <h3 class="mb-30"><?php echo app('translator')->get('common.select_criteria'); ?></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'subjectMarkSheetSearch', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

                            <div class="row">
                                <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                <?php if(moduleStatusCheck('University')): ?>
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <?php if ($__env->exists('university::common.session_faculty_depart_academic_semester_level',
                                            ['required' => 
                                                ['USN', 'UD', 'UA', 'US', 'USL', 'USEC','USUB']
                                            ])) echo $__env->make('university::common.session_faculty_depart_academic_semester_level',
                                            ['required' => 
                                                ['USN', 'UD', 'UA', 'US', 'USL', 'USEC','USUB']
                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="col-lg-4 mt-30-md">
                                        <select class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>" id="class_subject" name="class">
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
                                    
                                    <div class="col-lg-4 mt-30-md" id="select_class_subject_div">
                                        <select class="primary_select form-control<?php echo e($errors->has('subject') ? ' is-invalid' : ''); ?> select_subject" id="select_class_subject" name="subject">
                                            <option data-display="<?php echo app('translator')->get('common.select_subject'); ?> *" value=""><?php echo app('translator')->get('common.select_subject'); ?> *</option>
                                        </select>
                                        <div class="pull-right loader loader_style" id="select_subject_loader">
                                            <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                        </div>
                                        <?php if($errors->has('subject')): ?>
                                            <span class="text-danger invalid-select" role="alert">
                                                <?php echo e($errors->first('subject')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
    
                                    <div class="col-lg-4 mt-30-md" id="m_select_subject_section_div">
                                        <select class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?> m_select_subject_section" id="m_select_subject_section" name="section">
                                            <option data-display="<?php echo app('translator')->get('common.select_section'); ?> " value=" "><?php echo app('translator')->get('common.select_section'); ?> </option>
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
        </div>
    </section>
    <?php if(moduleStatusCheck('University')): ?>
        <?php if ($__env->exists('university::exam.exam_routine_view')) echo $__env->make('university::exam.exam_routine_view', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\examination\subjectMarkSheet.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('reports.class_report'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>

<?php  $setting = generalSetting();  if(!empty($setting->currency_symbol)){ $currency = $setting->currency_symbol; }else{ $currency = '$'; }   ?> 



<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('reports.class_report'); ?> </h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('reports.reports'); ?></a>
                <a href="#"><?php echo app('translator')->get('reports.class_report'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-12">
             
                <div class="white-box">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="main-title">
                                <h3 class="mb-15"><?php echo app('translator')->get('common.select_criteria'); ?> </h3>
                            </div>
                        </div>
                    </div>
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'class_reports', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

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
                            <?php else: ?>
                            <div class="col-lg-6 mt-30-md col-md-6">
                                <label class="primary_input_label" for=""><?php echo e(__('common.class')); ?><span class="text-danger"> *</span></label>
                                <select class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>" id="select_class" name="class">
                                    <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value=""><?php echo app('translator')->get('common.select_class'); ?> *</option>
                                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($class->id); ?>"  <?php echo e(isset($class_id)? ($class_id == $class->id? 'selected':''):''); ?>><?php echo e($class->class_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('class')): ?>
                                <span class="text-danger invalid-select" role="alert">
                                    <?php echo e($errors->first('class')); ?>

                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-6 mt-30-md col-md-6" id="select_section_div">
                                <label class="primary_input_label" for=""><?php echo e(__('common.section')); ?></label>
                                <select class="primary_select form-control <?php echo e($errors->has('section') ? ' is-invalid' : ''); ?>" id="select_section" name="section">
                                    <option data-display="<?php echo app('translator')->get('common.select_section'); ?>" value=""><?php echo app('translator')->get('common.select_section'); ?></option>
                                    <?php if(isset($class_id)): ?>
                                        <?php $__currentLoopData = $class->classSection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($section->sectionName->id); ?>" <?php echo e(old("section")==$section->sectionName->id ? 'selected' : ''); ?> >
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
    </div>
</section>
<?php if(isset($students)): ?>

<section class="student-details">
    <div class="container-fluid p-0">
        <div class="white-box mt-40">
            <div class="row">
                <div class="col-lg-4 no-gutters">
                    <div class="main-title">
                        <h3 class="mb-15"><?php echo app('translator')->get('reports.class_report_for_class'); ?> <?php echo e(@$search_class->class_name); ?>, <?php echo e($sectionInfo != ""? 'section ('. $sectionInfo->section_name.')': ''); ?></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <div class="student-meta-box mb-40">
                            <div class="single-meta">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="value text-left text-uppercase">
                                            <?php echo app('translator')->get('reports.class_information'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="value text-left text-uppercase">
                                            <?php echo app('translator')->get('reports.quantity'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-meta">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="name text-left">
                                            <?php echo app('translator')->get('reports.number_of_student'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="name text-left">
                                            <?php echo e($students->count()); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-meta">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="name text-left">
                                            <?php echo app('translator')->get('reports.total_subjects_assigned'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="name text-left">
                                            <?php echo e(count($assign_subjects)); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="student-meta-box mb-40">
                            <div class="single-meta">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="value text-left text-uppercase">
                                            <?php echo app('translator')->get('common.subjects'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="value text-left text-uppercase">
                                            <?php echo app('translator')->get('common.teacher'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $__currentLoopData = $assign_subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assign_subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="single-meta">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="name text-left">
                                            <?php echo e($assign_subject->subject !=""?$assign_subject->subject->subject_name:""); ?>

                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="name text-left">
                                            <?php if($assign_subject->teacher_id != "" && $assign_subject->teacher): ?>
                                                <?php echo e($assign_subject->teacher->full_name); ?>

                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
                        </div>
    
                        <?php if($assign_class_teachers != ""): ?>
    
                        <div class="student-meta-box mb-40">
                            <div class="single-meta">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="value text-left text-uppercase">
                                            <?php echo app('translator')->get('reports.class_teacher'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="value text-left text-uppercase">
                                            <?php echo app('translator')->get('reports.information'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-meta">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="name text-left">
                                            <?php echo app('translator')->get('common.name'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="name text-left">
                                            <?php echo e($assign_class_teachers->teacher !=""?$assign_class_teachers->teacher->full_name:""); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-meta">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="name text-left">
                                            <?php echo app('translator')->get('common.mobile'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="name text-left">
                                            <?php echo e($assign_class_teachers->teacher !=""?$assign_class_teachers->teacher->mobile:""); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-meta">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="name text-left">
                                            <?php echo app('translator')->get('common.email'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="name text-left">
                                            <?php echo e($assign_class_teachers->teacher !=""?$assign_class_teachers->teacher->email:""); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-meta">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="name text-left">
                                            <?php echo app('translator')->get('common.address'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="name text-left">
                                            <?php echo e($assign_class_teachers->teacher !=""?$assign_class_teachers->teacher->current_address:""); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <?php endif; ?>
                        <?php if(generalSetting()->fees_status == 0): ?>
                            <div class="student-meta-box">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="single-meta">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="value text-left text-uppercase">
                                                        <?php echo app('translator')->get('common.type'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="value text-left text-uppercase">
                                                        <?php echo app('translator')->get('reports.collection'); ?>(<?php echo e(generalSetting()->currency_symbol); ?>)
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="value text-left text-uppercase">
                                                        <?php echo app('translator')->get('reports.due'); ?>(<?php echo e(generalSetting()->currency_symbol); ?>)
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-meta">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="name text-left">
                                                        <?php echo app('translator')->get('reports.fees_collection'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="name text-left">
                                                        <?php echo e(number_format($total_collection, 2)); ?><input type="hidden" id="total_collection" name="total_collection" value="<?php echo e($total_collection); ?>">
                                                    </div>
                                                </div>
                                            
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="name text-left">
                                                        <?php echo e(number_format(@$total_due, 2)); ?>

                                                        <input type="hidden" id="total_assign" name="total_assign" value="<?php echo e(@$total_due); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="single-meta">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="value text-left text-uppercase bb-15 pb-7">
                                                        <?php echo app('translator')->get('reports.fees_details'); ?>
                                                    </div>
    
                                                    <!-- <div id="commonBarChart" height="150px"></div> -->
                                                    <div id="donutChart" height="200px"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/backEnd/reports/class_report.blade.php ENDPATH**/ ?>
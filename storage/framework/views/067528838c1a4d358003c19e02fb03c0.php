<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('reports.result_archive'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('reports.result_archive'); ?> </h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('reports.reports'); ?></a>
                <a href="<?php echo e(route('results-archive')); ?>"><?php echo app('translator')->get('reports.result_archive'); ?>  </a> 
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="main-title">
                    <h3 class="mb-30"><?php echo app('translator')->get('common.select'); ?> <?php echo app('translator')->get('criteria'); ?> </h3>
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
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'marks_register', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

                        <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">

                            <div class="col-lg-3">
                                                    <select class="primary_select  promote_session form-control<?php echo e($errors->has('promote_session') ? ' is-invalid' : ''); ?>" name="promote_session" id="promote_session">
                                                        <option data-display="<?php echo app('translator')->get('common.select_academic_year'); ?> *" value=""><?php echo app('translator')->get('common.select_academic_year'); ?> *</option>
                                                        <?php $__currentLoopData = academicYears(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if(@$current_session != $session->id): ?>
                                                          <option value="<?php echo e($session->id); ?>" <?php echo e(( old("promote_session") == $session->id ? "selected":"")); ?>><?php echo e($session->year); ?></option>
                                                        <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                    
                                                    <span class="text-danger d-none" role="alert" id="promote_session_error">
                                                        <strong><?php echo app('translator')->get('common.the_session_is_required'); ?></strong>
                                                    </span>
                                                </div>

                                              
                                                 <div class="col-lg-3 " id="select_class_div">
                                                    <select class="primary_select " id="select_class" name="promote_class" id="select_class">
                                                        <option data-display="<?php echo app('translator')->get('common.select_class'); ?>" value=""><?php echo app('translator')->get('common.select_class'); ?></option>
                                                    </select>
                                                </div>

                                                 <div class="col-lg-3 " id="select_section_div">
                                                    <select class="primary_select " id="select_section" name="promote_section">
                                                        <option data-display="<?php echo app('translator')->get('common.select_section'); ?>" value=""><?php echo app('translator')->get('common.select_section'); ?></option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-3 mt-30-md" id="select_student_div">
                                                    <select class="primary_select form-control<?php echo e($errors->has('student') ? ' is-invalid' : ''); ?>"
                                                            id="select_student" name="student">
                                                        <option data-display="<?php echo app('translator')->get('common.select_student'); ?>"
                                                                value=""><?php echo app('translator')->get('common.select_student'); ?></option>
                                                    </select>
                                                    <?php if($errors->has('student')): ?>
                                                        <span class="text-danger invalid-select" role="alert">
                                                            <?php echo e($errors->first('student')); ?>

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
    </div>
</section> 

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\examination\resultsArchiveView.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('homework.add_homework'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('homework.add_homework'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('homework.home_work'); ?></a>
                    <a href="#"><?php echo app('translator')->get('homework.add_homework'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area">
        <div class="container-fluid p-0">
            <?php if(userPermission('saveHomeworkData')): ?>
                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'saveHomeworkData', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

            <?php endif; ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php echo app('translator')->get('homework.add_homework'); ?></h3>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            
                            <?php if(moduleStatusCheck('University')): ?>
                                <div class="row mb-30">
                                    <?php if ($__env->exists(
                                        'university::common.session_faculty_depart_academic_semester_level',
                                        ['subject' => true, 'dept_mt' => 'mt-0']
                                    )) echo $__env->make(
                                        'university::common.session_faculty_depart_academic_semester_level',
                                        ['subject' => true, 'dept_mt' => 'mt-0']
                                    , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            <?php else: ?>
                                <div class="row mb-15">
                                    <div class="col-lg-4">
                                        <div class="primary_input ">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('common.class'); ?><span class="text-danger"> *</span></label>
                                            <select
                                                class="primary_select  form-control<?php echo e($errors->has('class_id') ? ' is-invalid' : ''); ?>"
                                                name="class_id" id="classSelectStudentHomeWork">
                                                <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *"
                                                    value=""><?php echo app('translator')->get('common.select'); ?></option>
                                                <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($value->id); ?>"
                                                        <?php echo e(old('class_id') != '' ? 'selected' : ''); ?>>
                                                        <?php echo e($value->class_name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('class_id')): ?>
                                                <span class="text-danger"><?php echo e($errors->first('class_id')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="primary_input " id="subjectSelecttHomeworkDiv">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('common.subject'); ?> <span class="text-danger"> *</span></label>
                                            <select class="primary_select  form-control<?php echo e($errors->has('subject_id') ? ' is-invalid' : ''); ?>" name="subject_id" id="subjectSelect">
                                                <option data-display="<?php echo app('translator')->get('common.select_subjects'); ?> *" value=""><?php echo app('translator')->get('common.subject'); ?> *</option>
                                            </select>
                                            <div class="pull-right loader loader_style" id="select_subject_loader">
                                                <img class="loader_img_style"
                                                    src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                            </div>
                                            <?php if($errors->has('subject_id')): ?>
                                                <span class="text-danger invalid-select" role="alert">
                                                    <?php echo e($errors->first('subject_id')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" id="selectSectionsDiv">
                                        <label for="checkbox" class="mb-2"><?php echo app('translator')->get('common.section'); ?> <span class="text-danger"> *</span></label>
                                        <select id="selectSectionss" name="section_id[]" multiple="multiple"
                                            class="multypol_check_select active position-relative form-control<?php echo e($errors->has('section_id') ? ' is-invalid' : ''); ?>">
                                        </select>
                                        <?php if($errors->has('section_id')): ?>
                                            <span class="text-danger">
                                                <?php echo e($errors->first('section_id')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="row mb-15">
                                <div class="col-lg-4">
                                    <div class="primary_input mb-15">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('homework.home_work_date'); ?>
                                            <span class="text-danger"> *</span></label>
                                        <div class="primary_datepicker_input">
                                            <div class="no-gutters input-right-icon">
                                                <div class="col">
                                                    <div class="">
                                                        <input
                                                            class="primary_input_field primary_input_field date form-control"
                                                            id="homework_date" type="text" name="homework_date"
                                                            value="<?php echo e(old('homework_date') != '' ? old('homework_date') : date('m/d/Y')); ?>"
                                                            readonly>
                                                    </div>
                                                </div>
                                                <button class="btn-date" data-id="#homework_date" type="button">
                                                    <label class="m-0 p-0" for="homework_date">
                                                        <i class="ti-calendar" id="start-date-icon"></i>
                                                    </label>
                                                </button>
                                            </div>
                                        </div>
                                        <span class="text-danger"><?php echo e($errors->first('homework_date')); ?></span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="primary_input mb-15">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('homework.submission_date'); ?>
                                            <span class="text-danger"> *</span></label>
                                        <div class="primary_datepicker_input">
                                            <div class="no-gutters input-right-icon">
                                                <div class="col">
                                                    <div class="">
                                                        <input
                                                            class="primary_input_field primary_input_field date form-control"
                                                            id="submission_date" type="text" name="submission_date"
                                                            value="<?php echo e(old('submission_date') != '' ? old('submission_date') : date('m/d/Y')); ?>"
                                                            readonly>
                                                    </div>
                                                </div>
                                                <button class="btn-date" data-id="#submission_date" type="button">
                                                    <label class="m-0 p-0" for="submission_date">
                                                        <i class="ti-calendar" id="start-date-icon"></i>
                                                    </label>
                                                </button>
                                            </div>
                                        </div>
                                        <span class="text-danger"><?php echo e($errors->first('submission_date')); ?></span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="row no-gutters input-right-icon">
                                        <div class="col">
                                            <div class="primary_input ">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('homework.marks'); ?> <span
                                                        class="text-danger"> *</span></label>
                                                <input oninput="numberCheckWithDot(this)"
                                                    class="primary_input_field form-control<?php echo e($errors->has('marks') ? ' is-invalid' : ''); ?>"
                                                    type="text" name="marks" value="<?php echo e(old('marks')); ?>">
                                                <?php if($errors->has('marks')): ?>
                                                    <span class="text-danger">
                                                        <?php echo e($errors->first('marks')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="primary_input">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('homework.attach_file'); ?></label>
                                        <div class="primary_file_uploader">
                                            <input class="primary_input_field" type="text"
                                                id="placeholderHomeworkName"
                                                placeholder="<?php echo app('translator')->get('homework.attach_file'); ?>"
                                                disabled>
                                            <button class="" type="button">
                                                <label class="primary-btn small fix-gr-bg"
                                                    for="homework_file"><?php echo e(__('common.browse')); ?></label>
                                                <input type="file" class="d-none" name="homework_file"
                                                    id="homework_file">
                                            </button>
                                            <?php if($errors->has('homework_file')): ?>
                                                <span class="text-danger"><?php echo e($errors->first('homework_file')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row md-20">
                                <div class="col-lg-12">
                                    <div class="primary_input ">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('common.description'); ?> <span
                                                class="text-danger"> *</span> </label>
                                        <textarea
                                            class="primary_input_field form-control<?php echo e($errors->has('description') ? ' is-invalid' : ''); ?>"
                                            cols="0" rows="4" name="description"
                                            id="description *"><?php echo e(old('description')); ?></textarea>
                                        <?php if($errors->has('description')): ?>
                                            <span class="text-danger">
                                                <?php echo e($errors->first('description')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            $tooltip = '';
                            if (userPermission('saveHomeworkData')) {
                                $tooltip = '';
                            } else {
                                $tooltip = 'You have no permission to add';
                            }
                        ?>
                        <div class="row mt-40">
                            <div class="col-lg-12 text-center">
                                <button class="primary-btn fix-gr-bg submit" data-toggle="tooltip"
                                    title="<?php echo e($tooltip); ?>">
                                    <span class="ti-check"></span>
                                    <?php echo app('translator')->get('homework.save_homework'); ?>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo e(Form::close()); ?>

    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.partials.multi_select_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\homework\addHomework.blade.php ENDPATH**/ ?>
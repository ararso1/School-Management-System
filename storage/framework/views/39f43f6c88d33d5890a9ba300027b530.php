<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('front_settings.class_exam_routine_page'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
    <style>
        .col-lg-6.primary_input.sm_mb_20 {
            padding-left: 0;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('front_settings.class_exam_routine_page'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"> <?php echo app('translator')->get('front_settings.front_settings'); ?></a>
                    <a href="#"> <?php echo app('translator')->get('front_settings.class_exam_routine_page'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if(userPermission('news-heading-update')): ?>
                                <?php echo e(Form::open([
                                    'class' => 'form-horizontal',
                                    'files' => true,
                                    'route' => 'class-exam-routine-page-update',
                                    'method' => 'POST',
                                    'enctype' => 'multipart/form-data',
                                ])); ?>

                            <?php endif; ?>
                            <div class="white-box">
                                <div class="main-title">
                                    <h3 class="mb-15">
                                        <?php echo app('translator')->get('front_settings.class_exam_routine_page'); ?>
                                    </h3>
                                </div>
                                <div class="add-visitor <?php echo e(isset($update) ? '' : 'isDisabled'); ?>">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.title'); ?><span
                                                        class="text-danger"> *</span></label>
                                                <input
                                                    class="primary_input_field "
                                                    type="text" name="title" autocomplete="off"
                                                    value="<?php echo e(isset($update) ? ($routine_page != '' ? $routine_page->title : '') : ''); ?>">
                                                <?php if($errors->has('title')): ?>
                                                    <span class="text-danger">
                                                        <?php echo e($errors->first('title')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="primary_input mt-15">
                                                <div class="primary_input">
                                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('common.description'); ?>
                                                        <span class="text-danger"> *</span> </label>
                                                    <textarea class="primary_input_field form-control" cols="0" rows="5" name="description" id="description"><?php echo e(isset($update) ? ($routine_page != '' ? $routine_page->description : '') : ''); ?></textarea>
                                                    <?php if($errors->has('description')): ?>
                                                        <span class="text-danger">
                                                            <?php echo e($errors->first('description')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="primary_input mt-15">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.main_title'); ?><span
                                                        class="text-danger"> *</span></label>
                                                <input
                                                    class="primary_input_field form-control<?php echo e($errors->has('main_title') ? ' is-invalid' : ''); ?>"
                                                    type="text" name="main_title" autocomplete="off"
                                                    value="<?php echo e(isset($update) ? ($routine_page != '' ? $routine_page->main_title : '') : ''); ?>">
                                                <?php if($errors->has('main_title')): ?>
                                                    <span class="text-danger">
                                                        <?php echo e($errors->first('main_title')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="primary_input mt-15">
                                                <div class="primary_input">
                                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.main_description'); ?>
                                                        <span class="text-danger"> *</span> </label>
                                                    <textarea class="primary_input_field form-control" cols="0" rows="5" name="main_description"
                                                        id="main_description"><?php echo e(isset($update) ? ($routine_page != '' ? $routine_page->main_description : '') : ''); ?></textarea>
                                                    <?php if($errors->has('main_description')): ?>
                                                        <span class="text-danger">
                                                            <?php echo e($errors->first('main_description')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="primary_input mt-15">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.button_text'); ?><span
                                                        class="text-danger"> *</span></label>
                                                <input
                                                    class="primary_input_field form-control<?php echo e($errors->has('button_text') ? ' is-invalid' : ''); ?>"
                                                    type="text" name="button_text" autocomplete="off"
                                                    value="<?php echo e(isset($update) ? ($routine_page != '' ? $routine_page->button_text : '') : ''); ?>">
                                                <?php if($errors->has('button_text')): ?>
                                                    <span class="text-danger">
                                                        <?php echo e($errors->first('button_text')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="primary_input mt-15">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.button_url'); ?><span
                                                        class="text-danger"> *</span></label>
                                                <input
                                                    class="primary_input_field form-control<?php echo e($errors->has('button_text') ? ' is-invalid' : ''); ?>"
                                                    type="text" name="button_url" autocomplete="off"
                                                    value="<?php echo e(isset($update) ? ($routine_page != '' ? $routine_page->button_url : '') : ''); ?>">
                                                <?php if($errors->has('button_url')): ?>
                                                    <span class="text-danger">
                                                        <?php echo e($errors->first('button_url')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-15">
                                        <div class="col-lg-12">
                                            <span class="mt-10"><?php echo app('translator')->get('front_settings.image'); ?>(1420px*450px)</span>
                                            <div class="primary_input">
                                                <?php if($errors->has('image')): ?>
                                                    <span class="text-danger mb-10" role="alert">
                                                        <?php echo e($errors->first('image')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <div class="primary_file_uploader">
                                                    <input
                                                        class="primary_input_field form-control<?php echo e($errors->has('image') ? ' is-invalid' : ''); ?>"
                                                        id="placeholderInput" type="text"
                                                        placeholder="<?php echo e(isset($update) ? (($routine_page and $routine_page->image) != '' ? getFilePath3($routine_page->image) : trans('common.image') . ' *') : trans('common.image') . ' *'); ?>"
                                                        readonly>
                                                    <button class="" type="button">
                                                        <label class="primary-btn small fix-gr-bg"
                                                            for="browseFile"><?php echo e(__('common.browse')); ?></label>
                                                        <input type="file" class="d-none" name="image"
                                                            id="browseFile">
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-15">
                                        <div class="col-lg-12">
                                            <span class="mt-10"><?php echo app('translator')->get('common.image'); ?>(1420px*450px)</span>
                                            <div class="primary_input">
                                                <div class="primary_file_uploader">
                                                    <input
                                                        class="primary_input_field form-control<?php echo e($errors->has('main_image') ? ' is-invalid' : ''); ?>"
                                                        id="placeholderIn" type="text"
                                                        placeholder="<?php echo e(isset($update) ? (($routine_page and $routine_page->main_image != '') ? getFilePath3($routine_page->main_image) : trans('common.main') . ' ' . trans('common.image') . ' *') : trans('common.main') . ' ' . trans('common.image') . ' *'); ?>"
                                                        readonly>
                                                    <button class="" type="button">
                                                        <label class="primary-btn small fix-gr-bg"
                                                            for="browseFil"><?php echo e(__('common.browse')); ?></label>
                                                        <input type="file" class="d-none" name="main_image"
                                                            id="browseFil">
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-15">
                                        <div class="col-lg-6 d-flex">
                                            <div class="col-lg-6 primary_input sm_mb_20">
                                                <label><strong><?php echo app('translator')->get('front_settings.class_routine'); ?></strong></label>
                                            </div>
                                            <div class="col-lg-6 d-flex radio-btn-flex">
                                                <div class="col-lg-6 primary_input sm_mb_20">
                                                    <input type="radio" name="class_routine"
                                                        id="classRoutineShow"
                                                        class="common-radio" value="show"
                                                        <?php echo e($routine_page->class_routine == 'show' ? 'checked' : ''); ?>>
                                                    <label for="classRoutineShow"><?php echo app('translator')->get('front_settings.show'); ?></label>
                                                </div>
                                                <div class="col-lg-6 primary_input sm_mb_20">
                                                    <input type="radio" name="class_routine"
                                                        id="classRoutineHide"
                                                        class="common-radio" value="hide"
                                                        <?php echo e($routine_page->class_routine == 'hide' ? 'checked' : ''); ?>>
                                                    <label
                                                        for="classRoutineHide"><?php echo app('translator')->get('front_settings.hide'); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 d-flex">
                                            <div class="col-lg-6 primary_input sm_mb_20">
                                                <label><strong><?php echo app('translator')->get('front_settings.exam_routine'); ?></strong></label>
                                            </div>
                                            <div class="col-lg-6 d-flex radio-btn-flex">
                                                <div class="col-lg-6 primary_input sm_mb_20">
                                                    <input type="radio" name="exam_routine"
                                                        id="examRoutineShow"
                                                        class="common-radio" value="show"
                                                        <?php echo e($routine_page->exam_routine == 'show' ? 'checked' : ''); ?>>
                                                    <label for="examRoutineShow"><?php echo app('translator')->get('front_settings.show'); ?></label>
                                                </div>
                                                <div class="col-lg-6 primary_input sm_mb_20">
                                                    <input type="radio" name="exam_routine"
                                                        id="examRoutineHide"
                                                        class="common-radio" value="hide"
                                                        <?php echo e($routine_page->exam_routine == 'hide' ? 'checked' : ''); ?>>
                                                    <label
                                                        for="examRoutineHide"><?php echo app('translator')->get('front_settings.hide'); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        $tooltip = '';
                                        if (userPermission('news-heading-update')) {
                                            $tooltip = '';
                                        } else {
                                            $tooltip = 'You have no permission to add';
                                        }
                                    ?>
                                    <div class="row mt-40">
                                        <div class="col-lg-12 text-center">
                                            <?php if(Illuminate\Support\Facades\Config::get('app.app_sync')): ?>
                                                <span class="d-inline-block" tabindex="0" data-toggle="tooltip"
                                                    title="Disabled For Demo "> <button
                                                        class="primary-btn fix-gr-bg  demo_view"
                                                        style="pointer-events: none;" type="button"><?php echo app('translator')->get('common.update'); ?>
                                                    </button></span>
                                            <?php else: ?>
                                                <button class="primary-btn fix-gr-bg" data-toggle="tooltip"
                                                    title="<?php echo e(@$tooltip); ?>">
                                                    <span class="ti-check"></span>
                                                    <?php if(isset($update)): ?>
                                                        <?php echo app('translator')->get('common.update'); ?>
                                                    <?php else: ?>
                                                        <?php echo app('translator')->get('common.save'); ?>
                                                    <?php endif; ?>
                                                </button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\frontSettings\classExamRoutinePage.blade.php ENDPATH**/ ?>
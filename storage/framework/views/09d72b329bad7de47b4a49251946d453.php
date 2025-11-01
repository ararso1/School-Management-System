<?php if (! $__env->hasRenderedOnce('f7dfc627-caeb-45ff-bb1e-f4bc80c7ba4b')): $__env->markAsRenderedOnce('f7dfc627-caeb-45ff-bb1e-f4bc80c7ba4b');
$__env->startPush(config('pagebuilder.site_style_var')); ?>
    <style>
        .file_uploader button {
            position: absolute;
            right: 0;
            border: 0;
            bottom: 9px;
            right: 18px;
            padding: 0;
            background: transparent;
            z-index: 99;
            background: #4068FC;
            padding: 4px 10px;
            color: white;
        }

        .file_uploader button label {
            cursor: pointer;
        }
    </style>
<?php $__env->stopPush(); endif; ?>

<?php $__env->startSection(config('pagebuilder.site_section')); ?>
<?php echo e(headerContent()); ?>

    <?php
        $gs = generalSetting();
    ?>
    <section class="bradcrumb_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="bradcrumb_area_inner">
                        <h1>
                            <?php echo e(__('edulia.book_a_visit')); ?>

                            <span>
                                <a href="<?php echo e(url('/')); ?>"><?php echo e(__('edulia.home')); ?></a> /<?php echo e(__('edulia.book_a_visit')); ?>

                            </span>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section_padding gray_bg reg">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-md-10 offset-md-1 col-sm-12" id='page-width-clearfix'>
                    <div class="reg_wrapper">
                        <?php echo e(Form::open([
                            'class' => 'form-horizontal',
                            'files' => true,
                            'route' => 'frontend.book-a-visit-store',
                            'method' => 'POST',
                            'enctype' => 'multipart/form-data',
                        ])); ?>

                        <div class="reg_wrapper_item">
                            <h4><?php echo app('translator')->get('edulia.book_an_Appointment'); ?></h4>
                            <div class="reg_wrapper_item_flex">
                                <div class="input-control">
                                    <label for="#" class="input-control-label"><?php echo app('translator')->get('edulia.name'); ?><span>*</span></label>
                                    <input type="text" class="input-control-input" placeholder='Name' name="name"
                                        required>
                                </div>
                                <div class="input-control">
                                    <label for="#" class="input-control-label"><?php echo app('translator')->get('edulia.phone'); ?></label>
                                    <input type="tel" class="input-control-input" placeholder='Phone'
                                        name="phone">
                                </div>
                            </div>
                            <div class="reg_wrapper_item_flex">
                                <div class="input-control">
                                    <label for="#" class="input-control-label"><?php echo app('translator')->get('edulia.id'); ?><span>*</span></label>
                                    <input type="text" class="input-control-input" placeholder='ID' name="visitor_id"
                                        required>
                                </div>
                                <div class="input-control">
                                    <label for="#" class="input-control-label"><?php echo app('translator')->get('edulia.no_of_person'); ?><span>*</span></label>
                                    <input type="number" class="input-control-input" placeholder='No Of Person'
                                        name="no_of_person"
                                        required>
                                </div>
                            </div>
                            <div class="reg_wrapper_item_flex">
                                <div class="input-control">
                                    <label for="#" class="input-control-label"><?php echo app('translator')->get('edulia.date'); ?><span>*</span></label>
                                    <input type="date" class="input-control-input" id='datepicker1' name="date"
                                        placeholder='29/08/2021' required>
                                </div>
                                <div class="input-control">
                                    <label for="#" class="input-control-label"><?php echo app('translator')->get('edulia.in_time'); ?><span>*</span></label>
                                    <input type="time" class="input-control-input timepicker" name="in_time"
                                        placeholder='10:30 - 11:00' required>
                                </div>
                            </div>
                            <div class="reg_wrapper_item_flex">
                                <div class="input-control">
                                    <label for="#" class="input-control-label"><?php echo app('translator')->get('edulia.out_time'); ?><span>*</span></label>
                                    <input type="time" class="input-control-input timepicker"
                                        placeholder='10:30 - 11:00' name="out_time" required>
                                </div>
                                <div class="position-relative input-control file_uploader">
                                    <label for="#"
                                        class="input-control-label"><?php echo app('translator')->get('edulia.file'); ?></label>
                                    <input class="input-control-input" id="placeholderPhoto" type="text"
                                        placeholder="" readonly>
                                    <button class="" type="button">
                                        <label class="primary-btn small fix-gr-bg"
                                            for="photo"><?php echo app('translator')->get('common.browse'); ?></label>
                                        <input type="file" class="d-none" name="upload_event_image"
                                            value="<?php echo e(old('photo')); ?>" id="photo">
                                    </button>
                                </div>
                            </div>
                            <div class="input-control">
                                <label for="#" class='input-control-label'><?php echo app('translator')->get('edulia.purpose'); ?><span>*</span></label>
                                <textarea class="input-control-input" placeholder='Write appointment note here' name="purpose" required></textarea>
                            </div>
                            <div class="input-control">
                                <input type="submit" value="<?php echo app('translator')->get('edulia.book_an_Appointment'); ?>" class="input-control-input">
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php echo e(footerContent()); ?>

<?php $__env->stopSection(); ?>
<?php if (! $__env->hasRenderedOnce('f5ab832c-e3fd-4070-953a-7d891ab232de')): $__env->markAsRenderedOnce('f5ab832c-e3fd-4070-953a-7d891ab232de');
$__env->startPush(config('pagebuilder.site_script_var')); ?>
<?php $__env->stopPush(); endif; ?>

<?php echo $__env->make(config('pagebuilder.site_layout'), ['edit' => false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/frontEnd/theme/edulia/visit_a_book.blade.php ENDPATH**/ ?>
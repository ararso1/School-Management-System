
<link rel="stylesheet" href="<?php echo e(asset('public/backEnd/vendors/editor/summernote-bs4.css')); ?>">
<input type="hidden" id="id" value="<?php echo e($id); ?>">
<input type="hidden" id="key" value="<?php echo e($key); ?>">
<div class="container-fluid mt-30">
    <div class="row">
        <div class="col-lg-10 mb-20">
            <label> <strong><?php echo app('translator')->get('communicate.variables'); ?> :</strong> </label>
            <span class="text-primary">
                <?php echo e($shortcode); ?>

            </span>
        </div>
        <div class="col-lg-12">
            <div class="primary_input">
                
                <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.subject/title'); ?></label>
                <input class="primary_input_field form-control" type="text" name="subject" id="subject"
                    value="<?php echo e($subject); ?>">
                <div class="primary_input mt-20">
                    <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.email_body'); ?></label>
                    <textarea class="primary_input_field summer_note form-control" id="email_body"
                        cols="0" rows="4" name="emailBody" >
                    <?php echo e($emailBody); ?>

                </textarea>
                </div>
                <div class="primary_input mt-20">
                    <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.sms_text'); ?></label>
                    <textarea class="primary_input_field form-control" id="sms_body"
                        cols="0" rows="4" name="smsBody" >
                    <?php echo e($smsBody); ?>

                </textarea>
                </div>
                <div class="primary_input mt-20">
                    <label class="primary_input_label d-flex" for=""><?php echo app('translator')->get('system_settings.app_text'); ?>
                        
                    </label>
                    <textarea class="primary_input_field form-control" id="app_body"
                        cols="0" rows="4" name="appBody" >
                    <?php echo e($appBody); ?>

                </textarea>
                </div>
                <div class="primary_input mt-20">
                    <label class="primary_input_label d-flex" for=""><?php echo app('translator')->get('system_settings.web_text'); ?>
                        
                    </label>
                    <textarea class="primary_input_field form-control"
                        cols="0" rows="4" name="webBody" id="web_body">
                    <?php echo e($webBody); ?>

                </textarea>
                </div>
                <div class="row mt-40">
                    <div class="col-lg-12 text-center">
                        <button type="submit" class="primary-btn fix-gr-bg text-nowrap updateNotificationModal" data-toggle="tooltip">
                            <span class="ti-check"></span>
                            <?php echo app('translator')->get('common.update'); ?>
                        </button>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

<script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/editor/summernote-bs4.js"></script>
<script>
    $('.summer_note').summernote({
        placeholder: 'Write here',
        tabsize: 2,
        height: 400
    });
    </script>
<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\notification_setting\notification_setting_modal.blade.php ENDPATH**/ ?>
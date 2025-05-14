    <?php $__env->startSection('title'); ?>
        <?php echo app('translator')->get('exam.exam_signature_settings'); ?>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('exam.exam_signature_settings'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('exam.exam'); ?></a>
                <a href="#"><?php echo app('translator')->get('exam.exam_signature_settings'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="mb-40 student-details">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-12 ">
                <p class="alert alert-warning mb-2 text-center"><?php echo e(__('exam.signature_tips')); ?></p>
            </div>
            <div class="col-lg-12">
                <?php if($allSignature->count() > 0): ?>
                    <?php echo e(Form::open(['route' => 'exam-signature-settings-update', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                <?php else: ?>
                    <?php echo e(Form::open(['route' => 'exam-signature-settings-store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                <?php endif; ?>
                <div class="white-box">
                    <div class="row mb-15">
                        <div class="col-lg-12 text-right col-md-12">
                            <a href="javascript:void(0)" class="primary-btn small fix-gr-bg" id="addExam-Signature">
                                <span class="ti-plus pr-2"></span>
                                <?php echo app('translator')->get('exam.add_signature'); ?>
                            </a>
                        </div>
                    </div>
                        <div id="showExamSignature">
                            <?php $__currentLoopData = $allSignature; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $signatureData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row mb-20 allDiv-Rm">
                                    <div class="col-lg-4">
                                        <div class="primary_input">
                                            <label class="primary_input_label"><?php echo app('translator')->get('common.title'); ?><span class="text-danger"> *</span></label>
                                            <input type="text" name="exam_signature[<?php echo e($key); ?>][title]" class="primary_input_field form-control<?php echo e(@$errors->has('title') ? ' is-invalid' : ''); ?>" autocomplete="off" value="<?php echo e(@$signatureData->title); ?>">
                                            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger" >
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="primary_input">
                                            <label class="primary_input_label"><?php echo app('translator')->get('exam.signature'); ?><span></span></label>
                                            <div class="primary_file_uploader">
                                                    <input class="primary_input_field form-control <?php echo e($errors->has('signature') ? ' is-invalid' : ''); ?> file-upload-multi-placeholder" readonly="true" type="text" id="placeholderInputUpdate<?php echo e($key); ?>"
                                                    placeholder="<?php echo e(isset($signatureData->signature) && @$signatureData->signature != ""? getFilePath3(@$signatureData->signature):'Upload File'); ?>">
                                                <button class="" type="button">
                                                    <label class="primary-btn small fix-gr-bg" for="upload_update_file<?php echo e($key); ?>"><?php echo app('translator')->get('common.browse'); ?></label>
                                                    <input type="file" class="d-none form-control file-upload-multi" name="exam_signature[<?php echo e($key); ?>][signature]" id="upload_update_file<?php echo e($key); ?>">
                                                    <input type="hidden" name="exam_signature[<?php echo e($key); ?>][image_path]" value="<?php echo e(@$signatureData->signature); ?>">
                                                </button>
                                            </div>
                                        </div>
                                        <code class="nowrap d-block mb-30">(Allow file jpg, png, jpeg, svg)</code>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="primary_input">
                                            <label class="primary_input_label"><?php echo app('translator')->get('common.status'); ?></label>
                                            <label class="switch_toggle mt-10" for="cck<?php echo e($key); ?>">
                                                <input type="checkbox" id="cck<?php echo e($key); ?>" name="exam_signature[<?php echo e($key); ?>][active_status]" class="student_show_btn" <?php echo e(@$signatureData->active_status == 1 ? 'checked' : ''); ?>>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="primary_input_label"><?php echo app('translator')->get('common.delete'); ?><span></span></label>
                                        <button class="primary-btn icon-only fix-gr-bg remove-ExamSignature" type="button">
                                            <span class="ti-trash" ></span>
                                        </button>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="row mt-40">
                            <div class="col-lg-12 text-center">
                                <button class="primary-btn fix-gr-bg submit" data-toggle="tooltip">
                                    <span class="ti-check"></span>
                                    <?php if($allSignature->count() > 0): ?>
                                        <?php echo app('translator')->get('common.update'); ?>
                                    <?php else: ?>
                                        <?php echo app('translator')->get('common.save'); ?>
                                    <?php endif; ?>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<script type="text/javascript">
    var totalData = <?php echo e($allSignature->count()); ?>;
    $(document).ready(function(){
        $(document).on('click','#addExam-Signature', function(event) {
            event.preventDefault();
            $('#showExamSignature').append(
                `
                <div class="row mb-20 allDiv-Rm">
                    <div class="col-lg-4">
                        <div class="primary_input">
                            <label class="primary_input_label"><?php echo app('translator')->get('common.title'); ?><span class="text-danger"> *</span></label>
                            <input type="text" name="exam_signature[${totalData}][title]" class="primary_input_field form-control<?php echo e(@$errors->has('title') ? ' is-invalid' : ''); ?>" autocomplete="off">
                            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger" >
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="primary_input">
                            <label class="primary_input_label"><?php echo app('translator')->get('exam.signature'); ?><span></span></label>
                            <div class="primary_file_uploader">
                                    <input class="primary_input_field form-control <?php echo e($errors->has('signature') ? ' is-invalid' : ''); ?> file-upload-multi-placeholder" readonly="true" type="text" id="placeholderInputUpdate${totalData}"
                                    placeholder="<?php echo e(trans('exam.signature')); ?>">
                                <button class="" type="button">
                                    <label class="primary-btn small fix-gr-bg" for="upload_update_file${totalData}"><?php echo app('translator')->get('common.browse'); ?></label>
                                    <input type="file" class="d-none form-control file-upload-multi" data-id="${totalData}" name="exam_signature[${totalData}][signature]" id="upload_update_file${totalData}">
                                </button>
                            </div>
                        </div>
                        <code class="nowrap d-block mb-30">(Allow file jpg, png, jpeg, svg)</code>
                    </div>
                    <div class="col-lg-2">
                        <div class="primary_input">
                            <label class="primary_input_label"><?php echo app('translator')->get('common.status'); ?></label>
                            <label class="switch_toggle mt-10" for="cck${totalData}">
                                <input type="checkbox" id="cck${totalData}" name="exam_signature[${totalData}][active_status]" class="student_show_btn" <?php echo e(@$signatureData->active_status == 1 ? 'checked' : ''); ?>>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <label class="primary_input_label"><?php echo app('translator')->get('common.delete'); ?><span></span></label>
                        <button class="primary-btn icon-only fix-gr-bg remove-ExamSignature" type="button">
                            <span class="ti-trash" ></span>
                        </button>
                    </div>
                </div>
                `
            );
            totalData += 1;
        });

        $(document).on('click', '.remove-ExamSignature', function () {
            $(this).parents('.allDiv-Rm').remove();
        });
    });

    $(document).on('change','.file-upload-multi',function(e){
        let fileName = e.target.files[0].name;
        $(this).parent().parent().find('.file-upload-multi-placeholder').attr('placeholder',fileName);
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\examination\examSignatureSettings.blade.php ENDPATH**/ ?>
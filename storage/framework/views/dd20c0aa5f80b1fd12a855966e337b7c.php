<?php
    $LanguageList = getLanguageList();
?>

<div class="modal-dialog modal-dialog-centered student-details">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"><?php echo e(__('common.Edit')); ?></h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">

            <form action="#" method="POST" id="sectionEditForm">
                <input type="hidden" value="<?php echo e($section->id); ?>" name="id" id="">
                <div class="row pt-0">
                    <?php if(moduleStatusCheck('FrontendMultiLang') || moduleStatusCheck('Org')): ?>
                        <ul class="nav nav-tabs no-bottom-border  mt-sm-md-20 mb-10 ml-3"
                            role="tablist">
                            <?php $__currentLoopData = $LanguageList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="nav-item">
                                    <a class="nav-link  <?php if(auth()->user()->language_code == $language->code): ?> active <?php endif; ?>"
                                       href="#element2<?php echo e($language->code); ?>"
                                       role="tab"
                                       data-toggle="tab"><?php echo e($language->native); ?>  </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endif; ?>
                </div>
                <div class="tab-content">
                    <?php $__currentLoopData = $LanguageList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div role="tabpanel"
                             class="tab-pane fade <?php if(auth()->user()->language_code == $language->code): ?> show active <?php endif; ?>  "
                             id="element2<?php echo e($language->code); ?>">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label"
                                               for=""><?php echo e(__('common.Name')); ?>


                                            <span
                                                class="textdanger">*</span></label>
                                        <input class="primary_input_field" placeholder="" type="text" id=""
                                               name="name[<?php echo e($language->code); ?>]"
                                               value="<?php echo e($section->getTranslation('name',$language->code)); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>


                <div class="mt-40 d-flex justify-content-between">
                    <button type="button" class="primary-btn tr-bg"
                            data-dismiss="modal"><?php echo app('translator')->get('common.Cancel'); ?></button>

                    <button class="primary-btn fix-gr-bg" id="sectionUpdate"
                            type="button"><?php echo app('translator')->get('common.Submit'); ?></button>
                </div>
            </form>

        </div>
    </div>
</div>

<?php /**PATH C:\xampp\htdocs\Modules\MenuManage\Resources\views\components\edit_modal_section.blade.php ENDPATH**/ ?>
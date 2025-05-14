<div class="white-box">
    <div class="row">
        <div class="col-lg-4 no-gutters">
            <div class="main-title">
                <h3 class="mb-15"><?php echo app('translator')->get('teacherEvaluation.teacher_pending_evaluation_report'); ?> </h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="primary_input ">
                <label class="primary_input_label"
                    for=""><?php echo app('translator')->get('common.class'); ?><span class="text-danger">
                        *</span></label>
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
                <label class="primary_input_label" for=""><?php echo app('translator')->get('common.subject'); ?>
                    <span class="text-danger"></span></label>
                <select
                    class="primary_select  form-control<?php echo e($errors->has('subject_id') ? ' is-invalid' : ''); ?>"
                    name="subject_id" id="subjectSelect">
                    <option data-display="<?php echo app('translator')->get('teacherEvaluation.select_subject'); ?>" value="">
                        <?php echo app('translator')->get('common.subject'); ?></option>
                </select>
                <div class="pull-right loader loader_style"
                    id="select_subject_loader">
                    <img class="loader_img_style"
                        src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>"
                        alt="loader">
                </div>
            </div>
        </div>
        <div class="col-lg-4" id="selectSectionsDiv">
            <label for="checkbox" class="mb-2"><?php echo app('translator')->get('common.section'); ?> <span
                    class="text-danger"></span></label>
            <select id="selectSectionss" name="section_id[]" multiple="multiple"
                class="multypol_check_select active position-relative form-control<?php echo e($errors->has('section_id') ? ' is-invalid' : ''); ?>">
            </select>
        </div>
        <div class="col-lg-4 mt-30-md" id="select_teacher_div">
            <label class="primary_input_label" for=""><?php echo app('translator')->get('teacherEvaluation.teacher'); ?>
                <span
                    class="text-danger"> </span></label>
            <select class="primary_select " id="select_teacher" name="teacher_id">
                <option data-display="<?php echo app('translator')->get('teacherEvaluation.select_teacher'); ?>" value="">
                    <?php echo app('translator')->get('teacherEvaluation.select_teacher'); ?></option>
            </select>
            <div class="pull-right loader loader_style"
                id="select_teacher_loader">
                <img class="loader_img_style"
                    src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>"
                    alt="loader">
            </div>
        </div>
        <div class="col-lg-4 mt-30-md" id="select_submitted_by_div">
            <label class="primary_input_label" for=""><?php echo app('translator')->get('teacherEvaluation.submitted_by'); ?>
                <span
                    class="text-danger"> </span></label>
            <select class="primary_select " id="select_submitted_by"
                name="submitted_by">
                <option data-display="<?php echo app('translator')->get('teacherEvaluation.select_submitted_by'); ?>" value="">
                    <?php echo app('translator')->get('teacherEvaluation.select_submitted_by'); ?></option>
                <option data-display="<?php echo app('translator')->get('teacherEvaluation.parent'); ?>" value="3">
                    <?php echo app('translator')->get('teacherEvaluation.parent'); ?></option>
                <option data-display="<?php echo app('translator')->get('teacherEvaluation.student'); ?>" value="2">
                    <?php echo app('translator')->get('teacherEvaluation.student'); ?></option>
            </select>
        </div>
        <div class="col-lg-12 mt-20 text-right">
            <button type="submit" class="primary-btn small fix-gr-bg">
                <span class="ti-search pr-2"></span>
                <?php echo app('translator')->get('teacherEvaluation.search'); ?>
            </button>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\teacherEvaluation\report\_teacher_evaluation_search_common_table.blade.php ENDPATH**/ ?>
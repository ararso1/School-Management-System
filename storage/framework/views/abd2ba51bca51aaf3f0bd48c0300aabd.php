<div class="col-12 mt-25">
    <div class="row">
        <div class="col-lg-<?php echo e(generalSetting()->sub_topic_enable ? 5 : 10); ?> select_topic_div" id="select_topic_div">
            <select
                class="primary_select niceSelectModal form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?> select_topic"
                id="select_topic" name="topic[]">
                <option data-display="<?php echo app('translator')->get('lesson::lesson.select_topic'); ?> *" value="">
                    <?php echo app('translator')->get('lesson::lesson.select_topic'); ?> *</option>
                <?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($item->id); ?>" <?php if(isset($lessonPlanDetail)): ?>
                        <?php echo e($lessonPlanDetail->topic_detail_id == $topicData->id ? 'selected' : ''); ?>

                    <?php endif; ?> ><?php echo e($item->topic_title); ?> </option>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <div class="pull-right loader" id="select_topic_loader" style="margin-top: -30px;padding-right: 21px;">
                <img src="<?php echo e(asset('Modules/Lesson/Resources/assets/images/pre-loader.gif')); ?>" alt=""
                    style="width: 28px;height:28px;">
            </div>
            <span class="text-danger"  id="topic_error"></span>
        </div>
        <?php if(generalSetting()->sub_topic_enable): ?>
        <div class="col-lg-5 mt-30-md">
            <div class="primary_input">
                <input name="sub_topic[]" class="primary_input_field read-only-input form-control" type="text">
                
                <label id="teacher_label"><?php echo app('translator')->get('lesson::lesson.sub_topic'); ?></label>
                <span class="text-danger"  id="teacher_error">
                </span>
            </div>
        </div>
        <?php endif; ?>
        <div class="col-2">
            <button class="removeTopiceRowBtn primary-btn icon-only fix-gr-bg" type="button">
                <span class="ti-trash"></span> </button>
        </div>
    </div>
</div>

<script>
    $(".primary_select").niceSelect('destroy');
    $(".primary_select").niceSelect();
</script><?php /**PATH C:\xampp\htdocs\Modules\Lesson\Resources\views\topic_row.blade.php ENDPATH**/ ?>
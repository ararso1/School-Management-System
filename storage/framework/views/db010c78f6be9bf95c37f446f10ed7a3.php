<script src="<?php echo e(asset('public/backEnd/')); ?>/js/main.js"></script>

<?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'online_exam_question_edit',
                                'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'online_add_question_edit'])); ?>


    <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
    <input type="hidden" name="online_exam_id" value="<?php echo e($examId); ?>">
    <input type="hidden" name="id" value="<?php echo e($id); ?>">
    <input type="hidden" name="question_type" value="<?php echo e($type); ?>">
    <div class="white-box">
        <div class="add-visitor">
            <div class="common-fields" id="common-fields">

                <div class="row  mt-25">
                    <div class="col-lg-12">
                        <div class="primary_input">
                            <input oninput="numberCheck(this)" class="primary_input_field form-control"
                                type="text" name="mark" autocomplete="off" value="<?php echo e(@$online_exam_question->mark); ?>" required>
                            <label class="primary_input_label" for=""><?php echo app('translator')->get('exam.marks'); ?></label>
                            
                        </div>
                    </div>
                </div>
                <div class="row mt-25">
                    <div class="col-lg-12">
                        <div class="primary_input">
                            <textarea class="primary_input_field form-control" cols="0" rows="5" name="question_title" required><?php echo e(@$online_exam_question->title); ?></textarea>
                            <label class="primary_input_label" for=""><?php echo app('translator')->get('exam.question_title'); ?></label>
                            
                        </div>
                    </div>
                </div>
            </div>
            <?php if($type == "M"): ?>
            <?php
                $multiple_options = $online_exam_question->multipleOptions;
                $number_of_option = $online_exam_question->multipleOptions->count();
            ?>
            <div class="multiple-choice" id="multiple-choice">
                
                <div class="row  mt-25">
                    <div class="col-lg-10">
                        <div class="primary_input">
                            <input oninput="numberCheck(this)" class="primary_input_field form-control"
                                type="text" name="number_of_option" autocomplete="off" id="number_of_option_edit" value="<?php echo e(@$number_of_option); ?>">
                            <label class="primary_input_label" for=""><?php echo app('translator')->get('exam.number_options'); ?></label>
                            
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <button type="button" id="create-option-edit"><?php echo app('translator')->get('common.create'); ?></button>
                    </div>
                </div>

            </div>

            <div class="multiple-options" id="multiple-options">
                <?php $i=0; ?>
                <?php $__currentLoopData = $multiple_options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $multiple_option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $i++; ?>
                <div class='row  mt-25'>
                    <div class='col-lg-10'>
                        <div class='primary_input'>
                            <input class='primary_input_field form-control' type='text' name='option[]' autocomplete='off' required value="<?php echo e(@$multiple_option->title); ?>">
                            <label class="primary_input_label" for=""><?php echo app('translator')->get('common.option'); ?> <?php echo e($i); ?></label>
                            <span class='focus-border'></span>
                        </div>
                    </div>
                    <div class='col-lg-2'>
                        <button type='button'><input type='checkbox' name='option_check_<?php echo e($i); ?>' value='1' <?php echo e(@$multiple_option->status == 1? 'checked': ''); ?>></button>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
            <?php elseif($type == "T"): ?>
            <div class="true-false" id="true-false">
                <div class="row  mt-25">
                    <div class="col-lg-12 d-flex">
                        <p class="text-uppercase fw-500 mb-10"></p>
                        <div class="d-flex radio-btn-flex">
                            <div class="mr-30">
                                <input type="radio" name="trueOrFalse" id="relationFatherEdit" value="T" class="common-radio relationButton" <?php echo e(@$online_exam_question->trueFalse == 'T'? 'checked': ''); ?>>
                                <label for="relationFatherEdit"><?php echo app('translator')->get('common.true'); ?></label>
                            </div>
                            <div class="mr-30">
                                <input type="radio" name="trueOrFalse" id="relationMotherEdit" value="F" class="common-radio relationButton" <?php echo e(@$online_exam_question->trueFalse == 'F'? 'checked': ''); ?>>
                                <label for="relationMotherEdit"><?php echo app('translator')->get('common.false'); ?></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php else: ?>
            <div class="fill-in-the-blanks" id="fill-in-the-blanks">
                <div class="row  mt-25">
                    <div class="col-lg-12">
                        <div class="primary_input">
                            <textarea class="primary_input_field form-control" cols="0" rows="5" name="suitable_words" required><?php echo e(@$online_exam_question->suitable_words); ?></textarea>
                            <label class="primary_input_label" for=""><?php echo app('translator')->get('exam.suitable_words'); ?></label>
                            
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div class="row mt-40" id="submit-button">
                <div class="col-lg-12 text-center">
                    <button class="primary-btn fix-gr-bg">
                        <span class="ti-check"></span>
                        <?php echo app('translator')->get('exam.update_online_exam_question'); ?>
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php echo e(Form::close()); ?>




<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\examination\online_exam_question_edit.blade.php ENDPATH**/ ?>
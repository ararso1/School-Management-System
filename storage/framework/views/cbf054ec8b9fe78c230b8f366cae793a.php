
<div class="row">
    <div class="col-lg-12">
        <table id="table_id" class="table" cellspacing="0" width="100%">
            <tbody>
                <tr align="center">
                    <td colspan="3">
                        <h4><?php echo e(@$take_online_exam->onlineExam !=""?@$take_online_exam->onlineExam->question:""); ?></h4>
                        <h3><strong><?php echo app('translator')->get('common.subjects'); ?>: </strong><?php echo e(@$take_online_exam->onlineExam !=""? @$take_online_exam->onlineExam->subject->subject_name:""); ?></h3>
                        <h3><strong><?php echo app('translator')->get('exam.total_marks'); ?>: <?php echo e(@$take_online_exam->total_marks); ?> </strong></h3>
                        <h3>
                            <strong><?php echo app('translator')->get('common.exam_date'); ?>: </strong><?php echo e(@$take_online_exam->onlineExam !=""?dateConvert(@$take_online_exam->onlineExam->date):""); ?>

                        </h3>
                        <h3>
                            <strong><?php echo app('translator')->get('common.end_date'); ?>: </strong><?php echo e(@$take_online_exam->onlineExam!=""?dateConvert(@$take_online_exam->onlineExam->end_time):""); ?>

                        </h3>
                    </td>
                </tr>
                <tr>
                    <th><?php echo app('translator')->get('exam.question'); ?></th>
                    <th class="text-right"><?php echo app('translator')->get('exam.marks'); ?></th>
                </tr>
                <?php 
                    $j=0;
                    $answered_questions = $take_online_exam->answeredQuestions;
                ?>
                <?php $__currentLoopData = $answered_questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $student_answer=App\OnlineExamStudentAnswerMarking::StudentGivenAnswer($take_online_exam->online_exam_id,$question->question_bank_id,$s_id);
                    if ($question->questionBank->type=='MI') {
                            $submited_answer=App\OnlineExamStudentAnswerMarking::StudentImageAnswer($take_online_exam->online_exam_id,$question->question_bank_id,$s_id);
                            $submited_answer_status=App\OnlineExamStudentAnswerMarking::StudentImageAnswerStatus($take_online_exam->online_exam_id,$question->question_bank_id,$s_id);
                        } 
                ?>
                <tr>
                   
                    <td width="90%">
                        <h5 class="mt-10 text-center"><?php echo e(++$j.'.'); ?> <?php echo e(@$question->questionBank!=""?@$question->questionBank->question:""); ?></h5>
                        

                        <?php if(@$question->questionBank->type == "MI"): ?>
                            
                            <div class="qustion_banner_img" >
                                <img src="<?php echo e(asset($question->questionBank->question_image)); ?>" alt="">
                            </div>
                        <?php endif; ?>

                        <?php if(@$question->questionBank->type == "M"): ?>
                            <?php

                                $multiple_options = $question->takeQuestionMu;
                                $number_of_option = $question->takeQuestionMu->count();
                                $i = 0;
                            ?>
                            <div class="d-flex align-items-center justify-content-center">
                                <?php $__currentLoopData = $question->questionBank->questionMu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $multiple_option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="mt-20 mr-20">
                                        <input type="checkbox" id="answer<?php echo e(@$multiple_option->id); ?>" class="common-checkbox" name="options_<?php echo e(@$question->question_bank_id); ?>_<?php echo e($i++); ?>" value="1" <?php echo e(@$student_answer->user_answer==$multiple_option->id? 'checked': ''); ?> disabled>
                                        <label for="answer<?php echo e(@$multiple_option->id); ?>"><?php echo e(@$multiple_option->title); ?></label>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php elseif(@$question->questionBank->type == "MI"): ?>
                            <?php

                                $multiple_options = $question->takeQuestionMu;
                                $number_of_option = $question->takeQuestionMu->count();
                                $i = 0;
                            ?>
                      

                            <div class="quiestion_group">
                                <?php $__currentLoopData = $question->questionBank->questionMu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $multiple_option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="single_question <?php echo e(isset($submited_answer)? in_array($multiple_option->id,$submited_answer) ? 'active' :'' : ''); ?>" style="background-image: url(<?php echo e(asset($multiple_option->title)); ?>)">

                                        <div class="img_ovelay">
                                            <div class="icon">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                        <?php elseif(@$question->questionBank->type == "T"): ?>
                        <div class="d-flex align-items-center justify-content-center radio-btn-flex mt-20">
                            <div class="mr-30">
                                <input type="radio" name="trueOrFalse_<?php echo e(@$question->question_bank_id); ?>" id="true_<?php echo e(@$question->question_bank_id); ?>" value="T" class="common-radio relationButton" <?php echo e(@$student_answer->user_answer == "T"? 'checked': ''); ?> disabled>
                                <label for="true_<?php echo e(@$question->question_bank_id); ?>"><?php echo app('translator')->get('exam.true'); ?></label>
                            </div>
                            <div class="mr-30">
                                <input type="radio" name="trueOrFalse_<?php echo e(@$question->question_bank_id); ?>" id="false_<?php echo e(@$question->question_bank_id); ?>" value="F" class="common-radio relationButton" <?php echo e(@$student_answer->user_answer == "F"? 'checked': ''); ?> disabled>
                                <label for="false_<?php echo e(@$question->question_bank_id); ?>"><?php echo app('translator')->get('exam.FALSE'); ?></label>
                            </div>
                        </div>

                        
                        <?php else: ?>

                            <div class="primary_input mt-20">
                                <textarea class="primary_input_field form-control mt-10 has-content" cols="0" rows="5" name="suitable_words_<?php echo e(@$question->question_bank_id); ?>"><?php echo e(@$student_answer->user_answer); ?></textarea>
                                <label class="primary_input_label" for=""><?php echo app('translator')->get('exam.suitable_words'); ?></label>
                                
                            </div>
                        <?php endif; ?>

                        <div class="mt-20">
                            <?php if(@$question->questionBank->type == "M"): ?>
                            <?php
                                $ques_bank_multiples = $question->questionBank->questionMu;
                                $currect_multiple = '';
                                $k = 0;
                                foreach($ques_bank_multiples as $ques_bank_multiple){
                                
                                    if(@$ques_bank_multiple->status == 1){
                                    $k++;
                                        if($k == 1){
                                            $currect_multiple .= $ques_bank_multiple->title;
                                        }else{
                                            $currect_multiple .= ','.$ques_bank_multiple->title;
                                        }
                                    }
                                }

                            ?>

                                <h4 class="text-center">[<?php echo app('translator')->get('exam.currect_answer'); ?>: <?php echo e($currect_multiple); ?>]</h4>

                            <?php elseif(@$question->questionBank->type == "MI"): ?>
                                <?php
                                    $ques_bank_multiples = $question->questionBank->questionMu;
                                    $currect_multiple = '';
                                    $k = 0;
                                ?>
                                    <h4 class="text-center">[<?php echo app('translator')->get('exam.currect_answer'); ?>]</h4>
                                    <div class="quiestion_group">
                                        <?php
    
                                        foreach($ques_bank_multiples as $ques_bank_multiple){
                                            if ($ques_bank_multiple->status == 0) {
                                                continue;
                                            }
                                        ?>
                                        <div class="single_question "style="background-image: url(<?php echo e(asset($ques_bank_multiple->title)); ?>)">
    
                                        <div class="img_ovelay">
                                        
                                            <div class="icon">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        </div>
    
                                        <?php
                                        
                                        }
                                      
                                        ?>
                                    </div>
                       
                            <?php elseif(@$question->questionBank->type == "T"): ?>
                                <h4 class="text-center">[<?php echo app('translator')->get('exam.currect_answer'); ?>: <?php echo e(@$question->questionBank->trueFalse == "T"? 'True': 'False'); ?>]</h4>
                            <?php else: ?> 
                                <h4 class="text-center">[<?php echo app('translator')->get('exam.currect_answer'); ?>: <?php echo e(@$question->questionBank->suitable_words); ?>]</h4>
                            <?php endif; ?>
                        </div>
                    </td>
                    <?php if(@$question->questionBank->type == "MI"): ?>
                        <?php if($submited_answer_status==1): ?>

                            <td width="10%" class="text-right">
                                <span class="primary-btn fix-gr-bg">
                                <?php echo e(@$question->questionBank->marks); ?>

                                </span>
                            <?php else: ?>

                            <td width="10%" class="text-right"><span class="primary-btn fix-gr-bg">0</span></td>
                            
                        <?php endif; ?>
                   
                    <?php else: ?>
                    <td width="10%" class="text-right"><span class="primary-btn fix-gr-bg"><?php echo e(@$student_answer->obtain_marks); ?></span></td>
                        
                    <?php endif; ?>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        
    </div>
</div>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\examination\online_answer_view_script_modal.blade.php ENDPATH**/ ?>
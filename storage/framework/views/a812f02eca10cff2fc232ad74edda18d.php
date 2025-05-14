<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('exam.online_exam'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
    <style>
        .common-checkbox:checked:disabled+label:before {
            display: none !important;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('exam.examinations'); ?> </h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('exam.examinations'); ?></a>
                <a href="<?php echo e(route('online-exam')); ?>"><?php echo app('translator')->get('exam.online_exam'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
        <div class="row">

            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-4 no-gutters">
                        <div class="main-title">
                            <h3 class="mb-30"><?php echo app('translator')->get('exam.marking_online_exam'); ?></h3>
                        </div>
                    </div>
                </div>
                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'online_exam_marks_store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                <input type="hidden" name="online_exam_id" value="<?php echo e(@$take_online_exam->online_exam_id); ?>">
                <input type="hidden" name="student_id" value="<?php echo e(@$take_online_exam->student_id); ?>">
                <div class="row  white-box">
                    <div class="col-lg-12">
                        <div class="container-fluid exam-bg ">
                            <div class="">
                                <div class="row  pl-10">
                                    <div class="col-lg-7 mt-20">
                                        <h3><?php echo e(@$take_online_exam->onlineExam !=""?$take_online_exam->onlineExam->question:""); ?></h3>
                                                    <h4><strong><?php echo app('translator')->get('common.subjects'); ?>: </strong><?php echo e(@$take_online_exam->onlineExam!=""?@$take_online_exam->onlineExam->subject->subject_name:""); ?></h4>
                                                    <h4><strong><?php echo app('translator')->get('exam.total_marks'); ?>: <?php echo e(@$total_mark); ?> </strong></h4>
                                                    <h4><strong><?php echo app('translator')->get('exam.minimum_percentage'); ?> : <?php echo e(@$online_exam_info->percentage); ?> </strong></h4>
                                                    
                                    <p><strong><?php echo app('translator')->get('exam.instruction'); ?> : </strong><?php echo e(@$take_online_exam->onlineExam->instruction); ?></p>
                                    </div>
                                    <div class="col-lg-5 mt-20">
                                        
                                        <p class="mb-2">
                                            <strong><?php echo app('translator')->get('common.date'); ?> & <?php echo app('translator')->get('common.time'); ?>: </strong><?php echo e(@$take_online_exam->onlineExam !=""?dateConvert(@$take_online_exam->onlineExam->date):""); ?> <?php echo e(@$take_online_exam->onlineExam!=""?dateConvert(@$take_online_exam->onlineExam->end_time):""); ?>

                                        </p>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="question_table">
                        <table id="table_id" class="table" cellspacing="0" width="100%">
                            <tbody>
                                
                                <tr>
                                    <th><?php echo app('translator')->get('exam.question'); ?></th>
                                    <th class="text-right"><?php echo app('translator')->get('exam.marks'); ?></th>
                                    <th class="text-right"><?php echo app('translator')->get('exam.incorrect'); ?></th>
                                    <th class="text-right"><?php echo app('translator')->get('exam.currect'); ?></th>
                                </tr>
                                <?php 
                                    $j=0;
                                    $answered_questions = $take_online_exam->answeredQuestions;
                                ?>
                                <?php $__currentLoopData = $answered_questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $student_answer=App\OnlineExamStudentAnswerMarking::StudentGivenAnswer($online_exam_info->id,$question->question_bank_id,$s_id);
                                    if ($question->questionBank->type=='MI') {
                                            $submited_answer=App\OnlineExamStudentAnswerMarking::StudentImageAnswer($online_exam_info->id,$question->question_bank_id,$s_id);
                                            $submited_answer_status=App\OnlineExamStudentAnswerMarking::StudentImageAnswerStatus($online_exam_info->id,$question->question_bank_id,$s_id);
                                        } 
                                ?>

                                
                                <tr>
                                    <td width="80%">
                                        <h4 class="text-center"><?php echo e(++$j.'.'); ?> <?php echo e(@$question->questionBank->question); ?></h4>
                                        <?php if(@$question->questionBank->type == "MI"): ?>
                                        <div class="qustion_banner_img">
                                            <img src="<?php echo e(asset($question->questionBank->question_image)); ?>" alt="">
                                        </div>
                                     <?php endif; ?>
                                        <?php if(@$question->questionBank->type == "M"): ?>
                                        <input type="hidden"   name="options_<?php echo e(@$question->question_bank_id); ?>" value="<?php echo e(@$student_answer->user_answer); ?>">
                                            <?php

                                                $multiple_options = $question->takeQuestionMu;
                                                $number_of_option = $question->takeQuestionMu->count();
                                                $i = 0;
                                            ?>
                                            <div class="d-flex align-items-center justify-content-center">
                                                <?php $__currentLoopData = $question->questionBank->questionMu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $multiple_option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="mt-20 mr-20">
                                                    <input type="radio" disabled id="answer<?php echo e(@$multiple_option->id); ?>" class="common-checkbox"  value="<?php echo e(@$multiple_option->id); ?>" <?php echo e(@$student_answer->user_answer == $multiple_option->id? 'checked': ''); ?>>
                                                    <label for="answer<?php echo e(@$multiple_option->id); ?>"><?php echo e(@$multiple_option->title); ?></label>
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                            <?php elseif(@$question->questionBank->type == "MI"): ?>
                                            <input type="hidden"   name="options_<?php echo e(@$question->question_bank_id); ?>" value="<?php echo e(@$student_answer->user_answer); ?>">
                                            <div class="quiestion_group">
                                                                                                        
                                                <?php
                                                    if($question->questionBank->answer_type=='radio'){
                                                            $question_type_class='radio_question';
                                                    }else{
                                                        $question_type_class='check_question';

                                                    }
                                                ?>
                                                <?php $__currentLoopData = $question->questionBank->questionMu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $multiple_option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="single_question <?php echo e($question_type_class); ?> <?php echo e(isset($submited_answer)? in_array($multiple_option->id,$submited_answer) ? 'active' :'' : ''); ?>" style="background-image: url(<?php echo e(asset($multiple_option->title)); ?>)" 
                                                        data-question = "<?php echo e(@$question->question_bank_id); ?>"
                                                        data-id="answer<?php echo e(@$multiple_option->id); ?>"
                                                        data-name="options_<?php echo e(@$question->question_bank_id); ?>"
                                                        data-value="<?php echo e($multiple_option->id); ?>" >

                                                        <div class="img_ovelay">
                                                            <input  data-question = "<?php echo e(@$question->question_bank_id); ?>" type="<?php echo e(@$question->questionBank->answer_type); ?>" 
                                                            data-option="<?php echo e(@$multiple_option->id); ?>" id="answer<?php echo e(@$multiple_option->id); ?>"
                                                             class="common-checkbox answer_question_mu" name="options_<?php echo e(@$question->question_bank_id); ?>" 
                                                             value="<?php echo e($multiple_option->id); ?>" <?php echo e(isset($submited_answer)? in_array($multiple_option->id,$submited_answer) ? 'checked' :'' : ''); ?>>
                                                    
                                                            <div class="icon">
                                                                <i class="fa fa-check"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
    
                                        <?php elseif($question->questionBank->type == "T"): ?>
                                        <input type="hidden"   value="<?php echo e(@$student_answer->user_answer); ?>" name="trueOrFalse_<?php echo e(@$question->question_bank_id); ?>" >
                                        <div class="d-flex align-items-center justify-content-center radio-btn-flex mt-20">
                                            <div class="mr-30">
                                                <input type="radio" disabled  id="true_<?php echo e(@$question->question_bank_id); ?>" value="T" class="common-checkbox common-radio relationButton" <?php echo e(@$student_answer->user_answer == "T"? 'checked': ''); ?>>
                                                <label for="true_<?php echo e(@$question->question_bank_id); ?>"><?php echo app('translator')->get('exam.true'); ?></label>
                                            </div>
                                            <div class="mr-30">
                                                <input type="radio" disabled  id="false_<?php echo e(@$question->question_bank_id); ?>" value="F" class="common-checkbox common-radio relationButton" <?php echo e(@$student_answer->user_answer == "F"? 'checked': ''); ?>>
                                                <label for="false_<?php echo e(@$question->question_bank_id); ?>"><?php echo app('translator')->get('exam.false'); ?></label>
                                            </div>
                                        </div>

                                        
                                        <?php else: ?>

                                            <div class="primary_input mt-20">
                                                <textarea readonly class="primary_input_field form-control mt-10 has-content" cols="0" rows="5" name="suitable_words_<?php echo e(@$question->question_bank_id); ?>"><?php echo e(@$student_answer->user_answer); ?></textarea>
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('exam.suitable_words'); ?></label>
                                                
                                            </div>
                                        <?php endif; ?>
                                        <div class="mt-20">
                                            <?php if($question->questionBank->type == "M"): ?>
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
                                    <td width="5%" class="text-right">
                                        <span class="primary-btn fix-gr-bg"><?php echo e(@$question->questionBank !=""?@$question->questionBank->marks:""); ?></span>
                                          
                                    </td>
                                    <?php
                                    if ($student_answer->marked_by!=0) {
                                        if ($student_answer->answer_status==1) {
                                            $correct="checked";
                                            $incorrect="";
                                        } else {
                                            $correct="";
                                            $incorrect="checked";
                                        }
                                    } else {
                                        $correct="";
                                        $incorrect="checked";
                                    }
                                    
                                       
                                        
                                    ?>
                                    <td width="10%" class="text-right">
                                        <div class="mt-20 float-right">
                                            <input type="radio" id="marks_<?php echo e(@$question->questionBank!=""?@$question->questionBank->id:""); ?>_incorrect"  class="common-checkbox common-radio relationButton"
                                             name="marks[]<?php echo e(@$question->questionBank->id); ?>" <?php echo e(@$incorrect); ?> >
                                            <label for="marks_<?php echo e(@$question->questionBank!=""?@$question->questionBank->id:""); ?>_incorrect"></label>
                                        </div>
                                    </td>
                                    <td width="10%" class="text-right">
                                        <div class="mt-20">
                                            <input type="radio" id="marks_<?php echo e(@$question->questionBank !=""?@$question->questionBank->id:""); ?>" class="common-checkbox common-radio relationButton"
                                             name="marks[]<?php echo e(@$question->questionBank->id); ?>" value="<?php echo e(@$question->questionBank!=""?@$question->questionBank->id:""); ?>" <?php echo e(@$correct); ?>>
                                            <label for="marks_<?php echo e(@$question->questionBank!=""?@$question->questionBank->id:""); ?>"></label>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php if($online_take_exam_mark->status==2): ?>
                                    <tr>

                                        <td colspan="3" class="text-center">
                                            <div class="alert alert-warning" role="alert">
                                                <?php echo app('translator')->get('exam.exam_marks_already_submitted'); ?>
                                              </div>
                                            <a href="<?php echo e(url()->previous()); ?>" class="primary-btn fix-gr-bg">
                                                
                                                <?php echo app('translator')->get('exam.already_submitted'); ?>
                                            </a>
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    
                                    <tr>
                                        <td colspan="3" class="text-center">
                                            <button class="primary-btn fix-gr-bg">
                                                <span class="ti-check"></span>
                                                <?php echo app('translator')->get('exam.submit_marks'); ?>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                 <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
</section>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\examination\online_answer_marking.blade.php ENDPATH**/ ?>
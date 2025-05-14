
<div class="container-fluid">
    <style type="text/css">
        .school-table-style {
            border-collapse: collapse;
        }
        .school-table-style tr td {           
            border-top: 0 !important;   
            padding: 20px 10px 20px 10px;       
        }
        #headerTableModal tr td {           
            padding: 2px 10px 10px 15px
        }
        .school-table-style tr th {
            border-bottom:none;
            padding: 20px 10px 20px 10px;  
        }
        .school-table-style tr  {
            border-bottom: 1px solid rgba(130, 139, 178, 0.3);         
        }
    </style>

<table  id="headerTableModal" class="table-style shadow-none pt-0 " cellspacing="0" width="100%">
    <tbody>
    <?php if(moduleStatusCheck('University')): ?>
    <tr>
        <th class="d-flex justify-content-between align-items-center"><span><?php echo app('translator')->get('university::un.faculty_department'); ?></span><strong>:</strong></th>
        <td><?php echo e($lessonPlanDetail->unFaculty->name); ?>(<?php echo e($lessonPlanDetail->unDepartment->name); ?>)</td>
    </tr>
    <tr>
        <th class="d-flex justify-content-between align-items-center"><span><?php echo app('translator')->get('university::un.semester(label)'); ?></span><strong>:</strong></th>
        <td><?php echo e($lessonPlanDetail->unSemester->name); ?>(<?php echo e($lessonPlanDetail->unSemesterLabel->name); ?>)</td>
    </tr>
    <?php else: ?>
    <tr>
        <th class="d-flex justify-content-between align-items-center"><span><?php echo app('translator')->get('common.class'); ?></span><strong>:</strong></th>
        <td><?php echo e($lessonPlanDetail->class->class_name); ?>(<?php echo e($lessonPlanDetail->sectionName->section_name); ?>)</td>
    </tr>
    <?php endif; ?>
    <tr>
        
        <th class="d-flex justify-content-between align-items-center"><span><?php echo app('translator')->get('common.subject'); ?></span><strong>:</strong></th>
        <td>
            <?php if(moduleStatusCheck('University')): ?>
            <?php echo e($lessonPlanDetail->unSubject->subject_name); ?> (<?php echo e($lessonPlanDetail->unSubject->subject_code); ?>) -<?php echo e($lessonPlanDetail->unSubject->subject_type); ?>

            <?php else: ?>
            <?php echo e($lessonPlanDetail->subject->subject_name); ?> (<?php echo e($lessonPlanDetail->subject->subject_code); ?>) -<?php echo e($lessonPlanDetail->subject->subject_type == 'T'? 'Theory':'Practical'); ?>

            <?php endif; ?>
        </td>
    </tr>	
    <tr>
       
        <th class="d-flex justify-content-between align-items-center"><span><?php echo app('translator')->get('common.date'); ?></span><strong>:</strong></th>
        <td><?php echo e(date('d-M-y',strtotime($lessonPlanDetail->lesson_date))); ?> </td>
    </tr>
    <tr>
        
        <th class="d-flex justify-content-between align-items-center"><span><?php echo app('translator')->get('lesson::lesson.lesson'); ?></span><strong>:</strong></th>
    <td> <?php echo e($lessonPlanDetail->lessonName->lesson_title); ?></td>
    </tr>

    <tr>
     
        <th class="d-flex justify-content-between align-items-center">
            <span><?php echo app('translator')->get('common.topic'); ?></span>
            <strong>:</strong>
        </th>

        <td>
            <?php if(count($lessonPlanDetail->topics) > 0): ?> 
                <?php $__currentLoopData = $lessonPlanDetail->topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($topic->topicName->topic_title); ?>  <?php echo e(!$loop->last ? ',':''); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>  
            <?php echo e($lessonPlanDetail->topicName->topic_title); ?>

            <?php endif; ?>

        </td>
    </tr>
    <?php if(generalSetting()->sub_topic_enable): ?>
    <tr>
        
        <th class="d-flex justify-content-between align-items-center">
            <span><?php echo app('translator')->get('lesson::lesson.sub_topic'); ?></span>
            <strong>:</strong>
        </th>

        <td> 
            <?php if(count($lessonPlanDetail->topics) > 0): ?>
                <?php $__currentLoopData = $lessonPlanDetail->topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($topic->sub_topic_title); ?>

                <?php echo e(!$loop->last ? ',':''); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <?php echo e($lessonPlanDetail->sub_topic); ?>

            <?php endif; ?>
        </td>
    </tr>
    <?php endif; ?>
    <tr>
        
        <th class="d-flex justify-content-between align-items-center"><span><?php echo app('translator')->get('lesson::lesson.lecture_youtube_link'); ?></span><strong>:</strong></th>

    <td> 
         <?php if($lessonPlanDetail->lecture_youube_link !=''): ?>
        <?php $link = explode(',', $lessonPlanDetail->lecture_youube_link);
            $i=1;
        ?>
        <?php $__currentLoopData = $link; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a target="_blank" href="<?php echo e($item); ?>"><?php echo e($i++); ?>) <?php echo e($item); ?></a> <br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
         </td>
    </tr>
    <tr>
       
        <th class="d-flex justify-content-between align-items-center"><span><?php echo app('translator')->get('common.document'); ?></span><strong>:</strong></th>

        <td> 
            <?php if($lessonPlanDetail->attachment !=''): ?>
         
            <a href="<?php echo e(asset($lessonPlanDetail->attachment)); ?>" download="" >
                <i class="fa fa-download mr-1">
                    </i> <?php echo app('translator')->get('common.download'); ?>
                </a>

            <?php endif; ?>
        </td>
      

    </tr>
    <?php if($lessonPlanDetail->general_objectives): ?>
    <tr>
        
        <th class="d-flex justify-content-between align-items-center"><span><?php echo app('translator')->get('lesson::lesson.general_objectives'); ?></span><strong>:</strong></th>

        <td colspan="2"> <?php echo e($lessonPlanDetail->general_objectives); ?></td>
    </tr>
    <?php endif; ?>
    <?php if($lessonPlanDetail->teaching_method): ?>
    <tr>
        
        <th class="d-flex justify-content-between align-items-center"><span><?php echo app('translator')->get('lesson::lesson.teaching_method'); ?></span><strong>:</strong></th>

        <td colspan="2"> <?php echo e($lessonPlanDetail->teaching_method); ?></td>
    </tr>
    <?php endif; ?>
    <?php if($lessonPlanDetail->previous_knowlege): ?>
    <tr>
        
        <th class="d-flex justify-content-between align-items-center"><span><?php echo app('translator')->get('lesson::lesson.previous_knowledge'); ?></span><strong>:</strong></th>

        <td colspan="2"> <?php echo e($lessonPlanDetail->previous_knowlege); ?></td>
    </tr>
    <?php endif; ?>
    <?php if($lessonPlanDetail->comp_question): ?>
    <tr>
        
        <th class="d-flex justify-content-between align-items-center"><span><?php echo app('translator')->get('lesson::lesson.comprehensive_questions'); ?></span><strong>:</strong></th>

        <td colspan="2"> <?php echo e($lessonPlanDetail->comp_question); ?></td>
    </tr>
    <?php endif; ?>
    <tr>
        
         <th class="d-flex justify-content-between align-items-center"><span><?php echo app('translator')->get('common.note'); ?></span><strong>:</strong></th>
        <td colspan="2"> <?php echo e($lessonPlanDetail->note); ?></td>
    </tr>
	<tr>
     
     <th class="d-flex justify-content-between align-items-center"><span><?php echo app('translator')->get('common.status'); ?></span><strong>:</strong></th>
     <td colspan="2">
        <label class="switch_toggle">
                                    
                                    <?php if(Auth::user()->role_id==4 || Auth::user()->role_id==1 || Auth::user()->role_id==5): ?>
                                <input type="checkbox" data-complete_date="<?php echo e(Carbon::now()->format('Y-m-d')); ?>"  data-id="<?php echo e($lessonPlanDetail->id); ?>" <?php echo e(@$lessonPlanDetail->completed_status == 'completed'? 'checked':''); ?>

                                        class="weekend_switch_btn">
                                    <span class="slider round"></span>
                                   <?php else: ?>
                                   <input type="checkbox" disabled="" <?php echo e(@$lessonPlanDetail->completed_status == 'completed'? 'checked':''); ?>

                                        class="weekend_switch_btn">
                                    <span class="slider round"></span>
                                   <?php endif; ?>
                                </label> 
                               
     </td>   
    </tr>
    
</tbody>
</table>
 <script>
    $(document).ready(function() {
            $(".weekend_switch_btn").on("change", function() {
                var lessonplan_id = $(this).data("id");
               
               
                if ($(this).is(":checked")) {
                    var status = "completed";
                    var complete_date=$(this).data("complete_date");
                  
                } else {
                    var status = null;
                    var complete_date=null;
                     
                }
                
                var url = $("#url").val();
                

                $.ajax({
                    type: "POST",
                    data: {'status': status, 'lessonplan_id': lessonplan_id,'complete_date':complete_date},
                    dataType: "json",
                    url: url + "/" + "lesson/lessonPlan-status-ajax",
                    success: function(data) {
                          // location.reload();
                        setTimeout(function() {
                            toastr.success(
                                "Operation Success!",
                                "Success ", {
                                    iconClass: "customer-info",
                                }, {
                                    timeOut: 2000,
                                }
                            );
                        }, 500);
                       
                    },
                    error: function(data) {
                       
                        setTimeout(function() {
                            toastr.error("Operation Not Done!", "Error Alert", {
                                timeOut: 5000,
                            });
                        }, 500);
                    },
                });
            });
        });
</script>


<?php /**PATH C:\xampp\htdocs\Modules\Lesson\Resources\views\lessonPlan\view_lesson_plan.blade.php ENDPATH**/ ?>
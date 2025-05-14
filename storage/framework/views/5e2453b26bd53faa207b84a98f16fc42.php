<?php $__env->startSection('title'); ?> 
<?php echo app('translator')->get('lesson::lesson.lesson_plan_overview'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<link rel="stylesheet" href="<?php echo e(url('Modules/Lesson/Resources/assets/css/jquery-ui.css')); ?>">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $( function() {
      $( "#progressbar" ).progressbar({
        value: <?php if(isset($percentage)): ?> <?php echo e($percentage); ?> <?php endif; ?>
      });
    } );
</script>
<style type="text/css">
    #selectStaffsDiv, .forStudentWrapper {
        display: none;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 55px;
        height: 26px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 24px;
        width: 24px;
        left: 3px;
        bottom: 2px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background: var(--primary-color);
    }

    input:focus + .slider {
        box-shadow: 0 0 1px linear-gradient(90deg, var(--gradient_1) 0%, #c738d8 51%, var(--gradient_1) 100%);
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
    .buttons_div_one{
    /* border: 4px solid #FFFFFF; */
    border-radius:12px;

    padding-top: 0px;
    padding-right: 5px;
    padding-bottom: 0px;
    margin-bottom: 4px;
    padding-left: 0px;
     }
    .buttons_div{
    border: 4px solid #19A0FB;
    border-radius:12px
    }
</style>

<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1> <?php echo app('translator')->get('lesson::lesson.teacher_lesson_plan_overview'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lesson::lesson.lesson'); ?></a>
                <a href="#"><?php echo app('translator')->get('lesson::lesson.lesson_plan_overview'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
  
    </div>

            <div class="row">
                <div class="col-lg-12">
                
                    <div class="white-box">
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'search-teacher-lessonPlan-overview', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_lesson_Plan'])); ?>

                            <div class="row">
                                <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                <input type="hidden" name="teacher" value="<?php echo e($teachers); ?>">
                              
                                <?php if(moduleStatusCheck('University')): ?>
                                  
                                    <?php if ($__env->exists('university::common.session_faculty_depart_academic_semester_level',['div'=>'col-lg-4', 'required' => ['USN','UF', 'UD', 'UA', 'US', 'USL', 'USUB']])) echo $__env->make('university::common.session_faculty_depart_academic_semester_level',['div'=>'col-lg-4', 'required' => ['USN','UF', 'UD', 'UA', 'US', 'USL', 'USUB']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php else: ?>
                                <div class="col-lg-4 mt-30-md">
                                    <select class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>" id="select_class" name="class">
                                        <option data-display="<?php echo app('translator')->get('common.select_class'); ?>*" value=""><?php echo app('translator')->get('common.select_class'); ?> *</option>
                                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($class->id); ?>"  <?php echo e(isset($class_id)? ($class_id == $class->id? 'selected':''):''); ?>><?php echo e($class->class_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    
                                    <?php if($errors->has('class')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('class')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
    
                                <div class="col-lg-4 mt-30-md" id="select_section_div">
                                    <select class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?> select_section" id="select_section" name="section">
                                        <option data-display="<?php echo app('translator')->get('common.select_section'); ?> *" value=""><?php echo app('translator')->get('common.select_section'); ?> *</option>
                                    </select>
                                    <div class="pull-right loader" id="select_section_loader" style="margin-top: -30px;padding-right: 21px;">
                                        <img src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="" style="width: 28px;height:28px;">
                                    </div> 
                                    <?php if($errors->has('section')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('section')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
    
                                <div class="col-lg-4 mt-30-md" id="select_subject_div">
                                    <select class="primary_select form-control<?php echo e($errors->has('subject') ? ' is-invalid' : ''); ?> select_subject" id="select_subject" name="subject">
                                        <option data-display="Select subject *" value=""><?php echo app('translator')->get('common.select_subjects'); ?> *</option>
                                    </select>
                                    <div class="pull-right loader" id="select_subject_loader" style="margin-top: -30px;padding-right: 21px;">
                                        <img src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="" style="width: 28px;height:28px;">
                                    </div> 
                                    <?php if($errors->has('subject')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('subject')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
    
                                <?php endif; ?>
                                
                                <div class="col-lg-12 mt-20 text-right">
                                    <button type="submit" class="primary-btn small fix-gr-bg">
                                        <span class="ti-search pr-2"></span>
                                        <?php echo app('translator')->get('common.search'); ?>
                                    </button>
                                </div>
                            </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
            <?php if(isset($lessonPlanner)): ?>
            <div class="row mt-40">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-4 no-gutters">
                            <div class="main-title" style="padding-left: 15px;">
                                <h3 class="mb-0"><?php echo app('translator')->get('lesson::lesson.progress'); ?> 
                                
                            
                            </h3><br><?php if(isset($total)): ?>
                            <?php echo e($completed_total); ?>/<?php echo e($total); ?>

                            <?php endif; ?>
                            
                            <div id="progressbar" style="height: 10px;margin-bottom:0px"></div>
                           <div class="pull-right" style="margin-top: -30px;">
                            <?php if(isset($percentage)): ?> <?php echo e((int)($percentage)); ?>  % <?php endif; ?>
                           </div>
                            </div>
                        </div>
                    </div>
                <div class="col-lg-12">
                    <?php if (isset($component)) { $__componentOriginal163c8ba6efb795223894d5ffef5034f5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal163c8ba6efb795223894d5ffef5034f5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

                        <table id="table_id" class="table" cellspacing="0" width="100%"> 
                            <thead>
                              
                                <tr>
                                <th><?php echo app('translator')->get('lesson::lesson.lesson'); ?></th>
                                <th><?php echo app('translator')->get('lesson::lesson.topic'); ?></th>
                                <th><?php echo app('translator')->get('lesson::lesson.sup_topic'); ?></th>
                                <th><?php echo app('translator')->get('lesson::lesson.completed_date'); ?> </th>
                                <th><?php echo app('translator')->get('lesson::lesson.upcoming_date'); ?> </th>
                                <th><?php echo app('translator')->get('common.status'); ?></th>
                                <th><?php echo app('translator')->get('common.action'); ?></th>
                            </tr>
                        </thead>
    
                        <tbody>
                            <?php $__currentLoopData = $lessonPlanner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                           
                           
                            <tr>
                                <td><?php echo e(@$data->lessonName !=""?@$data->lessonName->lesson_title:""); ?></td>
    
                                <td> 
                                    <?php if(count($data->topics) > 0): ?> 
                                    <?php $__currentLoopData = $data->topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($topic->topicName->topic_title); ?> </br>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>  
                                    <?php echo e($data->topicName->topic_title); ?>

                                    <?php endif; ?>
    
                                </td>
    
                                <td>
                                    <?php if(count($data->topics) > 0): ?>
                                    <?php $__currentLoopData = $data->topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e($topic->sub_topic_title); ?> </br>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <?php echo e($data->sub_topic); ?>

                                <?php endif; ?> 
                                </td>
    
                                    <td>
                                        
                                        <?php echo e(@$data->competed_date !=""?@$data->competed_date:""); ?><br> 
                                       
                                
                                    </td>
                                    <td>
                                       
                                          
                                                <?php if(date('Y-m-d')< $data->lesson_date && $data->competed_date==""): ?>
                                                Upcoming     (<?php echo e($data->lesson_date); ?>)<br>                                          
                                               <?php elseif($data->competed_date==""): ?>
                                                Assigned Date(<?php echo e($data->lesson_date); ?>)  
                                               <br>
                                               <?php endif; ?>
                                           
                                     
                                        
                               
                                    </td>
                                <td>
                                   
                                   <?php if($data->competed_date==""): ?>  
                                      
                                           <?php if(date('Y-m-d')< $data->lesson_date): ?>
                                               
                                            
                                           <?php else: ?>
                                           Incomplete <br>
                                           <?php endif; ?>
                                       
                                  
                                    <?php else: ?> 
                                    Completed<br>
    
                                    <?php endif; ?>
                                    
                                </td>
                                
                                <td> 
                                   
                                
                                    <label class="switch_toggle">
                                    <input type="checkbox" data-id="<?php echo e($data->id); ?>"  <?php echo e(@$data->completed_status == 'completed'? 'checked':''); ?>

                                            class="weekend_switch_topic" ">
                                        <span class="slider round"></span>
                                    </label> <br>
     
                                   
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           
                        </tbody>
                    </table>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $attributes = $__attributesOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $component = $__componentOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__componentOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
</div>
</section>



<div class="modal fade admin-query" id="showReasonModal" >
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo app('translator')->get('lesson::lesson.complete_date'); ?>  </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
              
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'lessonPlan-complete-status',
                        'method' => 'POST',  'name' => 'myForm', 'onsubmit' => "return validateAddNewroutine()"])); ?>

                <div class="form-group">
                    <input type="hidden" name="lessonplan_id" id="lessonplan_id">                   
                    <input class="primary_input_field  primary_input_field date form-control form-control<?php echo e($errors->has('complete_date') ? ' is-invalid' : ''); ?>" id="complete_date" type="text"
                    name="complete_date" value="<?php echo e(date('m/d/Y')); ?>">
                </div>
                <div class="mt-40 d-flex justify-content-between">
                    <button type="button" class="primary-btn fix-gr-bg" data-dismiss="modal">Close</button>
                    <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('common.save'); ?> </button>
                    
                </div>
                <?php echo e(Form::close()); ?>

            </div>

        </div>
    </div>
</div>


<div class="modal fade admin-query" id="CancelModal" >
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo app('translator')->get('lesson::lesson.incomplete'); ?>  </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <h2> <?php echo e(__('lesson::lesson.Are You Sure')); ?></h2>
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'lessonPlan-complete-status',
                        'method' => 'POST',  'name' => 'myForm', 'onsubmit' => "return validateAddNewroutine()"])); ?>

                <div class="form-group">
                    <input type="hidden" name="lessonplan_id" id="calessonplan_id">
                    <input type="hidden" name="cancel" value="incomplete">                   
                  
                </div>
                <div class="mt-40 d-flex justify-content-between">
                    <button type="button" class="primary-btn fix-gr-bg" data-dismiss="modal">Close</button>
                    <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('lesson::lesson.yes'); ?> </button>
                    
                </div>
                <?php echo e(Form::close()); ?>

            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startPush('script'); ?>

<script>
    $(document).ready(function() {
            $(".weekend_switch_topic").on("change", function() {
                var id = $(this).data("id");              
                $('#lessonplan_id').val(id);
                $('#calessonplan_id').val(id);
  
                if ($(this).is(":checked")) {
                    var status = "1";                                       
                    var modal = $('#showReasonModal');                  
                    modal.modal('show');
                  
                } else {
                    var status = "0";                                                        
                    var modal = $('#CancelModal');                  
                    modal.modal('show');
                }
            });
        });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Modules\Lesson\Resources\views\teacher\teacher_lesson_plan_overview.blade.php ENDPATH**/ ?>
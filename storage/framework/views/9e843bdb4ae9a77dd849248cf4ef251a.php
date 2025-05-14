<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('exam.seat_plan_report'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('exam.seat_plan_report'); ?> </h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('exam.examinations'); ?></a>
                <a href="#"><?php echo app('translator')->get('exam.seat_plan_report'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="main-title">
                    <h3 class="mb-30"><?php echo app('translator')->get('common.select_criteria'); ?> </h3>
                </div>
            </div>
            <div class="offset-lg-4 col-lg-4 text-right col-md-6">
                <a href="<?php echo e(route('seat_plan_create')); ?>" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus pr-2"></span>
                    <?php echo app('translator')->get('exam.assign_students'); ?>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?php if(session()->has('message-success') != ""): ?>
                    <?php if(session()->has('message-success')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session()->get('message-success')); ?>

                    </div>
                    <?php endif; ?>
                <?php endif; ?>
                 <?php if(session()->has('message-danger') != ""): ?>
                    <?php if(session()->has('message-danger')): ?>
                    <div class="alert alert-danger">
                        <?php echo e(session()->get('message-danger')); ?>

                    </div>
                    <?php endif; ?>
                <?php endif; ?>
                <div class="white-box">
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'seat_plan_report_search_new', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            <div class="col-lg-2 mt-30-md">
                                <select class="primary_select form-control<?php echo e($errors->has('exam') ? ' is-invalid' : ''); ?>" name="exam">
                                    <option data-display="<?php echo app('translator')->get('exam.select_exam'); ?>" value=""><?php echo app('translator')->get('exam.select_exam'); ?></option>
                                    <?php $__currentLoopData = $exam_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($exam->id); ?>"><?php echo e($exam->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('exam')): ?>
                                <span class="text-danger invalid-select" role="alert">
                                    <?php echo e($errors->first('exam')); ?>

                                </span>
                                <?php endif; ?>
                            </div>
                            
                            <div class="col-lg-2 mt-30-md">
                                <select class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>" id="select_class" name="class">
                                    <option data-display="<?php echo app('translator')->get('common.select_class'); ?>" value=""><?php echo app('translator')->get('common.select_class'); ?></option>
                                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($class->id); ?>"  <?php echo e(( old('class') == $class->id ? "selected":"")); ?>><?php echo e($class->class_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('class')): ?>
                                <span class="text-danger invalid-select" role="alert">
                                    <?php echo e($errors->first('class')); ?>

                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-2 mt-30-md" id="select_section_div">
                                <select class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?> select_section" id="select_section" name="section">
                                    <option data-display="<?php echo app('translator')->get('common.select_section'); ?>" value=""><?php echo app('translator')->get('common.select_section'); ?></option>
                                </select>
                                <?php if($errors->has('section')): ?>
                                <span class="text-danger invalid-select" role="alert">
                                    <?php echo e($errors->first('section')); ?>

                                </span>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-2 mt-30-md" id="select_subject_div">
                                <select class="primary_select form-control<?php echo e($errors->has('subject') ? ' is-invalid' : ''); ?>" id="select_subject" name="subject">
                                    <option data-display="<?php echo app('translator')->get('common.select_subjects'); ?>" value=""><?php echo app('translator')->get('common.select_subjects'); ?></option>
                                </select>
                                <?php if($errors->has('subject')): ?>
                                <span class="text-danger invalid-select" role="alert">
                                    <?php echo e($errors->first('subject')); ?>

                                </span>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-4 mt-30-md">
                                <div class="no-gutters input-right-icon">
                                    <div class="col">
                                        <div class="primary_input">
                                            <input class="primary_input_field  primary_input_field date form-control" id="startDate" type="text" name="date" autocomplete="off">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('common.date'); ?></label>
                                            
                                        </div>
                                    </div>
                                    <button class="" type="button">
                                        <i class="ti-calendar" id="start-date-icon"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="col-lg-12 mt-20 text-right">
                                <button type="submit" class="primary-btn small fix-gr-bg">
                                    <span class="ti-search pr-2"></span>
                                    <?php echo app('translator')->get('common.date'); ?>
                                </button>
                            </div>
                        </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </div>
</section>
<?php if(isset($seat_plans)): ?>
<section class="mt-40">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-6">
                <div class="main-title">
                    <h3 class="mb-30"><?php echo app('translator')->get('exam.seat_plan_report'); ?></h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table class="table school-table-style" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="10%"><?php echo app('translator')->get('exam.exam'); ?></th>
                            <th width="10%"><?php echo app('translator')->get('common.date'); ?></th>
                            <th width="10%"><?php echo app('translator')->get('exam.start_end_time'); ?></th>
                            <th width="10%"><?php echo app('translator')->get('exam.student'); ?></th>
                            <th width="10%"><?php echo app('translator')->get('common.class_Sec'); ?></th>
                            <th width="10%"><?php echo app('translator')->get('dashboard.total_students'); ?></th>
                            <th width="15%"><?php echo app('translator')->get('student.roll_no'); ?></th>
                            <th width="10%"><?php echo app('translator')->get('student.category'); ?></th>
                            <th width="10%"><?php echo app('translator')->get('exam.assign_students'); ?></th>
                        </tr>
                    </thead>

                    <tbody>
                        
                        <?php $__currentLoopData = $seat_plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seat_plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <?php 
                                $seat_plan_childs = $seat_plan->seatPlanChild;
                            ?>
                            <?php $i = 0; ?>
                            <?php $__currentLoopData = $seat_plan_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seat_plan_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $i++; ?>
                            <tr>
                                <td>
                                    <?php 
                                    $exam = $seat_plan->exam; 
                                    if($i == 1){ 
                                        echo $exam->name; 
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                    $exam = $seat_plan->exam; 
                                    if($i == 1){ 

                                    
                                    echo dateConvert($seat_plan->date);
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                    $subject = $seat_plan->subject; 
                                    if($i == 1){ 
                                        echo date('h:i a', strtotime($seat_plan_child->start_time)).'-'.date('h:i a', strtotime($seat_plan_child->end_time)); 
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                    $subject = $seat_plan->subject; 
                                    if($i == 1){ 
                                        echo $subject->subject_name; 
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                    $class = $seat_plan->class; 
                                    $section = $seat_plan->section; 
                                    if($i == 1){ 
                                        echo $class->class_name.' ('.$section->section_name.')'; 
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                    if($i == 1){ 
                                        echo App\SmSeatPlan::total_student($seat_plan->class_id, $seat_plan->section_id);
                                    }
                                    ?>
                                </td>
                                <td><?php $class_room = $seat_plan_child->class_room; echo $class_room->room_no; ?></td>
                                <td><?php echo e($class_room->capacity); ?></td>
                                <td><?php echo e($seat_plan_child->assign_students); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>           

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\examination\seat_plan.blade.php ENDPATH**/ ?>
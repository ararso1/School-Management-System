<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('exam.assign_students'); ?> 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('exam.examinations'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('exam.examinations'); ?></a>
                <a href="<?php echo e(route('seat_plan')); ?>"><?php echo app('translator')->get('exam.seat_plan'); ?></a>
                <a href="<?php echo e(route('seat_plan_create')); ?>"><?php echo app('translator')->get('exam.assign_students'); ?> </a>
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
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'seat_plan_create_search', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

                        <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            <div class="col-lg-2 mt-30-md">
                                <select class="primary_select form-control<?php echo e($errors->has('exam') ? ' is-invalid' : ''); ?>" name="exam">
                                    <option data-display="Select Exam *" value=""><?php echo app('translator')->get('exam.select_exam'); ?> *</option>
                                    <?php $__currentLoopData = $exam_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($exam->id); ?>" <?php echo e(isset($exam_id)? ($exam_id == $exam->id? 'selected':''):''); ?>><?php echo e($exam->title); ?></option>
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
                                    <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value=""><?php echo app('translator')->get('common.select_class'); ?> *</option>
                                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($class->id); ?>" <?php echo e(isset($class_id)? ($class_id == $class->id? 'selected':''):''); ?>><?php echo e($class->class_name); ?></option>
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
                                    <option data-display="<?php echo app('translator')->get('common.select_section'); ?> *" value=""><?php echo app('translator')->get('common.select_section'); ?> *</option>
                                    <?php if(isset($section_id)): ?>
                                        <option value="" selected><?php $section = App\SmSection::select('section_name')->where('id', $section_id)->first();
                                echo $section->section_name; ?></option>
                                    <?php endif; ?>
                                </select>
                                <?php if($errors->has('section')): ?>
                                <span class="text-danger invalid-select" role="alert">
                                    <?php echo e($errors->first('section')); ?>

                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-2 mt-30-md" id="select_subject_div">
                                <select class="primary_select form-control<?php echo e($errors->has('subject') ? ' is-invalid' : ''); ?>" id="select_subject" name="subject">
                                    <option data-display="Select Subject *" value=""><?php echo app('translator')->get('common.select_subjects'); ?> *</option>
                                    <?php if(isset($subject_id)): ?>
                                        <option value="" selected><?php $subject = App\SmSubject::select('subject_name')->where('id', $subject_id)->first(); echo $subject->subject_name; ?></option>
                                    <?php endif; ?>
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
                                            <input class="primary_input_field  primary_input_field date form-control" id="startDate" type="text" name="date" value="<?php echo e(isset($date)? date('m/d/Y', strtotime($date)):date('m/d/Y')); ?>" readonly="true">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('common.date'); ?></label>
                                            
                                        </div>
                                    </div>
                                    <button class="" type="button">
                                        <i class="ti-calendar" id="start-date-icon"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            
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
    </div>
</section>

<?php if(isset($students)): ?>
<section class="mt-40">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-6">
                <div class="main-title">
                    <h3 class="mb-30"><?php echo app('translator')->get('exam.assign_exam_room'); ?></h3>
                </div>
            </div>
            <div class="col-lg-6 text-right">
                <button class="primary-btn icon-only fix-gr-bg">
                    <span class="ti-plus" id="addNewRoom"></span>
                </button>
            </div>
        </div>
        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'seat_plan_store_create', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'seat_plan_store'])); ?>

        <input type="hidden" name="exam_id" value="<?php echo e($exam_id); ?>">
        <input type="hidden" name="subject_id" value="<?php echo e($subject_id); ?>">
        <input type="hidden" name="class_id" value="<?php echo e($class_id); ?>">
        <input type="hidden" name="section_id" value="<?php echo e($section_id); ?>">
        <input type="hidden" name="exam_date" value="<?php echo e($date); ?>" id="exam_date">
        <div class="row">
            <div class="col-lg-12">
                <table class="table school-table-style" cellspacing="0" width="100%" id="assign_exam_room">
                    <thead>
                        <tr>
                            <th width="10%"><?php echo app('translator')->get('dashboard.total_students'); ?></th>
                            <th width="15%"><?php echo app('translator')->get('academics.start_time'); ?></th>
                            <th width="15%"><?php echo app('translator')->get('academics.end_time'); ?></th>
                            <th width="15%"><?php echo app('translator')->get('academics.room_no'); ?></th>
                            <th width="10%"><?php echo app('translator')->get('academics.capacity'); ?></th>
                            <th width="10%"><?php echo app('translator')->get('exam.assign_students_no'); ?>.</th>
                            <th width="10%" class="text-right"><?php echo app('translator')->get('common.action'); ?></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if(count($seat_plan_assign_childs) == 0): ?>
                        <tr id="1">
                            
                            <td><?php echo e($students->count()); ?> <input type="hidden" name="total_student" id="total_student" value="<?php echo e($students->count()); ?>"></td>

                            <td>
                                <div class="row no-gutters input-right-icon mt-25">
                                    <div class="col">
                                        <div class="primary_input">
                                            <input class="primary_input_field primary_input_field time form-control<?php echo e($errors->has('start_time') ? ' is-invalid' : ''); ?>" type="text" name="start_time" id="start_time" value="<?php echo e(date('h:i a')); ?>">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('exam.start_time'); ?></label>
                                            
                                            <?php if($errors->has('start_time')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('start_time')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button class="" type="button">
                                            <i class="ti-timer"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="row no-gutters input-right-icon mt-25">
                                        <div class="col">
                                            <div class="primary_input">
                                                <input class="primary_input_field primary_input_field time  form-control<?php echo e($errors->has('end_time') ? ' is-invalid' : ''); ?>" type="text" name="end_time" id="end_time"  value="<?php echo e(date('h:i a')); ?>">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('exam.end_time'); ?></label>
                                                
                                                <?php if($errors->has('end_time')): ?>
                                                <span class="text-danger" >
                                                    <?php echo e($errors->first('end_time')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button class="" type="button">
                                                <i class="ti-timer"></i>
                                            </button>
                                        </div>
                                    </div>
                            </td>

                            <td>
                               <div class="row">
                                    <div class="col">
                                        <div class="primary_input">
                                            <select class="primary_select class_room room_select" name="room[]" id="room_1">
                                                <option data-display="Select *" value=""><?php echo app('translator')->get('common.select'); ?> *</option>
                                                <?php $__currentLoopData = $class_rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class_room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(!in_array($class_room->id, $fill_uped)): ?>
                                                        <option value="<?php echo e($class_room->id); ?>"><?php echo e($class_room->room_no); ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <span id="room_error-1" class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col">
                                        <div class="primary_input">
                                            <input class="primary_input_field capacity" placeholder="Room Capacity" type="text" name="capacity[]" id="capacity-1" readonly>
                                            <input type="hidden" name="already_assigned" id="already_assigned-<?php echo e(1); ?>">
                                            <input type="hidden" name="room_capacity" id="room_capacity-<?php echo e(1); ?>">
                                            
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col">
                                        <div class="primary_input">
                                            <input class="primary_input_field assign_student assign_student_input" type="text" name="assign_student[]" id="assign_student-1">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('exam.enter_student_no'); ?><span></span> </label>
                                            
                                            <span id="assign_student_error-1" class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-right">
                                <button class="primary-btn icon-only fix-gr-bg" type="button">
                                    <span class="ti-trash text-white"></span>
                                </button>
                            </td>
                        </tr>
                        <?php else: ?>
                        <?php $i = 0; ?>
                            <?php $__currentLoopData = $seat_plan_assign_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seat_plan_assign_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $i++; ?>
                                <tr id="<?php echo e($i); ?>">
                                    
                                    <td><?php echo e($i == 1? $students->count(): ''); ?> <input type="hidden" name="total_student" id="total_student" value="<?php echo e($students->count()); ?>"></td>
                                    <td>
                                        <?php if($i == 1): ?>
                                        <div class="row no-gutters input-right-icon mt-25">
                                            <div class="col">
                                                <div class="primary_input">
                                                    <input class="primary_input_field primary_input_field time form-control<?php echo e($errors->has('start_time') ? ' is-invalid' : ''); ?>" type="text" name="start_time" id="start_time" value="<?php echo e(date('h:i a', strtotime($seat_plan_assign_child->start_time))); ?>">
                                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('exam.start_time'); ?></label>
                                                    
                                                    <?php if($errors->has('start_time')): ?>
                                                    <span class="text-danger" >
                                                        <?php echo e($errors->first('start_time')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <button class="" type="button">
                                                    <i class="ti-timer"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($i == 1): ?>
                                        <div class="row no-gutters input-right-icon mt-25">
                                            <div class="col">
                                                <div class="primary_input">
                                                    <input class="primary_input_field primary_input_field time  form-control<?php echo e($errors->has('end_time') ? ' is-invalid' : ''); ?>" type="text" name="end_time" id="end_time"  value="<?php echo e(date('h:i a', strtotime($seat_plan_assign_child->end_time))); ?>">
                                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('exam.end_time'); ?></label>
                                                    
                                                    <?php if($errors->has('end_time')): ?>
                                                    <span class="text-danger" >
                                                        <?php echo e($errors->first('end_time')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <button class="" type="button">
                                                    <i class="ti-timer"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                       <div class="row">
                                            <div class="col">
                                                <div class="primary_input">
                                                    <select class="primary_select class_room room_select" name="room[]" id="room_<?php echo e($i); ?>">
                                                        <option data-display="Select *" value=""><?php echo app('translator')->get('common.select'); ?> *</option>
                                                        <?php $__currentLoopData = $class_rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class_room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if(!in_array($class_room->id, $fill_uped) || $seat_plan_assign_child->room_id == $class_room->id): ?>
                                                                <option value="<?php echo e($class_room->id); ?>" <?php echo e($seat_plan_assign_child->room_id == $class_room->id? 'selected': ''); ?>><?php echo e($class_room->room_no); ?></option>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                    <span id="room_error-<?php echo e($i); ?>" class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <?php
                                        $used_room = App\SmSeatPlanChild::usedRoomCapacity($seat_plan_assign_child->room_id);
                                        $class_room = $seat_plan_assign_child->class_room;
                                        $alreday_assigned = $class_room->capacity - $used_room;
                                    ?>
                                    <td>
                                        <div class="row">
                                            <div class="col">
                                                <div class="primary_input">
                                                    <input class="primary_input_field capacity" type="text" name="capacity[]" id="capacity-<?php echo e($i); ?>" value="Assigned <?php echo e($used_room.' of '.$class_room->capacity); ?>" readonly>
                                                    <input type="hidden" name="already_assigned" id="already_assigned-<?php echo e($i); ?>" value="<?php echo e($used_room); ?>">
                                                    <input type="hidden" name="room_capacity" id="room_capacity-<?php echo e($i); ?>" value="<?php echo e($class_room->capacity); ?>">

                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col">
                                                <div class="primary_input">
                                                    <input class="primary_input_field assign_student assign_student_input" type="text" placeholder="Enter Student No" name="assign_student[]" id="assign_student-<?php echo e($i); ?>" value="<?php echo e($seat_plan_assign_child->assign_students); ?>">
                                                    
                                                    <span id="assign_student_error-<?php echo e($i); ?>" class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        <button class="primary-btn icon-only fix-gr-bg" type="button">
                                        <span class="ti-trash text-white" 
                                        <?php if($i != 1): ?>
                                        onclick="deleteExamRow(<?php echo e($i); ?>)"
                                        <?php endif; ?>

                                        "></span>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                        <tr>
                            <td colspan="7">
                                <div class="col-lg-12 mt-20 text-right">
                                    <button type="submit" class="primary-btn fix-gr-bg submit">
                                        <span class="ti-check"></span>
                                        <?php echo app('translator')->get('common.save'); ?>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <?php echo e(Form::close()); ?>

    </div>
</section>
<?php endif; ?>
            

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\examination\seat_plan_create.blade.php ENDPATH**/ ?>
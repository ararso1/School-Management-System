<?php $__env->startSection('title'); ?> 
<?php echo app('translator')->get('academics.class_routine'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('academics.class_routine'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('academics.academics'); ?></a>
                <a href="#"><?php echo app('translator')->get('academics.class_routine'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    <div class="main-title">
                        <h3 class="mb-30"><?php echo app('translator')->get('common.select_criteria'); ?> </h3>
                    </div>
                </div>
                <div class="col-lg-4 text-md-right text-left col-md-6 mb-30-lg">
                    <a href="<?php echo e(route('class_routine_create')); ?>" class="primary-btn small fix-gr-bg">
                        <span class="ti-plus pr-2"></span>
                        <?php echo app('translator')->get('common.add_class_routine'); ?>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                 
                    <div class="white-box">
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'class-routine-report-search', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

                            <div class="row">
                                <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                <div class="col-lg-6 mt-30-md">
                                    <select class="primary_select form-control <?php echo e(@$errors->has('class') ? ' is-invalid' : ''); ?>" id="select_class" name="class">
                                        <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value=""><?php echo app('translator')->get('common.select_class'); ?> *</option>
                                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e(@$class->id); ?>"  <?php echo e(isset($class_id)? ($class_id == $class->id?'selected':''):''); ?>><?php echo e(@$class->class_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('class')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <strong><?php echo e(@$errors->first('class')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-6 mt-30-md" id="select_section_div">
                                    <select class="primary_select form-control<?php echo e(@$errors->has('section') ? ' is-invalid' : ''); ?>" id="select_section" name="section">
                                        <option data-display="<?php echo app('translator')->get('common.select_section'); ?> *" value=""><?php echo app('translator')->get('common.select_section'); ?> *</option>
                                    </select>
                                    <?php if($errors->has('section')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <strong><?php echo e(@$errors->first('section')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
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

<?php if(isset($class_routines)): ?>
<section class="mt-20">
    <div class="container-fluid p-0">
        <div class="row mt-40">
            <div class="col-lg-6 col-md-6">
                <div class="main-title">
                    <h3 class="mb-0"><?php echo app('translator')->get('academics.class_routine'); ?></h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <table id="table_id" class="table" cellspacing="0" width="100%">
                    <thead>

                        <tr>
                            <th><?php echo app('translator')->get('common.subject'); ?></th>
                            <th><?php echo app('translator')->get('common.teacher'); ?></th>
                            <th><?php echo app('translator')->get('common.monday'); ?></th>
                            <th><?php echo app('translator')->get('common.tuesday'); ?></th>
                            <th><?php echo app('translator')->get('common.wednesday'); ?></th>
                            <th><?php echo app('translator')->get('common.thursday'); ?></th>
                            <th><?php echo app('translator')->get('common.friday'); ?></th>
                            <th><?php echo app('translator')->get('common.Saturday'); ?></th>
                            <th><?php echo app('translator')->get('common.sunday'); ?></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $__currentLoopData = $class_routines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class_routine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php
                            $teacher_id = App\SmClassRoutine::teacherId(@$class_routine->class_id, @$class_routine->section_id, @$class_routine->subject_id);

                            if($teacher_id != ""){
                                @$teacher = @$teacher_id->teacher->full_name;
                            }else{
                                $teacher = "";
                            }
                        ?>



                        <tr>
                            <td><?php echo e(@$class_routine->subject !=""? @$class_routine->subject->subject_name:""); ?></td>
                            <td><?php echo e(@$teacher); ?></td>
                            <td><?php if(@$class_routine->monday_start_from != ""): ?>
                                <span class=""><?php echo e(@$class_routine->monday_start_from .'-'. @$class_routine->monday_end_to); ?><br> <?php echo app('translator')->get('lang.room_number'); ?>: <?php echo e(@$class_routine->monday_room_id); ?></span>
                                <?php else: ?>
                                    <?php echo e("<?php echo app('translator')->get('lang.not_scheduled'); ?>"); ?>

                                <?php endif; ?>
                            </td>
                            <td><?php if(@$class_routine->tuesday_start_from != ""): ?>
                                <span class=""><?php echo e(@$class_routine->tuesday_start_from .'-'. @$class_routine->tuesday_end_to); ?><br> <?php echo app('translator')->get('lang.room_number'); ?>: <?php echo e(@$class_routine->tuesday_room_id); ?></span>
                                <?php else: ?>
                                    <?php echo e("<?php echo app('translator')->get('lang.not_scheduled'); ?>"); ?>

                                <?php endif; ?>
                            </td>
                            <td><?php if(@$class_routine->wednesday_start_from != ""): ?>
                                <span class=""><?php echo e(@$class_routine->wednesday_start_from .'-'. @$class_routine->wednesday_end_to); ?><br> <?php echo app('translator')->get('lang.room_number'); ?>: <?php echo e(@$class_routine->wednesday_room_id); ?></span>
                                <?php else: ?>
                                    <?php echo e("<?php echo app('translator')->get('lang.not_scheduled'); ?>"); ?>

                                <?php endif; ?>
                            </td>
                            <td><?php if(@$class_routine->thursday_start_from != ""): ?>
                                <span class=""><?php echo e(@$class_routine->thursday_start_from .'-'. @$class_routine->thursday_end_to); ?><br> <?php echo app('translator')->get('lang.room_number'); ?>: <?php echo e(@$class_routine->thursday_room_id); ?></span>
                                <?php else: ?>
                                    <?php echo e("<?php echo app('translator')->get('lang.not_scheduled'); ?>"); ?>

                                <?php endif; ?>
                            </td>
                            <td><?php if(@$class_routine->friday_start_from != ""): ?>
                                <span class=""><?php echo e(@$class_routine->friday_start_from .'-'. @$class_routine->friday_end_to); ?><br> <?php echo app('translator')->get('lang.room_number'); ?>: <?php echo e(@$class_routine->friday_room_id); ?></span>
                                <?php else: ?>
                                    <?php echo e("<?php echo app('translator')->get('lang.not_scheduled'); ?>"); ?>

                                <?php endif; ?>
                            </td>
                            <td><?php if(@$class_routine->saturday_start_from != ""): ?>
                                <span class=""><?php echo e(@$class_routine->saturday_start_from .'-'. @$class_routine->saturday_end_to); ?><br> <?php echo app('translator')->get('lang.room_number'); ?>: <?php echo e(@$class_routine->saturday_room_id); ?></span>
                                <?php else: ?>
                                    <?php echo e("<?php echo app('translator')->get('lang.not_scheduled'); ?>"); ?>

                                <?php endif; ?>
                            </td>
                            <td><?php if(@$class_routine->sunday_start_from != ""): ?>
                                <span class="text-success"><?php echo e(@$class_routine->sunday_start_from .'-'. @$class_routine->sunday_end_to); ?><br> <?php echo app('translator')->get('lang.room_number'); ?>: <?php echo e(@$class_routine->sunday_room_id); ?></span>
                                <?php else: ?>
                                    <?php echo e("<?php echo app('translator')->get('lang.not_scheduled'); ?>"); ?>

                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\academics\class_routine.blade.php ENDPATH**/ ?>
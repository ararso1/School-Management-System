<?php $__env->startSection('title'); ?> 
<?php echo app('translator')->get('exam.exam_time'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('exam.exam_time'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('exam.examination'); ?></a>
                <a href="#"><?php echo app('translator')->get('exam.exam_time'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
        <?php if(isset($class_time)): ?>
         <?php if(userPermission(572)): ?>
        <div class="row">
            <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                <a href="<?php echo e(route('exam-time')); ?>" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus pr-2"></span>
                    <?php echo app('translator')->get('common.add'); ?>
                </a>
            </div>
        </div>
        <?php endif; ?>
        <?php endif; ?>
        <div class="row">
             <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-title">
                            <h3 class="mb-30">
                                <?php if(isset($class_time)): ?>
                                    <?php echo app('translator')->get('common.edit'); ?>
                                 <?php else: ?>
                                    <?php echo app('translator')->get('common.add'); ?>
                                <?php endif; ?>
                                    <?php echo app('translator')->get('exam.exam_time'); ?>
                            </h3>
                        </div>
                        <?php if(isset($class_time)): ?>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => array('examTimeUpdate',$class_time->id), 'method' => 'PUT'])); ?>

                        <?php else: ?>
                         <?php if(userPermission(572)): ?>
           
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'examtimeSave', 'method' => 'POST'])); ?>

                        <?php endif; ?>
                        <?php endif; ?>
                        <div class="white-box">
                            <div class="add-visitor">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <input class="primary_input_field form-control<?php echo e(@$errors->has('period') ? ' is-invalid' : ''); ?>" type="text" name="period" autocomplete="off" value="<?php echo e(isset($class_time)? $class_time->period: ''); ?>">
                                            <input type="hidden" name="id" value="<?php echo e(isset($class_time)? $class_time->id: ''); ?>">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('exam.exam_period'); ?> <span class="text-danger"> *</span></label>
                                            
                                            <?php if($errors->has('period')): ?>
                                                <span class="text-danger" >
                                                    <strong><?php echo e(@$errors->first('period')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row no-gutters input-right-icon mt-25">
                                    <div class="col">
                                        <div class="primary_input">
                                            <input class="primary_input_field primary_input_field time form-control<?php echo e(@$errors->has('start_time') ? ' is-invalid' : ''); ?>" type="text" name="start_time" value="<?php echo e(isset($class_time)? $class_time->start_time: old('start_time')); ?>">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('exam.select_time'); ?> <span class="text-danger"> *</span></label>
                                            
                                            <?php if($errors->has('start_time')): ?>
                                                <span class="text-danger" >
                                                    <strong><?php echo e(@$errors->first('start_time')); ?>

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
                                <div class="row no-gutters input-right-icon mt-25">
                                        <div class="col">
                                            <div class="primary_input">
                                                <input class="primary_input_field primary_input_field time  form-control<?php echo e(@$errors->has('end_time') ? ' is-invalid' : ''); ?>" type="text" name="end_time"  value="<?php echo e(isset($class_time)? $class_time->end_time: old('end_time')); ?>">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('exam.end_time'); ?> <span class="text-danger"> *</span></label>
                                                
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
	                           <?php 
                                  $tooltip = "";
                                  if(userPermission(572)){
                                        $tooltip = "";
                                    }else{
                                        $tooltip = "You have no permission to add";
                                    }
                                ?>
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn fix-gr-bg submit" data-toggle="tooltip" title="<?php echo e(@$tooltip); ?>">
                                            <span class="ti-check"></span>
                                            <?php if(isset($class_time)): ?>
                                                <?php echo app('translator')->get('common.update'); ?>
                                            <?php else: ?>
                                                <?php echo app('translator')->get('common.save'); ?>
                                            <?php endif; ?>
                                            <?php echo app('translator')->get('common.time'); ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-4 no-gutters">
                        <div class="main-title">
                            <h3 class="mb-0"><?php echo app('translator')->get('exam.exam_time_list'); ?> </h3>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        
                        <table id="table_id" class="table" cellspacing="0" width="100%">

                            <thead>
                               <?php if(session()->has('message-success-delete') != "" ||
                                session()->get('message-danger-delete') != ""): ?>
                                <tr>
                                    <td colspan="3">
                                         <?php if(session()->has('message-success-delete')): ?>
                                          <div class="alert alert-success">
                                              <?php echo e(session()->get('message-success-delete')); ?>

                                          </div>
                                        <?php elseif(session()->has('message-danger-delete')): ?>
                                          <div class="alert alert-danger">
                                              <?php echo e(session()->get('message-danger-delete')); ?>

                                          </div>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                 <?php endif; ?>
                                <tr>
                                    <th><?php echo app('translator')->get('exam.time_type'); ?></th>
                                    <th><?php echo app('translator')->get('exam.exam_period'); ?></th>
                                    <th><?php echo app('translator')->get('exam.start_time'); ?></th>
                                    <th><?php echo app('translator')->get('exam.end_time'); ?></th>
                                    <th><?php echo app('translator')->get('common.action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $class_times; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class_time): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td valign="top">
                                        <?php if(@$class_time->type == 'exam'): ?>
                                            <?php echo app('translator')->get('exam.exam_time'); ?>
                                        <?php else: ?>
                                            <?php echo app('translator')->get('exam.class_time'); ?>
                                        <?php endif; ?>
                                    </td>
                                    <td valign="top"><?php echo e(@$class_time->period); ?></td>
                                    <td valign="top"><?php echo e(date('h:i A', strtotime(@$class_time->start_time))); ?></td>
                                    <td valign="top"><?php echo e(date('h:i A', strtotime(@$class_time->end_time))); ?></td>
                                    
                                    <td valign="top">
                                        <?php if (isset($component)) { $__componentOriginalf5ee9bc45d6af00850b10ff7521278be = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf5ee9bc45d6af00850b10ff7521278be = $attributes; } ?>
<?php $component = App\View\Components\DropDown::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('drop-down'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\DropDown::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf5ee9bc45d6af00850b10ff7521278be)): ?>
<?php $attributes = $__attributesOriginalf5ee9bc45d6af00850b10ff7521278be; ?>
<?php unset($__attributesOriginalf5ee9bc45d6af00850b10ff7521278be); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf5ee9bc45d6af00850b10ff7521278be)): ?>
<?php $component = $__componentOriginalf5ee9bc45d6af00850b10ff7521278be; ?>
<?php unset($__componentOriginalf5ee9bc45d6af00850b10ff7521278be); ?>
<?php endif; ?>
                                                <?php if(userPermission(573)): ?>
                                                <a class="dropdown-item" href="<?php echo e(route('examTimeEdit',$class_time->id)); ?>"><?php echo app('translator')->get('common.edit'); ?></a>
                                                <?php endif; ?>
                                                 <?php if(userPermission(574)): ?>
                                                <a class="dropdown-item" data-toggle="modal" data-target="#deleteClassTime<?php echo e(@$class_time->id); ?>"  href="#"><?php echo app('translator')->get('common.delete'); ?></a>
                                           <?php endif; ?>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal fade admin-query" id="deleteClassTime<?php echo e(@$class_time->id); ?>" >
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title"><?php echo app('translator')->get('common.delete_exam_time'); ?></h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="text-center">
                                                    <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                                                </div>

                                                <div class="mt-40 d-flex justify-content-between">
                                                    <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                                                    <?php echo e(Form::open(['route' => array('class-time-delete',@$class_time->id), 'method' => 'DELETE', 'enctype' => 'multipart/form-data'])); ?>

                                                    <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('common.delete'); ?></button>
                                                     <?php echo e(Form::close()); ?>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\academics\exam_time.blade.php ENDPATH**/ ?>
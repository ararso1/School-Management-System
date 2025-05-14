<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('leave.pending_leave_request'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>

<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('leave.pending_leave_request'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('common.student'); ?></a>
                <a href="#"><?php echo app('translator')->get('leave.pending_leave_request'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="white-box">
                    <div class="row">
                        <div class="col-lg-4 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-15"><?php echo app('translator')->get('leave.pending_leave_request_list'); ?></h3>
                            </div>
                        </div>
                    </div>
        
                    <div class="row">
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
                                        <th><?php echo app('translator')->get('common.name'); ?></th>
                                        <th><?php echo app('translator')->get('common.type'); ?></th>
                                        <th><?php echo app('translator')->get('common.from'); ?></th>
                                        <th><?php echo app('translator')->get('common.to'); ?></th>
                                        <th><?php echo app('translator')->get('leave.apply_date'); ?></th>
                                        <th><?php echo app('translator')->get('common.status'); ?></th>
                                    </tr>
                                </thead>
        
                                <tbody>
                                    <?php $__currentLoopData = $apply_leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $apply_leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(isset($apply_leave->student)? $apply_leave->student->full_name:''); ?></td>
                                        <td>
                                            <?php if($apply_leave->leaveDefine !="" && $apply_leave->leaveDefine->leaveType !=""): ?>
                                            <?php echo e($apply_leave->leaveDefine->leaveType->type); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td  data-sort="<?php echo e(strtotime($apply_leave->leave_from)); ?>" >
                                            <?php echo e($apply_leave->leave_from != ""? dateConvert($apply_leave->leave_from):''); ?>

        
                                        </td>
                                        <td  data-sort="<?php echo e(strtotime($apply_leave->leave_to)); ?>" >
                                           <?php echo e($apply_leave->leave_to != ""? dateConvert($apply_leave->leave_to):''); ?>

        
                                        </td>
                                        <td  data-sort="<?php echo e(strtotime($apply_leave->apply_date)); ?>" >
                                           <?php echo e($apply_leave->apply_date != ""? dateConvert($apply_leave->apply_date):''); ?>

        
                                        </td>
                                        <td>
        
                                            <?php if($apply_leave->approve_status == 'P'): ?>
                                            <button class="primary-btn small bg-warning text-white border-0 tr-bg"><?php echo app('translator')->get('common.pending'); ?></button><?php endif; ?>
        
                                            <?php if($apply_leave->approve_status == 'A'): ?>
                                            <button class="primary-btn small bg-success text-white border-0 tr-bg"><?php echo app('translator')->get('common.approved'); ?></button>
                                            <?php endif; ?>
        
                                            <?php if($apply_leave->approve_status == 'C'): ?>
                                            <button class="primary-btn small bg-danger text-white border-0"><?php echo app('translator')->get('leave.cancelled'); ?></button>
                                            <?php endif; ?>
        
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php $__env->stopSection(); ?>
    <?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\student_leave\pending_leave.blade.php ENDPATH**/ ?>
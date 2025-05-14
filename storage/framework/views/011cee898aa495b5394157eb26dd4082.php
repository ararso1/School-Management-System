<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('leave.apply_leave'); ?>
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('leave.apply_leave'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('hr.human_resource'); ?></a>
                <a href="#"><?php echo app('translator')->get('leave.apply_leave'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_admin_visitor">
<div class="container-fluid p-0">
<div class="row">

    <div class="col-lg-9">
        <div class="row">
            <div class="col-lg-4 no-gutters">
                <div class="main-title">
                    <h3 class="mb-0"><?php echo app('translator')->get('leave.leave_list'); ?></h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">

                <table id="table_id" class="table" cellspacing="0" width="100%">

                    <thead>
                        
                        <tr>
                            <th><?php echo app('translator')->get('common.type'); ?></th>
                            <th><?php echo app('translator')->get('leave.days'); ?></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $__currentLoopData = $my_leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $my_leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($my_leave->leaveType !=""?$my_leave->leaveType->type:""); ?></td>
                            <td><?php echo e($my_leave->days); ?></td>
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
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\humanResource\my_leaves.blade.php ENDPATH**/ ?>
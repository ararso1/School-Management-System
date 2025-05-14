    <?php $__env->startSection('title'); ?> 
        <?php echo app('translator')->get('leave.child_leave'); ?>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<?php $__env->startPush('css'); ?>
<style>
    table.dataTable tbody th, table.dataTable tbody td {
        padding-left: 20px !important;
    }

    table.dataTable thead th {
        padding-left: 34px !important;
    }

    table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting:after,table.dataTable thead .sorting_desc:after {
        left: 16px;
        top: 10px;
    }
</style>
<?php $__env->stopPush(); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('leave.leave'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('parent-dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('leave.child_leave'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor pl_22">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-4 no-gutters">
                        <div class="main-title">
                            <h3 class="mb-0"><?php echo app('translator')->get('leave.leave_list'); ?> </h3>
                        </div>
                    </div>
                </div>
                <div class="row mt-20">
                    <div class="col-lg-12">
                        <table id="table_id" class="table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
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
                                        <td>
                                            <?php if($apply_leave->leaveDefine != "" && $apply_leave->leaveDefine->leaveType !=""): ?>
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
                                                <button class="primary-btn small bg-danger  text-white border-0 tr-bg"><?php echo app('translator')->get('leave.cancelled'); ?></button>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <div class="modal fade admin-query" id="deleteApplyLeaveModal<?php echo e($apply_leave->id); ?>" >
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><?php echo app('translator')->get('leave.delete_apply_leave'); ?></h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="text-center">
                                                        <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                                                    </div>
                                                    <div class="mt-40 d-flex justify-content-between">
                                                        <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                                                        <?php echo e(Form::open(['route' => array('parent-leave-delete',$apply_leave->id), 'method' => 'DELETE', 'enctype' => 'multipart/form-data'])); ?>

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

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\parentPanel\parent_leave.blade.php ENDPATH**/ ?>
<div class="container-fluid">
    <div class="col-lg-12 mb-20">
        <div class="table-responsive">
        <table class="table" cellspacing="0"
            width="100%">
            <thead>
                <tr>
                    <th width="8%"><?php echo app('translator')->get('behaviourRecords.title'); ?>
                    </th>
                    <th width="7%"><?php echo app('translator')->get('behaviourRecords.point'); ?>
                    </th>
                    <th width="15%"><?php echo app('translator')->get('behaviourRecords.session'); ?>
                    </th>
                    <th width="10%"><?php echo app('translator')->get('behaviourRecords.date'); ?>
                    </th>
                    <th width="45%"><?php echo app('translator')->get('behaviourRecords.description'); ?>
                    </th>
                    <th width="15%"><?php echo app('translator')->get('behaviourRecords.assigned_by'); ?>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $all_incident; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $incident): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($incident->incident->title); ?>

                        </td>
                        <td><?php echo e($incident->incident->point); ?>

                        </td>
                        <td><?php echo e($incident->academicYear->year); ?> <?php echo e($incident->academicYear->title); ?>

                        </td>
                        <td><?php echo e(dateconvert($incident->incident->created_at)); ?>

                        </td>
                        <td><?php echo e($incident->incident->description); ?>

                        </td>
                        <td><?php echo e($incident->user->full_name); ?>

                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\Modules\BehaviourRecords\Resources\views\reports\student_incident_report_modal.blade.php ENDPATH**/ ?>
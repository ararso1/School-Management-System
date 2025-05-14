<div class="table-responsive">
<table class="table" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th width="10%"><?php echo app('translator')->get('behaviourRecords.title'); ?></th>
            <th width="8%"><?php echo app('translator')->get('behaviourRecords.point'); ?></th>
            <th width="12%"><?php echo app('translator')->get('behaviourRecords.date'); ?></th>
            <th width="45%"><?php echo app('translator')->get('behaviourRecords.description'); ?></th>
            <th width="15%"><?php echo app('translator')->get('behaviourRecords.assigned_by'); ?></th>
            <th width="10%"><?php echo app('translator')->get('behaviourRecords.actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $student->incidents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <input type="hidden" name="incident_id" id="incident_id" value="<?php echo e($data->id); ?>">
                <td><?php echo e($data->incident->title); ?></td>
                <td><?php echo e($data->incident->point); ?></td>
                <td><?php echo e(dateconvert($data->incident->created_at)); ?></td>
                <td><?php echo e($data->incident->description); ?></td>
                <td><?php echo e($data->user->full_name); ?></td>
                <td>
                    <a class="primary-btn small fix-gr-bg" onclick="assignViewDelete(<?php echo e($data->id); ?>)"
                        href="#"><?php echo app('translator')->get('behaviourRecords.delete'); ?></a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

</div><?php /**PATH C:\xampp\htdocs\Modules\BehaviourRecords\Resources\views\assignIncident\assign_incident_list.blade.php ENDPATH**/ ?>

<?php
    function strtotimeConvert($data){
        return date('jS M, Y', strtotime($data));
    }
?>

<div class="row">
    <div class="col-lg-12">
        <table id="table_id_table" class="table table " cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th><?php echo app('translator')->get('common.sl'); ?></th>
                    <th><?php echo app('translator')->get('fees.payment_date'); ?></th>
                    <th><?php echo app('translator')->get('inventory.reference_no'); ?></th>
                    <th><?php echo app('translator')->get('accounts.amount'); ?></th>
                    <th><?php echo app('translator')->get('inventory.method'); ?></th>
                    <th><?php echo app('translator')->get('common.action'); ?></th>

                </tr>
            </thead>

            <tbody>
            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
            <?php $x=1; ?>
            <?php if($payments): ?>
                <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($x++); ?></td>
                    <td  data-sort="<?php echo e(strtotime($value->payment_date)); ?>" >
                        <?php echo e($value->payment_date != ""? dateConvert($value->payment_date):''); ?>

                    </td>
                    <td><?php echo e($value->reference_no); ?></td>
                    <td><?php echo e($value->amount); ?></td>
                    <td><?php echo e($value->paymentMethods !=""?$value->paymentMethods->method:""); ?></td>
                    <td>
                    <button type="button" class="btn btn-danger btn-sm" onclick="delete_receive_payments(<?php echo e($value->id); ?>)"><?php echo app('translator')->get('common.delete'); ?></button>
                    </td>
                </tr>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\inventory\viewReceivePayments.blade.php ENDPATH**/ ?>
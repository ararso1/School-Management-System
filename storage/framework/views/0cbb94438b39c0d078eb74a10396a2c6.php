<?php
    $total_fees = 0;
    $total_due = 0;
    $total_paid = 0;
    $total_disc = 0;
    $balance_fees = 0;
?>
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
    <div class="table-responsive">
        <table id="" class="table school-table-style-parent-fees" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="nowrap"><?php echo app('translator')->get('fees.installment'); ?> </th>
                    <th class="nowrap"><?php echo app('translator')->get('fees.amount'); ?> (<?php echo e(@generalSetting()->currency_symbol); ?>)</th>
                    <th class="nowrap"><?php echo app('translator')->get('common.status'); ?></th>
                    <th class="nowrap"><?php echo app('translator')->get('fees.due_date'); ?> </th>
                    <th class="nowrap"><?php echo app('translator')->get('fees.payment_ID'); ?></th>
                    <th class="nowrap"><?php echo app('translator')->get('fees.mode'); ?></th>
                    <th class="nowrap"><?php echo app('translator')->get('fees.payment_date'); ?></th>
                    <th class="nowrap"><?php echo app('translator')->get('fees.discount'); ?> (<?php echo e(@generalSetting()->currency_symbol); ?>)</th>
                    <th class="nowrap"><?php echo app('translator')->get('fees.paid'); ?> (<?php echo e(@generalSetting()->currency_symbol); ?>)</th>
                    <th class="nowrap"><?php echo app('translator')->get('fees.balance'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $record->directFeesInstallments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $feesInstallment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $total_fees += discount_fees($feesInstallment->amount, $feesInstallment->discount_amount);
                        $total_paid += $feesInstallment->paid_amount;
                        $total_disc += $feesInstallment->discount_amount;
                        $balance_fees += discount_fees($feesInstallment->amount, $feesInstallment->discount_amount) - $feesInstallment->paid_amount;
                    ?>
                    <tr>
                        <td><?php echo e(@$feesInstallment->installment->title); ?></td>
                        <td>
                            <?php if($feesInstallment->discount_amount > 0): ?>
                                <del> <?php echo e($feesInstallment->amount); ?> </del>
                                <?php echo e($feesInstallment->amount - $feesInstallment->discount_amount); ?>

                            <?php else: ?>
                                <?php echo e($feesInstallment->amount); ?>

                            <?php endif; ?>
                        </td>
                        <td>
                            <button
                                class="primary-btn small <?php echo e(fees_payment_status($feesInstallment->amount, $feesInstallment->discount_amount, $feesInstallment->paid_amount, $feesInstallment->active_status)[1]); ?> text-white border-0"><?php echo e(fees_payment_status($feesInstallment->amount, $feesInstallment->discount_amount, $feesInstallment->paid_amount, $feesInstallment->active_status)[0]); ?>

                            </button>
                        </td>
                        <td><?php echo e(@dateConvert($feesInstallment->due_date)); ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td> <?php echo e($feesInstallment->discount_amount); ?></td>
                        <td>
                            <?php echo e($feesInstallment->paid_amount); ?>

                        </td>
                        <td>
                            <?php echo e(discount_fees($feesInstallment->amount, $feesInstallment->discount_amount) - $feesInstallment->paid_amount); ?>

                        </td>
                    </tr>
                    <?php $this_installment = discount_fees($feesInstallment->amount, $feesInstallment->discount_amount); ?>
                    <?php $__currentLoopData = $feesInstallment->payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $this_installment = $this_installment - $payment->paid_amount; ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-right"><img src="<?php echo e(asset('public/backEnd/img/table-arrow.png')); ?>"></td>
                            <td>
                                <?php if($payment->active_status == 1): ?>
                                    <a href="#" data-toggle="tooltip" data-placement="right"
                                        title="<?php echo e('Collected By: ' . @$payment->user->full_name); ?>">
                                        <?php echo e(@smFeesInvoice($payment->invoice_no)); ?>

                                    </a>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($payment->payment_mode); ?></td>
                            <td><?php echo e(@dateConvert($payment->payment_date)); ?></td>
                            <td><?php echo e($payment->discount_amount); ?></td>
                            <td><?php echo e($payment->paid_amount); ?></td>
                            <td><?php echo e($this_installment); ?> </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tfoot>
                <tr>
                    <th><?php echo app('translator')->get('fees.grand_total'); ?> (<?php echo e(@$currency); ?>)</th>
                    <th><?php echo e(currency_format($total_fees)); ?></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th><?php echo e(currency_format($total_disc)); ?></th>
                    <th><?php echo e(currency_format($total_paid)); ?> </th>
                    <th><?php echo e($total_fees - $total_paid); ?></th>
                    
                </tr>
            </tfoot>
            </tbody>
        </table>
    </div>
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
<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\studentPanel\inc\_student_direct_fees.blade.php ENDPATH**/ ?>
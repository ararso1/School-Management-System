<?php $__env->startSection('title'); ?> 
<?php echo app('translator')->get('accounts.bank_transaction'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<?php $__env->startPush('css'); ?>
<style>
    table.dataTable thead th {
        padding: 10px 30px !important;
    }

    table.dataTable tbody th, table.dataTable tbody td {
        padding: 20px 30px 20px 30px !important;
    }

    table.dataTable tfoot th, table.dataTable tfoot td {
        padding: 10px 30px 6px 30px;
    }
</style>
<?php $__env->stopPush(); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('accounts.bank_transaction'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('accounts.accounts'); ?></a>
                <a href="#"><?php echo app('translator')->get('accounts.bank_transaction'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">        
        <div class="row ">
            <div class="col-lg-12">
                <div class="white-box">
                <div class="row">
                    <div class="col-lg-12 no-gutters">
                        <div class="main-title">
                            <h3 class="mb-15"><?php echo app('translator')->get('accounts.bank_transaction'); ?> (<?php echo e($bank_name->bank_name .' '.'-'.' '. $bank_name->account_name); ?>)</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
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
                            <table id="tableWithoutSort" class="table" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><?php echo app('translator')->get('common.details'); ?></th>
                                        <th><?php echo app('translator')->get('accounts.income'); ?></</th>
                                        <th><?php echo app('translator')->get('accounts.expense'); ?></</th>
                                        <th><?php echo app('translator')->get('fees.payment_date'); ?></</th>
                                        <th><span class="text-right d-block"><?php echo app('translator')->get('accounts.balance'); ?></span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?php echo app('translator')->get('accounts.opening_balance'); ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><span class="text-right d-block"><?php echo e(currency_format($bank_name->opening_balance)); ?></span></td>
                                </tr>
                                    <?php 
                                        $total_credit= 0;
                                        $total_debit = 0;
                                    ?>
                                <?php $__currentLoopData = $bank_transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    if($value->type==1){
                                        $total_credit = $total_credit + $value->amount;
                                    }

                                    if($value->type==0){
                                        $total_debit = $total_debit + $value->amount;
                                    }
                                ?>
                                <tr>
                                    <td><?php echo e($value->details); ?></td>
                                    <td>
                                    <?php if($value->type==1): ?>
                                <?php echo e(currency_format($value->amount)); ?>

                                    <?php endif; ?>
                                    </td>
                                    <td>
                                    <?php if($value->type==0): ?>
                                <?php echo e(currency_format($value->amount)); ?>

                                    <?php endif; ?>
                                    </td>
                                    <td>
                                    <?php echo e(dateConvert($value->payment_date)); ?>

                                    </td>
                                    <td class="text-right"><?php echo e(currency_format($value->after_balance)); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="text-right"><?php echo app('translator')->get('exam.result'); ?>:</th>
                                        <th class=""><?php echo e(currency_format($total_credit)); ?></th>
                                        <th class=""><?php echo e(currency_format($total_debit)); ?></th>
                                        <th class="text-right"><?php echo app('translator')->get('accounts.current_balance'); ?>:</th>
                                        <th class="text-right"><?php echo e(currency_format($bank_name->current_balance)); ?></th>
                                    </tr>
                                </tfoot>
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
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\accounts\bank_transaction.blade.php ENDPATH**/ ?>
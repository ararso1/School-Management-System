<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('fees::feesModule.view_payments'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <?php $__env->startPush('css'); ?>
        <link rel="stylesheet" href="<?php echo e(url('Modules\Fees\Resources\assets\css\feesStyle.css')); ?>"/>
    <?php $__env->stopPush(); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('fees::feesModule.view_payments'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('fees.fees'); ?></a>
                    <a href="<?php echo e(route('fees.fees-invoice-list')); ?>"><?php echo app('translator')->get('fees.fees_invoice'); ?></a>
                    <a href="#"><?php echo app('translator')->get('fees::feesModule.view_payments'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="max_1200 text-right">
            <a href="<?php echo e(route('fees.single-payment-view', ['id' => $id, 'type' => 'print'])); ?>" class="primary-btn small fix-gr-bg" target="_blank">
                <span class="ti-printer pr-2"></span>
                <?php echo app('translator')->get('common.print'); ?>
            </a>
        </div>
        <div class="invoice_wrapper">
            <!-- invoice print part here -->
            <div class="invoice_print">
                <div class="container">
                    <div class="invoice_part_iner">
                        <table class="table">
                            <thead>
                            <td>
                                <div class="logo_img">
                                    <img  src="<?php echo e(asset($generalSetting->logo)); ?>" alt="<?php echo e($generalSetting->school_name); ?>">
                                </div>
                            </td>
                            <td class="virtical_middle address_text">
                                <p><?php echo e($generalSetting->school_name); ?></p>
                                <p><?php echo e($generalSetting->phone); ?></p>
                                <p><?php echo e($generalSetting->email); ?></p>
                                <p><?php echo e($generalSetting->address); ?></p>
                            </td>
                            </thead>
                        </table>
                        <!-- middle content  -->
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>
                                    <!-- single table  -->
                                    <table class="mb_30">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="addressleft_text">
                                                    <p><span><?php echo app('translator')->get('fees.fees_invoice_issued_to'); ?></p>
                                                    <p><span><strong><?php echo app('translator')->get('student.student_name'); ?> </span> <span class="nowrap">: <?php echo e(@$invoiceInfo->studentInfo->full_name); ?></span> </strong></p>
                                                    <p><span><?php echo app('translator')->get('student.class_section'); ?></span> <span>: <?php echo e(@$invoiceInfo->recordDetail->class->class_name); ?> (<?php echo e(@$invoiceInfo->recordDetail->section->section_name); ?>)</span> </p>
                                                    <p><span><?php echo app('translator')->get('student.roll_no'); ?></span> <span>: <?php echo e(@$invoiceInfo->studentInfo->roll_no); ?></span> </p>
                                                    <p><span><?php echo app('translator')->get('student.admission_no'); ?></span> <span>: <?php echo e(@$invoiceInfo->studentInfo->admission_no); ?></span> </p>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <!--/ single table  -->
                                </td>
                                <td >
                                    <!-- single table  -->
                                    <table class="mb_30" style="margin-left: auto; margin-right: 0;">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <?php
                                                    $subTotal =null;
                                                    $paidAmount = $transcationDetails->sum('paid_amount');
                                                    $paymentStatus = $subTotal - $paidAmount;
                                                ?>
                                                <div class="addressright_text">
                                                    <p><span><strong><?php echo app('translator')->get('fees.invoice_number'); ?></span> <span>: <?php echo e($invoiceInfo->invoice_id); ?></span> </strong></p>
                                                    <p><span><?php echo app('translator')->get('fees.create_date'); ?> </span> <span>: <?php echo e(dateConvert($invoiceInfo->create_date)); ?></span> </p>
                                                    <p><span><?php echo app('translator')->get('fees.due_date'); ?> </span> <span>: <?php echo e(dateConvert($invoiceInfo->due_date)); ?></span> </p>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <!--/ single table  -->
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <!-- invoice print part end -->
            <table class="table border_table mb_30 description_table" >
                <thead>
                <tr>
                    <th><?php echo app('translator')->get('common.sl'); ?></th>
                    <th><?php echo app('translator')->get('fees.fees_type'); ?></th>
                    <th><?php echo app('translator')->get('fees.fine'); ?></th>
                    <th><?php echo app('translator')->get('fees::feesModule.paid_amount'); ?></th>
                    <th class="text-right"><?php echo app('translator')->get('fees.sub_total'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $amount = 0;
                    $weaver = 0;
                    $paid_amount = 0;
                    $fine = 0;
                    $grand_total = 0;
                ?>
                <?php $__currentLoopData = $transcationDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$invoiceDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $weaver += $invoiceDetail->weaver;
                        $fine += $invoiceDetail->fine;
                        $paid_amount += $invoiceDetail->paid_amount;

                        $totalAmount = (+ $invoiceDetail->fine) - $invoiceDetail->weaver;
                        $grand_total += $totalAmount;

                        $total = $invoiceDetail->paid_amount + $invoiceDetail->fine;
                        $balance = ($amount+ $fine) - ($paid_amount + $weaver);
                    ?>
                    <tr>
                        <td><?php echo e($key+1); ?></td>
                        <td>
                            <?php echo e(@$invoiceDetail->transcationFeesType->name); ?>

                            <?php if($invoiceDetail->note): ?>
                                <i class="fa fa-info-circle" aria-hidden="true"data-tooltip="tooltip" title="<?php echo e($invoiceDetail->note); ?>" style="courser:help;"></i>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e(($invoiceDetail->fine)? $invoiceDetail->fine : 0); ?></td>
                        <td><?php echo e(($invoiceDetail->paid_amount)? $invoiceDetail->paid_amount : 0); ?></td>
                        <td class="text-right pr-0"><?php echo e(currency_format($total)); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        $('[data-tooltip="tooltip"]').tooltip();
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Modules\Fees\Resources\views\feesInvoice\feesInvoiceSingleView.blade.php ENDPATH**/ ?>
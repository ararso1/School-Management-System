<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('fees.pay_fees'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('fees.fees'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('parent-dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('fees.fees'); ?></a>
                    <a href="#"><?php echo app('translator')->get('fees.pay_fees'); ?></a>
                </div>
            </div>
        </div>
    </section>

    <input type="hidden" id="url" value="<?php echo e(URL::to('/')); ?>">
    <input type="hidden" id="student_id" value="<?php echo e($student->id); ?>">
    <section class="">
        <div class="container-fluid p-0 table-responsive">
            <div class="row">
                <!-- Start Student Details -->
                <div class="col-lg-12 student-details up_admin_visitor">
                    <ul class="nav nav-tabs tabs_scroll_nav" role="tablist">
                        <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="nav-item">
                                <a class="nav-link <?php if($key == 0): ?> active <?php endif; ?> "
                                    href="#tab<?php echo e($key); ?>" role="tab" data-toggle="tab">
                                    <?php if(moduleStatusCheck('University')): ?>
                                        <?php echo e($record->semesterLabel->name); ?> (<?php echo e($record->unSection->section_name); ?>) -
                                        <?php echo e(@$record->unAcademic->name); ?>

                                    <?php else: ?>
                                        <?php echo e($record->class->class_name); ?> (<?php echo e($record->section->section_name); ?>)
                                    <?php endif; ?>
                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </ul>


                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- Start Fees Tab -->
                        <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div role="tabpanel" class="tab-pane fade  <?php if($key == 0): ?> active show <?php endif; ?>"
                                id="tab<?php echo e($key); ?>">
                                <?php if(moduleStatusCheck('University')): ?>
                                    <?php if ($__env->exists('university::include.studentPanelFeesPay')) echo $__env->make('university::include.studentPanelFeesPay', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php elseif(directFees()): ?>
                                    <?php if ($__env->exists('backEnd.feesCollection.directFees.studentDirectFeesPay')) echo $__env->make('backEnd.feesCollection.directFees.studentDirectFeesPay', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php else: ?>
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
                                        <table class="table school-table-style-parent-fees" cellspacing="0"
                                            width="100%">
                                            <thead>
                                                <tr>
                                                    <th><?php echo app('translator')->get('fees.fees_group'); ?></th>
                                                    <th><?php echo app('translator')->get('fees.due_date'); ?></th>
                                                    <th><?php echo app('translator')->get('common.status'); ?></th>
                                                    <th><?php echo app('translator')->get('fees.amount'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                                                    <th><?php echo app('translator')->get('fees.payment_id'); ?></th>
                                                    <th><?php echo app('translator')->get('fees.mode'); ?></th>
                                                    <th><?php echo app('translator')->get('common.date'); ?></th>
                                                    <th><?php echo app('translator')->get('fees.discount'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                                                    <th><?php echo app('translator')->get('fees.fine'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                                                    <th><?php echo app('translator')->get('fees.paid'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                                                    <th><?php echo app('translator')->get('fees.balance'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                                                    <th><?php echo app('translator')->get('fees.payment'); ?> </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $grand_total = 0;
                                                    $total_fine = 0;
                                                    $total_discount = 0;
                                                    $total_paid = 0;
                                                    $total_grand_paid = 0;
                                                    $total_balance = 0;
                                                    $count = 0;
                                                ?>
                                                <?php $__currentLoopData = $record->fees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fees_assigned): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $count++;
                                                        $grand_total += $fees_assigned->feesGroupMaster->amount;
                                                    ?>
                                                    <?php
                                                        $discount_amount = $fees_assigned->applied_discount;
                                                        $total_discount += $discount_amount;
                                                        $student_id = $fees_assigned->student_id;
                                                    ?>
                                                    <?php
                                                        $paid = App\SmFeesAssign::discountSum($fees_assigned->student_id, $fees_assigned->feesGroupMaster->feesTypes->id, 'amount', $fees_assigned->record_id);
                                                        $total_grand_paid += $paid;
                                                    ?>
                                                    <?php
                                                        $fine = App\SmFeesAssign::discountSum($fees_assigned->student_id, $fees_assigned->feesGroupMaster->feesTypes->id, 'fine', $fees_assigned->record_id);
                                                        $total_fine += $fine;
                                                    ?>
                                                    <?php
                                                        $total_paid = $discount_amount + $paid;
                                                    ?>
                                                    <tr>
                                                        <input type="hidden" name="url" id="url"
                                                            value="<?php echo e(URL::to('/')); ?>">
                                                        <td><?php echo e(@$fees_assigned->feesGroupMaster->feesGroups->name); ?>

                                                            / <?php echo e(@$fees_assigned->feesGroupMaster->feesTypes->name); ?>

                                                        </td>
                                                        <td>
                                                            <?php echo e(@$fees_assigned->feesGroupMaster->date != '' ? dateConvert(@$fees_assigned->feesGroupMaster->date) : ''); ?>


                                                        </td>
                                                        <?php
                                                            $total_payable_amount = number_format($fees_assigned->feesGroupMaster->amount, 2, '.', '');
                                                        ?>
                                                        <?php
                                                            
                                                            $rest_amount = $fees_assigned->fees_amount;
                                                            $total_balance += $rest_amount;
                                                            $balance_amount = number_format($rest_amount, 2, '.', '');
                                                        ?>
                                                        <td>
                                                            <?php if($total_paid == $total_payable_amount): ?>
                                                                <button
                                                                    class="primary-btn small bg-success text-white border-0">
                                                                    <?php echo app('translator')->get('fees.paid'); ?>
                                                                </button>
                                                            <?php elseif($paid != 0): ?>
                                                                <button
                                                                    class="primary-btn small bg-warning text-white border-0">
                                                                    <?php echo app('translator')->get('fees.partial'); ?>
                                                                </button>
                                                            <?php elseif($paid == 0): ?>
                                                                <button class="primary-btn small bg-danger text-white border-0">
                                                                    <?php echo app('translator')->get('fees.unpaid'); ?>
                                                                </button>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                                echo $total_payable_amount;
                                                            ?>
                                                        </td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><?php echo e(number_format($discount_amount, 2, '.', '')); ?></td>
                                                        <td><?php echo e(number_format($fine, 2, '.', '')); ?></td>
                                                        <td><?php echo e(number_format($paid, 2, '.', '')); ?></td>
                                                        <td>
                                                            <?php
                                                                $rest_amount = $fees_assigned->fees_amount;
                                                                // $total_balance +=  $rest_amount;
                                                                echo number_format($fees_assigned->fees_amount, 2, '.', '');
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php if($total_paid == $total_payable_amount): ?>
                                                                <button
                                                                    class="primary-btn small bg-success text-white border-0">
                                                                    <?php echo app('translator')->get('fees.completed'); ?>
                                                                </button>
                                                            <?php endif; ?>

                                                            <?php if($rest_amount = !0): ?>
                                                                <?php
                                                                    $already_add = App\SmBankPaymentSlip::where('student_id', $fees_assigned->student_id)
                                                                        ->where('fees_type_id', $fees_assigned->feesGroupMaster->fees_type_id)
                                                                        ->first();
                                                                ?>
                                                                <?php if($total_paid != $total_payable_amount): ?>
                                                                    <div class="dropdown CRM_dropdown">
                                                                        <button type="button" class="btn dropdown-toggle"
                                                                            data-toggle="dropdown">
                                                                            <?php echo app('translator')->get('common.select'); ?>
                                                                        </button>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <?php if($already_add == '' && $balance_amount != 0): ?>
                                                                                <?php if(@$data['bank_info']->active_status == 1 || @$data['cheque_info']->active_status == 1): ?>
                                                                                    <a class="dropdown-item modalLink"
                                                                                        data-modal-size="modal-lg"
                                                                                        title="<?php echo e($fees_assigned->feesGroupMaster->feesGroups->name . ': ' . $fees_assigned->feesGroupMaster->feesTypes->name); ?>"
                                                                                        href="<?php echo e(route('fees-generate-modal-child', [$fees_assigned->fees_amount, $fees_assigned->student_id, $fees_assigned->feesGroupMaster->fees_type_id, $fees_assigned->id, $fees_assigned->record_id])); ?>">
                                                                                        <?php echo app('translator')->get('fees.add_bank_payment'); ?> </a>
                                                                                <?php endif; ?>
                                                                            <?php else: ?>
                                                                                <?php if($balance_amount != 0): ?>
                                                                                    <a class="dropdown-item modalLink"
                                                                                        data-modal-size="modal-lg"
                                                                                        title="<?php echo e($fees_assigned->feesGroupMaster->feesGroups->name . ': ' . $fees_assigned->feesGroupMaster->feesTypes->name); ?>"
                                                                                        href="<?php echo e(route('fees-generate-modal-child', [$fees_assigned->fees_amount, $fees_assigned->student_id, $fees_assigned->feesGroupMaster->fees_type_id, $fees_assigned->id, $fees_assigned->record_id])); ?>">
                                                                                        <?php echo app('translator')->get('fees.add_bank_payment'); ?>
                                                                                    </a>
                                                                                    <?php if($already_add != ''): ?>
                                                                                        <a class="dropdown-item modalLink"
                                                                                            data-modal-size="modal-lg"
                                                                                            title="<?php echo e($fees_assigned->feesGroupMaster->feesGroups->name . ': ' . $fees_assigned->feesGroupMaster->feesTypes->name); ?>"
                                                                                            href="<?php echo e(route('fees-generate-modal-child-view', [$fees_assigned->student_id, $fees_assigned->feesGroupMaster->fees_type_id, $fees_assigned->id])); ?>">
                                                                                            <?php echo app('translator')->get('common.view_bank_payment'); ?>
                                                                                        </a>
                                                                                        <?php if(@$already_add->approve_status == 0): ?>
                                                                                            <a onclick="deleteId(<?php echo e(@$already_add->id); ?>);"
                                                                                                class="dropdown-item"
                                                                                                href="#"
                                                                                                data-toggle="modal"
                                                                                                data-target="#deleteStudentModal"
                                                                                                data-id="<?php echo e(@$already_add->id); ?>">
                                                                                                <?php echo app('translator')->get('common.delete_bank_payment'); ?>
                                                                                            </a>
                                                                                        <?php endif; ?>
                                                                                    <?php endif; ?>
                                                                                <?php else: ?>
                                                                                    <?php if($already_add != ''): ?>
                                                                                        <a class="dropdown-item modalLink"
                                                                                            data-modal-size="modal-lg"
                                                                                            title="<?php echo e($fees_assigned->feesGroupMaster->feesGroups->name . ': ' . $fees_assigned->feesGroupMaster->feesTypes->name); ?>"
                                                                                            href="<?php echo e(route('fees-generate-modal-child-view', [$fees_assigned->student_id, $fees_assigned->feesGroupMaster->fees_type_id, $fees_assigned->id])); ?>">
                                                                                            <?php echo app('translator')->get('common.view_bank_payment'); ?>
                                                                                        </a>
                                                                                    <?php else: ?>
                                                                                        <a class="dropdown-item">
                                                                                            <?php echo app('translator')->get('fees.paid'); ?>
                                                                                        </a>
                                                                                    <?php endif; ?>
                                                                                <?php endif; ?>
                                                                            <?php endif; ?>

                                                                            <!--  Start Paystack Payment -->
                                                                            <?php
                                                                                $is_paystack = DB::table('sm_payment_methhods')
                                                                                    ->where('method', 'Paystack')
                                                                                    ->where('active_status', 1)
                                                                                    ->where('school_id', Auth::user()->school_id)
                                                                                    ->first();
                                                                            ?>
                                                                            <?php if(!empty($is_paystack) && $balance_amount != 0): ?>
                                                                                <form method="POST"
                                                                                    action="<?php echo e(route('pay-with-paystack')); ?>"
                                                                                    accept-charset="UTF-8"
                                                                                    class="form-horizontal" role="form">
                                                                                    <?php echo csrf_field(); ?>
                                                                                    <input type="hidden" name="assign_id"
                                                                                        value="<?php echo e($fees_assigned->id); ?>">
                                                                                    <?php if(is_null($student->email)): ?>
                                                                                        <input type="hidden" name="email"
                                                                                            value="<?php echo e(@$student->parents->guardians_email); ?>">
                                                                                    <?php else: ?>
                                                                                        <input type="hidden" name="email"
                                                                                            value="<?php echo e(auth()->user()->email); ?>">
                                                                                    <?php endif; ?>
                                                                                    <input type="hidden" name="orderID"
                                                                                        value="<?php echo e($fees_assigned->id); ?>">
                                                                                    <input type="hidden" name="amount"
                                                                                        value="<?php echo e($fees_assigned->fees_amount * 100); ?>">
                                                                                    <input type="hidden" name="quantity"
                                                                                        value="1">
                                                                                    <input type="hidden" name="fees_type_id"
                                                                                        value="<?php echo e($fees_assigned->feesGroupMaster->fees_type_id); ?>">
                                                                                    <input type="hidden" name="student_id"
                                                                                        value="<?php echo e($student->id); ?>">
                                                                                    <input type="hidden" name="reference"
                                                                                        value="<?php echo e(Paystack::genTranxRef()); ?>">
                                                                                    <input type="hidden" name="record_id"
                                                                                        value="<?php echo e($fees_assigned->record_id); ?>">
                                                                                    <button type="submit"
                                                                                        class=" dropdown-item">
                                                                                        <?php echo app('translator')->get('fees.pay_via_paystack'); ?>
                                                                                    </button>
                                                                                </form>
                                                                            <?php endif; ?>
                                                                            <!--  End Paystack Payment -->

                                                                            <!--  Start Xendit Payment -->
                                                                            <?php
                                                                                $is_active = DB::table('sm_payment_methhods')
                                                                                    ->where('method', 'Xendit')
                                                                                    ->where('active_status', 1)
                                                                                    ->where('school_id', Auth::user()->school_id)
                                                                                    ->first();
                                                                            ?>
                                                                            <?php if(moduleStatusCheck('XenditPayment') == true && $balance_amount != 0 and $is_active): ?>
                                                                                <form action="<?php echo route('xenditpayment.feesPayment'); ?>"
                                                                                    method="POST"
                                                                                    style="width: 100%; text-align: center">
                                                                                    <?php echo csrf_field(); ?>
                                                                                    <input type="hidden" name="amount"
                                                                                        id="amount"
                                                                                        value="<?php echo e($balance_amount * 1000); ?>" />
                                                                                    <input type="hidden" name="fees_type_id"
                                                                                        id="fees_type_id"
                                                                                        value="<?php echo e($fees_assigned->feesGroupMaster->fees_type_id); ?>">
                                                                                    <input type="hidden" name="student_id"
                                                                                        id="student_id"
                                                                                        value="<?php echo e($student->id); ?>">
                                                                                    <input type="hidden" name="amount"
                                                                                        id="amount"
                                                                                        value="<?php echo e($balance_amount * 1000); ?>" />
                                                                                    <input type="hidden" name="record_id"
                                                                                        value="<?php echo e(@$fees_assigned->record_id); ?>">
                                                                                    <div class="pay">
                                                                                        <button class="dropdown-item razorpay-payment-button btn filled small"
                                                                                        <?php if(serviceCharge('XenditPayment')): ?>
                                                                                                data-toggle="tooltip" data-title = "<?php echo e(__('common.service charge for per transaction ')); ?> <?php echo e(serviceCharge('XenditPayment')); ?>"
                                                                                        <?php endif; ?>
                                                                                            type="submit">
                                                                                            <?php echo app('translator')->get('fees.pay_with_xendit'); ?> <?php echo e(serviceCharge('XenditPayment') ? '+'.serviceCharge('XenditPayment') : ''); ?>

                                                                                        </button>
                                                                                    </div>
                                                                                </form>
                                                                            <?php endif; ?>
                                                                            <!-- End Xendit Payment -->

                                                                            <!-- Start Khalti Payment -->
                                                                            <?php if(moduleStatusCheck('KhaltiPayment') == true && $balance_amount > 0): ?>
                                                                                <?php
                                                                                    $is_khalti = DB::table('sm_payment_gateway_settings')
                                                                                        ->where('gateway_name', 'Khalti')
                                                                                        ->where('school_id', Auth::user()->school_id)
                                                                                        ->first('gateway_publisher_key');
                                                                                ?>
                                                                                <div class="pay">
                                                                                    <button type="button"
                                                                                        class="dropdown-item btn filled small khalti-payment-button"
                                                                                        data-amount="<?php echo e($balance_amount); ?>"
                                                                                        data-assignid="<?php echo e($fees_assigned->id); ?>"
                                                                                        data-feestypeid="<?php echo e($fees_assigned->feesGroupMaster->fees_type_id); ?>",
                                                                                        data-recordId="<?php echo e(@$fees_assigned->recordDetail->id); ?>"
                                                                                        <?php if(serviceCharge('KhaltiPayment')): ?>
                                                                                            data-toggle="tooltip" data-title = "<?php echo e(__('common.service charge for per transaction ')); ?> <?php echo e(serviceCharge('KhaltiPayment')); ?>"
                                                                                        <?php endif; ?>
                                                                                        >
                                                                                        <?php echo app('translator')->get('fees.pay_with_khalti'); ?> <?php echo e(serviceCharge('KhaltiPayment') ? '+'.serviceCharge('KhaltiPayment') : ''); ?>

                                                                                    </button>
                                                                                </div>
                                                                            <?php endif; ?>
                                                                            <!-- End Khalti Payment  -->

                                                                            <!-- Start Raudhahpay Payment  -->
                                                                            <?php
                                                                                $is_active = DB::table('sm_payment_methhods')
                                                                                    ->where('method', 'Raudhahpay')
                                                                                    ->where('active_status', 1)
                                                                                    ->where('school_id', Auth::user()->school_id)
                                                                                    ->first();
                                                                            ?>
                                                                            <?php if(moduleStatusCheck('Raudhahpay') == true && $balance_amount != 0 and $is_active): ?>
                                                                                <form action="<?php echo route('raudhahpay.feesPayment'); ?>"
                                                                                    method="POST"
                                                                                    style="width: 100%; text-align: center">
                                                                                    <?php echo csrf_field(); ?>
                                                                                    <input type="hidden" name="amount"
                                                                                        id="amount"
                                                                                        value="<?php echo e($balance_amount); ?>" />
                                                                                    <input type="hidden" name="fees_type_id"
                                                                                        id="fees_type_id"
                                                                                        value="<?php echo e($fees_assigned->feesGroupMaster->fees_type_id); ?>">
                                                                                    <input type="hidden" name="student_id"
                                                                                        id="student_id"
                                                                                        value="<?php echo e($student->id); ?>">
                                                                                    <input type="hidden" name="amount"
                                                                                        id="amount"
                                                                                        value="<?php echo e($balance_amount); ?>" />
                                                                                    <input type="hidden" name="record_id"
                                                                                        value="<?php echo e($fees_assigned->record_id); ?>">
                                                                                    <div class="pay">
                                                                                        <button
                                                                                            class="dropdown-item razorpay-payment-button btn filled small"
                                                                                            type="submit" 
                                                                                            <?php if(serviceCharge('Raudhahpay')): ?>
                                                                                                data-toggle="tooltip" data-title = "<?php echo e(__('common.service charge for per transaction ')); ?> <?php echo e(serviceCharge('Raudhahpay')); ?>"
                                                                                            <?php endif; ?> >
                                                                                            <?php echo app('translator')->get('fees.pay_with_raudhahpay'); ?> <?php echo e(serviceCharge('Raudhahpay') ? '+'.serviceCharge('Raudhahpay') : ''); ?>

                                                                                        </button>
                                                                                    </div>
                                                                                </form>
                                                                            <?php endif; ?>
                                                                            <!-- End Raudhahpay Payment -->

                                                                            <!-- Start Paypal Payment -->
                                                                            <?php
                                                                                $is_paypal = DB::table('sm_payment_methhods')
                                                                                    ->where('method', 'PayPal')
                                                                                    ->where('active_status', 1)
                                                                                    ->first();
                                                                            ?>
                                                                            <?php if(!empty($is_paypal) && $balance_amount != 0): ?>
                                                                                <form method="POST"
                                                                                    action="<?php echo e(route('payByPaypal')); ?>"
                                                                                    accept-charset="UTF-8"
                                                                                    class="form-horizontal" role="form">
                                                                                    <?php echo csrf_field(); ?>
                                                                                    <input type="hidden" name="assign_id"
                                                                                        value="<?php echo e($fees_assigned->id); ?>">
                                                                                    <input type="hidden" name="url"
                                                                                        id="url"
                                                                                        value="<?php echo e(URL::to('/')); ?>">
                                                                                    <input type="hidden" name="real_amount"
                                                                                        id="real_amount"
                                                                                        value="<?php echo e($fees_assigned->fees_amount); ?>">
                                                                                    <input type="hidden" name="student_id"
                                                                                        value="<?php echo e($student->id); ?>">
                                                                                    <input type="hidden" name="fees_type_id"
                                                                                        value="<?php echo e($fees_assigned->feesGroupMaster->fees_type_id); ?>">
                                                                                    <input type="hidden" name="record_id"
                                                                                        value="<?php echo e($fees_assigned->record_id); ?>">
                                                                                    <button type="submit"
                                                                                        class=" dropdown-item" 
                                                                                        <?php if(serviceCharge('PayPal')): ?>
                                                                                            data-toggle="tooltip" data-title = "<?php echo e(__('common.service charge for per transaction ')); ?> <?php echo e(serviceCharge('PayPal')); ?>"
                                                                                        <?php endif; ?>
                                                                                        >
                                                                                        <?php echo app('translator')->get('fees.pay_with_paypal'); ?> <?php echo e(serviceCharge('PayPal') ? '+'.serviceCharge('PayPal') : ''); ?>

                                                                                    </button>
                                                                                </form>
                                                                            <?php endif; ?>
                                                                            <!-- End Paypal Payment -->

                                                                            <?php if(moduleStatusCheck('CcAveune')): ?>
                                                                                <!-- start CcAveune Gateway  -->
                                                                                <?php
                                                                                   $is_CcAveune = DB::table('sm_payment_methhods')
                                                                                               ->where('method','CcAveune')
                                                                                               ->where('active_status',1)
                                                                                               ->where('school_id', Auth::user()->school_id)
                                                                                               ->first();
                                                                               ?>
                                                                                    <a type="submit" class="dropdown-item modalLink" data-modal-size="modal-md" title="<?php echo app('translator')->get('fees.pay_fees'); ?> "
                                                                                       <?php if(serviceCharge('CcAveune')): ?>
                                                                                           data-toggle="tooltip" data-title = "<?php echo e(__('common.service charge for per transaction ')); ?> <?php echo e(serviceCharge('CcAveune')); ?>"
                                                                                       <?php endif; ?>
                                                                                       href="<?php echo e(route('studentFeesPay-ccaveune',[$balance_amount, $fees_assigned->id,'oldFees'])); ?>" >
                                                                                           <?php echo app('translator')->get('fees.pay_with_CcAveune'); ?>
                                                                                           <?php echo e(serviceCharge('CcAveune') ? '+'.serviceCharge('CcAveune') : ''); ?>

                                                                                    </a>
                                                                                    
                                                                                    <!--  end CcAveune Gateway  -->
                                                                            <?php endif; ?> 


                                                                            <!-- Start Stripe Payment  -->
                                                                            <?php
                                                                                $is_stripe = DB::table('sm_payment_methhods')
                                                                                    ->where('method', 'Stripe')
                                                                                    ->where('active_status', 1)
                                                                                    ->where('school_id', Auth::user()->school_id)
                                                                                    ->first();
                                                                            ?>
                                                                            <?php if(!empty($is_stripe) && $balance_amount != 0): ?>
                                                                                <a class="dropdown-item modalLink"
                                                                                    data-modal-size="modal-lg"
                                                                                    title="<?php echo app('translator')->get('fees.pay_fees'); ?> " 
                                                                                    <?php if(serviceCharge('Stripe')): ?>
                                                                                        data-toggle="tooltip" data-title = "<?php echo e(__('common.service charge for per transaction ')); ?> <?php echo e(serviceCharge('Stripe')); ?>"
                                                                                    <?php endif; ?>
                                                                                    href="<?php echo e(route('fees-payment-stripe', [@$fees_assigned->feesGroupMaster->fees_type_id, $student->id, $balance_amount, $fees_assigned->id, $fees_assigned->record_id])); ?>">
                                                                                    <?php echo app('translator')->get('fees.pay_with_stripe'); ?> <?php echo e(serviceCharge('Stripe') ? '+'.serviceCharge('Stripe') : ''); ?>

                                                                                </a>
                                                                            <?php endif; ?>
                                                                            <!-- Start Stripe Payment  -->

                                                                            <!-- Start RazorPay Payment -->
                                                                            <?php
                                                                                $is_active = DB::table('sm_payment_methhods')
                                                                                    ->where('method', 'RazorPay')
                                                                                    ->where('active_status', 1)
                                                                                    ->where('school_id', Auth::user()->school_id)
                                                                                    ->first();
                                                                            ?>
                                                                            <?php if(moduleStatusCheck('RazorPay') == true && !empty($is_active) and $balance_amount != 0): ?>
                                                                                <form id="rzp-footer-form_<?php echo e($count); ?>"
                                                                                    action="<?php echo route('razorpay/dopayment'); ?>"
                                                                                    method="POST"
                                                                                    style="width: 100%; text-align: center">
                                                                                    <?php echo csrf_field(); ?>
                                                                                    <input type="hidden" name="assign_id"
                                                                                        value="<?php echo e($fees_assigned->id); ?>">
                                                                                    <input type="hidden" name="amount"
                                                                                        id="amount"
                                                                                        value="<?php echo e($fees_assigned->fees_amount * 100); ?>" />
                                                                                    <input type="hidden" name="fees_type_id"
                                                                                        id="fees_type_id"
                                                                                        value="<?php echo e($fees_assigned->feesGroupMaster->fees_type_id); ?>">
                                                                                    <input type="hidden" name="student_id"
                                                                                        id="student_id"
                                                                                        value="<?php echo e($student->id); ?>">
                                                                                    <input type="hidden" name="amount"
                                                                                        id="amount"
                                                                                        value="<?php echo e($fees_assigned->fees_amount); ?>" />
                                                                                    <div class="pay">
                                                                                        <button
                                                                                            class="dropdown-item razorpay-payment-button btn filled small"
                                                                                            id="paybtn_<?php echo e($count); ?>"
                                                                                            type="button" 
                                                                                            <?php if(serviceCharge('RazorPay')): ?>
                                                                                                data-toggle="tooltip" data-title = "<?php echo e(__('common.service charge for per transaction ')); ?> <?php echo e(serviceCharge('RazorPay')); ?>"
                                                                                            <?php endif; ?>
                                                                                            >
                                                                                            <?php echo app('translator')->get('fees.pay_with_razorpay'); ?> <?php echo e(serviceCharge('RazorPay') ? '+'.serviceCharge('RazorPay') : ''); ?>

                                                                                        </button>
                                                                                    </div>
                                                                                </form>
                                                                            <?php endif; ?>
                                                                            <!-- End RazorPay Payment -->
                                                                        </div>
                                                                    </div>

                                                                    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                                                                    <!-- start razorpay code -->
                                                                    <script>
                                                                        $('#rzp-footer-form_<?php echo $count; ?>').submit(function(e) {
                                                                            var button = $(this).find('button');
                                                                            var parent = $(this);
                                                                            button.attr('disabled', 'true').html('Please Wait...');
                                                                            $.ajax({
                                                                                method: 'get',
                                                                                url: this.action,
                                                                                data: $(this).serialize(),
                                                                                complete: function(r) {
                                                                                    console.log('complete');
                                                                                    console.log(r);
                                                                                }
                                                                            })
                                                                            return false;
                                                                        })
                                                                    </script>
                                                                    <script>
                                                                        function padStart(str) {
                                                                            return ('0' + str).slice(-2)
                                                                        }

                                                                        function demoSuccessHandler(transaction) {
                                                                            // You can write success code here. If you want to store some data in database.
                                                                            $("#paymentDetail").removeAttr('style');
                                                                            $('#paymentID').text(transaction.razorpay_payment_id);
                                                                            var paymentDate = new Date();
                                                                            $('#paymentDate').text(
                                                                                padStart(paymentDate.getDate()) + '.' + padStart(paymentDate.getMonth() + 1) + '.' + paymentDate
                                                                                .getFullYear() + ' ' + padStart(paymentDate.getHours()) + ':' + padStart(paymentDate.getMinutes())
                                                                            );

                                                                            $.ajax({
                                                                                method: 'post',
                                                                                url: "<?php echo url('razorpay/dopayment'); ?>",
                                                                                data: {
                                                                                    "_token": "<?php echo e(csrf_token()); ?>",
                                                                                    "razorpay_payment_id": transaction.razorpay_payment_id,
                                                                                    "amount": <?php echo $rest_amount * 100; ?>,
                                                                                    "fees_type_id": <?php echo $fees_assigned->feesGroupMaster->fees_type_id; ?>,
                                                                                    "student_id": <?php echo $student->id; ?>
                                                                                },
                                                                                complete: function(r) {
                                                                                    console.log('complete');
                                                                                    console.log(r);

                                                                                    setTimeout(function() {
                                                                                        toastr.success('Operation successful', 'Success', {
                                                                                            "iconClass": 'customer-info'
                                                                                        }, {
                                                                                            timeOut: 2000
                                                                                        });
                                                                                    }, 500);

                                                                                    location.reload();
                                                                                }
                                                                            })
                                                                        }
                                                                    </script>
                                                                    <script>
                                                                        var options_<?php echo $count; ?> = {
                                                                            key: "<?php echo e(@$razorpay_info->gateway_secret_key); ?>",
                                                                            amount: <?php echo $rest_amount * 100; ?>,
                                                                            name: 'Online fee payment',
                                                                            image: 'https://i.imgur.com/n5tjHFD.png',
                                                                            handler: demoSuccessHandler
                                                                        }
                                                                    </script>
                                                                    <script>
                                                                        window.r_<?php echo $count; ?> = new Razorpay(options_<?php echo $count; ?>);
                                                                        document.getElementById('paybtn_<?php echo $count; ?>').onclick = function() {
                                                                            r_<?php echo $count; ?>.open()
                                                                        }
                                                                    </script>
                                                                    <!-- end razorpay code -->
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                        $payments = App\SmFeesAssign::feesPayment($fees_assigned->feesGroupMaster->feesTypes->id, $fees_assigned->student_id, $fees_assigned->record_id);
                                                        $i = 0;
                                                    ?>
                                                    <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td class="text-right"><img
                                                                    src="<?php echo e(asset('public/backEnd/img/table-arrow.png')); ?>">
                                                            </td>
                                                            <td>
                                                                <?php
                                                                    $created_by = App\User::find($payment->created_by);
                                                                ?>
                                                                <?php if($created_by != ''): ?>
                                                                    <a href="#" data-toggle="tooltip"
                                                                        data-placement="right"
                                                                        title="<?php echo e('Collected By: ' . $created_by->full_name); ?>">
                                                                        <?php echo e($payment->fees_type_id . '/' . $payment->id); ?>

                                                                    </a>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td><?php echo e($payment->payment_mode); ?></td>
                                                            <td class="nowrap">
                                                                <?php echo e($payment->payment_date != '' ? dateConvert($payment->payment_date) : ''); ?>

                                                            </td>
                                                            <td>
                                                                <?php echo e(number_format($payment->discount_amount, 2, '.', '')); ?>

                                                            </td>
                                                            <td>
                                                                <?php echo e(number_format($payment->fine, 2, '.', '')); ?>

                                                                <?php if($payment->fine != 0): ?>
                                                                    <?php if(strlen($payment->fine_title) > 14): ?>
                                                                        <spna class="text-danger nowrap"
                                                                            title="<?php echo e($payment->fine_title); ?>">
                                                                            (<?php echo e(substr($payment->fine_title, 0, 15) . '...'); ?>)
                                                                        </spna>
                                                                    <?php else: ?>
                                                                        <?php if($payment->fine_title == ''): ?>
                                                                            <?php echo e($payment->fine_title); ?>

                                                                        <?php else: ?>
                                                                            <spna class="text-danger nowrap">
                                                                                (<?php echo e($payment->fine_title); ?>)
                                                                            </spna>
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td><?php echo e(number_format($payment->amount, 2, '.', '')); ?></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php $__currentLoopData = $record->feesDiscounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fees_discount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo app('translator')->get('fees.discount'); ?></td>
                                                        <td><?php echo e($fees_discount->feesDiscount != '' ? $fees_discount->feesDiscount->name : ''); ?>

                                                        </td>
                                                        <td></td>
                                                        <td>
                                                            <?php if(in_array($fees_discount->id, $applied_discount)): ?>
                                                                <?php
                                                                    $createdBy = App\SmFeesAssign::createdBy($student_id, $fees_discount->id, $fees_discount->record_id);
                                                                ?>
                                                                <?php if($createdBy != ''): ?>
                                                                    <?php
                                                                        $created_by = App\User::find($createdBy->created_by);
                                                                    ?>
                                                                    <?php if(!empty($created_by)): ?>
                                                                        <a href="#" data-toggle="tooltip"
                                                                            data-placement="right"
                                                                            title="<?php echo e('Collected By: ' . $created_by->full_name); ?>"><?php echo app('translator')->get('fees.discount_of'); ?>
                                                                            <?php echo e(currency_format($fees_discount->feesDiscount->amount)); ?>

                                                                            <?php echo app('translator')->get('fees.applied'); ?>
                                                                            :
                                                                            <?php echo e($createdBy->id . '/' . $createdBy->created_by); ?></a>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                            <?php else: ?>
                                                                <?php echo app('translator')->get('fees.discount_of'); ?>
                                                                <?php echo e($fees_discount->feesDiscount != '' ? currency_format($fees_discount->feesDiscount->amount) : ''); ?>

                                                                <?php echo app('translator')->get('fees.assigned'); ?>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td><?php echo e($fees_discount->name); ?></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th></th>
                                                    <th><?php echo app('translator')->get('fees.grand_total'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                                                    <th></th>
                                                    
                                                    <th><?php echo e(currency_format($grand_total)); ?></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th><?php echo e(currency_format($total_discount)); ?></th>
                                                    <th><?php echo e(currency_format($total_fine)); ?></th>
                                                    <th><?php echo e(currency_format($total_grand_paid)); ?>

                                                    </th>
                                                    <th><?php echo e(currency_format($total_balance)); ?></th>
                                                    <th></th>
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
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade admin-query" id="deleteFeesPayment">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('common.delete_item'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                    </div>
                    <div class="mt-40 d-flex justify-content-between">
                        <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                        <?php echo e(Form::open(['route' => 'fees-payment-delete', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <input type="hidden" name="id" id="feep_payment_id">
                        <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('common.delete'); ?></button>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade admin-query" id="deleteStudentModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('common.delete_item'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                    </div>
                    <div class="mt-40 d-flex justify-content-between">
                        <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                        <?php echo e(Form::open(['url' => 'child-bank-slip-delete', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <input type="hidden" name="id" value="" id="student_delete_i"> 
                        <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('common.delete'); ?></button>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
 <script type="text/javascript" src="https://js.stripe.com/v2/"></script> 
    <?php if(moduleStatusCheck('KhaltiPayment')): ?>
        <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
        <script>
            $(document).on('click', '.khalti-payment-button', function() {
                var feesTypeId = "fees_type_id_assign_id=" + $(this).data("feestypeid");
                var assignId = $(this).data("assignid");
                var recordId = $(this).data("recordId");
                var productinfo = feesTypeId + '_' + assignId + '_' + recordId;

                var config = {
                    "publicKey": "<?php echo e(@$is_khalti->gateway_publisher_key); ?>",
                    "productIdentity": productinfo,
                    "productName": "Fees Payment",
                    "productUrl": "<?php echo e(url('/')); ?>",
                    "Cust": "Pranta",
                    "paymentPreference": [
                        "KHALTI",
                        "EBANKING",
                        "MOBILE_BANKING",
                        "CONNECT_IPS",
                        "SCT",
                    ],
                    "eventHandler": {
                        onSuccess(payload) {
                            var url = "<?php echo e(url('khaltipayment/successPayment?')); ?>";
                            var student = 'student' + '=' + "<?php echo e($student->id); ?>";
                            var trx = 'trx' + '=' + payload.idx;
                            var token = 'token' + '=' + payload.token;
                            var amount = 'amount' + '=' + payload.amount;
                            window.location.href = url + token + '&' + trx + '&' + '&' + amount + '&' + student +
                                '&' + payload.product_identity;
                        },
                        onError(error) {
                            var url = "<?php echo e(url('khaltipayment/cancelPayment')); ?>";
                            window.location.href = url;
                        },
                        onClose() {
                            console.log('widget is closing');
                        }
                    }
                };

                var checkout = new KhaltiCheckout(config);
                var pay_amount = $(this).data("amount");
                var feesTypeId = $(this).data("feesTypeId");
                var assignId = $(this).data("assignId");
                checkout.show({
                    amount: pay_amount * 100
                });
            })
        </script>
    <?php endif; ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\parentPanel\childrenFees.blade.php ENDPATH**/ ?>
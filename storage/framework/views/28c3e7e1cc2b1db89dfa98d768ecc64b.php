<style>
    .primary_datepicker_input button i {
        top: 15px !important;
    }
</style>
<div class="container-fluid">
    <?php echo e(Form::open([
        'class' => 'form-horizontal',
        'files' => true,
        'route' => 'savePayrollPaymentData',
        'method' => 'POST',
        'enctype' => 'multipart/form-data',
        #'onsubmit' => 'return validateForm()',
    ])); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="row mt-25">
                <div class="col-lg-6" id="sibling_class_div">
                    <div class="primary_input">
                        <label class="primary_input_label" for=""><?php echo app('translator')->get('hr.staff_name'); ?> (<?php echo app('translator')->get('hr.staff_id'); ?> ) <span></span> </label>
                        <input readonly
                            class="read-only-input primary_input_field form-control<?php echo e($errors->has('amount') ? ' is-invalid' : ''); ?>"
                            type="text" name="amount"
                            value="<?php echo e($payrollDetails->staffs->full_name); ?> (<?php echo e($payrollDetails->staffs->staff_no); ?>)">
                        <input type="hidden" name="payroll_generate_id" value="<?php echo e($payrollDetails->id); ?>">
                        <input type="hidden" name="role_id" value="<?php echo e($role_id); ?>">
                        <input type="hidden" name="payroll_month" value="<?php echo e($payrollDetails->payroll_month); ?>">
                        <input type="hidden" name="payroll_year" value="<?php echo e($payrollDetails->payroll_year); ?>">

                        <?php if($errors->has('amount')): ?>
                            <span class="text-danger">
                                <?php echo e($errors->first('amount')); ?>

                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-6" id="">
                    <div class="primary_input">
                        <label class="primary_input_label" for=""><?php echo app('translator')->get('accounts.expense_head'); ?> <span></span> </label>
                        <select
                            class="primary_select form-control<?php echo e($errors->has('expense_head_id') ? ' is-invalid' : ''); ?>"
                            name="expense_head_id" id="expense_head_id">
                            <option data-display="Expense Head*" value=""><?php echo app('translator')->get('accounts.expense_head'); ?> *</option>
                            <?php if(isset($chart_of_accounts)): ?>
                                <?php $__currentLoopData = $chart_of_accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value->id); ?>"><?php echo e($value->head); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                        <?php if($errors->has('expense_head_id')): ?>
                            <span class="text-danger">
                                <?php echo e($errors->first('expense_head_id')); ?>

                            </span>
                        <?php endif; ?>

                    </div>
                </div>
            </div>

            <div class="row mt-25">
                <div class="col-lg-6" id="">
                    <div class="primary_input">
                        <label class="primary_input_label" for=""><?php echo app('translator')->get('hr.month_year'); ?> <span></span> </label>
                        <input readonly
                            class="read-only-input primary_input_field form-control<?php echo e($errors->has('amount') ? ' is-invalid' : ''); ?>"
                            type="text" name="amount"
                            value="<?php echo e($payrollDetails->payroll_month); ?> - <?php echo e($payrollDetails->payroll_year); ?>">
                        

                        <?php if($errors->has('amount')): ?>
                            <span class="text-danger">
                                <?php echo e($errors->first('amount')); ?>

                            </span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="primary_input">
                        <div class="primary_datepicker_input">
                            <div class="no-gutters input-right-icon">
                                <div class="col">
                                    <div class="">
                                        <label class="primary_input_label" for="payment_date"><?php echo app('translator')->get('fees.payment_date'); ?> <span class="text-danger">*</span></label>
                                        <input
                                            class="primary_input_field primary_input_field date form-control"
                                            id="payment_date" type="text" name="payment_date"
                                            value="<?php echo e(old('admission_date') != '' ? old('admission_date') : date('m/d/Y')); ?>"
                                            autocomplete="off">
                                    </div>
                                </div>
                                <button class="btn-date" data-id="#payment_date" type="button">
                                    <label class="m-0 p-0" for="payment_date">
                                        <i class="ti-calendar" id="start-date-icon"></i>
                                    </label>
                                </button>
                            </div>
                        </div>
                        <span class="text-danger"><?php echo e($errors->first('payment_date')); ?></span>
                    </div>
                </div>
                


            </div>

            <div class="row mt-25">
                <div class="col-lg-6">
                    <div class="primary_input">
                        <label class="primary_input_label" for=""><?php echo app('translator')->get('accounts.payment_amount'); ?></label>
                        <input class="read-only-input primary_input_field form-control<?php echo e($errors->has('discount') ? ' is-invalid' : ''); ?>" type="text" name="submit_amount" value="<?php echo e($payrollDetails->net_salary - $payrollDetails->payrollPayments->sum('amount')); ?>">

                        <?php if($errors->has('discount')): ?>
                            <span class="text-danger">
                                <?php echo e($errors->first('discount')); ?>

                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="primary_input">
                        <label class="primary_input_label"><?php echo app('translator')->get('accounts.payment_method'); ?> <span class="text-danger">*</span></label>
                        <select
                            class="primary_select form-control<?php echo e($errors->has('payment_mode') ? ' is-invalid' : ''); ?>"
                            name="payment_mode" id="payment_mode">
                            <option data-display="Payment Method *" value=""><?php echo app('translator')->get('accounts.payment_method'); ?> *</option>
                            <?php if(isset($paymentMethods)): ?>
                                <?php $__currentLoopData = $paymentMethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value->id); ?>" data-mode="<?php echo e($value->method); ?>"><?php echo e($value->method); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                        <?php if($errors->has('payment_mode')): ?>
                            <span class="text-danger">
                                <?php echo e($errors->first('payment_mode')); ?>

                            </span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row mt-25" id="bankOption">
                <div class="col-lg-12">
                    <div class="primary_input">
                        <select
                            class="primary_select form-control<?php echo e($errors->has('bank_id') ? ' is-invalid' : ''); ?>"
                            name="bank_id" id="account_id">
                            <?php if(isset($account_id)): ?>
                                <?php $__currentLoopData = $account_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value->id); ?>" data-account="<?php echo e($value->bank_name); ?>"><?php echo e($value->bank_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>

                        <?php if($errors->has('bank_id')): ?>
                            <span class="text-danger invalid-select" role="alert">
                                <strong><?php echo e($errors->first('bank_id')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="row mt-25">
                <div class="col-lg-12" id="sibling_name_div">
                    <div class="primary_input">
                        <label class="primary_input_label" for=""><?php echo app('translator')->get('common.note'); ?> </label>
                        <textarea class="primary_input_field form-control" cols="0" rows="3" name="note" id="note"></textarea>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 text-center mt-40">
            <div class="mt-40 d-flex justify-content-between">
                <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                <input class="primary-btn fix-gr-bg" type="submit" value="save information">
            </div>
        </div>
    </div>
    <?php echo e(Form::close()); ?>

</div>
<script>
    if ($(".primary_select").length) {
        $(".primary_select").niceSelect();
    }
    //Payroll proceed to pay
    $(document).ready(function() {
        $('#bankOption').hide();
    });

    $(document).ready(function() {
        $("#payment_mode").on("change", function() {
            var mode = $(this).find(':selected').data('mode');
            if (mode == "Bank") {
                $('#bankOption').show();
            } else {
                $('#bankOption').hide();
            }
        });
    });

    $("#search-icon").on("click", function() {
        $("#search").focus();
    });

    $("#start-date-icon").on("click", function() {
        $("#startDate").focus();
    });

    $("#end-date-icon").on("click", function() {
        $("#endDate").focus();
    });

    $(".primary_input_field.date").datepicker({
        autoclose: true,
        setDate: new Date(),
    });
    $(".primary_input_field.date").on("changeDate", function(ev) {
        // $(this).datepicker('hide');
        $(this).focus();
    });

    $(".primary_input_field.time").datetimepicker({
        format: "LT",
    });
</script>
<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\humanResource\payroll\paymentPayroll.blade.php ENDPATH**/ ?>
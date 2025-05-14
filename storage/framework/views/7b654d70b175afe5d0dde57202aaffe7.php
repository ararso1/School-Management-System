
<div class="container-fluid">
   <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'save-item-receive-payment',
   'method' => 'POST', 'enctype' => 'multipart/form-data', 'onsubmit' => 'return validateForm()'])); ?>


   <div class="row">
    <div class="col-lg-12">
        <div class="row mt-25">
            <div class="col-lg-12" id="">
               
            </div>
        </div>
        <input type="hidden" name="item_receive_id" value="<?php echo e($id); ?>">
        <div class="row mt-25">
            <div class="col-lg-12">
                <div class="primary_input">
                    <select class="primary_select w-100 form-control<?php echo e($errors->has('expense_head_id') ? ' is-invalid' : ''); ?>" name="expense_head_id" id="expense_head_id">
                        <option data-display="<?php echo app('translator')->get('accounts.expense_head'); ?> *" value=""><?php echo app('translator')->get('common.select'); ?></option>
                            <?php $__currentLoopData = $expense_head; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value->id); ?>"
                            <?php echo e(@$editData->expense_head_id == $value->id? 'selected': ''); ?>

                            ><?php echo e($value->head); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        
                        <?php if($errors->has('expense_head_id')): ?>
                        <span class="text-danger invalid-select" role="alert">
                            <?php echo e($errors->first('expense_head_id')); ?>

                        </span>
                        <?php endif; ?>
                        <span class="modal_input_validation red_alert"></span>
                    </div>
            </div>
        </div>
        <div class="row mt-25">
        <div class="col-lg-12">
                <div class="primary_input">
                    <select class="primary_select w-100 form-control<?php echo e($errors->has('payment_mode') ? ' is-invalid' : ''); ?>" name="payment_method" id="item_receive_add_payment_method">
                        <?php if(@$editData->paymentMethodName->method =="Bank"): ?>
                            <option data-string="<?php echo e(@$editData->paymentMethodName->method); ?>" value="<?php echo e(@$editData->payment_method); ?>" selected><?php echo e(@$editData->paymentMethodName->method); ?></option>
                        <?php else: ?>
                        <?php $__currentLoopData = $paymentMethhods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(isset($editData)): ?>
                        <option data-string="<?php echo e($value->method); ?>" value="<?php echo e($value->id); ?>"
                            <?php echo e(@$editData->payment_method == $value->id? 'selected': ''); ?>><?php echo e($value->method); ?></option>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                    <span class="modal_input_validation red_alert"></span>
                </div>
            </div>
            <input type="hidden" name="paymentMethodName" value="">
        </div>
        <div class="row mt-25">
            <div class="col-lg-12 d-none" id="add_payment_item_receive_bankAccount">
                <div class="primary_input">
                    <select class="primary_select1 w-100 bb form-control<?php echo e($errors->has('bank_id') ? ' is-invalid' : ''); ?>" name="bank_id" id="receive_account_id">
                        <?php if(isset($editData)): ?>
                            <option value="<?php echo e($editData->account_id); ?>" selected><?php echo e(@$editData->bankName->account_name); ?> (<?php echo e(@$editData->bankName->bank_name); ?>)</option>
                        <?php endif; ?>
                        </select>
                        
                        <?php if($errors->has('bank_id')): ?>
                        <span class="text-danger invalid-select" role="alert">
                            <?php echo e($errors->first('bank_id')); ?>

                        </span>
                        <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row mt-25">
            <div class="col-lg-12">
                <div class="primary_input">
                    <input class="read-only-input primary_input_field form-control<?php echo e($errors->has('reference_no') ? ' is-invalid' : ''); ?>" type="text" name="reference_no" id="reference_no" value="">
                    <label> <?php echo app('translator')->get('inventory.reference_note'); ?> <span class="text-danger"> *</span> </label>
                    
                    <?php if($errors->has('reference_no')): ?>
                    <span class="text-danger" >
                        <?php echo e($errors->first('reference_no')); ?>

                    </span>
                    <?php endif; ?>
                    <span class="modal_input_validation red_alert"></span>
                </div>
            </div>
        </div>

        <div class="row mt-25">
            <div class="col-lg-6">
                <div class="primary_input">
                    <input class="read-only-input primary_input_field form-control<?php echo e($errors->has('amount') ? ' is-invalid' : ''); ?>" type="number" name="amount" value="<?php echo e($paymentDue->total_due); ?>" id="total_due" onkeyup="checkDue()">
                    <input type="hidden" id="total_due_value" value="<?php echo e($paymentDue->total_due); ?>">
                    <label class="primary_input_label" for=""><?php echo app('translator')->get('accounts.payment_amount'); ?> <span class="text-danger"> *</span> </label>
                    
                    <?php if($errors->has('amount')): ?>
                    <span class="text-danger" >
                        <?php echo e($errors->first('amount')); ?>

                    </span>
                    <?php endif; ?>
                    <span class="modal_input_validation red_alert"></span>
                </div>
            </div>
            <div class="col-lg-6" id="">
                <div class="primary_input">
                    <input class="read-only-input primary_input_field  primary_input_field date form-control form-control<?php echo e($errors->has('apply_date') ? ' is-invalid' : ''); ?>" id="payment_date" type="text"
                    name="payment_date" value="<?php echo e(date('m/d/Y')); ?>">
                    <label class="primary_input_label" for=""><?php echo app('translator')->get('fees.payment_date'); ?> <span class="text-danger"> *</span> </label>
                    
                    <?php if($errors->has('payment_date')): ?>
                    <span class="text-danger" >
                        <?php echo e($errors->first('payment_date')); ?>

                    </span>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="row mt-25">
            <div class="col-lg-12" id="sibling_name_div">
                <div class="primary_input mt-20">
                    <textarea class="primary_input_field form-control" cols="0" rows="3" name="notes" id="notes"></textarea>
                    <label class="primary_input_label" for=""><?php echo app('translator')->get('common.note'); ?> </label>
                    

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
<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>
    if ($(".primary_select").length) {
        $(".primary_select").niceSelect();
    }

    $(document).ready(function() {
        $("#item_receive_add_payment_method").on("change", function() {
            let methodName = $(this).find(':selected').data('string');
            if (methodName == "Bank") {
                $("#add_payment_item_receive_bankAccount").removeClass('d-none');
            } else {
                $("#add_payment_item_receive_bankAccount").addClass('d-none');
            }
        });

        let methodType = $('#item_receive_add_payment_method').find(':selected').data('string');
        if (methodType == "Bank") {
            $("#add_payment_item_receive_bankAccount").removeClass('d-none');
        } else {
            $("#add_payment_item_receive_bankAccount").addClass('d-none');
        }
    });
</script><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\inventory\itemReceivePayment.blade.php ENDPATH**/ ?>
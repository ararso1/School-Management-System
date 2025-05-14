<script src="<?php echo e(asset('public/backEnd/')); ?>/js/main.js"></script>
<style type="text/css">
    #bank-area,
    #cheque-area {
        display: none;
    }

    .primary_input_field~label {
        top: -15px;
    }
</style>

<div class="container-fluid">
    <?php echo e(Form::open([
        'class' => 'form-horizontal',
        'files' => true,
        'route' => 'fees-payment-update',
        'method' => 'POST',
        'enctype' => 'multipart/form-data',
        'name' => 'myForm',
        'onsubmit' => 'return validateFormFees()',
    ])); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="row mt-25">
                <div class="col-lg-12">
                    <div class="input-right-icon">
                        <div class="primary_input">
                            <label class="primary_input_label" for=""><?php echo app('translator')->get('common.date'); ?></label>
                            <div class="position-relative">
                                <input class="primary_input_field  primary_input_field date form-control form-control"
                                    id="startDate" type="text"
                                    name="date" value="<?php echo e(date('m/d/Y')); ?>" readonly
                                    value=<?php echo e($fees_payment->payment_date); ?>>
                                <label for="startDate" class="primary_input-icon pr-2">
                                    <i class="ti-calendar" id="start-date-icon"></i>
                                </label>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
            <input type="hidden" name="fees_assign_id" id="fees_assign_id" value="<?php echo e($fees_payment->assign_id); ?>">
            <input type="hidden" name="fees_payment_id" id="fees_payment_id" value="<?php echo e($fees_payment->id); ?>">
            <input type="hidden" name="pre_amount" id="real_amount" value="<?php echo e($fees_payment->amount); ?>">


            <div class="row mt-25">
                <div class="col-lg-12" id="sibling_class_div">
                    <div class="primary_input">
                        <label class="primary_input_label" for=""><?php echo app('translator')->get('accounts.amount'); ?> <span class="text-danger">
                                *</span> </label>
                        <input class="primary_input_field form-control" type="number" step="0.01" min="0"
                            name="amount" value="<?php echo e($fees_payment->amount); ?>" id="amount">


                        <span class=" text-danger" role="alert" id="amount_error">

                        </span>

                    </div>
                </div>
            </div>

            
            
            <script>
                function checkFine() {
                    var fine_amount = document.getElementById("fine_amount").value;
                    var fine_title = document.getElementById("fine_title");
                    if (fine_amount > 0) {
                        fine_title.style.display = "block";
                    } else {
                        fine_title.style.display = "none";
                    }
                }
            </script>

            <div class="row mt-50">
                <div class="col-lg-3">
                    <p class="text-uppercase fw-500 mb-10"><?php echo app('translator')->get('fees.payment_mode'); ?> *</p>
                </div>
                <div class="col-lg-6">
                    <div class="d-flex radio-btn-flex ml-40">
                        <div class="mr-30">
                            <input type="radio" name="payment_mode" id="cash" value="cash"
                                class="common-radio relationButton" onclick="relationButton('cash')"
                                <?php echo e($fees_payment->payment_mode == 'cash' ? 'checked' : ''); ?>>
                            <label for="cash"><?php echo app('translator')->get('fees.cash'); ?></label>
                        </div>
                        
                        <div class="mr-30">
                            <input type="radio" name="payment_mode" id="bank" value="bank"
                                class="common-radio relationButton" onclick="relationButton('bank')"
                                <?php echo e($fees_payment->payment_mode == 'bank' ? 'checked' : ''); ?>>
                            <label for="bank"><?php echo app('translator')->get('fees.bank'); ?></label>
                        </div>
                        
                        
                        <div class="mr-30">
                            <input type="radio" name="payment_mode" id="cheque" value="cheque"
                                class="common-radio relationButton" onclick="relationButton('cheque')"
                                <?php echo e($fees_payment->payment_mode == 'cheque' ? 'checked' : ''); ?>>
                            <label for="cheque"><?php echo app('translator')->get('fees.cheque'); ?></label>
                        </div>
                        
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 bank-details" id="bank-area">
                    <strong><?php echo $data['bank_info']->bank_details; ?></strong>
                </div>
                <div class="col-md-6 cheque-details" id="cheque-area">
                    <strong><?php echo $data['cheque_info']->cheque_details; ?></strong>
                </div>
            </div>
            
            <div class="row mt-25">
                <div class="col-lg-12" id="sibling_name_div">
                    <div class="primary_input mt-20">
                        <label class="primary_input_label" for=""><?php echo app('translator')->get('common.note'); ?> </label>
                        <textarea class="primary_input_field form-control" cols="0" rows="3" name="note" id="note"><?php echo e($fees_payment->note); ?></textarea>


                    </div>
                </div>


            </div>
            <div class="row no-gutters input-right-icon mt-35">
                <div class="col">
                    <div class="primary_input">
                        <input
                            class="primary_input_field form-control <?php echo e($errors->has('file') ? ' is-invalid' : ''); ?>"
                            id="placeholderInput"
                            type="text"
                            placeholder="<?php echo e(isset($fees_payment) ? ($fees_payment->slip != '' ? getFilePath3($fees_payment->slip) : 'File Name') : 'File Name'); ?>"
                            readonly>


                        <?php if($errors->has('file')): ?>
                            <span class="text-danger d-block">
                                <strong><?php echo e(@$errors->first('file')); ?>

                            </span>
                        <?php endif; ?>

                    </div>
                </div>
                <div class="col-auto">
                    <button class="primary-btn-small-input" type="button">
                        <label class="primary-btn small fix-gr-bg"
                            for="browseFile"><?php echo app('translator')->get('common.browse'); ?></label>
                        <input type="file" class="d-none" id="browseFile" name="slip">
                    </button>
                </div>
            </div>
        </div>


        <!-- <div class="col-lg-12 text-center mt-40">
                <button class="primary-btn fix-gr-bg" id="save_button_sibling" type="button">
                    <span class="ti-check"></span>
                    save information
                </button>
            </div> -->
        <div class="col-lg-12 text-center mt-40">
            <div class="mt-40 d-flex justify-content-between">
                <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>

                <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('common.save_information'); ?></button>
            </div>
        </div>
    </div>
    <?php echo e(Form::close()); ?>

</div>
<script type="text/javascript">
    relationButton = (status) => {

        var cheque_area = document.getElementById("cheque-area");

        var bank_area = document.getElementById("bank-area");

        if (status == "bank") {
            cheque_area.style.display = "none";
            bank_area.style.display = "block";

        } else if (status == "cheque") {

            cheque_area.style.display = "block";
            bank_area.style.display = "none";

        }
    }
</script>
<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\feesCollection\edit_fees_payment_modal.blade.php ENDPATH**/ ?>
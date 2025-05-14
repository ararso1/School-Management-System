<style type="text/css">
    #bank-area, #cheque-area{
        display: none;
    }
    .primary_input_field ~ label {
    top: -15px;
    }
</style>

<div class="container-fluid">
    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'fees-payment-store',
                        'method' => 'POST', 'enctype' => 'multipart/form-data', 'name' => 'myForm', 'onsubmit' => "return validateFormFees()"])); ?>

        <div class="row">
            <div class="col-lg-12">
                <div class="row mt-25">
                    <div class="col-lg-6">
                        <div class="primary_datepicker_input">
                            <div class="no-gutters input-right-icon">
                                <div class="col">
                                    <div class="primary_input">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('common.date'); ?></label>
                                        <input class="primary_input_field  primary_input_field date form-control form-control" id="startDate" type="text"
                                            name="date" value="<?php echo e(date('m/d/Y')); ?>" readonly>
                                    </div>
                                </div>
                                <button class="btn-date" style="top: 70% !important;" data-id="#date_of_birth" type="button">
                                    <label class="m-0 p-0" for="date_of_birth">
                                        <i class="ti-calendar" id="start-date-icon"></i>
                                    </label>
                                </button>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6" id="sibling_class_div">
                        <div class="primary_input">
                            <label class="primary_input_label" for=""><?php echo app('translator')->get('fees.amount'); ?> <span class="text-danger"> *</span> </label>
                            <input oninput="numberMinZeroCheck(this)" class="primary_input_field form-control" type="text" max="<?php echo e($amount); ?>" name="amount" value="<?php echo e($amount); ?>" id="amount" required>
                            <span class=" text-danger" role="alert" id="amount_error"></span>
                        </div>
                    </div>

                </div>

                <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                <input type="hidden" name="assign_id" id="assign_id" value="<?php echo e($assign_id); ?>">
                <input type="hidden" name="master_id" id="master_id" value="<?php echo e($master); ?>">
                <input type="hidden" name="real_amount" id="real_amount" value="<?php echo e($amount); ?>">
                <input type="hidden" id="student_id" name="student_id" value="<?php echo e($student_id); ?>">
                <input type="hidden" name="fees_type_id" value="<?php echo e($fees_type_id); ?>">
                <input type="hidden" name="fees_discount_id" value="<?php echo e(@$discounts->fees_discount_id); ?>">
                <input type="hidden" name="applied_amount" value="<?php echo e(@$discounts->applied_amount); ?>">
                <input type="hidden" name="record_id" value="<?php echo e(@$record_id); ?>">

                
                <div class="row mt-25">
                    <div class="col-lg-6 d-none">
                        <div class="primary_input">
                            <label class="primary_input_label" for=""><?php echo app('translator')->get('fees.discount'); ?> <span></span> </label>
                            <input oninput="numberCheckWithDot(this)" class="primary_input_field form-control" type="text" name="discount_amount" id="discount_amount" value="0">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="primary_input">
                            <label class="primary_input_label" for=""><?php echo app('translator')->get('fees.fine'); ?> <span></span> </label>
                            <input class="primary_input_field form-control" type="text" name="fine" value="0" id="fine_amount" onblur="checkFine()">
                        </div>
                    </div>
                    <div class="col-lg-6" id="fine_title" style="display:none">
                        <div class="primary_input">
                            <label class="primary_input_label" for=""><?php echo app('translator')->get('fees.fine_title'); ?> <span></span> </label>
                            <input class="primary_input_field form-control"  type="text" name="fine_title" >
                        </div>
                    </div>
                </div>
                
                <script>
                function checkFine(){
                    var fine_amount=document.getElementById("fine_amount").value;
                    var fine_title=document.getElementById("fine_title");
                if (fine_amount>0) {
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
                                    <input type="radio" name="payment_mode" id="cash" value="cash" class="common-radio relationButton" onclick="relationButton('cash')" checked>
                                    <label for="cash"><?php echo app('translator')->get('fees.cash'); ?></label>
                                </div>
                                <?php if(@$method['bank_info']->active_status == 1): ?>
                                <div class="mr-30">
                                    <input type="radio" name="payment_mode" id="bank" value="bank" class="common-radio relationButton" onclick="relationButton('bank')">
                                    <label for="bank"><?php echo app('translator')->get('fees.bank'); ?></label>
                                </div>
                                <?php endif; ?>
                                <?php if(@$method['cheque_info']->active_status == 1): ?>
                                <div class="mr-30">
                                    <input type="radio" name="payment_mode" id="cheque" value="cheque" class="common-radio relationButton"  onclick="relationButton('cheque')">
                                    <label for="cheque"><?php echo app('translator')->get('fees.cheque'); ?></label>
                                </div>
                                <?php endif; ?>
                            </div>
                    </div>
                </div>
                <div class="row mt-50" id="feesBankPayment">
                    <div class="col-lg-3">
                        <p class="text-uppercase fw-500 mb-10"><?php echo app('translator')->get('fees.select_bank'); ?></p>
                    </div>
                    <div class="col-lg-9">
                        <div class="primary_input">
                            <select class="primary_select1 w-100 bb form-control<?php echo e($errors->has('bank_id') ? ' is-invalid' : ''); ?>" name="bank_id">
                            <?php if(isset($banks)): ?>
                            <?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value->id); ?>"><?php echo e($value->bank_name); ?></option>
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
                            <textarea class="primary_input_field form-control" cols="0" rows="3" name="note" id="note"></textarea>
                        </div>
                    </div>

                    
                </div>
                <div class="row no-gutters input-right-icon mt-35">
                        <div class="col">
                            <div class="primary_input">
                                <input class="primary_input_field form-control <?php echo e($errors->has('file') ? ' is-invalid' : ''); ?>" 
                                id="placeholderInput" 
                                type="text"
                                placeholder="<?php echo e(isset($visitor)? ($visitor->slip != ""? getFilePath3($visitor->slip):'File Name'):'File Name'); ?>"
                                readonly>
                                

                                <?php if($errors->has('file')): ?>
                                    <span class="text-danger d-block" >
                                        <strong><?php echo e(@$errors->first('file')); ?>

                                    </span>
                            <?php endif; ?>
                            
                            </div>
                        </div>
                        <div class="col-auto">
                            <button style="position: relative; top: 8px; right: 12px;" class="primary-btn-small-input" type="button">
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

                    <button class="primary-btn fix-gr-bg submit" type="submit"><?php echo app('translator')->get('common.save_information'); ?></button>
                </div>
            </div>
        </div>
    <?php echo e(Form::close()); ?>

</div>

<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script type="text/javascript">
$(document).ready(function() {
        $("#feesBankPayment").hide();
    });

relationButton = (status) => {
            var cheque_area = document.getElementById("cheque-area");
            var bank_area = document.getElementById("bank-area");
            if(status == "bank"){
                cheque_area.style.display = "none";
                bank_area.style.display = "block";
                $("#feesBankPayment").show();
            }else{
                cheque_area.style.display = "block";
                bank_area.style.display = "none";
                $("#feesBankPayment").hide();
            }
        }

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

    var fileInput = document.getElementById("browseFile");
    if (fileInput) {
        fileInput.addEventListener("change", showFileName);

        function showFileName(event) {
            var fileInput = event.srcElement;
            var fileName = fileInput.files[0].name;
            document.getElementById("placeholderInput").placeholder = fileName;
        }
    }
    var fileInp = document.getElementById("browseFil");
    if (fileInp) {
        fileInp.addEventListener("change", showFileName);

        function showFileName(event) {
            var fileInp = event.srcElement;
            var fileName = fileInp.files[0].name;
            document.getElementById("placeholderIn").placeholder = fileName;
        }
    }

    if ($(".niceSelect1").length) {
        $(".niceSelect1").niceSelect();
    }



</script>
<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\feesCollection\fees_generate_modal.blade.php ENDPATH**/ ?>
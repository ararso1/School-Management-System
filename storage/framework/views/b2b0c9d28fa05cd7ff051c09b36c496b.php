
<style type="text/css">
    .bank-details p, .cheque-details p{
        margin:0 !important;
    }
</style>
<?php if(@$method['bank_info']->active_status == 1): ?>
<style type="text/css">

    .cheque-details{
        display: none;
    }

</style>
<?php elseif(@$method['cheque_info']->active_status == 1): ?>
<style type="text/css">

    .bank-details{
        display: none;
    }
    
</style>
<?php endif; ?>
<div class="container-fluid">
    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'child-bank-slip-store','method' => 'POST', 'enctype' => 'multipart/form-data', 'name' => 'myForm', 'id'=>'addFeesPayment', 'onsubmit' => "return validateFormFees()"])); ?>

        <div class="row">
            <div class="col-lg-12">
                <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                
                <input type="hidden" name="installment_id" id="assign_id" value="<?php echo e($installment_id); ?>">
                <input type="hidden" name="real_amount" id="real_amount" value="<?php echo e(discountFees($installment_id)); ?>">
                <input type="hidden" name="student_id" value="<?php echo e($student_id); ?>">
                <input type="hidden" name="record_id" value="<?php echo e($record_id); ?>">
                

                <div class="row mt-25">
                    <div class="col-lg-6">
                        <div class="primary_datepicker_input">
                            <div class="no-gutters input-right-icon">
                                <div class="col">
                                    <div class="primary_input">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('common.date'); ?></label>
                                        <input class="primary_input_field  primary_input_field date form-control form-control" id="startDate" type="text"
                                            name="date" value="<?php echo e(date('m/d/Y')); ?>" readonly>
                                            <button class="btn-date" style="top: 70% !important;" data-id="#date_of_birth" type="button">
                                                <label class="m-0 p-0" for="date_of_birth">
                                                    <i class="ti-calendar" id="start-date-icon"></i>
                                                </label>
                                            </button>
                                            
                                            
                                    </div>
                                </div>
                            </div>
                       </div>
                      </div>
                      
                    <div class="col-lg-6" id="sibling_class_div">
                        <div class="primary_input">
                          <label class="primary_input_label" for=""><?php echo app('translator')->get('fees.amount'); ?> <span class="text-danger"> *</span> </label>
                            <input class="primary_input_field form-control read-only-input has-content" type="number" name="amount" value="<?php echo e($balance_fees); ?>" id="amount" required>
                            <?php if($errors->has('amount')): ?>
                            <span class="text-danger" >
                                <?php echo e($errors->first('amount')); ?>

                            </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="row mt-25" id="fine_title" style="display:none">
                    <div class="col-lg-12">
                        <div class="primary_input">
                          <label class="primary_input_label" for=""><?php echo app('translator')->get('fees.fine_title'); ?> <span class="text-danger"> *</span> </label>
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
                            <?php if(@$method['bank_info']->active_status == 1): ?>
                            <div class="mr-30">
                                <input type="radio" name="payment_mode" id="cash" value="bank" class="common-radio relationButton" onclick="relationButton('Bk')" <?php echo e(@$method['bank_info']->active_status == 1? 'checked':''); ?>>
                                <label for="cash"><?php echo app('translator')->get('fees.bank'); ?></label>
                            </div>
                            <?php endif; ?>
                            <?php if(@$method['cheque_info']->active_status == 1): ?>
                            <div class="mr-30">
                                <input type="radio" name="payment_mode" id="cheque" value="cheque" class="common-radio relationButton"  onclick="relationButton('Cq')" <?php echo e(@$method['bank_info']->active_status != 1? 'checked':''); ?>>
                                <label for="cheque"><?php echo app('translator')->get('fees.cheque'); ?></label>
                            </div>
                            <?php endif; ?>
                          <?php if(directFees()): ?>  
                            <?php if(@$data['PayPal']->active_status == 1): ?>
                                <div class="mr-30">
                                    <input type="radio" name="payment_mode" id="Paypal" value="PayPal" class="common-radio relationButton"  onclick="relationButton('PayPal')" >
                                    <label for="Paypal"><?php echo app('translator')->get('fees.Paypal'); ?></label>
                                </div>
                                <?php endif; ?>
  
                                <?php if(@$data['Stripe']->active_status == 1): ?>
                                <div class="mr-30">
                                    <input type="radio" name="payment_mode" id="Stripe" value="Stripe" class="common-radio relationButton"  onclick="relationButton('Stripe')" >
                                    <label for="Stripe"><?php echo app('translator')->get('fees.Stripe'); ?></label>
                                </div>
                                <?php endif; ?>
  
                                <?php if(@$data['Paystack']->active_status == 1): ?>
                                <div class="mr-30">
                                    <input type="radio" name="payment_mode" id="Paystack" value="Paystack" class="common-radio relationButton"  onclick="relationButton('Paystack')" >
                                    <label for="Paystack"><?php echo app('translator')->get('fees.Paystack'); ?></label>
                                </div>
                                <?php endif; ?>

                                <?php if(@$data['CcAveune']->active_status == 1): ?>
                                <div class="mr-30">
                                    <input type="radio" name="payment_mode" id="CcAveune" value="CcAveune" class="common-radio relationButton"  onclick="relationButton('CcAveune')" >
                                    <label for="CcAveune"><?php echo app('translator')->get('fees.CcAveune'); ?></label>
                                </div>
                                <?php endif; ?>

                                <?php if(@$data['PhonePe']->active_status == 1): ?>
                                <div class="mr-30">
                                    <input type="radio" name="payment_mode" id="PhonePe" value="PhonePe" class="common-radio relationButton"  onclick="relationButton('PhonePe')" >
                                    <label for="PhonePe"><?php echo app('translator')->get('fees.PhonePe'); ?></label>
                                </div>
                                <?php endif; ?>

                          <?php endif; ?> 
                        </div>
                    </div>
                </div>
                <div class="row mt-30 text-black text-bold" id="serviceChargeArea"></div>
                <div class="row mt-50" id="feesBankPayment">
                    <div class="col-lg-3">
                        <p class="text-uppercase fw-500 mb-10"><?php echo app('translator')->get('fees.select_bank'); ?>*</p>
                    </div>
                    <div class="col-lg-9">
                        <div class="primary_input">
                            <select class="primary_select form-control bb<?php echo e($errors->has('bank_id') ? ' is-invalid' : ''); ?>" name="bank_id">
                            <?php if(isset($banks)): ?>
                            <?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($value->id); ?>"><?php echo e($value->bank_name); ?> (<?php echo e($value->account_name); ?>)</option>
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
                  <?php if(isset($data['bank_info'])): ?>
                      <div class="col-md-6 bank-details" id="bank-area">
                          <strong><?php echo $data['bank_info']->bank_details; ?></strong>
                      </div>
                  <?php endif; ?> 
                  <?php if(isset($data['cheque_info'])): ?>
                      <div class="col-md-6 cheque-details" id="cheque-area">
                          <strong><?php echo $data['cheque_info']->cheque_details; ?></strong>
                      </div>
                      </div>
                  <?php endif; ?>
               
                <div class="row mt-25" id="noteArea">
                    <div class="col-lg-12" id="sibling_name_div">
                        <div class="primary_input mt-20">
                          <label class="primary_input_label" for=""><?php echo app('translator')->get('fees.note'); ?> </label>
                            <textarea class="primary_input_field form-control" cols="0" rows="3" name="note" id="note"><?php echo e(isset($fees_payment)?$fees_payment->note:''); ?></textarea>
                        </div>
                    </div>
                </div>
                    <div class="row no-gutters input-right-icon mt-35" id="fileupArea">
                        <div class="col">
                            <div class="primary_input">
                                <input class="primary_input_field" id="placeholderInput" type="text"
                                       placeholder="<?php echo e(isset($visitor)? ($visitor->file != ""? getFilePath3($visitor->file):'File Name'):'File Name'); ?>"
                                       readonly>
                                
                                <?php if($errors->has('file')): ?>
                                    <span class="text-danger d-block" >
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


                <div class="row mt-25" id="stripePaymentArea" style="display: none">
                  <div class="col-lg-12">
                       <div class="row">                                              
                          <div class="col-lg-6 mt-20">
                              <div class="primary_input">
                                  <label class="primary_input_label" for=""><?php echo app('translator')->get('accounts.name_on_card'); ?> <span class="text-danger"> *</span> </label>
                                  <input class="primary_input_field form-control<?php echo e($errors->has('name_on_card') ? ' is-invalid' : ''); ?>"
                                         type="text" name="name_on_card" autocomplete="off"
                                         value="">
                                  <?php if($errors->has('name_on_card')): ?>
                                      <span class="text-danger"
                                            role="alert"> <?php echo e($errors->first('name_on_card')); ?></span>
                                  <?php endif; ?>
                              </div>
                          </div>
                          <div class="col-lg-6 mt-20">
                              <div class="primary_input">
                                  <label class="primary_input_label" for=""><?php echo app('translator')->get('accounts.card_number'); ?> <span class="text-danger"> *</span> </label>
                                  <input class="primary_input_field form-control<?php echo e($errors->has('card-number') ? ' is-invalid' : ''); ?> card-number"
                                         type="text" name="card-number" autocomplete="off"
                                         value="">
                                  
                                  
                                  <?php if($errors->has('card-number')): ?>
                                      <span class="text-danger"
                                            role="alert"> <?php echo e($errors->first('card-number')); ?></span>
                                  <?php endif; ?>
                              </div>
                          </div>
                       </div>
                      <div class="row mt-20">                                              
                          <div class="col-lg-4 mt-20">
                              <div class="primary_input">
                                  <label class="primary_input_label" for=""><?php echo app('translator')->get('accounts.cvc'); ?> <span class="text-danger"> *</span> </label>
                                  <input class="primary_input_field form-control card-cvc" type="text" name="card-cvc"
                                      autocomplete="off" value="">
                                  
                                  
                                  <?php if($errors->has('card-cvc')): ?>
                                      <span class="text-danger"
                                          role="alert"> <?php echo e($errors->first('card-cvc')); ?></span>
                                  <?php endif; ?>
                              </div>
                          </div>
                          <div class="col-lg-4 mt-20">
                              <div class="primary_input">
                                  <label class="primary_input_label" for=""><?php echo app('translator')->get('accounts.expiration_month'); ?> <span class="text-danger"> *</span> </label>
                                  <input class="primary_input_field form-control card-expiry-month" type="text"
                                      name="card-expiry-month" autocomplete="off"
                                      value="">
                                 
                                  
                                  <?php if($errors->has('card-expiry-month')): ?>
                                      <span class="text-danger"
                                          role="alert"> <?php echo e($errors->first('card-expiry-month')); ?></span>
                                  <?php endif; ?>
                              </div>
                          </div>
                          <div class="col-lg-4 mt-20">
                              <div class="primary_input">
                                  <label class="primary_input_label" for=""><?php echo app('translator')->get('accounts.expiration_year'); ?> <span class="text-danger"> *</span> </label>
                                  <input class="primary_input_field form-control card-expiry-year" type="text"
                                      name="card-expiry-year" autocomplete="off"
                                      value="">
                                 
                                  
                                  <?php if($errors->has('card-expiry-year')): ?>
                                      <span class="text-danger"
                                          role="alert"> <?php echo e($errors->first('card-expiry-year')); ?></span>
                                  <?php endif; ?>
                              </div>                            
                          </div> 
                      </div>
                  </div>
                </div>

           
            <div class="col-lg-12 text-center mt-40">
                <div class="mt-40 d-flex justify-content-between">
                    <button type="button" class="primary-btn tr-bg submit" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                    <button class="primary-btn fix-gr-bg" type="submit">
                        <?php if(!isset($fees_payment)): ?>
                            <?php echo app('translator')->get('common.submit'); ?>
                        <?php else: ?>
                            <?php echo app('translator')->get('common.update_information'); ?>
                        <?php endif; ?>
                    </button>
                </div>
            </div>
        </div>
    <?php echo e(Form::close()); ?>

</div>

<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script type="text/javascript">
  relationButton = (status) => {
              var cheque_area = document.getElementById("cheque-area");
              var bank_area = document.getElementById("bank-area");
              var amount = $("#amount").val();
              if(status == "Bk"){
                  cheque_area.style.display = "none";
                  bank_area.style.display = "block";
                  $("#feesBankPayment").show();
                  $("#stripePaymentArea").hide();
                  //$("#serviceChargeArea").hide();
                  serviceCharge(status, amount, 'payment_method');
              }else if(status == "Cq"){
                  cheque_area.style.display = "block";
                  bank_area.style.display = "none";
                  $("#feesBankPayment").hide();
                  $("#stripePaymentArea").hide();
                 // $("#serviceChargeArea").hide();
                 serviceCharge(status, amount, 'payment_method');
                  
              }
              else if(status == "PayPal"){
                  cheque_area.style.display = "none";
                  bank_area.style.display = "none";
                  $("#feesBankPayment").hide();
                  $('#noteArea').hide();
                  $("#fileupArea").hide();
                  $("#stripePaymentArea").hide();
                  serviceCharge(status, amount, 'payment_method');
              }
              else if(status == "Stripe"){
                  cheque_area.style.display = "none";
                  bank_area.style.display = "none";
                  $("#feesBankPayment").hide();
                  $('#noteArea').hide();
                  $("#fileupArea").hide();
                  $("#stripePaymentArea").show();
                  serviceCharge(status, amount, 'payment_method');
              }
              else if(status == "Paystack"){
                  cheque_area.style.display = "none";
                  bank_area.style.display = "none";
                  $("#feesBankPayment").hide();
                  $('#noteArea').hide();
                  $("#fileupArea").hide();
                  $("#stripePaymentArea").hide();
                  serviceCharge(status, amount, 'payment_method');
              }
              else if(status == "CcAveune"){
                  cheque_area.style.display = "none";
                  bank_area.style.display = "none";
                  $("#feesBankPayment").hide();
                  $('#noteArea').hide();
                  $("#fileupArea").hide();
                  $("#stripePaymentArea").hide();
                  serviceCharge(status, amount, 'payment_method');
              }
          }

 function serviceCharge(gateway, amount, status)
    {
        var symbol = "<?php echo e(generalSetting()->currency_symbol); ?>";
        let amountTotal = parseFloat(amount);
        $.ajax({
            type:"GET",
            data : {gateway :gateway , amount : amountTotal, status : status},
            dataType:"JSON",
            url : "<?php echo e(route('gateway-service-charge')); ?>",
            success:function(data){              
                if(data.service_charge) {
                    $("#serviceChargeArea").show();
                    let total = parseFloat(amount) + parseFloat(data.service_charge_amount);                   
                    $('#serviceChargeArea').html('You Have to Pay service charge '+ data.service_charge + ' for ' + gateway + ' per transaction' + '. ' + 'Your payable amount with serivce charge : '+symbol+amount+'+'+symbol+ data.service_charge_amount +' = ' +symbol+parseFloat(total) );
                }else{
                    $("#serviceChargeArea").hide(); 
                }
            },
            error:function()
            {

            }
        })
    }

    $("#amount").on("input", function() {
        var amount = $(this).val(); 
        var gateway = $('input[name="payment_mode"]:checked').val();
        serviceCharge(gateway, amount, 'payment_method');
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

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
$(function () {
    var $form = $("form#addFeesPayment");
    var publisherKey = '<?php echo $method['Stripe']->gateway_publisher_key; ?>';
    var ccFalse = false;
    $('form#addFeesPayment').on('submit', function (e) {
        var gateway = $('input[name="payment_mode"]:checked').val();
        if (gateway == "Stripe") {
            if (!ccFalse) {
                e.preventDefault();
                Stripe.setPublishableKey(publisherKey);
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            }
        }  
    });

    function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            // token contains id, last4, and card type
            var token = response['id'];
            // insert the token into the form so it gets submitted to the server
           // $form.find('input[type=text]').empty();

            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
});

if ($(".primary_select").length) {
  $(".primary_select").niceSelect();
}

</script>


<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\feesCollection\directFees\fees_generate_modal_child.blade.php ENDPATH**/ ?>
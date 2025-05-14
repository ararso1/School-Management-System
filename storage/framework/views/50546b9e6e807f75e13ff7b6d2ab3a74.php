<style type="text/css">
      #bank-area, #cheque-area{
          display: none;
      }
      .primary_input_field ~ label {
      top: -15px;
      }
  </style>
  
  <div class="container-fluid">
      <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'directFees.updateSubPaymentModal','method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

          <div class="row">
                <input type="hidden" name="sub_payment_id" value="<?php echo e($payment->id); ?>" >
              <div class="col-lg-12">
                  <div class="row mt-25">
                      <div class="col-lg-6" id="sibling_class_div">
                          <div class="primary_input">
                            <label class="primary_input_label" for=""><?php echo app('translator')->get('fees.paid_amount'); ?> <span class="text-danger"> *</span> </label>
                              <input oninput="numberMinZeroCheck(this)" class="primary_input_field form-control" type="text" max="<?php echo e($payment->paid_amount); ?>" name="amount" value="<?php echo e($payment->paid_amount); ?>" id="amount" required >
                              <span class="text-danger"  id="amount_error"></span>
                          </div>
                      </div>
                    <div class="col-lg-6 ">
                      <div class="primary_datepicker_input">
                        <div class="no-gutters input-right-icon">
                            <div class="col">
                                <div class="primary_input ">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('fees.payment_date'); ?> <span class="text-danger"> *</span></label>
                                    <input class="primary_input_field  primary_input_field date form-control form-control<?php echo e($errors->has('payment_date') ? ' is-invalid' : ''); ?>" id="startDate" type="text"
                                         name="payment_date" value="<?php echo e(date('m/d/Y', strtotime($payment->payment_date))); ?>" autocomplete="off">
                                         <button class="btn-date" style="top: 70% !important;" data-id="#date_of_birth" type="button">
                                            <label class="m-0 p-0" for="date_of_birth">
                                                <i class="ti-calendar" id="start-date-icon"></i>
                                            </label>
                                        </button>
                                        
                                    <?php if($errors->has('payment_date')): ?>
                                    <span class="text-danger" >
                                        <?php echo e($errors->first('payment_date')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                        </div>
                      </div>
                    </div>
                      
                  </div>
                  </div>
              </div>
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
  <script>
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
</script>
  






  <?php /**PATH C:\xampp\htdocs\resources\views\backEnd\feesCollection\directFees\editSubPaymentModal.blade.php ENDPATH**/ ?>
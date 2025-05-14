
<?php $__env->startPush('css'); ?>
<style>
    .student-details .nav-tabs {
        margin-left: 10px;
    }
    /* #studentOnlineExam table.dataTable thead .sorting:after,
    #studentOnlineExam table.dataTable thead .sorting_asc:after,
    #leaves table.dataTable thead .sorting:after,
    #leaves table.dataTable thead .sorting_asc:after {
        top: 8px !important;
        left: 5px !important;
    }
    #studentOnlineExam table.dataTable thead .sorting_desc:after,
    #leaves table.dataTable thead .sorting_desc:after {
        top: 10px !important;
        left: 5px !important;
    } */
    .input-right-icon button.primary-btn-small-input {
        top: 8px !important;
        right: 12px !important;
    }
    div#table_id_wrapper {
        margin-top: 50px;
    }
    table.dataTable thead th {
    padding-left: 18px !important;
    }
</style>
<?php $__env->stopPush(); ?> 
<table id="" class="table school-table-style-parent-fees" cellspacing="0" width="100%">
      <thead>
          <tr>
              <th class="nowrap"><?php echo app('translator')->get('university::un.installment'); ?> </th>
              <th class="nowrap"><?php echo app('translator')->get('fees.amount'); ?> (<?php echo e(@generalSetting()->currency_symbol); ?>)</th>
              <th class="nowrap"><?php echo app('translator')->get('fees.due_date'); ?> </th>
              <th class="nowrap"><?php echo app('translator')->get('common.status'); ?></th>
              <th class="nowrap"><?php echo app('translator')->get('fees.mode'); ?></th>
              <th class="nowrap"><?php echo app('translator')->get('university::un.payment_date'); ?></th>
              <th class="nowrap"><?php echo app('translator')->get('fees.discount'); ?> (<?php echo e(@generalSetting()->currency_symbol); ?>)</th>
              <th class="nowrap"><?php echo app('translator')->get('fees.paid'); ?> (<?php echo e(@generalSetting()->currency_symbol); ?>)</th>
              <th class="nowrap"><?php echo app('translator')->get('fees.payment'); ?></th>
          </tr>
      </thead>
      <tbody>
            <?php $__currentLoopData = $record->feesInstallments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $feesInstallment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                  <td><?php echo e(@$feesInstallment->installment->title); ?></td>
                  <td> 
                    <?php if($feesInstallment->discount_amount > 0): ?>
                    <del>  <?php echo e(currency_format($feesInstallment->amount)); ?>  </del>
                      <?php echo e(currency_format($feesInstallment->amount - $feesInstallment->discount_amount)); ?>

                      <?php else: ?> 
                       <?php echo e(currency_format($feesInstallment->amount)); ?>

                    <?php endif; ?>
                  </td>
                  <td><?php echo e(@dateConvert($feesInstallment->due_date)); ?></td>
                  <td> 
                    <?php if($feesInstallment->active_status == 1 && $feesInstallment->paid_amount): ?>
                    <button class="primary-btn small bg-success text-white border-0"><?php echo app('translator')->get('fees.paid'); ?></button>
                    <?php else: ?> 
                    <button class="primary-btn small bg-danger text-white border-0"><?php echo app('translator')->get('fees.unpaid'); ?></button>
                    <?php endif; ?> 
                  </td>
                  <td>
                    <?php if(is_null($feesInstallment->payment_mode)): ?>
                     -- 
                    <?php else: ?>
                     <?php echo e($feesInstallment->payment_mode); ?>

                    <?php endif; ?> 
                    </td>
                  <td><?php echo e(@dateConvert($feesInstallment->payment_date)); ?></td>
                  <td> <?php echo e(currency_format($feesInstallment->discount_amount)); ?></td>
                  <td> <?php echo e(currency_format($feesInstallment->paid_amount)); ?></td>
                  <?php if($feesInstallment->active_status ==1 && $feesInstallment->paid_amount): ?>
                  <td>
                    <div class="dropdown">
                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                            <?php echo app('translator')->get('common.select'); ?>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item"><?php echo app('translator')->get('fees.paid'); ?></a>
                        </div>
                    </div>
                    </td>
                  <?php else: ?>
                  <td>

                        <?php
                          $instalment_amount = $feesInstallment->amount;  
                        ?>

                            <div class="dropdown">
                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                    <?php echo app('translator')->get('common.select'); ?> 
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <!--  Start Xendit Payment -->
                                        <?php if(moduleStatusCheck('XenditPayment')): ?>
                                            <form action="<?php echo route('xenditpayment.feesPayment'); ?>" method="POST" style="width: 100%; text-align: center">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="installment_id" id="installment_id" value="<?php echo e($feesInstallment->id); ?>"/>
                                                <input type="hidden" name="amount" id="amount" value="<?php echo e(discountFeesAmount($feesInstallment->id) * 1000); ?>"/>
                                                <input type="hidden" name="student_id" id="student_id" value="<?php echo e(@$student->id); ?>">
                                                <input type="hidden" name="payment_mode" id="payment_mode" value="<?php echo e($payment_gateway->id); ?>">
                                                <input type="hidden" name="amount" id="amount" value="<?php echo e(discountFeesAmount($feesInstallment->id) * 1000); ?>"/>
                                                <input type="hidden" name="record_id" value="<?php echo e($record->id); ?>">
                                                <div class="pay">
                                                    <button class="dropdown-item razorpay-payment-button btn filled small" type="submit">
                                                        <?php echo app('translator')->get('fees.pay_with_xendit'); ?>
                                                    </button>
                                                </div>
                                            </form>
                                        <?php endif; ?>
                                    <!--  End Xendit Payment -->

                                    <!-- Start Khalti Payment  -->
                                        <?php if((moduleStatusCheck('KhaltiPayment') == TRUE)): ?>
                                            <?php
                                                $is_khalti = DB::table('sm_payment_gateway_settings')
                                                            ->where('gateway_name','Khalti')
                                                            ->where('school_id', Auth::user()->school_id)
                                                            ->first('gateway_publisher_key');
                                            ?>
                                            <div class="pay">
                                                <button class="dropdown-item btn filled small khalti-payment-button" data-amount="<?php echo e(discountFeesAmount($feesInstallment->id)); ?>" data-recordId = "<?php echo e(@$record->id); ?>">
                                                    <?php echo app('translator')->get('fees.pay_with_khalti'); ?>
                                                </button>
                                            </div>
                                        <?php endif; ?>
                                      
                                    <!-- End Khalti Payment  -->
                                        <?php if(@$data['bank_info']->active_status == 1 || @$data['cheque_info']->active_status == 1 ): ?>
                                            
                                            <?php if($feesInstallment->paid_amount == null && $feesInstallment->active_status == 0): ?>
                                                <a class="dropdown-item modalLink" data-modal-size="modal-lg" title="<?php echo e(@$feesInstallment->intallment->title); ?>"
                                                    href="<?php echo e(route('university.fees-generate-modal-child',[discountFeesAmount($feesInstallment->id) ,$feesInstallment->id,$record->id])); ?>"> 
                                                    <?php echo app('translator')->get('fees.add_bank_payment'); ?>                                      
                                                </a>
                                            <?php endif; ?> 

                                            <?php if($feesInstallment->active_status == 2): ?>
                                                <a class="dropdown-item modalLink" data-modal-size="modal-lg"
                                                        title="<?php echo e(@$feesInstallment->installment->title); ?>"
                                                        href="<?php echo e(route('university.fees-generate-modal-bank-view',[$feesInstallment->id, $feesInstallment->record_id])); ?>">
                                                        <?php echo app('translator')->get('fees.view_bank_payment'); ?>
                                                </a>

                                                    <a onclick="deleteId(<?php echo e(@$feesInstallment->id); ?>);" class="dropdown-item" href="#" data-toggle="modal" data-target="#deleteStudentModal" data-id="<?php echo e(@$feesInstallment->id); ?>">
                                                            <?php echo app('translator')->get('fees.delete_bank_payment'); ?>
                                                    </a>
                                                   
                                            <?php endif; ?> 

                                        <?php endif; ?>

                                    <!-- Start Paypal Payment  -->
                                        <?php
                                            $is_paypal = DB::table('sm_payment_methhods')
                                                        ->where('method','PayPal')
                                                        ->where('school_id', Auth::user()->school_id)
                                                        ->where('active_status',1)
                                                        ->first();
                                        ?>
                                        <?php if(!empty($is_paypal) ): ?>
                                            <form method="POST" action="<?php echo e(route('studentPayByPaypal')); ?>" accept-charset="UTF-8" class="form-horizontal" role="form">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="installment_id" id="assign_id" value="<?php echo e($feesInstallment->id); ?>">
                                                <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                                <input type="hidden" name="real_amount" id="real_amount" value="<?php echo e(discountFeesAmount($feesInstallment->id)); ?>">
                                                <input type="hidden" name="student_id" value="<?php echo e($student->id); ?>">
                                                <input type="hidden" name="record_id" value="<?php echo e(@$record->id); ?>">
                                                <button type="submit" class=" dropdown-item">
                                                    <?php echo app('translator')->get('fees.pay_with_paypal'); ?>
                                                </button>
                                            </form>
                                        <?php endif; ?>
                                    <!-- End Paypal Payment  -->

                                    <!-- Start Paystack Payment  -->
                                        <?php
                                            $is_paystack = DB::table('sm_payment_methhods')
                                                        ->where('method','Paystack')
                                                        ->where('school_id', Auth::user()->school_id)
                                                        ->where('active_status',1)
                                                        ->first();
                                        ?>
                                        <?php if(!empty($is_paystack)): ?>
                                            <form method="POST" action="<?php echo e(route('pay-with-paystack')); ?>" accept-charset="UTF-8" class="form-horizontal" role="form">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="installment_id" id="assign_id" value="<?php echo e($feesInstallment->id); ?>">
                                                <?php if(($student->email == "")): ?>
                                                    <input type="hidden" name="email" value="<?php echo e(@$student->parents->guardians_email); ?>">
                                                <?php else: ?>
                                                    <input type="hidden" name="email" value="<?php echo e(auth()->user()->email); ?>">
                                                <?php endif; ?>
                                                <input type="hidden" name="orderID" value="<?php echo e($feesInstallment->id); ?>">
                                                <input type="hidden" name="amount" value="<?php echo e(discountFeesAmount($feesInstallment->id) * 100); ?>">
                                                <input type="hidden" name="quantity" value="1">
                                                <input type="hidden" name="student_id" value="<?php echo e($student->id); ?>">
                                                <input type="hidden" name="payment_mode" value="<?php echo e(@$payment_gateway->id); ?>">
                                                <input type="hidden" name="reference" value="<?php echo e(Paystack::genTranxRef()); ?>">
                                                <input type="hidden" name="key" value="<?php echo e(@$paystack_info->gateway_secret_key); ?>">
                                                <input type="hidden" name="record_id" value="<?php echo e(@$record->id); ?>">
                                                <button type="submit" class=" dropdown-item">
                                                    <?php echo app('translator')->get('fees.pay_via_paystack'); ?>
                                                </button>
                                            </form>
                                        <?php endif; ?>
                                    <!-- End Paystack Payment  -->

                                    <!-- Start Stripe Payment  -->
                                        <?php
                                            $is_stripe = DB::table('sm_payment_methhods')
                                                        ->where('method','Stripe')
                                                        ->where('active_status',1)
                                                        ->where('school_id', Auth::user()->school_id)
                                                        ->first();
                                        ?>
                                        <?php if(!empty($is_stripe)): ?>
                                            <a class="dropdown-item modalLink" data-modal-size="modal-lg" title="<?php echo e(@$feesInstallment->installment->title); ?> "
                                                href="<?php echo e(route('university.feesPaymentStripe',$feesInstallment->id)); ?>">
                                                <?php echo app('translator')->get('fees.pay_with_stripe'); ?>
                                            </a>
                                        <?php endif; ?>
                                    <!-- Start Stripe Payment  -->

                                    

                                    <!-- Start Razorpay Payment -->
                                        <?php
                                            $is_active = DB::table('sm_payment_methhods')
                                                        ->where('method','RazorPay')
                                                        ->where('active_status',1)
                                                        ->where('school_id', Auth::user()->school_id)
                                                        ->first();
                                        ?>
                                        <?php if(moduleStatusCheck('RazorPay') == TRUE and !empty($is_active)): ?>
                                            <form id="rzp-footer-form_<?php echo e($key); ?>" action="<?php echo route('razorpay/dopayment'); ?>" method="POST" style="width: 100%; text-align: center">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="amount" id="amount" value="<?php echo e(discountFeesAmount($feesInstallment->id) * 100); ?>"/>
                                                <input type="hidden" name="student_id" id="student_id" value="<?php echo e($student->id); ?>">
                                                <input type="hidden" name="payment_mode" id="payment_mode" value="<?php echo e($payment_gateway->id); ?>">
                                                <input type="hidden" name="amount" id="amount" value="<?php echo e(discountFeesAmount($feesInstallment->id)); ?>"/>
                                                <div class="pay">
                                                    <button class="dropdown-item razorpay-payment-button btn filled small" id="paybtn_<?php echo e($key); ?>" type="button">
                                                        <?php echo app('translator')->get('fees.pay_with_razorpay'); ?>
                                                    </button>
                                                </div>
                                            </form>
                                        <?php endif; ?>
                                    <!-- End Razorpay Payment -->

                                    <!-- Start Raudhahpay Payment  -->
                                        <?php if((moduleStatusCheck('Raudhahpay') == TRUE)): ?>
                                            <form id="xend-footer-form_<?php echo e($key); ?>" action="<?php echo route('raudhahpay.feesPayment'); ?>" method="POST" style="width: 100%; text-align: center">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="amount" id="amount" value="<?php echo e(discountFeesAmount($feesInstallment->id)); ?>"/>
                                                <input type="hidden" name="installment_id" id="assign_id" value="<?php echo e($feesInstallment->id); ?>">
                                                <input type="hidden" name="fees_type_id" id="fees_type_id" value="<?php echo e($feesInstallment->id); ?>">
                                                <input type="hidden" name="student_id" id="student_id" value="<?php echo e($student->id); ?>">
                                                <input type="hidden" name="record_id" id="record_id" value="<?php echo e($record->id); ?>">
                                                <input type="hidden" name="payment_method" id="payment_mode" value="5">
                                                <input type="hidden" name="amount" id="amount" value="<?php echo e(discountFeesAmount($feesInstallment->id)); ?>"/>
                                                <div class="pay">
                                                    <button class="dropdown-item razorpay-payment-button btn filled small" id="paybtn_<?php echo e($key); ?>" type="submit">
                                                        <?php echo app('translator')->get('fees.pay_with_raudhahpay'); ?>
                                                    </button>
                                                </div>
                                            </form>
                                        <?php endif; ?>
                                    <!-- End Raudhahpay Payment  -->
                                </div>
                            </div>

                            <!-- start razorpay code -->
                                <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                                <script>
                                    $('#rzp-footer-form_<?php echo $key; ?>').submit(function (e) {
                                        var button = $(this).find('button');
                                        var parent = $(this);
                                        button.attr('disabled', 'true').html('Please Wait...');
                                        $.ajax({
                                            method: 'get',
                                            url: this.action,
                                            data: $(this).serialize(),
                                            complete: function (r) {
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
                                            padStart(paymentDate.getDate()) + '.' + padStart(paymentDate.getMonth() + 1) + '.' + paymentDate.getFullYear() + ' ' + padStart(paymentDate.getHours()) + ':' + padStart(paymentDate.getMinutes())
                                        );

                                        $.ajax({
                                            method: 'post',
                                            url: "<?php echo url('razorpay/dopayment'); ?>",
                                            data: {
                                                "_token": "<?php echo e(csrf_token()); ?>",
                                                "razorpay_payment_id": transaction.razorpay_payment_id,
                                                "amount": <?php echo discountFeesAmount($feesInstallment->id) * 100; ?>,
                                                "student_id": <?php echo $student->id; ?>,
                                                "record_id": <?php echo $record->id; ?>
                                            },
                                            complete: function (r) {
                                                console.log('complete');
                                                console.log(r);

                                                setTimeout(function () {
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
                                    var options_<?php echo $key; ?> = {
                                        key: "<?php echo e(@$razorpay_info->gateway_secret_key); ?>",
                                        amount: <?php echo discountFeesAmount($feesInstallment->id) * 100; ?>,
                                        name: 'Online fee payment',
                                        image: 'https://i.imgur.com/n5tjHFD.png',
                                        handler: demoSuccessHandler
                                    }
                                </script>
                                <script>
                                    window.r_<?php echo $key; ?> = new Razorpay(options_<?php echo $key; ?>);
                                    document.getElementById('paybtn_<?php echo $key; ?>').onclick = function () {
                                        r_<?php echo $key; ?>.open()
                                    }
                                </script>
                            <!-- end razorpay code -->
                     
                    </td>
                    <?php endif; ?> 
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </tbody>
  </table><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\feesCollection\directFees\studentPanelFeesPay.blade.php ENDPATH**/ ?>
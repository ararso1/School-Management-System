<?php 
$total_fees = 0;
$total_due = 0;
$total_paid = 0;
$total_disc = 0;
$balance_fees = 0;
?>

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
    <table id="" class="table school-table-style-parent-fees" cellspacing="0" width="100%">
        <thead>
          <tr>
              <td class="text-right" colspan="14">
                  <a class="primary-btn small fix-gr-bg modalLink text-right" data-modal-size="modal-lg" title="<?php echo app('translator')->get('fees.add_fees'); ?>" href="<?php echo e(route('student-direct-fees-total-payment', [$record->id])); ?>" >  <i class="ti-plus pr-2"> </i> <?php echo app('translator')->get('fees.add_fees'); ?> </a>
              </td>
          </tr>
            <tr>
              <th class="nowrap"><?php echo app('translator')->get('fees.installment'); ?> </th>
              <th class="nowrap"><?php echo app('translator')->get('fees.amount'); ?> (<?php echo e(@generalSetting()->currency_symbol); ?>)</th>
              <th class="nowrap"><?php echo app('translator')->get('common.status'); ?></th>
              <th class="nowrap"><?php echo app('translator')->get('fees.due_date'); ?> </th>
              <th class="nowrap"><?php echo app('translator')->get('fees.payment_ID'); ?></th>
              <th class="nowrap"><?php echo app('translator')->get('fees.mode'); ?></th>
              <th class="nowrap"><?php echo app('translator')->get('fees.payment_date'); ?></th>
              <th class="nowrap"><?php echo app('translator')->get('fees.discount'); ?> (<?php echo e(@generalSetting()->currency_symbol); ?>)</th>
              <th class="nowrap"><?php echo app('translator')->get('fees.paid'); ?> (<?php echo e(@generalSetting()->currency_symbol); ?>)</th>
              <th class="nowrap"><?php echo app('translator')->get('fees.balance'); ?></th>
              <th class="nowrap"><?php echo app('translator')->get('common.action'); ?></th>
            </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $record->directFeesInstallments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $feesInstallment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php 
          $total_fees += discount_fees($feesInstallment->amount , $feesInstallment->discount_amount); 
          $total_paid += $feesInstallment->paid_amount;
          $total_disc += $feesInstallment->discount_amount;
          $balance_fees += discount_fees($feesInstallment->amount , $feesInstallment->discount_amount) - ( $feesInstallment->paid_amount );
          ?> 
              <tr>
                  <td><?php echo e(@$feesInstallment->installment->title); ?></td>
                  <td> 
                      <?php if($feesInstallment->discount_amount > 0): ?>
                        <del>  <?php echo e($feesInstallment->amount); ?>  </del>
                        <?php echo e($feesInstallment->amount - $feesInstallment->discount_amount); ?>

                      <?php else: ?> 
                       <?php echo e($feesInstallment->amount); ?>

                      <?php endif; ?> 
                    </td>
                    <td>
                        <button class="primary-btn small <?php echo e(fees_payment_status($feesInstallment->amount, $feesInstallment->discount_amount , $feesInstallment->paid_amount , $feesInstallment->active_status )[1]); ?> text-white border-0"><?php echo e(fees_payment_status($feesInstallment->amount,$feesInstallment->discount_amount,$feesInstallment->paid_amount,$feesInstallment->active_status )[0]); ?></button> 
                    </td>
                  <td><?php echo e(@dateConvert($feesInstallment->due_date)); ?></td>
                  <td>
                    
                  </td>
                  
                  <td>
                      
                  </td>
                 
                <td>
                     
                </td>
                <td> <?php echo e($feesInstallment->discount_amount); ?></td>
                <td>
                    <?php echo e($feesInstallment->paid_amount); ?>

                </td>
                   
                <td>
                    <?php echo e(discount_fees($feesInstallment->amount,$feesInstallment->discount_amount) - ( $feesInstallment->paid_amount )); ?> </td>
  
                    <?php if( discount_fees($feesInstallment->amount,$feesInstallment->discount_amount) - ( $feesInstallment->paid_amount ) ==0 ): ?>
                    <td>
                      <div class="dropdown CRM_dropdown">
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
  
                              <div class="dropdown CRM_dropdown">
                                  <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                      <?php echo app('translator')->get('common.select'); ?> 
                                  </button>
                                  <div class="dropdown-menu dropdown-menu-right">
                                     
                                        <?php if(@$data['bank_info']->active_status == 1 || @$data['cheque_info']->active_status == 1 ): ?>
        
                                            <?php if( $feesInstallment->active_status != 1): ?>
                                                <a class="dropdown-item modalLink" data-modal-size="modal-lg" title=" <?php echo app('translator')->get('fees.add_payment'); ?> <?php echo e(@$feesInstallment->installment->title); ?>"
                                                    href="<?php echo e(route('direct-fees-generate-modal-child', [directFees($feesInstallment->id),$feesInstallment->id,$feesInstallment->record_id ])); ?>"> 
                                                    <?php echo app('translator')->get('fees.add_payment'); ?>                                      
                                                </a>
                                            <?php endif; ?>
                                        <?php endif; ?> 
                             
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
                                                  "amount": <?php echo discount_fees($feesInstallment->amount,$feesInstallment->discount_amount) * 100; ?>,
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
                                          amount: <?php echo discount_fees($feesInstallment->amount,$feesInstallment->discount_amount) * 100; ?>,
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
  
  
  
  
              <?php $this_installment = discount_fees($feesInstallment->amount,$feesInstallment->discount_amount); ?>
              <?php $__currentLoopData = $feesInstallment->payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php $this_installment = $this_installment - $payment->paid_amount; ?>
             
             <tr>
               <td></td>
               <td></td>
               <td></td>
               <td class="text-right"><img src="<?php echo e(asset('public/backEnd/img/table-arrow.png')); ?>"></td>
               <td>
                   <?php if($payment->active_status == 1): ?>
                   <a href="#" data-toggle="tooltip" data-placement="right" title="<?php echo e('Collected By: '.@$payment->user->full_name); ?>">
                              <?php echo e(@sm_fees_invoice($payment->invoice_no, $invoice_settings)); ?>

                          </a>
                   <?php endif; ?>
               </td>
               <td><?php echo e($payment->payment_mode); ?></td>
               <td><?php echo e(@dateConvert($payment->payment_date)); ?></td>
               <td><?php echo e($payment->discount_amount); ?></td>
               <td><?php echo e($payment->paid_amount); ?></td>
               <td><?php echo e($this_installment); ?> </td>
               <td>
                <button class="primary-btn small bg-success text-white border-0"><?php echo app('translator')->get('fees.paid'); ?></button>
                </td>
            </tr>  
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  
  
  
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  
  
  
              <tfoot>
                  <tr>
                      <th><?php echo app('translator')->get('fees.grand_total'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                      <th><?php echo e(currency_format($total_fees)); ?></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th><?php echo e(currency_format($total_disc)); ?></th>
                      <th><?php echo e(currency_format($total_paid)); ?> </th>
                      <th> <?php echo e($total_fees - ( $total_paid)); ?></th>
                      <th></th>
                  </tr>
              </tfoot>
  
        </tbody>
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
<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\feesCollection\directFees\studentDirectFeesPay.blade.php ENDPATH**/ ?>
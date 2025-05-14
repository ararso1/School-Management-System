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
              <th class="nowrap"><?php echo app('translator')->get('common.action'); ?></th>
        
              
          </tr>
      </thead>
      <tbody>
            <?php $__currentLoopData = $record->feesInstallments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $feesInstallment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                  <td>  <?php echo e($feesInstallment->discount_amount); ?></td>
                  <td><?php echo e($feesInstallment->paid_amount); ?></td>
                  <td>
                      <div class="dropdown">
                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                            <?php echo app('translator')->get('common.select'); ?>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <?php if($feesInstallment->active_status !=1): ?>
                            <a data-toggle="modal"
                            data-target="#editInstallment_<?php echo e($feesInstallment->id); ?>" class="dropdown-item"><?php echo app('translator')->get('common.edit'); ?></a>
                            <?php endif; ?> 
                        </div>
                    </div>
                </td>
                 
            </tr>

            <div class="modal fade admin-query" id="editInstallment_<?php echo e($feesInstallment->id); ?>">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">
                                <?php echo app('translator')->get('university::un.fees_installment'); ?>
                            </h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <div class="modal-body"> 
                            <?php echo e(Form::open(['class' => 'form-horizontal','files' => true,'route' => 'university.feesInstallmentUpdate','method' => 'POST'])); ?>

                            <div class="row">
                                <input type="hidden" name="installment_id" value="<?php echo e($feesInstallment->id); ?>">
                                <div class="col-lg-6">
                                    <div class="primary_input ">
                                        <input class="primary_input_field form-control<?php echo e($errors->has('amount') ? ' is-invalid' : ''); ?>" type="text" name="amount" id="amount" value="<?php echo e($feesInstallment->amount); ?>">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('fees.amount'); ?> <span class="text-danger"> *</span> </label>
                                        
                                        <?php if($errors->has('amount')): ?>
                                        <span class="text-danger" >
                                            <strong><?php echo e(@$errors->first('amount')); ?>

                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="no-gutters input-right-icon">
                                        <div class="col">
                                            <div class="primary_input ">
                                                <input class="primary_input_field  primary_input_field date form-control form-control<?php echo e($errors->has('due_date') ? ' is-invalid' : ''); ?>" id="startDate" type="text"
                                                     name="due_date" value="<?php echo e(@dateConvert($feesInstallment->installment->due_date)); ?>" autocomplete="off">
                                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('fees.due_date'); ?> <span class="text-danger"> *</span></label>
                                                    
                                                <?php if($errors->has('due_date')): ?>
                                                <span class="text-danger" >
                                                    <?php echo e($errors->first('due_date')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <button class="" type="button">
                                            <i class="ti-calendar" id="admission-date-icon"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-5 text-center">
                                <button type="submit" class="primary-btn fix-gr-bg">
                                    <span class="ti-check"></span>
                                    <?php echo app('translator')->get('common.update'); ?>
                                </button>
                            </div>
    
                            <?php echo e(Form::close()); ?>

                           
                        </div>
    
                    </div>
                </div>
            </div>


            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </tbody>
  </table>

  <?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\feesCollection\directFees\studentFeesTableView.blade.php ENDPATH**/ ?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo app('translator')->get('inventory.sell_receipt'); ?></title>
    <style>
      
        .school-table-style {
            padding: 10px 0px!important;
        }
        .school-table-style tr th {
            font-size: 6px!important;
            text-align: left!important;
        }
        .school-table-style tr td {
            font-size: 7px!important;
            text-align: left!important;
            padding: 10px 0px!important;
        }
        .logo-image {
            width: 10%;
        }
    </style>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/css/style.css" />
</head>
<body>
    <?php  $setting = generalSetting();  if(!empty($setting->currency_symbol)){ generalSetting()->currency_symbol = $setting->currency_symbol; }else{ generalSetting()->currency_symbol = '$'; }   ?> 
 
    <table style="width: 100%;" tyle="width: 100%; table-layout: fixed">
        <tr>
             
            <td style="width: 30%"> 
                <img height="60px" width="120px" src="<?php echo e(url($setting->logo)); ?>" alt="<?php echo e(url($setting->logo)); ?>"> 
            </td> 
            <td  style="width: 70%">  
                <h3><?php echo e($setting->school_name); ?></h3>
                <h4><?php echo e($setting->address); ?></h4>
            </td> 
        </tr> 
    </table>
    <hr>

                        <div class="row">
                            <div class=" col-lg-12">
                                <?php
                                    $buyerDetails = '';
                                    if($viewData->role_id == 2){
                                        $buyerDetails = $viewData->studentDetails;
                                    }elseif($viewData->role_id == 3){
                                        $buyerDetails = $viewData->parentsDetails;
                                    }else{
                                        $buyerDetails = $viewData->staffDetails;
                                    }
                                ?>
                                <div class="row">
                                <div class="col-lg-6">
                                    <div class="customer-info">
                                        <h2><?php echo app('translator')->get('inventory.bill_to'); ?>:</h2>
                                    </div>
                                

                                
                                
                                    <div class="client-info">

                                        <h3><?php echo e($viewData->role_id == 3 ? $buyerDetails->fathers_name : $buyerDetails->full_name); ?></h3>
                                        <p>
                                            
                                            <?php if($viewData->role_id == "3"): ?>
                                                <?php echo e($buyerDetails->guardians_address); ?>

                                            <?php else: ?>
                                                <?php echo e($buyerDetails->current_address); ?>

                                            <?php endif; ?>
                                        </p>
                                    </div>
                                </div>
                                
                                <div class="col-lg-6">
                                    <div class="invoice-details-right">
                                        <h1 class="text-uppercase"><?php echo app('translator')->get('inventory.sell_receipt'); ?></h1>
                                        <div class="d-flex justify-content-between">
                                            <p class="fw-500 primary-color"><?php echo app('translator')->get('inventory.sell_date'); ?>:

                                        
                                            <?php echo e((isset($viewData)) ?  dateConvert($viewData->sell_date) : ''); ?></p>

                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="fw-500 primary-color"><?php echo app('translator')->get('inventory.reference_no'); ?>:#<?php echo e((isset($viewData)) ? $viewData->reference_no : ''); ?></p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="fw-500 primary-color"><?php echo app('translator')->get('inventory.payment_status'); ?>:
                                                <?php if($viewData->paid_status == 'P'): ?>
                                                <strong><?php echo app('translator')->get('fees.submit'); ?></strong>
                                                <?php elseif($viewData->paid_status == 'PP'): ?>
                                                <strong><?php echo app('translator')->get('inventory.partial_paid'); ?></strong>
                                        
                                                <?php elseif($viewData->paid_status == 'R'): ?>
                                                <strong><?php echo app('translator')->get('inventory.refund'); ?></strong>
                                                <?php else: ?>
                                                <strong><?php echo app('translator')->get('fees.unpaid'); ?></strong>
                                                <?php endif; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <hr>
                            </div>
                        </div>
        
	<table class="d-table table-responsive custom-table" cellspacing="0" width="100%" style="width: 100%; table-layout: fixed">
        <thead>
            <tr>
                <th width="40%">Description</th>
                <th width="20%">Quantity</th>
                <th width="20%">Price</th>
                <th width="20%">Amount</th>
            </tr>
        </thead>

        <tbody>

        <?php $sub_totals = 0; ?>
        <?php if(isset($editDataChildren)): ?>
        <?php $__currentLoopData = $editDataChildren; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($value->items !=""?$value->items->item_name:""); ?></td>
                <td><?php echo e($value->quantity); ?></td>
                <td><?php echo e(number_format( (float) $value->sell_price, 2, '.', '')); ?> </td>
                <td><?php echo e(number_format( (float) $value->sub_total, 2, '.', '')); ?></td>
            </tr>
            <?php $sub_totals += $value->sub_total; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

            
            <tr>
                <td></td>
                <td></td>
                <td class="fw-600 primary-color">Subtotal</td>
                <td><?php echo e(number_format( (float) $sub_totals, 2, '.', '')); ?></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td class="fw-600">Paid Amount</td>
                <td class="fw-600">
                <?php echo e((isset($viewData)) ? number_format( (float) $viewData->total_paid, 2, '.', '') : ''); ?>

                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td class="fw-600">Due Amount</td>
                <td class="fw-600">
                <?php echo e((isset($viewData)) ? number_format( (float) $viewData->total_due, 2, '.', '') : ''); ?>

                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td class="fw-600 text-dark">Total</td>
                <td class="fw-600 text-dark">
                <?php echo e((isset($viewData)) ? number_format( (float) $viewData->grand_total, 2, '.', '') : ''); ?>

                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\inventory\item_sell_print.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('inventory.purchase_details'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('inventory.purchase_details'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('inventory.inventory'); ?></a>
                <a href="<?php echo e(route('item-receive-list')); ?>"><?php echo app('translator')->get('inventory.item_receive_list'); ?></a>
                <a href="#"><?php echo app('translator')->get('inventory.purchase_details'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
<div class="container-fluid p-0">
    <div class="row">
            <div class="col-lg-12">
                <div class="white-box">
                   <div class="row mt-40">
                    <div class="col-lg-12">
                <!-- <div class="row">
                    <div class="col-lg-4 no-gutters">
                        <div class="main-title">
                            <h3 class="mb-0">Item Receive List</h3>
                        </div>
                    </div>
                </div> -->

                <div class="row" id="purchaseInvoice">
                    <div class="container-fluid">
                        <div class="row mb-20">
                            <div class="col-lg-4">
                                <div class="invoice-details-left">
                                    <div class="mb-20">
                                        <?php if(@$general_setting->logo): ?>
                                        <label>
                                            <img src="<?php echo e(asset('/')); ?><?php echo e($general_setting->logo); ?>" alt="">
                                        </label>
                                        <?php else: ?>
                                        <label for="companyLogo" class="company-logo">
                                            <i class="ti-image"></i> 
                                            <img src="<?php echo e(asset('/')); ?>" alt="">
                                        </label>
                                        <input id="companyLogo" type="file"/>
                                        <?php endif; ?>
                                    </div>

                                    <div class="business-info">
                                        <h3><?php echo e($general_setting->site_title); ?></h3>
                                        <p><?php echo e($general_setting->address); ?></p>
                                        <p><?php echo e($general_setting->email); ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="offset-lg-4 col-lg-4">
                                <div class="invoice-details-right">
                                    <h1 class="text-uppercase"><?php echo app('translator')->get('inventory.purchase_receipt'); ?></h1>
                                    <div class="d-flex justify-content-between">
                                        <p class="fw-500 primary-color"><?php echo app('translator')->get('inventory.receive_date'); ?>:</p>
                                       
                                        
                                <p><?php echo e($viewData != ""? dateConvert($viewData->receive_date):''); ?></p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p class="fw-500 primary-color"><?php echo app('translator')->get('inventory.reference_no'); ?>:</p>
                                        <p>#<?php echo e((isset($viewData)) ? $viewData->reference_no : ''); ?></p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p class="fw-500 primary-color"><?php echo app('translator')->get('inventory.payment_status'); ?>:</p>
                                        <p>
                                            <?php if($viewData->paid_status == 'P'): ?>
                                            <strong><?php echo app('translator')->get('inventory.paid'); ?></strong>
                                            <?php elseif($viewData->paid_status == 'PP'): ?>
                                            <strong><?php echo app('translator')->get('inventory.partial_paid'); ?></strong>
                                    
                                            <?php elseif($viewData->paid_status == 'R'): ?>
                                            <strong><?php echo app('translator')->get('inventory.refund'); ?></strong>
                                            <?php else: ?>
                                            <strong><?php echo app('translator')->get('fees.unpaid'); ?></strong>
                                            <?php endif; ?>
                                        </p>
                                    </div>

                                    <span class="primary-btn fix-gr-bg large mt-30">
                                         <?php echo e((isset($viewData)) ? currency_format((float) $viewData->grand_total) : ''); ?>

                                    </span>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="customer-info">
                                    <h2><?php echo app('translator')->get('inventory.bill_to'); ?>:</h2>
                                </div>

                                <div class="client-info">
                                    <h3><?php echo app('translator')->get('inventory.supplier_company_name'); ?>: <?php echo e((isset($viewData)) ? $viewData->suppliers->company_name : ''); ?></h3>
                                    <p><?php echo app('translator')->get('inventory.contact_name'); ?>: <?php echo e((isset($viewData)) ? $viewData->suppliers->contact_person_name : ''); ?></p>
                                    <p><?php echo app('translator')->get('inventory.company_address'); ?>: <?php echo e((isset($viewData)) ? $viewData->suppliers->company_address : ''); ?></p>
                                    <p><?php echo app('translator')->get('common.email'); ?>: <?php echo e((isset($viewData)) ? $viewData->suppliers->contact_person_email : ''); ?></p>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row mt-30 mb-50">
                            <div class="col-lg-12">
                                <table class="d-table table-responsive custom-table" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="40%"><?php echo app('translator')->get('inventory.item_name'); ?></th>
                                            <th width="20%"><?php echo app('translator')->get('inventory.quantity'); ?></th>
                                            <th width="20%"><?php echo app('translator')->get('inventory.price'); ?></th>
                                            <th width="20%"><?php echo app('translator')->get('accounts.amount'); ?></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php $sub_totals = 0; ?>
                                    <?php if(isset($editDataChildren)): ?>
                                    <?php $__currentLoopData = $editDataChildren; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($value->items !=""?$value->items->item_name:""); ?></td>
                                            <td><?php echo e($value->quantity); ?></td>
                                            <td><?php echo e(number_format( (float) $value->unit_price, 2, '.', '')); ?> </td>
                                            <td><?php echo e(number_format( (float) $value->sub_total, 2, '.', '')); ?></td>
                                        </tr>
                                        <?php $sub_totals += $value->sub_total; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                        
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td class="fw-600 primary-color"><?php echo app('translator')->get('inventory.sub_total'); ?></td>
                                            <td><?php echo e(number_format( (float) $sub_totals, 2, '.', '')); ?></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td class="fw-600"><?php echo app('translator')->get('inventory.paid_amount'); ?></td>
                                            <td class="fw-600">
                                            <?php echo e((isset($viewData)) ? number_format( (float) $viewData->total_paid, 2, '.', '') : ''); ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td class="fw-600"><?php echo app('translator')->get('inventory.due_amount'); ?></td>
                                            <td class="fw-600">
                                            <?php echo e((isset($viewData)) ? number_format( (float) $viewData->total_due, 2, '.', '') : ''); ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td class="fw-600 text-dark"><?php echo app('translator')->get('exam.result'); ?></td>
                                            <td class="fw-600 text-dark">
                                            <?php echo e((isset($viewData)) ? number_format( (float) $viewData->grand_total, 2, '.', '') : ''); ?>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    
                    </div>
                </div>
                <div class="row mt-40">
                        <div class="col-lg-12 text-center">
                            <button class="primary-btn fix-gr-bg" onclick="javascript:printDiv('purchaseInvoice')"><?php echo app('translator')->get('common.print'); ?></button>
                        </div>
                      </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\inventory\viewItemReceive.blade.php ENDPATH**/ ?>
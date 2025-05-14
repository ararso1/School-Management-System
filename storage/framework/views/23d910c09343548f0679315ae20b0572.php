<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('inventory.item_sell_list'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<?php  $setting = generalSetting(); if(!empty($setting->currency_symbol)){ $currency = $setting->currency_symbol; }else{ $currency = '$'; } ?>

<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('inventory.item_sell_list'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('inventory.inventory'); ?></a>
                <a href="#"><?php echo app('translator')->get('inventory.item_sell_list'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-8 col-md-6">
                
            </div>
             <?php if(userPermission('save-item-sell-data')): ?>
            <div class="col-lg-4 text-md-right text-left col-md-6 mb-30-lg">
                <a href="<?php echo e(route('item-sell')); ?>" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus pr-2"></span>
                    <?php echo app('translator')->get('inventory.new_item_sell'); ?>
                </a>
            </div>
            <?php endif; ?>
        </div>

 <div class="row mt-20">
        <div class="col-lg-12">
            <div class="white-box">
                <div class="row">
                    <div class="col-lg-4 no-gutters">
                        <div class="main-title">
                            <h3 class="mb-15"><?php echo app('translator')->get('inventory.item_sell_list'); ?></h3>
                        </div>
                    </div>
                </div>
    
             <div class="row">
                    <div class="col-lg-12">
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
                            <table id="table_id" class="table" cellspacing="0" width="100%">
                                <thead>
                                
                                    <tr>
                                        <th><?php echo app('translator')->get('common.sl'); ?></th>
                                        <th><?php echo app('translator')->get('inventory.reference_no'); ?></th>
                                        <th><?php echo app('translator')->get('inventory.role_name'); ?></th>
                                        <th><?php echo app('translator')->get('inventory.buyer_name'); ?></th>
                                        <th><?php echo app('translator')->get('common.date'); ?></th>
                                        <th><?php echo app('translator')->get('inventory.grand_total'); ?></th>
                                        <th><?php echo app('translator')->get('inventory.total_quantity'); ?></th>
                                        <th><?php echo app('translator')->get('inventory.paid'); ?></th>
                                        <th><?php echo app('translator')->get('inventory.balance'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                                        <th><?php echo app('translator')->get('common.status'); ?></th>
                                        <th><?php echo app('translator')->get('common.action'); ?></th>
                                    </tr>
                                </thead>
    
                                <tbody>
                                    <?php if(isset($allItemSellLists)): ?>
                                    <?php $__currentLoopData = $allItemSellLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($key+1); ?></td>
                                        <td><?php echo e($value->reference_no); ?></td>
                                        <td><?php echo e($value->roles->name); ?></td>
                                        <?php if($value->role_id == 2): ?>
                                        <?php
                                        $getBuyerDetails = $value->studentDetails;
                                        ?>
    
    
                                        <?php elseif($value->role_id == 3): ?>
    
                                        <?php
                                        $getBuyerDetails = $value->parentsDetails;
                                        ?>
    
                                        <?php else: ?>
    
                                        <?php
                                        $getBuyerDetails = $value->staffDetails;
                                        ?>
                                        <?php endif; ?>
    
                                        <td>
                                        <?php if(!empty($getBuyerDetails)): ?>
                                        <?php echo e($value->role_id == 3? $getBuyerDetails->fathers_name:$getBuyerDetails->full_name); ?>

                                        <?php endif; ?>
                                        </td>
                                        <td  data-sort="<?php echo e(strtotime($value->sell_date)); ?>">
                                        <?php echo e($value->sell_date != ""? dateConvert($value->sell_date):''); ?>

                                        </td>
                                        
                                        <td><?php echo e(number_format( (float) $value->grand_total, 2, '.', '')); ?></td>
                                        <td><?php echo e($value->total_quantity); ?></td>
                                        <td><?php echo e(number_format( (float) $value->total_paid, 2, '.', '')); ?></td>
                                        <td><?php echo e(number_format( (float) $value->total_due, 2, '.', '')); ?></td>
                                        <td>
                                            <?php if($value->paid_status == 'P'): ?>
                                            <button class="primary-btn small bg-success text-white border-0"><?php echo app('translator')->get('inventory.paid'); ?></button>
                                            <?php elseif($value->paid_status == 'PP'): ?>
                                            <button class="primary-btn small bg-warning text-white border-0"><?php echo app('translator')->get('inventory.partial'); ?></button>
                                            <?php elseif($value->paid_status == 'U'): ?>
                                            <button class="primary-btn small bg-danger text-white border-0"><?php echo app('translator')->get('inventory.unpaid'); ?></button>
                                            <?php else: ?>
                                            <button class="primary-btn small bg-info text-white border-0"><?php echo app('translator')->get('inventory.refund'); ?></button>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if (isset($component)) { $__componentOriginalf5ee9bc45d6af00850b10ff7521278be = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf5ee9bc45d6af00850b10ff7521278be = $attributes; } ?>
<?php $component = App\View\Components\DropDown::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('drop-down'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\DropDown::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                    <a class="dropdown-item" href="<?php echo e(route('view-item-sell', $value->id)); ?>"><?php echo app('translator')->get('common.view'); ?></a>
                                                    <?php
                                                    $itemPaymentdetails = App\SmInventoryPayment::itemPaymentdetails($value->id);
                                                    ?>
    
                                                    <?php if($value->paid_status != 'R'): ?>
                                                    <?php if($itemPaymentdetails == 0): ?>
                                                    <?php if(userPermission('edit-item-sell')): ?>
                                                    <a class="dropdown-item" href="<?php echo e(route('edit-item-sell', 
                                                    $value->id)); ?>"><?php echo app('translator')->get('common.edit'); ?></a>
                                                    <?php endif; ?>
                                                    <?php endif; ?>
                                                    <?php endif; ?>
    
                                                    <?php if($value->paid_status != 'R'): ?>
                                                    <?php if($value->total_due > 0): ?>
                                                    <?php if(userPermission('add-payment-sell')): ?>
                                                    <a class="dropdown-item modalLink" title="<?php echo app('translator')->get('inventory.add_payment'); ?>" data-modal-size="modal-md" href="<?php echo e(route('add-payment-sell', $value->id)); ?>"><?php echo app('translator')->get('common.add_payment'); ?></a>
                                                    <?php endif; ?>
                                                    <?php endif; ?>
                                                    <?php endif; ?>
    
                                                    <?php if($value->paid_status != 'P'): ?>
                                                    <?php if(userPermission('view-sell-payments')): ?>
                                                    <a class="dropdown-item modalLink" data-modal-size="modal-lg" title="<?php echo app('translator')->get('inventory.view_payment'); ?>" href="<?php echo e(route('view-sell-payments', $value->id)); ?>"><?php echo app('translator')->get('inventory.view_payment'); ?></a>
                                                    <?php endif; ?>
                                                    <?php endif; ?>
    
                                                        <?php if($value->paid_status != 'R'): ?>
                                                        <?php if($value->total_paid == 0): ?>
                                                        <?php if(userPermission('delete-item-sale-view')): ?>
                                                        <a class="dropdown-item deleteUrl" data-modal-size="modal-md" title="<?php echo app('translator')->get('inventory.delete_sold_item'); ?>" href="<?php echo e(route('delete-item-sale-view', $value->id)); ?>"><?php echo app('translator')->get('common.delete'); ?></a>
                                                        <?php endif; ?>
                                                        <?php endif; ?>
                                                        <?php endif; ?>
    
                                                        <?php if($value->paid_status != 'R'): ?>
                                                        <?php if($value->total_paid>0): ?>
    
                                                        <a class="dropdown-item deleteUrl" data-modal-size="modal-md" title="Cancel Item Sell" href="<?php echo e(route('cancel-item-sell-view', $value->id)); ?>"><?php echo app('translator')->get('common.cancel'); ?></a>
                                                        <?php endif; ?>
                                                        <?php endif; ?>
    
                                                
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf5ee9bc45d6af00850b10ff7521278be)): ?>
<?php $attributes = $__attributesOriginalf5ee9bc45d6af00850b10ff7521278be; ?>
<?php unset($__attributesOriginalf5ee9bc45d6af00850b10ff7521278be); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf5ee9bc45d6af00850b10ff7521278be)): ?>
<?php $component = $__componentOriginalf5ee9bc45d6af00850b10ff7521278be; ?>
<?php unset($__componentOriginalf5ee9bc45d6af00850b10ff7521278be); ?>
<?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
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
                    </div>
                </div>
            </div>
            </div>
    </div>
</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\inventory\itemSellList.blade.php ENDPATH**/ ?>
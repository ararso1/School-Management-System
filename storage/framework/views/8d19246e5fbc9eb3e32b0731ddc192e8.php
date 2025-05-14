<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('common.edit_receive_details'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <style type="text/css">
        #productTable tbody tr {
            border-bottom: 1px solid #FFFFFF !important;
        }

        .ti-calendar:before {
            position: relative !important;
            bottom: 47px !important;
            left: 312px !important;
        }
    </style>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('common.edit_receive_details'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('inventory.inventory'); ?></a>
                    <a href="<?php echo e(route('item-receive-list')); ?>"><?php echo app('translator')->get('inventory.item_receive_list'); ?></a>
                    <a href="#"><?php echo app('translator')->get('common.edit_receive_details'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area">
        <div class="container-fluid p-0">
            <?php if(isset($editData)): ?>
                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => ['update-edit-item-receive-data', $editData->id], 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'item-receive-form'])); ?>

            <?php else: ?>
                <?php echo e(Form::open([
                    'class' => 'form-horizontal',
                    'files' => true,
                    'route' => 'save-item-receive-data',
                    'method' => 'POST',
                    'enctype' => 'multipart/form-data',
                ])); ?>

            <?php endif; ?>
            <div class="row">
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-title">
                                <h3 class="mb-30">
                                    <?php if(isset($editData)): ?>
                                        <?php echo app('translator')->get('common.edit_receive_details'); ?>
                                    <?php else: ?>
                                        <?php echo app('translator')->get('inventory.receive_details'); ?>
                                    <?php endif; ?>
                                </h3>
                            </div>

                            <div class="white-box">
                                <div class="add-visitor">
                                    <div class="row">
                                        <div class="col-lg-12 mb-30">
                                            <div class="primary_input">
                                                <select
                                                    class="primary_select  form-control<?php echo e($errors->has('expense_head_id') ? ' is-invalid' : ''); ?>"
                                                    name="expense_head_id" id="expense_head_id">
                                                    <option data-display="<?php echo app('translator')->get('accounts.expense_head'); ?> *" value="">
                                                        <?php echo app('translator')->get('common.select'); ?></option>
                                                    <?php if(isset($expense_head)): ?>
                                                        <?php $__currentLoopData = $expense_head; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($value->id); ?>"
                                                                <?php if(isset($editData)): ?> <?php if($editData->expense_head_id == $value->id): ?>
                                                    <?php echo app('translator')->get('inventory.selected'); ?> <?php endif; ?>
                                                                <?php endif; ?>
                                                                ><?php echo e($value->head); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </select>
                                                <div class="text-danger" id="expenseError"></div>

                                                <?php if($errors->has('expense_head_id')): ?>
                                                    <span class="text-danger invalid-select" role="alert">
                                                        <?php echo e($errors->first('expense_head_id')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-30">
                                            <div class="primary_input">
                                                <select class="primary_select  form-control" name="payment_method"
                                                    id="edit_payment_method">
                                                    <?php if(@$editData->paymentMethodName->method == 'Bank'): ?>
                                                        <option data-string="<?php echo e(@$editData->paymentMethodName->method); ?>"
                                                            value="<?php echo e(@$editData->payment_method); ?>" selected>
                                                            <?php echo e(@$editData->paymentMethodName->method); ?></option>
                                                    <?php else: ?>
                                                        <?php $__currentLoopData = $paymentMethhods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if(isset($editData)): ?>
                                                                <option data-string="<?php echo e($value->method); ?>"
                                                                    value="<?php echo e($value->id); ?>"
                                                                    <?php echo e(@$editData->payment_method == $value->id ? 'selected' : ''); ?>>
                                                                    <?php echo e($value->method); ?></option>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </select>
                                                <div class="text-danger" id="paymentError"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-30 d-none" id="edit_item_receive_bankAccount">
                                            <div class="primary_input">
                                                <select
                                                    class="primary_select  form-control<?php echo e($errors->has('bank_id') ? ' is-invalid' : ''); ?>"
                                                    name="bank_id" id="account_id">
                                                    <?php if(isset($editData)): ?>
                                                        <option value="<?php echo e($editData->account_id); ?>" selected>
                                                            <?php echo e(@$editData->bankName->account_name); ?>

                                                            (<?php echo e(@$editData->bankName->bank_name); ?>)</option>
                                                    <?php endif; ?>
                                                </select>

                                                <?php if($errors->has('bank_id')): ?>
                                                    <span class="text-danger invalid-select" role="alert">
                                                        <?php echo e($errors->first('bank_id')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-20">
                                            <div class="primary_input">
                                                <select
                                                    class="primary_select  form-control<?php echo e($errors->has('supplier_id') ? ' is-invalid' : ''); ?>"
                                                    name="supplier_id" id="supplier_id">
                                                    <option data-display="<?php echo app('translator')->get('common.select_supplier'); ?> *" value="">
                                                        <?php echo app('translator')->get('common.select'); ?></option>
                                                    <?php if(isset($suppliers)): ?>
                                                        <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($value->id); ?>"
                                                                <?php if(isset($editData)): ?> <?php if($editData->supplier_id == $value->id): ?>
                                                    selected <?php endif; ?>
                                                                <?php endif; ?>
                                                                ><?php echo e($value->company_name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </select>
                                                <div class="text-danger" id="supplierError"></div>

                                                <?php if($errors->has('supplier_id')): ?>
                                                    <span class="text-danger invalid-select" role="alert">
                                                        <?php echo e($errors->first('supplier_id')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 mb-20">
                                            <div class="primary_input">
                                                <select
                                                    class="primary_select  form-control<?php echo e($errors->has('store_id') ? ' is-invalid' : ''); ?>"
                                                    name="store_id" id="store_id">
                                                    <option
                                                        data-display="<?php echo app('translator')->get('common.select_store'); ?>/<?php echo app('translator')->get('inventory.warehouse'); ?> *"
                                                        value=""><?php echo app('translator')->get('common.select'); ?></option>
                                                    <?php if(isset($itemStores)): ?>
                                                        <?php $__currentLoopData = $itemStores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($value->id); ?>"
                                                                <?php if(isset($editData)): ?> <?php if($editData->store_id == $value->id): ?>
                                                    selected <?php endif; ?>
                                                                <?php endif; ?>
                                                                ><?php echo e($value->store_name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </select>
                                                <div class="text-danger" id="storeError"></div>

                                                <?php if($errors->has('store_id')): ?>
                                                    <span class="text-danger invalid-select" role="alert">
                                                        <?php echo e($errors->first('store_id')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 mb-20">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('inventory.reference_no'); ?>
                                                    <span></span> </label>
                                                <input
                                                    class="primary_input_field form-control<?php echo e($errors->has('reference_no') ? ' is-invalid' : ''); ?>"
                                                    type="text" name="reference_no" autocomplete="off"
                                                    value="<?php echo e(isset($editData) ? $editData->reference_no : ''); ?>">

                                                <?php if($errors->has('reference_no')): ?>
                                                    <span class="text-danger">
                                                        <?php echo e($errors->first('reference_no')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 no-gutters input-right-icon">
                                            <div class="col">
                                                <div class="primary_input">
                                                    <label class="primary_input_label"
                                                        for=""><?php echo app('translator')->get('inventory.receive_date'); ?>
                                                        <span></span> </label>
                                                    <input
                                                        class="primary_input_field  primary_input_field date form-control form-control<?php echo e($errors->has('from_date') ? ' is-invalid' : ''); ?>"
                                                        id="receive_date" type="text"
                                                        name="receive_date"
                                                        value="<?php echo e(isset($editData) ? date('m/d/Y', strtotime($editData->receive_date)) : ''); ?>"
                                                        autocomplete="off">

                                                    <?php if($errors->has('receive_date')): ?>
                                                        <span class="text-danger">
                                                            <?php echo e($errors->first('receive_date')); ?></span>
                                                    <?php endif; ?>
                                                    <button class="" type="button">
                                                        <i class="ti-calendar" id="receive_date_icon"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 mb-20">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('common.description'); ?>
                                                    <span></span> </label>
                                                <textarea class="primary_input_field form-control" cols="0" rows="4"
                                                    name="description"
                                                    id="description"><?php echo e(isset($editData) ? $editData->description : ''); ?></textarea>


                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-9">

                    <div class="row">
                        <div class="col-lg-4 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-30"><?php echo app('translator')->get('inventory.item_receive'); ?></h3>
                            </div>
                        </div>

                        <div class="offset-lg-6 col-lg-2 text-right col-md-6">
                            <button type="button" class="primary-btn small fix-gr-bg" onclick="addRow();"
                                id="addRowBtn">
                                <span class="ti-plus pr-2"></span>
                                <?php echo app('translator')->get('common.add'); ?>
                            </button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="white-box">
                                <div class="alert alert-danger" id="errorMessage2">
                                    <div id="itemError"></div>
                                    <div id="priceError"></div>
                                    <div id="quantityError"></div>

                                </div>
                                <table class="table" id="productTable">
                                    <thead>
                                        <tr>
                                            <th><?php echo app('translator')->get('inventory.product_name'); ?></th>
                                            <th><?php echo app('translator')->get('inventory.unit_price'); ?></th>
                                            <th><?php echo app('translator')->get('inventory.quantity'); ?></th>
                                            <th><?php echo app('translator')->get('inventory.sub_total'); ?></th>
                                            <th><?php echo app('translator')->get('common.action'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 0;
                                            $j = 0;
                                            $total_quantity = 0;
                                            $grand_total = 0;
                                        ?>
                                        <?php if(isset($editDataChildren)): ?>

                                            <?php $__currentLoopData = $editDataChildren; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $editDataValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr id="row<?php echo e(++$i); ?>" class="<?php echo e($j++); ?>">
                                                    <td>
                                                        <input type="hidden" name="url" id="url"
                                                            value="<?php echo e(URL::to('/')); ?>">
                                                        <div class="primary_input">
                                                            <select
                                                                class="primary_select  form-control<?php echo e($errors->has('item_id') ? ' is-invalid' : ''); ?>"
                                                                name="item_id[]" id="productName<?php echo e($i); ?>">
                                                                <option data-display="<?php echo app('translator')->get('common.select_item'); ?> " value="">
                                                                    <?php echo app('translator')->get('common.select'); ?></option>

                                                                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($value->id); ?>"
                                                                        <?php if(isset($editDataChildren)): ?> <?php if($editDataValue->item_id == $value->id): ?>
                                                        selected <?php endif; ?>
                                                                        <?php endif; ?>
                                                                        ><?php echo e($value->item_name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>

                                                            <?php if($errors->has('item_id')): ?>
                                                                <span class="text-danger invalid-select" role="alert">
                                                                    <?php echo e($errors->first('item_id')); ?>

                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="primary_input">
                                                            <input
                                                                class="primary_input_field form-control<?php echo e($errors->has('unit_price') ? ' is-invalid' : ''); ?>"
                                                                type="text" id="unit_price<?php echo e($i); ?>"
                                                                name="unit_price[]" autocomplete="off"
                                                                value="<?php echo e(isset($editDataChildren) ? $editDataValue->unit_price : ''); ?>"
                                                                onkeyup="getTotalByPrice(<?php echo e($i); ?>)">


                                                            <?php if($errors->has('unit_price')): ?>
                                                                <span class="text-danger">
                                                                    <?php echo e($errors->first('unit_price')); ?>

                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="primary_input">
                                                            <input
                                                                class="primary_input_field form-control<?php echo e($errors->has('quantity') ? ' is-invalid' : ''); ?>"
                                                                type="text" id="quantity<?php echo e($i); ?>"
                                                                name="quantity[]" autocomplete="off"
                                                                onkeyup="getTotal(<?php echo e($i); ?>);"
                                                                value="<?php echo e(isset($editDataChildren) ? $editDataValue->quantity : ''); ?>">


                                                            <?php if($errors->has('quantity')): ?>
                                                                <span class="text-danger">
                                                                    <?php echo e($errors->first('quantity')); ?>

                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="primary_input">
                                                            <input
                                                                class="primary_input_field form-control<?php echo e($errors->has('sub_total') ? ' is-invalid' : ''); ?>"
                                                                type="text" name="total[]"
                                                                id="total<?php echo e($i); ?>" autocomplete="off"
                                                                value="<?php echo e(isset($editDataChildren) ? number_format((float) $editDataValue->sub_total, 2, '.', '') : ''); ?>">


                                                            <?php if($errors->has('sub_total')): ?>
                                                                <span class="text-danger">
                                                                    <?php echo e($errors->first('sub_total')); ?>

                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                        <input type="hidden" name="totalValue[]"
                                                            id="totalValue<?php echo e($i); ?>" autocomplete="off"
                                                            class="form-control"
                                                            value="<?php echo e(isset($editDataChildren) ? $editDataValue->sub_total : ''); ?>" />
                                                    </td>
                                                    <td>
                                                        <button class="primary-btn icon-only fix-gr-bg" type="button">
                                                            <span class="ti-trash"></span>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <?php
                                                    $total_quantity += $editDataValue->quantity;
                                                    $grand_total += $editDataValue->sub_total;
                                                ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    <tfoot>
                                        <tr>
                                            <th colspan="2"><?php echo app('translator')->get('exam.result'); ?></th>
                                            <th>

                                                <input type="text" class="primary_input_field form-control"
                                                    id="subTotalQuantity" name="subTotalQuantity" placeholder="0"
                                                    readonly=""
                                                    value="<?php echo e(isset($editDataChildren) ? $total_quantity : ''); ?>" />

                                                <input type="hidden" class="form-control" id="subTotalQuantityValue"
                                                    value="<?php echo e(isset($editDataChildren) ? $total_quantity : ''); ?>"
                                                    name="subTotalQuantityValue" />

                                            </th>

                                            <th>
                                                <input type="text" class="primary_input_field form-control"
                                                    id="subTotal" name="subTotal" placeholder="0.00" readonly=""
                                                    value="<?php echo e(number_format((float) $grand_total, 2, '.', '')); ?>" />

                                                <input type="hidden" class="form-control" id="subTotalValue"
                                                    name="subTotalValue"
                                                    value="<?php echo e(number_format((float) $grand_total, 2, '.', '')); ?>" />

                                            </th>
                                            <th></th>
                                        </tr>
                                    </tfoot>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-30">
                        <div class="col-lg-12">
                            <div class="white-box">
                                <div class="row">
                                    <div class="col-lg-4 mt-30-md">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <!-- <input class="primary_input_field" id="full_paid" type="checkbox" value="1" name="full_paid"
                            <?php if($editData->paid_status == 'P'): ?> checked <?php endif; ?>
                            > Full Paid
                             -->

                                                <input type="checkbox" id="full_paid"
                                                    class="common-checkbox form-control" name="full_paid" value="1"
                                                    <?php if($editData->paid_status == 'P'): ?> checked <?php endif; ?>>
                                                <label for="full_paid"><?php echo app('translator')->get('inventory.full_paid'); ?></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 mt-30-md">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <input class="primary_input_field" type="text" name="totalPaid"
                                                    id="totalPaid" onkeyup="paidAmount();"
                                                    value="<?php echo e(isset($editData) ? $editData->total_paid : ''); ?>">
                                                <input type="hidden" id="totalPaidValue" name="totalPaidValue">
                                                <label class="primary_input_label"
                                                    for=""><?php echo app('translator')->get('inventory.total_paid'); ?></label>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mt-30-md">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <input class="primary_input_field" type="text"
                                                    value="<?php echo e(isset($editData) ? number_format((float) $editData->total_due, 2, '.', '') : ''); ?>"
                                                    id="totalDue" readonly>
                                                <input type="hidden" id="totalDueValue" name="totalDueValue"
                                                    value="<?php echo e(isset($editData) ? $editData->total_due : ''); ?>">
                                                <label class="primary_input_label"
                                                    for=""><?php echo app('translator')->get('inventory.total_due'); ?></label>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-20 text-center">
                                        <button class="primary-btn fix-gr-bg">
                                            <span class="ti-check"></span>
                                            <?php echo app('translator')->get('common.update'); ?>
                                        </button>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\inventory\editItemReceive.blade.php ENDPATH**/ ?>
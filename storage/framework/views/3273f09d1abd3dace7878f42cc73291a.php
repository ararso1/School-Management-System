 
 <?php $__env->startSection('title'); ?>
     <?php echo app('translator')->get('inventory.item_receive'); ?>
 <?php $__env->stopSection(); ?>
 <?php $__env->startSection('mainContent'); ?>
     <style type="text/css">
         #productTable tbody tr {
             border-bottom: 1px solid #FFFFFF !important;
         }

         #productTable tbody tr td {
             min-width: 150px;
         }
     </style>
     <section class="sms-breadcrumb mb-20">
         <div class="container-fluid">
             <div class="row justify-content-between">
                 <h1><?php echo app('translator')->get('inventory.item_receive'); ?></h1>
                 <div class="bc-pages">
                     <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                     <a href="#"><?php echo app('translator')->get('inventory.inventory'); ?></a>
                     <a href="#"><?php echo app('translator')->get('inventory.item_receive'); ?></a>
                 </div>
             </div>
         </div>
     </section>
     <section class="admin-visitor-area">
         <div class="container-fluid p-0">
             <?php if(isset($editData)): ?>
                 <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => ['item-list-update', $editData->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data'])); ?>

             <?php else: ?>
                 <?php if(userPermission('save-item-receive-data')): ?>
                     <?php echo e(Form::open([
                         'class' => 'form-horizontal',
                         'files' => true,
                         'route' => 'save-item-receive-data',
                         'method' => 'POST',
                         'enctype' => 'multipart/form-data',
                         'id' => 'item-receive-form',
                     ])); ?>

                 <?php endif; ?>
             <?php endif; ?>
             <div class="row">

                 <div class="col-lg-3">
                     <div class="row">
                         <div class="col-lg-12">
                             <div class="white-box">
                                <div class="main-title">
                                    <h3 class="mb-15">
                                        <?php if(isset($editData)): ?>
                                            <?php echo app('translator')->get('common.edit_receive_details'); ?>
                                        <?php else: ?>
                                            <?php echo app('translator')->get('inventory.receive_details'); ?>
                                        <?php endif; ?>
   
                                    </h3>
                                </div>
                                 <div class="add-visitor">
                                     <div class="row">
                                         <div class="col-lg-12 mb-15">
                                             <div class="primary_input">
                                                 <label class="primary_input_label" for=""><?php echo app('translator')->get('inventory.expense_head'); ?> <span
                                                         class="text-danger"> *</span> </label>
                                                 <select
                                                     class="primary_select  form-control<?php echo e($errors->has('expense_head_id') ? ' is-invalid' : ''); ?>"
                                                     name="expense_head_id" id="expense_head_id">
                                                     <option data-display="<?php echo app('translator')->get('inventory.expense_head'); ?> *" value="">
                                                         <?php echo app('translator')->get('common.select'); ?></option>
                                                     <?php if(isset($expense_head)): ?>
                                                         <?php $__currentLoopData = $expense_head; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                             <option value="<?php echo e($value->id); ?>"><?php echo e($value->head); ?>

                                                             </option>
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
                                         <div class="col-lg-12 mb-15">
                                             <div class="primary_input">
                                                 <label class="primary_input_label" for=""><?php echo app('translator')->get('inventory.payment_method'); ?> <span
                                                         class="text-danger"> *</span> </label>
                                                 <select
                                                     class="primary_select  form-control<?php echo e($errors->has('payment_method') ? ' is-invalid' : ''); ?>"
                                                     name="payment_method"
                                                     id="item_receive_payment_method">
                                                     <option data-display="<?php echo app('translator')->get('inventory.payment_method'); ?>*" value="">
                                                         <?php echo app('translator')->get('inventory.payment_method'); ?>*</option>
                                                     <?php $__currentLoopData = $paymentMethhods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                         <option data-string="<?php echo e($value->method); ?>"
                                                             value="<?php echo e($value->id); ?>"><?php echo e($value->method); ?></option>
                                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                 </select>
                                                 <div class="text-danger" id="paymentError"></div>

                                                 <?php if($errors->has('payment_method')): ?>
                                                     <span class="text-danger invalid-select" role="alert">
                                                         <?php echo e($errors->first('payment_method')); ?>

                                                     </span>
                                                 <?php endif; ?>
                                             </div>
                                         </div>
                                         <div class="col-lg-12 mb-15 d-none" id="itemReceivebankAccount">
                                             <div class="primary_input">
                                                 <label class="primary_input_label" for=""><?php echo app('translator')->get('inventory.bank'); ?>
                                                     <span></span> </label>
                                                 <select
                                                     class="primary_select  form-control<?php echo e($errors->has('bank_id') ? ' is-invalid' : ''); ?>"
                                                     name="bank_id" id="account_id">
                                                     <?php if(isset($account_id)): ?>
                                                         <?php $__currentLoopData = $account_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                             <option value="<?php echo e($value->id); ?>">
                                                                 <?php echo e($value->account_name); ?> (<?php echo e($value->bank_name); ?>)
                                                             </option>
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
                                         <div class="col-lg-12 mb-15">
                                             <div class="primary_input">
                                                 <label class="primary_input_label" for=""><?php echo app('translator')->get('inventory.supplier'); ?> <span
                                                         class="text-danger"> *</span> </label>
                                                 <select
                                                     class="primary_select  form-control<?php echo e($errors->has('supplier_id') ? ' is-invalid' : ''); ?>"
                                                     name="supplier_id" id="supplier_id">
                                                     <option data-display=" <?php echo app('translator')->get('inventory.select_supplier'); ?> *" value="">
                                                         <?php echo app('translator')->get('common.select'); ?></option>
                                                     <?php if(isset($suppliers)): ?>
                                                         <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                             <option value="<?php echo e($value->id); ?>"
                                                                 <?php if(isset($editData)): ?> <?php if($editData->category_name == $value->id): ?>
                                                    <?php echo app('translator')->get('inventory.selected'); ?> <?php endif; ?>
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

                                         <div class="col-lg-12 mb-15">
                                             <div class="primary_input">
                                                 <label class="primary_input_label" for=""><?php echo app('translator')->get('inventory.store_warehouse'); ?> <span
                                                         class="text-danger"> *</span> </label>
                                                 <select
                                                     class="primary_select  form-control<?php echo e($errors->has('store_id') ? ' is-invalid' : ''); ?>"
                                                     name="store_id" id="store_id">
                                                     <option data-display="<?php echo app('translator')->get('inventory.select_store_warehouse'); ?> *" value="">
                                                         <?php echo app('translator')->get('common.select'); ?></option>
                                                     <?php if(isset($itemStores)): ?>
                                                         <?php $__currentLoopData = $itemStores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                             <option value="<?php echo e($value->id); ?>"
                                                                 <?php if(isset($editData)): ?> <?php if($editData->category_name == $value->id): ?>
                                                        <?php echo app('translator')->get('inventory.selected'); ?> <?php endif; ?>
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

                                         <div class="col-lg-12 mb-15">
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

                                         <div class="col-lg-12 mb-15">
                                             <div class="primary_input">
                                                 <label class="primary_input_label" for=""><?php echo app('translator')->get('inventory.receive_date'); ?>
                                                     <span></span> </label>
                                                 <div class="primary_datepicker_input">
                                                     <div class="no-gutters input-right-icon">
                                                         <div class="col">
                                                             <div class="">
                                                                 <input
                                                                     class="primary_input_field primary_input_field date form-control"
                                                                     id="receive_date" type="text"
                                                                     name="receive_date"
                                                                     value="<?php echo e(isset($editData) ? date('m/d/Y', strtotime($editData->receive_date)) : date('m/d/Y')); ?>"
                                                                     autocomplete="off">
                                                             </div>
                                                         </div>
                                                         <button class="btn-date" data-id="#receive_date" type="button">
                                                             <label class="m-0 p-0" for="receive_date">
                                                                 <i class="ti-calendar" id="start-date-icon"></i>
                                                             </label>
                                                         </button>
                                                     </div>
                                                 </div>
                                                 <span class="text-danger"><?php echo e($errors->first('receive_date')); ?></span>
                                             </div>
                                         </div>

                                         <div class="col-lg-12 mb-20">
                                             <div class="primary_input">
                                                 <label class="primary_input_label" for=""><?php echo app('translator')->get('common.description'); ?>
                                                     <span></span> </label>
                                                 <textarea class="primary_input_field form-control" cols="0" rows="4" name="description"
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
                     <div class="white-box">
                        <div class="row xm_3 aling-tiems-center">
                            <div class="col-lg-4 no-gutters col-6 xs_mt_0">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php echo app('translator')->get('inventory.item_receive'); ?></h3>
                                </div>
                            </div>
   
                            <div class="offset-lg-6 col-lg-2 col-6 text-right col-md-6 col-5">
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
                                    <div class="table-responsive">
                                       <table class="table" id="productTable">
                                           <thead>
                                               <tr>
                                                   <th> <?php echo app('translator')->get('inventory.product_name'); ?>* </th>
                                                   <th> <?php echo app('translator')->get('inventory.unit_price'); ?>* </th>
                                                   <th> <?php echo app('translator')->get('inventory.quantity'); ?>* </th>
                                                   <th><?php echo app('translator')->get('inventory.sub_total'); ?></th>
                                                   <th><?php echo app('translator')->get('common.action'); ?></th>
                                               </tr>
                                           </thead>
                                           <tbody>
                                               <tr id="row1" class="0">
                                                   <td class="border-top-0">
                                                       <input type="hidden" name="url" id="url"
                                                           value="<?php echo e(URL::to('/')); ?>">
                                                       <div class="primary_input">
                                                           <select
                                                               class="primary_select  form-control<?php echo e($errors->has('category_name') ? ' is-invalid' : ''); ?>"
                                                               name="item_id[]" id="productName1">
                                                               <option data-display="<?php echo app('translator')->get('common.select_item'); ?>*" value="">
                                                                   <?php echo app('translator')->get('common.select'); ?>*</option>
                                                               <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                   <option value="<?php echo e($value->id); ?>"
                                                                       <?php if(isset($editData)): ?> <?php if($editData->category_name == $value->id): ?>
                                                  <?php echo app('translator')->get('inventory.selected'); ?> <?php endif; ?>
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
                                                   <td class="border-top-0">
                                                       <div class="primary_input">
                                                           <input oninput="numberCheckWithDot(this)"
                                                               class="primary_input_field form-control<?php echo e($errors->has('unit_price') ? ' is-invalid' : ''); ?>"
                                                               type="text" step="0.1" id="unit_price1"
                                                               name="unit_price[]" autocomplete="off"
                                                               value="<?php echo e(isset($editData) ? $editData->unit_price : ''); ?>"
                                                               onkeyup="getTotalByPrice(1)">
      
      
                                                           <?php if($errors->has('unit_price')): ?>
                                                               <span class="text-danger">
                                                                   <?php echo e($errors->first('unit_price')); ?>

                                                               </span>
                                                           <?php endif; ?>
                                                       </div>
                                                   </td>
                                                   <td class="border-top-0">
                                                       <div class="primary_input">
                                                           <input oninput="numberCheckWithDot(this)"
                                                               class="primary_input_field form-control<?php echo e($errors->has('quantity') ? ' is-invalid' : ''); ?>"
                                                               type="text" id="quantity1" name="quantity[]"
                                                               autocomplete="off" onkeyup="getTotal(1);"
                                                               value="<?php echo e(isset($editData) ? $editData->quantity : ''); ?>">
      
      
                                                           <?php if($errors->has('quantity')): ?>
                                                               <span class="text-danger">
                                                                   <?php echo e($errors->first('quantity')); ?>

                                                               </span>
                                                           <?php endif; ?>
                                                       </div>
                                                   </td>
                                                   <td class="border-top-0">
                                                       <div class="primary_input">
                                                           <input oninput="numberCheckWithDot(this)"
                                                               class="primary_input_field form-control<?php echo e($errors->has('sub_total') ? ' is-invalid' : ''); ?>"
                                                               type="text" name="total[]" id="total1" autocomplete="off"
                                                               value="<?php echo e(isset($editData) ? $editData->sub_total : '0.00'); ?>">
      
      
                                                           <?php if($errors->has('sub_total')): ?>
                                                               <span class="text-danger">
                                                                   <?php echo e($errors->first('sub_total')); ?>

                                                               </span>
                                                           <?php endif; ?>
                                                       </div>
                                                       <input type="hidden" name="totalValue[]" id="totalValue1"
                                                           autocomplete="off" class="form-control" />
                                                   </td>
                                                   <td>
                                                       <button class="primary-btn icon-only fix-gr-bg" type="button">
                                                           <span class="ti-trash"></span>
                                                       </button>
      
                                                   </td>
                                               </tr>
                                           <tfoot>
                                               <tr>
                                                   <th class="border-top-0" colspan="2"><?php echo app('translator')->get('inventory.total'); ?></th>
                                                   <th class="border-top-0">
                                                       <input type="text" class="primary_input_field form-control"
                                                           readonly="" id="subTotalQuantity" name="subTotalQuantity"
                                                           placeholder="0.00" />
      
                                                       <input type="hidden" class="form-control" id="subTotalQuantityValue"
                                                           name="subTotalQuantityValue" />
      
                                                   </th>
      
                                                   <th class="border-top-0">
                                                       <input type="number" class="primary_input_field form-control<?php echo e($errors->has('subTotal') ? ' is-invalid' : ''); ?>"
                                                           id="subTotal" name="subTotal" placeholder="0.00" readonly="" />
      
                                                       <input type="hidden" class="form-control" id="subTotalValue"
                                                           name="subTotalValue" />
                                                        <?php if($errors->has('subTotal')): ?>
                                                           <span class="text-danger">
                                                               <?php echo e($errors->first('subTotal')); ?>

                                                           </span>
                                                        <?php endif; ?>
                                                   </th>
                                                   <th class="border-top-0"></th>
                                               </tr>
                                           </tfoot>
      
                                           </tbody>
                                       </table>
                                    </div>
                                </div>
                            </div>
                        </div>
   
                        <div class="row mt-30">
                            <div class="col-lg-12">
                                <div class="white-box">
   
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="col-lg-12 mt-30">
                                                <div class="primary_input">
                                                    <input type="checkbox" id="full_paid"
                                                        class="common-checkbox form-control<?php echo e($errors->has('full_paid') ? ' is-invalid' : ''); ?>"
                                                        name="full_paid" value="1">
                                                    <label for="full_paid"><?php echo app('translator')->get('inventory.full_paid'); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mt-30-md">
                                            <div class="col-lg-12">
                                                <div class="primary_input md_mb_20">
                                                    <label class="primary_input_label"
                                                        for=""><?php echo app('translator')->get('inventory.total_paid'); ?></label>
                                                    <input class="primary_input_field" type="number" step="0.1"
                                                        value="0" name="totalPaid" id="totalPaid"
                                                        onkeyup="paidAmount();">
                                                    <input type="hidden" id="totalPaidValue" name="totalPaidValue">
   
   
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mt-30-md">
                                            <div class="col-lg-12">
                                                <div class="primary_input md_mb_20">
                                                    <label class="primary_input_label"
                                                        for=""><?php echo app('translator')->get('inventory.total_due'); ?></label>
                                                    <input class="primary_input_field" type="text" value="0.00"
                                                        id="totalDue" readonly>
                                                    <input type="hidden" id="totalDueValue" name="totalDueValue">
   
   
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                            $tooltip = '';
                                            if (userPermission('save-item-receive-data')) {
                                                $tooltip = '';
                                            } else {
                                                $tooltip = 'You have no permission to add';
                                            }
                                        ?>
                                        <div class="col-lg-12 mt-20 text-center">
                                            <button class="primary-btn fix-gr-bg" data-toggle="tooltip"
                                                title="<?php echo e($tooltip); ?>">
                                                <span class="ti-check"></span>
                                                <?php echo app('translator')->get('inventory.receive'); ?>
                                            </button>
                                        </div>
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

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\inventory\itemReceive.blade.php ENDPATH**/ ?>
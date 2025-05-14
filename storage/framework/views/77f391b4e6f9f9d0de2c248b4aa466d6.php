<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('inventory.item_sell'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<?php $__env->startPush('css'); ?>
<style type="text/css">
    #productTable tbody tr{
        border-bottom: 1px solid #FFFFFF !important;
    }
    .forStudentWrapper, #selectStaffsDiv{
        display: none;
    }
</style>
<?php $__env->stopPush(); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('inventory.item_sell'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="<?php echo e(route('item-sell')); ?>"><?php echo app('translator')->get('inventory.item_sell'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
     
     <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'save-item-sell-data',
     'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'item-sell-form'])); ?>


     <div class="row">
        <div class="col-lg-3">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-title">
                        <h3 class="mb-30">
                            <?php if(isset($editData)): ?>
                                <?php echo app('translator')->get('common.edit_sell'); ?>
                            <?php else: ?>
                                <?php echo app('translator')->get('inventory.sells_details'); ?>    
                            <?php endif; ?>
                            
                        </h3>
                    </div>

                    <div class="white-box">
                        <div class="add-visitor">
                            <div class="row">
                            <div class="col-lg-12 mb-30">
                                <label class="primary_input_label" for=""><?php echo app('translator')->get('inventory.income_head'); ?> <span class="text-danger"> *</span> </label>
                                        <select class="primary_select  form-control<?php echo e($errors->has('income_head_id') ? ' is-invalid' : ''); ?>" name="income_head_id" id="income_head_id">
                                            <option data-display="<?php echo app('translator')->get('inventory.income_head'); ?>*" value=""><?php echo app('translator')->get('common.select'); ?> *</option>
                                            <?php $__currentLoopData = $sell_heads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sell_head): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($sell_head->id); ?>"><?php echo e($sell_head->head); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <div class="text-danger" id="incomeError"></div>
                                        <?php if($errors->has('income_head_id')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('income_head_id')); ?>

                                        </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-lg-12 mb-30">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('inventory.payment_method'); ?> <span class="text-danger"> *</span> </label>
                                        <select class="primary_select  form-control" name="payment_method" id="item_sell_payment_method_id">
                                            <option data-display="<?php echo app('translator')->get('inventory.payment_method'); ?>*" value=""><?php echo app('translator')->get('inventory.payment_method'); ?>*</option>
                                            <?php $__currentLoopData = $paymentMethhods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option data-string="<?php echo e($value->method); ?>" value="<?php echo e($value->id); ?>"><?php echo e($value->method); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <div class="text-danger" id="paymentError"></div>
                                    </div>
                                    <div class="col-lg-12 mb-30 d-none" id="add_item_sell_bankAccount">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('inventory.bank'); ?> <span></span> </label>
                                            <select class="primary_select  form-control<?php echo e($errors->has('bank_id') ? ' is-invalid' : ''); ?>" name="bank_id" id="account_id">
                                            <?php if(isset($account_id)): ?>
                                            <?php $__currentLoopData = $account_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($value->id); ?>"><?php echo e($value->account_name); ?> (<?php echo e($value->bank_name); ?>)</option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                            </select>
                                            <div class="text-danger" id="accountError"></div>
                                            
                                            <?php if($errors->has('bank_id')): ?>
                                            <span class="text-danger invalid-select" role="alert">
                                                <strong><?php echo e($errors->first('bank_id')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                 <div class="col-lg-12 mb-30">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('inventory.sell_to'); ?> <span class="text-danger"> *</span> </label>
                                        <select class="primary_select  form-control<?php echo e($errors->has('role_id') ? ' is-invalid' : ''); ?>" name="role_id" id="buyer_type">
                                            <option data-display="<?php echo app('translator')->get('inventory.sell_to'); ?> *" value=""><?php echo app('translator')->get('inventory.sell_to'); ?> *</option>
                                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(isset($editData)): ?>
                                                    <option value="<?php echo e($value->id); ?>" <?php echo e($value->id == $editData->role_id? 'selected':''); ?>><?php echo e($value->name); ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <div class="text-danger" id="buyerError"></div>
                                        <?php if($errors->has('role_id')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('role_id')); ?>

                                        </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="forStudentWrapper col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-12 mb-30">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('common.class'); ?> <span class="text-danger"> *</span> </label>
                                                <select class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>" id="select_class" name="class">
                                                    <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value=""><?php echo app('translator')->get('common.select_class'); ?> *</option>
                                                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($class->id); ?>"  <?php echo e(( old("class") == $class->id ? "selected":"")); ?>><?php echo e($class->class_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <div class="text-danger" id="classError"></div>
                                                <?php if($errors->has('class')): ?>
                                                <span class="text-danger invalid-select" role="alert">
                                                    <?php echo e($errors->first('class')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-lg-12 mb-30" id="select_section_div">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('common.section'); ?> <span class="text-danger"> *</span> </label>
                                                <select class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?>" id="select_section" name="section">
                                                    <option data-display="<?php echo app('translator')->get('common.select_section'); ?> *" value=""><?php echo app('translator')->get('common.select_section'); ?> *</option>
                                                </select>
                                                <div class="text-danger" id="sectionError"></div>
                                                <?php if($errors->has('section')): ?>
                                                <span class="text-danger invalid-select" role="alert">
                                                    <?php echo e($errors->first('section')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>


                                            <div class="col-lg-12 mb-30" id="select_student_div">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('common.student'); ?> <span class="text-danger"> *</span> </label>
                                                <select class="primary_select form-control<?php echo e($errors->has('student') ? ' is-invalid' : ''); ?>" id="select_student" name="student">
                                                    <option data-display="<?php echo app('translator')->get('common.select_student'); ?> *" value=""><?php echo app('translator')->get('common.select_student'); ?> *</option>
                                                </select>
                                                <div class="text-danger" id="studentError"></div>
                                                <?php if($errors->has('student')): ?>
                                                <span class="text-danger invalid-select" role="alert">
                                                    <?php echo e($errors->first('student')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mb-30" id="selectStaffsDiv">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('common.name'); ?> <span class="text-danger"> *</span> </label>
                                        <select class="primary_select  form-control<?php echo e($errors->has('staff_id') ? ' is-invalid' : ''); ?>" name="staff_id" id="selectStaffs">
                                            <option data-display="<?php echo app('translator')->get('common.name'); ?> *" value=""><?php echo app('translator')->get('common.name'); ?> *</option>

                                            <?php if(isset($staffsByRole)): ?>
                                            <?php $__currentLoopData = $staffsByRole; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($value->id); ?>" <?php echo e($value->id == $editData->staff_id? 'selected':''); ?>><?php echo e($value->full_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>

                                            <?php endif; ?>
                                        </select>
                                        <div class="text-danger" id="nameError"></div>
                                        <?php if($errors->has('staff_id')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('staff_id')); ?>

                                        </span>
                                        <?php endif; ?>
                                    </div>

                                <div class="col-lg-12 mb-30">
                                    <div class="primary_input">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('inventory.reference_no'); ?></label>
                                        <input class="primary_input_field form-control"
                                        type="text" name="reference_no" autocomplete="off" value="<?php echo e(isset($editData)? $editData->reference_no : ''); ?>">
                                        
                                        
                                        
                                    </div>
                                </div>

                               
                                <div class="col-lg-12 mb-30">
                                    <div class="primary_input ">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('inventory.sell_date'); ?> <span></span> </label>
                                        <div class="primary_datepicker_input">
                                            <div class="no-gutters input-right-icon">
                                                <div class="col">
                                                    <div class="">
                                                        
                                            <input class="primary_input_field  primary_input_field date form-control form-control<?php echo e($errors->has('sell_date') ? ' is-invalid' : ''); ?>"  id="sell_date" type="text"
                                            name="sell_date" value="<?php echo e(isset($editData)? date('m/d/Y', strtotime($editData->sell_date)): date('m/d/Y')); ?>" autocomplete="off">
                                                    </div>
                                                </div>
                                                <button class="btn-date" data-id="#sell_date" type="button">
                                                    <label for="sell_date" class="m-0 p-0">
                                                        <i class="ti-calendar" id="start-date-icon"></i>
                                                    </label>
                                                </button>
                                            </div>
                                        </div>
                                        <span class="text-danger"><?php echo e($errors->first('sell_date')); ?></span>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-20">
                                    <div class="primary_input">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('common.description'); ?> <span></span> </label>
                                        <textarea class="primary_input_field form-control" cols="0" rows="4" name="description" id="description"><?php echo e(isset($editData) ? $editData->description : ''); ?></textarea>
                                        
                                        

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
                    <h3 class="mb-20"><?php echo app('translator')->get('inventory.item_sell'); ?></h3>
                </div>
            </div>

            <div class="offset-lg-6 col-lg-2 text-right col-md-6 mb-20">
                <button type="button" class="primary-btn small fix-gr-bg" onclick="addRowInSell();" id="addRowBtn">
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
                          <th> <?php echo app('translator')->get('inventory.product_name'); ?> </th>
                          <th> <?php echo app('translator')->get('inventory.sell_price'); ?> </th>
                          <th> <?php echo app('translator')->get('inventory.quantity'); ?> </th>
                          <th><?php echo app('translator')->get('inventory.sub_total'); ?></th>
                          <th><?php echo app('translator')->get('common.action'); ?></th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr id="row1" class="0">
                        <td class="border-top-0">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>"> 
                            <div class="primary_input">
                                <select class="primary_select  form-control<?php echo e($errors->has('category_name') ? ' is-invalid' : ''); ?>" name="item_id[]" id="productName1">
                                    <option data-display="<?php echo app('translator')->get('common.select_item'); ?> " value=""><?php echo app('translator')->get('common.select'); ?></option>
                                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value->id); ?>"
                                        <?php if(isset($editData)): ?>
                                        <?php if($editData->category_name == $value->id): ?>
                                        selected
                                        <?php endif; ?>
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
                                    <input class="primary_input_field form-control<?php echo e($errors->has('unit_price') ? ' is-invalid' : ''); ?>"
                                    type="number" step="0.1" id="unit_price1" name="unit_price[]" onkeypress="return isNumberKey(event)" autocomplete="off" value="<?php echo e(isset($editData)? $editData->unit_price : ''); ?>" onkeyup="getTotalByPrice(1)">

                                    
                                    <?php if($errors->has('unit_price')): ?>
                                    <span class="text-danger" >
                                        <?php echo e($errors->first('unit_price')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td class="border-top-0">
                                <div class="primary_input">
                                    <input class="primary_input_field form-control<?php echo e($errors->has('quantity') ? ' is-invalid' : ''); ?>"
                                    type="number" id="quantity1" name="quantity[]" onkeypress="return isNumberKey(event)" autocomplete="off" onkeyup="getTotalInSell(1);" value="<?php echo e(isset($editData)? $editData->quantity : ''); ?>">

                                    
                                    <?php if($errors->has('quantity')): ?>
                                    <span class="text-danger" >
                                        <?php echo e($errors->first('quantity')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td class="border-top-0">
                                <div class="primary_input">
                                    <input class="primary_input_field form-control<?php echo e($errors->has('sub_total') ? ' is-invalid' : ''); ?>"
                                    type="number" name="total[]" id="total1" onkeypress="return isNumberKey(event)" autocomplete="off" value="<?php echo e(isset($editData)? $editData->sub_total : '0.00'); ?>">

                                    
                                    <?php if($errors->has('sub_total')): ?>
                                    <span class="text-danger" >
                                        <?php echo e($errors->first('sub_total')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                                <input type="hidden" name="totalValue[]" id="totalValue1" autocomplete="off" class="form-control" />
                            </td>
                            <td>
                                <button class="primary-btn icon-only fix-gr-bg" type="button">
                                 <span class="ti-trash" id="removeSubject" onclick="deleteSubject(4)"></span>
                                 </button>
                            </td>
                        </tr>
                        <tfoot>
                            <tr>
                             <th class="border-top-0" colspan="2"><?php echo app('translator')->get('inventory.total'); ?></th>
                             <th class="border-top-0">
                                 <input type="text" class="primary_input_field form-control" id="subTotalQuantity" onkeypress="return isNumberKey(event)" name="subTotalQuantity" placeholder="0.00" readonly="" />
                                 <input type="hidden" class="form-control" id="subTotalQuantityValue" name="subTotalQuantityValue" />
                             </th>
                             <th class="border-top-0">
                                 <input type="number" class="primary_input_field form-control<?php echo e($errors->has('subTotal') ? ' is-invalid' : ''); ?>" id="subTotal" name="subTotal" placeholder="0.00" readonly="" />
                                 <input type="hidden" class="form-control" id="subTotalValue" name="subTotalValue" />
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

 <div class="row mt-30">
    <div class="col-lg-12">
        <div class="white-box">
            <div class="row">
              <div class="col-lg-4 mt-30-md">
                 <div class="col-lg-12">
                    <div class="primary_input">
                        <input type="checkbox" id="full_paid"  class="common-checkbox form-control<?php echo e($errors->has('full_paid') ? ' is-invalid' : ''); ?>" name="full_paid" value="1">
                    <label for="full_paid"><?php echo app('translator')->get('inventory.full_paid'); ?></label>
                    </div>
                </div>
            </div>  

            <div class="col-lg-4 mt-30-md">
             <div class="col-lg-12">
                <div class="primary_input">
                    <label class="primary_input_label" for=""><?php echo app('translator')->get('inventory.total_paid'); ?></label>
                    <input class="primary_input_field" type="number" step="0.1" value="0" name="totalPaid" id="totalPaid" onkeyup="paidAmount();">
                    <input type="hidden" id="totalPaidValue" name="totalPaidValue">
                   
                    
                </div>
            </div>
        </div>
        <div class="col-lg-4 mt-30-md">
         <div class="col-lg-12">
            <div class="primary_input">
                <label class="primary_input_label" for=""><?php echo app('translator')->get('inventory.total_due'); ?></label>
                <input class="primary_input_field" type="text" value="0.00" id="totalDue" readonly>
                <input type="hidden" id="totalDueValue" name="totalDueValue">
                
                
            </div>
        </div>
    </div>
<div class="col-lg-12 mt-20 text-center">
   <button class="primary-btn fix-gr-bg">
    <span class="ti-check"></span>
    <?php echo app('translator')->get('inventory.sells'); ?>
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
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\inventory\itemSell.blade.php ENDPATH**/ ?>
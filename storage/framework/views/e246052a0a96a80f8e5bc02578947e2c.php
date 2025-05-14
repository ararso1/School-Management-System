<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('inventory.edit_sells_details'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<style type="text/css">
#productTable tbody tr{
    border-bottom: 1px solid #FFFFFF !important;
}
</style>

<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('inventory.edit_sells_details'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('inventory.inventory'); ?></a>
                <a href="<?php echo e(route('item-sell-list')); ?>"><?php echo app('translator')->get('inventory.item_sell_list'); ?></a>
                <a href="#"><?php echo app('translator')->get('inventory.edit_sells_details'); ?></a>
            </div>
        </div>
    </div>
</section>

<section class="admin-visitor-area">
<div class="container-fluid p-0">

   <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'update-item-sell-data', 'enctype' => 'multipart/form-data', 'id' => 'edit-item-sell-form'])); ?>


   <input type="hidden" name="id" value="<?php echo e($editData->id); ?>">
   <div class="row">
    <div class="col-lg-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-title">
                    <h3 class="mb-30">
                        <?php echo app('translator')->get('inventory.edit_sells_details'); ?>
                    </h3>
                </div>

                <div class="white-box">
                    <div class="add-visitor">
                        <div class="row">
                        <div class="col-lg-12 mb-30">
                                <select class="primary_select  form-control<?php echo e($errors->has('income_head_id') ? ' is-invalid' : ''); ?>" name="income_head_id" id="income_head_id">
                                    <option data-display="<?php echo app('translator')->get('accounts.payroll'); ?>*" value=""><?php echo app('translator')->get('common.select'); ?> *</option>
                                    <?php $__currentLoopData = $sell_heads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sell_head): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($sell_head->id); ?>" <?php echo e($sell_head->id == $editData->income_head_id? 'selected':''); ?>><?php echo e($sell_head->head); ?></option>
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
                                <select class="primary_select  form-control" name="payment_method" id="edit_sell_payment_method">
                                    <?php if($editData->paymentMethodName->method =="Bank"): ?>
                                    <option data-string="<?php echo e(@$editData->paymentMethodName->method); ?>" value="<?php echo e(@$editData->payment_method); ?>" selected><?php echo e(@$editData->paymentMethodName->method); ?></option>
                                    <?php else: ?>
                                    <?php $__currentLoopData = $paymentMethhods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(isset($editData)): ?>
                                    <option data-string="<?php echo e($value->method); ?>" value="<?php echo e($value->id); ?>"
                                        <?php echo e(@$editData->payment_method == $value->id? 'selected': ''); ?>><?php echo e($value->method); ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="col-lg-12 mb-30 d-none" id="edit_item_sell_bankAccount">
                                        <div class="primary_input">
                                            <select class="primary_select  form-control<?php echo e($errors->has('bank_id') ? ' is-invalid' : ''); ?>" name="bank_id" id="account_id">
                                            <?php if(isset($editData)): ?>
                                                    <option value="<?php echo e($editData->account_id); ?>" selected><?php echo e(@$editData->bankName->account_name); ?> (<?php echo e(@$editData->bankName->bank_name); ?>)</option>
                                            <?php endif; ?>
                                                </select>
                                                
                                                <?php if($errors->has('bank_id')): ?>
                                                <span class="text-danger invalid-select" role="alert">
                                                    <?php echo e($errors->first('bank_id')); ?>

                                                </span>
                                                <?php endif; ?>
                                        </div>
                                    </div>
                            <div class="col-lg-12 mb-30">
                                <select class="primary_select  form-control<?php echo e($errors->has('role_id') ? ' is-invalid' : ''); ?>" name="role_id" id="buyer_type">
                                    <option data-display="<?php echo app('translator')->get('inventory.sell_to'); ?> *" value=""><?php echo app('translator')->get('inventory.sell_to'); ?> *</option>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value->id); ?>" <?php echo e($value->id == $editData->role_id? 'selected':''); ?>><?php echo e($value->name); ?></option>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <div class="text-danger" id="buyerError"></div>
                                <?php if($errors->has('role_id')): ?>
                                <span class="text-danger invalid-select" role="alert">
                                    <?php echo e($errors->first('role_id')); ?>

                                </span>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-12 <?php echo e($editData->role_id == 2? 'displayBlock':'displayNone'); ?>" id="student-div">
                                <div class="row">
                                    <div class="col-lg-12 mb-30">
                                        <select class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>" id="select_class" name="class">
                                            <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value=""><?php echo app('translator')->get('common.select_class'); ?> *</option>
                                                <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($class->id); ?>" <?php echo e($editData->role_id == 2? ($class->id == @$studentClassSection->defaultClass->class_id? 'selected':''):""); ?>><?php echo e($class->class_name); ?></option>
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

                                         <?php if($editData->role_id == 2): ?>
                                         <select class="primary_select form-control <?php echo e($errors->has('section') ? ' is-invalid' : ''); ?>" id="section" name="section">
                                            <option data-display="<?php echo app('translator')->get('common.select_section'); ?> *" value=""><?php echo app('translator')->get('common.select_section'); ?> *</option>
                                            <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($section->id); ?>"  <?php echo e(( old("section") == $section->id ? "selected":"")); ?>

                                                <?php if($editData): ?>
                                                <?php if(@$studentClassSection->defaultClass->section_id == $section->id): ?>
                                                selected
                                                <?php endif; ?>
                                                <?php endif; ?>
                                                ><?php echo e($section->section_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <div class="text-danger" id="sectionError"></div>
                                            <?php else: ?>
                                            <select class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?>" id="select_section" name="section">
                                                <option data-display="<?php echo app('translator')->get('common.select_section'); ?> *" value=""><?php echo app('translator')->get('common.select_section'); ?> *</option>
                                            </select>
                                            <?php endif; ?>

                                            <?php if($errors->has('section')): ?>
                                            <span class="text-danger invalid-select" role="alert">
                                                <?php echo e($errors->first('section')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>


                                        <div class="col-lg-12 mb-30" id="select_student_div">
                                         <?php if($editData->role_id == 2): ?>
                                        
                                            <select class="primary_select form-control <?php echo e($errors->has('student') ? ' is-invalid' : ''); ?>" id="student" name="student">
                                                <option data-display="<?php echo app('translator')->get('common.select_student'); ?> *" value=""><?php echo app('translator')->get('common.select_student'); ?> *</option>
                                                <?php $__currentLoopData = $allStudentsSameClassSection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($student->id); ?>"  <?php echo e(( old("student") == $student->id ? "selected":"")); ?>

                                                    <?php if($editData): ?>
                                                    <?php if($editData->student_staff_id == $student->id): ?>
                                                    selected
                                                    <?php endif; ?>
                                                    <?php endif; ?>
                                                    ><?php echo e($student->full_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php else: ?>

                                                <select class="primary_select form-control<?php echo e($errors->has('student') ? ' is-invalid' : ''); ?>" id="select_student" name="student">
                                                    <option data-display="<?php echo app('translator')->get('common.select_student'); ?> *" value=""><?php echo app('translator')->get('common.select_student'); ?> *</option>
                                                </select>
                                                <?php endif; ?>          
                                                <div class="text-danger" id="studentError"></div>

                                                <?php if($errors->has('student')): ?>
                                                <span class="text-danger invalid-select" role="alert">
                                                    <?php echo e($errors->first('student')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mb-30 <?php echo e($editData->role_id != 2? 'displayBlock':'displayNone'); ?>" id="staff-div">
                                        <select class="primary_select  form-control<?php echo e($errors->has('staff_id') ? ' is-invalid' : ''); ?>" name="staff_id" id="selectStaffs">
                                            <option data-display="<?php echo app('translator')->get('common.name'); ?> *" value=""><?php echo app('translator')->get('common.name'); ?> *</option>

                                            <?php if($staffsByRole != ""): ?>

                                            <?php $__currentLoopData = $staffsByRole; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <?php if($editData->role_id == 3): ?>
                                                <option value="<?php echo e($value->id); ?>" 
                                            <?php echo e($value->id == $editData->student_staff_id? 'selected':''); ?>

                                            ><?php echo e($value->fathers_name); ?></option>
                                            <?php else: ?>
                                                <option value="<?php echo e($value->id); ?>" 
                                            <?php echo e($value->id == $editData->student_staff_id? 'selected':''); ?>

                                            ><?php echo e($value->full_name); ?></option>
                                            <?php endif; ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <?php endif; ?>
                                        </select>
                                        <div class="text-danger" id="nameError"></div> 
                                        <?php if($errors->has('staff_id')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('staff_id')); ?>

                                        </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-lg-12 mb-20">
                                        <div class="primary_input">
                                            <input class="primary_input_field form-control<?php echo e($errors->has('reference_no') ? ' is-invalid' : ''); ?>"
                                            type="text" name="reference_no" autocomplete="off" value="<?php echo e(isset($editData)? $editData->reference_no : ''); ?>">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('inventory.reference_no'); ?> <span></span> </label>
                                            
                                            <?php if($errors->has('reference_no')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('reference_no')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 no-gutters input-right-icon mb-30">
                                        <div class="col">
                                            <div class="primary_input">
                                                <input class="primary_input_field  primary_input_field date form-control form-control<?php echo e($errors->has('sell_date') ? ' is-invalid' : ''); ?>"  id="sell_date" type="text"
                                                name="sell_date" value="<?php echo e(isset($editData)? date('m/d/Y', strtotime($editData->sell_date)): ''); ?>" autocomplete="off">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('inventory.sell_date'); ?><span></span> </label>
                                                
                                                <?php if($errors->has('sell_date')): ?>
                                                <span class="text-danger" >
                                                    <?php echo e($errors->first('sell_date')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>

                                        </div>
                                        <div class="col-auto">
                                            <button class="" type="button">
                                                <i class="ti-calendar" id="receive_date_icon"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mb-20">
                                        <div class="primary_input">
                                            <textarea class="primary_input_field form-control" cols="0" rows="4" name="description" id="description"><?php echo e(isset($editData) ? $editData->description : ''); ?></textarea>
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('common.description'); ?> <span></span> </label>
                                            

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
                        <h3 class="mb-30"><?php echo app('translator')->get('inventory.item_sale'); ?></h3>
                    </div>
                </div>

                <div class="offset-lg-6 col-lg-2 text-right col-md-6">
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
                          <th><?php echo app('translator')->get('inventory.product_name'); ?></th>
                          <th><?php echo app('translator')->get('inventory.sell_price'); ?></th>
                          <th><?php echo app('translator')->get('inventory.quantity'); ?></th>
                          <th><?php echo app('translator')->get('inventory.sub_total'); ?></th>
                          <th><?php echo app('translator')->get('common.action'); ?></th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php $i = 0; $j=0; $total_quantity = 0; $grand_total = 0; ?>
                  <?php if(isset($editDataChildren)): ?>
                  <?php $__currentLoopData = $editDataChildren; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $editDataValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr id="row<?php echo e(++$i); ?>" class="<?php echo e($j++); ?>">
                        <td>
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>"> 
                            <div class="primary_input">
                                <select class="primary_select  form-control<?php echo e($errors->has('item_id') ? ' is-invalid' : ''); ?>" name="item_id[]" id="productName<?php echo e($j); ?>">
                                    <option data-display="<?php echo app('translator')->get('common.select_item'); ?> " value=""><?php echo app('translator')->get('common.select'); ?></option>
                                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value->id); ?>"
                                        <?php if(isset($editDataChildren)): ?>
                                        <?php if($editDataValue->item_id == $value->id): ?>
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
                            <td>
                                <div class="primary_input">
                                    <input class="primary_input_field form-control<?php echo e($errors->has('sell_price') ? ' is-invalid' : ''); ?>"
                                    type="text" id="unit_price<?php echo e($i); ?>" name="unit_price[]" autocomplete="off" value="<?php echo e(isset($editDataChildren)? $editDataValue->sell_price : ''); ?>" onkeyup="getTotalByPrice(<?php echo e($i); ?>)">

                                    
                                    <?php if($errors->has('sell_price')): ?>
                                    <span class="text-danger" >
                                        <?php echo e($errors->first('sell_price')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td>
                                <div class="primary_input">
                                    <input class="primary_input_field form-control<?php echo e($errors->has('quantity') ? ' is-invalid' : ''); ?>"
                                    type="text" id="quantity<?php echo e($i); ?>" name="quantity[]" autocomplete="off" onkeyup="getTotalInSell(<?php echo e($i); ?>);" value="<?php echo e(isset($editDataChildren)? $editDataValue->quantity : ''); ?>">

                                    
                                    <?php if($errors->has('quantity')): ?>
                                    <span class="text-danger" >
                                        <?php echo e($errors->first('quantity')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td>
                                <div class="primary_input">
                                    <input class="primary_input_field form-control<?php echo e($errors->has('sub_total') ? ' is-invalid' : ''); ?>"
                                    type="text" name="total[]" id="total<?php echo e($i); ?>" autocomplete="off" value="<?php echo e(isset($editDataChildren)? number_format( (float) $editDataValue->sub_total, 2, '.', '') : ''); ?>">

                                    
                                    <?php if($errors->has('sub_total')): ?>
                                    <span class="text-danger" >
                                        <?php echo e($errors->first('sub_total')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                                <input type="hidden" name="totalValue[]" id="totalValue<?php echo e($i); ?>" autocomplete="off" class="form-control" value="<?php echo e(isset($editDataChildren)? $editDataValue->sub_total : ''); ?>"/>
                            </td>
                            <td><a>
                                <button class="primary-btn icon-only fix-gr-bg" type="button">
                                 <span class="ti-trash" id="removeSubject" onclick="deleteSubject(4)"></span>
                                 </button>
                            </a></td>
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
                                   
                                   <input type="text" class="primary_input_field form-control" id="subTotalQuantity" name="subTotalQuantity" placeholder="0" readonly="" value="<?php echo e(isset($editDataChildren)? $total_quantity : ''); ?>"/>

                                   <input type="hidden" class="form-control" id="subTotalQuantityValue" value="<?php echo e(isset($editDataChildren)? $total_quantity : ''); ?>"  name="subTotalQuantityValue" />

                               </th>

                               <th>
                                   <input type="text" class="primary_input_field form-control" id="subTotal" name="subTotal" placeholder="0.00" readonly="" 
                                   value="<?php echo e(number_format( (float) $grand_total, 2, '.', '')); ?>"
                                   />

                                   <input type="hidden" class="form-control" id="subTotalValue" name="subTotalValue" value="<?php echo e(number_format( (float) $grand_total, 2, '.', '')); ?>"/>

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

                    <input type="checkbox" id="full_paid" class="common-checkbox form-control<?php echo e($errors->has('full_paid') ? ' is-invalid' : ''); ?>" name="full_paid" value="1" <?php if($editData->paid_status == 'P'): ?>
                    checked
                    <?php endif; ?>>                    
                    <label for="full_paid"><?php echo app('translator')->get('inventory.full_paid'); ?></label>
                </div>
            </div>
        </div>  

        <div class="col-lg-4 mt-30-md">
           <div class="col-lg-12">
            <div class="primary_input">
            <input class="primary_input_field" type="text"  name="totalPaid" id="totalPaid" onkeyup="paidAmount();" value="<?php echo e(isset($editData)? $editData->total_paid : ''); ?>">
                <input type="hidden" id="totalPaidValue" name="totalPaidValue">
                <label class="primary_input_label" for=""><?php echo app('translator')->get('inventory.total_paid'); ?></label>
                
            </div>
        </div>
    </div>
    <div class="col-lg-4 mt-30-md">
       <div class="col-lg-12">
        <div class="primary_input">
            <input class="primary_input_field" type="text" value="<?php echo e(isset($editData)? number_format( (float) $editData->total_due, 2, '.', '') : ''); ?>" id="totalDue" readonly>
            <input type="hidden" id="totalDueValue" name="totalDueValue" value="<?php echo e(isset($editData)? $editData->total_due : ''); ?>">
            <label class="primary_input_label" for=""><?php echo app('translator')->get('inventory.total_due'); ?></label>
            
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
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\inventory\editItemSell.blade.php ENDPATH**/ ?>
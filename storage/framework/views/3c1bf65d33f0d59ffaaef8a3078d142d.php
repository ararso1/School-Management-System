<?php $__env->startSection('title'); ?> 
<?php echo app('translator')->get('accounts.search_income_expense'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<?php  @$setting = generalSetting(); if(!empty(@$setting->currency_symbol)){ @$currency = @$setting->currency_symbol; }else{ @$currency = '$'; } ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('accounts.search_income_expense'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('accounts.accounts'); ?></a>
                <a href="#"><?php echo app('translator')->get('accounts.search_income_expense'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="main-title">
                        <h3 class="mb-30"><?php echo app('translator')->get('common.select_criteria'); ?> </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?php if(session()->has('message-success') != ""): ?>
                        <?php if(session()->has('message-success')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session()->get('message-success')); ?>

                        </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <div class="white-box">
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'search_accounts', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_income_expense'])); ?>

                            <div class="row">
                                <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                <div class="col-lg-3 mt-30-md">
                                    <div class="no-gutters input-right-icon">
                                        <div class="col">
                                            <div class="primary_input">
                                                <input class="primary_input_field  primary_input_field date form-control form-control<?php echo e(@$errors->has('date_from') ? ' is-invalid' : ''); ?>" id="startDate" type="text"
                                                     name="date_from" value="<?php echo e(isset($from_date)? date('m/d/Y', strtotime($from_date)):date('m/d/Y')); ?>" readonly>
                                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('accounts.date_from'); ?></label>
                                                    
                                                <?php if($errors->has('date_from')): ?>
                                                <span class="text-danger" >
                                                    <strong><?php echo e(@$errors->first('date_from')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <button class="" type="button">
                                            <i class="ti-calendar" id="admission-date-icon"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-3 mt-30-md">
                                    <div class="no-gutters input-right-icon">
                                        <div class="col">
                                            <div class="primary_input">
                                                <input class="primary_input_field  primary_input_field date form-control form-control<?php echo e(@$errors->has('date_to') ? ' is-invalid' : ''); ?>" id="startDate" type="text"
                                                     name="date_to" value="<?php echo e(isset($to_date)? date('m/d/Y', strtotime($to_date)):date('m/d/Y')); ?>" readonly>
                                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('accounts.date_to'); ?></label>
                                                    
                                                <?php if($errors->has('date_to')): ?>
                                                <span class="text-danger" >
                                                    <strong><?php echo e(@$errors->first('date_to')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <button class="" type="button">
                                            <i class="ti-calendar" id="admission-date-icon"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <select class="primary_select  form-control<?php echo e($errors->has('type') ? ' is-invalid' : ''); ?>" name="type" id="account-type">
                                        <option data-display="<?php echo app('translator')->get('common.search_type'); ?> *" value=""><?php echo app('translator')->get('common.search_type'); ?>*</option>
                                        <option value="In" <?php echo e(isset($type_id)? ($type_id == "In"? 'selected':''):''); ?>><?php echo app('translator')->get('accounts.date_to'); ?></option>
                                        <option value="Ex" <?php echo e(isset($type_id)? ($type_id == "Ex"? 'selected':''):''); ?>><?php echo app('translator')->get('accounts.expense'); ?></option>
                                    </select>
                                    <?php if($errors->has('type')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <strong><?php echo e(@$errors->first('type')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-3" id="filtering_div">
                                    <select class="primary_select  form-control<?php echo e(@@$errors->has('filtering') ? ' is-invalid' : ''); ?>" name="filtering" id="filtering_section">
                                    </select>
                                    <?php if($errors->has('type')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <strong><?php echo e(@$errors->first('type')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-3" id="income_div">
                                    <select class="primary_select  form-control<?php echo e(@$errors->has('filtering') ? ' is-invalid' : ''); ?>" name="filtering_income" id="filtering_section">
                                        <option value="all"><?php echo app('translator')->get('common.all'); ?></option>
                                        <option value="sell"><?php echo app('translator')->get('inventory.item_sell'); ?></option>
                                        <option value="fees"><?php echo app('translator')->get('fees.fees_collection'); ?></option>
                                        <option value="dormitory"><?php echo app('translator')->get('dormitory.dormitory'); ?></option>
                                        <option value="transport"><?php echo app('translator')->get('transport.transport'); ?></option>
                                    </select>
                                    
                                </div>
                                <div class="col-lg-3" id="expense_div">
                                    <select class="primary_select  form-control<?php echo e(@$errors->has('filtering') ? ' is-invalid' : ''); ?>" name="filtering_expense" id="filtering_section">
                                        <option value="all"><?php echo app('translator')->get('common.all'); ?></option>
                                        <option value="receive"><?php echo app('translator')->get('inventory.item_Receive'); ?></option>
                                        <option value="payroll"><?php echo app('translator')->get('hr.payroll'); ?></option>
                                    </select>
                                </div>
                                <div class="col-lg-12 mt-20 text-right">
                                    <button type="submit" class="primary-btn small fix-gr-bg">
                                        <span class="ti-search pr-2"></span>
                                        <?php echo app('translator')->get('common.search'); ?>
                                    </button>
                                </div>
                            </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>            
        <?php if(isset($add_incomes)): ?>
            <div class="row mt-40">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-0"><?php echo app('translator')->get('accounts.income_result'); ?></h3>
                            </div>
                        </div>
                    </div>                
                    <!-- </div> -->
                    <div class="row">
                        <div class="col-lg-12">
                            <table id="table_id" class="table" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><?php echo app('translator')->get('common.name'); ?></th>
                                        <th><?php echo app('translator')->get('accounts.payroll'); ?></th>
                                        <th><?php echo app('translator')->get('accounts.amount'); ?>(<?php echo e(@generalSetting()->currency_symbol); ?>)</th>
                                    </tr>
                                </thead>
                                <?php $total_income = 0;?>
                                <tbody>
                                    <?php $__currentLoopData = $add_incomes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $add_income): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php @$total_income = @$total_income + @$add_income->amount; ?>
                                    <tr>
                                        <td><?php echo e(@$add_income->name); ?></td>
                                        <td><?php echo e(@$add_income->ACHead!=""?@$add_income->ACHead->head:""); ?></td>
                                        <td><?php echo e(number_format(@$add_income->amount, 2)); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                    <?php if(@$fees_payments != ""): ?>
                                        <?php @$total_income = @$total_income + @$fees_payments; ?>
                                        <tr>
                                            <td><?php echo app('translator')->get('fees.fees_collection'); ?></td>
                                            <td><?php echo app('translator')->get('fees.fees'); ?></td>
                                            <td><?php echo e(number_format(@$fees_payments, 2)); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if(@$item_sells != ""): ?>
                                    <?php @$total_income = @$total_income + @$item_sells; ?>
                                    <tr>
                                        <td><?php echo app('translator')->get('inventory.item_sell'); ?></td>
                                        <td><?php echo app('translator')->get('accounts.sells'); ?></td>
                                        <td><?php echo e(number_format(@$item_sells, 2)); ?></td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php if(@$dormitory != 0): ?>
                                    <?php @$total_income = @$total_income + @$dormitory; ?>
                                    <tr>
                                        <td><?php echo app('translator')->get('accounts.dormitory_fees'); ?></td>
                                        <td><?php echo app('translator')->get('dormitory.dormitory'); ?></td>
                                        <td><?php echo e(number_format(@$dormitory, 2)); ?></td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th><?php echo app('translator')->get('accounts.grand_total'); ?></th>
                                        <th><?php echo e(number_format(@$total_income, 2)); ?></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if(isset($add_expenses)): ?>
            <div class="row mt-40">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-0"><?php echo app('translator')->get('accounts.expense_result'); ?></h3>
                            </div>
                        </div>
                    </div>               
                    <!-- </div> -->
                    <div class="row">
                        <div class="col-lg-12">
                            <table id="table_id" class="table" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><?php echo app('translator')->get('common.name'); ?></th>
                                        <th><?php echo app('translator')->get('accounts.expense_head'); ?></th>
                                        <th><?php echo app('translator')->get('accounts.amount'); ?>(<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                                    </tr>
                                </thead>
                                <?php @$total_expense = 0;?>
                                <tbody>
                                    <?php $__currentLoopData = $add_expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $add_expense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php @$total_expense = @$total_expense + @$add_expense->amount; ?>
                                    <tr>
                                        <td><?php echo e(@$add_expense->name); ?></td>
                                        <td><?php echo e(@$add_expense->ACHead!=""?@$add_expense->ACHead->head:""); ?></td>
                                        <td><?php echo e(number_format(@$add_expense->amount, 2)); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(@$item_receives != 0): ?>
                                    <?php @$total_expense = @$total_expense + @$item_receives; ?>
                                    <tr>
                                        <td><?php echo app('translator')->get('accounts.item_purchase'); ?></td>
                                        <td><?php echo app('translator')->get('accounts.purchase'); ?></td>
                                        <td><?php echo e(number_format(@$item_receives, 2)); ?></td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php if(@$payroll_payments != 0): ?>
                                    <?php @$total_expense = @$total_expense + @$payroll_payments; ?>
                                    <tr>
                                        <td><?php echo app('translator')->get('fees.from_payroll'); ?></td>
                                        <td><?php echo app('translator')->get('hr.payroll'); ?></td>
                                        <td><?php echo e(number_format(@$payroll_payments, 2)); ?></td>
                                    </tr>
                                    <?php endif; ?>  
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th><?php echo app('translator')->get('accounts.grand_total'); ?></th>
                                        <th><?php echo e(number_format(@$total_expense, 2)); ?></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\accounts\search_income.blade.php ENDPATH**/ ?>
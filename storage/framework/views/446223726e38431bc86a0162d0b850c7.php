<?php $__env->startSection('title'); ?> 
<?php echo app('translator')->get('common.search_expense'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>

<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.accounts'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.accounts'); ?></a>
                <a href="<?php echo e(route('search_expense')); ?>"><?php echo app('translator')->get('common.search_expense'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="main-title">
                        <h3 class="mb-30"><?php echo app('translator')->get('common.select_criteria'); ?></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <?php if(session()->has('message-success') != ""): ?>
                        <?php if(session()->has('message-success')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session()->get('message-success')); ?>

                        </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <div class="white-box">
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'search_expense_report_by_date', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

                            <div class="row">
                                <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                <div class="col-lg-6 mt-30-md">
                                    <div class="no-gutters input-right-icon">
                                        <div class="col">
                                            <div class="primary_input">
                                                <input class="primary_input_field  primary_input_field date form-control form-control<?php echo e(@$errors->has('date_from') ? ' is-invalid' : ''); ?>" id="startDate" type="text"
                                                     name="date_from" value="<?php echo e(date('m/d/Y')); ?>" readonly>
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
                                <div class="col-lg-6 mt-30-md">
                                    <div class="no-gutters input-right-icon">
                                        <div class="col">
                                            <div class="primary_input">
                                                <input class="primary_input_field  primary_input_field date form-control form-control<?php echo e(@$errors->has('date_to') ? ' is-invalid' : ''); ?>" id="startDate" type="text"
                                                     name="date_to" value="<?php echo e(date('m/d/Y')); ?>" readonly>
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

                <div class="col-lg-6">
                    <?php if(session()->has('message-success') != ""): ?>
                        <?php if(session()->has('message-success')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session()->get('message-success')); ?>

                        </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <div class="white-box">
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'search_expense_report_by_income', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

                            <div class="row">
                                <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                    <div class="col-lg-12 mt-30-md">
                                        <div class="primary_input">
                                        <input class="primary_input_field form-control<?php echo e(@$errors->has('expense') ? ' is-invalid' : ''); ?>" type="text" name="expense">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('common.search_by_expense'); ?><span class="text-danger"> *</span></label>
                                        
                                        <?php if($errors->has('expense')): ?>
                                        <span class="text-danger" >
                                            <?php echo e($errors->first('expense')); ?>

                                        </span>
                                        <?php endif; ?>
                                    </div>
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
        <?php if(isset($add_expenses)): ?>
            <div class="row mt-40">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-0"><?php echo app('translator')->get('accounts.expense_result'); ?> </h3>
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
                                        <th><?php echo app('translator')->get('lang.payment_method'); ?></th>
                                        <th><?php echo app('translator')->get('common.date'); ?></th>
                                        <th><?php echo app('translator')->get('accounts.amount'); ?>(<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                                    </tr>
                                </thead>
                                <?php $total_expense = 0;?>
                                <tbody>
                                    <?php $__currentLoopData = $add_expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $add_expense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php @$total_expense = @$total_expense + @$add_expense->amount; ?>
                                    <tr>
                                        <td><?php echo e(@$add_expense->name); ?></td>
                                        <td><?php echo e(@$add_expense->expenseHead !=""? @$add_expense->expenseHead->name:""); ?></td>
                                        <td><?php echo e(@$add_expense->paymentMethod!=""?@$add_expense->paymentMethod->method:""); ?></td>

                                        <td>
                                            <?php echo e(@$add_expense->date != ""? dateConvert(@$add_expense->date):''); ?>

                                        </td>
                                        <td><?php echo e(number_format(@$add_expense->amount, 2)); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($item_receives != 0): ?>
                                    <?php @$total_expense = @$total_expense + @$item_receives; ?>
                                    <tr>
                                        <td><?php echo app('translator')->get('lang.to_item_Receive'); ?></td>
                                        <td><?php echo app('translator')->get('inventory.item_Receive'); ?></td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo e(number_format(@$item_receives, 2)); ?></td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php if(@$payroll_payments != 0): ?>
                                    <?php @$total_expense = @$total_expense + @$payroll_payments; ?>
                                    <tr>
                                        <td><?php echo app('translator')->get('fees.from_payroll'); ?></td>
                                        <td><?php echo app('translator')->get('hr.payroll'); ?></td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo e(number_format(@$payroll_payments, 2)); ?></td>
                                    </tr>
                                    <?php endif; ?>  
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th><?php echo app('translator')->get('accounts.grand_total'); ?></th>
                                        <th></th>
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
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\accounts\search_expense_old.blade.php ENDPATH**/ ?>
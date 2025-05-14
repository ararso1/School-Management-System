<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('accounts.transaction'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <?php $__env->startPush('css'); ?>
        <style>
            table.dataTable{
                padding: 15px 30px !important;
            }

            /* table.dataTable thead .sorting_asc::after {
                top: 10px !important;
                left: 3px !important;
            } */

            /* table.dataTable thead .sorting::after {
                top: 10px !important;
                left: 3px !important;
            } */

            table.dataTable tbody th,
            table.dataTable tbody td {
                padding: 20px 30px 20px 30px !important;
            }

            table.dataTable tbody tr td:nth-child(2){
                padding-left: 0px!important;
            }

            table.dataTable tfoot th,
            table.dataTable tfoot td {
                padding: 10px 30px 6px 30px;
            }
        </style>
    <?php $__env->stopPush(); ?>
    <?php
        @$setting = generalSetting();
        if (!empty(@$setting->currency_symbol)) {
            @$currency = @$setting->currency_symbol;
        } else {
            @$currency = '$';
        }
    ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('accounts.transaction'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('accounts.accounts'); ?></a>
                    <a href="#"><?php echo app('translator')->get('reports.reports'); ?></a>
                    <a href="#"><?php echo app('translator')->get('accounts.transaction'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12">

                    <div class="white-box">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php echo app('translator')->get('common.select_criteria'); ?> </h3>
                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'transaction-search', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            <div class="col-lg-6 mt-30-md">
                                <div class="no-gutters input-right-icon">
                                    <div class="col">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for="">
                                                <?php echo e(__('common.date_range')); ?>

                                                <span class="text-danger"> *</span>
                                            </label>
                                            <input placeholder=""
                                                class="primary_input_field primary_input_field form-control" type="text"
                                                name="date_range" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label class="primary_input_label" for="">
                                    <?php echo e(__('common.type')); ?>

                                    <span class="text-danger"> *</span>
                                </label>
                                <select class="primary_select  form-control<?php echo e($errors->has('type') ? ' is-invalid' : ''); ?>"
                                    name="type" id="account-type">
                                    <option data-display="<?php echo app('translator')->get('common.search_type'); ?>" value="all"><?php echo app('translator')->get('common.search_type'); ?></option>
                                    <option value="In"><?php echo app('translator')->get('accounts.income'); ?></option>
                                    <option value="Ex"><?php echo app('translator')->get('accounts.expense'); ?></option>
                                </select>
                                <?php if($errors->has('type')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <strong><?php echo e(@$errors->first('type')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-3">
                                <div class="primary_input">
                                    <label class="primary_input_label" for="">
                                        <?php echo e(__('accounts.payment_method')); ?>

                                        <span class="text-danger"> *</span>
                                    </label>
                                    <select class="primary_select  form-control" name="payment_method" id="payment_method">
                                        <option data-display="<?php echo app('translator')->get('common.all'); ?>" value="all"><?php echo app('translator')->get('common.all'); ?></option>
                                        <?php $__currentLoopData = $payment_methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($value->id); ?>"
                                                <?php echo e(isset($search_info) ? ($search_info['method_id'] == $value->id ? 'selected' : '') : ''); ?>>
                                                <?php echo e($value->method); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
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
            <?php if(isset($add_incomes)): ?>
                <div class="row mt-40">
                    <div class="col-lg-12">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-lg-6 no-gutters">
                                    <div class="main-title">
                                        <h3 class="mb-15"><?php echo app('translator')->get('accounts.income_result'); ?></h3>
                                    </div>
                                </div>
                            </div>
                            <!-- </div> -->
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
                                                    <th style="left: 10px;"><?php echo app('translator')->get('common.date'); ?></th>
                                                    <th><?php echo app('translator')->get('common.name'); ?></th>
                                                    <th><?php echo app('translator')->get('accounts.payroll'); ?></th>
                                                    <th><?php echo app('translator')->get('accounts.payment_method'); ?></th>
                                                    <th style="right: 10px;"><?php echo app('translator')->get('accounts.amount'); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $total_income = 0;
                                                ?>
                                                <?php $__currentLoopData = $add_incomes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $add_income): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        @$total_income = @$total_income + @$add_income->amount;
                                                    ?>
                                                    <tr>
                                                        <td style="left: 10px;"><?php echo e(dateConvert(@$add_income->date)); ?></td>
                                                        <td><?php echo e(@$add_income->name); ?></td>
                                                        <td><?php echo e(@$add_income->ACHead->head); ?></td>
                                                        <td>
                                                            <?php echo e(@$add_income->paymentMethod->method); ?>

                                                            <?php if(@$add_income->payment_method_id == 3): ?>
                                                                (<?php echo e(@$add_income->account->bank_name); ?>)
                                                            <?php endif; ?>
                                                        </td>
                                                        <td style="right: 10px;"><?php echo e(@$add_income->amount); ?></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th class="text-right"><?php echo app('translator')->get('accounts.grand_total'); ?>:</th>
                                                    <th><?php echo e(currency_format($total_income)); ?></th>
                                                </tr>
                                            </tfoot>
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
                                                <th style="left: 10px;"><?php echo app('translator')->get('common.date'); ?></th>
                                                <th><?php echo app('translator')->get('common.name'); ?></th>
                                                <th><?php echo app('translator')->get('accounts.expense_head'); ?></th>
                                                <th><?php echo app('translator')->get('accounts.payment_method'); ?></th>
                                                <th style="right: 10px;"><?php echo app('translator')->get('accounts.amount'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $total_expense = 0;
                                            ?>
                                            <?php $__currentLoopData = $add_expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $add_expense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    @$total_expense = @$total_expense + @$add_expense->amount;
                                                ?>
                                                <tr>
                                                    <td style="left: 10px;"><?php echo e(dateConvert(@$add_expense->date)); ?></td>
                                                    <td><?php echo e(@$add_expense->name); ?></td>
                                                    <td><?php echo e(@$add_expense->ACHead->head); ?></td>
                                                    <td>
                                                        <?php echo e(@$add_expense->paymentMethod->method); ?>

                                                        <?php if(@$add_expense->payment_method_id == 3): ?>
                                                            (<?php echo e(@$add_expense->account->bank_name); ?>)
                                                        <?php endif; ?>
                                                    </td>
                                                    <td style="right: 10px;"><?php echo e(currency_format(@$add_expense->amount)); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th class="text-right"><?php echo app('translator')->get('accounts.grand_total'); ?>:</th>
                                                <th><?php echo e(currency_format($total_expense)); ?></th>
                                            </tr>
                                        </tfoot>
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
            <?php endif; ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', ['i' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.date_range_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\accounts\transaction.blade.php ENDPATH**/ ?>
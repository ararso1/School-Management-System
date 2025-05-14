<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('hr.generate_payroll'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
    <style>
        element.style {
            width: 190px !important;
        }

        table.dataTable thead th {
            /* padding: 10px 30px !important; */
            padding-left: 25px !important;
        }

        table.dataTable tbody th,
        table.dataTable tbody td {
            padding: 20px 10px 20px 15px !important;
        }

        table.dataTable thead .sorting::after {
            left: 10px !important;
            top: 10px;
        }

        table.dataTable thead .sorting_asc::after {
            left: 10px !important;
            top: 10px;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('hr.generate_payroll'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('hr.human_resource'); ?></a>
                    <a href="#"><?php echo app('translator')->get('hr.generate_payroll'); ?></a>
                    <a href="#"><?php echo app('translator')->get('hr.view Payment'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            
         
                <div class="row mt-40">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-4 no-gutters">
                                <div class="main-title">
                                    <h3 class="mb-0"><?php echo e($generatePayroll->payroll_month); ?> <?php echo e($generatePayroll->payroll_year); ?>

                                    <?php echo e(__('hr.partial_payment_list')); ?>

                                    </h3>
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
                                                <th><?php echo app('translator')->get('hr.staff_no'); ?></th>
                                                <th><?php echo app('translator')->get('common.name'); ?></th>
                                                <th><?php echo app('translator')->get('hr.role'); ?></th>
                                                <th><?php echo app('translator')->get('accounts.amount'); ?></th>
                                                <th><?php echo app('translator')->get('accounts.payment_method'); ?></th>
                                                <th><?php echo app('translator')->get('hr.payment_date'); ?></th>
                                                <th><?php echo app('translator')->get('common.created_by'); ?></th>                                         
                                                <th><?php echo app('translator')->get('common.action'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $payrollPayments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td>
                                                    <a href="<?php echo e(route('viewStaff', $generatePayroll->staffDetails->id)); ?>" target="_blank" rel="noopener noreferrer"><?php echo e($generatePayroll->staffDetails->staff_no); ?></a>
                                                    </td>
                                                    <td><?php echo e($generatePayroll->staffDetails->full_name); ?></td>
                                                    <td><?php echo e($generatePayroll->staffDetails->roles->name); ?></td>
                                                    <td><?php echo e($payment->amount); ?></td>
                                                    <td><?php echo e($payment->paymentMethod->method); ?></td>
                                                    <td><?php echo e($payment->payment_date); ?></td>
                                                    <td><?php echo e($payment->createdBy->full_name); ?> </td>
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
                                                            <a class="dropdown-item" data-toggle="modal" data-target="#deleteModal_<?php echo e($payment->id); ?>"
                                                            href="#"><?php echo app('translator')->get('common.delete'); ?></a>
                                                            <a class="dropdown-item" target="_blank"
                                                            href="<?php echo e(route('print-payroll-payment', $payment->id)); ?>"><?php echo app('translator')->get('common.print'); ?></a>
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
                                                <div class="modal fade admin-query" id="deleteModal_<?php echo e($payment->id); ?>">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title"><?php echo app('translator')->get('common.delete'); ?></h4>
                                                                <button type="button" class="close" data-dismiss="modal">&times;
                                                                </button>
                                                            </div>
            
                                                            <div class="modal-body">
                                                                <div class="text-center">
                                                                    <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                                                                </div>
            
                                                                <div class="mt-40 d-flex justify-content-between">
                                                                    <button type="button" class="primary-btn tr-bg"
                                                                            data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                                                                    
                                                                    <?php echo Form::open(['route'=>'delete-payroll-payment', 'method'=>'POST']); ?>

                                                                    <input type="hidden" name="payroll_payment_id" value="<?php echo e($payment->id); ?>">
                                                                        <button class="primary-btn fix-gr-bg"
                                                                                type="submit"><?php echo app('translator')->get('common.delete'); ?></button>
                                                                    <?php echo Form::close(); ?>

                                                                </div>
                                                            </div>
            
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\humanResource\payroll\view_payroll_payment.blade.php ENDPATH**/ ?>
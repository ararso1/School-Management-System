<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('reports.student_fine_report'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('reports.student_fine_report'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('reports.reports'); ?></a>
                <a href="#"><?php echo app('translator')->get('reports.student_fine_report'); ?></a>
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
                    
                    <div class="white-box">
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'student_fine_reports', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

                            <div class="row">
                                <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                <div class="col-lg-6 mt-30-md col-md-6">
                                    <div class="no-gutters input-right-icon">
                                        <div class="col">
                                            <div class="primary_input">
                                                <input class="primary_input_field  primary_input_field date form-control form-control<?php echo e($errors->has('date_from') ? ' is-invalid' : ''); ?>" id="startDate" type="text"
                                                     name="date_from" value="<?php echo e(date('m/d/Y')); ?>" readonly>
                                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('accounts.date_from'); ?></label>
                                                    
                                                <?php if($errors->has('date_from')): ?>
                                                <span class="text-danger" >
                                                    <?php echo e($errors->first('date_from')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <button class="" type="button">
                                            <i class="ti-calendar" id="admission-date-icon"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-30-md col-md-6">
                                    <div class="no-gutters input-right-icon">
                                        <div class="col">
                                            <div class="primary_input">
                                                <input class="primary_input_field  primary_input_field date form-control form-control<?php echo e($errors->has('date_to') ? ' is-invalid' : ''); ?>" id="startDate" type="text"
                                                     name="date_to" value="<?php echo e(date('m/d/Y')); ?>" readonly>
                                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('accounts.date_to'); ?></label>
                                                    
                                                <?php if($errors->has('date_to')): ?>
                                                <span class="text-danger" >
                                                    <?php echo e($errors->first('date_to')); ?>

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
            </div>
            
<?php if(isset($fees_payments)): ?>

            <div class="row mt-40">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-0"><?php echo app('translator')->get('reports.student_fine_report'); ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <table id="table_id" class="table" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><?php echo app('translator')->get('common.date'); ?></th>
                                        <th><?php echo app('translator')->get('common.name'); ?></th>
                                        <th><?php echo app('translator')->get('common.class'); ?></th>
                                        <th><?php echo app('translator')->get('fees.fees_type'); ?></th>
                                        <th><?php echo app('translator')->get('fees.fine'); ?></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        $grand_amount = 0;
                                        $grand_total = 0;
                                        $grand_discount = 0;
                                        $grand_fine = 0;
                                        $total = 0;
                                    ?>
                                        <?php $__currentLoopData = $fees_payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fees_payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $total = 0; ?>
                                        <tr>
                                            <td  data-sort="<?php echo e(strtotime($fees_payment->payment_date)); ?>" >
                                                <?php echo e($fees_payment->payment_date != ""? dateConvert($fees_payment->payment_date):''); ?>


                                            </td>
                                            <td><?php echo e($fees_payment->studentInfo !=""?$fees_payment->studentInfo->full_name:""); ?></td>
                                            <td>
                                                <?php if($fees_payment->studentInfo!="" && $fees_payment->studentInfo->class!=""): ?>
                                                <?php echo e($fees_payment->studentInfo->class->class_name); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($fees_payment->feesType!=""?$fees_payment->feesType->name:""); ?></td>
                                            <td>
                                                <?php
                                                    $total =  $total + $fees_payment->fine;
                                                    $grand_fine =  $grand_fine + $fees_payment->fine;
                                                    echo $fees_payment->fine;
                                                ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                <tfoot>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th><?php echo app('translator')->get('accounts.grand_total'); ?> </th>
                                    <th><?php echo e($grand_fine); ?></th>
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
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\reports\student_fine_report.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title'); ?> 
<?php echo app('translator')->get('accounts.fine_report'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<?php  $setting = generalSetting();  if(!empty($setting->currency_symbol)){ $currency = $setting->currency_symbol; }else{ $currency = '$'; }   ?> 
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('accounts.fine_report'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('accounts.accounts'); ?></a>
                <a href="#"><?php echo app('translator')->get('accounts.reports'); ?></a>
                <a href="#"><?php echo app('translator')->get('accounts.fine_report'); ?></a>
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
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'fine-report-search', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            <?php if(moduleStatusCheck('University')): ?>
                            <?php if ($__env->exists(
                                'university::common.session_faculty_depart_academic_semester_level',
                                ['mt' => 'mt-30', 'hide' => ['USUB'], 'required' => ['USL']]
                            )) echo $__env->make(
                                'university::common.session_faculty_depart_academic_semester_level',
                                ['mt' => 'mt-30', 'hide' => ['USUB'], 'required' => ['USL']]
                            , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="col-md-3 mt-30">
                                <label for=""><?php echo app('translator')->get('common.date_range'); ?> </label>
                                <input placeholder="" class="primary_input_field primary_input_field form-control" type="text" name="date_range" value="">
                            </div>
                            <?php else: ?>
                            <div class="col-md-6">
                                <input placeholder="" class="primary_input_field primary_input_field form-control" type="text" name="date_range" value="">
                            </div>
                            <div class="col-lg-3 mt-30-md">
                                <select class="primary_select  form-control<?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>" id="select_class" name="class">
                                    <option data-display="<?php echo app('translator')->get('common.select_class'); ?>" value=""><?php echo app('translator')->get('common.select_class'); ?></option>
                                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($class->id); ?>"><?php echo e($class->class_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-lg-3 mt-30-md" id="select_section_div">
                                <select class="primary_select  form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?>" id="select_section" name="section">
                                    <option data-display="<?php echo app('translator')->get('common.select_section'); ?>" value=""><?php echo app('translator')->get('common.select_section'); ?></option>
                                </select>
                                <div class="pull-right loader loader_style" id="select_section_loader">
                                    <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                </div>
                            </div>
                            <?php endif; ?>
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
        <?php if(isset($fine_info)): ?>
        <div class="row mt-40">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6 no-gutters">
                        <div class="main-title">
                            <h3 class="mb-0"><?php echo app('translator')->get('accounts.fine_report'); ?></h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <table id="table_id_al" class="table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('fees.payment_id'); ?></th>
                                    <th><?php echo app('translator')->get('common.date'); ?></th>
                                    <th><?php echo app('translator')->get('common.name'); ?></th>
                                    <th><?php echo app('translator')->get('common.class'); ?></th>
                                    <th><?php echo app('translator')->get('fees.fees_type'); ?></th>
                                    <th><?php echo app('translator')->get('accounts.mode'); ?></th>
                                    <th><?php echo app('translator')->get('accounts.fine'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $grand_amount = 0;
                                    $grand_total = 0;
                                    $grand_fine = 0;
                                ?>
                                <?php $__currentLoopData = $fine_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $students): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fees_payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $total = 0; ?>
                                    <?php if($fees_payment->fine>0): ?>
                                    <tr>
                                        <td><?php echo e($fees_payment->fees_type_id.'/'.$fees_payment->id); ?></td>
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
                                        <?php echo e(@$fees_payment->payment_mode); ?>

                                        </td>
                                        <td>
                                            <?php
                                                $total =  $total + $fees_payment->fine;
                                                $grand_fine =  $grand_fine + $fees_payment->fine;
                                                echo currency_format($fees_payment->fine);
                                            ?>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th><?php echo app('translator')->get('fees.grand_total'); ?> </th>
                                <th><?php echo e(currency_format($grand_fine)); ?></th>
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
<?php echo $__env->make('backEnd.partials.date_range_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\accounts\fine_report.blade.php ENDPATH**/ ?>
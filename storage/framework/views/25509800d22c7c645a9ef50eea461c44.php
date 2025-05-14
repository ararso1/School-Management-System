<?php
$setting_info = generalSetting();

?>
<div class="container-fluid">
    <div class="student-details">
        <div class="text-center mb-4">
            <div class="d-flex justify-content-center">
                <div>
                <?php if(! is_null($setting_info->logo)): ?>
                        <img class="logo-img" src="<?php echo e(asset($setting_info->logo)); ?>" alt="<?php echo e($setting_info->school_name); ?>"> 
                    <?php else: ?>
                            <img class="logo-img" src="<?php echo e(asset('public/uploads/settings/logo.png')); ?>" alt="logo"> 
                    <?php endif; ?>
                </div>
                <div class="ml-30">
                    <h2><?php if(isset($schoolDetails)): ?><?php echo e($schoolDetails->school_name); ?> <?php endif; ?></h2>
                    <p class="mb-0"><?php if(isset($schoolDetails)): ?><?php echo e($schoolDetails->address); ?> <?php endif; ?></p>
                </div>
            </div>
            <h3 class="mt-3"><?php echo app('translator')->get('hr.payslip_for_the_period_of'); ?> <?php echo e($payrollDetails->payroll_month); ?> <?php echo e($payrollDetails->payroll_year); ?></h3>
        </div>

        <div class="single-meta d-flex justify-content-between mb-4">
            <div class="value text-left">
                <?php echo app('translator')->get('hr.payslip'); ?> #<?php if(isset($payrollDetails)): ?><?php echo e($payrollDetails->id); ?> <?php endif; ?>
            </div>
            <div class="name">
               
                <?php echo app('translator')->get('fees.payment_date'); ?>: <?php if(isset($payrollDetails)): ?>

                <?php echo e(dateConvert($payrollDetails->payment_date)); ?>

               
                <?php endif; ?>
            </div>
        </div>


        <div class="student-meta-box">
            <div class="single-meta">
                <div class="row">
                    <div class="col-lg-3 col-md-5">
                        <div class="value text-left">
                            <?php echo app('translator')->get('hr.staff_id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-7">
                        <div class="name">
                            <?php if(isset($payrollDetails)): ?><?php echo e($payrollDetails->staffs->staff_no); ?> <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-5">
                        <div class="value text-left">
                            <?php echo app('translator')->get('common.name'); ?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-7">
                        <div class="name">
                            <?php if(isset($payrollDetails)): ?><?php echo e($payrollDetails->staffDetails->full_name); ?> <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="single-meta">
                <div class="row">
                    <div class="col-lg-3 col-md-5">
                        <div class="value text-left">
                            <?php echo app('translator')->get('hr.departments'); ?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-7">
                        <div class="name">
                            <?php if(isset($payrollDetails)): ?><?php echo e($payrollDetails->staffDetails->departments->name); ?> <?php endif; ?>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-5">
                        <div class="value text-left">
                            <?php echo app('translator')->get('hr.designation'); ?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-7">
                        <div class="name">
                            <?php if(isset($payrollDetails)): ?><?php echo e($payrollDetails->staffDetails->designations->title); ?> <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="single-meta">
                <div class="row">
                    <div class="col-lg-3 col-md-5">
                        <div class="value text-left">
                            <?php echo app('translator')->get('hr.payment_mode'); ?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-7">
                        <div class="name">
                            <?php if($payrollDetails->payment_mode != ""): ?>
                            <?php echo e($payrollDetails->paymentMethods->method); ?>

                            <?php endif; ?>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-5">
                        <div class="value text-left">
                            <?php echo app('translator')->get('hr.basic_salary'); ?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-7">
                        <div class="name">
                            <?php if(isset($payrollDetails)): ?><?php echo e($payrollDetails->basic_salary); ?> <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-meta">
                <div class="row">
                    <div class="col-lg-3 col-md-5">
                        <div class="value text-left">
                            <?php echo app('translator')->get('hr.gross_salary'); ?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-7">
                        <div class="name">
                            <?php if(isset($payrollDetails)): ?><?php echo e($payrollDetails->gross_salary); ?> <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-5">
                        <div class="value text-left">
                            <?php echo app('translator')->get('hr.net_salary'); ?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-7">
                        <div class="name">
                            <?php if(isset($payrollDetails)): ?><?php echo e($payrollDetails->net_salary); ?> <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-meta">
                <div class="row">
                    <?php if($payrollDetails->note): ?>
                    <div class="col-lg-3 col-md-5">
                        <div class="value text-left">
                            <?php echo app('translator')->get('common.note'); ?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-7">
                        <div class="name">
                            <?php echo e($payrollDetails->note); ?>

                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="col-lg-12 mt-10">
                        <a href="<?php echo e(route('print-payslip', $payrollDetails->id)); ?>" class="primary-btn small fix-gr-bg pull-right" target="_blank"><i class="ti-printer"> </i> <?php echo app('translator')->get('common.print'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\humanResource\payroll\viewPayslip.blade.php ENDPATH**/ ?>
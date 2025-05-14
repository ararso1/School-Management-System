<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('fees.fees_settings'); ?>
<?php $__env->stopSection(); ?>
<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 55px;
        height: 26px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 24px;
        width: 24px;
        left: 3px;
        bottom: 2px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background: var(--primary-color);
    }

    input:focus+.slider {
        box-shadow: 0 0 1px linear-gradient(90deg, var(--gradient_1) 0%, #c738d8 51%, var(--gradient_1) 100%);
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

</style>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('fees.fees_settings'); ?> </h1>

                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('fees.fees_collection'); ?></a>
                    <a href="#"><?php echo app('translator')->get('common.settings'); ?></a>
                </div>
            </div>
        </div>
    </section>
   

    <section class="admin-visitor-area up_st_admin_visitor" id="admin-visitor-area">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="white_box_30px mt-5">
                                    <!-- SMTP form  -->
                                    <div class="main-title mb-25">
                                        <h3 class="mb-0"><?php echo app('translator')->get('fees.fees_invoice_settings'); ?></h3>
                                    </div>
                                    <?php echo e(Form::model($feesInvoice, ['class' => 'bg-white p-4 rounded', 'route' => ['directFees.feesInvoiceUpdate'], 'method' => 'post'])); ?>

                                    <div class="row">
                                          <input type="hidden" name="school_id" value="<?php echo e(auth()->user()->school_id); ?>">
                                            <div class="col-lg-6 d-flex relation-button justify-content-between mb-3 justify-content-between mt-25">
                                                <div class="primary_input">
                                                    <?php echo e(Form::text('prefix', null, ['autocomplete' => 'off', 'class' => 'primary_input_field form-control'.  ($errors->has('prefix') ? ' is-invalid' : '')])); ?>

                                                    <?php echo e(Form::label('prefix', __('fees.prefix')."*")); ?>

                                                    
                                                    <?php $__errorArgs = ['prefix'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="text-danger custom-error-message" role="alert">
                                                            <?php echo e($message); ?>

                                                        </span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 d-flex relation-button justify-content-between mb-3 justify-content-between mt-25">
                                                <div class="primary_input">
                                                    <?php echo e(Form::text('start_form', null, ['autocomplete' => 'off', 'class' => 'primary_input_field form-control'. ($errors->has('start_form') ? ' is-invalid' : '')])); ?>

                                                    <?php echo e(Form::label('start_form', __('fees.start_form')."*")); ?>

                                                    
                                                    <?php $__errorArgs = ['start_form'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="text-danger custom-error-message" role="alert">
                                                            <?php echo e($message); ?>

                                                        </span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-20">
                                            <div class="col-lg-12 text-center">
                                                <button class="primary-btn small fix-gr-bg"><i class="ti-check"></i>
                                                    <?php echo app('translator')->get('common.update'); ?>
                                                </button>
                                            </div>
                                        </div>
                                    <?php echo e(Form::close()); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="admin-visitor-area up_st_admin_visitor" id="admin-visitor-area">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="white_box_30px mt-5">
                                    <!-- SMTP form  -->
                                    <div class="main-title mb-25">
                                        <h3 class="mb-0"><?php echo app('translator')->get('fees.payment_reminder_settings'); ?></h3>
                                    </div>

                                    <div class="row">
                                        <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                                            <a class="primary-btn small fix-gr-bg" data-toggle="modal" data-target="#commandModal"
                                                href="#"><?php echo app('translator')->get('fees.cron_command'); ?>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="modal fade admin-query" id="commandModal" >
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><?php echo app('translator')->get('fees.cron_jobs_command'); ?></h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                            
                                                <div class="modal-body">
                                                    <div class="text-center">
                                                        <h4><code>artisan absent_notification:sms</code> </h4>
                                                       
                                                    </div>
                            
                                                    <div class="mt-40 d-flex ">
                                                        <?php echo app('translator')->get('fees.example'); ?>: <br>
                                                        <code>
                                                           <?php echo e('cd ' . base_path() . '/ && php artisan absent_notification:sms >> /dev/null 2>&1'); ?>

                                                        </code>
                                                    </div>
                                                </div>
                            
                                            </div>
                                        </div>
                                    </div>


                                    
                                    <?php echo e(Form::model($paymentReminder, ['class' => 'bg-white p-4 rounded', 'route' => ['directFees.paymentReminder'], 'method' => 'POST'])); ?>

                                        <?php
                                            $data = json_decode($paymentReminder->notification_types);
                                        ?>
                                        <div class="row">
                                          <input type="hidden" name="school_id" value="<?php echo e(auth()->user()->school_id); ?>">
                                            <div class="col-lg-6 d-flex relation-button justify-content-between mb-3 justify-content-between mt-25">
                                                <div class="primary_input">
                                                    <?php echo e(Form::text('due_date_before', null, ['autocomplete' => 'off', 'class' => 'primary_input_field form-control'. ($errors->has('due_date_before') ? ' is-invalid' : '')])); ?>

                                                    <?php echo e(Form::label('due_date_before', __('fees.due_date_before'))); ?>

                                                    
                                                    <?php $__errorArgs = ['due_date_before'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="text-danger custom-error-message" role="alert">
                                                            <?php echo e($message); ?>

                                                        </span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 d-flex relation-button justify-content-between mb-3 justify-content-between mt-25">
                                                <p class="text-uppercase mb-0"><?php echo app('translator')->get('fees.notification_type'); ?></p>
                                                <div class="d-flex radio-btn-flex ml-30 mt-1">
                                                    <div class="mr-20">
                                                        <input type="checkbox" name="notification_types[]" id="system" value="system" class="common-radio relationButton endDay" <?php echo e(isset($data)? (in_array('system',$data) ? 'checked': ''):''); ?>>
                                                        <label for="system"><?php echo app('translator')->get('fees.system'); ?></label>
                                                    </div>
                                                    <div class="mr-20">
                                                        <input type="checkbox" name="notification_types[]" id="email" value="email" class="common-radio relationButton endDay" <?php echo e(isset($data)? (in_array('email',$data) ? 'checked': ''):''); ?>>
                                                        <label for="email"><?php echo app('translator')->get('common.email'); ?></label>
                                                    </div>
                                                    <div class="mr-20">
                                                        <input type="checkbox" name="notification_types[]" id="sms" value="sms" class="common-radio relationButton endDay" <?php echo e(isset($data)? (in_array('sms',$data) ? 'checked': ''):''); ?>>
                                                        <label for="sms"><?php echo app('translator')->get('common.sms'); ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-20">
                                            <div class="col-lg-12 text-center">
                                                <button class="primary-btn small fix-gr-bg"><i class="ti-check"></i>
                                                    <?php echo app('translator')->get('common.update'); ?>
                                                </button>
                                            </div>
                                        </div>
                                    <?php echo e(Form::close()); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
    <script>
        $(document).ready(function(){
                hideShowDay(<?php echo e(@$model->choose_subject); ?>);
            $('.endDay').on('change', function(){               
               hideShowDay($(this).val());
            })
            function hideShowDay(endDay) {
                if(endDay == 1 ) {
                    $('#end_day').removeClass('d-none');
                } else {
                    $('#end_day').addClass('d-none');
                }
            }
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\feesCollection\directFees\directFeesSetting.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title'); ?> 
<?php echo app('translator')->get('fees.all_fees'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <style type="text/css">
        .panel-title {
            display: inline;
            font-weight: bold;
        }

        .display-table {
            display: table;
        }

        .display-tr {
            display: table-row;
        }

        .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 61%;
        }
    </style>

    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('fees.collect_fees_online'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="<?php echo e(route('student-fees')); ?>"><?php echo app('translator')->get('fees.all_fees'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="main-title">
                        <h3 class="mb-30"><?php echo app('translator')->get('fees.collect_fees_online_vai_card'); ?>
                            ( <?php echo app('translator')->get('fees.stripe'); ?> )</h3>
                    </div>
                </div>
            </div>

            <?php echo e(Form::open(['class' => 'form-horizontal require-validation', 'files' => true, 'method' => 'POST','data-cc-on-file' => 'false', 'data-stripe-publishable-key' => $stripe_publisher_key, 'route' => 'collect-fees-stripe-strore', 'id' => 'payment-form', 'name'=> 'payment-form', 'enctype' => 'multipart/form-data'])); ?>


            <div class="row">
                <div class="col-lg-12">
                    <?php if(session()->has('message-success')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session()->get('message-success')); ?>

                        </div>
                    <?php elseif(session()->has('message-danger')): ?>
                        <div class="alert alert-danger">
                            <?php echo e(session()->get('message-danger')); ?>

                        </div>
                    <?php endif; ?>
                    <div class="white-box">
                        <div class="">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            <input type="hidden" name="real_amount" id="real_amount" value="<?php echo e($amount); ?>">
                            <input type="hidden" name="student_id" value="<?php echo e($student_id); ?>">
                            <input type="hidden" name="fees_type_id" value="<?php echo e($fees_type_id); ?>">


                            <div class="row justify-content-center mb-30">
                                <div class="col-lg-4">
                                    <div class="primary_input required">
                                        <input class="primary_input_field form-control control-label"
                                               type="text" size='4'>
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('accounts.name_on_card'); ?> <span class="text-danger"> *</span> </label>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center mb-30">
                                <div class="col-lg-4">
                                    <div class="primary_input required">
                                        <input class="primary_input_field form-control card-number"
                                               type="text" size='20' autocomplete='off'>
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('accounts.card_number'); ?><span class="text-danger"> *</span> </label>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center mb-30">
                                <div class="col-lg-4">
                                    <div class="primary_input cvc required">
                                        <input class="primary_input_field form-control card-cvc"
                                               type="text" size='4' autocomplete='off'>
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('accounts.cvc'); ?><span class="text-danger"> *</span> </label>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center mb-30">
                                <div class="col-lg-4">
                                    <div class="primary_input expiration required">
                                        <input class="primary_input_field form-control card-expiry-month"
                                               type="text" size='4' autocomplete='off'>
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('accounts.expiration_month'); ?><span class="text-danger"> *</span> </label>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center mb-30">
                                <div class="col-lg-4">
                                    <div class="primary_input expiration required">
                                        <input class="primary_input_field form-control card-expiry-year"
                                               type="text" size='4' autocomplete='off'>
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('accounts.expiration_year'); ?><span class="text-danger"> *</span> </label>
                                        <span class="focus-border"> </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='form-row row justify-content-center'>
                            <div class='col-md-4 error form-group hide'>
                                <div class='alert-warning alert alert-danger-stripe'>
                                    *** <?php echo app('translator')->get('fees.please_give_the_all_information_properly'); ?> ***
                                </div>
                            </div>
                        </div>
                        <div class="row mt-40">
                            <div class="col-lg-12 text-center">
                                <button class="primary-btn fix-gr-bg">
                                    <span class="ti-check"></span>
                                    <?php echo app('translator')->get('fees.pay_with_stripe'); ?>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo e(Form::close()); ?>

    </section>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\feesCollection\collectFeesStripeView.blade.php ENDPATH**/ ?>
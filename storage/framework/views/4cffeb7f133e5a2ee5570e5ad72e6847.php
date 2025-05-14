<?php $__env->startSection('title'); ?> 
<?php echo app('translator')->get('fees.all_fees'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<style type="text/css">
    .smtp_wrapper{
        display: none;
    }
    .smtp_wrapper_block{
        display: block;
    }
</style>

<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('fees.collect_fees_online'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="<?php echo e(route('student_fees')); ?>"><?php echo app('translator')->get('fees.all_fees'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="main-title">
                    <h3 class="mb-30"><?php echo app('translator')->get('fees.collect_fees_online'); ?></h3>
                </div>
            </div>
        </div>
     <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'method' => 'POST', 'route' => 'payByPaypal', 'id' => 'payment-form', 'enctype' => 'multipart/form-data'])); ?>

        <div class="row">
            <div class="col-lg-12">              
              <div class="white-box">
                <div class="">
                    <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                    <input type="hidden" name="real_amount" id="real_amount" value="<?php echo e($amount); ?>">
                    <input type="hidden" name="student_id" value="<?php echo e($student_id); ?>">
                    <input type="hidden" name="fees_type_id" value="<?php echo e($fees_type_id); ?>"> 
                     
                     <div class="row justify-content-center mb-30">
                        <div class="col-lg-4">
                            <div class="primary_input">
                                <input class="primary_input_field form-control<?php echo e($errors->has('from_name') ? ' is-invalid' : ''); ?>"
                                type="text" name="amount" id="amount" autocomplete="off" value="<?php echo e(isset($amount)? $amount : ''); ?>" readonly="readonly">
                                <label class="primary_input_label" for=""><?php echo app('translator')->get('fees.fees_amount'); ?> <span class="text-danger"> *</span> </label>
                                
                                <?php if($errors->has('from_name')): ?>
                                <span class="text-danger" >
                                    <?php echo e($errors->first('from_name')); ?>

                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                  </div>
                    
                </div>
                <div class="row mt-40">
                    <div class="col-lg-12 text-center">
                        <button class="primary-btn fix-gr-bg">
                            <span class="ti-check"></span>
                            <?php echo app('translator')->get('fees.pay_with_paypal'); ?>
                        </button>
                    </div>
                </div>
            </div>
        </div> 
<?php echo e(Form::close()); ?>

    </div>
</div>

</div>
</section>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\feesCollection\collectFeesByGateway.blade.php ENDPATH**/ ?>
<div class="container-fluid">
<style>
hr {
  border: 0;
  clear:both;
  display:block;
  width: 96%;               
  background-color:#369dff;
  height: 1px;
}
</style>
    <div class="row">
        <?php $__currentLoopData = $fees_payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fees_payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-lg-12">
            <div class="row mt-25">
                <div class="col-lg-6  mt-20">
                    <div class="single-meta">
                            <div class="d-flex justify-content-between">
                                <?php if(moduleStatusCheck('University')): ?>
                                    <div class="name">
                                        <?php echo app('translator')->get('university::un.installment'); ?>:
                                    </div>
                                    <div class="value">
                                        <?php echo e(@$fees_payment->feesInstallment->installment->title); ?>

                                    </div>
                                <?php else: ?> 
                                    <div class="name">
                                        <?php echo app('translator')->get('fees.fees_type'); ?>:
                                    </div>
                                    <div class="value">
                                        <?php echo e(@$fees_payment->feesType->name); ?>

                                    </div>
                                <?php endif; ?> 
                            </div>
                        </div>
                </div>
                <div class="col-lg-6 mt-20">
                    <div class="single-meta">
                            <div class="d-flex justify-content-between">
                                <div class="name">
                                    <?php echo app('translator')->get('common.date'); ?>:
                                </div>
                                <div class="value">
                                    <?php echo e(!empty($fees_payment->date)? dateConvert(@$fees_payment->date):''); ?>

                                </div>
                            </div>
                        </div>
                </div>
                <div class="col-lg-6 mt-20">
                    <div class="single-meta">
                            <div class="d-flex justify-content-between">
                                <div class="name">
                                    <?php echo app('translator')->get('accounts.amount'); ?>:
                                </div>
                                <div class="value">
                                  <?php echo e(currency_format(@$fees_payment->amount)); ?>

                                </div>
                            </div>
                        </div>
                </div>
                <div class="col-lg-6 mt-20">
                    <div class="single-meta">
                            <div class="d-flex justify-content-between">
                                <div class="name">
                                    <?php echo app('translator')->get('common.note'); ?>:
                                </div>
                                <div class="value">
                                    <?php echo e(@$fees_payment->note); ?>

                                </div>
                            </div>
                        </div>
                </div>
                <div class="col-lg-12 mt-20">
                    <div class="single-meta">
                            <div class="justify-content-between">
                                <div class="name">
                                    <?php echo app('translator')->get('accounts.slip'); ?>
                                </div>
                                <div class="value text-center">
                                    <img class="student-meta-img" width="100%" src="<?php echo e(asset(@$fees_payment->slip)); ?>" alt="">
                                </div>
                            </div>
                        </div>
                </div>
            </div>


        </div>
        <hr/>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="d-flex align-items-center justify-content-center">
            <h3>
                Total :  <?php echo e(currency_format($amount)); ?>

            </h3>
        </div>
        <div class="col-lg-12 text-center mt-40">
            <div class="mt-40 d-flex justify-content-between">
                <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\studentPanel\view_bank_payment.blade.php ENDPATH**/ ?>
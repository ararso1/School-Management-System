<?php $__env->startSection('content'); ?>

<div class="single-report-admit">
    <div class="card-header">
        <h2 class="text-center text-uppercase color-whitesmoke" ><?php echo e($title ??  __('service::install.error')); ?>

        </h2>

    </div>
</div>

<div class="card-body">
    <p class="text-center">
        <?php echo e($message); ?>

    </p>

    <a href="<?php echo e(url('/')); ?>" class="offset-3 col-sm-6 primary-btn fix-gr-bg mt-40 mb-20">
        <?php echo e(__('service::install.goto_home')); ?> </a>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('service::layouts.app', ['title' => __('service::install.error')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\vendors\service\install\error.blade.php ENDPATH**/ ?>
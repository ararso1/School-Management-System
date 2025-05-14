<?php $__env->startSection('content'); ?>

<div class="single-report-admit">
    <div class="card-header">
        <h2 class="text-center text-uppercase color-whitesmoke" ><?php echo e(__('service::install.welcome_title')); ?>

        </h2>

    </div>
</div>

<div class="card-body">
    <p class="text-center">
        <?php echo e(__('service::install.welcome_description')); ?>

    </p>

    <a href="<?php echo e(route('service.preRequisite')); ?>" class="offset-3 col-sm-6 primary-btn fix-gr-bg mt-40 mb-20">
        <?php echo e(__('service::install.get_started')); ?> </a>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('service::layouts.app_install', ['title' => __('service::install.welcome')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\vendors\service\install\welcome.blade.php ENDPATH**/ ?>
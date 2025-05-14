<style>
img{
    max-width: 100%;
}
</style>
<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/')); ?>/frontend/css/new_style.css"/>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('main_content'); ?>
    <?php if(@$page->header_image): ?>
    <section class="container box-1420">
        <div class="banner-area" style="background: linear-gradient(0deg, rgba(124, 50, 255, 0.6), rgba(199, 56, 216, 0.6)), url(<?php echo e(@$page->header_image != ""? asset(@$page->header_image) : '../img/client/common-banner1.jpg'); ?>) no-repeat center;">
            <div class="banner-inner">
                <div class="banner-content">
                    <h2><?php echo e($page->title); ?></h2>
                    <p><?php echo e($page->sub_title); ?></p>
                </div>
            </div>
        </div>
    </section>
    <section class="academics-area section-gap-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row all_info">
                        <div class="col-lg-12 col-md-12 all_courses">
                            <div class="academic-item">
                                <div class="academic-text text-left">
                                    <?php echo $page->details; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php else: ?>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-12 mt-30">
                <div class="text-center white-box single_registration_area">
                    <div class="reg_tittle mt-20 mb-20">
                        <h2><?php echo e($page->title); ?></h2>
                        <p><?php echo e($page->sub_title); ?></p>
                    </div>
                        <div class="row mt-20">
                            <div class="col-lg-12 text-left">
                                <?php echo $page->details; ?>

                            </div>
                        </div> 
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontEnd.home.front_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\frontEnd\pages\pages.blade.php ENDPATH**/ ?>
<?php if (! $__env->hasRenderedOnce('e28e3a23-5465-4fd9-847f-fef836b69e0a')): $__env->markAsRenderedOnce('e28e3a23-5465-4fd9-847f-fef836b69e0a');
$__env->startPush(config('pagebuilder.site_style_var')); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/theme/edulia/packages/photoswipe/photoswipe.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/theme/edulia/packages/photoswipe/default-skin.min.css')); ?>">
<?php $__env->stopPush(); endif; ?>
<?php $__env->startSection(config('pagebuilder.site_section')); ?>
    <?php echo e(headerContent()); ?>

    <section class="bradcrumb_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="bradcrumb_area_inner">
                        <h1><?php echo e(__('edulia.gallery_details')); ?> <span><a
                                    href="<?php echo e(url('/')); ?>"><?php echo e(__('edulia.home')); ?></a> /
                                <?php echo e(__('edulia.gallery_details')); ?></span></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section_padding gallery">
        <div class="container">
            <div class="col-lg-8 offset-lg-2 col-md-12">
                <div class="gallery_details">
                    <div class="row" data-pswp>
                        <div class="col-md-12">
                            <a href='<?php echo e(asset($gallery_feature->feature_image)); ?>'
                                class="gallery_details_item gallery_details_img_preview"><img
                                    src="<?php echo e(asset($gallery_feature->feature_image)); ?>"
                                    alt=""></a>
                        </div>
                        <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-6">
                                <a href='<?php echo e(asset($gallery->gallery_image)); ?>' class="gallery_details_item"><img
                                        src="<?php echo e(asset($gallery->gallery_image)); ?>" alt=""></a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section_title mt-5">
                                <h2><?php echo e($gallery_feature->name); ?></h2>
                                <p><?php echo $gallery_feature->description; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php echo e(footerContent()); ?>

<?php $__env->stopSection(); ?>
<?php if (! $__env->hasRenderedOnce('a083cbc5-0dff-47ab-8ed1-e535ffe3ea71')): $__env->markAsRenderedOnce('a083cbc5-0dff-47ab-8ed1-e535ffe3ea71');
$__env->startPush(config('pagebuilder.site_script_var')); ?>
    <script src="<?php echo e(asset('public/theme/edulia/packages/photoswipe/photoswipe.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/theme/edulia/packages/photoswipe/photoswipe-ui-default.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/theme/edulia/packages/photoswipe/photoswipe-simplify.min.js')); ?>"></script>
    <script>
        photoswipeSimplify.init({
            history: false,
            focus: false,
        });
    </script>
<?php $__env->stopPush(); endif; ?>

<?php echo $__env->make(config('pagebuilder.site_layout'), ['edit' => false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/frontEnd/theme/edulia/photoGallery/single_photo_gallery.blade.php ENDPATH**/ ?>
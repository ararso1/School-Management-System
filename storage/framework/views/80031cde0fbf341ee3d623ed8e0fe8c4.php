<div class="col-lg-12">
    <div class="row">
        <?php $__currentLoopData = $photoGalleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 mb-4">
                <img src="<?php echo e(asset(@$value->gallery_image)); ?>" width="100%"
                    height="100%">
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\frontSettings\photo_gallery\photo_gallery_view_modal.blade.php ENDPATH**/ ?>
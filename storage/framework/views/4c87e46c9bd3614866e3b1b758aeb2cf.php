<?php $__currentLoopData = $archives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="archive_card_wrapper no-img searchArchiveContent">
        <div class="archive_card_wrapper_content">
            <a href="<?php echo e(route('frontend.news-details', $item->id)); ?>"
                class='archive_card_wrapper_content_title'><?php echo e($item->news_title); ?></a>
            <p class="archive_card_wrapper_content_meta"><?php echo e(dateConvert($item->publish_date)); ?> /
                <?php echo e($item->category->category_name); ?></p>
            <p><?php echo e($item->news_body); ?></p>
            <a href="<?php echo e(route('frontend.news-details', $item->id)); ?>">+ <?php echo e(__('edulia.read_more')); ?></a>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\resources\views\frontEnd\theme\edulia\archive\archive_year_filter.blade.php ENDPATH**/ ?>
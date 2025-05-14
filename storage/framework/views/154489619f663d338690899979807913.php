<?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="blog_card_wrapper">
        <?php if(file_exists($value->image)): ?>
            <div class="blog_card_wrapper_img"><img src="<?php echo e(asset($value->image)); ?>" alt="<?php echo e($value->news_title); ?>"></div>
        <?php endif; ?>
        <div class="blog_card_wrapper_content">
            <a href="<?php echo e(route('frontend.news-details',$value->id)); ?>" class='blog_card_wrapper_content_title'><?php echo e($value->news_title); ?></a>
            <p class="blog_card_wrapper_content_meta"><?php echo e(dateConvert($value->publish_date)); ?></p>
            <p><?php echo $value->news_body; ?></p>
            <a href="<?php echo e(route('frontend.news-details',$value->id)); ?>">+ <?php echo e(__('edulia.read_more')); ?></a>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<input type="hidden" value="<?php echo e($skip+count($news)); ?>" id="hide-button-new-news">
<input type="hidden" value="<?php echo e($count); ?>" id="count-news-new-news">
<?php /**PATH C:\xampp\htdocs\resources\views\frontEnd\theme\edulia\news\load_more_news.blade.php ENDPATH**/ ?>
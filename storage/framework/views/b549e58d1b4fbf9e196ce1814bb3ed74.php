<?php $__currentLoopData = $due_news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="col-lg-3 col-md-6 news_count">
    <div class="news-item">
        <div class="news-img">
            <img class="img-fluid w-100 news-image" src="<?php echo e(asset($value->image)); ?>" alt="<?php echo e($value->news_title); ?>">
        </div>
        <div class="news-text">
            <p class="date">                                                                            
                <?php echo e($value->publish_date != ""? dateConvert($value->publish_date):''); ?>

            </p>
            <h4>
                <a href="<?php echo e(url('news-details/'.$value->id)); ?>">
                    <?php echo e($value->news_title); ?>

                </a>
            </h4>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<input type="hidden" value="<?php echo e($skip+count($due_news)); ?>" class="hide-button">
<input type="hidden" value="<?php echo e($count); ?>" class="count-news"><?php /**PATH C:\xampp\htdocs\resources\views\frontEnd\home\loadMoreNews.blade.php ENDPATH**/ ?>
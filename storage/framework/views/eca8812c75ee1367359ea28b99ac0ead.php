
<a href="<?php echo e(userPermission('edit-news') ? route('edit-news',$comment->news_id): '#'); ?>" target=" "><?php echo e($comment->news->news_title); ?></a>
<div>
    <a href="<?php echo e(route('frontend.news-details', $comment->news_id)); ?>" target=" "><?php echo e(__('front_settings.view_post')); ?></a>
</div>
<div class="d-flex align-items-center">
    <a href="#" class="cmtUnapprove" data-news-id="<?php echo e($comment->news_id); ?>">
        <?php echo e($comment->count_approve_comment); ?>

    </a>
    <a href="#" class="cmtapprove" data-news-id="<?php echo e($comment->news_id); ?>">
     - <?php echo e($comment->count_unaprove_comment); ?>

    </a>
    <input type="hidden" id="commentNewsId" value="">
    <input type="hidden" id="commentFilterType" value="">
</div><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\frontSettings\news\_news_response_view.blade.php ENDPATH**/ ?>
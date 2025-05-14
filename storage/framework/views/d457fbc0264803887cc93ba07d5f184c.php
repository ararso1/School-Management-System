<?php if($comment->parent_id): ?>
<p><?php echo e(__('front_settings.in_reply_to')); ?> <a href="<?php echo e(route('frontend.news-details', $comment->news_id)); ?>" target=" "><?php echo e($comment->reply_to($comment->parent_id)); ?></a></p>

<?php endif; ?>
<div>
    <?php echo e($comment->message); ?>

</div>
<div class="action_button_for_news mt-10">
    <?php if(userPermission('news-comment-status')): ?>
        <a href="#" class="approvunappro" data-comment-id="<?php echo e($comment->id); ?>">
            <?php echo e($comment->status == 1 ? __('common.unapprove') : __('common.approve')); ?>

        </a> |
    <?php endif; ?>
    <a href="#" class="quickReplyNewsComnt" data-comment-id="<?php echo e($comment->id); ?>" data-news-id="<?php echo e($comment->news_id); ?>"><?php echo e(__('common.quick_reply')); ?></a>
    | <a href="#" class="quickReplyNewsEdit" data-comment-id="<?php echo e($comment->id); ?>" data-comment-message="<?php echo e($comment->message); ?>"><?php echo e(__('common.edit')); ?></a>
    <?php if(userPermission('news-comment-delete')): ?>
        | <a href="#" onclick="deleteNewsComment(<?php echo e($comment->id); ?>, <?php echo e($comment->news_id); ?>)"><?php echo e(__('common.delete')); ?></a>
    <?php endif; ?>
</div>

<div class="divActiveReply reply_to_comment_div_<?php echo e($comment->id); ?>"></div>

<div class="divActiveEdit edit_to_comment_div_<?php echo e($comment->id); ?>"></div>
<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\frontSettings\news\_news_message_view.blade.php ENDPATH**/ ?>
<div class="blog_leave_comment replyDiv_<?php echo e($comment->id); ?>" style="display: none">
    <?php echo e(Form::open(['route' => 'frontend.store-news-comment', 'method' => 'post', 'class' => 'replyNewForm'])); ?>

        <h3><?php echo e(__('edulia.reply')); ?></h3>
        <div class="input-control">
            <input type="hidden" name="news_id" value="<?php echo e($news->id); ?>">
            <input type="hidden" class="parentId" name="parent_id" value="">
            <input type="hidden" name="user_id" value="<?php echo e(auth()->user()->id); ?>">
            <textarea class="input-control-input" name="message" cols="30" rows="10" placeholder='<?php echo e(__('edulia.write_reply')); ?>'></textarea>
        </div>
        <div class="input-control">
            <button type="submit" class="input-control-input"><?php echo e(__('edulia.post_reply')); ?></button>
        </div>
    <?php echo e(Form::close()); ?>

</div><?php /**PATH C:\xampp\htdocs\resources\views\frontEnd\theme\edulia\news\comment_reply_form.blade.php ENDPATH**/ ?>
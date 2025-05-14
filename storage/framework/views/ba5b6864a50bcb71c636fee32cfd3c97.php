<div class="blog_leave_comment normalComment">
    <?php echo e(Form::open(['route' => 'frontend.store-news-comment', 'method' => 'post'])); ?>

        <div class="blog_leave_comment_flex">
            <input type="hidden" name="type" value="comment">
            <input type="hidden" name="news_id" value="<?php echo e($news->id); ?>">
            <input type="hidden" name="user_id" value="<?php echo e(auth()->user()->id); ?>">
        </div>
        <div class="input-control">
            <textarea class="input-control-input" name="message" cols="30" rows="10" placeholder='<?php echo e(__('edulia.write_comment')); ?>' required></textarea>
        </div>
        <div class="input-control">
            <button type="submit" class="input-control-input"><?php echo e(__('edulia.post_comment')); ?></button>
        </div>
    <?php echo e(Form::close()); ?>

</div><?php /**PATH C:\xampp\htdocs\resources\views\frontEnd\theme\edulia\news\comment_form.blade.php ENDPATH**/ ?>
<div class="<?php echo e($comment->status == 0 ? 'unapproveBgClass' : ''); ?>">
    <h5>
        <?php echo e($comment->user->full_name); ?> - <?php echo e($comment->user->roles->name); ?>

    </h5>
    <div>
        <?php echo e($comment->user->email); ?>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\frontSettings\news\_news_author_view.blade.php ENDPATH**/ ?>
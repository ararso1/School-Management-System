<div class="container-fluid">
    <div class="row">
        <div class="col-md-9">
            <h3><?php echo e($news->news_title); ?></h3>
            <h6 ><?php echo app('translator')->get('student.category'); ?>: <?php echo e($news->category->category_name); ?></h6>
            <p class="mt-3"><?php echo $news->news_body; ?></p>
        </div>
        <div class="col-md-3">
            <img src="<?php echo e(asset($news->image)); ?>" width="185px" height="200px">
        </div>
    </div>
<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\frontSettings\news\news_details.blade.php ENDPATH**/ ?>
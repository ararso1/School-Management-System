<?php
    $variable = substr($video->youtube_link, 32, 11);
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <iframe width="560" height="315"
                src="https://www.youtube.com/embed/<?php echo e($variable); ?>"
                frameborder="0"
                allowfullscreen>
            </iframe>
        </div>
        <div class="col-lg-4">
            <div class="col-lg-12 mb-20">
                <p class="font-weight-bold"><?php echo app('translator')->get('downloadCenter.class'); ?></p>
                <p class="font-weight-light">
                    <?php echo e($video->class->class_name); ?></p>
            </div>
            <div class="col-lg-12 mb-20">
                <p class="font-weight-bold"><?php echo app('translator')->get('downloadCenter.section'); ?></p>
                <p class="font-weight-light">
                    <?php echo e($video->section->section_name); ?></p>
            </div>
            <div class="col-lg-12 mb-20">
                <p class="font-weight-bold"><?php echo app('translator')->get('downloadCenter.title'); ?></p>
                <p class="font-weight-light"><?php echo e($video->title); ?></p>
            </div>
            <div class="col-lg-12 mb-20">
                <p class="font-weight-bold"><?php echo app('translator')->get('downloadCenter.description'); ?></p>
                <p class="font-weight-light"><?php echo e($video->description); ?>

                </p>
            </div>
            <div class="col-lg-12 mb-20">
                <p class="font-weight-bold"><?php echo app('translator')->get('downloadCenter.created_by'); ?></p>
                <p class="font-weight-light">
                    <?php echo e($video->user->full_name); ?></p>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\Modules\DownloadCenter\Resources\views\videoUpload\video_view_modal.blade.php ENDPATH**/ ?>
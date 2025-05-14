<?php
    $variable = substr($videoGallery->video_link, 32, 11);
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <iframe width="710" height="320"
                src="https://www.youtube.com/embed/<?php echo e($variable); ?>"
                frameborder="0"
                allowfullscreen>
            </iframe>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\frontSettings\video_gallery\video_gallery_view_modal.blade.php ENDPATH**/ ?>
<div class="container-fluid">
    <div class="text-center">
        <a id="textForClipboard" target="_blank" class="text-break"
            href="<?php echo e(route('download-center.content-share-link', @$sharedLink->url)); ?>">
            <?php echo e(route('download-center.content-share-link', @$sharedLink->url)); ?>

        </a>
    </div>
    <div class="mt-40 d-flex justify-content-around">
        <button
            class="primary-btn fix-gr-bg copyToClipboard"
            data-clipboard-target="#textForClipboard">
            <?php echo app('translator')->get('common.copy'); ?>
        </button>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\Modules\DownloadCenter\Resources\views\contentShareList\shared_content_modal.blade.php ENDPATH**/ ?>
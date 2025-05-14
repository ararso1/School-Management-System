
<div class="text-center">
    <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
</div>

<div class="mt-40 d-flex justify-content-between">
    <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
    <a class="primary-btn fix-gr-bg" href="<?php echo e(route('delete-staff-document',$id)); ?>">
        <?php echo app('translator')->get('common.delete'); ?></a>
</div>
<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\humanResource\deleteStaffDocumentView.blade.php ENDPATH**/ ?>
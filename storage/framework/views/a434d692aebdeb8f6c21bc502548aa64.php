<div class="text-center">
    <h4><?php echo app('translator')->get('common.cancel_the_record'); ?></h4>
</div>

<div class="mt-40 d-flex justify-content-between">
    <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.none'); ?></button>
    <a href="<?php echo e(route('cancel-item-sell',$id)); ?>" class="text-light">
    <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('common.yes'); ?></button>
     </a>
</div>
<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\inventory\cancelItemSellView.blade.php ENDPATH**/ ?>
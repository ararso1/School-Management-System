<div class="pb-collapse-wrapper">
    <form method="post" id="current-section-form">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="section_id" id="current-section-id" />
        <div id="section-settings-wrapper">
            <div class="at-empty-block-settings">
                <span><?php echo e(__('pagebuilder::pagebuilder.select_any_element')); ?></span>
            </div>
    </form>
</div><?php /**PATH C:\xampp\htdocs\packages\larabuild\pagebuilder\resources\views\components\settings.blade.php ENDPATH**/ ?>
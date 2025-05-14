<?php if(!empty($grid['data'])): ?>
    <?php $__currentLoopData = $grid['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column => $components): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="<?php echo e($columns[$column]); ?>">
            <?php $__currentLoopData = $components; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $component): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php setSectionId($component['id']);?>
                <?php if(view()->exists('themes.'.activeTheme().'.pagebuilder.' . $component['section_id'] . '.view')): ?>
                    <?php echo view('themes.'.activeTheme().'.pagebuilder.'. $component['section_id']. '.view')->render(); ?>

                <?php else: ?>
                    
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\packages\larabuild\pagebuilder\resources\views\components\_page-components-view.blade.php ENDPATH**/ ?>
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
       
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <?php if( !empty($page->title) ): ?>
            <title><?php echo e($page->title); ?> </title>
        <?php endif; ?>

        <?php if( !empty($page->description) ): ?>
            <meta name="description" content="<?php echo e($page->description); ?>" />
        <?php endif; ?>

        <?php if( config('pagebuilder.add_bootstrap') === 'yes' ): ?>
            <link rel="stylesheet" href="<?php echo e(asset('public/vendor/optionbuilder/css/bootstrap.min.css')); ?>">
        <?php endif; ?>

        <link rel="stylesheet" href="<?php echo e(asset('demo/css/demo.css')); ?>">
        
        <?php echo $__env->yieldPushContent(config('pagebuilder.style_var')); ?>

    </head>
    <body>

        <main class="mainbag">
            <?php echo $__env->yieldContent(config('pagebuilder.site_section')); ?>
        </main>

        <?php if( config('pagebuilder.add_jquery') === 'yes' ): ?>
            <script src="<?php echo e(asset('public/vendor/optionbuilder/js/jquery.min.js')); ?>"></script>
        <?php endif; ?>

        <?php if( config('pagebuilder.add_bootstrap') === 'yes' ): ?>
            <script defer src="<?php echo e(asset('public/vendor/optionbuilder/js/bootstrap.min.js')); ?>"></script>
        <?php endif; ?>
         
        <?php echo $__env->yieldPushContent(config('pagebuilder.script_var')); ?>  
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\packages\larabuild\pagebuilder\resources\views\layouts\pb-site.blade.php ENDPATH**/ ?>
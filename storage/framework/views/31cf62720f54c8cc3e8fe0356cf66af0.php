<?php $__env->startSection('title'); ?>
    <?php echo e($menu_item->title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <style>
        .iframe-container {
            position: relative;
            height: 0;
            overflow: hidden;
            max-width: 100%;
            background: #000;
            padding-bottom: 0;
            height: 70vh;
        }

        .iframe-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
        }
        iframe {
            max-width: 100%;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo e(@$menu_item->title); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('common.custom_menu'); ?></a>
                <a href="#"><?php echo e(@$menu_item->title); ?></a>
            </div>
        </div>
    </div>
</section>

<section class="admin-visitor-area up_admin_visitor mt-25">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="white-box">
                    <div class="row">
                        <div class="col-lg-4 no-gutters">
                            
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 my-3">
                            <?php if($menu_item->menu_type == 'iframe'): ?>
                                <?php
                                    $iframe =  trim($menu_item->iframe_src);
                                ?>
                                <div class="iframe-container">
                                    <iframe src="<?php echo e($iframe); ?>" height="100%" width="100%" frameborder="0" allowfullscreen></iframe>                                
                                </div>
                            <?php elseif($menu_item->menu_type == 'content'): ?>
                                <div> 
                                    <?php echo $menu_item->content; ?>             
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\userCustomMenu\index.blade.php ENDPATH**/ ?>
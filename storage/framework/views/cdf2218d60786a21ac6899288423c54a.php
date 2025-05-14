<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/')); ?>/frontend/css/new_style.css"/>
    <style>
        .academic-img{
            height: 220px;
            background-size : cover !important;
            background-position: top center !important; 
        }

        .news-img{
            height: 340px;
            background-size : cover !important;
            background-position: top center !important; 
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('main_content'); ?>
    <!--================ Home Banner Area =================-->
    <section class="container box-1420">
        <div class="banner-area" style="background: linear-gradient(0deg, rgba(124, 50, 255, 0.6), rgba(199, 56, 216, 0.6)), url(<?php echo e($category_id->category_image != ""? asset($category_id->category_image) : '../img/client/common-banner1.jpg'); ?>) no-repeat center;">
            <div class="banner-inner">
                <div class="banner-content nowrap">
                    <h2><?php echo app('translator')->get('front_settings.course_category'); ?></h2>
                    <p><?php echo e($category_id->category_name); ?></p>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Home Banner Area =================-->

    <!--================ Course List Area =================-->
    <section class="academics-area section-gap-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="title"><?php echo app('translator')->get('front_settings.course_list'); ?></h3>
                        </div>
                    </div>
                    <div class="row all_info">
                        <?php $__currentLoopData = $courseCtaegories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6 all_courses">
                            <div class="academic-item">
                                <div class="academic-img" 
                                style="background:  
                                url(<?php echo e($value->image != ""? asset($value->image) : '../img/client/common-banner1.jpg'); ?>) 
                                            no-repeat top;">
                                </div>
                                <div class="academic-text">
                                    <h4>
                                        <a href="<?php echo e(url('course-Details/'.$value->id)); ?>"><?php echo e($value->title); ?></a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontEnd.home.front_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\frontEnd\home\course_category.blade.php ENDPATH**/ ?>
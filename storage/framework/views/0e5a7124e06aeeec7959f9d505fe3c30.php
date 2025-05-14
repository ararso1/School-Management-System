<?php $__env->startSection(config('pagebuilder.site_section')); ?>
    <style>
        .gap-10 {
            gap: 10px;
        }
    </style>
    <?php echo e(headerContent()); ?>

    <section class="bradcrumb_area" style="background-image:url('../img/client/common-banner1.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="bradcrumb_area_inner">
                        <h1><?php echo e(__('edulia.courses')); ?> <span><a href="<?php echo e(url('/')); ?>"><?php echo e(__('edulia.home')); ?></a> /
                                <?php echo e(__('edulia.courses')); ?></span></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section_padding blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="course_filtering_head course_list_filter_btns">
                                <ul class="nav nav-pills mb-3 gap-10" id="pills-tab" role="tablist">
                                    <?php $__currentLoopData = $courseCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $courseCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="nav-item" role="presentation">
                                            <button class="filter_type <?php echo e($key == 0 ? 'active' : ''); ?>"
                                                data-bs-toggle="pill"
                                                data-bs-target="#category_<?php echo e($courseCategory->id); ?>" type="button"
                                                role="tab"
                                                aria-selected="true"><?php echo e($courseCategory->category_name); ?></button>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content" id="pills-tabContent">
                        <?php $__currentLoopData = $courseCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $courseCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="tab-pane fade <?php echo e($key == 0 ? 'show active' : ''); ?>"
                                id="category_<?php echo e($courseCategory->id); ?>" role="tabpanel">
                                <div class="row">
                                    <?php $__currentLoopData = $courseCategory->courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-xl-3 col-lg-4 col-md-6">
                                            <a href='<?php echo e(route('frontend.single-course-details', $course->id)); ?>'
                                                class="course course_item">
                                                <div class="course_item_img">
                                                    <div class="course_item_img_inner">
                                                        <img src="<?php echo e(asset($course->image)); ?>" alt="">
                                                    </div>
                                                    <span
                                                        class="course_item_img_status category blue"><?php echo e($courseCategory->category_name); ?></span>
                                                </div>
                                                <div class="course_item_inner">
                                                    <h4><?php echo e($course->title); ?></h4>
                                                    <p class="course_brief"><?php echo e($course->overview); ?></p>
                                                    <a href="<?php echo e(route('frontend.single-course-details', $course->id)); ?>"
                                                        class="read_more_link">Learn More</a>
                                                </div>
                                            </a>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-12">
                            <div class="load_more section_padding_top">
                                <a href="#" class="site_btn">Load More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php echo e(footerContent()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make(config('pagebuilder.site_layout'), ['edit' => false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\frontEnd\theme\edulia\courseList\course_list.blade.php ENDPATH**/ ?>
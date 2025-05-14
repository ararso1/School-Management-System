<?php $__env->startSection(config('pagebuilder.site_section')); ?>
    <?php echo e(headerContent()); ?>

    <section class="bradcrumb_area" style="background-image:url('../img/client/common-banner1.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="bradcrumb_area_inner">
                        <h1><?php echo e(__('edulia.course_details')); ?> <span><a href="<?php echo e(url('/')); ?>"><?php echo e(__('edulia.home')); ?></a>
                                / <?php echo e(__('edulia.course_details')); ?></span></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section_padding blog">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="course_details">

                        <div class="course_details_preview_img mt-0">
                            <img src="<?php echo e(asset($singleCourseDetail->image)); ?>" alt="">
                        </div>
                        <nav class="course_details_menu">
                            <ul>
                                <li class='course_details_menu_list'><a href="#"
                                        class='course_details_menu_list_link active about-filter'
                                        data-name='overview'><?php echo app('translator')->get('edulia.overview'); ?></a></li>
                                <li class='course_details_menu_list'><a href="#"
                                        class='course_details_menu_list_link about-filter'
                                        data-name='outline'><?php echo app('translator')->get('edulia.outline'); ?></a></li>
                                <li class='course_details_menu_list'><a href="#"
                                        class='course_details_menu_list_link about-filter'
                                        data-name='prerequisites'><?php echo app('translator')->get('edulia.prerequisites'); ?></a></li>
                                <li class='course_details_menu_list'><a href="#"
                                        class='course_details_menu_list_link about-filter'
                                        data-name='resources'><?php echo app('translator')->get('edulia.resources'); ?></a></li>
                                <li class='course_details_menu_list'><a href="#"
                                        class='course_details_menu_list_link about-filter'
                                        data-name='stats'><?php echo app('translator')->get('edulia.stats'); ?></a>
                                </li>
                            </ul>
                        </nav>
                        <div class="course_details_abouts">
                            <div class="course_details_abouts_item overview">
                                <?php echo $singleCourseDetail->overview; ?>

                            </div>
                            <div class="course_details_abouts_item outline">
                                <?php echo $singleCourseDetail->outline; ?>

                            </div>
                            <div class="course_details_abouts_item prerequisites">
                                <?php echo $singleCourseDetail->prerequisites; ?>

                            </div>
                            <div class="course_details_abouts_item resources">
                                <?php echo $singleCourseDetail->resources; ?>

                            </div>
                            <div class="course_details_abouts_item stats">
                                <?php echo $singleCourseDetail->stats; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php echo e(footerContent()); ?>

<?php $__env->stopSection(); ?>
<?php if (! $__env->hasRenderedOnce('c01b746c-2d73-4a4d-a80e-6cedf6d5fd5c')): $__env->markAsRenderedOnce('c01b746c-2d73-4a4d-a80e-6cedf6d5fd5c');
$__env->startPush(config('pagebuilder.site_script_var')); ?>
    <script>
        let filterBtn = document.querySelectorAll('.about-filter');
        let aboutInfo = document.querySelectorAll('.course_details_abouts_item');
        filterBtn.forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                let value = e.target.dataset.name;
                aboutInfo.forEach(function(item) {
                    if (item.classList.contains(value)) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                })
            })
        })
    </script>
    <script>
        $(document).on('click', '.about-filter', function() {
            $('.about-filter').removeClass('active');
            $(this).addClass('active');
        });
    </script>
<?php $__env->stopPush(); endif; ?>

<?php echo $__env->make(config('pagebuilder.site_layout'), ['edit' => false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\frontEnd\theme\edulia\courseList\single_course_details.blade.php ENDPATH**/ ?>
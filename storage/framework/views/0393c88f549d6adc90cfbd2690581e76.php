<?php if (! $__env->hasRenderedOnce('f0ec97c3-0a62-4ae3-85f3-81573ca4e2f3')): $__env->markAsRenderedOnce('f0ec97c3-0a62-4ae3-85f3-81573ca4e2f3');
$__env->startPush(config('pagebuilder.site_style_var')); ?>
    <style>
        @media print {
            .pb-themesection,
            .bradcrumb_area,
            #printProfile {
                display: none
            }

            .section_padding {
                padding: 30px 0;
            }

            @page {
                margin: 0 !important;
            }
        }
    </style>
<?php $__env->stopPush(); endif; ?>
<?php $__env->startSection(config('pagebuilder.site_section')); ?>
<?php echo e(headerContent()); ?>

    <section class="bradcrumb_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="bradcrumb_area_inner">
                        <h1>
                            <?php echo e(__('edulia.student_details')); ?>

                            <span>
                                <a href="<?php echo e(url('/')); ?>"><?php echo e(__('edulia.home')); ?></a> /<?php echo e(__('edulia.student_details')); ?>

                            </span>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section_padding blog">
        <div class="container section_padding px-3 px-sm-0 single_user_profile_section">

            <div class="profile_details_header">
                <div class="d-flex justify-content-between align-items-center gap-10 flex-wrap flex-sm-nowrap">
                    <div class="d-flex align-items-center">
                        <img src="<?php echo e(file_exists($singleStudent->student_photo) ? asset($singleStudent->student_photo) : asset('public/uploads/staff/demo/staff.jpg')); ?>"
                            class="user_photo" alt="user photo">
                        <div class="user_information">
                            <p class="single_header_info">
                                <span class="info_value user-name text-uppercase">
                                    <?php echo e($singleStudent->full_name); ?>

                                </span>
                            </p>
                            <p class="single_header_info">
                                <span class="info_type"><?php echo app('translator')->get('edulia.admission_id'); ?>: </span>
                                <span class="info_value">
                                    <?php echo e($singleStudent->admission_no); ?>

                                </span>
                            </p>
                            <p class="single_header_info">
                                <span class="info_type"><?php echo app('translator')->get('edulia.gender'); ?>: </span>
                                <span class="info_value">
                                    <?php echo e($singleStudent->gender->base_setup_name); ?>

                                </span>
                            </p>
                        </div>
                    </div>

                    <div class="print_btn">
                        <a href="#" id="printProfile"><i class="fas fa-print"></i> <?php echo app('translator')->get('edulia.print'); ?></a>
                    </div>
                </div>
            </div>
            <div class="profile_details_container">
                <div class="details_info_section">
                    <h4 class="sectoin_header"><?php echo app('translator')->get('edulia.basic_information'); ?></h4>
                    <div class="row m-0">
                        <p class="single_info col-md-4">
                            <span class="info_type"><?php echo app('translator')->get('edulia.name'); ?>: </span>
                            <span class="info_value text-uppercase"><?php echo e($singleStudent->full_name); ?></span>
                        </p>

                        <p class="single_info col-md-4">
                            <span class="info_type"><?php echo app('translator')->get('edulia.class'); ?>: </span>
                            <span
                                class="info_value"><?php echo e($singleStudent->studentRecord->class->class_name); ?></span>
                        </p>

                        <p class="single_info col-md-4">
                            <span class="info_type"><?php echo app('translator')->get('edulia.section'); ?>: </span>
                            <span
                                class="info_value"><?php echo e($singleStudent->studentRecord->section->section_name); ?></span>
                        </p>

                        <p class="single_info col-md-4">
                            <span class="info_type"><?php echo app('translator')->get('edulia.gender'); ?>: </span>
                            <span
                                class="info_value"><?php echo e($singleStudent->gender->base_setup_name ? $singleStudent->gender->base_setup_name : 'N/A'); ?></span>
                        </p>

                        <p class="single_info col-md-4">
                            <span class="info_type"><?php echo app('translator')->get('edulia.dob'); ?>: </span>
                            <span
                                class="info_value"><?php echo e(!empty($singleStudent->date_of_birth) ? dateConvert($singleStudent->date_of_birth) : 'N/A'); ?></span>
                        </p>

                        <p class="single_info col-md-4">
                            <span class="info_type"><?php echo app('translator')->get('edulia.admission_date'); ?>: </span>
                            <span
                                class="info_value"><?php echo e(!empty($singleStudent->admission_date) ? dateConvert($singleStudent->admission_date) : 'N/A'); ?></span>
                        </p>

                        <p class="single_info col-md-4">
                            <span class="info_type"><?php echo app('translator')->get('edulia.religion'); ?>: </span>
                            <span
                                class="info_value"><?php echo e($singleStudent->religion->base_setup_name ? $singleStudent->religion->base_setup_name : 'N/A'); ?></span>
                        </p>

                        <p class="single_info col-md-4">
                            <span class="info_type"><?php echo app('translator')->get('edulia.age'); ?>: </span>
                            <span
                                class="info_value"><?php echo e(\Carbon\Carbon::parse($singleStudent->date_of_birth)->diff(\Carbon\Carbon::now())->format('%y years')); ?></span>
                        </p>

                        <p class="single_info col-md-4">
                            <span class="info_type"><?php echo app('translator')->get('edulia.blood_group'); ?>: </span>
                            <span
                                class="info_value"><?php echo e($singleStudent->bloodGroup->base_setup_name ? $singleStudent->bloodGroup->base_setup_name : 'N/A'); ?></span>
                        </p>

                        <p class="single_info col-md-4">
                            <span class="info_type"><?php echo app('translator')->get('edulia.group'); ?>: </span>
                            <span
                                class="info_value"><?php echo e($singleStudent->group ? $singleStudent->group->group : 'N/A'); ?></span>
                        </p>

                        <p class="single_info col-md-4">
                            <span class="info_type"><?php echo app('translator')->get('edulia.category'); ?>: </span>
                            <span
                                class="info_value"><?php echo e($singleStudent->category->category_name ? $singleStudent->category->category_name : 'N/A'); ?></span>
                        </p>

                        <p class="single_info col-md-4">
                            <span class="info_type"><?php echo app('translator')->get('edulia.student_group'); ?>: </span>
                            <span
                                class="info_value"><?php echo e($singleStudent->student_group_id ? $singleStudent->group->group : 'N/A'); ?></span>
                        </p>

                        <p class="single_info col-md-4">
                            <span class="info_type"><?php echo app('translator')->get('edulia.height'); ?>: </span>
                            <span
                                class="info_value"><?php echo e($singleStudent->height ? $singleStudent->height : 'N/A'); ?></span>
                        </p>

                        <p class="single_info col-md-4">
                            <span class="info_type"><?php echo app('translator')->get('edulia.weight'); ?>: </span>
                            <span
                                class="info_value"><?php echo e($singleStudent->weight ? $singleStudent->weight : 'N/A'); ?></span>
                        </p>

                        <p class="single_info col-md-4">
                            <span class="info_type"><?php echo app('translator')->get('edulia.previous_school'); ?>: </span>
                            <span
                                class="info_value"><?php echo e($singleStudent->previous_school_details ? $singleStudent->previous_school_details : 'N/A'); ?></span>
                        </p>
                    </div>
                </div>
                <div class="details_info_section">
                    <h4 class="sectoin_header"><?php echo app('translator')->get('edulia.parent_info'); ?></h4>
                    <div class="row m-0">
                        <p class="single_info col-md-4">
                            <span class="info_type"><?php echo app('translator')->get('edulia.fathers_name'); ?>: </span>
                            <span
                                class="info_value text-uppercase"><?php echo e($singleStudent->parents->fathers_name ? $singleStudent->parents->fathers_name : 'N/A'); ?></span>
                        </p>
                        <p class="single_info col-md-4">
                            <span class="info_type"><?php echo app('translator')->get('edulia.fathers_occupation'); ?>: </span>
                            <span
                                class="info_value text-uppercase"><?php echo e($singleStudent->parents->fathers_occupation ? $singleStudent->parents->fathers_occupation : 'N/A'); ?></span>
                        </p>
                        <p class="single_info col-md-4">
                            <span class="info_type"><?php echo app('translator')->get('edulia.mothers_name'); ?>: </span>
                            <span
                                class="info_value text-uppercase"><?php echo e($singleStudent->parents->mothers_name ? $singleStudent->parents->mothers_name : 'N/A'); ?></span>
                        </p>
                        <p class="single_info col-md-4">
                            <span class="info_type"><?php echo app('translator')->get('edulia.mothers_occupation'); ?>: </span>
                            <span
                                class="info_value text-uppercase"><?php echo e($singleStudent->parents->mothers_occupation ? $singleStudent->parents->mothers_occupation : 'N/A'); ?></span>
                        </p>
                        <p class="single_info col-md-4">
                            <span class="info_type"><?php echo app('translator')->get('edulia.guardian_name'); ?>: </span>
                            <span
                                class="info_value text-uppercase"><?php echo e($singleStudent->parents->guardians_name ? $singleStudent->parents->guardians_name : 'N/A'); ?></span>
                        </p>
                        <p class="single_info col-md-4">
                            <span class="info_type"><?php echo app('translator')->get('edulia.guardian_occupation'); ?>: </span>
                            <span
                                class="info_value text-uppercase"><?php echo e($singleStudent->parents->guardians_occupation ? $singleStudent->parents->guardians_occupation : 'N/A'); ?></span>
                        </p>
                        <p class="single_info col-md-4">
                            <span class="info_type"><?php echo app('translator')->get('edulia.guardians_relation'); ?>: </span>
                            <span
                                class="info_value text-uppercase"><?php echo e($singleStudent->parents->guardians_relation ? $singleStudent->parents->guardians_relation : 'N/A'); ?></span>
                        </p>
                    </div>
                </div>
                <div class="details_info_section">
                    <h4 class="sectoin_header"><?php echo app('translator')->get('edulia.address'); ?></h4>
                    <div class="row m-0">
                        <p class="single_info col-md-4">
                            <span class="info_type"><?php echo app('translator')->get('edulia.present'); ?> <?php echo app('translator')->get('edulia.address'); ?>: </span>
                            <span
                                class="info_value"><?php echo e($singleStudent->current_address ? $singleStudent->current_address : 'N/A'); ?></span>
                        </p>
                        <p class="single_info col-md-4">
                            <span class="info_type"><?php echo app('translator')->get('edulia.permanent'); ?> <?php echo app('translator')->get('edulia.address'); ?>: </span>
                            <span
                                class="info_value"><?php echo e($singleStudent->permanent_address ? $singleStudent->permanent_address : 'N/A'); ?></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php echo e(footerContent()); ?>

<?php $__env->stopSection(); ?>
<?php if (! $__env->hasRenderedOnce('f0f25e45-700c-4911-b189-9dff902fc1dd')): $__env->markAsRenderedOnce('f0f25e45-700c-4911-b189-9dff902fc1dd');
$__env->startPush(config('pagebuilder.site_script_var')); ?>
    <script>
        $("#printProfile").on("click", function(e) {
            e.preventDefault();
            window.print();
        })
    </script>
<?php $__env->stopPush(); endif; ?>

<?php echo $__env->make(config('pagebuilder.site_layout'), ['edit' => false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\frontEnd\theme\edulia\frontend_single_student_details.blade.php ENDPATH**/ ?>
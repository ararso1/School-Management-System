<?php if (! $__env->hasRenderedOnce('ff2e0cd8-b4cf-4984-b31d-060c3a0d2430')): $__env->markAsRenderedOnce('ff2e0cd8-b4cf-4984-b31d-060c3a0d2430');
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
                        <h1><?php echo e(__('edulia.staff_details')); ?> <span><a
                                    href="<?php echo e(url('/')); ?>"><?php echo e(__('edulia.home')); ?></a> /
                                <?php echo e(__('edulia.staff_details')); ?></span></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container section_padding px-3 px-sm-0 single_user_profile_section">
        <div class="profile_details_header">
            <div class="d-flex justify-content-between align-items-center gap-10 flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center">
                    <img src="<?php echo e(@$staffDetails->staff_photo ? asset(@$staffDetails->staff_photo) : asset('public/uploads/staff/staff.jpg')); ?>"
                        class="user_photo" alt="user photo">
                    <div class="user_information">
                        <p class="single_header_info">
                            <span class="info_value user-name text-uppercase">
                                <?php echo e(@$staffDetails->full_name); ?>

                            </span>
                        </p>
                        <p class="single_header_info">
                            <span class="info_type"><?php echo app('translator')->get('edulia.designation'); ?>: </span>
                            <span class="info_value">
                                <?php echo e(@$staffDetails->designations->title); ?>

                            </span>
                        </p>
                        <p class="single_header_info">
                            <span class="info_type"><?php echo app('translator')->get('edulia.qualification'); ?>: </span>
                            <span class="info_value">
                                <?php echo e(@$staffDetails->qualification); ?>

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
                        <span class="info_value text-uppercase"><?php echo e(@$staffDetails->full_name); ?></span>
                    </p>

                    <p class="single_info col-md-4">
                        <span class="info_type"><?php echo app('translator')->get('edulia.designation'); ?>: </span>
                        <span class="info_value text-uppercase"><?php echo e(@$staffDetails->designations->title); ?></span>
                    </p>

                    <p class="single_info col-md-4">
                        <span class="info_type"><?php echo app('translator')->get('edulia.department'); ?>: </span>
                        <span class="info_value text-uppercase"><?php echo e(@$staffDetails->departments->name); ?></span>
                    </p>

                    <p class="single_info col-md-4">
                        <span class="info_type"><?php echo app('translator')->get('edulia.qualification'); ?>: </span>
                        <span class="info_value text-uppercase"><?php echo e(@$staffDetails->qualification); ?></span>
                    </p>

                    <p class="single_info col-md-4">
                        <span class="info_type"><?php echo app('translator')->get('edulia.gender'); ?>: </span>
                        <span class="info_value"><?php echo e(@$staffDetails->genders->base_setup_name); ?></span>
                    </p>

                    <p class="single_info col-md-4">
                        <span class="info_type"><?php echo app('translator')->get('edulia.experience'); ?>: </span>
                        <span class="info_value"><?php echo e(@$staffDetails->experience); ?></span>
                    </p>

                    <p class="single_info col-md-4">
                        <span class="info_type"><?php echo app('translator')->get('edulia.age'); ?>: </span>
                        <span class="info_value">
                            <?php echo e(\Carbon\Carbon::parse($staffDetails->date_of_birth)->diff(\Carbon\Carbon::now())->format('%y years')); ?>

                        </span>
                    </p>
                </div>
            </div>
        </div>
        <div class="profile_details_container mt-20">
            <div class="details_info_section">
                <h4 class="sectoin_header"><?php echo app('translator')->get('edulia.contact_information'); ?></h4>
                <div class="row m-0">
                    <p class="single_info col-md-4">
                        <span class="info_type"><?php echo app('translator')->get('edulia.email'); ?>: </span>
                        <span class="info_value"><?php echo e(@$staffDetails->email); ?></span>
                    </p>

                    <p class="single_info col-md-4">
                        <span class="info_type"><?php echo app('translator')->get('edulia.mobile'); ?>: </span>
                        <span class="info_value"><?php echo e(@$staffDetails->mobile); ?></span>
                    </p>
                </div>
            </div>
        </div>
        <div class="profile_details_container mt-20">
            <div class="details_info_section">
                <h4 class="sectoin_header"><?php echo app('translator')->get('edulia.address_information'); ?></h4>
                <div class="row m-0">
                    <p class="single_info col-md-4">
                        <span class="info_type"><?php echo app('translator')->get('edulia.present_address'); ?>: </span>
                        <span class="info_value"><?php echo e(@$staffDetails->current_address); ?></span>
                    </p>

                    <p class="single_info col-md-4">
                        <span class="info_type"><?php echo app('translator')->get('edulia.permanent_address'); ?>: </span>
                        <span class="info_value"><?php echo e(@$staffDetails->permanent_address); ?></span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php echo e(footerContent()); ?>

<?php $__env->stopSection(); ?>
<?php if (! $__env->hasRenderedOnce('36bc31e6-5a14-4813-8539-b6ee21223e04')): $__env->markAsRenderedOnce('36bc31e6-5a14-4813-8539-b6ee21223e04');
$__env->startPush(config('pagebuilder.site_script_var')); ?>
    <script>
        $("#printProfile").on("click", function(e) {
            e.preventDefault();
            window.print();
        })
    </script>
<?php $__env->stopPush(); endif; ?>

<?php echo $__env->make(config('pagebuilder.site_layout'), ['edit' => false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\frontEnd\theme\edulia\staff\staff_details.blade.php ENDPATH**/ ?>
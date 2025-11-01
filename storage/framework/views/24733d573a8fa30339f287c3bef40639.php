<?php if (! $__env->hasRenderedOnce('64168ebd-08b3-41f8-bf67-46966c5f4877')): $__env->markAsRenderedOnce('64168ebd-08b3-41f8-bf67-46966c5f4877');
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
                        <h1><?php echo e(__('edulia.donor_details')); ?> <span><a
                                    href="<?php echo e(url('/')); ?>"><?php echo e(__('edulia.home')); ?></a> /
                                <?php echo e(__('edulia.donor_details')); ?></span></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container section_padding px-3 px-sm-0 single_user_profile_section">
        <div class="profile_details_header">
            <div class="d-flex justify-content-between align-items-center gap-10 flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center">
                    <img src="<?php echo e(asset($donorDetails->photo)); ?>" class="user_photo" alt="user photo">
                    <div class="user_information">
                        <p class="single_header_info">
                            <span class="info_value user-name text-uppercase">
                                <?php echo e($donorDetails->full_name); ?>

                            </span>
                        </p>
                        <p class="single_header_info">
                            <span class="info_type"><?php echo app('translator')->get('edulia.email'); ?>: </span>
                            <span class="info_value">
                                <?php echo e($donorDetails->email); ?>

                            </span>
                        </p>
                        <p class="single_header_info">
                            <span class="info_type"><?php echo app('translator')->get('edulia.gender'); ?>: </span>
                            <span class="info_value">
                                <?php echo e($donorDetails->gender->base_setup_name); ?>

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
                        <span class="info_value text-uppercase"><?php echo e($donorDetails->full_name); ?></span>
                    </p>

                    <p class="single_info col-md-4">
                        <span class="info_type"><?php echo app('translator')->get('edulia.profession'); ?>: </span>
                        <span class="info_value text-uppercase"><?php echo e($donorDetails->profession); ?></span>
                    </p>

                    <p class="single_info col-md-4">
                        <span class="info_type"><?php echo app('translator')->get('edulia.date_of_birth'); ?>: </span>
                        <span
                            class="info_value text-uppercase"><?php echo e(date('d/m/Y', strtotime($donorDetails->date_of_birth))); ?></span>
                    </p>

                    <p class="single_info col-md-4">
                        <span class="info_type"><?php echo app('translator')->get('edulia.email'); ?>: </span>
                        <span class="info_value"><?php echo e($donorDetails->email); ?></span>
                    </p>

                    <p class="single_info col-md-4">
                        <span class="info_type"><?php echo app('translator')->get('edulia.mobile'); ?>: </span>
                        <span class="info_value"><?php echo e($donorDetails->mobile); ?></span>
                    </p>

                    <p class="single_info col-md-4">
                        <span class="info_type"><?php echo app('translator')->get('edulia.age'); ?>: </span>
                        <span class="info_value"><?php echo e($donorDetails->age); ?></span>
                    </p>

                    <p class="single_info col-md-4">
                        <span class="info_type"><?php echo app('translator')->get('edulia.gender'); ?>: </span>
                        <span class="info_value"><?php echo e($donorDetails->gender->base_setup_name); ?></span>
                    </p>

                    <p class="single_info col-md-4">
                        <span class="info_type"><?php echo app('translator')->get('edulia.blood'); ?>: </span>
                        <span class="info_value"><?php echo e($donorDetails->bloodGroup->base_setup_name); ?></span>
                    </p>

                    <p class="single_info col-md-4">
                        <span class="info_type"><?php echo app('translator')->get('edulia.religion'); ?>: </span>
                        <span class="info_value"><?php echo e($donorDetails->religion->base_setup_name); ?></span>
                    </p>

                    <p class="single_info col-md-4">
                        <span class="info_type"><?php echo app('translator')->get('edulia.present_address'); ?>: </span>
                        <span class="info_value"><?php echo e($donorDetails->current_address); ?></span>
                    </p>

                    <p class="single_info col-md-4">
                        <span class="info_type"><?php echo app('translator')->get('edulia.permanent_address'); ?>: </span>
                        <span class="info_value"><?php echo e($donorDetails->permanent_address); ?></span>
                    </p>
                </div>
            </div>
            <div class="details_info_section">
                <h4 class="sectoin_header"><?php echo app('translator')->get('edulia.other_information'); ?></h4>
                <div class="row m-0">
                    <?php if(@$custom_filed_values): ?>
                        <?php $__currentLoopData = $custom_filed_values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p class="single_info col-md-4">
                                <span class="info_type"><?php echo e($key); ?>: </span>
                                <span class="info_value"><?php echo e($data); ?></span>
                            </p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php echo e(footerContent()); ?>

<?php $__env->stopSection(); ?>
<?php if (! $__env->hasRenderedOnce('d27fe8a8-29da-4399-9f34-0d00bb5da20e')): $__env->markAsRenderedOnce('d27fe8a8-29da-4399-9f34-0d00bb5da20e');
$__env->startPush(config('pagebuilder.site_script_var')); ?>
    <script>
        $("#printProfile").on("click", function(e) {
            e.preventDefault();
            window.print();
        })
    </script>
<?php $__env->stopPush(); endif; ?>

<?php echo $__env->make(config('pagebuilder.site_layout'), ['edit' => false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/frontEnd/theme/edulia/donor/donor_details.blade.php ENDPATH**/ ?>
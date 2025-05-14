<?php $__env->startSection('mainContent'); ?>

<section class="admin-visitor-area up_admin_visitor empty_table_tab">
    <div class="container-fluid p-0">
      <div class="white-box sm_mb_20 sm2_mb_20 md_mb_20 ">
            <div class="main-title">
                <h3 class="mb-30"><?php echo app('translator')->get('setting.Update'); ?></h3>
            </div>
            <div class="card-body">
                <?php if(gv($product, 'current_version') == gv($product, 'next_release_version') && gv($product, 'name')): ?>
               <div class="row">
                    <div class="col-md-12">
                        <?php if(gv($product, 'name')): ?>
                        <div class="add-visitor">
                            <table class="display school-table school-table-style width-shadow">
                                <tbody>
                                    <tr>
                                        <td>Current Installed Version</td>
                                        <td><?php echo e(gv($product, 'current_version')); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Latest version</td>
                                        <td><?php echo e(gv($product, 'next_release_version')); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Date of Release</td>
                                        <td><?php echo e(gv($product, 'next_release_date')); ?></td>
                                    </tr>

                                    <tr>
                                            <td> <?php echo e(__('setting.PHP Version')); ?></td>
                                            <td><?php echo e(phpversion()); ?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo e(__('setting.Curl Enable')); ?></td>
                                            <td><?php
                                                    if  (in_array  ('curl', get_loaded_extensions())) {
                                                        echo 'enable';
                                                    }
                                                    else {
                                                        echo 'disable';
                                                    }
                                                ?></td>
                                        </tr>


                                        <tr>
                                            <td><?php echo e(__('setting.Purchase code')); ?></td>
                                            <td><?php echo e(__('Verified')); ?></td>
                                        </tr>


                                        <tr>
                                            <td><?php echo e(__('setting.Install Domain')); ?></td>
                                            <td><?php echo e(config('configs')->where('key','system_domain')->first()->value); ?></td>
                                        </tr>

                                        <tr>
                                            <td><?php echo e(__('setting.System Activated Date')); ?></td>
                                            <td><?php echo e(config('configs')->where('key','system_activated_date')->first()->value); ?></td>
                                        </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="text-center">

                            <a href="<?php echo e(url('/')); ?>" class="primary-btn fix-gr-bg" > Back To Home </a>



                        </div>
                        <?php endif; ?>
                    </div>
                </div>


                <?php else: ?>
                <div class="row">
                    <div class="col-md-12">
                        <?php if(gv($product, 'name')): ?>
                        <div class="add-visitor">
                            <table class="display school-table school-table-style width-shadow">
                                <tbody>
                                    <tr>
                                        <td>Current Installed Version</td>
                                        <td><?php echo e(gv($product, 'current_version')); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Version Available for Upgrade</td>
                                        <td><?php echo e(gv($product, 'next_release_version')); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Date of Release</td>
                                        <td><?php echo e(gv($product, 'next_release_date')); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Update Size</td>

                                        <td><?php echo e(bytesToSize(gv($product, 'next_release_size'))); ?></td>
                                    </tr>

                                    <tr>
                                            <td> <?php echo e(__('setting.PHP Version')); ?></td>
                                            <td><?php echo e(phpversion()); ?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo e(__('setting.Curl Enable')); ?></td>
                                            <td><?php
                                                    if  (in_array  ('curl', get_loaded_extensions())) {
                                                        echo 'enable';
                                                    }
                                                    else {
                                                        echo 'disable';
                                                    }
                                                ?></td>
                                        </tr>


                                        <tr>
                                            <td><?php echo e(__('setting.Purchase code')); ?></td>
                                            <td><?php echo e(__('Verified')); ?></td>
                                        </tr>


                                        <tr>
                                            <td><?php echo e(__('setting.Install Domain')); ?></td>
                                            <td><?php echo e(config('configs')->where('key','system_domain')->first()->value); ?></td>
                                        </tr>

                                        <tr>
                                            <td><?php echo e(__('setting.System Activated Date')); ?></td>
                                            <td><?php echo e(config('configs')->where('key','system_activated_date')->first()->value); ?></td>
                                        </tr>
                                    <?php if(gv($product, 'next_release_change_log')): ?>
                                    <tr>
                                        <td colspan="2">
                                            <?php echo gv($product, 'next_release_change_log'); ?>

                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center">

                            <button type="button" class="primary-btn fix-gr-bg"  data-toggle="modal" data-target="#update_modal" data-modal-size="modal-md">Update</button>


                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>


<div class="modal fade admin-query" id="update_modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update System</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="ti-close"></i>
                </button>
            </div>

            <div class="modal-body">
                <div class="container-fluid" >
                    <form method="POST" action="<?php echo e(route('service.download')); ?>" id="content_form"  class="form-horizontal">
                        <input type="hidden" name="build" value="<?php echo e(gv($product, 'next_release_build')); ?>">
                        <input type="hidden" name="version" value="<?php echo e(gv($product, 'next_release_version')); ?>">
                        <div class="row" >
                            <div class="col-lg-12">
                                <?php echo $update_tips; ?>

                            </div>
                            <div class="col-md-12" id="download_buttons">
                                <p class="text-center">Are You sure to update  <br> version <?php echo e(gv($product, 'next_release_version')); ?>  <br>
                                    Size of <?php echo e(bytesToSize(gv($product, 'next_release_size', 0))); ?>

                                </p>
                            </div>
                             <div class="col-md-12" id="on_progress" style="display: none;">
                                <p class="text-center alert alert-danger">Don't perform any action till we are performing update!</p>

                                <p class="text-center">Update Size (<?php echo e(bytesToSize(gv($product, 'next_release_size', 0))); ?>) - Updating.....</p>

                            </div>
                             <div class="col-lg-12 text-center" >
                                <div class="mt-40 d-flex justify-content-between">
                                    <button type="button" class="primary-btn tr-bg" data-dismiss="modal">
                                        Cancel
                                    </button>

                                    <button type="submit" class="primary-btn fix-gr-bg submit" id="update">Update</button>
                                    <button type="button" class="primary-btn fix-gr-bg submitting" style="display: none; " disabled="">Updating...</button>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php

    $base_path = 'public/vendor/spondonit';

?>
<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript" src="<?php echo e(asset($base_path . '/js/function.js')); ?>"></script>
<script>


    $(document).on('click', '#update', function(e) {
        e.preventDefault();
        var form = $('#content_form');
        var url = form.attr('action');


        $('#download_buttons').hide();
        $('#on_progress').show();
        form.find('.submit').hide();
        form.find('.submitting').show();
        const formData = new FormData(form[0]);
        $.ajax({
            url: url,
            method: 'POST',
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false,
            dataType: 'JSON',
            data:formData,
            success: function(data) {
                toastr.success(data.message, 'Success');
                if (data.goto) {
                    setTimeout(function() {
                        window.location.href = data.goto;
                    }, 2000);
                }
            },
            error: function(data) {
                form.find('.submit').show();
                form.find('.submitting').hide();
                 $('#on_progress').hide();
                 $('#download_buttons').show();
                ajax_error(data);
            }
        });
    });



</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', ['title' => __('service::install.update')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\vendors\service\update\index.blade.php ENDPATH**/ ?>
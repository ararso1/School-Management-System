<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('system_settings.api_access'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<?php use Illuminate\Support\Facades\Storage; ?>

    <style type="text/css">
        #selectStaffsDiv, .forStudentWrapper {
            display: none;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background: var(--primary-color);
        }

        input:focus + .slider {
            box-shadow: 0 0 1px linear-gradient(90deg, var(--gradient_1) 0%, #c738d8 51%, var(--gradient_1) 100%);
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('system_settings.api_access'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('system_settings.system_settings'); ?></a>
                    <a href="#"><?php echo app('translator')->get('system_settings.api_access'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'background-settings-update', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <div class="white-box">
                            <div class="main-title">
                                <h3 class="mb-15">
                                    <?php echo app('translator')->get('system_settings.api_access'); ?>
                                </h3>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="d-flex align-items-center justify-content-center gap-20">

                                        <span style="font-size: 22px;"><?php echo app('translator')->get('system_settings.enable_api_access'); ?> </span>
                                            <?php
                                            if(@$value->staff_user->access_status == 0){
                                                    $permission_id=483;
                                            }else{
                                                    $permission_id=484;
                                            }
                                        ?>
                                        <?php if(userPermission($permission_id)): ?>
                                        <label class="switch_toggle">
                                            <input type="checkbox"
                                                    class="switch-input2" <?php echo e(@$settings->api_url == 0? '':'checked'); ?>>
                                            <span class="slider round"></span>
                                        </label>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-20">
            <div class="white-box">
                <form class="form-horizontal" action="<?php echo e(route('set_fcm_key')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div>
                        <div class="col-md-12 ">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-lg-12 mb-10">
                                            <label class="primary_input_label"
                                                for=""><?php echo e(__('common.FCM Admin SDK JSON File')); ?></label>
                                            <div class="primary_file_uploader">
                                                <input
                                                    class="primary-input filePlaceholder"
                                                    type="text"
                                                    id="document_file_1"
                                                    accept="application/json"
                                                    placeholder="<?php echo e($settings->fcm_key ? __('common.browse') . ' ' . __('common.FCM Admin SDK JSON File') . ' - ' . e($settings->fcm_key) : __('common.browse') . ' ' . __('common.FCM Admin SDK JSON File')); ?>"
                                                    readonly=""
                                                >
                                                <button class="" type="button">
                                                    <label
                                                        class="primary-btn small fix-gr-bg"
                                                        for="document_file_public_key"><?php echo e(__('common.browse')); ?></label>
                                                    <input type="file"
                                                        class="d-none fileUpload"
                                                        name="fcm_json"
                                                        accept="application/json"
                                                        id="document_file_public_key"
                                                        onchange="updatePlaceholder(this)"
                                                    >
                                                </button>
                                            </div> 
                                        </div>

                                        <div class="col-lg-12">
                                            <code>
                                                <a target="_blank"
                                                    title=""
                                                    href="https://console.firebase.google.com/"><?php echo e(__('common.Click Here to Get Firebase Cloud Messaging(FCM) Api Credentials')); ?>

                                                </a>
                                            </code>
                                        </div>

                                        <div class="col-lg-12 text-center">
                                            <button type="submit" class="primary-btn fix-gr-bg">
                                                <i class="ti-check"></i>
                                                <?php echo e(__('common.update')); ?>

                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <hr>

                <?php
                    $json = Storage::get(SaasDomain() . '-firebase-service-account.json');
                    $data = json_decode($json, true);
                ?>

                <?php if($data): ?>
                    <div class="row mt-3">
                        <div class="col-lg-6 mb-10">
                            <div class="input-effect">
                                <label class="pb-2"><?php echo e(__('common.FCM Project ID')); ?>

                                </label>
                                <input class="primary_input_field form-control"
                                    type="text" name="fcm_project_id"
                                    autocomplete="off"
                                    value="<?php echo e($data['project_id']??''); ?>">
                            </div>
                        </div>

                        <div class="col-lg-6 mb-10">
                            <div class="input-effect">
                                <label class="pb-2"><?php echo e(__('common.FCM Client Email')); ?>

                                </label>
                                <input class="primary_input_field form-control"
                                    type="text" name="fcm_client_email"
                                    autocomplete="off"
                                    value="<?php echo e($data['client_email']??''); ?>">
                            </div>
                        </div>

                        <div class="col-lg-12 mb-10">
                            <div class="input-effect">
                                <label class="pb-2"><?php echo e(__('common.FCM Private Key')); ?>

                                </label>
                                <textarea rows="15" class=" form-control" name="fcm_private_key"><?php echo $data['private_key']??''; ?></textarea>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        function updatePlaceholder(input) {
            const fileInput = document.getElementById('document_file_public_key');
            const placeholder = document.getElementById('document_file_1');

            if (fileInput.files.length > 0) {
                const fileName = fileInput.files[0].name;
                placeholder.placeholder = fileName;
            } else {
                const defaultPlaceholder = <?php echo json_encode($settings->fcm_key ? __('common.browse') . ' ' . __('common.FCM Admin SDK JSON File') . ' - ' . $settings->fcm_key : __('common.browse') . ' ' . __('common.FCM Admin SDK JSON File'), 15, 512) ?>;
                placeholder.placeholder = defaultPlaceholder;
            }
        }
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\systemSettings\apiPermission.blade.php ENDPATH**/ ?>
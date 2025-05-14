<?php $__env->startSection('mainContent'); ?>
    <section class="admin-visitor-area up_st_admin_visitor" id="admin-visitor-area">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="white_box_30px">
                                    <!-- SMTP form  -->
                                    <div class="main-title mb-25">
                                        <h3 class="mb-0"><?php echo e(__('Chatting Method setting')); ?></h3>
                                    </div>
                                    <form action="<?php echo e(route('chat.settings.permission.store')); ?>" method="post" class="bg-white p-4 rounded">
                                        <?php echo csrf_field(); ?>
                                        <div class="row">
                                            <div class="col-lg-6 d-flex relation-button mb-3">
                                                <p class="text-uppercase mb-0">Can Teacher Chat with Parents</p>
                                                <div class="d-flex radio-btn-flex ml-30 mt-1">
                                                    <div class="mr-20">
                                                        <input type="radio" name="can_teacher_chat_with_parents" id="relationFather" value="yes" class="common-radio relationButton" <?php echo e(app('general_settings')->get('chat_can_teacher_chat_with_parents') == 'yes' ? 'checked' : ''); ?>>
                                                        <label for="relationFather">Yes</label>
                                                    </div>
                                                    <div class="mr-20">
                                                        <input type="radio" name="can_teacher_chat_with_parents" id="relationMother" value="no" class="common-radio relationButton" <?php echo e(app('general_settings')->get('chat_can_teacher_chat_with_parents') == 'no' ? 'checked' : ''); ?>>
                                                        <label for="relationMother">No</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 d-flex relation-button mb-3">
                                                <p class="text-uppercase mb-0">Can Student Chat with Admin, Accounts</p>
                                                <div class="d-flex radio-btn-flex ml-30 mt-1">
                                                    <div class="mr-20">
                                                        <input type="radio" name="can_student_chat_with_admin_account" id="relationFather1" value="yes" class="common-radio relationButton" <?php echo e(app('general_settings')->get('chat_can_student_chat_with_admin_account') == 'yes' ? 'checked' : ''); ?>>
                                                        <label for="relationFather1">Yes</label>
                                                    </div>
                                                    <div class="mr-20">
                                                        <input type="radio" name="can_student_chat_with_admin_account" id="relationMother2" value="no" class="common-radio relationButton" <?php echo e(app('general_settings')->get('chat_can_student_chat_with_admin_account') == 'no' ? 'checked' : ''); ?>>
                                                        <label for="relationMother2">No</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 d-flex relation-button mb-3">
                                                <p class="text-uppercase mb-0">Admin can chat without invitation</p>
                                                <div class="d-flex radio-btn-flex ml-30 mt-1">
                                                    <div class="mr-20">
                                                        <input type="radio" name="admin_can_chat_without_invitation" id="relationFather3" value="yes" class="common-radio relationButton" <?php echo e(app('general_settings')->get('chat_admin_can_chat_without_invitation') == 'yes' ? 'checked' : ''); ?>>
                                                        <label for="relationFather3">Yes</label>
                                                    </div>
                                                    <div class="mr-20">
                                                        <input type="radio" name="admin_can_chat_without_invitation" id="relationMother4" value="no" class="common-radio relationButton" <?php echo e(app('general_settings')->get('chat_admin_can_chat_without_invitation') == 'no' ? 'checked' : ''); ?>>
                                                        <label for="relationMother4">No</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 d-flex relation-button mb-3">
                                                <p class="text-uppercase mb-0">Open Chat system</p>
                                                <div class="d-flex radio-btn-flex ml-30 mt-1">
                                                    <div class="mr-20">
                                                        <input type="radio" name="open_chat_system" id="relationFather5" value="yes" class="common-radio relationButton" <?php echo e(app('general_settings')->get('chat_open') == 'yes' ? 'checked' : ''); ?>>
                                                        <label for="relationFather5">Yes</label>
                                                    </div>
                                                    <div class="mr-20">
                                                        <input type="radio" name="open_chat_system" id="relationMother6" value="no" class="common-radio relationButton" <?php echo e(app('general_settings')->get('chat_open') == 'no' ? 'checked' : ''); ?>>
                                                        <label for="relationMother6">No</label>
                                                    </div>
                                                </div>
                                            </div>
























                                        </div>
                                        <button class="primary-btn radius_30px  fix-gr-bg"><i class="ti-check"></i>Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Modules\Chat\Resources\views\edu\permission.blade.php ENDPATH**/ ?>
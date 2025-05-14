<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('common.file'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="admin-visitor-area up_st_admin_visitor" id="admin-visitor-area">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="chat_main_wrapper">
                        <div class="chat_flow_list_wrapper ">
                            <div class="box_header">
                                <div class="main-title">
                                    <h3 class="m-0"><?php echo app('translator')->get('chat::chat.chat_list'); ?></h3>
                                </div>
                                <?php if(userPermission(902)): ?>
                                    <a class="primary-btn radius_30px  fix-gr-bg" href="<?php echo e(route('chat.new')); ?>"><i class="ti-plus"></i><?php echo app('translator')->get('chat::chat.new_chat'); ?></a>
                                <?php endif; ?>
                            </div>
                            <!-- chat_list  -->
                            <side-panel-component
                                    :settings="<?php echo e(json_encode(generalSetting()->only(['teacher_phone_view', 'teacher_email_view']))); ?>"
                                :search_url="<?php echo e(json_encode(route('chat.user.search'))); ?>"
                                :single_chat_url="<?php echo e(json_encode(route('chat.index'))); ?>"
                                :chat_block_url="<?php echo e(json_encode(route('chat.user.block'))); ?>"
                                :create_group_url="<?php echo e(json_encode(route('chat.group.create'))); ?>"
                                :group_chat_show="<?php echo e(json_encode(route('chat.group.show'))); ?>"
                                :users="<?php echo e(json_encode($users)); ?>"
                                :groups="<?php echo e(json_encode($groups)); ?>"
                                :all_users="<?php echo e(json_encode(\App\Models\User::where('id', '!=', auth()->id())->get())); ?>"
                                :can_create_group="<?php echo e(json_encode(createGroupPermission())); ?>"
                                :asset_type="<?php echo e(json_encode('/public')); ?>"
                            ></side-panel-component>
                            <!--/ chat_list  -->
                        </div>

                        <div class="chat_view_list ">
                            <div class="box_header">
                                <h3 class="">
                                    <?php echo e($name); ?>'s Files
                                </h3>
                            </div>
                            <div class="row align-items-center fileshow">
                                <?php $__empty_1 = true; $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <div class="single-entry">
                                        <?php if($message->message_type == 1): ?>
                                            <img style="max-height: 120px;width: 100%;" class="img-fluid" src="<?php echo e(asset($message->file_name)); ?>" alt="">
                                        <?php elseif( in_array($message->message_type, [2,3]) ): ?>
                                            <?php if($type == 'group'): ?>
                                            <a href="<?php echo e(route('chat.file.download.group', ['id' => $message->id, 'group' => $group->id])); ?>"><?php echo e($message->original_file_name); ?></a>
                                            <?php else: ?>
                                                <a href="<?php echo e(route('chat.file.download', $message->id)); ?>"><?php echo e($message->original_file_name); ?></a>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <div>
                                                <audio class="w-100" src="<?php echo e(asset($message->file_name)); ?>" controls></audio>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <p><?php echo app('translator')->get('chat::chat.no_file_found'); ?>!</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Modules\Chat\Resources\views\files.blade.php ENDPATH**/ ?>
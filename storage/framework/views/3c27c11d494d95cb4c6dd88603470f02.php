<?php if(userPermission('chat') && menuStatus(900)): ?>
    <li  data-position="<?php echo e(menuPosition(900)); ?>" class="sortable_li">
        <a href="javascript:void(0)" class="has-arrow" aria-expanded="false">
            <div class="nav_icon_small">
                <span class="fas fa fa-weixin"></span>
            </div>
            <div class="nav_title">
                <span><?php echo app('translator')->get('chat::chat.chat'); ?></span>
                
            </div>
        </a>
        <ul class="list-unstyled" id="subMenuChat">
            <?php if(userPermission('chat.index') && menuStatus(901)): ?>
                <li  data-position="<?php echo e(menuPosition(901)); ?>" >
                    <a href="<?php echo e(route('chat.index')); ?>"><?php echo app('translator')->get('chat::chat.chat_box'); ?></a>
                </li>
            <?php endif; ?>

            <?php if(userPermission('chat.invitation') && menuStatus(903)): ?>
                <li data-position="<?php echo e(menuPosition(903)); ?>" >
                    <a href="<?php echo e(route('chat.invitation')); ?>"><?php echo app('translator')->get('chat::chat.invitation'); ?></a>
                </li>
            <?php endif; ?>

            <?php if(userPermission('chat.blocked.users') && menuStatus(904)): ?>
                <li data-position="<?php echo e(menuPosition(904)); ?>" >
                    <a href="<?php echo e(route('chat.blocked.users')); ?>"><?php echo app('translator')->get('chat::chat.blocked_user'); ?></a>
                </li>
            <?php endif; ?>

            <?php if(userPermission('chat.settings') && menuStatus(905)): ?>
                <li data-position="<?php echo e(menuPosition(905)); ?>" >
                    <a href="<?php echo e(route('chat.settings')); ?>"><?php echo app('translator')->get('chat::chat.settings'); ?></a>
                </li>
            <?php endif; ?>
        </ul>
    </li>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\Modules\Chat\Resources\views\menu.blade.php ENDPATH**/ ?>
<?php $__currentLoopData = $incidentComments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $incidentComment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($incidentComment->user_id != auth()->user()->id): ?>
        <?php
            if ($incidentComment->user->role_id == 2) {
                $profile = $incidentComment->user ? $incidentComment->user->student->student_photo : 'public/backEnd/img/admin/message-thumb.png';
            } elseif ($incidentComment->user->role_id == 3) {
                $profile = $incidentComment->user ? $incidentComment->user->parent->fathers_photo : 'public/backEnd/img/admin/message-thumb.png';
            } else {
                $profile = $incidentComment->user ? $incidentComment->user->staff->staff_photo : 'public/backEnd/img/admin/message-thumb.png';
            }
        ?>
        <div class="profile-single-comment">
            <img src="<?php echo e(@$profile && file_exists(@$profile) ? asset($profile) : asset('public/backEnd/assets/img/avatar.png')); ?>"
                alt="profile-image">
            <div class="profile-comment">
                <div class="comment"><?php echo e($incidentComment->comment); ?></div>
                <p class="mb-0 mt-2 profile-comment-time">
                    <?php echo e($incidentComment->user->roles->name); ?>-<?php echo e($incidentComment->user->full_name); ?>-<?php echo e(dateConvert($incidentComment->created_at)); ?>

                </p>
            </div>
        </div>
    <?php else: ?>
        <div class="profile-single-comment reply">
            <img src="<?php echo e(@profile() && file_exists(@profile()) ? asset(profile()) : asset('public/backEnd/assets/img/avatar.png')); ?>"
                alt="profile-image">
            <div class="profile-comment">
                <div class="comment"><?php echo e($incidentComment->comment); ?></div>
                <p class="mb-0 mt-2 profile-comment-time">
                    <?php echo e($incidentComment->user->roles->name); ?>-<?php echo e($incidentComment->user->full_name); ?>-<?php echo e(dateConvert($incidentComment->created_at)); ?>

                </p>
            </div>
        </div>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\Modules\BehaviourRecords\Resources\views\comment\behaviour_comment_list.blade.php ENDPATH**/ ?>
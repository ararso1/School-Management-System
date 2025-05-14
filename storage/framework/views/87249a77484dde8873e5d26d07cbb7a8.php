<?php if($user->activeStatus->isActive()): ?>
    <span class="active_chat" ></span>
<?php elseif($user->activeStatus->isInactive()): ?>
    <span class="inactive_chat" ></span>
<?php elseif($user->activeStatus->isBusy()): ?>
    <span class="busy_chat" ></span>
<?php else: ?>
    <span class="away_chat" ></span>
<?php endif; ?>

<?php /**PATH C:\xampp\htdocs\Modules\Chat\Resources\views\partials\_active_status.blade.php ENDPATH**/ ?>
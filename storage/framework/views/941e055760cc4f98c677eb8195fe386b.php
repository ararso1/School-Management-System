
<?php if(userPermission(3100) && menuStatus(3100)): ?>
    <li data-position="<?php echo e(menuPosition(3100)); ?>" class="sortable_li">
        <a href="javascript:void(0)" class="has-arrow" aria-expanded="false">
            <div class="nav_icon_small">
                <span class="flaticon-test"></span>
            </div>
            <div class="nav_title">
                <span><?php echo app('translator')->get('examplan::exp.exam_plan'); ?></span>
            </div>
        </a>
        <ul class="list-unstyled" id="subMenuExamSeat">
            <?php if(userPermission(3102) && menuStatus(3102)): ?>
                <li data-position="<?php echo e(menuPosition(3102)); ?>">
                    <a href="<?php echo e(route('examplan.admitcard.index')); ?>"> <?php echo app('translator')->get('examplan::exp.admit_card'); ?></a>
                </li>
            <?php endif; ?>
            <?php if(userPermission(3101) && menuStatus(3101)): ?>
                <li data-position="<?php echo e(menuPosition(3101)); ?>">
                    <a href="<?php echo e(route('examplan.admitcard.setting')); ?>"> <?php echo app('translator')->get('examplan::exp.admit_card_setting'); ?></a>
                </li>
            <?php endif; ?>
            <?php if(userPermission(3106) && menuStatus(3106)): ?>
                <li data-position="<?php echo e(menuPosition(3106)); ?>">
                    <a href="<?php echo e(route('examplan.seatplan.index')); ?>"> <?php echo app('translator')->get('examplan::exp.seat_plan'); ?></a>
                </li>
            <?php endif; ?>
            <?php if(userPermission(3105) && menuStatus(3105)): ?>
                <li data-position="<?php echo e(menuPosition(3105)); ?>">
                    <a href="<?php echo e(route('examplan.seatplan.setting')); ?>"> <?php echo app('translator')->get('examplan::exp.seat_plan_setting'); ?></a>
                </li>
            <?php endif; ?>
        </ul>
    </li>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\Modules\ExamPlan\Resources\views\menu.blade.php ENDPATH**/ ?>
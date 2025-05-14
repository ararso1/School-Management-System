<?php if(auth()->user()->student): ?>
    <?php if(userPermission("fees.student-fees-list") && menuStatus(1156)): ?>
        <li data-position="<?php echo e(menuPosition(1156)); ?>" class="sortable_li">
            <a href="<?php echo e(route('fees.student-fees-list',[auth()->user()->student->id])); ?>">
                <div class="nav_icon_small">
                    <span class="flaticon-wallet"></span>
                </div>
                <div class="nav_title">
                    <span> <?php echo app('translator')->get('fees.fees'); ?></span>
                   
                </div>
            </a>
        </li>
    <?php endif; ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\Modules\Fees\Resources\views\sidebar\feesStudentSidebar.blade.php ENDPATH**/ ?>
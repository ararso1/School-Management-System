<div class="white-box">
    <div class="row">
        <div class="col-lg-6 col-7">
            <div class="main-title">
                <h3 class="mb-15"><?php echo app('translator')->get('alumni::al.upcoming_events'); ?></h3>
            </div>
        </div>
        <div class="col-lg-12">
            <table class="school-table-style w-100">
                <thead>
                    <tr>
                        <th><?php echo app('translator')->get('dashboard.title'); ?></th>
                        <th><?php echo app('translator')->get('common.date'); ?></th>
                        <th class="d-flex justify-content-around"><?php echo app('translator')->get('common.actions'); ?></th>
                    </tr>
                </thead>

                <tbody>
                    <?php $role_id = Auth()->user()->role_id; ?>
                    <?php if(isset($smEvents)): ?> 
                        <?php $__currentLoopData = $smEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u_event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($u_event->event_title); ?></td>
                                <td> <?php if($u_event->from_date): ?><?php echo e(dateConvert($u_event->from_date)); ?> <?php endif; ?> - <?php if($u_event->to_date): ?> <?php echo e(dateConvert($u_event->to_date)); ?> <?php endif; ?> </td>

                                <td class="d-flex justify-content-around">
                                    <a href="<?php echo e(route('alumni-view-event', $u_event->id)); ?>" title="<?php echo app('translator')->get('alumni::al.view_event'); ?>"
                                        class="primary-btn small tr-bg modalLink" data-modal-size="modal-lg">
                                        <span class="ti-eye"></span>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\alumniPanel\inc\commonUpcomingEvent.blade.php ENDPATH**/ ?>
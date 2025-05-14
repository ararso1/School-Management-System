<?php if(userPermission('notice-board')): ?>
<section class="">
    <div class="container-fluid p-0">
        <div class="white-box">
            <div class="row">
                <div class="col-lg-6 col-7">
                    <div class="main-title">
                        <h3 class="mb-15"><?php echo app('translator')->get('communicate.notice_board'); ?></h3>
                    </div>
                </div>


                <div class="col-lg-12">
                    <table class="school-table-style w-100">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get('common.date'); ?></th>
                                <th><?php echo app('translator')->get('dashboard.title'); ?></th>
                                <th class="d-flex justify-content-around"><?php echo app('translator')->get('common.actions'); ?></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $role_id = Auth()->user()->role_id; ?>
                            <?php if(isset($totalNotices)): ?> 
                                <?php $__currentLoopData = $totalNotices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td> <?php if($notice->publish_on): ?><?php echo e(dateConvert($notice->publish_on)); ?> <?php endif; ?> </td>
                                        <td><?php echo e($notice->notice_title); ?></td>
                                        <td class="d-flex justify-content-around">
                                            <a href="<?php echo e(route('view-notice', $notice->id)); ?>" title="<?php echo app('translator')->get('common.view_notice'); ?>"
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
        </div>
    </div>
</section>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\alumniPanel\inc\noticeboard.blade.php ENDPATH**/ ?>
<div role="tabpanel" class="tab-pane fade <?php echo e($type == 'studentTimeline' ? 'show active':''); ?>" id="studentTimeline">
    <div class="white-box">
        <div class="text-right mb-20">
            <button type="button" data-toggle="modal" data-target="#add_timeline_madal" class="primary-btn tr-bg text-uppercase bord-rad">
                <?php echo app('translator')->get('common.add'); ?>
                <span class="pl ti-plus"></span>
            </button>
        </div>
        <?php $__currentLoopData = $timelines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timeline): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="student-activities">
                <div class="single-activity">
                    <h4 class="title text-uppercase"><?php echo e($timeline->date != ""? dateConvert($timeline->date):''); ?></h4>
                    <div class="sub-activity-box d-flex">
                        <h6 class="time text-uppercase"></h6>
                        <div class="sub-activity">
                            <h5 class="subtitle text-uppercase"> <?php echo e($timeline->title); ?></h5>
                            <p>
                                <?php echo e($timeline->description); ?>

                            </p>
                        </div>

                        <div class="close-activity">

                            <a class="primary-btn icon-only fix-gr-bg" data-toggle="modal"
                               data-target="#deleteTimelineModal<?php echo e($timeline->id); ?>" href="#">
                                <span class="ti-trash text-white"></span>
                            </a>

                            <?php if(file_exists($timeline->file)): ?>
                                <a href="<?php echo e(url($timeline->file)); ?>"
                                   class="primary-btn tr-bg text-uppercase bord-rad" download>
                                    <?php echo app('translator')->get('common.download'); ?><span class="pl ti-download"></span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="modal fade admin-query" id="deleteTimelineModal<?php echo e($timeline->id); ?>">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><?php echo app('translator')->get('common.delete'); ?></h4>
                                <button type="button" class="close" data-dismiss="modal">
                                    &times;
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center">
                                    <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                                </div>

                                <div class="mt-40 d-flex justify-content-between">
                                    <button type="button" class="primary-btn tr-bg"
                                            data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?>
                                    </button>
                                    <a class="primary-btn fix-gr-bg"
                                       href="<?php echo e(route('delete_timeline', [$timeline->id])); ?>">
                                        <?php echo app('translator')->get('common.delete'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\studentInformation\inc\_timeline_tab.blade.php ENDPATH**/ ?>
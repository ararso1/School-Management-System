<?php
    $send_type = '';
    if ($viewContent->send_type == 'G') {
        $send_type = 'Group';
    } elseif ($viewContent->send_type == 'I') {
        $send_type = 'Individual';
    } elseif ($viewContent->send_type == 'C') {
        $send_type = 'Class';
    } else {
        $send_type = 'Public';
    }
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <div class="single-content-modal-info">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="content-modal-section-title">
                            <?php echo e($viewContent->title); ?>

                        </div>
                    </div>
                </div>
                <div class="row content-container">
                    <div class="col-lg-4">
                        <span class="content-type">
                            <?php echo app('translator')->get('downloadCenter.upload_date'); ?>:
                        </span>
                        <span class="content-value">
                            <?php echo e(date('Y-m-d', strtotime($viewContent->created_at))); ?>

                        </span>
                    </div>
                    <div class="col-lg-4">
                        <span class="content-type">
                            <?php echo app('translator')->get('downloadCenter.valid_upto'); ?>:
                        </span>
                        <span class="content-value">
                            <?php echo e($viewContent->valid_upto); ?>

                        </span>
                    </div>
                    <div class="col-lg-4">
                        <span class="content-type">
                            <?php echo app('translator')->get('downloadCenter.share_date'); ?>:
                        </span>
                        <span class="content-value">
                            <?php echo e($viewContent->share_date); ?>

                        </span>
                    </div>
                    <div class="col-lg-4">
                        <span class="content-type">
                            <?php echo app('translator')->get('downloadCenter.shared_by'); ?>:
                        </span>
                        <span class="content-value">
                            <?php echo e($viewContent->user->full_name); ?>

                        </span>
                    </div>
                    <div class="col-lg-4">
                        <span class="content-type">
                            <?php echo app('translator')->get('downloadCenter.send_to'); ?>:
                        </span>
                        <span class="content-value">
                            <?php echo e($send_type); ?>

                        </span>
                    </div>
                    <div class="col-lg-4">
                    </div>
                    <div class="col-lg-12">
                        <span class="content-type">
                            <?php echo app('translator')->get('downloadCenter.description'); ?>:
                        </span>
                        <span class="content-value">
                            <?php echo e($viewContent->description ? $viewContent->description : 'No Description'); ?>

                        </span>
                    </div>
                    <div class="col-lg-12">
                        <div class="content-modal-section-title">
                            <?php echo app('translator')->get('downloadCenter.attachments'); ?>
                        </div>
                        <div class="attached-content">
                            <ul class="attached-content-list">
                                <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="attached-content-item">
                                        <?php if(@$content->youtube_link): ?>
                                            <a href="<?php echo e($content->youtube_link); ?>"
                                                target="_blank"><?php echo e($content->file_name); ?></a>
                                        <?php else: ?>
                                            <a href="<?php echo e(url("$content->upload_file")); ?>"
                                                download><?php echo e($content->file_name); ?>

                                                <span class="pl ti-download"></span></a>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="single-content-modal-sidebar">
                <div class="content-modal-section-title sidebar">
                    <?php echo app('translator')->get('downloadCenter.shared_groups_users'); ?>
                </div>
                <ul class="content-links">
                    <?php if(@$viewContent->send_type == 'G'): ?>
                        <?php $__currentLoopData = @$roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($role->name); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <?php if(@$viewContent->send_type == 'I'): ?>
                        <?php $__currentLoopData = @$individuals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $individual): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($individual->full_name); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <?php if(@$viewContent->send_type == 'C'): ?>
                        <?php $__currentLoopData = @$classSections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classSection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($classSection->className->class_name); ?>(<?php echo e($classSection->sectionName->section_name); ?>)
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\Modules\DownloadCenter\Resources\views\contentShareList\view_content_modal.blade.php ENDPATH**/ ?>
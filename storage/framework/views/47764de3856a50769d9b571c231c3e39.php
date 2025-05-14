<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('downloadCenter.video_list'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
    <style>
        .vidoe-list {
            row-gap: 30px;
        }

        .single-video-item {
            height: 200px;
            width: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            padding: 20px;
            position: relative;
        }

        .single-video-item::before {
            content: '';
            background: rgba(0, 0, 0, 0.4);
            height: 100%;
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 1;
            transition: all 0.4s ease 0s;
            opacity: 0.2;
        }

        .single-video-item:hover::before {
            opacity: 1;
        }

        .single-video-item:hover .video-action-btns {
            display: block;
        }

        .single-video-info {
            position: absolute;
            bottom: 25px;
            z-index: 2;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            width: 90%;
            left: 5%;
            right: 5%;
        }

        .video-action-btns {
            display: none;
        }

        .video-action-btns ul {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin-bottom: 30px;
        }

        .single-video-item .vidoe-title {
            color: #ffffff;
            font-size: 16px;
            font-weight: 500;
            font-family: inherit;
            text-align: center;
        }

        .video-action-btns ul li a i {
            color: #ffffff;
            transition: 0.4s all ease-in-out;
            font-size: 15px;
        }

        .video-action-btns ul li a:hover i {
            transform: scale(1.2)
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo e($student_detail->full_name); ?> - <?php echo app('translator')->get('downloadCenter.video_list'); ?> </h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('downloadCenter.download_center'); ?></a>
                    <a href="<?php echo e(route('download-center.video-list')); ?>"><?php echo app('translator')->get('downloadCenter.video_list'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <?php if(isset($videos)): ?>
        <section class="mt-20">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-lg-12 student-details up_admin_visitor">
                        <ul class="nav nav-tabs tabs_scroll_nav ml-0" role="tablist">
                            <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="nav-item">
                                    <?php if(moduleStatusCheck('University')): ?>
                                        <a class="nav-link <?php if($key == 0): ?> active <?php endif; ?> "
                                            href="#tab<?php echo e($key); ?>" role="tab"
                                            data-toggle="tab"><?php echo e($record->semesterLabel->name); ?> (
                                            <?php echo e($record->unSemester->name); ?> - <?php echo e($record->unAcademic->name); ?> ) </a>
                                    <?php else: ?>
                                        <a class="nav-link <?php if($key == 0): ?> active <?php endif; ?> "
                                            href="#tab<?php echo e($key); ?>" role="tab"
                                            data-toggle="tab"><?php echo e($record->class->class_name); ?>

                                            (<?php echo e($record->section->section_name); ?>)
                                        </a>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <div class="tab-content">
                            <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div role="tabpanel"
                                    class="tab-pane fade <?php if($key == 0): ?> active show <?php endif; ?>"
                                    id="tab<?php echo e($key); ?>">
                                    <div class="container-fluid p-0">
                                        <div class="row mt-40">
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-lg-12 white-box mt-10">
                                                        <div class="row vidoe-list">
                                                            <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php
                                                                    $variable = substr($video->youtube_link, 32, 11);
                                                                ?>
                                                                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                                                    <div class="single-video-item"
                                                                        style="background-image: url(http://img.youtube.com/vi/<?php echo e($variable); ?>/hqdefault.jpg);">
                                                                        <div class="single-video-info">
                                                                            <div class="video-action-btns">
                                                                                <ul>
                                                                                    <li>
                                                                                        <a class="modalLink"
                                                                                            data-modal-size="large-modal"
                                                                                            title="<?php echo app('translator')->get('downloadCenter.view_video'); ?>"
                                                                                            href="<?php echo e(route('download-center.video-list-view-modal', [$video->id])); ?>">
                                                                                            <i class="fas fa-bars"></i>
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="vidoe-title">
                                                                                <?php echo e($video->title); ?>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Modules\DownloadCenter\Resources\views\videoUpload\parentVideoList.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('alumni::al.alumni_dashboard'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <style>
        table#table_id thead tr th:not(:first-child) {
            padding-left: 30px !important;
        }

        table#table_id tbody tr td:not(:first-child),
        table#table_id tbody tr td:nth-child(2) {
            padding-left: 30px !important;
        }

        .leave_table {
            overflow: hidden;
        }

        .table tbody tr:last-child td,
        .table tbody tr:last-child th {
            border-bottom: none;
        }

        .QA_section .QA_table .table.school-table-style-parent-fees thead th,
        .QA_section .QA_table .table.school-table-style-parent-fees thead td {
            padding: 16px 30px !important;
        }

        .fc th {
            padding: 0 !important;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('mainContent'); ?>
    <?php
        @$setting = generalSetting();
        if (!empty(@$setting->currency_symbol)) {
            @$currency = @$setting->currency_symbol;
        } else {
            @$currency = '$';
        }
    ?>

    <section class="student-details">
        <div class="container-fluid p-0">
            <div class="white-box">
                <div class="col-lg-12">
                    <div class="main-title">
                        <h3 class="mb-15"><?php echo app('translator')->get('student.welcome_to'); ?> <strong> <?php echo e(@$student_detail->full_name); ?></strong> </h3>
                    </div>
                </div>
                <div class="row row-gap-30">

                    <div class="col-lg-3 col-md-6">
                        <a href="<?php echo e(route('student_noticeboard')); ?>" class="d-block">
                            <div class="white-box single-summery violet">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h3><?php echo app('translator')->get('student.notice'); ?></h3>
                                        <p class="mb-0"><?php echo app('translator')->get('student.total_notice'); ?></p>
                                    </div>
                                    <h1 class="gradient-color2">
                                        <?php if(isset($totalNotices)): ?>
                                            <?php echo e(count(@$totalNotices)); ?>

                                        <?php endif; ?>
                                    </h1>
                                </div>
                            </div>
                        </a>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <a href="<?php echo e(route('student_noticeboard')); ?>" class="d-block">
                            <div class="white-box single-summery fuchsia">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h3><?php echo app('translator')->get('edulia.event'); ?></h3>
                                        <p class="mb-0"><?php echo app('translator')->get('alumni::al.upcoming_events'); ?></p>
                                    </div>
                                    <h1 class="gradient-color2">
                                        <?php if(isset($smEvents)): ?>
                                            <?php echo e(count(@$smEvents)); ?>

                                        <?php endif; ?>
                                    </h1>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <a href="<?php echo e(route('student_book_issue')); ?>" class="d-block">
                            <div class="white-box single-summery cyan">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h3><?php echo app('translator')->get('student.issued_book'); ?></h3>
                                        <p class="mb-0"><?php echo app('translator')->get('student.total_issued_book'); ?></p>
                                    </div>
                                    <h1 class="gradient-color2">
                                        <?php if(isset($issueBooks)): ?>
                                            <?php echo e(count(@$issueBooks)); ?>

                                        <?php endif; ?>
                                    </h1>
                                </div>
                            </div>
                        </a>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <a href="<?php echo e(route('student_book_issue')); ?>" class="d-block">
                            <div class="white-box single-summery violet">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h3><?php echo app('translator')->get('common.weekend'); ?></h3>
                                        <p class="mb-0">
                                            <?php echo app('translator')->get('alumni::al.weekends_on'); ?>
                                            <?php if(isset($sm_weekends)): ?>
                                                <?php $__currentLoopData = $sm_weekends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $weekend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <strong><?php echo e(@$weekend->name); ?><?php if (! ($loop->last)): ?>,<?php endif; ?></strong>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </p>
                                    </div>
                                    <h1 class="gradient-color2">
                                        <?php if(isset($sm_weekends)): ?>
                                            <?php echo e(count(@$sm_weekends)); ?>

                                        <?php endif; ?>
                                    </h1>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="white-box mt-40">
                <div class="row">
                    <div class="col-lg-6">
                        <?php echo $__env->make('backEnd.alumniPanel.inc.noticeboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-lg-6">
                        <?php echo $__env->make('backEnd.alumniPanel.inc.commonUpcomingEvent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
            <div class="white-box mt-40">
                <div class="row">
                    <div class="col-lg-6">
                        <?php echo $__env->make('backEnd.communicate.commonAcademicCalendar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-lg-6 col-xl-6">
                        <?php echo $__env->make('backEnd.alumniPanel.inc.commonDocument', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.communicate.academic_calendar_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\alumniPanel\alumni_dashboard.blade.php ENDPATH**/ ?>
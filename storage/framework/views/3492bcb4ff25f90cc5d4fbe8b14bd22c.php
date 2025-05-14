<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo e(__('Exam Routine')); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/print/bootstrap.min.css" />
    <script type="text/javascript" src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/print/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/print/bootstrap.min.js"></script>
</head>
<style>
    @page {
        margin-top: 0px;
        margin-bottom: 0px;
    }

    table,
    th,
    tr,
    td {
        font-size: 11px !important;
        /* text-align: center; */
    }

    .routineBorder {
        /* border-bottom: 1px solid; */
    }
</style>

<body style="font-family: 'dejavu sans', sans-serif;">
    <div class="container-fluid" id="pdf">
        <table cellspacing="0" width="100%">
            <tr>
                <td>
                    <img style="padding-top: 20px;" src="<?php echo e(url('/')); ?>/<?php echo e(@generalSetting()->logo); ?>"
                        alt="">
                </td>
                <td>
                    <h3 style="font-size:20px !important; margin: 5px 0 0 0" class="text-white mb-0"> <?php echo app('translator')->get('exam.exam_routine'); ?>
                    </h3>
                    <span style="font-size:14px !important;" class="text-white"><?php echo app('translator')->get('common.academic_year'); ?> :
                        <?php echo e(@$academic_year->title); ?>

                        (<?php echo e(@$academic_year->year); ?>) </span> </br>
                    <span style="font-size:14px !important;margin-right:10px;" align="left"
                        class="text-white"><?php echo app('translator')->get('exam.exam'); ?>: <?php echo e(@$exam_type); ?> </span>

                    <span style="font-size:14px !important;margin-right:10px;" align="left"
                        class="text-white"><?php echo app('translator')->get('common.class'); ?>: <?php echo e(@$class_name); ?> </span>
                    <span style="font-size:14px !important;;margin-right:10px;" align="left"
                        class="text-white"><?php echo app('translator')->get('common.section'); ?>: <?php echo e(@$section_name); ?> </span>
                </td>
                <td style="text-aligh:center">
                    <h3 style="font-size:20px !important; margin: 5px 0 0 0" class="text-white">
                        <?php echo e(isset(generalSetting()->school_name) ? generalSetting()->school_name : 'Infix School Management ERP'); ?>

                    </h3>
                    <p style="font-size:16px !important;margin:0px" class="text-white mb-0">
                        <?php echo e(isset(generalSetting()->address) ? generalSetting()->address : 'Infix School Address'); ?>

                    </p>
                </td>
            </tr>
        </table>
        <hr style="margin:0px;padding-top:6px;padding-bottom:0px">
        <table class="table table-bordered table-striped" style="width: 100%; table-layout: fixed">
            <tr>
                <th style="width:10%;padding: 2px; padding-left:8px;">
                    <?php echo app('translator')->get('common.date_|_day'); ?>
                </th>
                <th style="padding: 2px; padding-left:8px;"><?php echo app('translator')->get('common.subject'); ?></th>
                <?php if(moduleStatusCheck('University')): ?>
                    <th style="padding: 2px; padding-left:8px;"> <?php echo app('translator')->get('university::un.semester_label'); ?> (<?php echo app('translator')->get('common.section'); ?>)</th>
                <?php else: ?>
                    <th style="padding: 2px; padding-left:8px;"><?php echo app('translator')->get('common.class_Sec'); ?></th>
                <?php endif; ?>

                <th style="padding: 2px; padding-left:8px;"><?php echo app('translator')->get('common.teacher'); ?></th>
                <th style="padding: 2px; padding-left:8px;"><?php echo app('translator')->get('common.time'); ?></th>
                <th style="padding: 2px; padding-left:8px;"><?php echo app('translator')->get('common.duration'); ?></th>
                <th style="padding: 2px; padding-left:8px;"><?php echo app('translator')->get('common.room'); ?></th>
            </tr>
            <tbody>
                <?php $__currentLoopData = $exam_schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e(dateConvert($item->date)); ?>

                            <br><?php echo e(Carbon::createFromFormat('Y-m-d', $item->date)->format('l')); ?>

                        </td>
                        <td>
                            <strong> <?php echo e($item->subject ? $item->subject->subject_name : ''); ?> </strong>
                        </td>
                        <?php if(moduleStatusCheck('University')): ?>
                            <td>
                                <?php echo e($class_name); ?> (<?php echo e($section_name); ?>)
                                
                            </td>
                        <?php else: ?>
                            <td>
                                <?php echo e($item->class ? $item->class->class_name : ''); ?>

                                <?php echo e($item->section ? '(' . $item->section->section_name . ')' : ''); ?>

                            </td>
                        <?php endif; ?>

                        <td><?php echo e($item->teacher ? $item->teacher->full_name : ''); ?></td>

                        <td> <?php echo e(date('h:i A', strtotime(@$item->start_time))); ?> -
                            <?php echo e(date('h:i A', strtotime(@$item->end_time))); ?> </td>
                        <td>
                            <?php
                                $duration = strtotime($item->end_time) - strtotime($item->start_time);
                            ?>

                            <?php echo e(timeCalculation($duration)); ?>

                        </td>
                        <td><?php echo e($item->classRoom ? $item->classRoom->room_no : ''); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <script src="<?php echo e(asset('public/vendor/spondonit/js/jquery-3.6.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/backEnd/js/pdf/html2pdf.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/backEnd/js/pdf/html2canvas.min.js')); ?>"></script>
    <script>
        function generatePDF() {
            const element = document.getElementById('pdf');
            var opt = {
                margin: 0.5,
                pagebreak: {
                    mode: ['avoid-all', 'css', 'legacy'],
                    before: '#page2el'
                },
                filename: 'exam-schedule.pdf',
                image: {
                    type: 'jpeg',
                    quality: 100
                },
                html2canvas: {
                    scale: 5
                },
                jsPDF: {
                    unit: 'in',
                    format: 'a4',
                    orientation: 'landscape'
                }
            };
            html2pdf().set(opt).from(element).save().then(function() {
                // window.close();
            });
        }
        $(document).ready(function() {
            generatePDF();
        })
    </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\examination\exam_schedule_print.blade.php ENDPATH**/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo app('translator')->get('examplan::exp.admit_card'); ?></title>
    <!-- All Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="John Doe">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="og:title" property="og:title" content="The Title of Your Article">
    <meta name="twitter:card" content="summary">
    <meta name="robots" content="noindex, nofollow">


    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo e(asset('Modules/ExamPlan/Public/assets/css/style.min.css')); ?>">

    <!--[if lt IE 9]>
    <script src="https://www.microsoft.com/en-us/download/details.aspx?id=38270"></script>
    <![endif]-->

</head>

<body>
<main style="width: 750px; margin: auto;">

    <?php $__currentLoopData = $admitcards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $admitcard): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card-item border border-3 p-10 <?php if($key != 0 & $key % 2 != 0): ?> break <?php endif; ?> ">
            <table class="table w-full border p-10">
                <tr>
                    <td class="flex flex-wrap gap-2 items-center">
                        <div class="logo w-110">
                            <img src="<?php echo e(asset(generalSetting()->logo)); ?>" class="w-full"
                                 alt="<?php echo e(asset(generalSetting()->school_name)); ?>">
                        </div>
                        <div class="content">
                            <p class="fs-22 fw-bold text-black"><?php echo e(generalSetting()->school_name); ?></p>
                            <?php if($setting->admit_sub_title): ?>
                                <p class="fs-16 fw-bold text-red"><?php echo e(@$setting->admit_sub_title); ?></p>
                            <?php endif; ?>
                            <?php if($setting->school_address): ?>
                                <p class="fs-14 fw-bold text-black"><?php echo e(generalSetting()->address); ?></p>
                            <?php endif; ?>
                        </div>
                    </td>
                    <td class="text-end" width="35%">
                        <p class="fs-24 fw-bold text-black"
                           style="text-transform: uppercase;"><?php echo app('translator')->get('examplan::exp.admit_card'); ?></p>
                        
                                
                                
                        <?php if($setting->exam_name): ?>
                            <p class="fs-14 fw-bold text-red" style="font-size: 13px;"><?php echo e($admitcard->examType->title); ?>

                                - <?php echo e(@generalSetting()->academic_Year->year); ?> </p>
                        <?php endif; ?>
                    </td>
                </tr>
            </table>
            <div class="h-10"></div>
            <table class="table w-full border p-10">
                <tr>
                    <td>
                        <?php if($setting->admission_no): ?>
                            <p class="fs-16 fw-bold text-black"><?php echo app('translator')->get('student.admission_number'); ?> : <span
                                        class="fs-14 fw-bold text-red"><?php echo e(@$admitcard->studentRecord->studentDetail->admission_no); ?></span>
                            </p>
                        <?php endif; ?>
                    </td>
                    <td class="text-end">
                        <p class="fs-16 fw-bold text-black"><?php echo app('translator')->get('student.date'); ?> : <span
                                    class="fs-14 fw-bold text-red"><?php echo e(@dateConvert($admitcard->created_at)); ?></span></p>
                    </td>
                </tr>
            </table>
            <div class="h-10"></div>
            <div class="user border p-10 flex">
                <table class="table w-full border">
                    <tr class="border-bottom">
                        <td>
                            <?php if($setting->student_name): ?>
                                <p class="fs-16 fw-bold text-black"><?php echo app('translator')->get('student.student_names'); ?> : <span
                                            class="fs-14 fw-bold text-red"><?php echo e(@$admitcard->studentRecord->studentDetail->full_name); ?></span>
                                </p>
                            <?php endif; ?>
                        </td>
                        <td class="text-start" width="25%" style="border-left: 1px solid #1a1818;">
                            <?php if($setting->class_section): ?>
                                <p class="fs-16 fw-bold text-black"><?php echo app('translator')->get('student.class'); ?> : <span
                                            class="fs-14 fw-bold text-red"><?php echo e(@$admitcard->studentRecord->class->class_name); ?></span>
                                </p>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr class="border-bottom">
                        <td>
                            <?php if($setting->gaurdian_name): ?>
                                <p class="fs-16 fw-bold text-black"><?php echo app('translator')->get('student.father_names'); ?> : <span
                                            class="fs-14 fw-bold text-red"><?php echo e(@$admitcard->studentRecord->studentDetail->parents->fathers_name); ?></span>
                                </p>
                            <?php endif; ?>
                        </td>
                        <td class="text-start" width="25%" style="border-left: 1px solid #1a1818;">
                            <?php if($setting->class_section): ?>
                                <p class="fs-16 fw-bold text-black"><?php echo app('translator')->get('student.section'); ?> : <span
                                            class="fs-14 fw-bold text-red"><?php echo e(@$admitcard->studentRecord->section->section_name); ?></span>
                                </p>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php if($setting->gaurdian_name): ?>
                                <p class="fs-16 fw-bold text-black"><?php echo app('translator')->get('student.mother_names'); ?> : <span
                                            class="fs-14 fw-bold text-red"><?php echo e(@$admitcard->studentRecord->studentDetail->parents->mothers_name); ?></span>
                                </p>
                            <?php endif; ?>
                        </td>
                        <td class="text-start" width="25%" style="border-left: 1px solid #1a1818;">
                            <?php if($setting->admission_no): ?>
                                <p class="fs-16 fw-bold text-black"><?php echo app('translator')->get('student.roll'); ?>: <span
                                            class="fs-14 fw-bold text-red"><?php echo e(@$admitcard->studentRecord->studentDetail->roll_no); ?></span>
                                </p>
                            <?php endif; ?>
                        </td>
                    </tr>
                </table>
                <?php if($setting->student_photo): ?>
                    <div class="profile flex items-center justify-center border">
                            <img src="<?php echo e(asset(@$admitcard->studentRecord->studentDetail->student_photo != '' ? @$admitcard->studentRecord->studentDetail->student_photo : 'public/uploads/staff/demo/staff.jpg')); ?>"
                                    alt="<?php echo e(asset(@$admitcard->studentRecord->studentDetail->full_name)); ?>">
                    </div>
                <?php endif; ?>
            </div>
            <div class="h-10"></div>
            <?php if(@$setting->description): ?>
                <div class="border p-10 info description_box">
                    <?php echo @$setting->description; ?>

                </div>
            <?php endif; ?>
            
            <div class="signature text-end">
                <?php if($setting->principal_signature): ?>

                    <div class="singnature_img">
                        <?php if($setting->principal_signature_photo): ?>
                            <img src="<?php echo e(asset($setting->principal_signature_photo)); ?>">
                        <?php endif; ?>
                    </div>

                    <p class="border-top fs-16 fw-normal text-black inline-block"> <?php echo app('translator')->get('examplan::exp.exam_controller'); ?> </p>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</main>

<script>
    // $('.description_box').height();

    $(document).ready(function () {
        resize_to_fit();
    });

    function resize_to_fit() {
        var fontsize = $('.description_box').css('font-size');
        $('.description_box').css('fontSize', parseFloat(fontsize) - 1);

        if ($('.description_box').height() >= $('.description_box').height()) {
            resize_to_fit();
        }
    }
</script>
</body>

</html><?php /**PATH C:\xampp\htdocs\Modules\ExamPlan\Resources\views\admitcardPrint_2.blade.php ENDPATH**/ ?>
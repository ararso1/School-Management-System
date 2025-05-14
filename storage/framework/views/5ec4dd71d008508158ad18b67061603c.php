<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo app('translator')->get('examplan::exp.admit_card'); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700&display=swap"
          rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            font-size: 12px;
            color: #828BB2;
            font-weight: 400;
            margin: 0;
            padding: 0;
            line-height: 1.1;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: var(--base_color);
            margin: 0;
        }

        .d-flex {
            display: flex;
        }

        .align-items-center {
            align-items: center;
        }

        .justify-content-between {
            justify-content: space-between;
        }

        .justify-content-center {
            justify-content: center;
        }

        .flex-fill {
            flex: 1 1 auto;
        }

        .flex-column {
            flex-direction: column;
        }

        .student_img {
            border: 1px solid var(--base_color);
            width: 100px;
            height: 100px;
            padding: 5px;
            background-size: 100% 100%;
            background-position: center center;
            flex: 100px 0 0;
            position: relative;
        }

        .student_img::before {
            content: '';
            position: absolute;
            left: 1px;
            right: 1px;
            top: 1px;
            bottom: 1px;
            border: 5px solid #fff;
            z-index: 1
        }


        .logo_img {
            max-width: 150px;
        }

        .student_img img,
        .logo_img img {
            max-width: 100%;
        }

        .admit_card_wrapper {
            width: 210mm;
            margin: auto;
            padding: 20px 0;
        }

        .admit_card_wrapper_content h3 {
            font-size: 24px;
            margin-bottom: 0px;

        }

        .single_student_information:not(:last-child) {
            margin-bottom: 4px;
        }

        .admit_card_wrapper_content p {
            font-size: 12px;
            margin: 0 0 3px 0;
        }

        .admit_card_wrapper_content h4 {
            font-size: 16px;
            text-transform: capitalize;
            display: inline-block;
            border-bottom: 1px solid var(--base_color);
            line-height: 1;
            margin: 20px 0 5px 0;
            font-weight: 500;
        }

        .admit_card_wrapper_content span {
            display: block;
            font-size: 14px;
        }

        .sep_name {
            flex: 110px 0 0;
        }

        .student_grid_box {
            grid-gap: 15px;
        }

        .text-uppercase {
            text-transform: uppercase;
        }

        .f_w_400 {
            font-weight: 400;
        }

        .f_w_500 {
            font-weight: 500;
        }

        .m-0 {
            margin: 0;
        }

        .table {
            border-spacing: 0;
            border-collapse: collapse;
            width: 100%;
        }

        .table thead {
        }

        .table thead th {
            border: 1px solid var(--border_color);
            font-size: 12px;
            font-weight: 400;
            text-transform: uppercase;
            text-align: left;
            padding: 4px 10px;
            font-size: 12px;
        }

        .table tbody tr td {
            padding: 6px 14px;
            font-size: 12px;
            color: #828BB2;
        }

        .table tbody tr td {
            border: 1px solid rgba(130, 139, 178, 0.15);
        }

        .exam_routine {
            font-size: 16px;
            text-align: center;
            margin: 15px 0 5px 0;
        }

        .table {
            margin-bottom: 50px;
        }

        .singrature_boxs {
            padding-top: 20px;
        }

        .single_signature {
            width: 200px;
        }

        .single_signature span {
            border-top: 1px solid #828BB2;
            width: 100%;
            text-align: center;
            padding-top: 3px;
        }

        .admid_card_wrapper_body {
            margin-top: 30px;
        }

        .admit_card_wrapper:nth-of-type(2n+1) {
            border-bottom: 1px dashed #ddd;
        }

        .singrature_boxs {
            padding-top: 20px;
            flex: 1 1 auto;
        }

        .admid_card_wrapper_body {
            margin-top: 30px;
            flex: 1 1 auto;
            display: flex;
            flex-direction: column;
        }

        .admit_card_wrapper {
            height: 142.5mm;
        }

        .admit_card_wrapper {
            width: 210mm;
            margin: auto;
            padding: 20px 0;
            display: flex;
            flex-direction: column;
        }

        .singnature_img img {
            height: 55px;
        }

        .singnature_img {
            text-align: center;
        }

        .align-items-end {
            align-items: flex-end;
        }
    </style>
</head>

<body>

<?php $__currentLoopData = $admitcards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admitcard): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="admit_card_wrapper">
        <!-- admit_card_wrapper_header  -->
        <div class="admit_card_wrapper_header d-flex">
            <div class="logo_img">
                <img src="<?php echo e(asset(generalSetting()->logo)); ?>" alt="<?php echo e(generalSetting()->school_name); ?>">
            </div>
            <div class="admit_card_wrapper_content flex-fill d-flex align-items-center flex-column">
                <h3><?php echo e(generalSetting()->school_name); ?></h3>
                <?php if($setting->school_address): ?>
                    <p><?php echo e(generalSetting()->address); ?></p>
                    <p><?php echo app('translator')->get('common.email'); ?> :<?php echo e(generalSetting()->email); ?> , <?php echo app('translator')->get('common.phone'); ?>
                        : <?php echo e(generalSetting()->phone); ?></p>
                <?php endif; ?>
                <h4><?php echo app('translator')->get('examplan::exp.admit_card'); ?></h4>
                <?php if($setting->exam_name): ?>
                    <span><?php echo e(@$admitcard->examType->title); ?></span>
                <?php endif; ?>
            </div>

            <?php if($setting->student_photo): ?>
                
                <img class="student-meta-img img-80" style="width: 100px"
                     src="<?php echo e(file_exists(@$admitcard->studentRecord->studentDetail->student_photo) ? asset(@$admitcard->studentRecord->studentDetail->student_photo) : asset('public/uploads/staff/demo/father.png')); ?>"
                     alt="">
            <?php endif; ?>
        </div>
        <div class="admid_card_wrapper_body">
            <div class="student_info">
                <div class="single_student_information d-flex align-items-center">
                    <?php if($setting->admission_no): ?>
                        <div class="student_grid_box d-flex align-items-center flex-fill">
                            <span class="sep_name"><?php echo app('translator')->get('student.admission_no'); ?></span>
                            <span>:</span>
                            <span class="f_w_500 theme_text text-uppercase"><?php echo e(@$admitcard->studentRecord->studentDetail->admission_no); ?></span>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="single_student_information d-flex align-items-center">
                    <?php if($setting->student_name): ?>
                        <div class="student_grid_box d-flex align-items-center flex-fill">
                            <span class="sep_name"><?php echo app('translator')->get('common.name'); ?></span>
                            <span>:</span>
                            <span class="f_w_500 theme_text text-uppercase"><?php echo e(@$admitcard->studentRecord->studentDetail->full_name); ?></span>
                        </div>
                    <?php endif; ?>

                    <?php if($setting->class_section || $setting->academic_year): ?>
                        <p class="m-0">
                    <?php endif; ?>
                            <?php if($setting->class_section): ?>
                                <?php echo app('translator')->get('student.class'); ?> - <?php echo e(@$admitcard->studentRecord->class->class_name); ?>

                                ( <?php echo e(@$admitcard->studentRecord->section->section_name); ?> )
                            <?php endif; ?>

                            <?php if($setting->academic_year): ?>
                                <?php echo e(@$admitcard->studentRecord->academic->year); ?>

                            <?php endif; ?>
                    <?php if($setting->class_section || $setting->academic_year): ?>
                        </p>
                    <?php endif; ?>


                </div>

                <?php if($setting->gaurdian_name): ?>
                    <div class="single_student_information d-flex align-items-center">
                        <div class="student_grid_box d-flex align-items-center flex-fill">
                            <span class="sep_name"><?php echo app('translator')->get('student.guardian'); ?></span>
                            <span>:</span>
                            <span class="f_w_400  text-uppercase"><?php echo e(@$admitcard->studentRecord->studentDetail->parents->guardians_name); ?></span>
                        </div>
                        <?php if(isset($admitcard->studentRecord->studentDetail->category->category_name)): ?>
                            <p class="m-0"><?php echo app('translator')->get('student.category'); ?>
                                - <?php echo e(@$admitcard->studentRecord->studentDetail->category->category_name); ?>

                            </p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

            </div>
            <h4 class="exam_routine"><?php echo app('translator')->get('examplan::exp.exam_routine'); ?></h4>
            <table class="table">
                <thead>
                <tr>
                    <th><?php echo app('translator')->get('examplan::exp.date_time'); ?></th>
                    <th><?php echo app('translator')->get('examplan::exp.subject'); ?></th>
                    <th><?php echo app('translator')->get('examplan::exp.date_time'); ?></th>
                    <th><?php echo app('translator')->get('examplan::exp.subject'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $exam_routines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date => $exam_routine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($loop->iteration % 2 == 1 ): ?>

                        <tr>
                            <?php endif; ?>
                            <td><?php echo e(dateConvert($exam_routine->date)); ?>

                                [<?php echo e(date('h:i A', strtotime(@$exam_routine->start_time))); ?>

                                - <?php echo e(date('h:i A', strtotime(@$exam_routine->end_time))); ?>]
                            </td>
                            <td><?php echo e($exam_routine->subject ? $exam_routine->subject->subject_name :''); ?> </strong> <?php echo e($exam_routine->subject ? '('.$exam_routine->subject->subject_code .')':''); ?></td>
                            <?php if($loop->last && $exam_routines->count() %2 == 1 && $exam_routine->id): ?>
                                <td colspan="2"></td>
                    <?php endif; ?>
                    <?php if($loop->iteration % 2 == 0 || $loop->last % 2 == 1): ?>
                        <tr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="singrature_boxs d-flex justify-content-between align-items-end">
                <?php if($setting->class_teacher_signature): ?>
                    <div class="single_signature d-flex  flex-column">
                        <div class="singnature_img">
                            <?php if($setting->teacher_signature_photo): ?>
                                <img src="<?php echo e(asset($setting->principal_signature_photo)); ?>">
                            <?php endif; ?>
                        </div>
                        <span><?php echo app('translator')->get('examplan::exp.class_teacher'); ?> </span>
                    </div>
                <?php endif; ?>
                <?php if($setting->principal_signature): ?>
                    <div class="single_signature d-flex  flex-column">

                        <div class="singnature_img">
                            <?php if($setting->teacher_signature_photo): ?>
                                <img src="<?php echo e(asset($setting->teacher_signature_photo)); ?>">
                            <?php endif; ?>
                        </div>
                        <span><?php echo app('translator')->get('examplan::exp.principal_signature'); ?> </span>
                    </div>
                <?php endif; ?>

            </div>
        </div>
        <!-- end_admit_card_wrapper_header  -->

    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</body>

</html><?php /**PATH C:\xampp\htdocs\Modules\ExamPlan\Resources\views\admitcardPrint.blade.php ENDPATH**/ ?>
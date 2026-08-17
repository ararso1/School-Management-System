<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo e(($student->full_name ?? 'Student')); ?> - ID Card</title>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/bootstrap.css" />
    <style>
        body {
            background: #f4f5f7;
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
        }
        .id-card-toolbar {
            position: sticky;
            top: 0;
            z-index: 20;
            background: #fff;
            border-bottom: 1px solid #e5e7eb;
            padding: 12px 16px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            align-items: center;
            justify-content: space-between;
        }
        .id-card-toolbar .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            align-items: center;
        }
        .id-card-toolbar select {
            min-width: 220px;
            height: 36px;
            border: 1px solid #d1d5db;
            border-radius: 4px;
            padding: 0 10px;
        }
        .primary-btn {
            display: inline-block;
            padding: 8px 14px;
            border-radius: 4px;
            background: linear-gradient(90deg, #7c32ff 0%, #a235ec 70%, #c738d8 100%);
            color: #fff !important;
            text-decoration: none;
            border: 0;
            cursor: pointer;
            font-size: 13px;
        }
        .primary-btn.outline {
            background: #fff;
            color: #7c32ff !important;
            border: 1px solid #7c32ff;
        }
        .preview-wrap {
            max-width: 920px;
            margin: 24px auto;
            padding: 0 16px 40px;
        }
        .classic-card {
            width: 320px;
            margin: 0 auto;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0,0,0,.06);
        }
        .classic-card .head {
            background: #c738d8;
            color: #fff;
            padding: 10px;
            font-size: 14px;
            font-weight: 600;
        }
        .classic-card img.photo {
            width: 110px;
            height: 110px;
            object-fit: cover;
            border-radius: 6px;
            margin: 14px 0 8px;
        }
        .classic-card table {
            width: 100%;
            font-size: 12px;
        }
        .classic-card td {
            padding: 6px 14px;
            border-top: 1px solid #eee;
        }
        .id-card-pair {
            break-inside: avoid;
            page-break-inside: avoid;
        }
        @media print {
            body { background: #fff; }
            .id-card-toolbar { display: none !important; }
            .preview-wrap { margin: 0; padding: 0; max-width: none; }
            .id-card-back { page-break-after: always; }
        }
    </style>
</head>
<body>
    <div class="id-card-toolbar no-print">
        <form method="GET" action="<?php echo e(route('student_id_card_view', $student->id)); ?>" class="actions">
            <label for="id_card" style="margin:0;font-weight:600;">ID Card Template</label>
            <select name="id_card" id="id_card" onchange="this.form.submit()">
                <?php $__currentLoopData = $id_cards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($card->id); ?>" <?php echo e((int) $id_card->id === (int) $card->id ? 'selected' : ''); ?>>
                        <?php echo e($card->title); ?><?php echo e(($card->design_mode ?? '') === 'template' ? ' (Template)' : ''); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </form>
        <div class="actions">
            <button type="button" class="primary-btn" onclick="window.print()">Print</button>
            <?php if(($id_card->design_mode ?? 'classic') === 'template'): ?>
                <a class="primary-btn outline" href="<?php echo e(route('student_id_card_download', [$student->id])); ?>?id_card=<?php echo e($id_card->id); ?>&side=front">Download Front</a>
                <a class="primary-btn outline" href="<?php echo e(route('student_id_card_download', [$student->id])); ?>?id_card=<?php echo e($id_card->id); ?>&side=back">Download Back</a>
                <a class="primary-btn outline" href="<?php echo e(route('student_id_card_download', [$student->id])); ?>?id_card=<?php echo e($id_card->id); ?>&side=both">Download Both</a>
            <?php else: ?>
                <a class="primary-btn outline" href="<?php echo e(route('student_id_card_download', [$student->id])); ?>?id_card=<?php echo e($id_card->id); ?>">Download PDF</a>
            <?php endif; ?>
            <a class="primary-btn outline" href="<?php echo e(route('student_view', $student->id)); ?>">Back to Profile</a>
        </div>
    </div>

    <div class="preview-wrap" id="id_card_preview">
        <?php if(($id_card->design_mode ?? 'classic') === 'template'): ?>
            <?php echo $__env->make('backEnd.admin.idCard.partials.template_card', [
                'id_card' => $id_card,
                'student' => $student,
                'role_id' => 2,
                'forPdf' => false,
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>
            <?php
                $photo = !empty($student->student_photo)
                    ? asset($student->student_photo)
                    : asset('public/backEnd/img/student/id-card-img.jpg');
            ?>
            <div class="classic-card">
                <div class="head"><?php echo e($id_card->title ?? 'Student ID Card'); ?></div>
                <img class="photo" src="<?php echo e($photo); ?>" alt="<?php echo e($student->full_name); ?>">
                <table>
                    <?php if($id_card->student_name == 1): ?>
                        <tr><td align="left">Name</td><td align="right"><?php echo e($student->full_name); ?></td></tr>
                    <?php endif; ?>
                    <?php if($id_card->admission_no == 1): ?>
                        <tr><td align="left">Admission No</td><td align="right"><?php echo e($student->admission_no); ?></td></tr>
                    <?php endif; ?>
                    <?php if($id_card->class == 1): ?>
                        <tr><td align="left">Classification</td><td align="right"><?php echo e(\App\Helpers\IdCardTemplateHelper::studentCategoryLabel($student)); ?></td></tr>
                    <?php endif; ?>
                    <?php if(($id_card->gender ?? 0) == 1): ?>
                        <tr><td align="left">Gender</td><td align="right"><?php echo e(optional($student->gender)->base_setup_name); ?></td></tr>
                    <?php endif; ?>
                    <?php if($id_card->student_address == 1): ?>
                        <tr><td align="left">Address</td><td align="right"><?php echo e($student->current_address); ?></td></tr>
                    <?php endif; ?>
                </table>
            </div>
        <?php endif; ?>
    </div>

    <?php if(!empty($autoPrint)): ?>
        <script>window.addEventListener('load', function () { window.print(); });</script>
    <?php endif; ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\school-mgt\resources\views/backEnd/admin/idCard/student_id_card_single.blade.php ENDPATH**/ ?>
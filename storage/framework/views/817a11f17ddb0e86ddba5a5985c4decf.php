
<?php
    use App\Helpers\IdCardTemplateHelper;
    $forPdf = !empty($forPdf);
    $positions = IdCardTemplateHelper::positions($id_card);
    $fontFamily = $id_card->font_family ?: "'Segoe UI', Arial, sans-serif";
    $defaultColor = $id_card->font_color ?: '#111111';
    $width = !empty($id_card->pl_width) ? $id_card->pl_width : 86;
    $height = !empty($id_card->pl_height) ? $id_card->pl_height : 49;
    $frontBg = IdCardTemplateHelper::imageSrc(
        $id_card->background_img,
        $forPdf,
        'public/uploads/studentIdCard/meahadal_front.png'
    );
    $backBg = IdCardTemplateHelper::imageSrc(
        $id_card->background_img_back,
        $forPdf,
        'public/uploads/studentIdCard/meahadal_back.png'
    );

    $photoPath = 'public/backEnd/id_card/img/thumb.png';
    if ($role_id == 2 && !empty($student->student_photo)) {
        $photoPath = $student->student_photo;
    } elseif ($role_id != 2 && !empty($student->staff_photo)) {
        $photoPath = $student->staff_photo;
    } elseif (!empty($id_card->profile_image)) {
        $photoPath = $id_card->profile_image;
    }
    $photo = IdCardTemplateHelper::imageSrc($photoPath, $forPdf, 'public/backEnd/id_card/img/thumb.png');

    $fullName = $student->full_name ?? '';
    $admissionNo = $role_id == 2 ? ($student->admission_no ?? '') : ($student->staff_no ?? '');
    $className = $role_id == 2 ? IdCardTemplateHelper::studentClassLabel($student) : '';
    $gender = ($role_id == 2 && isset($student->gender)) ? ($student->gender->base_setup_name ?? '') : '';
    $address = $student->current_address ?? '';
    $admissionDate = ($role_id == 2 && !empty($student->admission_date))
        ? dateConvert($student->admission_date)
        : '';
    $guardianName = optional($student->parents)->guardians_name ?? '';
    $guardianPhone = optional($student->parents)->guardians_mobile ?? '';
    $qrUrl = ($role_id == 2) ? IdCardTemplateHelper::profileUrl($student->id) : url('/');
    $qrImg = IdCardTemplateHelper::qrDataUri($qrUrl);
?>

<div class="id-card-pair" style="break-inside:avoid;page-break-inside:avoid;margin:0 auto 12px;text-align:center;">
    
    <div class="id-card-side id-card-front"
         style="width:<?php echo e($width); ?>mm;height:<?php echo e($height); ?>mm;position:relative;overflow:hidden;font-family:<?php echo e($fontFamily); ?>;color:<?php echo e($defaultColor); ?>;margin:0 auto 8px;background-color:#fff;">
        <?php if($frontBg): ?>
            <img src="<?php echo e($frontBg); ?>" alt="" style="position:absolute;left:0;top:0;width:100%;height:100%;object-fit:fill;z-index:0;">
        <?php endif; ?>

        <?php if(!empty($positions['front']['photo'])): ?>
            <?php $p = $positions['front']['photo']; ?>
            <div style="<?php echo e(IdCardTemplateHelper::style($p, 'z-index:1;background-color:#fff;')); ?>">
                <img src="<?php echo e($photo); ?>" alt="" style="width:100%;height:100%;object-fit:cover;border-radius:<?php echo e($p['border_radius'] ?? '0'); ?>;display:block;">
            </div>
        <?php endif; ?>

        <?php if($id_card->student_name == 1 && !empty($positions['front']['student_name'])): ?>
            <?php $f = $positions['front']['student_name']; ?>
            <div style="<?php echo e(IdCardTemplateHelper::style($f, (!empty($f['mask']) ? 'background:'.($f['mask_color'] ?? '#ffffff').';' : '').'z-index:1;display:flex;align-items:center;white-space:nowrap;')); ?>">
                <?php if(!empty($f['show_label'])): ?><strong style="margin-right:4px;"><?php echo e($f['label'] ?? 'Full Name'); ?>:</strong><?php endif; ?><?php echo e($fullName); ?>

            </div>
        <?php endif; ?>

        <?php if($id_card->admission_no == 1 && !empty($positions['front']['admission_no'])): ?>
            <?php $f = $positions['front']['admission_no']; ?>
            <div style="<?php echo e(IdCardTemplateHelper::style($f, (!empty($f['mask']) ? 'background:'.($f['mask_color'] ?? '#ffffff').';' : '').'z-index:1;display:flex;align-items:center;white-space:nowrap;')); ?>">
                <?php if(!empty($f['show_label'])): ?><strong style="margin-right:4px;"><?php echo e($f['label'] ?? 'Admission ID'); ?>:</strong><?php endif; ?><?php echo e($admissionNo); ?>

            </div>
        <?php endif; ?>

        <?php if($id_card->class == 1 && $role_id == 2 && !empty($positions['front']['class'])): ?>
            <?php $f = $positions['front']['class']; ?>
            <div style="<?php echo e(IdCardTemplateHelper::style($f, (!empty($f['mask']) ? 'background:'.($f['mask_color'] ?? '#ffffff').';' : '').'z-index:1;display:flex;align-items:center;white-space:nowrap;')); ?>">
                <?php if(!empty($f['show_label'])): ?><strong style="margin-right:4px;"><?php echo e($f['label'] ?? 'Classification'); ?>:</strong><?php endif; ?><?php echo e($className); ?>

            </div>
        <?php endif; ?>

        <?php if(($id_card->gender ?? 0) == 1 && $role_id == 2 && !empty($positions['front']['gender'])): ?>
            <?php $f = $positions['front']['gender']; ?>
            <div style="<?php echo e(IdCardTemplateHelper::style($f, (!empty($f['mask']) ? 'background:'.($f['mask_color'] ?? '#ffffff').';' : '').'z-index:1;display:flex;align-items:center;white-space:nowrap;')); ?>">
                <?php if(!empty($f['show_label'])): ?><strong style="margin-right:4px;"><?php echo e($f['label'] ?? 'Gender'); ?>:</strong><?php endif; ?><?php echo e($gender); ?>

            </div>
        <?php endif; ?>

        <?php if($id_card->student_address == 1 && !empty($positions['front']['student_address'])): ?>
            <?php $f = $positions['front']['student_address']; ?>
            <div style="<?php echo e(IdCardTemplateHelper::style($f, (!empty($f['mask']) ? 'background:'.($f['mask_color'] ?? '#ffffff').';' : '').'z-index:1;display:flex;align-items:center;')); ?>">
                <?php if(!empty($f['show_label'])): ?><strong style="margin-right:4px;flex-shrink:0;"><?php echo e($f['label'] ?? 'Adress'); ?>:</strong><?php endif; ?>
                <span style="overflow:hidden;text-overflow:ellipsis;"><?php echo e($address); ?></span>
            </div>
        <?php endif; ?>

        <?php if(($id_card->admission_date ?? 0) == 1 && $role_id == 2 && !empty($positions['front']['admission_date'])): ?>
            <?php $f = $positions['front']['admission_date']; ?>
            <div style="<?php echo e(IdCardTemplateHelper::style($f, (!empty($f['mask']) ? 'background:'.($f['mask_color'] ?? '#ffffff').';' : '').'z-index:1;display:flex;align-items:center;white-space:nowrap;')); ?>">
                <?php if(!empty($f['show_label'])): ?><strong style="margin-right:4px;"><?php echo e($f['label'] ?? 'Admission Date'); ?>:</strong><?php endif; ?><?php echo e($admissionDate); ?>

            </div>
        <?php endif; ?>

        <?php if($id_card->admission_no == 1 && !empty($positions['front']['footer_id'])): ?>
            <?php $f = $positions['front']['footer_id']; ?>
            <div style="<?php echo e(IdCardTemplateHelper::style($f, (!empty($f['mask']) ? 'background:'.($f['mask_color'] ?? '#006837').';' : '').'z-index:1;display:flex;align-items:center;justify-content:center;')); ?>">
                FAN <?php echo e($admissionNo); ?>

            </div>
        <?php endif; ?>
    </div>

    
    <div class="id-card-side id-card-back"
         style="width:<?php echo e($width); ?>mm;height:<?php echo e($height); ?>mm;position:relative;overflow:hidden;font-family:<?php echo e($fontFamily); ?>;color:<?php echo e($defaultColor); ?>;margin:0 auto;page-break-after:always;background-color:#fff;">
        <?php if($backBg): ?>
            <img src="<?php echo e($backBg); ?>" alt="" style="position:absolute;left:0;top:0;width:100%;height:100%;object-fit:fill;z-index:0;">
        <?php endif; ?>

        <?php if(($id_card->guardian_name ?? 0) == 1 && $role_id == 2 && !empty($positions['back']['guardian_name'])): ?>
            <?php $f = $positions['back']['guardian_name']; ?>
            <div style="<?php echo e(IdCardTemplateHelper::style($f, (!empty($f['mask']) ? 'background:'.($f['mask_color'] ?? '#ffffff').';' : '').'z-index:1;display:flex;align-items:center;white-space:nowrap;')); ?>">
                <?php if(!empty($f['show_label'])): ?><strong style="margin-right:4px;"><?php echo e($f['label'] ?? 'Guardian Name'); ?>:</strong><?php endif; ?><?php echo e($guardianName); ?>

            </div>
        <?php endif; ?>

        <?php if(($id_card->guardian_phone ?? 0) == 1 && $role_id == 2 && !empty($positions['back']['guardian_phone'])): ?>
            <?php $f = $positions['back']['guardian_phone']; ?>
            <div style="<?php echo e(IdCardTemplateHelper::style($f, (!empty($f['mask']) ? 'background:'.($f['mask_color'] ?? '#ffffff').';' : '').'z-index:1;display:flex;align-items:center;white-space:nowrap;')); ?>">
                <?php if(!empty($f['show_label'])): ?><strong style="margin-right:4px;"><?php echo e($f['label'] ?? 'Guardian Phone'); ?>:</strong><?php endif; ?><?php echo e($guardianPhone); ?>

            </div>
        <?php endif; ?>

        <?php if(($id_card->show_qr ?? 0) == 1 && $role_id == 2 && !empty($positions['back']['qr'])): ?>
            <?php $f = $positions['back']['qr']; ?>
            <div style="<?php echo e(IdCardTemplateHelper::style($f, (!empty($f['mask']) ? 'background:'.($f['mask_color'] ?? '#ffffff').';' : '').'z-index:1;display:flex;align-items:center;justify-content:center;padding:1mm;')); ?>">
                <img src="<?php echo e($qrImg); ?>" alt="QR" style="width:100%;height:100%;object-fit:contain;">
            </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\school-mgt\resources\views/backEnd/admin/idCard/partials/template_card.blade.php ENDPATH**/ ?>

<?php
    use App\Helpers\IdCardTemplateHelper;
    $positions = IdCardTemplateHelper::positions($id_card);
    $fontFamily = $id_card->font_family ?: "'Segoe UI', Arial, sans-serif";
    $defaultColor = $id_card->font_color ?: '#111111';
    $width = !empty($id_card->pl_width) ? $id_card->pl_width : 86;
    $height = !empty($id_card->pl_height) ? $id_card->pl_height : 49;
    $frontBg = IdCardTemplateHelper::bustedAssetUrl(
        $id_card->background_img ?? null,
        'public/uploads/studentIdCard/meahadal_front.png'
    );
    $backBg = IdCardTemplateHelper::bustedAssetUrl(
        $id_card->background_img_back ?? null,
        'public/uploads/studentIdCard/meahadal_back.png'
    );
    $photo = !empty($id_card->profile_image)
        ? IdCardTemplateHelper::bustedAssetUrl($id_card->profile_image)
        : asset('public/uploads/staff/demo/staff.jpg');
    $qrImg = IdCardTemplateHelper::qrDataUri(url('/frontend-single-student-details/1'));

    $sample = [
        'student_name' => 'Umar Ahmad Yusuf',
        'admission_no' => '22',
        'national_id' => '0045678921',
        'class' => 'Primary',
        'gender' => 'Male',
        'student_address' => 'Dire Dawa lagaharre',
        'admission_date' => '2026',
        'guardian_name' => 'Usama Ahmad Yusuf',
        'guardian_phone' => '0904272533',
    ];

    $sideBase = "width:{$width}mm;max-width:100%;aspect-ratio:{$width}/{$height};height:auto;min-height:{$height}mm;position:relative;overflow:hidden;background-color:#fff;background-image:none;font-family:{$fontFamily};color:{$defaultColor};margin:0 auto;box-shadow:0 2px 8px rgba(0,0,0,.12);";
    $bgImgStyle = 'position:absolute;left:0;top:0;width:100%;height:100%;object-fit:fill;z-index:0;pointer-events:none;display:block;';
?>

<div class="id-card-template-preview" style="width:100%;">
    <p class="mb-2 text-center" style="font-size:12px;font-weight:600;color:#555;">Front Side</p>
    <div class="id-card-side id-card-front js-id-card-side"
         data-side="front"
         style="<?php echo e($sideBase); ?>margin-bottom:20px;">
        <img class="js-card-bg" src="<?php echo e($frontBg); ?>" alt="" style="<?php echo e($bgImgStyle); ?>">

        <?php $p = $positions['front']['photo'] ?? []; ?>
        <div class="js-preview-field"
             data-side="front" data-field="photo"
             style="<?php echo e(IdCardTemplateHelper::style($p, 'z-index:1;background-image:url('.$photo.');background-size:cover;background-position:center;background-repeat:no-repeat;background-color:transparent;')); ?>"></div>

        <?php $__currentLoopData = ['student_name' => 'Full Name', 'admission_no' => 'Admission ID', 'class' => 'Classification', 'gender' => 'Gender', 'student_address' => 'Adress', 'admission_date' => 'Admission Date']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $defaultLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $f = $positions['front'][$key] ?? []; ?>
            <div class="js-preview-field"
                 data-side="front" data-field="<?php echo e($key); ?>"
                 style="<?php echo e(IdCardTemplateHelper::style($f, IdCardTemplateHelper::textFieldExtra(false, false, $key !== 'student_address'))); ?>">
                <strong class="js-preview-label" style="margin-right:4px;"><?php echo e($f['label'] ?? $defaultLabel); ?>:</strong>
                <span class="js-preview-value" <?php if($key === 'student_address'): ?> style="overflow:hidden;text-overflow:ellipsis;" <?php endif; ?>><?php echo e($sample[$key]); ?></span>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php
            $f = $positions['front']['footer_id'] ?? [];
            $f['color'] = '#ffffff';
        ?>
        <div class="js-preview-field"
             data-side="front" data-field="footer_id"
             style="<?php echo e(IdCardTemplateHelper::style($f, IdCardTemplateHelper::textFieldExtra(false, true))); ?>">
            <span class="js-preview-value" style="color:#ffffff;"><?php echo e($sample['national_id']); ?></span>
        </div>
    </div>

    <p class="mb-2 text-center" style="font-size:12px;font-weight:600;color:#555;">Back Side</p>
    <div class="id-card-side id-card-back js-id-card-side"
         data-side="back"
         style="<?php echo e($sideBase); ?>">
        <img class="js-card-bg" src="<?php echo e($backBg); ?>" alt="" style="<?php echo e($bgImgStyle); ?>">

        <?php $__currentLoopData = ['guardian_name' => 'Guardian Name', 'guardian_phone' => 'Guardian Phone']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $defaultLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $f = $positions['back'][$key] ?? []; ?>
            <div class="js-preview-field"
                 data-side="back" data-field="<?php echo e($key); ?>"
                 style="<?php echo e(IdCardTemplateHelper::style($f, IdCardTemplateHelper::textFieldExtra())); ?>">
                <strong class="js-preview-label" style="margin-right:4px;"><?php echo e($f['label'] ?? $defaultLabel); ?>:</strong>
                <span class="js-preview-value"><?php echo e($sample[$key]); ?></span>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php $f = $positions['back']['qr'] ?? []; ?>
        <div class="js-preview-field"
             data-side="back" data-field="qr"
             style="<?php echo e(IdCardTemplateHelper::style($f, 'z-index:2;background:transparent;display:flex;align-items:center;justify-content:center;')); ?>">
            <img src="<?php echo e($qrImg); ?>" alt="QR" style="width:100%;height:100%;object-fit:contain;">
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\school-mgt\resources\views/backEnd/admin/idCard/partials/template_preview.blade.php ENDPATH**/ ?>
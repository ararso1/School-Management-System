{{-- Template-mode ID card. Expects: $id_card, $student, $role_id; optional: $forPdf, $side (front|back|both) --}}
@php
    use App\Helpers\IdCardTemplateHelper;
    $forPdf = !empty($forPdf);
    $side = isset($side) ? strtolower((string) $side) : 'both';
    if (!in_array($side, ['front', 'back', 'both'], true)) {
        $side = 'both';
    }
    $showFront = in_array($side, ['front', 'both'], true);
    $showBack = in_array($side, ['back', 'both'], true);
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
    $nationalId = $role_id == 2 ? ($student->national_id_no ?? '') : '';
    $className = $role_id == 2 ? IdCardTemplateHelper::studentCategoryLabel($student) : '';
    $gender = ($role_id == 2 && isset($student->gender)) ? ($student->gender->base_setup_name ?? '') : '';
    $address = $student->current_address ?? '';
    $admissionDate = ($role_id == 2 && !empty($student->admission_date))
        ? dateConvert($student->admission_date)
        : '';
    $guardianName = optional($student->parents)->guardians_name ?? '';
    $guardianPhone = optional($student->parents)->guardians_mobile ?? '';
    $qrUrl = ($role_id == 2) ? IdCardTemplateHelper::profileUrl($student->id) : url('/');
    $qrImg = IdCardTemplateHelper::qrDataUri($qrUrl);

    $box = function (array $pos, string $extra = '') use ($forPdf, $width, $height) {
        return IdCardTemplateHelper::style($pos, $extra, $forPdf, $width, $height);
    };
    $textExtra = function (bool $center = false, bool $nowrap = true) use ($forPdf) {
        return IdCardTemplateHelper::textFieldExtra($forPdf, $center, $nowrap);
    };
@endphp

<div class="id-card-pair" style="break-inside:avoid;page-break-inside:avoid;margin:0 auto {{ $side === 'both' ? '12px' : '0' }};text-align:center;">
    @if($showFront)
    {{-- FRONT --}}
    <div class="id-card-side id-card-front"
         style="width:{{ $width }}mm;height:{{ $height }}mm;position:relative;overflow:hidden;font-family:{{ $fontFamily }};color:{{ $defaultColor }};margin:0 auto {{ $showBack ? '8px' : '0' }};background-color:#fff;background-image:none;">
        @if($frontBg)
            <img class="js-card-bg" src="{{ $frontBg }}" alt="" style="position:absolute;left:0;top:0;width:100%;height:100%;object-fit:fill;z-index:0;display:block;">
        @endif

        @if(!empty($positions['front']['photo']))
            @php $p = $positions['front']['photo']; @endphp
            <div style="{{ $box($p, 'z-index:1;background:transparent;') }}">
                <img src="{{ $photo }}" alt="" style="width:100%;height:100%;object-fit:cover;border-radius:{{ $p['border_radius'] ?? '0' }};display:block;">
            </div>
        @endif

        @if($id_card->student_name == 1 && !empty($positions['front']['student_name']))
            @php $f = $positions['front']['student_name']; @endphp
            <div style="{{ $box($f, $textExtra()) }}">
                @if(!empty($f['show_label']))<strong style="margin-right:2px;">{{ $f['label'] ?? 'Full Name' }}:</strong>@endif<span style="white-space:nowrap;">{{ $fullName }}</span>
            </div>
        @endif

        @if($id_card->admission_no == 1 && !empty($positions['front']['admission_no']))
            @php $f = $positions['front']['admission_no']; @endphp
            <div style="{{ $box($f, $textExtra()) }}">
                @if(!empty($f['show_label']))<strong style="margin-right:2px;">{{ $f['label'] ?? 'Admission ID' }}:</strong>@endif<span style="white-space:nowrap;">{{ $admissionNo }}</span>
            </div>
        @endif

        @if($id_card->class == 1 && $role_id == 2 && !empty($positions['front']['class']))
            @php $f = $positions['front']['class']; @endphp
            <div style="{{ $box($f, $textExtra()) }}">
                @if(!empty($f['show_label']))<strong style="margin-right:2px;">{{ $f['label'] ?? 'Classification' }}:</strong>@endif<span style="white-space:nowrap;">{{ $className }}</span>
            </div>
        @endif

        @if(($id_card->gender ?? 0) == 1 && $role_id == 2 && !empty($positions['front']['gender']))
            @php $f = $positions['front']['gender']; @endphp
            <div style="{{ $box($f, $textExtra()) }}">
                @if(!empty($f['show_label']))<strong style="margin-right:2px;">{{ $f['label'] ?? 'Gender' }}:</strong>@endif<span style="white-space:nowrap;">{{ $gender }}</span>
            </div>
        @endif

        @if($id_card->student_address == 1 && !empty($positions['front']['student_address']))
            @php $f = $positions['front']['student_address']; @endphp
            <div style="{{ $box($f, $textExtra(false, false)) }}">
                @if(!empty($f['show_label']))<strong style="margin-right:2px;">{{ $f['label'] ?? 'Adress' }}:</strong>@endif<span>{{ $address }}</span>
            </div>
        @endif

        @if(($id_card->admission_date ?? 0) == 1 && $role_id == 2 && !empty($positions['front']['admission_date']))
            @php $f = $positions['front']['admission_date']; @endphp
            <div style="{{ $box($f, $textExtra()) }}">
                @if(!empty($f['show_label']))<strong style="margin-right:2px;">{{ $f['label'] ?? 'Admission Date' }}:</strong>@endif<span style="white-space:nowrap;">{{ $admissionDate }}</span>
            </div>
        @endif

        @if($role_id == 2 && !empty($positions['front']['footer_id']))
            @php
                $f = $positions['front']['footer_id'];
                $f['color'] = '#ffffff';
            @endphp
            <div style="{{ $box($f, $textExtra(true)) }}">
                <span style="color:#ffffff;white-space:nowrap;">{{ $nationalId }}</span>
            </div>
        @endif
    </div>
    @endif

    @if($showBack)
    {{-- BACK --}}
    <div class="id-card-side id-card-back"
         style="width:{{ $width }}mm;height:{{ $height }}mm;position:relative;overflow:hidden;font-family:{{ $fontFamily }};color:{{ $defaultColor }};margin:0 auto;{{ $side === 'both' ? 'page-break-after:always;' : '' }}background-color:#fff;background-image:none;">
        @if($backBg)
            <img class="js-card-bg" src="{{ $backBg }}" alt="" style="position:absolute;left:0;top:0;width:100%;height:100%;object-fit:fill;z-index:0;display:block;">
        @endif

        @if(($id_card->guardian_name ?? 0) == 1 && $role_id == 2 && !empty($positions['back']['guardian_name']))
            @php $f = $positions['back']['guardian_name']; @endphp
            <div style="{{ $box($f, $textExtra()) }}">
                @if(!empty($f['show_label']))<strong style="margin-right:2px;">{{ $f['label'] ?? 'Guardian Name' }}:</strong>@endif<span style="white-space:nowrap;">{{ $guardianName }}</span>
            </div>
        @endif

        @if(($id_card->guardian_phone ?? 0) == 1 && $role_id == 2 && !empty($positions['back']['guardian_phone']))
            @php $f = $positions['back']['guardian_phone']; @endphp
            <div style="{{ $box($f, $textExtra()) }}">
                @if(!empty($f['show_label']))<strong style="margin-right:2px;">{{ $f['label'] ?? 'Guardian Phone' }}:</strong>@endif<span style="white-space:nowrap;">{{ $guardianPhone }}</span>
            </div>
        @endif

        @if(($id_card->show_qr ?? 0) == 1 && $role_id == 2 && !empty($positions['back']['qr']))
            @php $f = $positions['back']['qr']; @endphp
            <div style="{{ $box($f, 'z-index:2;background:transparent;text-align:center;') }}">
                <img src="{{ $qrImg }}" alt="QR" style="width:100%;height:100%;object-fit:contain;display:block;">
            </div>
        @endif
    </div>
    @endif
</div>

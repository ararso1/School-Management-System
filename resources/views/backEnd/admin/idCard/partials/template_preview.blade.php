{{-- Admin preview for template-mode ID cards (front + back). Expects: $id_card --}}
@php
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
@endphp

<div class="id-card-template-preview" style="width:100%;">
    <p class="mb-2 text-center" style="font-size:12px;font-weight:600;color:#555;">Front Side</p>
    <div class="id-card-side id-card-front js-id-card-side"
         data-side="front"
         style="{{ $sideBase }}margin-bottom:20px;">
        <img class="js-card-bg" src="{{ $frontBg }}" alt="" style="{{ $bgImgStyle }}">

        @php $p = $positions['front']['photo'] ?? []; @endphp
        <div class="js-preview-field"
             data-side="front" data-field="photo"
             style="{{ IdCardTemplateHelper::style($p, 'z-index:1;background-image:url('.$photo.');background-size:cover;background-position:center;background-repeat:no-repeat;background-color:transparent;') }}"></div>

        @foreach(['student_name' => 'Full Name', 'admission_no' => 'Admission ID', 'class' => 'Classification', 'gender' => 'Gender', 'student_address' => 'Adress', 'admission_date' => 'Admission Date'] as $key => $defaultLabel)
            @php $f = $positions['front'][$key] ?? []; @endphp
            <div class="js-preview-field"
                 data-side="front" data-field="{{ $key }}"
                 style="{{ IdCardTemplateHelper::style($f, IdCardTemplateHelper::textFieldExtra(false, false, $key !== 'student_address')) }}">
                <strong class="js-preview-label" style="margin-right:4px;">{{ $f['label'] ?? $defaultLabel }}:</strong>
                <span class="js-preview-value" @if($key === 'student_address') style="overflow:hidden;text-overflow:ellipsis;" @endif>{{ $sample[$key] }}</span>
            </div>
        @endforeach

        @php
            $f = $positions['front']['footer_id'] ?? [];
            $f['color'] = '#ffffff';
        @endphp
        <div class="js-preview-field"
             data-side="front" data-field="footer_id"
             style="{{ IdCardTemplateHelper::style($f, IdCardTemplateHelper::textFieldExtra(false, true)) }}">
            <span class="js-preview-value" style="color:#ffffff;">{{ $sample['national_id'] }}</span>
        </div>
    </div>

    <p class="mb-2 text-center" style="font-size:12px;font-weight:600;color:#555;">Back Side</p>
    <div class="id-card-side id-card-back js-id-card-side"
         data-side="back"
         style="{{ $sideBase }}">
        <img class="js-card-bg" src="{{ $backBg }}" alt="" style="{{ $bgImgStyle }}">

        @foreach(['guardian_name' => 'Guardian Name', 'guardian_phone' => 'Guardian Phone'] as $key => $defaultLabel)
            @php $f = $positions['back'][$key] ?? []; @endphp
            <div class="js-preview-field"
                 data-side="back" data-field="{{ $key }}"
                 style="{{ IdCardTemplateHelper::style($f, IdCardTemplateHelper::textFieldExtra()) }}">
                <strong class="js-preview-label" style="margin-right:4px;">{{ $f['label'] ?? $defaultLabel }}:</strong>
                <span class="js-preview-value">{{ $sample[$key] }}</span>
            </div>
        @endforeach

        @php $f = $positions['back']['qr'] ?? []; @endphp
        <div class="js-preview-field"
             data-side="back" data-field="qr"
             style="{{ IdCardTemplateHelper::style($f, 'z-index:2;background:transparent;display:flex;align-items:center;justify-content:center;') }}">
            <img src="{{ $qrImg }}" alt="QR" style="width:100%;height:100%;object-fit:contain;">
        </div>
    </div>
</div>

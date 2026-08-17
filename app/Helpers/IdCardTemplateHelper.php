<?php

namespace App\Helpers;

use App\SmStudentIdCard;
use Illuminate\Support\Facades\Storage;

class IdCardTemplateHelper
{
    public static function defaultPositions(): array
    {
        return [
            'front' => [
                'photo' => [
                    'left' => 7.2,
                    'top' => 27.5,
                    'width' => 19.5,
                    'height' => 34,
                    'border_radius' => '50%',
                    'border' => '2px solid #e91e8c',
                ],
                'student_name' => [
                    'left' => 40,
                    'top' => 27,
                    'width' => 52,
                    'height' => 6.5,
                    'font_size' => 2.7,
                    'font_weight' => '600',
                    'color' => '#111111',
                    'show_label' => 1,
                    'label' => 'Full Name',
                    'mask' => 0,
                ],
                'admission_no' => [
                    'left' => 40,
                    'top' => 34,
                    'width' => 52,
                    'height' => 6.5,
                    'font_size' => 2.5,
                    'font_weight' => '500',
                    'color' => '#111111',
                    'show_label' => 1,
                    'label' => 'Admission ID',
                    'mask' => 0,
                ],
                'class' => [
                    'left' => 40,
                    'top' => 41,
                    'width' => 52,
                    'height' => 6.5,
                    'font_size' => 2.5,
                    'font_weight' => '500',
                    'color' => '#111111',
                    'show_label' => 1,
                    'label' => 'Classification',
                    'mask' => 0,
                ],
                'gender' => [
                    'left' => 40,
                    'top' => 48,
                    'width' => 52,
                    'height' => 6.5,
                    'font_size' => 2.5,
                    'font_weight' => '500',
                    'color' => '#111111',
                    'show_label' => 1,
                    'label' => 'Gender',
                    'mask' => 0,
                ],
                'student_address' => [
                    'left' => 40,
                    'top' => 55,
                    'width' => 52,
                    'height' => 6.5,
                    'font_size' => 2.5,
                    'font_weight' => '500',
                    'color' => '#111111',
                    'show_label' => 1,
                    'label' => 'Adress',
                    'mask' => 0,
                ],
                'admission_date' => [
                    'left' => 40,
                    'top' => 62,
                    'width' => 52,
                    'height' => 6.5,
                    'font_size' => 2.5,
                    'font_weight' => '500',
                    'color' => '#111111',
                    'show_label' => 1,
                    'label' => 'Admission Date',
                    'mask' => 0,
                ],
                'footer_id' => [
                    'left' => 48,
                    'top' => 82,
                    'width' => 45,
                    'height' => 12,
                    'font_size' => 2.2,
                    'font_weight' => '600',
                    'color' => '#ffffff',
                    'show_label' => 0,
                    'label' => 'National ID',
                    'mask' => 0,
                    'mask_color' => 'transparent',
                ],
            ],
            'back' => [
                'guardian_name' => [
                    'left' => 4,
                    'top' => 8,
                    'width' => 55,
                    'height' => 7,
                    'font_size' => 2.6,
                    'font_weight' => '500',
                    'color' => '#111111',
                    'show_label' => 1,
                    'label' => 'Guardian Name',
                    'mask' => 0,
                ],
                'guardian_phone' => [
                    'left' => 4,
                    'top' => 15.5,
                    'width' => 55,
                    'height' => 7,
                    'font_size' => 2.6,
                    'font_weight' => '500',
                    'color' => '#111111',
                    'show_label' => 1,
                    'label' => 'Guardian Phone',
                    'mask' => 0,
                ],
                'qr' => [
                    'left' => 6.5,
                    'top' => 32,
                    'width' => 24,
                    'height' => 42,
                    'mask' => 0,
                    'mask_color' => 'transparent',
                ],
            ],
        ];
    }

    public static function positions($idCard = null): array
    {
        $defaults = self::defaultPositions();
        if (!$idCard || empty($idCard->field_positions ?? null)) {
            return $defaults;
        }

        $saved = is_array($idCard->field_positions)
            ? $idCard->field_positions
            : json_decode($idCard->field_positions, true);
        if (!is_array($saved)) {
            return $defaults;
        }

        $merged = array_replace_recursive($defaults, $saved);

        // Never paint white/colored masks behind dynamic text fields.
        foreach (['front', 'back'] as $side) {
            if (empty($merged[$side]) || !is_array($merged[$side])) {
                continue;
            }
            foreach ($merged[$side] as $field => &$cfg) {
                if (!is_array($cfg) || $field === 'photo') {
                    continue;
                }
                $cfg['mask'] = 0;
                $cfg['mask_color'] = 'transparent';
            }
            unset($cfg);
        }

        // National ID: plain white text, no background.
        if (isset($merged['front']['footer_id']) && is_array($merged['front']['footer_id'])) {
            $merged['front']['footer_id']['mask'] = 0;
            $merged['front']['footer_id']['mask_color'] = 'transparent';
            $merged['front']['footer_id']['show_label'] = 0;
            $merged['front']['footer_id']['color'] = '#ffffff';
            if (empty($merged['front']['footer_id']['label']) || strcasecmp((string) $merged['front']['footer_id']['label'], 'FAN') === 0) {
                $merged['front']['footer_id']['label'] = 'National ID';
            }
        }

        return $merged;
    }

    /**
     * Build absolute field box CSS. PDF uses mm so DomPDF keeps fixed positions
     * regardless of value length (flex/% is unreliable in DomPDF).
     */
    public static function style(array $pos, string $extra = '', bool $forPdf = false, $cardWidthMm = 86, $cardHeightMm = 49): string
    {
        $left = (float) ($pos['left'] ?? 0);
        $top = (float) ($pos['top'] ?? 0);
        $width = (float) ($pos['width'] ?? 20);
        $height = (float) ($pos['height'] ?? 6);
        $fontSize = $pos['font_size'] ?? 2.5;
        $fontWeight = $pos['font_weight'] ?? '500';
        $color = $pos['color'] ?? '#111111';
        $radius = $pos['border_radius'] ?? '0';
        $border = $pos['border'] ?? 'none';
        $cardWidthMm = (float) ($cardWidthMm ?: 86);
        $cardHeightMm = (float) ($cardHeightMm ?: 49);

        if ($forPdf) {
            $l = round($cardWidthMm * $left / 100, 3) . 'mm';
            $t = round($cardHeightMm * $top / 100, 3) . 'mm';
            $w = round($cardWidthMm * $width / 100, 3) . 'mm';
            $hMm = round($cardHeightMm * $height / 100, 3);
            $h = $hMm . 'mm';
            $lineHeight = $hMm . 'mm';
        } else {
            $l = $left . '%';
            $t = $top . '%';
            $w = $width . '%';
            $h = $height . '%';
            $lineHeight = '100%';
        }

        return "position:absolute;left:{$l};top:{$t};width:{$w};height:{$h};"
            . "font-size:{$fontSize}mm;font-weight:{$fontWeight};color:{$color};"
            . "border-radius:{$radius};border:{$border};overflow:hidden;box-sizing:border-box;"
            . "background:transparent;background-color:transparent;padding:0;margin:0;"
            . ($forPdf ? "line-height:{$lineHeight};" : '')
            . $extra;
    }

    /** Extra CSS for a text field box (preview uses flex; PDF avoids flex). */
    public static function textFieldExtra(bool $forPdf = false, bool $center = false, bool $nowrap = true): string
    {
        $extra = 'z-index:2;';
        if ($forPdf) {
            $extra .= 'display:block;';
            if ($center) {
                $extra .= 'text-align:center;';
            }
            if ($nowrap) {
                $extra .= 'white-space:nowrap;';
            }
            return $extra;
        }

        $extra .= 'display:flex;align-items:center;';
        if ($center) {
            $extra .= 'justify-content:center;';
        }
        if ($nowrap) {
            $extra .= 'white-space:nowrap;';
        }
        return $extra;
    }

    public static function profileUrl($studentId): string
    {
        return url('/frontend-single-student-details/' . $studentId);
    }

    public static function qrDataUri(string $url, int $size = 220): string
    {
        try {
            if (class_exists(\BaconQrCode\Writer::class)) {
                $renderer = new \BaconQrCode\Renderer\ImageRenderer(
                    new \BaconQrCode\Renderer\RendererStyle\RendererStyle($size, 1),
                    new \BaconQrCode\Renderer\Image\ImagickImageBackEnd()
                );
                $writer = new \BaconQrCode\Writer($renderer);
                $png = $writer->writeString($url);
                return 'data:image/png;base64,' . base64_encode($png);
            }
        } catch (\Throwable $e) {
            // try GD backend / facade / remote fallback
        }

        try {
            if (class_exists(\BaconQrCode\Writer::class) && class_exists(\BaconQrCode\Renderer\Image\SvgImageBackEnd::class)) {
                $renderer = new \BaconQrCode\Renderer\ImageRenderer(
                    new \BaconQrCode\Renderer\RendererStyle\RendererStyle($size, 1),
                    new \BaconQrCode\Renderer\Image\SvgImageBackEnd()
                );
                $writer = new \BaconQrCode\Writer($renderer);
                $svg = $writer->writeString($url);
                return 'data:image/svg+xml;base64,' . base64_encode($svg);
            }
        } catch (\Throwable $e) {
            // fall through
        }

        try {
            if (class_exists(\SimpleSoftwareIO\QrCode\Facades\QrCode::class)) {
                $png = \SimpleSoftwareIO\QrCode\Facades\QrCode::format('png')
                    ->size($size)
                    ->margin(1)
                    ->generate($url);

                return 'data:image/png;base64,' . base64_encode($png);
            }
        } catch (\Throwable $e) {
            // fall through
        }

        return 'https://api.qrserver.com/v1/create-qr-code/?size=' . $size . 'x' . $size . '&data=' . urlencode($url);
    }

    public static function studentClassLabel($student): string
    {
        if (!$student) {
            return '';
        }

        $labels = [];
        if (method_exists($student, 'getClassRecord') || isset($student->getClassRecord)) {
            foreach ($student->getClassRecord as $record) {
                $class = optional($record->class)->class_name;
                $section = optional($record->section)->section_name;
                if ($class) {
                    $labels[] = $section ? "{$class} ({$section})" : $class;
                }
            }
        }

        if (empty($labels) && isset($student->studentRecords)) {
            foreach ($student->studentRecords as $record) {
                $class = optional($record->class)->class_name;
                $section = optional($record->section)->section_name;
                if ($class) {
                    $labels[] = $section ? "{$class} ({$section})" : $class;
                }
            }
        }

        return implode(', ', array_unique($labels));
    }

    /** Category name for ID card Classification field. */
    public static function studentCategoryLabel($student): string
    {
        if (!$student) {
            return '';
        }

        $category = null;
        if (isset($student->category) && $student->category) {
            $category = $student->category;
        } elseif (!empty($student->student_category_id)) {
            $category = \App\SmStudentCategory::find($student->student_category_id);
        }

        return $category->category_name ?? '';
    }

    public static function mergePositionsFromRequest(array $requestPositions = []): string
    {
        $positions = self::defaultPositions();
        foreach (['front', 'back'] as $side) {
            if (!isset($requestPositions[$side]) || !is_array($requestPositions[$side])) {
                continue;
            }
            foreach ($requestPositions[$side] as $field => $values) {
                if (!is_array($values)) {
                    continue;
                }
                foreach ($values as $key => $value) {
                    if ($value === null || $value === '') {
                        continue;
                    }
                    if (in_array($key, ['left', 'top', 'width', 'height', 'font_size'], true)) {
                        $positions[$side][$field][$key] = (float) $value;
                    } elseif (in_array($key, ['show_label', 'mask'], true)) {
                        $positions[$side][$field][$key] = (int) $value;
                    } else {
                        $positions[$side][$field][$key] = $value;
                    }
                }
            }
        }

        foreach (['front', 'back'] as $side) {
            if (empty($positions[$side]) || !is_array($positions[$side])) {
                continue;
            }
            foreach ($positions[$side] as $field => &$cfg) {
                if (!is_array($cfg) || $field === 'photo') {
                    continue;
                }
                $cfg['mask'] = 0;
                $cfg['mask_color'] = 'transparent';
            }
            unset($cfg);
        }
        if (isset($positions['front']['footer_id']) && is_array($positions['front']['footer_id'])) {
            $positions['front']['footer_id']['color'] = '#ffffff';
            $positions['front']['footer_id']['show_label'] = 0;
        }

        return json_encode($positions);
    }

    public static function absolutePath(?string $relative): ?string
    {
        if (!$relative) {
            return null;
        }

        if (strpos($relative, 'data:') === 0 || preg_match('#^https?://#i', $relative)) {
            return null;
        }

        $relative = ltrim(str_replace('\\', '/', $relative), '/');
        $candidates = [
            base_path($relative),
            public_path(preg_replace('#^public/#', '', $relative)),
            public_path($relative),
        ];

        foreach ($candidates as $candidate) {
            if (is_file($candidate)) {
                return $candidate;
            }
        }

        return null;
    }

    /**
     * Upload a new asset and delete the previous file so backgrounds never stack.
     */
    public static function replaceUploadedAsset(?string $existingRelative, $file, string $destination): string
    {
        if (!$file) {
            return $existingRelative ?: '';
        }

        $newPath = fileUpload($file, $destination);
        if (!$newPath) {
            return $existingRelative ?: '';
        }

        if ($existingRelative && $existingRelative !== $newPath) {
            self::deleteAssetFile($existingRelative);
        }

        return $newPath;
    }

    public static function deleteAssetFile(?string $relative): void
    {
        if (!$relative) {
            return;
        }

        $normalized = ltrim(str_replace('\\', '/', $relative), '/');
        $protected = [
            'public/uploads/studentIdCard/meahadal_front.png',
            'public/uploads/studentIdCard/meahadal_back.png',
            'public/backEnd/id_card/img/vertical_bg.png',
            'public/backEnd/id_card/img/horizontal_bg.png',
            'public/backEnd/id_card/img/thumb.png',
        ];
        if (in_array($normalized, $protected, true)) {
            return;
        }

        $abs = self::absolutePath($relative);
        if ($abs && is_file($abs)) {
            @unlink($abs);
        }
    }

    public static function bustedAssetUrl(?string $relative, ?string $fallback = null): string
    {
        $path = $relative ?: $fallback;
        if (!$path) {
            return '';
        }

        $url = self::imageSrc($path, false, $fallback);
        $abs = self::absolutePath($path);
        if ($abs) {
            $url .= (strpos($url, '?') === false ? '?' : '&') . 'v=' . filemtime($abs);
        }

        return $url;
    }

    public static function imageSrc(?string $relative, bool $forPdf = false, ?string $fallback = null): string
    {
        $path = $relative ?: $fallback;
        if (!$path) {
            return '';
        }

        if (strpos($path, 'data:') === 0) {
            return $path;
        }

        if ($forPdf) {
            $abs = self::absolutePath($path);
            if ($abs) {
                $mime = @mime_content_type($abs) ?: 'image/png';
                return 'data:' . $mime . ';base64,' . base64_encode(file_get_contents($abs));
            }

            if (preg_match('#^https?://#i', $path)) {
                return $path;
            }

            if ($fallback && $fallback !== $path) {
                return self::imageSrc($fallback, true);
            }

            return '';
        }

        if (preg_match('#^https?://#i', $path)) {
            return $path;
        }

        return asset($path);
    }

    public static function cardsForRole(int $roleId = 2)
    {
        return SmStudentIdCard::status()->get()->filter(function ($card) use ($roleId) {
            $roles = json_decode($card->role_id, true);
            return is_array($roles) && in_array($roleId, $roles);
        })->values();
    }

    public static function defaultCardForStudent(int $roleId = 2): ?SmStudentIdCard
    {
        $cards = self::cardsForRole($roleId);
        $template = $cards->first(function ($card) {
            return ($card->design_mode ?? 'classic') === 'template';
        });

        return $template ?: $cards->first();
    }
}

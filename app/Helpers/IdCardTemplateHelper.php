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
                    'mask' => 1,
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
                    'mask' => 1,
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
                    'mask' => 1,
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
                    'mask' => 1,
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
                    'mask' => 1,
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
                    'mask' => 1,
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
                    'label' => '',
                    'mask' => 1,
                    'mask_color' => '#006837',
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
                    'mask' => 1,
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
                    'mask' => 1,
                ],
                'qr' => [
                    'left' => 6.5,
                    'top' => 32,
                    'width' => 24,
                    'height' => 42,
                    'mask' => 1,
                    'mask_color' => '#ffffff',
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

        return array_replace_recursive($defaults, $saved);
    }

    public static function style(array $pos, string $extra = ''): string
    {
        $left = $pos['left'] ?? 0;
        $top = $pos['top'] ?? 0;
        $width = $pos['width'] ?? 20;
        $height = $pos['height'] ?? 6;
        $fontSize = $pos['font_size'] ?? 2.5;
        $fontWeight = $pos['font_weight'] ?? '500';
        $color = $pos['color'] ?? '#111111';
        $radius = $pos['border_radius'] ?? '0';
        $border = $pos['border'] ?? 'none';

        return "position:absolute;left:{$left}%;top:{$top}%;width:{$width}%;height:{$height}%;"
            . "font-size:{$fontSize}mm;font-weight:{$fontWeight};color:{$color};"
            . "border-radius:{$radius};border:{$border};overflow:hidden;box-sizing:border-box;{$extra}";
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

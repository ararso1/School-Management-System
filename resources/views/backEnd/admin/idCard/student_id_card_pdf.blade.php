<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{ $id_card->title ?? 'Student ID Cards' }}{{ isset($side) && $side !== 'both' ? ' - ' . ucfirst($side) : '' }}</title>
    <style>
        @page { margin: {{ isset($side) && in_array($side, ['front', 'back'], true) ? '0' : '8mm' }}; }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            padding: 0;
            font-family: DejaVu Sans, Arial, sans-serif;
            color: #111;
            background: #fff;
        }
        .id-card-pair {
            page-break-inside: avoid;
            margin: 0 auto {{ isset($side) && in_array($side, ['front', 'back'], true) ? '0' : '6mm' }};
            text-align: center;
        }
        .id-card-side {
            position: relative !important;
            overflow: hidden !important;
            margin: 0 auto {{ isset($side) && in_array($side, ['front', 'back'], true) ? '0' : '4mm' }};
            background: #fff;
        }
        .id-card-side > div {
            position: absolute !important;
        }
        .id-card-back {
            page-break-after: {{ isset($side) && $side === 'both' ? 'always' : 'auto' }};
        }
        img { border: 0; display: block; }
    </style>
</head>
<body>
@php $exportSide = isset($side) ? $side : 'both'; @endphp
@foreach($s_students as $staff_student)
    @if(($id_card->design_mode ?? 'classic') === 'template' && (int) $role_id === 2)
        @include('backEnd.admin.idCard.partials.template_card', [
            'id_card' => $id_card,
            'student' => $staff_student,
            'role_id' => $role_id,
            'forPdf' => true,
            'side' => $exportSide,
        ])
    @else
        <div style="page-break-after:always;padding:10mm;font-family:DejaVu Sans, Arial, sans-serif;">
            <h3 style="margin:0 0 8px;">{{ $staff_student->full_name ?? ($staff_student->full_name ?? '') }}</h3>
            <p style="margin:0;">ID: {{ $role_id == 2 ? ($staff_student->admission_no ?? '') : ($staff_student->staff_no ?? '') }}</p>
            <p style="margin:8px 0 0;color:#666;font-size:12px;">
                Classic layout cards are best printed from the browser preview. Switch to a Template-mode ID card for PDF export of front/back designs.
            </p>
        </div>
    @endif
@endforeach
</body>
</html>

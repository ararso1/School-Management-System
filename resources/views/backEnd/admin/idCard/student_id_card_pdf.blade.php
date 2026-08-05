<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{ $id_card->title ?? 'Student ID Cards' }}</title>
    <style>
        @page { margin: 8mm; }
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
            margin: 0 auto 6mm;
            text-align: center;
        }
        .id-card-side {
            position: relative;
            overflow: hidden;
            margin: 0 auto 4mm;
            background: #fff;
        }
        .id-card-back {
            page-break-after: always;
        }
        img { border: 0; }
    </style>
</head>
<body>
@foreach($s_students as $staff_student)
    @if(($id_card->design_mode ?? 'classic') === 'template' && (int) $role_id === 2)
        @include('backEnd.admin.idCard.partials.template_card', [
            'id_card' => $id_card,
            'student' => $staff_student,
            'role_id' => $role_id,
            'forPdf' => true,
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

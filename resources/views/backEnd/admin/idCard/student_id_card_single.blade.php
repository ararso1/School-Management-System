<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ ($student->full_name ?? 'Student') }} - ID Card</title>
    <link rel="stylesheet" href="{{ asset('public/backEnd/') }}/vendors/css/bootstrap.css" />
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
        <form method="GET" action="{{ route('student_id_card_view', $student->id) }}" class="actions">
            <label for="id_card" style="margin:0;font-weight:600;">ID Card Template</label>
            <select name="id_card" id="id_card" onchange="this.form.submit()">
                @foreach($id_cards as $card)
                    <option value="{{ $card->id }}" {{ (int) $id_card->id === (int) $card->id ? 'selected' : '' }}>
                        {{ $card->title }}{{ ($card->design_mode ?? '') === 'template' ? ' (Template)' : '' }}
                    </option>
                @endforeach
            </select>
        </form>
        <div class="actions">
            <button type="button" class="primary-btn" onclick="window.print()">Print</button>
            <a class="primary-btn outline" href="{{ route('student_id_card_download', [$student->id]) }}?id_card={{ $id_card->id }}">Download PDF</a>
            <a class="primary-btn outline" href="{{ route('student_view', $student->id) }}">Back to Profile</a>
        </div>
    </div>

    <div class="preview-wrap" id="id_card_preview">
        @if(($id_card->design_mode ?? 'classic') === 'template')
            @include('backEnd.admin.idCard.partials.template_card', [
                'id_card' => $id_card,
                'student' => $student,
                'role_id' => 2,
                'forPdf' => false,
            ])
        @else
            @php
                $photo = !empty($student->student_photo)
                    ? asset($student->student_photo)
                    : asset('public/backEnd/img/student/id-card-img.jpg');
            @endphp
            <div class="classic-card">
                <div class="head">{{ $id_card->title ?? 'Student ID Card' }}</div>
                <img class="photo" src="{{ $photo }}" alt="{{ $student->full_name }}">
                <table>
                    @if($id_card->student_name == 1)
                        <tr><td align="left">Name</td><td align="right">{{ $student->full_name }}</td></tr>
                    @endif
                    @if($id_card->admission_no == 1)
                        <tr><td align="left">Admission No</td><td align="right">{{ $student->admission_no }}</td></tr>
                    @endif
                    @if($id_card->class == 1)
                        <tr><td align="left">Class</td><td align="right">{{ \App\Helpers\IdCardTemplateHelper::studentClassLabel($student) }}</td></tr>
                    @endif
                    @if(($id_card->gender ?? 0) == 1)
                        <tr><td align="left">Gender</td><td align="right">{{ optional($student->gender)->base_setup_name }}</td></tr>
                    @endif
                    @if($id_card->student_address == 1)
                        <tr><td align="left">Address</td><td align="right">{{ $student->current_address }}</td></tr>
                    @endif
                </table>
            </div>
        @endif
    </div>

    @if(!empty($autoPrint))
        <script>window.addEventListener('load', function () { window.print(); });</script>
    @endif
</body>
</html>

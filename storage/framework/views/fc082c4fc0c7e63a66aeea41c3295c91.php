<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo app('translator')->get('exam.marksheet_report'); ?></title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        body{
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            margin: 0;
            padding: 0;
            -webkit-print-color-adjust: exact !important;
            color-adjust: exact;
        }
        table {
            border-collapse: collapse;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            color: #00273d;
        }
        .invoice_wrapper{
            max-width: 100%;
            margin: auto;
            background: #fff;
            padding: 20px;
        }
        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
        }
        .border_none{
            border: 0px solid transparent;
            border-top: 0px solid transparent !important;
        }
        .invoice_part_iner{
            background-color: #fff;
        }
        .invoice_part_iner h4{
            font-size: 30px;
            font-weight: 500;
            margin-bottom: 40px;

        }
        .invoice_part_iner h3{
            font-size:25px;
            font-weight: 500;
            margin-bottom: 5px;

        }
        .table_border thead{
            background-color: #F6F8FA;
        }
        .table td, .table th {
            padding: 5px 0;
            vertical-align: top;
            border-top: 0 solid transparent;
            color: #79838b;
        }
        .table td , .table th {
            padding: 5px 0;
            vertical-align: top;
            border-top: 0 solid transparent;
            color: #79838b;
        }
        .table_border tr{
            border-bottom: 1px solid #dee2e6  !important;
        }
        th p span, td p span{
            color: #212E40;
        }
        .table th {
            color: #00273d;
            font-weight: 300;
            border-bottom: 1px solid #dee2e6  !important;
            background-color: #fafafa;
        }
        p{
            font-size: 14px;
        }
        h5{
            font-size: 12px;
            font-weight: 500;
        }
        h6{
            font-size: 10px;
            font-weight: 300;
        }
        .mt_40{
            margin-top: 40px;
        }
        .table_style th, .table_style td{
            padding: 20px;
        }
        .invoice_info_table td{
            font-size: 10px;
            padding: 0px;
        }
        .invoice_info_table td h6{
            color: #6D6D6D;
            font-weight: 400;
        }

        .text_right{
            text-align: right;
        }
        .virtical_middle{
            vertical-align: middle !important;
        }
        .thumb_logo {
            max-width: 120px;
        }
        .thumb_logo img{
            width: 100%;
        }
        .line_grid{
            display: flex;
            grid-gap: 10px;
        }
        .line_grid span{
            display: flex;
            align-items: center;
            white-space: nowrap;
        }
        .line_grid span:first-child{
            font-weight: 600;
            color: #79838b;
        }
        p{
            margin: 0;
        }
        .font_18 {
            font-size: 18px;
        }
        .mb-0{
            margin-bottom: 0;
        }
        .mb_30{
            margin-bottom: 30px !important;
        }
        .border_table thead tr th {
            padding: 12px 10px;
        }
        .border_table tbody tr td {
            text-align: center !important;
            color: #828bb2;
            padding: 8px 8px;
            font-weight: 400;
            background-color: #fff;
        }
        .logo_img{
            display: flex;
            align-items: center;
            background: url(<?php echo e(asset('public/backEnd/img/report-admit-bg.png')); ?>) no-repeat center;
            background-size: auto;
            background-size: cover;
            border-radius: 5px 5px 0px 0px;
            border: 0;
            padding: 20px;
            background-repeat: no-repeat;
            background-position: center center;
        }
        .logo_img h3{
            font-size: 25px;
            margin-bottom: 16px;
            color: #fff;
        }
        .logo_img h5{
            font-size: 14px;
            margin-bottom: 9px;
            color: #fff;
        }
        .company_info{
            margin-left: 20px;
        }

        .company_info {
            margin-left: 20px;
            flex: 1 1 auto;
            text-align: right;
        }

        .table_title{
            text-align: center;
        }
        .table_title h3{
            font-size: 16px;
            text-transform: uppercase;
            margin-top: 15px;
            font-weight: 500;
            display: block;
            border-bottom: 0;
            padding-bottom: 7px;
        }

        .gray_header_table{
            /* border: 1px solid var(--border_color); */
        }

        .max-width-400{
            width: 400px;
        }
        .max-width-500{
            width: 500px;
        }
        .ml_auto{
            margin-left: auto;
            margin-right: 0;
        }
        .mr_auto{
            margin-left: 0;
            margin-right: auto;
        }
        .margin-auto{
            margin: auto;
        }

        .thumb.text-right {
            text-align: right;
        }
        .profile_thumb {
            flex-grow: 1;
            text-align: right;
        }
        .line_grid .student_name{
            font-weight: 500;
            font-size: 14px;
            color: var(--base_color);
        }
        .line_grid span {
            display: flex;
            align-items: center;
            flex: 120px 0 0;
        }
        .line_grid.line_grid2 span {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex: 60px 0 0;
        }
        .student_name_highlight{
            font-weight: 500;
            color: var(--base_color);
            line-height: 1.5;
            font-size: 20px;
            text-transform: uppercase;

        }
        .report_table th {
            border: 1px solid #dee2e6;
            color: var(--base_color);
            font-weight: 500;
            text-transform: uppercase;
            vertical-align: middle;
            font-size: 12px;
        }
        .report_table th, .report_table td{
            background: transparent !important;
        }
        .tabu_table.border_table tr td,
        .tabu_table.border_table tr th{
            padding: 5px;
            font-size: 10px;
        }
        .tabu_table.border_table tr th{
            background: transparent !important;
        }
        .tabu_table.border_table td{
            background: #fff !important;
        }
        .logo_thumb_upper {
            flex: 1 1 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .company_info {
            margin-left: 20px;
            flex: 1 1 auto;
            text-align: right;
        }
        .logo_img h2 {
            color: #fff;
            font-size: 18px;
            font-weight: 400
        }
        .logo_img h2 p{
            font-size: 13px;
        }
        .gray_header_table thead th{
            text-transform: uppercase;
            font-size: 12px;
            color: var(--base_color);
            font-weight: 500;
            text-align: left;
            border-bottom: 1px solid #a2a8c5;
            padding: 5px 0px;
            background: transparent !important ;
            border-bottom: 1px solid rgba(67, 89, 187, 0.15) !important;
            padding-left: 0px !important;
            vertical-align: middle;
            text-align: center;
        }
        .gray_header_table {
            border: 0;
        }
        .gray_header_table tbody td, .gray_header_table tbody th {
            border-bottom: 1px solid rgba(67, 89, 187, 0.15) !important;
        }
        .max-width-400{
            width: 400px;
        }
        .max-width-500{
            width: 500px;
        }
        .ml_auto{
            margin-left: auto;
            margin-right: 0;
        }
        .mr_auto{
            margin-left: 0;
            margin-right: auto;
        }
        .margin-auto{
            margin: auto;
        }

        .thumb.text-right {
            text-align: right;
        }
        .tableInfo_header{
            background: url(<?php echo e(asset('public/backEnd/')); ?>/img/report-admit-bg.png) no-repeat center;
            background-size: cover;
            border-radius: 5px 5px 0px 0px;
            border: 0;
            padding: 30px 30px;
        }
        .tableInfo_header td{
            padding: 30px 40px;
        }
        .company_info{
            margin-left: 100px;
        }
        .company_info p{
            font-size: 14px;
            color: #fff;
            font-weight: 400;
            margin-bottom: 10px;
        }
        .company_info h3{
            font-size: 18px;
            color: #fff;
            font-weight: 500;
            margin-bottom: 17px;
        }
        .meritTableBody{
            padding: 30px;
            background: -webkit-linear-gradient(
                    90deg
                    , #d8e6ff 0%, #ecd0f4 100%);
            background: -moz-linear-gradient(90deg, #d8e6ff 0%, #ecd0f4 100%);
            background: -o-linear-gradient(90deg, #d8e6ff 0%, #ecd0f4 100%);
            background: linear-gradient(
                    90deg
                    , #d8e6ff 0%, #ecd0f4 100%);
        }
        .subject_title{
            font-size: 18px;
            font-weight: 600;
            font-weight: 500;
            color: var(--base_color);
            line-height: 1.5;
        }
        .subjectList{
            display: grid;
            grid-template-columns: repeat(2,1fr);
            grid-column-gap: 40px;
            grid-row-gap: 9px;
            margin: 0;
            padding: 0;

        }
        .subjectList li{
            list-style: none;
            color: #828bb2;
            font-size: 14px;
            font-weight: 400
        }
        .table_title{
            font-weight: 500;
            color: var(--base_color);
            line-height: 1.5;
            font-size: 18px;
            text-align: left
        }
        .gradeTable_minimal.border_table tbody tr td {
            text-align: center !important;
            border: 0;
            color: #828bb2;
            padding: 8px 8px;
            font-weight: 400;
            font-size: 12px;
            padding: 3px 8px;
        }

        .profile_thumb img {
            border-radius: 5px;
        }

        .gray_header_table thead tr:first-child th {
            border: 0 !important;
        }
        .gray_header_table thead tr:last-child th {
            border-bottom: 1px solid rgba(67, 89, 187, 0.15) !important;
        }
        .border_table tr:first-of-type th:nth-child(-n+2){
            border-bottom: 1px solid rgba(67, 89, 187, 0.15) !important;
        }
        .gray_header_table thead tr:first-child th:nth-child(-n+2) {
            border-bottom: 1px solid rgba(67, 89, 187, 0.15) !important;
        }
        .gray_header_table thead tr:first-child th:nth-last-child(-n+2) {
            border-bottom: 1px solid rgba(67, 89, 187, 0.15) !important;
        }

        .gray_header_table thead tr:first-child th:nth-last-child(-n+3) {
            border-bottom: 1px solid rgba(67, 89, 187, 0.15) !important;
        }

    </style>
</head>
<script>
    var is_chrome = function () { return Boolean(window.chrome); }
    if(is_chrome)
    {
        window.print();
        //    setTimeout(function(){window.close();}, 10000);
        //give them 10 seconds to print, then close
    }
    else
    {
        window.print();
    }
</script>
<body onLoad="loadHandler();">
    <div class="invoice_wrapper fullwidth_90">
        <div class="invoice_print mb_30">
            <div class="container">
                <div class="invoice_part_iner">
                    <table class="table border_bottom mb_30" >
                        <thead>
                        <td>
                            <div class="logo_img">
                                <div class="logo_thumb_upper">
                                    <div class="thumb_logo">
                                        <img  src="<?php echo e(asset('/')); ?><?php echo e(generalSetting()->logo); ?>" alt="<?php echo e(generalSetting()->school_name); ?>">
                                    </div>
                                    <h2>
                                        <p class="text-white"><?php echo app('translator')->get('exam.exam'); ?> : <?php echo e($examInfo->title); ?></p>
                                        <?php if(isset($subjectInfo->subject_name)): ?>
                                            <p class="text-white"><?php echo app('translator')->get('exam.subject'); ?> : <?php echo e($subjectInfo->subject_name); ?></p>
                                        <?php endif; ?>
                                        <?php if(moduleStatusCheck('University')): ?>
                                        <p class="text-white"><?php echo app('translator')->get('university::un.semester'); ?> : <?php echo e($data['semester']); ?> - <?php echo e($data['semester_label']); ?> (<?php echo e($data['session']); ?>)  </p>
                                        <?php else: ?>
                                        <p class="text-white"><?php echo app('translator')->get('common.class'); ?> : <?php echo e(@$classInfo->class_name); ?> (<?php echo e(@$sectionInfo->section_name); ?>)</p>
                                        <?php endif; ?> 
                                    </h2>
                                </div>
                                <div class="company_info">
                                    <h3><?php echo e(isset(generalSetting()->school_name)?generalSetting()->school_name:'Infix School Management ERP'); ?></h3>
                                    <h5><?php echo e(isset(generalSetting()->address)?generalSetting()->address:'Infix School Address'); ?></h5>
                                    <h5><?php echo app('translator')->get('common.email'); ?>: <?php echo e(isset(generalSetting()->email)?generalSetting()->email:'hello@aorasoft.com'); ?>, <?php echo app('translator')->get('common.phone'); ?>: <?php echo e(isset(generalSetting()->phone)?generalSetting()->phone:'+96897002784 '); ?></h5>
                                </div>
                            </div>
                        </td>
                        </thead>
                    </table>
                    <div class="table_title" style="margin-bottom: 20px; text-align: center">
                        <h3>
                            <?php echo app('translator')->get('exam.marksheet_report'); ?>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <table class="table border_table gray_header_table mb-0" >
            <thead>
                <tr>
                    <th class="name_field"><?php echo app('translator')->get('common.student_name'); ?></th>
                    <th class="roll_field"><?php echo app('translator')->get('student.admission_no'); ?></th>
                    <th class="roll_field"><?php echo app('translator')->get('student.roll_no'); ?></th>
                    <th class="large_spanTh"><?php echo app('translator')->get('exam.position'); ?></th>
                    <th class="large_spanTh"><?php echo app('translator')->get('exam.total_mark'); ?></th>
                    <th class="large_spanTh"><?php echo app('translator')->get('academics.pass_mark'); ?></th>
                    <th class="large_spanTh"><?php echo app('translator')->get('exam.obtained_mark'); ?></th>
                    <th class="large_spanTh"><?php echo app('translator')->get('exam.result'); ?></th>
                    <th class="large_spanTh"><?php echo app('translator')->get('exam.grade'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $mark_sheet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        if(moduleStatusCheck('University')){
                            $totalMark = subjectPercentageMark(@$data->total_marks, @subjectFullMark($data->exam_type_id, $data->un_subject_id, $data->class_id, $data->section_id));
                        }else{
                            $totalMark = subjectPercentageMark(@$data->total_marks, @subjectFullMark($data->exam_type_id, $data->subject_id, $data->class_id, $data->section_id));
                        }
                        $evaluation= markGpa($totalMark);
                    ?>
                    <tr>
                        <td><?php echo e($data->studentRecords->student->full_name); ?></td>
                        <td><?php echo e($data->studentRecords->student->admission_no); ?></td>
                        <td><?php echo e($data->studentRecords->student->roll_no); ?></td>
                        <td><?php echo e($loop->iteration); ?></td>
                        <?php if($exam_rule): ?>
                            <td><?php echo e(subject100PercentMark()); ?></td>
                        <?php else: ?> 
                        <td><?php echo e(@subjectFullMark($data->exam_type_id, $data->subject->id)); ?></td>
                        <?php endif; ?> 
                        <td><?php echo e($pass_mark); ?></td>
                        <td>
                            <?php if($exam_rule): ?>
                                <?php echo e($totalMark); ?>

                            <?php else: ?> 
                                <?php echo e(@$data->total_marks); ?>

                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($pass_mark <= $totalMark): ?>
                                <?php echo app('translator')->get('exam.pass'); ?>
                            <?php else: ?>
                                <?php echo app('translator')->get('exam.fail'); ?>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php echo e($evaluation->description); ?>

                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\resources\views/backEnd/examination/report/marksheetReportPrint.blade.php ENDPATH**/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo app('translator')->get('exam.tabulation_sheet'); ?></title>
    <?php if(isset($single)): ?>
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
                white-space: nowrap
            }
            .line_grid span{
                display: flex;
                align-items: center;
                white-space: nowrap;
            }
            .line_grid span:first-child{
                font-size: 14px;
                font-weight: 500;
                color: #000;
            }
            .line_grid{
                font-weight: 600;
                color: var(--base_color);
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
                vertical-align: middle;
                text-align: center;
            }
            .border_table tbody tr td {
                text-align: center !important;
                color: #000;
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
                margin-bottom: 5px;
                color: #fff;
            }
            .logo_img h5{
                font-size: 14px;
                margin-bottom: 10px;
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
                border-bottom: 1px solid #000;
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
                background: #f2f2f2 !important;
            }

            .gray_header_table thead th{
                text-transform: uppercase;
                font-size: 12px;
                color: var(--base_color);
                font-weight: 500;
                text-align: left;
                padding: 5px 0px;
                border-bottom: 1px solid #000 !important;
                background: transparent !important ;
                /* padding-left: 0px !important; */
            }
            .gray_header_table {
                border: 0;
            }
            .gray_header_table tbody td, .gray_header_table tbody th {
                border-bottom: 1px solid #000 !important;
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
                margin-bottom: 15px;
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
                color: #000;
                padding: 8px 8px;
                font-weight: 400;
                font-size: 12px;
                padding: 3px 8px;
            }

            .profile_thumb img {
                border-radius: 5px;
            }


            .gray_header_table thead tr:last-child th {
                border-bottom: 1px solid #000 !important;
            }

            .gray_header_table thead tr:first-child th:nth-last-child(-n+3) {
                border-bottom: 1px solid #000 !important;
            }

        </style>
    <?php elseif(isset($allClass)): ?>
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
                color: #000;
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
                padding: 5px 0px;
                background: transparent !important ;
                padding-left: 0px !important;
                vertical-align: middle;
                text-align: center;
                border-bottom: 1px solid #000 !important;
            }
            .gray_header_table {
                border: 0;
            }
            .gray_header_table tbody td, .gray_header_table tbody th {
                border-bottom: 1px solid #000 !important;
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
                color: #000;
                padding: 8px 8px;
                font-weight: 400;
                font-size: 12px;
                padding: 3px 8px;
            }

            .profile_thumb img {
                border-radius: 5px;
            }

            .gray_header_table thead tr:last-child th {
                border-bottom: 1px solid #000 !important;
            }
            .border_table tr:first-of-type th:nth-child(-n+2){
                border-bottom: 1px solid rgba(67, 89, 187, 0.15) !important;
            }
            .gray_header_table thead tr:first-child th:nth-child(-n+2) {
                border-bottom: 1px solid #000 !important;
            }
            .gray_header_table thead tr:first-child th:nth-last-child(-n+2) {
                border-bottom: 1px solid rgba(67, 89, 187, 0.15) !important;
            }

            .gray_header_table thead tr:first-child th:nth-last-child(-n+3) {
                border-bottom: 1px solid #000 !important;
            }


        </style>
    <?php endif; ?>
    <style>
        .custom_result_print{
            background-image: none;
        }
        .custom_result_print h3, .custom_result_print h5, .custom_result_print h2{
            color: black;
        }
    </style>
    <?php if(resultPrintStatus('vertical_boarder')): ?>
        <style>
            .border_table td, .border_table th{
                border: 1px solid #000 !important;
            }
        </style>
    <?php endif; ?>
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
<body >
<?php if(isset($single)): ?>
    <div class="invoice_wrapper">
        <div class="invoice_print mb_30">
            <div class="container">
                <div class="invoice_part_iner">
                    <table class="table border_bottom mb_30" >
                        <thead>
                        <td>
                            <div class="<?php echo e((resultPrintStatus('header'))? "logo_img": "logo_img custom_result_print"); ?>">
                                <div class="thumb_logo">
                                    <img  src="<?php echo e(asset('/')); ?><?php echo e(generalSetting()->logo); ?>" alt="<?php echo e(generalSetting()->school_name); ?>">
                                </div>
                                <div class="company_info">
                                    <h3><?php echo e(isset(generalSetting()->school_name)?generalSetting()->school_name:'Infix School Management ERP'); ?></h3>
                                    <h5><?php echo e(isset(generalSetting()->address)?generalSetting()->address:'Infix School Address'); ?></h5>
                                    <h5><?php echo app('translator')->get('common.email'); ?>: <?php echo e(isset(generalSetting()->email)?generalSetting()->email:'hello@aorasoft.com'); ?>, <?php echo app('translator')->get('common.phone'); ?>: <?php echo e(isset(generalSetting()->phone)?generalSetting()->phone:'+96897002784'); ?></h5>
                                </div>
                            </div>
                        </td>
                        </thead>
                    </table>
                    <table class="table">
                        <tbody>
                        <tr>
                            <div class="table_title" style="margin-bottom: 20px; text-align: center">
                                <h3><?php echo app('translator')->get('reports.tabulation_sheet_of'); ?> <?php echo e($tabulation_details['exam_term']); ?> <?php echo app('translator')->get('reports.in'); ?> <?php echo e($year); ?></h3>
                            </div>
                            <table class="mb_30 max-width-500 mr_auto">
                                <tbody>
                                <tr>
                                    <td>
                                        <p class="line_grid" >
                                                                <span>
                                                                    <span><?php echo app('translator')->get('student.student_name'); ?></span><span>:</span>
                                                                </span>
                                            <?php echo e($tabulation_details['student_name']); ?>

                                        </p>
                                    </td>
                                    <td>
                                        <p class="line_grid" >
                                                                <span>
                                                                    <span><?php echo app('translator')->get('common.class'); ?></span><span>:</span>
                                                                </span>
                                            <?php echo e($tabulation_details['student_class']); ?>

                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="line_grid" >
                                                                <span>
                                                                    <span><?php echo app('translator')->get('exam.roll_no'); ?></span><span>:</span>
                                                                </span>
                                            <?php echo e($tabulation_details['student_roll']); ?>

                                        </p>
                                    </td>
                                    <td>
                                        <p class="line_grid" >
                                                                <span>
                                                                    <span><?php echo app('translator')->get('common.section'); ?></span><span>:</span>
                                                                </span>
                                            <?php echo e($tabulation_details['student_section']); ?>

                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="line_grid" >
                                                                <span>
                                                                    <span><?php echo app('translator')->get('student.admission_no'); ?></span><span>:</span>
                                                                </span>
                                            <?php echo e($tabulation_details['student_admission_no']); ?>

                                        </p>
                                    </td>
                                    <td>
                                        <p class="line_grid" >
                                                                <span>
                                                                    <span><?php echo app('translator')->get('exam.exam'); ?></span><span>:</span>
                                                                </span>
                                            <?php echo e($tabulation_details['exam_term']); ?>

                                        </p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <table class="table border_table gray_header_table mb-5" >
            <thead>
            <tr>
                <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $subject_ID     = $subject->subject_id;
                        $subject_Name   = $subject->subject->subject_name;
                        $mark_parts      = App\SmAssignSubject::getNumberOfPart($subject_ID, $class_id, $section_id, $exam_term_id);
                    ?>
                    <th colspan="<?php echo e(count($mark_parts)+1); ?>" class="subject-list"> <?php echo e($subject_Name); ?></th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <th rowspan="2"><?php echo app('translator')->get('exam.total_mark'); ?></th>
                <?php if($optional_subject_setup!=''): ?>
                    <?php if(@generalSetting()->result_type != 'mark'): ?>
                        <th><?php echo app('translator')->get('exam.gpa'); ?></th>
                        <th rowspan="2" ><?php echo app('translator')->get('exam.gpa'); ?></th>
                        <th rowspan="2"><?php echo app('translator')->get('reports.result'); ?></th>
                    <?php endif; ?>
                <?php else: ?>
                    <?php if(@generalSetting()->result_type != 'mark'): ?>
                        <th rowspan="2"><?php echo app('translator')->get('exam.gpa'); ?></th>
                        <th rowspan="2"><?php echo app('translator')->get('reports.result'); ?></th>
                        <th rowspan="2"><?php echo app('translator')->get('exam.position'); ?></th>
                    <?php endif; ?>
                <?php endif; ?>
            </tr>
            <tr>
                <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $subject_ID     = $subject->subject_id;
                        $subject_Name   = $subject->subject->subject_name;
                        $mark_parts     = App\SmAssignSubject::getNumberOfPart($subject_ID, $class_id, $section_id, $exam_term_id);
                    ?>
                    <?php $__currentLoopData = $mark_parts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sigle_part): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <th><?php echo e($sigle_part->exam_title); ?> (<?php echo e($sigle_part->exam_mark); ?>)</th>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <th><?php echo app('translator')->get('exam.result'); ?></th>
                    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if($optional_subject_setup!=''): ?>
                    <th><small><?php echo app('translator')->get('reports.without_additional'); ?></small></th>
                <?php endif; ?>
            </tr>
            </thead>
            <tbody>
                <?php  
                    $count=1;  
                ?>
                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php 
                        $this_student_failed=0; 
                        $tota_grade_point= 0; 
                        $tota_grade_point_main= 0; 
                        $marks_by_students = 0;
                        $gpa_without_optional_count=0;  
                        $main_subject_total_gpa =0;  
                        $Optional_subject_count=0;  
                        $optional_subject_gpa=0;  
                        $opt_sub_gpa=0;
                        $optional_subject=App\SmOptionalSubjectAssign::where('student_id','=',$student->id)
                                        ->where('session_id','=',$student->session_id)
                                        ->first();
                    ?>
                    <tr>
                        <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $subject_ID     = $subject->subject_id;
                                $subject_Name   = $subject->subject->subject_name;
                                $mark_parts     = App\SmAssignSubject::getMarksOfPart($student->id, $subject_ID, $class_id, $section_id, $exam_term_id);
                                $subject_count= 0;
                                $optional_subject_marks=DB::table('sm_optional_subject_assigns')
                                    ->join('sm_mark_stores','sm_mark_stores.subject_id','=','sm_optional_subject_assigns.subject_id')
                                    ->where('sm_optional_subject_assigns.student_id','=',$student->id)
                                    ->first();
                            ?>
                        <?php $__currentLoopData = $mark_parts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sigle_part): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td class="total"><?php echo e($sigle_part->total_marks); ?></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <td class="total">
                            <?php
                                $tola_mark_by_subject = App\SmAssignSubject::getSumMark($student->id, $subject_ID, $class_id, $section_id, $exam_term_id);
                                $marks_by_students  = $marks_by_students + $tola_mark_by_subject;
                            ?>
                            <?php echo e($tola_mark_by_subject); ?>

                        </td>
                            <?php
                                $value=subjectFullMark($exam_term_id, $subject_ID, $class_id, $section_id);
                                $persentage=subjectPercentageMark($tola_mark_by_subject,$value);
                                $mark_grade = markGpa($persentage);

                                    $mark_grade_gpa=0;
                                    $optional_setup_gpa=0;
                                    if (@$optional_subject->subject_id==$subject_ID) {
                                        $optional_setup_gpa= @$optional_subject_setup->gpa_above;
                                        if (@$mark_grade->gpa >$optional_setup_gpa) {
                                            $mark_grade_gpa = @$mark_grade->gpa-$optional_setup_gpa;
                                            $tota_grade_point = $tota_grade_point + @$mark_grade_gpa;
                                            $tota_grade_point_main = $tota_grade_point_main + @$mark_grade->gpa;
                                        } else {
                                            $tota_grade_point = $tota_grade_point + @$mark_grade_gpa;
                                            $tota_grade_point_main = $tota_grade_point_main + @$mark_grade->gpa;
                                        }
                                    } else {
                                        $tota_grade_point = $tota_grade_point + @$mark_grade->gpa ;
                                        if(@$mark_grade->gpa<1){
                                            $this_student_failed =1;
                                        }
                                        $tota_grade_point_main = $tota_grade_point_main + @$mark_grade->gpa;
                                    }
                            ?>
                            <?php
                                if(@$optional_subject->subject_id==$subject_ID){
                                    $optional_subject_gpa+= @$mark_grade->gpa-$optional_setup_gpa;
                                    $opt_sub_gpa+=$optional_setup_gpa;
                                }
                            ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <td><?php echo e($marks_by_students); ?></td>
                        <?php 
                            $marks_by_students = 0; 
                        ?>
                        <?php if($optional_subject_setup!=''): ?>
                            <td>
                                <?php if(isset($this_student_failed) && $this_student_failed==1): ?>
                                    <?php if(!empty($tota_grade_point_main)): ?>
                                        <p id="main_subject_total_gpa"></p>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php
                                        if (@$optional_subject!='') {
                                            if(!empty($tota_grade_point_main)){
                                                $subject = count($subjects)-1;
                                                $without_optional_subject=($tota_grade_point_main - $opt_sub_gpa) - $optional_subject_gpa;
                                                $number = number_format($without_optional_subject/ $subject , 2, '.', '');
                                            }else{
                                                $number = 0;
                                            }
                                        } else{
                                            $subject_count=count($subjects);
                                            if(!empty($tota_grade_point_main)){
                                                $number = number_format($tota_grade_point_main/ $subject_count, 2, '.', '');
                                            }else{
                                                $number = 0;
                                            }
                                        }  
                                    ?> 
                                    <?php echo e($number==0?'0.00':$number); ?>

                                    <?php 
                                        $subject_count=0;
                                        $tota_grade_point_main= 0; 
                                        $subject_count =count($subjects)-1;
                                    ?>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php 
                                    $subject_count=0;
                                    $subject_count =count($subjects)-1;
                                ?>
                                <?php if(isset($this_student_failed) && $this_student_failed==1): ?>
                                    <?php echo e(number_format($tota_grade_point/ $subject_count, 2, '.', '')); ?>

                                <?php else: ?>
                                    <?php
                                    if (@$optional_subject!='') {
                                        $subject_count=count($subjects)-1;
                                        if(!empty($tota_grade_point)){
                                            $number = number_format($tota_grade_point/ $subject_count, 2, '.', '');
                                        }else{
                                            $number = 0;
                                        }
                                    } else{
                                        $subject_count=count($subjects);
                                        if(!empty($tota_grade_point)){
                                            $number = number_format($tota_grade_point/ $subject_count, 2, '.', '');
                                        }else{
                                            $number = 0;
                                        }
                                    }
                                    ?>
                                    <?php if($number >= $max_grade): ?>
                                        <?php echo e(number_format($max_grade,2)); ?>

                                    <?php else: ?>
                                        <?php echo e($number==0?'0.00':$number); ?>

                                    <?php endif; ?>
                                    <?php 
                                        $tota_grade_point= 0; 
                                    ?>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if(isset($this_student_failed) && $this_student_failed==1): ?>
                                    <span class="text-warning font-weight-bold">
                                        <?php echo e($fail_grade_name->grade_name); ?>

                                    </span>
                                <?php else: ?>
                                    <?php if($number >= $max_grade): ?>
                                        <?php echo e(gradeName($max_grade)); ?>

                                    <?php else: ?>
                                        <?php echo e(gradeName($number)); ?>

                                    <?php endif; ?>
                                <?php endif; ?>
                            </td>
                        <?php else: ?>
                            <?php if(@generalSetting()->result_type != 'mark'): ?>
                                <td>
                                    <?php if(isset($this_student_failed) && $this_student_failed==1): ?>
                                        <?php echo e(number_format($tota_grade_point/ count($subjects), 2, '.', '')); ?>

                                    <?php else: ?>
                                        <?php
                                            $subject_count=0;
                                            if (@$optional_subject!='') {
                                                $subject_count=count($subjects)-1;
                                                    if(!empty($tota_grade_point)){
                                                        $number = number_format($tota_grade_point/ $subject_count, 2, '.', '');
                                                    }else{
                                                        $number = 0;
                                                    }
                                            } else{
                                                $subject_count=count($subjects);
                                                    if(!empty($tota_grade_point)){
                                                        $number = number_format($tota_grade_point/ $subject_count, 2, '.', '');
                                                    }else{
                                                        $number = 0;
                                                    }
                                            }
                                        ?>    
                                            <?php echo e($number==0?'0.00':$number); ?>

                                        <?php 
                                            $tota_grade_point= 0; 
                                        ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if(isset($this_student_failed) && $this_student_failed==1): ?>
                                        <span class="text-dander font-weight-bold">
                                        </span>
                                    <?php else: ?>
                                    <?php
                                        $main_subject_total_gpa=0;
                                        $Optional_subject_count=0;
                                            if($optional_subject_mark!=''){
                                                $Optional_subject_count=$subjects->count()-1;
                                            }else{
                                                $Optional_subject_count=$subjects->count();
                                            }
                                    ?>
                                    <?php $__currentLoopData = $mark_sheet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            if ($data->subject_id==$optional_subject_mark) { 
                                                continue;
                                            }
                                            $result = markGpa($persentage);
                                            $main_subject_total_gpa += $result->gpa;
                                        ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e(gradeName($number)); ?>

                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php echo e(getStudentMeritPosition($class_id, $section_id, $exam_term_id, $tabulation_details['record_id'])); ?>

                                </td>
                            <?php endif; ?>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php
            $examReportSignature = examReportSignatures();
        ?>
        <?php if($examReportSignature->count() > 1 || !$exam_content): ?>
            <div style="margin-top:auto; margin-bottom:20px; display: flex; justify-content: <?php echo e($examReportSignature->count() == 1 ? 'flex-end' : 'space-between'); ?>; flex-wrap: wrap; align-items: center;">
                <?php $__currentLoopData = $examReportSignature; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $signature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div style="text-align: right; display: flex; align-items: center; justify-content: center; margin-right: 24px; flex-direction: column">
                        <div>
                            <img src="<?php echo e(asset($signature->signature)); ?>" width="150px" height="40px"
                                 alt="<?php echo e($signature->title); ?>">
                        </div>
                        <p style="margin-top:8px; text-align: center; width: 100%; border-top: 1px solid rgba(67, 89, 187, 0.15) !important">
                            <?php echo e($signature->title); ?>

                        </p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
        <?php if($exam_content): ?>
            <table style="width:100%;  <?php if($examReportSignature->count() > 1): ?> border-top: 1px solid #000 !important; <?php else: ?>  margin-top: auto; <?php endif; ?>"
                   <?php if($examReportSignature->count() == 1): ?>class="border-0 mt-auto" <?php endif; ?>>
                <tbody>
                <tr>
                    <td class="border-0" style="border: 0 !important;">
                        <p class="result-date"
                           style="text-align:left; float:left; <?php if($examReportSignature->count() == 1): ?>  margin-top:50px; <?php endif; ?> display:inline-block; padding-left: 0; color: #000;">
                            <?php echo app('translator')->get('exam.date_of_publication_of_result'); ?> :
                            <strong>
                                <?php echo e(dateConvert(@$exam_content->publish_date)); ?>

                            </strong>
                        </p>
                    </td>
                    <td class="border-0" style="border: 0 !important;">
                        <?php if($examReportSignature->count() == 1): ?>
                            <div class="text-right d-flex flex-column justify-content-end">
                                <div class="thumb text-right">
                                    <img src="<?php echo e(asset(@$examReportSignature->first()->signature)); ?>" width="100px">
                                </div>
                                <p style="text-align:right; float:right; display:inline-block; margin-top:5px;">
                                    (<?php echo e(@$examReportSignature->first()->title); ?>)
                                </p>
                            </div>
                        <?php endif; ?>
                    </td>
                </tr>
                </tbody>
            </table>
        <?php endif; ?>
        <script>
            function myFunction(value, subject) {
                if (value != "") {
                    var res = Number(value / subject).toFixed(2);
                } else {
                    var res = 0;
                }
                document.getElementById("main_subject_total_gpa").innerHTML = res;
            }
            myFunction(<?php echo e($main_subject_total_gpa); ?>, <?php echo e($Optional_subject_count); ?>);
        </script>
    </div>
<?php elseif(isset($allClass)): ?>
    <div class="invoice_wrapper fullwidth_90">
        <div class="invoice_print mb_30">
            <div class="container">
                <div class="invoice_part_iner">
                    <table class="table border_bottom mb_30" >
                        <thead>
                        <td>
                            <div class="<?php echo e((resultPrintStatus('header'))? "logo_img": "logo_img custom_result_print"); ?>">
                                <div class="logo_thumb_upper">
                                    <div class="thumb_logo">
                                        <img  src="<?php echo e(asset('/')); ?><?php echo e(generalSetting()->logo); ?>" alt="<?php echo e(generalSetting()->school_name); ?>">
                                    </div>
                                    <h2>
                                        <?php echo app('translator')->get('common.class'); ?> : <?php echo e($tabulation_details['class']); ?>

                                        <br>
                                        <p><?php echo app('translator')->get('common.section'); ?> : <?php echo e($tabulation_details['section']); ?></p>
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
                            <?php echo app('translator')->get('reports.tabulation_sheet_of'); ?> <?php echo e($tabulation_details['exam_term']); ?> <?php echo app('translator')->get('reports.in'); ?> <?php echo e($year); ?>

                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <table class="table border_table gray_header_table mb-5" >
            <thead>
            <tr>
                <th rowspan="2"><?php echo app('translator')->get('common.name'); ?></th>
                <th rowspan="2"><?php echo app('translator')->get('student.roll_no'); ?></th>
                <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $subject_ID     = $subject->subject_id;
                        $subject_Name   = $subject->subject->subject_name;
                        $mark_parts      = App\SmAssignSubject::getNumberOfPart($subject_ID, $class_id, $section_id, $exam_term_id);
                    ?>
                    <th colspan="<?php echo e(count($mark_parts)+1); ?>" class="subject-list"> <?php echo e($subject_Name); ?></th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <th rowspan="2" class="cust_border"> <?php echo app('translator')->get('exam.total_mark'); ?></th>
                <?php if($optional_subject_setup!=''): ?>
                    <?php if(@generalSetting()->result_type != 'mark'): ?>
                        <th><?php echo app('translator')->get('exam.gpa'); ?></th>
                        <th rowspan="2"><?php echo app('translator')->get('exam.gpa'); ?></th>
                        <th rowspan="2"><?php echo app('translator')->get('reports.result'); ?></th>
                    <?php endif; ?>
                <?php else: ?>
                    <?php if(@generalSetting()->result_type != 'mark'): ?>
                        <th rowspan="2"> <?php echo app('translator')->get('exam.gpa'); ?></th>
                        <th rowspan="2"> <?php echo app('translator')->get('reports.result'); ?></th>
                        <th rowspan="2"> <?php echo app('translator')->get('exam.position'); ?></th>
                    <?php endif; ?>
                <?php endif; ?>
            </tr>
            <tr>
                <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $subject_ID     = $subject->subject_id;
                        $subject_Name   = $subject->subject->subject_name;
                        $mark_parts     = App\SmAssignSubject::getNumberOfPart($subject_ID, $class_id, $section_id, $exam_term_id);
                    ?>
                    <?php $__currentLoopData = $mark_parts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sigle_part): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <th><?php echo e($sigle_part->exam_title); ?></th>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <th><?php echo app('translator')->get('exam.total'); ?></th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if($optional_subject_setup!=''): ?>
                    <th><small><?php echo app('translator')->get('reports.without_additional'); ?></small></th>
                <?php endif; ?>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $students->where('active_status', 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $this_student_failed=0;
                    $tota_grade_point= 0;
                    $tota_grade_point_main= 0;
                    $marks_by_students = 0;
                    $main_subject_total_gpa = 0;
                    $Optional_subject_count = 0;
                    $optional_subject=App\SmOptionalSubjectAssign::where('student_id','=',$student->id)->where('session_id','=',$student->session_id)->first();

                    $studentRecord = App\Models\StudentRecord::where('class_id', $class_id)
                                    ->where('section_id', $section_id)
                                    ->where('student_id',$student->id)
                                    ->where('is_promote', 0)
                                    ->first();
                    $opt_sub_gpa  = 0;
                    $optional_subject_gpa  = 0;
                ?>
                <tr>
                    <td><?php echo e($student->full_name); ?></td>
                    <td><?php echo e($student->roll_no); ?></td>
                    <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $subject_ID     = $subject->subject_id;
                            $subject_Name   = $subject->subject->subject_name;
                            $mark_parts     = App\SmAssignSubject::getMarksOfPart($student->id, $subject_ID, $class_id, $section_id, $exam_term_id);
                            $subject_count= 0;
                            $optional_subject_marks=DB::table('sm_optional_subject_assigns')
                            ->join('sm_mark_stores','sm_mark_stores.subject_id','=','sm_optional_subject_assigns.subject_id')
                            ->where('sm_optional_subject_assigns.student_id','=',$student->id)
                            ->first();
                        ?>

                        <?php $__currentLoopData = $mark_parts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sigle_part): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td class="total"><?php echo e($sigle_part->total_marks); ?></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <td class="total">
                            <?php
                                $tola_mark_by_subject = App\SmAssignSubject::getSumMark($student->id, $subject_ID, $class_id, $section_id, $exam_term_id);
                                $marks_by_students  = $marks_by_students + $tola_mark_by_subject;
                            ?>
                            <?php echo e($tola_mark_by_subject); ?>

                        </td>
                        <?php
                            $value=subjectFullMark($exam_term_id, $subject_ID, $class_id, $section_id);
                            $persentage=subjectPercentageMark($tola_mark_by_subject,$value);
                            $mark_grade = markGpa($persentage);

                            $mark_grade_gpa=0;
                            $optional_setup_gpa=0;
                            if (@$optional_subject->subject_id==$subject_ID) {
                                $optional_setup_gpa= @$optional_subject_setup->gpa_above;
                                if ($mark_grade->gpa >$optional_setup_gpa) {
                                    $mark_grade_gpa = $mark_grade->gpa-$optional_setup_gpa;
                                    $tota_grade_point = $tota_grade_point + $mark_grade_gpa;

                                    $tota_grade_point_main = $tota_grade_point_main + $mark_grade->gpa;

                                } else {
                                    $tota_grade_point = $tota_grade_point + $mark_grade_gpa;
                                    $tota_grade_point_main = $tota_grade_point_main + $mark_grade->gpa;
                                }
                            } else {
                                $tota_grade_point = $tota_grade_point + $mark_grade->gpa ;
                                if($mark_grade->gpa<1){
                                    $this_student_failed =1;
                                }
                                $tota_grade_point_main = $tota_grade_point_main + $mark_grade->gpa;
                            }
                        ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <td><?php echo e($marks_by_students); ?></td>
                    <?php if($optional_subject_setup!=''): ?>
                        <td>
                            <?php if(isset($this_student_failed) && $this_student_failed==1): ?>
                                <?php if(!empty($tota_grade_point_main)): ?>
                                    <p id="main_subject_total_gpa"></p>
                                <?php endif; ?>
                            <?php else: ?>
                                <?php
                                    if (@$optional_subject!='') {
                                        if(!empty($tota_grade_point_main)){
                                            $subject = count($subjects)-1;
                                            $without_optional_subject=($tota_grade_point_main - $opt_sub_gpa) - $optional_subject_gpa;
                                            $number = number_format($without_optional_subject/ $subject , 2, '.', '');
                                        }else{
                                            $number = 0;
                                        }
                                    } else{
                                        $subject_count=count($subjects);
                                        if(!empty($tota_grade_point_main)){

                                            $number = number_format($tota_grade_point_main/ $subject_count, 2, '.', '');
                                        }else{
                                            $number = 0;
                                        }
                                    }
                                ?>
                                <?php if($number >= $max_grade): ?>
                                    <?php echo e($max_grade); ?>

                                <?php else: ?>
                                    <?php echo e($number==0?'0.00':$number); ?>

                                <?php endif; ?>
                                <?php
                                    $subject_count=0;
                                    $tota_grade_point_main= 0;
                                    $subject_count =count($subjects)-1;
                                ?>
                            <?php endif; ?>
                        </td>
                    <?php endif; ?>
                    <?php if(@generalSetting()->result_type != 'mark'): ?>
                        <td>
                            <?php if(isset($this_student_failed) && $this_student_failed == 1): ?>
                                <?php echo e(number_format($tota_grade_point/ count($subjects), 2, '.', '')); ?>

                            <?php else: ?>
                                <?php
                                    $subject_count=0;
                                    if (@$optional_subject!='') {
                                        $subject_count=count($subjects)-1;
                                            if(!empty($tota_grade_point)){
                                                $number = number_format($tota_grade_point/ $subject_count, 2, '.', '');
                                            }else{
                                                $number = 0;
                                            }
                                    } else{
                                        $subject_count=count($subjects);
                                            if(!empty($tota_grade_point)){
                                                $number = number_format($tota_grade_point/ $subject_count, 2, '.', '');
                                            }else{
                                                $number = 0;
                                            }
                                    }
                                ?>
                                <?php if($number >= $max_grade): ?>
                                    <?php echo e($max_grade); ?>

                                <?php else: ?>
                                    <?php echo e($number==0?'0.00':$number); ?>

                                <?php endif; ?>
                                <?php
                                    $tota_grade_point= 0;
                                ?>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if(isset($this_student_failed) && $this_student_failed==1): ?>
                                <span class="text-warning font-weight-bold">
                                                        <?php echo e($fail_grade_name->grade_name); ?>

                                                    </span>
                            <?php else: ?>
                                <?php if($number >= $max_grade): ?>
                                    <?php echo e(gradeName($max_grade)); ?>

                                <?php else: ?>
                                    <?php echo e(gradeName($number)); ?>

                                <?php endif; ?>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if(isset($this_student_failed) && $this_student_failed==1): ?>

                            <?php else: ?>
                                <?php echo e(getStudentMeritPosition($class_id, $section_id, $exam_term_id, $studentRecord->id)); ?>

                            <?php endif; ?>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php
            $examReportSignature = examReportSignatures();
        ?>
        <?php if($examReportSignature->count() > 1 || !$exam_content): ?>
            <div style="margin-top:auto; margin-bottom:20px; display: flex; justify-content: <?php echo e($examReportSignature->count() == 1 ? 'flex-end' : 'space-between'); ?>; flex-wrap: wrap; align-items: center;">
                <?php $__currentLoopData = $examReportSignature; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $signature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div style="text-align: right; display: flex; align-items: center; justify-content: center; margin-right: 24px; flex-direction: column">
                        <div>
                            <img src="<?php echo e(asset($signature->signature)); ?>" width="150px" height="40px"
                                 alt="<?php echo e($signature->title); ?>">
                        </div>
                        <p style="margin-top:8px; text-align: center; width: 100%; border-top: 1px solid rgba(67, 89, 187, 0.15) !important">
                            <?php echo e($signature->title); ?>

                        </p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
        <?php if($exam_content): ?>
            <table style="width:100%;  <?php if($examReportSignature->count() > 1): ?> border-top: 1px solid #000 !important; <?php else: ?>  margin-top: auto; <?php endif; ?>"
                   <?php if($examReportSignature->count() == 1): ?>class="border-0 mt-auto" <?php endif; ?>>
                <tbody>
                <tr>
                    <td class="border-0" style="border: 0 !important;">
                        <p class="result-date"
                           style="text-align:left; float:left; <?php if($examReportSignature->count() == 1): ?>  margin-top:50px; <?php endif; ?> display:inline-block; padding-left: 0; color: #000;">
                            <?php echo app('translator')->get('exam.date_of_publication_of_result'); ?> :
                            <strong>
                                <?php echo e(dateConvert(@$exam_content->publish_date)); ?>

                            </strong>
                        </p>
                    </td>
                    <td class="border-0" style="border: 0 !important;">
                        <?php if($examReportSignature->count() == 1): ?>
                            <div class="text-right d-flex flex-column justify-content-end">
                                <div class="thumb text-right">
                                    <img src="<?php echo e(asset(@$examReportSignature->first()->signature)); ?>" width="100px">
                                </div>
                                <p style="text-align:right; float:right; display:inline-block; margin-top:5px;">
                                    (<?php echo e(@$examReportSignature->first()->title); ?>)
                                </p>
                            </div>
                        <?php endif; ?>
                    </td>
                </tr>
                </tbody>
            </table>
        <?php endif; ?>
        <script>
            function myFunction(value, subject) {
                if (value != "") {
                    var res = Number(value / subject).toFixed(2);
                } else {
                    var res = 0;
                }
                document.getElementById("main_subject_total_gpa").innerHTML = res;
            }
            myFunction(<?php echo e($main_subject_total_gpa); ?>, <?php echo e($Optional_subject_count); ?>);
        </script>
    </div>
<?php endif; ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\reports\tabulation_sheet_report_print.blade.php ENDPATH**/ ?>
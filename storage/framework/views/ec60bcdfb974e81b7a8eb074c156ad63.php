<html>
    <title><?php echo app('translator')->get('student.view_transcript'); ?></title>
    <head>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: 'Poppins', sans-serif;
                font-size: 14px;
                margin: 0;
                padding: 0;
            }
    
            table {
                border-collapse: collapse;
            }
    
            h1,
            h2,
            h3,
            h4,
            h5,
            h6 {
                margin: 0;
                color: #101010;
            }
    
            .invoice_wrapper {
                /* max-width: 1200px; */
                max-width: 100%;
                margin: auto;
                background: #fff;
                padding: 20px;
            }
    
            .table_exam {
                width: 100%;
                margin-bottom: 1rem;
                color: #212529;
            }
    
            .border_none {
                border: 0px solid transparent;
                border-top: 0px solid transparent !important;
            }
    
            .invoice_part_iner {
                background-color: #fff;
            }
    
            .table_border thead {
                background-color: #F6F8FA;
            }
    
            .table_exam td,
            .table_exam th {
                padding: 5px 0;
                vertical-align: top;
                border-top: 0 solid transparent;
                color: #101010;
            }
    
            .table_exam td,
            .table_exam th {
                padding: 5px 0;
                vertical-align: top;
                border-top: 0 solid transparent;
                color: #101010;
            }
    
            .table_border tr {
                border-bottom: 1px solid #101010 !important;
            }
    
            .table_exam th p span,
            td p span {
                color: #212E40;
            }
    
            .table_exam th {
                color: #101010;
                border: 1px solid #101010 !important;
            }
    
            p {
                font-size: 14px;
                color: #101010;
            }
    
            h5 {
                font-size: 12px;
                font-weight: 500;
            }
    
            h6 {
                font-size: 10px;
                font-weight: 300;
            }
    
            .mt_40 {
                margin-top: 40px;
            }
    
            .table_style th,
            .table_style td {
                padding: 20px;
            }
    
            .invoice_info_table td {
                font-size: 10px;
                padding: 0px;
            }
    
            .text_right {
                text-align: right;
            }
    
            .virtical_middle {
                vertical-align: middle !important;
            }
    
            .logo_img {
                max-width: 120px;
            }
    
            .logo_img img {
                width: 100%;
            }
    
            .border_bottom {
                border-bottom: 1px solid #000;
            }
    
            .line_grid {
                display: grid;
                grid-template-columns: 110px auto;
                grid-gap: 10px;
            }
    
            .line_grid span {
                display: flex;
                justify-content: space-between;
            }
    
            .line_grid2 {
                display: grid;
                grid-template-columns: auto 110px;
                grid-gap: 10px;
            }
    
            .line_grid2 span {
                display: flex;
                justify-content: space-between;
            }
    
            p {
                margin: 0;
            }
            .mt_30{
                margin-top: 30px;
            }
    
            .font_18 {
                font-size: 18px;
            }
    
            .mb-0 {
                margin-bottom: 0;
            }
    
            .mb_30 {
                margin-bottom: 10px !important;
            }
    
            .border_table {}
    
            .border_table thead tr th {
                padding: 0;
                text-align: center !important;
            }
    
            .border_table tbody tr td {
                border: 1px solid #101010 !important;
                text-align: center;
                padding: 0;
            }
    
            .table_exam td,
            th {
                color: #101010;
                font-weight: 500;
                padding: 5px;
    
            }
    
            table {
                width: 100%;
            }
    
            .d_flex {
                display: flex;
            }
    
            .gap_20 {
                grid-gap: 20px;
            }
    
            .border_space {
                border-spacing: 3px;
                border-collapse: inherit;
            }
    
            .border_table tbody tr td.border-0,
            .border_table thead tr th.border-0 {
                border: 0 !important;
            }
    
            .text_right {
                text-align: right !important;
            }
    
            .seasonText {
                display: flex;
                align-items: center;
                grid-gap: 100px;
            }
    
            .seasonText p {
                font-weight: 600;
                text-transform: capitalize;
            }
    
            .f_w_600 {
                font-weight: 600;
            }
    
            .border_1px {
                border: 1px solid #000;
            }
            .table_exam thead th{
                color: #000;
            }
            .table_exam tr td, .table_exam tr th{
                font-weight: 600 !important;
            }
    
            hr {
                border-top: 2.5px solid #000;
            }
            
            .container{
                width: 100%;
                padding: 0;
                max-width: 100%;
            }
            .fail-color{
                background-color: yellow;
            }
        </style>
    </head>
<body >
    <section class="student-details mt-40 ">
        <div class="container-fluid p-0">
            <div class="row mt-40">
                <div class="col-lg-4 no-gutters">
                    <div class="main-title">
                        <?php if(@$header): ?>
                            <h3 class="mb-30"><?php echo app('translator')->get('university::un.exam_report'); ?></h3>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <?php
                $admission= $studentRecordDetails->first();
                $graduation= $studentRecordDetails->orderBy('id', 'desc')->first();
                $attempted = 0;
                $fail = 0;
                $cumulativeAverage = 0;
                $semesterResult = collect();
            ?>
        
                <div class="invoice_wrapper">
                    <!-- invoice print part here -->
                    <div class="invoice_print mb_30">
                        <div class="container">
                            <div class="invoice_part_iner">
                                <table class="table mb_30">
                                    <thead>
                                        <td>
                                            <div class="transcript_print d_flex gap_20">
                                                <div class="transcript_print_left flex_fill d_flex gap_20">
                                                    <div class="logo_img">
                                                        <img src="<?php echo e(asset(generalSetting()->logo)); ?>" alt="<?php echo e(generalSetting()->school_name); ?>">
                                                    </div>
                                                    <div class="">
                                                        <h4><?php echo e(isset(generalSetting()->school_name)?generalSetting()->school_name:'Infix School Management ERP'); ?></h4>
                                                        <h5><?php echo e(isset(generalSetting()->address)?generalSetting()->address:'Infix School Address'); ?></h5>
                                                        <h5><?php echo e(isset(generalSetting()->email)?generalSetting()->email:'hello@aorasoft.com'); ?></h5>
                                                        <h5><?php echo e(isset(generalSetting()->phone)?generalSetting()->phone:'+96897002784'); ?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </thead>
                                </table>
                                <hr>

                                <table class="table_exam border_table mb_30 border_space">
                                    <thead>
                                        <tr>
                                            <th><?php echo app('translator')->get('library.full_name'); ?></th>
                                            <th><?php echo e($studentDetails->full_name); ?></th>
                                            <th><?php echo app('translator')->get('admin.gender'); ?></th>
                                            <th><?php echo e(@$studentDetails->gender->base_setup_name); ?></th>
                                            <th><?php echo app('translator')->get('student.date_of_birth'); ?></th>
                                            <th><?php echo e(dateConvert(@$studentDetails->date_of_birth)); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo app('translator')->get('student.roll_no'); ?></td>
                                            <td><?php echo e($studentDetails->roll_no); ?></td>
                                            <?php if(moduleStatusCheck('University')): ?>
                                            <td><?php echo app('translator')->get('student.admission'); ?></td>
                                            <td><?php echo e(@$admission->unSemesterLabel->name); ?> (<?php echo e(@$admission->unAcademic->name); ?>)</td>
                                            <td><?php echo app('translator')->get('university::un.graduation'); ?></td>
                                            <td><?php echo e(@$graduation->unSemesterLabel->name); ?> (<?php echo e(@$graduation->unAcademic->name); ?>)</td>
                                            <?php endif; ?>
                                        </tr>
                                        <?php if(moduleStatusCheck('University')): ?>
                                        <tr>
                                            <td><?php echo app('translator')->get('university::un.program'); ?></td>
                                            <td><?php echo e(@$studentRecordDetails->first()->unDepartment->name); ?></td>
                                            <td><?php echo app('translator')->get('university::un.total_credit_hours'); ?></td>
                                            <td><?php echo e(number_format(studentSubjectCredit($studentDetails->id), 2, '.', '')); ?></td>
                                            <td><?php echo app('translator')->get('university::un.cumulative_avg'); ?></td>
                                            <td class="cum-avg"></td>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                                <?php if(moduleStatusCheck('University')): ?>
                                <?php $__currentLoopData = $studentRecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                <table class="table_exam border_table mb_30 mt_30 border_space border_1px">
                                    <thead>
                                        <tr>
                                            <th><?php echo app('translator')->get('university::un.course_no'); ?></th>
                                            <th><?php echo app('translator')->get('university::un.course_title'); ?></th>
                                            <th><?php echo app('translator')->get('university::un.attempted'); ?></th>
                                            <th><?php echo app('translator')->get('university::un.passed'); ?></th>
                                            <th><?php echo app('translator')->get('exam.grade'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $record->unAcademic->unSemesterLabels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unSemesterLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(isMarkRegister($unSemesterLabel->id)): ?>
                                                <?php
                                                    $subjects = studentSubject($unSemesterLabel->id, $unSemesterLabel->un_academic_id, $studentDetails->id);
                                                    $totalSubject = count($subjects);
                                                    $semesterWiseAttempted = 0;
                                                    $passed = 0;
                                                    $markWithCredit = 0;
                                                    $result = 0;
                                                ?>
                                                <tr>
                                                    <td colspan="5" class="border-0 f_w_600"><strong><?php echo e($unSemesterLabel->name); ?> (<?php echo e($unSemesterLabel->academicYearDetails->name); ?>)</strong></td>
                                                </tr>
                                                <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $mark = unStudentFullMark($unSemesterLabel->id, $unSemesterLabel->un_academic_id, $subject->subject->id, $studentDetails->id);
                                                        $attempted += $subject->subject->number_of_hours;
                                                        $semesterWiseAttempted += $subject->subject->number_of_hours;
                                                        $failPass = failPassStatus($mark, $subject->subject->pass_mark, $unSemesterLabel->id, $unSemesterLabel->un_academic_id, $subject->subject->id);
                                                        $result += $mark;
                                                        if($failPass){
                                                            $fail += $subject->subject->number_of_hours;
                                                        }else{
                                                            $passed += $subject->subject->number_of_hours;
                                                        }
                                                        $markWithCredit += $mark * $subject->subject->number_of_hours;
                                                    ?>
                                                    <tr>
                                                        <td class="border-0"><?php echo e($subject->subject->subject_code); ?></td>
                                                        <td class="border-0 "><?php echo e($subject->subject->subject_name); ?></td>
                                                        <td class="border-0 "><?php echo e($subject->subject->number_of_hours); ?></td>
                                                        <td class="border-0 "><?php echo e((@$failPass) ? 0 : $subject->subject->number_of_hours); ?></td>
                                                        <td class="border-0"><?php echo e($mark); ?></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                <?php
                                                   $semesterAverage = null;
                                                   if($markWithCredit && $semesterWiseAttempted){
                                                     $semesterAverage = $markWithCredit / $semesterWiseAttempted;
                                                   }
                                                    $semesterResult->push(collect([
                                                        'avg'=>$semesterAverage,
                                                        'attempted'=>$semesterWiseAttempted,
                                                        'result'=> $semesterAverage* $semesterWiseAttempted,
                                                    ]));
                                                    $cumulativeAverage = $semesterResult->sum('result')/ $semesterResult->sum('attempted');
                                                    //$cumulativeAverage = 1;
                                                ?>
                                                    <tr>
                                                        <td class="border-0"></td> 
                                                        <td class="border-0 text_right"><?php echo app('translator')->get('university::un.semester_credit_hours'); ?></td>
                                                        <td class="border-0"><?php echo e($semesterWiseAttempted); ?></td>
                                                        <td class="border-0"><?php echo e($passed); ?></td>
                                                        <td class="border-0"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border-0"></td>
                                                        <td class="border-0"></td>
                                                        <td class="border-0 text_right"><?php echo app('translator')->get('university::un.semester_average'); ?>: <?php echo e(number_format($semesterAverage, 2, '.', '')); ?></td>
                                                        <td class="border-0"></td>
                                                        <td class="border-0"></td>
                                                    </tr>
                                                    <tr>

                                                        <td class="border-0" colspan="5">
                                                            <div class="seasonText">
                                                                <p><?php echo app('translator')->get('university::un.cumulative_credit_hours'); ?> 
                                                                    (
                                                                        <?php echo app('translator')->get('university::un.attempted'); ?>: <?php echo e($attempted); ?>,
                                                                        <?php echo app('translator')->get('university::un.passed'); ?>: <?php echo e($attempted - @$fail); ?>,
                                                                        <?php echo app('translator')->get('university::un.earned'); ?>: <?php echo e($attempted - @$fail); ?>

                                                                    )
                                                                </p>
                                                                <p><?php echo app('translator')->get('university::un.cumulative_average'); ?>: <?php echo e(number_format($cumulativeAverage, 2, '.', '')); ?></p>
                                                            </div>
                                                        </td>
                                                    </tr>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="seasonText">
                            <?php if(moduleStatusCheck('Alumni')): ?>
                                <p class="pl-2"><?php echo e(@$graduate->unAlumni->notes); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                </div>
        
        </div>
    </section>
</body>
<script src="<?php echo e(asset('public/vendor/spondonit/js/jquery-3.6.0.min.js')); ?>"></script>
<script>
    $('.cum-avg').text("<?php echo e(number_format($cumulativeAverage, 2, '.', '')); ?>");
    $(document).ready(function(){
        window.print();
});
</script>

</html>
<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\graduate\transcript\studentTranscriptPrint.blade.php ENDPATH**/ ?>
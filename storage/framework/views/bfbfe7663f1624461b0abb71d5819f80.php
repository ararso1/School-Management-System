<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo app('translator')->get('student.student_attendance'); ?>  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
</head>
<style>
 #attendance.th,#attendance.tr,#attendance.td{
     font-size: 10px !important;
     padding: 0px !important;
     text-align: center !important;
     border:1px solid #ddd;
     vertical-align: middle !important;
     
 }
 #attendance th{
     background: #ddd;
     text-align: center;
 }
 #attendance{
     border: 1px solid var(--border_color);
        border-collapse: collapse;
 }
 #attendance tr{
     border: 1px solid var(--border_color);
        border-collapse: collapse;
 }
 #attendance th{
     border: 1px solid var(--border_color);
        border-collapse: collapse;
        text-align: center !important;
        font-size: 11px;
 }
 #attendance td{
     border: 1px solid var(--border_color);
        border-collapse: collapse;
        text-align: center;
        font-size: 10px;
 }
 table#attendance th {
    padding: 5px 10px;
}

table#attendance td {
    padding: 5px 10px;
    border-right: 1px solid #d3d3d3;
}
table#attendance td:first-child {
    border-left:1px solid #d3d3d3;
}

table#attendance tr {
    border-bottom: 1px solid  #d3d3d3;
}
img.logo-img {
  max-width: 110px !important;
}
</style>
<body style="font-family: 'dejavu sans', sans-serif;">
<div class="container-fluid">                     
    <table  cellspacing="0" width="100%">
        <tr>
            <td width="43%"> 
                <img class="logo-img" src="<?php echo e(url('/')); ?>/<?php echo e(generalSetting()->logo); ?>" alt=""> 
            </td>
            <td style="padding-left: 10px"> 
                <h3 style="font-size:22px !important" class="text-white"> <?php echo e(isset(generalSetting()->school_name)?generalSetting()->school_name:'Infix School Management ERP'); ?> </h3> 
                <p style="font-size:18px !important" class="text-white mb-0"> <?php echo e(isset(generalSetting()->address)?generalSetting()->address:'Infix School Address'); ?> </p>  
            </td>
            <td style="text-aligh:center"> 
                <?php if(moduleStatusCheck('University')): ?> 
                <p style="font-size:14px !important; border-bottom:1px solid gray" align="left" class="text-white"><?php echo e(__('university::un.department')); ?>:<?php echo e(isset($unSemesterLabel) ? $unSemesterLabel->departmentDetails->name .'('. (isset($unDepartment) ? $unDepartment->name:'').')':''); ?> </p>
             
                <p style="font-size:14px !important; border-bottom:1px solid gray" align="left" class="text-white"><?php echo app('translator')->get('university::un.semester(label)'); ?>: <?php echo e(isset($unSemesterLabel) ? $unSemesterLabel->semesterDetails->name .'('. (isset($unSemesterLabel) ? $unSemesterLabel->name : '') .')' :''); ?> </p>
               <?php else: ?>
                <p style="font-size:14px !important; border-bottom:1px solid gray" align="left" class="text-white"><?php echo e(__('academics.class')); ?>: <?php echo e($class->class_name); ?> </p>
                <p style="font-size:14px !important; border-bottom:1px solid gray" align="left" class="text-white"><?php echo e(__('academics.section')); ?>: <?php echo e($section->section_name); ?> </p>
                <?php endif; ?>
                <p style="font-size:14px !important; border-bottom:1px solid gray" align="left" class="text-white"><?php echo e(__('hr.month')); ?>: <?php echo e(date("F", strtotime('00-'.$month.'-01'))); ?> </p>
                <p style="font-size:14px !important; border-bottom:1px solid gray" align="left" class="text-white"><?php echo e(__('common.year')); ?>: <?php echo e($year); ?> </p>
                
            </td>
        </tr>
    </table>
    <h3 style="text-align:center"><?php echo app('translator')->get('student.student_attendance_report'); ?></h3>
    <table  style="width: 100%; table-layout: fixed" id="attendance">
        <tr>
            <th>SL</th>
            <th width="12%"><?php echo app('translator')->get('common.name'); ?></th>
            <th width="5%"><?php echo app('translator')->get('student.admission_no'); ?></th>
            <th>P</th>
            <th>L</th>
            <th>A</th>
            <th>F</th>
            <th>H</th>
            <th width="5%">%</th>
            <?php for($i = 1; $i<=$days; $i++): ?>
            <th class="<?php echo e(($i<=18)? 'all':'none'); ?>">
                <?php echo e($i); ?> 
                <br>
                <?php
                    $date = $year.'-'.$month.'-'.$i;
                    $day = date("D", strtotime($date));
                    echo substr($day,0,2);
                ?>
            </th>
            <?php endfor; ?>
        </tr>
        <?php 
            $total_grand_present = 0; 
            $total_late = 0; 
            $total_absent = 0; 
            $total_holiday = 0; 
            $total_halfday = 0; 
            $count_student=1;
        ?>
        <?php $__currentLoopData = $attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php 
            $total_attendance = 0; 
        ?>
        <?php 
            $count_absent = 0; 
        ?>
        <tr>
            <td><?php echo e($count_student++); ?></td>
            <td style="text-align: left !important;">
                <?php $student = 0; ?>
                <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $student++; ?>
                    <?php if($student == 1): ?>
                        <?php echo e($value->studentInfo->full_name); ?>

                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </td>
            <td>
                <?php $student = 0; ?>
                <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $student++; ?>
                    <?php if($student == 1): ?>
                        <?php echo e($value->studentInfo->admission_no); ?>

                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </td>
            <td>
                <?php $p = 0; ?>
                <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($value->attendance_type == 'P'): ?>
                        <?php $p++; $total_attendance++; $total_grand_present++; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($p); ?>

            </td>
            <td>
                <?php $l = 0; ?>
                <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($value->attendance_type == 'L'): ?>
                        <?php $l++; $total_attendance++; $total_late++; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($l); ?>

            </td>
            <td>
                <?php $a = 0; ?>
                <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($value->attendance_type == 'A'): ?>
                        <?php $a++; $count_absent++; $total_attendance++; $total_absent++; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($a); ?>

            </td>
            <td>
                <?php $f = 0; ?>
                <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($value->attendance_type == 'F'): ?>
                        <?php $f++; $total_attendance++; $total_halfday++; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($f); ?>

            </td>
            <td>
                <?php $h = 0; ?>
                <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($value->attendance_type == 'H'): ?>
                        <?php $h++; $total_attendance++; $total_holiday++; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($h); ?>

            </td>
            <td>  
                <?php
                    $total_present = $total_attendance - $count_absent;
                    if($count_absent == 0){
                        echo '100%';
                    }else{
                        $percentage = $total_present / $total_attendance * 100;
                        echo number_format((float)$percentage, 2, '.', '').'%';
                    }
                ?>
            </td>
            <?php for($i = 1;  $i<=$days; $i++): ?>
            <?php
                $date = $year.'-'.$month.'-'.$i;
                $y = 0;
            ?>
            <td class="<?php echo e(($i<=18)? 'all':'none'); ?>">
                <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(strtotime($value->attendance_date) == strtotime($date)): ?>
                        <?php echo e($value->attendance_type); ?>

                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </td>
            <?php endfor; ?>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
    </table>
</div>  
</body>
</html>
    

<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\studentInformation\student_attendance_print.blade.php ENDPATH**/ ?>
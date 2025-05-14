<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>" <?php if(userRtlLtl()==1): ?> dir="rtl" class="rtl" <?php endif; ?>>

<head>
    <title><?php echo app('translator')->get('hr.staff_attendance'); ?> </title>
    <meta charset="utf-8">
</head>

<style>
table,
th,
tr,
td {
    font-size: 11px !important;
    padding: 0px !important;
    text-align: center !important;
}

#attendance.th,
#attendance.tr,
#attendance.td {
    font-size: 10px !important;
    padding: 0px !important;
    text-align: center !important;
    border: 1px solid #ddd;
    vertical-align: middle !important;
}

#attendance th {
    background: #ddd;
    text-align: center;
}

#attendance {
    border: 1px solid black;
    border-collapse: collapse;
}

#attendance tr {
    border: 1px solid black;
    border-collapse: collapse;
}

#attendance th {
    border: 1px solid black;
    border-collapse: collapse;
    text-align: center !important;
    font-size: 11px;
}

#attendance td {
    border: 1px solid black;
    border-collapse: collapse;
    text-align: center;
    font-size: 10px;
}
</style>

<script>
var is_chrome = function() {
    return Boolean(window.chrome);
}
if (is_chrome) {
    window.print();
    // setTimeout(function(){window.close();}, 10000); 
    //give them 10 seconds to print, then close
} else {
    window.print();
}
</script>

<body onLoad="loadHandler();" style="font-family: 'dejavu sans', sans-serif;">
    <div class="container-fluid">

        <table cellspacing="0" width="100%">
            <tr>
                <td>
                    <img class="logo-img" style="max-width: 120px" src="<?php echo e(url('/')); ?>/<?php echo e(generalSetting()->logo); ?>"
                        alt="">
                </td>
                <td>
                    <h3 style="font-size:22px !important" class="text-white">
                        <?php echo e(isset(generalSetting()->school_name)?generalSetting()->school_name:'Infix School Management ERP'); ?>

                    </h3>
                    <p style="font-size:18px !important" class="text-white mb-0">
                        <?php echo e(isset(generalSetting()->address)?generalSetting()->address:'Infix School Address'); ?> </p>
                </td>
                <td style="text-aligh:center">
                    <p style="font-size:14px !important; border-bottom:1px solid gray" align="left" class="text-white">
                        <?php echo app('translator')->get('common.role'); ?>: <?php echo e($role->name); ?> </p>
                    <p style="font-size:14px !important; border-bottom:1px solid gray" align="left" class="text-white">
                        <?php echo app('translator')->get('hr.month'); ?>: <?php echo e(date("F", strtotime('00-'.$month.'-01'))); ?> </p>
                    <p style="font-size:14px !important; border-bottom:1px solid gray" align="left" class="text-white">
                        <?php echo app('translator')->get('common.year'); ?>: <?php echo e($year); ?> </p>

                </td>
            </tr>
        </table>


        <h3 style="text-align:center"><?php echo app('translator')->get('hr.staff_attendance_report'); ?></h3>

        <table id="attendance" style="width: 100%; table-layout: fixed">


            <tr>
                <th width="7%"><?php echo app('translator')->get('hr.staff_name'); ?></th>
                <th width="7%"><?php echo app('translator')->get('hr.staff_no'); ?></th>
                <th><?php echo app('translator')->get('hr.P'); ?></th>
                <th><?php echo app('translator')->get('hr.L'); ?></th>
                <th><?php echo app('translator')->get('hr.A'); ?></th>
                <th><?php echo app('translator')->get('hr.H'); ?></th>
                <th><?php echo app('translator')->get('hr.F'); ?></th>
                <th width="5%">%</th>
                <?php for($i = 1; $i<=$days; $i++): ?> <th class="<?php echo e(($i<=18)? 'all':'none'); ?>">
                    <?php echo e($i); ?> <br>
                    <!-- <?php
                                    $date = $year.'-'.$month.'-'.$i;
                                    $day = date("D", strtotime($date));
                                    echo $day;
                                ?> -->
                    </th>
                    <?php endfor; ?>
            </tr>

            <?php $__currentLoopData = $attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $total_attendance = 0; ?>
            <?php $count_absent = 0; ?>
            <tr>
                <td>
                    <?php $student = 0; ?>
                    <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $student++; ?>
                    <?php if($student == 1): ?>
                    <?php echo e($value->staffInfo->full_name); ?>

                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td>
                <td>
                    <?php $student = 0; ?>
                    <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $student++; ?>
                    <?php if($student == 1): ?>
                    <?php echo e($value->staffInfo->staff_no); ?>

                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td>
                <td>
                    <?php $p = 0; ?>
                    <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($value->attendence_type == 'P'): ?>
                    <?php $p++; $total_attendance++; ?>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($p); ?>

                </td>
                <td>
                    <?php $l = 0; ?>
                    <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($value->attendence_type == 'L'): ?>
                    <?php $l++; $total_attendance++; ?>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($l); ?>

                </td>
                <td>
                    <?php $a = 0; ?>
                    <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($value->attendence_type == 'A'): ?>
                    <?php $a++; $count_absent++; $total_attendance++; ?>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($a); ?>

                </td>
                <td>
                    <?php $h = 0; ?>
                    <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($value->attendence_type == 'H'): ?>
                    <?php $h++; $total_attendance++; ?>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($h); ?>

                </td>
                <td>
                    <?php $f = 0; ?>
                    <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($value->attendence_type == 'F'): ?>
                    <?php $f++; $total_attendance++; ?>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($f); ?>

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
                <?php for($i = 1; $i<=$days; $i++): ?> <?php $date=$year.'-'.$month.'-'.$i; ?> <td
                    class="<?php echo e(($i<=18)? 'all':'none'); ?>">
                    <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(strtotime($value->attendence_date) == strtotime($date)): ?>
                    <?php echo e($value->attendence_type); ?>

                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                    <?php endfor; ?>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </table>
    </div>


</body>

</html><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\humanResource\staff_attendance_print.blade.php ENDPATH**/ ?>
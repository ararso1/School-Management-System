<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo app('translator')->get('student.student_attendance'); ?>  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style>
 table,th,tr,td{
     font-size: 11px !important;
     padding: 0px !important;
     text-align: center !important; 
 }
</style>
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
    .nowrap{
        white-space: nowrap;
    }
   </style>
<body style="font-family: 'dejavu sans', sans-serif;">
<?php
    $generalSetting= generalSetting(); 
    if(!empty($generalSetting)){
        $school_name =$generalSetting->school_name;
        $site_title =$generalSetting->site_title;
        $school_code =$generalSetting->school_code;
        $address =$generalSetting->address;
        $phone =$generalSetting->phone; 
    } 
    $class=DB::table('sm_classes')->find($class_id);
    $section=DB::table('sm_sections')->find($section_id);
?>
<div class="container-fluid">
                    <table  cellspacing="0" width="100%" >
                        <tr>
                            <td> 
                                <img class="logo-img" src="<?php echo e(url('/')); ?>/<?php echo e(generalSetting()->logo); ?>" alt=""> 
                            </td>
                            <td> 
                                <h3 style="font-size:22px !important" class="text-white"> <?php echo e(isset(generalSetting()->school_name)?generalSetting()->school_name:'Infix School Management ERP'); ?> </h3> 
                                <p style="font-size:18px !important" class="text-white mb-0"> <?php echo e(isset(generalSetting()->address)?generalSetting()->address:'Infix School Address'); ?> </p> 
                                <p style="font-size:15px !important" class="text-white mb-0"><?php echo app('translator')->get('student.student_attendance'); ?> </p>
                          </td>
                            <td style="text-aligh:center"> 
                                <?php if(moduleStatusCheck('University')): ?>
                                    <p style="font-size:14px !important; border-bottom:1px solid gray" align="left" class="text-white"><?php echo e(__('university::un.department')); ?>:<?php echo e(isset($unSemesterLabel) ? $unSemesterLabel->departmentDetails->name .'('. (isset($unDepartment) ? $unDepartment->name:'').')':''); ?> </p>
                
                                    <p style="font-size:14px !important; border-bottom:1px solid gray" align="left" class="text-white"><?php echo app('translator')->get('university::un.semester(label)'); ?>: <?php echo e(isset($unSemesterLabel) ? $unSemesterLabel->semesterDetails->name .'('. (isset($unSemesterLabel) ? $unSemesterLabel->name : '') .')' :''); ?> </p>
                                <?php else: ?>                                   
                                <p style="font-size:14px !important; border-bottom:1px solid gray" align="left" class="text-white">Class: <?php echo e($class->class_name); ?> </p> 
                                <p style="font-size:14px !important; border-bottom:1px solid gray" align="left" class="text-white">Section: <?php echo e($section->section_name); ?> </p> 
                                <?php endif; ?>
                                <p style="font-size:14px !important; border-bottom:1px solid gray" align="left" class="text-white">Month: <?php echo e(date("F", strtotime('00-'.$month.'-01'))); ?> </p> 
                                <p style="font-size:14px !important; border-bottom:1px solid gray" align="left" class="text-white">Year: <?php echo e($year); ?> </p>
                          </td>
                        </tr>
                    </table>
                    <table style="width: 100%; table-layout: fixed" id="attendance">
                        <thead>
                                <tr>
                                    <th width="3%">SL</th>
                                    <th width="8%"><?php echo app('translator')->get('common.name'); ?></th>
                                    <th width="10%"><?php echo app('translator')->get('student.admission_no'); ?></th>
                                    <th width="3%">P</th>
                                    <th width="3%">L</th>
                                    <th width="3%">A</th>
                                    <th width="3%">F</th>
                                    <th width="3%">H</th>
                                    <th width="5%">%</th>
                                    <?php for($i = 1;  $i<=$days; $i++): ?>
                                    <th width="3%" class="<?php echo e(($i<=18)? 'all':'none'); ?> nowrap">
                                        <?php echo e($i); ?> <br>
                                        <?php
                                            $date = $year.'-'.$month.'-'.$i;
                                            $day = date("D", strtotime($date));
                                            echo substr($day,0,2);
                                        ?>
                                    </th>
                                    <?php endfor; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $total_grand_present = 0; 
                                $total_late = 0; 
                                $total_absent = 0; 
                                $total_holiday = 0; 
                                $total_halfday = 0; 
                                $countstudent=1;
                                ?>
                                <?php $__currentLoopData = $attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $total_attendance = 0; ?>
                                <?php $count_absent = 0; ?>
                                <tr>
                                <td><?php echo e($countstudent++); ?></td>
                                    <td>
                                        <?php $student = 0; ?>
                                        <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $student++; ?>
                                            <?php if($student == 1): ?>
                                                <?php echo e(@$value->student->full_name); ?>

                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       
                                    </td>
                                    <td>
                                        <?php $student = 0; ?>
                                        <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $student++; ?>
                                            <?php if($student == 1): ?>
                                                <?php echo e(@$value->student->admission_no); ?>

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
                                        ?>
                                            <?php echo e($total_present.'/'.$total_attendance); ?>

                                            <hr>
                                        <?php
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
                                    <td width="3%" class="<?php echo e(($i<=18)? 'all':'none'); ?>">
                                        <?php
                                            $date_present=0;
                                            $date_absent=0;
                                            $date_total_class=0;
                                        ?>
                                        <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(strtotime($value->attendance_date) == strtotime($date)): ?>
                                            <?php
                                                if($value->attendance_type=='P' || $value->attendance_type=='F' || $value->attendance_type=='L'){
                                                    $date_present++;
                                                }else{
                                                    $date_absent++;
                                                }
                                                $date_total_class=$date_present+$date_absent;
                                            ?>
                                                
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                
                                        <?php if($date_total_class!=0): ?>
                                        <?php echo e($date_present.'/'.$date_total_class); ?>

                                        <hr>
                                        <?php
                                        if($date_absent == 0){
                                            echo '100%';
                                        }else{
                                            // echo $date_present;
                                            if ($date_present!=0) {
                                            
                                                $date_percentage = $date_present / $date_total_class * 100;
                                                echo @number_format((float)$date_percentage, 2, '.', '').'%';
                                            }else{
                                                echo '0%';
                                            }
                                        }
                                    ?>
                                        <?php endif; ?>
                                    </td>
                                    <?php endfor; ?>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                    </table>
        </div>
</body>
</html>
    

<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\studentInformation\student_subject_attendance.blade.php ENDPATH**/ ?>
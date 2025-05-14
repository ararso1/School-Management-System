<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo app('translator')->get('exam.exam_schedule'); ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/print/bootstrap.min.css"/>
  <script type="text/javascript" src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/print/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/print/bootstrap.min.js"></script>
</head>
<style>
 table,th,tr,td{
     font-size: 11px !important;
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
    $exam=App\SmExamType::find(@$exam_id);
    $class=App\SmClass::find(@$class_id);
    
    if($section_id==0){
        $section='All Sections';
    }else{
        $section=App\SmSection::find(@$section_id);
        $section=$section->section_name;
    }
?>
<div class="container-fluid" id="pdf">
                    
                    <table  cellspacing="0" width="100%">
                        <tr>
                            <td> 
                                <img class="logo-img" src="<?php echo e(url('/')); ?>/<?php echo e(@generalSetting()->logo); ?>" alt=""> 
                            </td>
                            <td> 
                                <h3 style="font-size:22px !important" class="text-white"> <?php echo e(isset(generalSetting()->school_name)?generalSetting()->school_name:'Infix School Management ERP'); ?> </h3> 
                                <p style="font-size:18px !important" class="text-white mb-0"> <?php echo e(isset(generalSetting()->address)?generalSetting()->address:'Infix School Address'); ?> </p> 
                                <p style="font-size:15px !important" class="text-white mb-0"> <?php echo app('translator')->get('exam.exam_schedule'); ?> </p> 
                          </td>
                            <td style="text-aligh:center"> 
                                <p style="font-size:14px !important; border-bottom:1px solid gray;" align="left" class="text-white"><?php echo app('translator')->get('exam.exam'); ?> :  <?php echo e(@$exam->title); ?> </p> 
                                <p style="font-size:14px !important; border-bottom:1px solid gray" align="left" class="text-white"><?php echo app('translator')->get('common.class'); ?>: <?php echo e(@$class->class_name); ?> </p> 
                                <p style="font-size:14px !important; border-bottom:1px solid gray" align="left" class="text-white"><?php echo app('translator')->get('common.section'); ?>: <?php echo e(@$section); ?> </p> 
                                <p style="font-size:14px !important; border-bottom:1px solid gray" align="left" class="text-white"><?php echo app('translator')->get('common.academic_year'); ?>: <?php echo e(@$academic_year->title); ?> (<?php echo e(@$academic_year->year); ?>) </p> 
                               
                          </td>
                        </tr>
                    </table>

                    <hr>
                <table class="table table-bordered table-striped" cellspacing="0" width="100%">
                    
                         
                        <tr>
                            <th width="10%"><?php echo app('translator')->get('common.subject'); ?></th>
                            <?php if($section_id==0): ?>
                            <th width="10%"><?php echo app('translator')->get('common.class_Sec'); ?></th>
                            <?php endif; ?>
                            <?php $__currentLoopData = $exam_periods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam_period): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <th style="text-align:center" nowrap><?php echo e(@$exam_period->period); ?><br><?php echo e(date('h:i A', strtotime(@$exam_period->start_time))); ?><br>To<br><?php echo e(date('h:i A', strtotime(@$exam_period->end_time))); ?></th>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                        <?php $__currentLoopData = $assign_subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assign_subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td ><?php echo e(@$assign_subject->subject !=""?@$assign_subject->subject->subject_name:""); ?></td>
                            <?php if($section_id==0): ?>
                            <td><?php echo e($assign_subject->class->class_name.'('.$assign_subject->section->section_name.')'); ?></td>
                            <?php endif; ?>
                            <?php $__currentLoopData = $exam_periods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam_period): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                $assigned_routine = App\SmExamSchedule::assignedRoutine($class_id, $assign_subject->section_id, $exam_id, $assign_subject->subject_id, $exam_period->id);
                                    // $assigned_routine = getScheduleSubject($class_id, $section_id, $exam_id, $exam_period->id, $exam_date);
                                ?>
                            <td nowrap>
                                <?php if(@$assigned_routine == ""): ?>
                                    
                                <?php else: ?>
                                    <div class="col-lg-6">
                                        <span class=""><?php echo e(@$assigned_routine->classRoom->room_no); ?></span>
                                        <br>
                                        <span class="">
                                            
                                            <?php echo e(@$assigned_routine->date != ""? dateConvert(@$assigned_routine->date):''); ?>


                                        </span></br>
                                        
                                <?php endif; ?>
                            </td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                </table>
        </div>
<script src="<?php echo e(asset('public/vendor/spondonit/js/jquery-3.6.0.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/backEnd/js/pdf/html2pdf.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/backEnd/js/pdf/html2canvas.min.js')); ?>"></script>

<script>
    function generatePDF() {
        const element = document.getElementById('pdf');
        var opt = {
            margin:       0.5,
            pagebreak: { mode: ['avoid-all', 'css', 'legacy'], before: '#page2el' },
            filename:     'exam-schedule.pdf',
            image:        { type: 'jpeg', quality: 100 },
            html2canvas:  { scale: 5 },
            jsPDF:        { unit: 'in', format: 'a4', orientation: 'landscape' }
        };

        html2pdf().set(opt).from(element).save().then(function(){
            // window.close();
        });
    }



    $(document).ready(function(){
        <?php if($print): ?>
        window.print();
        setTimeout(function () {
            window.close()
        }, 3000);
        <?php else: ?>
        generatePDF();
        <?php endif; ?>

    })
</script>

</body>
</html>
    
<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\examination\exam_schedult_print.blade.php ENDPATH**/ ?>
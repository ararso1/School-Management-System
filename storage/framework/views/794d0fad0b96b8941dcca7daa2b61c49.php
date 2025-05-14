<!DOCTYPE html>
<html lang="en">
<head>
  <title>Merit List </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/print/bootstrap.min.css"/>
  <script type="text/javascript" src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/print/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/print/bootstrap.min.js"></script>
</head>
<style>
    body, table, th, td {
        font-size: 10px;
        font-family: 'Poppins', sans-serif;

    }
    
   .marklist th, .marklist td{
        border: 1px solid var(--border_color);  
        text-align: center !important;
        font-family: 'Poppins', sans-serif;
        
    }
    .marklist th{
        text-transform: capitalize;
        text-align: center;  
    }
    .marklist td{
        text-align: center; 
    }
 
 
    .container{ 
        padding-bottom: 50px;
        background: white;
        font-family: 'Poppins', sans-serif;
    }
    h1,h2,h3,h4{

        font-family: "Poppins", sans-serif; 
        margin-bottom: 15px;
    }
    hr{
        margin: 0px;
    }
    .mt-10 {
        margin-top:10px;
    }
    .mb-10{
        margin-bottom:10px;
    }
  


    #grade_table th{
        border: 1px solid black;
        text-align: center;
        background: #351681;
        color: white;
    }
    #grade_table td{
        color: black;
        text-align: center;
        border: 1px solid black;
    }



   .custom_table td {
    border: 1px solid var(--border_color);
    padding: .8rem;
    text-align: center;
  }
  .custom_table th{
    border: 1px solid var(--border_color);
    text-transform: uppercase;
    text-align: center;
  }
  thead{
    font-weight:bold;
    text-align:center;
    color: #222;
    font-size: 10px
  }
  
  table {
    border-collapse: collapse;
  }
  
  .footer {
    text-align:right;
    font-weight:bold;
  }


.custom_table{
    width:100%;
}
.custom_table {
    width: 98%;
    margin: auto;
}
.custom_table th{
    
        border: 1px solid black;
        text-align: center;
        background: #351681;
        color: white;
        font-size: 12px;
        line-height: 1;
        padding: .8rem;
        border-right: 1px solid white;
    }

</style>

<body>

<div class="container"> 
        <table style="width:100%; border:0;"> 
                <tr >
                    
                    <th>
                        <img class="logo-img" src="<?php echo e(url('/')); ?>/<?php echo e(generalSetting()->logo); ?>" alt=""> 
                    </th>
                    <th colspan="2"> 
                        <h3 class="text-white"> <?php echo e(isset(generalSetting()->school_name)?generalSetting()->school_name:'Infix School Management ERP'); ?> </h3> 
                        <p class="text-white mb-0" style="padding-right:10px !important;"> <?php echo e(isset(generalSetting()->address)?generalSetting()->address:'Infix School Address'); ?> </p>
                    </th> 

                </tr>  
                <tr>
                    <td colspan="3"><hr></td>
                </tr>
                <tr>
                    <td  style=" padding:10px; vertical-align:top;">
                        
                        <p class="mb-0" style="padding-right:10px !important; font-size:11px;"> <?php echo app('translator')->get('common.name'); ?> : <span class="primary-color fw-500"><?php echo e($studentDetails->full_name); ?></span> </p>
                        <p class="mb-0" style="padding-right:10px !important; font-size:11px;"> <?php echo app('translator')->get('common.academic_year'); ?> : <span class="primary-color fw-500"><?php echo e(generalSetting()->session_year); ?></span> </p>
                        
                        <p class="mb-0" style="padding-right:10px !important; font-size:11px;"> <?php echo app('translator')->get('common.class'); ?> : <span class="primary-color fw-500"><?php echo e(@$class->class_name); ?></span> </p>
                        <p class="mb-0" style="padding-right:10px !important; font-size:11px;"> <?php echo app('translator')->get('common.section'); ?> : <span class="primary-color fw-500"><?php echo e(@$section->section_name); ?></span> </p>
                    </td>
                    <td  style="  padding:10px; vertical-align:top;"> 
                        <p style="font-weight: 700;"><?php echo app('translator')->get('exam.subjects_list'); ?></p> 
                        <div class="row">
                            <div class="col-md-12 w-100" style="columns: 2">
                                <?php $__currentLoopData = $assign_subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <p class="mb-0" style="padding-right:10px !important; font-size:11px;"> <span class="primary-color fw-500"><?php echo e($subject->subject->subject_name); ?></span> </p>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                            </div>
                        </div>
                    </td>
                    <td  style=" padding:10px; vertical-align:top;">
                         <?php $marks_grade=DB::table('sm_marks_grades')->where('academic_id', getAcademicId())->get(); ?>
                                                    <?php if(@$marks_grade): ?>
                                                        <table class="table  table-bordered table-striped " id="grade_table">
                                                            <thead>
                                                                <tr>
                                                                    <th><?php echo app('translator')->get('exam.starting'); ?></th>
                                                                    <th><?php echo app('translator')->get('exam.ending'); ?></th>
                                                                    <th><?php echo app('translator')->get('exam.gpa'); ?></th>
                                                                    <th><?php echo app('translator')->get('exam.grade'); ?></th>
                                                                    <th><?php echo app('translator')->get('homework.evalution'); ?></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                    
                                                                <?php $__currentLoopData = $marks_grade; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade_d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <tr>
                                                                        <td><?php echo e($grade_d->percent_from); ?></td>
                                                                        <td><?php echo e($grade_d->percent_upto); ?></td>
                                                                        <td><?php echo e($grade_d->gpa); ?></td>
                                                                        <td><?php echo e($grade_d->grade_name); ?></td>
                                                                        <td class="text-left"><?php echo e($grade_d->description); ?></td>
                                                                    </tr>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </tbody>
                                                        </table>
                                                    <?php endif; ?> 
                    </td>
                </tr> 
        </table>


        
        <h4 style=" text-align: center;  padding: 10px;">Student Progress Card</h4> 

       
        <div class="student_marks_table">
            <table class="custom_table">
                <thead>
                  <tr>

                      <?php $__currentLoopData = $assigned_exam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $percentage=0;
                        ?>
                          <?php if($key==0): ?>
                              <?php
                                  $percentage=$custom_result_setup->percentage1;
                              ?>
                          <?php endif; ?>
                          <?php if($key==1): ?>
                              <?php
                              $percentage=$custom_result_setup->percentage2;
                              ?>
                          <?php endif; ?>
                          <?php if($key==2): ?>
                              <?php
                              $percentage=$custom_result_setup->percentage3;
                              ?>
                          <?php endif; ?>
                           <th colspan="<?php echo e($assign_subjects->count()*2+1); ?>" class="full_width" ><?php echo e($item->title); ?> <?php echo e($percentage); ?>% </th>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <th colspan="<?php echo e($assign_subjects->count()*2+1); ?>" class="full_width" >result</th>

                  </tr>
                  <tr>
                      <?php $__currentLoopData = $assign_subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <td colspan="2"><?php echo e($subject->subject_name); ?> </td>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   

                    <td rowspan="2" > GPA </td>

                    <?php $__currentLoopData = $assign_subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <td colspan="2"><?php echo e($subject->subject_name); ?> </td>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <td rowspan="2" > GPA </td>

                    <?php $__currentLoopData = $assign_subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <td colspan="2"><?php echo e($subject->subject_name); ?> </td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <td rowspan="2" > GPA </td>

                    <td rowspan="4" > GPA </td>
                  </tr>
                </thead>
                <tbody>
                    <?php
                        $final_result=0;
                    ?>
                  <tr>
                     <?php $__currentLoopData = $assigned_exam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                      <?php $__currentLoopData = $assign_subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <td >Mark</td>
                          <td >GPA</td>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   
                 <td rowspan="2" >
                      <?php
                            $percentage=0;
                        ?>
                          <?php if($key==0): ?>
                              <?php
                                  $percentage='percentage1';
                              ?>
                          <?php endif; ?>
                          <?php if($key==1): ?>
                              <?php
                              $percentage='percentage2';
                              ?>
                          <?php endif; ?>
                          <?php if($key==2): ?>
                              <?php
                              $percentage='percentage3';
                              ?>
                          <?php endif; ?>
                      <?php
                          $term_gpa=App\CustomResultSetting::termResult($exam->exam_type_id,$input_class,$input_section,$input_student,$assign_subjects->count());
                          echo number_format((float)$term_gpa, 2, '.', '');
                          $term_final_gpa=App\CustomResultSetting::getFinalResult($exam->exam_type_id,$input_class,$input_section,$input_student,$percentage);
                          $final_result= $final_result+ $term_final_gpa;
                      ?>
                 </td>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                    


              <td rowspan="2" ><?php echo e(number_format((float)$final_result, 2, '.', '')); ?></td>
                  </tr>
                  <?php $__currentLoopData = $assigned_exam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php $__currentLoopData = $assign_subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <td >
                              <?php
                                  $gpa=App\CustomResultSetting::getSubjectGpa($exam->exam_type_id,$input_class,$input_section,$input_student,$subject->subject_id);
                                  $subject_mark=$gpa[$subject->subject_id][0];
                                  $subject_gpa=$gpa[$subject->subject_id][1];
                                  echo $subject_mark;
                              ?>
                          </td>
                          <td >
                              <?php
                                  $grade=App\CustomResultSetting::getDrade($subject_mark);
                                  echo $grade;
                              ?>
                          </td>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                         
                 
                </tbody>
              </table>
          </div> 
                                       


        <table style="width:100%">
            <tr> 
                <td> 
                    <p style="padding-top:10px; text-align:right; float:right; border-top:1px solid #ddd; display:inline-block; margin-top:50px;">( Exam Controller )</p> 
                </td>
            </tr>

        </table>
       
               
 

</body>
</html>
    
<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\reports\custom_progeress_backup.blade.php ENDPATH**/ ?>
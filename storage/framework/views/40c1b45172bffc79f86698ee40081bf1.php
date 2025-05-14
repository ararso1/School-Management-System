<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo app('translator')->get('exam.merit_list'); ?> </title>
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
    padding: .3rem;
    text-align: center;
  }
  .custom_table th{
    border: 1px solid var(--border_color);
    /* text-transform: uppercase; */
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
        font-size: 10px;
        line-height: 1;
        padding: .5rem;
    }

</style>

<body style="font-family: 'dejavu sans', sans-serif;">

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

                        <p class="mb-0" style="padding-right:10px !important; font-size:11px;"> <?php echo app('translator')->get('common.academic_year'); ?> : <span class="primary-color fw-500"><?php echo e(@generalSetting()->academic_Year->year ?? ''); ?></span> </p>
                        
                        <p class="mb-0" style="padding-right:10px !important; font-size:11px;"> <?php echo app('translator')->get('common.class'); ?> : <span class="primary-color fw-500"><?php echo e(@$class_name); ?></span> </p>
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
                         <?php $marks_grade=DB::table('sm_marks_grades')->where('academic_id', getAcademicId())->orderBy('gpa','desc')->get(); ?>
                                                    <?php if(@$marks_grade): ?>
                                                        <table class="table  table-bordered table-striped " id="grade_table">
                                                            <thead>
                                                                <tr>
                                                                    <th><?php echo app('translator')->get('exam.starting'); ?></th>
                                                                    <th><?php echo app('translator')->get('reports.ending'); ?></th>
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



        <h4 style=" text-align: center;  padding: 10px;"><?php echo app('translator')->get('exam.student_merit_list'); ?></h4>


        <div class="student_marks_table">
            <table class="custom_table">
              <thead>
                <tr>
                  <th colspan="" class="full_width" ><?php echo app('translator')->get('common.sl'); ?></th>
                  <th colspan="" class="full_width" ><?php echo app('translator')->get('student.admission_no'); ?></th>
                  <th colspan="" class="full_width" ><?php echo app('translator')->get('common.student'); ?></th>
                  <th colspan="" class="full_width" ><?php echo app('translator')->get('exam.first_term'); ?> (<?php echo e($custom_result_setup->percentage1); ?>%)</th>
                  <th colspan="" class="full_width" ><?php echo app('translator')->get('exam.second_term'); ?> (<?php echo e($custom_result_setup->percentage2); ?>%)</th>
                  <th colspan="" class="full_width" ><?php echo app('translator')->get('exam.third_term'); ?> (<?php echo e($custom_result_setup->percentage3); ?>%)</th>
                  <th colspan="" class="full_width" ><?php echo app('translator')->get('exam.final_result'); ?></th>
                  <th colspan="" class="full_width" ><?php echo app('translator')->get('exam.grade'); ?></th>
                </tr>
              </thead>
              <tbody>
                  <?php $count=1; ?>
                  <?php $__currentLoopData = $customresult; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                 <td ><?php echo e($count++); ?></td>
                <td ><?php echo e(@$row->admission_no); ?></td>
                <td ><?php echo e(@$row->full_name); ?></td>
                <td ><?php echo e(@$row->gpa1); ?></td>
                <td ><?php echo e(@$row->gpa2); ?></td>
                <td ><?php echo e(@$row->gpa3); ?></td>
                <td ><?php echo e(@$row->final_result); ?></td>
                <td ><?php echo e(@$row->final_grade); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>



        <table style="width:100%">
            <tr>
                <td>
                    <p style="padding-top:10px; text-align:right; float:right; border-top:1px solid #ddd; display:inline-block; margin-top:50px;">( <?php echo app('translator')->get('exam.exam_controller'); ?> )</p>
                </td>
            </tr>

        </table>




</body>
</html>

<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\reports\custom_merit_list_report_print.blade.php ENDPATH**/ ?>
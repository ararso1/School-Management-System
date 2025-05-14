<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo app('translator')->get('exam.final_mark_sheet'); ?></title>
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
          max-width: 1200px;
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
      .table_border tfoot{
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
          border-bottom: 1px solid #000 !important;
      }
      th p span, td p span{
          color: #212E40;
      }
      .table th {
          color: #00273d;
          font-weight: 300;
          border-bottom: 1px solid #f1f2f3 !important;
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
          display: grid;
          grid-template-columns: 140px auto;
          grid-gap: 10px;
      }
      .line_grid span{
          display: flex;
          justify-content: space-between;
          align-items: center;
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
          padding: 12px 6px;
      }

      .border_table tfoot tr th {
          padding: 12px 10px;
      }
      .border_table tbody tr td {
          border-bottom: 1px solid rgba(0, 0, 0,.05);
          text-align: center;
          padding: 10px;
      }
      .logo_img{
          display: flex;
          align-items: center;
      }
      .logo_img h3{
          font-size: 25px;
          margin-bottom: 5px;
          color: #79838b;
      }
      .logo_img h5{
          font-size: 14px;
          margin-bottom: 0;
          color: #79838b;
      }
      .company_info{
          margin-left: 20px;
      }
      .table_title{
          text-align: center;
      }
      .table_title h3{
          font-size: 35px;
          font-weight: 600;
          text-transform: uppercase;
          padding-bottom: 3px;
          display: inline-block;
          margin-bottom: 40px;
          color: #79838b;
      }

      .line_grid{
          display: flex;
          grid-gap: 10px;
          font-weight: 500;
          font-weight: 600;
          color: var(--base_color);
          font-size: 14px
      }
      .line_grid span{
          font-weight: 500;
      }
      .line_grid span{
          display: flex;
          justify-content: space-between;
          align-items: center;
          flex: 0px 0 0;
      }
      .line_grid span:first-child{
          font-weight: 500;
          color: #828bb2;
          font-size: 14px;
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
          margin-bottom: 0;
          color: #fff;
      }
      .company_info {
          margin-left: 100px;
          flex: 1 1 0;
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
      }

      .gray_header_table tfoot th{
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
          text-align: left !important;
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

      .gray_header_table tfoot tr:first-child th {
          border: 0 !important;
      }

      .gray_header_table thead tr:last-child th {
          border-bottom: 1px solid rgba(67, 89, 187, 0.15) !important;
      }
      .gray_header_table tfoot tr:last-child th {
          border-bottom: 1px solid rgba(67, 89, 187, 0.15) !important;
      }

      
      .single-report-admit table tr td {
          vertical-align: middle;
          font-size: 12px;
          color: #828BB2;
          font-weight: 400;
          border: 0;
          border-bottom: 1px solid rgba(130, 139, 178, 0.15) !important;
          text-align: left;
      }
      .border_table thead tr:first-of-type th:first-child,
      .border_table thead tr:first-of-type th:last-child{
          border-bottom: 1px solid rgba(130, 139, 178, 0.15) !important;
      }

      .border_table tfoot tr:first-of-type th:first-child,
      .border_table tfoot tr:first-of-type th:last-child{
          border-bottom: 1px solid rgba(130, 139, 178, 0.15) !important;
      }

  </style>
</head>
<script>
        var is_chrome = function () { return Boolean(window.chrome); }
        if(is_chrome) 
        {
           window.print();
        //    setTimeout(function(){window.close();}, 10000); 
        }
        else
        {
           window.print();
        //    window.close();
        }
</script>


<body onLoad="loadHandler();">
    <div class="invoice_wrapper">
        <div class="invoice_print mb-0">
            <div class="container">
                <div class="invoice_part_iner">
                    <table class="table border_bottom mb-0" >
                        <thead>
                            <td style="padding: 0">
                                <div class="logo_img">
                                    <div class="thumb_logo">
                                        <img  src="<?php echo e(asset('/')); ?><?php echo e(generalSetting()->logo); ?>" alt="<?php echo e(generalSetting()->school_name); ?>">
                                    </div>
                                    <div class="company_info">
                                        <h3><?php echo e(isset(generalSetting()->school_name)? generalSetting()->school_name:'Infix School Management ERP'); ?> </h3>
                                        <h5><?php echo e(isset(generalSetting()->address)? generalSetting()->address:'Infix School Address'); ?></h5>
                                        <h5>
                                            <?php echo app('translator')->get('common.email'); ?>: <?php echo e(isset(generalSetting()->email)?generalSetting()->email:'hello@aorasoft.com'); ?> 
                                            <?php echo app('translator')->get('common.phone'); ?>: <?php echo e(isset(generalSetting()->phone)?generalSetting()->phone:'+96897002784'); ?>

                                        </h5>
                                    </div>
                                </div>
                            </td>
                        </thead>
                    </table>
                </div>
            </div>
        </div>


    <div class="meritTableBody">
              
              <table class="table">
                <tbody>
                    <tr>
                        <td>
                           <!-- single table  -->
                           <table class="mb_30 max-width-500 mr_auto">
                               <tbody>
                                   <tr>
                                       <td colspan="2">
                                            <p class="line_grid_update" style="text-align:center">
                                                <?php echo app('translator')->get('exam.final_mark_sheet'); ?>
                                            </p>
                                        </td>
                                   </tr>


                                 <?php if(moduleStatusCheck('University')): ?>

                                 <tr>
                                    <td>
                                         <p class="line_grid" >
                                             <span>
                                                 <span><?php echo app('translator')->get('university::un.session'); ?></span>
                                                 <span>:</span>
                                             </span>
                                             <?php echo e($data['session']); ?>

                                         </p>
                                     </td>
                                     <td>
                                         <p class="line_grid" >
                                             <span>
                                                 <span><?php echo app('translator')->get('university::un.faculty'); ?></span>
                                                 <span>:</span>
                                             </span>
                                             <?php echo e($data['faculty']); ?> (<?php echo e($data['department']); ?>)
                                         </p>
                                     </td>

                                     
                                </tr>
                                <tr>
                                     
                                     <td>
                                         <p class="line_grid" >
                                             <span>
                                                 <span><?php echo app('translator')->get('university::un.semester'); ?></span>
                                                 <span>:</span>
                                             </span>
                                             <?php echo e($data['semester']); ?> (<?php echo e($data['semester_label']); ?>)
                                         </p>
                                     </td>
                                     <td>
                                         <p class="line_grid" >
                                             <span>
                                                 <span><?php echo app('translator')->get('exam.examination'); ?></span>
                                                 <span>:</span>
                                             </span>
                                             <?php if(count($result_setting)): ?>
                                             <?php $__currentLoopData = $result_setting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <?php echo e(@$exam->examTypeName->title); ?>,
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                           <?php else: ?>
                                               <?php $__currentLoopData = examTypes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                               <?php echo e(@$exam->title); ?>,
                                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                           <?php endif; ?>
                                         </p>
                                     </td>
                                </tr>
                                <tr>
                                     
                                     <td>
                                         <p class="line_grid" >
                                             <span>
                                                 <span><?php echo app('translator')->get('student.students'); ?></span>
                                                 <span>:</span>
                                             </span>
                                             <?php echo e(count( $finalMarkSheets)); ?>

                                         </p>
                                     </td>
                                     <td>
                                        <p class="line_grid" >
                                            <span>
                                                <span><?php echo app('translator')->get('student.section'); ?></span>
                                                <span>:</span>
                                            </span>
                                            <?php if(!is_null($section)): ?>
                                                <?php echo e(@$section->section_name); ?>

                                            <?php endif; ?> 
                                        </p>
                                     </td>
                                </tr> 


                                   <?php else: ?> 
                                   <tr>
                                    <td>
                                         <p class="line_grid" >
                                             <span>
                                                 <span><?php echo app('translator')->get('common.academic_year'); ?></span>
                                                 <span>:</span>
                                             </span>
                                             <?php echo e(@generalSetting()->academic_year->year); ?>

                                         </p>
                                     </td>
                                     <td>
                                         <p class="line_grid" >
                                             <span>
                                                 <span><?php echo app('translator')->get('exam.examination'); ?></span>
                                                 <span>:</span>
                                             </span>
                                             <?php if(count($result_setting)): ?>
                                             <?php $__currentLoopData = $result_setting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <?php echo e(@$exam->examTypeName->title); ?>,
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                           <?php else: ?>
                                               <?php $__currentLoopData = examTypes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                               <?php echo e(@$exam->title); ?>,
                                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                           <?php endif; ?>
                                         </p>
                                     </td>
                                </tr>
                                <tr>
                                     
                                     <td>
                                         <p class="line_grid" >
                                             <span>
                                                 <span><?php echo app('translator')->get('common.class'); ?></span>
                                                 <span>:</span>
                                             </span>
                                             <?php echo e(@$class->class_name); ?>

                                         </p>
                                     </td>
                                     <td>
                                         <p class="line_grid" >
                                             <span>
                                                 <span><?php echo app('translator')->get('common.section'); ?></span>
                                                 <span>:</span>
                                             </span>
                                             <?php if(!is_null($section)): ?>
                                             <?php echo e($section->section_name); ?>

                                             <?php else: ?> 
                                                 <?php if(@$class->groupclassSections): ?>
                                                       <?php $__currentLoopData = $class->groupclassSections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                       <?php echo e(@$section->sectionName->section_name); ?> ,
                                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                 <?php endif; ?>
                                                 <?php endif; ?> 
                                         </p>
                                     </td>
                                </tr>
                                <tr>
                                     
                                     <td>
                                         <p class="line_grid" >
                                             <span>
                                                 <span><?php echo app('translator')->get('student.students'); ?></span>
                                                 <span>:</span>
                                             </span>
                                             <?php echo e(count( $finalMarkSheets)); ?>

                                         </p>
                                     </td>
                                     <td>
                                         
                                     </td>
                                </tr> 


                                   <?php endif; ?> 



                               </tbody>
                           </table>
                           <!--/ single table  -->
                        </td>
                        <td>
                            <!-- single table  -->
                            <?php if(@$grades): ?>
                            <table class="table border_table gray_header_table mb_30 max-width-400 ml_auto gradeTable_minimal" >
                                <thead>
                                    <tr>
                                        <th><?php echo app('translator')->get('exam.starting'); ?></th>
                                        <th><?php echo app('translator')->get('reports.ending'); ?></th>
                                        <?php if(@generalSetting()->result_type != 'mark'): ?>
                                            <th><?php echo app('translator')->get('exam.gpa'); ?></th>
                                            <th><?php echo app('translator')->get('exam.grade'); ?></th>
                                        <?php endif; ?>
                                        <th><?php echo app('translator')->get('homework.evalution'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($d->percent_from); ?></td>
                                            <td><?php echo e($d->percent_upto); ?></td>
                                            <?php if(@generalSetting()->result_type != 'mark'): ?>
                                                <td><?php echo e($d->gpa); ?></td>
                                                <td><?php echo e($d->grade_name); ?></td>
                                            <?php endif; ?>
                                            <td><?php echo e($d->description); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <?php endif; ?>
                            <!--/ single table  -->
                        </td>
                    </tr>
                </tbody>
          </table>

    



        <?php if(isset($finalMarkSheets)): ?>
        <div class="single-report-admit">
            <table class="table border_table gray_header_table mb-0">
                <thead>
                    <tr>
                          <th><?php echo app('translator')->get('common.name'); ?></th>
                          <th><?php echo app('translator')->get('student.admission_no'); ?></th>
                          <th><?php echo app('translator')->get('exam.id_no'); ?></th>
                          <th><?php echo app('translator')->get('exam.position'); ?></th>
                          <?php $__currentLoopData = $assigned_subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assigned_subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <th>
                                <?php echo e(@$assigned_subject->subject->subject_name); ?>

                          </th>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <th><?php echo app('translator')->get('exam.average'); ?></th>
                          <th><?php echo app('translator')->get('exam.result'); ?></th>
                          <th><?php echo app('translator')->get('exam.grade'); ?></th>
                         
                    </tr>  
              </thead>
              <tbody>
                <?php $__currentLoopData = $finalMarkSheets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $finalMarkSheet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                          <td><?php echo e(@$finalMarkSheet->get('student_name')); ?></td>
                          <td><?php echo e(@$finalMarkSheet->get('admission_no')); ?></td>
                          <td><?php echo e(@$finalMarkSheet->get('roll_no')); ?></td>
                          <td><?php echo e($loop->iteration); ?></td>
                          <?php $allsubjectMark = 0 ;  ?> 
                          <?php $__currentLoopData = $finalMarkSheet->get('subjects'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         
                          <td>
                               <?php echo e($subject->get('exam_mark')); ?> 
                          </td>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         
                          <td> <?php echo e(number_format($finalMarkSheet->get('avg_mark'),2)); ?></td>
                          <td> <?php if($finalMarkSheet->get('avg_mark') >= avgSubjectPassMark($all_subject_ids)): ?>
                            <?php echo app('translator')->get('exam.pass'); ?>
                            <?php else: ?> 
                            <?php echo app('translator')->get('exam.fail'); ?>
                            <?php endif; ?> 
                          </td>
              
                          <td><?php echo e(getGrade($finalMarkSheet->get('avg_mark'),true)); ?></td>
                    </tr>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
              </table>
          </div>
            
        
        <?php endif; ?>



    </div>
    </div>
</body>
</html>


<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\examination\finalMarkSheetPrint.blade.php ENDPATH**/ ?>
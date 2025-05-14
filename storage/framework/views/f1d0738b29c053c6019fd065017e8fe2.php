<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="<?php echo e(asset('/')); ?>/public/backEnd/css/report/bootstrap.min.css">
    <title><?php echo app('translator')->get('hr.payslip'); ?></title>
    <style>
    *{
      margin: 0;
      padding: 0;
    }
    body{
      font-size: 12px;
      font-family: 'Poppins', sans-serif;
    }
    .student_marks_table{
      /* width: 50%;
      margin: 30px auto 0 auto; */
    }
    .text_center{
      text-align: center;
    }
    p{
      margin: 0;
      font-size: 12px;
      text-transform: capitalize;
    }
    ul{
      margin: 0;
      padding: 0;
    }
    li{
      list-style: none;
    }
    td {
    border: 1px solid var(--border_color);
    padding: .8rem;
    text-align: center;
  }
  th{
    border: 1px solid var(--border_color);
    text-align: center;
    padding: 1rem;
    white-space: nowrap;
  }
  thead{
    font-weight:bold;
    text-align:center;
    color: #222;
    font-size: 10px
  }
  .custom_table{
    width: 100%;
  }
  table.custom_table thead th {
    padding-right: 0;
    padding-left: 0;
  }
  table.custom_table thead tr > th {
    border: 0;
    padding: 0;
}

table.custom_table thead tr th .fees_title{
  font-size: 12px;
  font-weight: 600;
  border-top: 1px solid #726E6D;
  padding-top: 10px;
  margin-top: 10px;
}
.border-top{
  border-top: 0 !important;
}
  .custom_table th ul li {
  }
  .custom_table th ul li p {
    margin-bottom: 10px;
    font-weight: 500;
    font-size: 14px;
}

tbody td{
  padding: 0.8rem;
}
table{
  border-spacing: 10px;
  width: 65%;
  margin: auto;
}
.fees_pay{
  text-align: center;
}
.border-0{
  border: 0 !important;
}
.copy_collect{
  text-align: center;
  font-weight: 500;
  color: #000;
}

.copyies_text{
  display: flex;
  justify-content: space-between;
  margin: 30px 0;
}
.copyies_text li{
  text-transform: capitalize;
  color: #000;
  font-weight: 500;
  border-top: 1px dashed #ddd;
}
.text_left{
    text-align: left;
}
.italic_text{
}
.student_info{
    
}
.student_info li{
    display: flex;
}
.info_details {
    display: flex;
    flex-wrap: wrap;
    margin-top: 30px;
    margin-bottom: 30px;
    margin: 0;
    padding-left: 0px;
}

.info_details li > p{
    flex-basis: 20%;
}
.info_details li{
    display: flex;
    flex-basis: 50%;
}
.school_name{
    text-align: center;
}
.numbered_table_row{
    display: flex;
    justify-content: space-between;
    margin-top: 10px;
}
.numbered_table_row thead{
    border: 1px solid #222
}
.numbered_table_row h3{
    font-size: 24px;
    text-transform: uppercase;
    margin-top: 15px;
    font-weight: 500;
    display: inline-block;
    border-bottom: 2px solid #222;
}
.numbered_table_row td{
   border: 1px solid var(--border_color);
   padding: .4rem;
   font-weight: 400;
   color: #222;
}

table#grade_table th {
    border: 1px solid #726E6D !important;
    padding: .6rem;
    font-weight: 600;
    color: #222;
}
td.border-top.border_left_hide {
    border-left: 0;
    text-align: left;
    font-weight: 600;
}
.devide_td{
    padding: 0;
}
.devide_td p{
    border-bottom: 1px solid #222;
}
.ssc_text{
    font-size: 20px;
    font-weight: 500;
    color: #222;
    margin-bottom: 20px;
}
.student_mark_header{
  display: flex;
  
}
.school_name{
  text-align: left;
  margin-left: 50px;
}

.transcript_header{
  margin-top:20px;
  text-align:center;
  justify-content: center;
}

.text-uppercase{
  text-transform: uppercase;
}
.border-0.numbered_table_row.full_name_header {
    margin-top: 20px;
    padding-bottom: 0;
    padding-left: 5px;
    margin-bottom: 0;
}
.border-0.full_name_header {
    text-align: left;
    padding-left: 0;
    width: 25%;
}
table.custom_table thead tr > th {
    border: 0;
    padding: 0;
    font-size: 13px;
    line-height: 2;
    text-align: left;
    font-weight: 400;
}
.custom_table.custom_table2 {
    width: 600px;
}
.font_14 {
    font-size: 14px;
    font-weight: 500;
    white-space: nowrap;
}
.numbered_table_row td {
	white-space: nowrap;
}
.info_details li > p {
    flex-basis: 100%;
    font-size: 14px;
    text-align: left;
}
.info_details li {
	display: flex;
	flex-basis: 100%;
}
.student_info {
	max-width: 280px;
	width: 280px;
}
.student_info p {
	font-size: 14px;
	white-space: nowrap;
}
.student_info li p {
    flex-basis: 100%;
    text-align: left;
}

.student_info li {
	display: flex;
	align-items: center;
	padding: 5px 0;
}
.info_details li {
    display: flex;
    flex-basis: 100%;
    padding: 5px 0;
}
.id_card {
            display: grid !important;grid-template-columns: repeat(2,1fr) !important;grid-gap: 10px;justify-content: center;
        }
/* .muted_text{
  color: #828bb2 !important;
} */

  .page {
       /* width: 21cm; */
       /* min-height: 29.7cm; */
       /* padding: 1cm; */
       /* margin: 1cm auto;
       border: 1px #D3D3D3 solid;
       border-radius: 5px;
       background: white;
       box-shadow: 0 0 5px rgba(0, 0, 0, 0.1); */
   }
   .subpage {
       /* padding: 1cm; */
       /* border: 5px red solid; */
       height: 100mm;
       /* outline: 2cm #FFEAEA solid; */
   }
   
   /* @page {
       size: A4 landscape;
       margin: 0;
   }
   @media print {
       .page {
           margin: 0;
           border: initial;
           border-radius: initial;
           width: initial;
           min-height: initial;
           box-shadow: initial;
           background: initial;
           page-break-after: always;
       }
   } */
</style>
<?php
$setting_info=generalSetting();
?>
  </head>
  <script>
        var is_chrome = function () { return Boolean(window.chrome); }
        if(is_chrome) 
        {
           window.print();
    
        }
        else
        {
           window.print();
        }
    </script>
<body onLoad="loadHandler();" style="font-family: 'dejavu sans', sans-serif;">
<?php $__currentLoopData = $payrollDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payrollDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
<div class="page">
  <div class="subpage">
    <div class="student_marks_table" id="id_card">
        <table class="custom_table">
            <thead>
                <tr>
                  <td class="border-0" >
                    <div class="student_mark_header" style="justify-content: center;">
                      <div class="logo_thumb">
                        <img src=" <?php echo e(asset('/')); ?><?php echo e(generalSetting()->logo); ?>" alt="">
                      </div>
                      <div class="school_name ">
                      <h2>
                        <?php echo e(isset(generalSetting()->school_name)?generalSetting()->school_name:'Infix School Management ERP'); ?> 
                      </h2>
                      <p>
                        <?php echo e(isset(generalSetting()->address)?generalSetting()->address:'Infix School Address'); ?> 
                      </p>       
                    </div>
                    </div>
                  </td>
                </tr>
                <tr>
                </tr>
            </thead>
        </table>
        <table class="custom_table">
            <thead>
                <tr>
                    <th >
                      <div class="numbered_table_row" style="justify-content:center" >
                          <h3>
                            <?php echo app('translator')->get('hr.payslip_for_the_period_of'); ?> <?php echo e($payrollDetail->payroll_month); ?> <?php echo e($payrollDetail->payroll_year); ?>

                          </h3>
                      </div>
                    </th>
                </tr>
            </thead>
        </table>
        <table class="custom_table custom_table2">
            <thead>
            <tr>
              <td class="border-0 full_name_header">
                  <h4 class="muted_text font_14">
                      <?php echo app('translator')->get('hr.payslip'); ?> #<?php if(isset($payrollDetail)): ?><?php echo e($payrollDetail->id); ?> <?php endif; ?>
                  </h4>
              </td>
              <td class="border-0 full_name_header"></td>
              <td class="border-0 full_name_header"></td>
              <td class="border-0 full_name_header">
                    <h4 class="muted_text font_14">
                    <?php echo app('translator')->get('fees.payment_date'); ?>: <?php if(isset($payrollDetail)): ?>
                        <?php echo e(dateConvert($payrollDetail->payment_date)); ?>

                    <?php endif; ?>
                    </h4>
              </td>
            </tr>
                <tr>
                    <th><?php echo app('translator')->get('hr.staff_id'); ?></th>
                    <th> <?php if(isset($payrollDetail)): ?><?php echo e($payrollDetail->staffDetails->staff_no); ?> <?php endif; ?></th>
                    <th><?php echo app('translator')->get('common.name'); ?></th>
                    <th><?php if(isset($payrollDetail)): ?><?php echo e($payrollDetail->staffDetails->full_name); ?> <?php endif; ?></th>
                </tr>
                <tr>
                    <th><?php echo app('translator')->get('hr.departments'); ?></th>
                    <th> <?php if(isset($payrollDetail)): ?><?php echo e($payrollDetail->staffDetails->departments->name); ?> <?php endif; ?></th>
                    <th><?php echo app('translator')->get('hr.designation'); ?></th>
                    <th><?php if(isset($payrollDetail)): ?><?php echo e($payrollDetail->staffDetails->designations->title); ?> <?php endif; ?></th>
                </tr>
                <tr>
                    <th><?php echo app('translator')->get('accounts.payment_mode'); ?></th>
                    <th> <?php if($payrollDetail->payment_mode != ""): ?>
                            <?php echo e($payrollDetail->paymentMethods->method); ?>

                        <?php else: ?>
                            <?php echo app('translator')->get('fees.unpaid'); ?>
                        <?php endif; ?>
                    </th>
                    <th><?php echo app('translator')->get('hr.basic_salary'); ?></th>
                    <th><?php if(isset($payrollDetail)): ?><?php echo e($payrollDetail->basic_salary); ?> <?php endif; ?></th>
                </tr>
                <tr>
                    <th><?php echo app('translator')->get('hr.gross_salary'); ?></th>
                    <th> <?php if(isset($payrollDetail)): ?><?php echo e($payrollDetail->gross_salary); ?> <?php endif; ?></th>
                    <th><?php echo app('translator')->get('hr.net_salary'); ?></th>
                    <th><?php if(isset($payrollDetail)): ?><?php echo e($payrollDetail->net_salary); ?> <?php endif; ?></th>
                </tr>
                <?php if($payrollDetail->note): ?>
                <tr>
                  <th><?php echo app('translator')->get('common.note'); ?></th>
                  <th> <?php if(isset($payrollDetail)): ?><?php echo e($payrollDetail->note); ?> <?php endif; ?></th>
                </tr>
                <?php endif; ?>
            </thead>
        </table>
    </div>
  </div>
</div>   
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
    <script src="<?php echo e(asset('/')); ?>/public/backEnd/js/fees_invoice/jquery-3.2.1.slim.min.js"></script>
    <script src="<?php echo e(asset('/')); ?>/public/backEnd/js/fees_invoice/popper.min.js"></script>
    <script src="<?php echo e(asset('/')); ?>/public/backEnd/js/fees_invoice/bootstrap.min.js"></script>
</html><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\humanResource\payroll\payroll_bulk_print_invoice.blade.php ENDPATH**/ ?>
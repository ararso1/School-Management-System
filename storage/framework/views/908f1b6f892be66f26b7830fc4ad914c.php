<!DOCTYPE html>
<html>
<head>
    <title><?php echo app('translator')->get('fees.fees_group_details'); ?></title>
    <style>
      
        .school-table-style {
            padding: 10px 0px!important;
        }
        .school-table-style tr th {
            font-size: 6px!important;
            text-align: left!important;
        }
        .school-table-style tr td {
            font-size: 7px!important;
            text-align: left!important;
            padding: 10px 0px!important;
        }
        .logo-image {
            width: 10%;
        }
    </style>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/css/style.css" />
</head>
<body>

    <table style="width: 100%;">
        <tr>
             
            <td style="width: 30%"> 
                <img src="<?php echo e(url($setting->logo)); ?>" alt="<?php echo e(url($setting->logo)); ?>"> 
            </td> 
            <td  style="width: 70%">  
                <h3><?php echo e($setting->school_name); ?></h3>
                <h4><?php echo e($setting->address); ?></h4>
            </td> 
        </tr> 
    </table>
    <hr>
    
    <table class="school-table school-table-style" style="width: 100%; table-layout: fixed">
        <tr>
            <td><?php echo app('translator')->get('student.student_name'); ?></td>
            <td><?php echo e($student->full_name); ?></td>
            <td><?php echo app('translator')->get('student.roll_number'); ?></td>
            <td><?php echo e($student->roll_no); ?></td>
        </tr>
        <tr>
            <td> <?php echo app('translator')->get('student.father_name'); ?></td>
            <td><?php echo e($student->parents->fathers_name); ?></td>
            <td><?php echo app('translator')->get('common.class'); ?></td>
            <td><?php echo e($student->class->class_name); ?></td>
        </tr>
        <tr>
            <td> <?php echo app('translator')->get('common.section'); ?></td>
            <td><?php echo e($student->section->section_name); ?></td>
            <td><?php echo app('translator')->get('student.admission_no'); ?></td>
            <td><?php echo e($student->admission_no); ?></td>
        </tr>
    </table>


    <div class="text-center"> 
        <h4 class="text-center mt-1"><span><?php echo app('translator')->get('fees.fees_details'); ?></span></h4>
    </div>
	<table class="table school-table-style" style="width: 100%; table-layout: fixed">
        <thead>
            <tr align="center">
                <th><?php echo app('translator')->get('fees.fees_group'); ?></th>
                <th><?php echo app('translator')->get('fees.fees_code'); ?></th>
                <th><?php echo app('translator')->get('fees.due_date'); ?></th>
                <th><?php echo app('translator')->get('common.status'); ?></th>
                <th><?php echo app('translator')->get('accounts.amount'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                <th><?php echo app('translator')->get('fees.payment_id'); ?></th>
                <th><?php echo app('translator')->get('fees.mode'); ?></th>
                <th><?php echo app('translator')->get('common.date'); ?></th>
                <th><?php echo app('translator')->get('fees.discount'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                <th><?php echo app('translator')->get('fees.fine'); ?>(<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                <th><?php echo app('translator')->get('fees.submit'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                <th><?php echo app('translator')->get('fees.balance'); ?></th>
            </tr>
        </thead>

        <tbody>
            <?php
                $grand_total = 0;
                $total_fine = 0;
                $total_discount = 0;
                $total_paid = 0;
                $total_grand_paid = 0;
                $total_balance = 0;
            ?>
            <?php $__currentLoopData = $fees_assigneds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fees_assigned): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                       $grand_total += $fees_assigned->feesGroupMaster->amount;
                   
                    
                ?>

                <?php
                    $discount_amount = App\SmFeesAssign::discountSum($fees_assigned->student_id, $fees_assigned->feesGroupMaster->feesTypes->id, 'discount_amount');
                    $total_discount += $discount_amount;
                    $student_id = $fees_assigned->student_id;
                ?>
                <?php
                    $paid = App\SmFeesAssign::discountSum($fees_assigned->student_id, $fees_assigned->feesGroupMaster->feesTypes->id, 'amount');
                    $total_grand_paid += $paid;
                ?>
                <?php
                    $fine = App\SmFeesAssign::discountSum($fees_assigned->student_id, $fees_assigned->feesGroupMaster->feesTypes->id, 'fine');
                    $total_fine += $fine;
                ?>
                    
                <?php
                    $total_paid = $discount_amount + $paid;
                ?>
            <tr align="center">
                <td><?php echo e($fees_assigned->feesGroupMaster!=""?$fees_assigned->feesGroupMaster->feesGroups->name:""); ?></td>
                <td><?php echo e($fees_assigned->feesGroupMaster!=""?$fees_assigned->feesGroupMaster->feesTypes->name:""); ?></td>
                <td>
                    <?php if($fees_assigned->feesGroupMaster!=""): ?>
                       
              <?php echo e($fees_assigned->feesGroupMaster->date != ""? dateConvert($fees_assigned->feesGroupMaster->date):''); ?>


                    <?php endif; ?>
                </td>
                <td>
                        <?php if($fees_assigned->feesGroupMaster->amount == $total_paid): ?>
                        <span class="text-success"><?php echo app('translator')->get('fees.submit'); ?></span>
                        <?php elseif($total_paid != 0): ?>
                        <span class="text-warning"><?php echo app('translator')->get('fees.partial'); ?></span>
                        <?php elseif($total_paid == 0): ?>
                        <span class="text-danger"><?php echo app('translator')->get('fees.unpaid'); ?></span>
                        <?php endif; ?>
                    
                </td>
                <td>
                    <?php
                           echo $fees_assigned->feesGroupMaster->amount;
                       
                    ?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td> <?php echo e($discount_amount); ?> </td>
                <td><?php echo e($fine); ?></td>
                <td><?php echo e($paid); ?></td>
                <td>
                    <?php 

                           $rest_amount = $fees_assigned->feesGroupMaster->amount - $total_paid;
                       

                        $total_balance +=  $rest_amount;
                        echo $rest_amount;
                    ?>
                </td>
            </tr>
                <?php 
                    $payments = App\SmFeesAssign::feesPayment($fees_assigned->feesGroupMaster->feesTypes->id, $fees_assigned->student_id);
                    $i = 0;
                ?>

                <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr align="center">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-right"><img src="<?php echo e(asset('public/backEnd/img/table-arrow.png')); ?>"></td>
                    <td>
                        <?php
                            $created_by = App\User::find($payment->created_by);
                        ?>
                        <span><?php echo e($payment->fees_type_id.'/'.$payment->id); ?></span>
                    </td>
                    <td>
                    <?php if($payment->payment_mode == "C"): ?>
                            <?php echo e('Cash'); ?>

                    <?php elseif($payment->payment_mode == "Cq"): ?>
                        <?php echo e('Cheque'); ?>

                    <?php else: ?>
                        <?php echo e('DD'); ?>

                    <?php endif; ?> 
                    </td>
                    <td> 
                        <?php echo e($payment->payment_date != ""? dateConvert($payment->payment_date):''); ?>


                    </td>
                    <td><?php echo e($payment->discount_amount); ?></td>
                    <td><?php echo e($payment->fine); ?></td>
                    <td><?php echo e($payment->amount); ?></td>
                    <td></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
        </tbody>
        <tfoot>
            <tr align="center">
                <th></th>
                <th></th>
                <th><?php echo app('translator')->get('fees.grand_total '); ?>(<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                <th></th>
                <th><?php echo e(currency_format($grand_total)); ?></th>
                <th></th>
                <th></th>
                <th></th>
                <th><?php echo e(currency_format($total_discount)); ?></th>
                <th><?php echo e(currency_format($total_fine)); ?></th>
                <th><?php echo e(currency_format($total_grand_paid)); ?></th>
                <th><?php echo e(currency_format($total_balance)); ?></th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\feesCollection\fees_groups_print.blade.php ENDPATH**/ ?>
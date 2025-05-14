<!DOCTYPE html>
<html>
<head>
    <title><?php echo app('translator')->get('fees.fees_groups_details'); ?></title>
    <style>
      
        .school-table-style {
            padding: 10px 0px!important;
        }
        .school-table-style tr th {
            font-size: 8px!important;
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
        h1, h2, h3, h4, h5{
            font-size: 9px;
        }
    </style>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/css/style.css" />
</head>
<body>
<table style="width: 100%; table-layout: fixed; margin:20px;">
    <tr>
        <td   style=" padding-right:30px; " width="33%">
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
                    <td>Student Name</td>
                    <td><?php echo e($student->full_name); ?></td>
                    <td>Roll Number</td>
                    <td><?php echo e($student->roll_no); ?></td>
                </tr>
                <tr>
                    <td> Father's Name</td>
                    <td><?php echo e($student->parents->fathers_name); ?></td>
                    <td>Class</td>
                    <td><?php echo e($student->class->class_name); ?></td>
                </tr>
                <tr>
                    <td> Section</td>
                    <td><?php echo e($student->section->section_name); ?></td>
                    <td>Admission Number</td>
                    <td><?php echo e($student->admission_no); ?></td>
                </tr>
            </table>


            <div class="text-center"> 
                <h4 class="text-center mt-1"><span>Fees Details</span></h4>
            </div>
            <table class="table school-table-style" style="width: 100%; table-layout: fixed">
                <thead>
                    <tr align="center">
                        <th>Fees Group</th>
                        <th>Fees Code</th>
                        <th>Due Date</th>
                        <th>Status</th>
                        <th>Amount (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                        <th>Payment ID</th>
                        <th>Mode</th>
                        <th>Date</th>
                        <th>Discount (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                        <th>Fine (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                        <th>Paid (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                        <th>Balance</th>
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
                            <?php if($fees_assigned->feesGroupMaster!=""): ?> <?php echo e($fees_assigned->feesGroupMaster->date != ""? dateConvert($fees_assigned->feesGroupMaster->date):''); ?>


                            <?php endif; ?>
                        </td>
                        <td>
                               <?php if($fees_assigned->feesGroupMaster->amount == $total_paid): ?>
                                <span class="text-success">Paid</span>
                                <?php elseif($total_paid != 0): ?>
                                <span class="text-warning">Partial</span>
                                <?php elseif($total_paid == 0): ?>
                                <span class="text-danger">Unpaid</span>
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
                        <th>Grand Total (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                        <th></th>
                        <th><?php echo e($grand_total); ?></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th><?php echo e($total_discount); ?></th>
                        <th><?php echo e($total_fine); ?></th>
                        <th><?php echo e($total_grand_paid); ?></th>
                        <th><?php echo e($total_balance); ?></th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </td>    
        <td   style=" padding-right:30px; " width="33%">
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
                    <td>Student Name</td>
                    <td><?php echo e($student->full_name); ?></td>
                    <td>Roll Number</td>
                    <td><?php echo e($student->roll_no); ?></td>
                </tr>
                <tr>
                    <td> Father's Name</td>
                    <td><?php echo e($student->parents->fathers_name); ?></td>
                    <td>Class</td>
                    <td><?php echo e($student->class->class_name); ?></td>
                </tr>
                <tr>
                    <td> Section</td>
                    <td><?php echo e($student->section->section_name); ?></td>
                    <td>Admission Number</td>
                    <td><?php echo e($student->admission_no); ?></td>
                </tr>
            </table>
        
        
            <div class="text-center"> 
                <h4 class="text-center mt-1"><span>Fees Details</span></h4>
            </div>
            <table class="table school-table-style" style="width: 100%; table-layout: fixed">
                <thead>
                    <tr align="center">
                        <th>Fees Group</th>
                        <th>Fees Code</th>
                        <th>Due Date</th>
                        <th>Status</th>
                        <th>Amount (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                        <th>Payment ID</th>
                        <th>Mode</th>
                        <th>Date</th>
                        <th>Discount (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                        <th>Fine (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                        <th>Paid (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                        <th>Balance</th>
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
                                <span class="text-success">Paid</span>
                                <?php elseif($total_paid != 0): ?>
                                <span class="text-warning">Partial</span>
                                <?php elseif($total_paid == 0): ?>
                                <span class="text-danger">Unpaid</span>
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
                        <th>Grand Total (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                        <th></th>
                        <th><?php echo e($grand_total); ?></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th><?php echo e($total_discount); ?></th>
                        <th><?php echo e($total_fine); ?></th>
                        <th><?php echo e($total_grand_paid); ?></th>
                        <th><?php echo e($total_balance); ?></th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </td>
        <td   style=" padding-right:30px; " width="33%">

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
                    <td>Student Name</td>
                    <td><?php echo e($student->full_name); ?></td>
                    <td>Roll Number</td>
                    <td><?php echo e($student->roll_no); ?></td>
                </tr>
                <tr>
                    <td> Father's Name</td>
                    <td><?php echo e($student->parents->fathers_name); ?></td>
                    <td>Class</td>
                    <td><?php echo e($student->class->class_name); ?></td>
                </tr>
                <tr>
                    <td> Section</td>
                    <td><?php echo e($student->section->section_name); ?></td>
                    <td>Admission Number</td>
                    <td><?php echo e($student->admission_no); ?></td>
                </tr>
            </table>
        
        
            <div class="text-center"> 
                <h4 class="text-center mt-1"><span>Fees Details</span></h4>
            </div>
            <table class="table school-table-style" style="width: 100%; table-layout: fixed">
                <thead>
                    <tr align="center">
                        <th>Fees Group</th>
                        <th>Fees Code</th>
                        <th>Due Date</th>
                        <th>Status</th>
                        <th>Amount (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                        <th>Payment ID</th>
                        <th>Mode</th>
                        <th>Date</th>
                        <th>Discount (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                        <th>Fine (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                        <th>Paid (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                        <th>Balance</th>
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
                                <span class="text-success">Paid</span>
                                <?php elseif($total_paid != 0): ?>
                                <span class="text-warning">Partial</span>
                                <?php elseif($total_paid == 0): ?>
                                <span class="text-danger">Unpaid</span>
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
                        <th>Grand Total (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                        <th></th>
                        <th><?php echo e($grand_total); ?></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th><?php echo e($total_discount); ?></th>
                        <th><?php echo e($total_fine); ?></th>
                        <th><?php echo e($total_grand_paid); ?></th>
                        <th><?php echo e($total_balance); ?></th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
    
</body>
</html>
<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\feesCollection\fees_payment_invoice_old.blade.php ENDPATH**/ ?>
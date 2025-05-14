<?php $__env->startSection('title'); ?> 
<?php echo app('translator')->get('reports.fees_statement'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<?php  $setting = generalSetting();  if(!empty($setting->currency_symbol)){ $currency = $setting->currency_symbol; }else{ $currency = '$'; }   ?> 

<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('reports.fees_statement'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('reports.reports'); ?></a>
                <a href="#"><?php echo app('translator')->get('reports.fees_statement'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area student-details">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="main-title">
                    <h3 class="mb-30"><?php echo app('translator')->get('common.select_criteria'); ?> </h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
            

                    <div class="white-box">
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'fees_statement_search', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

                            <div class="row">
                                <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                <div class="col-lg-4 mt-30-md md_mb_20">
                                    <select class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>" id="select_class" name="class">
                                        <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value=""><?php echo app('translator')->get('common.select_class'); ?> *</option>
                                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($class->id); ?>" <?php echo e(isset($class_id)? ($class_id == $class->id? 'selected':''):''); ?>><?php echo e($class->class_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('class')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('class')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-4 mt-30-md md_mb_20" id="select_section_div">
                                    <select class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?>" id="select_section" name="section">
                                        <option data-display="<?php echo app('translator')->get('common.select_section'); ?>*" value=""><?php echo app('translator')->get('common.select_section'); ?> *</option>
                                        
                                    </select>
                                    <div class="pull-right loader loader_style" id="select_section_loader">
                                        <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                    </div>
                                    <?php if($errors->has('section')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('section')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-4 mt-30-md md_mb_20" id="select_student_div">
                                    <select class="primary_select form-control<?php echo e($errors->has('student') ? ' is-invalid' : ''); ?>" id="select_student" name="student">
                                        <option data-display="<?php echo app('translator')->get('reports.select_student'); ?> *" value=""><?php echo app('translator')->get('reports.select_student'); ?> *</option>
                                    </select>
                                    <div class="pull-right loader loader_style" id="select_student_loader">
                                        <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                    </div>
                                    <?php if($errors->has('student')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('student')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-12 mt-20 text-right">
                                    <button type="submit" class="primary-btn small fix-gr-bg">
                                        <span class="ti-search"></span>
                                        <?php echo app('translator')->get('common.search'); ?>
                                    </button>
                                </div>
                        </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
            
    <?php if(isset($fees_assigneds)): ?>
    <div class="row mt-40">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-6 no-gutters">
                    <div class="main-title">
                        <h3 class="mb-30"><?php echo app('translator')->get('reports.fees_statement'); ?></h3>
                    </div>
                </div>
            </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="student-meta-box">
                    <div class="student-meta-top staff-meta-top"></div>
                    <img class="student-meta-img img-100" src="<?php echo e(asset($student->student_photo)); ?>" alt="">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-lg-5 col-md-6">
                                <div class="single-meta mt-20">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                <?php echo app('translator')->get('common.name'); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                <?php echo e($student->full_name); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                <?php echo app('translator')->get('student.father_name'); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                <?php echo e($student->parents !=""?$student->parents->fathers_name:""); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                <?php echo app('translator')->get('common.mobile'); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                <?php echo e($student->mobile); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                <?php echo app('translator')->get('student.category'); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                <?php echo e($student->category!=""?$student->category->category_name:""); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="offset-lg-2 col-lg-5 col-md-6">
                                <div class="single-meta mt-20">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                               <?php echo app('translator')->get('common.class_sec'); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                <?php if($student->class !="" && $student->section !=""): ?>
                                                <?php echo e($student->class->class_name .'('.$student->section->section_name.')'); ?>

                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                <?php echo app('translator')->get('student.admission_no'); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                <?php echo e($student->admission_no); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                               <?php echo app('translator')->get('student.roll_no'); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                <?php echo e($student->roll_no); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>             
    </div>
</div>

<?php endif; ?>

    </div>
</section>

<?php if(isset($fees_assigneds)): ?>

<section class="mt-20">
    <div class="container-fluid p-0">

        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table school-table-style" cellspacing="0" width="100%">
                        <thead>
                        
                            <tr class="text-nowrap">
                                <th><?php echo app('translator')->get('fees.fees_group'); ?></th>
                                <th><?php echo app('translator')->get('reports.due_date'); ?></th>
                                <th><?php echo app('translator')->get('common.status'); ?></th>
                                <th><?php echo app('translator')->get('reports.amount'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                                <th><?php echo app('translator')->get('reports.payment_id'); ?></th>
                                <th><?php echo app('translator')->get('reports.mode'); ?></th>
                                <th><?php echo app('translator')->get('common.date'); ?></th>
                                <th><?php echo app('translator')->get('reports.discount'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                                <th><?php echo app('translator')->get('reports.fine'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                                <th><?php echo app('translator')->get('reports.paid'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                                <th><?php echo app('translator')->get('reports.balance'); ?></th>
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
                                $discount_amount = $fees_assigned->applied_discount;
                                $total_discount += $discount_amount;
                                $student_id = $fees_assigned->student_id;
                                $paid = App\SmFeesAssign::discountSum($fees_assigned->student_id, $fees_assigned->feesGroupMaster->feesTypes->id, 'amount', $fees_assigned->record_id);
                                $total_grand_paid += $paid;
                                $fine = App\SmFeesAssign::discountSum($fees_assigned->student_id, $fees_assigned->feesGroupMaster->feesTypes->id, 'fine', $fees_assigned->record_id);
                                $total_fine += $fine;
                                $total_paid = $discount_amount + $paid;
                            ?>
                            <tr class="text-nowrap">
                                <td>
                                    <?php echo e(@$fees_assigned->feesGroupMaster->feesGroups->name); ?> / <?php echo e(@$fees_assigned->feesGroupMaster->feesTypes->name); ?>

                                </td>
                                <td>
                                    <?php if($fees_assigned->feesGroupMaster !=""): ?>
                                        <?php echo e($fees_assigned->feesGroupMaster->date != ""? dateConvert($fees_assigned->feesGroupMaster->date):''); ?>

                                    <?php endif; ?>
                                </td>
                                <td>
    
                                    <?php
                                        $rest_amount = $fees_assigned->feesGroupMaster->amount - $total_paid;
                                        
                                        $total_balance +=  $rest_amount;
                                        
                                        $balance_amount = number_format($rest_amount+$fine, 2, '.', '');
                                    
                                    ?>
                                    
                                    <?php if($balance_amount == 0): ?>
                                        <button class="primary-btn small bg-success text-white border-0"><?php echo app('translator')->get('reports.paid'); ?></button>
                                    <?php elseif($paid != 0): ?>
                                        <button class="primary-btn small bg-warning text-white border-0"><?php echo app('translator')->get('reports.partial'); ?></button>
                                    <?php elseif($paid == 0): ?>
                                        <button class="primary-btn small bg-danger text-white border-0"><?php echo app('translator')->get('reports.unpaid'); ?></button>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($fees_assigned->feesGroupMaster->amount); ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><?php echo e($discount_amount); ?></td>
                                <td><?php echo e($fine); ?></td>
                                <td><?php echo e($paid); ?></td>
                                <td>
                                <?php
                                        $rest_amount = $fees_assigned->fees_amount;
                                        $total_balance +=  $rest_amount;
                                        echo $balance_amount;
                                    ?>
                                </td>
                            </tr>
                                <?php
                                    $payments = App\SmFeesAssign::feesPayment($fees_assigned->feesGroupMaster->feesTypes->id, $fees_assigned->student_id, $fees_assigned->record_id);
                                    $i = 0;
                                ?>
                                <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right">
                                        <img src="<?php echo e(asset('public/backEnd/img/table-arrow.png')); ?>">
                                    </td>
                                    <td>
                                        <?php
                                            $created_by = App\User::find($payment->created_by);
                                        ?>
                                        <?php if($created_by != ""): ?>
                                            <a href="#" data-toggle="tooltip" data-placement="right" title="<?php echo e('Collected By: '.$created_by->full_name); ?>"><?php echo e($payment->fees_type_id.'/'.$payment->id); ?></a>
                                    </td>
                                        <?php endif; ?>
                                    <td><?php echo e($payment->payment_mode); ?></td>
                                    <td class="nowrap"><?php echo e($payment->payment_date != ""? dateConvert($payment->payment_date):''); ?></td>
                                    <td class="text-center"><?php echo e($payment->discount_amount); ?></td>
                                    <td>
                                        <?php echo e($payment->fine); ?>

                                        <?php if($payment->fine!=0): ?>
                                        <?php if(strlen($payment->fine_title) > 14): ?>
                                        <spna class="text-danger nowrap" title="<?php echo e($payment->fine_title); ?>">
                                            (<?php echo e(substr($payment->fine_title, 0, 15) . '...'); ?>)
                                        </spna>
                                        <?php else: ?>
                                        <?php if($payment->fine_title==''): ?>
                                        <?php echo e($payment->fine_title); ?>

                                        <?php else: ?>
                                        <spna class="text-danger nowrap">
                                            (<?php echo e($payment->fine_title); ?>)
                                        </spna>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($payment->amount); ?></td>
                                    <td></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <tfoot>
                        <tr>
                                <th></th>
                                <th></th>
                                <th><?php echo app('translator')->get('reports.grand_total'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                                <th></th>
                                <th><?php echo e(currency_format($grand_total)); ?></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th><?php echo e(currency_format($total_discount)); ?></th>
                                <th><?php echo e(currency_format($total_fine)); ?></th>
                                <th><?php echo e(currency_format($total_grand_paid)); ?></th>
                                    <?php
                                        $show_balance=$grand_total+$total_fine-$total_discount;
                                    ?>
                                <th><?php echo e(currency_format($show_balance-$total_grand_paid)); ?></th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?php endif; ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\feesCollection\fees_statment.blade.php ENDPATH**/ ?>
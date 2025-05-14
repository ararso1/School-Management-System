<?php $__env->startSection('title'); ?> 
<?php echo app('translator')->get('fees.search_fees_due'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<style>
    table.dataTable tfoot th, table.dataTable tfoot td {
        padding: 10px 30px 6px 30px;
    }
</style>
<?php  $setting = generalSetting(); if(!empty($setting->currency_symbol)){ $currency = $setting->currency_symbol; }else{ $currency = '$'; } ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('fees.search_fees_due'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('fees.fees_collection'); ?></a>
                <a href="#"><?php echo app('translator')->get('fees.search_fees_due'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="white-box">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="main-title">
                                <h3 class="mb-15"><?php echo app('translator')->get('common.select_criteria'); ?> </h3>
                            </div>
                        </div>
                    </div>
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'fees_due_searches', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

                        <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            <?php if(moduleStatusCheck('University')): ?>
                            <?php if ($__env->exists(
                                'university::common.session_faculty_depart_academic_semester_level',
                                ['mt' => 'mt-30', 'hide' => ['USUB'], 'required' => ['USL']]
                            )) echo $__env->make(
                                'university::common.session_faculty_depart_academic_semester_level',
                                ['mt' => 'mt-30', 'hide' => ['USUB'], 'required' => ['USL']]
                            , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <div class="col-lg-3 mt-30">
                                    <label for=""><?php echo app('translator')->get('fees.fees_group'); ?> *</label>
                                    <select class="primary_select form-control <?php echo e($errors->has('fees_group') ? ' is-invalid' : ''); ?>" name="fees_group">
                                        <option data-display="<?php echo app('translator')->get('fees.fees_group'); ?>*" value=""><?php echo app('translator')->get('fees.fees_group'); ?> *</option>
                                        <?php $__currentLoopData = $fees_masters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fees_master): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="" disabled><?php echo e(@$fees_master->feesGroups->name); ?></option>
                                                <?php $__currentLoopData = $fees_master->feesTypeIds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feesTypeId): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($fees_master->fees_group_id.'-'.$feesTypeId->feesTypes->id); ?>" <?php echo e(isset($fees_group_id)? ($fees_group_id == $feesTypeId->feesTypes->id? 'selected':''):''); ?>><?php echo e($feesTypeId->feesTypes->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('fees_group')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('fees_group')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            <?php else: ?>
                            <div class="col-lg-4 mt-30-md">
                                <select class="primary_select form-control <?php echo e($errors->has('fees_group') ? ' is-invalid' : ''); ?>" name="fees_group">
                                    <option data-display="<?php echo app('translator')->get('fees.fees_group'); ?>*" value=""><?php echo app('translator')->get('fees.fees_group'); ?> *</option>
                                    <?php $__currentLoopData = $fees_masters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fees_master): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="" disabled><?php echo e(@$fees_master->feesGroups->name); ?></option>
                                            <?php $__currentLoopData = $fees_master->feesTypeIds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feesTypeId): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($fees_master->fees_group_id.'-'.$feesTypeId->feesTypes->id); ?>" <?php echo e(isset($fees_group_id)? ($fees_group_id == $feesTypeId->feesTypes->id? 'selected':''):''); ?>><?php echo e($feesTypeId->feesTypes->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('fees_group')): ?>
                                <span class="text-danger invalid-select" role="alert">
                                    <?php echo e($errors->first('fees_group')); ?>

                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-4 mt-30-md">
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
                            <div class="col-lg-4 mt-30-md" id="select_section_div">
                                <select class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?>" id="select_section" name="section">
                                    <option data-display="<?php echo app('translator')->get('common.select_section'); ?>" value=""><?php echo app('translator')->get('common.select_section'); ?></option>
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
                            <?php endif; ?>
                            <div class="col-lg-12 mt-20 text-right">
                                <button type="submit" class="primary-btn small fix-gr-bg">
                                    <span class="ti-search pr-2"></span>
                                    <?php echo app('translator')->get('common.search'); ?>
                                </button>
                            </div>
                        </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
        <?php echo e(Form::open(['class' => 'form-horizontal', 'route' => 'send-dues-fees-email', 'method' => 'POST'])); ?>

            <div class="row mt-40">
                <div class="col-lg-12">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-12">
                                <div class="main-title mb_sm_75">
                                    <h3 class="mb-15 mt-2 mr-2"> <?php echo app('translator')->get('fees.fees_due_list'); ?></h3>
                                    <div class="fes_lag_btn d-flex flex-wrap gap-2 align-items-center mb-15">
                                        <button name="send_email" type="submit" class="primary-btn small fix-gr-bg mr-2" value="1">
                                            <span class="ti-envelope pr-2"></span>
                                            <?php echo app('translator')->get('communicate.send_email'); ?>
                                        </button>
                                        <button name="send_sms" type="submit" class="primary-btn small fix-gr-bg" value="1">
                                            <span class="ti-envelope pr-2"></span>
                                            <?php echo app('translator')->get('communicate.send_sms'); ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 search_hide_md">
                                <?php if (isset($component)) { $__componentOriginal163c8ba6efb795223894d5ffef5034f5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal163c8ba6efb795223894d5ffef5034f5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <?php if(moduleStatusCheck('University')): ?>
                                <?php
                                    $totalAmount = 0;
                                    $totalDiscount = 0;
                                    $totalPaid = 0;
                                    $totalBalance = 0;
                                ?>
                                 <table id="table_id" class="table " cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th> <?php echo app('translator')->get('student.admission_no'); ?></th>
                                            <th> <?php echo app('translator')->get('common.name'); ?></th>
                                            <th> <?php echo app('translator')->get('university::un.installment'); ?></th>
                                            <th><?php echo app('translator')->get('fees.due_date'); ?></th>
                                            <th><?php echo app('translator')->get('fees.amount'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                                            <th><?php echo app('translator')->get('fees.discount'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                                            <th><?php echo app('translator')->get('fees.paid'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                                            <th><?php echo app('translator')->get('fees.balance'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                                            <th><?php echo app('translator')->get('common.action'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $fees_dues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fees_due): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            
                                            <tr>
                                                <td><?php echo e($fees_due->recordDetail->studentDetail !=""?$fees_due->recordDetail->studentDetail->admission_no:""); ?></td>
                                                <td><?php echo e($fees_due->recordDetail->studentDetail !=""?$fees_due->recordDetail->studentDetail->full_name:""); ?></td>
                                                <td>
                                                    <?php echo e(@$fees_due->installment->title); ?>

                                                </td>
                                                <td>
                                                    <?php echo e(@dateConvert($fees_due->due_date)); ?>

                                                </td>
                                                <td>
                                                    <?php
                                                        $totalAmount += $fees_due->amount;
                                                    ?>
                                                    <?php echo e($fees_due->amount); ?>

                                                </td>
                                                <td>
                                                    <?php
                                                        $totalDiscount += $fees_due->discount_amount;
                                                    ?>
                                                    <?php echo e($fees_due->discount_amount); ?>

                                                </td>
                                                <td>
                                                    <?php
                                                        $totalPaid += $fees_due->paid_amount;
                                                    ?>
                                                    <?php echo e($fees_due->paid_amount); ?>

                                                </td>
                                                <td>
                                                    <?php
                                                        $balance = discountFeesAmount($fees_due->id) - $fees_due->paid_amount;
                                                        $totalBalance += $balance;
                                                    ?>
                                                    <?php echo e($balance); ?>

                                                </td>
                                                <td>
                                                    <div class="dropdown CRM_dropdown">
                                                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                            <?php echo app('translator')->get('common.select'); ?>
                                                        </button>
                                                        <?php if(userPermission('fees_collect_student_wise')): ?>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="<?php echo e(route('fees_collect_student_wise', [$fees_due->recordDetail->id])); ?>"><?php echo app('translator')->get('common.view'); ?></a>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><?php echo e($totalAmount); ?></td>
                                            <td><?php echo e($totalDiscount); ?></td>
                                            <td><?php echo e($totalPaid); ?></td>
                                            <td><?php echo e($totalBalance); ?></td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <?php elseif(directFees()): ?>
                                <?php
                                    $totalAmount = 0;
                                    $totalDiscount = 0;
                                    $totalPaid = 0;
                                    $totalBalance = 0;
                                ?>
                                 <table id="table_id" class="table " cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th> <?php echo app('translator')->get('student.admission_no'); ?></th>
                                            <th> <?php echo app('translator')->get('common.name'); ?></th>
                                            <th> <?php echo app('translator')->get('fees.installment'); ?></th>
                                            <th><?php echo app('translator')->get('fees.due_date'); ?></th>
                                            <th><?php echo app('translator')->get('fees.amount'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                                            <th><?php echo app('translator')->get('fees.discount'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                                            <th><?php echo app('translator')->get('fees.paid'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                                            <th><?php echo app('translator')->get('fees.balance'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                                            <th><?php echo app('translator')->get('common.action'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $fees_dues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fees_due): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e(@$fees_due->recordDetail->studentDetail !=""?$fees_due->recordDetail->studentDetail->admission_no:""); ?></td>
                                                <td><?php echo e(@$fees_due->recordDetail->studentDetail !=""?$fees_due->recordDetail->studentDetail->full_name:""); ?></td>
                                                <td>
                                                    <?php echo e(@$fees_due->installment->title); ?>

                                                </td>
                                                <td>
                                                    <?php echo e(@dateConvert($fees_due->due_date)); ?>

                                                </td>
                                                <td>
                                                    <?php
                                                        $totalAmount += $fees_due->amount;
                                                    ?>
                                                    <?php echo e($fees_due->amount); ?>

                                                </td>
                                                <td>
                                                    <?php
                                                        $totalDiscount += $fees_due->discount_amount;
                                                    ?>
                                                    <?php echo e($fees_due->discount_amount); ?>

                                                </td>
                                                <td>
                                                    <?php
                                                        $totalPaid += $fees_due->paid_amount;
                                                    ?>
                                                    <?php echo e($fees_due->paid_amount); ?>

                                                </td>
                                                <td>
                                                    <?php
                                                        $balance = discountFees($fees_due->id) - $fees_due->paid_amount;
                                                        $totalBalance += $balance;
                                                    ?>
                                                    <?php echo e($balance); ?>

                                                </td>
                                                <td>
                                                    <div class="dropdown CRM_dropdown">
                                                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                            <?php echo app('translator')->get('common.select'); ?>
                                                        </button>
                                                        <?php if(userPermission('fees_collect_student_wise')): ?>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="<?php echo e(route('fees_collect_student_wise', [$fees_due->recordDetail->id])); ?>"><?php echo app('translator')->get('common.view'); ?></a>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><?php echo e($totalAmount); ?></td>
                                            <td><?php echo e($totalDiscount); ?></td>
                                            <td><?php echo e($totalPaid); ?></td>
                                            <td><?php echo e($totalBalance); ?></td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
    
    
                                <?php else: ?>
                                <table id="table_id" class="table " cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th> <?php echo app('translator')->get('student.admission_no'); ?></th>
                                            <th> <?php echo app('translator')->get('student.roll_no'); ?></th>
                                            <th> <?php echo app('translator')->get('common.name'); ?></th>
                                            <th><?php echo app('translator')->get('fees.due_date'); ?></th>
                                            <th><?php echo app('translator')->get('fees.amount'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                                            <th><?php echo app('translator')->get('fees.deposit'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                                            <th><?php echo app('translator')->get('fees.discount'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                                            <th><?php echo app('translator')->get('fees.fine'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                                            <th><?php echo app('translator')->get('fees.balance'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                                            <th><?php echo app('translator')->get('common.action'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $fees_dues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fees_due): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          
                                            <tr>
                                                <td><?php echo e($fees_due->recordDetail->studentDetail !=""?$fees_due->recordDetail->studentDetail->admission_no:""); ?></td>
                                                <td> <?php echo e($fees_due->recordDetail->studentDetail !=""? $fees_due->recordDetail->roll_no:""); ?></td>
                                                <td><?php echo e($fees_due->recordDetail->studentDetail !=""?$fees_due->recordDetail->studentDetail->full_name:""); ?></td>
                                                <td>
                                                    <?php if($fees_due->feesGroupMaster !=""): ?>
                                                        <?php echo e($fees_due->feesGroupMaster->date != ""? dateConvert($fees_due->feesGroupMaster->date):''); ?>

                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        echo $fees_due->feesGroupMaster->amount;
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        $amount = App\SmFeesAssign::discountSum($fees_due->student_id, $fees_due->feesGroupMaster->feesTypes->id, 'amount', $fees_due->recordDetail->id);
                                                        echo $amount;
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        $discount_amount = $fees_due->applied_discount;
                                                        if ($discount_amount>0) {
                                                            echo $discount_amount;
                                                        } else {
                                                        echo 0.00;
                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        $fine = App\SmFeesAssign::discountSum($fees_due->student_id, $fees_due->feesGroupMaster->feesTypes->id, 'fine', $fees_due->recordDetail->id);
                                                        echo $fine;
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        echo $fees_due->feesGroupMaster->amount - $discount_amount - $amount+$fine;
                                                        $dues_amount = $fees_due->feesGroupMaster->amount - $discount_amount - $amount;
                                                    ?>
                                                    <input type="hidden" name="dues_amount[<?php echo e($fees_due->recordDetail->id); ?>]" value="<?php echo e($dues_amount); ?>">
                                                    <input type="hidden" name="student_list[]" value="<?php echo e($fees_due->recordDetail->student_id); ?>">
                                                    <input type="hidden" name="fees_master" value="<?php echo e($fees_due->feesGroupMaster->id); ?>">
                                                </td>
                                                <td>
                                                    <div class="dropdown CRM_dropdown">
                                                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                            <?php echo app('translator')->get('common.select'); ?>
                                                        </button>
                                                        <?php if(userPermission('fees_collect_student_wise')): ?>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="<?php echo e(route('fees_collect_student_wise', [$fees_due->recordDetail->id])); ?>"><?php echo app('translator')->get('common.view'); ?></a>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $attributes = $__attributesOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $component = $__componentOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__componentOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        <?php echo e(Form::close()); ?>

    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.date_range_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\feesCollection\search_fees_due.blade.php ENDPATH**/ ?>
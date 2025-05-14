<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('fees.collection_report'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <style>
        table.dataTable tfoot th, table.dataTable tfoot td {
            padding: 10px 30px 6px 30px;
        }
    </style>
    <?php
        $setting = generalSetting();
        if(!empty($setting->currency_symbol)){
            $currency = $setting->currency_symbol;
        }else{
            $currency = '$';
        }
    ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('fees.collection_report'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('fees.fees_collection'); ?></a>
                    <a href="#"><?php echo app('translator')->get('fees.collection_report'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
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
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'transaction_report_searches', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

                        <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            <?php if(moduleStatusCheck('University')): ?>
                                <?php if ($__env->exists('university::common.session_faculty_depart_academic_semester_level',  ['hide'=>['USUB'],'required'=> ['US','UF','UD','UA','USN','US','USL']])) echo $__env->make('university::common.session_faculty_depart_academic_semester_level',  ['hide'=>['USUB'],'required'=> ['US','UF','UD','UA','USN','US','USL']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <div class="col-md-3 mt-20">
                                    <input placeholder="" class="primary_input_field primary_input_field form-control"
                                           type="text" name="date_range" value="">
                                </div>
                            <?php else: ?>
                                <div class="col-lg-3 mt-20">
                                    <select class="primary_select  form-control<?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>"
                                            id="select_class" name="class">
                                        <option data-display="<?php echo app('translator')->get('common.select_class'); ?>"
                                                value=""><?php echo app('translator')->get('common.select_class'); ?></option>
                                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($class->id); ?>" <?php echo e(isset($class_id)? ($class_id == $class->id? 'selected':''):''); ?>><?php echo e(@$class->class_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('class')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('class')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-3 mt-20" id="select_section_div">
                                    <select class="primary_select  form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?>"
                                            id="select_section" name="section">
                                        <option data-display="<?php echo app('translator')->get('common.select_section'); ?>"
                                                value=""><?php echo app('translator')->get('common.select_section'); ?></option>
                                    </select>
                                    <div class="pull-right loader loader_style" id="select_section_loader">
                                        <img class="loader_img_style"
                                             src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                    </div>
                                    <!-- <?php if($errors->has('section')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('section')); ?>

                                        </span>

                                    <?php endif; ?> -->
                                </div>
                                <div class="col-md-6 mt-20">
                                    <input placeholder="" class="primary_input_field primary_input_field form-control"
                                           type="text" name="date_range" value="">
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

            <?php if(isset($fees_payments)): ?>
                <div class="white-box mt-40">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6 no-gutters">
                                <div class="main-title">
                                    <h3 class="mb-0"><?php echo app('translator')->get('fees.fees_collection_details'); ?></h3>
                                    <strong class="fs-12"><?php echo e(dateConvert($date_from). "-" . dateConvert($date_to)); ?> </strong>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-10">
                            <div class="col-lg-12">
                                <?php if(moduleStatusCheck('University')): ?>
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
                                        <table id="table_id" class="display school-table" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th> <?php echo app('translator')->get('student.admission_no'); ?></th>
                                                <th> <?php echo app('translator')->get('common.name'); ?></th>
                                                <th> <?php echo app('translator')->get('university::un.installment'); ?></th>
                                                <th><?php echo app('translator')->get('fees.mode'); ?></th>
                                                <th><?php echo app('translator')->get('fees.payment_date'); ?></th>
                                                <th><?php echo app('translator')->get('fees.paid_amount'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)
                                                </th>
                                                <th><?php echo app('translator')->get('fees.discount'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                                                <th><?php echo app('translator')->get('common.action'); ?></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $totalPaidAmountGrup = 0;
                                                $totalPaidAmount = 0;
                                                $totalDiscount = 0;
                                                $totalDiscountGrup = 0;
                                            ?>
                                            <?php $__currentLoopData = $fees_payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fees_payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(!count($fees_payment->payments)): ?>
                                                    <tr>
                                                        <td><?php echo e($fees_payment->recordDetail->studentDetail !=""?$fees_payment->recordDetail->studentDetail->admission_no:""); ?></td>
                                                        <td><?php echo e($fees_payment->recordDetail->studentDetail !=""?$fees_payment->recordDetail->studentDetail->full_name:""); ?></td>
                                                        <td>
                                                            <?php echo e(@$fees_payment->installment->title); ?>

                                                        </td>
                                                        <td>
                                                            <?php echo e($fees_payment->payment_mode); ?>

                                                        </td>
                                                        <td>
                                                            <?php echo e(@dateConvert($fees_payment->payment_date)); ?>

                                                        </td>
                                                        <td>
                                                            <?php
                                                                $totalPaidAmountGrup += $fees_payment->amount;
                                                            ?>
                                                            <?php echo e($fees_payment->amount); ?>

                                                        </td>
                                                        <td>
                                                            <?php
                                                                $totalDiscountGrup += $fees_payment->discount_amount;
                                                            ?>
                                                            <?php echo e($fees_payment->discount_amount); ?>

                                                        </td>

                                                        <td>
                                                            <div class="dropdown CRM_dropdown">
                                                                <button type="button" class="btn dropdown-toggle"
                                                                        data-toggle="dropdown">
                                                                    <?php echo app('translator')->get('common.select'); ?>
                                                                </button>
                                                                <?php if(userPermission(117)): ?>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item"
                                                                           href="<?php echo e(route('fees_collect_student_wise', [$fees_payment->recordDetail->id])); ?>"><?php echo app('translator')->get('common.view'); ?></a>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                                <?php $__currentLoopData = $fees_payment->payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($fees_payment->recordDetail->studentDetail !=""?$fees_payment->recordDetail->studentDetail->admission_no:""); ?></td>
                                                        <td><?php echo e($fees_payment->recordDetail->studentDetail !=""?$fees_payment->recordDetail->studentDetail->full_name:""); ?></td>
                                                        <td>
                                                            <?php echo e(@$fees_payment->installment->title); ?>

                                                        </td>
                                                        <td>
                                                            <?php echo e($payment->payment_mode); ?>

                                                        </td>
                                                        <td>
                                                            <?php echo e(@dateConvert($payment_date)); ?>

                                                        </td>
                                                        <td>
                                                            <?php
                                                                $totalPaidAmount += $payment->paid_amount;
                                                            ?>
                                                            <?php echo e($payment->paid_amount); ?>

                                                        </td>
                                                        <td>
                                                            <?php
                                                                $totalDiscount += $payment->discount_amount;
                                                            ?>
                                                            <?php echo e($payment->discount_amount); ?>

                                                        </td>

                                                        <td>
                                                            <div class="dropdown CRM_dropdown">
                                                                <button type="button" class="btn dropdown-toggle"
                                                                        data-toggle="dropdown">
                                                                    <?php echo app('translator')->get('common.select'); ?>
                                                                </button>
                                                                <?php if(userPermission('fees_collect_student_wise')): ?>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item"
                                                                           href="<?php echo e(route('fees_collect_student_wise', [$fees_payment->recordDetail->id])); ?>"><?php echo app('translator')->get('common.view'); ?></a>
                                                                        <a class="dropdown-item" target="_blank"
                                                                           href="<?php echo e(route('university.viewPaymentReceipt',[$payment->id])); ?>">
                                                                            <?php echo app('translator')->get('fees.receipt'); ?>
                                                                        </a>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td><?php echo app('translator')->get('fees.grand_total'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td> <?php echo e(currency_format($totalPaidAmountGrup + $totalPaidAmount)); ?></td>
                                                <td> <?php echo e(currency_format($totalDiscountGrup + $totalDiscount)); ?></td>
                                                <td></td>
                                            </tr>
                                            </tfoot>
                                        </table>
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
                                <?php elseif(directFees()): ?>
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
                                        <table id="table_id" class="display school-table" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th> <?php echo app('translator')->get('student.admission_no'); ?></th>
                                                <th> <?php echo app('translator')->get('common.name'); ?></th>
                                                <th> <?php echo app('translator')->get('fees.installment'); ?></th>
                                                <th><?php echo app('translator')->get('fees.mode'); ?></th>
                                                <th><?php echo app('translator')->get('fees.payment_date'); ?></th>
                                                <th><?php echo app('translator')->get('fees.paid_amount'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)
                                                </th>
                                                <th><?php echo app('translator')->get('fees.discount'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                                                <th><?php echo app('translator')->get('common.action'); ?></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $totalPaidAmountGrup = 0;
                                                $totalPaidAmount = 0;
                                                $totalDiscount = 0;
                                                $totalDiscountGrup = 0;
                                            ?>
                                            <?php $__currentLoopData = $fees_payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fees_payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <tr>
                                                    <td><?php echo e(@$fees_payment->installmentAssign->recordDetail->studentDetail->admission_no); ?></td>
                                                    <td><?php echo e($fees_payment->installmentAssign->recordDetail->studentDetail->full_name); ?></td>
                                                    <td>
                                                        <?php echo e(@$fees_payment->installmentAssign->installment->title); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e($fees_payment->payment_mode); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e(@dateConvert($fees_payment->payment_date)); ?>

                                                    </td>
                                                    <td>
                                                        <?php
                                                            $totalPaidAmountGrup += $fees_payment->amount;
                                                        ?>
                                                        <?php echo e($fees_payment->amount); ?>

                                                    </td>
                                                    <td>
                                                        <?php
                                                            $totalDiscountGrup += $fees_payment->installmentAssign->discount_amount;
                                                        ?>
                                                        <?php echo e($fees_payment->installmentAssign->discount_amount); ?>

                                                    </td>

                                                    <td>
                                                        <div class="dropdown CRM_dropdown">
                                                            <button type="button" class="btn dropdown-toggle"
                                                                    data-toggle="dropdown">
                                                                <?php echo app('translator')->get('common.select'); ?>
                                                            </button>
                                                            <?php if(userPermission(117)): ?>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item"
                                                                       href="<?php echo e(route('fees_collect_student_wise', [$fees_payment->installmentAssign->recordDetail->id])); ?>"><?php echo app('translator')->get('common.view'); ?></a>
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
                                                <td><?php echo app('translator')->get('fees.grand_total'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td> <?php echo e(currency_format($totalPaidAmountGrup + $totalPaidAmount)); ?></td>
                                                <td> <?php echo e(currency_format($totalDiscountGrup + $totalDiscount)); ?></td>
                                                <td></td>
                                            </tr>
                                            </tfoot>
                                        </table>
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
                                <?php else: ?>
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
                                        <table id="table_id" class="display school-table" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th><?php echo app('translator')->get('fees.payment_id'); ?></th>
                                                <th><?php echo app('translator')->get('common.date'); ?></th>
                                                <th><?php echo app('translator')->get('common.name'); ?></th>
                                                <th><?php echo app('translator')->get('common.class'); ?></th>
                                                <th><?php echo app('translator')->get('fees.fees_type'); ?></th>
                                                <th><?php echo app('translator')->get('fees.mode'); ?></th>
                                                <th><?php echo app('translator')->get('fees.amount'); ?></th>
                                                <th><?php echo app('translator')->get('fees.fine'); ?></th>
                                                <th><?php echo app('translator')->get('fees.total'); ?></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $grand_amount = 0;
                                                $grand_total = 0;
                                                $grand_discount = 0;
                                                $grand_fine = 0;
                                                $total = 0;
                                            ?>
                                            <?php $__currentLoopData = $fees_payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $students): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$fees_payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        if(is_array($fees_payment)){
                                                            $fees_payment = $fees_payment[$key];
                                                        }

                                                    ?>
                                                    <?php $total = 0; ?>
                                                    <?php if($fees_payment->recordDetail): ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo e($fees_payment->fees_type_id.'/'.$fees_payment->id); ?>

                                                            </td>
                                                            <td data-sort="<?php echo e(strtotime(@$fees_payment->payment_date)); ?>">
                                                                <?php echo e($fees_payment->payment_date != ""? dateConvert($fees_payment->payment_date):''); ?>


                                                            </td>
                                                            <td><?php echo e(@$fees_payment->recordDetail->studentDetail ? $fees_payment->recordDetail->studentDetail->full_name:""); ?></td>
                                                            <td>
                                                                <?php if(@$fees_payment->recordDetail->studentDetail && @$fees_payment->recordDetail->class): ?>
                                                                    <?php echo e($fees_payment->recordDetail->class->class_name); ?>

                                                                <?php endif; ?>
                                                            </td>
                                                            <td><?php echo e($fees_payment->feesType!=""?$fees_payment->feesType->name:""); ?></td>
                                                            <td>
                                                                <?php echo e(@$fees_payment->payment_mode); ?>

                                                            </td>
                                                            <td>
                                                                <?php
                                                                    $total =  $total + $fees_payment->amount;
                                                                    $grand_amount =  $grand_amount + $fees_payment->amount;
                                                                    echo currency_format($fees_payment->amount);
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                    $total =  $total + $fees_payment->fine;
                                                                    $grand_fine =  $grand_fine + $fees_payment->fine;
                                                                    echo currency_format($fees_payment->fine);
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                    $grand_total =  $grand_total + $total;
                                                                    echo currency_format($total);
                                                                ?>
                                                            </td>
                                                        </tr>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                            <tfoot>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <td><?php echo app('translator')->get('fees.grand_total'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)</td>
                                            <th><?php echo e(currency_format($grand_amount)); ?></th>
                                            <th><?php echo e(currency_format($grand_fine)); ?></th>
                                            <th><?php echo e(currency_format($grand_total)); ?></th>
                                            </tfoot>
                                        </table>
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
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.date_range_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\feesCollection\transaction_report.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title'); ?> 
<?php echo app('translator')->get('fees.balance_fees_report'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<input type="text" hidden value="<?php echo e(@$clas->class_name); ?>" id="cls">
<input type="text" hidden value="<?php echo e(@$clas->section_name->sectionName->section_name); ?>" id="sec">
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('fees.balance_fees_report'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('fees.reports'); ?></a>
                <a href="#"><?php echo app('translator')->get('fees.balance_fees_report'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="main-title">
                        <h3 class="mb-30"><?php echo app('translator')->get('common.select_criteria'); ?></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'balance_fees_searches', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

                            <div class="row">
                                <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                <?php if(moduleStatusCheck('University')): ?>
                                <?php if ($__env->exists('university::common.session_faculty_depart_academic_semester_level',['mt'=>'mt-30','hide'=>['USUB'], 'required'=>['USEC']])) echo $__env->make('university::common.session_faculty_depart_academic_semester_level',['mt'=>'mt-30','hide'=>['USUB'], 'required'=>['USEC']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php else: ?>
                                <div class="col-lg-6 mt-30-md col-md-6">
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
                                <div class="col-lg-6 mt-30-md col-md-6" id="select_section_div">
                                    <select class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?>" id="select_section" name="section">
                                        <option data-display="<?php echo app('translator')->get('common.select_section'); ?>*" value=""><?php echo app('translator')->get('common.select_section'); ?> *</option>
                                        <?php if(isset($class_id)): ?>
                                        <?php $__currentLoopData = $class->classSection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($section->sectionName->id); ?>" <?php echo e(old('section')==$section->sectionName->id ? 'selected' : ''); ?> >
                                            <?php echo e($section->sectionName->section_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
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

            <?php
                $grand_total = 0;
                $grand_discount = 0;
                $grand_fine = 0;
                $grand_deposit = 0;
                $grand_balance = 0;
            ?>

          
            <?php if(isset($balance_students)): ?>
            <div class="row mt-40">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 no-gutters">
                            <div class="main-title mb-3">
                                <h3 class="mb-0"><?php echo app('translator')->get('fees.student_fees_report'); ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
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
                                <table  class="table balance-custom-table school-table-data" cellspacing="0" width="100%">

                                    <thead>
                                        <tr>
                                            <th><?php echo app('translator')->get('common.name'); ?></th>
                                            <th><?php echo app('translator')->get('student.admission_no'); ?></th>
                                            <th><?php echo app('translator')->get('student.roll_no'); ?></th>
                                            <th><?php echo app('translator')->get('student.father_name'); ?></th>
                                            <th><?php echo app('translator')->get('accounts.amount'); ?></th>
                                            <th><?php echo app('translator')->get('fees.discount'); ?></th>
                                            <th><?php echo app('translator')->get('fees.fine'); ?></th>
                                            <th><?php echo app('translator')->get('fees.paid_fees'); ?></th>
                                            <th><?php echo app('translator')->get('fees.balance'); ?></th>
                                        </tr>
                                    </thead>
    
                                    <tbody>
                                        
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $student = $value['student'];
                                        ?>
                                        <tr>
                                            <td><?php echo e($student->full_name); ?></td>
                                            <td><?php echo e($student->admission_no); ?></td>
                                            <td><?php echo e($student->roll_no); ?></td>
                                            <td><?php echo e($student->parents!=""?$student->parents->fathers_name:""); ?></td>
                                            <td>
                                                <?php
                                                $grand_total += $value['totalFees'];
                                                echo $value['totalFees'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $grand_discount += $value['totalDiscount'];
                                                echo $value['totalDiscount'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $grand_fine += $value['totalFine'];
                                                echo $value['totalFine'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $grand_deposit += $value['totalDeposit'];
                                                echo $value['totalDeposit'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $balance =  $value['totalFees'] - $value['totalDiscount'] - $value['totalDeposit'] +$value['totalFine'] ;
                                                $grand_balance += $balance;
                                                echo $balance;
                                                ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                    <tfoot>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th><?php echo app('translator')->get('fees.grand_total'); ?></th>
                                        <th><?php echo e($grand_total); ?> </th>
                                        <th><?php echo e($grand_discount); ?></th>
                                        <th><?php echo e($grand_fine); ?></th>
                                        <th><?php echo e($grand_deposit); ?></th>
                                        <th><?php echo e($grand_balance); ?></th>
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
                        </div>
                    </div>

                    
                </div>
            </div>
            <?php endif; ?>  

           
            <?php if(isset($student_records)): ?>
                <div class="row mt-40">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6 no-gutters">
                                <div class="main-title">
                                    <h3 class="mb-0"><?php echo app('translator')->get('fees.student_fees_report'); ?></h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
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
                                    <table class="school-table-data display school-table balance-custom-table" cellspacing="0" width="100%">

                                        <thead>
                                            <tr>
                                                <th><?php echo app('translator')->get('common.name'); ?></th>
                                                <th><?php echo app('translator')->get('student.admission_no'); ?></th>
                                                <th><?php echo app('translator')->get('student.roll_no'); ?></th>
                                                <th><?php echo app('translator')->get('student.father_name'); ?></th>
                                                <th><?php echo app('translator')->get('accounts.amount'); ?></th>
                                                <th><?php echo app('translator')->get('fees.discount'); ?></th>
                                                <th><?php echo app('translator')->get('fees.paid_fees'); ?></th>
                                                <th><?php echo app('translator')->get('fees.balance'); ?></th>
                                            </tr>
                                        </thead>
    
                                        <tbody>
                                        <?php $__currentLoopData = $student_records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            
                                            <tr>
                                                <td><?php echo e(@$record->student->full_name); ?></td>
                                                <td><?php echo e(@$record->student->admission_no); ?></td>
                                                <td><?php echo e(@$record->student->roll_no); ?></td>
                                                <td><?php echo e(@$record->student->parents!=""?$record->student->parents->fathers_name:""); ?></td>
                                                <td><?php echo e(@$record->feesInstallments->sum('amount')); ?></td>
                                                <td><?php echo e(@$record->feesInstallments->sum('discount_amount')); ?></td>
                                                <td><?php echo e(@$record->feesInstallments->sum('paid_amount')); ?></td>
                                                <td><?php echo e((@$record->feesInstallments->sum('amount')) - (@$record->feesInstallments->sum('paid_amount') - @$record->feesInstallments->sum('discount_amount'))); ?></td>
                                            
                                                <?php
                                                $grand_total += @$record->feesInstallments->sum('amount');
                                                $grand_discount += @$record->feesInstallments->sum('discount_amount');
                                                $grand_deposit +=  @$record->feesInstallments->sum('paid_amount');
                                                $grand_balance += ($grand_total - $grand_deposit ) ;
                                                ?> 
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                        <tfoot>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th><?php echo app('translator')->get('fees.grand_total'); ?></th>
                                            <th><?php echo e(@$grand_total); ?> </th>
                                            <th><?php echo e(@$grand_discount); ?></th>
                                            <th><?php echo e(@$grand_deposit); ?></th>
                                            <th><?php echo e($grand_total - $grand_deposit); ?></th>
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
                            </div>
                        </div>

                        
                    </div>
                </div>
            <?php endif; ?>  

            <?php if(isset($records)): ?>
            <div class="row mt-40">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-0"><?php echo app('translator')->get('fees.student_fees_report'); ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">

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
                                <table class="school-table-data table balance-custom-table" cellspacing="0" width="100%">

                                    <thead>
                                        <tr>
                                            <th><?php echo app('translator')->get('common.name'); ?></th>
                                            <th><?php echo app('translator')->get('student.admission_no'); ?></th>
                                            <th><?php echo app('translator')->get('student.roll_no'); ?></th>
                                            <th><?php echo app('translator')->get('student.father_name'); ?></th>
                                            <th><?php echo app('translator')->get('accounts.amount'); ?></th>
                                            <th><?php echo app('translator')->get('fees.discount'); ?></th>
                                            <th><?php echo app('translator')->get('fees.paid_fees'); ?></th>
                                            <th><?php echo app('translator')->get('fees.balance'); ?></th>
                                        </tr>
                                    </thead>
                                    <?php if(directFees()): ?>
                                    <tbody>
                                    <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        
                                        <tr>
                                            <td><?php echo e(@$record->student->full_name); ?></td>
                                            <td><?php echo e(@$record->student->admission_no); ?></td>
                                            <td><?php echo e(@$record->student->roll_no); ?></td>
                                            <td><?php echo e(@$record->student->parents!=""?$record->student->parents->fathers_name:""); ?></td>
                                            <td><?php echo e(@$record->directFeesInstallments->sum('amount')); ?></td>
                                            <td><?php echo e(@$record->directFeesInstallments->sum('discount_amount')); ?></td>
                                            <td><?php echo e(@$record->directFeesInstallments->sum('paid_amount')); ?></td>
                                            <td><?php echo e((@$record->directFeesInstallments->sum('amount')) - (@$record->directFeesInstallments->sum('paid_amount') - @$record->directFeesInstallments->sum('discount_amount'))); ?></td>
                                        
                                            <?php
                                            $grand_total += @$record->directFeesInstallments->sum('amount');
                                            $grand_discount += @$record->directFeesInstallments->sum('discount_amount');
                                            $grand_deposit +=  @$record->directFeesInstallments->sum('paid_amount');
                                            $grand_balance += ($grand_total - $grand_deposit) ;
                                            ?> 
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                    <?php else: ?>
                                    
                                    
                                    
                                    <?php endif; ?> 
                                    <tfoot>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th><?php echo app('translator')->get('fees.grand_total'); ?></th>
                                        <th><?php echo e(@$grand_total); ?> </th>
                                        <th><?php echo e(@$grand_discount); ?></th>
                                        <th><?php echo e(@$grand_deposit); ?></th>
                                        <th><?php echo e($grand_total - $grand_deposit); ?></th>
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
                        </div>
                    </div>

                    
                </div>
            </div>
        <?php endif; ?> 


    </div>
</section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\feesCollection\balance_fees_report.blade.php ENDPATH**/ ?>
    <?php $__env->startSection('title'); ?> 
        <?php echo app('translator')->get('fees.fees_forward'); ?>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<?php  $setting = generalSetting(); 
if(!empty($setting->currency_symbol)){ $currency = $setting->currency_symbol; }
else{ $currency = '$'; } 
?>

<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('fees.fees_forward'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('fees.fees_forward'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
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
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'route' => 'fees-carry-forward-search', 'method' => 'POST', 'id' => 'search_studentA'])); ?>

                            <div class="row">
                                <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                <div class="col-lg-6 mt-30-md">
                                    <label><?php echo app('translator')->get('common.class'); ?>*</label>
                                    <select class="primary_select  form-control<?php echo e($errors->has('class') ? ' is-invalid' : ''); ?> float-none" id="select_class" name="class">
                                        <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value=""><?php echo app('translator')->get('common.select_class'); ?> *</option>
                                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($class->id); ?>"  <?php echo e(isset($class_id)? ($class_id == $class->id? 'selected':''):''); ?>><?php echo e($class->class_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['class'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($message); ?>

                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-lg-6 mt-30-md" id="select_section_div">
                                    <label><?php echo app('translator')->get('common.section'); ?>*</label>
                                    <select class="primary_select  form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?> float-none" id="select_section" name="section">
                                        <option data-display="<?php echo app('translator')->get('common.select_section'); ?> *" value=""><?php echo app('translator')->get('common.select_section'); ?> *</option>
                                    </select>
                                    <?php $__errorArgs = ['section'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($message); ?>

                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
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
        <?php if(isset($students)): ?>
            <?php echo e(Form::open(['class' => 'form-horizontal', 'method' => 'POST', 'route' => 'fees-carry-forward-store'])); ?>

                <div class="row mt-40">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6 no-gutters">
                                <div class="main-title">
                                    <h3 class="mb-0"><?php echo app('translator')->get('fees.previous_Session_Balance_Fees'); ?></h3>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="update" value="<?php echo e(isset($update)? 1 : ''); ?>">
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
                                    <table id="table_id" class="table" cellspacing="0" width="100%">
                                        <thead>
                                            <?php if(isset($update)): ?>
                                                <tr>
                                                    <td colspan="6">
                                                        <div class="alert">
                                                        <h4 class="mb-0"> <?php echo app('translator')->get('fees.previous_balance_can_only_update_now.'); ?> </h4>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                                <tr>
                                                    <th width="15%"><?php echo app('translator')->get('student.student_name'); ?></th>
                                                    <th width="10%"><?php echo app('translator')->get('student.admission_no'); ?></th>
                                                    <th width="10%"><?php echo app('translator')->get('student.roll_no'); ?></th>
                                                    <th width="15%"><?php echo app('translator')->get('student.father_name'); ?></th>
                                                    <th width="15%"><?php echo app('translator')->get('fees.balance'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                                                    <th width="20%"><?php echo app('translator')->get('fees.short_note'); ?></th>
                                                    <th width="15%"><?php echo app('translator')->get('fees.due_date'); ?></th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td>
                                                        <?php echo e($student->studentDetail->full_name); ?> 
                                                        <input type="hidden" name="studentFeesInfo[<?php echo e($key); ?>][student_id]" value="<?php echo e($student->student_id); ?>">
                                                    </td>
                                                    <td><?php echo e($student->studentDetail->admission_no); ?></td>
                                                    <td><?php echo e($student->studentDetail->roll_no); ?></td>
                
                                                    <td><?php echo e($student->studentDetail->parents !=""?$student->studentDetail->parents->fathers_name:""); ?></td>
                                                    <td>
                                                        <div class="primary_input">
                                                            <input oninput="numberCheckWithDot(this)" type="text" class="primary_input_field form-control" cols="0" rows="1" name="studentFeesInfo[<?php echo e($key); ?>][balance]" maxlength="8" value="<?php echo e(isset($student->studentDetail->forwardBalance->balance)? (($student->studentDetail->forwardBalance->balance_type == 'add') ? '+'.$student->studentDetail->forwardBalance->balance : '-'.$student->studentDetail->forwardBalance->balance ) : ''); ?>">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="primary_input">
                                                            <input type="text" class="primary_input_field form-control" cols="0" rows="1" name="studentFeesInfo[<?php echo e($key); ?>][notes]" 
                                                            value="<?php echo e(isset($student->studentDetail->forwardBalance->notes)? $student->studentDetail->forwardBalance->notes: $settings->title); ?>">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="primary_input">
                                                            <div class="primary_datepicker_input">
                                                                <div class="no-gutters input-right-icon">
                                                                    <div class="col">
                                                                        <div class="">
                                                                            <input 
                                                                                class="primary_input_field primary_input_field date form-control"
                                                                                id="startDate<?php echo e($key); ?>" type="text" name="studentFeesInfo[<?php echo e($key); ?>][due_date]" value="<?php echo e(isset($student->studentDetail->forwardBalance->due_date)? \Carbon\Carbon::parse($student->studentDetail->forwardBalance->due_date)->format('m/d/Y') : \Carbon\Carbon::now()->addDays($settings->fees_due_days)->format('m/d/Y')); ?>" autocomplete="off">
                                                                        </div>
                                                                    </div>
                                                                    <button class="btn-date" data-id="#startDate" type="button">
                                                                        <label class="m-0 p-0" for="startDate<?php echo e($key); ?>">
                                                                            <i class="ti-calendar" id="start-date-icon"></i>
                                                                        </label>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                        <tr>
                                            <td colspan="7">
                                                <div class="text-center">
                                                    <button type="submit" class="primary-btn fix-gr-bg mb-0 submit">
                                                        <span class="ti-save pr"></span>
                                                            <?php echo app('translator')->get('common.save'); ?>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
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
            <?php echo e(Form::close()); ?>

        <?php endif; ?>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\systemSettings\feesCarryForwardView.blade.php ENDPATH**/ ?>
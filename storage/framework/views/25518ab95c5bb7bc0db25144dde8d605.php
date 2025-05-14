<?php $__env->startSection('title'); ?> 
<?php echo app('translator')->get('fees.assign_fees_discount'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
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
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'fees-discount-assign-search', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_studentA'])); ?>

                        <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            <input type="hidden" name="fees_discount_id" id="fees_discount_id" value="<?php echo e($fees_discount_id); ?>">

                            <?php if(moduleStatusCheck('University')): ?>
                                    <?php if ($__env->exists('university::common.session_faculty_depart_academic_semester_level',['hide'=>['USUB']])) echo $__env->make('university::common.session_faculty_depart_academic_semester_level',['hide'=>['USUB']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php else: ?>
                                <div class="col-lg-3 mt-30-md">
                                    <select class="primary_select  form-control<?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>" id="select_class" name="class">
                                        <option data-display="<?php echo app('translator')->get('common.select_class'); ?>" value=""><?php echo app('translator')->get('common.select_class'); ?>*</option>
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
                                <div class="col-lg-3 mt-30-md" id="select_section_div">
                                    <select class="primary_select  form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?>" id="select_section" name="section">
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
                                <div class="col-lg-3 mt-30-md">
                                    <select class="primary_select  form-control<?php echo e($errors->has('category') ? ' is-invalid' : ''); ?>" name="category">
                                        <option data-display="<?php echo app('translator')->get('fees.select_category'); ?>" value=""><?php echo app('translator')->get('fees.select_category'); ?></option>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category->id); ?>" <?php echo e(isset($category_id)? ($category_id == $category->id? 'selected':''):''); ?>><?php echo e($category->category_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('category')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('category')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-3 mt-30-md">
                                    <select class="primary_select  form-control<?php echo e($errors->has('group') ? ' is-invalid' : ''); ?>" name="group">
                                        <option data-display="<?php echo app('translator')->get('fees.select_group'); ?>" value=""><?php echo app('translator')->get('fees.select_group'); ?> </option>
                                        <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($group->id); ?>" <?php echo e(isset($group_id)? ($group_id == $group->id? 'selected':''):''); ?>><?php echo e($group->group); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('group')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('group')); ?>

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
            <?php if(!empty($students)): ?>
                <?php echo e(Form::open(['class' => 'form-horizontal', 'method' => 'POST', 'url' => 'fees-discount-assign-store'])); ?>

                    <div class="row mt-40">
                        <div class="col-lg-12">
                            <div class="row mb-30">
                                <div class="col-lg-6 no-gutters">
                                    <div class="main-title">
                                        <h3 class="mb-0"><?php echo app('translator')->get('fees.assign_fees_discount'); ?></h3>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="fees_discount_id" value="<?php echo e($fees_discount_id); ?>" id="fees_discount_id">
                            <div class="row">
                                <div class="col-lg-4">
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
                                        <table id="table_id_table" class="table" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <tr>
                                                        <th><?php echo app('translator')->get('fees.fees_discount'); ?></th>
                                                        <th><?php echo app('translator')->get('fees.amount'); ?></th>
                                                    </tr>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo e($fees_discount->name); ?></td>
                                                    <td><?php echo e($fees_discount->amount); ?></td>
                                                </tr>
                                            </tbody>
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
                                <div class="col-lg-8">
                                    <div class="table-responsive">
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
                                            <table  class="table school-table-style" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th width="10%">
                                                            <input type="checkbox" id="checkAll" class="common-checkbox" name="checkAll"  
                                                                <?php
                                                                    if(count($students) > 0){
                                                                        if(count($students) == count($pre_assigned)){
                                                                            echo 'checked';
                                                                        }
                                                                    }
                                                                ?>>
                                                            <label for="checkAll"> <?php echo app('translator')->get('common.all'); ?></label>
                                                        </th>
                                                        <th width="20%"><?php echo app('translator')->get('student.student_name'); ?></th>
                                                        <th width="10%"><?php echo app('translator')->get('student.admission_no'); ?></th>
                                                        <th width="15%"><?php echo app('translator')->get('common.class'); ?></th>
                                                        <th width="15%"><?php echo app('translator')->get('fees.fees_type'); ?></th>
                                                        <th width="15%"><?php echo app('translator')->get('student.father_name'); ?></th>
                                                        <th width="10%"><?php echo app('translator')->get('student.category'); ?></th>
                                                        <th width="5%"><?php echo app('translator')->get('common.gender'); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td>
                                                                <?php
                                                                    if ($fees_discount->type=='once') {
                                                                    $checkPayment=App\SmFeesDiscount::CheckAppliedDiscount($fees_discount_id,$student->id, $student->id);
                                                                    $show='';
                                                                        if ($checkPayment=='false') {
                                                                            $show='disabled';
                                                                        }
                                                                    } else {
                                                                    $checkPayment=App\SmFeesDiscount::CheckAppliedYearlyDiscount($fees_discount_id,$student->id, $student->id);
                                                                    $show='';
                                                                        if ($checkPayment=='false') {
                                                                            $show='disabled';
                                                                        }
                                                                    }
                                                                ?>
                                                                <input type="checkbox" id="student.<?php echo e($student->id); ?>" <?php echo e(@$show); ?> class="common-checkbox" name="data[<?php echo e($loop->index); ?>][checked]" value="1" <?php echo e(in_array($student->student_id, $pre_assigned)? 'checked':''); ?> <?php echo e(in_array($student->student_id, $already_paid)? 'disabled="disabled"':''); ?> >
                                                                <label for="student.<?php echo e($student->id); ?>"></label>
                                                            </td>
                                                                <input type="hidden" name="data[<?php echo e($loop->index); ?>][class_id]" value="<?php echo e(@$student->class_id); ?>">
                                                                <input type="hidden" name="data[<?php echo e($loop->index); ?>][section_id]" value="<?php echo e(@$student->section_id); ?>">
                                                                <input type="hidden" name="data[<?php echo e($loop->index); ?>][record_id]" value="<?php echo e(@$student->id); ?>">
                                                                <input type="hidden" name="data[<?php echo e($loop->index); ?>][student_id]" value="<?php echo e(@$student->studentDetail->forwardBalance->id ?? $student->student_id); ?>">
                                                            <td><?php echo e($student->studentDetail->full_name); ?></td>
                                                            <td><?php echo e($student->studentDetail->admission_no); ?></td>
                                                            <td><?php echo e($student->class != ""? @$student->class->class_name :""); ?> <?php echo e('('.$student->section!=""? $student->section->section_name:"".')'); ?></td>
                                                            <td>
                                                                <?php
                                                                    $check_discount_apply= DB::table('sm_fees_assign_discounts')
                                                                                        ->where('student_id',$student->student_id)
                                                                                        ->where('record_id',$student->id)
                                                                                        ->where('fees_discount_id',$fees_discount_id)
                                                                                        ->leftjoin('sm_fees_types','sm_fees_types.id','=','sm_fees_assign_discounts.fees_type_id')
                                                                                        ->leftjoin('sm_fees_groups','sm_fees_groups.id','=','sm_fees_assign_discounts.fees_group_id')
                                                                                        ->select('sm_fees_assign_discounts.*','sm_fees_groups.name as fees_group_name','sm_fees_types.name as fees_type_name')
                                                                                        ->first();
                                                                    $group_ids= array();
                                                                ?>
    
                                                                <?php if($fees_discount->type=='once'): ?>
                                                                    <?php if($check_discount_apply==''): ?> 
                                                                        <select class="primary_select w-100  form-control<?php echo e($errors->has('fees_master_id') ? ' is-invalid' : ''); ?> select_fees_master" <?php echo e(@$show); ?> name="data[<?php echo e($loop->index); ?>][fees_master_id]" id="fees_master<?php echo e($student->id); ?>">
                                                                            <option data-display="<?php echo app('translator')->get('fees.select_fees_type'); ?> *" value=""><?php echo app('translator')->get('fees.select_fees_type'); ?> *</option>
                                                                            <?php $__currentLoopData = $assigned_fees_groups[$student->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $fees_group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <?php
                                                                                    if( in_array($fees_group->group_id, $group_ids) ) { 
                                                                                        continue;
                                                                                    }
                                                                                    array_push($group_ids,$fees_group->group_id);
                                                                                ?>
                                                                                    <option value="" disabled ><?php echo e($fees_group->name); ?> </option>
                                                                                        <?php
                                                                                            $studentAssingFees_types=App\SmFeesAssign::studentFeesTypeDiscount($fees_group->group_id,$student->student_id,$fees_discount->amount, $student->id);
                                                                                        ?>
                                                                                    <?php $__currentLoopData = $studentAssingFees_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fees_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <option value="<?php echo e($fees_type->id); ?>"><?php echo e($fees_type->name); ?></option>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </select>
                                                                        <?php if($errors->has('fees_master_id')): ?>
                                                                            <span class="text-danger invalid-select" role="alert">
                                                                                <?php echo e($errors->first('fees_master_id')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    <?php else: ?>
                                                                        <select class="primary_select w-100  form-control<?php echo e($errors->has('fees_master_id') ? ' is-invalid' : ''); ?> select_fees_master" name="data[<?php echo e($loop->index); ?>][fees_master_id]" title="Discount Applied" id="fees_master<?php echo e($student->id); ?>">
                                                                            <option data-display="<?php echo app('translator')->get('fees.select_fees_type'); ?> *" value=""> <?php echo app('translator')->get('fees.select_fees_type'); ?> *</option>
                                                                                
                                                                                    <option value="<?php echo e($check_discount_apply->fees_type_id); ?>" selected  ><?php echo e($check_discount_apply->fees_type_name); ?></option>
                                                                                
                                                                        </select>
                                                                        <?php if($errors->has('fees_master_id')): ?>
                                                                            <span class="text-danger invalid-select" role="alert">
                                                                                <?php echo e($errors->first('fees_master_id')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    <?php
                                                                        $group_ids= array();
                                                                    ?>
                                                                    <?php if($check_discount_apply==''): ?>
                                                                        <select class="primary_select w-100  form-control<?php echo e($errors->has('fees_master_id') ? ' is-invalid' : ''); ?> select_fees_master" name="data[<?php echo e($loop->index); ?>][fees_master_id]" <?php echo e(@$show); ?> id="fees_master<?php echo e($student->id); ?>">
                                                                            <option data-display="<?php echo app('translator')->get('fees.select_fees_group'); ?>" value=""><?php echo app('translator')->get('fees.select_fees_group'); ?></option>
                                                                            <?php $__currentLoopData = $assigned_fees_groups[$student->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $fees_group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <?php
                                                                                    if( in_array($fees_group->group_id, $group_ids) ) {
                                                                                        continue;
                                                                                        }
                                                                                    array_push($group_ids,$fees_group->group_id);
                                                                                ?>
                                                                                <option value="<?php echo e($fees_group->group_id); ?>")}} ><?php echo e($fees_group->name); ?> </option>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </select>
                                                                        <?php if($errors->has('fees_master_id')): ?>
                                                                            <span class="text-danger invalid-select" role="alert">
                                                                                <?php echo e($errors->first('fees_master_id')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    <?php else: ?>
                                                                        
                                                                        <select class="primary_select w-100  form-control<?php echo e($errors->has('fees_master_id') ? ' is-invalid' : ''); ?> select_fees_master" name="data[<?php echo e($loop->index); ?>][fees_master_id]]" id="fees_master<?php echo e($student->id); ?>">
                                                                            
                                                                            <option value="<?php echo e(@$check_discount_apply->fees_group_id); ?>" checked ><?php echo e(@$check_discount_apply->fees_group_name); ?> </option>
                                                                        </select>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td><?php echo e($student->studentDetail->parents!=""?$student->studentDetail->parents->fathers_name:""); ?></td>
                                                            <td><?php echo e($student->studentDetail->category!=""?$student->studentDetail->category->category_name:""); ?></td>
                                                            <td><?php echo e($student->studentDetail->gender!=""?$student->studentDetail->gender->base_setup_name:""); ?></td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                                <?php if($students->count() > 0): ?>
                                                    <tr>
                                                        <td colspan="7">
                                                            <div class="text-center">
                                                                <button type="submit" class="primary-btn fix-gr-bg mb-0" id="btn-assign-fees-discount">
                                                                    <span class="ti-save pr"></span>
                                                                    <?php echo app('translator')->get('fees.assign_discount'); ?>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
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
                    </div>
                <?php echo e(Form::close()); ?>

            <?php endif; ?>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\feesCollection\fees_discount_assign.blade.php ENDPATH**/ ?>
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
                                            <option value="<?php echo e($category->id); ?>")}} <?php echo e(isset($category_id)? ($category_id == $category->id? 'selected':''):''); ?>><?php echo e($category->category_name); ?></option>
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
                <?php echo e(Form::open(['class' => 'form-horizontal', 'method' => 'POST', 'route' => 'directFees.fees-discount-assign-store'])); ?>

                    <div class="row mt-40">
                        <div class="col-lg-12">
                            <div class="row mb-30">
                                <div class="col-lg- no-gutters">
                                    <div class="main-title">
                                        <h3 class="mb-0"><?php echo app('translator')->get('fees.assign_fees_discount'); ?> ( <?php echo app('translator')->get('fees.discount_will_be_applied_for_all_unpaid_installment_fees'); ?> )</h3> 
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
                                                    <td><?php echo e($fees_discount->amount); ?>  </td>
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
                                        <table  class="table school-table-style" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th width="10%">
                                                        <input type="checkbox" id="checkAll" class="common-checkbox" name="checkAll"  
                                                            <?php
                                                                if(count($already_assigned) > 0){
                                                                    if(count($students) == count($already_assigned)){
                                                                        echo 'checked';
                                                                    }
                                                                }
                                                            ?>>
                                                        <label for="checkAll"> <?php echo app('translator')->get('common.all'); ?></label>
                                                    </th>
                                                    <th width="20%"><?php echo app('translator')->get('student.student_name'); ?></th>
                                                    <th width="10%"><?php echo app('translator')->get('student.admission_no'); ?></th>
                                                    <th width="15%"><?php echo app('translator')->get('common.class_sec'); ?></th>
                                                
                                                    <th width="10%"><?php echo app('translator')->get('student.category'); ?></th>
                                                    <th width="5%"><?php echo app('translator')->get('common.gender'); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td>
                                                            
                                                            <input type="checkbox" id="student.<?php echo e($student->id); ?>" <?php echo e(@$show); ?> class="common-checkbox" name="data[<?php echo e($loop->index); ?>][checked]" value="1" <?php echo e(in_array($student->id, $already_assigned) ? 'checked':''); ?>>
                                                            <label for="student.<?php echo e($student->id); ?>"></label>
                                                        </td>
                                                            <input type="hidden" name="data[<?php echo e($loop->index); ?>][class_id]" value="<?php echo e(@$student->class_id); ?>">
                                                            <input type="hidden" name="data[<?php echo e($loop->index); ?>][section_id]" value="<?php echo e(@$student->section_id); ?>">
                                                            <input type="hidden" name="data[<?php echo e($loop->index); ?>][record_id]" value="<?php echo e(@$student->id); ?>">
                                                            <input type="hidden" name="data[<?php echo e($loop->index); ?>][student_id]" value="<?php echo e(@$student->studentDetail->forwardBalance->id ?? $student->student_id); ?>">
                                                        <td><?php echo e($student->studentDetail->full_name); ?> <?php echo e(in_array($student->id, $already_assigned)); ?></td>
                                                        <td><?php echo e($student->studentDetail->admission_no); ?></td>
                                                        <td><?php echo e($student->class->class_name); ?>(<?php echo e($student->section->section_name); ?>)</td>
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
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\feesCollection\directFees\assign_fees_discount.blade.php ENDPATH**/ ?>
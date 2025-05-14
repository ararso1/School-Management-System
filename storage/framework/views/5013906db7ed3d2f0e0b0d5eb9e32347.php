<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('dormitory.student_dormitory_report'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('dormitory.student_dormitory_report'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('dormitory.dormitory'); ?></a>
                <a href="#"><?php echo app('translator')->get('dormitory.student_dormitory_report'); ?></a>
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
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'student_dormitory_report_store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

                            <div class="row">
                                <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                <?php if(moduleStatusCheck('University')): ?>
                                <?php if ($__env->exists('university::common.session_faculty_depart_academic_semester_level',['required'=>['USN','UD','UA','US','USL','USEC'], 'hide' => ['USUB']])) echo $__env->make('university::common.session_faculty_depart_academic_semester_level',['required'=>['USN','UD','UA','US','USL','USEC'], 'hide' => ['USUB']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php else: ?>
                                <div class="col-lg-4 mt-30-md">
                                    <label class="primary_input_label" for="">
                                        <?php echo e(__('common.class')); ?>

                                            <span class="text-danger"> </span>
                                    </label>
                                    <select class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>" id="select_class" name="class">
                                        <option data-display="<?php echo app('translator')->get('common.select_class'); ?>" value=""><?php echo app('translator')->get('common.select_class'); ?></option>
                                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e(@$class->id); ?>" <?php echo e(isset($class_id)? ($class_id == $class->id? 'selected':''):''); ?>><?php echo e(@$class->class_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-lg-4 mt-30-md" id="select_section_div">
                                    <label class="primary_input_label" for="">
                                        <?php echo e(__('common.section')); ?>

                                            <span class="text-danger"> </span>
                                    </label>
                                    <select class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?> select_section" id="select_section" name="section">
                                        <option data-display="<?php echo app('translator')->get('common.select_section'); ?>" value=""><?php echo app('translator')->get('common.select_section'); ?></option>
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
                                </div>
                                <?php endif; ?>
                                <div class="<?php echo e(moduleStatusCheck('University') ? 'col-lg-3 mt-25' :'col-lg-4 mt-30-md'); ?>">
                                    <label class="primary_input_label" for="">
                                        <?php echo e(__('dormitory.dormitory')); ?>

                                            <span class="text-danger"> </span>
                                    </label>
                                    <select class="primary_select form-control <?php echo e($errors->has('dormitory') ? ' is-invalid' : ''); ?>" name="dormitory">
                                        <option data-display="<?php echo app('translator')->get('dormitory.select_dormitory'); ?>" value=""><?php echo app('translator')->get('dormitory.select_dormitory'); ?></option>
                                        <?php $__currentLoopData = $dormitories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dormitory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e(@$dormitory->id); ?>"  <?php echo e(isset($dormitory_id)? ($dormitory_id == $dormitory->id? 'selected':''):''); ?>><?php echo e(@$dormitory->dormitory_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
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
            
                <div class="row mt-40">
                    <div class="col-lg-12">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-lg-6 no-gutters">
                                    <div class="main-title">
                                        <h3 class="mb-15"> <?php echo app('translator')->get('dormitory.student_dormitory_report'); ?></h3>
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
                                    <table id="table_id" class="table" cellspacing="0" width="100%">
                                        <thead>
    
                                            <tr>
                                                <?php if(!moduleStatusCheck('University')): ?>
                                                    <th><?php echo app('translator')->get('common.class_Sec'); ?></th>
                                                <?php endif; ?>
                                                <th> <?php echo app('translator')->get('student.admission_no'); ?></th>
                                                <th> <?php echo app('translator')->get('student.student_name'); ?></th>
                                                <th> <?php echo app('translator')->get('common.mobile'); ?></th>
                                                <th><?php echo app('translator')->get('student.guardian_phone'); ?></th>
                                                <th><?php echo app('translator')->get('dormitory.dormitory_name'); ?></th>
                                                <th><?php echo app('translator')->get('dormitory.room_number'); ?></th>
                                                <th><?php echo app('translator')->get('dormitory.room_type'); ?></th>
                                                <th><?php echo app('translator')->get('dormitory.cost_per_bed'); ?></th>
                                            </tr>
                                        </thead>
    
                                        <tbody>
    
                                            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
                                            <tr>
                                                <?php if(!moduleStatusCheck('University')): ?>
                                                <td>
                                                    <?php if(isset($class_id)): ?>
                                                    <?php if(!empty($student->recordClass)){ echo $student->recordClass->class->class_name; }else { echo ''; } ?>
                                                    <?php if(isset($section_id)): ?>
    
                                                    <?php echo e($student->recordSection != ""? $student->recordSection->section->section_name:""); ?>

                                                    <?php else: ?>
                                                    (<?php $__currentLoopData = $student->recordClasses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php echo e($section->section->section_name); ?> <?php echo e(!$loop->last ? ', ':''); ?>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>)
                                                    <?php endif; ?>
    
                                                   <?php else: ?>
                                                   <?php $__currentLoopData = $student->studentRecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                   <?php echo e(__('common.class')); ?> : <?php echo e($record->class->class_name); ?>(<?php echo e($record->section->section_name); ?>) <?php echo e(!$loop->last ? ', ':''); ?> <br>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                   <?php endif; ?>
                                                    <input type="hidden" name="id[]" value="<?php echo e(@$student->student_id); ?>">
                                                </td>
                                                <?php endif; ?>
    
                                                <td><?php echo e(@$student->admission_no); ?></td>
                                                <td><?php echo e(@$student->full_name); ?></td>
                                                <td><?php echo e(@$student->mobile); ?></td>
                                                <td><?php echo e(@$student->parents->guardians_mobile); ?></td>
                                                <td><?php echo e(@$student->dormitory != ""? @$student->dormitory->dormitory_name: ''); ?></td>
                                                <td><?php echo e(@$student->room != ""? @$student->room->name: ''); ?></td>
                                                <td><?php echo e(@$student->room != ""? @$student->room->roomType->type: ''); ?></td>
                                                <td><?php echo e(@$student->room != ""? number_format( (float) @$student->room->cost_per_bed, 2, '.', ''): ''); ?></td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>
    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\dormitory\student_dormitory_report.blade.php ENDPATH**/ ?>
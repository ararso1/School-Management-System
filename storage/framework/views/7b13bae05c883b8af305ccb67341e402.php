<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('reports.previous_record'); ?> 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<input type="text" hidden value="<?php echo e(@$clas->class_name); ?>" id="cls">
<input type="text" hidden value="<?php echo e(@$sec->section_name); ?>" id="sec">
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('reports.previous_record'); ?> </h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?> </a>
                <a href="#"><?php echo app('translator')->get('reports.reports'); ?></a>
                <a href="<?php echo e(route('previous-record')); ?>"><?php echo app('translator')->get('reports.previous_record'); ?>  </a> 
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
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'previous-records', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

                        <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">

                              <div class="col-lg-4 col-md-4 ">
                                <label class="primary_input_label" for=""><?php echo e(__('common.academic_year')); ?> <span class="text-danger"> *</span></label>
                                    <select class="primary_select  promote_session form-control<?php echo e($errors->has('promote_session') ? ' is-invalid' : ''); ?>" name="promote_session" id="promote_session">
                                        <option data-display="<?php echo app('translator')->get('common.select_academic_year'); ?> *" value=""><?php echo app('translator')->get('common.select_academic_year'); ?> *</option>
                                        <?php $__currentLoopData = academicYears(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($session->id); ?>" <?php echo e(isset($year)? ($session->id == $year? 'selected':''):''); ?>><?php echo e($session->year); ?> - [ <?php echo e($session->title); ?>]</option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('promote_session')): ?>
                                    <span class="text-danger d-block" >
                                        <?php echo e($errors->first('promote_session')); ?>

                                    </span>
                                    <?php endif; ?>
                                    <span class="text-danger d-none" role="alert" id="promote_session_error">
                                        <strong><?php echo app('translator')->get('reports.the_session_is_required'); ?></strong>
                                    </span>
                                </div>

                                              
                                <div class="col-lg-4 col-md-4 " id="select_class_div">
                                    <label class="primary_input_label" for=""><?php echo e(__('common.class')); ?> <span class="text-danger"> *</span></label>
                                    <select class="primary_select form-control<?php echo e($errors->has('promote_class') ? ' is-invalid' : ''); ?>" id="select_class" name="promote_class" id="select_class">
                                        <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value=""><?php echo app('translator')->get('common.select_class'); ?></option>
                                    </select>
                                    <?php if($errors->has('promote_class')): ?>
                                    <span class="text-danger d-block" >
                                        <?php echo e($errors->first('promote_class')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>

                                <div class="col-lg-4 col-md-4 " id="select_section_div">
                                    <label class="primary_input_label" for=""><?php echo e(__('common.section')); ?> <span class="text-danger"> *</span></label>
                                    <select class="primary_select form-control<?php echo e($errors->has('promote_section') ? ' is-invalid' : ''); ?>" id="select_section" name="promote_section">
                                        <option data-display="<?php echo app('translator')->get('common.select_section'); ?> *" value=""><?php echo app('translator')->get('common.select_section'); ?></option>
                                    </select>
                                    <div class="pull-right loader loader_style" id="select_section_loader">
                                        <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                    </div>
                                    <?php if($errors->has('promote_section')): ?>
                                    <span class="text-danger d-block" >
                                        <?php echo e($errors->first('promote_section')); ?>

                                    </span>
                                    <?php endif; ?>
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
        <div class="row mt-40">
                

            <div class="col-lg-12">
                <div class="white-box">
                    <div class="row">
                        <div class="col-lg-4 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-15"><?php echo app('translator')->get('common.student_list'); ?> ( <?php echo e(isset($students) ? $students->count() : 0); ?>)</h3>
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
                                <div class="table-responsive">
                                <table id="table_id_tt" class="table" cellspacing="0" width="100%">
                                    <thead>                               
                                        <tr>
                                            <th><?php echo app('translator')->get('student.admission_no'); ?></th>
                                            <th><?php echo app('translator')->get('student.roll_no'); ?></th>
                                            <th><?php echo app('translator')->get('common.name'); ?></th>
                                            <th><?php echo app('translator')->get('common.class'); ?></th>
                                            <th><?php echo app('translator')->get('student.father_name'); ?></th>
                                            <th><?php echo app('translator')->get('common.date_of_birth'); ?></th>
                                            <th><?php echo app('translator')->get('common.gender'); ?></th>
                                            <th><?php echo app('translator')->get('common.type'); ?></th>
                                            <th><?php echo app('translator')->get('common.phone'); ?></th>
                                        </tr>
                                    </thead>
        
                                    <tbody>
                                        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $studentInfo=json_decode($data->student_info);
                                            ?>
                                        <tr>
                                            <td><?php echo e($data->admission_number); ?></td>
                                            <td><?php echo e($data->previous_roll_number); ?></td>
                                            <td><?php echo e($studentInfo->full_name); ?></td>
                                            <td><?php echo e($class->class_name); ?> ( <?php echo e($section->section_name); ?> )</td>
                                            <td><?php echo e(@$data->student->parents->fathers_name); ?></td>
                                            <td ><?php echo e(dateConvert(@$data->student->date_of_birth)); ?></td>
                                            <td><?php echo e(@$data->student->gender->base_setup_name); ?></td>
                                            <td><?php echo e(@$data->student->category->category_name); ?></td>
                                            <td><?php echo e(@$data->student->mobile); ?></td>                               
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                </div>
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
      <?php endif; ?>
    </div>
</section> 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\examination\previous_record.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('student.parent_list'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('student.parent_list'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('student.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('student.student_information'); ?></a>
                    <a href="<?php echo e(route('parent-list')); ?>"><?php echo app('translator')->get('student.parent_list'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row mt-20">
                <div class="col-lg-12 student-details up_admin_visitor">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="main-title">
                                <h3 class="mb-30"><?php echo app('translator')->get('student.select_criteria'); ?> </h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'parent-list-search', 'method' => 'GET', 'enctype' => 'multipart/form-data'])); ?>

                            <div class="white-box">
                                <div class="row">
                                    <?php echo $__env->make('backEnd.common.search_criteria', [
                                        'div' => 'col-lg-3',
                                        'visiable' => ['class', 'section'],
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <div class="col-lg-3 mt-30-md">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('student.parent_name'); ?></label>
                                        <input class="primary_input_field" type="text" name="parent_name">
                                    </div>
                                    <div class="col-lg-3 mt-30-md">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('student.student_name'); ?></label>
                                        <input class="primary_input_field" type="text" name="student_name">
                                    </div>
                                    <div class="col-lg-12 mt-20 text-right">
                                        <button type="submit" class="primary-btn small fix-gr-bg">
                                            <span class="ti-search pr-2"></span>
                                            <?php echo app('translator')->get('common.search'); ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                    <div class="row mt-40">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-4 no-gutters">
                                    <div class="main-title">
                                        <h3 class="mb-0"><?php echo app('translator')->get('student.parent_list'); ?> </h3>
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
                                        <table id="table_id" class="table data-table" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th><?php echo app('translator')->get('common.sl'); ?></th>
                                                    <th><?php echo app('translator')->get('student.parent_name'); ?></th>
                                                    <th><?php echo app('translator')->get('student.child_name'); ?></th>
                                                    <th><?php echo app('translator')->get('student.class'); ?>(<?php echo app('translator')->get('student.section'); ?>)</th>
                                                    <th><?php echo app('translator')->get('common.email'); ?></th>
                                                    <th><?php echo app('translator')->get('common.phone'); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = @$parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($key + 1); ?></td>
                                                        <td>
                                                            <?php echo e(@$data->parents->guardians_name ? @$data->parents->guardians_name : @$data->parents->fathers_name); ?>

                                                        </td>
                                                        <td>
                                                            <a
                                                                target="_blank"href="<?php echo e(route('student_view', [@$data->id])); ?>">
                                                                <?php echo e(@$data->full_name); ?>

                                                            </a>
                                                        </td>
                                                        <td>
                                                            <?php echo e($data->studentRecord->class->class_name); ?>(<?php echo e($data->studentRecord->section->section_name); ?>)
                                                        </td>
                                                        <td><?php echo e(@$data->parents->guardians_email); ?></td>
                                                        <td>
                                                            <?php echo e(@$data->parents->guardians_mobile ? @$data->parents->guardians_mobile : @$data->parents->fathers_mobile); ?>

                                                        </td>
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
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\studentInformation\student_parent_list.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('behaviourRecords.incident_wise_report'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('behaviourRecords.incident_wise_report'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('behaviourRecords.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('behaviourRecords.behaviour_records'); ?></a>
                    <a href="#"><?php echo app('translator')->get('behaviourRecords.incident_wise_report'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row mt-20">
                <div class="col-lg-12 student-details up_admin_visitor">
                    <h3 class="mb-0"><?php echo app('translator')->get('behaviourRecords.incident_wise_report'); ?></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mb-20">
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
                        <table id="table_id" class="table data-table" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('behaviourRecords.admission_no'); ?>
                                    </th>
                                    <th><?php echo app('translator')->get('behaviourRecords.student_name'); ?>
                                    </th>
                                    <th><?php echo app('translator')->get('behaviourRecords.class'); ?>(<?php echo app('translator')->get('behaviourRecords.section'); ?>)
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $studentRecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $studentRecord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($studentRecord->studentRecord->studentDetail->admission_no); ?></td>
                                        <td>
                                            <a target="_blank"
                                                href="<?php echo e(route('student_view', [$studentRecord->studentRecord->studentDetail->id])); ?>"><?php echo e($studentRecord->studentRecord->studentDetail->first_name); ?>

                                                <?php echo e($studentRecord->studentRecord->studentDetail->last_name); ?></a>
                                        </td>
                                        <td><?php echo e($studentRecord->studentRecord->class->class_name); ?>(<?php echo e($studentRecord->studentRecord->section->section_name); ?>)
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
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Modules\BehaviourRecords\Resources\views\reports\incident_wise_report_modal.blade.php ENDPATH**/ ?>
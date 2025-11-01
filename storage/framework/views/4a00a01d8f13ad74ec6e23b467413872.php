<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('behaviourRecords.class_section_wise_rank_report'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('behaviourRecords.class_section_wise_rank_report'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('behaviourRecords.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('behaviourRecords.behaviour_records'); ?></a>
                    <a href="#"><?php echo app('translator')->get('behaviourRecords.class_section_wise_rank_report'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row mt-20">
                <div class="col-lg-12 student-details up_admin_visitor">
                    <div class="white-box">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-4 no-gutters">
                                    <div class="main-title">
                                        <h3 class="mb-15"><?php echo app('translator')->get('behaviourRecords.class_section_wise_rank_report'); ?> </h3>
                                    </div>
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
                                        <div class="table-responsive">
                                        <table class="table table-alignment rank-report-alignment" cellspacing="0"
                                            width="100%">
                                            <thead>
                                                <tr>
                                                    <th width="8%"><?php echo app('translator')->get('behaviourRecords.admission_no'); ?>
                                                    </th>
                                                    <th width="12%"><?php echo app('translator')->get('behaviourRecords.student'); ?>
                                                    </th>
                                                    <th width="10%"><?php echo app('translator')->get('behaviourRecords.class'); ?>(<?php echo app('translator')->get('behaviourRecords.section'); ?>)
                                                    </th>
                                                    <th width="70%">
                                                        <table width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th width="15%"><?php echo app('translator')->get('behaviourRecords.assign_incident'); ?>
                                                                    </th>
                                                                    <th width="75%"><?php echo app('translator')->get('behaviourRecords.description'); ?>
                                                                    </th>
                                                                    <th width="10%" class="text-right"><?php echo app('translator')->get('behaviourRecords.point'); ?>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $class->records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(count($record->incidents)): ?>
                                                        <tr>
                                                            <td width="8%"><?php echo e($record->studentDetail->admission_no); ?>

                                                            </td>
                                                            <td width="12%">
                                                                <a target="_blank"
                                                                    href="<?php echo e(route('student_view', [$record->studentDetail->id])); ?>"><?php echo e($record->studentDetail->first_name); ?>

                                                                    <?php echo e($record->studentDetail->last_name); ?></a>
                                                            </td>
                                                            <td width="10%">
                                                                <?php echo e($record->class->class_name); ?>(<?php echo e($record->section->section_name); ?>)
                                                            </td>
                                                            <td width="70%">
                                                                <table width="100%">
                                                                    <tbody>
                                                                        <?php $__currentLoopData = $record->studentDetail->incidents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $incident): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <tr>
                                                                                <td width="15%">
                                                                                    <?php echo e($incident->incident->title); ?>

                                                                                </td>
                                                                                <td width="75%">
                                                                                    <?php echo e($incident->incident->description); ?>

                                                                                </td>
                                                                                <td width="10%" class="text-center">
                                                                                    <?php echo e($incident->incident->point); ?>

                                                                                </td>
                                                                            </tr>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    <?php endif; ?>
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
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Modules/BehaviourRecords\Resources/views/reports/class_section_wise_rank_report_modal.blade.php ENDPATH**/ ?>
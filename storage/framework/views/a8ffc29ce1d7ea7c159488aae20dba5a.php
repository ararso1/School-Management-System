<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('behaviourRecords.student_incident_report'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('behaviourRecords.student_incident_report'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('behaviourRecords.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('behaviourRecords.behaviour_records'); ?></a>
                    <a href="#"><?php echo app('translator')->get('behaviourRecords.student_incident_report'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row mt-20">
                <div class="col-lg-12 student-details up_admin_visitor">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'behaviour_records.student_incident_report_search', 'method' => 'GET', 'enctype' => 'multipart/form-data'])); ?>

                            <div class="white-box">
                                <div class="row">
                                    <div class="col-lg-8 col-md-6">
                                        <div class="main-title">
                                            <h3 class="mb-15"><?php echo app('translator')->get('behaviourRecords.select_criteria'); ?> </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <?php echo $__env->make('backEnd.common.search_criteria', [
                                        'div' => 'col-lg-4',
                                        'required' => ['academic', 'class', 'section'],
                                        'visiable' => ['academic', 'class', 'section'],
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <div class="col-lg-12 mt-20 text-right">
                                        <button type="submit" class="primary-btn small fix-gr-bg">
                                            <span class="ti-search pr-2"></span>
                                            <?php echo app('translator')->get('behaviourRecords.search'); ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                    <?php if(isset($student_records)): ?>
                        <div class="row mt-40">
                            <div class="col-lg-12">
                                <div class="white-box">
                                    <div class="row">
                                        <div class="col-lg-4 no-gutters">
                                            <div class="main-title">
                                                <h3 class="mb-15"><?php echo app('translator')->get('behaviourRecords.student_incident_list'); ?> </h3>
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
                                                <table id="table_id" class="table" cellspacing="0"
                                                    width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th><?php echo app('translator')->get('behaviourRecords.admission_no'); ?></th>
                                                            <th><?php echo app('translator')->get('behaviourRecords.student_name'); ?></th>
                                                            <th><?php echo app('translator')->get('behaviourRecords.class'); ?>(<?php echo app('translator')->get('behaviourRecords.section'); ?>)</th>
                                                            <th><?php echo app('translator')->get('behaviourRecords.gender'); ?></th>
                                                            <th><?php echo app('translator')->get('behaviourRecords.phone'); ?></th>
                                                            <th><?php echo app('translator')->get('behaviourRecords.total_incidents'); ?></th>
                                                            <th><?php echo app('translator')->get('behaviourRecords.total_points'); ?></th>
                                                            <th><?php echo app('translator')->get('behaviourRecords.actions'); ?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $__currentLoopData = $student_records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php
                                                                $incident = 0;
                                                                foreach ($data->student->incidents as $student_point) {
                                                                    $incident += $student_point->incident->point;
                                                                }
                                                            ?>
                                                            <tr>
                                                                <td><?php echo e($data->student->admission_no); ?></td>
                                                                <td>
                                                                    <a target="_blank"
                                                                        href="<?php echo e(route('student_view', [$data->student->id])); ?>"><?php echo e($data->student->first_name); ?>

                                                                        <?php echo e($data->student->last_name); ?></a>
                                                                </td>
                                                                <td><?php echo e($data->class->class_name); ?>(<?php echo e($data->section->section_name); ?>)
                                                                </td>
                                                                <td><?php echo e($data->student->gender->base_setup_name); ?></td>
                                                                <td><?php echo e($data->student->mobile); ?></td>
                                                                <td><?php echo e($data->incidents_count); ?></td>
                                                                <td><?php echo e($data->incidents_sum_point ? $data->incidents_sum_point : 0); ?></td>
                                                                <td>
                                                                    <?php if (isset($component)) { $__componentOriginalf5ee9bc45d6af00850b10ff7521278be = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf5ee9bc45d6af00850b10ff7521278be = $attributes; } ?>
<?php $component = App\View\Components\DropDown::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('drop-down'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\DropDown::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                                        <a class="dropdown-item modalLink"
                                                                            data-modal-size="large-modal"
                                                                            title="Student All Incident-<?php echo e($data->student->full_name); ?>"
                                                                            href="<?php echo e(route('behaviour_records.view_student_all_incident_modal', [$data->student->id])); ?>"><?php echo app('translator')->get('common.view'); ?></a>
                                                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf5ee9bc45d6af00850b10ff7521278be)): ?>
<?php $attributes = $__attributesOriginalf5ee9bc45d6af00850b10ff7521278be; ?>
<?php unset($__attributesOriginalf5ee9bc45d6af00850b10ff7521278be); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf5ee9bc45d6af00850b10ff7521278be)): ?>
<?php $component = $__componentOriginalf5ee9bc45d6af00850b10ff7521278be; ?>
<?php unset($__componentOriginalf5ee9bc45d6af00850b10ff7521278be); ?>
<?php endif; ?>
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
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Modules\BehaviourRecords\Resources\views\reports\student_incident_report.blade.php ENDPATH**/ ?>
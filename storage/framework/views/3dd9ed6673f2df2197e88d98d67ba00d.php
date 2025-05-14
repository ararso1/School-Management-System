<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('behaviourRecords.student_behaviour_rank_report'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('behaviourRecords.student_behaviour_rank_report'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('behaviourRecords.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('behaviourRecords.behaviour_records'); ?></a>
                    <a href="#"><?php echo app('translator')->get('behaviourRecords.student_behaviour_rank_report'); ?></a>
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
                            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'behaviour_records.student_behaviour_rank_report_search', 'method' => 'GET', 'enctype' => 'multipart/form-data'])); ?>

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
                                        'div' => 'col-lg-3',
                                        'required' => ['academic'],
                                        'visiable' => ['academic', 'class', 'section'],
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <div class="col-lg-2 mt-30-md" id="select_type_div">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('behaviourRecords.type'); ?>
                                            <span
                                                class="text-danger"> </span></label>
                                        <select class="primary_select " id="select_type" name="type" <?php echo e(old('type') ? 'selected' : ''); ?>>
                                            <option data-display="<?php echo app('translator')->get('behaviourRecords.select_type'); ?>" value="">
                                                <?php echo app('translator')->get('behaviourRecords.select_type'); ?></option>
                                            <option value="lesser_than_or_equal">
                                                <?php echo app('translator')->get('behaviourRecords.less_than_or_equal'); ?></option>
                                            <option value="greater_than_or_equal">
                                                <?php echo app('translator')->get('behaviourRecords.great_than_or_equal'); ?></option>
                                        </select>
                                    </div>
                                    <div class="col-lg-1 mt-30-md" id="point_div">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('behaviourRecords.point'); ?>
                                            <span
                                                class="text-danger"> </span></label>
                                        <input class="primary_input_field" type="number" name="point" autocomplete="off"
                                            value="<?php echo e(old('point')); ?>">
                                    </div>
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
                    <?php if(isset($students)): ?>
                        <div class="row mt-40">
                            <div class="col-lg-12">
                                <div class="white-box">
                                    <div class="row">
                                        <div class="col-lg-4 no-gutters">
                                            <div class="main-title">
                                                <h3 class="mb-15"><?php echo app('translator')->get('behaviourRecords.student_behaviour_rank_list'); ?> </h3>
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
                                                            <th><?php echo app('translator')->get('behaviourRecords.rank'); ?></th>
                                                            <th><?php echo app('translator')->get('behaviourRecords.admission_no'); ?></th>
                                                            <th><?php echo app('translator')->get('behaviourRecords.student_name'); ?></th>
                                                            <th><?php echo app('translator')->get('behaviourRecords.class'); ?>(<?php echo app('translator')->get('behaviourRecords.section'); ?>)</th>
                                                            <th><?php echo app('translator')->get('behaviourRecords.gender'); ?></th>
                                                            <th><?php echo app('translator')->get('behaviourRecords.phone'); ?></th>
                                                            <th><?php echo app('translator')->get('behaviourRecords.total_points'); ?></th>
                                                            <th><?php echo app('translator')->get('behaviourRecords.actions'); ?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php
                                                                $incident = 0;
                                                                foreach ($data->incidents as $student_point) {
                                                                    $incident += $student_point->incident->point;
                                                                }
                                                            ?>
                                                            <tr>
                                                                <td><?php echo e($key + 1); ?></td>
                                                                <td><?php echo e($data->admission_no); ?></td>
                                                                <td>
                                                                    <a target="_blank"
                                                                        href="<?php echo e(route('student_view', [$data->id])); ?>"><?php echo e($data->first_name); ?>

                                                                        <?php echo e($data->last_name); ?></a>
                                                                </td>
                                                                <td>
                                                                    <?php $__currentLoopData = $data->studentRecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $studentRecord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php echo e($studentRecord->class->class_name); ?>(<?php echo e($studentRecord->section->section_name); ?>)
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </td>
                                                                <td><?php echo e($data->gender->base_setup_name); ?></td>
                                                                <td><?php echo e($data->mobile); ?></td>
                                                                <td><?php echo e($data->incidents_sum_point); ?></td>
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
                                                                            title="Behaviour Rank-<?php echo e($data->full_name); ?>"
                                                                            href="<?php echo e(route('behaviour_records.view_behaviour_rank_modal', [$data->id])); ?>"><?php echo app('translator')->get('common.view'); ?></a>
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
<?php $__env->startPush('script'); ?>
    <script>
        $(document).ready(function() {
            $("#point_div").hide();
            $("#select_type").change(function() {
                if ($(this).val() == "lesser_than_or_equal" || $(this).val() == "greater_than_or_equal") {
                    $("#point_div").show();
                } else {
                    $("#point_div").hide();
                }
            });
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Modules\BehaviourRecords\Resources\views\reports\student_behaviour_rank_report.blade.php ENDPATH**/ ?>
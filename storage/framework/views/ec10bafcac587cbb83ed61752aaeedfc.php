<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('behaviourRecords.incidents'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('behaviourRecords.incidents'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('behaviourRecords.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('behaviourRecords.behaviour_records'); ?></a>
                    <a href="#"><?php echo app('translator')->get('behaviourRecords.incidents'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row mt-40">
                <div class="col-lg-12">
                    <div class="white-box">
                    <div class="col-lg-12 text-md-right col-md-6 mb-30-lg col-6 mb-20 p-0">
                        <button class="primary-btn-small-input primary-btn small fix-gr-bg" type="button"
                            data-toggle="modal" data-target="#addIncident">
                            <span class="ti-plus pr-2"></span>
                            <?php echo app('translator')->get('behaviourRecords.add'); ?>
                        </button>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-15"><?php echo app('translator')->get('behaviourRecords.incident_list'); ?></h3>
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
                                            <th><?php echo app('translator')->get('behaviourRecords.title'); ?></th>
                                            <th><?php echo app('translator')->get('behaviourRecords.point'); ?></th>
                                            <th width="65%"><?php echo app('translator')->get('behaviourRecords.description'); ?></th>
                                            <th><?php echo app('translator')->get('behaviourRecords.actions'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $incidents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="col-lg-2"><?php echo e($data->title); ?></td>
                                                <td class="col-lg-2"><?php echo e($data->point); ?></td>
                                                <td class="col-lg-6"><?php echo e($data->description); ?></td>
                                                <td class="col-lg-2">
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
                                                        <a class="dropdown-item" data-toggle="modal"
                                                            data-target="#editIncident<?php echo e(@$data->id); ?>"
                                                            href="#">
                                                            <?php echo app('translator')->get('common.edit'); ?>
                                                        </a>
                                                        <a class="dropdown-item" data-toggle="modal"
                                                            data-target="#deleteIncident<?php echo e(@$data->id); ?>"
                                                            href="#">
                                                            <?php echo app('translator')->get('common.delete'); ?>
                                                        </a>
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

                                            <!-- Start Incident Edit Modal -->
                                            <div class="modal fade admin-query" id="editIncident<?php echo e(@$data->id); ?>">
                                                <div class="modal-dialog modal-dialog-centered large-modal">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title"><?php echo app('translator')->get('behaviourRecords.edit_incident'); ?></h4>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'behaviour_records.incident_update', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                                                        <input type="hidden" name="id" value="<?php echo e(@$data->id); ?>">
                                                        <div class="modal-body">
                                                            <div class="container-fluid">
                                                                <form action="">
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <div class="row">
                                                                                <div class="col-lg-12">
                                                                                    <div class="primary_input">
                                                                                        <label class="primary_input_label"
                                                                                            for=""><?php echo app('translator')->get('behaviourRecords.title'); ?><span
                                                                                                class="text-danger">
                                                                                                *</span></label>
                                                                                        <input
                                                                                            class="primary_input_field read-only-input form-control"
                                                                                            type="text" name="title"
                                                                                            value="<?php echo e(@$data->title); ?>"
                                                                                            id="title">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12 mt-25">
                                                                            <div class="row">
                                                                                <div class="col-lg-6">
                                                                                    <div class="primary_input">
                                                                                        <label class="primary_input_label"
                                                                                            for=""><?php echo app('translator')->get('behaviourRecords.point'); ?><span
                                                                                                class="text-danger">
                                                                                                *</span></label>
                                                                                        <input
                                                                                            class="primary_input_field read-only-input form-control"
                                                                                            type="text" name="point"
                                                                                            value="<?php echo e(@$data->point); ?>"
                                                                                            id="point">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-6">
                                                                                    <div class="primary_input sm_mb_20 mt-30"
                                                                                        style="position: relative; top: 12px;">
                                                                                        <input type="checkbox"
                                                                                            name="editNegativePoint"
                                                                                            id="editNegativePoint<?php echo e(@$data->id); ?>"
                                                                                            class="common-checkbox permission-checkAll"
                                                                                            <?php echo e(@$data->point < 0 ? 'checked' : ''); ?>

                                                                                            value="1">
                                                                                        <label
                                                                                            for="editNegativePoint<?php echo e(@$data->id); ?>"><?php echo app('translator')->get('behaviourRecords.is_this_neagtive_incident'); ?></label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12 mt-25">
                                                                            <div class="row">
                                                                                <div class="col-lg-12">
                                                                                    <div class="primary_input">
                                                                                        <label class="primary_input_label"
                                                                                            for=""><?php echo app('translator')->get('behaviourRecords.description'); ?></label>
                                                                                        <textarea class="primary_input_field form-control" cols="0" rows="3" name="description" id="description"><?php echo e(@$data->description); ?></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12 text-center mt-25">
                                                                            <div class="d-flex justify-content-between">
                                                                                <button type="button"
                                                                                    class="primary-btn tr-bg"
                                                                                    data-dismiss="modal"><?php echo app('translator')->get('behaviourRecords.cancel'); ?></button>
                                                                                <button
                                                                                    class="primary-btn fix-gr-bg submit"
                                                                                    id="save_button_query"
                                                                                    type="submit"><?php echo app('translator')->get('behaviourRecords.save'); ?></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <?php echo e(Form::close()); ?>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Incident Edit Modal -->
                                            <!-- Start Incident Delete Modal -->
                                            <div class="modal fade admin-query" id="deleteIncident<?php echo e(@$data->id); ?>">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title"><?php echo app('translator')->get('behaviourRecords.delete_incident'); ?></h4>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="text-center">
                                                                <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                                                            </div>
                                                            <div class="mt-40 d-flex justify-content-between">
                                                                <button type="button" class="primary-btn tr-bg"
                                                                    data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                                                                <a href="<?php echo e(route('behaviour_records.incident_delete', [@$data->id])); ?>"
                                                                    class="text-light">
                                                                    <button class="primary-btn fix-gr-bg"
                                                                        type="submit"><?php echo app('translator')->get('common.delete'); ?></button>
                                                                </a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Incident Delete Modal -->
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

    <!-- Start Incident Add Modal -->
    <div class="modal fade admin-query" id="addIncident">
        <div class="modal-dialog modal-dialog-centered large-modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('behaviourRecords.add_incident'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'behaviour_records.incident_create', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('behaviourRecords.title'); ?><span
                                                        class="text-danger"> *</span></label>
                                                <input class="primary_input_field read-only-input form-control"
                                                    type="text" name="title" id="title">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-25">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('behaviourRecords.point'); ?><span
                                                        class="text-danger"> *</span></label>
                                                <input class="primary_input_field read-only-input form-control"
                                                    type="number" min="0" name="point" id="point element_point">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="primary_input sm_mb_20 mt-30"
                                                style="position: relative; top: 12px;">
                                                <input type="checkbox" name="negativePoint" id="negativePoint"
                                                    class="common-checkbox permission-checkAll" value="1">
                                                <label for="negativePoint"><?php echo app('translator')->get('behaviourRecords.is_this_neagtive_incident'); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-25">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label"
                                                    for=""><?php echo app('translator')->get('behaviourRecords.description'); ?></label>
                                                <textarea class="primary_input_field form-control" cols="0" rows="3"
                                                    name="description" id="description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center mt-25">
                                    <div class="d-flex justify-content-between">
                                        <button type="button" class="primary-btn tr-bg"
                                            data-dismiss="modal"><?php echo app('translator')->get('behaviourRecords.cancel'); ?></button>
                                        <button class="primary-btn fix-gr-bg submit" id="save_button_query"
                                            type="submit"><?php echo app('translator')->get('behaviourRecords.save'); ?></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
    <!-- End Incident Add Modal -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Modules/BehaviourRecords\Resources/views/incidents/incident.blade.php ENDPATH**/ ?>
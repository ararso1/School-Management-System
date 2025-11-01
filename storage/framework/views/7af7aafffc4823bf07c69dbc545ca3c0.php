<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('system_settings.holiday_list'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<style>
    .input-right-icon button.primary-btn-small-input {
        top: 8px;
        right: 11px;
    }

</style>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('system_settings.holiday_list'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('system_settings.system_settings'); ?></a>
                <a href="#"><?php echo app('translator')->get('system_settings.holiday_list'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
        <?php if(isset($editData)): ?>
        <?php if(userPermission("holiday-store")): ?>
        <div class="row">
            <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                <a href="<?php echo e(url('holiday')); ?>" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus pr-2"></span>
                    <?php echo app('translator')->get('common.add'); ?>
                </a>
            </div>
        </div>
        <?php endif; ?>
        <?php endif; ?>
        <div class="row">
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12">
                        <?php if(isset($editData)): ?>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'holiday/' . $editData->id, 'method' => 'PUT', 'enctype' => 'multipart/form-data'])); ?>

                        <?php else: ?>
                        <?php if(userPermission("holiday-store")): ?>
                        <?php echo e(Form::open([
                                        'class' => 'form-horizontal',
                                        'files' => true,
                                        'url' => 'holiday',
                                        'method' => 'POST',
                                        'enctype' => 'multipart/form-data',
                                    ])); ?>

                        <?php endif; ?>
                        <?php endif; ?>
                        <div class="white-box">
                            <div class="main-title">
                                <h3 class="mb-15">
                                    <?php if(isset($editData)): ?>
                                    <?php echo app('translator')->get('system_settings.edit_holiday'); ?>
                                    <?php else: ?>
                                    <?php echo app('translator')->get('system_settings.add_holiday'); ?>
                                    <?php endif; ?>
                                </h3>
                            </div>
                            <div class="add-visitor">
                                <div class="row">

                                    <div class="col-lg-12 mb-20">
                                        <div class="primary_input">
                                            <label class="primary_input_label"
                                                for=""><?php echo app('translator')->get('system_settings.holiday_title'); ?>
                                                <span class="text-danger"> *</span> </label>
                                            <input
                                                class="primary_input_field form-control<?php echo e($errors->has('holiday_title') ? ' is-invalid' : ''); ?>"
                                                type="text" name="holiday_title" autocomplete="off"
                                                value="<?php echo e(isset($editData) ? $editData->holiday_title : ''); ?>">


                                            <?php if($errors->has('holiday_title')): ?>
                                            <span class="text-danger">
                                                <?php echo e($errors->first('holiday_title')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">

                                </div>
                                <div class="row mb-15">

                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label"
                                                for="from_date"><?php echo e(__('common.from_date')); ?> <span
                                                    class="text-danger"></span></label>
                                            <div class="primary_datepicker_input">
                                                <div class="no-gutters input-right-icon">
                                                    <div class="col">
                                                        <div class="">
                                                            <input
                                                                class="primary_input_field  primary_input_field date form-control form-control<?php echo e($errors->has('from_date') ? ' is-invalid' : ''); ?>"
                                                                id="event_from_date" type="text" name="from_date"
                                                                value="<?php echo e(isset($editData) ? date('m/d/Y', strtotime($editData->from_date)) : date('m/d/Y')); ?>"
                                                                autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <button class="btn-date" data-id="#event_from_date" type="button">
                                                        <label class="m-0 p-0" for="event_from_date">
                                                            <i class="ti-calendar" id="start-date-icon"></i>
                                                        </label>
                                                    </button>
                                                </div>
                                            </div>
                                            <span class="text-danger"><?php echo e($errors->first('from_date')); ?></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row  mb-20">

                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label"
                                                for="from_date"><?php echo e(__('common.to_date')); ?> <span
                                                    class="text-danger"></span></label>
                                            <div class="primary_datepicker_input">
                                                <div class="no-gutters input-right-icon">
                                                    <div class="col">
                                                        <div class="">
                                                            <input
                                                                class="primary_input_field  primary_input_field date form-control form-control<?php echo e($errors->has('to_date') ? ' is-invalid' : ''); ?>"
                                                                id="event_to_date" type="text" name="to_date"
                                                                value="<?php echo e(isset($editData) ? date('m/d/Y', strtotime($editData->to_date)) : date('m/d/Y')); ?>"
                                                                autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <button class="btn-date" data-id="#event_to_date" type="button">
                                                        <label class="m-0 p-0" for="event_to_date">
                                                            <i class="ti-calendar" id="start-date-icon"></i>
                                                        </label>
                                                    </button>
                                                </div>
                                            </div>
                                            <span class="text-danger"><?php echo e($errors->first('to_date')); ?></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-15">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('common.description'); ?>
                                                <span class="text-danger"> *</span> </label>
                                            <textarea
                                                class="primary_input_field form-control <?php echo e($errors->has('details') ? ' is-invalid' : ''); ?>"
                                                cols="0" rows="4"
                                                name="details"><?php echo e(isset($editData) ? $editData->details : ''); ?></textarea>


                                            <?php if($errors->has('details')): ?>
                                            <span class="text-danger">
                                                <?php echo e($errors->first('details')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row no-gutters input-right-icon mb-20">
                                    <div class="col">
                                        <div class="primary_input">
                                            <input class="primary_input_field form-control" name="upload_file_name"
                                                type="text"
                                                placeholder="<?php echo e(isset($editData->upload_image_file) && $editData->upload_image_file != '' ? getFilePath3($editData->upload_image_file) : trans('common.attach_file')); ?>"
                                                id="placeholderHolidayFile" readonly>
                                              
                                            <?php if($errors->has('upload_file_name')): ?>
                                            <span class="text-danger d-block">
                                                <?php echo e($errors->first('upload_file_name')); ?></span>
                                            <?php endif; ?>
                                            <code>(PDF,DOC,DOCX,JPG,JPEG,PNG,TXT are allowed for upload)</code>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button class="primary-btn-small-input" type="button">
                                            <label class="primary-btn small fix-gr-bg"
                                                for="upload_holiday_image"><?php echo app('translator')->get('common.browse'); ?></label>
                                            <input type="file" class="d-none form-control" name="upload_file_name"
                                                id="upload_holiday_image">
                                        </button>

                                    </div>
                                </div>
                                <?php
                                $tooltip = '';
                                if (userPermission("holiday-store")) {
                                $tooltip = '';
                                } else {
                                $tooltip = 'You have no permission to add';
                                }
                                ?>
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn fix-gr-bg submit" data-toggle="tooltip"
                                            title="<?php echo e(@$tooltip); ?>">
                                            <span class="ti-check"></span>
                                            <?php if(isset($editData)): ?>
                                            <?php echo app('translator')->get('common.update'); ?>
                                            <?php else: ?>
                                            <?php echo app('translator')->get('common.save'); ?>
                                            <?php endif; ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="white-box">
                    <div class="row">
                        <div class="col-lg-4 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-15"><?php echo app('translator')->get('system_settings.holiday_list'); ?></h3>
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
                                            <th><?php echo app('translator')->get('common.sl'); ?></th>
                                            <th><?php echo app('translator')->get('system_settings.holiday_title'); ?></th>
                                            <th><?php echo app('translator')->get('system_settings.from_date'); ?></th>
                                            <th><?php echo app('translator')->get('system_settings.to_date'); ?></th>
                                            <th><?php echo app('translator')->get('common.days'); ?></th>
                                            <th><?php echo app('translator')->get('system_settings.details'); ?></th>
                                            <th><?php echo app('translator')->get('common.action'); ?></th>
                                        </tr>
                                    </thead>
    
                                    <tbody>
                                        <?php if(isset($holidays)): ?>
                                        <?php $__currentLoopData = $holidays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
    
                                        $start = strtotime($value->from_date);
                                        $end = strtotime($value->to_date);
    
                                        $days_between = ceil(abs($end - $start) / 86400);
                                        $days = $days_between + 1;
    
                                        ?>
                                        <tr>
                                            <td><?php echo e($key + 1); ?></td>
                                            <td><?php echo e($value->holiday_title); ?></td>
                                            <td data-sort="<?php echo e(strtotime($value->from_date)); ?>">
                                                <?php echo e($value->from_date != '' ? dateConvert($value->from_date) : ''); ?>

    
                                            </td>
                                            <td data-sort="<?php echo e(strtotime($value->to_date)); ?>">
                                                <?php echo e($value->to_date != '' ? dateConvert($value->to_date) : ''); ?>

    
                                            </td>
                                            <td><?php echo e($days == 1 ? $days . ' day' : $days . ' days'); ?></td>
                                            <td><?php echo e(Illuminate\Support\Str::limit(@$value->details, 50)); ?></td>
    
    
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
                                                    <?php if(userPermission("holiday-edit")): ?>
                                                    <a class="dropdown-item"
                                                        href="<?php echo e(url('holiday/' . $value->id . '/edit')); ?>"><?php echo app('translator')->get('common.edit'); ?></a>
                                                    <?php endif; ?>
                                                    <?php if(userPermission("delete-holiday-data-view")): ?>
                                                    <a class="deleteUrl dropdown-item" data-modal-size="modal-md"
                                                        title="<?php echo app('translator')->get('system_settings.delete_holiday'); ?>"
                                                        href="<?php echo e(url('delete-holiday-data-view/' . $value->id)); ?>"><?php echo app('translator')->get('common.delete'); ?></a>
                                                    <?php endif; ?>
                                                    <?php if($value->upload_image_file != ''): ?>
                                                    <a class="dropdown-item" href="<?php echo e(url($value->upload_image_file)); ?>"
                                                        download>
                                                        <?php echo app('translator')->get('common.download'); ?> <span
                                                            class="pl ti-download"></span>
                                                        <?php endif; ?>
    
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
                                        <?php endif; ?>
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
<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/backEnd/holidays/holidaysList.blade.php ENDPATH**/ ?>
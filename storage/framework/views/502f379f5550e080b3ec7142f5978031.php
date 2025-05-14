<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('fees.fees_master'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<?php $__env->startPush('css'); ?>
<style>
    .custom_fees_master {
        border-bottom: 1px solid #d9dce7;
        padding-top: 5px;
    }


    .dloader_img_style {
        width: 40px;
        height: 40px;
    }

    .dloader {
        display: none;
    }

    .pre_dloader {
        display: block;
    }
</style>
<?php $__env->stopPush(); ?>
<?php
$setting = app('school_info');
if (!empty($setting->currency_symbol)) {
$currency = $setting->currency_symbol;
} else {
$currency = '$';
}
?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('fees.fees_master'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('fees.fees_collection'); ?></a>
                <a href="#"><?php echo app('translator')->get('fees.fees_master'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
        <?php if(isset($fees_master)): ?>
        <?php if(userPermission('fees-master-store')): ?>
        <div class="row">
            <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                <a href="<?php echo e(route('fees-master')); ?>" class="primary-btn small fix-gr-bg">
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

                        <?php if(isset($fees_master)): ?>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => ['fees-master-update', $fees_master->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'id' => 'fees_master_form'])); ?>

                        <?php else: ?>
                        <?php if(userPermission('fees-master-store')): ?>
                        <?php echo e(Form::open([
                                        'class' => 'form-horizontal',
                                        'files' => true,
                                        'route' => 'fees-master-store',
                                        'method' => 'POST',
                                        'enctype' => 'multipart/form-data',
                                        'id' => 'fees_master_form',
                                    ])); ?>

                        <?php endif; ?>
                        <?php endif; ?>
                        <div class="white-box">
                            <div class="main-title">
                                <h3 class="mb-15">
                                    <?php if(isset($fees_master)): ?>
                                    <?php echo app('translator')->get('fees.edit_fees_master'); ?>
                                    <?php else: ?>
                                    <?php echo app('translator')->get('fees.add_fees_master'); ?>
                                    <?php endif; ?>
    
                                </h3>
                            </div>
                            <div class="add-visitor">
                                <div class="row">
                                    <div class="col-lg-12">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('fees.fees_type'); ?>
                                                <span class="text-danger"> *</span></label>
                                        <select
                                            class="primary_select  form-control<?php echo e($errors->has('fees_type') ? ' is-invalid' : ''); ?>"
                                            name="fees_type">
                                            <option data-display="<?php echo app('translator')->get('fees.fees_type'); ?> *" value="">
                                                <?php echo app('translator')->get('fees.fees_type'); ?>
                                                *
                                            </option>
                                            <?php $__currentLoopData = $fees_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fees_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(!in_array($fees_type->id, $already_assigned)): ?>
                                            <?php if(isset($fees_master)): ?>
                                            <option value="<?php echo e($fees_type->id); ?>"
                                                <?php echo e($fees_type->id == $fees_master->fees_type_id ? 'selected' : ''); ?>>
                                                <?php echo e(@$fees_type->name); ?>

                                                (<?php echo e(@$fees_type->fessGroup->name); ?>)
                                            </option>
                                            <?php else: ?>
                                            <option value="<?php echo e($fees_type->id); ?>"><?php echo e(@$fees_type->name); ?>

                                                (<?php echo e(@$fees_type->fessGroup->name); ?>)</option>
                                            <?php endif; ?>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('fees_type')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('fees_type')); ?>

                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <input type="hidden" name="id"
                                    value="<?php echo e(isset($fees_master) ? $fees_master->id : ''); ?>">
                                <input type="hidden" name="fees_group_id"
                                    value="<?php echo e(isset($fees_master) ? $fees_master->fees_group_id : ''); ?>">
                                <div class="primary_datepicker_input">
                                    <div class="row no-gutters input-right-icon mt-25">
                                        <div class="col">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('fees.due_date'); ?></label>
                                                <input
                                                    class="primary_input_field primary_input_field date form-control<?php echo e($errors->has('date') ? ' is-invalid' : ''); ?>"
                                                    id="startDate" type="text" name="date"
                                                    value="<?php echo e(isset($fees_master) ? date('m/d/Y', strtotime($fees_master->date)) : date('m/d/Y')); ?>">
                                                    <button class="btn-date" style="top: 70% !important;" data-id="#date_of_birth" type="button">
                                                        <label class="m-0 p-0" for="date_of_birth">
                                                            <i class="ti-calendar" id="start-date-icon"></i>
                                                        </label>
                                                    </button>
                                                

                                                <?php if($errors->has('date')): ?>
                                                <span class="text-danger">
                                                    <?php echo e($errors->first('date')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        

                                    </div>
                                </div>
                                <?php if(isset($fees_master)): ?>
                                <div class="row  mt-25" id="fees_master_amount">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('fees.amount'); ?> <span class="text-danger"> *</span></label>
                                            <input oninput="numberCheckWithDot(this)"
                                                class="primary_input_field form-control<?php echo e($errors->has('amount') ? ' is-invalid' : ''); ?>"
                                                type="text" name="amount" autocomplete="off"
                                                value="<?php echo e(isset($fees_master) ? $fees_master->amount : ''); ?>">
                                           

                                            <?php if($errors->has('amount')): ?>
                                            <span class="text-danger">
                                                <?php echo e($errors->first('amount')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php else: ?>
                                <div class="row  mt-25" id="fees_master_amount">
                                    <div class="col-lg-12">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('fees.amount'); ?>
                                            <span class="text-danger"> *</span></label>
                                        <div class="primary_input">
                                            <input oninput="numberCheckWithDot(this)"
                                                class="primary_input_field form-control<?php echo e($errors->has('amount') ? ' is-invalid' : ''); ?>"
                                                type="text" name="amount" autocomplete="off"
                                                value="<?php echo e(isset($fees_master) ? $fees_master->amount : ''); ?>">
                                            

                                            <?php if($errors->has('amount')): ?>
                                            <span class="text-danger">
                                                <?php echo e($errors->first('amount')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php
                                $tooltip = '';
                                if (userPermission('fees-master-store') || userPermission('fees-master-edit')) {
                                $tooltip = '';
                                } else {
                                $tooltip = 'You have no permission to add';
                                }
                                ?>

                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn fix-gr-bg submit" data-toggle="tooltip"
                                            title="<?php echo e($tooltip); ?>">
                                            <span class="ti-check"></span>
                                            <?php if(isset($fees_master)): ?>
                                            <?php echo app('translator')->get('fees.update_fees_master'); ?>
                                            <?php else: ?>
                                            <?php echo app('translator')->get('fees.save_fees_master'); ?>
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
                                <h3 class="mb-15"><?php echo app('translator')->get('fees.fees_master_list'); ?></h3>
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
                                            <th><?php echo app('translator')->get('fees.group'); ?></th>
                                            <th><?php echo app('translator')->get('common.type'); ?></th>
                                            <th><?php echo app('translator')->get('common.action'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $fees_masters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td valign="top">
                                                <?php $i = 0; ?>
                                                <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fees_master): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php $i++; ?>
                                                <?php if($i == 1): ?>
                                                <?php echo e(@$fees_master->feesGroups->name); ?>

                                                <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </td>
                                            <td>
                                                <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fees_master): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="row row-gap-24 my-3">
                                                    <div class="col-sm-6 custom_fees_master">
                                                        <?php echo e($fees_master->feesTypes != '' ? @$fees_master->feesTypes->name : ''); ?>

                                                    </div>
                                                    <div class="col-sm-2 custom_fees_master nowrap">
                                                        <?php echo e(currency_format((float) $fees_master->amount)); ?>

                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="dropdown CRM_dropdown">
                                                            <button type="button"
                                                                class="btn dropdown-toggle"
                                                                data-toggle="dropdown">
                                                                <?php echo app('translator')->get('common.select'); ?>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right mr-20">
                                                                <?php if(userPermission('fees-master-edit')): ?>
                                                                <a class="dropdown-item"
                                                                    href="<?php echo e(route('fees-master-edit', [$fees_master->id])); ?>"><?php echo app('translator')->get('common.edit'); ?></a>
                                                                <?php endif; ?>
                                                                <?php if(userPermission('fees-master-delete')): ?>
                                                                <?php if(!@$fees_master->un_semester_label_id): ?>
                                                                <a class="dropdown-item deleteFeesMasterSingle"
                                                                    data-toggle="modal"
                                                                    data-target="#deleteFeesMasterSingle<?php echo e($fees_master->id); ?>"
                                                                    href="#"
                                                                    data-id="<?php echo e($fees_master->id); ?>">
                                                                    <?php echo app('translator')->get('common.delete'); ?>
                                                                </a>
                                                                <?php endif; ?>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
    
                                                    </div>
                                                </div>
    
                                                <div class="modal fade admin-query"
                                                    id="deleteFeesMasterSingle<?php echo e($fees_master->id); ?>">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title"><?php echo app('translator')->get('fees.delete_fees_type'); ?></h4>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal">&times;</button>
                                                            </div>
    
                                                            <div class="modal-body">
                                                                <div class="text-center">
                                                                    <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                                                                </div>
    
                                                                <div class="mt-40 d-flex justify-content-between">
                                                                    <button type="button"
                                                                        class="primary-btn tr-bg"
                                                                        data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                                                                    <?php echo e(Form::open(['url' => 'fees-master-single-delete', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                                                                    <input type="hidden" name="id"
                                                                        id=""
                                                                        value="<?php echo e($fees_master->id); ?>">
                                                                    <button class="primary-btn fix-gr-bg"
                                                                        type="submit"><?php echo app('translator')->get('common.delete'); ?></button>
                                                                    <?php echo e(Form::close()); ?>

                                                                </div>
                                                            </div>
    
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </td>
                                            <td valign="top">
                                                <?php $i = 0; ?>
                                                <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fees_master): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php $i++; ?>
                                                <?php if($i == 1): ?>
                                                <div class="dropdown CRM_dropdown">
                                                    <button type="button" class="btn dropdown-toggle"
                                                        data-toggle="dropdown">
                                                        <?php echo app('translator')->get('common.select'); ?>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
    
                                                        <?php if($fees_master->fees_group_id && userPermission('fees_assign')): ?>
                                                        <a class="dropdown-item"
                                                            href="<?php echo e(route('fees_assign', [$fees_master->fees_group_id])); ?>"><?php echo app('translator')->get('fees.assign'); ?>/<?php echo app('translator')->get('common.view'); ?></a>
                                                        <?php endif; ?>
                                                        <a class="dropdown-item deleteFeesMasterGroup"
                                                            data-toggle="modal" href="#"
                                                            data-id="<?php echo e($fees_master->fees_group_id); ?>"
                                                            data-target="#deleteFeesMasterGroup<?php echo e($fees_master->fees_group_id); ?>"><?php echo app('translator')->get('common.delete'); ?></a>
                                                    </div>
                                                </div>
                                                <?php endif; ?>
                                                <div class="modal fade admin-query"
                                                    id="deleteFeesMasterGroup<?php echo e($fees_master->fees_group_id); ?>">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title"><?php echo app('translator')->get('fees.delete_fees_master'); ?>
                                                                </h4>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal">&times;</button>
                                                            </div>
    
                                                            <div class="modal-body">
                                                                <div class="text-center">
                                                                    <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                                                                </div>
    
                                                                <div class="mt-40 d-flex justify-content-between">
                                                                    <button type="button"
                                                                        class="primary-btn tr-bg"
                                                                        data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                                                                    <?php echo e(Form::open(['url' => 'fees-master-group-delete', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                                                                    <input type="hidden" name="id"
                                                                        value="<?php echo e($fees_master->fees_group_id); ?>">
                                                                    <button class="primary-btn fix-gr-bg"
                                                                        type="submit"><?php echo app('translator')->get('common.delete'); ?></button>
                                                                    <?php echo e(Form::close()); ?>

                                                                </div>
                                                            </div>
    
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
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
</section>



</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\feesCollection\fees_master.blade.php ENDPATH**/ ?>
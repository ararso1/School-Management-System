<?php $__env->startSection('title'); ?> 
<?php echo app('translator')->get('fees.fees_type'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('fees.fees_type'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('fees.fees_collection'); ?></a>
                <a href="#"><?php echo app('translator')->get('fees.fees_type'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
        <?php if(isset($fees_type)): ?>
         <?php if(userPermission("fees_type_store")): ?>
                       
        <div class="row">
            <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                <a href="<?php echo e(route('fees_type')); ?>" class="primary-btn small fix-gr-bg">
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
                        <?php if(isset($fees_type)): ?>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'fees_type_update',
                        'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <?php else: ?>
                         <?php if(userPermission("fees_type_store")): ?>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'fees_type_store',
                        'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <?php endif; ?>
                        <?php endif; ?>
                        <div class="white-box">
                            <div class="main-title">
                                <h3 class="mb-15"><?php if(isset($fees_type)): ?>
                                        <?php echo app('translator')->get('fees.edit_fees_type'); ?>
                                    <?php else: ?>
                                        <?php echo app('translator')->get('fees.add_fees_type'); ?>
                                    <?php endif; ?>
                                 
                                </h3>
                            </div>
                            <div class="add-visitor">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('common.name'); ?> <span class="text-danger"> *</span></label>
                                            <input class="primary_input_field form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"
                                                type="text" name="name" autocomplete="off" value="<?php echo e(isset($fees_type)? $fees_type->name: old('name')); ?>">
                                            <input type="hidden" name="id" value="<?php echo e(isset($fees_type)? $fees_type->id: ''); ?>">
                                            
                                            <?php if($errors->has('name')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('name')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>

                                    </div>
                                </div>
                                
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <select class="primary_select  form-control<?php echo e($errors->has('fees_group') ||  session()->has('message-exist')? ' is-invalid' : ''); ?>" name="fees_group" id="fees_group" <?php echo e(isset($fees_master)? 'disabled': ''); ?>>
                                            <option data-display="<?php echo app('translator')->get('fees.fees_group'); ?> *" value=""><?php echo app('translator')->get('fees.fees_group'); ?> *</option>
                                            <?php $__currentLoopData = $fees_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fees_group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(isset($fees_type)): ?>
                                                    <option value="<?php echo e($fees_group->id); ?>"<?php echo e($fees_group->id == $fees_type->fees_group_id? 'selected':''); ?>><?php echo e($fees_group->name); ?> </option>
                                                <?php else: ?>
                                                    <option value="<?php echo e($fees_group->id); ?>"  <?php echo e(old('fees_group')!=''? (old('fees_group') == $fees_group->id? 'selected':''):''); ?> ><?php echo e($fees_group->name); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if(session()->has('message-exist')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <strong><?php echo e(session()->get('message-exist')); ?>

                                        </span>
                                        <?php endif; ?>
                                        <?php if($errors->has('fees_group')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('fees_group')); ?>

                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('fees.description'); ?> <span></span></label>
                                            <textarea class="primary_input_field form-control" cols="0" rows="4"
                                                name="description"><?php echo e(isset($fees_type)? $fees_type->description: old('description')); ?></textarea>
                                            
                                        </div>
                                    </div>
                                </div>
                            	<?php 
                                  $tooltip = "";
                                  if(userPermission("fees_type_store")){
                                        $tooltip = "";
                                    }else{
                                        $tooltip = "You have no permission to add";
                                    }
                                ?>
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                         <button class="primary-btn fix-gr-bg submit" data-toggle="tooltip" title="<?php echo e($tooltip); ?>">
                                            <span class="ti-check"></span>

                                            <?php if(isset($fees_type)): ?>
                                                <?php echo app('translator')->get('fees.update_content'); ?>
                                            <?php else: ?>
                                                <?php echo app('translator')->get('fees.save_content'); ?>
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
                                <h3 class="mb-15"> <?php echo app('translator')->get('fees.fees_type_list'); ?></h3>
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
                                            <th> <?php echo app('translator')->get('common.name'); ?></th>
                                            <th> <?php echo app('translator')->get('fees.fees_group'); ?></th>
                                            <th> <?php echo app('translator')->get('common.description'); ?></th>
                                            <th> <?php echo app('translator')->get('common.action'); ?></th>
                                        </tr>
                                    </thead>
        
                                    <tbody>
                                        <?php $__currentLoopData = $fees_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fees_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(@$fees_type->name); ?></td>
                                            <td><?php echo e(@$fees_type->fessGroup->name); ?></td>
                                            <td><?php echo e(@$fees_type->description); ?></td>
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
                                                        <?php if(userPermission('fees_type_edit')): ?>
        
                                                        <a class="dropdown-item" href="<?php echo e(route('fees_type_edit', [$fees_type->id])); ?>"><?php echo app('translator')->get('common.edit'); ?></a>
                                                       <?php endif; ?>
                                                       <?php if(userPermission('fees_type_delete')): ?>
                                                            <?php if(!@$fees_type->un_semester_label_id): ?>
                                                                <a class="dropdown-item" data-toggle="modal" data-target="#deleteFeesTypeModal<?php echo e(@$fees_type->id); ?>"
                                                                href="#"><?php echo app('translator')->get('common.delete'); ?></a>
                                                            <?php endif; ?>
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
                                                        </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <div class="modal fade admin-query" id="deleteFeesTypeModal<?php echo e(@$fees_type->id); ?>" >
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title"><?php echo app('translator')->get('fees.delete_fees_type'); ?></h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
        
                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                                                        </div>
        
                                                        
                                                        <div class="mt-40 d-flex justify-content-between">
                                                            <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                                                            <a href="<?php echo e(route('fees_type_delete', [$fees_type->id])); ?>"><button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('common.delete'); ?></button></a>
                                                        </div>
                                                    </div>
        
                                                </div>
                                            </div>
                                        </div>
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
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\feesCollection\fees_type.blade.php ENDPATH**/ ?>
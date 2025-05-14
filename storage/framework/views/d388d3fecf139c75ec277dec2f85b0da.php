<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('inventory.item_store_list'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('inventory.item_store_list'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('inventory.inventory'); ?></a>
                <a href="#"><?php echo app('translator')->get('inventory.item_store_list'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
        <?php if(isset($editData)): ?>
         <?php if(userPermission("item-store-store")): ?>
           
        <div class="row">
            <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                <a href="<?php echo e(route('item-store')); ?>" class="primary-btn small fix-gr-bg">
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
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => array('item-store-update',$editData->id), 'method' => 'PUT', 'enctype' => 'multipart/form-data'])); ?>

                        <?php else: ?>
                         <?php if(userPermission("item-store-store")): ?>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'item-store-store',
                        'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <?php endif; ?>
                        <?php endif; ?>
                        <div class="white-box">
                            <div class="main-title">
                                <h3 class="mb-15"><?php if(isset($editData)): ?>
                                        <?php echo app('translator')->get('inventory.edit_item_store'); ?>
                                    <?php else: ?>
                                        <?php echo app('translator')->get('inventory.add_item_store'); ?>
                                    <?php endif; ?>
                                   
                                </h3>
                            </div>
                            <div class="add-visitor">
                                <div class="row">                                 

                                    <div class="col-lg-12 mb-15">
                                        <div class="primary_input">
                                            <label> <?php echo app('translator')->get('inventory.store_name'); ?> <span class="text-danger"> *</span> </label>
                                            <input class="primary_input_field form-control<?php echo e($errors->has('store_name') ? ' is-invalid' : ''); ?>"
                                            type="text" name="store_name" autocomplete="off" value="<?php echo e(isset($editData)? $editData->store_name : ''); ?>">
                                            
                                            
                                            <?php if($errors->has('store_name')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('store_name')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                     <div class="col-lg-12 mb-15">
                                        <div class="primary_input">
                                            <label> <?php echo app('translator')->get('inventory.number'); ?> <span class="text-danger"> *</span></label>
                                            <input oninput="numberCheckWithDot(this)" class="primary_input_field form-control<?php echo e($errors->has('store_no') ? ' is-invalid' : ''); ?>"
                                            type="text" name="store_no" autocomplete="off" value="<?php echo e(isset($editData)? $editData->store_no : ''); ?>">
                                            
                                            
                                            <?php if($errors->has('store_no')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('store_no')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                     <div class="col-lg-12 mb-15">
                                        <div class="primary_input">
                                            <label> <?php echo app('translator')->get('common.description'); ?> <span></span> </label>
                                            <textarea class="primary_input_field form-control" cols="0" rows="4" name="description" id="description"><?php echo e(isset($editData) ? $editData->description : ''); ?></textarea>

                                        </div>
                                    </div>

                                </div>
                                	  <?php 
                                  $tooltip = "";
                                  if(userPermission("item-store-store") || userPermission('item-store-edit')){
                                        $tooltip = "";
                                    }else{
                                        $tooltip = "You have no permission to add";
                                    }
                                ?>
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                       <button class="primary-btn fix-gr-bg submit" data-toggle="tooltip" title="<?php echo e($tooltip); ?>">

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
                                <h3 class="mb-15"><?php echo app('translator')->get('inventory.item_store_list'); ?></h3>
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
                                            <th><?php echo app('translator')->get('inventory.store_name'); ?></th>
                                            <th><?php echo app('translator')->get('inventory.no'); ?></th>
                                            <th><?php echo app('translator')->get('common.description'); ?></th>
                                            <th><?php echo app('translator')->get('common.action'); ?></th>
                                        </tr>
                                    </thead>
            
                                    <tbody>
                                        <?php if(isset($itemstores)): ?>
                                        <?php $__currentLoopData = $itemstores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($value->store_name); ?></td>
                                            <td><?php echo e($value->store_no); ?></td>
                                            <td><?php echo e($value->description); ?></td>
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
                                                    <?php if(userPermission('item-store-edit')): ?>
                                                        <a class="dropdown-item" href="<?php echo e(route('item-store-edit',@$value->id)); ?>"><?php echo app('translator')->get('common.edit'); ?></a>
                                                    <?php endif; ?>
                                                    <?php if(userPermission('delete-store-view')): ?>
                                                        <a class="deleteUrl dropdown-item" data-modal-size="modal-md" title="<?php echo app('translator')->get('inventory.delete_store'); ?>" href="<?php echo e(route('delete-store-view',$value->id)); ?>"><?php echo app('translator')->get('common.delete'); ?></a>
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
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\inventory\itemStoreList.blade.php ENDPATH**/ ?>
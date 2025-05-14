<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('front_settings.header_menu'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <?php echo app('translator')->get('front_settings.front_settings'); ?>
                <a href="#"><?php echo app('translator')->get('front_settings.header_menu'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
        <?php if(@$editData): ?>
            <div class="row">
                <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                    <a href="<?php echo e(route('header-menu')); ?>" class="primary-btn small fix-gr-bg">
                        <span class="ti-plus pr-2"></span>
                        <?php echo app('translator')->get('common.add'); ?>
                    </a>
                </div>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-title">
                            <h3 class="mb-30">
                                <?php if(isset($editData)): ?>
                                    <?php echo app('translator')->get('common.edit'); ?>
                                <?php else: ?>
                                    <?php echo app('translator')->get('common.add'); ?>
                                <?php endif; ?>
                                <?php echo app('translator')->get('front_settings.header_menu'); ?>
                            </h3>
                        </div>
                        <?php if(isset($editData)): ?>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true,  'route' => 'update-header-menu', 'method' => 'POST'])); ?>

                            <input type="hidden" name="id" value="<?php echo e(@$editData->id); ?>">
                        <?php else: ?>
                          <?php if(userPermission('store-header-menu')): ?>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'store-header-menu',
                        'method' => 'POST'])); ?>

                        <?php endif; ?>
                        <?php endif; ?>
                        <div class="white-box">
                            <div class="add-visitor">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?php if(session()->has('message-success')): ?>
                                        <div class="alert alert-success">
                                            <?php echo e(session()->get('message-success')); ?>

                                        </div>
                                        <?php elseif(session()->has('message-danger')): ?>
                                        <div class="alert alert-danger">
                                            <?php echo e(session()->get('message-danger')); ?>

                                        </div>
                                        <?php endif; ?>
                                        <div class="primary_input">
                                            <input class="primary_input_field form-control<?php echo e(@$errors->has('title') ? ' is-invalid' : ''); ?>"
                                                type="text" name="title" autocomplete="off" value="<?php echo e(isset($editData)? @$editData->title : old('title')); ?>">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('common.title'); ?> <span class="text-danger"> *</span></label>
                                            
                                            <?php if($errors->has('title')): ?>
                                            <span class="text-danger" >
                                                <strong><?php echo e(@$errors->first('title')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row  mt-40">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <input class="primary_input_field form-control<?php echo e(@$errors->has('slug') ? ' is-invalid' : ''); ?>"
                                                type="text" name="slug" autocomplete="off" value="<?php echo e(isset($editData)? @$editData->slug : old('slug')); ?>">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.slug'); ?> <span class="text-danger"> *</span></label>
                                            
                                            <?php if($errors->has('slug')): ?>
                                            <span class="text-danger" >
                                                <strong><?php echo e(@$errors->first('slug')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row  mt-40">
                                    <div class="col-lg-12">
                                        <select class="primary_select  form-control<?php echo e(@$errors->has('status') ? ' is-invalid' : ''); ?>" name="status">
                                            <option data-display="<?php echo app('translator')->get('common.status'); ?> *" value=""><?php echo app('translator')->get('common.status'); ?> *</option>
                                            <option value="1" <?php echo e(@$editData->active_status == '1'? 'selected':old('status') == ('1'? 'selected':'')); ?>><?php echo app('translator')->get('front_settings.active'); ?></option>
                                            <option value="0" <?php echo e(@$editData->active_status == '0'? 'selected':old('status') == ('0'? 'selected':'')); ?>><?php echo app('translator')->get('front_settings.inactive'); ?></option>
                                        </select>
                                        
                                        <?php if($errors->has('status')): ?>
                                            <span class="text-danger" >
                                                <strong><?php echo e(@$errors->first('status')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            	<?php
                                  $tooltip = "";
                                  if(userPermission('store-header-menu')){
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
                <div class="row">
                    <div class="col-lg-4 no-gutters">
                        <div class="main-title">
                            <h3 class="mb-0"><?php echo app('translator')->get('front_settings.header_menu_list'); ?></h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <table id="tableWithoutSort" class="table" cellspacing="0" width="100%">
                            <thead>
                                <?php if(session()->has('message-success-delete') != "" ||
                                session()->get('message-danger-delete') != ""): ?>
                                <tr>
                                    <td colspan="3">
                                        <?php if(session()->has('message-success-delete')): ?>
                                        <div class="alert alert-success">
                                            <?php echo e(session()->get('message-success-delete')); ?>

                                        </div>
                                        <?php elseif(session()->has('message-danger-delete')): ?>
                                        <div class="alert alert-danger">
                                            <?php echo e(session()->get('message-danger-delete')); ?>

                                        </div>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endif; ?>
                                <tr>
                                    <th><?php echo app('translator')->get('common.title'); ?></th>
                                    <th><?php echo app('translator')->get('front_settings.slug'); ?></th>
                                    <th><?php echo app('translator')->get('common.status'); ?></th>
                                    <th><?php echo app('translator')->get('common.action'); ?></th>
                                </tr>
                            </thead>
                            <tbody id="menuDiv">
                                <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr data-id="<?php echo e($menu->id); ?>">
                                    <td><?php echo e($menu->title); ?></td>
                                    <td><?php echo e($menu->slug); ?></td>
                                    <td>
                                        <?php if($menu->active_status == 1): ?>
                                            <button class="primary-btn small bg-success text-white border-0"><?php echo app('translator')->get('front_settings.active'); ?></button>
                                        <?php else: ?>
                                        <button class="primary-btn small bg-warning text-white border-0"><?php echo app('translator')->get('front_settings.inactive'); ?></button>
                                        <?php endif; ?>
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
                                                <a class="dropdown-item" href="<?php echo e(route('setup-header-menu', ['id'=>$menu->id] )); ?>">
                                                    <?php echo app('translator')->get('common.setup'); ?>
                                                </a>
                                                
                                                <?php if($menu->deletable == 0): ?>
                                                <a class="dropdown-item" href="<?php echo e(route('edit-header-menu', ['id'=>$menu->id] )); ?>">
                                                    <?php echo app('translator')->get('common.edit'); ?>
                                                </a>
                                                
                                                <a class="dropdown-item" data-toggle="modal" data-target="#deleteChartOfAccountModal<?php echo e($menu->id); ?>" href="#">
                                                    <?php echo app('translator')->get('common.delete'); ?>
                                                </a>
                                               <?php endif; ?>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal fade admin-query" id="deleteChartOfAccountModal<?php echo e($menu->id); ?>" >
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title"><?php echo app('translator')->get('common.delete_menu'); ?></h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="text-center">
                                                    <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                                                </div>
                                                <div class="mt-40 d-flex justify-content-between">
                                                    <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                                                    <a class="primary-btn fix-gr-bg" href="<?php echo e(route('delete-header-menu', ['id'=>$menu->id])); ?>"><?php echo app('translator')->get('common.delete'); ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<script>
    $('#menuDiv').sortable({
        cursor:"move",
        update: function(event, ui){
            let ids = $(this).sortable('toArray',{ attribute: 'data-id'});
            if(ids.length > 0){
                let data = {
                '_token' :'<?php echo e(csrf_token()); ?>',
                'ids' : ids,
                }
                $.post("<?php echo e(route('sort-menu')); ?>", data, 
                function(data){
            });
            }
        }
    }).disableSelection();
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\frontEnd\headerMenuManager_test.blade.php ENDPATH**/ ?>
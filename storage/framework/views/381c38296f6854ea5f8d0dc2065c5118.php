<?php
    $school_config = schoolConfig();
    $isSchoolAdmin = Session::get('isSchoolAdmin');
?>
        <!-- sidebar part here -->
<nav id="sidebar" class="sidebar">

    <div class="sidebar-header update_sidebar">
        <?php if(Auth::user()->role_id != 2 && Auth::user()->role_id != 3): ?>
            <?php if(userPermission('dashboard')): ?>
                <?php if(moduleStatusCheck('Saas') == true && Auth::user()->is_administrator == 'yes' && Session::get('isSchoolAdmin') == false && (Auth::user()->role_id == 1 || moduleStatusCheck('SaasHr') == true)): ?>
                    <a href="<?php echo e(route('superadmin-dashboard')); ?>" id="superadmin-dashboard">
                        <?php else: ?>
                            <a href="<?php echo e(route('admin-dashboard')); ?>" id="admin-dashboard">
                                <?php endif; ?>
                                <?php else: ?>
                                    <a href="<?php echo e(url('/')); ?>" id="admin-dashboard">
                                        <?php endif; ?>
                                        <?php else: ?>
                                            <a href="<?php echo e(url('/')); ?>" id="admin-dashboard">
                                                <?php endif; ?>
                                                <?php if(!is_null($school_config->logo)): ?>
                                                    <img src="<?php echo e(asset($school_config->logo)); ?>" alt="logo">
                                                <?php else: ?>
                                                    <img src="<?php echo e(asset('public/uploads/settings/logo.png')); ?>"
                                                         alt="logo">
                                                <?php endif; ?>
                                            </a>
                                            <a id="close_sidebar" class="d-lg-none">
                                                <i class="ti-close"></i>
                                            </a>

    </div>
    <?php if(Auth::user()->is_saas == 0): ?>

        <ul class="sidebar_menu list-unstyled" id="sidebar_menu">
            <input type="hidden" name="" id="default_position" value="<?php echo e(menuPosition('is_submit')); ?>">
            <?php if(Auth::user()->role_id != 2 && Auth::user()->role_id != 3): ?>
                <?php if(userPermission('dashboard')): ?>
                    <li>
                        <?php if(moduleStatusCheck('Saas') == true && Auth::user()->is_administrator == 'yes' && Session::get('isSchoolAdmin') == false && (Auth::user()->role_id == 1 || moduleStatusCheck('SaasHr') == true)): ?>
                            <a href="<?php echo e(route('superadmin-dashboard')); ?>" id="superadmin-dashboard">
                                <?php else: ?>
                                    <a href="<?php echo e(route('admin-dashboard')); ?>" id="admin-dashboard">
                                        <?php endif; ?>
                                        
                                        <div class="nav_icon_small">
                                            <span class="fas fa-th"></span>
                                        </div>
                                        <div class="nav_title">
                                            <span><?php echo app('translator')->get('common.dashboard'); ?></span>
                                        </div>

                                    </a>
                    </li>
                <?php endif; ?>
            <?php endif; ?>
            <?php $__currentLoopData = $sidebars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li  class="sortable_li">
                    <a href="javascript:void(0)" class="has-arrow" aria-expanded="false">
                        <div class="nav_icon_small">
                            <span class="flaticon-reading"></span>
                        </div>
                        <div class="nav_title">
                            <span><?php echo e(@$item->permissionInfo->name); ?> - <?php echo e(@$item->permission_id); ?></span>
                            <?php if(config('app.app_sync')): ?>
                                <span class="demo_addons">Addon</span>
                            <?php endif; ?>
                        </div>
                    </a>
                    <ul class="list-unstyled">
                        <?php if(@$item->permissionInfo): ?>
                            <?php $__currentLoopData = @$item->permissionInfo->subModule->where('parent_route', '!=', 'dashboard'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                        
                        
                                <li data-position="">
                                    <a href=""><?php echo e(@$sub->permissionInfo->name); ?> - <?php echo e($sub->permission_id); ?></a>
                                </li>
                        
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>
</nav>
<!-- sidebar part end --><?php /**PATH C:\xampp\htdocs\resources\views\components\default-sidebar-component.blade.php ENDPATH**/ ?>
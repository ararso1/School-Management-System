<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['sidebar_menus' => null, 'level' => 0, 'parent' => null]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['sidebar_menus' => null, 'level' => 0, 'parent' => null]); ?>
<?php foreach (array_filter((['sidebar_menus' => null, 'level' => 0, 'parent' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php if($sidebar_menus): ?>

    <?php $__currentLoopData = $sidebar_menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sidebar_menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <?php if($sidebar_menu->subModule->count() > 0 && sidebarPermission($sidebar_menu->permissionInfo)): ?>
            <?php if($level == 0 && $sidebar_menu->permissionInfo->name): ?>
                    <span class="menu_seperator" id="seperator_<?php echo e($sidebar_menu->permissionInfo->route); ?>" data-section="<?php echo e($sidebar_menu->permissionInfo->route); ?>"><?php echo e($sidebar_menu->permissionInfo->name); ?> </span>
            <?php endif; ?>

            <?php if($level > 0): ?>


            <?php endif; ?>

            <?php if (isset($component)) { $__componentOriginalce95f69c1ef890487f9ea684119db87d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce95f69c1ef890487f9ea684119db87d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.menu-item','data' => ['sidebarMenus' => $sidebar_menu->subModule,'level' => $level+1,'parent' => $sidebar_menu]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('menu-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['sidebar_menus' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sidebar_menu->subModule),'level' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($level+1),'parent' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sidebar_menu)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce95f69c1ef890487f9ea684119db87d)): ?>
<?php $attributes = $__attributesOriginalce95f69c1ef890487f9ea684119db87d; ?>
<?php unset($__attributesOriginalce95f69c1ef890487f9ea684119db87d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce95f69c1ef890487f9ea684119db87d)): ?>
<?php $component = $__componentOriginalce95f69c1ef890487f9ea684119db87d; ?>
<?php unset($__componentOriginalce95f69c1ef890487f9ea684119db87d); ?>
<?php endif; ?>

        <?php endif; ?>


    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\resources\views\components\menu-item.blade.php ENDPATH**/ ?>
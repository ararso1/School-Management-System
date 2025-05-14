<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['permission'=>null, 'action']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['permission'=>null, 'action']); ?>
<?php foreach (array_filter((['permission'=>null, 'action']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php if(!$permission || userPermission($permission)): ?>
<a <?php echo e($attributes->merge(['class'=>'dropdown-item'])); ?>><?php echo e($action); ?></a>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\resources\views\components\action-item.blade.php ENDPATH**/ ?>
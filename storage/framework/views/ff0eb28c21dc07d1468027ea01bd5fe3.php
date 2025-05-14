<?php if (! $__env->hasRenderedOnce('8f515f2c-f2da-4f25-bc6f-67b71ccaadfd')): $__env->markAsRenderedOnce('8f515f2c-f2da-4f25-bc6f-67b71ccaadfd');
$__env->startPush(config('pagebuilder.site_style_var')); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/theme/edulia/packages/nice-select/nice-select.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/theme/edulia/css/themify-icons.min.css')); ?>">
    <style>
        .result_filters .input-control,
        .result_filters .nice-select {
            margin-top: 0px !important;
        }

        .nice-select:after {
            display: none;
        }
        .nice-select.w-100 {
            min-height: 55px;
        }
    </style>
<?php $__env->stopPush(); endif; ?>
<div class="container mt-5">
    <div class="result_filters">
        <?php if (isset($component)) { $__componentOriginald7ba5a23133fc31c9fa5cdbef12eace3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald7ba5a23133fc31c9fa5cdbef12eace3 = $attributes; } ?>
<?php $component = App\View\Components\FrontendIndividualResult::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('frontend-individual-result'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\FrontendIndividualResult::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald7ba5a23133fc31c9fa5cdbef12eace3)): ?>
<?php $attributes = $__attributesOriginald7ba5a23133fc31c9fa5cdbef12eace3; ?>
<?php unset($__attributesOriginald7ba5a23133fc31c9fa5cdbef12eace3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald7ba5a23133fc31c9fa5cdbef12eace3)): ?>
<?php $component = $__componentOriginald7ba5a23133fc31c9fa5cdbef12eace3; ?>
<?php unset($__componentOriginald7ba5a23133fc31c9fa5cdbef12eace3); ?>
<?php endif; ?>
    </div>
</div>
<?php if (! $__env->hasRenderedOnce('0e930498-5054-413f-88bb-a3631f2aef3b')): $__env->markAsRenderedOnce('0e930498-5054-413f-88bb-a3631f2aef3b');
$__env->startPush(config('pagebuilder.site_script_var')); ?>
    <script src="<?php echo e(asset('public/theme/edulia/packages/nice-select/jquery.nice-select.min.js')); ?>"></script>
    <script>
        $('#academic_year_selector').niceSelect();
        $(".individual_result_datatable table").DataTable({
            responsive: true,
            language: {
                searchPlaceholder: "Search ...",
                search: "<i class='far fa-search datatable-search'></i>",
            },
        });
    </script>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH C:\xampp\htdocs\resources\views\themes\edulia\pagebuilder\front-ind-result\view.blade.php ENDPATH**/ ?>
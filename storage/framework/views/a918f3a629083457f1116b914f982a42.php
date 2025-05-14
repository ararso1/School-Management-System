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
    <a class="dropdown-item" href="<?php echo e(route('alumni.view-transcript', [$row->id])); ?>" target="_blank">
        <?php echo app('translator')->get('student.view_transcript'); ?>
    </a>
    <?php if(moduleStatusCheck('Alumni')): ?>
        <a class="dropdown-item modalLink" data-modal-size="modal-lg" title="<?php echo app('translator')->get('alumni::al.add_alumni_information'); ?>" href="<?php echo e(route('add-alumni-detail',[$row->id])); ?>" data-modal-size="modal-lg" title="<?php echo app('translator')->get('alumni::al.add_alumni_information'); ?>"><?php echo app('translator')->get('alumni::al.add_alumni_information'); ?></a>
    <?php endif; ?>
    <?php if(!moduleStatusCheck('University')): ?>
        <a class="dropdown-item modalLink" data-modal-size="modal-lg" title="<?php echo app('translator')->get('student.revert_as_student'); ?>" href="<?php echo e(route('alumni.edit-revert-as-student',[$row->id])); ?>" data-modal-size="modal-lg" title="<?php echo app('translator')->get('student.revert_as_student'); ?>" ><?php echo app('translator')->get('student.revert_as_student'); ?></a>
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\graduate\graduateAction.blade.php ENDPATH**/ ?>
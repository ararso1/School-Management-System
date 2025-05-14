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
    <?php if(userPermission('event-edit')): ?>
        <a class="dropdown-item" href="<?php echo e(route('event-edit',$event->id)); ?>"><?php echo app('translator')->get('common.edit'); ?></a>
    <?php endif; ?>
    <?php if(userPermission('delete-event-view') ): ?>
        <a class="deleteUrl dropdown-item" data-modal-size="modal-md" title="<?php echo e(__('communicate.delete_event')); ?>" href="<?php echo e(route('delete-event-view',$event->id)); ?>"><?php echo app('translator')->get('common.delete'); ?></a>
    <?php endif; ?>
    <?php if($event->uplad_image_file != ""): ?>
        <a class="dropdown-item" href="<?php echo e(url($event->uplad_image_file)); ?>" download>
            <?php echo app('translator')->get('communicate.download'); ?> 
            <span class="pl ti-download"></span>
        </a>
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\events\_eventAction.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('study.study_material_list'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>

<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('study.study_material_list'); ?> </h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('study.study_material'); ?></a>
                <a href="#"><?php echo app('translator')->get('study.study_material_list'); ?></a>
            </div>
        </div>
    </div>
</section>

<section class="admin-visitor-area">
    <div class="container-fluid p-0">

<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-4 no-gutters">
                <div class="main-title">
                    <h3 class="mb-0"><?php echo app('translator')->get('study.study_material_list'); ?></h3>
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
                        <?php if(session()->has('message-success-delete') != "" ||
                        session()->get('message-danger-delete') != ""): ?>
                        <tr>
                            <td colspan="6">
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
                            <th><?php echo app('translator')->get('study.content_title'); ?> </th>
                            <th><?php echo app('translator')->get('common.date'); ?></th>
                            <th><?php echo app('translator')->get('study.available_for'); ?></th>
                            <th><?php echo app('translator')->get('common.class_Sec'); ?></th>
                            <th><?php echo app('translator')->get('common.action'); ?></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if(isset($uploadContents)): ?>
                        <?php $__currentLoopData = $uploadContents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>

                            <td><?php echo e(@$value->content_title); ?></td>
                            <td  data-sort="<?php echo e(strtotime(@$value->upload_date)); ?>" >
                               <?php echo e(@$value->upload_date != ""? dateConvert(@$value->upload_date):''); ?>


                            </td>
                            <td>
                                <?php if(@$value->available_for_admin == 1): ?>
                                    <?php echo e('All admin'); ?><br>
                                <?php endif; ?>
                                <?php if(@$value->available_for_all_classes == 1): ?>
                                    <?php echo e('All classes student'); ?>

                                <?php endif; ?>
                            </td>
                            <td>

                            <?php if($value->class != ""): ?>
                                <?php echo e(@$value->classes->class_name); ?>

                            <?php endif; ?> 

                            <?php if(@$value->section != ""): ?>
                                (<?php echo e(@$value->sections->section_name); ?>)
                            <?php endif; ?>


                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                        <?php echo app('translator')->get('common.select'); ?>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a data-modal-size="modal-lg" title="View Content Details" class="dropdown-item modalLink" href="<?php echo e(route('upload-content-student-view', $value->id)); ?>"><?php echo app('translator')->get('common.view'); ?></a>
                                        <?php if(@$value->upload_file != ""): ?>
                                           
                                            <a class="dropdown-item" href="<?php echo e(url(@$value->upload_file)); ?>" download>
                                                <?php echo app('translator')->get('common.download'); ?> <span class="pl ti-download"></span></a>
                                            
                                           
                                        <?php endif; ?>
                                    </div>
                                    </div>
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
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\studentPanel\studyMetarialList.blade.php ENDPATH**/ ?>
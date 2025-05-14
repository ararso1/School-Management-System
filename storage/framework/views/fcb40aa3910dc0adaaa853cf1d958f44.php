<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('downloadCenter.shared_content'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
    <style>
        .content-modal-section-title {
            font-size: 18px;
            font-weight: 500;
            line-height: 1.1;
            color: inherit;
            margin-bottom: 10px;
            color: var(--base_color);
        }

        .content-modal-section-title.sidebar {
            margin-bottom: 10px;
        }

        .single-content-modal-info .row {
            row-gap: 10px;
        }

        .single-content-modal-info .content-type {
            color: var(--base_color);
            font-size: 14px;
        }

        ul.content-links li {
            border-top: 1px solid #dad6d6;

        }

        ul.content-links li:first-child {
            border-top: none;
        }

        ul.content-links li a {
            color: #828bb2;
            padding: 5px
        }

        .single-content-modal.modal .modal-dialog {
            max-width: 90%;
        }

        .single-content-modal.modal .modal-dialog .modal-body .row.content-container {
            row-gap: 20px;
        }

        li.attached-content-item {
            border: 1px solid rgba(130, 139, 178, 0.3);
            padding: 10px 15px;
            margin-bottom: -1px;
        }

        li.attached-content-item:first-child {
            border-top-left-radius: 4px;
            border-top-right-radius: 4px;
        }

        li.attached-content-item:last-child {
            margin-bottom: 0;
            border-bottom-right-radius: 4px;
            border-bottom-left-radius: 4px;
        }

        li.attached-content-item:hover {
            color: var(--base_color);
            cursor: pointer;
        }

        #textForClipboard::selection {
            background: none;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('downloadCenter.shared_content'); ?> </h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('downloadCenter.download_center'); ?></a>
                    <a href="#"><?php echo app('translator')->get('downloadCenter.shared_content'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-lg-4 no-gutters">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php echo app('translator')->get('downloadCenter.shared_content_list'); ?></h3>
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
                                    <table id="table_id" class="table Crm_table_active3" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th><?php echo app('translator')->get('downloadCenter.sl'); ?></th>
                                                <th><?php echo app('translator')->get('downloadCenter.title'); ?></th>
                                                <th><?php echo app('translator')->get('downloadCenter.send_to'); ?></th>
                                                <th><?php echo app('translator')->get('downloadCenter.share_date'); ?></th>
                                                <th><?php echo app('translator')->get('downloadCenter.valid_upto'); ?></th>
                                                <th><?php echo app('translator')->get('downloadCenter.shared_by'); ?></th>
                                                <th><?php echo app('translator')->get('downloadCenter.description'); ?></th>
                                                <th><?php echo app('translator')->get('common.action'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $sharedContents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sharedContent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $send_type = '';
                                                    if ($sharedContent->send_type == 'G') {
                                                        $send_type = 'Group';
                                                    } elseif ($sharedContent->send_type == 'I') {
                                                        $send_type = 'Individual';
                                                    } elseif ($sharedContent->send_type == 'C') {
                                                        $send_type = 'Class';
                                                    } else {
                                                        $send_type = 'Public';
                                                    }
                                                ?>
                                                <tr>
                                                    <td><?php echo e($key + 1); ?></td>
                                                    <td><?php echo e($sharedContent->title); ?></td>
                                                    <td><?php echo e($send_type); ?></td>
                                                    <td><?php echo e($sharedContent->share_date); ?></td>
                                                    <td><?php echo e($sharedContent->valid_upto); ?></td>
                                                    <td><?php echo e($sharedContent->user->full_name); ?></td>
                                                    <td><?php echo e($sharedContent->description ? $sharedContent->description : 'No Description'); ?>

                                                    </td>
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
                                                            <?php if($sharedContent->url): ?>
                                                                <a class="modalLink dropdown-item"
                                                                    title="<?php echo app('translator')->get('downloadCenter.shared_content_link'); ?>"
                                                                    href="<?php echo e(route('download-center.content-share-link-modal', [$sharedContent->id])); ?>">
                                                                    <?php echo app('translator')->get('downloadCenter.link'); ?>
                                                                </a>
                                                            <?php endif; ?>
                                                            <a class="modalLink dropdown-item"
                                                                data-modal-size="large-modal"
                                                                title="<?php echo app('translator')->get('downloadCenter.view_shared_content'); ?>"
                                                                href="<?php echo e(route('download-center.content-view-link-modal', [$sharedContent->id])); ?>">
                                                                <?php echo app('translator')->get('common.view'); ?>
                                                            </a>
                                                            <?php if(auth()->user()->role_id != 2): ?>
                                                                <a class="dropdown-item" data-toggle="modal"
                                                                    data-target="#deleteModal<?php echo e(@$sharedContent->id); ?>"
                                                                    href="#">
                                                                    <?php echo app('translator')->get('common.delete'); ?>
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
<?php endif; ?>
                                                    </td>
                                                </tr>
                                                
                                                <div class="modal fade admin-query"
                                                    id="deleteModal<?php echo e(@$sharedContent->id); ?>">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">
                                                                    <?php echo app('translator')->get('downloadCenter.delete_shared_content'); ?>
                                                                </h4>
                                                                <button type="button" class="close" data-dismiss="modal">
                                                                    &times;
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="text-center">
                                                                    <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                                                                </div>
                                                                <div class="mt-40 d-flex justify-content-between">
                                                                    <button type="button" class="primary-btn tr-bg"
                                                                        data-dismiss="modal">
                                                                        <?php echo app('translator')->get('common.cancel'); ?>
                                                                    </button>
                                                                    <a href="<?php echo e(route('download-center.content-share-list-delete', [@$sharedContent->id])); ?>"
                                                                        class="text-light">
                                                                        <button class="primary-btn fix-gr-bg" type="submit">
                                                                            <?php echo app('translator')->get('common.delete'); ?>
                                                                        </button>
                                                                    </a>
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
<?php $__env->startPush('script'); ?>
    <script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.8/dist/clipboard.min.js"></script>
    <script type="text/javascript">
        var Clipboard = new ClipboardJS('.copyToClipboard');
    </script>
    <script>
        $(document).on('click', '.copyToClipboard', function(e) {
            toastr.success("Link Copied", 'Success');
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Modules\DownloadCenter\Resources\views\contentShareList\contentShareList.blade.php ENDPATH**/ ?>
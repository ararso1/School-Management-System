<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('system_settings.language_import'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo e($language->language_name); ?> <span> </span><?php echo app('translator')->get('system_settings.language_import'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('system_settings.system_settings'); ?></a>
                <a href=""><?php echo app('translator')->get('system_settings.language_settings'); ?></a>
                <a href=""><?php echo app('translator')->get('system_settings.import'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-title">
                            <h3 class="mb-30"><?php echo app('translator')->get('system_settings.upload_from_local_directory'); ?></h3>
                        </div>
                        <?php if(userPermission('file-import')): ?>
                            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'file-import', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <?php endif; ?>
                        <div class="white-box sm_mb_20  ">
                            <div class="add-visitor">
                                <a href="https://ticket.aorasoft.com/single/content/917" target="_blank"><strong class="text-info">Before Upload Please Read Documentation Properly</strong></a>
                                <input type="hidden" value="<?php echo e($language->language_universal); ?>" name="language">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="primary_input">
                                            <div class="primary_file_uploader">
                                                <input
                                                    class="primary_input_field form-control <?php echo e($errors->has('language_file') ? ' is-invalid' : ''); ?>"
                                                    readonly="true" type="text"
                                                    placeholder="<?php echo e(trans('common.attach_file') . "*"); ?>"
                                                    id="placeholderUploadContent">
                                                    <?php if($errors->has('language_file')): ?>
                                                        <span class="text-danger">
                                                            <?php echo e($errors->first('language_file')); ?>

                                                        </span>
                                                    <?php endif; ?>
                                                <button class="" type="button">
                                                    <label class="primary-btn small fix-gr-bg" for="upload_content_file"><?php echo e(__('common.browse')); ?></label>
                                                    <input type="file" class="d-none" name="language_file" id="upload_content_file">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                        <?php 
                                            $tooltip = "";
                                            if(userPermission('file-import')){
                                                    $tooltip = "";
                                                }else{
                                                    $tooltip = "You have no permission to add";
                                                }
                                        ?>
                                        <button class="primary-btn fix-gr-bg submit" data-toggle="tooltip" title="<?php echo e(@$tooltip); ?>">
                                            <span class="ti-check"></span>
                                                <?php echo app('translator')->get('system_settings.update_language_file'); ?>
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
                    <div class="col-lg-4  col-xl-3">
                        <div class="main-title mb-20" >
                            <h3 class="mb-0"> <?php echo app('translator')->get('system_settings.language_backup_list'); ?> </h3>
                        </div>
                    </div>
                    <div class="col-lg-8 col-xl-9 text-right col-md-12 mb-20  md_mb_20 title_custom_margin">
                        <?php if(userPermission('backup-lang')): ?>
                            <a href="<?php echo e(route('backup-lang', $language->language_universal)); ?>" class="primary-btn small fix-gr-bg demo_view"> <span class="ti-arrow-circle-down pr-2"></span> <?php echo e($language->language_name); ?> <span> </span> <?php echo app('translator')->get('system_settings.language_backup'); ?> </a>
                        <?php endif; ?>
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
                                        <th><?php echo app('translator')->get('system_settings.size'); ?></th>
                                        <th><?php echo app('translator')->get('system_settings.created_date_time'); ?></th>
                                        <th><?php echo app('translator')->get('system_settings.backup_files'); ?></th>
                                        <th><?php echo app('translator')->get('system_settings.file_type'); ?></th>
                                        <th><?php echo app('translator')->get('common.action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $backuplangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bLanguage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <?php
                                                if(file_exists('public/'.$bLanguage->source_link)){
                                                    @$size = filesize('public/'.$bLanguage->source_link);
                                                    @$units = array( 'B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
                                                    @$power = @$size > 0 ? floor(log(@$size, 1024)) : 0;
                                                    echo number_format(@$size / pow(1024, @$power), 2, '.', ',') . ' ' . @$units[@$power];
                                                }else{
                                                    echo ' ';
                                                }
                                            ?>
                                        </td>
                                        <td><?php echo e(@$bLanguage->created_at != ""? dateConvert(@$bLanguage->created_at):''); ?></td>
                                        <td><?php echo e(@$bLanguage->file_name); ?></td>
                                        <td><?php echo e($bLanguage->lang_type); ?></td>
                                        <td>
                                            <?php if(userPermission('download-files')): ?>
                                                <a  class="primary-btn small tr-bg  " href="<?php echo e(route('download-files',@$bLanguage->id)); ?>"  >
                                                    <span class="pl ti-download"></span> <?php echo app('translator')->get('common.download'); ?>
                                                </a>
                                            <?php endif; ?>
                                            <?php if(userPermission('delete_database')): ?>
                                            <a data-target="#deleteDatabase<?php echo e(@$bLanguage->id); ?>" data-toggle="modal" class="primary-btn small tr-bg  " href="<?php echo e(url('/'.@$bLanguage->id)); ?>"  >
                                                    <span class="pl ti-close"></span>  <?php echo app('translator')->get('common.delete'); ?>
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>

                                    <div class="modal fade admin-query" id="deleteDatabase<?php echo e(@$bLanguage->id); ?>" >
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"> <?php echo app('translator')->get('common.delete_item'); ?></h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="text-center">
                                                        <h4> <?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                                                    </div>
                                                    <div class="mt-40 d-flex justify-content-between">
                                                        <button type="button" class="primary-btn tr-bg" data-dismiss="modal"> <?php echo app('translator')->get('common.cancel'); ?></button>
                                                        <a href="<?php echo e(route('delete_database', [@$bLanguage->id])); ?>" class="text-light">
                                                        <button class="primary-btn fix-gr-bg" type="submit"> <?php echo app('translator')->get('common.delete'); ?></button>
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
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\systemSettings\language_import.blade.php ENDPATH**/ ?>
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
                <a href="#"><?php echo app('translator')->get('common.teacher'); ?></a>
                <a href="#"><?php echo app('translator')->get('study.study_material_list'); ?></a>
            </div>
        </div>
    </div>
</section>

<section class="admin-visitor-area up_admin_visitor">
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
                            <th><?php echo app('translator')->get('study.content_title'); ?></th>
                            <th><?php echo app('translator')->get('common.type'); ?></th>
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
                            <td>
                                <?php if(@$value->content_type == 'as'): ?>
                                    <?php echo e('Assignment'); ?>

                                <?php elseif(@$value->content_type == 'st'): ?>
                                    <?php echo e('Study Material'); ?>

                                <?php elseif(@$value->content_type == 'sy'): ?>
                                    <?php echo e('Syllabus'); ?>

                                <?php else: ?>
                                    <?php echo e('Others Download'); ?>

                                <?php endif; ?>
                            </td>
                            <td  data-sort="<?php echo e(strtotime(@$value->upload_date)); ?>" >
                                <?php echo e(@$value->upload_date != ""? dateConvert(@$value->upload_date):''); ?>


                            </td>
                            <td>
                                <?php if(@$value->available_for_admin == 1): ?>
                                    <?php echo app('translator')->get('study.all_admins'); ?><br>
                                <?php endif; ?>
                                <?php if(@$value->available_for_all_classes == 1): ?>
                                    <?php echo app('translator')->get('study.all_classes_student'); ?>
                                <?php endif; ?>

                                <?php if(@$value->classes != "" && $value->sections != ""): ?>
                                    <?php echo app('translator')->get('study.all_students_of'); ?> (<?php echo e(@$value->classes->class_name.'->'.@$value->sections->section_name); ?>)
                                <?php endif; ?>
                            </td>
                            <td>

                            <?php if(@$value->class != ""): ?>
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

                                     <a data-modal-size="modal-lg" title="View Content Details" class="dropdown-item modalLink" href="<?php echo e(route('upload-content-view', $value->id)); ?>"><?php echo app('translator')->get('common.view'); ?></a>

                                    <a class="dropdown-item" href="<?php echo e(route('upload-content-edit',$value->id)); ?>"><?php echo app('translator')->get('common.edit'); ?></a>


                                     <?php if(userPermission('upload-content-delete')): ?>

                                    

                                        <a class="dropdown-item" data-toggle="modal" data-target="#deleteApplyLeaveModal<?php echo e(@$value->id); ?>"
                                            href="#"><?php echo app('translator')->get('common.delete'); ?></a>

                                            <?php endif; ?>
    

                                        <?php if(@$value->upload_file != ""): ?>
                                        <?php if(userPermission('upload-content-download')): ?>
                                         <a class="dropdown-item" href="<?php echo e(url(@$value->upload_file)); ?>" download>
                                             <?php echo app('translator')->get('common.download'); ?> <span class="pl ti-download"></span>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    </div>
                                </td>
                            </tr>
                            <div class="modal fade admin-query" id="deleteApplyLeaveModal<?php echo e(@$value->id); ?>" >
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title"><?php echo app('translator')->get('common.delete_study_material'); ?></h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="text-center">
                                                <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                                            </div>

                                            <div class="mt-40 d-flex justify-content-between">
                                                <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                                                <a href="<?php echo e(route('delete-upload-content', [@$value->id])); ?>" class="text-light">
                                                    <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('common.delete'); ?></button>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\teacher\studyMetarialList.blade.php ENDPATH**/ ?>
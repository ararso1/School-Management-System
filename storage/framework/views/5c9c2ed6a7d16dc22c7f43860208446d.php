<div class="container-fluid">
     <div class="row">
         <div class="col-lg-12">
             <?php echo e(Form::open(['class' => 'form-horizontal','files' => true,'route' => 'studyMaterialAssigned','method' => 'POST'])); ?>

                 <table id="" class="display school-table school-table-style-parent-fees" cellspacing="0" width="100%">
                     <thead>
                         <tr>
                             <th>#</th>
                         <th> <?php echo app('translator')->get('study.content_title'); ?></th>
                         <th> <?php echo app('translator')->get('common.type'); ?></th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $__currentLoopData = $uploadContents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <tr>
                             <td>
                                 <input type="checkbox" id="study_mat.<?php echo e($value->id); ?>" class="common-checkbox study_material" name="study_material[]" value="<?php echo e($value->id); ?>">
                                 <label for="study_mat.<?php echo e($value->id); ?>"></label>
                             </td>
                             <td><?php echo e(@$value->content_title); ?></td>
                             <td>
                                 <?php if(@$value->content_type == 'as'): ?>
                                     <?php echo app('translator')->get('study.assignment'); ?>
                                 <?php elseif(@$value->content_type == 'st'): ?>
                                     <?php echo app('translator')->get('study.study_material'); ?>
                                 <?php elseif(@$value->content_type == 'sy'): ?>
                                     <?php echo app('translator')->get('study.syllabus'); ?>
                                 <?php else: ?>
                                     <?php echo app('translator')->get('study.other_download'); ?>
                                 <?php endif; ?>
                             </td>
                         </tr>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </tbody>
                     <tfoot>
                         <button class="primary-btn fix-gr-bg submit" type="submit">Submit </button>
                     </tfoot>
                 </table>
             <?php echo e(Form::close()); ?>

         </div>
     </div>
 </div>
 <?php /**PATH C:\xampp\htdocs\resources\views\backEnd\global\global_study_material_modal.blade.php ENDPATH**/ ?>
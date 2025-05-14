<div role="tabpanel" class="tab-pane fade <?php echo e(Session::get('studentRecord') == 'active' ? 'show active' : ''); ?>"
    id="studentRecord">
    <div class="white-box">
        <div class="text-right mb-20">
            <?php if(userPermission(1201)): ?>
                <button class="primary-btn-small-input primary-btn small fix-gr-bg" type="button" data-toggle="modal"
                    data-target="#assignClass"> <span class="ti-plus pr-2"></span> <?php echo app('translator')->get('common.add'); ?></button>
            <?php endif; ?>
        </div>
        <table id="" class="table simple-table table-responsive school-table" cellspacing="0">
            <thead class="d-block">
                <tr class="d-flex">
                    <?php
                        $div = $setting->multiple_roll == 1 ? 'col-3' : 'col-4';
                    ?>
                    <?php if(moduleStatusCheck('University')): ?>
                        <th class="col-2"><?php echo app('translator')->get('university::un.session'); ?></th>
                        <th class="col-3"><?php echo app('translator')->get('university::un.faculty_department'); ?></th>
                        <th class="col-3"><?php echo app('translator')->get('university::un.semester(label)'); ?></th>
                    <?php else: ?>
                        <th class="<?php echo e($div); ?>"><?php echo app('translator')->get('common.class'); ?></th>
                        <th class="<?php echo e($div); ?>"><?php echo app('translator')->get('common.section'); ?></th>
                    <?php endif; ?>
                    <?php if($setting->multiple_roll == 1): ?>
                        <th class="<?php echo e($div); ?>"><?php echo app('translator')->get('student.id_number'); ?></th>
                    <?php endif; ?>
                    <th class="<?php echo e($div); ?>"><?php echo app('translator')->get('student.action'); ?></th>
                </tr>
            </thead>
            <tbody class="d-block">
                <?php $__currentLoopData = $student_detail->studentRecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="d-flex">
                        <?php if(moduleStatusCheck('University')): ?>
                            <td class="col-2"><?php echo e($record->unSession->name); ?></td>
                            <td class="col-3">
                                <?php echo e($record->unFaculty->name . '(' . $record->unDepartment->name . ')'); ?>

                                <?php if($record->is_default): ?>
                                    <span class="badge fix-gr-bg"><?php echo e(__('common.default')); ?></span>
                                <?php endif; ?>
                            </td>
                            <td class="col-3"><?php echo e($record->unSemester->name . '(' . $record->unSemesterLabel->name . ')'); ?>

                            </td>
                        <?php else: ?>
                            <td class="<?php echo e($div); ?>">
                                <?php echo e($record->class->class_name); ?>

                                <?php if($record->is_default): ?>
                                    <span class="badge fix-gr-bg"><?php echo e(__('common.default')); ?></span>
                                <?php endif; ?>
                            </td>
                            <td class="<?php echo e($div); ?>">
                                <?php echo e($record->section->section_name); ?>

                            </td>
                        <?php endif; ?>

                        <?php if($setting->multiple_roll == 1): ?>
                            <td class="<?php echo e($div); ?>"><?php echo e($record->roll_no); ?></td>
                        <?php endif; ?>
                        <td class="<?php echo e($div); ?>">
                            <?php if($record->is_promote == 0): ?>
                                <a class="primary-btn icon-only fix-gr-bg modalLink" data-modal-size="small-modal"
                                    title="<?php if(moduleStatusCheck('University')): ?> <?php echo app('translator')->get('university::un.assign_faculty_department'); ?>
                                    <?php else: ?> 
                                        <?php echo app('translator')->get('student.assign_class'); ?> <?php endif; ?>"
                                    href="<?php echo e(route('student_assign_edit', [@$record->student_id, @$record->id])); ?>"><span
                                        class="ti-pencil"></span></a>
                                <a href="#" class="primary-btn icon-only fix-gr-bg" data-toggle="modal"
                                    data-target="#deleteRecord_<?php echo e($record->id); ?>">
                                    <span class="ti-trash"></span>
                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    
                    <div class="modal fade admin-query" id="deleteRecord_<?php echo e($record->id); ?>">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"><?php echo app('translator')->get('common.delete'); ?></h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <form action="<?php echo e(route('student.record.delete')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="modal-body">
                                        <div class="text-center">
                                            <h4><?php echo app('translator')->get('student.Are you sure you want to move the following record to the trash?'); ?></h4>
                                        </div>

                                        <input type="checkbox" id="record<?php echo e(@$record->id); ?>"
                                            class="common-checkbox form-control<?php echo e(@$errors->has('record') ? ' is-invalid' : ''); ?>"
                                            name="type">
                                        <label
                                            for="record<?php echo e(@$record->id); ?>"><?php echo e(__('student.Skip the trash and permanently delete the record')); ?></label>

                                        <input type="hidden" name="student_id" value="<?php echo e($record->student_id); ?>">
                                        <input type="hidden" name="record_id" value="<?php echo e($record->id); ?>">
                                        <div class="mt-40 d-flex justify-content-between">
                                            <button type="button" class="primary-btn tr-bg"
                                                data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                                            <button type="submit"
                                                class="primary-btn fix-gr-bg"><?php echo app('translator')->get('common.delete'); ?></button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
    </div>
    
    
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    </tbody>
    </table>
</div>
</div>
<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\studentInformation\inc\_record_tab.blade.php ENDPATH**/ ?>
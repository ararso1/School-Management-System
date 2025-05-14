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
            <tr>
                <th><?php echo app('translator')->get('teacherEvaluation.staff_id'); ?></th>
                <th><?php echo app('translator')->get('teacherEvaluation.teacher_name'); ?></th>
                <th><?php echo app('translator')->get('teacherEvaluation.submitted_by'); ?></th>
                <th><?php echo app('translator')->get('teacherEvaluation.class'); ?>(<?php echo app('translator')->get('teacherEvaluation.section'); ?>)</th>
                <th><?php echo app('translator')->get('teacherEvaluation.rating'); ?></th>
                <th><?php echo app('translator')->get('teacherEvaluation.comment'); ?></th>
                <th><?php echo app('translator')->get('teacherEvaluation.status'); ?></th>
                <th><?php echo app('translator')->get('teacherEvaluation.actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $teacherEvaluations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacherEvaluation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($teacherEvaluation->status == 1 && $approved_evaluation_button_enable == false): ?>
                    <tr>
                        <td><?php echo e($teacherEvaluation->staff->id); ?></td>
                        <td><?php echo e($teacherEvaluation->staff->full_name); ?></td>
                        <td>
                            <?php if($teacherEvaluation->role_id == 2): ?>
                                <?php echo e($teacherEvaluation->studentRecord->studentDetail->full_name); ?>(<?php echo app('translator')->get('teacherEvaluation.student'); ?>)
                            <?php else: ?>
                                <?php echo e($teacherEvaluation->studentRecord->studentDetail->parents->fathers_name); ?>(<?php echo app('translator')->get('teacherEvaluation.parent'); ?>)
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($teacherEvaluation->studentRecord->class->class_name); ?>(<?php echo e($teacherEvaluation->studentRecord->section->section_name); ?>)
                        </td>
                        <td>
                            <div class="star-rating">
                                <input type="radio"
                                    id="5-stars<?php echo e($teacherEvaluation->id); ?>"
                                    name="rating<?php echo e($teacherEvaluation->id); ?>" value="5"
                                    <?php echo e($teacherEvaluation->rating == 5 ? 'checked' : ''); ?>

                                    disabled />
                                <label for="5-stars<?php echo e($teacherEvaluation->id); ?>"
                                    class="star">&#9733;</label>
                                    
                                <input type="radio"
                                    id="4-stars<?php echo e($teacherEvaluation->id); ?>"
                                    name="rating<?php echo e($teacherEvaluation->id); ?>" value="4"
                                    <?php echo e($teacherEvaluation->rating == 4 ? 'checked' : ''); ?>

                                    disabled />
                                <label for="4-stars<?php echo e($teacherEvaluation->id); ?>"
                                    class="star">&#9733;</label>
                                    
                                <input type="radio"
                                    id="3-stars<?php echo e($teacherEvaluation->id); ?>"
                                    name="rating<?php echo e($teacherEvaluation->id); ?>" value="3"
                                    <?php echo e($teacherEvaluation->rating == 3 ? 'checked' : ''); ?>

                                    disabled />
                                <label for="3-stars<?php echo e($teacherEvaluation->id); ?>"
                                    class="star">&#9733;</label>
                                    
                                <input type="radio"
                                    id="2-stars<?php echo e($teacherEvaluation->id); ?>"
                                    name="rating<?php echo e($teacherEvaluation->id); ?>" value="2"
                                    <?php echo e($teacherEvaluation->rating == 2 ? 'checked' : ''); ?>

                                    disabled />
                                <label for="2-stars<?php echo e($teacherEvaluation->id); ?>"
                                    class="star">&#9733;</label>
                                    
                                <input type="radio"
                                    id="1-star<?php echo e($teacherEvaluation->id); ?>"
                                    name="rating<?php echo e($teacherEvaluation->id); ?>" value="1"
                                    <?php echo e($teacherEvaluation->rating == 1 ? 'checked' : ''); ?>

                                    disabled />
                                <label for="1-star<?php echo e($teacherEvaluation->id); ?>"
                                    class="star">&#9733;</label>
                            </div>
                        </td>
                        <td data-bs-toggle="tooltip" title="<?php echo e($teacherEvaluation->comment); ?>">
                            <?php echo e($teacherEvaluation->comment); ?></td>
                        <td>
                            <?php if($teacherEvaluation->status == 0): ?>
                                <button
                                    class="primary-btn small bg-danger text-white border-0"><?php echo app('translator')->get('teacherEvaluation.pending'); ?></button>
                            <?php else: ?>
                                <button
                                    class="primary-btn small bg-success text-white border-0"><?php echo app('translator')->get('teacherEvaluation.approved'); ?></button>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a class="primary-btn small fix-gr-bg"
                                href="<?php echo e(route('teacher-evaluation-approve-delete', $teacherEvaluation->id)); ?>"
                                style="padding: 0px 10px;!important"
                                data-bs-toggle="tooltip" title="Delete">&#x292C;</a>
                        </td>
                    </tr>
                <?php endif; ?>
                <?php if($teacherEvaluation->status == 0 && $approved_evaluation_button_enable == true): ?>
                    <tr>
                        <td><?php echo e($teacherEvaluation->staff->id); ?></td>
                        <td><?php echo e($teacherEvaluation->staff->full_name); ?></td>
                        <td>
                            <?php if($teacherEvaluation->role_id == 2): ?>
                                <?php echo e($teacherEvaluation->studentRecord->studentDetail->full_name); ?>(<?php echo app('translator')->get('teacherEvaluation.student'); ?>)
                            <?php else: ?>
                                <?php echo e($teacherEvaluation->studentRecord->studentDetail->parents->fathers_name); ?>(<?php echo app('translator')->get('teacherEvaluation.parent'); ?>)
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($teacherEvaluation->studentRecord->class->class_name); ?>(<?php echo e($teacherEvaluation->studentRecord->section->section_name); ?>)
                        </td>
                        <td>
                            <div class="star-rating">
                                <input type="radio"
                                    id="5-stars<?php echo e($teacherEvaluation->id); ?>"
                                    name="rating<?php echo e($teacherEvaluation->id); ?>" value="5"
                                    <?php echo e($teacherEvaluation->rating == 5 ? 'checked' : ''); ?>

                                    disabled />
                                <label for="5-stars<?php echo e($teacherEvaluation->id); ?>"
                                    class="star">&#9733;</label>
                                <input type="radio"
                                    id="4-stars<?php echo e($teacherEvaluation->id); ?>"
                                    name="rating<?php echo e($teacherEvaluation->id); ?>" value="4"
                                    <?php echo e($teacherEvaluation->rating == 4 ? 'checked' : ''); ?>

                                    disabled />
                                <label for="4-stars<?php echo e($teacherEvaluation->id); ?>"
                                    class="star">&#9733;</label>
                                <input type="radio"
                                    id="3-stars<?php echo e($teacherEvaluation->id); ?>"
                                    name="rating<?php echo e($teacherEvaluation->id); ?>" value="3"
                                    <?php echo e($teacherEvaluation->rating == 3 ? 'checked' : ''); ?>

                                    disabled />
                                <label for="3-stars<?php echo e($teacherEvaluation->id); ?>"
                                    class="star">&#9733;</label>
                                <input type="radio"
                                    id="2-stars<?php echo e($teacherEvaluation->id); ?>"
                                    name="rating<?php echo e($teacherEvaluation->id); ?>" value="2"
                                    <?php echo e($teacherEvaluation->rating == 2 ? 'checked' : ''); ?>

                                    disabled />
                                <label for="2-stars<?php echo e($teacherEvaluation->id); ?>"
                                    class="star">&#9733;</label>
                                <input type="radio"
                                    id="1-star<?php echo e($teacherEvaluation->id); ?>"
                                    name="rating<?php echo e($teacherEvaluation->id); ?>" value="1"
                                    <?php echo e($teacherEvaluation->rating == 1 ? 'checked' : ''); ?>

                                    disabled />
                                <label for="1-star<?php echo e($teacherEvaluation->id); ?>"
                                    class="star">&#9733;</label>
                            </div>
                        </td>
                        <td data-bs-toggle="tooltip" title="<?php echo e($teacherEvaluation->comment); ?>">
                            <?php echo e($teacherEvaluation->comment); ?></td>
                        <td>
                            <button
                                class="primary-btn small bg-danger text-white border-0"><?php echo app('translator')->get('teacherEvaluation.pending'); ?></button>
                        </td>
                        <td>
                            <a class="primary-btn small fix-gr-bg"
                                href="<?php echo e(route('teacher-evaluation-approve-submit', $teacherEvaluation->id)); ?>"
                                style="padding: 0px 10px;!important"
                                data-bs-toggle="tooltip" title="Approve">&#10003;</a>
                            <a class="primary-btn small fix-gr-bg"
                                href="<?php echo e(route('teacher-evaluation-approve-delete', $teacherEvaluation->id)); ?>"
                                style="padding: 0px 10px;!important"
                                data-bs-toggle="tooltip" title="Delete">&#x292C;</a>
                        </td>
                    </tr>
                <?php endif; ?>
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
<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\teacherEvaluation\report\_teacher_evaluation_report_common_table.blade.php ENDPATH**/ ?>
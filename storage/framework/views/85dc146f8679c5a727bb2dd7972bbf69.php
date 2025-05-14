<?php if(( $graduates)): ?> 
    <div class="row mt-40">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-4 no-gutters">
                    <div class="main-title">
                        <h3 class="mb-0"><?php echo app('translator')->get('alumni::al.graduate_list'); ?></h3>
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
                        <table class="school-table school-table-data" width="100%">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('student.admission_no'); ?></th>
                                    <th><?php echo app('translator')->get('common.name'); ?></th>
                                    <?php if(moduleStatusCheck('University')): ?>
                                        <th><?php echo app('translator')->get('university::un.session'); ?></th>
                                        <th><?php echo app('translator')->get('alumni::al.fac_dept'); ?></th>
                                    <?php else: ?>
                                        <th><?php echo app('translator')->get('common.class'); ?></th>
                                        <th><?php echo app('translator')->get('common.section'); ?></th>
                                    <?php endif; ?>
                                    <th><?php echo app('translator')->get('university::un.mobile'); ?></th>
                                    <th><?php echo app('translator')->get('common.gender'); ?></th>
                                    <th><?php echo app('translator')->get('student.date_of_birth'); ?></th>
                                    <th><?php echo app('translator')->get('common.action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $graduates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $graduate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><a href="<?php echo e(route('student_view',$graduate->student->id)); ?>" target="_blank"><?php echo e(@$graduate->student->admission_no); ?></a></td>
                                        <td><a href="<?php echo e(route('student_view',$graduate->student->id)); ?>" target="_blank"><?php echo e(@$graduate->student->full_name); ?></a></td>
                                        <?php if(moduleStatusCheck('University')): ?>
                                            <td><?php echo e(@$graduate->unSession->name); ?></td>
                                            <td><?php echo e(@$graduate->unFaculty->name); ?> (<?php echo e(@$graduate->unDepartment->name); ?>)</td>
                                        <?php else: ?>
                                            <td><?php echo e(@$graduate->smClass->class_name); ?></td>
                                            <td><?php echo e(@$graduate->section->section_name); ?></td>
                                        <?php endif; ?>
                                        <td><?php echo e(@$graduate->student->mobile); ?></td>
                                        <td><?php echo e(@$graduate->student->gender->base_setup_name); ?></td>
                                        <td><?php echo e(@dateConvert($graduate->student->date_of_birth)); ?></td>
                                        
                                        <td valign="top">
                                            <div class="dropdown">
                                                <button type="button" class="btn dropdown-toggle"
                                                        data-toggle="dropdown">
                                                    <?php echo app('translator')->get('common.select'); ?>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="<?php echo e(route('alumni.view-transcript', [$graduate->id])); ?>" target="_blank">
                                                        <?php echo app('translator')->get('alumni::al.view_transcript'); ?>
                                                    </a>
                                                    <a class="dropdown-item modalLink" data-modal-size="modal-lg" title="<?php echo app('translator')->get('university::un.add_alumni_information'); ?>" href="<?php echo e(route('alumni.add-alumni-detail',[$graduate->id])); ?>" data-modal-size="modal-lg" title="<?php echo app('translator')->get('alumni::al.add_alumni_information'); ?>" href="<?php echo e(route('alumni.add-alumni-detail',[$graduate->id])); ?>"><?php echo app('translator')->get('alumni::al.add_alumni_information'); ?></a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
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
<?php endif; ?> <?php /**PATH C:\xampp\htdocs\resources\views\backEnd\graduate\inc\_graduate_search.blade.php ENDPATH**/ ?>
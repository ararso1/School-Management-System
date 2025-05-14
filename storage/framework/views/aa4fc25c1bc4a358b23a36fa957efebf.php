<script src="<?php echo e(asset('public/backEnd/')); ?>/js/main.js"></script>
 <div class="row mt-40">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-4 no-gutters">
                    <div class="main-title">
                        <h3 class="mb-0"><?php echo app('translator')->get('hr.staff_list'); ?></h3>
                    </div>
                </div>
            </div>

         <div class="row">
                <div class="col-lg-12">
                    <table id="table_id" class="table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get('hr.staff_no'); ?>.</th>
                                <th><?php echo app('translator')->get('common.name'); ?></th>
                                <th><?php echo app('translator')->get('hr.role'); ?></th>
                                <th><?php echo app('translator')->get('hr.departments'); ?></th>
                                <th><?php echo app('translator')->get('hr.designation'); ?></th>
                                <th><?php echo app('translator')->get('common.mobile'); ?></th>
                                <th><?php echo app('translator')->get('common.email'); ?></th>
                                <th><?php echo app('translator')->get('common.action'); ?></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $__currentLoopData = $staffs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($value->staff_no); ?></td>
                                <td><?php echo e($value->first_name); ?>&nbsp;<?php echo e($value->last_name); ?></td>
                                <td><?php echo e($value->roles!=""?$value->roles->name:""); ?></td>
                                <td><?php echo e($value->departments!=""?$value->departments->name:""); ?></td>
                                <td><?php echo e($value->designations!=""?$value->designations->title:""); ?></td>
                                <td><?php echo e($value->mobile); ?></td>
                                <td><?php echo e($value->email); ?></td>

                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                            <?php echo app('translator')->get('common.edit'); ?>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="<?php echo e(route('viewStaff', $value->id)); ?>"><?php echo app('translator')->get('common.view'); ?></a>
                                            <a class="dropdown-item" href="<?php echo e(route('editStaff', $value->id)); ?>"><?php echo app('translator')->get('common.edit'); ?></a>
                                            <a class="dropdown-item" href="#"><?php echo app('translator')->get('common.delete'); ?></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\humanResource\staffDatatable.blade.php ENDPATH**/ ?>
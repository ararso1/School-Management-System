<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('menumanage::menuManage.assign_sidebar_by_role'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo e(__('menumanage::menuManage.assign_sidebar_by_role')); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('common.dashboard')); ?></a>
                    <a href="#"><?php echo e(__('common.sidebar_manager')); ?></a>
                    <a href="#"><?php echo e(__('menumanage::menuManage.assign_sidebar_by_role')); ?></a>
                </div>
            </div>
        </div>
    </section>
    <div class="row">
        <div class="col-lg-12">
            <div class="white-box">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="main-title">
                            <h3 class="mb-15 "><?php echo e(__('common.select_criteria')); ?></h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row pt-0"></div>
                    <div id="row_element_div_role">
                        <?php echo Form::open(['route'=>'menumanage.index', 'method'=>'GET']); ?>

                        <div class="row">
                            <div class="col-lg-7">
                                <div class="primary_input">
                                    <label class="primary_input_label" for="role_id"><?php echo app('translator')->get('hr.role'); ?></label>
                                    <select class="primary_select form-control<?php echo e($errors->has('role_id') ? ' is-invalid' : ''); ?>" name="role_id" id="sidebar_role_id">
                                        <option data-display="<?php echo app('translator')->get('hr.role'); ?>" value=""><?php echo app('translator')->get('common.select'); ?></option>
                                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($value->id); ?>" <?php echo e(old('role_id') == $value->id ? 'selected' : ''); ?>>
                                                <?php echo e($value->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('role_id')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('role_id')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>


                            <div class="col-lg-3 text-center mt-4" >
                                <button type="submit" class="primary-btn fix-gr-bg" style="margin-top: 10px">
                                    <span class="ti-check"></span>
                                    <?php echo e(__('common.search')); ?>

                                </button>
                            </div>
                        </div>
                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>



<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Modules\MenuManage\Resources\views\role.blade.php ENDPATH**/ ?>
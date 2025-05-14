<?php $__env->startSection('mainContent'); ?>
 <section class="mb-40">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-4">
                <div class="main-title">
                    <h3><?php echo app('translator')->get('system_settings.user_setup'); ?></h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="white-box">
                    <form>
                        <div class="container-fluid p-0">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="row no-gutters input-right-icon">
                                        <div class="col">
                                            <div class="primary_input">
                                                <input class="primary_input_field form-control<?php echo e($errors->has('first_name') ? ' is-invalid' : ''); ?>" type="text" placeholder="First Name *" name="first_name" autocomplete="off">
                                                
                                                <?php if($errors->has('first_name')): ?>
                                                    <span class="text-danger" >
                                                        <?php echo e($errors->first('first_name')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="row no-gutters input-right-icon">
                                        <div class="col">
                                            <div class="primary_input">
                                                <input class="primary_input_field form-control<?php echo e($errors->has('last_name') ? ' is-invalid' : ''); ?>" type="text" placeholder="Last Name *" name="last_name" autocomplete="off">
                                                
                                                <?php if($errors->has('last_name')): ?>
                                                    <span class="text-danger" >
                                                        <?php echo e($errors->first('last_name')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="row no-gutters input-right-icon">
                                        <div class="col">
                                            <div class="primary_input">
                                                <input class="primary_input_field form-control<?php echo e($errors->has('designation') ? ' is-invalid' : ''); ?>" type="text" placeholder="Designation *" name="designation" autocomplete="off">
                                                
                                                <?php if($errors->has('designation')): ?>
                                                    <span class="text-danger" >
                                                        <?php echo e($errors->first('designation')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="row no-gutters input-right-icon">
                                        <div class="col">
                                            <div class="primary_input">
                                                <input class="primary_input_field  primary_input_field date form-control form-control<?php echo e($errors->has('date_of_birth') ? ' is-invalid' : ''); ?>" id="date_of_birth" type="text"
                                                    placeholder="Date Of Birth" name="date_of_birth">
                                                
                                            </div>
                                        </div>
                                        <button class="" type="button">
                                            <i class="ti-calendar" id="admission-date-icon"></i>
                                        </button>
                                        <?php if($errors->has('date_of_birth')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('date_of_birth')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="row no-gutters input-right-icon">
                                        <div class="col">
                                            <div class="primary_input">
                                                <input class="primary_input_field form-control<?php echo e($errors->has('address') ? ' is-invalid' : ''); ?>" type="text" placeholder="Address *" name="address" autocomplete="off">
                                                
                                                <?php if($errors->has('address')): ?>
                                                    <span class="text-danger" >
                                                        <?php echo e($errors->first('address')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <select class="primary_select  form-control<?php echo e($errors->has('address') ? ' is-invalid' : ''); ?>" name="gender">
                                        <option value=""><?php echo app('translator')->get('common.select_gender'); ?></option>
                                        <option value="1"><?php echo app('translator')->get('common.male'); ?></option>
                                        <option value="2"><?php echo app('translator')->get('common.female'); ?></option>
                                        <option value="3"><?php echo app('translator')->get('coommon.others'); ?></option>
                                    </select>
                                    <?php if($errors->has('gender')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('gender')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-3">
                                    <div class="row no-gutters input-right-icon">
                                        <div class="col">
                                            <div class="primary_input">
                                                <input class="primary_input_field form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" type="text" placeholder="Email *" name="email" autocomplete="off">
                                                
                                                <?php if($errors->has('email')): ?>
                                                    <span class="text-danger" >
                                                        <?php echo e($errors->first('email')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="row no-gutters input-right-icon">
                                        <div class="col">
                                            <div class="primary_input">
                                                <input class="primary_input_field form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" type="Password" placeholder="Password *" name="password" autocomplete="off">
                                                
                                                <?php if($errors->has('password')): ?>
                                                    <span class="text-danger" >
                                                        <?php echo e($errors->first('password')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="row no-gutters input-right-icon">
                                        <div class="col">
                                            <div class="primary_input">
                                                <input class="primary_input_field form-control<?php echo e($errors->has('phone') ? ' is-invalid' : ''); ?>" type="Password" placeholder="Phone *" name="phone" autocomplete="off">
                                                
                                                <?php if($errors->has('phone')): ?>
                                                    <span class="text-danger" >
                                                        <?php echo e($errors->first('phone')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="row no-gutters input-right-icon">
                                        <div class="col">
                                            <div class="primary_input">
                                                <input class="primary_input_field form-control<?php echo e($errors->has('phone') ? ' is-invalid' : ''); ?>" type="text" placeholder="Phone *" name="phone" autocomplete="off">
                                                
                                                <?php if($errors->has('phone')): ?>
                                                    <span class="text-danger" >
                                                        <?php echo e($errors->first('phone')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="row no-gutters input-right-icon">
                                        <div class="col">
                                            <div class="primary_input">
                                                <input class="primary_input_field form-control<?php echo e($errors->has('photo') ? ' is-invalid' : ''); ?>" type="file" placeholder="Photo *" name="photo" autocomplete="off">
                                                
                                                <?php if($errors->has('photo')): ?>
                                                    <span class="text-danger" >
                                                        <?php echo e($errors->first('photo')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 text-center">
                                    <div class="row mt-40">
                                        <button class="primary-btn fix-gr-bg submit">
                                            <span class="ti-check"></span>
                                            <?php echo app('translator')->get('common.save_content'); ?>
                                        </button>
                                    </div>
                                 </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\systemSettings\user\user_create.blade.php ENDPATH**/ ?>
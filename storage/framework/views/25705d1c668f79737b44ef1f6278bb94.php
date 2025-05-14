<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Login')); ?></div>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right"><?php echo e(__('E-Mail Address')); ?></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required autofocus>

                                <?php if($errors->has('email')): ?>
                                    <span class="text-danger" >
                                        <?php echo e($errors->first('email')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Password')); ?></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>

                                <?php if($errors->has('password')): ?>
                                    <span class="text-danger" >
                                        <?php echo e($errors->first('password')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>

                                    <label class="form-check-label" for="remember">
                                        <?php echo e(__('Remember Me')); ?>

                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Login')); ?>

                                </button>

                                <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                                    <?php echo e(__('Forgot Your Password?')); ?>

                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<!-- 
<div class="row">
                        <div class="col-md-12">
                            <div class="text-center">
                                <input type="hidden" name="url" id="url" value="<?php echo e(url('/')); ?>">
                                <button type="submit" class="primary-btn white mr-1 get-login-access">Super Admin</button>
                                <button type="submit" class="primary-btn white ml-1 mr-1 get-login-access">Admin</button>
                                <button type="submit" class="primary-btn white ml-1 mr-1 get-login-access">Teacher</button>
                                <button type="submit" class="primary-btn white ml-1 get-login-access">Accountant</button>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="text-center mt-10">
                                <button type="submit" class="primary-btn white mr-1 get-login-access">Receptionist</button>
                                <button type="submit" class="primary-btn white ml-1 mr-1 get-login-access">Librarian</button>
                                <button type="submit" class="primary-btn white ml-1 mr-1 get-login-access">Student</button>
                                <button type="submit" class="primary-btn white ml-1 get-login-access">Parent</button>
                            </div>
                        </div>
                    </div> -->

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\auth\loginn.blade.php ENDPATH**/ ?>
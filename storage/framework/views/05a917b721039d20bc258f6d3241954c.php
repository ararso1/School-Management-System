<!DOCTYPE html>
<html lang="en">

<head>
    <!-- All Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="<?php echo e(asset(generalSetting()->favicon)); ?>" type="image/png" />
    <title><?php echo app('translator')->get('auth.new_password'); ?></title>
    <meta name="_token" content="<?php echo csrf_token(); ?>" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/theme/edulia/css/bootstrap.min.css')); ?>">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/theme/edulia/css/fontawesome.all.min.css')); ?>">

    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo e(asset('public/theme/edulia/css/style.css')); ?>">
    <style>
        .text-danger.text-left {
            font-size: 14px;
        }
    </style>
</head>

<body>
    <!-- <a href="" rel=”nofollow”></a> -->

    <section class="login">
        <div class="login_wrapper">
            <!-- login form start -->
            <div class="login_wrapper_login_content">
                <div class="login_wrapper_logo text-center"><img src="<?php echo e(asset(generalSetting()->logo)); ?>"
                        alt=""></div>
                <div class="login_wrapper_content">
                    <h4><?php echo app('translator')->get('auth.reset_password'); ?></h4>
                    <form action="<?php echo e(route('storeNewPassword')); ?>" method='POST'>
                        <input type="hidden" name="email" value="<?php echo e($email); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="input-control">
                            <label for="#" class="input-control-icon"><i class="fal fa-lock-alt"></i></label>
                            <input type="password" name='new_password' class="input-control-input"
                                placeholder='<?php echo app('translator')->get('auth.enter_new_password'); ?>'
                                >
                            <?php if($errors->has('new_password')): ?>
                                <span class="text-danger text-left pl-3" role="alert">
                                    <?php echo e($errors->first('new_password')); ?>

                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="input-control">
                            <label for="#" class="input-control-icon"><i class="fal fa-lock-alt"></i></label>
                            <input type="password"name='confirm_password' class="input-control-input"
                                placeholder='<?php echo app('translator')->get('auth.confirm_new_password'); ?>'
                                >
                            <?php if($errors->has('confirm_password')): ?>
                                <span class="text-danger text-left pl-3" role="alert">
                                    <?php echo e($errors->first('confirm_password')); ?>

                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="input-control">
                            <input type="submit" class='input-control-input' value="Submit">
                        </div>
                    </form>
                </div>
            </div>
            <!-- login form end -->
        </div>
    </section>


    <!-- jQuery JS -->
    <script src="<?php echo e(asset('public/theme/edulia/js/jquery.min.js')); ?>"></script>

    <!-- Main Script JS -->
    <script src="<?php echo e(asset('public/theme/edulia/js/script.js')); ?>"></script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\resources\views\frontEnd\theme\edulia\login\new_password.blade.php ENDPATH**/ ?>
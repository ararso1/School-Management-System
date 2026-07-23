<!DOCTYPE html>
<html lang="en">

<head>
    <!-- All Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="<?php echo e(asset(generalSetting()->favicon)); ?>" type="image/png" />
    <title><?php echo app('translator')->get('auth.reset_password'); ?></title>
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

    <section class="login">
        <div class="login_wrapper">
            <!-- login form start -->
            <div class="login_wrapper_login_content">
                <div class="login_wrapper_logo text-center"><img src="<?php echo e(asset(generalSetting()->logo)); ?>"
                        alt=""></div>
                <div class="login_wrapper_content">
                    <?php if(session()->has('message-success')): ?>
                        <!-- Success Confirmation Screen -->
                        <div class="text-center success-confirmation">
                            <div style="margin-bottom: 20px;">
                                <i class="fas fa-check-circle" style="font-size: 64px; color: #28a745;"></i>
                            </div>
                            <h4 style="color: #28a745; margin-bottom: 15px;">Email Sent Successfully!</h4>
                            <p style="color: #28a745; font-size: 16px; margin-bottom: 20px;"><?php echo e(session()->get('message-success')); ?></p>
                            
                            <div style="background: #d1ecf1; border: 1px solid #bee5eb; border-radius: 5px; padding: 15px; margin: 20px 0; text-align: left;">
                                <p style="margin-bottom: 10px;"><i class="fas fa-info-circle"></i> <strong>What's next?</strong></p>
                                <ul style="list-style: none; padding-left: 0; margin-bottom: 0;">
                                    <li style="margin-bottom: 8px;">✓ Check your email inbox</li>
                                    <li style="margin-bottom: 8px;">✓ Click on the reset link in the email</li>
                                    <li style="margin-bottom: 8px;">✓ The link will expire in 24 hours</li>
                                    <li>✓ Don't forget to check your spam folder</li>
                                </ul>
                            </div>

                            <div style="margin-top: 20px;">
                                <a href="<?php echo e(url('login')); ?>" style="display: inline-block; background: #415094; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; margin-right: 10px;">
                                    <i class="fas fa-arrow-left"></i> Back to Login
                                </a>
                                <a href="<?php echo e(route('recoveryPassord')); ?>" style="display: inline-block; background: #17a2b8; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">
                                    <i class="fas fa-envelope"></i> Send Another Email
                                </a>
                            </div>
                        </div>
                    <?php else: ?>
                        <!-- Password Reset Form -->
                        <h4><?php echo app('translator')->get('auth.reset_password'); ?></h4>
                        <?php if(session()->has('message-danger')): ?>
                            <div style="background: #f8d7da; border: 1px solid #f5c6cb; border-radius: 5px; padding: 10px; margin-bottom: 15px;">
                                <p style="color: #721c24; margin: 0;"><?php echo e(session()->get('message-danger')); ?></p>
                            </div>
                        <?php endif; ?>
                        
                        <form action="<?php echo e(route('email/verify')); ?>" method='POST'>
                            <?php echo csrf_field(); ?>
                            <div class="input-control">
                                <label for="#" class="input-control-icon"><i class="fal fa-envelope"></i></label>
                                <input type="email" name='email' class="input-control-input"
                                    placeholder='<?php echo app('translator')->get('auth.enter_email_address'); ?>' value="<?php echo e(old('email')); ?>">
                                <?php if($errors->has('email')): ?>
                                    <span class="text-danger text-left pl-3" role="alert">
                                        <?php echo e($errors->first('email')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="input-control">
                                <input type="submit" class='input-control-input' value="Submit">
                            </div>
                        </form>
                    <?php endif; ?>
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
<?php /**PATH C:\xampp\htdocs\school\resources\views/frontEnd/theme/edulia/login/reset_password.blade.php ENDPATH**/ ?>
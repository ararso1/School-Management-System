<?php
$setting = generalSetting();
if(isset($setting->copyright_text)){ generalSetting()->copyright_text = $setting->copyright_text; }else{ generalSetting()->copyright_text = "Copyright © " . date('Y') . " All rights reserved | is made with by Codethemes"; }
if(isset($setting->logo)) { generalSetting()->logo = $setting->logo; } else{ generalSetting()->logo = 'public/uploads/settings/logo.png'; }

if(isset($setting->favicon)) { generalSetting()->favicon = $setting->favicon; } else{ generalSetting()->favicon = 'public/backEnd/img/favicon.png'; }

$login_background = App\SmBackgroundSetting::where([['is_default',1],['title','Login Background']])->first();

if(empty($login_background)){
    $css = "";
}else{
    if(!empty($login_background->image)){
        $css = "background: url('". url($login_background->image) ."')  no-repeat center;  background-size: cover;";

    }else{
        $css = "background:".$login_background->color;
    }
}
activeStyle() = App\SmStyle::where('is_active', 1)->first();

$ttl_rtl = $setting->ttl_rtl;
?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="<?php echo e(asset(generalSetting()->favicon)); ?>" type="image/png"/>
    <title><?php echo e(__('Register')); ?> | <?php echo e(@$setting->site_title); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/themify-icons.css" />
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/css/style.css" />
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/css/infix.css" />

    <style>

.loginButton {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.loginButton{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}
.singleLoginButton{
    flex: 22% 0 0;
}

.loginButton .get-login-access {
    display: block;
    width: 100%;
    border: 1px solid #fff;
    border-radius: 5px;
    margin-bottom: 20px;
    padding: 5px;
    white-space: nowrap;
}
@media (max-width: 576px) {
  .singleLoginButton{
    flex: 49% 0 0;
  }
}
@media (max-width: 576px) {
  .singleLoginButton{
    flex: 49% 0 0;
  }
  .loginButton .get-login-access {
    margin-bottom: 10px;
}
}
    </style>

</head>
  <body >
     <div class="in_login_part"  style="<?php echo e($css); ?>">

    <!--================ Start Login Area =================-->
    <section class="login-area min-height-90">
        <div class="container">
            <div class="row login-height justify-content-center align-items-center">
                <div class="col-lg-5 col-md-8">
                    <div class="form-wrap text-center">
                        <div class="logo-container">
                            <a href="#">
                                <?php if(!empty($setting->logo)): ?><img src="<?php echo e(asset($setting->logo)); ?>" alt="Login Panel"><?php endif; ?>
                            </a>
                        </div>
                        <h5 class="text-uppercase"><?php echo app('translator')->get('auth.login_details'); ?></h5>
                        <?php if(session()->has('message-success') != ""): ?>
                            <?php if(session()->has('message-success')): ?>
                            <p class="text-success"><?php echo e(session()->get('message-success')); ?></p>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if(session()->has('message-danger') != ""): ?>
                            <?php if(session()->has('message-danger')): ?>
                            <p class="text-danger"><?php echo e(session()->get('message-danger')); ?></p>
                            <?php endif; ?>
                        <?php endif; ?>
                        <form method="POST" class="" action="<?php echo e(url('register')); ?>">
                        <?php echo csrf_field(); ?>



                            <div class="form-group input-group mb-4 mx-3">
                                <span class="input-group-addon">
                                    <i class="ti-user"></i>
                                </span>
                                <input class="form-control<?php echo e($errors->has('fullname') ? ' is-invalid' : ''); ?>" type="text" name='fullname' placeholder="Enter Name"/>
                                <?php if($errors->has('fullname')): ?>
                                    <span class="text-danger text-left pl-3" role="alert">
                                        <?php echo e($errors->first('fullname')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>

                            <div class="form-group input-group mb-4 mx-3">
                                <span class="input-group-addon">
                                    <i class="ti-email"></i>
                                </span>
                                <input class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" type="email" name='email' placeholder="Enter Email"/>
                                <?php if($errors->has('email')): ?>
                                    <span class="text-danger text-left pl-3" role="alert">
                                        <?php echo e($errors->first('email')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>

                            <div class="form-group input-group mb-4 mx-3">
                                <span class="input-group-addon">
                                    <i class="ti-key"></i>
                                </span>
                                <input class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" type="password" name='password' placeholder="Enter Password"/>
                                <?php if($errors->has('password')): ?>
                                    <span class="text-danger text-left pl-3" role="alert">
                                        <?php echo e($errors->first('password')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>


                            <div class="form-group input-group mb-4 mx-3">
                                <span class="input-group-addon">
                                    <i class="ti-check"></i>
                                </span>
                                <input class="form-control<?php echo e($errors->has('password_confirmation') ? ' is-invalid' : ''); ?>" type="password" name='password_confirmation' placeholder="Confirm Password"/>
                                <?php if($errors->has('password_confirmation')): ?>
                                    <span class="text-danger text-left pl-3" role="alert">
                                        <?php echo e($errors->first('password_confirmation')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>


                            <div class="form-group mt-30 mb-30">
                                <button type="submit" class="primary-btn fix-gr-bg">
                                    <span class="ti-lock mr-2"></span>
                                    Login
                                </button>
                            </div>

                            <div class="d-flex justify-content-between pl-30">
                                <div>
                                    <a href="<?php echo e(route('recoveryPassord')); ?>">Have already an account ? Login here</a>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ Start End Login Area =================-->
     </div>
    <!--================ Footer Area =================-->
    <footer class="footer_area min-height-10">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <p>Copyright © <?php echo e(date('Y')); ?> All rights reserved | This application is made with <span class="ti-heart"></span>  by Codethemes</p>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!--================ End Footer Area =================-->


    <script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/popper.js"></script>
    <script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/bootstrap.min.js"></script>
    <script>
        $('.primary-btn').on('click', function(e) {
        // Remove any old one
        $('.ripple').remove();

        // Setup
        var primaryBtnPosX = $(this).offset().left,
            primaryBtnPosY = $(this).offset().top,
            primaryBtnWidth = $(this).width(),
            primaryBtnHeight = $(this).height();

        // Add the element
        $(this).prepend("<span class='ripple'></span>");

        // Make it round!
        if (primaryBtnWidth >= primaryBtnHeight) {
            primaryBtnHeight = primaryBtnWidth;
        } else {
            primaryBtnWidth = primaryBtnHeight;
        }

        // Get the center of the element
        var x = e.pageX - primaryBtnPosX - primaryBtnWidth / 2;
        var y = e.pageY - primaryBtnPosY - primaryBtnHeight / 2;

        // Add the ripples CSS and start the animation
        $('.ripple')
            .css({
                width: primaryBtnWidth,
                height: primaryBtnHeight,
                top: y + 'px',
                left: x + 'px'
            })
            .addClass('rippleEffect');
        });
    </script>


	<?php echo Toastr::message(); ?>

  </body>
</html>
<?php /**PATH C:\xampp\htdocs\resources\views\frontEnd\register.blade.php ENDPATH**/ ?>
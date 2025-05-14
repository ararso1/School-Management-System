<!DOCTYPE html>
<html lang="">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="icon" href="<?php echo e(asset('public/backEnd/')); ?>/img/favicon.png" type="image/png"/>
    <title><?php echo e(__('Infix Edu ERP | Verification for pro User')); ?></title>
    <meta name="_token" content="<?php echo csrf_token(); ?>"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/jquery-ui.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/jquery.data-tables.css">
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/bootstrap.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/bootstrap-datepicker.min.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/bootstrap-datetimepicker.min.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/themify-icons.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/flaticon.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/nice-select.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/magnific-popup.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/fastselect.min.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/css/software.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/fullcalendar.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/css/toastr.min.css" />
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/fullcalendar.print.css">

    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/select2/select2.css"/>
    <!-- main css -->
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/css/style.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/css/infix.css"/>
    <style>
        h2,h5{color: whitesmoke}
        .card-body {
            padding: 5.25rem;
        }

        .single-report-admit .card-header {
            background-position: right;
            margin-top: -5px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            padding: 20px;
        }
        .form-control{
          font-size: 11px !important;
          border: 1px solid #d73cff !important;
        }

    </style>
</head>


<body class="admin">
<div class="container">
    <div class="col-md-6 offset-3  mt-40">


            <ul id="progressbar">
                <li class="active"><a href="<?php echo e(url('/install')); ?>">welcome</a></li>
                <li class="active">verification</li>
                <li>Environment</li>
                <li>System Setup</li>
            </ul>


        <div class="card">
            <div class="single-report-admit">
                <div class="card-header">
                    <h2 class="text-center text-uppercase">VERIFICATION</h2>
                </div>
            </div>
            <div class="card-body">
                <?php if(Session::has('message-danger')): ?>
                    <p class="text-danger">** <?php echo e(Session::get('message-danger')); ?></p>
                <?php endif; ?>
                 <?php if($errors->any()): ?>
                    Ops sorry ! Please enter valid input!
                       <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <p class="text-danger">** <?php echo e($error); ?></p>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 <?php endif; ?>


               <form method="post" action="<?php echo e(url('check-verified-input')); ?>">
                   <?php echo e(csrf_field()); ?>

                   <div class="form-group">
                       <label for="user">Email :</label>
                       <input type="text" class="form-control " name="email"  required="required"  placeholder="Enter Your Email" value="<?php echo e(old('email')); ?>">
                   </div>
                   <div class="form-group">
                       <label for="purchasecode">Purchase Code:</label>
                       <input type="text" class="form-control" name="code" required="required" placeholder="Enter Your Envato Purchase Code" value="<?php echo e(old('purchasecode')); ?>">
                   </div>
                   <div class="form-group">
                       <label for="domain">Installation Domain:</label>
                       <input type="text" class="form-control" name="domain" required="required" value="" >
                   </div>
                   <input type="submit" value="Next" class="offset-3 col-sm-6 primary-btn fix-gr-bg mt-40" style="background-color: rebeccapurple;color: whitesmoke">
               </form>
            </div>
        </div>
    </div>

</div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\resources\views\install\pro_verification_page.blade.php ENDPATH**/ ?>
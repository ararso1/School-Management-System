<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1><?php echo e(@$course->title); ?></h1>
            <img src="<?php echo e(asset($course->image)); ?>" class="mt-3 mr-3" width="100%" style="float: left">
            <h3 class="mt-3"><?php echo app('translator')->get('front_settings.overview'); ?>: </h3>
            <p><?php echo @$course->overview; ?></p>
            <h3 class="mt-3"><?php echo app('translator')->get('front_settings.outline'); ?>: </h3>
            <p><?php echo @$course->outline; ?></p>
            <h3 class="mt-3"><?php echo app('translator')->get('front_settings.prerequisites'); ?>: </h3>
            <p><?php echo @$course->prerequisites; ?></p>
            <h3 class="mt-3"><?php echo app('translator')->get('front_settings.resources'); ?>: </h3>
            <p><?php echo @$course->resources; ?></p>
            <h3 class="mt-3"><?php echo app('translator')->get('front_settings.stats'); ?>: </h3>
            <p><?php echo @$course->stats; ?></p>
        </div>
    </div>

<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\frontSettings\course\course_details.blade.php ENDPATH**/ ?>
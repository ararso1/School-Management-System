<html>
	<head>
		<title><?php echo app('translator')->get('admin.certificate'); ?></title>
		<style>
			.certificate_box_wrapper {
				background-image: url(./img/bg.jpg);
				width: <?php echo $certificate->background_width?? 164?>mm;
				min-height: <?php echo $certificate->background_height?? 145?>mm;
				/* display: flex; */
				justify-content: center;
				margin: auto;
				background-repeat: no-repeat;
				background-size: cover;
				background-position: center center;
				padding-top: <?php echo $certificate->padding_top?? 5?>mm;
				padding-left: <?php echo $certificate->pading_left?? 5?>mm;
				padding-right: <?php echo $certificate->padding_right?? 5?>mm;
				padding-bottom: <?php echo $certificate->padding_bottom?? 5?>mm;
			}
    	</style>
	</head>
	<body>
		<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="certificate_box_wrapper" style="background-image: url('<?php echo e(isset($certificate)? asset($certificate->background_image): ''); ?>'); margin-bottom: <?php echo e($gridGap); ?>px;">
				<?php if(moduleStatusCheck('Lms')== TRUE && $type== 'lms'): ?>
					<?php
						$body = App\SmStudentCertificate::certificateBody($certificate->body, 'Lms', $user->user_id);
					?>
				<?php else: ?>
					<?php
						$body = App\SmStudentCertificate::certificateBody($certificate->body, @$certificate->role, $user->user_id);
					?>
				<?php endif; ?>
					<?php echo $body; ?>

			</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</body>
</html>
<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\admin\certificate\certificate_print.blade.php ENDPATH**/ ?>
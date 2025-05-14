<html>
	<head>
		<title><?php echo app('translator')->get('admin.student_certificate'); ?></title>
	</head>

	<body>
		<div style="background-image: url('<?php echo e(isset($certificate)? asset($certificate->background_image): ''); ?>'); margin-bottom: <?php echo e($gridGap); ?>px;">
			<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php
					$body = App\SmStudentCertificate::certificateBody($certificate->body, $certificate->role, $user->user_id);
				?>
				<?php echo $body; ?>

			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	</body>
</html>
<?php /**PATH C:\xampp\htdocs\Modules\BulkPrint\Resources\views\admin\lmsCertificatePrint.blade.php ENDPATH**/ ?>
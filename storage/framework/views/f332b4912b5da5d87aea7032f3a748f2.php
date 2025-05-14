<?php  
$setting = generalSetting();
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo app('translator')->get('student.student_id_card'); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/css/style.css" />
    <style media="print">
		body.admin {
			background: #fff;
		}
		.student-meta-box {
			border: 1px solid #eee;
    		border-radius: 10px;
		}
		.p-3.radius-t-y-0 {
			position: absolute;
			top: 125px;
			left: 24px;
			right: 24px;
			bottom: 30px;
			box-shadow: none;
		}
		div.page {
            page-break-after: always;
            page-break-inside: avoid;
        }
    </style>
</head>
<body class="mt-4">
	<div class="container">
		<div class="row justify-content-center">
			<?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="col-lg-5 page">
				<div class="student-details">
					<div class="student-meta-box">
						<div class="position-relative">
							<img class="w-100 img-fluid" src="<?php echo e(asset('public/backEnd/img/student/id-card-bg.png')); ?>">
							<h3 class="" style="position:absolute; left: 20px; top: 45px; color: #fff"><?php echo app('translator')->get('common.view_student_id_card'); ?></h3>
						</div>
						<!-- <div class="text-center p-3">
							<img class="img-fluid" src="<?php echo e(asset('public/backEnd/img/student/student-id-bg.png')); ?>">
						</div> -->

						<div class="p-3 radius-t-y-0 pb-4" style="border:1px solid #ddd">
							<div class="text-center mb-4">
								<img class="img-180" src="<?php echo e(asset('public/backEnd/img/student/id-card-img.jpg')); ?>" alt="">
							</div>
							<?php if(@$id_card->student_name == 1): ?>
                            <div class="single-meta">
                                <div class="d-flex align-items-center">
                                    <div style="float: left">
                                        <div class="value text-left">
                                            <?php echo app('translator')->get('student.student_name'); ?>
                                        </div>
                                    </div>
                                    <div style="clear:both"></div>
                                    <div style="float: right">
                                        <div class="name">
                                            <?php echo e(@$student->full_name); ?>

                                        </div>
                                    </div>
                                    <div style="clear:both"></div>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(@$id_card->admission_no == 1): ?>
                            <div class="single-meta">
                                <div class="d-flex align-items-center">
                                    <div style="float: left">
                                        <div class="value text-left">
                                            <?php echo app('translator')->get('student.admission_no'); ?>
                                        </div>
                                    </div>
                                    <div style="clear:both"></div>
                                    <div style="float: right">
                                        <div class="name text-left">
                                            <?php echo e(@$student->admission_no); ?>

                                        </div>
                                    </div>
                                    <div style="clear:both"></div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if(@$id_card->class == 1): ?>
                            <div class="single-meta">
                                <div class="d-flex align-items-center">
                                    <div style="float: left">
                                        <div class="value text-left">
                                            <?php echo app('translator')->get('common.class'); ?>
                                        </div>
                                    </div>
                                    <div style="clear:both"></div>
                                    <div style="float: right">
                                        <div class="name">
                                            <?php echo e(@$student->class!=""?@$student->class->class_name:""); ?> (<?php echo e(@$student->section!=""?@$student->section->section_name:""); ?>)
                                        </div>
                                    </div>
                                    <div style="clear:both"></div>
                                </div>
                            </div>
                            <?php endif; ?> 

                            <?php if(@$id_card->father_name == 1): ?>
                            <div class="single-meta">
                                <div class="d-flex align-items-center">
                                    <div style="float: left">
                                        <div class="value text-left">
                                            <?php echo app('translator')->get('student.father_name'); ?>
                                        </div>
                                    </div>
                                    <div style="clear:both"></div>
                                    <div style="float: right">
                                        <div class="name">
                                            <?php echo e(@$student->parents !=""?@$student->parents->fathers_name:""); ?>

                                        </div>
                                    </div>
                                    <div style="clear:both"></div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if(@$id_card->mother_name == 1): ?>
                            <div class="single-meta">
                                <div class="d-flex align-items-center">
                                    <div style="float: left">
                                        <div class="value text-left">
                                            <?php echo app('translator')->get('student.mother_name'); ?>
                                        </div>
                                    </div>
                                    <div style="clear:both"></div>
                                    <div style="float: right">
                                        <div class="name">
                                           <?php echo e(@$student->parents!=""?@$student->parents->mothers_name:""); ?>

                                        </div>
                                    </div>
                                    <div style="clear:both"></div>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(@$id_card->blood == 1): ?>
                            <div class="single-meta">
                                <div class="d-flex align-items-center">
                                    <div style="float: left">
                                        <div class="value text-left">
                                            <?php echo app('translator')->get('student.blood_group'); ?>
                                        </div>
                                    </div>
                                    <div style="clear:both"></div>
                                    <div style="float: right">
                                        <div class="name">
                                            <?php echo e(@$student->bloodGroup !=""?@$student->bloodGroup->base_setup_name:""); ?>

                                        </div>
                                    </div>
                                    <div style="clear:both"></div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if(@$id_card->phone == 1): ?>
                            <div class="single-meta">
                                <div class="d-flex align-items-center">
                                    <div style="float: left">
                                        <div class="value text-left">
                                            <?php echo app('translator')->get('common.phone'); ?>
                                        </div>
                                    </div>
                                    <div style="clear:both"></div>
                                    <div style="float: right">
                                        <div class="name">
                                            <?php echo e(@$student->mobile); ?>

                                        </div>
                                    </div>
                                    <div style="clear:both"></div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if(@$id_card->dob == 1): ?>
                            <div class="single-meta">
                                <div class="d-flex align-items-center">
                                    <div style="float: left">
                                        <div class="value text-left">
                                            <?php echo app('translator')->get('common.date_of_birth'); ?>
                                        </div>
                                    </div>
                                    <div style="clear:both"></div>
                                    <div style="float: right">
                                        <div class="name">
                                            <?php echo e(@$student->birth_of_birth != ""? dateConvert(@$student->birth_of_birth):''); ?>


                                          
                                        </div>
                                    </div>
                                    <div style="clear:both"></div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <div class="single-meta">
                                <div class="d-flex align-items-center">
                                    <div style="float: left">
                                        <div class="value text-left">
                                            <?php echo e(@$id_card->designation); ?>

                                        </div>
                                    </div>
                                    <div style="clear:both"></div>
                                    <div style="float: right">
                                        <img class="img-fluid" src="<?php echo e(asset($id_card->signature)); ?>">
                                    </div>
                                    <div style="clear:both"></div>
                                </div>
                            </div>

                            <div class="bottom-part text-center mt-5">
                                <img class="img-fluid w-25" src="<?php echo e(asset($id_card->logo)); ?>">
                                <p class="mb-0 mt-3"><?php echo e(@$id_card->address); ?> </p>
                            </div>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	</div>
	<script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/jquery-3.2.1.min.js"></script>
</body>
</html>

<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\admin\student_id_card_print.blade.php ENDPATH**/ ?>
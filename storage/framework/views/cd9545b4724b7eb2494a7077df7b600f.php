<?php $__env->startPush('css'); ?>
    <style>
        .star-rating {
            display: flex;
            flex-direction: row-reverse;
            font-size: 1.5em;
            justify-content: space-around;
            text-align: center;
            width: 5em;
        }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            color: #ccc;
            cursor: pointer;
        }

        .star-rating :checked~label {
            color: #f90;
        }

        article {
            background-color: #ffe;
            box-shadow: 0 0 1em 1px rgba(0, 0, 0, .25);
            color: #006;
            font-family: cursive;
            font-style: italic;
            margin: 4em;
            max-width: 30em;
            padding: 2em;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('teacherEvaluation.teacher_wise_evaluation_report'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('teacherEvaluation.teacher_wise_evaluation_report'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('teacherEvaluation.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('teacherEvaluation.teacher_evaluation'); ?></a>
                    <a href="#"><?php echo app('translator')->get('teacherEvaluation.teacher_wise_evaluation_report'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row mt-20">
                <div class="col-lg-12 student-details up_admin_visitor">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row mb-40">
                                <div class="col-lg-12">
                                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'teacher-wise-evaluation-report-search', 'method' => 'GET', 'enctype' => 'multipart/form-data'])); ?>

                                    <div class="white-box">
                                        <div class="row">
                                            <div class="col-lg-4 no-gutters">
                                                <div class="main-title">
                                                    <h3 class="mb-15"><?php echo app('translator')->get('teacherEvaluation.teacher_wise_evaluation_report'); ?> </h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 mt-30-md" id="select_teacher_div">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('teacherEvaluation.teacher'); ?>
                                                    <span
                                                        class="text-danger"> </span></label>
                                                <select class="primary_select " id="select_teacher" name="teacher_id">
                                                    <option data-display="<?php echo app('translator')->get('teacherEvaluation.select_teacher'); ?>" value="">
                                                        <?php echo app('translator')->get('teacherEvaluation.select_teacher'); ?></option>
                                                    <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($teacher->id); ?>"
                                                            <?php echo e(old('full_name') != '' ? 'selected' : ''); ?>>
                                                            <?php echo e($teacher->full_name); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <div class="pull-right loader loader_style"
                                                    id="select_teacher_loader">
                                                    <img class="loader_img_style"
                                                        src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>"
                                                        alt="loader">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mt-30-md" id="select_submitted_by_div">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('teacherEvaluation.submitted_by'); ?>
                                                    <span
                                                        class="text-danger"> </span></label>
                                                <select class="primary_select " id="select_submitted_by"
                                                    name="submitted_by">
                                                    <option data-display="<?php echo app('translator')->get('teacherEvaluation.select_submitted_by'); ?>" value="">
                                                        <?php echo app('translator')->get('teacherEvaluation.select_submitted_by'); ?></option>
                                                    <option data-display="<?php echo app('translator')->get('teacherEvaluation.parent'); ?>" value="3">
                                                        <?php echo app('translator')->get('teacherEvaluation.parent'); ?></option>
                                                    <option data-display="<?php echo app('translator')->get('teacherEvaluation.student'); ?>" value="2">
                                                        <?php echo app('translator')->get('teacherEvaluation.student'); ?></option>
                                                </select>
                                            </div>
                                            <div class="col-lg-12 mt-20 text-right">
                                                <button type="submit" class="primary-btn small fix-gr-bg">
                                                    <span class="ti-search pr-2"></span>
                                                    <?php echo app('translator')->get('teacherEvaluation.search'); ?>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php echo e(Form::close()); ?>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="white-box">
                                        <div class="mt-40">
                                            <?php echo $__env->make(
                                        'backEnd.teacherEvaluation.report._teacher_evaluation_report_common_table',
                                        [
                                            'approved_evaluation_button_enable' => false,
                                        ]
                                    , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        $(document).ready(function() {
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\teacherEvaluation\report\teacher_wise_evaluation_report.blade.php ENDPATH**/ ?>
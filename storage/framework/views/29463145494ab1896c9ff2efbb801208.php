<div class="container-fluid mt-30">
    <div class="student-details">
        <div class="student-meta-box">
            <div class="single-meta">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="homework_info">
                            <div class="col-lg-12">
                                <div class="row">

                                    <h4 class="stu-sub-head"><?php echo app('translator')->get('homework.evaluation_summary'); ?></h4>

                                </div>
                            </div>
                            <div class="single-meta">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="value text-left">
                                            <?php echo app('translator')->get('homework.homework_date'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="name">
                                            <?php if(isset($homeworkDetails)): ?>
                                                <?php echo e(@$homeworkDetails->homework_date != '' ? dateConvert(@$homeworkDetails->homework_date) : ''); ?>

                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="single-meta">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="value text-left">
                                            <?php echo app('translator')->get('homework.submission_date'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="name">
                                            <?php if(isset($homeworkDetails)): ?>
                                                <?php echo e(@$homeworkDetails->submission_date != '' ? dateConvert(@$homeworkDetails->submission_date) : ''); ?>

                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="single-meta">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="value text-left">
                                            <?php echo app('translator')->get('homework.evaluation_date'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="name">
                                            <?php if(@$homeworkDetails->evaluation_date != ''): ?>
                                                <?php echo e(@$homeworkDetails->evaluation_date != '' ? dateConvert(@$homeworkDetails->evaluation_date) : ''); ?>

                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="single-meta">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="value text-left">
                                            <?php echo app('translator')->get('homework.created_by'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="name">
                                            <?php if(isset($homeworkDetails)): ?>
                                                <?php echo e(@$homeworkDetails->users->full_name); ?>

                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="single-meta">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="value text-left">
                                            <?php echo app('translator')->get('homework.evaluated_by'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="name">
                                            <?php if(isset($homeworkDetails)): ?>
                                                <?php echo e(@$homeworkDetails->evaluatedBy->full_name); ?>

                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="single-meta">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="value text-left">
                                            <?php if(moduleStatusCheck('University')): ?>
                                                <?php echo app('translator')->get('university::un.semester_label'); ?>
                                            <?php else: ?>
                                                <?php echo app('translator')->get('common.class'); ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-5">
                                        <div class="name">
                                            <?php if(moduleStatusCheck('University')): ?>
                                                <?php echo e(@$homeworkDetails->semesterLabel->name); ?>

                                                (<?php echo e(@$homeworkDetails->unAcademic->name); ?>)
                                            <?php else: ?>
                                                <?php echo e(@$homeworkDetails->classes->class_name); ?>

                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="single-meta">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="value text-left">
                                            <?php if(moduleStatusCheck('University')): ?>
                                                <?php echo app('translator')->get('university::un.department'); ?>
                                            <?php else: ?>
                                                <?php echo app('translator')->get('common.section'); ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="name">
                                            <?php if(moduleStatusCheck('University')): ?>
                                                <?php echo e(@$homeworkDetails->unDepartment->name); ?>

                                            <?php else: ?>
                                                <?php echo e(@$homeworkDetails->sections->section_name); ?>

                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="single-meta">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="value text-left">
                                            <?php echo app('translator')->get('common.subject'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="name">
                                            <?php if(isset($homeworkDetails)): ?>
                                                <?php echo e(@$homeworkDetails->subjects->subject_name); ?>

                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="single-meta">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="value text-left">
                                            <?php echo app('translator')->get('exam.marks'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="name">
                                            <?php echo e(@$homeworkDetails->marks); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-meta">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="value text-left">
                                            <?php echo app('translator')->get('homework.obtained_marks'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="name">
                                            <?php echo e(@$student_result != '' ? @$student_result->marks : ''); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="single-meta">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="value text-left">
                                            <?php echo app('translator')->get('common.attach_file'); ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-5">
                                        <div class="name">
                                            <?php
                                                $files_ext = pathinfo($homeworkDetails->file, PATHINFO_EXTENSION);
                                            ?>
                                            <?php if(@$homeworkDetails->file != ''): ?>
                                                <?php if(
                                                    $files_ext == 'jpg' ||
                                                        $files_ext == 'jpeg' ||
                                                        $files_ext == 'heic' ||
                                                        $files_ext == 'png' ||
                                                        $files_ext == 'mp4' ||
                                                        $files_ext == 'mp3' ||
                                                        $files_ext == 'mov' ||
                                                        $files_ext == 'pdf'): ?>
                                                    <a class="dropdown-item viewSubmitedHomework" id="show_files"
                                                        href="#"> <span class="pl ti-download"></span></a>
                                                <?php else: ?>
                                                    <a href="<?php echo e(url($homeworkDetails->file)); ?>" download>
                                                        <?php echo app('translator')->get('common.download'); ?> <span class="pl ti-download"></span>
                                                    </a>
                                                <?php endif; ?>

                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="single-meta">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="value text-left">
                                            <?php echo app('translator')->get('common.description'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="name">
                                            <?php if(isset($homeworkDetails)): ?>
                                                <?php echo e(@$homeworkDetails->description); ?>

                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="file-preview" style="display: none">
                            <?php
                                $std_file = $homeworkDetails->file;
                                $ext = strtolower(str_replace('"]', '', pathinfo($std_file, PATHINFO_EXTENSION)));
                                $attached_file = str_replace('"]', '', $std_file);
                                $attached_file = str_replace('["', '', $attached_file);
                                $preview_files = ['jpg', 'jpeg', 'png', 'heic', 'mp4', 'mov', 'mp3', 'mp4', 'pdf'];
                                
                            ?>

                            <?php if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'heic'): ?>
                                <img class="img-responsive mt-20" style="width: 100%; height:auto"
                                    src="<?php echo e(asset($attached_file)); ?>">
                            <?php elseif($ext == 'mp4' || $ext == 'mov'): ?>
                                <video class="mt-20 video_play" width="100%" controls>
                                    <source src="<?php echo e(asset($attached_file)); ?>" type="video/mp4">
                                    <source src="mov_bbb.ogg" type="video/ogg">
                                    Your browser does not support HTML video.
                                </video>
                            <?php elseif($ext == 'mp3'): ?>
                                <audio class="mt-20 audio_play" controls style="width: 100%">
                                    <source src="<?php echo e(asset($attached_file)); ?>" type="audio/ogg">
                                    <source src="horse.mp3" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                            <?php elseif($ext == 'pdf'): ?>
                                <object data='<?php echo e(asset($attached_file)); ?>' type="application/pdf" width="100%"
                                    height="800">

                                    <iframe src='<?php echo e(asset($attached_file)); ?>' width="100%"height="800">
                                        <p>This browser does not support PDF!</p>
                                    </iframe>

                                </object>
                            <?php endif; ?>
                            <?php if(!in_array($ext, $preview_files)): ?>
                                <div class="alert alert-warning">
                                    <?php echo e($ext); ?> File Not Previewable</a>.
                                </div>
                            <?php endif; ?>
                            <div class="mt-40 d-flex justify-content-between">
                                <?php
                                    $set_filename = time() . '_' . $std_file;
                                ?>
                                <a class="primary-btn tr-bg" download="<?php echo e($set_filename); ?>"
                                    href="<?php echo e(asset($attached_file)); ?>"> <span class="pl ti-download">
                                        <?php echo app('translator')->get('common.download'); ?></span></a>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $('#evaluation_date_icon').on('click', function() {
        $('#evaluation_date').focus();
    });
    $('#show_files').on('click', function() {
        $('.file-preview').show();
        $('.homework_info').hide();
    });

    $('.primary_input_field.date').datepicker({
        autoclose: true
    });

    $('.primary_input_field.date').on('changeDate', function(ev) {
        $(this).focus();
    });
</script>
<?php $__env->startPush('script'); ?>
    <script type="text/javascript">
        jQuery('.admin_view_modal').on('hidden.bs.modal', function(e) {
            $('.video_play').get(0).play();
            $('.video_play').trigger('pause');

            $('.audio_play').get(0).play();
            $('.audio_play').trigger('pause');
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\homework\homeworkView.blade.php ENDPATH**/ ?>
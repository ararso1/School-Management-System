<div class="container-fluid mt-30">
    <div class="student-details">
        <div class="student-meta-box">
            <div class="single-meta">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                       <div class="col-lg-12">
                           <div class="row">

                            <h4 class="stu-sub-head"><?php echo app('translator')->get('homework.home_work_summary'); ?></h4>

                        </div>
                    </div> 

                    <div class="single-meta">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="value text-left">
                                    <?php echo app('translator')->get('homework.home_work_date'); ?>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="name">
                                    <?php if(isset($homeworkDetails)): ?>
                                    <?php echo e($homeworkDetails->homework_date != ""? dateConvert($homeworkDetails->homework_date):''); ?>

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
                                   <?php echo e($homeworkDetails->submission_date != ""? dateConvert($homeworkDetails->submission_date):''); ?>

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
                                    <?php if($homeworkDetails->evaluation_date != ""): ?>
                                    <?php echo e($homeworkDetails->evaluation_date != ""? dateConvert($homeworkDetails->evaluation_date):''); ?>

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
                                   <?php echo e($homeworkDetails->users->full_name); ?>

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
                                <?php echo e($homeworkDetails->users->full_name); ?>

                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-meta">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="value text-left">
                                <?php echo app('translator')->get('common.class'); ?>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="name">
                               <?php if(isset($homeworkDetails)): ?>
                               <?php echo e($homeworkDetails->classes->class_name); ?>

                               <?php endif; ?>
                           </div>
                       </div>
                   </div>
               </div>

               <div class="single-meta">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="value text-left">
                            <?php echo app('translator')->get('common.section'); ?>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="name">
                            <?php if(isset($homeworkDetails)): ?>
                            <?php echo e($homeworkDetails->sections->section_name); ?>

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
                            <?php echo e($homeworkDetails->subjects->subject_name); ?>

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
                            
                            <?php echo e($homeworkDetails->marks); ?>

                           
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
                                <?php if($homeworkDetails->file != ""): ?>
                                <a href="<?php echo e(url('/')); ?>/<?php echo e($homeworkDetails->file); ?>" download="">
                                       <?php echo app('translator')->get('common.download'); ?> <span class="pl ti-download"></span>
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
                            <?php echo e($homeworkDetails->description); ?>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
    $('.school-table-data').DataTable({
        bLengthChange: false,
        language: {
            search: "<i class='ti-search'></i>",
            searchPlaceholder: 'Quick Search',
            paginate: {
                next: "<i class='ti-arrow-right'></i>",
                previous: "<i class='ti-arrow-left'></i>"
            }
        },
        buttons: [ ],
        columnDefs: [
        {
            visible: false
        }
        ],
        responsive: true
    });

    // for evaluation date

    $('#evaluation_date_icon').on('click', function() {
        $('#evaluation_date').focus();
    });

    $('.primary_input_field.date').datepicker({
        autoclose: true
    });

    $('.primary_input_field.date').on('changeDate', function(ev) {
        $(this).focus();
    });
</script>
<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\parentPanel\homeworkView.blade.php ENDPATH**/ ?>
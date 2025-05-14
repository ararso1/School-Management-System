<script src="<?php echo e(asset('public/backEnd/')); ?>/js/main.js"></script>

<div class="container-fluid mt-30">
    <div class="student-details">
        <div class="student-meta-box">
            <div class="single-meta">
                <div class="row">
                    <div class="col-lg-4 no-gutters">
                        <div class="main-title">
                            <h3 class="mb-0"><?php echo app('translator')->get('common.class'); ?>: <?php echo e($class->class_name); ?> (<?php echo e($section->section_name); ?>)</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <table id="" class="school-table-data school-table shadow-none" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('common.subjects'); ?></th>
                                    <th><?php echo app('translator')->get('common.date'); ?></th>
                                    <th><?php echo app('translator')->get('exam.start_time'); ?></th>
                                    <th><?php echo app('translator')->get('exam.end_time'); ?></th>
                                    <th><?php echo app('translator')->get('exam.full_marks'); ?></th>
                                    <th><?php echo app('translator')->get('exam.passing_marks'); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $assign_subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assign_subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($assign_subject->subject !=""?$assign_subject->subject->subject_name:""); ?></td>
                                    <td>
                                       
                                        <?php echo e($assign_subject->date != ""? dateConvert($assign_subject->date):''); ?>



                                    </td>
                                    <td><?php echo e($assign_subject->start_time); ?></td>
                                    <td><?php echo e($assign_subject->end_time); ?></td>
                                    <td><?php echo e($assign_subject->full_mark); ?></td>
                                    <td><?php echo e($assign_subject->pass_mark); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                        <div class="col-lg-12 mt-30">
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="primary-btn fix-gr-bg pull-right" data-dismiss="modal">
                                        <span class="ti-check"></span>
                                        <?php echo app('translator')->get('common.cancel'); ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script type="text/javascript">

   $('#table_id, .school-table-data').DataTable({
        bLengthChange: false,
        language: {
            search: "<i class='ti-search'></i>",
            searchPlaceholder: 'Quick Search',
            paginate: {
                next: "<i class='ti-arrow-right'></i>",
                previous: "<i class='ti-arrow-left'></i>"
            }
        },
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                text: '<i class="fa fa-files-o"></i>',
                titleAttr: 'Copy'
            },
            {
                extend: 'excelHtml5',
                text: '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'Excel'
            },
            {
                extend: 'csvHtml5',
                text: '<i class="fa fa-file-text-o"></i>',
                titleAttr: 'CSV'
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="fa fa-file-pdf-o"></i>',
                titleAttr: 'PDF'
            },
            {
                extend: 'print',
                text: '<i class="fa fa-print"></i>',
                titleAttr: 'Print'
            },
            {
                extend: 'colvis',
                text: '<i class="fa fa-columns"></i>',
                postfixButtons: [ 'colvisRestore' ]
            }
        ],
        columnDefs: [
            {
                visible: false
            }
        ],
        responsive: true,
        bDestroy: true
    });

</script>
<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\examination\view_exam_schedule_modal.blade.php ENDPATH**/ ?>
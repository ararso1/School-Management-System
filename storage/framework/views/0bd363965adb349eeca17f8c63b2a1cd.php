

<div class="container-fluid">
    <div class="student-details">
        <div class="student-meta-box">
            <div class="single-meta">
                <div class="row">
            <div class="col-lg-12">
                <div class="student-meta-box">
                    
                        <div class="row">
                            <div class="col-lg-5 col-md-6">
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                <?php echo app('translator')->get('admin.complaint_by'); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                <?php echo e(@$complaint->complaint_by); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                <?php echo app('translator')->get('admin.source'); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                <?php echo e(@$complaint->complaint_source != ""? @$complaint->complaintSource->name:''); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                <?php echo app('translator')->get('common.phone'); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                <?php echo e(@$complaint->phone); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                <?php echo app('translator')->get('common.description'); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                <?php echo e(@$complaint->description); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="offset-lg-2 col-lg-5 col-md-6">
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                <?php echo app('translator')->get('admin.assigned'); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                <?php echo e(@$complaint->assigned); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                <?php echo app('translator')->get('admin.complaint_type'); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                <?php echo e(@$complaint->complaint_type != ""? @$complaint->complaintType->name:''); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                <?php echo app('translator')->get('common.date'); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                <?php echo e(@$complaint->date != ""? dateConvert(@$complaint->date):''); ?>


                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                <?php echo app('translator')->get('admin.actions_taken'); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                <?php echo e(@$complaint->action_taken); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if(!empty($complaint->file)): ?>
                                <div class="col-lg-5 col-md-6">
                                    <div class="single-meta">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="value text-left">
                                                    <?php echo app('translator')->get('common.file'); ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="name">
                                                    <a href="<?php echo e($complaint->file ? asset($complaint->file) : ''); ?>" download><?php echo app('translator')->get('common.download'); ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
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
<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\admin\complaintDetails.blade.php ENDPATH**/ ?>
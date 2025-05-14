<?php $__env->startSection('title'); ?> 
<?php echo app('translator')->get('common.student_list'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20 up_breadcrumb">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('student.manage_student'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('student.student_information'); ?></a>
                <a href="#"><?php echo app('translator')->get('common.student_list'); ?></a>
            </div>
        </div>
    </div>
</section>



    <div class="modal fade admin-query" id="deleteStudentModal" >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('student.disable_student'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    
                    <div class="text-center">
                        <h4><?php echo app('translator')->get('student.are_you_sure_to_disable'); ?></h4>
                    </div>

                    <div class="mt-40 d-flex justify-content-between">
                        <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                        <?php echo e(Form::open(['route' => 'student-delete', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                    <input type="hidden" name="id" value="<?php echo e(@$student->id); ?>" id="student_delete_i">  
                            <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('common.disable'); ?></button>
                        <?php echo e(Form::close()); ?>

                    </div>

                </div>

            </div>
        </div>
    </div> 

    <table id="table_id" class="table" cellspacing="0" width="100%">
        
            <thead>
                <tr>
                    <th><?php echo app('translator')->get('student.admission_no'); ?></th>
                    <th><?php echo app('translator')->get('student.name'); ?></th>
                    <?php if(generalSetting()->multiple_roll==0): ?>
                    <th><?php echo app('translator')->get('student.id_number'); ?></th>
                    <?php else: ?>
                    <?php if(!moduleStatusCheck('University')): ?>
                     <th><?php echo app('translator')->get('student.father_name'); ?></th>
                     <?php endif; ?>
                    <?php endif; ?>
                    <th><?php echo app('translator')->get('student.date_of_birth'); ?></th>
                    <?php if(moduleStatusCheck('University')): ?>
                    <th><?php echo app('translator')->get('student.fac_dept'); ?></th>
                    <?php else: ?>
                    <th><?php echo app('translator')->get('student.class_sec'); ?></th>
                    <?php endif; ?>
                    <th><?php echo app('translator')->get('common.gender'); ?></th>
                    <th><?php echo app('translator')->get('common.type'); ?></th>
                    <th><?php echo app('translator')->get('common.phone'); ?></th>
                    <th><?php echo app('translator')->get('common.actions'); ?></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <?php $__env->stopSection(); ?>
        
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

 <?php $__env->startSection('script'); ?>  
 <?php echo $__env->make('backEnd.partials.server_side_datatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>
//
// DataTables initialisation
//
$(document).ready(function() {
    $('.data-table').DataTable({
                  processing: true,
                  serverSide: true,
                  "ajax": $.fn.dataTable.pipeline( {
                        url: "<?php echo e(route('student_list_datatable')); ?>",
                        pages: 2 // number of pages to cache
                        
                    } ),
                    columns: [
                            {data: 'admission_no', name: 'admission_no'},
                            {data: 'full_name', name: 'full_name'},
                            <?php if(generalSetting()->multiple_roll==0): ?>
                            {data: 'roll_no', name: 'roll_no'},
                            <?php else: ?>
                                <?php if(!moduleStatusCheck('University')): ?>
                                {data: 'parents.fathers_name', name: 'parents.fathers_name'},
                                <?php endif; ?>
                            <?php endif; ?>

                            {data: 'dob', name: 'dob'},
                            <?php if(moduleStatusCheck('University')): ?>
                            {data: 'fac_dept', name: 'fac_dept'},
                            <?php else: ?>
                            {data: 'class_sec', name: 'class_sec'},
                            <?php endif; ?>
                            {data: 'gender.base_setup_name', name: 'gender.base_setup_name'},
                            {data: 'category.category_name', name: 'category.category_name'},
                            {data: 'mobile', name: 'sm_students.mobile', orderable: false, searchable: false},
                            {data: 'action', name: 'action', orderable: false, searchable: false},
                            {data: 'first_name', name: 'first_name', hideable: true, searchable: false},
                        ],
                    bLengthChange: false,
                    bDestroy: true,
                    language: {
                    search: "<i class='ti-search'></i>",
                    searchPlaceholder: "Quick Search",
                    paginate: {
                        next: "<i class='ti-arrow-right'></i>",
                        previous: "<i class='ti-arrow-left'></i>",
                    },
                    },
                    dom: "Bfrtip",
                    buttons: [{
                        extend: "copyHtml5",
                        text: '<i class="fa fa-files-o"></i>',
                        title: $("#logo_title").val(),
                        titleAttr: "Copy",
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        },
                    },
                    {
                        extend: "excelHtml5",
                        text: '<i class="fa fa-file-excel-o"></i>',
                        titleAttr: "Excel",
                        title: $("#logo_title").val(),
                        margin: [10, 10, 10, 0],
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        },
                    },
                    {
                        extend: "csvHtml5",
                        text: '<i class="fa fa-file-text-o"></i>',
                        titleAttr: "CSV",
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        },
                    },
                    {
                        extend: "pdfHtml5",
                        text: '<i class="fa fa-file-pdf-o"></i>',
                        title: $("#logo_title").val(),
                        titleAttr: "PDF",
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        },
                        orientation: "landscape",
                        pageSize: "A4",
                        margin: [0, 0, 0, 12],
                        alignment: "center",
                        header: true,
                        customize: function(doc) {
                            doc.content[1].margin = [100, 0, 100, 0]; //left, top, right, bottom
                            doc.content.splice(1, 0, {
                                margin: [0, 0, 0, 12],
                                alignment: "center",
                                image: "data:image/png;base64," + $("#logo_img").val(),
                            });
                            doc.defaultStyle = {
                                font: 'DejaVuSans'
                            }
                        },
                    },
                    {
                        extend: "print",
                        text: '<i class="fa fa-print"></i>',
                        titleAttr: "Print",
                        title: $("#logo_title").val(),
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        },
                    },
                    {
                        extend: "colvis",
                        text: '<i class="fa fa-columns"></i>',
                        postfixButtons: ["colvisRestore"],
                    },
                ],
                columnDefs: [{
                    visible: false,
                }, ],
                responsive: true,
              });
} );
        </script>
    


<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\studentInformation\students.blade.php ENDPATH**/ ?>
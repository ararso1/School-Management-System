<?php $__env->startPush('css'); ?>
    <style>
        .white-box.modal-white-box {
            padding: 20px 10px !important;
        }

        button.primary-btn.small.fix-gr-bg.assignViewSave {
            margin-top: 15%;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('behaviourRecords.assign_incident'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('behaviourRecords.assign_incident'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('behaviourRecords.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('behaviourRecords.behaviour_records'); ?></a>
                    <a href="#"><?php echo app('translator')->get('behaviourRecords.assign_incident'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'behaviour_records.assign_incident_search', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'infix_form'])); ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box filter_card">
                        <div class="row">
                            <div class="col-lg-8 col-md-6">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php echo app('translator')->get('behaviourRecords.select_criteria'); ?> </h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            <?php if(moduleStatusCheck('University')): ?>
                                <?php if ($__env->exists(
                                    'university::common.session_faculty_depart_academic_semester_level',
                                    ['mt' => 'mt-30', 'hide' => ['USUB'], 'required' => ['USEC']]
                                )) echo $__env->make(
                                    'university::common.session_faculty_depart_academic_semester_level',
                                    ['mt' => 'mt-30', 'hide' => ['USUB'], 'required' => ['USEC']]
                                , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <div class="col-lg-4 mt-25">
                                    <div class="primary_input ">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('student.search_by_name'); ?></label>
                                        <input class="primary_input_field" type="text" placeholder="Name" name="name"
                                            value="<?php echo e(isset($name) ? $name : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-lg-4 mt-25">
                                    <div class="primary_input md_mb_20">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('student.search_by_roll_no'); ?></label>
                                        <input class="primary_input_field" type="text" placeholder="Roll" name="roll_no"
                                            value="<?php echo e(isset($roll_no) ? $roll_no : ''); ?>">
                                    </div>
                                </div>
                            <?php else: ?>
                                <?php echo $__env->make('backEnd.common.search_criteria', [
                                    'mt' => 'mt-0',
                                    'div' => 'col-lg-4',
                                    'required' => ['academic'],
                                    'visiable' => ['academic', 'class', 'section'],
                                    'selected' => ['section_id' => $data['section_id'], 'class_id' => $data['class_id'], 'academic_year' => $data['academic_year']],
                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <div class="col-lg-4 mt-0">
                                    <div class="primary_input sm_mb_20 ">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('student.search_by_name'); ?></label>
                                        <input class="primary_input_field" type="text" placeholder="Name" name="name"
                                            value="<?php echo e(isset($name) ? $name : old('name')); ?>">
                                    </div>
                                </div>
                                <div class="col-lg-4 mt-0">
                                    <div class="primary_input sm_mb_20 ">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('student.search_by_roll'); ?></label>
                                        <input class="primary_input_field" type="text" placeholder="Roll" name="roll_no"
                                            value="<?php echo e(isset($roll_no) ? $roll_no : old('roll_no')); ?>">
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="col-lg-12 mt-20 text-right">
                                <button type="submit" class="primary-btn small fix-gr-bg" id="btnsubmit">
                                    <span class="ti-search pr-2"></span>
                                    <?php echo app('translator')->get('common.search'); ?>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" id="academic_id" value="<?php echo e(@$academic_year); ?>">
            <input type="hidden" id="class" value="<?php echo e(@$class_id); ?>">
            <input type="hidden" id="section" value="<?php echo e(@$section); ?>">
            <input type="hidden" id="roll" value="<?php echo e(@$roll_no); ?>">
            <input type="hidden" id="name" value="<?php echo e(@$name); ?>">
            <input type="hidden" id="un_session" value="<?php echo e(@$data['un_session_id']); ?>">
            <input type="hidden" id="un_academic" value="<?php echo e(@$data['un_academic_id']); ?>">
            <input type="hidden" id="un_faculty" value="<?php echo e(@$data['un_faculty_id']); ?>">
            <input type="hidden" id="un_department" value="<?php echo e(@$data['un_department_id']); ?>">
            <input type="hidden" id="un_semester_label" value="<?php echo e(@$data['un_semester_label_id']); ?>">
            <input type="hidden" id="un_section" value="<?php echo e(@$data['un_section_id']); ?>">
            <?php echo e(Form::close()); ?>

            <div class="row mt-40">
                <div class="col-lg-12">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-lg-4 no-gutters">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php echo app('translator')->get('behaviourRecords.assign_incident_list'); ?> </h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <?php if (isset($component)) { $__componentOriginal163c8ba6efb795223894d5ffef5034f5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal163c8ba6efb795223894d5ffef5034f5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <table id="table_id" class="table data-table" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th><?php echo app('translator')->get('behaviourRecords.admission_no'); ?></th>
                                                <th><?php echo app('translator')->get('behaviourRecords.student_name'); ?></th>
                                                <th><?php echo app('translator')->get('behaviourRecords.class'); ?></th>
                                                <th><?php echo app('translator')->get('behaviourRecords.gender'); ?></th>
                                                <th><?php echo app('translator')->get('behaviourRecords.phone'); ?></th>
                                                <th><?php echo app('translator')->get('behaviourRecords.total_points'); ?></th>
                                                <th><?php echo app('translator')->get('behaviourRecords.total_incidents'); ?></th>
                                                <th><?php echo app('translator')->get('behaviourRecords.actions'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $attributes = $__attributesOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $component = $__componentOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__componentOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade admin-query" id="assignViewIncident">
        <div class="modal-dialog modal-dialog-centered large-modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('behaviourRecords.assign_view_incident'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12 mb-20">
                        <div class="row">
                            <div class="col-lg-4 no-gutters">
                                <div class="main-title">
                                    <h3 class="mb-0"><?php echo app('translator')->get('behaviourRecords.select_incident'); ?> </h3>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-40">
                            <div class="col-lg-9" id="selectIncidentsDiv" style="margin-top: -25px;">
                                <label for="checkbox" class="mb-20 mt-20 primary_input_label"><?php echo app('translator')->get('behaviourRecords.incidents'); ?></label>
                                <select multiple="multiple" id="selectIncidents" name="incident_ids[]"
                                    class="multypol_check_select active position-relative">
                                    <?php $__currentLoopData = $incidents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $incident): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option data-point="<?php echo e($incident->point); ?>" value="<?php echo e($incident->id); ?>">
                                            <?php echo e($incident->title); ?>(<?php echo e($incident->point); ?>)</option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-lg-3 text-right">
                                <input type="hidden" name="assign_view_incident" id="assign_view_incident_id">
                                <input type="hidden" name="record_id" id="record_id">
                                <button class="primary-btn small fix-gr-bg assignViewSave"
                                    type="button"><?php echo app('translator')->get('common.assign'); ?></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-4 no-gutters">
                                <div class="main-title">
                                    <h3 class="mb-0"><?php echo app('translator')->get('behaviourRecords.assign_incident_list'); ?> </h3>
                                </div>
                            </div>
                        </div>
                        <div class="row white-box modal-white-box mt-20">
                            <div class="col-lg-12" id="assign_incident_list">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.server_side_datatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.multi_select_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        function assignViewIncident(id) {
            var modal = $('#assignViewIncident');
            var record_id = $('.record' + id).data('record');
            modal.find('input[name=assign_view_incident]').val(id);
            modal.find('input[name=record_id]').val(record_id);
            modal.modal('show');
            getAssignIncident(id);
        }

        function getAssignIncident(studentId) {
            $.ajax({
                type: "POST",
                data: {
                    studentId: studentId
                },
                url: "<?php echo e(route('behaviour_records.get_student_incident')); ?>",
                dataType: "html",
                success: function(response) {
                    $('#assign_incident_list').html(response);
                },
                error: function(error) {
                    toastr.error(error.message, 'Error');
                }
            });
        }
        $(document).ready(function() {
            $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                "ajax": $.fn.dataTable.pipeline({
                    url: "<?php echo e(url('behaviour_records/assign_incident_datatable')); ?>",
                    data: {
                        academic_year: $('#academic_id').val(),
                        class: $('#class').val(),
                        section: $('#section').val(),
                        roll_no: $('#roll').val(),
                        name: $('#name').val(),
                        un_session_id: $('#un_session').val(),
                        un_academic_id: $('#un_academic').val(),
                        un_faculty_id: $('#un_faculty').val(),
                        un_department_id: $('#un_department').val(),
                        un_semester_label_id: $('#un_semester_label').val(),
                        un_section_id: $('#un_section').val(),
                    },
                    pages: "<?php echo e(generalSetting()->ss_page_load); ?>" // number of pages to cache
                }),
                columns: [{
                        data: 'admission_no',
                        name: 'admission_no'
                    },
                    {
                        data: 'full_name',
                        name: 'sm_students.full_name'
                    },
                    {
                        data: 'class_sec',
                        name: 'class_sec'
                    },
                    {
                        data: 'gender.base_setup_name',
                        name: 'gender.base_setup_name'
                    },
                    {
                        data: 'mobile',
                        name: 'sm_students.mobile'
                    },
                    {
                        data: 'incidents_sum_point',
                        name: 'incidents_sum_point',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'incidents_count',
                        name: 'incidents_count',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
                bLengthChange: false,
                bDestroy: true,
                language: {
                    search: "<i class='ti-search'></i>",
                    searchPlaceholder: window.jsLang('quick_search'),
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
                        titleAttr: window.jsLang('copy_table'),
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        },
                    },
                    {
                        extend: "excelHtml5",
                        text: '<i class="fa fa-file-excel-o"></i>',
                        titleAttr: window.jsLang('export_to_excel'),
                        title: $("#logo_title").val(),
                        margin: [10, 10, 10, 0],
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        },
                    },
                    {
                        extend: "csvHtml5",
                        text: '<i class="fa fa-file-text-o"></i>',
                        titleAttr: window.jsLang('export_to_csv'),
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        },
                    },
                    {
                        extend: "pdfHtml5",
                        text: '<i class="fa fa-file-pdf-o"></i>',
                        title: $("#logo_title").val(),
                        titleAttr: window.jsLang('export_to_pdf'),
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
                        titleAttr: window.jsLang('print'),
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
        });
        $(document).on('click', '.assignViewSave', function(e) {
            let student_id = $('#assign_view_incident_id').val();
            var incident_id = $('#selectIncidents').val();
            var record_id = $('#record_id').val();
            let data = {
                incident_ids: incident_id,
                student_id: student_id,
                record_id: record_id,
            }
            $.ajax({
                type: "POST",
                data: data,
                url: "<?php echo e(route('behaviour_records.assign_incident_save')); ?>",
                dataType: "json",
                success: function(response) {
                    if ($('#selectIncidents').val() == '') {
                        toastr.error('Empty Submission', 'Error');
                    } else {
                        $('#selectIncidents').multiselect('reset');
                        toastr.success('Operation Successful', 'Success');
                        getAssignIncident(student_id);
                    }
                },
                error: function(error) {
                    toastr.error('Operation Failed', 'Error');
                }
            });
        })

        function assignViewDelete(id) {
            var assign_incident_id = id;
            let student_id = $('#assign_view_incident_id').val();
            var deleteIncidentUrlTemplate = "<?php echo e(route('behaviour_records.assign_incident_delete', ['id' => ':id'])); ?>";
            let url = deleteIncidentUrlTemplate.replace(':id', assign_incident_id);
            $.ajax({
                type: "DELETE",
                data: assign_incident_id,
                url: url ,
                dataType: "json",
                success: function(response) {
                    toastr.success(response.message, 'Success');
                    getAssignIncident(student_id);
                },
                error: function(error) {
                    toastr.error(error.message, 'Error');
                }
            });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Modules/BehaviourRecords\Resources/views/assignIncident/assignIncident.blade.php ENDPATH**/ ?>
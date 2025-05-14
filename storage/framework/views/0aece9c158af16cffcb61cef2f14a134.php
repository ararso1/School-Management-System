<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('homework.homework_list'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <?php
        $DATE_FORMAT = systemDateFormat();
    ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('homework.homework_list'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('homework.home_work'); ?></a>
                    <a href="#"><?php echo app('translator')->get('homework.homework_list'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-lg-8 col-md-6">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php echo app('translator')->get('common.select_criteria'); ?> </h3>
                                </div>
                            </div>
                            <div class="col-lg-4 text-md-right text-left col-md-6 mb-30-lg">
                                <a href="<?php echo e(route('add-homeworks')); ?>" class="primary-btn small fix-gr-bg">
                                    <span class="ti-plus pr-2"></span>
                                    <?php echo app('translator')->get('homework.add_homework'); ?>
                                </a>
                            </div>
                        </div>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'homework-list-search', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                        <?php if(moduleStatusCheck('University')): ?>
                            <div class="row">
                                <?php if ($__env->exists(
                                    'university::common.session_faculty_depart_academic_semester_level',
                                    ['subject' => true]
                                )) echo $__env->make(
                                    'university::common.session_faculty_depart_academic_semester_level',
                                    ['subject' => true]
                                , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        <?php else: ?>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="primary_input">
                                        <label class="primary_input_label" for="">
                                            <?php echo e(__('common.class')); ?>

                                            <span class="text-danger"> *</span>
                                        </label>
                                        <select
                                            class="primary_select  form-control<?php echo e($errors->has('class_id') ? ' is-invalid' : ''); ?>"
                                            name="class_id" id="class_subject">
                                            <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value=""><?php echo app('translator')->get('common.select'); ?>
                                            </option>
                                            <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($value->id); ?>"
                                                    <?php if(isset($class) && $class == $value->id): ?> selected <?php endif; ?>>
                                                    <?php echo e($value->class_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>

                                        <?php if($errors->has('class_id')): ?>
                                            <span class="text-danger invalid-select" role="alert">
                                                <?php echo e($errors->first('class_id')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="primary_input" id="select_class_subject_div">
                                        <label class="primary_input_label" for="">
                                            <?php echo e(__('common.subject')); ?>

                                            <span class="text-danger"> </span>
                                        </label>
                                        <select
                                            class="primary_select  form-control<?php echo e($errors->has('subject_id') ? ' is-invalid' : ''); ?> select_class_subject"
                                            name="subject_id" id="select_class_subject">
                                            <option data-display="<?php echo app('translator')->get('common.select_subjects'); ?>" value=""><?php echo app('translator')->get('common.subject'); ?>
                                            </option>
                                        </select>
                                        <div class="pull-right loader loader_style" id="select_subject_loader">
                                            <img class="loader_img_style"
                                                src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                        </div>


                                        <?php if($errors->has('subject_id')): ?>
                                            <span class="text-danger invalid-select" role="alert">
                                                <?php echo e($errors->first('subject_id')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="primary_input" id="m_select_subject_section_div">
                                        <label class="primary_input_label" for="">
                                            <?php echo e(__('common.section')); ?>

                                            <span class="text-danger"> </span>
                                        </label>
                                        <select
                                            class="primary_select  form-control<?php echo e($errors->has('section_id') ? ' is-invalid' : ''); ?> m_select_subject_section"
                                            name="section_id" id="m_select_subject_section">
                                            <option data-display="<?php echo app('translator')->get('common.select_section'); ?>" value=""><?php echo app('translator')->get('common.section'); ?>
                                            </option>
                                            <?php if(isset($subjectSections)): ?>
                                                <?php $__currentLoopData = $subjectSections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subjectSection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($subjectSection->id); ?>"
                                                        <?php echo e(isset($search_info['section_id']) ? ($search_info['section_id'] == $subjectSection->id ? 'selected' : '') : ''); ?>>
                                                        <?php echo e($subjectSection->section_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                        <div class="pull-right loader loader_style" id="select_section_loader">
                                            <img class="loader_img_style"
                                                src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                        </div>

                                        <?php if($errors->has('section_id')): ?>
                                            <span class="text-danger invalid-select" role="alert">
                                                <?php echo e($errors->first('section_id')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>


                            </div>
                        <?php endif; ?>

                        <input type="hidden" name="class" id="class" value="<?php echo e(@$class); ?>">
                        <input type="hidden" name="subject" id="subject" value="<?php echo e(@$subject); ?>">
                        <input type="hidden" name="section" id="section" value="<?php echo e(@$section); ?>">

                        <div class="row">
                            <div class="col-lg-12 mt-20 text-right">
                                <button type="submit" class="primary-btn small fix-gr-bg">
                                    <span class="ti-search pr-2"></span>
                                    <?php echo app('translator')->get('common.search'); ?>
                                </button>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>

            <div class="row mt-40">
                <div class="col-lg-12">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-lg-4 no-gutters">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php echo app('translator')->get('homework.homework_list'); ?></h3>
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
                                                <th>Si</th>
                                                <?php if(moduleStatusCheck('University')): ?>
                                                    <th><?php echo app('translator')->get('university::un.semester_label'); ?></th>
                                                    <th><?php echo app('translator')->get('university::un.department'); ?></th>
                                                <?php else: ?>
                                                    <th><?php echo app('translator')->get('common.class'); ?></th>
                                                    <th><?php echo app('translator')->get('common.section'); ?></th>
                                                <?php endif; ?>
    
                                                <th><?php echo app('translator')->get('homework.subject'); ?></th>
                                                <th><?php echo app('translator')->get('homework.marks'); ?></th>
                                                <th><?php echo app('translator')->get('homework.home_work_date'); ?></th>
                                                <th><?php echo app('translator')->get('homework.submission_date'); ?></th>
                                                <th><?php echo app('translator')->get('homework.evaluation_date'); ?></th>
                                                <th><?php echo app('translator')->get('homework.created_by'); ?></th>
                                                <th><?php echo app('translator')->get('common.action'); ?></th>
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

    
    <div class="modal fade admin-query" id="deleteHomeWorkModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('common.delete'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <?php echo e(Form::open(['route' => 'homework-delete', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                <div class="modal-body">
                    <input type="hidden" name="id" value="">
                    <div class="text-center">
                        <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                    </div>
                    <div class="mt-40 d-flex justify-content-between">
                        <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>

                        <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('common.delete'); ?></button>
                    </div>
                </div>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.server_side_datatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        $(document).ready(function() {
            $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                "ajax": $.fn.dataTable.pipeline({
                    url: "<?php echo e(route('homework-list-ajax')); ?>",
                    data: {
                        class: $("#class").val(),
                        subject: $("#subject").val(),
                        section: $("#section").val(),
                    },
                    pages: "<?php echo e(generalSetting()->ss_page_load); ?>" // number of pages to cache

                }),
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'id'
                    },
                    <?php if(moduleStatusCheck('University')): ?>
                        {
                            data: 'un_session.name',
                            name: 'sections.name'
                        }, {
                            data: 'un_semester.name',
                            name: 'un_semester.name'
                        },
                    <?php else: ?>
                        {
                            data: 'classes.class_name',
                            name: 'classes.class_name'
                        }, {
                            data: 'sections.section_name',
                            name: 'sections.section_name'
                        },
                    <?php endif; ?> {
                        data: 'subjects.subject_name',
                        name: 'subjects.subject_name'
                    },
                    {
                        data: 'marks',
                        name: 'marks'
                    },
                    {
                        data: 'homework_date',
                        name: 'homework_date'
                    },
                    {
                        data: 'submission_date',
                        name: 'submission_date'
                    },
                    {
                        data: 'evaluation_date',
                        name: 'evaluation_date'
                    },
                    {
                        data: 'users.full_name',
                        name: 'users.full_name'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: true
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
    </script>
    <script>
        function deleteHomeWork(id) {
            var modal = $('#deleteHomeWorkModal');
            modal.find('input[name=id]').val(id)
            modal.modal('show');
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\homework\homeworkList.blade.php ENDPATH**/ ?>
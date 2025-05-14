<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('reports.student_login_info'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<input type="text" hidden value="<?php echo e(@$clas->class_name); ?>" id="cls">
<input type="text" hidden value="<?php echo e(@$clas->section_name->sectionName->section_name); ?>" id="sec">
<section class="sms-breadcrumb mb-20 up_breadcrumb">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('reports.student_login_info'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('reports.reports'); ?></a>
                <a href="#"><?php echo app('translator')->get('reports.student_login_info'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'student_login_report_search', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

        <div class="row">
            <div class="col-lg-12">
                <div class="white-box">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="main-title">
                                <h3 class="mb-15"><?php echo app('translator')->get('common.select_criteria'); ?> </h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                        <?php if(moduleStatuscheck('University')): ?>
                        <?php if ($__env->exists('university::common.session_faculty_depart_academic_semester_level',['required' =>
                        ['US'], 'hide' => ['USUB']])) echo $__env->make('university::common.session_faculty_depart_academic_semester_level',['required' =>
                        ['US'], 'hide' => ['USUB']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php else: ?>
                        <div class="col-lg-6 mt-30-md col-md-6">
                            <label class="primary_input_label" for=""><?php echo e(__('common.class')); ?>

                                <span class="text-danger"> *</span>
                            </label>
                            <select
                                class="primary_select  form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>"
                                id="select_class" name="class">
                                <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value="">
                                    <?php echo app('translator')->get('common.select_class'); ?> *</option>
                                <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($class->id); ?>"
                                    <?php echo e(isset($class_id)? ($class->id == $class_id? 'selected':''): ''); ?>>
                                    <?php echo e($class->class_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('class')): ?>
                            <span class="text-danger invalid-select" role="alert">
                                <?php echo e($errors->first('class')); ?>

                            </span>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-6 mt-30-md col-md-6" id="select_section_div">
                            <label class="primary_input_label" for=""><?php echo e(__('common.section')); ?>

                                <span></span>
                            </label>
                            <select
                                class="primary_select  form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?>"
                                id="select_section" name="section">
                                <option data-display="<?php echo app('translator')->get('reports.select_current_section'); ?>" value="">
                                    <?php echo app('translator')->get('reports.select_current_section'); ?></option>
                                <?php if(isset($class_id)): ?>
                                <?php $__currentLoopData = $class->classSection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($section->sectionName->id); ?>"
                                    <?php echo e(old('section')==$section->sectionName->id ? 'selected' : ''); ?>>
                                    <?php echo e($section->sectionName->section_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                            <div class="pull-right loader loader_style" id="select_section_loader">
                                <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>"
                                    alt="loader">
                            </div>
                            <?php if($errors->has('section')): ?>
                            <span class="text-danger invalid-select" role="alert">
                                <?php echo e($errors->first('section')); ?>

                            </span>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                        <div class="col-lg-12 mt-20 text-right">
                            <button type="submit" class="primary-btn small fix-gr-bg">
                                <span class="ti-search pr-2"></span>
                                <?php echo app('translator')->get('common.search'); ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php echo e(Form::close()); ?>

        <?php if(isset($student_records)): ?>
        <div class="row mt-40">
            <div class="col-lg-12">
                <div class="white-box">
                    <div class="row">
                        <div class="col-lg-4 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-15"><?php echo app('translator')->get('reports.manage_login'); ?></h3>
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
                                <table id="table_id" class="table data-table Crm_table_active3 no-footer dtr-inline collapsed" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th><?php echo app('translator')->get('common.sl'); ?></th>
                                            <th><?php echo app('translator')->get('student.admission_no'); ?></th>
                                            <th><?php echo app('translator')->get('student.student_name'); ?></th>
                                            <th><?php echo app('translator')->get('reports.email_&_password'); ?></th>
                                            <th><?php echo app('translator')->get('reports.parent_email_&_password'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $count=1;
                                        ?>
                                        <?php $__currentLoopData = $student_records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($count++); ?></td>
                                            <td class="text-center"><?php echo e(@$record->student->admission_no); ?></td>
                                            <td><?php echo e(@$record->student->first_name.' '.@$record->student->last_name); ?></td>
                                            <td>
                                                <?php if(@$record->student->user): ?>
                                                <?php echo e(@$record->student->user !=""? @$record->student->user->email:""); ?>

                                                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'reset-student-password', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                                                <input type="hidden" name="id" value="<?php echo e(@$record->student->user_id); ?>">
                                                <div class="row mt-10">
                                                    <div class="col-lg-6">
                                                        <div class="primary_input md_mb_20">
                                                            <input class="primary_input_field read-only-input" type="text"
                                                                name="new_password" required="true" minlength="6">
                                                            <label class="primary_input_label"
                                                                for=""><?php echo app('translator')->get('reports.reset_password'); ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <?php if(userPermission('student_login_update')): ?>
                                                        <button type="submit" class="primary-btn small fix-gr-bg">
                                                            <?php echo app('translator')->get('reports.update'); ?>
                                                        </button>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <?php echo e(Form::close()); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if(@$record->student->parents->parent_user): ?>
                                                <?php echo e(@$record->student->parents->parent_user->email); ?>

                                                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'reset-student-password', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                                                <input type="hidden" name="id"
                                                    value="<?php echo e(@$record->student->parents->parent_user->id); ?>">
                                                <div class="row mt-10">
                                                    <div class="col-lg-6">
                                                        <div class="primary_input md_mb_20">
                                                            <input class="primary_input_field read-only-input" type="text"
                                                                name="new_password" required="true" minlength="6">
                                                            <label class="primary_input_label"
                                                                for=""><?php echo app('translator')->get('reports.reset_password'); ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <button type="submit" class="primary-btn small fix-gr-bg">
                                                            <?php echo app('translator')->get('common.update'); ?>
                                                        </button>
                                                    </div>
                                                </div>
                                                <?php echo e(Form::close()); ?>

                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        <?php endif; ?>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $(document).ready(function() {
            $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                "ajax": $.fn.dataTable.pipeline( {
                    url: "<?php echo e(url('student-list-datatable')); ?>",
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
                } ),
                columns: [
                    {data: 'admission_no', name: 'admission_no'},                  
                    {data: 'full_name', name: 'full_name'},  
                    <?php if(!moduleStatusCheck('University') && generalSetting()->with_guardian): ?>
                     {data: 'parents.fathers_name', name: 'parents.fathers_name'},
                    <?php endif; ?>
                    {data: 'dob', name: 'dob'},
                    <?php if(moduleStatusCheck('University')): ?>
                        {data: 'semester_label', name: 'semester_label'},
                        {data: 'class_sec', name: 'class_sec'},
                    <?php else: ?>
                        {data: 'class_sec', name: 'class_sec'},
                    <?php endif; ?>
                    {data: 'gender.base_setup_name', name: 'gender.base_setup_name'},
                    {data: 'category.category_name', name: 'category.category_name'},
                    {data: 'mobile', name: 'sm_students.mobile'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    {data: 'first_name', name: 'first_name', visible : false},
                    {data: 'last_name', name: 'last_name', visible : false},
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
        } );
    </script>


<?php $__env->stopPush(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\studentInformation\login_info.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('fees.fees_collection'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('fees.fees_assign'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('fees.fees_collection'); ?></a>
                    <a href="<?php echo e(route('fees_assign', [$fees_group_id])); ?>"><?php echo app('translator')->get('fees.fees_assign'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="main-title">
                        <h3 class="mb-30"><?php echo app('translator')->get('common.select_criteria'); ?></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">

                    <div class="white-box">
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'fees-assign-search', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_studentA'])); ?>

                        <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            <input type="hidden" name="fees_group_id" id="fees_group_id" value="<?php echo e(@$fees_group_id); ?>">
                            <?php if(moduleStatusCheck('University')): ?>
                                <?php if ($__env->exists(
                                    'university::common.session_faculty_depart_academic_semester_level',
                                    ['hide' => ['USUB']]
                                )) echo $__env->make(
                                    'university::common.session_faculty_depart_academic_semester_level',
                                    ['hide' => ['USUB']]
                                , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php else: ?>
                                <div class="col-lg-3 mt-30-md">
                                    <select
                                        class="primary_select  form-control<?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>"
                                        id="select_class" name="class">
                                        <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value=""><?php echo app('translator')->get('common.select_class'); ?></option>
                                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($class->id); ?>"
                                                <?php echo e(isset($class_id) ? ($class_id == $class->id ? 'selected' : '') : ''); ?>>
                                                <?php echo e(@$class->class_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('class')): ?>
                                        <span class="text-danger" role="alert">
                                            <?php echo e($errors->first('class')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-3 mt-30-md" id="select_section_div">
                                    <select
                                        class="primary_select  form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?>"
                                        id="select_section" name="section">
                                        <option data-display="<?php echo app('translator')->get('common.select_section'); ?>" value=""><?php echo app('translator')->get('common.select_section'); ?></option>
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

                                <div class="col-lg-3 mt-30-md">
                                    <select
                                        class="primary_select  form-control<?php echo e($errors->has('category') ? ' is-invalid' : ''); ?>"
                                        name="category">
                                        <option data-display="<?php echo app('translator')->get('fees.select_category'); ?>" value=""><?php echo app('translator')->get('fees.select_category'); ?></option>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category->id); ?>"
                                                <?php echo e(isset($category_id) ? ($category_id == $category->id ? 'selected' : '') : ''); ?>>
                                                <?php echo e(@$category->category_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('category')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('category')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-3 mt-30-md">
                                    <select
                                        class="primary_select  form-control<?php echo e($errors->has('group') ? ' is-invalid' : ''); ?>"
                                        name="group">
                                        <option data-display="<?php echo app('translator')->get('fees.select_group'); ?>" value=""><?php echo app('translator')->get('fees.select_group'); ?></option>
                                        <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($group->id); ?>"
                                                <?php echo e(isset($group_id) ? ($group_id == $group->id ? 'selected' : '') : ''); ?>>
                                                <?php echo e($group->group); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('group')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('group')); ?>

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
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
            <?php if(isset($students)): ?>
                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'method' => 'POST', 'url' => 'btn-assign-fees-group', 'enctype' => 'multipart/form-data'])); ?>

                <input type="hidden" name="fees_group_id" id="fees_group_id" value="<?php echo e(@$fees_group_id); ?>">
                <div class="row mt-40">
                    <div class="col-lg-12">
                        <div class="row mb-30">
                            <div class="col-lg-6 no-gutters">
                                <div class="main-title">
                                    <h3 class="mb-0"><?php echo app('translator')->get('fees.assign_fees_group'); ?></h3>
                                </div>
                            </div>
                        </div>
                        <!-- </div> -->
                        <div class="row">
                            <div class="col-lg-4">
                                <div id="table_id_table_wrapper" class="dataTables_wrapper">
                                    <table id="table_id_table" class="table dataTable" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <?php $i = 0; ?>
                                                <?php $__currentLoopData = $fees_assign_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fees_assign_group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php $i++; ?>
                                                    <?php if($i == 1): ?>
                                            <tr>
                                                <th><?php echo e(@$fees_assign_group->feesGroups->name); ?></th>
                                                <th><?php echo app('translator')->get('fees.amount'); ?> </th>
                                            </tr>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $fees_assign_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fees_assign_group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td style="padding: 20px 10px 10px 17px !important;">
                            <?php echo e(@$fees_assign_group->feesTypes != '' ? @$fees_assign_group->feesTypes->name : ''); ?>

                        </td>
                        <td style="padding: 20px 10px 10px 17px !important;"><?php echo e(@$fees_assign_group->amount); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            </table>
        </div>
        </div>

        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-12 search_hide_md">
                    <a class="primary-btn fix-gr-bg mb-0 submit" data-toggle="modal" data-target="#assignAllStudentsModal"
                        href=""><?php echo app('translator')->get('fees.assign_all_students'); ?></a>
                    <a class="primary-btn fix-gr-bg mb-0 submit" data-toggle="modal" data-target="#unassignAllStudentsModal"
                        href=""><?php echo app('translator')->get('fees.unassign_all_students'); ?></a>
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
                        <table id="table_id" class="table data-table school-table-style" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="10%">
                                        <input type="checkbox" id="checkAll" class="common-checkbox" name="checkAll"
                                            <?php
                                                if(count($students) > 0){
                                                    if(count($students) == count($pre_assigned)){
                                                        echo 'checked';
                                                    }
                                                }
                                            ?>>
                                        <label for="checkAll" class="mb-0"><?php echo app('translator')->get('fees.all'); ?></label>
                                    </th>
                                    <th width="20%"><?php echo app('translator')->get('student.student_name'); ?></th>
                                    <th width="15%"><?php echo app('translator')->get('student.admission_no'); ?></th>
                                    <th width="15%"><?php echo app('translator')->get('common.class'); ?></th>
                                    <th width="20%"><?php echo app('translator')->get('student.father_name'); ?></th>
                                    <th width="10%"><?php echo app('translator')->get('fees.category'); ?></th>
                                    <th width="10%"><?php echo app('translator')->get('common.gender'); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                            </tbody>
                            <?php if($student_count > 0): ?>
                                <tr>
                                    <td colspan="7">
                                        <div class="text-center">
                                            <button type="submit" class="primary-btn fix-gr-bg mb-0 submit"
                                                id="btn-assign-fees-group"
                                                data-loading-text="<i class='fas fa-spinner'></i> Processing Data">
                                                <span class="ti-save pr"></span>
                                                <?php echo app('translator')->get('fees.save_fees'); ?>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
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
        <?php echo e(Form::close()); ?>

        <?php endif; ?>
        </div>
    </section>

    
    <div class="modal fade admin-query" id="assignAllStudentsModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('fees.assign_fees_group_to_all'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <h4><?php echo app('translator')->get('fees.are_you_sure_you_want_to_assign_this_fees_group_to_all_the_students_this_list'); ?></h4>
                    </div>
                    <div class="mt-40 d-flex justify-content-between">
                        <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('admin.cancel'); ?></button>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'method' => 'POST', 'url' => 'btn-assign-fees-group', 'enctype' => 'multipart/form-data'])); ?>

                        <input type="hidden" name="fees_assign_class"
                            value="<?php echo e(isset($requestData) ? $requestData['class'] : ''); ?>">
                        <input type="hidden" name="fees_assign_section"
                            value="<?php echo e(isset($requestData) ? $requestData['section'] : ''); ?>">
                        <input type="hidden" name="fees_assign_category"
                            value="<?php echo e(isset($requestData) ? $requestData['category'] : ''); ?>">
                        <input type="hidden" name="fees_assign_group"
                            value="<?php echo e(isset($requestData) ? $requestData['group'] : ''); ?>">
                        <input type="hidden" name="fees_group_id" id="fees_group_id" value="<?php echo e(@$fees_group_id); ?>">
                        <input type="hidden" name="fees_assign_all" value="1">
                        <button type="submit" class="text-light primary-btn fix-gr-bg"><?php echo app('translator')->get('fees.assign'); ?></button>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    

    
    <div class="modal fade admin-query" id="unassignAllStudentsModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('fees.unassign_fees_group_to_all'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <h4><?php echo app('translator')->get('fees.are_you_sure_you_want_to_unassign_this_fees_group_from_all_the_students_this_list'); ?></h4>
                    </div>
                    <div class="mt-40 d-flex justify-content-between">
                        <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('admin.cancel'); ?></button>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'method' => 'POST', 'url' => 'unssign-all-fees-group', 'enctype' => 'multipart/form-data'])); ?>

                        <input type="hidden" name="fees_assign_class"
                            value="<?php echo e(isset($requestData) ? $requestData['class'] : ''); ?>">
                        <input type="hidden" name="fees_assign_section"
                            value="<?php echo e(isset($requestData) ? $requestData['section'] : ''); ?>">
                        <input type="hidden" name="fees_assign_category"
                            value="<?php echo e(isset($requestData) ? $requestData['category'] : ''); ?>">
                        <input type="hidden" name="fees_assign_group"
                            value="<?php echo e(isset($requestData) ? $requestData['group'] : ''); ?>">
                        <input type="hidden" name="fees_group_id" id="fees_group_id" value="<?php echo e(@$fees_group_id); ?>">
                        <button type="submit" class="text-light primary-btn fix-gr-bg"><?php echo app('translator')->get('fees.unassign'); ?></button>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
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
                // bLengthChange: true,
                // "lengthChange": true,
                // "lengthMenu": [
                //     [10, 25, 50, 100, -1],
                //     [10, 25, 50, 100, "All"]
                // ],
                // lengthChange: true,
                // lengthMenu: [ 10, 25, 50, 100 ],
                serverSide: true,
                "ajax": $.fn.dataTable.pipeline({
                    url: "<?php echo e(url('fees-assign-datatable')); ?>",
                    data: {
                        class: '<?php echo e(@$requestData['class']); ?>',
                        section: '<?php echo e(@$requestData['section']); ?>',
                        category: '<?php echo e(@$requestData['category']); ?>',
                        group: '<?php echo e(@$requestData['group']); ?>',
                        fees_group_id: '<?php echo e(@$requestData['fees_group_id']); ?>',
                    },
                    pages: "<?php echo e(generalSetting()->ss_page_load); ?>" // number of pages to cache
                }),
                columns: [{
                        data: 'input_checkbox',
                        name: 'input_checkbox',
                        sortable: false
                    },
                    {
                        data: 'full_name',
                        name: 'student_detail.full_name'
                    },
                    {
                        data: 'admission_no',
                        name: 'student_detail.admission_no'
                    },
                    {
                        data: 'class_section_name',
                        name: 'class.class_name'
                    },
                    {
                        data: 'parents_name',
                        name: 'student_detail.parents.fathers_name'
                    },
                    {
                        data: 'category_name',
                        name: 'student_detail.category.category_name'
                    },
                    {
                        data: 'base_setup_name',
                        name: 'student_detail.gender.base_setup_name'
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\feesCollection\fees_assign.blade.php ENDPATH**/ ?>
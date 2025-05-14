<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('lesson::lesson.add_topic'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lesson::lesson.add_topic'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lesson::lesson.lesson_plan'); ?></a>
                <a href="#"><?php echo app('translator')->get('lesson::lesson.topic'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
        <?php if(isset($data)): ?>
        <?php if(userPermission("lesson.topic.store")): ?>
        <div class="row">
            <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                <a href="<?php echo e(route('exam')); ?>" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus"></span>
                    <?php echo app('translator')->get('common.add'); ?>
                </a>
            </div>
        </div>

        <?php endif; ?>
        <?php endif; ?>

        <?php if(userPermission("lesson.topic.store")): ?>
        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'lesson.topic.store',
                'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

        <?php endif; ?>


        <div class="row">

            <div class="col-lg-4 col-xl-3">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="white-box">
                            <div class="main-title">
                                <h3 class="mb-15"><?php if(isset($data)): ?>
                                    <?php echo app('translator')->get('lesson::lesson.edit_topic'); ?>
                                    <?php else: ?>
                                    <?php echo app('translator')->get('lesson::lesson.add_topic'); ?>
                                    <?php endif; ?>
    
                                </h3>
                            </div>
                            <div class="add-visitor">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="primary_input_label" for="">
                                            <?php echo e(__('common.class')); ?>

                                            <span class="text-danger"> *</span>
                                        </label>
                                        <select
                                            class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>"
                                            id="select_class" name="class">
                                            <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value="">
                                                <?php echo app('translator')->get('common.select_class'); ?> *
                                            </option>
                                            <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e(@$class->id); ?>"
                                                <?php echo e(( old('class') == @$class->id ? "selected":"")); ?>>
                                                <?php echo e(@$class->class_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('class')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('class')); ?>

                                        </span>
                                        <?php endif; ?>

                                    </div>
                                </div>
                                <div class="row mt-15">

                                    <div class="col-lg-12" id="select_section_div">
                                        <label class="primary_input_label" for="">
                                            <?php echo e(__('common.section')); ?>

                                            <span class="text-danger"> *</span>
                                        </label>
                                        <select
                                            class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?>"
                                            id="select_section" name="section">
                                            <option data-display="<?php echo app('translator')->get('common.select_section'); ?> *" value="">
                                                <?php echo app('translator')->get('common.select_section'); ?> *
                                            </option>
                                        </select>
                                        <div class="pull-right loader" id="select_section_loader"
                                            style="margin-top: -30px;padding-right: 21px;">
                                            <img src="<?php echo e(asset('Modules/Lesson/Resources/assets/images/pre-loader.gif')); ?>"
                                                alt="" style="width: 28px;height:28px;">
                                        </div>
                                        <?php if($errors->has('section')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('section')); ?>

                                        </span>
                                        <?php endif; ?>

                                    </div>
                                </div>
                                <div class="row mt-15">
                                    <div class="col-lg-12" id="select_subject_div">
                                        <label class="primary_input_label" for="">
                                            <?php echo e(__('common.subject')); ?>

                                            <span class="text-danger"> *</span>
                                        </label>
                                        <select
                                            class="primary_select form-control<?php echo e($errors->has('subject') ? ' is-invalid' : ''); ?>select_subject"
                                            id="select_subject" name="subject">
                                            <option data-display="<?php echo app('translator')->get('lesson::lesson.select_subject'); ?> *" value="">
                                                <?php echo app('translator')->get('lesson::lesson.select_subject'); ?>*</option>
                                        </select>

                                        <div class="pull-right loader" id="select_subject_loader"
                                            style="margin-top: -30px;padding-right: 21px;">
                                            <img src="<?php echo e(asset('Modules/Lesson/Resources/assets/images/pre-loader.gif')); ?>"
                                                alt="" style="width: 28px;height:28px;">
                                        </div>
                                        <?php if($errors->has('subject')): ?>
                                        <span class="text-danger invalid-select" role="alert" style="display: block">
                                            <?php echo e($errors->first('subject')); ?>

                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row mt-15">

                                    <div class="col-lg-12" id="select_lesson_div">
                                        <label class="primary_input_label" for="">
                                            <?php echo e(__('lesson::lesson.lesson')); ?>

                                            <span class="text-danger"> *</span>
                                        </label>
                                        <select class="primary_select" id="lesson_from_subject" name="lesson">
                                            <option data-display="<?php echo app('translator')->get('lesson::lesson.select_lesson'); ?> *" value="">
                                                <?php echo app('translator')->get('lesson::lesson.select_lesson'); ?>*</option>
                                        </select>

                                        <div class="pull-right loader" id="select_lesson_loader"
                                            style="margin-top: -30px;padding-right: 21px;">
                                            <img src="<?php echo e(asset('Modules/Lesson/Resources/assets/images/pre-loader.gif')); ?>"
                                                alt="" style="width: 28px;height:28px;">
                                        </div>
                                        <?php if($errors->has('lesson')): ?>
                                        <span class="text-danger invalid-select" role="alert" style="display: block">
                                            <?php echo e($errors->first('lesson')); ?>

                                        </span>
                                        <?php endif; ?>

                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="white-box mt-10">
                            <div class="row align-items-center mb-3">
                                <div class="col-xl-9 col-lg-8 col-md-10 col-9">
                                    <div class="main-title my-0 md:mt-auto">
                                        <h5 class="mb-0"><?php echo app('translator')->get('lesson::lesson.add_topic'); ?> </h5>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-2 col-3 text-right">
                                    <button type="button" class="primary-btn icon-only fix-gr-bg"
                                        onclick="addRowTopic();" id="addRowBtn">
                                        <span class="ti-plus"></span></button>
                                </div>
                            </div>
                            <table class="" id="productTable">
                                <thead>
                                    <tr>


                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id="row1" class="mt-40">
                                        <td>
                                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                            <input type="hidden" id="lang" value="<?php echo app('translator')->get('lesson::lesson.title'); ?>">
                                            <div class="primary_input">
                                                <input
                                                    class="primary_input_field form-control<?php echo e($errors->has('topic') ? ' is-invalid' : ''); ?>"
                                                    placeholder="<?php echo e(__('common.title')); ?>" type="text" id="topic"
                                                    name="topic[]" autocomplete="off"
                                                    value="<?php echo e(isset($editData)? $editData->exam_title : ''); ?>">

                                            </div>
                                        </td>

                                        <td class="pl-2">
                                            <button class="primary-btn icon-only fix-gr-bg" type="button">
                                                <span class="ti-trash"></span>
                                            </button>

                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <?php
                $tooltip = "";
                if(userPermission("lesson.topic.store")){
                $tooltip = "";
                }else{
                $tooltip = "You have no permission to add";
                }
                ?>
                <div class="row mt-40">
                    <div class="col-lg-12">
                        <div class="white-box">
                            <div class="row mt-40">
                                <div class="col-lg-12 text-center">
                                    <button class="primary-btn fix-gr-bg" data-toggle="tooltip" title="<?php echo e(@$tooltip); ?>">
                                        <span class="ti-check"></span>
                                        <?php if(isset($data)): ?>
                                        <?php echo app('translator')->get('lesson::lesson.update_topic'); ?>
                                        <?php else: ?>
                                        <?php echo app('translator')->get('lesson::lesson.save_topic'); ?>
                                        <?php endif; ?>


                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php echo e(Form::close()); ?>


            <div class="col-lg-8 col-xl-9">
                <div class="white-box">
                    <div class="row">
                        <div class="col-lg-4 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-15"><?php echo app('translator')->get('lesson::lesson.topic_list'); ?></h3>
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
                                            <th><?php echo app('translator')->get('common.sl'); ?></th>
                                            <th><?php echo app('translator')->get('common.class'); ?></th>
                                            <th><?php echo app('translator')->get('common.section'); ?></th>
                                            <th><?php echo app('translator')->get('lesson::lesson.subject'); ?></th>
                                            <th><?php echo app('translator')->get('lesson::lesson.lesson'); ?></th>
                                            <th><?php echo app('translator')->get('lesson::lesson.topic'); ?></th>
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

<div class="modal fade admin-query" id="deleteTopicModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo app('translator')->get('lesson::lesson.delete_topic'); ?></h4>
                <button type="button" class="close" data-dismiss="modal">&times;
                </button>
            </div>

            <div class="modal-body">
                <div class="text-center">
                    <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                </div>

                <div class="mt-40 d-flex justify-content-between">
                    <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                    <?php echo e(Form::open(['route' => array('topic-delete'), 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                    <input type="hidden" name="id" value="">
                    <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('common.delete'); ?></button>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<script type="text/javascript" src="<?php echo e(url('Modules\Lesson\Resources\assets\js\app.js')); ?>"></script>
<script src="<?php echo e(asset('public/backEnd/')); ?>/js/lesson_plan.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.server_side_datatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startPush('script'); ?>

<script>
    $(document).ready(function () {
        $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            "ajax": $.fn.dataTable.pipeline({
                url: "<?php echo e(route('get-all-topics-ajax')); ?>",
                data: {},
                pages: "<?php echo e(generalSetting()->ss_page_load); ?>" // number of pages to cache

            }),
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'id'
                },
                {
                    data: 'class.class_name',
                    name: 'class_name'
                },
                {
                    data: 'section.section_name',
                    name: 'section_name'
                },
                {
                    data: 'subject.subject_name',
                    name: 'subject_name'
                },
                {
                    data: 'lesson.lesson_title',
                    name: 'lesson_title'
                },
                {
                    data: 'topics_name',
                    name: 'topics_name',
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
                    customize: function (doc) {
                        doc.content[1].margin = [100, 0, 100, 0]; //left, top, right, bottom
                        doc.content.splice(1, 0, {
                            margin: [0, 0, 0, 12],
                            alignment: "center",
                            image: "data:image/png;base64," + $("#logo_img").val(),
                        });
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
    function deleteTopic(id) {
        var modal = $('#deleteTopicModal');
        modal.find('input[name=id]').val(id)
        modal.modal('show');
    }
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Modules\Lesson\Resources\views\topic\topic.blade.php ENDPATH**/ ?>
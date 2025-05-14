    <?php $__env->startSection('title'); ?>
        <?php echo app('translator')->get('student.graduate_list'); ?>
    <?php $__env->stopSection(); ?>
    <style>
        table.dataTable thead th {
            padding-left: 40px !important;
        }
        table.dataTable thead .sorting::after {
            content: '\e62a';
            font-family: 'themify';
            position: absolute;
            top: 14px !important;
            -webkit-transition: all 0.2s ease-in-out;
            transition: all 0.2s ease-in-out;
        }
    </style>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-40">
        <div class="container-fluid">
            <div class="row justify-content-between white-box">
                <h1><?php echo app('translator')->get('student.graduate_list'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('student.graduate_list'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <div class="white-box">
            <div class="row">
                  <div class="col-lg-4 col-md-6">
                      <div class="main-title">
                          <h3 class="mb-30"><?php echo app('translator')->get('common.select_criteria'); ?></h3>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-12">
                      <?php if(session()->has('message-success') != ""): ?>
                          <?php if(session()->has('message-success')): ?>
                          <div class="alert alert-success">
                              <?php echo e(session()->get('message-success')); ?>

                          </div>
                          <?php endif; ?>
                      <?php endif; ?>
                      <div>
                            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'alumni.graduate-search', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'parent-registration'])); ?>

                                <div class="row">
                                    <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                        <?php if(moduleStatusCheck('University')): ?>
                                            <?php if ($__env->exists('university::common.session_faculty_depart_academic_semester_level',  ['hide'=>['USUB','UA','US','USL','USEC'],'required'=> ['US'],'div'=>'col-lg-4'])) echo $__env->make('university::common.session_faculty_depart_academic_semester_level',  ['hide'=>['USUB','UA','US','USL','USEC'],'required'=> ['US'],'div'=>'col-lg-4'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php else: ?>
                                            <?php echo $__env->make('backEnd.common.search_criteria', [
                                                'div' => 'col-lg-3',
                                                'visiable' => ['academic', 'class', 'section',],
                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <div class="col-lg-3 mt-0">
                                                <div class="primary_input sm_mb_20 ">
                                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('student.search_by_name'); ?></label>
                                                    <input class="primary_input_field" type="text" placeholder="Name" name="name"
                                                        value="<?php echo e(isset($name) ? $name : old('name')); ?>">
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                </div>
                                <div class="col-lg-12 mt-20 text-right">
                                    <button type="submit" class="primary-btn small fix-gr-bg">
                                        <span class="ti-search pr-2"></span>
                                        <?php echo app('translator')->get('common.search'); ?>
                                    </button>
                                </div>
                            </div>
                            <input type="hidden" id="academic_id" value="<?php echo e(@$academic_year); ?>">
                            <input type="hidden" id="class" value="<?php echo e(@$class_id); ?>">
                            <input type="hidden" id="section" value="<?php echo e(@$section); ?>">
                            <input type="hidden" id="name" value="<?php echo e(@$name); ?>">
                            <input type="hidden" id="un_session" value="<?php echo e(@$data['un_session_id']); ?>">
                            <input type="hidden" id="un_academic" value="<?php echo e(@$data['un_academic_id']); ?>">
                            <input type="hidden" id="un_faculty" value="<?php echo e(@$data['un_faculty_id']); ?>">
                            <input type="hidden" id="un_department" value="<?php echo e(@$data['un_department_id']); ?>">
                            <input type="hidden" id="un_semester_label" value="<?php echo e(@$data['un_semester_label_id']); ?>">
                            <input type="hidden" id="un_section" value="<?php echo e(@$data['un_section_id']); ?>">
                        <?php echo e(Form::close()); ?>

                    </div>
                  </div>
                </div>
              </div>
              <?php if(( $graduates)): ?> 
                <div class="row mt-40 white-box">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-4 no-gutters">
                                <div class="main-title">
                                    <h3 class="mb-0"><?php echo app('translator')->get('student.graduate_list'); ?></h3>
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
                                    <table class="school-table school-table-data data-table" width="100%">
                                        <thead>
                                            <tr>
                                                <th><?php echo app('translator')->get('student.admission_no'); ?></th>
                                                <th><?php echo app('translator')->get('common.name'); ?></th>
                                                <?php if(moduleStatusCheck('University')): ?>
                                                    <th><?php echo app('translator')->get('university::un.session'); ?></th>
                                                    <th><?php echo app('translator')->get('student.fac_dept'); ?></th>
                                                <?php else: ?>
                                                    <th><?php echo app('translator')->get('admin.class_Sec'); ?></th>
                                                <?php endif; ?>
                                                <th><?php echo app('translator')->get('common.gender'); ?></th>
                                                <th><?php echo app('translator')->get('common.mobile'); ?></th>
                                                <th><?php echo app('translator')->get('student.date_of_birth'); ?></th>
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
            <?php endif; ?> 
        </div>

        <div class="modal fade admin-query" id="delete_university_department_modal" >
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><?php echo app('translator')->get('university::un.delete_department'); ?></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <div class="text-center">
                            <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                            <h5 class="text-danger">( <?php echo app('translator')->get('university::un.department_delete_confirmation'); ?> )</h5>
                        </div>

                        <div class="mt-40 d-flex justify-content-between">
                            <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                            <?php echo e(Form::open(['url' => '#', 'method' => 'DELETE', 'enctype' => 'multipart/form-data'])); ?>

                                <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('common.delete'); ?></button>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.server_side_datatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                "ajax": $.fn.dataTable.pipeline({
                    url: "<?php echo e(url('graduates/graduate-search-datatable')); ?>",
                    data: {
                        academic_year: $('#academic_id').val(),
                        class: $('#class').val(),
                        section: $('#section').val(),
                        name: $('#name').val(),
                        un_session_id: $('#un_session').val(),
                        un_academic_id: $('#un_academic').val(),
                        un_faculty_id: $('#un_faculty').val(),
                        un_department_id: $('#un_department').val(),
                        un_semester_label_id: $('#un_semester_label').val(),
                        un_section_id: $('#un_section').val(),
                    },
                    pages: "<?php echo e(generalSetting()->ss_page_load); ?>"
                }),
                columns: [{
                        data: 'admission_no',
                        name: 'admission_no'
                    },
                    {
                        data: 'full_name',
                        name: 'full_name',
                        searchable: true,
                    },
                    {
                        data: 'class_sec',
                        name: 'class_sec',
                        searchable:true,
                    },
                    {
                        data: 'gender',
                        name: 'gender',
                        orderable: false,
                    },{
                        data: 'mobile',
                        name: 'mobile',
                        orderable: false,

                    },
                    {
                        data: 'date_of_birth',
                        name: 'date_of_birth'
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
    </script>
    <script>
        $(document).on('click', '.delete_university_department_modal', function(){
            let href = $(this).attr('href');
            $('#delete_university_department_modal').find('form').attr('action', href);
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\graduate\graduate_list.blade.php ENDPATH**/ ?>
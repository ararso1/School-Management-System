<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('system_settings.language_settings'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('system_settings.language_settings'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('system_settings.system_settings'); ?></a>
                    <a href="#"><?php echo app('translator')->get('system_settings.language_settings'); ?></a>

                </div>
            </div>
        </div>
    </section>

    <section class="admin-visitor-area">
        <div class="container-fluid p-0">
            
            <div class="row">
            <?php if(moduleStatusCheck('Saas')== FALSE || auth()->user()->role_id == 1  ): ?>
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-lg-12">
                           
                            <?php if(isset($selected_languages)): ?>
                                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'language-update', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                            <?php else: ?>
                                <?php if(userPermission('language-add')): ?>
                                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'language-add',
                                    'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                                <?php endif; ?>
                            <?php endif; ?>
                            <div class="white-box">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php if(isset($edit_languages)): ?>
                                            <?php echo app('translator')->get('system_settings.edit_language'); ?>
                                        <?php else: ?>
                                            <?php echo app('translator')->get('system_settings.add_language'); ?>
                                        <?php endif; ?>
                                      
                                    </h3>
                                </div>
                                <div class="add-visitor">

                                    <?php if(isset($select_language)): ?>
                                        <input type="hidden" name="id" value="<?php echo e(@$select_language->id); ?>">

                                    <?php endif; ?>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <select
                                                    class="primary_select  form-control <?php echo e($errors->has('lang_id') ? ' is-invalid' : ''); ?>"
                                                    name="lang_id" id="lang_id">
                                                    <option data-display="<?php echo app('translator')->get('system_settings.select_language'); ?> *"
                                                            value=""><?php echo app('translator')->get('system_settings.select_language'); ?> *</option>
                                                    <?php $__currentLoopData = $all_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($lang->id); ?>"
                                                            <?php echo e(isset($select_language) ? (@$select_language->lang_id == @$lang->id )? 'selected':'':''); ?>

                                                        > <?php echo e(@$lang->name); ?> - <?php echo e(@$lang->native); ?> </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php if($errors->has('lang_id')): ?>
                                                    <span class="text-danger" >
                                                    <?php echo e($errors->first('lang_id')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>


                                        </div>
                                    </div>

                                    <?php 
                                        $tooltip = "";
                                        if(userPermission('language-add')){
                                                $tooltip = "";
                                            }else{
                                                $tooltip = "You have no permission to add";
                                            }
                                    ?>
                                    <div class="row mt-40">
                                        <div class="col-lg-12 text-center">
                                            <button class="primary-btn fix-gr-bg submit" data-toggle="tooltip" title="<?php echo e(@$tooltip); ?>">
                                                <span class="ti-check"></span>
                                                <?php if(isset($select_language)): ?>
                                                    <?php echo app('translator')->get('system_settings.update_language'); ?>
                                                <?php else: ?>
                                                    <?php echo app('translator')->get('system_settings.save_language'); ?>
                                                <?php endif; ?>
                                              
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if(moduleStatusCheck('Saas')== FALSE || auth()->user()->role_id == 1  ): ?>                                            
                <div class="col-lg-9">
            <?php endif; ?>

            <?php if(moduleStatusCheck('Saas')== TRUE || auth()->user()->role_id != 1  ): ?>                                            
                <div class="col-lg-12 p-0 mt-4 mt-lg-0">
            <?php endif; ?>
                    <div class="white-box">
                        <div class="row">
                            <div class="col-lg-4 no-gutters">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php echo app('translator')->get('system_settings.language_list'); ?></h3>
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
                                <table id="table_id" class="table data-table Crm_table_active3 no-footer dtr-inline collapsed language_table" cellspacing="0" width="100%">
                                    <thead>
                                    
                                    <tr>
                                        <th><?php echo app('translator')->get('common.sl'); ?></th>
                                        <th><?php echo app('translator')->get('system_settings.language'); ?></th>
                                        <th><?php echo app('translator')->get('system_settings.native'); ?></th>
                                        <th><?php echo app('translator')->get('system_settings.universal'); ?></th>
    
                                        <th><?php echo app('translator')->get('common.status'); ?></th>
                                        <th><?php echo app('translator')->get('common.action'); ?></th>
                                    </tr>
                                    </thead>
    
                                    <tbody>
                                    <?php
                                        $i=0;
                                        @$active     = 'primary-btn-small-input primary-btn small fix-gr-bg';
                                        @$inactive   =  'primary-btn small tr-bg';
                                    ?>
    
                                    <?php $__currentLoopData = $sms_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sms_language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(++$i); ?>

                                            <td><?php echo e(@$sms_language->language_name); ?></td>
                                            <td><?php echo e(@$sms_language->native); ?></td>
                                            <td><?php echo e(@$sms_language->language_universal); ?></td>
    
    
                                            <td>
                                            <?php if(@$sms_language->active_status==1): ?>
                                                <!-- <span class="badge badge-pill badge-success"></span> -->
                                                    <strong>Active</strong>
    
                                            <?php else: ?>
                                                <!-- <span class="badge badge-pill badge-secondary"></span> -->
                                                    In Active
                                                <?php endif; ?>
    
                                            </td>
                                            <td>
    
                                                <?php if(@$sms_language->active_status==1): ?>
                                                    <a href="<?php echo e(route('change-language',@$sms_language->id)); ?>"
                                                       class="<?php echo e(@$sms_language->active_status==1?@$active:@$inactive); ?> "   > <span
                                                            class="ti-check"></span> <?php echo app('translator')->get('system_settings.default'); ?></a>
                                                <?php else: ?>
                                                    <?php if(userPermission('change-language')): ?>
                                                    <a href="<?php echo e(route('change-language',@$sms_language->id)); ?>"
                                                        class="<?php echo e(@$sms_language->active_status==1?@$active:@$inactive); ?> text-nowrap"   > <span
                                                                class="ti-check"></span> <?php echo app('translator')->get('system_settings.make_default'); ?></a>
                                                    <?php endif; ?>
                                                <?php endif; ?>
    
                                                
    
                                               <?php if(moduleStatusCheck('Saas') == FALSE || auth()->user()->role_id == 1): ?> 
    
                                                <?php if(userPermission('language-setup') ): ?>
                                                <a href="<?php echo e(route('language-setup',@$sms_language->language_universal)); ?> "
                                                   class="primary-btn small tr-bg white_space"> <span
                                                        class="ti-settings"></span> <?php echo app('translator')->get('system_settings.setup'); ?> </a>
                                                <?php endif; ?>
                                                <a href="<?php echo e(route('lang-file-export',@$sms_language->language_universal)); ?> "
                                                    class="primary-btn small tr-bg white_space"> <span
                                                            class="ti-download"></span> <?php echo app('translator')->get('common.export'); ?> 
                                                </a>
                                                <a href="<?php echo e(route('lang-file-import',@$sms_language->language_universal)); ?> "
                                                    class="primary-btn small tr-bg white_space"> <span
                                                            class="ti-upload"></span> <?php echo app('translator')->get('common.import'); ?> 
                                                        
                                                </a>
                                                        <?php if($sms_language->language_universal !='en' && $sms_language->active_status==0): ?>
                                                  <?php if(userPermission('language-delete')): ?>
                                                        <a 
                                                       href="<?php echo e(route('language-delete')); ?>" class="primary-btn small tr-bg white_space" data-toggle="modal"
                                                       data-target="#deleteLanguage<?php echo e(@$sms_language->id); ?>" >
                                                        <span class="ti-close"></span> <?php echo app('translator')->get('system_settings.remove'); ?> 
                                                  </a>
                                                <?php endif; ?>
    
                                                <?php endif; ?>
                                            <?php endif; ?>
    
                                            
    
                                                <div class="modal fade admin-query"
                                                     id="deleteLanguage<?php echo e(@$sms_language->id); ?>">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title"><?php echo app('translator')->get('system_settings.delete_language'); ?></h4>
                                                                <button type="button" class="close" data-dismiss="modal">
                                                                    &times;
                                                                </button>
                                                            </div>
    
                                                            <div class="modal-body">
                                                                <div class="text-center">
                                                                    <h4><?php echo app('translator')->get('system_settings.are_you_sure_to_remove'); ?></h4>
                                                                </div>
    
                                                                <div class="mt-40 d-flex justify-content-between">
                                                                    <button type="button" class="primary-btn tr-bg"
                                                                            data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                                                                    <?php echo e(Form::open(['route' => 'language-delete', 'method' => 'post', 'enctype' => 'multipart/form-data'])); ?>

                                                                    <input type="hidden" name="id"
                                                                           value="<?php echo e(@$sms_language->id); ?>">
                                                                    <button class="primary-btn fix-gr-bg"
                                                                            type="submit"><?php echo app('translator')->get('system_settings.remove'); ?></button>
                                                                    <?php echo e(Form::close()); ?>

                                                                </div>
                                                            </div>
    
                                                        </div>
                                                    </div>
                                                </div>
    
    
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
                    pages: "<?php echo e(generalSetting()->ss_page_load); ?>"
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
                            doc.content[1].margin = [100, 0, 100, 0];
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
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/backEnd/systemSettings/languageSettings.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('transport.student_transport_report'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<?php  @$setting = generalSetting();  if(!empty(@$setting->currency_symbol)){ @$currency = @$setting->currency_symbol; }else{ @$currency = '$'; }   ?> 

<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('transport.student_transport_report'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('transport.transport'); ?></a>
                <a href="#"><?php echo app('translator')->get('transport.student_transport_report'); ?></a>
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
                            <div class="col-lg-4 col-md-6">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php echo app('translator')->get('common.select_criteria'); ?></h3>
                                </div>
                            </div>
                        </div>

                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'student_transport_report_store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

                            <div class="row">
                                <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                <?php if(moduleStatusCheck('University')): ?>
                                <?php if ($__env->exists('university::common.session_faculty_depart_academic_semester_level',['required'=>['USN','UD','UA','US','USL','USEC'], 'hide' => ['USUB']])) echo $__env->make('university::common.session_faculty_depart_academic_semester_level',['required'=>['USN','UD','UA','US','USL','USEC'], 'hide' => ['USUB']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php else: ?> 
                                <div class="col-lg-3">
                                    <label class="primary_input_label" for="">
                                        <?php echo e(__('common.class')); ?>

                                            <span class="text-danger"> *</span>
                                    </label>
                                    <select class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>" id="select_class" name="class">
                                        <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value=""><?php echo app('translator')->get('common.select_class'); ?>*</option>
                                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e(@$class->id); ?>"  <?php echo e(isset($class_id)? (@$class_id == @$class->id? 'selected':''):''); ?>><?php echo e(@$class->class_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('class')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('class')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-3" id="select_section_div">
                                    <label class="primary_input_label" for="">
                                        <?php echo e(__('common.section')); ?>

                                            <span class="text-danger"> *</span>
                                    </label>
                                    <select class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?> select_section" id="select_section" name="section">
                                        <option data-display="<?php echo app('translator')->get('common.select_section'); ?> *" value=""><?php echo app('translator')->get('common.select_section'); ?> *</option>
                                        <?php if(isset($class_id)): ?>
                                            <?php $__currentLoopData = $class->classSection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($section->sectionName->id); ?>" <?php echo e(old('section')==$section->sectionName->id ? 'selected' : ''); ?> >
                                                <?php echo e($section->sectionName->section_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                    <div class="pull-right loader loader_style" id="select_section_loader">
                                        <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                    </div>
                                    <?php if($errors->has('section')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('section')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?> 
                                <div class="col-lg-3">
                                    <label class="primary_input_label" for="">
                                        <?php echo e(__('transport.route')); ?>

                                            <span class="text-danger"> *</span>
                                    </label>
                                    <select class="primary_select form-control<?php echo e($errors->has('route') ? ' is-invalid' : ''); ?>" name="route">
                                        <option data-display="<?php echo app('translator')->get('transport.select_route'); ?> *" value=""><?php echo app('translator')->get('transport.select_route'); ?> *</option>
                                        <?php $__currentLoopData = $routes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $route): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($route->id); ?>"  <?php echo e(isset($route_id)? (@$route_id == @$route->id? 'selected':''):''); ?>><?php echo e(@$route->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('route')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('route')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-3">
                                    <label class="primary_input_label" for="">
                                        <?php echo e(__('transport.vehicle')); ?>

                                            <span class="text-danger"> *</span>
                                    </label>
                                    <select class="primary_select form-control<?php echo e($errors->has('vehicle') ? ' is-invalid' : ''); ?>" name="vehicle">
                                        <option data-display="<?php echo app('translator')->get('transport.select_vehicle'); ?> *" value=""><?php echo app('translator')->get('transport.select_vehicle'); ?> *</option>
                                        <?php $__currentLoopData = $vehicles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($vehicle->id); ?>"  <?php echo e(isset($vechile_id)? (@$vechile_id == @$vehicle->id? 'selected':''):''); ?>><?php echo e(@$vehicle->vehicle_no); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('vehicle')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('vehicle')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
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
                            <div class="col-lg-6 no-gutters">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php echo app('translator')->get('transport.student_transport_report'); ?></h3>
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
                                            <th><?php echo app('translator')->get('student.admission_no'); ?></th>
                                            <th><?php echo app('translator')->get('student.student_name'); ?></th>
                                            <th><?php echo app('translator')->get('common.mobile'); ?></th>
                                            <th><?php echo app('translator')->get('student.father_name'); ?></th>
                                            <th><?php echo app('translator')->get('student.father_phone'); ?></th>
                                            <th><?php echo app('translator')->get('transport.route_title'); ?></th>
                                            <th><?php echo app('translator')->get('transport.vehicle_number'); ?></th>
                                            <th><?php echo app('translator')->get('transport.driver_name'); ?></th>
                                            <th><?php echo app('translator')->get('transport.driver_contact'); ?></th>
                                            <th><?php echo app('translator')->get('transport.fare'); ?>(<?php echo e(generalSetting()->currency_symbol); ?>)</th>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.server_side_datatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startPush('script'); ?>  

<script>
   $(document).ready(function() {
       $('.data-table').DataTable({
                     processing: true,
                     serverSide: true,
                     "ajax": $.fn.dataTable.pipeline( {
                           url: "<?php echo e(route('studentTransportReportAjax')); ?>",
                           data: { 
                               
                            },
                           pages: "<?php echo e(generalSetting()->ss_page_load); ?>" // number of pages to cache
                           
                       } ),
                       columns: [
                           {data: 'DT_RowIndex', name: 'id'},
                            {data: 'admission_no', name: 'admission_no'},
                            {data: 'full_name', name: 'full_name'},
                           {data: 'mobile', name: 'mobile'},
                           {data: 'parents.fathers_name', name: 'parents.fathers_name'},
                           {data: 'parents.guardians_mobile', name: 'parents.guardians_mobile'},
                           {data: 'route.title', name: 'route.title'},
                           {data: 'vehicle.vehicle_no', name: 'vehicle.vehicle_no'},
                           {data: 'drivers.full_name', name: 'drivers.full_name'},
                           {data: 'drivers.mobile', name: 'drivers.mobile'},
                           {data: 'route.far', name: 'route.far', orderable: false, searchable: true},
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
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/backEnd/transport/student_transport_report.blade.php ENDPATH**/ ?>
<?php $__env->startPush('css'); ?>
    <style>
        .student_rec_card{
            border-radius: 6px;
            border: 1px solid var(--border_color);
            width: 100%;
        }
        .student_rec_header{
            padding: 12px;
            background: -webkit-linear-gradient( 90deg, var(--gradient_1) 0%, var(--gradient_3) 51%, var(--gradient_2) 100% );
            background: -moz-linear-gradient( 90deg, var(--gradient_1) 0%, var(--gradient_3) 51%, var(--gradient_2) 100% );
            background: -o-linear-gradient(90deg, var(--gradient_1) 0%, var(--gradient_3) 51%, var(--gradient_2) 100%);
            background: -ms-linear-gradient(90deg, var(--gradient_1) 0%, var(--gradient_3) 51%, var(--gradient_2) 100%);
            background: linear-gradient(90deg, var(--gradient_1) 0%, var(--gradient_3) 51%, var(--gradient_2) 100%);
        }
        .student_rec_footer{
            padding: 12px;
            margin-top: 16px;
            border-top: 1px solid var(--border_color);
        }
        .student_rec_content{
            padding: 16px;
            max-height: 300px;
            min-height: 300px;
        }
        
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('title'); ?> 
<?php echo app('translator')->get('common.class'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('common.class'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('academics.academics'); ?></a>
                    <a href="#"><?php echo app('translator')->get('common.class'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <?php if(isset($sectionId)): ?>
                <?php if(userPermission(266)): ?>
                    <div class="row">
                        <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                            <a href="<?php echo e(route('global_class')); ?>" class="primary-btn small fix-gr-bg">
                                <span class="ti-plus pr-2"></span>
                                <?php echo app('translator')->get('common.add'); ?>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <div class="row">
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-title">
                                <h3 class="mb-30"><?php if(isset($sectionId)): ?>
                                        <?php echo app('translator')->get('academics.edit_class'); ?>
                                    <?php else: ?>
                                        <?php echo app('translator')->get('academics.add_class'); ?>
                                    <?php endif; ?>
                                   
                                </h3>
                            </div>
                            <?php if(isset($sectionId)): ?>
                                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'global_class_update', 'method' => 'POST'])); ?>

                            <?php else: ?>
                                <?php if(userPermission(266)): ?>

                                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'global_class_store', 'method' => 'POST'])); ?>

                                <?php endif; ?>
                            <?php endif; ?>
                            <div class="white-box">
                                <div class="add-visitor">
                                    <div class="row">
                                        <div class="col-lg-12"> 
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('common.name'); ?> <span>*</span></label>
                                                <input class="primary_input_field form-control<?php echo e(@$errors->has('name') ? ' is-invalid' : ''); ?>"
                                                       type="text" name="name" autocomplete="off"
                                                       value="<?php echo e(isset($classById)? @$classById->class_name: ''); ?>">
                                                <input type="hidden" name="id"
                                                       value="<?php echo e(isset($classById)? $classById->id: ''); ?>">
                                               
                                                
                                                <?php if($errors->has('name')): ?>
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e(@$errors->first('name')); ?></strong>
                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <?php if(generalSetting()->result_type == 'mark'): ?>
                                    <div class="row mt-30">
                                        <div class="col-lg-12"> 
                                            <div class="primary_input">
                                                <input class="primary_input_field form-control<?php echo e(@$errors->has('pass_mark') ? ' is-invalid' : ''); ?>"
                                                       type="text" name="pass_mark" autocomplete="off"
                                                       value="<?php echo e(isset($classById)? @$classById->pass_mark: ''); ?>">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('exam.pass_mark'); ?> <span>*</span></label>
                                                
                                                <?php if($errors->has('pass_mark')): ?>
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e(@$errors->first('pass_mark')); ?></strong>
                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?> 
                                    <div class="row mt-30">
                                        <div class="col-lg-12">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('common.section'); ?><span class="text-danger">*</span></label><br>
                                            <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="">
                                                    <?php if(isset($sectionId)): ?>
                                                        <input type="checkbox" id="section<?php echo e(@$section->id); ?>"
                                                               class="common-checkbox form-control<?php echo e(@$errors->has('section') ? ' is-invalid' : ''); ?>"
                                                               name="section[]"
                                                               value="<?php echo e(@$section->id); ?>" <?php echo e(in_array(@$section->id, @$sectionId)? 'checked': ''); ?>>
                                                        <label for="section<?php echo e(@$section->id); ?>"><?php echo app('translator')->get('common.section'); ?> <?php echo e(@$section->section_name); ?></label>
                                                    <?php else: ?>
                                                        <input type="checkbox" id="section<?php echo e(@$section->id); ?>"
                                                               class="common-checkbox form-control<?php echo e(@$errors->has('section') ? ' is-invalid' : ''); ?>"
                                                               name="section[]" value="<?php echo e(@$section->id); ?>">
                                                        <label for="section<?php echo e(@$section->id); ?>"><?php echo app('translator')->get('common.section'); ?> <?php echo e(@$section->section_name); ?></label>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($errors->has('section')): ?>
                                                <span class="text-danger validate-textarea-checkbox" role="alert">
                                                <strong><?php echo e(@$errors->first('section')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php
                                        $tooltip = "";
                                        if(userPermission(266)){
                                              $tooltip = "";
                                          }else{
                                              $tooltip = "You have no permission to add";
                                          }
                                    ?>
                                    <div class="row mt-40">
                                        <div class="col-lg-12 text-center">
                                            <button class="primary-btn fix-gr-bg submit" data-toggle="tooltip"
                                                    title="<?php echo e($tooltip); ?>">
                                                <span class="ti-check"></span>
                                                <?php if(isset($sectionId)): ?>
                                                    <?php echo app('translator')->get('academics.update_class'); ?>
                                                <?php else: ?>
                                                    <?php echo app('translator')->get('academics.save_class'); ?>
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

                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-4 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-0"><?php echo app('translator')->get('academics.class_list'); ?></h3>
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
                                <table id="table_id" class="table Crm_table_active3" cellspacing="0" width="100%">

                                    <thead>
                                
                                    <tr>
                                        <th><?php echo app('translator')->get('common.class'); ?></th>
                                        <th><?php echo app('translator')->get('common.section'); ?></th>
                                        <?php if(@generalSetting()->result_type == 'mark'): ?>
                                        <th><?php echo app('translator')->get('exam.pass_mark'); ?></th>
                                        <?php endif; ?> 
                                        <th><?php echo app('translator')->get('student.students'); ?></th>
                                        <th><?php echo app('translator')->get('common.action'); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td valign="top"><?php echo e(@$class->class_name); ?></td>
                                            <td>
                                                <?php if(@$class->globalGroupclassSections): ?>
                                                    <?php $__currentLoopData = $class->globalGroupclassSections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                     <a href="<?php echo e(route('sorting_student_list_section',[$class->id,$section->globalSectionName->id])); ?>"><?php echo e(@$section->globalSectionName->section_name); ?>-(<?php echo e(total_no_records($class->id, $section->globalSectionName->id)); ?>)</a> 
                                                     <?php echo e(!$loop->last ? ', ':''); ?>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </td>
                                            <?php if(@generalSetting()->result_type == 'mark'): ?>
                                            <td>
                                                <?php echo e($class->pass_mark); ?>

                                            </td>
                                            <?php endif; ?>
                                            <td>
                                                <a href="<?php echo e(route('sorting_student_list',[$class->id])); ?>"><?php echo e($class->records_count); ?></a>
                                            </td>
    
    
                                            <td valign="top">
                                                <?php
                                                    $routeList = [
                                                        userPermission(263) ?
                                                            '<a class="dropdown-item"
                                                               href="'.route('global_class_edit', [@$class->id]).'">'.__('common.edit').'</a>' : null,
                                                        
                                                        userPermission(264) ? 
                                                            '<a class="dropdown-item" data-toggle="modal"
                                                               data-target="#deleteClassModal'.$class->id.'"
                                                               href="'.route('global_class_delete', [@$class->id]).'">'.__('common.delete').'</a>' : null,
    
                                                        ];
                                                ?>
                                                <?php if (isset($component)) { $__componentOriginal13b64aae043a41ed039098cb8f7bff7d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal13b64aae043a41ed039098cb8f7bff7d = $attributes; } ?>
<?php $component = App\View\Components\DropDownActionComponent::resolve(['routeList' => $routeList] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('drop-down-action-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\DropDownActionComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal13b64aae043a41ed039098cb8f7bff7d)): ?>
<?php $attributes = $__attributesOriginal13b64aae043a41ed039098cb8f7bff7d; ?>
<?php unset($__attributesOriginal13b64aae043a41ed039098cb8f7bff7d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal13b64aae043a41ed039098cb8f7bff7d)): ?>
<?php $component = $__componentOriginal13b64aae043a41ed039098cb8f7bff7d; ?>
<?php unset($__componentOriginal13b64aae043a41ed039098cb8f7bff7d); ?>
<?php endif; ?>
                                            </td>
                                        </tr>
    
                                        <div class="modal fade admin-query" id="deleteClassModal<?php echo e(@$class->id); ?>">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title"><?php echo app('translator')->get('academics.delete_class'); ?></h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;
                                                        </button>
                                                    </div>
    
                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                                                        </div>
    
                                                        <div class="mt-40 d-flex justify-content-between">
                                                            <button type="button" class="primary-btn tr-bg"
                                                                    data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                                                            <a href="<?php echo e(route('global_class_delete', [$class->id])); ?>"
                                                               class="text-light">
                                                                <button class="primary-btn fix-gr-bg"
                                                                        type="submit"><?php echo app('translator')->get('common.delete'); ?></button>
                                                            </a>
                                                        </div>
                                                    </div>
    
                                                </div>
                                            </div>
                                        </div>
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
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startPush('script'); ?>
<script>
    $(document).on("change", ".assignedClassSection", function() {
        var id = $(this).val();
        var url = '<?php echo e(url('/')); ?>';
        var formData = {
            assignedClass: $(this).val(),
        };
        $.ajax({
                type:'GET',
                data: formData,
                dataType:"json",
                url: "<?php echo e(route('loadAssignedSubject')); ?>",
                success:function(data){
                    $('#classSectionWiseSubjects_'+ data.class_id).html(data.html);
                    $('#classSectionWiseStudyMat_'+ data.class_id).html(data.html2);
                    
                },
                error:function(error){
                    console.log(error);
                }
            });
    });

    $('.primary_select').niceSelect('update');

     function deleteSubject(id){
        alert(id);
        $(".assignedSubject"+id).remove();
     }


     $(document).on('click', '.saveAssignedSubject', function(event) 
        {
                var submit_btn = $(this).find("button[type=submit]");
                event.preventDefault();
                var url = $("#url").val();
                var class_id = $(this).data('class_id');
                var formData = $("#form_"+class_id).serialize();
                console.log(formData);
                    $.ajax({
                        type: "POST",                   
                        data:formData, 
                        dataType: "json",
                        url: "<?php echo e(route('saveAssignedSubject')); ?>" ,
                        beforeSend: function() {
                            submit_btn.button('loading');
                        },
                        success: function(data) {
                            if (data.status == true) {
                                toastr.success(data.message, 'Success');                           
                            } else {
                                toastr.error(data.message, 'Error'); 
                            }
                            submit_btn.button('reset');
                        },
                        error: function(xhr) { 
                            toastr.error("Error occured. please try again", "Error");
                        },
                        complete: function() {
                            submit_btn.button('reset');
                        }
                    });
        });

        function addMoreGlobalSubject(id){
            var url = $("#url").val();
            var count = $("#assign-subject").children().length;
            var divCount = count + 1;

            // get section for student
            $.ajax({
                type: "GET",
                dataType: "json",
                url: url + "/" + "global-assign-subject-get-by-ajax",
                success: function(data) {
                    var subject_teacher = "";
                    subject_teacher +=
                        "<div class='assignedSubject" +id + "' id='assign-subject-" +
                        divCount +
                        "'>";
                    subject_teacher += "<div class='row'>";
                    subject_teacher += "<div class='col-lg-5 mt-30-md'>";
                    subject_teacher +=
                        "<select class='primary_select' name='subjects[]' style='display:none'>";
                    subject_teacher +=
                        "<option data-display='"+window.jsLang('select_subject')+"'  value=''>"+window.jsLang('select_subject')+"</option>";
                    $.each(data[0], function(key, subject) {
                        subject_teacher +=
                            "<option value=" +
                            subject.id +
                            ">" +
                            subject.subject_name +
                            "</option>";
                    });
                    subject_teacher += "</select>";

                    subject_teacher +=
                        "<div class='nice-select primary_select form-control' tabindex='0'>";
                    subject_teacher += "<span class='current'>"+window.jsLang('select_subject')+"</span>";
                    subject_teacher +=
                        "<div class='nice-select-search-box'><input type='text' class='nice-select-search' placeholder='Search...'></div>";
                    subject_teacher += "<ul class='list'>";
                    subject_teacher +=
                        "<li data-value='' data-display='"+window.jsLang('select_subject')+"' class='option selected'>"+window.jsLang('select_subject')+"</li>";
                    $.each(data[0], function(key, subject) {
                        subject_teacher +=
                            "<li data-value=" +
                            subject.id +
                            " class='option'>" +
                            subject.subject_name +
                            "</li>";
                    });
                    subject_teacher += "</ul>";
                    subject_teacher += "</div>";
                    subject_teacher += "</div>";
                    subject_teacher += "<div class='col-lg-5 mt-30-md'>";
                    subject_teacher +=
                        "<select class='primary_select form-control' name='teachers[]' style='display:none'>";
                    subject_teacher +=
                        "<option data-display='"+window.jsLang('select_teacher')+"' value=''>"+window.jsLang('select_teacher')+"</option>";
                    $.each(data[1], function(key, teacher) {
                        subject_teacher +=
                            "<option value=" +
                            teacher.id +
                            ">" +
                            teacher.full_name +
                            "</option>";
                    });
                    subject_teacher += "</select>";
                    subject_teacher +=
                        "<div class='nice-select primary_select form-control' tabindex='0'>";
                    subject_teacher += "<span class='current'>"+window.jsLang('select_teacher')+"</span>";
                    subject_teacher +=
                        "<div class='nice-select-search-box'><input type='text' class='nice-select-search' placeholder='Search...'></div>";
                    subject_teacher += "<ul class='list'>";
                    subject_teacher +=
                        "<li data-value='' data-display='"+window.jsLang('select_teacher')+"' class='option selected'>"+window.jsLang('select_teacher')+"</li>";
                    $.each(data[1], function(key, teacher) {
                        subject_teacher +=
                            "<li data-value=" +
                            teacher.id +
                            " class='option'>" +
                            teacher.full_name +
                            "</li>";
                    });
                    subject_teacher += "</ul>";
                    subject_teacher += "</div>";
                    subject_teacher += "</div>";
                    subject_teacher += "<div class='col-lg-2'>";
                    subject_teacher +=
                        "<button class='primary-btn icon-only fix-gr-bg id='removeSubject' onclick='deleteSubject(" +id + ")' type='button'>";
                    subject_teacher += "<span class='ti-trash' ></span>";
                    subject_teacher += "</button>";
                    subject_teacher += "</div>";
                    subject_teacher += "</div>";
                    subject_teacher += "</div>";
                    $("#assign-subject_"+id).append(subject_teacher);
                },
                error: function(data) {
                    // console.log("Error:", data);
                },
            });
        }

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\global\global_class.blade.php ENDPATH**/ ?>
<?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'student.record.update', 'method' => 'POST'])); ?>

<input type="hidden" name="student_id" value="<?php echo e($student_detail->id); ?>">
<input type="hidden" name="record_id" value="<?php echo e($record->id); ?>">
<div class="row">
    <?php  $setting = app('school_info');   ?>
    <?php if(moduleStatusCheck('University')): ?>
    <div class="col-lg-12">


        <?php if ($__env->exists('university::common.session_faculty_depart_academic_semester_level',
        ['div'=>'col-lg-12', 'row'=>1, 'mt'=> 'mt-0','required' => 
        ['USN','UF', 'UD', 'UA', 'US', 'USL'], 'hide' => ['USUB']])) echo $__env->make('university::common.session_faculty_depart_academic_semester_level',
        ['div'=>'col-lg-12', 'row'=>1, 'mt'=> 'mt-0','required' => 
        ['USN','UF', 'UD', 'UA', 'US', 'USL'], 'hide' => ['USUB']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <?php else: ?>
    <div class="col-lg-12">
        <div class="primary_input" id="academic-div">
            <select class="primary_select form-control<?php echo e($errors->has('session') ? ' is-invalid' : ''); ?>"
                name="session" id="edit_academic_year">
                <option data-display="<?php echo app('translator')->get('common.academic_year'); ?> *" value="">
                    <?php echo app('translator')->get('common.academic_year'); ?> *</option>
                <?php $__currentLoopData = $sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($session->id); ?>" <?php echo e($record->session_id == $session->id ? 'selected' : ''); ?>>
                        <?php echo e($session->year); ?>[<?php echo e($session->title); ?>]</option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            
            <?php if($errors->has('session')): ?>
                <span class="text-danger invalid-select" role="alert">
                    <?php echo e($errors->first('session')); ?>

                </span>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-lg-12 mt-25">
        <div class="primary_input" id="edit_class-div">
            <select class="primary_select form-control<?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>"
                name="class" id="edit_classSelectStudent">
                <option data-display="<?php echo app('translator')->get('common.class'); ?> *" value=""><?php echo app('translator')->get('common.class'); ?> *</option>
                <?php $__currentLoopData = $record->classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($class->id); ?>" <?php echo e($record->class_id == $class->id ? 'selected' : ''); ?>>
                        <?php echo e($class->class_name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </select>
            <div class="pull-right loader loader_style" id="edit_select_class_loader">
                <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
            </div>
            
            <?php if($errors->has('class')): ?>
                <span class="text-danger invalid-select" role="alert">
                    <?php echo e($errors->first('class')); ?>

                </span>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-lg-12 mt-25">
        <div class="primary_input" id="edit_sectionStudentDiv">
            <select class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?>"
                name="section" id="edit_sectionSelectStudent">
                <option data-display="<?php echo app('translator')->get('common.section'); ?> *" value=""><?php echo app('translator')->get('common.section'); ?> *
                </option>
                <?php if($record->session_id && $record->class_id): ?>
                    <?php $__currentLoopData = $record->class->classSection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($section->sectionName->id); ?>"
                            <?php echo e($record->section_id == $section->sectionName->id ? 'selected' : ''); ?>>
                            <?php echo e($section->sectionName->section_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </select>
            <div class="pull-right loader loader_style" id="edit_select_section_loader">
                <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
            </div>
            
            <?php if($errors->has('section')): ?>
                <span class="text-danger invalid-select" role="alert">
                    <?php echo e($errors->first('section')); ?>

                </span>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>
    <?php if($setting->multiple_roll ==1): ?>
    <div class="col-lg-12 mt-25">
        <div class="primary_input">
            <input oninput="numberCheck(this)" class="primary_input_field form-control has-content" type="text"
                id="roll_number" name="roll_number" value="<?php echo e($record->roll_no); ?>">
            <label>
                <?php echo e(moduleStatusCheck('Lead') == true ? __('lead::lead.id_number') : __('student.roll')); ?>

                <?php if(is_required('roll_number') == true): ?> <span class="text-danger"> *</span> <?php endif; ?></label>
            
            <span class="text-danger" id="roll-error" role="alert">
                <strong></strong>
            </span>
            <?php if($errors->has('roll_number')): ?>
                <span class="text-danger" >
                    <?php echo e($errors->first('roll_number')); ?>

                </span>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>

    <div class="col-lg-12 mt-25">
        <label for="is_default"><?php echo app('translator')->get('student.is_default'); ?></label>
        <div class="d-flex radio-btn-flex mt-10">
            
            <div class="mr-30">
                <input type="radio" name="is_default" id="isDefaultYesEdit" value="1" class="common-radio relationButton" <?php echo e($record->is_default == 1 ? 'checked':''); ?>>
                <label for="isDefaultYesEdit"><?php echo app('translator')->get('common.yes'); ?></label>
            </div>
            <div class="mr-30">
                <input type="radio" name="is_default" id="isDefaultNoEdit" value="0" class="common-radio relationButton" <?php echo e($record->is_default == 0 ? 'checked':''); ?>>
                <label for="isDefaultNoEdit"><?php echo app('translator')->get('common.no'); ?></label>
            </div>
            
        </div>
    </div>
    <div class="col-lg-12 text-center mt-25">
        <div class="mt-40 d-flex justify-content-between">
            <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('admin.cancel'); ?></button>
            <button class="primary-btn fix-gr-bg submit" id="save_button_query"
                type="submit"><?php echo app('translator')->get('admin.save'); ?></button>
        </div>
    </div>
</div>
<?php echo e(Form::close()); ?>


<script>
    $(".primary_select").niceSelect('destroy');
    $(".primary_select").niceSelect();
    // $(document).ready(function() {
        $(document).on("change",'#edit_academic_year',function() {
            // alert($(this).val());
                var url = $("#url").val();
                var i = 0;
                var formData = {
                    id: $(this).val(),
                };
                // get section for student
                $.ajax({
                    type: "GET",
                    data: formData,
                    dataType: "json",
                    url: url + "/" + "academic-year-get-class",

                    beforeSend: function() {
                        $('#edit_select_class_loader').addClass('pre_loader');
                        $('#edit_select_class_loader').removeClass('loader');
                    },

                    success: function(data) {
                        $("#edit_classSelectStudent").empty().append(
                            $("<option>", {
                                value:  '',
                                text: window.jsLang('select_class') + ' *',
                            })
                        );

                        if (data[0].length) {
                            $.each(data[0], function(i, className) {
                                $("#edit_classSelectStudent").append(
                                    $("<option>", {
                                        value: className.id,
                                        text: className.class_name,
                                    })
                                );
                            });
                        } 
                        $('#edit_classSelectStudent').niceSelect('update');
                        $('#edit_classSelectStudent').trigger('change');
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    },
                    complete: function() {
                        i--;
                        if (i <= 0) {
                            $('#edit_select_class_loader').removeClass('pre_loader');
                            $('#edit_select_class_loader').addClass('loader');
                        }
                    }
                });
        });
        $(document).on("change","#edit_classSelectStudent", function() {
            var url = $("#url").val();
            var i = 0;

            var formData = {
                id: $(this).val(),
            };
            // get section for student
            $.ajax({
                type: "GET",
                data: formData,
                dataType: "json",
                url: url + "/" + "ajaxSectionStudent",

                beforeSend: function() {
                    $('#edit_select_section_loader').addClass('pre_loader');
                    $('#edit_select_section_loader').removeClass('loader');
                },
                success: function(data) {

                    $("#edit_sectionSelectStudent").empty().append(
                        $("<option>", {
                            value:  '',
                            text: window.jsLang('select_section') + ' *',
                        })
                    );
                    $.each(data, function(i, item) {
                       
                        if (item.length) {
                            $.each(item, function(i, section) {
                                $("#edit_sectionSelectStudent").append(
                                    $("<option>", {
                                        value: section.id,
                                        text: section.section_name,
                                    })
                                );
                                
                            });
                        } 
                    });
                    $("#edit_sectionSelectStudent").trigger('change').niceSelect('update')
                    

                },
                error: function(data) {
                    console.log("Error:", data);
                },
                complete: function() {
                    i--;
                    if (i <= 0) {
                        $('#edit_select_section_loader').removeClass('pre_loader');
                        $('#edit_select_section_loader').addClass('loader');
                    }
                }
            });
        });
    
</script>
<?php /**PATH C:\xampp\htdocs\school\resources\views/backEnd/studentInformation/assign_class_edit.blade.php ENDPATH**/ ?>
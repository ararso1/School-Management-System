<style>
    .input-right-icon button {
        position: absolute;
        top: 50%;
        right: 15px;
        display: inline-block;
        transform: translateY(-50%);
    }

    .input-right-icon button i {
        position: unset;
    }
</style>
<?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'admission_query_update', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'admission-query-store'])); ?>

<input type="hidden" name="id" value="<?php echo e(@$admission_query->id); ?>">
<div class="" id="editAdmissionQuery">
    <div class="container-fluid">
        <form action="">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="primary_input">
                                <label class="primary_input_label" for=""><?php echo app('translator')->get('common.name'); ?> <span
                                        class="text-danger"> *</span></label>
                                <input class="primary_input_field read-only-input form-control" type="text"
                                    name="name"
                                    id="name" value="<?php echo e(@$admission_query->name); ?>" required>

                                <span class="text-danger" id="nameError">
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="primary_input">
                                <label class="primary_input_label" for=""><?php echo app('translator')->get('common.phone'); ?></label>
                                <input oninput="phoneCheck(this)"
                                    class="primary_input_field read-only-input form-control" type="text"
                                    name="phone"
                                    id="phone" value="<?php echo e(@$admission_query->phone); ?>">

                                </span>


                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="primary_input">
                                <label class="primary_input_label" for=""><?php echo app('translator')->get('common.email'); ?></label>
                                <input oninput="emailCheck(this)"
                                    class="primary_input_field read-only-input form-control" type="text"
                                    name="email"
                                    value="<?php echo e(@$admission_query->email); ?>">


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mt-25">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="primary_input">
                                <label class="primary_input_label" for=""><?php echo app('translator')->get('common.address'); ?> <span></span>
                                </label>
                                <textarea class="primary_input_field form-control has-content" cols="0" rows="3" name="address"
                                    id="address"><?php echo e(@$admission_query->address); ?></textarea>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="primary_input">
                                <label class="primary_input_label" for=""><?php echo app('translator')->get('common.description'); ?> <span></span>
                                </label>
                                <textarea class="primary_input_field form-control has-content" cols="0" rows="3" name="description"
                                    id="description"><?php echo e(@$admission_query->description); ?></textarea>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mt-25">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="no-gutters input-right-icon">
                                <div class="col">
                                    <div class="primary_input">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('common.date'); ?></label>
                                        <div class="position-relative">
                                            <input
                                                class="primary_input_field  primary_input_field date form-control form-control has-content"
                                                id="startDate" type="text"
                                                name="date" readonly="true"
                                                value="<?php echo e(@$admission_query->date != '' ? date('m/d/Y', strtotime(@$admission_query->date)) : date('m/d/Y')); ?>">
                                            <button class="btn-date" data-id="#date_from" type="button">
                                                <label class="m-0 p-0" for="startDate">
                                                    <i class="ti-calendar" id="start-date-icon"></i>
                                                </label>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="no-gutters input-right-icon">
                                <div class="col">
                                    <div class="primary_input">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('academics.next_follow_up_date'); ?></label>
                                        <div class="position-relative">
                                            <input
                                                class="primary_input_field  primary_input_field date form-control form-control has-content"
                                                id="endDate" type="text"
                                                name="next_follow_up_date" autocomplete="off" readonly="true"
                                                value="<?php echo e(@$admission_query->next_follow_up_date != '' ? date('m/d/Y', strtotime(@$admission_query->next_follow_up_date)) : date('m/d/Y')); ?>">
                                            <button class="btn-date" data-id="#date_from" type="button">
                                                <label class="m-0 p-0" for="endDate">
                                                    <i class="ti-calendar" id="end-date-icon"></i>
                                                </label>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="primary_input">
                                <label class="primary_input_label" for=""><?php echo app('translator')->get('academics.assigned'); ?>
                                    <span></span></label>
                                <input class="primary_input_field read-only-input form-control" type="text"
                                    name="assigned"
                                    value="<?php echo e(@$admission_query->assigned); ?>" id="assigned" required>

                                <span class="text-danger" id="assignedError"> </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mt-25">
                    <div class="row">
                        <div class="col-lg-3">
                            <label class="primary_input_label" for=""><?php echo app('translator')->get('academics.reference'); ?> <span></span></label>
                            <select class="primary_select " name="reference" id="reference" required>
                                <option data-display="<?php echo app('translator')->get('academics.reference'); ?>" value=""><?php echo app('translator')->get('academics.reference'); ?></option>
                                <?php $__currentLoopData = $references; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reference): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e(@$reference->id); ?>"
                                        <?php echo e(@$reference->id == @$admission_query->reference ? 'selected' : ''); ?>>
                                        <?php echo e(@$reference->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <span class="text-danger" id="referenceError"></span>
                        </div>
                        <div class="col-lg-3">
                            <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.source'); ?>
                                *<span></span></label>
                            <select class="primary_select " name="source" id="source" required>
                                <option data-display="<?php echo app('translator')->get('academics.source'); ?> *" value=""><?php echo app('translator')->get('academics.source'); ?> *
                                </option>
                                <?php $__currentLoopData = $sources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $source): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e(@$source->id); ?>"
                                        <?php echo e(@$source->id == @$admission_query->source ? 'selected' : ''); ?>>
                                        <?php echo e(@$source->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <span class="text-danger" id="sourceError">
                            </span>
                        </div>
                        <?php if(moduleStatusCheck('University') == false): ?>
                            <div class="col-lg-3">
                                <label class="primary_input_label" for=""><?php echo app('translator')->get('common.class'); ?>
                                    *<span></span></label>
                                <select class="primary_select " name="class" id="class" id="class"
                                    required>

                                    <option data-display="<?php echo app('translator')->get('common.class'); ?>" value=""><?php echo app('translator')->get('common.class'); ?>
                                    </option>
                                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e(@$class->id); ?>"
                                            <?php echo e(@$class->id == @$admission_query->class ? 'selected' : ''); ?>>
                                            <?php echo e(@$class->class_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <span class="text-danger" id="classError"></span>
                            </div>
                        <?php endif; ?>
                        <div class="col-lg-3">
                            <div class="primary_input">
                                <label class="primary_input_label" for=""><?php echo app('translator')->get('academics.number_of_child'); ?>
                                    <span></span></label>
                                <input oninput="numberCheck(this)"
                                    class="primary_input_field form-control has-content" type="text"
                                    name="no_of_child"
                                    value="<?php echo e(@$admission_query->no_of_child); ?>" id="no_of_child" required>

                                <span class="text-danger" id="no_of_childError"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if(moduleStatusCheck('University')): ?>
                    <div class="col-lg-12 mt-25">
                        <div class="row">
                            <?php if(moduleStatusCheck('University')): ?>
                                <?php if ($__env->exists(
                                    'university::common.session_faculty_depart_academic_semester_level',
                                    [
                                        'div' => 'col-lg-4',
                                        'niceSelect' => 'niceSelect1',
                                        'rowMt' => 'mt-25',
                                        'hide' => ['USUB'],
                                        'required' => ['USN', 'UF', 'UD', 'UA', 'US', 'USL'],
                                    ]
                                )) echo $__env->make(
                                    'university::common.session_faculty_depart_academic_semester_level',
                                    [
                                        'div' => 'col-lg-4',
                                        'niceSelect' => 'niceSelect1',
                                        'rowMt' => 'mt-25',
                                        'hide' => ['USUB'],
                                        'required' => ['USN', 'UF', 'UD', 'UA', 'US', 'USL'],
                                    ]
                                , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <input type="hidden" name="un_academic_id" id="select_academic"
                                    value="<?php echo e(getAcademicId()); ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="col-lg-12 text-center mt-40">
                    <div class="mt-40 d-flex justify-content-between">
                        <button type="button" class="primary-btn tr-bg"
                            data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                        <button class="primary-btn fix-gr-bg submit" id="update_button_query"
                            type="submit"><?php echo app('translator')->get('common.update'); ?></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php echo e(Form::close()); ?>


<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>
    $('.input-right-icon button').on("click", function(){
        $(this).parent().find("input").focus();
    });

    $("#search-icon").on("click", function() {
        $("#search").focus();
    });

    $("#start-date-icon").on("click", function() {
        $("#startDate").focus();
    });

    $("#end-date-icon").on("click", function() {
        $("#endDate").focus();
    });

    $(".primary_input_field.date").datepicker({
        autoclose: true,
        setDate: new Date(),
    });
    $(".primary_input_field.date").on("changeDate", function(ev) {
        // $(this).datepicker('hide');
        $(this).focus();
    });

    $(".primary_input_field.time").datetimepicker({
        format: "LT",
    });

    if ($(".niceSelect1").length) {
        $(".niceSelect1").niceSelect();
    }

    $(".primary_select").niceSelect('destroy');
    $(".primary_select").niceSelect();
</script>


<!-- End Sibling Add Modal -->
<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\admin\admission_query_edit.blade.php ENDPATH**/ ?>
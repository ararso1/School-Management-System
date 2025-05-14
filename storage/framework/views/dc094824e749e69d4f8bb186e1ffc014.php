<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('student.multi_class_student'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
    <section class="sms-breadcrumb mb-20 up_breadcrumb">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('student.multi_class_student'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('student.student_information'); ?></a>
                    <a href="#"><?php echo app('translator')->get('student.multi_class_student'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-8 col-md-6 col-sm-6">
                    <div class="main-title mt_0_sm mt_0_md">
                        <h3 class="mb-30  "><?php echo app('translator')->get('common.select_criteria'); ?></h3>
                    </div>
                </div>
            </div>
            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'student.multi-class-student', 'method' => 'GET', 'enctype' => 'multipart/form-data', 'id' => 'infix_form'])); ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">
                        <div class="row">
                           


                            <?php if(moduleStatusCheck('University')): ?>
                                <?php if ($__env->exists('university::common.session_faculty_depart_academic_semester_level',
                                    ['mt' => 'mt-30', 'hide' => ['USUB'], 'required' => ['USEC']])) echo $__env->make('university::common.session_faculty_depart_academic_semester_level',
                                    ['mt' => 'mt-30', 'hide' => ['USUB'], 'required' => ['USEC']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <div class="col-lg-3 mt-25">
                                    <div class="input-effect sm2_mb_20 md_mb_20">
                                        <input class="primary-input" type="text" name="name"
                                            value="<?php echo e(isset($name) ? $name : ''); ?>">
                                        <label><?php echo app('translator')->get('student.search_by_name'); ?></label>
                                        <span class="focus-border"></span>
                                    </div>
                                </div>
                                <div class="col-lg-3 mt-25">
                                    <div class="input-effect md_mb_20">
                                        <input class="primary-input" type="text" name="roll_no"
                                            value="<?php echo e(isset($roll_no) ? $roll_no : ''); ?>">
                                        <label><?php echo app('translator')->get('student.search_by_roll_no'); ?></label>
                                        <span class="focus-border"></span>
                                    </div>
                                </div>
                            <?php else: ?>
                                <?php echo $__env->make('backEnd.common.academic_class_section_subject_student', [
                                    'div'=>'col-lg-3',
                                    'visiable'=>['academic', 'class', 'section', 'student'], 
                                    
                                    
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                               
                            <?php endif; ?>
                            <div class="col-lg-12 mt-20 text-right">
                                <button type="submit" class="primary-btn small fix-gr-bg" id="btnsubmit">
                                    <span class="ti-search pr-2"></span>
                                    <?php echo app('translator')->get('common.search'); ?>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <?php echo e(Form::close()); ?>

            <?php if(@$student_detail): ?>
            <div class="row mt-40 full_wide_table">
                <div class="col-lg-12">
                    <div class="row">
                            <div class="col-lg-3">
                                <?php if ($__env->exists('backEnd.studentInformation.inc.student_profile')) echo $__env->make('backEnd.studentInformation.inc.student_profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>

                            <!-- Start Student Details -->
                            <div class="col-lg-9 student-details up_admin_visitor">
                                <div class="white-box mt-40">
                                    <div class="text-right mb-20">
                                        <button class="primary-btn-small-input primary-btn small fix-gr-bg" type="button"
                                            data-toggle="modal" data-target="#assignClass"> <span
                                                class="ti-plus pr-2"></span> <?php echo app('translator')->get('common.add'); ?></button>
                                    </div>
                                    <table id="" class="table simple-table table-responsive school-table"
                                        cellspacing="0">
                                        <thead class="d-block">
                                            <tr class="d-flex">
                                                <?php
                                                    $div = generalSetting()->multiple_roll == 1 ? 'col-3' : 'col-4';
                                                ?>
                                                <?php if(moduleStatusCheck('University')): ?>
                                                    <th class="col-3"><?php echo app('translator')->get('university::un.faculty'); ?></th>
                                                    <th class="col-3"><?php echo app('translator')->get('university::un.department'); ?></th>
                                                <?php else: ?>
                                                    <th class="<?php echo e($div); ?>"><?php echo app('translator')->get('common.class'); ?></th>
                                                    <th class="<?php echo e($div); ?>"><?php echo app('translator')->get('common.section'); ?></th>
                                                <?php endif; ?>
                                                <?php if(generalSetting()->multiple_roll == 1): ?>
                                                    <th class="<?php echo e($div); ?>"><?php echo app('translator')->get('student.id_number'); ?></th>
                                                <?php endif; ?>
                                                <th class="<?php echo e($div); ?>"><?php echo app('translator')->get('student.action'); ?></th>
                                            </tr>
                                        </thead>

                                        <tbody class="d-block">
                                            <?php $__currentLoopData = $student_detail->studentRecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="d-flex">
                                                    <td class="<?php echo e($div); ?>">
                                                        <?php echo e(moduleStatusCheck('University') ? $record->unFaculty->name : $record->class->class_name); ?>

                                                        <?php if($record->is_default): ?>
                                                            <span class="badge fix-gr-bg">
                                                                <?php echo e(__('common.default')); ?>

                                                            </span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="<?php echo e($div); ?>">
                                                        <?php echo e(moduleStatusCheck('University') ? $record->unDepartment->name : $record->section->section_name); ?>

                                                    </td>
                                                    <?php if(generalSetting()->multiple_roll == 1): ?>
                                                        <td class="<?php echo e($div); ?>"><?php echo e($record->roll_no); ?></td>
                                                    <?php endif; ?>
                                                    <td class="<?php echo e($div); ?>">

                                                        <a class="primary-btn icon-only fix-gr-bg modalLink"
                                                            data-modal-size="small-modal"
                                                            title=" <?php if(moduleStatusCheck('University')): ?> <?php echo app('translator')->get('university::un.assign_faculty_department'); ?>
                                                    <?php else: ?>
                                                       <?php echo app('translator')->get('student.edit_assign_class'); ?> <?php endif; ?>"
                                                            href="<?php echo e(route('student_assign_edit', [@$record->student_id, @$record->id])); ?>"><span
                                                                class="ti-pencil"></span></a>
                                                        <a href="#" class="primary-btn icon-only fix-gr-bg"
                                                            data-toggle="modal"
                                                            data-target="#deleteRecord_<?php echo e($record->id); ?>">
                                                            <span class="ti-trash"></span>
                                                        </a>
                                                    </td>
                                                </tr>




                                                

                                                <div class="modal fade admin-query"
                                                    id="deleteRecord_<?php echo e($record->id); ?>">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title"><?php echo app('translator')->get('common.delete'); ?></h4>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal">&times;</button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <div class="text-center">
                                                                    <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                                                                </div>

                                                                <div class="mt-40 d-flex justify-content-between">
                                                                    <button type="button" class="primary-btn tr-bg"
                                                                        data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>

                                                                    <form action="<?php echo e(route('student.record.delete')); ?>"
                                                                        method="POST">
                                                                        <?php echo csrf_field(); ?>
                                                                        <input type="hidden" name="student_id"
                                                                            value="<?php echo e($record->student_id); ?>">
                                                                        <input type="hidden" name="record_id"
                                                                            value="<?php echo e($record->id); ?>">

                                                                        <button type="submit"
                                                                            class="primary-btn fix-gr-bg"><?php echo app('translator')->get('common.delete'); ?></button>

                                                                    </form>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                

                                                
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- End Student Details -->
                    </div>
                </div>
            </div>
            <!-- assign class form modal start-->
            <div class="modal fade admin-query" id="assignClass">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">
                                <?php if(moduleStatusCheck('University')): ?>
                                    <?php echo app('translator')->get('university::un.assign_faculty_department'); ?>
                                <?php else: ?>
                                    <?php echo app('translator')->get('student.assign_class'); ?>
                                <?php endif; ?>
                            </h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <div class="modal-body">
                            <div class="container-fluid">
                                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'student.record.store', 'method' => 'POST'])); ?>



                                <input type="hidden" name="student_id" value="<?php echo e($student_detail->id); ?>">
                                <?php if(!moduleStatusCheck('University')): ?>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="input-effect sm2_mb_20 md_mb_20">
                                                <select
                                                    class="niceSelect w-100 bb form-control<?php echo e($errors->has('session') ? ' is-invalid' : ''); ?>"
                                                    name="session" id="academic_year">
                                                    <option data-display="<?php echo app('translator')->get('common.academic_year'); ?> *" value="">
                                                        <?php echo app('translator')->get('common.academic_year'); ?> *</option>
                                                    <?php $__currentLoopData = $sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($session->id); ?>"
                                                            <?php echo e(old('session') == $session->id ? 'selected' : ''); ?>>
                                                            <?php echo e($session->year); ?>[<?php echo e($session->title); ?>]</option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <span class="focus-border"></span>
                                                <?php if($errors->has('session')): ?>
                                                    <span class="invalid-feedback invalid-select" role="alert">
                                                        <strong><?php echo e($errors->first('session')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-25">
                                        <div class="col-lg-12">
                                            <div class="input-effect sm2_mb_20 md_mb_20" id="class-div">
                                                <select
                                                    class="niceSelect w-100 bb form-control<?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>"
                                                    name="class" id="classSelectStudent">
                                                    <option data-display="<?php echo app('translator')->get('common.class'); ?> *" value="">
                                                        <?php echo app('translator')->get('common.class'); ?> *</option>
                                                </select>
                                                <div class="pull-right loader loader_style" id="select_class_loader">
                                                    <img class="loader_img_style"
                                                        src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>"
                                                        alt="loader">
                                                </div>
                                                <span class="focus-border"></span>
                                                <?php if($errors->has('class')): ?>
                                                    <span class="invalid-feedback invalid-select" role="alert">
                                                        <strong><?php echo e($errors->first('class')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-25">
                                        <div class="col-lg-12">
                                            <div class="input-effect sm2_mb_20 md_mb_20" id="sectionStudentDiv">
                                                <select
                                                    class="niceSelect w-100 bb form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?>"
                                                    name="section" id="sectionSelectStudent">
                                                    <option data-display="<?php echo app('translator')->get('common.section'); ?> *" value="">
                                                        <?php echo app('translator')->get('common.section'); ?> *</option>
                                                </select>
                                                <div class="pull-right loader loader_style" id="select_section_loader">
                                                    <img class="loader_img_style"
                                                        src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>"
                                                        alt="loader">
                                                </div>
                                                <span class="focus-border"></span>
                                                <?php if($errors->has('section')): ?>
                                                    <span class="invalid-feedback invalid-select" role="alert">
                                                        <strong><?php echo e($errors->first('section')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <?php if ($__env->exists('university::common.session_faculty_depart_academic_semester_level',
                                        [
                                            'mt' => 'mt-0',
                                            'required' => ['USN', 'UF', 'UD', 'UA', 'US', 'USL'],
                                            'row' => 1,
                                            'div' => 'col-lg-12',
                                            'hide' => ['USUB'],
                                        ])) echo $__env->make('university::common.session_faculty_depart_academic_semester_level',
                                        [
                                            'mt' => 'mt-0',
                                            'required' => ['USN', 'UF', 'UD', 'UA', 'US', 'USL'],
                                            'row' => 1,
                                            'div' => 'col-lg-12',
                                            'hide' => ['USUB'],
                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?>
                                <?php if(generalSetting()->multiple_roll == 1): ?>
                                    <div class="row mt-25">
                                        <div class="col-lg-12">
                                            <div class="input-effect sm2_mb_20 md_mb_20">
                                                <input oninput="numberCheck(this)" class="primary-input" type="text"
                                                    id="roll_number" name="roll_number"
                                                    value="<?php echo e(old('roll_number')); ?>">
                                                <label>
                                                    <?php echo e(moduleStatusCheck('Lead') == true ? __('lead::lead.id_number') : __('student.roll')); ?>

                                                    <?php if(is_required('roll_number') == true): ?>
                                                        <span> *</span>
                                                    <?php endif; ?>
                                                </label>
                                                <span class="focus-border"></span>
                                                <span class="text-danger" id="roll-error" role="alert">
                                                    <strong></strong>
                                                </span>
                                                <?php if($errors->has('roll_number')): ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($errors->first('roll_number')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="row  mt-25">
                                    <div class="col-lg-12">
                                        <label for="is_default"><?php echo app('translator')->get('student.is_default'); ?></label>
                                        <div class="d-flex radio-btn-flex mt-10">

                                            <div class="mr-30">
                                                <input type="radio" name="is_default" id="isDefaultYes" value="1"
                                                    class="common-radio relationButton">
                                                <label for="isDefaultYes"><?php echo app('translator')->get('common.yes'); ?></label>
                                            </div>
                                            <div class="mr-30">
                                                <input type="radio" name="is_default" id="isDefaultNo" value="0"
                                                    class="common-radio relationButton" checked>
                                                <label for="isDefaultNo"><?php echo app('translator')->get('common.no'); ?></label>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-12 text-center mt-20">
                                    <div class="mt-40 d-flex justify-content-between">
                                        <button type="button" class="primary-btn tr-bg"
                                            data-dismiss="modal"><?php echo app('translator')->get('admin.cancel'); ?></button>
                                        <button class="primary-btn fix-gr-bg submit" id="save_button_query"
                                            type="submit"><?php echo app('translator')->get('admin.save'); ?></button>
                                    </div>
                                </div>
                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- assign class form modal end-->
            <?php endif; ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script>
     $(document).ready(function() {
        $("#assign_class_academic_year").on(
            "change",
            function() {
                var url = $("#url").val();
                var i = 0;
                var formData = {
                    id: $(this).val(),
                };
                
                alert($(this).val());
                // get section for student
                $.ajax({
                    type: "GET",
                    data: formData,
                    dataType: "json",
                    url: url + "/" + "academic-year-get-class",

                    beforeSend: function() {
                        $('#select_class_loader').addClass('pre_loader');
                        $('#select_class_loader').removeClass('loader');
                    },

                    success: function(data) {
                        $("#classSelectStudent").empty().append(
                            $("<option>", {
                                value:  '',
                                text: window.jsLang('select_class') + ' *',
                            })
                        );

                        if (data[0].length) {
                            $.each(data[0], function(i, className) {
                                $("#classSelectStudent").append(
                                    $("<option>", {
                                        value: className.id,
                                        text: className.class_name,
                                    })
                                );
                            });
                        } 
                        $('#classSelectStudent').niceSelect('update');
                        $('#classSelectStudent').trigger('change');
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    },
                    complete: function() {
                        i--;
                        if (i <= 0) {
                            $('#select_class_loader').removeClass('pre_loader');
                            $('#select_class_loader').addClass('loader');
                        }
                    }
                });
            }
        );
    });
</script>
    
<?php $__env->stopPush(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\studentInformation\multi_class_student_copy.blade.php ENDPATH**/ ?>
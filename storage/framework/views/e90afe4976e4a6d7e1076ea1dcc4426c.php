<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('lesson::lesson.edit_lesson'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
<style>
    input#lesson {
        padding-top: 5px !important;
    }
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>

    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('lesson::lesson.edit_lesson'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('lesson::lesson.lesson'); ?></a>
                    <a href="#"><?php echo app('translator')->get('lesson::lesson.edit_lesson'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <?php if(isset($lesson)): ?>
                <?php if(userPermission("lesson.create-store")): ?>
                    <div class="row">
                        <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                            <a href="<?php echo e(url('/lesson')); ?>" class="primary-btn small fix-gr-bg">
                                <span class="ti-plus pr-2"></span>
                                <?php echo app('translator')->get('common.add'); ?>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>


            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'lesson-update', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

            <div class="row">

                <div class="col-lg-3">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-title">
                                <h3 class="mb-30">
                                    <?php echo app('translator')->get('lesson::lesson.edit_lesson'); ?>


                                </h3>
                            </div>
                            <div class="white-box">
                                <div class="add-visitor">


                                    <?php if(moduleStatusCheck('University')): ?>
                                        <div class="" readonly="">
                                            <?php if ($__env->exists('university::common.session_faculty_depart_academic_semester_level',
                                                [
                                                    'row' => 1,
                                                    'div' => 'col-lg-12',
                                                    'mt' => 'mt-0',
                                                    'required' => [
                                                        'USN',
                                                        'UD',
                                                        'UA',
                                                        'US',
                                                        'USL',
                                                        'USUB',
                                                        'disabled' => 'disabled',
                                                    ],
                                                ])) echo $__env->make('university::common.session_faculty_depart_academic_semester_level',
                                                [
                                                    'row' => 1,
                                                    'div' => 'col-lg-12',
                                                    'mt' => 'mt-0',
                                                    'required' => [
                                                        'USN',
                                                        'UD',
                                                        'UA',
                                                        'US',
                                                        'USL',
                                                        'USUB',
                                                        'disabled' => 'disabled',
                                                    ],
                                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    <?php else: ?>
                                        <div class="row ">
                                            <div class="col-lg-12">
                                                <label class="primary_input_label" for="">
                                                    <?php echo e(__('common.class')); ?>

                                                        <span class="text-danger"> *</span>
                                                </label>
                                                <select
                                                    class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>"
                                                    id="select_class" name="class" disabled="">
                                                    <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value="">
                                                        <?php echo app('translator')->get('common.class'); ?> *</option>
                                                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e(@$class->id); ?>"
                                                            <?php echo e(@$class->id == @$lesson->class_id ? 'selected' : ''); ?>>
                                                            <?php echo e(@$class->class_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php if($errors->has('class')): ?>
                                                    <span class="text-danger invalid-select" role="alert">
                                                        <?php echo e($errors->first('class')); ?></span>
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
                                                    class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?> select_section"
                                                    id="select_section" name="section" disabled="">
                                                    <option data-display="<?php echo app('translator')->get('common.select_section'); ?> *" value="">
                                                        <?php echo app('translator')->get('common.select_section'); ?> *</option>
                                                    <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e(@$section->id); ?>"
                                                            <?php echo e(@$section->id == @$lesson->section_id ? 'selected' : ''); ?>>
                                                            <?php echo e(@$section->section_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <div class="pull-right loader loader_style" id="select_section_loader">
                                                    <img src="<?php echo e(asset('public/backEnd/image/pre-loader.gif')); ?>"
                                                        alt="" class="loader_img_style">
                                                </div>
                                                <?php if($errors->has('section')): ?>
                                                    <span class="text-danger invalid-select" role="alert">
                                                        <?php echo e($errors->first('section')); ?></span>
                                                <?php endif; ?>

                                            </div>
                                        </div>
                                        <div class="row mt-15" id="">
                                            <div class="col-lg-12" id="select_subject_div">
                                                <label class="primary_input_label" for="">
                                                    <?php echo e(__('common.subject')); ?>

                                                        <span class="text-danger"> *</span>
                                                </label>
                                                <select
                                                    class="primary_select form-control<?php echo e($errors->has('subject') ? ' is-invalid' : ''); ?>"
                                                    id="select_subject" name="subject" disabled="">
                                                    <option data-display="<?php echo app('translator')->get('common.select_subjects'); ?> *" value="">
                                                        <?php echo app('translator')->get('common.select_subjects'); ?>*</option>
                                                    <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e(@$subject->id); ?>"
                                                            <?php echo e(@$subject->id == @$lesson->subject_id ? 'selected' : ''); ?>>
                                                            <?php echo e(@$subject->subject_name); ?>

                                                            (<?php echo e($subject->subject_type == 'T' ? 'Theory' : 'Practical'); ?>)
                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <div class="pull-right loader" id="select_subject_loader"
                                                    style="margin-top: -30px;padding-right: 21px;">
                                                    <img src="<?php echo e(asset('public/backEnd/image/pre-loader.gif')); ?>"
                                                        alt="" style="width: 28px;height:28px;">
                                                </div>
                                                <?php if($errors->has('subject')): ?>
                                                    <span class="text-danger invalid-select" role="alert">
                                                        <?php echo e($errors->first('subject')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="white-box mt-10">
                                <div class="row">

                                </div>
                                <table class="" id="productTable">
                                    <thead>
                                        <tr>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $lesson_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr id="row1">
                                                <td class="pt-2">
                                                    <input type="hidden" name="lesson_detail_id[]"
                                                        value="<?php echo e($lesson_item->id); ?>">
                                                    <input type="hidden" name="url" id="url"
                                                        value="<?php echo e(URL::to('/')); ?>">
                                                    <div class="primary_input">
                                                        <input
                                                            class="primary_input_field form-control<?php echo e($errors->has('lesson') ? ' is-invalid' : ''); ?>"
                                                            type="text" id="lesson"
                                                            placeholder="<?php echo e(__('common.title')); ?>" name="lesson[]"
                                                            autocomplete="off" value="<?php echo e($lesson_item->lesson_title); ?>"
                                                            required="" style="padding-top: 20px">

                                                    </div>
                                                </td>

                                                <td class="pt-2">
                                                    <a href="<?php echo e(url('/lesson/lesson-item-delete/' . $lesson_item->id)); ?>"
                                                        onclick="return confirm('Are You Sure??')"> <button
                                                            class="primary-btn icon-only fix-gr-bg" type="button">
                                                            <span class="ti-trash"></span>
                                                        </button>
                                                    </a>

                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <?php
                    $tooltip = '';
                    if (userPermission("lesson.create-store")) {
                    $tooltip = '';
                    }elseif(userPermission("lesson-edit") && isset($lesson)){
                        $tooltip = '';
                    } else {
                    $tooltip = 'You have no permission to add';
                    }
                ?>
                    <div class="row mt-40">
                        <div class="col-lg-12">
                            <div class="white-box">
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn fix-gr-bg" data-toggle="tooltip"
                                            title="<?php echo e(@$tooltip); ?>">
                                            <span class="ti-check"></span>

                                            <?php echo app('translator')->get('lesson::lesson.update_lesson'); ?>

                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php echo e(Form::close()); ?>


                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-4 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-0"><?php echo app('translator')->get('lesson::lesson.lesson_list'); ?></h3>
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
                                        <?php if(moduleStatusCheck('University')): ?>
                                            <th><?php echo app('translator')->get('university::un.session'); ?></th>
                                            <th><?php echo app('translator')->get('university::un.faculty'); ?></th>
                                            <th><?php echo app('translator')->get('university::un.department'); ?></th>
                                            <th><?php echo app('translator')->get('university::un.academic'); ?></th>
                                            <th><?php echo app('translator')->get('university::un.semester'); ?></th>
                                            <th><?php echo app('translator')->get('university::un.semester_label'); ?></th>
                                        <?php else: ?>
                                            <th><?php echo app('translator')->get('common.class'); ?></th>
                                            <th><?php echo app('translator')->get('common.section'); ?></th>
                                        <?php endif; ?>
                                        <th><?php echo app('translator')->get('lesson::lesson.subject'); ?></th>
                                        <th><?php echo app('translator')->get('lesson::lesson.lesson'); ?></th>
                                        <th><?php echo app('translator')->get('common.action'); ?></th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    <?php $__currentLoopData = $lessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <?php if(moduleStatusCheck('University')): ?>
                                                <td> <?php echo e($lesson->unSession->name); ?></td>
                                                <td> <?php echo e($lesson->unFaculty->name); ?></td>
                                                <td> <?php echo e($lesson->unDepartment->name); ?></td>
                                                <td> <?php echo e($lesson->unAcademic->name); ?></td>
                                                <td> <?php echo e($lesson->unSemester->name); ?></td>
                                                <td> <?php echo e($lesson->unSemesterLabel->name); ?></td>
                                                <td> <?php echo e($lesson->unSubject->subject_name); ?></td>
                                            <?php else: ?>
                                                <td><?php echo e($lesson->class != '' ? $lesson->class->class_name : ''); ?></td>
                                                <td><?php echo e($lesson->section != '' ? $lesson->section->section_name : ''); ?></td>
                                                <td><?php echo e($lesson->subject != '' ? $lesson->subject->subject_name : ''); ?></td>
                                            <?php endif; ?>

                                            <td>

                                                <?php
                                                    $lesson_title = Modules\Lesson\Entities\SmLesson::lessonName($lesson->class_id,
                                                    $lesson->section_id, $lesson->subject_id);
                                                ?>
                                                <?php $__currentLoopData = $lesson_title; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="row">
                                                        <div class="col-sm-10"> <?php echo e($data->lesson_title); ?>

                                                            <?php echo e(!$loop->last ? ',' : ''); ?> </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </td>

                                            <td>
                                                <?php if (isset($component)) { $__componentOriginalf5ee9bc45d6af00850b10ff7521278be = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf5ee9bc45d6af00850b10ff7521278be = $attributes; } ?>
<?php $component = App\View\Components\DropDown::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('drop-down'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\DropDown::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                    <?php if(userPermission("lesson-edit")): ?>
                                                        <?php if(moduleStatusCheck('University')): ?>
                                                            <?php if($lesson->class_id == null): ?>
                                                                <a class="dropdown-item"
                                                                   href="<?php echo e(route('un-lesson-edit', [$lesson->un_session_id, $lesson->un_faculty_id ?? 0, $lesson->un_department_id, $lesson->un_academic_id, $lesson->un_semester_id, $lesson->un_semester_label_id, $lesson->un_subject_id ?? 0])); ?>"><?php echo app('translator')->get('common.edit'); ?></a>
                                                            <?php endif; ?>
                                                        <?php else: ?>
                                                            <?php if($lesson->class_id != null): ?>
                                                                <a class="dropdown-item"
                                                                   href="<?php echo e(route('lesson-edit', [$lesson->class_id, $lesson->section_id, $lesson->subject_id])); ?>"><?php echo app('translator')->get('common.edit'); ?></a>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                    <?php if(userPermission("lesson-delete")): ?>
                                                        <a class="dropdown-item" data-toggle="modal"
                                                           data-target="#deleteExamModal<?php echo e($lesson->id); ?>"
                                                           href="#"><?php echo app('translator')->get('common.delete'); ?></a>
                                                    <?php endif; ?>
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf5ee9bc45d6af00850b10ff7521278be)): ?>
<?php $attributes = $__attributesOriginalf5ee9bc45d6af00850b10ff7521278be; ?>
<?php unset($__attributesOriginalf5ee9bc45d6af00850b10ff7521278be); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf5ee9bc45d6af00850b10ff7521278be)): ?>
<?php $component = $__componentOriginalf5ee9bc45d6af00850b10ff7521278be; ?>
<?php unset($__componentOriginalf5ee9bc45d6af00850b10ff7521278be); ?>
<?php endif; ?>
                                            </td>
                                        </tr>
                                        <div class="modal fade admin-query" id="deleteExamModal<?php echo e($lesson->id); ?>">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title"><?php echo app('translator')->get('lesson::lesson.delete_lesson'); ?></h4>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            &times;
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                                                        </div>

                                                        <div class="mt-40 d-flex justify-content-between">
                                                            <button type="button" class="primary-btn tr-bg"
                                                                    data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                                                            <?php echo e(Form::open(['route' => ['lesson-delete', $lesson->id], 'method' => 'DELETE', 'enctype' => 'multipart/form-data'])); ?>

                                                            <button class="primary-btn fix-gr-bg"
                                                                    type="submit"><?php echo app('translator')->get('common.delete'); ?></button>
                                                            <?php echo e(Form::close()); ?>

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
     
 <div class="modal fade admin-query" id="deleteLessonModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo app('translator')->get('lesson::lesson.delete_lesson'); ?></h4>
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
                    <?php echo e(Form::open(['route' => ['lesson-destroy'], 'method' => 'Post', 'enctype' => 'multipart/form-data'])); ?>

                    <input type="hidden" name="id" value="">
                    <button class="primary-btn fix-gr-bg"
                        type="submit"><?php echo app('translator')->get('common.delete'); ?></button>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startPush('script'); ?>  

<script>
    function deleteLesson(id){
        var modal = $('#deleteLessonModal');
        modal.find('input[name=id]').val(id)
        modal.modal('show');
    }
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Modules\Lesson\Resources\views\lesson\edit_lesson.blade.php ENDPATH**/ ?>
<?php $routine_page_title="All about Infix School management system; School management software"; ?>

<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/')); ?>/frontend/css/new_style.css" />
    <link rel="stylesheet" href="<?php echo e(url('/public/')); ?>/landing/css/toastr.css">
    <link rel="stylesheet" href="<?php echo e(url('/public/')); ?>/backEnd/assets/vendors/static_style2.css">
    <link rel="stylesheet" href="<?php echo e(url('/public/')); ?>/backEnd/assets/vendors/vendors_static_style.css">
    <style>
        table.table.class_exam_routine_table tbody tr td:first-child {
            padding-left: 35px !important;
        }

        table.table.class_exam_routine_table tbody tr td:nth-child(2) {
            padding-left: 20px !important;
        }

        table.table.class_exam_routine_table tbody tr td {
            padding-left: 45px !important;
        }

        table.table.table-bordered {
            font-weight: 400;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('main_content'); ?>
    <!--================ Home Banner Area =================-->
    <?php if($routine_page): ?>
        <section class="container box-1420">
            <div class="banner-area"
                style="background: linear-gradient(0deg, rgba(124, 50, 255, 0.6), rgba(199, 56, 216, 0.6)), url(<?php echo e($routine_page->image != '' ? $routine_page->image : '../img/client/common-banner1.jpg'); ?>) no-repeat center;">
                <div class="banner-inner">
                    <div class="banner-content">
                        <h2><?php echo e($routine_page->title); ?></h2>
                        <p><?php echo e($routine_page->description); ?></p>
                        <a class="primary-btn fix-gr-bg semi-large"
                            href="<?php echo e($routine_page->button_url); ?>"><?php echo e($routine_page->button_text); ?></a>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!--================ End Home Banner Area =================-->

    <!--================ Start Search Area =================-->
    <section class="fact-area section-gap">
        <div class="container">
            <form method="get" action="<?php echo e(route('class-exam-routine-search')); ?>">
                <div class="row align-items-center">
                    <?php echo csrf_field(); ?>
                    <div class="col-lg-3 mt-30-md">
                        <label class="primary_input_label" for="">
                            <?php echo e(__('reports.type')); ?>

                            <span class="text-danger"> *</span>
                        </label>
                        <select class="primary_select form-control<?php echo e($errors->has('type') ? ' is-invalid' : ''); ?>"
                            name="type" onchange="hideShowExamName(this)">
                            <option data-display="<?php echo app('translator')->get('reports.select_type'); ?> *" value="">
                                <?php echo app('translator')->get('reports.select_type'); ?> *</option>
                            <?php if($routine_page->class_routine == 'show'): ?>
                                <option data-display="<?php echo app('translator')->get('reports.class_routine'); ?>" value="class">
                                    <?php echo app('translator')->get('reports.class_routine'); ?></option>
                            <?php endif; ?>
                            <?php if($routine_page->exam_routine == 'show'): ?>
                                <option data-display="<?php echo app('translator')->get('reports.exam_routine'); ?>" value="exam">
                                    <?php echo app('translator')->get('reports.exam_routine'); ?></option>
                            <?php endif; ?>
                        </select>
                        <?php if($errors->has('type')): ?>
                            <span class="text-danger invalid-select" role="alert">
                                <?php echo e($errors->first('type')); ?>

                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-3 mt-30-md">
                        <label class="primary_input_label" for="">
                            <?php echo e(__('common.class')); ?>

                            <span class="text-danger"> *</span>
                        </label>
                        <select
                            class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>"
                            name="class">
                            <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value="">
                                <?php echo app('translator')->get('common.select_class'); ?> *
                            </option>
                            <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e(@$class->id); ?>"
                                    <?php echo e(isset($class_id) ? ($class_id == $class->id ? 'selected' : '') : ''); ?>>
                                    <?php echo e(@$class->class_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if($errors->has('class')): ?>
                            <span class="text-danger invalid-select" role="alert">
                                <?php echo e($errors->first('class')); ?>

                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-3 mt-30-md">
                        <label class="primary_input_label"
                            for=""><?php echo e(__('common.section')); ?>

                            <span class="text-danger"> *</span>
                        </label>
                        <select
                            class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?>"
                            name="section">
                            <option data-display="<?php echo app('translator')->get('common.select_section'); ?> *" value="">
                                <?php echo app('translator')->get('common.select_section'); ?> *
                            </option>
                            <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e(@$section->id); ?>"
                                    <?php echo e(isset($section_id) ? ($section_id == $section->id ? 'selected' : '') : ''); ?>>
                                    <?php echo e(@$section->section_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <div class="pull-right loader loader_style">
                            <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>"
                                alt="loader">
                        </div>
                        <?php if($errors->has('section')): ?>
                            <span class="text-danger invalid-select" role="alert">
                                <?php echo e($errors->first('section')); ?>

                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-3 mt-30-md" id="exam_field_hide_show" style="display: none">
                        <label class="primary_input_label" for="">
                            <?php echo e(__('exam.exam')); ?>

                            <span class="text-danger"> *</span>
                        </label>
                        <select class="primary_select form-control<?php echo e($errors->has('exam') ? ' is-invalid' : ''); ?>"
                            name="exam">
                            <option data-display="<?php echo app('translator')->get('reports.select_exam'); ?> *" value="">
                                <?php echo app('translator')->get('reports.select_exam'); ?> *
                            </option>
                            <?php $__currentLoopData = $exam_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($exam->id); ?>"
                                    <?php echo e(isset($exam_term_id) ? ($exam->id == $exam_term_id ? 'selected' : '') : ''); ?>>
                                    <?php echo e($exam->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if($errors->has('exam')): ?>
                            <span class="text-danger invalid-select" role="alert">
                                <?php echo e($errors->first('exam')); ?>

                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-12 mt-20 text-right">
                        <button type="submit" class="primary-btn small fix-gr-bg">
                            <span class="ti-search"></span>
                            <?php echo app('translator')->get('common.search'); ?>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!--================ End Search Area =================-->

    <!--================ Start Class Routine Area =================-->
    <?php if(isset($sm_weekends)): ?>
        <section class="mt-20">
            <div class="container p-0">
                <div class="row mt-40">
                    <div class="col-lg-6 col-md-6">
                        <div class="main-title">
                            <h3 class="mb-30">
                                <?php echo app('translator')->get('reports.class_routine'); ?>- <?php echo e($header_class->class_name); ?>(<?php echo e($header_section->section_name); ?>)
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-30  col-md-6">
                        <a href="<?php echo e(route('classRoutinePrint', [$class_id, $section_id])); ?>"
                            class="primary-btn small fix-gr-bg pull-right" target="_blank"><i class="ti-printer"> </i>
                            <?php echo app('translator')->get('common.print'); ?></a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-bordered table-striped" style="width: 100%; table-layout: fixed">
                            <tr>
                                <th style="width:7%;padding: 2px; padding-left:8px;">
                                </th>
                                <?php
                                    $height = 0;
                                    $tr = [];
                                ?>
                                <?php $__currentLoopData = $sm_weekends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sm_weekend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($sm_weekend->classRoutine->count() > $height): ?>
                                        <?php
                                            $height = $sm_weekend->classRoutine->count();
                                        ?>
                                    <?php endif; ?>
                                    <th style="margin-top: 0px;padding: 2px; padding-left:8px"><?php echo e(@$sm_weekend->name); ?>

                                    </th>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tr>
                            <?php
                                $used = [];
                                $tr = [];
                            ?>
                            <?php $__currentLoopData = $sm_weekends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sm_weekend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $i = 0;
                                ?>
                                <?php $__currentLoopData = $sm_weekend->classRoutine; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $routine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        if (!in_array($routine->id, $used)) {
                                            $tr[$i][$sm_weekend->name][$loop->index]['subject'] = $routine->subject ? $routine->subject->subject_name : '';
                                            $tr[$i][$sm_weekend->name][$loop->index]['subject_code'] = $routine->subject ? $routine->subject->subject_code : '';
                                            $tr[$i][$sm_weekend->name][$loop->index]['class_room'] = $routine->classRoom ? $routine->classRoom->room_no : '';
                                            $tr[$i][$sm_weekend->name][$loop->index]['teacher'] = $routine->teacherDetail ? $routine->teacherDetail->full_name : '';
                                            $tr[$i][$sm_weekend->name][$loop->index]['start_time'] = $routine->start_time;
                                            $tr[$i][$sm_weekend->name][$loop->index]['end_time'] = $routine->end_time;
                                            $tr[$i][$sm_weekend->name][$loop->index]['is_break'] = $routine->is_break;
                                            $used[] = $routine->id;
                                        }
                                    ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $i++;
                                ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php for($i = 0; $i < $height; $i++): ?>
                                <tr style="border-bottom:1px solid #000000">
                                    <td
                                        style="padding-top:0px;padding-bottom:0px;font-size:14px !important; padding-left:8px">
                                        <?php echo app('translator')->get('common.time'); ?></td>
                                    <?php $__currentLoopData = $tr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $days): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $__currentLoopData = $sm_weekends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sm_weekend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <td style="padding-top:0px ;padding-bottom:0px; padding-left:8px">
                                                <?php
                                                    $classes = gv($days, $sm_weekend->name);
                                                ?>
                                                <?php if($classes && gv($classes, $i)): ?>
                                                    <span style="font-size:14px !important;">
                                                        <?php echo e(date('h:i A', strtotime(@$classes[$i]['start_time']))); ?> -
                                                        <?php echo e(date('h:i A', strtotime(@$classes[$i]['end_time']))); ?> </span>
                                                <?php endif; ?>
                                            </td>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                                <tr>
                                    <td
                                        style="padding-top:0px;padding-bottom:0px;font-size:14px !important; padding-left:8px">
                                        <?php echo app('translator')->get('common.details'); ?></td>
                                    <?php $__currentLoopData = $tr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $days): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $__currentLoopData = $sm_weekends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sm_weekend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <td style="padding-top:0px ;padding-bottom:0px; padding-left:8px">
                                                <?php
                                                    $classes = gv($days, $sm_weekend->name);
                                                ?>
                                                <?php if($classes && gv($classes, $i)): ?>
                                                    <?php if($classes[$i]['is_break']): ?>
                                                        <strong class="routineBorder"> <?php echo app('translator')->get('common.break'); ?> </strong>
                                                    <?php else: ?>
                                                        <?php if($classes[$i]['subject']): ?>
                                                            <span class=""> <strong> <?php echo e($classes[$i]['subject']); ?>

                                                                </strong>
                                                                <?php if($classes[$i]['class_room']): ?>
                                                                    (<?php echo e($classes[$i]['class_room']); ?>)
                                                                <?php endif; ?> <br>
                                                            </span>
                                                        <?php endif; ?>

                                                        <?php if($classes[$i]['teacher']): ?>
                                                            <span class=""> <?php echo e($classes[$i]['teacher']); ?> <br>
                                                            </span>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </td>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                            <?php endfor; ?>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!--================ End Class Routine Area =================-->

    <!--================ Start Exam Routine Area =================-->
    <?php if(isset($exam_schedules)): ?>
        <section class="mt-20">
            <div class="container p-0">
                <div class="row mt-40">
                    <div class="col-lg-6 col-md-6">
                        <div class="main-title">
                            <h3 class="mb-30">
                                <?php echo app('translator')->get('reports.exam_routine'); ?>- <?php echo e($header_class->class_name); ?>(<?php echo e($header_section->section_name); ?>)
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-30  col-md-6">
                        <a href="<?php echo e(route('exam-routine-print', [$class_id, $section_id, $exam_type_id])); ?>"
                            class="primary-btn small fix-gr-bg pull-right" target="_blank"><i class="ti-printer"> </i>
                            <?php echo app('translator')->get('common.print'); ?></a>
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
                            <table class="table class_exam_routine_table  table-bordered table-striped" width="100%">
                                <thead>
                                    <tr>
                                        <th><?php echo app('translator')->get('reports.date_&_day'); ?></th>
                                        <th><?php echo app('translator')->get('common.subject'); ?></th>
                                        <th><?php echo app('translator')->get('common.class_Sec'); ?></th>
                                        <th><?php echo app('translator')->get('common.teacher'); ?></th>
                                        <th><?php echo app('translator')->get('common.time'); ?></th>
                                        <th><?php echo app('translator')->get('common.duration'); ?></th>
                                        <th><?php echo app('translator')->get('common.room'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $exam_schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date => $exam_routine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(dateConvert($exam_routine->date)); ?>

                                                <br><?php echo e(Carbon::createFromFormat('Y-m-d', $exam_routine->date)->format('l')); ?>

                                            </td>
                                            <td>
                                                <strong>
                                                    <?php echo e($exam_routine->subject ? $exam_routine->subject->subject_name : ''); ?>

                                                </strong>
                                                <?php echo e($exam_routine->subject ? '(' . $exam_routine->subject->subject_code . ')' : ''); ?>

                                            </td>
                                            <td><?php echo e($exam_routine->class ? $exam_routine->class->class_name : ''); ?>

                                                <?php echo e($exam_routine->section ? '(' . $exam_routine->section->section_name . ')' : ''); ?>

                                            </td>
                                            <td><?php echo e($exam_routine->teacher ? $exam_routine->teacher->full_name : ''); ?></td>

                                            <td> <?php echo e(date('h:i A', strtotime(@$exam_routine->start_time))); ?> -
                                                <?php echo e(date('h:i A', strtotime(@$exam_routine->end_time))); ?> </td>
                                            <td>
                                                <?php
                                                    $duration = strtotime($exam_routine->end_time) - strtotime($exam_routine->start_time);
                                                ?>

                                                <?php echo e(timeCalculation($duration)); ?>

                                            </td>
                                            <td><?php echo e($exam_routine->classRoom ? $exam_routine->classRoom->room_no : ''); ?>

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
        </section>
    <?php endif; ?>
    <!--================ End Exam Routine Area =================-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="text/javascript" src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/toastr.min.js"></script>
    <?php echo Toastr::message(); ?>

    <script>
        function hideShowExamName(event) {
            let type = $(event).val();
            if (type === "exam") {
                $("#exam_field_hide_show").css("display", "block");
            } else {
                $("#exam_field_hide_show").css("display", "none");
            }
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontEnd.home.front_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\frontEnd\home\classExamRoutine.blade.php ENDPATH**/ ?>
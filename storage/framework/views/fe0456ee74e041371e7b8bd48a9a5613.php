<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('lesson::lesson.lesson_plan_overview'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
<style>

@media (max-width: 1200px){
    .dataTables_filter label{
        top: -20px;
        left: 50%!important;
    }
}

@media (max-width: 991px){
    .dataTables_filter label{
        top: -20px!important;
        width: 100%;
    }

}
@media (max-width: 767px){
    .dataTables_filter label{
        top: -20px!important;
        width: 100%;
    }

    .dt-buttons{
        bottom: 100px!important;
        top: auto!important
    }
}

@media screen and (max-width: 640px) {
    div.dt-buttons {
        display: none;
    }

    .dataTables_filter label{
        top: -60px!important;
        width: 100%;
        float: right;
    }
    .main-title{
        margin-bottom: 40px
    }
}
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>
    <link rel="stylesheet" href="<?php echo e(url('Modules/Lesson/Resources/assets/css/jquery-ui.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('Modules/Lesson/Resources/assets/css/lesson_plan.css')); ?>">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function () {
            $("#progressbar").progressbar({
                value: <?php if(isset($percentage)): ?> <?php echo e($percentage); ?> <?php endif; ?>
            });
        });
    </script>


    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('lesson::lesson.lesson_plan_overview'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('lesson::lesson.lesson'); ?></a>
                    <a href="#"><?php echo app('translator')->get('lesson::lesson.lesson_plan_overview'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="row">
            <div class="col-lg-12">

                <div class="white-box">
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'search-lesson-plan', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_lesson_Plan'])); ?>

                    <div class="row">
                        <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                        <div class="col-lg-3 mt-30-md">
                            <label class="primary_input_label" for="">
                                <?php echo e(__('common.teacher')); ?>

                                <span class="text-danger"> *</span>
                            </label>
                            <select class="primary_select form-control<?php echo e($errors->has('teahcer') ? ' is-invalid' : ''); ?>"
                                    name="teacher">
                                <option data-display="<?php echo app('translator')->get('common.select_teacher'); ?> *"
                                        value=""><?php echo app('translator')->get('common.select_teacher'); ?> *
                                </option>
                                <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($teacher->id); ?>" <?php echo e(isset($teacher_id)? ($teacher_id == $teacher->id? 'selected':''):''); ?>><?php echo e($teacher->full_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('teacher')): ?>
                                <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('teacher')); ?>

                                    </span>
                            <?php endif; ?>
                        </div>

                        <?php if(moduleStatusCheck('University')): ?>

                            <?php if ($__env->exists('university::common.session_faculty_depart_academic_semester_level',['ac_mt'=>'mt-25', 'required' => ['USN','UF', 'UD', 'UA', 'US', 'USL', 'USUB']])) echo $__env->make('university::common.session_faculty_depart_academic_semester_level',['ac_mt'=>'mt-25', 'required' => ['USN','UF', 'UD', 'UA', 'US', 'USL', 'USUB']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php else: ?>
                            <?php if ($__env->exists('backEnd.common.search_criteria', [
                            'div' => 'col-lg-3',
                            'required'=>['class', 'section', 'subject'],
                            'visiable'=>['class', 'section', 'subject'],
                            'subject' => true
                            ])) echo $__env->make('backEnd.common.search_criteria', [
                            'div' => 'col-lg-3',
                            'required'=>['class', 'section', 'subject'],
                            'visiable'=>['class', 'section', 'subject'],
                            'subject' => true
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>

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
        <?php if(isset($lessonPlanner)): ?>
            <div class="white-box mt-40">
                <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12 col-12 no-gutters">
                            <div class="main-title" style="padding-left: 15px;">
                                <h3 class="mb-15"><?php echo app('translator')->get('lesson::lesson.progress'); ?>


                                </h3><?php if(isset($total)): ?>
                                    <?php echo e($completed_total); ?>/<?php echo e($total); ?>

                                <?php endif; ?>

                                <div id="progressbar" style="height: 10px;margin-bottom:10px"></div>
                                <div class="pull-right" style="margin-top: -40px;">
                                    <?php if(isset($percentage)): ?>
                                        <?php echo e((int)($percentage)); ?>  %
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
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
                            <table id="table_id" class="table" cellspacing="0" width="100%">
                                <thead>

                                <tr>
                                    <th><?php echo app('translator')->get('lesson::lesson.lesson'); ?></th>
                                    <th><?php echo app('translator')->get('lesson::lesson.topic'); ?></th>
                                    <th>
                                        <?php if(generalSetting()->sub_topic_enable): ?>
                                            <?php echo app('translator')->get('lesson::lesson.sup_topic'); ?>
                                        <?php else: ?>
                                            <?php echo app('translator')->get('common.note'); ?>
                                        <?php endif; ?>
                                    </th>
                                    <th><?php echo app('translator')->get('lesson::lesson.completed_date'); ?> </th>
                                    <th><?php echo app('translator')->get('lesson::lesson.upcoming_date'); ?> </th>
                                    <th><?php echo app('translator')->get('common.status'); ?></th>
                                    <th><?php echo app('translator')->get('common.action'); ?></th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php $__currentLoopData = $lessonPlanner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <tr>
                                        <td><?php echo e(@$data->lessonName !=""?@$data->lessonName->lesson_title:""); ?></td>

                                        <td>

                                            <?php if(count($data->topics) > 0): ?>
                                                <?php $__currentLoopData = $data->topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php echo e($topic->topicName->topic_title); ?> </br>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <?php echo e($data->topicName->topic_title); ?>

                                            <?php endif; ?>

                                        </td>
                                        <td>
                                            <?php if(generalSetting()->sub_topic_enable): ?>
                                                <?php if(count($data->topics) > 0): ?>
                                                    <?php $__currentLoopData = $data->topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php echo e($topic->sub_topic_title); ?> </br>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <?php echo e($data->sub_topic); ?>

                                            <?php endif; ?>
                                            <?php else: ?>
                                                <?php echo e($data->note); ?>

                                            <?php endif; ?>
                                        </td>

                                        <td>

                                            <?php echo e(@$data->competed_date !=""?@$data->competed_date:""); ?><br>


                                        </td>
                                        <td>


                                            <?php if(date('Y-m-d')< $data->lesson_date && $data->competed_date==""): ?>
                                                <?php echo app('translator')->get('lesson::lesson.upcoming'); ?> (<?php echo e($data->lesson_date); ?>)<br>
                                            <?php elseif($data->competed_date==""): ?>
                                                <?php echo app('translator')->get('lesson::lesson.assigned_date'); ?> (<?php echo e($data->lesson_date); ?>)
                                                <br>
                                            <?php endif; ?>


                                        </td>
                                        <td>


                                            <?php if($data->competed_date==""): ?>
                                                Incomplete
                                                <br>
                                            <?php else: ?>
                                                Completed <br>
                                            <?php endif; ?>

                                        </td>

                                        <td>


                                            <label class="switch_toggle">
                                                <input type="checkbox" data-id="<?php echo e($data->id); ?>"
                                                       <?php echo e(@$data->completed_status == 'completed'? 'checked':''); ?>

                                                       class="weekend_switch_topic">
                                                <span class="slider round"></span>
                                            </label> <br>


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
            </div></div>
        <?php endif; ?>
    </section>



    <div class="modal fade admin-query" id="showReasonModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('lesson::lesson.complete_date'); ?>  </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">

                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'lessonPlan-complete-status',
                        'method' => 'POST',  'name' => 'myForm', 'onsubmit' => "return validateAddNewroutine()"])); ?>

                    <div class="form-group">
                        <input type="hidden" name="lessonplan_id" id="lessonplan_id">
                        <input class="primary_input_field  primary_input_field date form-control form-control<?php echo e($errors->has('complete_date') ? ' is-invalid' : ''); ?>"
                               id="complete_date" type="text"
                               name="complete_date" value="<?php echo e(date('m/d/Y')); ?>">
                    </div>
                    <div class="mt-40 d-flex justify-content-between">
                        <button type="button" class="primary-btn fix-gr-bg"
                                data-dismiss="modal"><?php echo e(__('common.close')); ?></button>
                        <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('common.save'); ?> </button>

                    </div>
                    <?php echo e(Form::close()); ?>

                </div>

            </div>
        </div>
    </div>


    <div class="modal fade admin-query" id="CancelModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('common.status'); ?>  </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <h1><?php echo app('translator')->get('lesson::lesson.are_you_sure_to_incomplete'); ?>?</h1>
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'lessonPlan-complete-status',
                        'method' => 'POST',  'name' => 'myForm', 'onsubmit' => "return validateAddNewroutine()"])); ?>

                    <div class="form-group">
                        <input type="hidden" name="lessonplan_id" id="calessonplan_id">
                        <input type="hidden" name="cancel" value="incomplete">

                    </div>
                    <div class="mt-40 d-flex justify-content-between">
                        <button type="button" class="primary-btn fix-gr-bg"
                                data-dismiss="modal"><?php echo e(__('common.close')); ?></button>
                        <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('lesson::lesson.yes'); ?> </button>

                    </div>
                    <?php echo e(Form::close()); ?>

                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startPush('script'); ?>

    <script>
        $(document).ready(function () {
            $(".weekend_switch_topic").on("change", function () {
                var id = $(this).data("id");
                $('#lessonplan_id').val(id);
                $('#calessonplan_id').val(id);

                if ($(this).is(":checked")) {
                    var status = "1";
                    var modal = $('#showReasonModal');
                    modal.modal('show');

                } else {
                    var status = "0";
                    var modal = $('#CancelModal');
                    modal.modal('show');
                }


            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Modules\Lesson\Resources\views\lessonPlan\manage_lesson_planner.blade.php ENDPATH**/ ?>
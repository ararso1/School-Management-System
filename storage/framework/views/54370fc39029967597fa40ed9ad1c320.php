<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('lesson::lesson.teacher_lesson_plan_overview'); ?>
<?php $__env->stopSection(); ?>

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
                <h1><?php echo app('translator')->get('lesson::lesson.teacher_lesson_plan_overview'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('lesson::lesson.lesson'); ?></a>
                    <a href="#"><?php echo app('translator')->get('lesson::lesson.lesson_plan_overview'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area">
        <div class="container-fluid p-0">

        </div>

        <div class="row">
            <div class="col-lg-12">

                <div class="white-box">
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'serach-report-lesson-plan', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_lesson_Plan'])); ?>

                    <div class="row">
                        <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                        <div class="col-lg-3 mt-30-md">
                            <select class="primary_select form-control<?php echo e($errors->has('teahcer') ? ' is-invalid' : ''); ?> select_teacher"
                                    name="teacher" id="select_teacher">
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


                        <div class="col-lg-3 mt-30-md" id="select_subject_div">
                            <select class="primary_select form-control<?php echo e($errors->has('subject') ? ' is-invalid' : ''); ?> select_subject"
                                    id="select_subject" name="subject">
                                <option data-display="Select subject *" value=""><?php echo app('translator')->get('common.select_subjects'); ?>*
                                </option>
                                <?php if(isset($subjects)): ?>
                                    <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($subject->id); ?>" <?php echo e(isset($subject_id)? ($subject_id == $subject->id? 'selected':''):''); ?>><?php echo e($subject->subject_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                            <div class="pull-right loader" id="select_subject_loader"
                                 style="margin-top: -30px;padding-right: 21px;">
                                <img src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt=""
                                     style="width: 28px;height:28px;">
                            </div>
                            <?php if($errors->has('subject')): ?>
                                <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('subject')); ?>

                                    </span>
                            <?php endif; ?>
                        </div>


                        <div class="col-lg-3 mt-20 text-right">
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
            <div class="row mt-40">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-4 no-gutters">
                            <div class="main-title" style="padding-left: 15px;">
                                <h3 class="mb-0"><?php echo app('translator')->get('lesson::lesson.Progress'); ?>


                                </h3><br><?php if(isset($total)): ?>
                                    <?php echo e($completed_total); ?>/<?php echo e($total); ?>

                                <?php endif; ?>

                                <div id="progressbar" style="height: 10px;margin-bottom:0px"></div>
                                <div class="pull-right" style="margin-top: -30px;">
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
                                    <th><?php echo app('translator')->get('common.topic'); ?></th>
                                    <th><?php echo app('translator')->get('lesson::lesson.sup_topic'); ?></th>
                                    <th><?php echo app('translator')->get('lesson::lesson.completed_date'); ?> </th>
                                    <th><?php echo app('translator')->get('lesson::lesson.upcoming_date'); ?> </th>
                                    <th><?php echo app('translator')->get('common.status'); ?></th>

                                </tr>
                                </thead>

                                <tbody>
                                <?php $__currentLoopData = $lessonPlanner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <tr>
                                        <td><?php echo e(@$data->lessonName !=""?@$data->lessonName->lesson_title:""); ?></td>

                                        <td>
                                            <?php
                                                $alllessonPlannerTopic=DB::table('lesson_planners')
                                                                     ->join('sm_lessons','sm_lessons.id','=','lesson_planners.lesson_detail_id')
                                                                    ->join('sm_lesson_topic_details','sm_lesson_topic_details.id','=','lesson_planners.topic_detail_id')
                                                                    ->where('lesson_detail_id',$data->lesson_detail_id)
                                                                    ->where('lesson_planners.active_status', 1)
                                                                    ->select('lesson_planners.*','sm_lessons.lesson_title','sm_lesson_topic_details.topic_title')
                                                                    ->get();
                                            ?>
                                            <?php $__currentLoopData = $alllessonPlannerTopic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e(@$allData->topic_title); ?><br>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </td>
                                        <td>
                                            <?php $__currentLoopData = $alllessonPlannerTopic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $topicdate=DB::table('lesson_planners')->where('id',$allData->id)->first();
                                                ?>
                                                <?php echo e(@$topicdate->sub_topic !=""?@$topicdate->sub_topic:""); ?><br>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </td>

                                        <td>
                                            <?php $__currentLoopData = $alllessonPlannerTopic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $topicdate=DB::table('lesson_planners')->where('id',$allData->id)->first();
                                                ?>
                                                <?php echo e(@$topicdate->competed_date !=""?@$topicdate->competed_date:""); ?><br>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </td>
                                        <td>
                                            <?php $__currentLoopData = $alllessonPlannerTopic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $topicdate=DB::table('lesson_planners')->where('id',$allData->id)->first();
                                                ?>


                                                <?php if(date('Y-m-d')< $topicdate->lesson_date): ?>
                                                    <span> Upcoming</span>     (<?php echo e($topicdate->lesson_date); ?>)<br>
                                                <?php elseif($topicdate->competed_date==""): ?>
                                                    Assigned Date(<?php echo e($topicdate->lesson_date); ?>)
                                                    <br>
                                                <?php endif; ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </td>
                                        <td>
                                            <?php $__currentLoopData = $alllessonPlannerTopic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $topicdate=DB::table('lesson_planners')->where('id',$allData->id)->first();
                                                ?>

                                                <?php if($topicdate->competed_date==""): ?>
                                                    Incomplete
                                                    <br>
                                                <?php else: ?>
                                                    Completed <br>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                        <button type="button" class="primary-btn fix-gr-bg" data-dismiss="modal">Close</button>
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
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <h1> Are You Sure</h1>
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'lessonPlan-complete-status',
                        'method' => 'POST',  'name' => 'myForm', 'onsubmit' => "return validateAddNewroutine()"])); ?>

                    <div class="form-group">
                        <input type="hidden" name="lessonplan_id" id="calessonplan_id">
                        <input type="hidden" name="cancel" value="incomplete">

                    </div>
                    <div class="mt-40 d-flex justify-content-between">
                        <button type="button" class="primary-btn fix-gr-bg" data-dismiss="modal">Close</button>
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

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Modules\Lesson\Resources\views\lessonPlan\report_lesson_plan.blade.php ENDPATH**/ ?>
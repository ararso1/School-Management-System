<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('homework.evaluation_report'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('homework.evaluation_report'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('homework.home_work'); ?></a>
                    <a href="#"><?php echo app('translator')->get('homework.evaluation_report'); ?></a>
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
                                    <h3 class="mb-15"><?php echo app('translator')->get('common.select_criteria'); ?> </h3>
                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'search-evaluation', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                        <?php if(moduleStatusCheck('University')): ?>
                            <div class="row">
                                <?php if ($__env->exists(
                                    'university::common.session_faculty_depart_academic_semester_level',
                                    [
                                        'required' => ['USN', 'UD', 'UA', 'US', 'USL', 'USEC', 'USUB'],
                                        'subject' => true,
                                    ]
                                )) echo $__env->make(
                                    'university::common.session_faculty_depart_academic_semester_level',
                                    [
                                        'required' => ['USN', 'UD', 'UA', 'US', 'USL', 'USEC', 'USUB'],
                                        'subject' => true,
                                    ]
                                , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        <?php else: ?>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="primary_input">
                                        <label class="primary_input_label" for="">
                                            <?php echo e(__('common.class')); ?>

                                            <span class="text-danger"> *</span>
                                        </label>
                                        <select
                                            class="primary_select  form-control<?php echo e($errors->has('class_id') ? ' is-invalid' : ''); ?>"
                                            name="class_id" id="class_subject">
                                            <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value=""><?php echo app('translator')->get('common.select'); ?>
                                            </option>
                                            <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option
                                                    value="<?php echo e($value->id); ?>"<?php echo e(isset($class_id) ? ($class_id == $value->id ? 'selected' : '') : ''); ?>>
                                                    <?php echo e($value->class_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>

                                        <?php if($errors->has('class_id')): ?>
                                            <span class="text-danger invalid-select" role="alert">
                                                <?php echo e($errors->first('class_id')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="primary_input" id="select_class_subject_div">
                                        <label class="primary_input_label" for="">
                                            <?php echo e(__('common.subject')); ?>

                                            <span class="text-danger"> *</span>
                                        </label>
                                        <select
                                            class="primary_select  form-control<?php echo e($errors->has('subject_id') ? ' is-invalid' : ''); ?> select_class_subject"
                                            name="subject_id" id="select_class_subject">
                                            <option data-display="<?php echo app('translator')->get('common.select_subjects'); ?> *" value=""><?php echo app('translator')->get('homework.subject'); ?> *
                                            </option>
                                            <?php if(isset($smClass)): ?>
                                                <?php $__currentLoopData = $smClass->subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($item->subject_id); ?>"
                                                        <?php echo e(isset($subject_id) ? ($subject_id == $item->subject_id ? 'selected' : '') : ''); ?>>
                                                        <?php echo e($item->subject->subject_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>

                                        </select>
                                        <div class="pull-right loader loader_style" id="select_subject_loader">
                                            <img class="loader_img_style"
                                                src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                        </div>

                                        <?php if($errors->has('subject_id')): ?>
                                            <span class="text-danger invalid-select" role="alert">
                                                <?php echo e($errors->first('subject_id')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="primary_input" id="m_select_subject_section_div">
                                        <label class="primary_input_label" for="">
                                            <?php echo e(__('common.section')); ?>

                                            <span class="text-danger"> </span>
                                        </label>
                                        <select
                                            class="primary_select  form-control<?php echo e($errors->has('section_id') ? ' is-invalid' : ''); ?> m_select_subject_section"
                                            name="section_id" id="m_select_subject_section">
                                            <option data-display="<?php echo app('translator')->get('common.select_section'); ?>" value=""><?php echo app('translator')->get('common.section'); ?>
                                            </option>
                                            <?php if(isset($smClass)): ?>
                                                <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($item->section_id); ?>"
                                                        <?php echo e(isset($section_id) ? ($section_id == $item->section_id ? 'selected' : '') : ''); ?>>
                                                        <?php echo e($item->section->section_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                        <div class="pull-right loader loader_style" id="select_section_loader">
                                            <img class="loader_img_style"
                                                src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                        </div>

                                        <?php if($errors->has('section_id')): ?>
                                            <span class="text-danger invalid-select" role="alert">
                                                <?php echo e($errors->first('section_id')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                        <?php endif; ?>

                        <div class="col-lg-12 mt-20 text-right">
                            <button type="submit" class="primary-btn small fix-gr-bg">
                                <span class="ti-search pr-2"></span>
                                <?php echo app('translator')->get('common.search'); ?>
                            </button>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
        </div>
        <?php if(@$homeworkLists): ?>
            <div class="row mt-40">
                <div class="col-lg-12">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-lg-4 no-gutters">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php echo app('translator')->get('homework.evaluation_report'); ?></h3>
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
                                    <table id="table_id" class="table" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <?php if(moduleStatusCheck('University')): ?>
                                                    <th><?php echo app('translator')->get('homework.home_work_date'); ?></th>
                                                    <th><?php echo app('translator')->get('homework.submission_date'); ?></th>
                                                    <th><?php echo app('translator')->get('common.action'); ?></th>
                                                <?php else: ?>
                                                    <th><?php echo app('translator')->get('common.subject'); ?></th>
                                                    <th><?php echo app('translator')->get('homework.home_work_date'); ?></th>
                                                    <th><?php echo app('translator')->get('homework.submission_date'); ?></th>
                                                    <th><?php echo app('translator')->get('homework.complete/pending'); ?></th>
                                                    <th><?php echo app('translator')->get('homework.complete'); ?>(%)</th>
                                                    <th><?php echo app('translator')->get('common.action'); ?></th>
                                                <?php endif; ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(moduleStatusCheck('University')): ?>
                                                <?php $__currentLoopData = $homeworkLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        
                                                        <td><?php echo e($value->homework_date != '' ? dateConvert($value->homework_date) : ''); ?>

                                                        </td>
                                                        <td><?php echo e($value->submission_date != '' ? dateConvert($value->submission_date) : ''); ?>

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
                                                                <?php if(userPermission('view-evaluation-report')): ?>
                                                                    <a class="dropdown-item modalLink"
                                                                        title="View Evaluation Report"
                                                                        data-modal-size="full-width-modal"
                                                                        href="<?php echo e(route('view-evaluation-report', @$value->id)); ?>">
                                                                        <?php echo app('translator')->get('common.view'); ?>
                                                                    </a>
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
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <?php $__currentLoopData = $homeworkLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($value->subjects != '' ? $value->subjects->subject_name : ''); ?>

                                                        </td>
                                                        <td><?php echo e($value->homework_date != '' ? dateConvert($value->homework_date) : ''); ?>

                                                        </td>
                                                        <td><?php echo e($value->submission_date != '' ? dateConvert($value->submission_date) : ''); ?>

                                                        </td>
                                                        <?php
                                                            $homeworkPercentage = App\SmHomework::getHomeworkPercentage($value->class_id, $value->section_id, $value->id);
                                                        ?>
                                                        <td>
                                                            <?php
                                                            if (isset($homeworkPercentage)) {
                                                                $incomplete = $homeworkPercentage['totalStudents'] - $homeworkPercentage['totalHomeworkCompleted'];
                                                                echo $homeworkPercentage['totalHomeworkCompleted'] . '/' . $incomplete;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if (isset($homeworkPercentage)) {
                                                                $x = $homeworkPercentage['totalHomeworkCompleted'] * 100;
                                                                if (empty($homeworkPercentage['totalStudents']) || $homeworkPercentage['totalStudents'] < 1) {
                                                                    $y = 0;
                                                                } else {
                                                                    $y = $x / $homeworkPercentage['totalStudents'];
                                                                }
                                                                echo number_format($y, 2);
                                                            }
                                                            ?>
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
                                                                <?php if(userPermission('view-evaluation-report')): ?>
                                                                    <a class="dropdown-item modalLink"
                                                                        title="View Evaluation Report"
                                                                        data-modal-size="full-width-modal"
                                                                        href="<?php echo e(route('view-evaluation-report', @$value->id)); ?>">
                                                                        <?php echo app('translator')->get('common.view'); ?>
                                                                    </a>
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
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
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
        <?php endif; ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\reports\evaluation.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('common.forum'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">

    
<?php $__env->stopPush(); ?>

<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1> <?php echo app('translator')->get('common.forum_list'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('common.forum'); ?></a>
                    <a href="#"><?php echo app('translator')->get('common.forum_list'); ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="admin-visitor-area">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="main-title">
                                    <h3 class="mb-15 "><?php echo app('translator')->get('common.select_criteria'); ?></h3>
                                </div>
                            </div>
                        </div>

                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'user-forum-title-search', 'method' => 'POST'])); ?>


                        <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">

                            <div class="col-lg-5 mt-30-md">
                                <select
                                    class="primary_select form-control<?php echo e(@$errors->has('forum_category_id') ? ' is-invalid' : ''); ?>"
                                    name="forum_category_id">
                                    <option data-display="<?php echo app('translator')->get('common.select_forum_category'); ?>" value=""><?php echo app('translator')->get('common.select_forum_category'); ?></option>
                                    <?php $__currentLoopData = $forum_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e(@$category->id); ?>"
                                            <?php echo e(isset($category_id) ? ($category_id == $category->id ? 'selected' : '') : ''); ?>>
                                            <?php echo e(@$category->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                <?php if($errors->has('forum_category_id')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e(@$errors->first('forum_category_id')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-5 mt-30-md">
                                <select
                                    class="primary_select form-control<?php echo e(@$errors->has('forum_title_id') ? ' is-invalid' : ''); ?>"
                                    name="forum_title_id">
                                    <option data-display="<?php echo app('translator')->get('common.select_forum_title'); ?>" value=""><?php echo app('translator')->get('common.select_forum_title'); ?></option>
                                    <?php $__currentLoopData = $forum_titles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e(@$title->id); ?>"
                                            <?php echo e(isset($forum_title_id) ? ($forum_title_id == $title->id ? 'selected' : '') : ''); ?>>
                                            <?php echo e(@$title->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
    
                                <?php if($errors->has('forum_title_id')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e(@$errors->first('forum_title_id')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-2 mt-10 text-right">
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
        </div>
    </section>

    <section class="admin-visitor-area up_admin_visitor mt-25">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-lg-4 no-gutters">
                                <div class="main-title">
                                    <h3 class="mb-15">  <?php echo app('translator')->get('common.forum_list'); ?></h3>
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
                                    <div class="table-responsive">
                                        <table id="table_id" class="table" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th> <?php echo app('translator')->get('common.forum_title'); ?></th>
                                                    <th> <?php echo app('translator')->get('common.category'); ?></th>
                                                    <th> <?php echo app('translator')->get('common.topics'); ?></th>
                                                    <th> <?php echo app('translator')->get('common.comment'); ?></th>
                                                    <th> <?php echo app('translator')->get('common.action'); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $forum_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $forum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td>
                                                            <a href="<?php echo e(route('user-forum-topic.index',$forum->id)); ?>">
                                                                <div class="topic_name">
                                                                    <?php echo e(@$forum->title); ?>

                                                                </div>
                                                            </a>
                                                        </td>
                                                    
                                                        <td>
                                                            <div class="category_mark d-flex align-items-center ">
                                                                <span class="squire_bulet"> </span> <?php echo e(@$forum->forumCategory->title); ?>

                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <?php echo e(@$forum->forumTopics()->count()); ?>

                                                        </td>
                                                        <td class="text-center">
                                                            <?php
                                                                $totalComments = 0;
                                                                foreach ($forum->forumTopics as $topic) {
                                                                    $totalComments += $topic->forumComments()->count();
                                                                }
                                                            ?>

                                                            <?php echo e($totalComments); ?>

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
                                                                <a class="dropdown-item" href="<?php echo e(route('user-forum-topic.index',$forum->id)); ?>"> <?php echo app('translator')->get('common.topic_list'); ?></a>
                                                                <a class="dropdown-item" href=""> <?php echo app('translator')->get('common.my_topics'); ?></a>
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
                                            </tbody>
                                        </table>
                                    </div>
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
<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\userForum\title_index.blade.php ENDPATH**/ ?>
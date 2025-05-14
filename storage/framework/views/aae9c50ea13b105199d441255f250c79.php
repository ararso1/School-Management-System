    <?php $__env->startSection('title'); ?>
        <?php echo app('translator')->get('common.my_topics'); ?>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<?php $__env->startPush('css'); ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">

    <style>
        .mt-38 {
            margin-top: 38px;
        }
    </style>
<?php $__env->stopPush(); ?>

<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('common.my_topics'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('common.forum'); ?></a>
                <a href="#"><?php echo app('translator')->get('common.my_topics'); ?></a>
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

                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'user-forum-mytopic-search', 'method' => 'POST'])); ?>


                    <div class="row">
                        <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">

                        <div class="col-lg-3 mt-30-md">
                            <label for="forum_category_id"> <?php echo e(__('common.forum_category')); ?></label>
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

                        <div class="col-lg-3 mt-30-md">
                            <label for="forum_title_id"> <?php echo e(__('common.forum_title')); ?></label>
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

                        <div class="col-lg-3 mt-30-md">
                            <label for="forum_topic_id"> <?php echo e(__('common.forum_topic')); ?></label>
                            <select
                                class="primary_select form-control<?php echo e(@$errors->has('forum_topic_id') ? ' is-invalid' : ''); ?>"
                                name="forum_topic_id">
                                <option data-display="<?php echo app('translator')->get('common.select_forum_topic'); ?>" value=""><?php echo app('translator')->get('common.select_forum_topic'); ?></option>
                                <?php $__currentLoopData = $forum_topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e(@$topic->id); ?>"
                                        <?php echo e(isset($forum_topic_id) ? ($forum_topic_id == $topic->id ? 'selected' : '') : ''); ?>>
                                        <?php echo e(@$topic->title); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                            <?php if($errors->has('forum_topic_id')): ?>
                                <span class="text-danger invalid-select" role="alert">
                                    <?php echo e(@$errors->first('forum_topic_id')); ?>

                                </span>
                            <?php endif; ?>
                        </div>

                        <div class="col-lg-2 mt-38 text-right">
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

<section class="admin-visitor-area up_st_admin_visitor mt-25">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="white-box">
                    <div class="row">
                        <div class="col-lg-4 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-15">  <?php echo app('translator')->get('common.my_topic_list'); ?></h3>
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
                                        <th> <?php echo app('translator')->get('common.forum_category'); ?></th>
                                        <th> <?php echo app('translator')->get('common.forum_title'); ?></th>
                                        <th> <?php echo app('translator')->get('common.forum_topic'); ?></th>
                                        <th> <?php echo app('translator')->get('common.comment'); ?></th>
                                        <th> <?php echo app('translator')->get('common.view'); ?></th>
                                        <th> <?php echo app('translator')->get('common.action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $forums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $my_topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <span class="badge badge-secondary"><?php echo e(@$my_topic->forumTitle->forumCategory->title); ?></span>
                                        </td>
                                        <td><?php echo e(@$my_topic->forumTitle->title); ?></td>
                                        <td><?php echo e(@$my_topic->title); ?></td>
                                        <td><?php echo e(@$my_topic->forumComments()->count()); ?></td>
                                        <td><?php echo e(@$my_topic->total_views); ?></td>
                                        <td>
                                            <?php
                                                $routeList = [];
                                                $routeList[] = '<a class="dropdown-item" href="'. route('user-forum.view',$my_topic->id) .'">'. __('common.view') .'</a>';
                                                $routeList[] = '<a class="dropdown-item" data-toggle="modal" data-target="#editSectionModal'. $my_topic->id .'" href="#">'. __('common.edit') .'</a>';
                                                $routeList[] = '<a class="dropdown-item" data-toggle="modal" data-target="#deleteSectionModal'. $my_topic->id .'" href="#">'. __('common.delete') .'</a>';
                                                $routeListHtml = implode('', $routeList);
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
                                    
                                    <div class="modal fade" id="editSectionModal<?php echo e($my_topic->id); ?>" tabindex="-1" role="dialog" aria-labelledby="editModalForumTopicLabel<?php echo e($my_topic->id); ?>" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalForumTopicLabel<?php echo e($my_topic->id); ?>">
                                                        <?php echo app('translator')->get('common.edit_forum_topic'); ?>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'user-forum-topic.update', 'method' => 'POST'])); ?>

                                                    <div class="row mb-3 mt-3">
                                                        <div class="col-9">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="primary_input">
                                                                        <label for="title"><?php echo app('translator')->get('common.title'); ?> <span class="text-danger"> *</span></label>
                                                                        <input class="primary_input_field form-control<?php echo e(@$errors->has('title') ? ' is-invalid' : ''); ?>" type="text" required name="title" autocomplete="off" id="title" value="<?php echo e(@$my_topic->title); ?>">
                                                                        <input type="hidden" name="forum_title_id" value="<?php echo e($my_topic->forumTitle->id); ?>">
                                                                        <input type="hidden" name="forum_topic_id" value="<?php echo e($my_topic->id); ?>">
                                                                        <?php if($errors->has('title')): ?>
                                                                            <span class="text-danger"><?php echo e(@$errors->first('title')); ?></span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="primary_input">
                                                                        <label for="description"><?php echo app('translator')->get('common.description'); ?> <span class="text-danger">*</span></label>
                                                                        <textarea class="primary_input_field form-control<?php echo e($errors->has('description') ? ' is-invalid' : ''); ?> lms_summernote" name="description" autocomplete="off" id="description"><?php echo @$my_topic->description; ?></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <?php
                                                            $edit = true;
                                                        ?>
                                                        <?php if(isset($edit)): ?> 
                                                            <?php
                                                                $role_ids = json_decode($my_topic->available_for);
                                                                $role_ids = is_array($role_ids) ? $role_ids : [];
                                                            ?>
                                                        <?php endif; ?>
                                
                                                        <div class="col-lg-3">
                                                            <label><?php echo app('translator')->get('common.available_for'); ?> <span class="text-danger">*</span></label>
                                                            <div id="role_container">
                                                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php
                                                                        $custom_id = $rl->id.rand(10,1000);
                                                                    ?>
                                                                    <div class="saas_role_checkbox">
                                                                        <input type="checkbox" id="role_<?php echo e($custom_id); ?>" class="common-checkbox" value="<?php echo e($rl->id); ?>" name="role[]"
                                                                        <?php if(isset($role_ids)): ?> <?php if(in_array($rl->id, $role_ids)): ?> checked <?php endif; ?> <?php endif; ?>>
                                                                        <label for="role_<?php echo e($custom_id); ?>"><?php echo e($rl->name); ?></label>
                                                                    </div>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </div>
                                                            <?php if($errors->has('role')): ?>
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong><?php echo e($errors->first('role')); ?></strong>
                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                            
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo app('translator')->get('common.close'); ?></button>
                                                    <button type="submit" class="primary-btn fix-gr-bg submit">
                                                        <span class="ti-check"></span>
                                                        <?php echo app('translator')->get('common.save'); ?>
                                                    </button>
                                                </div>
                                                <?php echo e(Form::close()); ?>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade admin-query" id="deleteSectionModal<?php echo e(@$my_topic->id); ?>">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><?php echo app('translator')->get('common.delete_forum_topic'); ?></h4>
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
                                                        <a class="primary-btn fix-gr-bg" href="<?php echo e(route('user-forum-topic.delete', [$my_topic->id])); ?>"
                                                            class="text-light"> <?php echo app('translator')->get('common.delete'); ?>
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
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startPush('script'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>

    <script>
        $('.lms_summernote').summernote({
            height: 200,
            tabsize: 2,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\userForum\user_forum_my_topic.blade.php ENDPATH**/ ?>
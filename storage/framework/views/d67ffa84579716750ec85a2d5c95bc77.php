<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('exam.format_settings'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('exam.format_settings'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('exam.examination'); ?></a>
                    <a href="#"><?php echo app('translator')->get('exam.settings'); ?></a>
                    <a href="#"><?php echo app('translator')->get('exam.format_settings'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if(isset($editData)): ?>
                                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => 'true', 'route' => 'update-exam-content', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                                <input type="hidden" name="id" value="<?php echo e($editData->id); ?>">
                            <?php else: ?>
                                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => 'true', 'route' => 'save-exam-content', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                            <?php endif; ?>
                            <div class="white-box">
                                <div class="main-title">
                                    <h3 class="mb-15">
                                        <?php if(isset($editData)): ?>
                                            <?php echo app('translator')->get('exam.edit_exam_format'); ?>
                                        <?php else: ?>
                                            <?php echo app('translator')->get('exam.add_exam_format'); ?>
                                        <?php endif; ?>
                                    </h3>
                                </div>
                                <div class="add-visitor">
                                    <div class="row mb-25">
                                        <div class="col-lg-12 ">
                                            <p class="alert alert-warning mb-2 text-center"><?php echo e(__('exam.exam_settings_tips')); ?>  </p>
                                        </div>

                                        <div class="col-lg-12 mb-15">
                                            <?php
                                                $format_for = old('format_for') ?? (!isset($editData) || @$editData->exam_type ? 'term_exam' : 'progress_card') ;
                                            ?>
                                            <label class="primary_input_label" for="">
                                                <?php echo e(__('common.type')); ?><span class="text-danger"> *</span>
                                            </label>
                                            <select class="primary_select form-control<?php echo e($errors->has('format_for') ? ' is-invalid' : ''); ?>"
                                                    name="format_for" id="format_for">

                                                <option value="term_exam" <?php echo e($format_for == 'term_exam' ? 'selected' : ''); ?>><?php echo e(__('exam.term_exam')); ?></option>
                                                <option value="progress_card" <?php echo e($format_for == 'progress_card' ? 'selected' : ''); ?>><?php echo e(__('exam.progress_card')); ?></option>
                                            </select>
                                            <?php if($errors->has('format_for')): ?>
                                                <span class="invalid-feedback invalid-select" role="alert">
                                                    <strong><?php echo e($errors->first('format_for')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-lg-12 mb-15 term_exam">
                                            <label class="primary_input_label" for="">
                                                <?php echo e(__('common.exam')); ?>

                                                <span class="text-danger"> *</span>
                                            </label>
                                            <select class="primary_select form-control<?php echo e($errors->has('exam_type') ? ' is-invalid' : ''); ?>" name="exam_type">
                                                <option data-display="<?php echo app('translator')->get('common.select_exam'); ?> *" value=""><?php echo app('translator')->get('common.select_exam'); ?> *</option>
                                                <?php $__currentLoopData = $exams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(!in_array($exam->id, $already_assigned)): ?>
                                                        <?php if(isset($editData)): ?>
                                                            <option value="<?php echo e($exam->id); ?>" <?php echo e(isset($editData)? ($editData->exam_type == $exam->id? 'selected':''):''); ?>><?php echo e($exam->title); ?></option>
                                                        <?php else: ?>
                                                            <option value="<?php echo e($exam->id); ?>"><?php echo e($exam->title); ?></option>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('exam_type')): ?>
                                                <span class="text-danger invalid-select" role="alert">
                                                    <?php echo e($errors->first('exam_type')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-lg-12 mb-15 term_exam">
                                            <div class="primary_input">
                                                <label> <?php echo app('translator')->get('exam.controller_title'); ?> <span
                                                            class="text-danger"> *</span> </label>
                                                <input class="primary_input_field  form-control<?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>"
                                                       type="text" name="title" autocomplete="off"
                                                       value="<?php echo e(isset($editData)? @$editData->title:old('title')); ?>">
                                                <?php if($errors->has('title')): ?>
                                                    <span class="text-danger">
                                                        <?php echo e($errors->first('title')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 term_exam">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('exam.signature'); ?>
                                                    <span></span> </label>
                                                <div class="primary_file_uploader">
                                                    <input class="primary_input_field" type="text" id="placeholderPhoto"
                                                           placeholder="<?php echo e(isset($editData->file) && @$editData->file != ""? getFilePath3(@$editData->file):trans('exam.signature')); ?>"
                                                           readonly>
                                                    <button class="" type="button">
                                                        <label class="primary-btn small fix-gr-bg"
                                                               for="addSignatureImage"><?php echo e(__('common.browse')); ?></label>
                                                        <input type="file" class="d-none" name="file"
                                                               id="addSignatureImage">
                                                    </button>
                                                </div>
                                            </div>
                                            <?php if($errors->has('file')): ?>
                                                <span class="text-danger">
                                                <?php echo e($errors->first('file')); ?>

                                            </span>
                                            <?php endif; ?>
                                            <code class="nowrap d-block mb-15">(Allow file jpg, png, jpeg, svg)</code>
                                        </div>
                                        <div class="col-lg-12 mb-15 term_exam">
                                            <img class="previewImageSize <?php echo e(@$editData->file ? '' : 'd-none'); ?>" src="<?php echo e(@$editData->file ? asset($editData->file) : ''); ?>" alt="" id="signatureImageShow" height="100%" width="100%">
                                        </div>
                                        <div class="col-lg-12 mb-15">
                                            <div class="primary_input ">
                                                <label class="primary_input_label"
                                                       for=""><?php echo app('translator')->get('exam.result_publication_date'); ?> <span
                                                            class="text-danger"> *</span> </label>
                                                <div class="primary_datepicker_input">
                                                    <div class="no-gutters input-right-icon">
                                                        <div class="col">
                                                            <div class="">
                                                                <input
                                                                        class="primary_input_field primary_input_field date form-control<?php echo e($errors->has('publish_date') ? ' is-invalid' : ''); ?>"
                                                                        id="upload_date" type="text"
                                                                        name="publish_date"
                                                                        value="<?php echo e(isset($editData)? date('m/d/Y', strtotime(@$editData->publish_date)): date('m/d/Y')); ?>">
                                                            </div>
                                                        </div>
                                                        <button class="btn-date" data-id="#upload_date" type="button">
                                                            <label class="m-0 p-0" for="upload_date">
                                                                <i class="ti-calendar" id="start-date-icon"></i>
                                                            </label>
                                                        </button>
                                                    </div>
                                                </div>
                                                <span class="text-danger"><?php echo e($errors->first('date_of_birth')); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 no-gutters input-right-icon mb-15 term_exam">
                                            <h4><?php echo app('translator')->get('exam.attendance'); ?></h4>
                                        </div>
                                        <div class="col-lg-12 mb-15 term_exam">
                                            <div class="primary_input ">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('exam.start_date'); ?><span
                                                            class="text-danger"> *</span> </label>
                                                <div class="primary_datepicker_input">
                                                    <div class="no-gutters input-right-icon">
                                                        <div class="col">
                                                            <div class="">
                                                                <input
                                                                        class="primary_input_field primary_input_field date form-control<?php echo e($errors->has('start_date') ? ' is-invalid' : ''); ?>"
                                                                        id="start_date" type="text" name="start_date"
                                                                        value="<?php echo e(isset($editData) && $editData->start_date ? date('m/d/Y', strtotime(@$editData->start_date)): date('m/d/Y')); ?>">
                                                            </div>
                                                        </div>
                                                        <button class="btn-date" data-id="#start_date" type="button">
                                                            <label class="m-0 p-0" for="start_date">
                                                                <i class="ti-calendar" id="start-date-icon"></i>
                                                            </label>
                                                        </button>
                                                    </div>
                                                </div>
                                                <span class="text-danger"><?php echo e($errors->first('start_date')); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-15 term_exam">
                                            <div class="primary_input ">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('exam.end_date'); ?><span
                                                            class="text-danger"> *</span> </label>
                                                <div class="primary_datepicker_input">
                                                    <div class="no-gutters input-right-icon">
                                                        <div class="col">
                                                            <div class="">
                                                                <input
                                                                        class="primary_input_field primary_input_field date form-control form-control<?php echo e($errors->has('end_date') ? ' is-invalid' : ''); ?>"
                                                                        id="end_date" type="text" name="end_date"
                                                                        value="<?php echo e(isset($editData) && $editData->end_date? date('m/d/Y', strtotime(@$editData->end_date)): date('m/d/Y')); ?>">
                                                            </div>
                                                        </div>
                                                        <button class="btn-date" data-id="#end_date" type="button">
                                                            <label class="m-0 p-0" for="end_date">
                                                                <i class="ti-calendar" id="start-date-icon"></i>
                                                            </label>
                                                        </button>
                                                    </div>
                                                </div>
                                                <span class="text-danger"><?php echo e($errors->first('end_date')); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        $tooltip = "";
                                        if(userPermission('save-exam-content') || userPermission('edit-exam-settings')){
                                                @$tooltip = "";
                                            }else{
                                                @$tooltip = "You have no permission to add";
                                            }
                                    ?>
                                    <div class="row mt-40">
                                        <div class="col-lg-12 text-center">
                                            <button class="primary-btn fix-gr-bg submit" type="submit"
                                                    data-toggle="tooltip" title="<?php echo e(@$tooltip); ?>">
                                                <span class="ti-check"></span>
                                                <?php if(isset($editData)): ?>
                                                    <?php echo app('translator')->get('exam.update_content'); ?>
                                                <?php else: ?>
                                                    <?php echo app('translator')->get('exam.save_content'); ?>
                                                <?php endif; ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-lg-4 no-gutters">
                                <div class="main-title">
                                    <h3 class="mb-15"> <?php echo app('translator')->get('exam.exam_format_list'); ?></h3>
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
                                            <th> <?php echo app('translator')->get('exam.exam'); ?></th>
                                            <th> <?php echo app('translator')->get('exam.title'); ?></th>
                                            <th> <?php echo app('translator')->get('exam.signature'); ?></th>
                                            <th> <?php echo app('translator')->get('exam.publish_date'); ?></th>
                                            <th> <?php echo app('translator')->get('exam.start_date'); ?></th>
                                            <th> <?php echo app('translator')->get('exam.end_date'); ?></th>
                                            <th> <?php echo app('translator')->get('common.action'); ?></th>
                                        </tr>
                                        </thead>
    
                                        <tbody>
                                        <?php $__currentLoopData = $content_infos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content_info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="nowrap"><?php echo e(@$content_info->examName->title ?? __('exam.progress_card')); ?></td>
                                                <td class="nowrap"><?php echo e($content_info->title); ?></td>
                                                <td>
                                                    <?php if($content_info->file): ?>
                                                        <img src="<?php echo e(asset($content_info->file)); ?>" width="100px">
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e(dateConvert($content_info->publish_date)); ?></td>
                                                <td><?php echo e($content_info->start_date ? dateConvert($content_info->start_date) : null); ?></td>
                                                <td><?php echo e($content_info->end_date ? dateConvert($content_info->end_date) : null); ?></td>
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
                                                        <?php if(userPermission('edit-exam-settings')): ?>
                                                            <a class="dropdown-item"
                                                               href="<?php echo e(route('edit-exam-settings',$content_info->id)); ?>"><?php echo app('translator')->get('common.edit'); ?></a>
                                                        <?php endif; ?>
                                                        <?php if(userPermission('delete-content')): ?>
                                                            <a class="dropdown-item" data-toggle="modal"
                                                               data-target="#deleteApplyLeaveModal<?php echo e($content_info->id); ?>"
                                                               href="#">
                                                                <?php echo app('translator')->get('common.delete'); ?>
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
                                            <div class="modal fade admin-query"
                                                 id="deleteApplyLeaveModal<?php echo e($content_info->id); ?>">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title"><?php echo app('translator')->get('exam.delete_upload_content'); ?></h4>
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
                                                                <a href="<?php echo e(route('delete-content',$content_info->id)); ?>"
                                                                   class="text-light">
                                                                    <button class="primary-btn fix-gr-bg"
                                                                            type="submit"><?php echo app('translator')->get('common.delete'); ?></button>
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
<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function(){
            changeFormatFor($('#format_for').val());
        })
        $(document).on('change', '#format_for', function (){
            changeFormatFor($(this).val());
        })

        function changeFormatFor(val){
            if(typeof val == 'undefined' || val === 'term_exam'){
                $('.term_exam').show();
            }else{
                $('.term_exam').hide();
            }
        }
        $(document).on('change', '#addSignatureImage', function(event) {
            $('#signatureImageShow').removeClass('d-none');
            getFileName($(this).val(), '#placeholderPhoto');
            imageChangeWithFile($(this)[0], '#signatureImageShow');
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/backEnd/examination/exam_settings.blade.php ENDPATH**/ ?>
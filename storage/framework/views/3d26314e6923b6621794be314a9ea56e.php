<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('front_settings.course'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
<style>
    .invalid-select-label {
        position: absolute;
        bottom: 0px;
        margin-top: 0px !important;
    }
    .invalid-select-label strong{
        top: -7px;
    }
</style>
    
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('common.add_course'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"> <?php echo app('translator')->get('front_settings.front_settings'); ?></a>
                    <a href="#"><?php echo app('translator')->get('common.add_course'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <?php if(isset($add_course)): ?>
                <?php if(userPermission("store_course")): ?>
                    <div class="row">
                        <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                            <a href="<?php echo e(route('course-list')); ?>" class="primary-btn small fix-gr-bg">
                                <span class="ti-plus pr-2"></span>
                                <?php echo app('translator')->get('common.add'); ?>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-title">
                            <h3 class="mb-30">
                                <?php if(isset($add_course)): ?>
                                    <?php echo app('translator')->get('front_settings.edit_course'); ?>
                                <?php else: ?>
                                    <?php echo app('translator')->get('front_settings.add_course'); ?>
                                <?php endif; ?>
                               
                            </h3>
                        </div>
                        <?php if(isset($add_course)): ?>
                            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'update_course',
                            'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <?php else: ?>
                            <?php if(userPermission("store_course")): ?>
                                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'store_course',
                                'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                            <?php endif; ?>
                        <?php endif; ?>
                        <div class="white-box">
                            <div class="add-visitor">
                                <div class="row">
                                    <div class="col-lg-12 mb-30">
                                        <div class="primary_input">
                                            <input class="primary_input_field "
                                                   type="text" name="title" autocomplete="off"
                                                   value="<?php echo e(isset($add_course)? $add_course->title: old('title')); ?>">
                                            <input type="hidden" name="id"
                                                   value="<?php echo e(isset($add_course)? $add_course->id: ''); ?>">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('common.title'); ?> <span class="text-danger"> *</span></label>
                                            
                                            <?php if($errors->has('title')): ?>
                                                <span class="text-danger" >
                                                        <?php echo e($errors->first('title')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="primary_input">
                                            <select class="primary_select  form-control<?php echo e($errors->has('category_id') ? ' is-invalid' : ''); ?> mb-30" name="category_id">
                                                <option data-display="<?php echo app('translator')->get('front_settings.course_category'); ?>*" value=""><?php echo app('translator')->get('common.select'); ?> *</option>
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($category->id); ?>" <?php echo e((@$add_course->category_id == $category->id) ? 'selected' :''); ?>><?php echo e($category->category_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('category_id')): ?>
                                                <span class="text-danger invalid-select-label" role="alert">
                                                    <?php echo e($errors->first('category_id')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="col mb-30">
                                            <div class="row no-gutters input-right-icon">
                                                <div class="col">
                                                    <div class="primary_input">
                                                        <input class="primary_input_field form-control<?php echo e($errors->has('image') ? ' is-invalid' : ''); ?>" type="text"
                                                                id="placeholderFileOneName"
                                                                placeholder="<?php echo e(isset($add_course)? ($add_course->image !="") ? getFilePath3($add_course->image) :trans('common.image') .' *' :trans('common.image') . '(' .trans('common.min')." 1420*450 PX)"); ?>"
                                                                readonly
                                                        >
                                                        
                                                        <?php if($errors->has('image')): ?>
                                                            <span class="text-danger" >
                                                    <?php echo e($errors->first('image')); ?>

                                                </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <button class="primary-btn-small-input" type="button">
                                                        <label class="primary-btn small fix-gr-bg"
                                                                for="document_file_1"><?php echo app('translator')->get('common.browse'); ?></label>
                                                        <input type="file" class="d-none" name="image"
                                                                id="document_file_1">
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 ">
                                    <div class="row mt-20">
                                        <div class="col-md-12 mt-20">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.overview'); ?> </label>
                                                
                                                <textarea class="primary_input_field form-control<?php echo e($errors->has('overview') ? ' is-invalid' : ''); ?>" cols="0" rows="4" name="overview" maxlength="500"><?php echo e(isset($add_course)? $add_course->overview: old('overview')); ?></textarea>
                                                
                                                
                                                <?php if($errors->has('overview')): ?>
                                                    <span class="text-danger" ><?php echo e($errors->first('overview')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>      
                                    <div class="row mt-20">
                                        <div class="col-md-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.outline'); ?> <span></span></label>
                                                <textarea class="primary_input_field form-control<?php echo e($errors->has('outline') ? ' is-invalid' : ''); ?>" cols="0" rows="4" name="outline" maxlength="500"><?php echo e(isset($add_course)? $add_course->outline: old('outline')); ?></textarea>
                                                
                                                
                                                <?php if($errors->has('outline')): ?>
                                                    <span class="error text-danger">
                                                        <?php echo e($errors->first('outline')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-20">
                                        <div class="col-md-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.prerequisites'); ?> <span></span></label>
                                                <textarea class="primary_input_field form-control<?php echo e($errors->has('prerequisites') ? ' is-invalid' : ''); ?>" cols="0" rows="4" name="prerequisites" maxlength="500"><?php echo e(isset($add_course)? $add_course->prerequisites: old('prerequisites')); ?></textarea>
                                                
                                                
                                                <?php if($errors->has('prerequisites')): ?>
                                                    <span class="error text-danger">
                                                        <?php echo e($errors->first('prerequisites')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-20">
                                        <div class="col-md-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.resources'); ?> <span></span></label>
                                                <textarea class="primary_input_field form-control<?php echo e($errors->has('resources') ? ' is-invalid' : ''); ?>" cols="0" rows="4" name="resources" maxlength="500"><?php echo e(isset($add_course)? $add_course->resources: old('resources')); ?></textarea>
                                                
                                                
                                                <?php if($errors->has('resources')): ?>
                                                    <span class="error text-danger">
                                                        <?php echo e($errors->first('resources')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-20">
                                        <div class="col-md-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.stats'); ?> <span></span></label>
                                                <textarea class="primary_input_field form-control<?php echo e($errors->has('stats') ? ' is-invalid' : ''); ?>" cols="0" rows="4" name="stats" maxlength="500"><?php echo e(isset($add_course)? $add_course->stats: old('stats')); ?></textarea>
                                                
                                                
                                                <?php if($errors->has('stats')): ?>
                                                    <span class="error text-danger">
                                                        <?php echo e($errors->first('stats')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        $tooltip = "";
                        if(userPermission("store_course")){
                                $tooltip = "";
                            }else{
                                $tooltip = "You have no permission to add";
                            }
                    ?>
                    <div class="row mt-40">
                        <div class="col-lg-12 text-center">
                            <?php if(Illuminate\Support\Facades\Config::get('app.app_sync')): ?>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Disabled For Demo "> <button class="primary-btn fix-gr-bg  demo_view" style="pointer-events: none;" type="button" ><?php echo app('translator')->get('front_settings.update_course'); ?></button></span>
                                <?php else: ?>
                                <button class="primary-btn fix-gr-bg" data-toggle="tooltip" title="<?php echo e(@$tooltip); ?>">
                                    <span class="ti-check"></span>
                                    <?php if(isset($add_course)): ?>
                                        <?php echo app('translator')->get('front_settings.update_course'); ?>
                                    <?php else: ?>
                                        <?php echo app('translator')->get('front_settings.add_course'); ?>
                                    <?php endif; ?>
                                   
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
        <div class="col-lg-12 mt-40">
            <div class="row">
                <div class="col-lg-4 no-gutters">
                    <div class="main-title">
                        <h3 class="mb-0"><?php echo app('translator')->get('front_settings.course_list'); ?></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <table id="table_id" class="table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get('common.title'); ?></th>
                                <th><?php echo app('translator')->get('front_settings.overview'); ?></th>
                                <th><?php echo app('translator')->get('common.image'); ?></th>
                                <th><?php echo app('translator')->get('common.action'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($course)): ?>
                                <?php $__currentLoopData = $course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(@$value->title); ?></td>
                                        <td><?php echo substr($value->overview, 0, 50); ?></td>
                                        <td><img src="<?php echo e(asset(@$value->image)); ?>" width="60px" height="50px"></td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn dropdown-toggle"
                                                        data-toggle="dropdown">
                                                    <?php echo app('translator')->get('common.select'); ?>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <?php if(userPermission('course-Details-admin')): ?>
                                                        <a href="<?php echo e(route('course-Details-admin',$value->id)); ?>"
                                                        class="dropdown-item small fix-gr-bg modalLink"
                                                        title="Course Details" data-modal-size="full-width-modal">
                                                            <?php echo app('translator')->get('common.view'); ?>
                                                        </a>
                                                    <?php endif; ?>
                                                    <?php if(userPermission('edit-course')): ?>
                                                        <a class="dropdown-item"
                                                        href="<?php echo e(route('edit-course',$value->id)); ?>"><?php echo app('translator')->get('common.edit'); ?></a>
                                                    <?php endif; ?>

                                                    <?php if(Illuminate\Support\Facades\Config::get('app.app_sync')): ?>
                                                    <span  tabindex="0" data-toggle="tooltip" title="Disabled For Demo"> <a href="#" class="dropdown-item small fix-gr-bg  demo_view" style="pointer-events: none;" ><?php echo app('translator')->get('common.delete'); ?></a></span>
                                                        <?php else: ?>
                                                            <?php if(userPermission('for-delete-course')): ?>
                                                                <a href="<?php echo e(route('for-delete-course',$value->id)); ?>"
                                                                class="dropdown-item small fix-gr-bg modalLink"
                                                                title="Delete Course" data-modal-size="modal-md">
                                                                    <?php echo app('translator')->get('common.delete'); ?>
                                                                </a>
                                                            <?php endif; ?>
                                                    <?php endif; ?> 
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startPush('script'); ?>


<script>
                                                   
    CKEDITOR.replace("overview");
    CKEDITOR .replace( "outline" );
    CKEDITOR.replace( "prerequisites" );
    CKEDITOR.replace( "resources" );
    CKEDITOR.replace( "stats" );
 </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\course\course_page.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title'); ?> 
<?php echo app('translator')->get('study.upload_content_list'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('study.upload_content_list'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('study.study_material'); ?></a>
                <a href="#"><?php echo app('translator')->get('study.upload_content_list'); ?></a>
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
                            <div class="main-title">
                                <h3 class="mb-30">
                                    <?php if(isset($editData)): ?>
                                        <?php echo app('translator')->get('study.edit_upload_content'); ?>
                                    <?php else: ?>
                                        <?php echo app('translator')->get('study.upload_content'); ?>
                                    <?php endif; ?>
                                  
                                </h3>
                            </div>
                            <?php if(isset($editData)): ?>
                                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'global-update-upload-content',@$editData->id, 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                                <input type="hidden" name="id" value="<?php echo e(@$editData->id); ?>">
                                <?php else: ?>
                             <?php if(userPermission(89)): ?>
                                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'global-save-upload-content', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                            <?php endif; ?>
                            <?php endif; ?>
                            <div class="white-box">
                                <div class="add-visitor">
                                    <div class="row mb-25">
                                        <div class="col-lg-12 mb-30">
                                            <div class="primary_input">
                                                <label> <?php echo app('translator')->get('study.content_title'); ?> <span class="text-danger"> *</span> </label>
                                                <input
                                                    class="primary_input_field form-control<?php echo e($errors->has('content_title') ? ' is-invalid' : ''); ?>"
                                                    type="text" name="content_title" autocomplete="off"
                                                    value="<?php echo e(isset($editData)? @$editData->content_title:''); ?>">
                                               
                                                
                                                <?php if($errors->has('content_title')): ?>
                                                    <span class="text-danger" >
                                                <?php echo e($errors->first('content_title')); ?></strong>
                                            </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-30">
                                            <select
                                                class="primary_select  form-control<?php echo e($errors->has('content_type') ? ' is-invalid' : ''); ?>"
                                                name="content_type" id="content_type">
                                                <option data-display="<?php echo app('translator')->get('study.content_type'); ?> *" value=""><?php echo app('translator')->get('study.content_type'); ?> *</option>
                                                <option value="as" <?php echo e(isset($editData) && @$editData->content_type == "as"? 'selected':''); ?>> <?php echo app('translator')->get('study.assignment'); ?></option>
                                                
                                                <option value="sy" <?php echo e(isset($editData) && @$editData->content_type == "sy"? 'selected':''); ?>><?php echo app('translator')->get('study.syllabus'); ?></option>
                                                <option value="ot" <?php echo e(isset($editData) && @$editData->content_type == "ot"? 'selected':''); ?>><?php echo app('translator')->get('study.other_download'); ?></option>
                                            </select>
                                            <?php if($errors->has('content_type')): ?>
                                                <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('content_type')); ?></strong>
                                        </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-lg-12 mb-30">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('study.available_for'); ?><span class="text-danger"> *</span></label><br>
                                            <div class="">
                                                <input type="checkbox" id="all_admin"
                                                       class="common-checkbox form-control<?php echo e($errors->has('available_for') ? ' is-invalid' : ''); ?>"
                                                       name="available_for[]" value="admin"  <?php echo e(isset($editData) && @$editData->available_for_admin == "1"? 'checked':''); ?>>
                                                <label for="all_admin"><?php echo app('translator')->get('study.all_admin'); ?></label>
                                                <input type="checkbox" id="student"
                                                       class="common-checkbox form-control<?php echo e($errors->has('available_for') ? ' is-invalid' : ''); ?>"
                                                       name="available_for[]" value="student" <?php echo e(isset($editData) && @$editData->available_for_all_classes == "1" || @$editData->un_semester_label_id != "" || @$editData->class != "" || @$editData->section != ""? 'checked':''); ?>>
                                                <label for="student"><?php echo app('translator')->get('common.student'); ?></label>
                                            </div>
                                            <?php if($errors->has('available_for')): ?>
                                                <span class="text-danger validate-textarea-checkbox" role="alert">
                                                <?php echo e($errors->first('available_for')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        <?php
                                            // if( @$editData->available_for_all_classes == "1" || @$editData->class != "" || @$editData->section != ""){
                                            if(@$editData->available_for_all_classes == "1"){
                                                $show = "";
                                                $show1 = "disabledbutton";
                                            }elseif(@$editData->class != "" || @$editData->section != ""){
                                                $show = "disabledbutton";
                                                $show1 = "";
                                            }else{
                                                $show = "disabledbutton";
                                                $show1 = "disabledbutton";
                                            }
                                        ?>
                                        <?php if(!moduleStatusCheck('University')): ?>
                                            <div class="col-lg-12 <?php echo e(@$show); ?> mb-30" id="availableClassesDiv">

                                                <div class="">
                                                    <input type="checkbox" id="all_classes"
                                                        class="common-checkbox form-control" name="all_classes" <?php echo e(isset($editData) && @$editData->available_for_all_classes == "1"? 'checked':''); ?>>
                                                    <label for="all_classes"><?php echo app('translator')->get('study.available_for_all_classes'); ?></label>
                                                </div>
                                            </div>
                                        <?php endif; ?> 

                                        <div class="forStudentWrapper col-lg-12 mb-20 <?php echo e($errors->has('class') || $errors->has('section')? '':@$show1); ?>"
                                            id="contentDisabledDiv">
                                            <?php if(moduleStatusCheck('University')): ?>
                                            <?php if ($__env->exists('university::common.session_faculty_depart_academic_semester_level',['required' => ['USN','UF', 'UD', 'US', 'USL'] , 'hide' => ['USUB','UA'],'row' => 1, 'div' => 'col-lg-12', 'mt' =>'mt-0'])) echo $__env->make('university::common.session_faculty_depart_academic_semester_level',['required' => ['USN','UF', 'UD', 'US', 'USL'] , 'hide' => ['USUB','UA'],'row' => 1, 'div' => 'col-lg-12', 'mt' =>'mt-0'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <input type="hidden" name="un_academic_id" id="select_academic" value="<?php echo e(getAcademicId()); ?>">
                                            <?php else: ?> 

                                            <div class="row">
                                                <div class="col-lg-12 mb-20">
                                                    <div class="primary_input">
                                                        <select
                                                            class="primary_select  form-control<?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>"
                                                            name="class" id="classSelectStudent">
                                                            <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *"
                                                                    value=""><?php echo app('translator')->get('common.select'); ?></option>
                                                            <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e(@$class->id); ?>" <?php echo e(isset($editData) && $editData->class == $class->id? 'selected':''); ?>><?php echo e(@$class->class_name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                        
                                                        <?php if($errors->has('class')): ?>
                                                            <span class="text-danger invalid-select" role="alert">
                                                        <?php echo e($errors->first('class')); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 mb-30">
                                                    <div class="primary_input" id="sectionStudentDiv">
                                                        <select
                                                            class="primary_select  form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?>"
                                                            name="section" id="sectionSelectStudent">
                                                            <option data-display="<?php echo app('translator')->get('common.select_section'); ?> "
                                                                    value=""><?php echo app('translator')->get('common.section'); ?> 
                                                            </option>
                                                            <?php if(isset($editData->section)): ?>
                                                                <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($section->id); ?>" <?php echo e($editData->section == $section->id? 'selected': ''); ?>><?php echo e($section->section_name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endif; ?>
                                                        </select>
                                                        <div class="pull-right loader loader_style" id="select_section_loader">
                                                            <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                                        </div>
                                                        
                                                        <?php if($errors->has('section')): ?>
                                                        <span class="text-danger invalid-select" role="alert">
                                                        <?php echo e($errors->first('section')); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php endif; ?> 
                                            
                                        </div>
                                        <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                    </div>
                                    <div class="row no-gutters input-right-icon mb-30">

                                        <div class="col">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('common.date'); ?> <span></span> </label>
                                                <input
                                                    class="primary_input_field  primary-input date form-control form-control<?php echo e($errors->has('upload_date') ? ' is-invalid' : ''); ?>"
                                                    id="upload_date" type="text"
                                                    name="upload_date"
                                                    value="<?php echo e(isset($editData)? date('m/d/Y', strtotime(@$editData->upload_date)): date('m/d/Y')); ?>">
                                               
                                                
                                                <?php if($errors->has('upload_date')): ?>
                                                    <span class="text-danger" >
                                        <?php echo e($errors->first('upload_date')); ?></strong>
                                        </span>
                                                <?php endif; ?>
                                            </div>

                                        </div>
                                        
                                        <button class="" type="button">
                                            <i class="ti-calendar" id="admission-date-icon"></i>
                                        </button>
                                    </div>
                                    

                                    <div class="row mb-20">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('study.description'); ?> <span></span> </label>
                                                <textarea class="primary_input_field form-control" cols="0" rows="3" name="description" id="description"><?php echo e(@$editData->description); ?></textarea>
                                               
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="row no-gutters input-right-icon mb-20">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label> <?php echo app('translator')->get('study.source_url'); ?></label>
                                                <input
                                                    class="primary_input_field form-control<?php echo e($errors->has('source_url') ? ' is-invalid' : ''); ?>"
                                                    type="text" name="source_url" autocomplete="off"
                                                    value="<?php echo e(isset($editData)? @$editData->source_url:''); ?>">
                                                
                                                
                                                <?php if($errors->has('source_url')): ?>
                                                    <span class="text-danger" >
                                                <?php echo e($errors->first('source_url')); ?></strong>
                                            </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row no-gutters input-right-icon mb-20">
                                        <div class="col">
                                            <div class="primary_input">
                                                <input
                                                    class="primary_input_field form-control <?php echo e($errors->has('content_file') ? ' is-invalid' : ''); ?>"
                                                    readonly="true" type="text"
                                                    placeholder="<?php echo e(isset($editData->upload_file) && @$editData->upload_file != ""? getFilePath3(@$editData->upload_file):trans('study.file').''); ?>"
                                                    id="placeholderUploadContent">
                                                
                                                <?php if($errors->has('content_file')): ?>
                                                    <span class="text-danger" >
                                                        <?php echo e($errors->first('content_file')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button class="primary-btn-small-input" type="button">
                                                <label class="primary-btn small fix-gr-bg"
                                                       for="upload_content_file"><?php echo app('translator')->get('common.browse'); ?></label>
                                                    
                                                <input type="file" class="d-none form-control" name="content_file"
                                                       id="upload_content_file">
                                            </button>
                                            
                                        </div>
                                        <code>(jpg,png,jpeg,pdf,doc,docx,mp4,mp3,txt are allowed for upload)</code>
                                    </div>
                                      <?php 
                                  $tooltip = "";
                                  if(userPermission(89) ){
                                        @$tooltip = "";
                                    }else{
                                        @$tooltip = "You have no permission to add";
                                    }
                                ?>
                                    <div class="row mt-40">
                                        <div class="col-lg-12 text-center">
                                            <button class="primary-btn fix-gr-bg" data-toggle="tooltip" title="<?php echo e(@$tooltip); ?>">
                                                <span class="ti-check"></span>
                                                <?php echo app('translator')->get('study.upload_content'); ?>
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
                    <div class="row">
                        <div class="col-lg-4 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-0"> <?php echo app('translator')->get('study.upload_content_list'); ?></h3>
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
                                            <th><?php echo app('translator')->get('common.sl'); ?></th>
                                            <th> <?php echo app('translator')->get('study.content_title'); ?></th>
                                            <th> <?php echo app('translator')->get('common.type'); ?></th>
                                            <th> <?php echo app('translator')->get('common.date'); ?></th>
                                            <th> <?php echo app('translator')->get('study.available_for'); ?></th>
                                            <?php if(moduleStatusCheck('University')): ?>
                                                <th> <?php echo app('translator')->get('university::un.semester_label'); ?></th>
                                                <th> <?php echo app('translator')->get('common.section'); ?></th>
                                            <?php else: ?> 
                                                <th> <?php echo app('translator')->get('study.classSec'); ?></th>
                                            <?php endif; ?> 
                                            <th> <?php echo app('translator')->get('common.action'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($uploadContents)): ?>
                                            <?php $__currentLoopData = $uploadContents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($key+1); ?></td>
                                                    <td><?php echo e(@$value->content_title); ?></td>
                                                    <td>
                                                        <?php if(@$value->content_type == 'as'): ?>
                                                            <?php echo app('translator')->get('study.assignment'); ?>
                                                        <?php elseif(@$value->content_type == 'st'): ?>
                                                            <?php echo app('translator')->get('study.study_material'); ?>
                                                        <?php elseif(@$value->content_type == 'sy'): ?>
                                                            <?php echo app('translator')->get('study.syllabus'); ?>
                                                        <?php else: ?>
                                                            <?php echo app('translator')->get('study.other_download'); ?>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td  data-sort="<?php echo e(strtotime(@$value->upload_date)); ?>" >
                                                        <?php echo e(@$value->upload_date != ""? dateConvert(@$value->upload_date):''); ?> 
                                                    </td>
                                                    <td>
                                                        
                                                            <?php if(@$value->available_for_admin == 1): ?>
                                                                <?php echo app('translator')->get('study.all_admins'); ?><br>
                                                            <?php endif; ?>
                                                            <?php if(@$value->available_for_all_classes == 1): ?>
                                                                <?php echo app('translator')->get('study.all_classes_student'); ?>
                                                            <?php endif; ?>
                                                            <?php if(@$value->globalClasses != "" && $value->globalSections != ""): ?>
                                                                <?php echo app('translator')->get('study.all_students_of'); ?> (<?php echo e(@$value->globalClasses->class_name.'->'.@$value->globalSections->section_name); ?>)
                                                            <?php endif; ?>
                                                            <?php if(@$value->classes != "" && $value->section ==null): ?>
                                                                <?php echo app('translator')->get('study.all_students_of'); ?> (<?php echo e(@$value->classes->class_name.'->'); ?> <?php echo app('translator')->get('study.all_sections'); ?>)
                                                            <?php endif; ?>
                                                       
                                                    </td>
                                                    <td>
                                                        
                                                       
                                                            <?php if(@$value->globalClasses != ""): ?>
                                                                <?php echo e(@$value->globalClasses->class_name); ?>

                                                            <?php endif; ?>
                                                            <?php if($value->globalSections != ""): ?>
                                                                (<?php echo e(@$value->globalSections->section_name); ?>)
                                                            <?php endif; ?>
                                                            <?php if($value->section == Null): ?>
                                                                ( <?php echo app('translator')->get('study.all_sections'); ?> )
                                                            <?php endif; ?>
                                                       
                                                    </td>
                                                    <?php if(moduleStatusCheck('University')): ?>
                                                        <td><?php echo e(@$value->unSection->section_name); ?></td>
                                                    <?php endif; ?>
                                                    <td>
                                                        
                                                        <?php
                                                        $routeList = [

                                                            '<a data-modal-size="modal-lg" title="'. __('study.view_content_details').'" class="dropdown-item modalLink" href="'.route('global-upload-content-view', $value->id).'">'.__('common.view').'</a>',
                                                                moduleStatusCheck('VideoWatch')== TRUE ?
                                                                    '<a class="dropdown-item" href="'.url('videowatch/view-log/'.$value->id).'">'.__('study.seen').'</a>' : null,
                                                                
                                                                '<a class="dropdown-item" href="'.route('global-upload-content-edit',$value->id).'">'.__('common.edit').'</a>',

                                                                userPermission(91) ?
                                                                    '<a class="dropdown-item" data-toggle="modal" data-target="#deleteApplyLeaveModal'.$value->id.'" href="#">'.__('common.delete').'</a>':null,

                                                                userPermission(90) && $value->upload_file != "" ?
                                                                        '<a class="dropdown-item" href="'.url($value->upload_file).'" download>
                                                                            '.__('common.download').' 
                                                                            <span class="pl ti-download"></span></a>'
                                                                    :null
                                                        ]
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
                                                <div class="modal fade admin-query" id="deleteApplyLeaveModal<?php echo e(@$value->id); ?>">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title"><?php echo app('translator')->get('study.delete_upload_content'); ?></h4>
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
                                                                            <?php echo e(Form::open(['route' =>'delete-upload-content', 'method' => 'POST'])); ?>

                                                                                <input type="hidden" name="id" value="<?php echo e(@$value->id); ?>">
                                                                                <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('common.delete'); ?></button>
                                                                            <?php echo e(Form::close()); ?>

                                                                    </a>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
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
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\global\global_uploadContentList.blade.php ENDPATH**/ ?>
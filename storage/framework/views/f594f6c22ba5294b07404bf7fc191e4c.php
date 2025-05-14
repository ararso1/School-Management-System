<?php $__env->startSection('title'); ?> 
    <?php echo app('translator')->get('admin.create_id_card'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<style>
    /* .user_id_card{
        border-radius:5px;
        background: #fff;
        height:54mm;
        width:86mm;
    } */
    .user_id_card_header{
        padding: 10px;
        background: var(--primary-color);

    }
    .user_id_card_header h4{
        font-size:18px;
        font-weight: 500;
        text-align: center;
        margin-bottom: 0;
        color: #fff;
    }
    .user_id_card .user_body{
        padding: 30px;
        /* background-image: url(<?php echo e(asset('public/backEnd/img/student/id-card-img.jpg')); ?>); */
        background-repeat: no-repeat;
        background-size: 100% 100%;
        background-position:top center;
    }
    .user_id_card .user_thumb {
        text-align: center;
    }
    .user_id_card .user_thumb img {
        width: 25mm;
        height: 25mm;
    }
    .user_id_card .user_body .user_info_details{
        margin-top: 25px;
    }
    .user_id_card .user_body .user_info_details{}
    .user_id_card .user_body .user_info_details .single_info{
        display: flex;
        justify-content : space-between;
        align-items : center;
    }
    .user_id_card .user_body .user_info_details .single_info span{
        font-size: 13px;
        font-weight: 500;
        color: #828bb2;
        text-transform:capitalize;
    }
    .user_id_card .user_body .single_info .thumb_singnature img{
        max-width: 60px;
        height: 28px;
    }
    .user_id_card .user_body .user_logo{
        text-align: center;
        margin-top: 20px;
    }
    .user_id_card .user_body .user_logo p{
        font-size: 13px;
        font-weight: 500;
        color: #828bb2;
        text-transform:capitalize;
        margin-top: 10px;
    }
    .user_id_card .user_body .user_logo img{
        max-width: 130px;
        height: 40px

    }
    .image_round{
        border-radius:50%;
    }
    .image_squre{
        border-radius:0%;
    }

    .cust-margin{
        margin-left: -125px !important;
    }

.sticky_card {
    position: sticky;
    top: 0;
}



</style>
<section class="sms-breadcrumb mb-20 up_breadcrumb">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('admin.create_id_card'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('admin.admin_section'); ?></a>
                <a href="#"><?php echo app('translator')->get('admin.id_card'); ?></a>
                <a href="#"><?php echo app('translator')->get('admin.create_id_card'); ?></a>
            </div>
        </div>
    </div>
</section>

<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
        <?php if(isset($id_card)): ?>
            <?php if(userPermission(46)): ?>
            <div class="row">
                <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                    <a href="<?php echo e(route('student-id-card')); ?>" class="primary-btn small fix-gr-bg">
                        <span class="ti-plus pr-2"></span>
                        <?php echo app('translator')->get('common.add'); ?>
                    </a>
                </div>
            </div>
            <?php endif; ?>
        <?php endif; ?>
        <div class="row">
            <div class="col-lg-7">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-title">
                            <h3 class="mb-30"><?php if(isset($id_card)): ?>
                                    <?php echo app('translator')->get('common.edit'); ?>
                                <?php else: ?>
                                    <?php echo app('translator')->get('common.add'); ?>
                                <?php endif; ?>
                                <?php echo app('translator')->get('admin.id_card'); ?>
                            </h3>
                        </div>
                        
                        <?php if(userPermission(46)): ?>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'store-id-card',
                        'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <?php endif; ?>
                        <div class="white-box">
                            <div class="add-visitor">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <input class="primary_input_field "
                                                type="text" name="title" autocomplete="off" value="<?php echo e(isset($id_card)? $id_card->title: old('title')); ?>" id="title">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.id_card_title'); ?> <span class="text-danger"> *</span></label>
                                            
                                            <?php if($errors->has('title')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('title')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <select class="primary_select  form-control<?php echo e($errors->has('page_layout_style') ? ' is-invalid' : ''); ?>" name="page_layout_style" id="pageLayoutStyle">
                                                <option value="horizontal"><?php echo app('translator')->get('admin.horizontal'); ?></option>
                                                <option value="vertical"><?php echo app('translator')->get('admin.vertical'); ?></option>
                                            </select>
                                                
                                                <?php if($errors->has('page_layout_style')): ?>
                                                <span class="text-danger invalid-select" role="alert">
                                                    <?php echo e($errors->first('page_layout_style')); ?>

                                                </span>
                                                <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex mt-25">
                                    <div class="row flex-grow-1 d-flex justify-content-between input-right-icon">
                                        <div class="col">
                                            <div class="primary_input">
                                                <input class="primary_input_field form-control<?php echo e($errors->has('background_img') ? ' is-invalid' : ''); ?>" type="text" id="backgroundImage" placeholder="<?php echo e(isset($id_card)? ($id_card->logo != ""? getFilePath3($id_card->logo): trans('admin.background').' '.trans('admin.image')):trans('admin.background').' '.trans('admin.image')); ?>"
                                                    readonly>
                                                
                                                <?php if($errors->has('background_img')): ?>
                                                <span class="text-danger" >
                                                    <?php echo e($errors->first('background_img')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button class="primary-btn-small-input cust-margin" type="button">
                                                <label class="primary-btn small fix-gr-bg" for="document_file_5"><?php echo app('translator')->get('common.browse'); ?></label>
                                                <input type="file" class="d-none" name="background_img" id="document_file_5" onchange="imageChangeWithBackFile(this)" value="<?php echo e(isset($id_card)? ($id_card->file != ""? getFilePath3($id_card->logo):''): ''); ?>">
                                            </button>
                                        </div>
                                    </div>
                                    <button class="primary-btn icon-only fix-gr-bg" type="button" id="deleteBackImg">
                                        <span class="ti-trash"></span>
                                    </button>
                                </div>

                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <select class="primary_select  form-control<?php echo e($errors->has('applicable_user') ? ' is-invalid' : ''); ?>" name="applicable_user" id="applicableUser">
                                                <option data-display="<?php echo app('translator')->get('admin.applicable_user'); ?> *" value=""><?php echo app('translator')->get('common.select'); ?>*</option>
                                                <option value="2"><?php echo app('translator')->get('admin.student'); ?></option>
                                                <option value="0"><?php echo app('translator')->get('admin.staff'); ?></option>
                                            </select>
                                                <div class="text-danger" id="applicableUserError"></div>
                                                
                                                <?php if($errors->has('applicable_user')): ?>
                                                <span class="text-danger invalid-select" role="alert">
                                                    <?php echo e($errors->first('applicable_user')); ?>

                                                </span>
                                                <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-25 staffInfo d-none">
                                    <div class="col-lg-12">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.role'); ?><span class="text-danger"> *</span></label><br> 
                                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($role->id != 2 && $role->id != 3): ?>
                                                <div class="">
                                                    <input type="checkbox" id="role_<?php echo e(@$role->id); ?>" class="common-checkbox" value="<?php echo e(@$role->id); ?>" name="role[]">
                                                    <label for="role_<?php echo e(@$role->id); ?>"><?php echo e(@$role->name); ?></label>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                        <?php if($errors->has('section')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('section')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="row mt-25">
                                    <div class="col-lg-6">
                                        <div class="primary_input">
                                            <input class="primary_input_field form-control<?php echo e($errors->has('pl_width') ? ' is-invalid' : ''); ?>" type="text" name="pl_width" id="plWidth" autocomplete="off">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.page_layout_width'); ?> <span id="pWidth">(<?php echo app('translator')->get('admin.default'); ?> 57 mm)</span></label>
                                            
                                            <?php if($errors->has('pl_width')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('pl_width')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="primary_input">
                                            <input class="primary_input_field form-control<?php echo e($errors->has('pl_height') ? ' is-invalid' : ''); ?>" type="text" name="pl_height" id="plHeight" autocomplete="off">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.page_layout_height'); ?> <span id="pHeight">(<?php echo app('translator')->get('admin.default'); ?> 89 mm)</span></label>
                                            
                                            <?php if($errors->has('pl_height')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('pl_height')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex mt-25">
                                    <div class="row flex-grow-1 d-flex justify-content-between input-right-icon">
                                        <div class="col">
                                            <div class="primary_input">
                                                <input class="primary_input_field form-control<?php echo e($errors->has('profile_image') ? ' is-invalid' : ''); ?>" type="text" id="profileImage" placeholder="<?php echo e(isset($id_card)? ($id_card->logo != ""? getFilePath3($id_card->logo): trans('admin.profile').' '.trans('admin.image')):trans('admin.profile').' '.trans('admin.image')); ?>"
                                                    readonly>
                                                
                                                <?php if($errors->has('profile_image')): ?>
                                                <span class="text-danger" >
                                                    <?php echo e($errors->first('profile_image')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button class="primary-btn-small-input cust-margin" type="button">
                                                <label class="primary-btn small fix-gr-bg" for="document_file_6"><?php echo app('translator')->get('common.browse'); ?></label>
                                                <input type="file" class="d-none" name="profile_image" id="document_file_6" onchange="imageChangeWithFile(this,'.photo')" value="<?php echo e(isset($id_card)? ($id_card->file != ""? getFilePath3($id_card->logo):''): ''); ?>">
                                            </button>
                                        </div>
                                    </div>
                                    <button class="primary-btn icon-only fix-gr-bg" type="button" id="deleteProImg">
                                        <span class="ti-trash"></span>
                                    </button>
                                </div>

                                <div class="row mt-25">
                                    <div class="col-lg-4 d-flex">
                                        <p class="text-uppercase fw-500 mb-10"> <?php echo app('translator')->get('admin.user_photo_style'); ?> </p>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="primary_input">
                                            <select class="primary_select  form-control<?php echo e($errors->has('user_photo_style') ? ' is-invalid' : ''); ?>" name="user_photo_style" id="userPhotoStyle">
                                                <option data-display="<?php echo app('translator')->get('admin.user_photo_style'); ?> *" value=""><?php echo app('translator')->get('common.select'); ?>*</option>
                                                <option value="squre"><?php echo app('translator')->get('admin.squre'); ?></option>
                                                <option value="round"><?php echo app('translator')->get('admin.round'); ?></option>
                                            </select>
                                            <div class="text-danger" id="applicableUserError"></div>
                                            
                                            <?php if($errors->has('user_photo_style')): ?>
                                            <span class="text-danger invalid-select" role="alert">
                                                <?php echo e($errors->first('user_photo_style')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-6">
                                        <div class="primary_input">
                                            <input class="primary_input_field form-control<?php echo e($errors->has('user_photo_width') ? ' is-invalid' : ''); ?>" type="text" id="userPhotoWidth" name="user_photo_width" autocomplete="off">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.user_photo_size_width'); ?> <span id="profileWidth">(<?php echo app('translator')->get('admin.default'); ?> 21 mm)</span> <span class="text-danger"> *</span></label>
                                            
                                            <?php if($errors->has('user_photo_width')): ?>
                                            <span class="text-danger" >
                                                <strong><?php echo e($errors->first('user_photo_width')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="primary_input">
                                            <input class="primary_input_field form-control<?php echo e($errors->has('user_photo_height') ? ' is-invalid' : ''); ?>" type="text" id="userPhotoheight" name="user_photo_height" autocomplete="off">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.user_photo_size_height'); ?> <span id="profileHeight">(<?php echo app('translator')->get('admin.default'); ?> 21 mm)</span> <span class="text-danger"> *</span></label>
                                            
                                            <?php if($errors->has('user_photo_height')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('user_photo_height')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-25">
                                    <div class="col-lg-4">
                                        <span><?php echo app('translator')->get('admin.layout_spacing'); ?></span>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="primary_input">
                                            <input class="primary_input_field form-control<?php echo e($errors->has('t_space') ? ' is-invalid' : ''); ?>" type="text" id="tSpace" name="t_space" autocomplete="off">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.top_space'); ?><span> (<?php echo app('translator')->get('admin.default'); ?> 2.5 mm)</span></label>
                                            
                                            <?php if($errors->has('t_space')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('t_space')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="primary_input">
                                            <input class="primary_input_field form-control<?php echo e($errors->has('b_space') ? ' is-invalid' : ''); ?>" type="text" id="bSpace" name="b_space" autocomplete="off">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.bottom_space'); ?> <span>(<?php echo app('translator')->get('admin.default'); ?> 2.5 mm)</span></label>
                                            
                                            <?php if($errors->has('b_space')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('b_space')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-4">

                                    </div>
                                    <div class="col-lg-4">
                                        <div class="primary_input">
                                            <input class="primary_input_field form-control<?php echo e($errors->has('l_space') ? ' is-invalid' : ''); ?>" type="text" id="lSpace" name="l_space" autocomplete="off">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.left_space'); ?> (<?php echo app('translator')->get('admin.default'); ?> 3 mm)</label>
                                            
                                            <?php if($errors->has('l_space')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('l_space')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="primary_input">
                                            <input class="primary_input_field form-control<?php echo e($errors->has('r_space') ? ' is-invalid' : ''); ?>" type="text" id="rSpace" name="r_space" autocomplete="off">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.right_space'); ?> (<?php echo app('translator')->get('admin.default'); ?> 3 mm)</label>
                                            
                                            <?php if($errors->has('r_space')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('r_space')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="d-flex mt-25">
                                    <div class="row flex-grow-1 d-flex justify-content-between input-right-icon">
                                        <div class="col">
                                            <div class="primary_input">
                                                <input class="primary_input_field form-control<?php echo e($errors->has('logo') ? ' is-invalid' : ''); ?>" type="text" id="placeholderFileThreeName" placeholder="<?php echo e(isset($id_card)? ($id_card->logo != ""? getFilePath3($id_card->logo): trans('admin.logo').' *'):trans('admin.logo') .' *'); ?>"
                                                    readonly>
                                                
                                                <?php if($errors->has('logo')): ?>
                                                <span class="text-danger" >
                                                    <?php echo e($errors->first('logo')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button class="primary-btn-small-input cust-margin" type="button">
                                                <label class="primary-btn small fix-gr-bg" for="document_file_3"><?php echo app('translator')->get('common.browse'); ?></label>
                                                <input type="file" class="d-none" name="logo" id="document_file_3" onchange="logoImageChangeWithFile(this,'.logoImage')" value="<?php echo e(isset($id_card)? ($id_card->file != ""? getFilePath3($id_card->logo):''): ''); ?>">
                                            </button>
                                        </div>
                                    </div>
                                    <button class="primary-btn icon-only fix-gr-bg" type="button" id="deleteLogoImg">
                                        <span class="ti-trash"></span>
                                    </button>
                                </div>


                                


                                <div class="d-flex mt-25">
                                    <div class="row flex-grow-1 d-flex justify-content-between input-right-icon">
                                        <div class="col">
                                            <div class="primary_input">
                                                <input class="primary_input_field form-control<?php echo e($errors->has('signature') ? ' is-invalid' : ''); ?>" type="text" id="placeholderFileFourName" placeholder="<?php echo e(isset($id_card)? ($id_card->signature != ""? getFilePath3($id_card->signature):trans('admin.signiture').' *'):trans('admin.signiture'). ' *'); ?>"
                                                    readonly>
                                                
                                                <?php if($errors->has('signature')): ?>
                                                <span class="text-danger" >
                                                    <?php echo e($errors->first('signature')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button class="primary-btn-small-input cust-margin" type="button">
                                                <label class="primary-btn small fix-gr-bg" for="document_file_4"><?php echo app('translator')->get('common.browse'); ?></label>
                                                <input type="file" class="d-none" name="signature" id="document_file_4" onchange="signatureImageChangeWithFile(this,'.signPhoto')">
                                            </button>
                                        </div>
                                    </div>
                                    <button class="primary-btn icon-only fix-gr-bg" type="button" id="deleteSignImg">
                                        <span class="ti-trash"></span>
                                    </button>
                                </div>

                                

                                <div class="row mt-25">
                                    <div class="col-lg-4 d-flex">
                                        <p class="text-uppercase fw-500 mb-10"><?php echo app('translator')->get('admin.id'); ?>/<?php echo app('translator')->get('student.roll'); ?></p>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="d-flex radio-btn-flex ml-40">
                                            <div class="mr-30">
                                                <input type="radio" name="admission_no" id="id_roll_yes" value="1" class="common-radio relationButton" onclick="idRoll('1')" <?php echo e(isset($id_card)? ($id_card->admission_no == 1? 'checked': ''):'checked'); ?>>
                                                <label for="id_roll_yes"><?php echo app('translator')->get('admin.yes'); ?></label>
                                            </div>
                                            <div class="mr-30">
                                                <input type="radio" name="admission_no" id="id_roll_no" value="0" class="common-radio relationButton" onclick="idRoll('0')" <?php echo e(isset($id_card)? ($id_card->admission_no == 0? 'checked': ''):''); ?>>
                                                <label for="id_roll_no"><?php echo app('translator')->get('admin.none'); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-25">
                                    <div class="col-lg-4 d-flex">
                                        <p class="text-uppercase fw-500 mb-10"><?php echo app('translator')->get('student.student_name'); ?> </p>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="d-flex radio-btn-flex ml-40">
                                            <div class="mr-30">
                                                <input type="radio" name="student_name" id="student_name_yes" value="1" class="common-radio relationButton" onclick="studentName('1')" <?php echo e(isset($id_card)? ($id_card->student_name == 1? 'checked': ''):'checked'); ?>>
                                                <label for="student_name_yes"><?php echo app('translator')->get('admin.yes'); ?></label>
                                            </div>
                                            <div class="mr-30">
                                                <input type="radio" name="student_name" id="student_name_no" value="0" class="common-radio relationButton" onclick="studentName('0')" <?php echo e(isset($id_card)? ($id_card->student_name == 0? 'checked': ''):''); ?>>
                                                <label for="student_name_no"><?php echo app('translator')->get('admin.none'); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-25">
                                    <div class="col-lg-4 d-flex">
                                        <p class="text-uppercase fw-500 mb-10"><?php echo app('translator')->get('common.class'); ?> </p>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="d-flex radio-btn-flex ml-40">
                                            <div class="mr-30">
                                                <input type="radio" name="class" id="class_yes" value="1" class="common-radio relationButton" onclick="IDclass('1')" <?php echo e(isset($id_card)? ($id_card->class == 1? 'checked': ''):'checked'); ?>>
                                                <label for="class_yes"><?php echo app('translator')->get('admin.yes'); ?></label>
                                            </div>
                                            <div class="mr-30">
                                                <input type="radio" name="class" id="class_no" value="0" class="common-radio relationButton" onclick="IDclass('0')" <?php echo e(isset($id_card)? ($id_card->class == 0? 'checked': ''):''); ?>>
                                                <label for="class_no"><?php echo app('translator')->get('admin.none'); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-4 d-flex">
                                        <p class="text-uppercase fw-500 mb-10"><?php echo app('translator')->get('student.father_name'); ?></p>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="d-flex radio-btn-flex ml-40">
                                            <div class="mr-30">
                                                <input type="radio" name="father_name" id="father_name_yes" value="1" class="common-radio relationButton" onclick="fatherName('1')" <?php echo e(isset($id_card)? ($id_card->father_name == 1? 'checked': ''):'checked'); ?>>
                                                <label for="father_name_yes"><?php echo app('translator')->get('admin.yes'); ?></label>
                                            </div>
                                            <div class="mr-30">
                                                <input type="radio" name="father_name" id="father_name_no" value="0" class="common-radio relationButton" onclick="fatherName('0')" <?php echo e(isset($id_card)? ($id_card->father_name == 0? 'checked': ''):''); ?>>
                                                <label for="father_name_no"><?php echo app('translator')->get('admin.none'); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-4 d-flex">
                                        <p class="text-uppercase fw-500 mb-10"><?php echo app('translator')->get('student.mother_name'); ?></p>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="d-flex radio-btn-flex ml-40">
                                            <div class="mr-30">
                                                <input type="radio" name="mother_name" id="mother_name_yes" value="1" class="common-radio relationButton" onclick="motherName('1')" <?php echo e(isset($id_card)? ($id_card->mother_name == 1? 'checked': ''):'checked'); ?>>
                                                <label for="mother_name_yes"><?php echo app('translator')->get('admin.yes'); ?></label>
                                            </div>
                                            <div class="mr-30">
                                                <input type="radio" name="mother_name" id="mother_name_no" value="0" class="common-radio relationButton" onclick="motherName('0')" <?php echo e(isset($id_card)? ($id_card->mother_name == 0? 'checked': ''):''); ?>>
                                                <label for="mother_name_no"><?php echo app('translator')->get('admin.none'); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-4 d-flex">
                                        <p class="text-uppercase fw-500 mb-10"><?php echo app('translator')->get('admin.student_address'); ?></p>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="d-flex radio-btn-flex ml-40">
                                            <div class="mr-30">
                                                <input type="radio" name="student_address" id="address_yes" value="1" class="common-radio relationButton" onclick="addRess('1')" <?php echo e(isset($id_card)? ($id_card->student_address == 1? 'checked': ''):'checked'); ?>>
                                                <label for="address_yes"><?php echo app('translator')->get('admin.yes'); ?></label>
                                            </div>
                                            <div class="mr-30">
                                                <input type="radio" name="student_address" id="address_no" value="0" class="common-radio relationButton" onclick="addRess('0')" <?php echo e(isset($id_card)? ($id_card->student_address == 0? 'checked': ''):''); ?>>
                                                <label for="address_no"><?php echo app('translator')->get('admin.none'); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mt-25">
                                    <div class="col-lg-4 d-flex">
                                        <p class="text-uppercase fw-500 mb-10"><?php echo app('translator')->get('common.date_of_birth'); ?></p>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="d-flex radio-btn-flex ml-40">
                                            <div class="mr-30">
                                                <input type="radio" name="dob" id="dob_yes" value="1" class="common-radio relationButton" onclick="dOB('1')"  <?php echo e(isset($id_card)? ($id_card->dob == 1? 'checked': ''):'checked'); ?>>
                                                <label for="dob_yes"><?php echo app('translator')->get('admin.yes'); ?></label>
                                            </div>
                                            <div class="mr-30">
                                                <input type="radio" name="dob" id="dob_no" value="0" class="common-radio relationButton" onclick="dOB('0')" <?php echo e(isset($id_card)? ($id_card->dob == 0? 'checked': ''):''); ?>>
                                                <label for="dob_no"><?php echo app('translator')->get('admin.none'); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-4 d-flex">
                                        <p class="text-uppercase fw-500 mb-10"><?php echo app('translator')->get('student.blood_group'); ?></p>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="d-flex radio-btn-flex ml-40">
                                            <div class="mr-30">
                                                <input type="radio" name="blood" id="blood_yes" value="1" class="common-radio relationButton" onclick="bloodGroup('1')" <?php echo e(isset($id_card)? ($id_card->blood == 1? 'checked': ''):'checked'); ?>>
                                                <label for="blood_yes"><?php echo app('translator')->get('admin.yes'); ?></label>
                                            </div>
                                            <div class="mr-30">
                                                <input type="radio" name="blood" id="blood_no" value="0" class="common-radio relationButton" onclick="bloodGroup('0')" <?php echo e(isset($id_card)? ($id_card->blood == 0? 'checked': ''):''); ?>>
                                                <label for="blood_no"><?php echo app('translator')->get('admin.none'); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                  $tooltip = "";
                                  if(userPermission(46)){
                                        $tooltip = "";
                                    }else{
                                        $tooltip = "You have no permission to add";
                                    }
                                ?>
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn fix-gr-bg submit savaIdCard" type="submit" data-toggle="tooltip" title="<?php echo e($tooltip); ?>">
                                            <span class="ti-check"></span>
                                            <?php if(isset($id_card)): ?>
                                                <?php echo app('translator')->get('common.update'); ?>
                                            <?php else: ?>
                                                <?php echo app('translator')->get('common.save'); ?>
                                            <?php endif; ?>
                                        <?php echo app('translator')->get('admin.id_card'); ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="row">
                    <div class="col-lg-4 no-gutters">
                        <div class="main-title">
                            <h3 class="mb-0"><?php echo app('translator')->get('admin.preview_id_card'); ?> </h3>
                        </div>
                    </div>
                </div>

                <div class="sticky_card">
                    <div class="user_id_card_header mt-30">
                        <h4 id="titleV"><?php echo app('translator')->get('admin.user_id_card'); ?></h4>
                    </div>
                    <div class="mt-10">

                        <div id="horizontal" style="margin: 0; padding: 0; font-family: 'Poppins', sans-serif; font-weight: 500;  font-size: 12px; line-height:1.02 ; color: #000">
                            <div class="horizontal__card" style="line-height:1.02; background-image: url(<?php echo e(asset('public/backEnd/id_card/img/vertical_bg.png')); ?>); width: 57.15mm; height: 88.89999999999999mm; margin: auto; background-size: 100% 100%; background-position: center center; position: relative; background-color: #fff;">
                                <div class="horizontal_card_header" style="line-height:1.02; display: flex; align-items:center; justify-content:space-between; padding:8px 12px">
                                    <div class="logo__img logoImage hLogo" style="line-height:1.02; width: 80px; background-image: url('<?php echo e(asset('public/backEnd/img/logo.png')); ?>');height: 30px;
                                    background-size: cover;
                                    background-repeat: no-repeat;
                                    background-position: center center;">
                                        
                                    </div>
                                    <div class="qr__img" style="line-height:1.02; width: 30px;">
                                        <img src="<?php echo e(asset('public/backEnd/id_card/img/dd.png')); ?>" alt="" style="line-height:1.02; width: 100%;">
                                    </div>
                                </div>
                                <div class="horizontal_card_body" style="line-height:1.02; display:block; padding-top: 2.5mm; padding-bottom: 2.5mm; padding-right: 3mm ; padding-left: 3mm; flex-direction: column;">
                                    <div class="thumb hRoundImg hSize photo hImg hRoundImg" style=" background-image: url('<?php echo e(asset('public/backEnd/id_card/img/thumb.png')); ?>');background-size: cover;
                                    background-position: center center;
                                    background-repeat: no-repeat; line-height:1.02; width: 21.166666667mm; flex: 80px 0 0; height: 21.166666667mm; margin: auto;border-radius: 50%; padding: 3px; align-content: center;
                                    justify-content: center;
                                    display: flex; border: 3px solid #fff;">
                                        
                                    </div>

                                    <div class="card_text" style="line-height:1.02; display: flex; align-items: center; justify-content: space-between; width: 100%; flex-direction: column;">
                                        <div class="card_text_head " style="line-height:1.02; display: flex; align-items: center; justify-content: space-between; width: 100%; margin-top:25px; margin-bottom:10px">
                                            <div class="card_text_left hId">
                                                <div id="hName">
                                                    <h4 style="line-height:1.02; margin-top: 0; margin-bottom: 0px; font-size:11px; font-weight:600 ; text-transform: uppercase; color: #2656a6;">InfixEdu</h4>
                                                </div>
                                                <div id="hAdmissionNumber">
                                                    <h3 style="line-height:1.02; margin-top: 0; margin-bottom: 3px; font-size:10px; font-weight:500">Admission No : 001</h3>
                                                </div>
                                                <div id="hClass">
                                                    <h3 style="line-height:1.02; margin-top: 0; margin-bottom: 3px; font-size:10px; font-weight:500">Class : One (A)</h3>
                                                </div>
                                            </div>

                                            
                                        </div>

                                        <div class="card_text_head hStudentName" style="line-height:1.02; display: flex; align-items: center; justify-content: space-between; width: 100%; margin-bottom:10px"> 
                                            <div class="card_text_left">
                                                
                                                <div id="hFatherName">
                                                    <h4 style="line-height:1.02; margin-top: 0; margin-bottom: 3px; font-size:10px; font-weight:500">Father Name : Infixedu</h4>
                                                </div>
                                                <div id="hMotherName">
                                                    <h4 style="line-height:1.02; margin-top: 0; margin-bottom: 0; font-size:10px; font-weight:500">Mother Name : Infixedu</h4>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card_text_head " style="line-height:1.02; display: flex; align-items: center; justify-content: space-between; width: 100%; margin-bottom:10px"> 
                                            <div class="card_text_left">
                                                <div id="hDob">
                                                    <h3 style="line-height:1.02; margin-top: 0; margin-bottom: 3px; font-size:10px; font-weight:500">Date of Birth : Dec 25 , 2022</h3>
                                                </div>
                                                <div id="hBloodGroup">
                                                    <h3 style="line-height:1.02; margin-top: 0; margin-bottom: 3px; font-size:10px; font-weight:500">Blood Group : B+</h3>
                                                </div>
                                                
                                            </div>
                                            
                                        </div>
                                        <div class="card_text_head " style="line-height:1.02; display: flex; align-items: center; justify-content: space-between; width: 100%; margin-top:5px"> 
                                            <div class="card_text_left" id="hAddress">
                                                <h3 style="line-height:1.02; margin-top: 0; margin-bottom: 5px; font-size:10px; font-weight:500; text-transform:uppercase">Al Khuwair, Muscat, Oman</h3>
                                                <h4 style="line-height:1.02; margin-top: 0; margin-bottom: 0; font-size:9px; text-transform: uppercase; font-weight:500"><?php echo app('translator')->get('common.address'); ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="horizontal_card_footer" style="line-height:1.02; text-align: right;">
                                    <div class="singnature_img signPhoto hSign" style="background-image:url('<?php echo e(asset('public/backEnd/id_card/img/Signature.png')); ?>');line-height:1.02; width: 50px; flex: 50px 0 0; margin-left: auto; position: absolute; right: 10px; bottom: 7px;height: 25px;
                                    background-size: cover;
                                    background-repeat: no-repeat;
                                    background-position: center center;">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="vertical" class="d-none overflow-auto" style="margin: 0; padding: 0; font-family: 'Poppins', sans-serif;  font-size: 12px; line-height:1.02 ;">
                            <div class="vertical__card" style="line-height:1.02; background-image: url(<?php echo e(asset('public/backEnd/id_card/img/horizontal_bg.png')); ?>); width: 86mm; height: 54mm; margin: auto; background-size: 100% 100%; background-position: center center; position: relative;">
                                <div class="horizontal_card_header" style="line-height:1.02; display: flex; align-items:center; justify-content:space-between; padding: 12px">
                                    <div class="logo__img logoImage vLogo" style="line-height:1.02; width: 80px; background-image: url('<?php echo e(asset('public/backEnd/img/logo.png')); ?>');background-size: cover;
                                    height: 30px;background-position: center center;
                                    background-repeat: no-repeat;">
                                        
                                    </div>
<!--                                    <div class="qr__img" style="line-height:1.02; width: 30px;">
                                        <img src="<?php echo e(asset('public/backEnd/id_card/img/qr.png')); ?>" alt="" style="line-height:1.02; width: 100%;">
                                    </div>-->
                                </div>
                                <div class="vertical_card_body" style="line-height:1.02; display:flex; padding-top: 2.5mm; padding-bottom: 2.5mm; padding-right: 3mm ; padding-left: 3mm;">
                                    <div class="thumb vSize vSizeX photo vImg vRoundImg" style="background-image: url('<?php echo e(asset('public/backEnd/id_card/img/thumb.png')); ?>'); line-height:1.02; width: 13.229166667mm; height: 13.229166667mm; flex-basis: 13.229166667mm; flex-grow: 0; flex-shrink: 0; margin-right: 30px; background-size: cover;
                                    background-position: center center;">
                                        
                                    </div>
                                    <div class="card_text" style="line-height:1.02; display: flex; align-items: center; justify-content: space-between; width: 100%; flex-direction: column;">
                                        <div class="card_text_head " style="line-height:1.02; display: flex; align-items: center; justify-content: space-between; width: 100%; margin-bottom:5px"> 
                                            <div class="card_text_left vId">
                                                <div id="vName">
                                                    <h3 style="line-height:1.02; margin-top: 0; margin-bottom: 3px; font-size:11px; font-weight:600 ; text-transform: uppercase; color: #2656a6;">InfixEdu</h3>
                                                </div>
                                                <div id="vAdmissionNumber">
                                                    <h4 style="line-height:1.02; margin-top: 0; margin-bottom: 3px; font-size:10px;">Admission No : 001</h4>
                                                </div>
                                                <div id="vClass">
                                                    <h4 style="line-height:1.02; margin-top: 0; margin-bottom: 0; font-size:10px;">Class : One (A)</h4>
                                                </div>
                                                
                                            </div>
                                            <div class="card_text_right">
                                            </br>
                                            <div id="vDob">
                                                <h3 style="line-height:1.02; margin-top: 0; margin-bottom: 3px; font-size:10px; font-weight:500;">DOB : jan 21. 2030</h3>
                                            </div>
                                            <div id="vBloodGroup">
                                                <h3 style="line-height:1.02; margin-top: 0; margin-bottom: 3px; font-size:10px; font-weight:500;">Blood Group : B+</h3>
                                            </div>
                                                
                                            </div>
                                        </div>

                                        <div class="card_text_head vStudentName" style="line-height:1.02; display: flex; align-items: center; justify-content: space-between; width: 100%; margin-bottom:5px"> 
                                            <div class="card_text_left">
                                                
                                            </div>
                                        </div>

                                        <div class="card_text_head " style="line-height:1.02; display: flex; align-items: center; justify-content: space-between; width: 100%; margin-bottom:5px"> 
                                            <div class="card_text_left">
                                                <div id="vFatherName">
                                                    <h3 style="line-height:1.02; margin-top: 0; margin-bottom: 3px; font-size:10px; font-weight:500">Father Name : InfixEdu</h3>
                                                </div>
                                                <div id="vMotherName">
                                                    <h3 style="line-height:1.02; margin-top: 0; margin-bottom: 3px; font-size:10px; font-weight:500">Mother Name : InfixEdu</h3>
                                                </div>
                                                
                                            </div>
                                            <div class="card_text_right">
                                                
                                                
                                            </div>
                                        </div>
                                        <div class="card_text_head " style="line-height:1.02; display: flex; align-items: center; justify-content: space-between; width: 100%; margin-top:5px"> 
                                            <div class="card_text_left vAddress">
                                                <h3 style="line-height:1.02; margin-top: 0; margin-bottom: 5px; font-size:10px; font-weight:500; text-transform:uppercase;">Al Khuwair, Muscat, Oman </h3>
                                                <h4 style="line-height:1.02; margin-top: 0; margin-bottom: 0; font-size:9px; text-transform: uppercase; font-weight:500">Address</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="horizontal_card_footer" style="line-height:1.02; text-align: right;">
                                    <div class="singnature_img signPhoto vSign" style="background-image: url('<?php echo e(asset('public/backEnd/id_card/img/Signature.png')); ?>'); line-height:1.02; width: 50px; flex: 50px 0 0; margin-left: auto; position: absolute; right: 10px; bottom: 7px;
                                    height: 25px;
                                    background-size: cover;
                                    background-repeat: no-repeat;
                                    background-position: center center;">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
$( document ).ready(function() {
    
    $(document).on("keyup", "#title", function(event) {
        let titleValue = $(this).val();
        $("#titleV").html(titleValue);
    });

    $(document).on("change", "#pageLayoutStyle", function(event) {
        let pageLayout = $(this).val();
        if(pageLayout == "horizontal"){
            $('#horizontal').removeClass('d-none');
            $('#vertical').addClass('d-none');
            $('#pWidth').html('(<?php echo app('translator')->get('admin.default'); ?> 57 mm)');
            $('#pHeight').html('(<?php echo app('translator')->get('admin.default'); ?> 89 mm)');
            $('#profileWidth').html('(<?php echo app('translator')->get('admin.default'); ?> 21 mm)');
            $('#profileHeight').html('(<?php echo app('translator')->get('admin.default'); ?> 21 mm)');
        }else{
            $('#horizontal').addClass('d-none');
            $('#vertical').removeClass('d-none');
            $('#pWidth').html('(<?php echo app('translator')->get('admin.default'); ?> 89 mm)');
            $('#pHeight').html('(<?php echo app('translator')->get('admin.default'); ?> 57 mm)');
            $('#profileWidth').html('(<?php echo app('translator')->get('admin.default'); ?> 13 mm)');
            $('#profileHeight').html('(<?php echo app('translator')->get('admin.default'); ?> 13 mm)');
        }
    });

    $(document).on("keyup", "#addressValue", function(event) {
        let addressValue = $(this).val();
        let pageLayout = $('#pageLayoutStyle').val();
        if(pageLayout == "horizontal"){
            $(".hAddress").html(addressValue);
        }else{
            $(".vAddress").html(addressValue);
        }
    });

    $(document).on("keyup", "#signDesignation", function(event) {
        let disSignValue = $(this).val();
        $("#disSign").html(disSignValue);
    });

    $(document).on("keyup", "#plWidth", function(event) {
        let plWidthValue = $(this).val();
        let pageLayout = $('#pageLayoutStyle').val();
        if(pageLayout == "horizontal"){
            $(".horizontal__card").css({"width": plWidthValue +"mm"});
        }else{
            $(".vertical__card").css({"width": plWidthValue +"mm"});
        }
    });

    $(document).on("keyup", "#plHeight", function(event) {
        let plHeightValue = $(this).val();
        let pageLayout = $('#pageLayoutStyle').val();
        if(pageLayout == "horizontal"){
            $(".horizontal__card").css({"height": plHeightValue +"mm"});
        }else{
            $(".vertical__card").css({"height": plHeightValue +"mm"});
        }
    });

    $(document).on("change", "#userPhotoStyle", function(event) {
        let userPhotoStyle = $(this).val();
        let pageLayout = $('#pageLayoutStyle').val();
        if(pageLayout == "horizontal"){
            if(userPhotoStyle == "round"){
                $(".hRoundImg").css({ 'border-radius' : '50%'});
            }else{
                $(".hRoundImg").css({ 'border-radius' : '0'});
            }
        }else{
            if(userPhotoStyle == "round"){
                $(".vRoundImg").css({ 'border-radius' : '50%'});
            }else{
                $(".vRoundImg").css({ 'border-radius' : '0'});
            }
        }
    });

    $(document).on("keyup", "#userPhotoWidth", function(event) {
        let userPhotoWidth = $(this).val();
        let pageLayout = $('#pageLayoutStyle').val();
        if(pageLayout == "horizontal"){
            $(".hSize").css({"width": userPhotoWidth +"mm"});
        }else{
            $(".vSize").css({"width": userPhotoWidth +"mm"});
            $(".vSize").css({"flex-basis": userPhotoWidth +"mm"});
        }
    });

    $(document).on("keyup", "#userPhotoheight", function(event) {
        let userPhotoHeight = $(this).val();
        let pageLayout = $('#pageLayoutStyle').val();
        if(pageLayout == "horizontal"){
            $(".hSize").css({"height": userPhotoHeight +"mm"});
        }else{
            $(".vSize").css({"height": userPhotoHeight +"mm"});
        }
    });

    $(document).on("keyup", "#tSpace", function(event) {
        let tSpace = $(this).val();
        let pageLayout = $('#pageLayoutStyle').val();
        if(pageLayout == "horizontal"){
            $(".horizontal_card_body").css({"padding-top": tSpace +"mm"});
        }else{
            $(".vertical_card_body").css({"padding-top": tSpace +"mm"});
        }
    });

    $(document).on("keyup", "#bSpace", function(event) {
        let bSpace = $(this).val();
        let pageLayout = $('#pageLayoutStyle').val();
        if(pageLayout == "horizontal"){
            $(".horizontal_card_body").css({"padding-bottom": bSpace +"mm"});
        }else{
            $(".vertical_card_body").css({"padding-bottom": bSpace +"mm"});
        }
    });

    $(document).on("keyup", "#lSpace", function(event) {
        let lSpace = $(this).val();
        let pageLayout = $('#pageLayoutStyle').val();
        if(pageLayout == "horizontal"){
            $(".horizontal_card_body").css({"padding-left": lSpace +"mm"});
        }else{
            $(".vertical_card_body").css({"padding-left": lSpace +"mm"});
        }
    });

    $(document).on("keyup", "#rSpace", function(event) {
        let rSpace = $(this).val();
        let pageLayout = $('#pageLayoutStyle').val();
        if(pageLayout == "horizontal"){
            $(".horizontal_card_body").css({"padding-right": rSpace +"mm"});
        }else{
            $(".vertical_card_body").css({"padding-right": rSpace +"mm"});
        }
    });

// Radio Button
    studentName = (status) => {
        let pageLayout = $('#pageLayoutStyle').val();
        if(pageLayout == "horizontal"){
            if(status == "1"){
                $("#hName").show();
            }else{
                $("#hName").hide();
            }
        }else{
            if(status == "1"){
                $("#vName").show();
            }else{
                $("#vName").hide();
            }
        }
    }

    idRoll = (status) => {
        let pageLayout = $('#pageLayoutStyle').val();
        if(pageLayout == "horizontal"){
            if(status == "1"){
                $("#hAdmissionNumber").show();
            }else{
                $("#hAdmissionNumber").hide();
            }
        }else{
            if(status == "1"){
                $("#vAdmissionNumber").show();
            }else{
                $("#vAdmissionNumber").hide();
            }
        }
    }
    
    IDclass = (status) => {
        let pageLayout = $('#pageLayoutStyle').val();
        if(pageLayout == "horizontal"){
            if(status == "1"){
                $("#hClass").show();
            }else{
                $("#hClass").hide();
            }
        }else{
            if(status == "1"){
                $("#vClass").show();
            }else{
                $("#vClass").hide();
            }
        }
    }

    fatherName = (status) => {
        let pageLayout = $('#pageLayoutStyle').val();
        if(pageLayout == "horizontal"){
            if(status == "1"){
                $("#hFatherName").show();
            }else{
                $("#hFatherName").hide();
            }
        }else{
            if(status == "1"){
                $("#vFatherName").show();
            }else{
                $("#vFatherName").hide();
            }
        }
    }

    motherName = (status) => {
        let pageLayout = $('#pageLayoutStyle').val();
        if(pageLayout == "horizontal"){
            if(status == "1"){
                $("#hMotherName").show();
            }else{
                $("#hMotherName").hide();
            }
        }else{
            if(status == "1"){
                $("#vMotherName").show();
            }else{
                $("#vMotherName").hide();
            }
        }
    }

    dOB = (status) => {
        let pageLayout = $('#pageLayoutStyle').val();
        if(pageLayout == "horizontal"){
            if(status == "1"){
                $("#hDob").show();
            }else{
                $("#hDob").hide();
            }
        }else{
            if(status == "1"){
                $("#vDob").show();
            }else{
                $("#vDob").hide();
            }
        }
    }

    bloodGroup = (status) => {
        let pageLayout = $('#pageLayoutStyle').val();
        if(pageLayout == "horizontal"){
            if(status == "1"){
                $("#hBloodGroup").show();
            }else{
                $("#hBloodGroup").hide();
            }
        }else{
            if(status == "1"){
                $("#vBloodGroup").show();
            }else{
                $("#vBloodGroup").hide();
            }
        }
    }

    addRess = (status) => {
        let pageLayout = $('#pageLayoutStyle').val();
        if(pageLayout == "horizontal"){
            if(status == "1"){
                $("#hAddress").show();
            }else{
                $("#hAddress").hide();
            }
        }else{
            if(status == "1"){
                $(".vAddress").show();
            }else{
                $(".vAddress").hide();
            }
        }
    }
});

// Image Show
    function imageChangeWithBackFile(input,srcBack){
        let pageLayout = $('#pageLayoutStyle').val();
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) 
            {
                if(pageLayout == "horizontal"){
                    $('.horizontal__card').css('background-image','url('+ e.target.result + ')');
                }else{
                    $('.vertical__card').css('background-image','url('+ e.target.result + ')');
                }
            };
                reader.readAsDataURL(input.files[0]);
            }
        }

    function imageChangeWithFile(input,srcId) {

        let pageLayout = $('#pageLayoutStyle').val();
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                if(pageLayout == "horizontal"){
                    $('.hImg').css('background-image','url('+ e.target.result + ')');
                }else{
                    $('.vImg').css('background-image','url('+ e.target.result + ')');
                }
            };
                reader.readAsDataURL(input.files[0]);
            }
        }

    function logoImageChangeWithFile(input,srcIdLogo) {
        let pageLayout = $('#pageLayoutStyle').val();
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                if(pageLayout == "horizontal"){
                    $('.hLogo').css('background-image','url('+ e.target.result + ')');
                }else{
                    $('.vLogo').css('background-image','url('+ e.target.result + ')');
                }
            };
                reader.readAsDataURL(input.files[0]);
            }
        }

    function signatureImageChangeWithFile(input,srcIdDis) {
        let pageLayout = $('#pageLayoutStyle').val();
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                if(pageLayout == "horizontal"){
                    $('.hSign').css('background-image','url('+ e.target.result + ')');
                }else{
                    $('.vSign').css('background-image','url('+ e.target.result + ')');
                }
            };
                reader.readAsDataURL(input.files[0]);
            }
        }

// Delete
    $(document).on("click", "#deleteBackImg", function(event) {
        let pageLayout = $('#pageLayoutStyle').val();
        $('#backgroundImage').removeAttr('placeholder');
        $('#backgroundImage').attr("placeholder", "<?php echo app('translator')->get('admin.background_image'); ?>");
        
        if(pageLayout == "horizontal"){
            $('.horizontal__card').css('background-image','url(<?php echo e(asset('public/backEnd/id_card/img/vertical_bg.png')); ?>)');
        }else{
            $('.vertical__card').css('background-image','url(<?php echo e(asset('public/backEnd/id_card/img/horizontal_bg.png')); ?>)');
        }
    });

    $(document).on("click", "#deleteProImg", function(event) {
        let pageLayout = $('#pageLayoutStyle').val();
        $('#profileImage').removeAttr('placeholder');
        $('#profileImage').attr("placeholder", "<?php echo app('translator')->get('admin.profile_image'); ?>");

        if(pageLayout == "horizontal"){
            $('.hImg').css('background-image','url(<?php echo e(asset('public/backEnd/id_card/img/thumb.png')); ?>)');
        }else{
            $('.vImg').css('background-image','url(<?php echo e(asset('public/backEnd/id_card/img/thumb.png')); ?>)');
        }
    });

    $(document).on("click", "#deleteLogoImg", function(event) {
        let pageLayout = $('#pageLayoutStyle').val();
        $('#placeholderFileThreeName').removeAttr('placeholder');
        $('#placeholderFileThreeName').attr("placeholder", "<?php echo app('translator')->get('admin.logo'); ?>");
        if(pageLayout == "horizontal"){
            $('.hLogo').attr('src',"<?php echo e(asset('public/backEnd/id_card/img/logo.png')); ?>");
        }else{
            $('.vLogo').attr('src',"<?php echo e(asset('public/backEnd/id_card/img/logo.png')); ?>");
        }
    });

    $(document).on("click", "#deleteSignImg", function(event) {
        let pageLayout = $('#pageLayoutStyle').val();
        $('#placeholderFileFourName').removeAttr('placeholder');
        $('#placeholderFileFourName').attr("placeholder", "<?php echo app('translator')->get('admin.signature'); ?>");

        if(pageLayout == "horizontal"){
            $('.hSign').attr('src',"<?php echo e(asset('public/backEnd/id_card/img/Signature.png')); ?>");
        }else{
            $('.vSign').attr('src',"<?php echo e(asset('public/backEnd/id_card/img/Signature.png')); ?>");
        }
    });
</script>
    
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\admin\student_id_card.blade.php ENDPATH**/ ?>
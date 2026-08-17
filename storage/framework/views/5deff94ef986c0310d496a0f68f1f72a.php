<style>
    .id_card_button {
        position: relative;
        top: 8px;
    }
</style>
<div>
    <div class="add-visitor">
        <div class="row">
            <div class="col-lg-12">
                <div class="primary_input">
                    <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.id_card_title'); ?> <span class="text-danger">
                            *</span></label>
                    <input class="primary_input_field form-control<?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>"
                        type="text" name="title" autocomplete="off"
                        value="<?php echo e(isset($id_card) ? $id_card->title : old('title')); ?>" id="title">


                    <?php if($errors->has('title')): ?>
                        <span class="text-danger">
                            <?php echo e($errors->first('title')); ?>

                        </span>
                    <?php endif; ?>
                </div>

            </div>
        </div>

        <?php
            $designMode = old('design_mode', isset($id_card) ? ($id_card->design_mode ?? 'classic') : 'template');
            if (!class_exists(\App\Helpers\IdCardTemplateHelper::class)) {
                throw new \RuntimeException('Missing file: app/Helpers/IdCardTemplateHelper.php — upload it to the live server.');
            }
            $fieldPositions = \App\Helpers\IdCardTemplateHelper::positions($id_card ?? null);
        ?>

        <div class="row mt-25">
            <div class="col-lg-6">
                <div class="primary_input">
                    <label class="primary_input_label" for="">Design Mode</label>
                    <select class="primary_select form-control" name="design_mode" id="designMode">
                        <option value="classic" <?php echo e($designMode == 'classic' ? 'selected' : ''); ?>>Classic Layout</option>
                        <option value="template" <?php echo e($designMode == 'template' ? 'selected' : ''); ?>>Front & Back Template</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="primary_input">
                    <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.layout'); ?></label>
                    <select class="primary_select  form-control<?php echo e($errors->has('page_layout_style') ? ' is-invalid' : ''); ?>" name="page_layout_style" id="pageLayoutStyle">
                        <option value="horizontal" <?php echo e(isset($id_card)? ($id_card->page_layout_style == "horizontal"? 'selected':''):''); ?>><?php echo app('translator')->get('admin.vertical'); ?></option>
                        <option value="vertical" <?php echo e(isset($id_card)? ($id_card->page_layout_style == "vertical"? 'selected': (old('page_layout_style')=='vertical'?'selected':'')) : 'selected'); ?>><?php echo app('translator')->get('admin.horizontal'); ?></option>
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
                        <label class="primary_input_label" for="">Front Background Image</label>
                        <input
                            class="primary_input_field form-control<?php echo e($errors->has('background_img') ? ' is-invalid' : ''); ?>"
                            type="text" id="placeholderFileFiveName"
                            placeholder="<?php echo e(isset($id_card) ? ($id_card->background_img != '' ? getFilePath3($id_card->background_img) : 'Front background') : 'Front background'); ?>"
                            readonly>

                        <?php if($errors->has('background_img')): ?>
                            <span class="text-danger">
                                <?php echo e($errors->first('background_img')); ?>

                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-auto mt-30">
                    <button class="primary-btn-small-input cust-margin id_card_button" type="button">
                        <label class="primary-btn small fix-gr-bg" for="document_file_5"><?php echo app('translator')->get('common.browse'); ?></label>
                        <input type="file" class="d-none" name="background_img" id="document_file_5"
                            onchange="imageChangeWithBackFile(this); if(this.files&&this.files[0]){document.getElementById('placeholderFileFiveName').placeholder=this.files[0].name;}"
                            value="<?php echo e(isset($id_card) ? ($id_card->background_img != '' ? getFilePath3($id_card->background_img) : '') : ''); ?>">
                    </button>
                </div>
            </div>
            <button class="primary-btn icon-only fix-gr-bg id_card_button mt-30" type="button" id="deleteBackImg">
                <span class="ti-trash"></span>
            </button>
        </div>

        <div class="d-flex mt-25 template-only-field">
            <div class="row flex-grow-1 d-flex justify-content-between input-right-icon">
                <div class="col">
                    <div class="primary_input">
                        <label class="primary_input_label" for="">Back Background Image</label>
                        <input
                            class="primary_input_field form-control"
                            type="text" id="placeholderFileBackSideName"
                            placeholder="<?php echo e(isset($id_card) && $id_card->background_img_back ? getFilePath3($id_card->background_img_back) : 'Back background'); ?>"
                            readonly>
                    </div>
                </div>
                <div class="col-auto mt-30">
                    <button class="primary-btn-small-input cust-margin id_card_button" type="button">
                        <label class="primary-btn small fix-gr-bg" for="document_file_back_side"><?php echo app('translator')->get('common.browse'); ?></label>
                        <input type="file" class="d-none" name="background_img_back" id="document_file_back_side"
                            onchange="document.getElementById('placeholderFileBackSideName').placeholder=this.value.split('\\').pop()">
                    </button>
                </div>
            </div>
        </div>

        <div class="row mt-25 template-only-field">
            <div class="col-lg-6">
                <div class="primary_input">
                    <label class="primary_input_label" for="">Font Family</label>
                    <input class="primary_input_field form-control" type="text" name="font_family"
                        value="<?php echo e(old('font_family', isset($id_card) ? ($id_card->font_family ?: 'Segoe UI, Arial, sans-serif') : 'Segoe UI, Arial, sans-serif')); ?>">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="primary_input">
                    <label class="primary_input_label" for="">Font Color</label>
                    <input class="primary_input_field form-control" type="color" name="font_color"
                        value="<?php echo e(old('font_color', isset($id_card) ? ($id_card->font_color ?: '#111111') : '#111111')); ?>">
                </div>
            </div>
        </div>

        <div class="row mt-25">
            <div class="col-lg-12">
                <div class="primary_input">
                    <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.applicable_user'); ?></label>
                    <select
                        class="primary_select  form-control<?php echo e($errors->has('applicable_user') ? ' is-invalid' : ''); ?>"
                        name="applicable_user[]" id="applicableUser">
                        <option data-display="<?php echo app('translator')->get('admin.applicable_user'); ?> *" value=""><?php echo app('translator')->get('common.select'); ?>*</option>
                        <?php if(isset($id_card)): ?>
                            <?php
                                $applicableUsers = json_decode($id_card->role_id);
                            ?>
                            <option value="2" <?php echo e(in_array(2, $applicableUsers) ? 'selected' : ''); ?> selected>
                                <?php echo app('translator')->get('admin.student'); ?></option>
                            <option value="3" <?php echo e(in_array(3, $applicableUsers) ? 'selected' : ''); ?>>
                                <?php echo app('translator')->get('admin.guardian'); ?></option>
                            <option value="0"
                                <?php if(!in_array(3, $applicableUsers) && !in_array(2, $applicableUsers)): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo app('translator')->get('admin.staff'); ?></option>
                        <?php else: ?>
                            <option value="2"><?php echo app('translator')->get('admin.student'); ?></option>
                            <option value="3"><?php echo app('translator')->get('admin.guardian'); ?></option>
                            <option value="0"><?php echo app('translator')->get('admin.staff'); ?></option>
                        <?php endif; ?>
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

        <div
            class="row mt-25 staffInfo 
            <?php if(isset($id_card)): ?> <?php if(!in_array(3, $applicableUsers) && !in_array(2, $applicableUsers)): ?>
                    <?php echo e('d-block'); ?>

                <?php else: ?>
                    <?php echo e('d-none'); ?> <?php endif; ?>
                <?php else: ?>
                <?php echo e('d-none'); ?>

            <?php endif; ?>
            ">
            <div class="col-lg-12">
                <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.role'); ?><span class="text-danger">*</span></label><br>
                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($role->id != 2 && $role->id != 3): ?>
                        <div class="primary_input">
                            <input type="checkbox" id="role_<?php echo e(@$role->id); ?>" class="common-checkbox" name="role[]" value="<?php echo e(@$role->id); ?>" <?php echo e(isset($id_card) ? (in_array($role->id, $applicableUsers) ? 'checked' : '') : ''); ?>>
                            <label for="role_<?php echo e(@$role->id); ?>"><?php echo e(@$role->name); ?></label>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if($errors->has('section')): ?>
                    <span class="text-danger">
                        <?php echo e($errors->first('section')); ?>

                    </span>
                <?php endif; ?>

                
            </div>
        </div>

        <div class="row mt-25">
            <div class="col-lg-6">
                <div class="primary_input">
                    <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.page_layout_width'); ?> <span
                            id="pWidth">(<?php echo app('translator')->get('admin.default'); ?> 57 mm)</span></label>
                    <input class="primary_input_field form-control<?php echo e($errors->has('pl_width') ? ' is-invalid' : ''); ?>"
                        type="text" name="pl_width"
                        value="<?php echo e(isset($id_card) ? $id_card->pl_width : old('pl_width')); ?>" id="plWidth"
                        autocomplete="off">


                    <?php if($errors->has('pl_width')): ?>
                        <span class="text-danger">
                            <?php echo e($errors->first('pl_width')); ?>

                        </span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="primary_input">
                    <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.page_layout_height'); ?> <span
                            id="pHeight">(<?php echo app('translator')->get('admin.default'); ?> 89 mm)</span></label>
                    <input class="primary_input_field form-control<?php echo e($errors->has('pl_height') ? ' is-invalid' : ''); ?>"
                        type="text" name="pl_height"
                        value="<?php echo e(isset($id_card) ? $id_card->pl_height : old('pl_height')); ?>" id="plHeight"
                        autocomplete="off">


                    <?php if($errors->has('pl_height')): ?>
                        <span class="text-danger">
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
                        <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.profile_image'); ?></label>
                        <input
                            class="primary_input_field form-control<?php echo e($errors->has('profile_image') ? ' is-invalid' : ''); ?>"
                            type="text" id="placeholderFileSixName"
                            placeholder="<?php echo e(isset($id_card) ? ($id_card->profile_image != '' ? getFilePath3($id_card->profile_image) : trans('admin.profile_image')) : trans('admin.profile_image')); ?>"
                            readonly>

                        <?php if($errors->has('profile_image')): ?>
                            <span class="text-danger">
                                <?php echo e($errors->first('profile_image')); ?>

                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-auto mt-30">
                    <button class="primary-btn-small-input cust-margin id_card_button" type="button">
                        <label class="primary-btn small fix-gr-bg" for="document_file_6"><?php echo app('translator')->get('common.browse'); ?></label>
                        <input type="file" class="d-none" name="profile_image" id="document_file_6"
                            onchange="imageChangeWithFile(this,'.photo')"
                            value="<?php echo e(isset($id_card) ? ($id_card->profile_image != '' ? getFilePath3($id_card->profile_image) : '') : ''); ?>">
                    </button>
                </div>
            </div>
            <button class="primary-btn icon-only fix-gr-bg id_card_button mt-30" type="button" id="deleteProImg">
                <span class="ti-trash"></span>
            </button>
        </div>

        <div class="row mt-25">
            <div class="col-lg-4 d-flex">
                <p class="text-uppercase fw-500 mb-10"> <?php echo app('translator')->get('admin.user_photo_style'); ?> </p>
            </div>
            <div class="col-lg-8">
                <div class="primary_input">
                    <select
                        class="primary_select  form-control<?php echo e($errors->has('user_photo_style') ? ' is-invalid' : ''); ?>"
                        name="user_photo_style" id="userPhotoStyle">
                        <option data-display="<?php echo app('translator')->get('admin.user_photo_style'); ?>" value=""><?php echo app('translator')->get('common.select'); ?></option>
                        <option value="squre"
                            <?php echo e(isset($id_card) ? ($id_card->user_photo_style == 'squre' ? 'selected' : '') : ''); ?>>
                            <?php echo app('translator')->get('admin.squre'); ?></option>
                        <option value="round"
                            <?php echo e(isset($id_card) ? ($id_card->user_photo_style == 'round' ? 'selected' : '') : ''); ?>>
                            <?php echo app('translator')->get('admin.round'); ?></option>
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
                    <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.user_photo_size_width'); ?> <span
                            id="profileWidth">(<?php echo app('translator')->get('admin.default'); ?> 21 mm)</span></label>
                    <input
                        class="primary_input_field form-control<?php echo e($errors->has('user_photo_width') ? ' is-invalid' : ''); ?>"
                        type="text" id="userPhotoWidth" name="user_photo_width"
                        value="<?php echo e(isset($id_card) ? $id_card->user_photo_width : old('user_photo_width')); ?>"
                        autocomplete="off">


                    <?php if($errors->has('user_photo_width')): ?>
                        <span class="text-danger">
                            <strong><?php echo e($errors->first('user_photo_width')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="primary_input">
                    <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.user_photo_size_height'); ?> <span
                            id="profileHeight">(<?php echo app('translator')->get('admin.default'); ?> 21 mm)</span></label>
                    <input
                        class="primary_input_field form-control<?php echo e($errors->has('user_photo_height') ? ' is-invalid' : ''); ?>"
                        type="text" id="userPhotoheight" name="user_photo_height"
                        value="<?php echo e(@$id_card->user_photo_height); ?>" autocomplete="off">


                    <?php if($errors->has('user_photo_height')): ?>
                        <span class="text-danger">
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
                    <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.top_space'); ?><span> (<?php echo app('translator')->get('admin.default'); ?> 2.5
                            mm)</span></label>
                    <input class="primary_input_field form-control<?php echo e($errors->has('t_space') ? ' is-invalid' : ''); ?>"
                        type="text" id="tSpace" name="t_space"
                        value="<?php echo e(isset($id_card) ? $id_card->t_space : old('t_space')); ?>" autocomplete="off">


                    <?php if($errors->has('t_space')): ?>
                        <span class="text-danger">
                            <?php echo e($errors->first('t_space')); ?>

                        </span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="primary_input">
                    <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.bottom_space'); ?> <span>(<?php echo app('translator')->get('admin.default'); ?> 2.5
                            mm)</span></label>
                    <input class="primary_input_field form-control<?php echo e($errors->has('b_space') ? ' is-invalid' : ''); ?>"
                        type="text" id="bSpace" name="b_space"
                        value="<?php echo e(isset($id_card) ? $id_card->b_space : old('b_space')); ?>" autocomplete="off">


                    <?php if($errors->has('b_space')): ?>
                        <span class="text-danger">
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
                    <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.left_space'); ?> (<?php echo app('translator')->get('admin.default'); ?> 3
                        mm)</label>
                    <input class="primary_input_field form-control<?php echo e($errors->has('l_space') ? ' is-invalid' : ''); ?>"
                        type="text" id="lSpace" name="l_space"
                        value="<?php echo e(isset($id_card) ? $id_card->l_space : old('l_space')); ?>" autocomplete="off">


                    <?php if($errors->has('l_space')): ?>
                        <span class="text-danger">
                            <?php echo e($errors->first('l_space')); ?>

                        </span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="primary_input">
                    <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.right_space'); ?> (<?php echo app('translator')->get('admin.default'); ?> 3
                        mm)</label>
                    <input class="primary_input_field form-control<?php echo e($errors->has('r_space') ? ' is-invalid' : ''); ?>"
                        type="text" id="rSpace" name="r_space"
                        value="<?php echo e(isset($id_card) ? $id_card->r_space : old('r_space')); ?>" autocomplete="off">


                    <?php if($errors->has('r_space')): ?>
                        <span class="text-danger">
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
                        <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.logo'); ?></label>
                        <input class="primary_input_field form-control<?php echo e($errors->has('logo') ? ' is-invalid' : ''); ?>" type="text" id="placeholderFileThreeName" placeholder="<?php echo e(isset($id_card)? ($id_card->logo != ""? getFilePath3($id_card->logo): trans('admin.logo')):trans('admin.logo')); ?>"
                            readonly>

                        <?php if($errors->has('logo')): ?>
                            <span class="text-danger">
                                <?php echo e($errors->first('logo')); ?>

                            </span>
                        <?php endif; ?> 
                    </div>
                </div>
                <div class="col-auto mt-30">
                    <button class="primary-btn-small-input cust-margin id_card_button" type="button">
                        <label class="primary-btn small fix-gr-bg" for="document_file_3"><?php echo app('translator')->get('common.browse'); ?></label>
                        <input type="file" class="d-none" name="logo" id="document_file_3"
                            onchange="logoImageChangeWithFile(this,'.logoImage')"
                            value="<?php echo e(isset($id_card) ? ($id_card->logo != '' ? getFilePath3($id_card->logo) : '') : ''); ?>">
                    </button>
                </div>
            </div>
            <button class="primary-btn icon-only fix-gr-bg id_card_button mt-30" type="button" id="deleteLogoImg">
                <span class="ti-trash"></span>
            </button>
        </div>

        <div class="d-flex mt-25">
            <div class="row flex-grow-1 d-flex justify-content-between input-right-icon">
                <div class="col">
                    <div class="primary_input">
                        <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.signature'); ?></label>
                        <input
                            class="primary_input_field form-control<?php echo e($errors->has('signature') ? ' is-invalid' : ''); ?>"
                            type="text" id="placeholderFileFourName"
                            placeholder="<?php echo e(isset($id_card) ? ($id_card->signature != '' ? getFilePath3($id_card->signature) : trans('admin.signature') . ' *') : trans('admin.signature') . ' *'); ?>"
                            readonly>

                        <?php if($errors->has('signature')): ?>
                            <span class="text-danger">
                                <?php echo e($errors->first('signature')); ?>

                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-auto mt-30">
                    <button class="primary-btn-small-input cust-margin id_card_button" type="button">
                        <label class="primary-btn small fix-gr-bg" for="document_file_4"><?php echo app('translator')->get('common.browse'); ?></label>
                        <input type="file" class="d-none" name="signature" id="document_file_4"
                            onchange="signatureImageChangeWithFile(this,'.signPhoto')"
                            value="<?php echo e(isset($id_card) ? ($id_card->signature != '' ? getFilePath3($id_card->signature) : '') : ''); ?>">
                    </button>
                </div>
            </div>
            <button class="primary-btn icon-only fix-gr-bg id_card_button mt-30" type="button" id="deleteSignImg">
                <span class="ti-trash"></span>
            </button>
        </div>

        <div class="row mt-25 admissionNo">
            <div class="col-lg-4 d-flex">
                <p class="text-uppercase fw-500 mb-10 text"><?php echo app('translator')->get('student.admission_no'); ?></p>
            </div>
            <div class="col-lg-8">
                <div class="d-flex radio-btn-flex ml-40">
                    <div class="mr-30">
                        <input type="radio" name="admission_no" id="id_roll_yes" value="1"
                            class="common-radio relationButton" onclick="idRoll('1')"
                            <?php echo e(isset($id_card) ? ($id_card->admission_no == 1 ? 'checked' : '') : 'checked'); ?>>
                        <label for="id_roll_yes"><?php echo app('translator')->get('admin.yes'); ?></label>
                    </div>
                    <div class="mr-30">
                        <input type="radio" name="admission_no" id="id_roll_no" value="0"
                            class="common-radio relationButton" onclick="idRoll('0')"
                            <?php echo e(isset($id_card) ? ($id_card->admission_no == 0 ? 'checked' : '') : ''); ?>>
                        <label for="id_roll_no"><?php echo app('translator')->get('admin.none'); ?></label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-25">
            <div class="col-lg-4 d-flex">
                <p class="text-uppercase fw-500 mb-10"><?php echo app('translator')->get('common.name'); ?> </p>
            </div>
            <div class="col-lg-8">
                <div class="d-flex radio-btn-flex ml-40">
                    <div class="mr-30">
                        <input type="radio" name="student_name" id="student_name_yes" value="1"
                            class="common-radio relationButton" onclick="studentName('1')"
                            <?php echo e(isset($id_card) ? ($id_card->student_name == 1 ? 'checked' : '') : 'checked'); ?>>
                        <label for="student_name_yes"><?php echo app('translator')->get('admin.yes'); ?></label>
                    </div>
                    <div class="mr-30">
                        <input type="radio" name="student_name" id="student_name_no" value="0"
                            class="common-radio relationButton" onclick="studentName('0')"
                            <?php echo e(isset($id_card) ? ($id_card->student_name == 0 ? 'checked' : '') : ''); ?>>
                        <label for="student_name_no"><?php echo app('translator')->get('admin.none'); ?></label>
                    </div>
                </div>
            </div>
        </div>
        <?php if(moduleStatusCheck('University')): ?>
            <input type="hidden" value="university" id="module">
            <div class="row mt-25 classHide">
                <div class="col-lg-4 d-flex">
                    <p class="text-uppercase fw-500 mb-10"><?php echo app('translator')->get('university::un.session'); ?> </p>
                </div>
                <div class="col-lg-8">
                    <div class="d-flex radio-btn-flex ml-40">
                        <div class="mr-30">
                            <input type="radio" name="un_session_id" id="un_session_yes" value="1"
                                class="common-radio relationButton" onclick="IDSession('1')"
                                <?php echo e(isset($id_card) ? ($id_card->un_session == 1 ? 'checked' : '') : 'checked'); ?>>
                            <label for="un_session_yes"><?php echo app('translator')->get('admin.yes'); ?></label>
                        </div>
                        <div class="mr-30">
                            <input type="radio" name="un_session_id" id="un_session_no" value="0"
                                class="common-radio relationButton" onclick="IDSession('0')"
                                <?php echo e(isset($id_card) ? ($id_card->un_session == 0 ? 'checked' : '') : ''); ?>>
                            <label for="un_session_no"><?php echo app('translator')->get('admin.none'); ?></label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-25 classHide">
                <div class="col-lg-4 d-flex">
                    <p class="text-uppercase fw-500 mb-10"><?php echo app('translator')->get('university::un.faculty'); ?> </p>
                </div>
                <div class="col-lg-8">
                    <div class="d-flex radio-btn-flex ml-40">
                        <div class="mr-30">
                            <input type="radio" name="un_faculty_id" id="un_faculty_yes" value="1"
                                class="common-radio relationButton" onclick="IDFaculty('1')"
                                <?php echo e(isset($id_card) ? ($id_card->un_faculty == 1 ? 'checked' : '') : ''); ?>>
                            <label for="un_faculty_yes"><?php echo app('translator')->get('admin.yes'); ?></label>
                        </div>
                        <div class="mr-30">
                            <input type="radio" name="un_faculty_id" id="un_faculty_no" value="0"
                                class="common-radio relationButton" onclick="IDFaculty('0')"
                                <?php echo e(isset($id_card) ? ($id_card->un_faculty == 0 ? 'checked' : '') : 'checked'); ?>>
                            <label for="un_faculty_no"><?php echo app('translator')->get('admin.none'); ?></label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-25 classHide">
                <div class="col-lg-4 d-flex">
                    <p class="text-uppercase fw-500 mb-10"><?php echo app('translator')->get('university::un.department'); ?> </p>
                </div>
                <div class="col-lg-8">
                    <div class="d-flex radio-btn-flex ml-40">
                        <div class="mr-30">
                            <input type="radio" name="un_department_id" id="un_department_yes" value="1"
                                class="common-radio relationButton" onclick="IDDepartment('1')"
                                <?php echo e(isset($id_card) ? ($id_card->un_department == 1 ? 'checked' : '') : 'checked'); ?>>
                            <label for="un_department_yes"><?php echo app('translator')->get('admin.yes'); ?></label>
                        </div>
                        <div class="mr-30">
                            <input type="radio" name="un_department_id" id="un_department_no" value="0"
                                class="common-radio relationButton" onclick="IDDepartment('0')"
                                <?php echo e(isset($id_card) ? ($id_card->un_department == 0 ? 'checked' : '') : ''); ?>>
                            <label for="un_department_no"><?php echo app('translator')->get('admin.none'); ?></label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-25 classHide">
                <div class="col-lg-4 d-flex">
                    <p class="text-uppercase fw-500 mb-10"><?php echo app('translator')->get('university::un.academic'); ?> </p>
                </div>
                <div class="col-lg-8">
                    <div class="d-flex radio-btn-flex ml-40">
                        <div class="mr-30">
                            <input type="radio" name="un_academic_id" id="un_academic_yes" value="1"
                                class="common-radio relationButton" onclick="IDAcademic('1')"
                                <?php echo e(isset($id_card) ? ($id_card->un_academic == 1 ? 'checked' : '') : ''); ?>>
                            <label for="un_academic_yes"><?php echo app('translator')->get('admin.yes'); ?></label>
                        </div>
                        <div class="mr-30">
                            <input type="radio" name="un_academic_id" id="un_academic_no" value="0"
                                class="common-radio relationButton" onclick="IDAcademic('0')"
                                <?php echo e(isset($id_card) ? ($id_card->un_academic == 0 ? 'checked' : '') : 'checked'); ?>>
                            <label for="un_academic_no"><?php echo app('translator')->get('admin.none'); ?></label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-25 classHide">
                <div class="col-lg-4 d-flex">
                    <p class="text-uppercase fw-500 mb-10"><?php echo app('translator')->get('university::un.semester'); ?> </p>
                </div>
                <div class="col-lg-8">
                    <div class="d-flex radio-btn-flex ml-40">
                        <div class="mr-30">
                            <input type="radio" name="un_semester_id" id="un_semester_yes" value="1"
                                class="common-radio relationButton" onclick="IDSemester('1')"
                                <?php echo e(isset($id_card) ? ($id_card->un_semester == 1 ? 'checked' : '') : ''); ?>>
                            <label for="un_semester_yes"><?php echo app('translator')->get('admin.yes'); ?></label>
                        </div>
                        <div class="mr-30">
                            <input type="radio" name="un_semester_id" id="un_semester_no" value="0"
                                class="common-radio relationButton" onclick="IDSemester('0')"
                                <?php echo e(isset($id_card) ? ($id_card->un_semester == 0 ? 'checked' : '') : 'checked'); ?>>
                            <label for="un_semester_no"><?php echo app('translator')->get('admin.none'); ?></label>
                        </div>
                    </div>
                </div>
            </div>
            
        <?php else: ?>
            <div class="row mt-25 classHide">
                <div class="col-lg-4 d-flex">
                    <p class="text-uppercase fw-500 mb-10"><?php echo app('translator')->get('common.class'); ?> </p>
                </div>
                <div class="col-lg-8">
                    <div class="d-flex radio-btn-flex ml-40">
                        <div class="mr-30">
                            <input type="radio" name="class" id="class_yes" value="1"
                                class="common-radio relationButton" onclick="IDclass('1')"
                                <?php echo e(isset($id_card) ? ($id_card->class == 1 ? 'checked' : '') : 'checked'); ?>>
                            <label for="class_yes"><?php echo app('translator')->get('admin.yes'); ?></label>
                        </div>
                        <div class="mr-30">
                            <input type="radio" name="class" id="class_no" value="0"
                                class="common-radio relationButton" onclick="IDclass('0')"
                                <?php echo e(isset($id_card) ? ($id_card->class == 0 ? 'checked' : '') : ''); ?>>
                            <label for="class_no"><?php echo app('translator')->get('admin.none'); ?></label>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php
            $check = 'checked';
        ?>
        <div class="row mt-25 fatherName">
            <div class="col-lg-4 d-flex">
                <p class="text-uppercase fw-500 mb-10"><?php echo app('translator')->get('student.father_name'); ?></p>
            </div>
            <div class="col-lg-8">
                <div class="d-flex radio-btn-flex ml-40">
                    <div class="mr-30">
                        <input type="radio" name="father_name" id="father_name_yes" value="1"
                            class="common-radio relationButton" onclick="fatherName('1')"
                            <?php echo e(isset($id_card) ? ($id_card->father_name == 1 ? 'checked' : '') : (moduleStatusCheck('University') ? '' : 'checked')); ?>>
                        <label for="father_name_yes"><?php echo app('translator')->get('admin.yes'); ?></label>
                    </div>
                    <div class="mr-30">
                        <input type="radio" name="father_name" id="father_name_no" value="0"
                            class="common-radio relationButton" onclick="fatherName('0')"
                            <?php echo e(isset($id_card) ? ($id_card->father_name == 0 ? 'checked' : '') : (moduleStatusCheck('University') ? 'checked' : '')); ?>>
                        <label for="father_name_no"><?php echo app('translator')->get('admin.none'); ?></label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-25 motherName">
            <div class="col-lg-4 d-flex">
                <p class="text-uppercase fw-500 mb-10"><?php echo app('translator')->get('student.mother_name'); ?></p>
            </div>
            <div class="col-lg-8">
                <div class="d-flex radio-btn-flex ml-40">
                    <div class="mr-30">
                        <input type="radio" name="mother_name" id="mother_name_yes" value="1"
                            class="common-radio relationButton" onclick="motherName('1')"
                            <?php echo e(isset($id_card) ? ($id_card->mother_name == 1 ? 'checked' : '') : (moduleStatusCheck('University') ? '' : 'checked')); ?>>
                        <label for="mother_name_yes"><?php echo app('translator')->get('admin.yes'); ?></label>
                    </div>
                    <div class="mr-30">
                        <input type="radio" name="mother_name" id="mother_name_no" value="0"
                            class="common-radio relationButton" onclick="motherName('0')"
                            <?php echo e(isset($id_card) ? ($id_card->mother_name == 0 ? 'checked' : '') : (moduleStatusCheck('University') ? 'checked' : '')); ?>>
                        <label for="mother_name_no"><?php echo app('translator')->get('admin.none'); ?></label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-25">
            <div class="col-lg-4 d-flex">
                <p class="text-uppercase fw-500 mb-10"><?php echo app('translator')->get('common.address'); ?></p>
            </div>
            <div class="col-lg-8">
                <div class="d-flex radio-btn-flex ml-40">
                    <div class="mr-30">
                        <input type="radio" name="student_address" id="address_yes" value="1"
                            class="common-radio relationButton" onclick="addRess('1')"
                            <?php echo e(isset($id_card) ? ($id_card->student_address == 1 ? 'checked' : '') : 'checked'); ?>>
                        <label for="address_yes"><?php echo app('translator')->get('admin.yes'); ?></label>
                    </div>
                    <div class="mr-30">
                        <input type="radio" name="student_address" id="address_no" value="0"
                            class="common-radio relationButton" onclick="addRess('0')"
                            <?php echo e(isset($id_card) ? ($id_card->student_address == 0 ? 'checked' : '') : ''); ?>>
                        <label for="address_no"><?php echo app('translator')->get('admin.none'); ?></label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-25 mobile <?php echo e(@$id_card->phone_number == 0 ? 'd-none' : ''); ?>">
            <div class="col-lg-4 d-flex">
                <p class="text-uppercase fw-500 mb-10"><?php echo app('translator')->get('common.phone'); ?></p>
            </div>
            <div class="col-lg-8">
                <div class="d-flex radio-btn-flex ml-40">
                    <div class="mr-30">
                        <input type="radio" name="phone_number" id="phone_yes" value="1"
                            class="common-radio relationButton" onclick="phoneNumber('1')"
                            <?php echo e(isset($id_card) ? ($id_card->phone_number == 1 ? 'checked' : '') : 'checked'); ?>>
                        <label for="phone_yes"><?php echo app('translator')->get('admin.yes'); ?></label>
                    </div>
                    <div class="mr-30">
                        <input type="radio" name="phone_number" id="phone_no" value="0"
                            class="common-radio relationButton" onclick="phoneNumber('0')"
                            <?php echo e(isset($id_card) ? ($id_card->phone_number == 0 ? 'checked' : '') : ''); ?>>
                        <label for="phone_no"><?php echo app('translator')->get('admin.none'); ?></label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-25 dateOfBirth">
            <div class="col-lg-4 d-flex">
                <p class="text-uppercase fw-500 mb-10"><?php echo app('translator')->get('common.date_of_birth'); ?></p>
            </div>
            <div class="col-lg-8">
                <div class="d-flex radio-btn-flex ml-40">
                    <div class="mr-30">
                        <input type="radio" name="dob" id="dob_yes" value="1"
                            class="common-radio relationButton" onclick="dOB('1')"
                            <?php echo e(isset($id_card) ? ($id_card->dob == 1 ? 'checked' : '') : 'checked'); ?>>
                        <label for="dob_yes"><?php echo app('translator')->get('admin.yes'); ?></label>
                    </div>
                    <div class="mr-30">
                        <input type="radio" name="dob" id="dob_no" value="0"
                            class="common-radio relationButton" onclick="dOB('0')"
                            <?php echo e(isset($id_card) ? ($id_card->dob == 0 ? 'checked' : '') : ''); ?>>
                        <label for="dob_no"><?php echo app('translator')->get('admin.none'); ?></label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-25 bloodGroup">
            <div class="col-lg-4 d-flex">
                <p class="text-uppercase fw-500 mb-10"><?php echo app('translator')->get('student.blood_group'); ?></p>
            </div>
            <div class="col-lg-8">
                <div class="d-flex radio-btn-flex ml-40">
                    <div class="mr-30">
                        <input type="radio" name="blood" id="blood_yes" value="1"
                            class="common-radio relationButton" onclick="bloodGroup('1')"
                            <?php echo e(isset($id_card) ? ($id_card->blood == 1 ? 'checked' : '') : 'checked'); ?>>
                        <label for="blood_yes"><?php echo app('translator')->get('admin.yes'); ?></label>
                    </div>
                    <div class="mr-30">
                        <input type="radio" name="blood" id="blood_no" value="0"
                            class="common-radio relationButton" onclick="bloodGroup('0')"
                            <?php echo e(isset($id_card) ? ($id_card->blood == 0 ? 'checked' : '') : ''); ?>>
                        <label for="blood_no"><?php echo app('translator')->get('admin.none'); ?></label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-25 template-only-field">
            <div class="col-lg-4 d-flex"><p class="text-uppercase fw-500 mb-10">Gender</p></div>
            <div class="col-lg-8">
                <div class="d-flex radio-btn-flex ml-40">
                    <div class="mr-30">
                        <input type="radio" name="gender" id="gender_yes" value="1" class="common-radio"
                            <?php echo e(isset($id_card) ? (($id_card->gender ?? 0) == 1 ? 'checked' : '') : 'checked'); ?>>
                        <label for="gender_yes"><?php echo app('translator')->get('admin.yes'); ?></label>
                    </div>
                    <div class="mr-30">
                        <input type="radio" name="gender" id="gender_no" value="0" class="common-radio"
                            <?php echo e(isset($id_card) ? (($id_card->gender ?? 0) == 0 ? 'checked' : '') : ''); ?>>
                        <label for="gender_no"><?php echo app('translator')->get('admin.none'); ?></label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-25 template-only-field">
            <div class="col-lg-4 d-flex"><p class="text-uppercase fw-500 mb-10">Admission Date</p></div>
            <div class="col-lg-8">
                <div class="d-flex radio-btn-flex ml-40">
                    <div class="mr-30">
                        <input type="radio" name="admission_date" id="admission_date_yes" value="1" class="common-radio"
                            <?php echo e(isset($id_card) ? (($id_card->admission_date ?? 0) == 1 ? 'checked' : '') : 'checked'); ?>>
                        <label for="admission_date_yes"><?php echo app('translator')->get('admin.yes'); ?></label>
                    </div>
                    <div class="mr-30">
                        <input type="radio" name="admission_date" id="admission_date_no" value="0" class="common-radio"
                            <?php echo e(isset($id_card) ? (($id_card->admission_date ?? 0) == 0 ? 'checked' : '') : ''); ?>>
                        <label for="admission_date_no"><?php echo app('translator')->get('admin.none'); ?></label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-25 template-only-field">
            <div class="col-lg-4 d-flex"><p class="text-uppercase fw-500 mb-10">Guardian Name</p></div>
            <div class="col-lg-8">
                <div class="d-flex radio-btn-flex ml-40">
                    <div class="mr-30">
                        <input type="radio" name="guardian_name" id="guardian_name_yes" value="1" class="common-radio"
                            <?php echo e(isset($id_card) ? (($id_card->guardian_name ?? 0) == 1 ? 'checked' : '') : 'checked'); ?>>
                        <label for="guardian_name_yes"><?php echo app('translator')->get('admin.yes'); ?></label>
                    </div>
                    <div class="mr-30">
                        <input type="radio" name="guardian_name" id="guardian_name_no" value="0" class="common-radio"
                            <?php echo e(isset($id_card) ? (($id_card->guardian_name ?? 0) == 0 ? 'checked' : '') : ''); ?>>
                        <label for="guardian_name_no"><?php echo app('translator')->get('admin.none'); ?></label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-25 template-only-field">
            <div class="col-lg-4 d-flex"><p class="text-uppercase fw-500 mb-10">Guardian Phone</p></div>
            <div class="col-lg-8">
                <div class="d-flex radio-btn-flex ml-40">
                    <div class="mr-30">
                        <input type="radio" name="guardian_phone" id="guardian_phone_yes" value="1" class="common-radio"
                            <?php echo e(isset($id_card) ? (($id_card->guardian_phone ?? 0) == 1 ? 'checked' : '') : 'checked'); ?>>
                        <label for="guardian_phone_yes"><?php echo app('translator')->get('admin.yes'); ?></label>
                    </div>
                    <div class="mr-30">
                        <input type="radio" name="guardian_phone" id="guardian_phone_no" value="0" class="common-radio"
                            <?php echo e(isset($id_card) ? (($id_card->guardian_phone ?? 0) == 0 ? 'checked' : '') : ''); ?>>
                        <label for="guardian_phone_no"><?php echo app('translator')->get('admin.none'); ?></label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-25 template-only-field">
            <div class="col-lg-4 d-flex"><p class="text-uppercase fw-500 mb-10">QR Code (Public Profile)</p></div>
            <div class="col-lg-8">
                <div class="d-flex radio-btn-flex ml-40">
                    <div class="mr-30">
                        <input type="radio" name="show_qr" id="show_qr_yes" value="1" class="common-radio"
                            <?php echo e(isset($id_card) ? (($id_card->show_qr ?? 0) == 1 ? 'checked' : '') : 'checked'); ?>>
                        <label for="show_qr_yes"><?php echo app('translator')->get('admin.yes'); ?></label>
                    </div>
                    <div class="mr-30">
                        <input type="radio" name="show_qr" id="show_qr_no" value="0" class="common-radio"
                            <?php echo e(isset($id_card) ? (($id_card->show_qr ?? 0) == 0 ? 'checked' : '') : ''); ?>>
                        <label for="show_qr_no"><?php echo app('translator')->get('admin.none'); ?></label>
                    </div>
                </div>
            </div>
        </div>

        <div class="template-only-field mt-40">
            <h4 class="mb-15">Field Positions (% of card) — Front</h4>
            <p class="mb-20 text-muted">Adjust Left / Top / Width / Height / Font size (mm). Preview updates live as you type — save when ready.</p>
            <?php $__currentLoopData = ['photo' => 'Student Photo', 'student_name' => 'Full Name', 'admission_no' => 'Admission ID', 'class' => 'Classification', 'gender' => 'Gender', 'student_address' => 'Address', 'admission_date' => 'Admission Date', 'footer_id' => 'National ID Number']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $pos = $fieldPositions['front'][$key] ?? []; ?>
                <div class="row mb-15 align-items-end js-pos-row" data-side="front" data-field="<?php echo e($key); ?>">
                    <div class="col-lg-2"><strong><?php echo e($label); ?></strong></div>
                    <div class="col-lg-2">
                        <label>Left %</label>
                        <input class="primary_input_field form-control js-pos-input" data-prop="left" type="number" step="0.1" name="field_positions[front][<?php echo e($key); ?>][left]" value="<?php echo e($pos['left'] ?? 0); ?>">
                    </div>
                    <div class="col-lg-2">
                        <label>Top %</label>
                        <input class="primary_input_field form-control js-pos-input" data-prop="top" type="number" step="0.1" name="field_positions[front][<?php echo e($key); ?>][top]" value="<?php echo e($pos['top'] ?? 0); ?>">
                    </div>
                    <div class="col-lg-2">
                        <label>Width %</label>
                        <input class="primary_input_field form-control js-pos-input" data-prop="width" type="number" step="0.1" name="field_positions[front][<?php echo e($key); ?>][width]" value="<?php echo e($pos['width'] ?? 0); ?>">
                    </div>
                    <div class="col-lg-2">
                        <label>Height %</label>
                        <input class="primary_input_field form-control js-pos-input" data-prop="height" type="number" step="0.1" name="field_positions[front][<?php echo e($key); ?>][height]" value="<?php echo e($pos['height'] ?? 0); ?>">
                    </div>
                    <div class="col-lg-2">
                        <label>Font mm</label>
                        <input class="primary_input_field form-control js-pos-input" data-prop="font_size" type="number" step="0.1" name="field_positions[front][<?php echo e($key); ?>][font_size]" value="<?php echo e($pos['font_size'] ?? 2.5); ?>">
                    </div>
                    <?php if($key !== 'photo' && $key !== 'footer_id'): ?>
                        <div class="col-lg-12 mt-10">
                            <label>Label text</label>
                            <input class="primary_input_field form-control js-pos-input" data-prop="label" type="text" name="field_positions[front][<?php echo e($key); ?>][label]" value="<?php echo e($pos['label'] ?? $label); ?>">
                            <input type="hidden" name="field_positions[front][<?php echo e($key); ?>][show_label]" value="1">
                            <input type="hidden" name="field_positions[front][<?php echo e($key); ?>][mask]" value="0">
                            <input type="hidden" name="field_positions[front][<?php echo e($key); ?>][mask_color]" value="transparent">
                        </div>
                    <?php elseif($key === 'footer_id'): ?>
                        <input type="hidden" name="field_positions[front][footer_id][mask]" value="0">
                        <input type="hidden" name="field_positions[front][footer_id][mask_color]" value="transparent">
                        <input type="hidden" name="field_positions[front][footer_id][color]" value="#ffffff">
                        <input type="hidden" name="field_positions[front][footer_id][show_label]" value="0">
                    <?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <h4 class="mb-15 mt-30">Field Positions (% of card) — Back</h4>
            <?php $__currentLoopData = ['guardian_name' => 'Guardian Name', 'guardian_phone' => 'Guardian Phone', 'qr' => 'QR Code']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $pos = $fieldPositions['back'][$key] ?? []; ?>
                <div class="row mb-15 align-items-end js-pos-row" data-side="back" data-field="<?php echo e($key); ?>">
                    <div class="col-lg-2"><strong><?php echo e($label); ?></strong></div>
                    <div class="col-lg-2">
                        <label>Left %</label>
                        <input class="primary_input_field form-control js-pos-input" data-prop="left" type="number" step="0.1" name="field_positions[back][<?php echo e($key); ?>][left]" value="<?php echo e($pos['left'] ?? 0); ?>">
                    </div>
                    <div class="col-lg-2">
                        <label>Top %</label>
                        <input class="primary_input_field form-control js-pos-input" data-prop="top" type="number" step="0.1" name="field_positions[back][<?php echo e($key); ?>][top]" value="<?php echo e($pos['top'] ?? 0); ?>">
                    </div>
                    <div class="col-lg-2">
                        <label>Width %</label>
                        <input class="primary_input_field form-control js-pos-input" data-prop="width" type="number" step="0.1" name="field_positions[back][<?php echo e($key); ?>][width]" value="<?php echo e($pos['width'] ?? 0); ?>">
                    </div>
                    <div class="col-lg-2">
                        <label>Height %</label>
                        <input class="primary_input_field form-control js-pos-input" data-prop="height" type="number" step="0.1" name="field_positions[back][<?php echo e($key); ?>][height]" value="<?php echo e($pos['height'] ?? 0); ?>">
                    </div>
                    <?php if($key !== 'qr'): ?>
                        <div class="col-lg-2">
                            <label>Font mm</label>
                            <input class="primary_input_field form-control js-pos-input" data-prop="font_size" type="number" step="0.1" name="field_positions[back][<?php echo e($key); ?>][font_size]" value="<?php echo e($pos['font_size'] ?? 2.5); ?>">
                        </div>
                        <div class="col-lg-12 mt-10">
                            <label>Label text</label>
                            <input class="primary_input_field form-control js-pos-input" data-prop="label" type="text" name="field_positions[back][<?php echo e($key); ?>][label]" value="<?php echo e($pos['label'] ?? $label); ?>">
                            <input type="hidden" name="field_positions[back][<?php echo e($key); ?>][show_label]" value="1">
                            <input type="hidden" name="field_positions[back][<?php echo e($key); ?>][mask]" value="0">
                            <input type="hidden" name="field_positions[back][<?php echo e($key); ?>][mask_color]" value="transparent">
                        </div>
                    <?php else: ?>
                        <input type="hidden" name="field_positions[back][qr][mask]" value="0">
                        <input type="hidden" name="field_positions[back][qr][mask_color]" value="transparent">
                    <?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <script>
            (function () {
                function toggleTemplateFields() {
                    var mode = document.getElementById('designMode');
                    if (!mode) return;
                    var show = mode.value === 'template';
                    document.querySelectorAll('.template-only-field').forEach(function (el) {
                        el.style.display = show ? '' : 'none';
                    });
                    var classicCreate = document.getElementById('classicPreviewCreate');
                    var templateCreate = document.getElementById('templatePreviewCreate');
                    if (classicCreate && templateCreate) {
                        classicCreate.classList.toggle('d-none', show);
                        templateCreate.classList.toggle('d-none', !show);
                    }
                }

                function previewTargets() {
                    return document.querySelectorAll('.id-card-template-preview .js-preview-field');
                }

                function findPreviewField(side, field) {
                    return document.querySelector(
                        '.id-card-template-preview .js-preview-field[data-side="' + side + '"][data-field="' + field + '"]'
                    );
                }

                function applyPositionFromRow(row) {
                    if (!row) return;
                    var side = row.getAttribute('data-side');
                    var field = row.getAttribute('data-field');
                    var el = findPreviewField(side, field);
                    if (!el) return;

                    var get = function (prop) {
                        var input = row.querySelector('.js-pos-input[data-prop="' + prop + '"]');
                        return input ? input.value : '';
                    };

                    var left = get('left');
                    var top = get('top');
                    var width = get('width');
                    var height = get('height');
                    var fontSize = get('font_size');
                    var label = get('label');

                    if (left !== '') el.style.left = left + '%';
                    if (top !== '') el.style.top = top + '%';
                    if (width !== '') el.style.width = width + '%';
                    if (height !== '') el.style.height = height + '%';
                    if (fontSize !== '' && field !== 'photo' && field !== 'qr') {
                        el.style.fontSize = fontSize + 'mm';
                    }
                    if (label !== '' && label !== null) {
                        var labelEl = el.querySelector('.js-preview-label');
                        if (labelEl) labelEl.textContent = label + ':';
                    }
                }

                function applyAllPositions() {
                    document.querySelectorAll('.js-pos-row').forEach(applyPositionFromRow);
                }

                function applyCardSizeAndFont() {
                    var w = document.querySelector('input[name="pl_width"]');
                    var h = document.querySelector('input[name="pl_height"]');
                    var font = document.querySelector('input[name="font_family"]');
                    var color = document.querySelector('input[name="font_color"]');
                    var widthVal = w && w.value ? w.value : 86;
                    var heightVal = h && h.value ? h.value : 49;

                    document.querySelectorAll('.id-card-template-preview .js-id-card-side').forEach(function (side) {
                        side.style.width = widthVal + 'mm';
                        side.style.minHeight = heightVal + 'mm';
                        side.style.aspectRatio = widthVal + '/' + heightVal;
                        if (font && font.value) side.style.fontFamily = font.value;
                        if (color && color.value) side.style.color = color.value;
                    });
                }

                function bindLivePreview() {
                    document.querySelectorAll('.js-pos-input').forEach(function (input) {
                        input.addEventListener('input', function () {
                            applyPositionFromRow(input.closest('.js-pos-row'));
                        });
                        input.addEventListener('change', function () {
                            applyPositionFromRow(input.closest('.js-pos-row'));
                        });
                    });

                    ['pl_width', 'pl_height', 'font_family', 'font_color'].forEach(function (name) {
                        var el = document.querySelector('input[name="' + name + '"]');
                        if (!el) return;
                        el.addEventListener('input', applyCardSizeAndFont);
                        el.addEventListener('change', applyCardSizeAndFont);
                    });

                    function replaceSideBackground(selector, file) {
                        if (!file) return;
                        var url = URL.createObjectURL(file);
                        document.querySelectorAll(selector).forEach(function (side) {
                            // Clear any CSS background so the new image fully replaces the old one
                            side.style.backgroundImage = 'none';
                            side.style.background = '#fff';
                            var img = side.querySelector('.js-card-bg');
                            if (!img) {
                                img = document.createElement('img');
                                img.className = 'js-card-bg';
                                img.alt = '';
                                img.style.cssText = 'position:absolute;left:0;top:0;width:100%;height:100%;object-fit:fill;z-index:0;pointer-events:none;display:block;';
                                side.insertBefore(img, side.firstChild);
                            }
                            if (img.dataset.objectUrl) {
                                try { URL.revokeObjectURL(img.dataset.objectUrl); } catch (e) {}
                            }
                            img.dataset.objectUrl = url;
                            img.src = url;
                            img.style.display = 'block';
                        });
                    }

                    var backFile = document.getElementById('document_file_back_side');
                    if (backFile) {
                        backFile.addEventListener('change', function () {
                            if (!this.files || !this.files[0]) return;
                            replaceSideBackground('.id-card-template-preview .id-card-back', this.files[0]);
                        });
                    }
                    var frontFile = document.getElementById('document_file_5');
                    if (frontFile) {
                        frontFile.addEventListener('change', function () {
                            if (!this.files || !this.files[0]) return;
                            replaceSideBackground('.id-card-template-preview .id-card-front', this.files[0]);
                        });
                    }
                }

                document.addEventListener('DOMContentLoaded', function () {
                    toggleTemplateFields();
                    var mode = document.getElementById('designMode');
                    if (mode) mode.addEventListener('change', toggleTemplateFields);
                    bindLivePreview();
                    applyAllPositions();
                    applyCardSizeAndFont();
                });
            })();
        </script>

        <?php
            $tooltip = '';
            if (userPermission('create-id-card')) {
                $tooltip = '';
            } else {
                $tooltip = 'You have no permission to add';
            }
        ?>
        <div class="row mt-40">
            <div class="col-lg-12 text-center">
                <button class="primary-btn fix-gr-bg submit savaIdCard" type="submit" data-toggle="tooltip"
                    title="<?php echo e($tooltip); ?>">
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

<?php /**PATH C:\xampp\htdocs\school-mgt\resources\views/backEnd/admin/idCard/form_id_card.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('examplan::exp.admit_card_setting'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/vendors/editor/summernote-bs4.css')); ?>">
    <style>
        .img_prevView {
            height: 78px;
            width: 110px;
        }

        .input-right-icon button i {
            position: relative;
            top: 0px !important;
        }
        .dropdown-toggle::after {
            display: none !important;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('examplan::exp.admit_card_setting'); ?></h1>

                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('examplan::exp.exam_plan'); ?></a>
                    <a href="#"><?php echo app('translator')->get('examplan::exp.admit_card_setting'); ?></a>
                </div>
            </div>
        </div>
    </section>

    

    <section class="mb-40 student-details">
        <div class="container-fluid p-0">
            <div class="row">
                <!-- Start Sms Details -->
                <div class="col-lg-12">
                    <ul class="nav nav-tabs tab_column" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" href="#select_layout" role="tab"
                               data-toggle="tab"><?php echo app('translator')->get('system_settings.select_a_layout'); ?></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link <?php if($setting->admit_layout == 1): ?> active <?php endif; ?>" href="#layout_one"
                               role="tab" data-toggle="tab"><?php echo app('translator')->get('examplan::exp.layout_one'); ?></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link <?php if($setting->admit_layout == 2): ?> show active <?php endif; ?>" href="#layout_two"
                               role="tab" data-toggle="tab"><?php echo app('translator')->get('examplan::exp.layout_two'); ?> </a>
                        </li>
                    </ul>


                    <!-- Tab panes -->
                    <div class="tab-content">

                        <div role="tabpanel" class="tab-pane fade" id="select_layout">
                            <div class="white-box mt-2">
                                <div class="row">
                                    <div class="col-lg-4 select_sms_services">
                                        <div class="primary_input">
                                            <select
                                                    class="primary_select  form-control<?php echo e($errors->has('layout') ? ' is-invalid' : ''); ?>"
                                                    name="layout" id="layout">
                                                <option data-display="<?php echo app('translator')->get('system_settings.select_a_SMS_service'); ?>"
                                                        value=""><?php echo app('translator')->get('examplan::exp.select_layout'); ?>
                                                </option>
                                                <option value="1" <?php echo e($setting->admit_layout == 1 ? 'selected' : ''); ?>>
                                                    <?php echo app('translator')->get('examplan::exp.layout_one'); ?></option>
                                                <option value="2" <?php echo e($setting->admit_layout == 2 ? 'selected' : ''); ?>>
                                                    <?php echo app('translator')->get('examplan::exp.layout_two'); ?></option>
                                            </select>

                                            <?php if($errors->has('book_category_id')): ?>
                                                <span class="text-danger invalid-select" role="alert">
                                                    <?php echo e($errors->first('book_category_id')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div role="tabpanel" class="tab-pane fade <?php if($setting->admit_layout == 1): ?> show active <?php endif; ?> "
                             id="layout_one">
                            <div class="white-box">
                                <div class="main-title mb-25">
                                    <h3 class="mb-0"><?php echo app('translator')->get('examplan::exp.layout_one'); ?> <?php echo app('translator')->get('examplan::exp.admit_card_setting'); ?></h3>
                                </div>
                                <form action="<?php echo e(route('examplan.admitcard.settingUpdate')); ?>" method="post"
                                      enctype="multipart/form-data"
                                      class="bg-white rounded">
                                    <input type="hidden" name="tab_layout" value="1">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div
                                                class="col-lg-6 d-flex relation-button justify-content-between mb-3 justify-content-between">
                                            <p class="text-uppercase mb-0"><?php echo app('translator')->get('examplan::exp.student_photo'); ?></p>
                                            <div class="d-flex radio-btn-flex ml-30 mt-1">
                                                <div class="mr-20">
                                                    <input type="radio" name="student_photo" id="student_photo_on"
                                                           value="1" class="common-radio relationButton"
                                                           <?php if($setting->student_photo): ?> checked <?php endif; ?>>
                                                    <label for="student_photo_on"><?php echo app('translator')->get('examplan::exp.show'); ?></label>
                                                </div>
                                                <div class="mr-20">
                                                    <input type="radio" name="student_photo" id="student_photo"
                                                           value="0" class="common-radio relationButton"
                                                           <?php if($setting->student_photo == 0): ?> checked <?php endif; ?>>
                                                    <label for="student_photo"><?php echo app('translator')->get('examplan::exp.hide'); ?></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 d-flex relation-button justify-content-between mb-3">
                                            <p class="text-uppercase mb-0"> <?php echo app('translator')->get('examplan::exp.student_name'); ?></p>
                                            <div class="d-flex radio-btn-flex ml-30 mt-1">
                                                <div class="mr-20">
                                                    <input type="radio" name="student_name" id="student_name_on"
                                                           value="1" class="common-radio relationButton"
                                                           <?php if($setting->student_name): ?> checked <?php endif; ?>>
                                                    <label for="student_name_on"><?php echo app('translator')->get('examplan::exp.show'); ?></label>
                                                </div>
                                                <div class="mr-20">
                                                    <input type="radio" name="student_name" id="student_name"
                                                           value="0" class="common-radio relationButton"
                                                           <?php if($setting->student_name == 0): ?> checked <?php endif; ?>>
                                                    <label for="student_name"><?php echo app('translator')->get('examplan::exp.hide'); ?></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 d-flex relation-button justify-content-between mb-3">
                                            <p class="text-uppercase mb-0"> <?php echo app('translator')->get('examplan::exp.gaurdian_name'); ?></p>
                                            <div class="d-flex radio-btn-flex ml-30 mt-1">
                                                <div class="mr-20">
                                                    <input type="radio" name="gaurdian_name" id="gaurdian_name_on"
                                                           value="1" class="common-radio relationButton"
                                                           <?php if($setting->gaurdian_name): ?> checked <?php endif; ?>>
                                                    <label for="gaurdian_name_on"><?php echo app('translator')->get('examplan::exp.show'); ?></label>
                                                </div>
                                                <div class="mr-20">
                                                    <input type="radio" name="gaurdian_name" id="gaurdian_name"
                                                           value="0" class="common-radio relationButton"
                                                           <?php if($setting->gaurdian_name == 0): ?> checked <?php endif; ?>>
                                                    <label for="gaurdian_name"><?php echo app('translator')->get('examplan::exp.hide'); ?></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 d-flex relation-button justify-content-between mb-3">
                                            <p class="text-uppercase mb-0"> <?php echo app('translator')->get('examplan::exp.admission_no'); ?></p>
                                            <div class="d-flex radio-btn-flex ml-30 mt-1">
                                                <div class="mr-20">
                                                    <input type="radio" name="admission_no" id="admission_no_on"
                                                           value="1" class="common-radio relationButton"
                                                           <?php if($setting->admission_no): ?> checked <?php endif; ?>>
                                                    <label for="admission_no_on"><?php echo app('translator')->get('examplan::exp.show'); ?></label>
                                                </div>
                                                <div class="mr-20">
                                                    <input type="radio" name="admission_no" id="admission_no"
                                                           value="0" class="common-radio relationButton"
                                                           <?php if($setting->admission_no == 0): ?> checked <?php endif; ?>>
                                                    <label for="admission_no"><?php echo app('translator')->get('examplan::exp.hide'); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 d-flex relation-button justify-content-between mb-3">
                                            <p class="text-uppercase mb-0"> <?php echo app('translator')->get('examplan::exp.class_&_section'); ?></p>
                                            <div class="d-flex radio-btn-flex ml-30 mt-1">
                                                <div class="mr-20">
                                                    <input type="radio" name="class_section" id="class_section_on"
                                                           value="1" class="common-radio relationButton"
                                                           <?php if($setting->class_section): ?> checked <?php endif; ?>>
                                                    <label for="class_section_on"><?php echo app('translator')->get('examplan::exp.show'); ?></label>
                                                </div>
                                                <div class="mr-20">
                                                    <input type="radio" name="class_section" id="class_section"
                                                           value="0" class="common-radio relationButton"
                                                           <?php if($setting->class_section == 0): ?> checked <?php endif; ?>>
                                                    <label for="class_section"><?php echo app('translator')->get('examplan::exp.hide'); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 d-flex relation-button justify-content-between mb-3">
                                            <p class="text-uppercase mb-0"> <?php echo app('translator')->get('examplan::exp.exam_name'); ?></p>
                                            <div class="d-flex radio-btn-flex ml-30 mt-1">
                                                <div class="mr-20">
                                                    <input type="radio" name="exam_name" id="exam_name_on"
                                                           value="1" class="common-radio relationButton"
                                                           <?php if($setting->exam_name): ?> checked <?php endif; ?>>
                                                    <label for="exam_name_on"><?php echo app('translator')->get('examplan::exp.show'); ?></label>
                                                </div>
                                                <div class="mr-20">
                                                    <input type="radio" name="exam_name" id="exam_name" value="0"
                                                           class="common-radio relationButton"
                                                           <?php if($setting->exam_name == 0): ?> checked <?php endif; ?>>
                                                    <label for="exam_name"><?php echo app('translator')->get('examplan::exp.hide'); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 d-flex relation-button justify-content-between mb-3">
                                            <p class="text-uppercase mb-0"> <?php echo app('translator')->get('examplan::exp.academic_year'); ?></p>
                                            <div class="d-flex radio-btn-flex ml-30 mt-1">
                                                <div class="mr-20">
                                                    <input type="radio" name="academic_year" id="academic_year_on"
                                                           value="1" class="common-radio relationButton"
                                                           <?php if($setting->academic_year): ?> checked <?php endif; ?>>
                                                    <label for="academic_year_on"><?php echo app('translator')->get('examplan::exp.show'); ?></label>
                                                </div>
                                                <div class="mr-20">
                                                    <input type="radio" name="academic_year" id="academic_year"
                                                           value="0" class="common-radio relationButton"
                                                           <?php if($setting->academic_year == 0): ?> checked <?php endif; ?>>
                                                    <label for="academic_year"><?php echo app('translator')->get('examplan::exp.hide'); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 d-flex relation-button justify-content-between mb-3">
                                            <p class="text-uppercase mb-0"> <?php echo app('translator')->get('examplan::exp.school_address'); ?></p>
                                            <div class="d-flex radio-btn-flex ml-30 mt-1">
                                                <div class="mr-20">
                                                    <input type="radio" name="school_address" id="school_address_on"
                                                           value="1" class="common-radio relationButton"
                                                           <?php if($setting->school_address): ?> checked <?php endif; ?>>
                                                    <label for="school_address_on"><?php echo app('translator')->get('examplan::exp.show'); ?></label>
                                                </div>
                                                <div class="mr-20">
                                                    <input type="radio" name="school_address" id="school_address"
                                                           value="0" class="common-radio relationButton"
                                                           <?php if($setting->school_address == 0): ?> checked <?php endif; ?>>
                                                    <label for="school_address"><?php echo app('translator')->get('examplan::exp.hide'); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        

                                        <div class="col-lg-6 d-flex relation-button justify-content-between mb-3">
                                            <p class="text-uppercase mb-0"> <?php echo app('translator')->get('examplan::exp.student_can_download'); ?></p>
                                            <div class="d-flex radio-btn-flex ml-30 mt-1">
                                                <div class="mr-20">
                                                    <input type="radio" name="student_download"
                                                           id="student_download_on" value="1"
                                                           class="common-radio relationButton"
                                                           <?php if($setting->student_download): ?> checked <?php endif; ?>>
                                                    <label for="student_download_on"><?php echo app('translator')->get('examplan::exp.yes'); ?></label>
                                                </div>
                                                <div class="mr-20">
                                                    <input type="radio" name="student_download" id="student_download"
                                                           value="0" class="common-radio relationButton"
                                                           <?php if($setting->student_download == 0): ?> checked <?php endif; ?>>
                                                    <label for="student_download"><?php echo app('translator')->get('examplan::exp.no'); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 d-flex relation-button justify-content-between mb-3">
                                            <p class="text-uppercase mb-0"> <?php echo app('translator')->get('examplan::exp.parent_can_download'); ?></p>
                                            <div class="d-flex radio-btn-flex ml-30 mt-1">
                                                <div class="mr-20">
                                                    <input type="radio" name="parent_download" id="parent_download_on"
                                                           value="1" class="common-radio relationButton"
                                                           <?php if($setting->parent_download): ?> checked <?php endif; ?>>
                                                    <label for="parent_download_on"><?php echo app('translator')->get('examplan::exp.yes'); ?></label>
                                                </div>
                                                <div class="mr-20">
                                                    <input type="radio" name="parent_download" id="parent_download"
                                                           value="0" class="common-radio relationButton"
                                                           <?php if($setting->parent_download == 0): ?> checked <?php endif; ?>>
                                                    <label for="parent_download"><?php echo app('translator')->get('examplan::exp.no'); ?></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 d-flex relation-button justify-content-between mb-3">
                                            <p class="text-uppercase mb-0"> <?php echo app('translator')->get('examplan::exp.student_notification'); ?></p>
                                            <div class="d-flex radio-btn-flex ml-30 mt-1">
                                                <div class="mr-20">
                                                    <input type="radio" name="student_notification"
                                                           id="student_notification_on" value="1"
                                                           class="common-radio relationButton"
                                                           <?php if($setting->student_notification): ?> checked <?php endif; ?>>
                                                    <label for="student_notification_on"><?php echo app('translator')->get('examplan::exp.yes'); ?></label>
                                                </div>
                                                <div class="mr-20">
                                                    <input type="radio" name="student_notification"
                                                           id="student_notification" value="0"
                                                           class="common-radio relationButton"
                                                           <?php if($setting->student_notification == 0): ?> checked <?php endif; ?>>
                                                    <label for="student_notification"><?php echo app('translator')->get('examplan::exp.no'); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 d-flex relation-button justify-content-between mb-3">
                                            <p class="text-uppercase mb-0"> <?php echo app('translator')->get('examplan::exp.parent_notification'); ?></p>
                                            <div class="d-flex radio-btn-flex ml-30 mt-1">
                                                <div class="mr-20">
                                                    <input type="radio" name="parent_notification"
                                                           id="parent_notification_on" value="1"
                                                           class="common-radio relationButton"
                                                           <?php if($setting->parent_notification): ?> checked <?php endif; ?>>
                                                    <label for="parent_notification_on"><?php echo app('translator')->get('examplan::exp.yes'); ?></label>
                                                </div>
                                                <div class="mr-20">
                                                    <input type="radio" name="parent_notification"
                                                           id="parent_notification" value="0"
                                                           class="common-radio relationButton"
                                                           <?php if($setting->parent_notification == 0): ?> checked <?php endif; ?>>
                                                    <label for="parent_notification"><?php echo app('translator')->get('examplan::exp.no'); ?></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 d-flex relation-button justify-content-between mb-3 teacher_signature"
                                             id="teacher_signature">
                                            <p class="text-uppercase mb-0"> <?php echo app('translator')->get('examplan::exp.class_teacher_signature'); ?></p>
                                            <div class="d-flex radio-btn-flex ml-30 mt-1">
                                                <div class="mr-20">
                                                    <input type="radio" name="class_teacher_signature"
                                                           id="class_teacher_signature_on" value="1"
                                                           class="common-radio relationButton"
                                                           <?php if($setting->class_teacher_signature): ?> checked <?php endif; ?>>
                                                    <label for="class_teacher_signature_on"><?php echo app('translator')->get('examplan::exp.show'); ?></label>
                                                </div>
                                                <div class="mr-20">
                                                    <input type="radio" name="class_teacher_signature"
                                                           id="class_teacher_signature" value="0"
                                                           class="common-radio relationButton"
                                                           <?php if($setting->class_teacher_signature == 0): ?> checked <?php endif; ?>>
                                                    <label for="class_teacher_signature"><?php echo app('translator')->get('examplan::exp.hide'); ?></label>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-6 d-flex relation-button justify-content-between mb-3 principal_signature"
                                             id="principal_signature">
                                            <p class="text-uppercase mb-0"> <?php echo app('translator')->get('examplan::exp.principal_signature'); ?></p>
                                            <div class="d-flex radio-btn-flex ml-30 mt-1">
                                                <div class="mr-20">
                                                    <input type="radio" name="principal_signature"
                                                           id="principal_signature_on" value="1"
                                                           class="common-radio relationButton"
                                                           <?php if($setting->principal_signature == 1): ?> checked <?php endif; ?>>
                                                    <label for="principal_signature_on"><?php echo app('translator')->get('examplan::exp.show'); ?></label>
                                                </div>
                                                <div class="mr-20">
                                                    <input type="radio" name="principal_signature"
                                                           id="principal_signature_off" value="0"
                                                           class="common-radio relationButton"
                                                           <?php if($setting->principal_signature == 0): ?> checked <?php endif; ?>>
                                                    <label for="principal_signature_off"><?php echo app('translator')->get('examplan::exp.hide'); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 relation-button  mb-3 teacher_signature">
                                            <div class="row no-gutters input-right-icon">
                                                <div class="col">
                                                    <div class="primary_input ">
                                                        <input class="primary_input_field" type="text"
                                                               id="teacher_signature_photo_placeholder"
                                                               placeholder=" <?php echo e($setting->teacher_signature_photo != '' ? getFileName($setting->teacher_signature_photo) : trans('examplan::exp.class_teacher_signature')); ?> "
                                                               readonly="">


                                                        <?php if($errors->has('teacher_signature_photo')): ?>
                                                            <span class="text-danger d-block">
                                                                <?php echo e(@$errors->first('teacher_signature_photo')); ?>

                                                            </span>
                                                        <?php endif; ?>

                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <button style="position: relative; top: 8px; right: 12px;"
                                                            class="primary-btn-small-input browse_file" type="button">

                                                        <label class="primary-btn small fix-gr-bg"
                                                               for="addTeacherSignatureImage"><?php echo app('translator')->get('common.browse'); ?></label>
                                                        <input type="file" class="d-none"
                                                               value="<?php echo e(old('teacher_signature_photo')); ?>"
                                                               name="teacher_signature_photo"
                                                               id="addTeacherSignatureImage">
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="row no-gutters input-right-icon mt-15">
                                                <div class="col-lg-12">
                                                    <img class="previewImageSize <?php echo e(@$setting->teacher_signature_photo ? '' : 'd-none'); ?>"
                                                    src="<?php echo e(@$setting->teacher_signature_photo ? asset($setting->teacher_signature_photo) : ''); ?>"
                                                    alt="" id="teacherSignatureImageShow" height="100%" width="100%">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 relation-button justify-content-between">

                                            <div class="row no-gutters input-right-icon">
                                                <div class="col">
                                                    <div class="primary_input ">
                                                        <input class="primary_input_field" type="text"
                                                               id="principal_signature_photo_placeholder"
                                                               placeholder=" <?php echo e($setting->principal_signature_photo != '' ? getFileName($setting->principal_signature_photo) : trans('examplan::exp.principal_signature')); ?>"
                                                               readonly="">


                                                        <?php if($errors->has('principal_signature_photo')): ?>
                                                            <span class="text-danger d-block">
                                                                <?php echo e(@$errors->first('principal_signature_photo')); ?>

                                                            </span>
                                                        <?php endif; ?>

                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <button style="position: relative; top: 8px; right: 12px;"
                                                            class="primary-btn-small-input" type="button">

                                                        <label class="primary-btn small fix-gr-bg"
                                                               for="addPrincipalSignatureImage"><?php echo app('translator')->get('common.browse'); ?></label>
                                                        <input type="file" class="d-none"
                                                               name="principal_signature_photo"
                                                               id="addPrincipalSignatureImage">
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="row no-gutters input-right-icon mt-15">
                                                <div class="col-lg-12">
                                                    <img class="previewImageSize <?php echo e(@$setting->principal_signature_photo ? '' : 'd-none'); ?>"
                                                    src="<?php echo e(@$setting->principal_signature_photo ? asset($setting->principal_signature_photo) : ''); ?>"
                                                    alt="" id="principalSignatureImageShow" height="100%" width="100%">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row mt-20">
                                        <div class="col-lg-12 text-center">
                                            <button class="primary-btn small fix-gr-bg"><i
                                                        class="ti-check"></i><?php echo app('translator')->get('common.update'); ?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane fade <?php if($setting->admit_layout == 2): ?> show active <?php endif; ?>"
                             id="layout_two">
                            <div class="white-box">
                                <div class="main-title mb-25">
                                    <h3 class="mb-0"> <?php echo app('translator')->get('examplan::exp.layout_two'); ?> <?php echo app('translator')->get('examplan::exp.admit_card_setting'); ?></h3>
                                </div>
                                <form action="<?php echo e(route('examplan.admitcard.settingUpdatetwo')); ?>" method="post"
                                      enctype="multipart/form-data"
                                      class="bg-white rounded">
                                    <input type="hidden" name="tab_layout" value="2">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div
                                                class="col-lg-6 d-flex relation-button justify-content-between mb-3 justify-content-between">
                                            <p class="text-uppercase mb-0"><?php echo app('translator')->get('examplan::exp.student_photo'); ?></p>
                                            <div class="d-flex radio-btn-flex ml-30 mt-1">
                                                <div class="mr-20">
                                                    <input type="radio" name="student_photo" id="student_photo_on2"
                                                           value="1" class="common-radio relationButton"
                                                           <?php if($setting->student_photo): ?> checked <?php endif; ?>>
                                                    <label for="student_photo_on2"><?php echo app('translator')->get('examplan::exp.show'); ?></label>
                                                </div>
                                                <div class="mr-20">
                                                    <input type="radio" name="student_photo" id="student_photo2"
                                                           value="0" class="common-radio relationButton"
                                                           <?php if($setting->student_photo == 0): ?> checked <?php endif; ?>>
                                                    <label for="student_photo2"><?php echo app('translator')->get('examplan::exp.hide'); ?></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 d-flex relation-button justify-content-between mb-3">
                                            <p class="text-uppercase mb-0"> <?php echo app('translator')->get('examplan::exp.student_name'); ?></p>
                                            <div class="d-flex radio-btn-flex ml-30 mt-1">
                                                <div class="mr-20">
                                                    <input type="radio" name="student_name" id="student_name_on2"
                                                           value="1" class="common-radio relationButton"
                                                           <?php if($setting->student_name): ?> checked <?php endif; ?>>
                                                    <label for="student_name_on2"><?php echo app('translator')->get('examplan::exp.show'); ?></label>
                                                </div>
                                                <div class="mr-20">
                                                    <input type="radio" name="student_name" id="student_name2"
                                                           value="0" class="common-radio relationButton"
                                                           <?php if($setting->student_name == 0): ?> checked <?php endif; ?>>
                                                    <label for="student_name2"><?php echo app('translator')->get('examplan::exp.hide'); ?></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 d-flex relation-button justify-content-between mb-3">
                                            <p class="text-uppercase mb-0"> <?php echo app('translator')->get('student.father_names'); ?></p>
                                            <div class="d-flex radio-btn-flex ml-30 mt-1">
                                                <div class="mr-20">
                                                    <input type="radio" name="gaurdian_name" id="gaurdian_name_on2"
                                                           value="1" class="common-radio relationButton"
                                                           <?php if($setting->gaurdian_name): ?> checked <?php endif; ?>>
                                                    <label for="gaurdian_name_on2"><?php echo app('translator')->get('examplan::exp.show'); ?></label>
                                                </div>
                                                <div class="mr-20">
                                                    <input type="radio" name="gaurdian_name" id="gaurdian_name2"
                                                           value="0" class="common-radio relationButton"
                                                           <?php if($setting->gaurdian_name == 0): ?> checked <?php endif; ?>>
                                                    <label for="gaurdian_name2"><?php echo app('translator')->get('examplan::exp.hide'); ?></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 d-flex relation-button justify-content-between mb-3">
                                            <p class="text-uppercase mb-0"> <?php echo app('translator')->get('examplan::exp.admission_no'); ?></p>
                                            <div class="d-flex radio-btn-flex ml-30 mt-1">
                                                <div class="mr-20">
                                                    <input type="radio" name="admission_no" id="admission_no_on2"
                                                           value="1" class="common-radio relationButton"
                                                           <?php if($setting->admission_no): ?> checked <?php endif; ?>>
                                                    <label for="admission_no_on2"><?php echo app('translator')->get('examplan::exp.show'); ?></label>
                                                </div>
                                                <div class="mr-20">
                                                    <input type="radio" name="admission_no" id="admission_no2"
                                                           value="0" class="common-radio relationButton"
                                                           <?php if($setting->admission_no == 0): ?> checked <?php endif; ?>>
                                                    <label for="admission_no2"><?php echo app('translator')->get('examplan::exp.hide'); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 d-flex relation-button justify-content-between mb-3">
                                            <p class="text-uppercase mb-0"> <?php echo app('translator')->get('examplan::exp.class_&_section'); ?></p>
                                            <div class="d-flex radio-btn-flex ml-30 mt-1">
                                                <div class="mr-20">
                                                    <input type="radio" name="class_section" id="class_section_on2"
                                                           value="1" class="common-radio relationButton"
                                                           <?php if($setting->class_section): ?> checked <?php endif; ?>>
                                                    <label for="class_section_on2"><?php echo app('translator')->get('examplan::exp.show'); ?></label>
                                                </div>
                                                <div class="mr-20">
                                                    <input type="radio" name="class_section" id="class_section2"
                                                           value="0" class="common-radio relationButton"
                                                           <?php if($setting->class_section == 0): ?> checked <?php endif; ?>>
                                                    <label for="class_section2"><?php echo app('translator')->get('examplan::exp.hide'); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 d-flex relation-button justify-content-between mb-3">
                                            <p class="text-uppercase mb-0"> <?php echo app('translator')->get('examplan::exp.exam_name'); ?></p>
                                            <div class="d-flex radio-btn-flex ml-30 mt-1">
                                                <div class="mr-20">
                                                    <input type="radio" name="exam_name" id="exam_name_on2"
                                                           value="1" class="common-radio relationButton"
                                                           <?php if($setting->exam_name): ?> checked <?php endif; ?>>
                                                    <label for="exam_name_on2"><?php echo app('translator')->get('examplan::exp.show'); ?></label>
                                                </div>
                                                <div class="mr-20">
                                                    <input type="radio" name="exam_name" id="exam_name2"
                                                           value="0" class="common-radio relationButton"
                                                           <?php if($setting->exam_name == 0): ?> checked <?php endif; ?>>
                                                    <label for="exam_name2"><?php echo app('translator')->get('examplan::exp.hide'); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 d-flex relation-button justify-content-between mb-3">
                                            <p class="text-uppercase mb-0"> <?php echo app('translator')->get('examplan::exp.academic_year'); ?></p>
                                            <div class="d-flex radio-btn-flex ml-30 mt-1">
                                                <div class="mr-20">
                                                    <input type="radio" name="academic_year" id="academic_year_on2"
                                                           value="1" class="common-radio relationButton"
                                                           <?php if($setting->academic_year): ?> checked <?php endif; ?>>
                                                    <label for="academic_year_on2"><?php echo app('translator')->get('examplan::exp.show'); ?></label>
                                                </div>
                                                <div class="mr-20">
                                                    <input type="radio" name="academic_year" id="academic_year2"
                                                           value="0" class="common-radio relationButton"
                                                           <?php if($setting->academic_year == 0): ?> checked <?php endif; ?>>
                                                    <label for="academic_year2"><?php echo app('translator')->get('examplan::exp.hide'); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 d-flex relation-button justify-content-between mb-3">
                                            <p class="text-uppercase mb-0"> <?php echo app('translator')->get('examplan::exp.school_address'); ?></p>
                                            <div class="d-flex radio-btn-flex ml-30 mt-1">
                                                <div class="mr-20">
                                                    <input type="radio" name="school_address" id="school_address_on2"
                                                           value="1" class="common-radio relationButton"
                                                           <?php if($setting->school_address): ?> checked <?php endif; ?>>
                                                    <label for="school_address_on2"><?php echo app('translator')->get('examplan::exp.show'); ?></label>
                                                </div>
                                                <div class="mr-20">
                                                    <input type="radio" name="school_address" id="school_address2"
                                                           value="0" class="common-radio relationButton"
                                                           <?php if($setting->school_address == 0): ?> checked <?php endif; ?>>
                                                    <label for="school_address2"><?php echo app('translator')->get('examplan::exp.hide'); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        

                                        <div class="col-lg-6 d-flex relation-button justify-content-between mb-3">
                                            <p class="text-uppercase mb-0"> <?php echo app('translator')->get('examplan::exp.student_can_download'); ?></p>
                                            <div class="d-flex radio-btn-flex ml-30 mt-1">
                                                <div class="mr-20">
                                                    <input type="radio" name="student_download"
                                                           id="student_download_on2" value="1"
                                                           class="common-radio relationButton"
                                                           <?php if($setting->student_download): ?> checked <?php endif; ?>>
                                                    <label for="student_download_on2"><?php echo app('translator')->get('examplan::exp.yes'); ?></label>
                                                </div>
                                                <div class="mr-20">
                                                    <input type="radio" name="student_download" id="student_download2"
                                                           value="0" class="common-radio relationButton"
                                                           <?php if($setting->student_download == 0): ?> checked <?php endif; ?>>
                                                    <label for="student_download2"><?php echo app('translator')->get('examplan::exp.no'); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 d-flex relation-button justify-content-between mb-3">
                                            <p class="text-uppercase mb-0"> <?php echo app('translator')->get('examplan::exp.parent_can_download'); ?></p>
                                            <div class="d-flex radio-btn-flex ml-30 mt-1">
                                                <div class="mr-20">
                                                    <input type="radio" name="parent_download" id="parent_download_on2"
                                                           value="1" class="common-radio relationButton"
                                                           <?php if($setting->parent_download): ?> checked <?php endif; ?>>
                                                    <label for="parent_download_on2"><?php echo app('translator')->get('examplan::exp.yes'); ?></label>
                                                </div>
                                                <div class="mr-20">
                                                    <input type="radio" name="parent_download" id="parent_download2"
                                                           value="0" class="common-radio relationButton"
                                                           <?php if($setting->parent_download == 0): ?> checked <?php endif; ?>>
                                                    <label for="parent_download2"><?php echo app('translator')->get('examplan::exp.no'); ?></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 d-flex relation-button justify-content-between mb-3">
                                            <p class="text-uppercase mb-0"> <?php echo app('translator')->get('examplan::exp.student_notification'); ?></p>
                                            <div class="d-flex radio-btn-flex ml-30 mt-1">
                                                <div class="mr-20">
                                                    <input type="radio" name="student_notification"
                                                           id="student_notification_on2" value="1"
                                                           class="common-radio relationButton"
                                                           <?php if($setting->student_notification): ?> checked <?php endif; ?>>
                                                    <label for="student_notification_on2"><?php echo app('translator')->get('examplan::exp.yes'); ?></label>
                                                </div>
                                                <div class="mr-20">
                                                    <input type="radio" name="student_notification"
                                                           id="student_notification2" value="0"
                                                           class="common-radio relationButton"
                                                           <?php if($setting->student_notification == 0): ?> checked <?php endif; ?>>
                                                    <label for="student_notification2"><?php echo app('translator')->get('examplan::exp.no'); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 d-flex relation-button justify-content-between mb-3">
                                            <p class="text-uppercase mb-0"> <?php echo app('translator')->get('examplan::exp.parent_notification'); ?></p>
                                            <div class="d-flex radio-btn-flex ml-30 mt-1">
                                                <div class="mr-20">
                                                    <input type="radio" name="parent_notification"
                                                           id="parent_notification_on2" value="1"
                                                           class="common-radio relationButton"
                                                           <?php if($setting->parent_notification): ?> checked <?php endif; ?>>
                                                    <label for="parent_notification_on2"><?php echo app('translator')->get('examplan::exp.yes'); ?></label>
                                                </div>
                                                <div class="mr-20">
                                                    <input type="radio" name="parent_notification"
                                                           id="parent_notification2" value="0"
                                                           class="common-radio relationButton"
                                                           <?php if($setting->parent_notification == 0): ?> checked <?php endif; ?>>
                                                    <label for="parent_notification2"><?php echo app('translator')->get('examplan::exp.no'); ?></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 d-flex relation-button justify-content-between mb-3 principal_signature"
                                             id="principal_signature">
                                            <p class="text-uppercase mb-0"> <?php echo app('translator')->get('examplan::exp.exam_controller_sign'); ?></p>
                                            <div class="d-flex radio-btn-flex ml-30 mt-1">
                                                <div class="mr-20">
                                                    <input type="radio" name="principal_signature"
                                                           id="principal_signature_on2" value="1"
                                                           class="common-radio relationButton"
                                                           <?php if($setting->principal_signature == 1): ?> checked <?php endif; ?>>
                                                    <label for="principal_signature_on2"><?php echo app('translator')->get('examplan::exp.show'); ?></label>
                                                </div>
                                                <div class="mr-20">
                                                    <input type="radio" name="principal_signature"
                                                           id="principal_signature_off2" value="0"
                                                           class="common-radio relationButton"
                                                           <?php if($setting->principal_signature == 0): ?> checked <?php endif; ?>>
                                                    <label for="principal_signature_off2"><?php echo app('translator')->get('examplan::exp.hide'); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 relation-button  mb-3 admit_sub_title">
                                            <div class="primary_input ">
                                                <label class="primary_input_label"
                                                       for=""><?php echo app('translator')->get('examplan::exp.admit_sub_title'); ?></label>
                                                <input class="primary_input_field form-control" type="text"
                                                       name="admit_sub_title" value="<?php echo e(@$setting->admit_sub_title); ?>">
                                            </div>

                                        </div>
                                        <div class="col-lg-6 relation-button justify-content-between mb-3">
                                            <div class="row no-gutters input-right-icon">
                                                <div class="col">
                                                    <div class="primary_input ">
                                                        <input class="primary_input_field" type="text"
                                                               id="principal_signature_photo_2_placeholder"
                                                               placeholder=" <?php echo e($setting->principal_signature_photo != '' ? getFileName($setting->principal_signature_photo) : trans('examplan::exp.exam_controller_sign')); ?>"
                                                               readonly="">


                                                        <?php if($errors->has('principal_signature_photo_2')): ?>
                                                            <span class="text-danger d-block">
                                                                <?php echo e(@$errors->first('principal_signature_photo_2')); ?>

                                                            </span>
                                                        <?php endif; ?>

                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <button style="position: relative; top: 8px; right: 12px;"
                                                            class="primary-btn-small-input" type="button">
                                                        <label class="primary-btn small fix-gr-bg"
                                                               for="addPrincipalSignatureImage2"><?php echo app('translator')->get('common.browse'); ?></label>
                                                        <input type="file" class="d-none"
                                                               name="principal_signature_photo_2"
                                                               id="addPrincipalSignatureImage2">
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="row no-gutters input-right-icon mt-15">
                                                <div class="col-lg-12">
                                                    <img class="previewImageSize <?php echo e(@$setting->principal_signature_photo ? '' : 'd-none'); ?>"
                                                    src="<?php echo e(@$setting->principal_signature_photo ? asset($setting->principal_signature_photo) : ''); ?>"
                                                    alt="" id="principalSignatureTwoImageShow" height="100%" width="100%">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 relation-button justify-content-between mb-3">
                                            <div class="row no-gutters input-right-icon">
                                                <div class="col">
                                                    <div class="primary_input">
                                                        <label class="primary_input_label"
                                                               for=""><?php echo app('translator')->get('examplan::exp.short_description'); ?>
                                                        </label>
                                                        <textarea
                                                                class="primary_input_field summer_note form-control<?php echo e($errors->has('description') ? ' is-invalid' : ''); ?>"
                                                                cols="2" rows="2" name="description"><?php echo e(@$setting->description); ?>

                                                        </textarea>
                                                        <?php if($errors->has('description')): ?>
                                                            <span class="text-danger"
                                                                  role="alert"><?php echo e($errors->first('description')); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row mt-20">
                                        <div class="col-lg-12 text-center">
                                            <button class="primary-btn small fix-gr-bg"><i
                                                        class="ti-check"></i><?php echo app('translator')->get('common.update'); ?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('public/backEnd/vendors/editor/summernote-bs4.js')); ?>"></script>

    <script>

        $("#teacher_signature").click(function () {
            var teacher = $("input[name='class_teacher_signature']:checked").val();
            if (teacher == 0) {
                console.log(teacher);
                $('.teacher_signature').css('display', 'none !important');

            }
        });

        $("#principal_signature").click(function () {
            var principal = $("input[name='principal_signature']:checked").val();
            if (principal == 0) {
                $('.principal_signature').css('display', 'none');
            }
        });

        // select a service
        $("#layout").on("change", function (e) {
            e.preventDefault();
            layout = $("#layout").val();
            url = $("#url").val();
            $.ajax({
                type: "get",
                data: {
                    layout: layout,
                },
                url: url + "/examplan/changeAdmitCardLayout",
                success: function (data) {
                    if (data == "success") {
                        toastr.success("Operation Success", "Successful", {
                            timeOut: 5000,
                        });
                    } else {
                        toastr.error("You Got Error", "Inconceivable!", {
                            timeOut: 5000,
                        });
                    }
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                },
            });
        });

        let principal_signature_photo_2 = document.getElementById("principal_signature_photo_2");
        if (principal_signature_photo_2) {
            principal_signature_photo_2.addEventListener("change", function (event) {
                let fileInput = event.srcElement;
                document.getElementById(
                    "principal_signature_photo_2_placeholder"
                ).placeholder = fileInput.files[0].name;
            });
        }

        let principal_signature_photo = document.getElementById("principal_signature_photo");
        if (principal_signature_photo) {
            principal_signature_photo.addEventListener("change", function (event) {
                let fileInput = event.srcElement;
                document.getElementById(
                    "principal_signature_photo_placeholder"
                ).placeholder = fileInput.files[0].name;
            });

        }
        var class_teacher_signature = document.getElementById("teacher_signature_photo");
        if (class_teacher_signature) {
            class_teacher_signature.addEventListener("change", function (event) {
                let fileInput = event.srcElement;
                document.getElementById(
                    "teacher_signature_photo_placeholder"
                ).placeholder = fileInput.files[0].name;
            });
        }
    </script>
    <script>
        $(document).on('change', '#addTeacherSignatureImage', function(event) {
            $('#teacherSignatureImageShow').removeClass('d-none');
            getFileName($(this).val(), '#teacher_signature_photo_placeholder');
            imageChangeWithFile($(this)[0], '#teacherSignatureImageShow');
        });
    </script>
    <script>
        $(document).on('change', '#addPrincipalSignatureImage', function(event) {
            $('#principalSignatureImageShow').removeClass('d-none');
            getFileName($(this).val(), '#principal_signature_photo_placeholder');
            imageChangeWithFile($(this)[0], '#principalSignatureImageShow');
        });
    </script>
    <script>
        $(document).on('change', '#addPrincipalSignatureImage2', function(event) {
            $('#principalSignatureTwoImageShow').removeClass('d-none');
            getFileName($(this).val(), '#principal_signature_photo_2_placeholder');
            imageChangeWithFile($(this)[0], '#principalSignatureTwoImageShow');
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Modules\ExamPlan\Resources\views\setting\admitCardSetting.blade.php ENDPATH**/ ?>
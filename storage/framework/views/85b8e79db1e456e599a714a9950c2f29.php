<!DOCTYPE html>
<html>

<head>
    <title>
        <?php if($role_id == 2): ?>
            <?php echo app('translator')->get('student.student_id_card'); ?>
        <?php elseif($role_id == 3): ?>
            <?php echo app('translator')->get('parent.parent_id'); ?>
        <?php else: ?>
            <?php echo app('translator')->get('hr.staff_id'); ?>
        <?php endif; ?>
    </title>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/bootstrap.css" />
    <style media="print">
        @import url("https://fonts.googleapis.com/css?family=Poppins:300,400,400i,500,600");

        td {
            border-right: 1px solid #ddd;
            border-left: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
            padding-top: 3px;
            padding-bottom: 3px;
        }

        table tr td {
            border: 0 !important;
        }
    </style>
    <style>
        .id_card {
            display: grid !important;
            grid-template-columns: repeat(2, 1fr) !important;
            grid-gap: 10px;
            justify-content: center;
        }

        input#button {
            margin: 21px 0;
            margin-left: 8%;
            background: #8733f9;
            display: inline-block;
            color: #f1f2f7;
            letter-spacing: 1px;
            font-family: "Poppins", sans-serif;
            font-size: 12px;
            font-weight: 500;
            line-height: 40px;
            padding: 0px 20px;
            outline: none !important;
            text-align: center;
            cursor: pointer;
            text-transform: uppercase;
            border: 0;
            border-radius: 5px;
            position: relative;
            overflow: hidden;
            -webkit-transition: all 0.4s ease 0s;
            -moz-transition: all 0.4s ease 0s;
            -o-transition: all 0.4s ease 0s;
            transition: all 0.4s ease 0s;
        }

        td {
            font-size: 11px;
            padding: 0 12px;
            line-height: 18px;
        }

        body#abc {
            width: 100%;
            margin: auto;
        }

        table {
            width: 100%;
        }

        @media print {
            body {
                -webkit-print-color-adjust: exact;
            }
        }
    </style>
</head>

<body id="abc">
    <input type="button" onclick="printDiv('abc')" id="button" class="primary-btn small fix-gr-bg" value="print" />

    <div class="id_card" id="id_card"
        style="display: grid !important;grid-template-columns: repeat(3,1fr) !important;grid-gap: <?php echo e($gridGap); ?>px;justify-content: center;">
        <?php
        $roleId = json_decode($id_card->role_id);
        ?>
        
        <?php $__currentLoopData = $s_students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff_student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(!in_array(3, $roleId)): ?>
                <?php if($id_card->page_layout_style == 'horizontal'): ?>
                <div id="horizontal"
                    style="margin: 0; padding: 0; font-family: 'Poppins', sans-serif; font-weight: 500;  font-size: 12px; line-height:1.02 ; color: #000">
                    <div class="horizontal__card"
                        style="line-height:1.02; background-image: url(<?php echo e(@$id_card->background_img != '' ? asset(@$id_card->background_img) : asset('public/backEnd/id_card/img/vertical_bg.png')); ?>); width: <?php echo e(!empty($id_card->pl_width) ? $id_card->pl_width : 57.15); ?>mm; height: <?php echo e(!empty($id_card->pl_height) ? $id_card->pl_height : 88.89999999999999); ?>mm; margin: auto; background-size: 100% 100%; background-position: center center; position: relative; background-color: #fff;">
                        <div class="horizontal_card_header"
                            style="line-height:1.02; display: flex; align-items:center; justify-content:space-between; padding:8px 12px">
                            <div class="logo__img logoImage hLogo"
                                style="line-height:1.02; width: 80px; background-image: url(<?php echo e($id_card->logo != '' ? asset($id_card->logo) : asset('public/backEnd/img/logo.png')); ?>);height: 30px; background-size: cover; background-repeat: no-repeat; background-position: center center;">
                            </div>
                        </div>

                        <div class="horizontal_card_body"
                            style="line-height:1.02; display:flex; padding-top:<?php echo e(!empty($id_card->t_space) ? $id_card->t_space : 2.5); ?>mm ; padding-bottom: <?php echo e(!empty($id_card->b_space) ? $id_card->b_space : 2.5); ?>mm ; padding-right: <?php echo e(!empty($id_card->r_space) ? $id_card->r_space : 3); ?>mm ; padding-left: <?php echo e(!empty($id_card->l_space) ? $id_card->l_space : 3); ?>mm ; flex-direction: column;">
                            <div class="thumb hRoundImg hSize photo hImg hRoundImg"
                                style="
                                                        <?php if(@$id_card->user_photo_style == 'round'): ?> <?php echo e('border-radius : 50%;'); ?> <?php endif; ?>
                                                        background-image: url(
                                                            <?php if($role_id == 2): ?> <?php echo e(@$staff_student->student_photo != '' ? asset(@$staff_student->student_photo) : (@$id_card->profile_image != '' ? asset(@$id_card->profile_image) : asset('public/backEnd/id_card/img/thumb.png'))); ?>

                                                            <?php else: ?>
                                                                <?php echo e(@$staff_student->staff_photo != '' ? asset(@$staff_student->staff_photo) : (@$id_card->profile_image != '' ? asset(@$id_card->profile_image) : asset('public/backEnd/id_card/img/thumb.png'))); ?> <?php endif; ?>
                                                            );background-size: cover; background-position: center center; background-repeat: no-repeat; line-height:1.02; width: <?php echo e(!empty($id_card->user_photo_width) ? $id_card->user_photo_width : 21.166666667); ?>mm; flex: 80px 0 0; height: <?php echo e(!empty($id_card->user_photo_height) ? $id_card->user_photo_height : 21.166666667); ?>mm; margin: auto; padding: 3px; align-content: center; justify-content: center; display: flex; border: 3px solid #fff;">
                            </div>
                            <div class="card_text"
                                style="line-height:1.02; display: flex; align-items: center; justify-content: space-between; width: 100%; flex-direction: column;">
                                <div class="card_text_head "
                                    style="line-height:1.02; display: flex; align-items: center; justify-content: space-between; width: 100%; margin-top:25px; margin-bottom:10px">
                                    <div class="card_text_left hId">
                                        <?php if($id_card->student_name == 1): ?>
                                        <div id="hName">
                                            <h4
                                                style="line-height:1.02; margin-top: 0; margin-bottom: 0px; font-size:11px; font-weight:600 ; text-transform: uppercase; color: #2656a6;">
                                                <?php echo e($staff_student->full_name != '' ? $staff_student->full_name : ''); ?>

                                            </h4>
                                        </div>
                                        <?php endif; ?>
                                        <?php if($id_card->admission_no == 1): ?>
                                        <div id="hAdmissionNumber">
                                            <?php if($role_id == 2): ?>
                                            <h3
                                                style="line-height:1.02; margin-top: 0; margin-bottom: 3px; font-size:10px; font-weight:500">
                                                <?php echo app('translator')->get('student.admission_no'); ?> : <?php echo e($staff_student->admission_no); ?></h3>
                                            <?php else: ?>
                                            <h3
                                                style="line-height:1.02; margin-top: 0; margin-bottom: 3px; font-size:10px; font-weight:500">
                                                <?php echo app('translator')->get('hr.staff_id'); ?> : <?php echo e($staff_student->staff_no); ?></h3>
                                            <?php endif; ?>
                                        </div>
                                        <?php endif; ?>
                                        <?php if($id_card->class == 1 && $role_id == 2 && !moduleStatusCheck('Univeristy')): ?>
                                        <div id="hClass">
                                            <h3
                                                style="line-height:1.02; margin-top: 0; margin-bottom: 3px; font-size:10px; font-weight:500">
                                                <?php echo app('translator')->get('common.class'); ?> :
                                                <?php $__currentLoopData = $staff_student->getClassRecord; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($record->class->class_name); ?>

                                                (<?php echo e($record->section->section_name); ?>)
                                                ,
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </h3>
                                        </div>
                                        <?php endif; ?>
                                        <?php if($role_id == 2): ?>
                                        <?php if(moduleStatusCheck('University')): ?>
                                        <?php if($id_card->un_session == 1): ?>
                                        <div id="hSession">
                                            <h3
                                                style="line-height:1.02; margin-top: 0; margin-bottom: 3px; font-size:10px; font-weight:500">
                                                <?php echo app('translator')->get('university::un.session'); ?> : <?php $__currentLoopData = $staff_student->studentRecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($record->unSession->name); ?> ,
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </h3>
                                        </div>
                                        <?php endif; ?>
                                        <?php if($id_card->un_faculty == 1): ?>
                                        <div id="hFaculty">
                                            <h3
                                                style="line-height:1.02; margin-top: 0; margin-bottom: 3px; font-size:10px; font-weight:500">
                                                <?php echo app('translator')->get('university::un.faculty'); ?> : <?php $__currentLoopData = $staff_student->studentRecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($record->unFaculty->name); ?> ,
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </h3>
                                        </div>
                                        <?php endif; ?>
                                        <?php if($id_card->un_department == 1): ?>
                                        <div id="hDepartment">
                                            <h3
                                                style="line-height:1.02; margin-top: 0; margin-bottom: 3px; font-size:10px; font-weight:500">
                                                <?php echo app('translator')->get('university::un.department'); ?> : <?php $__currentLoopData = $staff_student->studentRecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($record->unDepartment->name); ?> ,
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </h3>
                                        </div>
                                        <?php endif; ?>
                                        <?php if($id_card->un_academic == 1): ?>
                                        <div id="hAcademic">
                                            <h3
                                                style="line-height:1.02; margin-top: 0; margin-bottom: 3px; font-size:10px; font-weight:500">
                                                <?php echo app('translator')->get('university::un.academic'); ?> : <?php $__currentLoopData = $staff_student->studentRecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($record->unAcademic->name); ?> ,
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </h3>
                                        </div>
                                        <?php endif; ?>

                                        <?php if($id_card->un_semester == 1): ?>
                                        <div id="hSemester">
                                            <h3
                                                style="line-height:1.02; margin-top: 0; margin-bottom: 3px; font-size:10px; font-weight:500">
                                                <?php echo app('translator')->get('university::un.semester'); ?> : <?php $__currentLoopData = $staff_student->studentRecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($record->unSemester->name); ?> ,
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </h3>
                                        </div>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="card_text_head hStudentName"
                                    style="line-height:1.02; display: flex; align-items: center; justify-content: space-between; width: 100%; margin-bottom:10px">
                                    <div class="card_text_left">
                                        <?php if($id_card->father_name == 1): ?>
                                        <div id="hFatherName">
                                            <h4
                                                style="line-height:1.02; margin-top: 0; margin-bottom: 3px; font-size:10px; font-weight:500">
                                                <?php echo app('translator')->get('student.father_name'); ?> :<?php if($role_id == 2): ?>
                                                <?php echo e(@$staff_student->parents != '' ? @$staff_student->parents->fathers_name : ''); ?>

                                                <?php else: ?>
                                                <?php echo e($staff_student->fathers_name); ?>

                                                <?php endif; ?>
                                            </h4>
                                        </div>
                                        <?php endif; ?>
                                        <?php if($id_card->mother_name == 1): ?>
                                        <div id="hMotherName">
                                            <h4
                                                style="line-height:1.02; margin-top: 0; margin-bottom: 0; font-size:10px; font-weight:500">
                                                <?php echo app('translator')->get('student.mother_name'); ?> :<?php if($role_id == 2): ?>
                                                <?php echo e(@$staff_student->parents != '' ? @$staff_student->parents->mothers_name : ''); ?>

                                                <?php else: ?>
                                                <?php echo e($staff_student->mothers_name); ?>

                                                <?php endif; ?>
                                            </h4>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="card_text_head "
                                    style="line-height:1.02; display: flex; align-items: center; justify-content: space-between; width: 100%; margin-bottom:10px">
                                    <div class="card_text_left">
                                        <?php if($id_card->dob == 1): ?>
                                        <div id="hDob">
                                            <h3
                                                style="line-height:1.02; margin-top: 0; margin-bottom: 3px; font-size:10px; font-weight:500">
                                                <?php echo app('translator')->get('common.date_of_birth'); ?> :
                                                <?php echo e(@dateConvert($staff_student->date_of_birth)); ?></h3>
                                        </div>
                                        <?php endif; ?>
                                        <?php if($id_card->blood == 1 && $role_id == 2): ?>
                                        <div id="hBloodGroup">
                                            <h3
                                                style="line-height:1.02; margin-top: 0; margin-bottom: 3px; font-size:10px; font-weight:500">
                                                <?php echo app('translator')->get('student.blood_group'); ?> :
                                                <?php echo e(@$staff_student->bloodGroup != '' ? @$staff_student->bloodGroup->base_setup_name : ''); ?>

                                            </h3>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="card_text_head "
                                    style="line-height:1.02; display: flex; align-items: center; justify-content: space-between; width: 100%; margin-top:5px">
                                    <?php if($id_card->student_address == 1): ?>
                                    <div class="card_text_left" id="hAddress">
                                        <h3
                                            style="line-height:1.02; margin-top: 0; margin-bottom: 5px; font-size:10px; font-weight:500; text-transform:uppercase">
                                            <?php echo e(@$staff_student->current_address != '' ? @$staff_student->current_address : ''); ?>

                                        </h3>
                                        <h4
                                            style="line-height:1.02; margin-top: 0; margin-bottom: 0; font-size:9px; text-transform: uppercase; font-weight:500">
                                            <?php echo app('translator')->get('common.address'); ?></h4>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="horizontal_card_footer" style="line-height:1.02; text-align: right;">
                            <div class="singnature_img signPhoto hSign"
                                style="background-image:url(<?php echo e($id_card->signature != '' ? asset($id_card->signature) : asset('public/backEnd/id_card/img/Signature.png')); ?>);line-height:1.02; width: 50px; flex: 50px 0 0; margin-left: auto; position: absolute; right: 10px; bottom: 7px;height: 25px; background-size: cover; background-repeat: no-repeat; background-position: center center;">
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            
                <?php if($id_card->page_layout_style == 'vertical'): ?>
                <div id="vertical"
                    style="margin: 0; padding: 0; font-family: 'Poppins', sans-serif;  font-size: 12px; line-height:1.02 ;">
                    <div class="vertical__card"
                        style="line-height:1.02; background-image: url(<?php echo e(@$id_card->background_img != '' ? asset(@$id_card->background_img) : asset('public/backEnd/id_card/img/horizontal_bg.png')); ?>); width: <?php echo e(!empty($id_card->pl_width) ? $id_card->pl_width : 86); ?>mm; height: <?php echo e(!empty($id_card->pl_height) ? $id_card->pl_height : 54); ?>mm; margin: auto; background-size: 100% 100%; background-position: center center; position: relative;">
                        <div class="horizontal_card_header"
                            style="line-height:1.02; display: flex; align-items:center; justify-content:space-between; padding: 12px">
                            <div class="logo__img logoImage vLogo"
                                style="line-height:1.02; width: 80px; background-image: url(<?php echo e($id_card->logo != '' ? asset($id_card->logo) : asset('public/backEnd/img/logo.png')); ?>);background-size: cover; height: 30px;background-position: center center; background-repeat: no-repeat;">
                            </div>
                        </div>
                        <div class="vertical_card_body"
                            style="line-height:1.02; display:flex; padding-top: <?php echo e(!empty($id_card->t_space) ? $id_card->t_space : 2.5); ?>mm; padding-bottom: <?php echo e(!empty($id_card->b_space) ? $id_card->b_space : 2.5); ?>mm; padding-right: <?php echo e(!empty($id_card->r_space) ? $id_card->r_space : 3); ?>mm ; padding-left: <?php echo e(!empty($id_card->l_space) ? $id_card->l_space : 3); ?>mm; align-items: center;">
                            <div class="thumb vSize vSizeX photo vImg vRoundImg"
                                style="
                                                        <?php if(@$id_card->user_photo_style == 'round'): ?> <?php echo e('border-radius : 50%;'); ?> <?php endif; ?>
                                                        background-image: url(
                                                            <?php if($role_id == 2): ?> <?php echo e(@$staff_student->student_photo != '' ? asset(@$staff_student->student_photo) : (@$id_card->profile_image != '' ? asset(@$id_card->profile_image) : asset('public/backEnd/id_card/img/thumb.png'))); ?>

                                                            <?php else: ?>
                                                                <?php echo e(@$staff_student->staff_photo != '' ? asset(@$staff_student->staff_photo) : (@$id_card->profile_image != '' ? asset(@$id_card->profile_image) : asset('public/backEnd/id_card/img/thumb.png'))); ?> <?php endif; ?>
                                                            ); line-height:1.02; width: <?php echo e(!empty($id_card->user_photo_width) ? $id_card->user_photo_width : 13.229166667); ?>mm; height: <?php echo e(!empty($id_card->user_photo_height) ? $id_card->user_photo_height : 13.229166667); ?>mm; flex-basis: <?php echo e(!empty($id_card->user_photo_width) ? $id_card->user_photo_width : 13.229166667); ?>mm; flex-grow: 0; flex-shrink: 0; margin-right: 20px; background-size: cover; background-position: center center;">
                            </div>
                            <div class="card_text"
                                style="line-height:1.02; display: flex; align-items: center; justify-content: space-between; width: 100%; flex-direction: column;">
                                <div class="card_text_head"
                                    style="line-height:1.02; display: flex; align-items: center; justify-content: space-between; width: 100%; margin-bottom:5px">
                                    <div class="card_text_left vId">
                                        <?php if($id_card->student_name == 1): ?>
                                        <div id="vName">
                                            <h3
                                                style="line-height:1.02; margin-top: 0; margin-bottom: 3px; font-size:11px; font-weight:600 ; text-transform: uppercase; color: #2656a6;">
                                                <?php echo e($staff_student->full_name); ?></h3>
                                        </div>
                                        <?php endif; ?>
                                        <?php if($id_card->admission_no == 1): ?>
                                        <div id="vAdmissionNumber">
                                            <?php if($role_id == 2): ?>
                                            <h4
                                                style="line-height:1.02; margin-top: 0; margin-bottom: 3px; font-size:10px;">
                                                <?php echo app('translator')->get('student.admission_no'); ?> : <?php echo e($staff_student->admission_no); ?>

                                            </h4>
                                            <?php else: ?>
                                            <h4
                                                style="line-height:1.02; margin-top: 0; margin-bottom: 3px; font-size:10px;">
                                                <?php echo app('translator')->get('hr.staff_id'); ?> : <?php echo e($staff_student->staff_no); ?></h4>
                                            <?php endif; ?>
                                        </div>
                                        <?php endif; ?>
                                        <?php if($id_card->class == 1 && $role_id == 2 && !moduleStatusCheck('University')): ?>
                                        <div id="vClass">
                                            <h4
                                                style="line-height:1.02; margin-top: 0; margin-bottom: 0; font-size:10px;">
                                                <?php echo app('translator')->get('common.class'); ?> :
                                                <?php $__currentLoopData = $staff_student->getClassRecord; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($record->class->class_name); ?>

                                                (<?php echo e($record->section->section_name); ?>)
                                                ,
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </h4>
                                        </div>
                                        <?php endif; ?>
                                        <?php if($role_id == 2 && moduleStatusCheck('University')): ?>
                                        <?php if($id_card->un_session == 1): ?>
                                        <div id="vSession">
                                            <h3
                                                style="line-height:1.02; margin-top: 0; margin-bottom: 0; font-size:10px;">
                                                <?php echo app('translator')->get('university::un.session'); ?> : <?php $__currentLoopData = $staff_student->studentRecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($record->unSession->name); ?> ,
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </h3>
                                        </div>
                                        <?php endif; ?>
                                        <?php if($id_card->un_faculty == 1): ?>
                                        <div id="vFaculty">
                                            <h3
                                                style="line-height:1.02; margin-top: 0; margin-bottom: 0; font-size:10px;">
                                                <?php echo app('translator')->get('university::un.faculty'); ?> : <?php $__currentLoopData = $staff_student->studentRecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($record->unFaculty->name); ?> ,
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </h3>
                                        </div>
                                        <?php endif; ?>
                                        <?php if($id_card->un_department == 1): ?>
                                        <div id="vDepartment">
                                            <h3
                                                style="line-height:1.02; margin-top: 0; margin-bottom: 0; font-size:10px;">
                                                <?php echo app('translator')->get('university::un.department'); ?> : <?php $__currentLoopData = $staff_student->studentRecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($record->unDepartment->name); ?> ,
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </h3>
                                        </div>
                                        <?php endif; ?>
                                        <?php if($id_card->un_academic == 1): ?>
                                        <div id="vAcademic">
                                            <h3
                                                style="line-height:1.02; margin-top: 0; margin-bottom: 0; font-size:10px;">
                                                <?php echo app('translator')->get('university::un.academic'); ?> : <?php $__currentLoopData = $staff_student->studentRecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($record->unAcademic->name); ?> ,
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </h3>
                                        </div>
                                        <?php endif; ?>

                                        <?php if($id_card->un_semester == 1): ?>
                                        <div id="vSemester">
                                            <h3
                                                style="line-height:1.02; margin-top: 0; margin-bottom: 0; font-size:10px;">
                                                <?php echo app('translator')->get('university::un.semester'); ?> : <?php $__currentLoopData = $staff_student->studentRecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($record->unSemester->name); ?> ,
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </h3>
                                        </div>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="card_text_right">
                                        </br>
                                        <?php if($id_card->dob == 1): ?>
                                        <div id="vDob">
                                            <h3
                                                style="line-height:1.02; margin-top: 0; margin-bottom: 3px; font-size:10px; font-weight:500;">
                                                <?php echo app('translator')->get('common.date_of_birth'); ?> :
                                                <?php echo e(@dateConvert($staff_student->date_of_birth)); ?></h3>
                                        </div>
                                        <?php endif; ?>
                                        <?php if($id_card->blood == 1 && $role_id == 2): ?>
                                        <div id="vBloodGroup">
                                            <h3
                                                style="line-height:1.02; margin-top: 0; margin-bottom: 3px; font-size:10px; font-weight:500;">
                                                <?php echo app('translator')->get('student.blood_group'); ?> :
                                                <?php echo e(@$staff_student->bloodGroup != '' ? @$staff_student->bloodGroup->base_setup_name : ''); ?>

                                            </h3>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="card_text_head vStudentName"
                                    style="line-height:1.02; display: flex; align-items: center; justify-content: space-between; width: 100%; margin-bottom:5px">
                                    <div class="card_text_left">
                                    </div>
                                </div>

                                <div class="card_text_head "
                                    style="line-height:1.02; display: flex; align-items: center; justify-content: space-between; width: 100%; margin-bottom:5px">
                                    <div class="card_text_left">
                                        <?php if($id_card->father_name == 1): ?>
                                        <div id="vFatherName">
                                            <h3
                                                style="line-height:1.02; margin-top: 0; margin-bottom: 3px; font-size:10px; font-weight:500">
                                                <?php echo app('translator')->get('student.father_name'); ?> :<?php if($role_id == 2): ?>
                                                <?php echo e(@$staff_student->parents != '' ? @$staff_student->parents->fathers_name : ''); ?>

                                                <?php else: ?>
                                                <?php echo e($staff_student->fathers_name); ?>

                                                <?php endif; ?>
                                            </h3>
                                        </div>
                                        <?php endif; ?>
                                        <?php if($id_card->mother_name == 1): ?>
                                        <div id="vMotherName">
                                            <h3
                                                style="line-height:1.02; margin-top: 0; margin-bottom: 3px; font-size:10px; font-weight:500">
                                                <?php echo app('translator')->get('student.mother_name'); ?> :<?php if($role_id == 2): ?>
                                                <?php echo e(@$staff_student->parents != '' ? @$staff_student->parents->mothers_name : ''); ?>

                                                <?php else: ?>
                                                <?php echo e($staff_student->mothers_name); ?>

                                                <?php endif; ?>
                                            </h3>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="card_text_right">

                                    </div>
                                </div>
                                <div class="card_text_head "
                                    style="line-height:1.02; display: flex; align-items: center; justify-content: space-between; width: 100%; margin-top:5px">
                                    <?php if($id_card->student_address == 1): ?>
                                    <div class="card_text_left vAddress">
                                        <h3
                                            style="line-height:1.02; margin-top: 0; margin-bottom: 5px; font-size:10px; font-weight:500; text-transform:uppercase;">
                                            <?php echo e(@$staff_student->current_address != '' ? @$staff_student->current_address : ''); ?>

                                        </h3>
                                        <h4
                                            style="line-height:1.02; margin-top: 0; margin-bottom: 0; font-size:9px; text-transform: uppercase; font-weight:500">
                                            <?php echo app('translator')->get('common.address'); ?></h4>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="horizontal_card_footer" style="line-height:1.02; text-align: right;">
                            <div class="singnature_img signPhoto vSign"
                                style="background-image: url(<?php echo e($id_card->signature != '' ? asset($id_card->signature) : asset('public/backEnd/id_card/img/Signature.png')); ?>); line-height:1.02; width: 50px; flex: 50px 0 0; margin-left: auto; position: absolute; right: 10px; bottom: 7px; height: 25px; background-size: cover; background-repeat: no-repeat; background-position: center center;">
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            <?php else: ?>
                <?php if($id_card->page_layout_style == 'horizontal'): ?>
                <div id="gHorizontal"
                    style="margin: 0; padding: 0; font-family: 'Poppins', sans-serif; font-weight: 500;  font-size: 12px; line-height:1.02 ; color: #000">
                    <div class="horizontal__card"
                        style="line-height:1.02; background-image: url(<?php echo e(@$id_card->background_img != '' ? asset(@$id_card->background_img) : asset('public/backEnd/id_card/img/vertical_bg.png')); ?>); width: <?php echo e(!empty($id_card->pl_width) ? $id_card->pl_width : 57.15); ?>mm; height: <?php echo e(!empty($id_card->pl_height) ? $id_card->pl_height : 88.89999999999999); ?>mm; margin: auto; background-size: 100% 100%; background-position: center center; position: relative; background-color: #fff;">
                        <div class="horizontal_card_header"
                            style="line-height:1.02; display: flex; align-items:center; justify-content:space-between; padding:8px 12px">
                            <div class="logo__img logoImage hLogo"
                                style="line-height:1.02; width: 80px; background-image: url(<?php echo e($id_card->logo != '' ? asset($id_card->logo) : asset('public/backEnd/img/logo.png')); ?>);height: 30px; background-size: cover; background-repeat: no-repeat; background-position: center center;">
                            </div>
                        </div>

                        <div class="horizontal_card_body"
                            style="line-height:1.02; display:block; padding-top:<?php echo e(!empty($id_card->t_space) ? $id_card->t_space : 2.5); ?>mm ; padding-bottom: <?php echo e(!empty($id_card->b_space) ? $id_card->b_space : 2.5); ?>mm ; padding-right: <?php echo e(!empty($id_card->r_space) ? $id_card->r_space : 3); ?>mm ; padding-left: <?php echo e(!empty($id_card->l_space) ? $id_card->l_space : 3); ?>mm; flex-direction: column;">
                            <div class="thumb hSize photo hImg hRoundImg"
                                style="
                                                        <?php if(@$id_card->user_photo_style == 'round'): ?> <?php echo e('border-radius : 50%;'); ?> <?php endif; ?>
                                                        background-image: url(<?php echo e(@$id_card->profile_image != '' ? asset(@$id_card->profile_image) : asset('public/backEnd/id_card/img/thumb.png')); ?>);background-size: cover; background-position: center center; background-repeat: no-repeat; line-height:1.02; flex: 80px 0 0; width: <?php echo e(!empty($id_card->user_photo_width) ? $id_card->user_photo_width : 21.166666667); ?>mm; flex: 80px 0 0; height: <?php echo e(!empty($id_card->user_photo_height) ? $id_card->user_photo_height : 21.166666667); ?>mm; margin: auto;border-radius: 50%; padding: 3px; align-content: center; justify-content: center; display: flex; border: 3px solid #fff;">
                            </div>
                            <div class="card_text"
                                style="line-height:1.02; display: flex; align-items: center; justify-content: space-between; width: 100%; flex-direction: column;">
                                <div class="card_text_head "
                                    style="line-height:1.02; display: flex; align-items: center; justify-content: space-between; width: 100%; margin-top:25px; margin-bottom:10px">
                                    <div class="card_text_left hId">
                                        <?php if($id_card->student_name == 1): ?>
                                        <div id="gHName">
                                            <h4
                                                style="line-height:1.02; margin-top: 0; margin-bottom: 0px; font-size:11px; font-weight:600 ; text-transform: uppercase; color: #2656a6;">
                                                <?php echo e($staff_student->guardians_name ? $staff_student->guardians_name :  $staff_student->father_name); ?></h4>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="card_text_head hStudentName"
                                    style="line-height:1.02; display: flex; align-items: center; justify-content: space-between; width: 100%; margin-bottom:10px">
                                    <div class="card_text_left">
                                        <?php if($id_card->phone_number == 1): ?>
                                        <div id="hPhoneNumber">
                                            <h4
                                                style="line-height:1.02; margin-top: 0; margin-bottom: 3px; font-size:10px; font-weight:500">
                                                <?php echo e($staff_student->guardians_mobile ? $staff_student->guardians_mobile :  $staff_student->fathers_mobile); ?></h4>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="card_text_head "
                                    style="line-height:1.02; display: flex; align-items: center; justify-content: space-between; width: 100%; margin-bottom:10px">
                                    <div class="child__thumbs"
                                        style="display:flex; align-items: center; margin: 15px 0 20px 0; display: flex;
                                                                    align-items: flex-start;
                                                                    margin: 15px 0 2px 0;
                                                                    justify-content: space-between;">

                                        <?php
                                                                $studentInfos= App\SmStudentIdCard::studentName($staff_student->id);
                                                            ?>
                                                            <?php $__currentLoopData = $studentInfos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $studentInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="single__child" style="text-align: center; flex: 45px 0 0;">
                                                                    <div class="single__child__thumb" style=" background-image: url(<?php echo e(@$studentInfo->student_photo != "" ? asset(@$studentInfo->student_photo) : asset('public/backEnd/id_card/img/thumb.png')); ?>);background-size: cover; background-position: center center; background-repeat: no-repeat; line-height:1.02; width: 45px;
                                                                    flex: 45px 0 0;
                                                                    height: 46px; margin: auto;border-radius: 50%; padding: 3px; align-content: center; justify-content: center; display: flex; border: 3px solid #fff;">
                                                                    </div>
                                                                    <p style="font-size:12px; font-weight:400"><?php echo e($studentInfo->full_name); ?></p>
                                                                </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        
                                    </div>
                                </div>
                                <div class="card_text_head "
                                    style="line-height:1.02; display: flex; align-items: center; justify-content: space-between; width: 100%; margin-top:5px">
                                    <?php if($id_card->student_address == 1): ?>
                                    <div class="card_text_left" id="gHAddress">
                                        <h3
                                            style="line-height:1.02; margin-top: 0; margin-bottom: 5px; font-size:10px; font-weight:500; text-transform:uppercase">
                                            <?php echo e(generalSetting()->address); ?></h3>
                                        <h4
                                            style="line-height:1.02; margin-top: 0; margin-bottom: 0; font-size:9px; text-transform: uppercase; font-weight:500">
                                            <?php echo app('translator')->get('common.address'); ?></h4>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="horizontal_card_footer" style="line-height:1.02; text-align: right;">
                            <div class="singnature_img signPhoto hSign"
                                style="background-image:url('<?php echo e(asset('public/backEnd/id_card/img/Signature.png')); ?>');line-height:1.02; width: 50px; flex: 50px 0 0; margin-left: auto; position: absolute; right: 10px; bottom: 7px;height: 25px; background-size: cover; background-repeat: no-repeat; background-position: center center;">
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php if($id_card->page_layout_style == 'vertical'): ?>
                <div id="gVertical"
                    style="margin: 0; padding: 0; font-family: 'Poppins', sans-serif;  font-size: 12px; line-height:1.02 ;">
                    <div class="vertical__card"
                        style="line-height:1.02; background-image: url(<?php echo e(@$id_card->background_img != '' ? asset(@$id_card->background_img) : asset('public/backEnd/id_card/img/horizontal_bg.png')); ?>); width: <?php echo e(!empty($id_card->pl_width) ? $id_card->pl_width : 86); ?>mm; height: <?php echo e(!empty($id_card->pl_height) ? $id_card->pl_height : 54); ?>mm; margin: auto; background-size: 100% 100%; background-position: center center; position: relative;">
                        <div class="horizontal_card_header"
                            style="line-height:1.02; display: flex; align-items:center; justify-content:space-between; padding: 12px">
                            <div class="logo__img logoImage vLogo"
                                style="line-height:1.02; width: 80px; background-image: url(<?php echo e($id_card->logo != '' ? asset($id_card->logo) : asset('public/backEnd/img/logo.png')); ?>);background-size: cover; height: 30px;background-position: center center; background-repeat: no-repeat;">
                            </div>
                        </div>
                        <div class="vertical_card_body"
                            style="line-height:1.02; display:flex; padding-top:<?php echo e(!empty($id_card->t_space) ? $id_card->t_space : 2.5); ?>mm ; padding-bottom: <?php echo e(!empty($id_card->b_space) ? $id_card->b_space : 2.5); ?>mm ; padding-right: <?php echo e(!empty($id_card->r_space) ? $id_card->r_space : 3); ?>mm ; padding-left: <?php echo e(!empty($id_card->l_space) ? $id_card->l_space : 3); ?>mm; align-items: center;">
                            <div class="thumb vSize vSizeX photo vImg vRoundImg"
                                style="
                                                        <?php if(@$id_card->user_photo_style == 'round'): ?> <?php echo e('border-radius : 50%;'); ?> <?php endif; ?>
                                                        background-image: url(<?php echo e(@$id_card->profile_image != '' ? asset(@$id_card->profile_image) : asset('public/backEnd/id_card/img/thumb.png')); ?>); line-height:1.02; width: <?php echo e(!empty($id_card->user_photo_width) ? $id_card->user_photo_width : 21.166666667); ?>mm; height: <?php echo e(!empty($id_card->user_photo_height) ? $id_card->user_photo_height : 21.166666667); ?>mm; flex-basis: <?php echo e(!empty($id_card->user_photo_width) ? $id_card->user_photo_width : 13.229166667); ?>mm; background-size: cover; background-position: center center; background-repeat: no-repeat; flex: 80px 0 0; margin: auto; padding: 3px; align-content: center; justify-content: center; display: flex; border: 3px solid #fff;">
                            </div>
                            <div class="card_text"
                                style="line-height:1.02; display: flex; align-items: center; justify-content: space-between; width: 100%; flex-direction: column;">
                                <div class="card_text_head "
                                    style="line-height:1.02; display: flex; align-items: center; justify-content: space-between; width: 100%; margin-bottom:0px">
                                    <div class="card_text_left vId">
                                        <?php if($id_card->student_name == 1): ?>
                                        <div id="gVName">
                                            <h3
                                                style="line-height:1.02; margin-top: 0; margin-bottom: 3px; font-size:11px; font-weight:600 ; text-transform: uppercase; color: #2656a6;">
                                                <?php echo e($staff_student->guardians_name); ?></h3>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="card_text_right">
                                        </br>
                                        <?php if($id_card->phone_number == 1): ?>
                                        <div id="gVAddress">
                                            <h3
                                                style="line-height:1.02; margin-top: 0; margin-bottom: 3px; font-size:10px; font-weight:500;">
                                                <?php echo app('translator')->get('common.phone'); ?> : <?php echo e($staff_student->guardians_mobile); ?>

                                            </h3>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php
                                $studentInfos = App\SmStudentIdCard::studentName($staff_student->id);
                                ?>
                                <div class="child__thumbs"
                                    style="display:flex; align-items: center; margin:  0px 0 0px 0; display: flex;
                                                                align-items: flex-start;
                                                                margin: 0px 0 0px 0;
                                                                justify-content: start;">
                                    <?php $__currentLoopData = $studentInfos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $studentInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="single__child" style="text-align: center; flex: 75px 0 0; ">
                                        <div class="single__child__thumb"
                                            style=" background-image: url(<?php echo e(@$studentInfo->student_photo != '' ? asset(@$studentInfo->student_photo) : asset('public/backEnd/id_card/img/thumb.png')); ?>);background-size: cover; background-position: center center; background-repeat: no-repeat; line-height:1.02; width: 45px;
                                                                        flex: 45px 0 0;
                                                                        height: 46px; margin: auto;border-radius: 50%; padding: 3px; align-content: center; justify-content: center; display: flex; border: 3px solid #fff;">
                                        </div>
                                        <p style="font-size:12px; font-weight:400; margin-bottom: 0;">
                                            <?php echo e($studentInfo->full_name); ?></p>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                                <div class="card_text_head "
                                    style="line-height:1.02; display: flex; align-items: center; justify-content: space-between; width: 100%; margin-top:5px">
                                    <?php if($id_card->student_address == 1): ?>
                                    <div class="card_text_left gVAddress">
                                        <h3
                                            style="line-height:1.02; margin-top: 0; margin-bottom: 5px; font-size:10px; font-weight:500; text-transform:uppercase;">
                                            Al Khuwair, Muscat, Oman </h3>
                                        <h4
                                            style="line-height:1.02; margin-top: 0; margin-bottom: 0; font-size:9px; text-transform: uppercase; font-weight:500">
                                            Address</h4>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="horizontal_card_footer" style="line-height:1.02; text-align: right;">
                            <div class="singnature_img signPhoto vSign"
                                style="background-image: url(<?php echo e($id_card->signature != '' ? asset($id_card->signature) : asset('public/backEnd/id_card/img/Signature.png')); ?>); line-height:1.02; width: 50px; flex: 50px 0 0; margin-left: auto; position: absolute; right: 10px; bottom: 7px; height: 25px; background-size: cover; background-repeat: no-repeat; background-position: center center;">
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/jquery-3.2.1.min.js"></script>
    <script>
        function printDiv(divName) {
            document.getElementById("button").remove();
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
</body>

</html><?php /**PATH C:\xampp\htdocs\Modules\BulkPrint\Resources\views\admin\id_card_bulk_print.blade.php ENDPATH**/ ?>
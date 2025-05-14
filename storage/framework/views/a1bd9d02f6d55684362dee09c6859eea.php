<?php $__env->startSection('title'); ?>
    <?php if(isset($certificate)): ?>
        <?php echo app('translator')->get('admin.edit_certificate'); ?>
    <?php else: ?>
        <?php echo app('translator')->get('admin.create_certificate'); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
    <style>
        .user_id_card_header {
            padding: 10px;
            background: var(--primary-color);
        }

        .user_id_card_header h4 {
            font-size: 18px;
            font-weight: 500;
            text-align: center;
            margin-bottom: 0;
            color: #fff;
        }

        #showCertificatePreview img{
            width: 100% !important;
        }

        .certificate_box_wrapper {
            background-image: url(./img/bg.jpg);
            width: 165.1mm;
            min-height: 144.19791667mm;
            /* display: flex; */
            justify-content: center;
            margin: auto;
            padding: 70px 0 70px 0;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            padding-top: 5mm;
            padding-left: 5mm;
            padding-right: 5mm;
            padding-bottom: 5mm;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20 up_breadcrumb">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1>
                    <?php if(isset($certificate)): ?>
                        <?php echo app('translator')->get('admin.edit_certificate'); ?>
                    <?php else: ?>
                        <?php echo app('translator')->get('admin.create_certificate'); ?>
                    <?php endif; ?>
                </h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('admin.admin_section'); ?></a>
                    <a href="<?php echo e(route('certificate')); ?>"><?php echo app('translator')->get('admin.certificate'); ?></a>
                    <a href="#">
                        <?php if(isset($certificate)): ?>
                            <?php echo app('translator')->get('admin.edit_certificate'); ?>
                        <?php else: ?>
                            <?php echo app('translator')->get('admin.create_certificate'); ?>
                        <?php endif; ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <?php if(isset($certificate)): ?>
                <div class="row">
                    <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                        <a href="<?php echo e(route('create-certificate')); ?>" class="primary-btn small fix-gr-bg">
                            <span class="ti-plus pr-2"></span>
                                <?php echo app('translator')->get('admin.create_certificate'); ?>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-title">
                                <h3 class="mb-30">
                                    <?php if(isset($certificate)): ?>
                                        <?php echo app('translator')->get('admin.edit_certificate'); ?>
                                    <?php else: ?>
                                        <?php echo app('translator')->get('admin.create_certificate'); ?>
                                    <?php endif; ?>
                                </h3>
                            </div>
                            <?php if(isset($certificate)): ?>
                                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'student-certificate-update', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                                <input type="hidden" name="id" value="<?php echo e($certificate->id); ?>">
                            <?php else: ?>
                                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'student-certificate-store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                            <?php endif; ?>

                            <div class="white-box">
                                <div class="add-visitor">
                                    <?php if(moduleStatusCheck('Lms')== True): ?>
                                        <div class="row mb-25">
                                            <div class="col-lg-12">
                                                <div class="primary_input">
                                                    <select class="primary_select  form-control<?php echo e($errors->has('type') ? ' is-invalid' : ''); ?>" name="type" id="lmsCertificateType">
                                                        <option data-display="<?php echo app('translator')->get('admin.certificate'); ?> <?php echo app('translator')->get('admin.type'); ?>*" value=""><?php echo app('translator')->get('admin.certificate'); ?> <?php echo app('translator')->get('common.select'); ?>*</option>
                                                        <option value="School" <?php echo e(isset($certificate)? ($certificate->type =="School" ?'selected':''): (old('type') == 'School' ? 'selected' : '')); ?>><?php echo app('translator')->get('common.school'); ?></option>
                                                        <option value="Lms" <?php echo e(isset($certificate)? ($certificate->type =="Lms" ?'selected':''): (old('type') == 'Lms' ? 'selected' : '')); ?>><?php echo app('translator')->get('lms::lms.lms'); ?></option>
                                                    </select>
                                                    
                                                    <?php if($errors->has('type')): ?>
                                                        <span class="text-danger invalid-select" role="alert">
                                                            <?php echo e($errors->first('type')); ?>

                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <input type="hidden" name="type" value="School">
                                    <?php endif; ?>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <input class="primary_input_field "
                                                    type="text" name="title" autocomplete="off" value="<?php echo e(isset($certificate)? $certificate->title: old('title')); ?>" id="certificateTitle">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.certificate_title'); ?> <span class="text-danger"> *</span></label>
                                                
                                                <?php if($errors->has('title')): ?>
                                                <span class="text-danger" >
                                                    <?php echo e($errors->first('title')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-25">
                                        <div class="col-lg-6">
                                            <div class="primary_input">
                                                <input class="primary_input_field form-control<?php echo e($errors->has('background_height') ? ' is-invalid' : ''); ?>"
                                                    type="text" name="background_height" autocomplete="off" value="<?php echo e(isset($certificate)? $certificate->background_height:144); ?>" id="bgHeight">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.certificate_height'); ?> (mm) <span class="text-danger"> *</span></label>
                                                
                                                <?php if($errors->has('background_height')): ?>
                                                <span class="text-danger" >
                                                    <?php echo e($errors->first('background_height')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="primary_input">
                                                <input class="primary_input_field form-control<?php echo e($errors->has('background_width') ? ' is-invalid' : ''); ?>"
                                                    type="text" name="background_width" autocomplete="off" value="<?php echo e(isset($certificate)?$certificate->background_width:165); ?>" id="bgwidth">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.certificate_weight'); ?> (mm) <span class="text-danger"> *</span></label>
                                                
                                                <?php if($errors->has('background_width')): ?>
                                                <span class="text-danger" >
                                                    <?php echo e($errors->first('background_width')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-25">
                                        <div class="col-lg-3">
                                            <div class="primary_input">
                                                <input class="primary_input_field form-control<?php echo e($errors->has('padding_top') ? ' is-invalid' : ''); ?>"
                                                    type="text" name="padding_top" autocomplete="off" value="<?php echo e(isset($certificate)? $certificate->padding_top: old('padding_top', 5)); ?>" id="paddingTop">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.padding_top'); ?> (mm)</label>
                                                
                                                <?php if($errors->has('padding_top')): ?>
                                                <span class="text-danger" >
                                                    <?php echo e($errors->first('padding_top')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="primary_input">
                                                <input class="primary_input_field form-control<?php echo e($errors->has('padding_right') ? ' is-invalid' : ''); ?>"
                                                    type="text" name="padding_right" autocomplete="off" value="<?php echo e(isset($certificate)? $certificate->padding_right: old('padding_right', 5)); ?>" id="paddingRight">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.padding_right'); ?> (mm)</label>
                                                
                                                <?php if($errors->has('padding_right')): ?>
                                                <span class="text-danger" >
                                                    <?php echo e($errors->first('padding_right')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="primary_input">
                                                <input class="primary_input_field form-control<?php echo e($errors->has('padding_bottom') ? ' is-invalid' : ''); ?>"
                                                    type="text" name="padding_bottom" autocomplete="off" value="<?php echo e(isset($certificate)? $certificate->padding_bottom: old('padding_bottom', 5)); ?>" id="paddingBottom">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.padding_bottom'); ?> (mm)</label>
                                                
                                                <?php if($errors->has('padding_bottom')): ?>
                                                <span class="text-danger" >
                                                    <?php echo e($errors->first('padding_bottom')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="primary_input">
                                                <input class="primary_input_field form-control<?php echo e($errors->has('pading_left') ? ' is-invalid' : ''); ?>"
                                                    type="text" name="pading_left" autocomplete="off" value="<?php echo e(isset($certificate)? $certificate->pading_left: old('pading_left', 5)); ?>" id="paddingLeft">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.pading_left'); ?> (mm)</label>
                                                
                                                <?php if($errors->has('pading_left')): ?>
                                                <span class="text-danger" >
                                                    <?php echo e($errors->first('pading_left')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                            
                                    <div class="d-flex mt-25">
                                        <div class="row flex-grow-1 d-flex justify-content-between input-right-icon no-gutters">
                                            <div class="col">
                                                <div class="primary_input">
                                                    <input class="primary_input_field form-control<?php echo e($errors->has('background_image') ? ' is-invalid' : ''); ?>" type="text" id="certificateBackgroundImage" placeholder="<?php echo e(isset($certificate)? ($certificate->background_image != ""? getFilePath3($certificate->background_image): trans('admin.background_image')):trans('admin.background_image')); ?>"
                                                        readonly>
                                                    
                                                    <?php if($errors->has('background_image')): ?>
                                                    <span class="text-danger" >
                                                        <?php echo e($errors->first('background_image')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <button class="primary-btn-small-input cust-margin" type="button">
                                                    <label class="primary-btn small fix-gr-bg" for="certificateBackGroundImage"><?php echo app('translator')->get('common.browse'); ?></label>
                                                    <input type="file" class="d-none" name="background_image" id="certificateBackGroundImage" onchange="certificateBackground(this)" value="<?php echo e(isset($certificate)? ($certificate->background_image != ""? getFilePath3($certificate->background_image):''): ''); ?>">
                                                </button>
                                            </div>
                                        </div>
                                        <button class="primary-btn icon-only fix-gr-bg ml-2" type="button" id="deleteCertificate">
                                            <span class="ti-trash"></span>
                                        </button>
                                    </div>
                            
                                    <div class="row mt-25 applicable_user">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <select class="primary_select  form-control<?php echo e($errors->has('applicable_user') ? ' is-invalid' : ''); ?>" name="applicable_user" id="applicableUser">
                                                    <option data-display="<?php echo app('translator')->get('admin.applicable_user'); ?> *" value=""><?php echo app('translator')->get('common.select'); ?>*</option>
                                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($role->id); ?>" <?php echo e(isset($certificate) && $certificate->role  == $role->id? 'selected':''); ?>><?php echo e($role->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                
                                                <?php if($errors->has('applicable_user')): ?>
                                                    <span class="text-danger invalid-select" role="alert">
                                                        <?php echo e($errors->first('applicable_user')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-25">
                                        <div class="col-lg-12">
                                            <div class="primary_input mt-20">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('communicate.body'); ?><span class="text-danger"> *</span></label>
                                                    <textarea class="primary_input_field summer_note form-control<?php echo e($errors->has('body') ? ' is-invalid' : ''); ?>" cols="0" rows="4" name="body" maxlength="500">
                                                        <?php echo e(isset($certificate)? $certificate->body: old('body')); ?>

                                                    </textarea>
                                                
                                                <?php if($errors->has('body')): ?>
                                                    <span class="error text-danger"><?php echo e($errors->first('body')); ?></strong></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-40">
                                        <div class="col-lg-12 studentVariable d-none">
                                            <h4>
                                                <strong><?php echo app('translator')->get('communicate.variables'); ?> :</strong>
                                                <span class="text-primary">
                                                    <?php if(moduleStatusCheck('University')): ?>
                                                    [name] [date_of_birth] [present_address] [guardian] [created_at]
                                                    [admission_no] [roll_no] [faculty] [session] [department] [academic] [semester] [semester_label]  [gender] [admission_date]
                                                    [category] [cast] [father_name] [mother_name] [religion] [email] [phone]
                                                    <?php else: ?>
                                                    [name] [date_of_birth] [present_address] [guardian] [created_at]
                                                    [admission_no] [roll_no] [class] [section] [gender] [admission_date]
                                                    [category] [cast] [father_name] [mother_name] [religion] [email] [phone],
                                                    <?php endif; ?>

                                                    </br>
                                                    <?php echo app('translator')->get('admin.use'); ?> [profile_image] <?php echo app('translator')->get('admin.variable_for_showing_static_profile_image'); ?>
                                                </span>
                                            </h4>
                                        </div>

                                        <div class="col-lg-12 parentVariable d-none">
                                            <h4>
                                                <strong><?php echo app('translator')->get('communicate.variables'); ?> :</strong>
                                                <span class="text-primary">
                                                    [parent_name] [parent_mobile] [parent_email] [parent_occupation] [parent_address], 
                                                    </br>
                                                    <?php echo app('translator')->get('admin.use'); ?> [profile_image] <?php echo app('translator')->get('admin.variable_for_showing_static_profile_image'); ?>
                                                </span>
                                            </h4>
                                        </div>

                                        <div class="col-lg-12 staffVariable d-none">
                                            <h4>
                                                <strong><?php echo app('translator')->get('communicate.variables'); ?> :</strong>
                                                <span class="text-primary">
                                                    [staff_name] [dob] [present_address] [date_of_joining] [email] [mobile] [qualification]
                                                    [experience], 
                                                    </br>
                                                    <?php echo app('translator')->get('admin.use'); ?> [profile_image] <?php echo app('translator')->get('admin.variable_for_showing_static_profile_image'); ?>
                                                </span>
                                            </h4>
                                        </div>

                                        <div class="col-lg-12 lmsVariable d-none">
                                            <h4>
                                                <strong><?php echo app('translator')->get('communicate.variables'); ?> :</strong>
                                                <span class="text-primary">
                                                    [student_name] [course_name] [course_complete_date],
                                                </br>
                                                    <?php echo app('translator')->get('admin.use'); ?> [profile_image] <?php echo app('translator')->get('admin.variable_for_showing_static_profile_image'); ?>
                                                </span>
                                            </h4>
                                        </div>
                                    </div>

                                    <div class="row mt-40">
                                        <div class="col-lg-12 text-center">
                                            <button class="primary-btn fix-gr-bg submit savaIdCard" type="submit">
                                                <span class="ti-check"></span>
                                                <?php if(isset($id_card)): ?>
                                                    <?php echo app('translator')->get('common.update'); ?>
                                                <?php else: ?>
                                                    <?php echo app('translator')->get('common.save'); ?>
                                                <?php endif; ?>
                                            <?php echo app('translator')->get('admin.certificate'); ?>
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
                                <h3 class="mb-0"><?php echo app('translator')->get('admin.preview_cretificate'); ?> </h3>
                            </div>
                        </div>
                    </div>
                    <div class="sticky_card">
                        <div class="user_id_card_header mt-30">
                            <h4 id="showCertificateTitle"><?php echo app('translator')->get('admin.certificate_title'); ?></h4>
                        </div>
                        <div class="mt-10">
                            <div class="certificate_box_wrapper" id='showCertificatePreview' style="background-image: url('<?php echo e(isset($certificate)? asset($certificate->background_image): ''); ?>');">
                                <?php echo isset($certificate)? $certificate->body: ''; ?>

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

            let getTitleValue = $('#certificateTitle').val();
            let getBgHeight = $('#bgHeight').val();
            let getBbgWidth = $('#bgwidth').val();
            let getApplicableUser = $('#applicableUser').val();
            let getLmsCertificate = $('#lmsCertificateType').val();
            let getPaddingTop = $('#paddingTop').val();
            let getPaddingRight = $('#paddingRight').val();
            let getPaddingLeft = $('#paddingLeft').val();
            let getPaddingBottom = $('#paddingBottom').val();
            
            if(getTitleValue){
                showTitleValue(getTitleValue);
            }

            showbgHeight(getBgHeight);
            showbgwidth(getBbgWidth);
            showApplicableUser(getApplicableUser);
            showLmsCertificate(getLmsCertificate);
            showPaddingTop(getPaddingTop);
            showPaddingRight(getPaddingRight);
            showPaddingLeft(getPaddingLeft);
            showgPaddingBottom(getPaddingBottom);

            $(document).on("keyup", "#certificateTitle", function(event) {
                showTitleValue($(this).val());
            });

            $(document).on("keyup", "#bgHeight", function(event) {
                showbgHeight($(this).val());
            });

            $(document).on("keyup", "#bgwidth", function(event) {
                showbgwidth($(this).val());
            });

            $(document).on("change", "#applicableUser", function(event) {
                showApplicableUser($(this).val());
            });

            $(document).on("change", "#lmsCertificateType", function(event) {
                showLmsCertificate($(this).val());
            });

            $(document).on("keyup", "#paddingTop", function(event) {
                showPaddingTop($(this).val());
            });

            $(document).on("keyup", "#paddingRight", function(event) {
                showPaddingRight($(this).val());
            });

            $(document).on("keyup", "#paddingLeft", function(event) {
                showPaddingLeft($(this).val());
            });

            $(document).on("keyup", "#paddingBottom", function(event) {
                showgPaddingBottom($(this).val());
            });
        });

        function showTitleValue(titleValuePass){
            $("#showCertificateTitle").html(titleValuePass);
        }

        function showbgHeight(bgHeightPass){
            $(".certificate_box_wrapper").css({"height": bgHeightPass + "mm"});
        }

        function showbgwidth(bgWidthPass){
            $(".certificate_box_wrapper").css({"width": bgWidthPass + "mm"});
        }

        function showPaddingTop(paddingTopPass){
            $(".certificate_box_wrapper").css({"padding-top": paddingTopPass + "mm"});
        }

        function showPaddingRight(paddingRightPass){
            $(".certificate_box_wrapper").css({"padding-right": paddingRightPass + "mm"});
        }

        function showPaddingLeft(paddingLeftPass){
            $(".certificate_box_wrapper").css({"padding-left": paddingLeftPass + "mm"});
        }

        function showgPaddingBottom(paddingBottomPass){
            $(".certificate_box_wrapper").css({"padding-bottom": paddingBottomPass + "mm"});
        }

        function showApplicableUser(applicableUserPass){
            if(applicableUserPass == 2){
                $('.studentVariable').removeClass('d-none');
                $('.parentVariable').addClass('d-none');
                $('.staffVariable').addClass('d-none');
            }else if(applicableUserPass == 3){
                $('.studentVariable').addClass('d-none');
                $('.parentVariable').removeClass('d-none');
                $('.staffVariable').addClass('d-none');
            }else if (applicableUserPass != 2 && applicableUserPass!= 3){
                $('.studentVariable').addClass('d-none');
                $('.parentVariable').addClass('d-none');
                $('.staffVariable').removeClass('d-none');
            }
        }

        function showLmsCertificate(lmsCertificatePass){
            if(lmsCertificatePass == "Lms"){
                $('.studentVariable').addClass('d-none');
                $('.lmsVariable').removeClass('d-none');
                $('.applicable_user').addClass('d-none');
                $('.parentVariable').addClass('d-none');
                $('.staffVariable').addClass('d-none');
            }else{
                $('.studentVariable').removeClass('d-none');
                $('.lmsVariable').addClass('d-none');
                $('.applicable_user').removeClass('d-none');
            }
        }

        function certificateBackground(input, srcBack) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.certificate_box_wrapper').css('background-image', 'url(' + e.target.result +')');
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(document).on("click", "#deleteCertificate", function(event) {
            $('#certificateBackgroundImage').removeAttr('placeholder');
            $('#certificateBackgroundImage').attr("placeholder", "<?php echo app('translator')->get('admin.background_image'); ?>");
            $('.certificate_box_wrapper').css('background-image', '');
        });

        $('.summer_note').summernote({
            tabsize: 2,
            height: 500,
            callbacks: {
            onChange: function(e) {
                    let string = $('.summer_note').val();
                    string = string.replace("[profile_image]", '<img src="http://localhost/lms/public/uploads/staff/demo/staff.jpg" height="165px" width="165px"> ');
                    $("#showCertificatePreview").html(string);
                }
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\admin\certificate\create_certificate.blade.php ENDPATH**/ ?>
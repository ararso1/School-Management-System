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
                    <label class="primary_input_label" for="">@lang('admin.id_card_title') <span class="text-danger">
                            *</span></label>
                    <input class="primary_input_field form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                        type="text" name="title" autocomplete="off"
                        value="{{ isset($id_card) ? $id_card->title : old('title') }}" id="title">


                    @if ($errors->has('title'))
                        <span class="text-danger">
                            {{ $errors->first('title') }}
                        </span>
                    @endif
                </div>

            </div>
        </div>

        @php
            $designMode = old('design_mode', isset($id_card) ? ($id_card->design_mode ?? 'classic') : 'template');
            if (!class_exists(\App\Helpers\IdCardTemplateHelper::class)) {
                throw new \RuntimeException('Missing file: app/Helpers/IdCardTemplateHelper.php — upload it to the live server.');
            }
            $fieldPositions = \App\Helpers\IdCardTemplateHelper::positions($id_card ?? null);
        @endphp

        <div class="row mt-25">
            <div class="col-lg-6">
                <div class="primary_input">
                    <label class="primary_input_label" for="">Design Mode</label>
                    <select class="primary_select form-control" name="design_mode" id="designMode">
                        <option value="classic" {{ $designMode == 'classic' ? 'selected' : '' }}>Classic Layout</option>
                        <option value="template" {{ $designMode == 'template' ? 'selected' : '' }}>Front & Back Template</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="primary_input">
                    <label class="primary_input_label" for="">@lang('admin.layout')</label>
                    <select class="primary_select  form-control{{ $errors->has('page_layout_style') ? ' is-invalid' : '' }}" name="page_layout_style" id="pageLayoutStyle">
                        <option value="horizontal" {{isset($id_card)? ($id_card->page_layout_style == "horizontal"? 'selected':''):''}}>@lang('admin.vertical')</option>
                        <option value="vertical" {{isset($id_card)? ($id_card->page_layout_style == "vertical"? 'selected': (old('page_layout_style')=='vertical'?'selected':'')) : 'selected'}}>@lang('admin.horizontal')</option>
                    </select>

                    @if ($errors->has('page_layout_style'))
                        <span class="text-danger invalid-select" role="alert">
                            {{ $errors->first('page_layout_style') }}
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="d-flex mt-25">
            <div class="row flex-grow-1 d-flex justify-content-between input-right-icon">
                <div class="col">
                    <div class="primary_input">
                        <label class="primary_input_label" for="">Front Background Image</label>
                        <input
                            class="primary_input_field form-control{{ $errors->has('background_img') ? ' is-invalid' : '' }}"
                            type="text" id="placeholderFileFiveName"
                            placeholder="{{ isset($id_card) ? ($id_card->background_img != '' ? getFilePath3($id_card->background_img) : 'Front background') : 'Front background' }}"
                            readonly>

                        @if ($errors->has('background_img'))
                            <span class="text-danger">
                                {{ $errors->first('background_img') }}
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-auto mt-30">
                    <button class="primary-btn-small-input cust-margin id_card_button" type="button">
                        <label class="primary-btn small fix-gr-bg" for="document_file_5">@lang('common.browse')</label>
                        <input type="file" class="d-none" name="background_img" id="document_file_5"
                            onchange="imageChangeWithBackFile(this); if(this.files&&this.files[0]){document.getElementById('placeholderFileFiveName').placeholder=this.files[0].name;}"
                            value="{{ isset($id_card) ? ($id_card->background_img != '' ? getFilePath3($id_card->background_img) : '') : '' }}">
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
                            placeholder="{{ isset($id_card) && $id_card->background_img_back ? getFilePath3($id_card->background_img_back) : 'Back background' }}"
                            readonly>
                    </div>
                </div>
                <div class="col-auto mt-30">
                    <button class="primary-btn-small-input cust-margin id_card_button" type="button">
                        <label class="primary-btn small fix-gr-bg" for="document_file_back_side">@lang('common.browse')</label>
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
                        value="{{ old('font_family', isset($id_card) ? ($id_card->font_family ?: 'Segoe UI, Arial, sans-serif') : 'Segoe UI, Arial, sans-serif') }}">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="primary_input">
                    <label class="primary_input_label" for="">Font Color</label>
                    <input class="primary_input_field form-control" type="color" name="font_color"
                        value="{{ old('font_color', isset($id_card) ? ($id_card->font_color ?: '#111111') : '#111111') }}">
                </div>
            </div>
        </div>

        <div class="row mt-25">
            <div class="col-lg-12">
                <div class="primary_input">
                    <label class="primary_input_label" for="">@lang('admin.applicable_user')</label>
                    <select
                        class="primary_select  form-control{{ $errors->has('applicable_user') ? ' is-invalid' : '' }}"
                        name="applicable_user[]" id="applicableUser">
                        <option data-display="@lang('admin.applicable_user') *" value="">@lang('common.select')*</option>
                        @if (isset($id_card))
                            @php
                                $applicableUsers = json_decode($id_card->role_id);
                            @endphp
                            <option value="2" {{ in_array(2, $applicableUsers) ? 'selected' : '' }} selected>
                                @lang('admin.student')</option>
                            <option value="3" {{ in_array(3, $applicableUsers) ? 'selected' : '' }}>
                                @lang('admin.guardian')</option>
                            <option value="0"
                                @if (!in_array(3, $applicableUsers) && !in_array(2, $applicableUsers)) {{ 'selected' }} @endif>@lang('admin.staff')</option>
                        @else
                            <option value="2">@lang('admin.student')</option>
                            <option value="3">@lang('admin.guardian')</option>
                            <option value="0">@lang('admin.staff')</option>
                        @endif
                    </select>
                    <div class="text-danger" id="applicableUserError"></div>

                    @if ($errors->has('applicable_user'))
                        <span class="text-danger invalid-select" role="alert">
                            {{ $errors->first('applicable_user') }}
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div
            class="row mt-25 staffInfo 
            @if (isset($id_card)) @if (!in_array(3, $applicableUsers) && !in_array(2, $applicableUsers))
                    {{ 'd-block' }}
                @else
                    {{ 'd-none' }} @endif
                @else
                {{ 'd-none' }}
            @endif
            ">
            <div class="col-lg-12">
                <label class="primary_input_label" for="">@lang('admin.role')<span class="text-danger">*</span></label><br>
                @foreach ($roles as $role)
                    @if ($role->id != 2 && $role->id != 3)
                        <div class="primary_input">
                            <input type="checkbox" id="role_{{ @$role->id }}" class="common-checkbox" name="role[]" value="{{ @$role->id }}" {{ isset($id_card) ? (in_array($role->id, $applicableUsers) ? 'checked' : '') : '' }}>
                            <label for="role_{{ @$role->id }}">{{ @$role->name }}</label>
                        </div>
                    @endif
                @endforeach
                @if ($errors->has('section'))
                    <span class="text-danger">
                        {{ $errors->first('section') }}
                    </span>
                @endif

                
            </div>
        </div>

        <div class="row mt-25">
            <div class="col-lg-6">
                <div class="primary_input">
                    <label class="primary_input_label" for="">@lang('admin.page_layout_width') <span
                            id="pWidth">(@lang('admin.default') 57 mm)</span></label>
                    <input class="primary_input_field form-control{{ $errors->has('pl_width') ? ' is-invalid' : '' }}"
                        type="text" name="pl_width"
                        value="{{ isset($id_card) ? $id_card->pl_width : old('pl_width') }}" id="plWidth"
                        autocomplete="off">


                    @if ($errors->has('pl_width'))
                        <span class="text-danger">
                            {{ $errors->first('pl_width') }}
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-lg-6">
                <div class="primary_input">
                    <label class="primary_input_label" for="">@lang('admin.page_layout_height') <span
                            id="pHeight">(@lang('admin.default') 89 mm)</span></label>
                    <input class="primary_input_field form-control{{ $errors->has('pl_height') ? ' is-invalid' : '' }}"
                        type="text" name="pl_height"
                        value="{{ isset($id_card) ? $id_card->pl_height : old('pl_height') }}" id="plHeight"
                        autocomplete="off">


                    @if ($errors->has('pl_height'))
                        <span class="text-danger">
                            {{ $errors->first('pl_height') }}
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="d-flex mt-25">
            <div class="row flex-grow-1 d-flex justify-content-between input-right-icon">
                <div class="col">
                    <div class="primary_input">
                        <label class="primary_input_label" for="">@lang('admin.profile_image')</label>
                        <input
                            class="primary_input_field form-control{{ $errors->has('profile_image') ? ' is-invalid' : '' }}"
                            type="text" id="placeholderFileSixName"
                            placeholder="{{ isset($id_card) ? ($id_card->profile_image != '' ? getFilePath3($id_card->profile_image) : trans('admin.profile_image')) : trans('admin.profile_image') }}"
                            readonly>

                        @if ($errors->has('profile_image'))
                            <span class="text-danger">
                                {{ $errors->first('profile_image') }}
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-auto mt-30">
                    <button class="primary-btn-small-input cust-margin id_card_button" type="button">
                        <label class="primary-btn small fix-gr-bg" for="document_file_6">@lang('common.browse')</label>
                        <input type="file" class="d-none" name="profile_image" id="document_file_6"
                            onchange="imageChangeWithFile(this,'.photo')"
                            value="{{ isset($id_card) ? ($id_card->profile_image != '' ? getFilePath3($id_card->profile_image) : '') : '' }}">
                    </button>
                </div>
            </div>
            <button class="primary-btn icon-only fix-gr-bg id_card_button mt-30" type="button" id="deleteProImg">
                <span class="ti-trash"></span>
            </button>
        </div>

        <div class="row mt-25">
            <div class="col-lg-4 d-flex">
                <p class="text-uppercase fw-500 mb-10"> @lang('admin.user_photo_style') </p>
            </div>
            <div class="col-lg-8">
                <div class="primary_input">
                    <select
                        class="primary_select  form-control{{ $errors->has('user_photo_style') ? ' is-invalid' : '' }}"
                        name="user_photo_style" id="userPhotoStyle">
                        <option data-display="@lang('admin.user_photo_style')" value="">@lang('common.select')</option>
                        <option value="squre"
                            {{ isset($id_card) ? ($id_card->user_photo_style == 'squre' ? 'selected' : '') : '' }}>
                            @lang('admin.squre')</option>
                        <option value="round"
                            {{ isset($id_card) ? ($id_card->user_photo_style == 'round' ? 'selected' : '') : '' }}>
                            @lang('admin.round')</option>
                    </select>
                    <div class="text-danger" id="applicableUserError"></div>

                    @if ($errors->has('user_photo_style'))
                        <span class="text-danger invalid-select" role="alert">
                            {{ $errors->first('user_photo_style') }}
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="row mt-25">
            <div class="col-lg-6">
                <div class="primary_input">
                    <label class="primary_input_label" for="">@lang('admin.user_photo_size_width') <span
                            id="profileWidth">(@lang('admin.default') 21 mm)</span></label>
                    <input
                        class="primary_input_field form-control{{ $errors->has('user_photo_width') ? ' is-invalid' : '' }}"
                        type="text" id="userPhotoWidth" name="user_photo_width"
                        value="{{ isset($id_card) ? $id_card->user_photo_width : old('user_photo_width') }}"
                        autocomplete="off">


                    @if ($errors->has('user_photo_width'))
                        <span class="text-danger">
                            <strong>{{ $errors->first('user_photo_width') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-lg-6">
                <div class="primary_input">
                    <label class="primary_input_label" for="">@lang('admin.user_photo_size_height') <span
                            id="profileHeight">(@lang('admin.default') 21 mm)</span></label>
                    <input
                        class="primary_input_field form-control{{ $errors->has('user_photo_height') ? ' is-invalid' : '' }}"
                        type="text" id="userPhotoheight" name="user_photo_height"
                        value="{{ @$id_card->user_photo_height }}" autocomplete="off">


                    @if ($errors->has('user_photo_height'))
                        <span class="text-danger">
                            {{ $errors->first('user_photo_height') }}
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="row mt-25">
            <div class="col-lg-4">
                <span>@lang('admin.layout_spacing')</span>
            </div>
            <div class="col-lg-4">
                <div class="primary_input">
                    <label class="primary_input_label" for="">@lang('admin.top_space')<span> (@lang('admin.default') 2.5
                            mm)</span></label>
                    <input class="primary_input_field form-control{{ $errors->has('t_space') ? ' is-invalid' : '' }}"
                        type="text" id="tSpace" name="t_space"
                        value="{{ isset($id_card) ? $id_card->t_space : old('t_space') }}" autocomplete="off">


                    @if ($errors->has('t_space'))
                        <span class="text-danger">
                            {{ $errors->first('t_space') }}
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-lg-4">
                <div class="primary_input">
                    <label class="primary_input_label" for="">@lang('admin.bottom_space') <span>(@lang('admin.default') 2.5
                            mm)</span></label>
                    <input class="primary_input_field form-control{{ $errors->has('b_space') ? ' is-invalid' : '' }}"
                        type="text" id="bSpace" name="b_space"
                        value="{{ isset($id_card) ? $id_card->b_space : old('b_space') }}" autocomplete="off">


                    @if ($errors->has('b_space'))
                        <span class="text-danger">
                            {{ $errors->first('b_space') }}
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="row mt-25">
            <div class="col-lg-4">

            </div>
            <div class="col-lg-4">
                <div class="primary_input">
                    <label class="primary_input_label" for="">@lang('admin.left_space') (@lang('admin.default') 3
                        mm)</label>
                    <input class="primary_input_field form-control{{ $errors->has('l_space') ? ' is-invalid' : '' }}"
                        type="text" id="lSpace" name="l_space"
                        value="{{ isset($id_card) ? $id_card->l_space : old('l_space') }}" autocomplete="off">


                    @if ($errors->has('l_space'))
                        <span class="text-danger">
                            {{ $errors->first('l_space') }}
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-lg-4">
                <div class="primary_input">
                    <label class="primary_input_label" for="">@lang('admin.right_space') (@lang('admin.default') 3
                        mm)</label>
                    <input class="primary_input_field form-control{{ $errors->has('r_space') ? ' is-invalid' : '' }}"
                        type="text" id="rSpace" name="r_space"
                        value="{{ isset($id_card) ? $id_card->r_space : old('r_space') }}" autocomplete="off">


                    @if ($errors->has('r_space'))
                        <span class="text-danger">
                            {{ $errors->first('r_space') }}
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="d-flex mt-25">
            <div class="row flex-grow-1 d-flex justify-content-between input-right-icon">
                <div class="col">
                    <div class="primary_input">
                        <label class="primary_input_label" for="">@lang('admin.logo')</label>
                        <input class="primary_input_field form-control{{ $errors->has('logo') ? ' is-invalid' : '' }}" type="text" id="placeholderFileThreeName" placeholder="{{isset($id_card)? ($id_card->logo != ""? getFilePath3($id_card->logo): trans('admin.logo')):trans('admin.logo') }}"
                            readonly>

                        @if ($errors->has('logo'))
                            <span class="text-danger">
                                {{ $errors->first('logo') }}
                            </span>
                        @endif 
                    </div>
                </div>
                <div class="col-auto mt-30">
                    <button class="primary-btn-small-input cust-margin id_card_button" type="button">
                        <label class="primary-btn small fix-gr-bg" for="document_file_3">@lang('common.browse')</label>
                        <input type="file" class="d-none" name="logo" id="document_file_3"
                            onchange="logoImageChangeWithFile(this,'.logoImage')"
                            value="{{ isset($id_card) ? ($id_card->logo != '' ? getFilePath3($id_card->logo) : '') : '' }}">
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
                        <label class="primary_input_label" for="">@lang('admin.signature')</label>
                        <input
                            class="primary_input_field form-control{{ $errors->has('signature') ? ' is-invalid' : '' }}"
                            type="text" id="placeholderFileFourName"
                            placeholder="{{ isset($id_card) ? ($id_card->signature != '' ? getFilePath3($id_card->signature) : trans('admin.signature') . ' *') : trans('admin.signature') . ' *' }}"
                            readonly>

                        @if ($errors->has('signature'))
                            <span class="text-danger">
                                {{ $errors->first('signature') }}
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-auto mt-30">
                    <button class="primary-btn-small-input cust-margin id_card_button" type="button">
                        <label class="primary-btn small fix-gr-bg" for="document_file_4">@lang('common.browse')</label>
                        <input type="file" class="d-none" name="signature" id="document_file_4"
                            onchange="signatureImageChangeWithFile(this,'.signPhoto')"
                            value="{{ isset($id_card) ? ($id_card->signature != '' ? getFilePath3($id_card->signature) : '') : '' }}">
                    </button>
                </div>
            </div>
            <button class="primary-btn icon-only fix-gr-bg id_card_button mt-30" type="button" id="deleteSignImg">
                <span class="ti-trash"></span>
            </button>
        </div>

        <div class="row mt-25 admissionNo">
            <div class="col-lg-4 d-flex">
                <p class="text-uppercase fw-500 mb-10 text">@lang('student.admission_no')</p>
            </div>
            <div class="col-lg-8">
                <div class="d-flex radio-btn-flex ml-40">
                    <div class="mr-30">
                        <input type="radio" name="admission_no" id="id_roll_yes" value="1"
                            class="common-radio relationButton" onclick="idRoll('1')"
                            {{ isset($id_card) ? ($id_card->admission_no == 1 ? 'checked' : '') : 'checked' }}>
                        <label for="id_roll_yes">@lang('admin.yes')</label>
                    </div>
                    <div class="mr-30">
                        <input type="radio" name="admission_no" id="id_roll_no" value="0"
                            class="common-radio relationButton" onclick="idRoll('0')"
                            {{ isset($id_card) ? ($id_card->admission_no == 0 ? 'checked' : '') : '' }}>
                        <label for="id_roll_no">@lang('admin.none')</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-25">
            <div class="col-lg-4 d-flex">
                <p class="text-uppercase fw-500 mb-10">@lang('common.name') </p>
            </div>
            <div class="col-lg-8">
                <div class="d-flex radio-btn-flex ml-40">
                    <div class="mr-30">
                        <input type="radio" name="student_name" id="student_name_yes" value="1"
                            class="common-radio relationButton" onclick="studentName('1')"
                            {{ isset($id_card) ? ($id_card->student_name == 1 ? 'checked' : '') : 'checked' }}>
                        <label for="student_name_yes">@lang('admin.yes')</label>
                    </div>
                    <div class="mr-30">
                        <input type="radio" name="student_name" id="student_name_no" value="0"
                            class="common-radio relationButton" onclick="studentName('0')"
                            {{ isset($id_card) ? ($id_card->student_name == 0 ? 'checked' : '') : '' }}>
                        <label for="student_name_no">@lang('admin.none')</label>
                    </div>
                </div>
            </div>
        </div>
        @if (moduleStatusCheck('University'))
            <input type="hidden" value="university" id="module">
            <div class="row mt-25 classHide">
                <div class="col-lg-4 d-flex">
                    <p class="text-uppercase fw-500 mb-10">@lang('university::un.session') </p>
                </div>
                <div class="col-lg-8">
                    <div class="d-flex radio-btn-flex ml-40">
                        <div class="mr-30">
                            <input type="radio" name="un_session_id" id="un_session_yes" value="1"
                                class="common-radio relationButton" onclick="IDSession('1')"
                                {{ isset($id_card) ? ($id_card->un_session == 1 ? 'checked' : '') : 'checked' }}>
                            <label for="un_session_yes">@lang('admin.yes')</label>
                        </div>
                        <div class="mr-30">
                            <input type="radio" name="un_session_id" id="un_session_no" value="0"
                                class="common-radio relationButton" onclick="IDSession('0')"
                                {{ isset($id_card) ? ($id_card->un_session == 0 ? 'checked' : '') : '' }}>
                            <label for="un_session_no">@lang('admin.none')</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-25 classHide">
                <div class="col-lg-4 d-flex">
                    <p class="text-uppercase fw-500 mb-10">@lang('university::un.faculty') </p>
                </div>
                <div class="col-lg-8">
                    <div class="d-flex radio-btn-flex ml-40">
                        <div class="mr-30">
                            <input type="radio" name="un_faculty_id" id="un_faculty_yes" value="1"
                                class="common-radio relationButton" onclick="IDFaculty('1')"
                                {{ isset($id_card) ? ($id_card->un_faculty == 1 ? 'checked' : '') : '' }}>
                            <label for="un_faculty_yes">@lang('admin.yes')</label>
                        </div>
                        <div class="mr-30">
                            <input type="radio" name="un_faculty_id" id="un_faculty_no" value="0"
                                class="common-radio relationButton" onclick="IDFaculty('0')"
                                {{ isset($id_card) ? ($id_card->un_faculty == 0 ? 'checked' : '') : 'checked' }}>
                            <label for="un_faculty_no">@lang('admin.none')</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-25 classHide">
                <div class="col-lg-4 d-flex">
                    <p class="text-uppercase fw-500 mb-10">@lang('university::un.department') </p>
                </div>
                <div class="col-lg-8">
                    <div class="d-flex radio-btn-flex ml-40">
                        <div class="mr-30">
                            <input type="radio" name="un_department_id" id="un_department_yes" value="1"
                                class="common-radio relationButton" onclick="IDDepartment('1')"
                                {{ isset($id_card) ? ($id_card->un_department == 1 ? 'checked' : '') : 'checked' }}>
                            <label for="un_department_yes">@lang('admin.yes')</label>
                        </div>
                        <div class="mr-30">
                            <input type="radio" name="un_department_id" id="un_department_no" value="0"
                                class="common-radio relationButton" onclick="IDDepartment('0')"
                                {{ isset($id_card) ? ($id_card->un_department == 0 ? 'checked' : '') : '' }}>
                            <label for="un_department_no">@lang('admin.none')</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-25 classHide">
                <div class="col-lg-4 d-flex">
                    <p class="text-uppercase fw-500 mb-10">@lang('university::un.academic') </p>
                </div>
                <div class="col-lg-8">
                    <div class="d-flex radio-btn-flex ml-40">
                        <div class="mr-30">
                            <input type="radio" name="un_academic_id" id="un_academic_yes" value="1"
                                class="common-radio relationButton" onclick="IDAcademic('1')"
                                {{ isset($id_card) ? ($id_card->un_academic == 1 ? 'checked' : '') : '' }}>
                            <label for="un_academic_yes">@lang('admin.yes')</label>
                        </div>
                        <div class="mr-30">
                            <input type="radio" name="un_academic_id" id="un_academic_no" value="0"
                                class="common-radio relationButton" onclick="IDAcademic('0')"
                                {{ isset($id_card) ? ($id_card->un_academic == 0 ? 'checked' : '') : 'checked' }}>
                            <label for="un_academic_no">@lang('admin.none')</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-25 classHide">
                <div class="col-lg-4 d-flex">
                    <p class="text-uppercase fw-500 mb-10">@lang('university::un.semester') </p>
                </div>
                <div class="col-lg-8">
                    <div class="d-flex radio-btn-flex ml-40">
                        <div class="mr-30">
                            <input type="radio" name="un_semester_id" id="un_semester_yes" value="1"
                                class="common-radio relationButton" onclick="IDSemester('1')"
                                {{ isset($id_card) ? ($id_card->un_semester == 1 ? 'checked' : '') : '' }}>
                            <label for="un_semester_yes">@lang('admin.yes')</label>
                        </div>
                        <div class="mr-30">
                            <input type="radio" name="un_semester_id" id="un_semester_no" value="0"
                                class="common-radio relationButton" onclick="IDSemester('0')"
                                {{ isset($id_card) ? ($id_card->un_semester == 0 ? 'checked' : '') : 'checked' }}>
                            <label for="un_semester_no">@lang('admin.none')</label>
                        </div>
                    </div>
                </div>
            </div>
            {{-- 
        <div class="row mt-25 classHide">
            <div class="col-lg-4 d-flex">
                <p class="text-uppercase fw-500 mb-10">@lang('university::un.semester_label') </p>
            </div>
            <div class="col-lg-8">
                <div class="d-flex radio-btn-flex ml-40">
                    <div class="mr-30">
                        <input type="radio" name="un_semester_label_id" id="un_semester_label_yes" value="1" class="common-radio relationButton" onclick="IDUnFaculty('1')" {{isset($id_card)? ($id_card->un_semester_label_id == 1? 'checked': ''):'checked'}}>
                        <label for="un_semester_label_yes">@lang('admin.yes')</label>
                    </div>
                    <div class="mr-30">
                        <input type="radio" name="un_semester_label_id" id="un_semester_label_no" value="0" class="common-radio relationButton" onclick="IDclass('0')" {{isset($id_card)? ($id_card->un_semester_label_id == 0? 'checked': ''):''}}>
                        <label for="un_semester_no">@lang('admin.none')</label>
                    </div>
                </div>
            </div>
        </div> --}}
        @else
            <div class="row mt-25 classHide">
                <div class="col-lg-4 d-flex">
                    <p class="text-uppercase fw-500 mb-10">@lang('common.class') </p>
                </div>
                <div class="col-lg-8">
                    <div class="d-flex radio-btn-flex ml-40">
                        <div class="mr-30">
                            <input type="radio" name="class" id="class_yes" value="1"
                                class="common-radio relationButton" onclick="IDclass('1')"
                                {{ isset($id_card) ? ($id_card->class == 1 ? 'checked' : '') : 'checked' }}>
                            <label for="class_yes">@lang('admin.yes')</label>
                        </div>
                        <div class="mr-30">
                            <input type="radio" name="class" id="class_no" value="0"
                                class="common-radio relationButton" onclick="IDclass('0')"
                                {{ isset($id_card) ? ($id_card->class == 0 ? 'checked' : '') : '' }}>
                            <label for="class_no">@lang('admin.none')</label>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @php
            $check = 'checked';
        @endphp
        <div class="row mt-25 fatherName">
            <div class="col-lg-4 d-flex">
                <p class="text-uppercase fw-500 mb-10">@lang('student.father_name')</p>
            </div>
            <div class="col-lg-8">
                <div class="d-flex radio-btn-flex ml-40">
                    <div class="mr-30">
                        <input type="radio" name="father_name" id="father_name_yes" value="1"
                            class="common-radio relationButton" onclick="fatherName('1')"
                            {{ isset($id_card) ? ($id_card->father_name == 1 ? 'checked' : '') : (moduleStatusCheck('University') ? '' : 'checked') }}>
                        <label for="father_name_yes">@lang('admin.yes')</label>
                    </div>
                    <div class="mr-30">
                        <input type="radio" name="father_name" id="father_name_no" value="0"
                            class="common-radio relationButton" onclick="fatherName('0')"
                            {{ isset($id_card) ? ($id_card->father_name == 0 ? 'checked' : '') : (moduleStatusCheck('University') ? 'checked' : '') }}>
                        <label for="father_name_no">@lang('admin.none')</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-25 motherName">
            <div class="col-lg-4 d-flex">
                <p class="text-uppercase fw-500 mb-10">@lang('student.mother_name')</p>
            </div>
            <div class="col-lg-8">
                <div class="d-flex radio-btn-flex ml-40">
                    <div class="mr-30">
                        <input type="radio" name="mother_name" id="mother_name_yes" value="1"
                            class="common-radio relationButton" onclick="motherName('1')"
                            {{ isset($id_card) ? ($id_card->mother_name == 1 ? 'checked' : '') : (moduleStatusCheck('University') ? '' : 'checked') }}>
                        <label for="mother_name_yes">@lang('admin.yes')</label>
                    </div>
                    <div class="mr-30">
                        <input type="radio" name="mother_name" id="mother_name_no" value="0"
                            class="common-radio relationButton" onclick="motherName('0')"
                            {{ isset($id_card) ? ($id_card->mother_name == 0 ? 'checked' : '') : (moduleStatusCheck('University') ? 'checked' : '') }}>
                        <label for="mother_name_no">@lang('admin.none')</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-25">
            <div class="col-lg-4 d-flex">
                <p class="text-uppercase fw-500 mb-10">@lang('common.address')</p>
            </div>
            <div class="col-lg-8">
                <div class="d-flex radio-btn-flex ml-40">
                    <div class="mr-30">
                        <input type="radio" name="student_address" id="address_yes" value="1"
                            class="common-radio relationButton" onclick="addRess('1')"
                            {{ isset($id_card) ? ($id_card->student_address == 1 ? 'checked' : '') : 'checked' }}>
                        <label for="address_yes">@lang('admin.yes')</label>
                    </div>
                    <div class="mr-30">
                        <input type="radio" name="student_address" id="address_no" value="0"
                            class="common-radio relationButton" onclick="addRess('0')"
                            {{ isset($id_card) ? ($id_card->student_address == 0 ? 'checked' : '') : '' }}>
                        <label for="address_no">@lang('admin.none')</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-25 mobile {{ @$id_card->phone_number == 0 ? 'd-none' : '' }}">
            <div class="col-lg-4 d-flex">
                <p class="text-uppercase fw-500 mb-10">@lang('common.phone')</p>
            </div>
            <div class="col-lg-8">
                <div class="d-flex radio-btn-flex ml-40">
                    <div class="mr-30">
                        <input type="radio" name="phone_number" id="phone_yes" value="1"
                            class="common-radio relationButton" onclick="phoneNumber('1')"
                            {{ isset($id_card) ? ($id_card->phone_number == 1 ? 'checked' : '') : 'checked' }}>
                        <label for="phone_yes">@lang('admin.yes')</label>
                    </div>
                    <div class="mr-30">
                        <input type="radio" name="phone_number" id="phone_no" value="0"
                            class="common-radio relationButton" onclick="phoneNumber('0')"
                            {{ isset($id_card) ? ($id_card->phone_number == 0 ? 'checked' : '') : '' }}>
                        <label for="phone_no">@lang('admin.none')</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-25 dateOfBirth">
            <div class="col-lg-4 d-flex">
                <p class="text-uppercase fw-500 mb-10">@lang('common.date_of_birth')</p>
            </div>
            <div class="col-lg-8">
                <div class="d-flex radio-btn-flex ml-40">
                    <div class="mr-30">
                        <input type="radio" name="dob" id="dob_yes" value="1"
                            class="common-radio relationButton" onclick="dOB('1')"
                            {{ isset($id_card) ? ($id_card->dob == 1 ? 'checked' : '') : 'checked' }}>
                        <label for="dob_yes">@lang('admin.yes')</label>
                    </div>
                    <div class="mr-30">
                        <input type="radio" name="dob" id="dob_no" value="0"
                            class="common-radio relationButton" onclick="dOB('0')"
                            {{ isset($id_card) ? ($id_card->dob == 0 ? 'checked' : '') : '' }}>
                        <label for="dob_no">@lang('admin.none')</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-25 bloodGroup">
            <div class="col-lg-4 d-flex">
                <p class="text-uppercase fw-500 mb-10">@lang('student.blood_group')</p>
            </div>
            <div class="col-lg-8">
                <div class="d-flex radio-btn-flex ml-40">
                    <div class="mr-30">
                        <input type="radio" name="blood" id="blood_yes" value="1"
                            class="common-radio relationButton" onclick="bloodGroup('1')"
                            {{ isset($id_card) ? ($id_card->blood == 1 ? 'checked' : '') : 'checked' }}>
                        <label for="blood_yes">@lang('admin.yes')</label>
                    </div>
                    <div class="mr-30">
                        <input type="radio" name="blood" id="blood_no" value="0"
                            class="common-radio relationButton" onclick="bloodGroup('0')"
                            {{ isset($id_card) ? ($id_card->blood == 0 ? 'checked' : '') : '' }}>
                        <label for="blood_no">@lang('admin.none')</label>
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
                            {{ isset($id_card) ? (($id_card->gender ?? 0) == 1 ? 'checked' : '') : 'checked' }}>
                        <label for="gender_yes">@lang('admin.yes')</label>
                    </div>
                    <div class="mr-30">
                        <input type="radio" name="gender" id="gender_no" value="0" class="common-radio"
                            {{ isset($id_card) ? (($id_card->gender ?? 0) == 0 ? 'checked' : '') : '' }}>
                        <label for="gender_no">@lang('admin.none')</label>
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
                            {{ isset($id_card) ? (($id_card->admission_date ?? 0) == 1 ? 'checked' : '') : 'checked' }}>
                        <label for="admission_date_yes">@lang('admin.yes')</label>
                    </div>
                    <div class="mr-30">
                        <input type="radio" name="admission_date" id="admission_date_no" value="0" class="common-radio"
                            {{ isset($id_card) ? (($id_card->admission_date ?? 0) == 0 ? 'checked' : '') : '' }}>
                        <label for="admission_date_no">@lang('admin.none')</label>
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
                            {{ isset($id_card) ? (($id_card->guardian_name ?? 0) == 1 ? 'checked' : '') : 'checked' }}>
                        <label for="guardian_name_yes">@lang('admin.yes')</label>
                    </div>
                    <div class="mr-30">
                        <input type="radio" name="guardian_name" id="guardian_name_no" value="0" class="common-radio"
                            {{ isset($id_card) ? (($id_card->guardian_name ?? 0) == 0 ? 'checked' : '') : '' }}>
                        <label for="guardian_name_no">@lang('admin.none')</label>
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
                            {{ isset($id_card) ? (($id_card->guardian_phone ?? 0) == 1 ? 'checked' : '') : 'checked' }}>
                        <label for="guardian_phone_yes">@lang('admin.yes')</label>
                    </div>
                    <div class="mr-30">
                        <input type="radio" name="guardian_phone" id="guardian_phone_no" value="0" class="common-radio"
                            {{ isset($id_card) ? (($id_card->guardian_phone ?? 0) == 0 ? 'checked' : '') : '' }}>
                        <label for="guardian_phone_no">@lang('admin.none')</label>
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
                            {{ isset($id_card) ? (($id_card->show_qr ?? 0) == 1 ? 'checked' : '') : 'checked' }}>
                        <label for="show_qr_yes">@lang('admin.yes')</label>
                    </div>
                    <div class="mr-30">
                        <input type="radio" name="show_qr" id="show_qr_no" value="0" class="common-radio"
                            {{ isset($id_card) ? (($id_card->show_qr ?? 0) == 0 ? 'checked' : '') : '' }}>
                        <label for="show_qr_no">@lang('admin.none')</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="template-only-field mt-40">
            <h4 class="mb-15">Field Positions (% of card) — Front</h4>
            <p class="mb-20 text-muted">Adjust Left / Top / Width / Height / Font size (mm). Preview updates live as you type — save when ready.</p>
            @foreach(['photo' => 'Student Photo', 'student_name' => 'Full Name', 'admission_no' => 'Admission ID', 'class' => 'Classification', 'gender' => 'Gender', 'student_address' => 'Address', 'admission_date' => 'Admission Date', 'footer_id' => 'National ID Number'] as $key => $label)
                @php $pos = $fieldPositions['front'][$key] ?? []; @endphp
                <div class="row mb-15 align-items-end js-pos-row" data-side="front" data-field="{{ $key }}">
                    <div class="col-lg-2"><strong>{{ $label }}</strong></div>
                    <div class="col-lg-2">
                        <label>Left %</label>
                        <input class="primary_input_field form-control js-pos-input" data-prop="left" type="number" step="0.1" name="field_positions[front][{{ $key }}][left]" value="{{ $pos['left'] ?? 0 }}">
                    </div>
                    <div class="col-lg-2">
                        <label>Top %</label>
                        <input class="primary_input_field form-control js-pos-input" data-prop="top" type="number" step="0.1" name="field_positions[front][{{ $key }}][top]" value="{{ $pos['top'] ?? 0 }}">
                    </div>
                    <div class="col-lg-2">
                        <label>Width %</label>
                        <input class="primary_input_field form-control js-pos-input" data-prop="width" type="number" step="0.1" name="field_positions[front][{{ $key }}][width]" value="{{ $pos['width'] ?? 0 }}">
                    </div>
                    <div class="col-lg-2">
                        <label>Height %</label>
                        <input class="primary_input_field form-control js-pos-input" data-prop="height" type="number" step="0.1" name="field_positions[front][{{ $key }}][height]" value="{{ $pos['height'] ?? 0 }}">
                    </div>
                    <div class="col-lg-2">
                        <label>Font mm</label>
                        <input class="primary_input_field form-control js-pos-input" data-prop="font_size" type="number" step="0.1" name="field_positions[front][{{ $key }}][font_size]" value="{{ $pos['font_size'] ?? 2.5 }}">
                    </div>
                    @if($key !== 'photo' && $key !== 'footer_id')
                        <div class="col-lg-12 mt-10">
                            <label>Label text</label>
                            <input class="primary_input_field form-control js-pos-input" data-prop="label" type="text" name="field_positions[front][{{ $key }}][label]" value="{{ $pos['label'] ?? $label }}">
                            <input type="hidden" name="field_positions[front][{{ $key }}][show_label]" value="1">
                            <input type="hidden" name="field_positions[front][{{ $key }}][mask]" value="0">
                            <input type="hidden" name="field_positions[front][{{ $key }}][mask_color]" value="transparent">
                        </div>
                    @elseif($key === 'footer_id')
                        <input type="hidden" name="field_positions[front][footer_id][mask]" value="0">
                        <input type="hidden" name="field_positions[front][footer_id][mask_color]" value="transparent">
                        <input type="hidden" name="field_positions[front][footer_id][color]" value="#ffffff">
                        <input type="hidden" name="field_positions[front][footer_id][show_label]" value="0">
                    @endif
                </div>
            @endforeach

            <h4 class="mb-15 mt-30">Field Positions (% of card) — Back</h4>
            @foreach(['guardian_name' => 'Guardian Name', 'guardian_phone' => 'Guardian Phone', 'qr' => 'QR Code'] as $key => $label)
                @php $pos = $fieldPositions['back'][$key] ?? []; @endphp
                <div class="row mb-15 align-items-end js-pos-row" data-side="back" data-field="{{ $key }}">
                    <div class="col-lg-2"><strong>{{ $label }}</strong></div>
                    <div class="col-lg-2">
                        <label>Left %</label>
                        <input class="primary_input_field form-control js-pos-input" data-prop="left" type="number" step="0.1" name="field_positions[back][{{ $key }}][left]" value="{{ $pos['left'] ?? 0 }}">
                    </div>
                    <div class="col-lg-2">
                        <label>Top %</label>
                        <input class="primary_input_field form-control js-pos-input" data-prop="top" type="number" step="0.1" name="field_positions[back][{{ $key }}][top]" value="{{ $pos['top'] ?? 0 }}">
                    </div>
                    <div class="col-lg-2">
                        <label>Width %</label>
                        <input class="primary_input_field form-control js-pos-input" data-prop="width" type="number" step="0.1" name="field_positions[back][{{ $key }}][width]" value="{{ $pos['width'] ?? 0 }}">
                    </div>
                    <div class="col-lg-2">
                        <label>Height %</label>
                        <input class="primary_input_field form-control js-pos-input" data-prop="height" type="number" step="0.1" name="field_positions[back][{{ $key }}][height]" value="{{ $pos['height'] ?? 0 }}">
                    </div>
                    @if($key !== 'qr')
                        <div class="col-lg-2">
                            <label>Font mm</label>
                            <input class="primary_input_field form-control js-pos-input" data-prop="font_size" type="number" step="0.1" name="field_positions[back][{{ $key }}][font_size]" value="{{ $pos['font_size'] ?? 2.5 }}">
                        </div>
                        <div class="col-lg-12 mt-10">
                            <label>Label text</label>
                            <input class="primary_input_field form-control js-pos-input" data-prop="label" type="text" name="field_positions[back][{{ $key }}][label]" value="{{ $pos['label'] ?? $label }}">
                            <input type="hidden" name="field_positions[back][{{ $key }}][show_label]" value="1">
                            <input type="hidden" name="field_positions[back][{{ $key }}][mask]" value="0">
                            <input type="hidden" name="field_positions[back][{{ $key }}][mask_color]" value="transparent">
                        </div>
                    @else
                        <input type="hidden" name="field_positions[back][qr][mask]" value="0">
                        <input type="hidden" name="field_positions[back][qr][mask_color]" value="transparent">
                    @endif
                </div>
            @endforeach
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

        @php
            $tooltip = '';
            if (userPermission('create-id-card')) {
                $tooltip = '';
            } else {
                $tooltip = 'You have no permission to add';
            }
        @endphp
        <div class="row mt-40">
            <div class="col-lg-12 text-center">
                <button class="primary-btn fix-gr-bg submit savaIdCard" type="submit" data-toggle="tooltip"
                    title="{{ $tooltip }}">
                    <span class="ti-check"></span>
                    @if (isset($id_card))
                        @lang('common.update')
                    @else
                        @lang('common.save')
                    @endif
                    @lang('admin.id_card')
                </button>
            </div>
        </div>
    </div>
</div>


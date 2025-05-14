<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('inventory.issue_item_list'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('inventory.issue_item_list'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('inventory.inventory'); ?></a>
                    <a href="#"><?php echo app('translator')->get('inventory.issue_item_list'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <style type="text/css">
        #selectStaffsDiv,
        .forStudentWrapper {
            display: none;
        }
    </style>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">

                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if(isset($editData)): ?>
                                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => ['holiday-update', $editData->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data'])); ?>

                            <?php else: ?>
                                <?php if(userPermission('save-item-issue-data')): ?>
                                    <?php echo e(Form::open([
                                        'class' => 'form-horizontal',
                                        'files' => true,
                                        'route' => 'save-item-issue-data',
                                        'method' => 'POST',
                                        'enctype' => 'multipart/form-data',
                                    ])); ?>

                                <?php endif; ?>
                            <?php endif; ?>
                            <div class="white-box">
                                <div class="main-title">
                                    <h3 class="mb-15">
                                        <?php echo app('translator')->get('inventory.issue_a_item'); ?>
                                    </h3>
                                </div>
                                <div class="add-visitor">
                                    <div class="row">

                                        <div class="col-lg-12 mb-15">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('common.role'); ?> <span class="text-danger"> *</span> </label>
                                            <select
                                                class="primary_select  form-control<?php echo e($errors->has('role_id') ? ' is-invalid' : ''); ?>"
                                                name="role_id" id="member_type">
                                                <option data-display=" <?php echo app('translator')->get('inventory.user_type'); ?> *" value=""><?php echo app('translator')->get('inventory.user_type'); ?>
                                                    *</option>
                                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(isset($editData)): ?>
                                                        <option value="<?php echo e($value->id); ?>"
                                                            <?php echo e($value->id == $editData->role_id ? 'selected' : ''); ?>>
                                                            <?php echo e($value->name); ?></option>
                                                    <?php else: ?>
                                                        <option value="<?php echo e($value->id); ?>"
                                                            <?php echo e(old('role_id') != '' ? (old('role_id') == $value->id ? 'selected' : '') : ''); ?>>
                                                            <?php echo e($value->name); ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('role_id')): ?>
                                                <span class="text-danger invalid-select" role="alert">
                                                    <?php echo e($errors->first('role_id')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>

                                        <div class="forStudentWrapper col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-12 mb-15">
                                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('common.class'); ?> <span class="text-danger"> *</span> </label>
                                                    <select
                                                        class="primary_select form-control<?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>"
                                                        id="select_class" name="class">
                                                        <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value="">
                                                            <?php echo app('translator')->get('common.select_class'); ?> *</option>
                                                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($class->id); ?>"
                                                                <?php echo e(old('class') == $class->id ? 'selected' : ''); ?>>
                                                                <?php echo e($class->class_name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                    <?php if($errors->has('class')): ?>
                                                        <span class="text-danger invalid-select" role="alert">
                                                            <?php echo e($errors->first('class')); ?>

                                                        </span>
                                                    <?php endif; ?>
                                                </div>

                                                <div class="col-lg-12 mb-15" id="select_section_div">
                                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('common.section'); ?> <span class="text-danger"> *</span> </label>
                                                    <select
                                                        class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?>"
                                                        id="select_section" name="section">
                                                        <option data-display="<?php echo app('translator')->get('common.select_section'); ?> *" value="">
                                                            <?php echo app('translator')->get('common.select_section'); ?> *</option>
                                                    </select>
                                                    <div class="pull-right loader loader_style" id="select_section_loader">
                                                        <img class="loader_img_style"
                                                            src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>"
                                                            alt="loader">
                                                    </div>
                                                    <?php if($errors->has('section')): ?>
                                                        <span class="text-danger invalid-select" role="alert">
                                                            <?php echo e($errors->first('section')); ?>

                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-lg-12 mb-15" id="select_student_div">
                                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('common.student'); ?> <span class="text-danger"> *</span> </label>
                                                    <select
                                                        class="primary_select form-control<?php echo e($errors->has('student') ? ' is-invalid' : ''); ?>"
                                                        id="select_student" name="student">
                                                        <option data-display="<?php echo app('translator')->get('common.select_student'); ?>*" value="">
                                                            <?php echo app('translator')->get('inventory.select_student_for_issue'); ?> *</option>
                                                    </select>
                                                    <div class="pull-right loader loader_style" id="select_student_loader">
                                                        <img class="loader_img_style"
                                                            src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>"
                                                            alt="loader">
                                                    </div>
                                                    <?php if($errors->has('student')): ?>
                                                        <span class="text-danger invalid-select" role="alert">
                                                            <?php echo e($errors->first('student')); ?>

                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 mb-15" id="selectStaffsDiv">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('inventory.issue_to'); ?> <span></span> </label>
                                            <select
                                                class="primary_select  form-control<?php echo e($errors->has('staff_id') ? ' is-invalid' : ''); ?>"
                                                name="staff_id" id="selectStaffs">
                                                <option data-display="<?php echo app('translator')->get('inventory.issue_to'); ?>" value=""><?php echo app('translator')->get('inventory.issue_to'); ?>
                                                </option>

                                                <?php if(isset($staffsByRole)): ?>
                                                    <?php $__currentLoopData = $staffsByRole; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($value->id); ?>"
                                                            <?php echo e($value->id == $editData->staff_id ? 'selected' : ''); ?>>
                                                            <?php echo e($value->full_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php else: ?>
                                                <?php endif; ?>
                                            </select>
                                            <?php if($errors->has('staff_id')): ?>
                                                <span class="text-danger invalid-select" role="alert">
                                                    <?php echo e($errors->first('staff_id')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>

                                    </div>

                                    <div class="row mb-15">                                        
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('inventory.issue_date'); ?> <span></span> </label>
                                                <div class="primary_datepicker_input">
                                                    <div class="no-gutters input-right-icon">
                                                        <div class="col">
                                                            <div class="">
                                                                <input
                                                                class="primary_input_field  primary_input_field date form-control form-control<?php echo e($errors->has('issue_date') ? ' is-invalid' : ''); ?>"
                                                                id="startDate" type="text" name="issue_date"
                                                                value="<?php echo e(isset($editData) ? date('m/d/Y', strtotime($editData->issue_date)) : date('m/d/Y')); ?>">
                                                            </div>
                                                        </div>
                                                        <button class="btn-date" data-id="#issue_date" type="button">
                                                            <i class="ti-calendar" id="start-date-icon"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <span class="text-danger"><?php echo e($errors->first('issue_date')); ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-15">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('inventory.due_date'); ?> <span></span> </label>
                                                <div class="primary_datepicker_input">
                                                    <div class="no-gutters input-right-icon">
                                                        <div class="col">
                                                            <div class="">
                                                                <input
                                                    class="primary_input_field  primary_input_field date form-control form-control<?php echo e($errors->has('due_date') ? ' is-invalid' : ''); ?>"
                                                    id="endDate" type="text" name="due_date"
                                                    value="<?php echo e(isset($editData) ? date('m/d/Y', strtotime($editData->issue_date)) : date('m/d/Y')); ?>">
                                                            </div>
                                                        </div>
                                                        <button class="btn-date" data-id="#due_date" type="button">
                                                            <i class="ti-calendar" id="start-date-icon"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <span class="text-danger"><?php echo e($errors->first('due_date')); ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row ">
                                        <div class="col-lg-12 mb-15">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('inventory.category'); ?> <span class="text-danger"> *</span> </label>
                                            <select
                                                class="primary_select  form-control<?php echo e($errors->has('item_category_id') ? ' is-invalid' : ''); ?>"
                                                name="item_category_id" id="item_category_id">
                                                <option data-display="<?php echo app('translator')->get('inventory.item_category'); ?> *" value="">
                                                    <?php echo app('translator')->get('inventory.item_category'); ?> *</option>
                                                <?php $__currentLoopData = $itemCat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($value->id); ?>"
                                                        <?php echo e(old('item_category_id') == $value->id ? 'selected' : ''); ?>>
                                                        <?php echo e($value->category_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('item_category_id')): ?>
                                                <span class="text-danger invalid-select" role="alert">
                                                    <?php echo e($errors->first('item_category_id')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>

                                        <div class="col-lg-12 mb-15" id="selectItemsDiv">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('common.name'); ?> <span class="text-danger"> *</span> </label>
                                            <select
                                                class="primary_select  form-control<?php echo e($errors->has('item_id') ? ' is-invalid' : ''); ?>"
                                                name="item_id" id="selectItems">
                                                <option data-display="<?php echo app('translator')->get('inventory.item_name'); ?> *" value="">
                                                    <?php echo app('translator')->get('inventory.item_name'); ?> *</option>
                                            </select>
                                            <?php if($errors->has('item_id')): ?>
                                                <span class="text-danger invalid-select" role="alert">
                                                    <?php echo e($errors->first('item_id')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>

                                        <div class="col-lg-12 mb-15">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('inventory.quantity'); ?> <span class="text-danger"> *</span> </label>
                                                <input
                                                    class="primary_input_field form-control<?php echo e($errors->has('quantity') ? ' is-invalid' : ''); ?>"
                                                    type="text" onkeypress="return isNumberKey(event)" name="quantity"
                                                    autocomplete="off" value="<?php echo e(old('quantity')); ?>">
                                               
                                                
                                                <?php if($errors->has('quantity')): ?>
                                                    <span class="text-danger" >
                                                        <?php echo e($errors->first('quantity')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-15">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('inventory.note'); ?> <span></span> </label>
                                                <textarea class="primary_input_field form-control" cols="0" rows="4" name="description" id="description"><?php echo e(isset($editData) ? $editData->description : old('description')); ?></textarea>
                                               
                                                

                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                    <?php
                                        $tooltip = '';
                                        if (userPermission('save-item-issue-data')) {
                                            $tooltip = '';
                                        } else {
                                            $tooltip = 'You have no permission to add';
                                        }
                                    ?>
                                    <div class="row mt-40">
                                        <div class="col-lg-12 text-center">
                                            <button class="primary-btn fix-gr-bg submit issuedSubmit" data-toggle="tooltip"
                                                title="<?php echo e($tooltip); ?>">

                                                <span class="ti-check"></span>
                                                <?php if(isset($editData)): ?>
                                                    <?php echo app('translator')->get('common.update'); ?>
                                                <?php else: ?>
                                                    <?php echo app('translator')->get('common.save'); ?>
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
                                    <h3 class="mb-15"> <?php echo app('translator')->get('inventory.issued_item_list'); ?></h3>
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
                                            <th> <?php echo app('translator')->get('common.sl'); ?></th>
                                            <th> <?php echo app('translator')->get('inventory.item_name'); ?></th>
                                            <th> <?php echo app('translator')->get('inventory.item_category'); ?></th>
                                            <th> <?php echo app('translator')->get('inventory.issue_to'); ?></th>
                                            <th> <?php echo app('translator')->get('inventory.issue_date'); ?></th>
                                            <th> <?php echo app('translator')->get('inventory.return_date'); ?></th>
                                            <th> <?php echo app('translator')->get('inventory.quantity'); ?></th>
                                            <th> <?php echo app('translator')->get('common.status'); ?></th>
                                            <th> <?php echo app('translator')->get('common.action'); ?></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php if(isset($issuedItems)): ?>
                                            <?php $__currentLoopData = $issuedItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($key + 1); ?></td>
                                                    <td><?php echo e($value->items != '' ? $value->items->item_name : ''); ?></td>
                                                    <td><?php echo e($value->categories != '' ? $value->categories->category_name : ''); ?></td>

                                                    <?php if($value->role_id == 2): ?>
                                                        <?php
                                                            $getMemberDetail = App\SmStudent::find($value->issue_to);
                                                        ?>
                                                    <?php else: ?>
                                                        <?php
                                                            $getMemberDetail = App\SmBook::getMemberStaffsDetails($value->issue_to);
                                                        ?>
                                                    <?php endif; ?>

                                                    <td>
                                                        <?php if(!empty($getMemberDetail)): ?>
                                                            <?php echo e($getMemberDetail->full_name); ?>

                                                        <?php endif; ?>
                                                    </td>
                                                    <td data-sort="<?php echo e(strtotime($value->issue_date)); ?>">
                                                        <?php echo e($value->issue_date != '' ? dateConvert($value->issue_date) : ''); ?>


                                                    </td>
                                                    <td data-sort="<?php echo e(strtotime($value->due_date)); ?>">
                                                        <?php echo e($value->due_date != '' ? dateConvert($value->due_date) : ''); ?>



                                                    </td>

                                                    <td><?php echo e($value->quantity); ?></td>
                                                    <td>
                                                        <?php if($value->issue_status == 'I'): ?>
                                                            <button class="primary-btn small bg-success text-white border-0">
                                                                <?php echo app('translator')->get('inventory.issued'); ?></button>
                                                        <?php else: ?>
                                                            <?php
                                                                $getMemberDetail = App\SmBook::getMemberStaffsDetails($value->issue_to);
                                                            ?>
                                                        <?php endif; ?>
    
                                                        <!-- <td>
                                                            <?php if(!empty($getMemberDetail)): ?>
                                                                <?php echo e($getMemberDetail->full_name); ?>

                                                            <?php endif; ?>
                                                        </td>
                                                        <td data-sort="<?php echo e(strtotime($value->issue_date)); ?>">
                                                            <?php echo e($value->issue_date != '' ? dateConvert($value->issue_date) : ''); ?>

    
                                                        </td>
                                                        <td data-sort="<?php echo e(strtotime($value->due_date)); ?>">
                                                            <?php echo e($value->due_date != '' ? dateConvert($value->due_date) : ''); ?>

    
    
                                                        </td>
    
                                                        <td><?php echo e($value->quantity); ?></td>
                                                        <td>
                                                            <?php if($value->issue_status == 'I'): ?>
                                                                <button class="primary-btn small bg-success text-white border-0">
                                                                    <?php echo app('translator')->get('inventory.issued'); ?></button>
                                                            <?php else: ?>
                                                                <button
                                                                    class="primary-btn small bg-primary text-white border-0"><?php echo app('translator')->get('inventory.returned'); ?></button>
                                                            <?php endif; ?>
                                                        </td> -->
    
                                                        <td>
                                                            <?php if($value->issue_status == 'I'): ?>
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
                                                                        <?php if(userPermission('return-item-view')): ?>
                                                                            <a class="dropdown-item modalLink"
                                                                                title="<?php echo app('translator')->get('inventory.return_item'); ?>"
                                                                                data-modal-size="modal-md"
                                                                                href="<?php echo e(route('return-item-view', @$value->id)); ?>"><?php echo app('translator')->get('inventory.return'); ?></a>
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
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
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
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startPush('scripts'); ?>
  <script>
      $(document).on('.issuedSubmit', 'click', function (e) {
          let issue_date = $('#startDate').val();
          let return_date = $('#endDate').val();
          alert(return_date);
          if(issue_date > return_date) {
            toastr.error("Return Date will be greater Than issue date");
            return;
            e.preventdefault();
          }
      })
  </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\inventory\issueItemList.blade.php ENDPATH**/ ?>
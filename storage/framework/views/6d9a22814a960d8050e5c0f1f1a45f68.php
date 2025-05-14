<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('admin.admission_query'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <style>
        #table_id_wrapper {
            margin-top: 50px;
        }

        table.dataTable thead .sorting_desc::after,
        table.dataTable thead .sorting_asc:after,
        table.dataTable thead .sorting::after {
            top: 10px !important;
            left: 15px !important;
        }

        .input-right-icon button {
            position: absolute;
            right: 14px;
            bottom: 20px;
        }

        table.dataTable thead th {
            padding-left: 30px !important;
        }

        table.dataTable tbody th,
        table.dataTable tbody td {
            padding: 20px 10px 20px 18px !important;
        }
    </style>
    <section class="sms-breadcrumb mb-20 up_breadcrumb">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('admin.manage_admin'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('admin.admin_section'); ?></a>
                    <a href="<?php echo e(route('admission_query')); ?>"><?php echo app('translator')->get('admin.admission_query'); ?></a>
                    <a href="<?php echo e(route('add_query', [@$admission_query->id])); ?>"><?php echo app('translator')->get('admin.follow_up'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="main-title">
                                <h3 class="mb-30"><?php echo app('translator')->get('admin.follow_up_admission_query'); ?></h3>
                            </div>
                        </div>
                    </div>
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'query_followup_store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="white-box">
                                <div class="row mt-30">
                                    <input type="hidden" name="id" id="id" value="<?php echo e(@$admission_query->id); ?>">
                                    <div class="col-lg-4">
                                        <div class="no-gutters input-right-icon">
                                            <div class="col">
                                                <div class="primary_input">
                                                    <label class="primary_input_label"
                                                        for=""><?php echo app('translator')->get('admin.follow_up_date'); ?></label>
                                                    <input
                                                        class="primary_input_field  primary_input_field date form-control form-control<?php echo e(@$errors->has('follow_up_date') ? ' is-invalid' : ''); ?>"
                                                        id="startDate" type="text"
                                                        name="follow_up_date" readonly="true"
                                                        value="<?php echo e(date('m/d/Y', strtotime(@$admission_query->next_follow_up_date))); ?>">

                                                    <?php if($errors->has('follow_up_date')): ?>
                                                        <span
                                                            class="text-danger"><?php echo e(@$errors->first('follow_up_date')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <button class="" type="button">
                                                <label class="m-0 p-0" for="startDate">
                                                    <i class="ti-calendar" id="admission-date-icon"></i>
                                                </label>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="no-gutters input-right-icon">
                                            <div class="col">
                                                <div class="primary_input">
                                                    <label class="primary_input_label"
                                                        for=""><?php echo app('translator')->get('admin.next_follow_up_date'); ?></label>
                                                    <input
                                                        class="primary_input_field  primary_input_field date form-control form-control<?php echo e(@$errors->has('follow_up_date') ? ' is-invalid' : ''); ?>"
                                                        id="startDate" type="text"
                                                        name="next_follow_up_date" readonly="true"
                                                        value="<?php echo e(date('m/d/Y', strtotime(@$admission_query->next_follow_up_date))); ?>">


                                                </div>
                                            </div>
                                            <button class="" type="button">
                                                <label class="m-0 p-0" for="startDate">
                                                    <i class="ti-calendar" id="admission-date-icon"></i>
                                                </label>
                                            </button>
                                            <?php if($errors->has('next_follow_up_date')): ?>
                                                <span
                                                    class="text-danger"><?php echo e(@$errors->first('next_follow_up_date')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>


                                    <div class="col-lg-4">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('common.status'); ?> <span
                                                class="text-danger"> *</span> </label>
                                        <select class="primary_select " name="status">
                                            <option value="1"
                                                <?php echo e(@$admission_query->active_status == '1' ? 'selected' : ''); ?>>
                                                <?php echo app('translator')->get('admin.active'); ?></option>
                                            <option value="2"
                                                <?php echo e(@$admission_query->active_status == '2' ? 'selected' : ''); ?>>
                                                <?php echo app('translator')->get('admin.inactive'); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.response'); ?> <span
                                                    class="text-danger"> *</span> </label>
                                            <textarea class="primary_input_field form-control<?php echo e(@$errors->has('response') ? ' is-invalid' : ''); ?>" cols="0"
                                                rows="3" name="response" id="address"><?php echo e(old('response')); ?></textarea>


                                            <?php if($errors->has('response')): ?>
                                                <span class="text-danger">
                                                    <?php echo e(@$errors->first('response')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.note'); ?>
                                                <span></span> </label>
                                            <textarea class="primary_input_field form-control" cols="0" rows="3" name="note" id="description"><?php echo e(old('note')); ?></textarea>


                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn fix-gr-bg submit">
                                            <span class="ti-check"></span>
                                            <?php echo app('translator')->get('admin.save'); ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo e(Form::close()); ?>

                    <div class="row mt-40">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-4 no-gutters">
                                    <div class="main-title">
                                        <h3 class="mb-0"> <?php echo app('translator')->get('admin.follow_up_list'); ?></h3>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">

                                    <table id="table_id" class="table" cellspacing="0" width="100%">

                                        <thead>

                                            <tr>
                                                <th><?php echo app('translator')->get('common.sl'); ?></th>
                                                <th><?php echo app('translator')->get('admin.query_by'); ?></th>
                                                <th><?php echo app('translator')->get('admin.response'); ?></th>
                                                <th><?php echo app('translator')->get('admin.note'); ?></th>
                                                <th><?php echo app('translator')->get('common.action'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $follow_up_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $follow_up_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($key + 1); ?></td>
                                                    <td><?php echo e(@$follow_up_list->user != '' ? @$follow_up_list->user->full_name : ''); ?>

                                                    </td>
                                                    <td><?php echo e(@$follow_up_list->response); ?></td>
                                                    <td><?php echo e(@$follow_up_list->note); ?></td>

                                                    <td valign="top">
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
                                                            <a class="dropdown-item" data-toggle="modal"
                                                                data-target="#deletefollowUpQuery<?php echo e(@$follow_up_list->id); ?>"
                                                                href=""><?php echo app('translator')->get('admin.delete'); ?></a>
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
                                                    id="deletefollowUpQuery<?php echo e(@$follow_up_list->id); ?>">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title"><?php echo app('translator')->get('admin.delete_follow_up_query'); ?></h4>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal">&times;</button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <div class="text-center">
                                                                    <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                                                                </div>

                                                                <div class="mt-40 d-flex justify-content-between">
                                                                    <button type="button" class="primary-btn tr-bg"
                                                                        data-dismiss="modal"><?php echo app('translator')->get('admin.cancel'); ?></button>
                                                                    <a href="<?php echo e(route('delete_follow_up', [@$follow_up_list->id])); ?>"
                                                                        class="text-light primary-btn fix-gr-bg"><?php echo app('translator')->get('admin.delete'); ?>
                                                                    </a>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-45">
                    <div class="student-meta-box">
                        <div class="white-box radius-t-y-0 student-details">
                            <div class="single-meta mt-50">
                                <h3 class="mb-30"><?php echo app('translator')->get('common.details'); ?> </h3>
                            </div>
                            <div class="single-meta mt-50">
                                <div class="d-flex justify-content-between">
                                    <div class="name">
                                        <?php echo app('translator')->get('common.created_by'); ?>:
                                    </div>
                                    <div class="value">
                                        <?php echo e(@$admission_query->user != '' ? @$admission_query->user->full_name : ''); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="single-meta">
                                <div class="d-flex justify-content-between">
                                    <div class="name">
                                        <?php echo app('translator')->get('admin.query_date'); ?>:
                                    </div>
                                    <div class="value">
                                        <?php echo e(!empty(@$admission_query->date) ? dateConvert(@$admission_query->date) : ''); ?>


                                    </div>
                                </div>
                            </div>
                            <div class="single-meta">
                                <div class="d-flex justify-content-between">
                                    <div class="name">
                                        <?php echo app('translator')->get('admin.last_follow_up_date'); ?>:
                                    </div>
                                    <div class="value">
                                        <?php echo e(!empty(@$admission_query->follow_up_date) ? dateConvert(@$admission_query->follow_up_date) : ''); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="single-meta">
                                <div class="d-flex justify-content-between">
                                    <div class="name">
                                        <?php echo app('translator')->get('admin.next_follow_up_date'); ?>:
                                    </div>
                                    <div class="value">
                                        <?php echo e(!empty(@$admission_query->next_follow_up_date) ? dateConvert(@$admission_query->next_follow_up_date) : ''); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="single-meta">
                                <div class="d-flex justify-content-between">
                                    <div class="name">
                                        <?php echo app('translator')->get('admin.phone'); ?>:
                                    </div>
                                    <div class="value">
                                        <?php echo e(@$admission_query->phone); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="single-meta">
                                <div class="d-flex justify-content-between">
                                    <div class="name">
                                        <?php echo app('translator')->get('admin.address'); ?>:
                                    </div>
                                    <div class="value">
                                        <?php echo e(@$admission_query->address); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="single-meta">
                                <div class="d-flex justify-content-between">
                                    <div class="name">
                                        <?php echo app('translator')->get('admin.reference'); ?>:
                                    </div>
                                    <div class="value">
                                        <?php echo e(@$admission_query->reference != '' ? @$admission_query->referenceSetup->name : ''); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="single-meta">
                                <div class="d-flex justify-content-between">
                                    <div class="name">
                                        <?php echo app('translator')->get('admin.description'); ?>:
                                    </div>
                                    <div class="value">
                                        <?php echo e(@$admission_query->description); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="single-meta">
                                <div class="d-flex justify-content-between">
                                    <div class="name">
                                        <?php echo app('translator')->get('admin.source'); ?>:
                                    </div>
                                    <div class="value">
                                        <?php echo e(@$admission_query->source != '' ? @$admission_query->sourceSetup->name : ''); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="single-meta">
                                <div class="d-flex justify-content-between">
                                    <div class="name">
                                        <?php echo app('translator')->get('admin.assigned'); ?>:
                                    </div>
                                    <div class="value">
                                        <?php echo e(@$admission_query->assigned); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="single-meta">
                                <div class="d-flex justify-content-between">
                                    <div class="name">
                                        <?php echo app('translator')->get('admin.email'); ?>:
                                    </div>
                                    <div class="value">
                                        <?php echo e(@$admission_query->email); ?>

                                    </div>
                                </div>
                            </div>
                            <?php if(moduleStatusCheck('University')): ?>
                                <div class="single-meta">
                                    <div class="d-flex justify-content-between">
                                        <div class="name">
                                            <?php echo app('translator')->get('university::un.session'); ?>:
                                        </div>
                                        <div class="value">
                                            <?php echo e(@$admission_query->unSession->name); ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="d-flex justify-content-between">
                                        <div class="name">
                                            <?php echo app('translator')->get('university::un.faculty'); ?>:
                                        </div>
                                        <div class="value">
                                            <?php echo e(@$admission_query->unFaculty->name); ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="d-flex justify-content-between">
                                        <div class="name">
                                            <?php echo app('translator')->get('university::un.academic_year'); ?>:
                                        </div>
                                        <div class="value">
                                            <?php echo e(@$admission_query->unAcademic->name); ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="d-flex justify-content-between">
                                        <div class="name">
                                            <?php echo app('translator')->get('university::un.semester'); ?>:
                                        </div>
                                        <div class="value">
                                            <?php echo e(@$admission_query->unSemester->name); ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="d-flex justify-content-between">
                                        <div class="name">
                                            <?php echo app('translator')->get('university::un.semester_level'); ?>:
                                        </div>
                                        <div class="value">
                                            <?php echo e(@$admission_query->unSemesterLabel->name); ?>

                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="single-meta">
                                    <div class="d-flex justify-content-between">
                                        <div class="name">
                                            <?php echo app('translator')->get('common.class'); ?>:
                                        </div>
                                        <div class="value">
                                            <?php echo e(@$admission_query->class != '' ? @$admission_query->className->class_name : ''); ?>

                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="single-meta">
                                <div class="d-flex justify-content-between">
                                    <div class="name">
                                        <?php echo app('translator')->get('admin.number_of_child'); ?>:
                                    </div>
                                    <div class="value">
                                        <?php echo e(@$admission_query->no_of_child); ?>

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
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\admin\add_query.blade.php ENDPATH**/ ?>
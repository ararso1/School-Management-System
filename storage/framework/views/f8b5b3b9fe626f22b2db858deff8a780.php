<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('exam.result_settings'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('exam.setup_exam_rule'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('exam.examination'); ?></a>
                    <a href="#"><?php echo app('translator')->get('exam.settings'); ?></a>
                    <a href="#"><?php echo app('translator')->get('exam.setup_exam_rule'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if($edit_data > 1): ?>
                                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => array('custom-result-setting/update'), 'method' => 'PUT', 'enctype' => 'multipart/form-data'])); ?>

                            <?php else: ?>
                                <?php if(userPermission('custom-result-setting/store')): ?>
                                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'custom-result-setting/store','method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                                <?php endif; ?>
                            <?php endif; ?>
                            <div class="white-box">
                                <div class="main-title">
                                    <h3 class="mb-15">
                                        <?php echo app('translator')->get('exam.setup_final_exam_rule'); ?>
                                    </h3>
                                </div>
                                <div class="add-visitor">
                                    <div class="row mb-40 ">
                                        <?php
                                            $average=0;
                                        ?>
                                        <?php $__currentLoopData = $exams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-lg-12 mt-15">
                                                <div class="row">
                                                    <div class="col-lg-7 d-flex">
                                                        <p class="text-uppercase fw-300 mb-10">
                                                            <?php echo app('translator')->get('exam.exam_type'); ?> <?php echo e($exam->title); ?> (%)
                                                            <input type="hidden" value="<?php echo e($exam->id); ?>" name="exam_type_id[]" >
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <div class="">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="primary_input ">
                                                                        <input type="text" data-id="<?php echo e($exam->id); ?>"  name="exam_type_percent[<?php echo e($exam->id); ?>]" value="<?php echo e(isset($exam->id) == @$exam->examTerm->exam_type_id? $exam->examTerm->exam_percentage: $average); ?>" class="primary_input_field maxPercent">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-lg-12 mt-15 border-top">
                                            <div class="row">
                                                <div class="col-lg-7 d-flex">
                                                    <strong>
                                                        <p class="text-uppercase fw-300 mb-10">
                                                            <?php echo app('translator')->get('exam.total_mark'); ?> 100%
                                                        </p>
                                                    </strong>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="radio-btn-flex ">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="primary_input ">
                                                                    <strong>
                                                                        <p id="mark-calculate"></p>
                                                                    </strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <?php
                                            $tooltip = "";
                                            if(userPermission('custom-result-setting/store')){
                                                    $tooltip = "";
                                                }else{
                                                    $tooltip = "You have no permission to update";
                                                }
                                        ?>
                                        <div class="col-lg-12 text-center">
                                            <button type="submit" class="primary-btn fix-gr-bg submit result_setup" data-toggle="tooltip" title="<?php echo e(@$tooltip); ?>">
                                                <?php if($edit_data > 1): ?>
                                                    <span class="ti-check"></span><?php echo app('translator')->get('exam.update'); ?>
                                                <?php else: ?>
                                                    <span class="ti-check"></span><?php echo app('translator')->get('exam.store'); ?>
                                                <?php endif; ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="white-box">
                        <div class="main-title">
                            <h3 class="mb-15">
                                <?php echo app('translator')->get('exam.mark_contribution'); ?>
                            </h3>
                        </div>
                        <table class="table" cellspacing="0" width="100%">
                            <thead>
                            <tr class="border-bottom">
                                <th><?php echo app('translator')->get('exam.exam_term'); ?></th>
                                <th class="text-right"><?php echo app('translator')->get('exam.percentage'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $total_percentage = 0;
                            ?>
                            <?php $__currentLoopData = $custom_settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$custom_setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!$custom_setting->exam_type_id == 0): ?>
                                    <tr>
                                        <td><?php echo e(@$custom_setting->examTypeName->title); ?></td>
                                        <td class="text-right"><?php echo e(@$custom_setting->exam_percentage); ?>%</td>
                                        <?php
                                            $total_percentage+=@$custom_setting->exam_percentage;
                                        ?>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                            <tr class="border-top">
                                <th><?php echo app('translator')->get('exam.total'); ?></th>
                                <th class="text-right"><?php echo e($total_percentage); ?>%</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row mt-40">
                <div class="col-lg-6">                    
                    <div class="white-box">
                        <div class="main-title">
                            <h3 class="mb-15">
                                <?php echo app('translator')->get('exam.do you want to skip this step for mark register/store'); ?>
                            </h3>
                        </div>     
                        <?php echo Form::open(['route' => 'exam.step.skip.update', 'method'=>'POST']); ?>                     
                            <div class="row">
                                <div class="col-lg-12">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('exam.name of step'); ?></label><br>
                                    <?php $__currentLoopData = $skipSteps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="">
                                            
                                                <input type="checkbox" id="item<?php echo e($item); ?>"
                                                        class="common-checkbox form-control<?php echo e($errors->has('item') ? ' is-invalid' : ''); ?>"
                                                        name="item[]"
                                                        value="<?php echo e($item); ?>" <?php echo e(isset($exitSkipSteps) ? in_array($item, $exitSkipSteps) ? 'checked':'' :''); ?>>
                                                <label for="item<?php echo e($item); ?>"><?php echo app('translator')->get('exam.'.$item); ?></label>
                                            
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($errors->has('item')): ?>
                                        <span class="text-danger validate-textarea-checkbox" role="alert">
                                        <strong><?php echo e(@$errors->first('item')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-12 text-center mt-25">
                                    <button type="submit" class="primary-btn fix-gr-bg">
                                       
                                            <span class="ti-check"></span><?php echo app('translator')->get('exam.update'); ?>
                                       
                                    </button>
                                </div>
                            </div>
                            <?php echo Form::close(); ?>

                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="white-box">
                        <div class="main-title">
                            <h3 class="mb-15">
                                <?php echo app('translator')->get('exam.merit_list_contribution_using'); ?>
                            </h3>
                        </div>
                        <div class="d-flex flex-wrap radio-btn-flex">
                            <div class="mr-30">
                                <input type="radio" name="trueOrFalse" id="totalMark" value="total_mark" class="common-radio relationButton" <?php echo e(isset($meritListSettings)? $meritListSettings->merit_list_setting == "total_mark"? 'checked': '' : 'checked'); ?>>
                                <label for="totalMark"><?php echo app('translator')->get('exam.total_mark'); ?></label>
                            </div>
                            <div class="mr-30">
                                <input type="radio" name="trueOrFalse" id="grade" value="total_grade" class="common-radio relationButton" <?php echo e(isset($meritListSettings)? $meritListSettings->merit_list_setting == "total_grade"? 'checked': '' : 'checked'); ?>>
                                <label for="grade"><?php echo app('translator')->get('exam.total_grade'); ?></label>
                            </div>
                            <div class="mr-30">
                                <input type="radio" name="trueOrFalse" id="rollNumber" value="roll_number" class="common-radio relationButton" <?php echo e(isset($meritListSettings)? $meritListSettings->merit_list_setting == "roll_number"? 'checked': '' : 'checked'); ?>>
                                <label for="rollNumber"><?php echo app('translator')->get('student.roll_number'); ?></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">


                <div class="col-lg-12 mt-40">
                    <div class="white-box">
                        <div class="main-title">
                            <h3 class="mb-15">
                                <?php echo app('translator')->get('exam.result_print_style'); ?>
                            </h3>
                        </div>
                        <div class="d-flex flex-wrap radio-btn-flex">
                            <div class="mr-30">
                                <input type="checkbox" name="profile_image" id="profileImage" value="image" class="common-radio relationButtonPrint" <?php echo e(isset($meritListSettings)? $meritListSettings->profile_image == "image"? 'checked': '' : 'checked'); ?>>
                                <label for="profileImage"><?php echo app('translator')->get('exam.with_profile_image'); ?></label>
                            </div>
                            <div class="mr-30">
                                <input type="checkbox" name="header_background" id="headerBackground" value="header" class="common-radio relationButtonPrint" <?php echo e(isset($meritListSettings)? $meritListSettings->header_background == "header"? 'checked': '' : 'checked'); ?>>
                                <label for="headerBackground"><?php echo app('translator')->get('exam.with_header_background'); ?></label>
                            </div>
                            <div class="mr-30">
                                <input type="checkbox" name="body_background" id="bodyBackground" value="body" class="common-radio relationButtonPrint" <?php echo e(isset($meritListSettings)? $meritListSettings->body_background == "body"? 'checked': '' : 'checked'); ?>>
                                <label for="bodyBackground"><?php echo app('translator')->get('exam.with_body_background'); ?></label>
                            </div>
                            <div class="mr-30">
                                <input type="checkbox" name="vertical_boarder" id="verticalBoarder" value="vertical_boarder" class="common-radio relationButtonPrint" <?php echo e(isset($meritListSettings)? $meritListSettings->vertical_boarder == "vertical_boarder"? 'checked': '' : 'checked'); ?>>
                                <label for="verticalBoarder"><?php echo app('translator')->get('exam.with_vertical_boarder'); ?></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>

    <script>
        $( document ).ready(function() {
            $( ".relationButton" ).change(function() {
                let value = $( this ).val();
                $.ajax({
                    type: "POST",
                    data: {
                        value: value,
                    },
                    dataType: "json",
                    url: "<?php echo e(route('merit-list-settings')); ?>",
                    success: function(data) {
                        if (data == "success") {
                            toastr.success("Operation Successfull", "Successful", {
                                timeOut: 5000,
                            });
                        } else {
                            toastr.error("Operation Failed", "Failed!", {
                                timeOut: 5000,
                            });
                        }
                    },
                    error: function(data) {
                        console.log("Error:", data["error"]);
                    },
                })
            });
        });
    </script>
    <script>
        $( document ).ready(function() {
            $( ".relationButtonPrint" ).click(function() {
                let value = $( this ).is(':checked');
                if(value){
                    var key = 1;
                    var printStatus = $( this ).val();
                }else{
                    var key = 0;
                    var printStatus = $( this ).val();
                }
                $.ajax({
                    type: "POST",
                    data: {
                        printStatus: printStatus,
                        key: key,
                    },
                    dataType: "json",
                    url: "<?php echo e(route('merit-list-settings')); ?>",
                    success: function(data) {
                        if (data == "success") {
                            toastr.success("Operation Successfull", "Successful", {
                                timeOut: 5000,
                            });
                        } else {
                            toastr.error("Operation Failed", "Failed!", {
                                timeOut: 5000,
                            });
                        }
                    },
                    error: function(data) {
                        console.log("Error:", data["error"]);
                    },
                })
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/backEnd/systemSettings/custom_result_setting_add.blade.php ENDPATH**/ ?>
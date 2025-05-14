<script type="text/javascript" src="<?php echo e(asset('public/backEnd/js/main.js')); ?>"></script>
<div class="container-fluid">
   <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'saveToDoData',
   'method' => 'POST', 'enctype' => 'multipart/form-data', 'onsubmit' => 'return validateToDoForm()'])); ?>


   <div class="row">
    <div class="col-lg-12">
        <div class="row mt-25">
            <div class="col-lg-12" id="sibling_class_div">
                <div class="primary_input">
                    <input  class="primary_input_field form-control" type="text" name="todo_title" id="todo_title">
                    <label class="primary_input_label" for=""><?php echo app('translator')->get('dashboard.to_do_title'); ?> <span></span> </label>
                    
                   <span class="modal_input_validation red_alert"></span>
                </div>
            </div>
        </div>

        <div class="row mt-30">
            <div class="col-lg-12" id="">
                <div class="no-gutters input-right-icon">
                    <div class="col">
                        <div class="primary_input">
                            <input class="read-only-input primary_input_field  primary_input_field date form-control form-control<?php echo e($errors->has('date') ? ' is-invalid' : ''); ?>" id="startDate" type="text" autocomplete="off" readonly="true" name="date" value="<?php echo e(date('m/d/Y')); ?>">
                            <label class="primary_input_label" for=""><?php echo app('translator')->get('common.date'); ?> <span></span> </label>
                            <?php if($errors->has('date')): ?>
                                <span class="text-danger" >
                                    <?php echo e($errors->first('date')); ?>

                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <button class="" type="button">
                            <i class="ti-calendar" id="start-date-icon"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

    <div class="col-lg-12 text-center">
        <div class="mt-40 d-flex justify-content-between">
            <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
            <input class="primary-btn fix-gr-bg" type="submit" value="save">
        </div>
    </div>
</div>
<?php echo e(Form::close()); ?>

</div>

<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\dashboard\addToDo_old.blade.php ENDPATH**/ ?>
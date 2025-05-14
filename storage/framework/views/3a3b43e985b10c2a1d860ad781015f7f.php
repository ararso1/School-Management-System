<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('system_settings.manage_currency'); ?>
<?php $__env->stopSection(); ?> 
<?php $__env->startPush('css'); ?>
<style>
    .row-gap-40{
        row-gap: 40px;
    }
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php if(isset($editData)): ?>
                    <?php echo app('translator')->get('system_settings.edit_currency'); ?>
                <?php else: ?>
                    <?php echo app('translator')->get('system_settings.add_currency'); ?>
                <?php endif; ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('system_settings.system_settings'); ?></a>
                    <a href="#"><?php echo app('translator')->get('system_settings.manage_currency'); ?></a>
                    <a href="#"><?php if(isset($editData)): ?>
                        <?php echo app('translator')->get('system_settings.edit_currency'); ?>
                    <?php else: ?>
                        <?php echo app('translator')->get('system_settings.add_currency'); ?>
                    <?php endif; ?></a>

                </div>
            </div>
        </div>
    </section>

    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
           
            <div class="row">                
                <div class="col-lg-12">
                    <div class="main-title">
                        <h3 class="mb-30">
                            <?php if(isset($editData)): ?>
                                <?php echo app('translator')->get('system_settings.edit_currency'); ?>
                            <?php else: ?>
                                <?php echo app('translator')->get('system_settings.add_currency'); ?>
                            <?php endif; ?>
                            
                        </h3>
                    </div>
                    <?php if(isset($editData)): ?>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'currency-update', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <input type="hidden" name="id" value="<?php echo e(isset($editData)? @$editData->id: ''); ?>">
                    <?php else: ?>
                        <?php if(userPermission('currency-store')): ?>
                            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'currency-store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <?php endif; ?>
                    <?php endif; ?>
                    <div class="white-box">
                        <div class="add-visitor">
                            <div class="row"> 
                                <div class="col-lg-4">
                                    <div class="primary_input">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('common.name'); ?> <span class="text-danger"> *</span></label>
                                        <input class="primary_input_field form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" type="text" name="name" autocomplete="off" value="<?php echo e(isset($editData)? @$editData->name: old('name')); ?>" maxlength="25" >                                            
                                        
                                        
                                        <?php if($errors->has('name')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('name')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="primary_input">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.code'); ?> <span class="text-danger"> *</span></label>
                                        <input class="primary_input_field form-control<?php echo e($errors->has('code') ? ' is-invalid' : ''); ?>" type="text" name="code" autocomplete="off" value="<?php echo e(isset($editData)? @$editData->code: old('code')); ?>" maxlength="10" >                                            
                                        
                                        
                                        <?php if($errors->has('code')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('code')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="primary_input">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.symbol'); ?> <span class="text-danger"> *</span></label>
                                        <input class="primary_input_field form-control<?php echo e($errors->has('symbol') ? ' is-invalid' : ''); ?>" type="text" name="symbol" autocomplete="off" value="<?php echo e(isset($editData)? @$editData->symbol: old('symbol')); ?>" maxlength="5" >                                            
                                      
                                        
                                        <?php if($errors->has('symbol')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('symbol')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <label for="" class="mt-5"> <?php echo e(__('system_settings.Currency Format Setup')); ?></label>
                            <div class="row mt-10 row-gap-40"> 
                                <div class="col-lg-4">
                                    <label for=""><?php echo e(__('system_settings.Currency Show')); ?></label>
                                    <div class="d-flex radio-btn-flex mt-10">
                                        
                                        <div class="mr-30">
                                            <input type="radio" name="currency_type" id="currency_code" value="C" class="common-radio relationButton" <?php echo e(isset($editData) ? $editData->currency_type == 'C' ? 'checked':'':''); ?>>
                                            <label for="currency_code"><?php echo app('translator')->get('system_settings.code'); ?></label>
                                        </div>
                                        <div class="mr-30">
                                            <input type="radio" name="currency_type" id="currency_symbol" value="S" class="common-radio relationButton" <?php echo e(isset($editData) ? $editData->currency_type == 'S' ? 'checked':'':'checked'); ?>>
                                            <label for="currency_symbol"><?php echo app('translator')->get('system_settings.symbol'); ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label for=""><?php echo e(__('system_settings.position')); ?></label>
                                    <div class="d-flex radio-btn-flex mt-10">
                                        
                                        <div class="mr-30">
                                            <input type="radio" name="currency_position" id="currency_suffix" value="S" class="common-radio relationButton" <?php echo e(isset($editData) ? $editData->currency_position == 'S' ? 'checked':'':'checked'); ?>>
                                            <label for="currency_suffix"><?php echo app('translator')->get('system_settings.suffix'); ?></label>
                                        </div>
                                        <div class="mr-30">
                                            <input type="radio" name="currency_position" id="currency_prefix" value="P" class="common-radio relationButton" <?php echo e(isset($editData) ? $editData->currency_position == 'P' ? 'checked':'':''); ?>>
                                            <label for="currency_prefix"><?php echo app('translator')->get('system_settings.prefix'); ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label for=""> <?php echo e(__('system_settings.With Space')); ?></label>
                                    <div class="d-flex radio-btn-flex mt-10">
                                        
                                        <div class="mr-30">
                                            <input type="radio" name="space" id="space_yes" value="1" class="common-radio relationButton" <?php echo e(isset($editData) ? $editData->space ? 'checked':'':'checked'); ?>>
                                            <label for="space_yes"><?php echo app('translator')->get('common.yes'); ?></label>
                                        </div>
                                        <div class="mr-30">
                                            <input type="radio" name="space" id="space_no" value="0" class="common-radio relationButton" <?php echo e(isset($editData) ? !$editData->space ? 'checked':'':''); ?>>
                                            <label for="space_no"><?php echo app('translator')->get('common.no'); ?></label>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="row mt-40"> 
                                <div class="col-lg-4">
                                    <div class="primary_input">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.number of decimal digits'); ?> </label>
                                        <input class="primary_input_field form-control<?php echo e($errors->has('decimal_digit') ? ' is-invalid' : ''); ?>" type="text" name="decimal_digit" autocomplete="off" value="<?php echo e(isset($editData)? @$editData->decimal_digit: old('decimal_digit')); ?>" maxlength="5" >                                            
                                        
                                        
                                        <?php if($errors->has('decimal_digit')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('decimal_digit')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="primary_input">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.Decimal point separator'); ?> </label>
                                        <input class="primary_input_field form-control<?php echo e($errors->has('decimal_separator') ? ' is-invalid' : ''); ?>" type="text" name="decimal_separator" autocomplete="off" value="<?php echo e(isset($editData)? @$editData->decimal_separator: old('decimal_separator')); ?>">                                            
                                        
                                        
                                        <?php if($errors->has('decimal_separator')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('decimal_separator')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="primary_input">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.Thousands Separator'); ?></label>
                                        <input class="primary_input_field form-control<?php echo e($errors->has('thousand_separator') ? ' is-invalid' : ''); ?>" type="text" name="thousand_separator" autocomplete="off" value="<?php echo e(isset($editData)? @$editData->thousand_separator: old('thousand_separator')); ?>">                                            
                                       
                                        
                                        <?php if($errors->has('thousand_separator')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('thousand_separator')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                
                            </div>

                            <?php 
                                $tooltip = "";
                                if(userPermission('currency-store')){
                                        $tooltip = "";
                                    }else{
                                        $tooltip = "You have no permission to add";
                                    }
                            ?>
                            <div class="row mt-40">
                                <div class="col-lg-12 text-center">
                                    <button class="primary-btn fix-gr-bg submit" data-toggle="tooltip" title="<?php echo e(@$tooltip); ?>">
                                        <span class="ti-check"></span>
                                        <?php if(isset($editData)): ?>
                                            <?php echo app('translator')->get('system_settings.update_currency'); ?>
                                        <?php else: ?>
                                            <?php echo app('translator')->get('system_settings.save_currency'); ?>
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
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\systemSettings\create_update_currency.blade.php ENDPATH**/ ?>
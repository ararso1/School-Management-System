<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('front_settings.contact_page'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <style>
        .input-right-icon button.primary-btn-small-input {
            position: absolute;
            top: 7px;
            right: 10px;
        }
        .school-table-style tr td{
            min-width: 150px;
        }
        .school-table-style tr td:nth-child(2){
            min-width: 250px;
        }
    </style>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('front_settings.contact_page'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('front_settings.front_settings'); ?></a>
                    <a href="#"><?php echo app('translator')->get('front_settings.contact_page'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area">
        <div class="container-fluid p-0">
            <?php if(isset($update)): ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if(isset($update)): ?>
                                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'contactPageStore',
                                'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                            <?php else: ?>
                                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'visitor_store',
                                'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                            <?php endif; ?>
                            <div class="white-box">
                                <div class="main-title">
                                    <h3 class="mb-15">
                                        <?php if(isset($update)): ?>
                                            <?php echo app('translator')->get('common.edit'); ?>
                                        <?php else: ?>
                                            <?php echo app('translator')->get('common.add'); ?>
                                        <?php endif; ?>
                                    </h3>
                                </div>
                                <div class="add-visitor <?php echo e(isset($update)? '':'isDisabled'); ?>">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="primary_input">
                                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.title'); ?><span class="text-danger"> *</span></label>
                                                        <input
                                                            class="primary_input_field "
                                                            type="text" name="title" autocomplete="off"
                                                            value="<?php echo e(isset($update)? ($contact_us != ''? $contact_us->title:''):''); ?>">
                                                      
                                                        
                                                        <?php if($errors->has('title')): ?>
                                                        <span class="text-danger" >
                                                            <?php echo e($errors->first('title')); ?>

                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                
                                                <div class="col-lg-4">
                                                    <div class="primary_input">
                                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.button_text'); ?> <span class="text-danger"> *</span></label>
                                                        <input
                                                            class="primary_input_field form-control<?php echo e($errors->has('button_text') ? ' is-invalid' : ''); ?>"
                                                            type="text" name="button_text" autocomplete="off"
                                                            value="<?php echo e(isset($update)? ($contact_us != ''? $contact_us->button_text:''):''); ?>">
                                                       
                                                        
                                                        <?php if($errors->has('button_text')): ?>
                                                        <span class="text-danger" >
                                                            <?php echo e($errors->first('button_text')); ?>

                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="primary_input">
                                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.button_url'); ?><span class="text-danger"> *</span></label>
                                                        <input
                                                            class="primary_input_field form-control<?php echo e($errors->has('button_text') ? ' is-invalid' : ''); ?>"
                                                            type="text" name="button_url" autocomplete="off"
                                                            value="<?php echo e(isset($update)? ($contact_us != ''? $contact_us->button_url:''):''); ?>">
                                                        
                                                        
                                                        <?php if($errors->has('button_url')): ?>
                                                        <span class="text-danger" >
                                                            <?php echo e($errors->first('button_url')); ?>

                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                                
                                                
                                                <div class="col-lg-4">
                                                    <div class="primary_input mt-25">
                                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('common.address'); ?><span class="text-danger"> *</span></label>
                                                        <input
                                                            class="primary_input_field form-control<?php echo e($errors->has('address') ? ' is-invalid' : ''); ?>"
                                                            type="text" name="address" autocomplete="off"
                                                            value="<?php echo e(isset($update)? ($contact_us != ''? $contact_us->address:''):''); ?>">
                                                        
                                                        
                                                        <?php if($errors->has('address')): ?>
                                                        <span class="text-danger" >
                                                            <?php echo e($errors->first('address')); ?>

                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="primary_input mt-25">
                                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.address_text'); ?><span class="text-danger"> *</span></label>
                                                        <input
                                                            class="primary_input_field form-control<?php echo e($errors->has('address_text') ? ' is-invalid' : ''); ?>"
                                                            type="text" name="address_text" autocomplete="off"
                                                            value="<?php echo e(isset($update)? ($contact_us != ''? $contact_us->address_text:''):''); ?>">
                                                       
                                                        
                                                        <?php if($errors->has('address_text')): ?>
                                                        <span class="text-danger" >
                                                            <?php echo e($errors->first('address_text')); ?>

                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="primary_input mt-25">
                                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('common.phone'); ?><span class="text-danger"> *</span></label>
                                                        <input
                                                            class="primary_input_field form-control<?php echo e($errors->has('phone') ? ' is-invalid' : ''); ?>"
                                                            type="text" name="phone" autocomplete="off"
                                                            value="<?php echo e(isset($update)? ($contact_us != ''? $contact_us->phone:''):''); ?>">
                                                        
                                                        
                                                        <?php if($errors->has('phone')): ?>
                                                        <span class="text-danger" >
                                                            <?php echo e($errors->first('phone')); ?>

                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                        
                                        <div class="col-lg-12">
                                            <div class="row">
                                                
                                                
                                                <div class="col-lg-4">
                                                    <div class="primary_input mt-25">
                                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.phone_text'); ?> <span class="text-danger"> *</span></label>
                                                        <input
                                                            class="primary_input_field form-control<?php echo e($errors->has('phone_text') ? ' is-invalid' : ''); ?>"
                                                            type="text" name="phone_text" autocomplete="off"
                                                            value="<?php echo e(isset($update)? ($contact_us != ''? $contact_us->phone_text:''):''); ?>">
                                                      
                                                        
                                                        <?php if($errors->has('phone_text')): ?>
                                                        <span class="text-danger" >
                                                            <?php echo e($errors->first('phone_text')); ?>

                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="primary_input mt-25">
                                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('common.email'); ?><span class="text-danger"> *</span></label>
                                                        <input
                                                            class="primary_input_field form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>"
                                                            type="text" name="email" autocomplete="off"
                                                            value="<?php echo e(isset($update)? ($contact_us != ''? $contact_us->email:''):''); ?>">
                                                        
                                                        
                                                        <?php if($errors->has('email')): ?>
                                                        <span class="text-danger" >
                                                            <?php echo e($errors->first('email')); ?>

                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="primary_input mt-25">
                                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.email_text'); ?> <span class="text-danger"> *</span></label>
                                                        <input
                                                            class="primary_input_field form-control<?php echo e($errors->has('email_text') ? ' is-invalid' : ''); ?>"
                                                            type="text" name="email_text" autocomplete="off"
                                                            value="<?php echo e(isset($update)? ($contact_us != ''? $contact_us->email_text:''):''); ?>">
                                                        
                                                        
                                                        <?php if($errors->has('email_text')): ?>
                                                        <span class="text-danger" >
                                                            <?php echo e($errors->first('email_text')); ?>

                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>  
                                        <div class="col-lg-12">
                                            <div class="row">
                                                
                                                
                                                <div class="col-lg-3">
                                                    <div class="primary_input mt-25">
                                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.latitude'); ?><span class="text-danger"> *</span></label>
                                                        <input
                                                            class="primary_input_field form-control<?php echo e($errors->has('latitude') ? ' is-invalid' : ''); ?>"
                                                            type="text" name="latitude" autocomplete="off"
                                                            value="<?php echo e(isset($update)? ($contact_us != ''? $contact_us->latitude:''):''); ?>">
                                                       
                                                        
                                                        <?php if($errors->has('latitude')): ?>
                                                        <span class="text-danger" >
                                                            <?php echo e($errors->first('latitude')); ?>

                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="primary_input mt-25">
                                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.longitude'); ?><span class="text-danger"> *</span></label>
                                                        <input
                                                            class="primary_input_field form-control<?php echo e($errors->has('longitude') ? ' is-invalid' : ''); ?>"
                                                            type="text" name="longitude" autocomplete="off"
                                                            value="<?php echo e(isset($update)? ($contact_us != ''? $contact_us->longitude:''):''); ?>">
                                                       
                                                        
                                                        <?php if($errors->has('longitude')): ?>
                                                        <span class="text-danger" >
                                                            <?php echo e($errors->first('longitude')); ?>

                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                <div class="col-lg-2">
                                                    <div class="primary_input mt-25">
                                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.zoom_level'); ?><span class="text-danger"> *</span></label>
                                                        <input
                                                            class="primary_input_field form-control<?php echo e($errors->has('zoom_level') ? ' is-invalid' : ''); ?>"
                                                            type="text" name="zoom_level" autocomplete="off"
                                                            value="<?php echo e(isset($update)? ($contact_us != ''? $contact_us->zoom_level:''):''); ?>">
                                                      
                                                        
                                                        <?php if($errors->has('zoom_level')): ?>
                                                        <span class="text-danger" >
                                                            <?php echo e($errors->first('zoom_level')); ?>

                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>



                                                <div class="col-lg-4">
                                                    <div class="primary_input mt-25">
                                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.google_map_address'); ?><span class="text-danger"> *</span></label>
                                                        <input
                                                            class="primary_input_field form-control<?php echo e($errors->has('google_map_address') ? ' is-invalid' : ''); ?>"
                                                            type="text" name="google_map_address" autocomplete="off"
                                                            value="<?php echo e(isset($update)? ($contact_us != ''? $contact_us->google_map_address:''):''); ?>">
                                                      
                                                        
                                                        <?php if($errors->has('google_map_address')): ?>
                                                        <span class="text-danger" >
                                                            <?php echo e($errors->first('google_map_address')); ?>

                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>      
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="primary_input mt-25">
                                                <div class="primary_input">
                                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('common.description'); ?> <span class="text-danger"> *</span> </label>
                                                    <textarea class="primary_input_field form-control" cols="0" rows="5" name="description" id="description"><?php echo e(isset($update)? ($contact_us != ''? $contact_us->description:''):''); ?></textarea>
                                                    
                                                    <?php if($errors->has('description')): ?>
                                                    <span class="text-danger" >
                                                        <?php echo e($errors->first('description')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        
                                    <div class="row no-gutters input-right-icon mt-35">
                                            <div class="col">
                                                <div class="primary_input">
                                                    <input class="primary_input_field form-control<?php echo e($errors->has('image') ? ' is-invalid' : ''); ?>" id="placeholderInput" type="text"
                                                           
                                                           placeholder="<?php echo e(isset($update) and $contact_us ? ($contact_us->image !="") ? getFilePath3($contact_us->image) : trans('front_settings.image') .' *' : trans('front_settings.image') .' *'); ?>"
                                                           readonly>
                                                    
                                                    <?php if($errors->has('image')): ?>
                                                        <span class="text-danger mb-10" role="alert">
                                                            <?php echo e($errors->first('image')); ?>

                                                        </span>
                                                        <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <button class="primary-btn-small-input" type="button">
                                                    <label class="primary-btn small fix-gr-bg"
                                                           for="browseFile"><?php echo app('translator')->get('common.browse'); ?></label>
                                                    <input type="file" class="d-none" id="browseFile" name="image">
                                                </button>
                                            </div>
                                            

                                        </div>
                                    <span class="mt-10"><?php echo app('translator')->get('front_settings.image'); ?>(1420px*450px)</span>



                                    <div class="row mt-40">
                                        <div class="col-lg-12 text-center">
                                            <?php if(Illuminate\Support\Facades\Config::get('app.app_sync')): ?>
                                                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Disabled For Demo "> <button class="primary-btn fix-gr-bg  demo_view" style="pointer-events: none;" type="button" ><?php echo app('translator')->get('front_settings.update'); ?> </button></span>
                                            <?php else: ?>

                                                <button class="primary-btn fix-gr-bg">
                                                    <span class="ti-check"></span>
                                                    <?php if(isset($update)): ?>
                                                        <?php echo app('translator')->get('front_settings.update'); ?>
                                                    <?php else: ?>
                                                        <?php echo app('translator')->get('front_settings.save'); ?>
                                                    <?php endif; ?>
                                                </button>
                                            <?php endif; ?>    
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
            </div>
            <?php endif; ?>

            <div class="row">

                <div class="col-lg-12">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-lg-4 no-gutters">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php echo app('translator')->get('front_settings.info'); ?></h3>
                                </div>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-lg-12 scroll_table">
    
                                <div class="table-responsive">
                                    <table class="table school-table-style" cellspacing="0" width="100%">
    
                                        <thead>
                                        <tr>
                                            <th width="10%"><?php echo app('translator')->get('front_settings.title'); ?></th>
                                            <th width="20%"><?php echo app('translator')->get('common.description'); ?></th>
                                            <th width="10%"><?php echo app('translator')->get('front_settings.button_text'); ?></th>
                                            <th width="10%"><?php echo app('translator')->get('front_settings.button_url'); ?> </th>
                                            <th width="10%"><?php echo app('translator')->get('front_settings.image'); ?></th>
                                            <th width="10%"><?php echo app('translator')->get('common.action'); ?></th>
                                        </tr>
                                        </thead>
        
                                        <tbody>
                                        
                                            <tr>
                                                <td width="10%"><?php echo e($contact_us != ""? $contact_us->title:""); ?></td>
                                                <td width="20%"><?php echo e($contact_us != ""? $contact_us->description:""); ?></td>
                                                <td width="10%"><?php echo e($contact_us != ""? $contact_us->button_text:""); ?></td>
                                                <td width="10%"><?php echo e($contact_us != ""? $contact_us->button_url:""); ?></td>
                                                
                                                <td width="10%">
                                                    <?php if($contact_us != ""): ?>
                                                        <?php if(userPermission('contactPageStore')): ?>
                                                            <a class="primary-btn small fix-gr-bg" data-toggle="modal" data-target="#showimageModal"  href="#"><?php echo app('translator')->get('common.view'); ?></a>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </td>
                                                <?php if(userPermission('contactPageEdit')): ?>
                                                    <td width="10%"><a href="<?php echo e(route('contactPageEdit')); ?>" class="primary-btn small fix-gr-bg"><?php echo app('translator')->get('common.edit'); ?></a></td>
                                                <?php endif; ?>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>


    <div class="modal fade admin-query" id="showimageModal">
    <div class="modal-dialog modal-dialog-centered max_modal">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo app('translator')->get('common.view_image'); ?></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body p-0">
                <div class="container student-certificate">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 text-center">
                            <div class="mb-5">
                                <img class="img-fluid" src="<?php echo e(asset($contact_us != ''? $contact_us->image:'')); ?>">
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\frontSettings\contact_us.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('front_settings.home_page'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('front_settings.home_settings_page'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('front_settings.front_settings'); ?></a>
                    <a href="#"><?php echo app('translator')->get('front_settings.home_page'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area">
        <div class="container-fluid p-0">
            <div class="row">
                        <div class="col-lg-12">
                            <?php if(userPermission('admin-home-page-update')): ?>
                                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'admin-home-page-update', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?> 
                            <?php endif; ?>
                                <div class="white-box">
                                    <div class="main-title">
                                        <h3 class="mb-15">  <?php echo app('translator')->get('front_settings.home_page_update'); ?> </h3>
                                    </div> 
                                            <div class="row"> 
                                                <div class="col-lg-6"> 
                                                    <div class="primary_input">
                                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.title'); ?></label>
                                                        <input class="primary_input_field form-control" type="text" name="title" autocomplete="off" value="<?php echo e(isset($links)?@$links->title:''); ?>">
                                                       
                                                        
                                                    </div> 
                                                </div> 
                                                <div class="col-lg-6"> 
                                                    <div class="primary_input">
                                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.heading'); ?></label>
                                                        <input class="primary_input_field form-control" type="text" name="long_title" autocomplete="off"  value="<?php echo e(isset($links)?@$links->long_title:''); ?>" >
                                                        
                                                        
                                                    </div> 
                                                </div>
                                            </div>   
                                            <div class="row mt-15">  
                                                <div class="col-lg-12"> 
                                                    <div class="primary_input">
                                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.short_description'); ?> </label>
                                                        <input class="primary_input_field form-control" type="text" name="short_description" autocomplete="off" value="<?php echo e(isset($links)?@$links->short_description:''); ?>">
                                                        
                                                        
                                                    </div> 
                                                </div>  
                                            </div>   

 
                                            <div class="row mt-15">                                                 
                                               <script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/print/2.1.1_jquery.min.js"></script>
                                                <div class="col-lg-4 mt-40"> 
                                                    <img src="<?php echo e(isset($links)?@$links->image:''); ?>" style="width: 100%; height: auto;" alt="<?php echo e(isset($links)?@$links->title:''); ?>" id="blahImg">
                                              
                                                    
                                                    <div class="row mt-15">
                                                        
                                                        <div class="col-lg-12 mt-15">
                                                            <div class="primary_input">
                                                                <div class="primary_file_uploader">
                                                                    <input class="primary_input_field" type="text" id="placeholderFileFourName" placeholder="<?php echo app('translator')->get('front_settings.upload_background_image'); ?> (1420x670)"
                                                                    readonly="">
                                                                    <button class="" type="button">
                                                                        <label class="primary-btn small fix-gr-bg" for="imgInpBac"><?php echo e(__('common.browse')); ?></label>
                                                                        <input type="file" class="d-none" name="image" id="imgInpBac">
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php if($errors->has('image')): ?>
                                                                <strong class="error text-danger"><?php echo e($errors->first('image')); ?>

                                                        <?php endif; ?>
                                                    </div>
                                                </div> 

                                                <div class="col-lg-4"> </div>
                                                    <div class="col-lg-4 mt-25"> 
                                                        <p><?php echo app('translator')->get('front_settings.set_permission_in_home'); ?></strong></p>
                                                        <hr>
                                                        <?php $__currentLoopData = $permisions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="">
                                                                <input type="checkbox" id="role_<?php echo e(@$row->id); ?>"
                                                                    class="common-checkbox" value="<?php echo e(@$row->id); ?>"
                                                                    name="permisions[]" <?php echo e((@$row->is_published==1)? 'checked': ''); ?>>
                                                                <label for="role_<?php echo e(@$row->id); ?>"><?php echo e(@$row->name); ?></label>
                                                            </div>

                                                            
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>    
                                            <?php 
                                                $tooltip = "";
                                                if(userPermission('admin-home-page-update')){
                                                        $tooltip = "";
                                                    }else{
                                                        $tooltip = "You have no permission to add";
                                                    }
                                            ?>
                                            <div class="row mt-25">
                                                <div class="col-lg-12 text-center">
                                                    <?php if(Illuminate\Support\Facades\Config::get('app.app_sync')): ?>
                                                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Disabled For Demo "> <button class="primary-btn fix-gr-bg  demo_view" style="pointer-events: none;" type="button" ><?php echo app('translator')->get('front_settings.update'); ?></button></span>
                                                        <?php else: ?>
                                                    <button class="primary-btn fix-gr-bg" data-toggle="tooltip" title="<?php echo e(@$tooltip); ?>">
                                                        <span class="ti-check"></span> 
                                                            <?php echo app('translator')->get('front_settings.update'); ?> 
                                                    </button>
                                                    <?php endif; ?>
                                                </div>
                                            </div>


                            </div>
                            <?php echo e(Form::close()); ?>

                        </div> 
                </div>
 
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        $(document).on('change', '#imgInpBac', function(event){
            getFileName($(this).val(),'#placeholderFileFourName');
            imageChangeWithFile($(this)[0],'#blahImg');
        });
    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\frontSettings\homePageBackend.blade.php ENDPATH**/ ?>
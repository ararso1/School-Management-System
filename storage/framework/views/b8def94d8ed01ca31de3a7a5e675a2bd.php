<?php $__env->startSection('mainContent'); ?>


    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('system_settings.manage_sample_data'); ?> </h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('system_settings.system_settings'); ?></a>
                    <a href="#"><?php echo app('translator')->get('system_settings.sample_data'); ?> </a>
                </div>
            </div>
        </div>
    </section>   

    <section class="admin-visitor-area up_admin_visitor empty_table_tab">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                               aria-controls="home" aria-selected="true"><?php echo app('translator')->get('system_settings.empty_sample_data'); ?>  </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                               aria-controls="profile" aria-selected="false"><?php echo app('translator')->get('system_settings.restore_data'); ?></a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                            <div class="white-box">
                                <div class="add-visitor">
                                    <div class="row">
                                        <?php if(Illuminate\Support\Facades\Config::get('app.app_sync')): ?>
                                            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'admin-dashboard', 'method' => 'GET', 'enctype' => 'multipart/form-data'])); ?>

                                        <?php else: ?>
                                            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'database-delete','method' => 'POST'])); ?>

                                        <?php endif; ?>
                                        
                                        <div class="col-lg-12 text-center">
                                            <h5 class="text-center"><?php echo app('translator')->get('system_settings.all_database_table_list'); ?></h5>
                                        </div>

                                        <div class="col-lg-12">
                                            <?php if(session()->has('message-success')): ?>
                                                <div class="alert alert-success">
                                                    <?php echo e(session()->get('message-success')); ?>

                                                </div>
                                            <?php elseif(session()->has('message-danger')): ?>
                                                <div class="alert alert-danger">
                                                    <?php echo e(session()->get('message-danger')); ?>

                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="row mt-40 mb-30">


                                        <?php $count = 0;

                                        foreach($table_list_with_count as $row){
                                        @$name = str_replace('sm_', '', @$row);
                                        @$name = str_replace('_', ' ', @$name);
                                        @$name = ucfirst(@$name);
                                        @$notdeleteable = [
                                            'users', 'sm_role_permissions', 'sm_modules', 'sm_module_links', 'sm_base_setups',
                                            'sm_base_groups', 'roles', 'languages', 'sm_languages', 'sm_language_phrases', 'sm_countries',
                                            'sm_currencies', 'sm_general_settings', 'continents', 'sm_email_settings', 'password_resets',
                                            'sm_backups', 'sm_dashboard_settings', 'sm_date_formats', 'sm_frontend_persmissions', 'migrations',
                                            'countries', 'sm_about_pages', 'sm_contact_pages', 'sm_testimonials', 'sm_home_page_settings', 'sm_courses',
                                            'sm_academic_years', 'sm_payment_gateway_settings', 'sm_sms_gateways', 'sm_payment_methhods',
                                            'sm_background_settings', 'sm_dashboard_settings', 'sm_setup_admins', 'sm_custom_links', 'sm_weekends',
                                            'sm_schools', 'sm_marks_grades','sm_styles','sm_news_categories','sm_events','sm_module_permission_assigns', 'sm_module_permissions', 'sm_time_zones'];

                                        if(!in_array(@$table_list[@$count], @$notdeleteable)){
                                        ?>
                                        <div class="col-lg-4">
                                            <input type="checkbox" id="D<?php echo e(@$table_list[@$count]); ?>"
                                                   class="common-checkbox form-control<?php echo e($errors->has('permisions') ? ' is-invalid' : ''); ?>"
                                                   name="permisions[]" value="<?php echo e(@$table_list[@$count]); ?>">
                                            <label for="D<?php echo e(@$table_list[@$count]); ?>"> <?php echo e(@$name); ?> </label>
                                        </div>
                                        <?php
                                        }
                                        @$count++;
                                        }
                                        ?>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-9 text-right">
                                            <div class="primary-btn fix-gr-bg">
                                                <input id="selectAll" class="common-checkbox form-control"
                                                       type="checkbox" name="select-all"/><label for="selectAll"> <?php echo app('translator')->get('common.select'); ?>
                                                        <?php echo app('translator')->get('common.all'); ?></label>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 text-right">


                                                <?php if(Illuminate\Support\Facades\Config::get('app.app_sync')): ?>
                                                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Disabled For Demo "> <button class="primary-btn small fix-gr-bg  demo_view" style="pointer-events: none;" type="button" >   <?php echo app('translator')->get('system_settings.empty_sample_data'); ?></button></span>
                                            <?php else: ?>
                                            <button class="primary-btn fix-gr-bg small">
                                                    <span class="ti-check"></span>
                                                    <?php echo app('translator')->get('system_settings.empty_sample_data'); ?> 
                                                </button>
                                            <?php endif; ?> 

                                          
                                        </div>
                                    </div>
                                    <?php echo e(Form::close()); ?>


                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                            <div class="white-box">
                                <div class="add-visitor">
                                    <div class="row">

                                        <div class="col-lg-9 text-center">
                                            <p class="text-left"> <?php echo app('translator')->get('system_settings.restore_message'); ?> </p>
                                        </div>
                                        <div class="col-lg-3 text-right">

                                            

                                            <a href="<?php echo e(url('database-restore')); ?>" class="primary-btn fix-gr-bg small"> <span  class="ti-check"></span><?php echo app('translator')->get('system_settings.sample_data_restore'); ?> </a>
                                        </div>
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

<?php $__env->startSection('script'); ?>
    <script language="JavaScript">

        $('#selectAll').click(function () {
            $('input:checkbox').prop('checked', this.checked);

        });


    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\systemSettings\tableEmpty.blade.php ENDPATH**/ ?>
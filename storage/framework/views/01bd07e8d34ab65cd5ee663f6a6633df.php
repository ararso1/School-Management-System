<?php
    if (Auth::user() == "") { header('location:' . url('/login')); exit(); }

    Session::put('permission', App\GlobalVariable::GlobarModuleLinks());

    if(Module::find('FeesCollection')){
        $module = Module::find('FeesCollection');
        $module_name = @$module->getName();
        $module_status = @$module->isDisabled();
    }else{
        $module_name =NULL;
        $module_status =TRUE;
    }
?>
<input type="hidden" name="url" id="url" value="<?php echo e(url('/')); ?>">
<nav id="sidebar">
    <div class="sidebar-header update_sidebar">
        <a href="<?php echo e(url('/')); ?>">
            <img  src="<?php echo e(file_exists(@generalSetting()->logo) ? asset(generalSetting()->logo) : asset('public/uploads/settings/logo.png')); ?>" alt="logo">
        </a>
        <a id="close_sidebar" class="d-lg-none">
            <i class="ti-close"></i>
        </a>
    </div>
    
    <ul class="list-unstyled components">
 

        <li>

            <?php if(Auth::user()->role_id == 1 || moduleStatusCheck('SaasHr')== TRUE): ?>
                <a href="<?php echo e(route('superadmin-dashboard')); ?>" id="admin-dashboard">
            <?php else: ?>
                <a href="<?php echo e(route('admin-dashboard')); ?>" id="admin-dashboard">
            <?php endif; ?>
            
                <span class="flaticon-speedometer"></span>
                <?php echo app('translator')->get('common.dashboard'); ?>
            </a>
        </li>


    <li>
        <a href="#subMenuStudentRegistration" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
           
            <div class="nav_icon_small">
                <span class="flaticon-reading"></span>
                </div>
                <div class="nav_title">
                    <?php echo app('translator')->get('student.registration'); ?>
                </div>
        </a>
        <ul class="collapse list-unstyled" id="subMenuStudentRegistration">
           
            <li>
                <a href="<?php echo e(route('parentregistration/saas-student-list')); ?>"> <?php echo app('translator')->get('common.student_list'); ?></a>
            </li>
            <li>
                <a href="<?php echo e(route('parentregistration/settings')); ?>"> <?php echo app('translator')->get('system_settings.settings'); ?></a>
            </li>
        </ul>
    </li>


    <li>
        <a href="#subMenuAdministrator" data-toggle="collapse" aria-expanded="false"
            class="dropdown-toggle">
            
           
            
            <div class="nav_icon_small">
                <span class="flaticon-analytics"></span>
                </div>
                <div class="nav_title">
                    <?php echo app('translator')->get('system_sttings.institution'); ?>
                </div>
        </a>
        <ul class="collapse list-unstyled" id="subMenuAdministrator">
            <li>
                <a href="<?php echo e(route('administrator/institution-list')); ?>"><?php echo app('translator')->get('system_sttings.institution_list'); ?></a>
            </li>
        </ul>
    </li>

    <li>
        <a href="#subMenuSubscription" data-toggle="collapse" aria-expanded="false"
            class="dropdown-toggle">
           
           
            <div class="nav_icon_small">
                <span class="flaticon-analytics"></span>
                </div>
                <div class="nav_title">
                    <?php echo app('translator')->get('common.subscription'); ?>
                </div>
        </a>
        <ul class="collapse list-unstyled" id="subMenuSubscription">
            <li>
                <a href="<?php echo e(route('subscription/packages')); ?>"><?php echo app('translator')->get('common.package'); ?></a>
            </li>
            <li>
                <a href="<?php echo e(route('subscription/payment-method')); ?>"><?php echo app('translator')->get('accounts.payment_method'); ?></a>
            </li>
            <li>
                <a href="<?php echo e(route('subscription/payment-method-setting')); ?>"><?php echo app('translator')->get('accounts.payment_method_setting'); ?></a>
            </li>
            <li>
                <a href="<?php echo e(route('subscription/settings')); ?>"> <?php echo app('translator')->get('system_settings.settings'); ?></a>
            </li>


            <li>
                <a href="<?php echo e(route('TrailInstitution')); ?>"> <?php echo app('translator')->get('common.trial_institutions'); ?></a>
            </li>


            <li>
                <a href="<?php echo e(route('subscription/school-payments')); ?>">  <?php echo app('translator')->get('accounts.all_payments'); ?></a>
            </li>

            <li>
                <a href="<?php echo e(route('subscription/payment-history')); ?>">  <?php echo app('translator')->get('accounts.payment_history'); ?></a>
            </li>
        </ul>
    </li>
    
    
    
    
    
    <li>
    <a href="#subMenuCommunicate" data-toggle="collapse" aria-expanded="false"
        class="dropdown-toggle">
        
        <div class="nav_icon_small">
            <span class="flaticon-email"></span>
            </div>
            <div class="nav_title">
                <?php echo app('translator')->get('communicate.communicate'); ?>
            </div>
    </a>
    <ul class="collapse list-unstyled" id="subMenuCommunicate">
        <li>
            <a href="<?php echo e(route('administrator/send-mail')); ?>"><?php echo app('translator')->get('communicate.send_mail'); ?></a>
            <a href="<?php echo e(route('administrator/send-sms')); ?>"><?php echo app('translator')->get('communicate.send_sms'); ?></a>
            <a href="<?php echo e(route('administrator/send-notice')); ?>"><?php echo app('translator')->get('communicate.send_notice'); ?></a>
        </li>
    </ul>
    </li>
    
    <li>
    <a href="#subMenuInfixInvoice" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
        <span class="flaticon-accounting"></span> Reports </a>
    <ul class="collapse list-unstyled" id="subMenuInfixInvoice">
        <li><a href="<?php echo e(route('administrator/student-list')); ?>"><?php echo app('translator')->get('common.student_list'); ?></a></li>
        <li><a href="<?php echo e(route('administrator/income-expense')); ?>"><?php echo app('translator')->get('accounts.date_to'); ?>/<?php echo app('translator')->get('accounts.expense'); ?></a></li>
        <li><a href="<?php echo e(route('administrator/teacher-list')); ?>"><?php echo app('translator')->get('hr.teacher_list'); ?></a></li>
        <li><a href="<?php echo e(route('administrator/class-list')); ?>"><?php echo app('translator')->get('common.class_list'); ?></a></li>
        <li><a href="<?php echo e(route('administrator/class-routine')); ?>"><?php echo app('translator')->get('common.class_routine'); ?></a></li>
        <li><a href="<?php echo e(route('administrator/student-attendance')); ?>"><?php echo app('translator')->get('student.student_attendance'); ?></a></li>
        <li><a href="<?php echo e(route('administrator/staff-attendance')); ?>"><?php echo app('translator')->get('hr.staff_attendance'); ?></a></li>
        <li><a href="<?php echo e(route('administrator/merit-list-report')); ?>"><?php echo app('translator')->get('exam.merit_list_report'); ?></a></li>
        <li><a href="<?php echo e(route('saas_mark_sheet_report_student')); ?>"><?php echo app('translator')->get('exam.mark_sheet_report'); ?></a></li>
        
        <li><a href="<?php echo e(url('administrator/tabulation-sheet-report')); ?>"><?php echo app('translator')->get('reports.tabulation_sheet_report'); ?></a></li>
    
        <li><a href="<?php echo e(route('administrator/progress-card-report')); ?>">Progress Card Report</a></li>
    </ul>
    </li>
    <li>
    <a href="#subMenusystemSettings" data-toggle="collapse" aria-expanded="false"
        class="dropdown-toggle">
       
       
        <div class="nav_icon_small">
            <span class="flaticon-settings"></span>
            </div>
            <div class="nav_title">
                <?php echo app('translator')->get('system_settings.system_settings'); ?>
            </div>
    </a>
    <ul class="collapse list-unstyled" id="subMenusystemSettings">
        
            <li>
                <a href="<?php echo e(route('manage-adons')); ?>"><?php echo app('translator')->get('system_settings.module_manager'); ?></a>
            </li>
            <li>
                <a href="<?php echo e(route('administrator/general-settings')); ?>"> <?php echo app('translator')->get('system_settings.general_settings'); ?></a>
            </li>
         
            <li>
                <a href="<?php echo e(route('administrator/email-settings')); ?>"><?php echo app('translator')->get('system_settings.email_settings'); ?></a>
            </li>
            <li>
                <a href="<?php echo e(route('sms-settings')); ?>"><?php echo app('translator')->get('system_settings.sms_settings'); ?></a>
            </li>
    
            <li>
                <a href="<?php echo e(route('administrator/manage-currency')); ?>"><?php echo app('translator')->get('system_settings.manage-currency'); ?></a>
            </li>
            
        
            
        
        
            
        
            
        
            
        
            
        
            <li>
                <a href="<?php echo e(route('base_setup')); ?>"><?php echo app('translator')->get('system_settings.base_setup'); ?></a>
            </li>
        
            
        
            
            

            <?php if(moduleStatusCheck(152)): ?> 
                            <li>
                    <a href="<?php echo e(route('payment_method')); ?>"> <?php echo app('translator')->get('system_settings.payment_method'); ?></a>
                </li>
            <?php endif; ?>

            <li>
                <a href="<?php echo e(route('payment-method-settings')); ?>"><?php echo app('translator')->get('system_settings.payment_method_settings'); ?></a>
            </li>
            
            <li>
                <a href="<?php echo e(route('language-list')); ?>"><?php echo app('translator')->get('system_settings.language'); ?></a>
            </li>
            <li>
                <a href="<?php echo e(route('administrator/language-settings')); ?>"><?php echo app('translator')->get('system_settings.language_settings'); ?></a>
            </li>
        
            <li>
                <a href="<?php echo e(route('administrator/backup-settings')); ?>"><?php echo app('translator')->get('system_settings.backup_settings'); ?></a>
            </li>
            <li>
                <a href="<?php echo e(route('button-disable-enable')); ?>"><?php echo app('translator')->get('system_settings.button_manage'); ?> </a>
            </li>
            <li>
                <a href="<?php echo e(route('templatesettings.email-template')); ?>"><?php echo app('translator')->get('common.email_template'); ?></a>
            </li>
            <li>
                <a href="<?php echo e(route('sms-template')); ?>"><?php echo app('translator')->get('system_settings.sms_template'); ?></a>
            </li>
            <li>
                <a href="<?php echo e(route('about-system')); ?>"><?php echo app('translator')->get('system_settings.about'); ?></a>
            </li>
            <li>
                <a href="<?php echo e(route('update-system')); ?>"><?php echo app('translator')->get('common.update'); ?></a>
            </li>
        
            
        
        
    
    </ul>
    </li>
    
    
    
    
                    <li>
                        <a href="#subMenusystemStyle" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle">
                            
                            
                            <div class="nav_icon_small">
                                <span class="flaticon-settings"></span>
                                </div>
                                <div class="nav_title">
                                    <?php echo app('translator')->get('style.style'); ?>
                                </div>
                        </a>
                        <ul class="collapse list-unstyled" id="subMenusystemStyle">
                                <li>
                                    <a href="<?php echo e(route('background-setting')); ?>"><?php echo app('translator')->get('style.background_settings'); ?></a>
                                    
                                </li>
                                <li>
                                    <a href="<?php echo e(route('color-style')); ?>"><?php echo app('translator')->get('style.color_theme'); ?></a>
                                    
                                </li>
                        </ul>
                    </li>
    
                    <li>
                        <a href="#subMenuApi" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle">
                          
                            
                            <div class="nav_icon_small">
                                <span class="flaticon-settings"></span>
                                </div>
                                <div class="nav_title">
                                    <?php echo app('translator')->get('virtual_meeting.api_permission'); ?>
                                </div>
                        </a>
                        <ul class="collapse list-unstyled" id="subMenuApi">
                                <li>
                                    <a href="<?php echo e(route('administrator/api/permission')); ?>"><?php echo app('translator')->get('virtual_meeting.api_permission'); ?> </a>
                                </li>
                        </ul>
                    </li>
    
    
    
                    
    
    
    <li>
    <a href="#Ticket" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
     
        
          
        <div class="nav_icon_small">
            <span class="flaticon-settings"></span>
            </div>
            <div class="nav_title">
                <?php echo app('translator')->get('system_settings.ticket_system'); ?>
            </div>
    </a>
    <ul class="collapse list-unstyled" id="Ticket">
        <li><a href="<?php echo e(route('ticket-category')); ?>"> <?php echo app('translator')->get('system_settings.ticket_category'); ?></a></li>
        <li><a href="<?php echo e(route('ticket-priority')); ?>"><?php echo app('translator')->get('system_settings.ticket_priority'); ?></a></li>
        <li><a href="<?php echo e(route('admin/ticket-view')); ?>"><?php echo app('translator')->get('system_settings.ticket_list'); ?></a> </li> 
    </ul>
    </li>
    
    


    
    
    
    

       
        
        
        
        
            


    </ul>
</nav>
<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\partials\saas_menu.blade.php ENDPATH**/ ?>
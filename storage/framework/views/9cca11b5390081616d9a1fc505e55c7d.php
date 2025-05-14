

<li>

    <?php if(Auth::user()->role_id == 1 || moduleStatusCheck('SaasHr')== TRUE): ?>
    <?php dd(1); ?>;
        <a href="<?php echo e(route('superadmin-dashboard')); ?>" id="admin-dashboard">
    <?php else: ?>
        <a href="<?php echo e(route('admin-dashboard')); ?>" id="admin-dashboard">
    <?php endif; ?>
    
        <span class="flaticon-speedometer"></span>
        <?php echo app('translator')->get('common.dashboard'); ?>
    </a>
    </li>
    <li>
    <a href="#subMenuAdministrator" data-toggle="collapse" aria-expanded="false"
        class="dropdown-toggle">
        <span class="flaticon-analytics"></span>
        <?php echo app('translator')->get('common.institution'); ?>
        
    </a>
    <ul class="collapse list-unstyled" id="subMenuAdministrator">
        <li>
            <a href="<?php echo e(route('administrator/institution-list')); ?>"><?php echo app('translator')->get('common.institution_list'); ?></a>
        </li>
    </ul>
    </li>
    
    
    
    
    
    <li>
    <a href="#subMenuCommunicate" data-toggle="collapse" aria-expanded="false"
        class="dropdown-toggle">
        <span class="flaticon-email"></span>
        <?php echo app('translator')->get('communicate.communicate'); ?>
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
        <li><a href="<?php echo e(route('administrator/teacher-list')); ?>"><?php echo app('translator')->get('common.teacher_list'); ?></a></li>
        <li><a href="<?php echo e(route('administrator/class-list')); ?>"><?php echo app('translator')->get('common.class_list'); ?></a></li>
        <li><a href="<?php echo e(route('administrator/class-routine')); ?>"><?php echo app('translator')->get('academics.class_routine'); ?></a></li>
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
        <span class="flaticon-settings"></span>
        <?php echo app('translator')->get('system_settings.system_settings'); ?>
    </a>
    <ul class="collapse list-unstyled" id="subMenusystemSettings">
        
            <li>
                <a href="<?php echo e(route('administrator/general-settings')); ?>"> <?php echo app('translator')->get('system_settings.general_settings'); ?></a>
            </li>
        
            <li>
                <a href="<?php echo e(route('administrator/email-settings')); ?>"><?php echo app('translator')->get('system_settings.email_settings'); ?></a>
            </li>
    
            <li>
                <a href="<?php echo e(route('administrator/manage-currency')); ?>"><?php echo app('translator')->get('system_settings.manage-currency'); ?></a>
            </li>
            
        
            
        
        
            
        
            <li>
                <a href="<?php echo e(route('administrator/module-permission')); ?>"><?php echo app('translator')->get('system_settings.module_permission'); ?></a>
            </li>
        
            
        
            <li>
                <a href="<?php echo e(route('base_group')); ?>"><?php echo app('translator')->get('system_settings.base_group'); ?></a>
            </li>
        
            <li>
                <a href="<?php echo e(route('base_setup')); ?>"><?php echo app('translator')->get('system_settings.base_setup'); ?></a>
            </li>
        
            
        
            
            
            <li>
                <a href="<?php echo e(route('administrator/language-settings')); ?>"><?php echo app('translator')->get('system_settings.language_settings'); ?></a>
            </li>
        
            <li>
                <a href="<?php echo e(route('administrator/backup-settings')); ?>"><?php echo app('translator')->get('system_settings.backup_settings'); ?></a>
            </li>
        
            <li>
                <a href="<?php echo e(route('administrator/update-system')); ?>"><?php echo app('translator')->get('system_settings.update_system'); ?></a>
            </li>
        
        <?php if(Auth::user()->role_id == 1): ?>
            <li>
                <a href="<?php echo e(route('administrator/admin-data-delete')); ?>"><?php echo app('translator')->get('system_settings.SampleDataEmpty'); ?></a>
            </li>
        <?php endif; ?>
    
    </ul>
    </li>
    
    
    
    
                    <li>
                        <a href="#subMenusystemStyle" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle">
                            <span class="flaticon-settings"></span>
                            <?php echo app('translator')->get('style.style'); ?>
                        </a>
                        <ul class="collapse list-unstyled" id="subMenusystemStyle">
                                <li>
                                    <a href="<?php echo e(route('administrator/background-setting')); ?>"><?php echo app('translator')->get('style.background_settings'); ?></a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('administrator/color-style')); ?>"><?php echo app('translator')->get('style.color_theme'); ?></a>
                                </li>
                        </ul>
                    </li>
    
                    <li>
                        <a href="#subMenuApi" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle">
                            <span class="flaticon-settings"></span>
                            <?php echo app('translator')->get('system_settings.api_permission'); ?>
                        </a>
                        <ul class="collapse list-unstyled" id="subMenuApi">
                                <li>
                                    <a href="<?php echo e(route('administrator/api/permission')); ?>"><?php echo app('translator')->get('system_settings.api_permission'); ?> </a>
                                </li>
                        </ul>
                    </li>
    
    
    
                    <li>
                        <a href="#subMenufrontEndSettings" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle">
                            <span class="flaticon-software"></span>
                            <?php echo app('translator')->get('front_settings.front_settings'); ?>
                        </a>
                        <ul class="collapse list-unstyled" id="subMenufrontEndSettings">
                            <li>
                                <a href="<?php echo e(route('admin-home-page')); ?>"> <?php echo app('translator')->get('front_settings.home_page'); ?> </a>
                            </li>
    
                            <li>
                                <a href="<?php echo e(route('news')); ?>"><?php echo app('translator')->get('front_settings.news_list'); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('news-category')); ?>"><?php echo app('translator')->get('front_settings.news_category'); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('testimonial')); ?>"><?php echo app('translator')->get('front_settings.testimonial'); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('course-list')); ?>"><?php echo app('translator')->get('front_settings.course_list'); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('conpactPage')); ?>"><?php echo app('translator')->get('front_settings.contact_page'); ?> </a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('contactMessage')); ?>"><?php echo app('translator')->get('front_settings.contact_message'); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('about-page')); ?>"> <?php echo app('translator')->get('front_settings.about_us'); ?> </a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('custom-links')); ?>"> <?php echo app('translator')->get('front_settings.custom_links'); ?> </a>
                            </li>
                        </ul>
                    </li>
    
    
    <li>
    <a href="#Ticket" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
        <span class="flaticon-settings"></span>
        <?php echo app('translator')->get('system_settings.ticket_system'); ?>
    </a>
    <ul class="collapse list-unstyled" id="Ticket">
        <li><a href="<?php echo e(route('ticket.category')); ?>"> <?php echo app('translator')->get('system_settings.ticket_category'); ?></a></li>
        <li><a href="<?php echo e(route('ticket.priority')); ?>"><?php echo app('translator')->get('system_settings.ticket_priority'); ?></a></li>
        <li><a href="<?php echo e(route('admin.ticket_list')); ?>"><?php echo app('translator')->get('system_settings.ticket_list'); ?></a>
        </li>
    </ul>
    </li>
    
    
    
    
    
    

       
        
        
        
        
            <?php /**PATH C:\xampp\htdocs\resources\views\backEnd\partials\administrator_menu.blade.php ENDPATH**/ ?>
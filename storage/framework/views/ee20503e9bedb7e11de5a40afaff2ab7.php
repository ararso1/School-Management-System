<?php if(userPermission('student-dashboard') && menuStatus(1)): ?>
    <li data-position="<?php echo e(menuPosition(1)); ?>" class="sortable_li">
        <a href="<?php echo e(route('student-dashboard')); ?>">
            <div class="nav_icon_small">
                <span class="flaticon-resume"></span>
                </div>
                <div class="nav_title">
                <span><?php echo app('translator')->get('common.dashboard'); ?></span>
                    
                </div>
        </a>
    </li>
<?php endif; ?>
<?php if(userPermission('student-profile') && menuStatus(11)): ?>
    <li data-position="<?php echo e(menuPosition(11)); ?>" class="sortable_li">
        <a href="<?php echo e(route('student-profile')); ?>">
            
            <div class="nav_icon_small">
                <span class="flaticon-resume"></span>
                </div>
                <div class="nav_title">
                    <span><?php echo app('translator')->get('student.my_profile'); ?></span>
                    
                </div>
        </a>
    </li>
<?php endif; ?>
<?php if(generalSetting()->fees_status == 0): ?>
    <?php if(userPermission('fees') && menuStatus(20)): ?>
        <li data-position="<?php echo e(menuPosition(20)); ?>" class="sortable_li">
            <a href="javascript:void(0)" class="has-arrow" aria-expanded="false">                
                <div class="nav_icon_small">
                    <span class="flaticon-wallet"></span>
                </div>
                <div class="nav_title">
                    <span><?php echo app('translator')->get('fees.fees'); ?></span>
                </div>
            </a>
            <ul class="list-unstyled" >
                <?php if(moduleStatusCheck('FeesCollection')== false ): ?>
                    <li data-position="<?php echo e(menuPosition('student_fees')); ?>">
                        <a href="<?php echo e(route('student_fees')); ?>"><?php echo app('translator')->get('fees.pay_fees'); ?></a>
                    </li>
                <?php else: ?>
                    <li data-position="<?php echo e(menuPosition(21)); ?>">
                        <a href="<?php echo e(route('feescollection/student-fees')); ?>"><?php echo app('translator')->get('fees.pay_fees'); ?></a>
                    </li>

                <?php endif; ?>
            </ul>
        </li>
    <?php endif; ?>
<?php endif; ?>

<?php if(generalSetting()->fees_status == 1 && isMenuAllowToShow('fees')): ?>
    <?php if ($__env->exists('fees::sidebar.feesStudentSidebar')) echo $__env->make('fees::sidebar.feesStudentSidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>



<?php if(moduleStatusCheck('Lms') == true): ?>
    <?php if(userPermission('lms') && menuStatus(1500)): ?>
        <li data-position="<?php echo e(menuPosition(1500)); ?>" class="sortable_li">
            <a href="javascript:void(0)" class="has-arrow" aria-expanded="false">
                <div class="nav_icon_small">
                    <span class="flaticon-reading"></span>
                </div>
                <div class="nav_title">
                    <span> <?php echo app('translator')->get('lms::lms.lms'); ?></span>
                   
                </div>
            </a>
            <ul class="list-unstyled" id="lmsButtonMenu">
                <?php if(userPermission(1500) && menuStatus(1500)): ?>
                    <li data-position="<?php echo e(menuPosition(1555)); ?>">
                        <a href="<?php echo e(route('lms.allCourse', [auth()->user()->id])); ?>"><?php echo app('translator')->get('lms::lms.course'); ?></a>
                    </li>
                <?php endif; ?>
 
                <?php if(generalSetting()->lms_checkout): ?>
                    <?php if(userPermission(1500) && menuStatus(1500)): ?>
                        <li data-position="<?php echo e(menuPosition(1555)); ?>">
                            <a href="<?php echo e(route('lms.enrolledCourse',[auth()->user()->id] )); ?>"><?php echo app('translator')->get('lms::lms.my_course'); ?></a>
                        </li>
                    <?php endif; ?> 
                    <?php if(userPermission(1500) && menuStatus(1500)): ?>
                        <li data-position="<?php echo e(menuPosition(1555)); ?>">
                            <a href="<?php echo e(route('lms.student.purchaseLog', [auth()->user()->id])); ?>"><?php echo app('translator')->get('lms::lms.purchase_history'); ?></a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if(userPermission(1500) && menuStatus(1504)): ?>
                    <li data-position="<?php echo e(menuPosition(1504)); ?>">
                        <a href="<?php echo e(route('lms.student.quiz')); ?>"><?php echo app('translator')->get('lms::lms.my_quiz'); ?></a>
                    </li>
                <?php endif; ?>
                <?php if(userPermission(1500) && menuStatus(1505)): ?>
                    <li data-position="<?php echo e(menuPosition(1505)); ?>">
                        <a href="<?php echo e(route('lms.student.quizReport')); ?>"><?php echo app('translator')->get('lms::lms.quiz_report'); ?></a>
                    </li>
                <?php endif; ?>

                <?php if(userPermission(1500) && menuStatus(1505)): ?>
                    <li data-position="<?php echo e(menuPosition(1505)); ?>">
                        <a href="<?php echo e(route('lms.student.certificate', auth()->id())); ?>"><?php echo app('translator')->get('lms::lms.certificate'); ?></a>
                    </li>
                <?php endif; ?>

                
            </ul>
        </li>
    <?php endif; ?>
<?php endif; ?>



<?php if(moduleStatusCheck('Wallet') == true): ?>
    <li data-position="<?php echo e(menuPosition('wallet.my-wallet')); ?>" class="sortable_li">
        <a href="<?php echo e(route('wallet.my-wallet')); ?>">
            <div class="nav_icon_small">
                <span class="flaticon-wallet"></span>
            </div>
            <div class="nav_title">
                <span> <?php echo app('translator')->get('wallet::wallet.my_wallet'); ?></span>
               
            </div>
        </a>
    </li>
<?php endif; ?>


<?php if(userPermission('student_class_routine') && menuStatus(22)): ?>
    <li data-position="<?php echo e(menuPosition(22)); ?>" class="sortable_li">
        <a href="<?php echo e(route('student_class_routine')); ?>">
          
            
            <div class="nav_icon_small">
                <span class="flaticon-calendar-1"></span>
                </div>
                <div class="nav_title">
                    <span> <?php echo app('translator')->get('academics.class_routine'); ?></span>
                   
                </div>
        </a>
    </li>
<?php endif; ?>

<?php if(userPermission('lesson') && menuStatus(800)): ?>
    <li data-position="<?php echo e(menuPosition(800)); ?>" class="sortable_li">
        <a href="javascript:void(0)" class="has-arrow" aria-expanded="false">
            
            <div class="nav_icon_small">
                <span class="flaticon-calendar-1"></span>
                </div>
                <div class="nav_title">
                    <span><?php echo app('translator')->get('lesson::lesson.lesson'); ?></span>
                    
                </div>
        </a>
        <ul class="list-unstyled" >
            <?php if(userPermission('lesson-student-lessonPlan') && menuStatus(810)): ?>
                <li data-position="<?php echo e(menuPosition(810)); ?>">
                    <a href="<?php echo e(route('lesson-student-lessonPlan')); ?>"><?php echo app('translator')->get('lesson::lesson.lesson_plan'); ?></a>
                </li>
            <?php endif; ?>
            <?php if(userPermission('lesson-student-lessonPlan-overview') && menuStatus(815)): ?>
                <li data-position="<?php echo e(menuPosition(815)); ?>">
                    <a
                        href="<?php echo e(route('lesson-student-lessonPlan-overview')); ?>"><?php echo app('translator')->get('lesson::lesson.lesson_plan_overview'); ?></a>
                </li>
            <?php endif; ?>
        </ul>
    </li>
<?php endif; ?>
<?php if(userPermission('student_homework') && menuStatus(23)): ?>
    <li data-position="<?php echo e(menuPosition(23)); ?>" class="sortable_li">
        <a href="<?php echo e(route('student_homework')); ?>">           
            <div class="nav_icon_small">
                <span class="flaticon-book"></span>
                </div>
                <div class="nav_title">
                    <span><?php echo app('translator')->get('homework.home_work'); ?></span>
                    
                </div>
        </a>
    </li>
<?php endif; ?>
<?php if(userPermission(26) && menuStatus(26) && isMenuAllowToShow('study_material')): ?>
    <li data-position="<?php echo e(menuPosition(26)); ?>" class="sortable_li">
        <a href="javascript:void(0)" class="has-arrow" aria-expanded="false">
           
            
            <div class="nav_icon_small">
                <span class="flaticon-data-storage"></span>
                </div>
                <div class="nav_title">
                    <span><?php echo app('translator')->get('study.download_center'); ?></span>
                    
                </div>
        </a>
        <ul class="list-unstyled" id="subMenuDownloadCenter">
            <?php if(userPermission('student_assignment') && menuStatus(27)): ?>
                <li data-position="<?php echo e(menuPosition(27)); ?>">
                    <a href="<?php echo e(route('student_assignment')); ?>"><?php echo app('translator')->get('study.assignment'); ?></a>
                </li>
            <?php endif; ?>
            

        </ul>
    </li>
<?php endif; ?>

<?php if(userPermission('student_noticeboard') && menuStatus(48)): ?>
    <li data-position="<?php echo e(menuPosition(48)); ?>" class="sortable_li">
        <a href="<?php echo e(route('student_noticeboard')); ?>">
            <div class="nav_icon_small">
                <span class="flaticon-poster"></span>
                </div>
                <div class="nav_title">
                    <span><?php echo app('translator')->get('communicate.notice_board'); ?></span>
                    
                </div>
        </a>
    </li>
<?php endif; ?>
<?php if(userPermission('student_subject') && menuStatus(49)): ?>
    <li data-position="<?php echo e(menuPosition(49)); ?>" class="sortable_li">
        <a href="<?php echo e(route('student_subject')); ?>">
            <div class="nav_icon_small">
                <span class="flaticon-reading-1"></span>
                </div>
                <div class="nav_title">
                    <span>  <?php echo app('translator')->get('common.subjects'); ?></span>
                  
                </div>
        </a>
    </li>
<?php endif; ?>
<?php if(userPermission('student_teacher') && menuStatus(50)): ?>
    <li data-position="<?php echo e(menuPosition(50)); ?>" class="sortable_li">
        <a href="<?php echo e(route('student_teacher')); ?>">
           
           
            <div class="nav_icon_small">
                <span class="flaticon-professor"></span>
                </div>
                <div class="nav_title">
                    <span> <?php echo app('translator')->get('common.teacher'); ?></span>
                   
                </div>
        </a>
    </li>
<?php endif; ?>

<?php if(userPermission('leave') && menuStatus(39)): ?>
    <li data-position="<?php echo e(menuPosition(39)); ?>" class="sortable_li">
        <a href="javascript:void(0)" class="has-arrow" aria-expanded="false">
            
            
            <div class="nav_icon_small">
                <span class="flaticon-slumber"></span>
                </div>
                <div class="nav_title">
                    <span> <?php echo app('translator')->get('leave.leave'); ?></span>
                   
                </div>
        </a>
        <ul class="list-unstyled" id="subMenuLeaveManagement">

            <?php if(userPermission('student-apply-leave') && menuStatus(40)): ?>

                <li data-position="<?php echo e(menuPosition(40)); ?>">
                    <a href="<?php echo e(route('student-apply-leave')); ?>"><?php echo app('translator')->get('leave.apply_leave'); ?></a>
                </li>
            <?php endif; ?>

            <?php if(userPermission('student-pending-leave') && menuStatus(44)): ?>

                <li data-position="<?php echo e(menuPosition(44)); ?>">
                    <a href="<?php echo e(route('student-pending-leave')); ?>"><?php echo app('translator')->get('leave.pending_leave_request'); ?></a>
                </li>
            <?php endif; ?>
        </ul>
    </li>
<?php endif; ?>


<?php if(userPermission(51) && menuStatus(51)): ?>
    <li data-position="<?php echo e(menuPosition(51)); ?>" class="sortable_li">
        <a href="javascript:void(0)" class="has-arrow" aria-expanded="false">
           
            <div class="nav_icon_small">
                <span class="flaticon-book-1"></span>
                </div>
                <div class="nav_title">
                    <span><?php echo app('translator')->get('library.library'); ?></span>
                    
                </div>
        </a>
        <ul class="list-unstyled" id="subMenuStudentLibrary">
            <?php if(userPermission('student_library') && menuStatus(52)): ?>
                <li data-position="<?php echo e(menuPosition(52)); ?>">
                    <a href="<?php echo e(route('student_library')); ?>"> <?php echo app('translator')->get('library.book_list'); ?></a>
                </li>
            <?php endif; ?>
            <?php if(userPermission('student_book_issue') && menuStatus(53)): ?>
                <li data-position="<?php echo e(menuPosition(53)); ?>">
                    <a href="<?php echo e(route('student_book_issue')); ?>"><?php echo app('translator')->get('library.book_issue'); ?></a>
                </li>
            <?php endif; ?>
        </ul>
    </li>
<?php endif; ?>
<?php if(userPermission('student_transport') && menuStatus(54)): ?>
    <li data-position="<?php echo e(menuPosition(54)); ?>" class="sortable_li">
        <a href="<?php echo e(route('student_transport')); ?>">
            
           
            
            <div class="nav_icon_small">
                <span class="flaticon-bus"></span>
                </div>
                <div class="nav_title">
                    <span><?php echo app('translator')->get('transport.transport'); ?></span>
                    
                </div>
        </a>
    </li>
<?php endif; ?>
<?php if(userPermission('student_dormitory') && menuStatus(55)): ?>
    <li data-position="<?php echo e(menuPosition(55)); ?>" class="sortable_li">
        <a href="<?php echo e(route('student_dormitory')); ?>">
           
           
            <div class="nav_icon_small">
                <span class="flaticon-hotel"></span>
                </div>
                <div class="nav_title">
                    <span> <?php echo app('translator')->get('dormitory.dormitory'); ?></span>
                   
                </div>
        </a>
    </li>
<?php endif; ?>

<?php if(isMenuAllowToShow('chat')): ?>
<?php echo $__env->make('chat::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<!-- Zoom Menu -->
<?php if(moduleStatusCheck('Zoom') == true): ?>

    <?php echo $__env->make('zoom::menu.Zoom', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<!-- BBB Menu -->
<?php if(moduleStatusCheck('BBB') == true): ?>
    <?php echo $__env->make('bbb::menu.bigbluebutton_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php if(moduleStatusCheck('Gmeet') == true): ?>
    <?php echo $__env->make('gmeet::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>



<!-- Jitsi Menu -->
<?php if(moduleStatusCheck('Jitsi') == true): ?>
    <?php echo $__env->make('jitsi::menu.jitsi_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\partials\student_sidebar.blade.php ENDPATH**/ ?>
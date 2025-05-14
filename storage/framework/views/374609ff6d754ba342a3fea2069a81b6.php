<?php if(userPermission('parent-dashboard') && menuStatus(56)): ?>
    <li data-position="<?php echo e(menuPosition(56)); ?>" class="sortable_li">
        <a href="<?php echo e(route('parent-dashboard')); ?>">
            <div class="nav_icon_small">
                <span class="flaticon-resume"></span>
            </div>
            <div class="nav_title">
                <span><?php echo app('translator')->get('common.dashboard'); ?></span>

            </div>
        </a>
    </li>
<?php endif; ?>
<?php if(userPermission('my-children') && menuStatus(66)): ?>
    <li data-position="<?php echo e(menuPosition(66)); ?>" class="sortable_li">
        <a href="javascript:void(0)" class="has-arrow" aria-expanded="false">
            <div class="nav_icon_small">
                <span class="flaticon-reading"></span>
            </div>
            <div class="nav_title">
                <span> <?php echo app('translator')->get('common.my_children'); ?></span>

            </div>
        </a>
        <ul class="list-unstyled" id="subMenuParentMyChildren">


            <?php $__currentLoopData = $childrens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <a href="<?php echo e(route('my_children', [$children->id])); ?>"><?php echo e($children->full_name); ?></a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </li>
<?php endif; ?>

<?php if(moduleStatusCheck('Lms') == true): ?>
    <?php if(userPermission('lms') && menuStatus(1500)): ?>
        <li data-position="<?php echo e(menuPosition(1500)); ?>" class="sortable_li">
            <a href="javascript:void(0)" class="has-arrow" aria-expanded="false">
                <div class="nav_icon_small">
                    <span class="flaticon-reading"></span>
                </div>
                <div class="nav_title">
                    <span><?php echo app('translator')->get('lms::lms.lms'); ?></span>

                </div>
            </a>
            <ul class="list-unstyled" id="lmsButtonMenu">
                <?php $__currentLoopData = $childrens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(userPermission(1508) && menuStatus(1508)): ?>
                        <li data-position="<?php echo e(menuPosition(1508)); ?>" class="sortable_li">
                            <a href="<?php echo e(route('lms.allCourse', [$children->user_id])); ?>"><?php echo app('translator')->get('lms::lms.all_course'); ?>
                                (<?php echo e($children->full_name); ?>)
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if(userPermission(1509) && menuStatus(1509)): ?>
                        <li data-position="<?php echo e(menuPosition(1509)); ?>" class="sortable_li">
                            <a href="<?php echo e(route('lms.enrolledCourse', [$children->user_id])); ?>"><?php echo e($children->full_name); ?>

                                - <?php echo app('translator')->get('lms::lms.course'); ?></a>
                        </li>
                    <?php endif; ?>
                    <?php if(userPermission(1510) && menuStatus(1510)): ?>
                        <li data-position="<?php echo e(menuPosition(1510)); ?>" class="sortable_li">
                            <a href="<?php echo e(route('lms.student.purchaseLog', [$children->user_id])); ?>"><?php echo e($children->full_name); ?>

                                - <?php echo app('translator')->get('lms::lms.purchase_history'); ?></a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </li>
    <?php endif; ?>
<?php endif; ?>


<?php if(generalSetting()->fees_status == 0): ?>
    <?php if(userPermission('fees') && menuStatus(71)): ?>
        <li data-position="<?php echo e(menuPosition(71)); ?>" class="sortable_li">
            <a href="javascript:void(0)" class="has-arrow" aria-expanded="false">


                <div class="nav_icon_small">
                    <span class="flaticon-wallet"></span>
                </div>
                <div class="nav_title">
                    <span><?php echo app('translator')->get('fees.fees'); ?></span>

                </div>
            </a>
            <ul class="list-unstyled" id="subMenuParentFees">
                <?php $__currentLoopData = $childrens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(moduleStatusCheck('FeesCollection') == false): ?>
                        <li>
                            <a href="<?php echo e(route('parent_fees', [$children->id])); ?>"><?php echo e($children->full_name); ?></a>
                        </li>
                    <?php else: ?>
                        <li>
                            <a
                                href="<?php echo e(route('feescollection/parent-fee-payment', [$children->id])); ?>"><?php echo e($children->full_name); ?></a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </li>
    <?php endif; ?>
<?php endif; ?>

<?php if(moduleStatusCheck('Wallet') && isMenuAllowToShow('wallet')): ?>
    <?php if ($__env->exists('wallet::menu.sidebar')) echo $__env->make('wallet::menu.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php if(generalSetting()->fees_status == 1 && isMenuAllowToShow('fees')): ?>
    <?php if ($__env->exists('fees::sidebar.feesParentSidebar')) echo $__env->make('fees::sidebar.feesParentSidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php if(userPermission('parent_class_routine') && menuStatus(72)): ?>
    <li data-position="<?php echo e(menuPosition(72)); ?>" class="sortable_li">
        <a href="javascript:void(0)" class="has-arrow" aria-expanded="false">
            <div class="nav_icon_small">
                <span class="flaticon-calendar-1"></span>
            </div>
            <div class="nav_title">
                <span> <?php echo app('translator')->get('academics.class_routine'); ?></span>

            </div>
        </a>
        <ul class="list-unstyled" id="subMenuParentClassRoutine">
            <?php $__currentLoopData = $childrens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <a href="<?php echo e(route('parent_class_routine', [$children->id])); ?>"><?php echo e($children->full_name); ?></a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </li>
<?php endif; ?>

<?php if(userPermission('lesson') && menuStatus(97)): ?>
    <li data-position="<?php echo e(menuPosition(97)); ?>" class="sortable_li">
        <a href="javascript:void(0)" class="has-arrow" aria-expanded="false">
            <div class="nav_icon_small">
                <span class="flaticon-calendar-1"></span>
            </div>
            <div class="nav_title">
                <span> <?php echo app('translator')->get('lesson::lesson.lesson'); ?></span>

            </div>
        </a>
        <ul class="list-unstyled" id="subMenuLessonPlan">
            <?php $__currentLoopData = $childrens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(userPermission('lesson-parent-lessonPlan') && menuStatus(98)): ?>
                    <li data-position="<?php echo e(menuPosition(98)); ?>">
                        <a class="d-block pre-wrap" href="<?php echo e(route('lesson-parent-lessonPlan', [$children->id])); ?>">
                            <?php echo e($children->full_name); ?>-<?php echo app('translator')->get('lesson::lesson.lesson_plan'); ?></a>
                    </li>
                <?php endif; ?>
                <?php if(userPermission('lesson-parent-lessonPlan-overview') && menuStatus(99)): ?>
                    <li data-position="<?php echo e(menuPosition(99)); ?>">
                        <a class="d-block pre-wrap"
                            href="<?php echo e(route('lesson-parent-lessonPlan-overview', [$children->id])); ?>">
                            <?php echo e($children->full_name); ?>-<?php echo app('translator')->get('lesson::lesson.lesson_plan_overview'); ?></a>
                    </li>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </li>
<?php endif; ?>
<?php if(userPermission('parent_homework') && menuStatus(73)): ?>
    <li data-position="<?php echo e(menuPosition(73)); ?>" class="sortable_li">
        <a href="javascript:void(0)" class="has-arrow" aria-expanded="false">

            <div class="nav_icon_small">
                <span class="flaticon-book"></span>
            </div>
            <div class="nav_title">
                <span><?php echo app('translator')->get('homework.home_work'); ?></span>

            </div>
        </a>
        <ul class="list-unstyled" id="subMenuParentHomework">
            <?php $__currentLoopData = $childrens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <a href="<?php echo e(route('parent_homework', [$children->id])); ?>"><?php echo e($children->full_name); ?></a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </li>
<?php endif; ?>
<?php if(userPermission('parent_attendance') && menuStatus(75)): ?>
    <li data-position="<?php echo e(menuPosition(75)); ?>" class="sortable_li">
        <a href="javascript:void(0)" class="has-arrow" aria-expanded="false">

            <div class="nav_icon_small">
                <span class="flaticon-authentication"></span>
            </div>
            <div class="nav_title">
                <span>
                    <?php echo app('translator')->get('student.attendance'); ?></span>
            </div>
        </a>
        <ul class="list-unstyled" id="subMenuParentAttendance">
            <?php $__currentLoopData = $childrens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <a href="<?php echo e(route('parent_attendance', [$children->id])); ?>"><?php echo e($children->full_name); ?></a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </li>
<?php endif; ?>
<?php if(userPermission('exam') && menuStatus(76)): ?>
    <li data-position="<?php echo e(menuPosition(76)); ?>" class="sortable_li">
        <a href="javascript:void(0)" class="has-arrow" aria-expanded="false">


            <div class="nav_icon_small">
                <span class="flaticon-test"></span>
            </div>
            <div class="nav_title">
                <span>
                    <?php echo app('translator')->get('exam.exam'); ?></span>
            </div>
        </a>
        <ul class="list-unstyled" id="subMenuParentExamination">
            <?php $__currentLoopData = $childrens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(userPermission('parent_examination') && menuStatus(77)): ?>
                    <li data-position="<?php echo e(menuPosition(77)); ?>">
                        <a href="<?php echo e(route('parent_examination', [$children->id])); ?>"><?php echo e($children->full_name); ?></a>
                    </li>
                <?php endif; ?>
                <?php if(userPermission('parent_exam_schedule') && menuStatus(78)): ?>
                    <li data-position="<?php echo e(menuPosition(78)); ?>">
                        <a href="<?php echo e(route('parent_exam_schedule', [$children->id])); ?>"><?php echo app('translator')->get('exam.exam_schedule'); ?></a>
                    </li>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </li>
<?php endif; ?>



<?php if(moduleStatusCheck('ExamPlan') == true): ?>
    <?php if(userPermission('admit_card') && menuStatus(2503)): ?>
        <li data-position="<?php echo e(menuPosition(2503)); ?>" class="sortable_li">
            <a href="javascript:void(0)" class="has-arrow" aria-expanded="false">
                <div class="nav_icon_small">
                    <span class="flaticon-reading"></span>
                </div>
                <div class="nav_title">
                    <span>
                        <?php echo app('translator')->get('examplan::exp.admit_card'); ?></span>
                </div>
            </a>
            <ul class="list-unstyled" id="subMenuParentMyChildren">
                <?php $__currentLoopData = $childrens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a
                            href="<?php echo e(route('examplan.admitCardParent', [$children->id])); ?>"><?php echo e($children->full_name); ?></a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </li>
    <?php endif; ?>
<?php endif; ?>



<?php if(moduleStatusCheck('OnlineExam') == false): ?>

    <?php if(userPermission('online_exam') && menuStatus(2016)): ?>
        <li data-position="<?php echo e(menuPosition(2016)); ?>" class="sortable_li">
            <a href="javascript:void(0)" class="has-arrow" aria-expanded="false">
                <div class="nav_icon_small">
                    <span class="flaticon-test"></span>
                </div>
                <div class="nav_title">
                    <span>
                        <?php echo app('translator')->get('exam.online_exam'); ?></span>
                </div>
            </a>
            <ul class="list-unstyled" id="subMenuOnlineExam">
                <?php if(moduleStatusCheck('OnlineExam') == false): ?>
                    <?php $__currentLoopData = $childrens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(userPermission('parent_online_examination') && menuStatus(2018)): ?>
                            <li data-position="<?php echo e(menuPosition(2018)); ?>">
                                <a class="d-block pre-wrap"
                                    href="<?php echo e(route('parent_online_examination', [$children->id])); ?>"><?php echo app('translator')->get('exam.online_exam'); ?>
                                    - <?php echo e($children->full_name); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(userPermission('parent_online_examination_result') && menuStatus(2017)): ?>
                            <li data-position="<?php echo e(menuPosition(2017)); ?>">
                                <a class="d-block pre-wrap"
                                    href="<?php echo e(route('parent_online_examination_result', [$children->id])); ?>"><?php echo app('translator')->get('exam.online_exam_result'); ?>
                                    - <?php echo e($children->full_name); ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php endif; ?>
            </ul>
        </li>
    <?php endif; ?>
<?php endif; ?>
<?php if(moduleStatusCheck('OnlineExam') == true): ?>

    <?php if(userPermission('online_exam') && menuStatus(2101)): ?>
        <li data-position="<?php echo e(menuPosition(79)); ?>" class="sortable_li">
            <a href="javascript:void(0)" class="has-arrow" aria-expanded="false">
                <div class="nav_icon_small">
                    <span class="flaticon-test"></span>
                </div>
                <div class="nav_title">
                    <span>
                        <?php echo app('translator')->get('onlineexam::onlineExam.online_exam'); ?></span>
                </div>
            </a>
            <ul class="list-unstyled" id="subMenuOnlineExamModule">


                <?php $__currentLoopData = $childrens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(userPermission('om_parent_online_examination') && menuStatus(2001)): ?>
                        <li data-position="<?php echo e(menuPosition(2001)); ?>">
                            <a href="<?php echo e(route('om_parent_online_examination', $children->id)); ?>"> <?php echo app('translator')->get('onlineexam::onlineExam.online_exam'); ?>
                                <?php echo e(count($childrens) > 1 ? '-' . $children->full_name : ''); ?> </a>
                        </li>
                    <?php endif; ?>
                    <?php if(userPermission('om_parent_online_examination_result') && menuStatus(2002)): ?>
                        <li data-position="<?php echo e(menuPosition(2002)); ?>">
                            <a href="<?php echo e(route('om_parent_online_examination_result', $children->id)); ?>">
                                <?php echo app('translator')->get('onlineexam::onlineExam.online_exam_result'); ?> <?php echo e(count($childrens) > 1 ? '-' . $children->full_name : ''); ?> </a>
                        </li>
                    <?php endif; ?>
                    <?php if(userPermission('parent_pdf_exam') && menuStatus(2103)): ?>
                        <li data-position="<?php echo e(menuPosition(2103)); ?>">
                            <a href="<?php echo e(route('parent_pdf_exam', $children->id)); ?>"> <?php echo app('translator')->get('onlineexam::onlineExam.pdf_exam'); ?>
                                <?php echo e(count($childrens) > 1 ? '-' . $children->full_name : ''); ?> </a>
                        </li>
                    <?php endif; ?>
                    <?php if(userPermission('parent_view_pdf_result') && menuStatus(2104)): ?>
                        <li data-position="<?php echo e(menuPosition(2104)); ?>">
                            <a href="<?php echo e(route('parent_view_pdf_result', $children->id)); ?>"> <?php echo app('translator')->get('onlineexam::onlineExam.pdf_exam_result'); ?>
                                <?php echo e(count($childrens) > 1 ? '-' . $children->full_name : ''); ?> </a>
                        </li>
                    <?php endif; ?>

                    <hr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </ul>
        </li>
    <?php endif; ?>
<?php endif; ?>


<?php if(userPermission('parent_leave') && menuStatus(80)): ?>
    <li data-position="<?php echo e(menuPosition(80)); ?>" class="sortable_li">
        <a href="javascript:void(0)" class="has-arrow" aria-expanded="false">
            <div class="nav_icon_small">
                <span class="flaticon-test"></span>
            </div>
            <div class="nav_title">
                <span>
                    <?php echo app('translator')->get('leave.leave'); ?></span>
            </div>
        </a>
        <ul class="list-unstyled" id="subMenuParentLeave">
            <?php $__currentLoopData = $childrens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <a href="<?php echo e(route('parent_leave', [$children->id])); ?>"><?php echo e($children->full_name); ?></a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php if(userPermission('parent-apply-leave') && menuStatus(81)): ?>
                <li data-position="<?php echo e(menuPosition(81)); ?>">
                    <a href="<?php echo e(route('parent-apply-leave')); ?>"><?php echo app('translator')->get('leave.apply_leave'); ?></a>
                </li>
            <?php endif; ?>
            <?php if(userPermission('parent-pending-leave') && menuStatus(82)): ?>
                <li data-position="<?php echo e(menuPosition(82)); ?>">
                    <a href="<?php echo e(route('parent-pending-leave')); ?>"><?php echo app('translator')->get('leave.pending_leave_request'); ?></a>
                </li>
            <?php endif; ?>

        </ul>
    </li>
<?php endif; ?>
<?php if(userPermission('parent_noticeboard') && menuStatus(85)): ?>
    <li data-position="<?php echo e(menuPosition(85)); ?>" class="sortable_li">
        <a href="<?php echo e(route('parent_noticeboard')); ?>">
            <div class="nav_icon_small">
                <span class="flaticon-poster"></span>
            </div>
            <div class="nav_title">
                <span>
                    <?php echo app('translator')->get('communicate.notice_board'); ?></span>
            </div>
        </a>
    </li>
<?php endif; ?>
<?php if(userPermission('parent_subjects') && menuStatus(86)): ?>
    <li data-position="<?php echo e(menuPosition(86)); ?>" class="sortable_li">
        <a href="javascript:void(0)" class="has-arrow" aria-expanded="false">


            <div class="nav_icon_small">
                <span class="flaticon-reading-1"></span>
            </div>
            <div class="nav_title">
                <span>
                    <?php echo app('translator')->get('common.subjects'); ?></span>
            </div>
        </a>
        <ul class="list-unstyled" id="subMenuParentSubject">
            <?php $__currentLoopData = $childrens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <a href="<?php echo e(route('parent_subjects', [$children->id])); ?>"><?php echo e($children->full_name); ?></a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </li>
<?php endif; ?>
<?php if(userPermission('parent_teacher_list') && menuStatus(87)): ?>
    <li data-position="<?php echo e(menuPosition(87)); ?>" class="sortable_li">
        <a href="javascript:void(0)" class="has-arrow" aria-expanded="false">
            <div class="nav_icon_small">
                <span class="flaticon-professor"></span>
            </div>
            <div class="nav_title">
                <span>
                    <?php echo app('translator')->get('common.teacher_list'); ?></span>
            </div>
        </a>
        <ul class="list-unstyled" id="subMenuParentTeacher">
            <?php $__currentLoopData = $childrens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <a href="<?php echo e(route('parent_teacher_list', [$children->id])); ?>"><?php echo e($children->full_name); ?></a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </li>
<?php endif; ?>
<?php if(userPermission('p_library') && menuStatus(88)): ?>
    <li data-position="<?php echo e(menuPosition(88)); ?>" class="sortable_li">
        <a href="javascript:void(0)" class="has-arrow" aria-expanded="false">
            <div class="nav_icon_small">
                <span class="flaticon-book-1"></span>
            </div>
            <div class="nav_title">
                <span>
                    <?php echo app('translator')->get('library.library'); ?></span>
            </div>
        </a>
        <ul class="list-unstyled" id="subMenuStudentLibrary">
            <?php if(userPermission('parent_library') && menuStatus(89)): ?>
                <li data-position="<?php echo e(menuPosition(89)); ?>">
                    <a href="<?php echo e(route('parent_library')); ?>"> <?php echo app('translator')->get('library.book_list'); ?></a>
                </li>
            <?php endif; ?>
            <?php if(userPermission('parent_book_issue') && menuStatus(90)): ?>
                <li data-position="<?php echo e(menuPosition(90)); ?>">
                    <a href="<?php echo e(route('parent_book_issue')); ?>"><?php echo app('translator')->get('library.book_issue'); ?></a>
                </li>
            <?php endif; ?>
        </ul>
    </li>
<?php endif; ?>
<?php if(userPermission('parent_transport') && menuStatus(91)): ?>
    <li data-position="<?php echo e(menuPosition(91)); ?>" class="sortable_li">
        <a href="javascript:void(0)" class="has-arrow" aria-expanded="false">


            <div class="nav_icon_small">
                <span class="flaticon-bus"></span>
            </div>
            <div class="nav_title">
                <span>
                    <?php echo app('translator')->get('transport.transport'); ?></span>
            </div>
        </a>
        <ul class="list-unstyled" id="subMenuParentTransport">
            <?php $__currentLoopData = $childrens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <a href="<?php echo e(route('parent_transport', [$children->id])); ?>"><?php echo e($children->full_name); ?></a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </li>
<?php endif; ?>
<?php if(userPermission('parent_dormitory_list') && menuStatus(92)): ?>
    <li data-position="<?php echo e(menuPosition(92)); ?>" class="sortable_li">
        <a href="javascript:void(0)" class="has-arrow" aria-expanded="false">


            <div class="nav_icon_small">
                <span class="flaticon-hotel"></span>
            </div>
            <div class="nav_title">
                <span>
                    <?php echo app('translator')->get('dormitory.dormitory_list'); ?></span>
            </div>
        </a>
        <ul class="list-unstyled" id="subMenuParentDormitory">
            <?php $__currentLoopData = $childrens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <a href="<?php echo e(route('parent_dormitory_list', [$children->id])); ?>"><?php echo e($children->full_name); ?></a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </li>
<?php endif; ?>

<!-- chat module sidebar -->

<?php if(userPermission('chat') && menuStatus(910)): ?>
    <li data-position="<?php echo e(menuPosition(900)); ?>" class="sortable_li">
        <a href="javascript:void(0)" class="has-arrow" aria-expanded="false">


            <div class="nav_icon_small">
                <span class="flaticon-test"></span>
            </div>
            <div class="nav_title">
                <span>
                    <?php echo app('translator')->get('chat::chat.chat'); ?></span>
            </div>
        </a>
        <ul class="list-unstyled" id="subMenuChat">
            <?php if(userPermission('chat.index') && menuStatus(911)): ?>
                <li data-position="<?php echo e(menuPosition(901)); ?>">
                    <a href="<?php echo e(route('chat.index')); ?>"><?php echo app('translator')->get('chat::chat.chat_box'); ?></a>
                </li>
            <?php endif; ?>

            <?php if(userPermission('chat.invitation') && menuStatus(913)): ?>
                <li data-position="<?php echo e(menuPosition(903)); ?>">
                    <a href="<?php echo e(route('chat.invitation')); ?>"><?php echo app('translator')->get('chat::chat.invitation'); ?></a>
                </li>
            <?php endif; ?>

            <?php if(userPermission('chat.blocked.users') && menuStatus(914)): ?>
                <li data-position="<?php echo e(menuPosition(904)); ?>">
                    <a href="<?php echo e(route('chat.blocked.users')); ?>"><?php echo app('translator')->get('chat::chat.blocked_user'); ?></a>
                </li>
            <?php endif; ?>


        </ul>
    </li>
<?php endif; ?>

<!-- BBB Menu  -->
<?php if(moduleStatusCheck('BBB') == true): ?>
    <?php if(userPermission('bbb') && menuStatus(105)): ?>
        <li data-position="<?php echo e(menuPosition(105)); ?>" class="sortable_li">
            <a href="javascript:void(0)" class="has-arrow" aria-expanded="false">


                <div class="nav_icon_small">
                    <span class="flaticon-reading"></span>
                </div>
                <div class="nav_title">
                    <span>
                        <?php echo app('translator')->get('bbb::bbb.bbb'); ?></span>
                </div>
            </a>
            <ul class="list-unstyled" id="bigBlueButtonMenu">
                <?php $__currentLoopData = $childrens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(userPermission('bbb.parent.virtual-class') && menuStatus(106)): ?>
                        <li data-position="<?php echo e(menuPosition(106)); ?>">
                            <a href="<?php echo e(route('bbb.parent.virtual-class', [$children->id])); ?>">
                                <?php if(count($childrens) > 1): ?>
                                    <?php echo e($children->full_name); ?>

                                <?php endif; ?> <?php echo app('translator')->get('common.virtual_class'); ?>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if(userPermission('bbb.meetings') && menuStatus(107)): ?>
                    <li data-position="<?php echo e(menuPosition(107)); ?>">
                        <a href="<?php echo e(route('bbb.meetings')); ?>"><?php echo app('translator')->get('common.virtual_meeting'); ?></a>
                    </li>
                <?php endif; ?>
                <?php $__currentLoopData = $childrens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(userPermission('bbb.parent.class.recording.list') && menuStatus(115)): ?>
                        <li data-position="<?php echo e(menuPosition(115)); ?>">
                            <a href="<?php echo e(route('bbb.parent.class.recording.list', $children->id)); ?>">
                                <?php if(count($childrens) > 1): ?>
                                    <?php echo e($children->full_name); ?>

                                <?php endif; ?> <?php echo app('translator')->get('common.class_record_list'); ?>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php if(userPermission('bbb.parent.meeting.recording.list') && menuStatus(116)): ?>
                    <li data-position="<?php echo e(menuPosition(116)); ?>">
                        <a href="<?php echo e(route('bbb.parent.meeting.recording.list')); ?>"> <?php echo app('translator')->get('bbb::bbb.meeting_record_list'); ?></a>
                    </li>
                <?php endif; ?>

            </ul>
        </li>

    <?php endif; ?>

<?php endif; ?>
<!-- BBB  Menu end -->
<!-- Jitsi Menu  -->
<?php if(moduleStatusCheck('Jitsi') == true): ?>
    <?php if(userPermission('jitsi') && menuStatus(108)): ?>
        <li data-position="<?php echo e(menuPosition(108)); ?>" class="sortable_li">
            <a href="javascript:void(0)" class="has-arrow" aria-expanded="false">
                <div class="nav_icon_small">
                    <span class="flaticon-reading"></span>
                </div>
                <div class="nav_title">
                    <span>
                        <?php echo app('translator')->get('jitsi::jitsi.jitsi'); ?></span>
                </div>
            </a>
            <ul class="list-unstyled" id="subMenuJisti">
                <?php $__currentLoopData = $childrens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(userPermission('jitsi.parent.virtual-class') && menuStatus(109)): ?>
                        <li data-position="<?php echo e(menuPosition(109)); ?>">
                            <a href="<?php echo e(route('jitsi.parent.virtual-class', [$children->id])); ?>">
                                <?php if(count($childrens) > 1): ?>
                                    <?php echo e($children->full_name); ?>

                                <?php endif; ?> <?php echo app('translator')->get('common.virtual_class'); ?>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if(userPermission('jitsi.meetings') && menuStatus(110)): ?>
                    <li data-position="<?php echo e(menuPosition(110)); ?>">
                        <a href="<?php echo e(route('jitsi.meetings')); ?>"><?php echo app('translator')->get('common.virtual_meeting'); ?></a>
                    </li>
                <?php endif; ?>

            </ul>
        </li>

    <?php endif; ?>
<?php endif; ?>
<!-- jitsi Menu end -->

<!-- Zomm Menu  start -->
<?php if(moduleStatusCheck('Zoom') == true): ?>

    <?php if(userPermission('zoom') && menuStatus(100)): ?>
        <li data-position="<?php echo e(menuPosition(100)); ?>" class="sortable_li">
            <a href="javascript:void(0)" class="has-arrow" aria-expanded="false">
                <div class="nav_icon_small">
                    <span class="flaticon-reading"></span>
                </div>
                <div class="nav_title">
                    <span>
                        <?php echo app('translator')->get('zoom::zoom.zoom'); ?></span>
                </div>
            </a>
            <ul class="list-unstyled" id="zoomMenu">

                <?php $__currentLoopData = $childrens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(userPermission('zoom.parent.virtual-class') && menuStatus(101)): ?>
                        <li data-position="<?php echo e(menuPosition(101)); ?>">
                            <a href="<?php echo e(route('zoom.parent.virtual-class', [$children->id])); ?>">
                                <?php if(count($childrens) > 1): ?>
                                    <?php echo e($children->full_name); ?>

                                <?php endif; ?> <?php echo app('translator')->get('common.virtual_class'); ?>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if(userPermission('zoom.parent.meetings') && menuStatus(103)): ?>
                    <li data-position="<?php echo e(menuPosition(103)); ?>">
                        <a href="<?php echo e(route('zoom.parent.meetings')); ?>"><?php echo app('translator')->get('common.virtual_meeting'); ?></a>
                    </li>
                <?php endif; ?>

            </ul>
        </li>
    <?php endif; ?>
<?php endif; ?>
<!-- zoom Menu  -->
<?php if(moduleStatusCheck('Gmeet') == true): ?>
    <?php if(userPermission('gmeet') && menuStatus(3105)): ?>
        <li data-position="<?php echo e(menuPosition(3105)); ?>" class="sortable_li">
            <a href="javascript:void(0)" class="has-arrow" aria-expanded="false">
                <div class="nav_icon_small">
                    <span class="flaticon-reading"></span>
                </div>
                <div class="nav_title">
                    <span>
                        <?php echo app('translator')->get('gmeet::gmeet.gmeet'); ?></span>
                </div>
            </a>
            <ul class="list-unstyled" id="gmeetMenu">

                <?php $__currentLoopData = $childrens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(userPermission('g-meet.virtual-class.parent.virtual-class') && menuStatus(3106)): ?>
                        <li data-position="<?php echo e(menuPosition(3106)); ?>">
                            <a href="<?php echo e(route('g-meet.virtual-class.parent.virtual-class', [$children->id])); ?>">
                                <?php if(count($childrens) > 1): ?>
                                    <?php echo e($children->full_name); ?>

                                <?php endif; ?> <?php echo app('translator')->get('common.virtual_class'); ?>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if(userPermission('g-meet.virtual-meeting.index') && menuStatus(3107)): ?>
                    <li data-position="<?php echo e(menuPosition(3107)); ?>">
                        <a href="<?php echo e(route('g-meet.virtual-meeting.index')); ?>"><?php echo app('translator')->get('common.virtual_meeting'); ?></a>
                    </li>
                <?php endif; ?>

            </ul>
        </li>
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\partials\parents_sidebar.blade.php ENDPATH**/ ?>
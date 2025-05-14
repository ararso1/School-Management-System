<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('communicate.sms_template'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>


<section class="sms-breadcrumb mb-20 up_breadcrumb">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('communicate.sms_template'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('system_settings.system_settings'); ?></a>
                <a href="#"><?php echo app('translator')->get('communicate.sms_template'); ?></a>
            </div>
        </div>
    </div>
</section>

<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
        <?php if(isset($certificate)): ?>
        <div class="row">
            <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                <a href="<?php echo e(route('student-certificate')); ?>" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus pr-2"></span>
                    <?php echo app('translator')->get('common.add'); ?>
                </a>
            </div>
        </div>
        <?php endif; ?>
        <div class="row">
           
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-title">
                            <h3 class="mb-30"><?php if(isset($certificate)): ?>
                                    <?php echo app('translator')->get('common.edit'); ?>
                                <?php else: ?>
                                    <?php echo app('translator')->get('common.add'); ?>
                                <?php endif; ?>
                                <?php echo app('translator')->get('communicate.sms_template'); ?>
                            </h3>
                        </div>
                          <?php if(userPermission("sms-template-new-store")): ?>
                            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => array('sms-template-store',$template->id), 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                         <?php endif; ?>
                        <div class="white-box">
                            <div class="add-visitor">
                                <div class="row mt-25">
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
                                        <span class="text-primary">[name] [check_in_time] [father_name] [AttendanceDate] [checkout_time] [early_checkout_time] [dob] [present_address] [guardian] [created_at] [admission_no] [roll_no] [class] [section] [gender] [admission_date] [category] [cast] [father_name] [mother_name] [religion] [email] [phone]</span>
                                        
                                    </div>
                                </div>

                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('communicate.student_admission_progress_sms'); ?> <span></span></label>
                                            <textarea class="primary_input_field form-control<?php echo e($errors->has('admission_pro') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="admission_pro" maxlength="500"><?php echo e(isset($template)? $template->admission_pro: old('admission_pro')); ?></textarea>
                                           
                                            

                                            <?php if($errors->has('admission_pro')): ?>
                                                <span class="error text-danger"><?php echo e($errors->first('admission_pro')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('communicate.student_admitted_message_sms'); ?> <span></span></label>
                                            <textarea class="primary_input_field form-control<?php echo e($errors->has('student_admit') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="student_admit" maxlength="500"><?php echo e(isset($template)? $template->student_admit: old('student_admit')); ?></textarea>
                                           
                                            

                                            <?php if($errors->has('student_admit')): ?>
                                                <span class="error text-danger"><?php echo e($errors->first('student_admit')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('communicate.login_permission_disable_sms'); ?> <span></span></label>
                                            <textarea class="primary_input_field form-control<?php echo e($errors->has('login_disable') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="login_disable" maxlength="500"><?php echo e(isset($template)? $template->login_disable: old('login_disable')); ?></textarea>
                                            
                                            

                                            <?php if($errors->has('login_disable')): ?>
                                                <span class="error text-danger"><?php echo e($errors->first('login_disable')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('exam.exam_schedule'); ?> <span></span></label>
                                            <textarea class="primary_input_field form-control<?php echo e($errors->has('exam_schedule') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="exam_schedule" maxlength="500"><?php echo e(isset($template)? $template->exam_schedule: old('exam_schedule')); ?></textarea>
                                            
                                            

                                            <?php if($errors->has('exam_schedule')): ?>
                                                <span class="error text-danger"><?php echo e($errors->first('exam_schedule')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('communicate.exam_publish'); ?> <span></span></label>
                                            
                                            <textarea class="primary_input_field form-control<?php echo e($errors->has('exam_publish') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="exam_publish" maxlength="500"><?php echo e(isset($template)? $template->exam_publish: old('exam_publish')); ?></textarea>
                                            

                                            <?php if($errors->has('exam_publish')): ?>
                                                <span class="error text-danger"><?php echo e($errors->first('exam_publish')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('communicate.due_fees'); ?> <span></span></label>
                                            <textarea class="primary_input_field form-control<?php echo e($errors->has('due_fees') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="due_fees" maxlength="500"><?php echo e(isset($template)? $template->due_fees: old('due_fees')); ?></textarea>
                                            
                                            

                                            <?php if($errors->has('due_fees')): ?>
                                                <span class="error text-danger"><?php echo e($errors->first('due_fees')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('fees.collect_fees'); ?> <span></span></label>
                                            <textarea class="primary_input_field form-control<?php echo e($errors->has('collect_fees') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="collect_fees" maxlength="500"><?php echo e(isset($template)? $template->collect_fees: old('collect_fees')); ?></textarea>
                                            
                                            

                                            <?php if($errors->has('collect_fees')): ?>
                                                <span class="error text-danger"><?php echo e($errors->first('collect_fees')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('student.student_promote'); ?> <span></span></label>
                                            
                                            <textarea class="primary_input_field form-control<?php echo e($errors->has('stu_promote') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="stu_promote" maxlength="500"><?php echo e(isset($template)? $template->stu_promote: old('stu_promote')); ?></textarea>
                                           

                                            <?php if($errors->has('stu_promote')): ?>
                                                <span class="error text-danger"><?php echo e($errors->first('stu_promote')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('communicate.attendance_sms'); ?> <span></span></label>
                                            <textarea class="primary_input_field form-control<?php echo e($errors->has('attendance_sms') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="attendance_sms" maxlength="500"><?php echo e(isset($template)? $template->attendance_sms: old('attendance_sms')); ?></textarea>
                                           
                                            

                                            <?php if($errors->has('attendance_sms')): ?>
                                                <span class="error text-danger"><?php echo e($errors->first('attendance_sms')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('communicate.late_attendance_sms'); ?> <span></span></label>
                                            <textarea class="primary_input_field form-control<?php echo e($errors->has('late_sms') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="late_sms" maxlength="500"><?php echo e(isset($template)? $template->late_sms: old('late_sms')); ?></textarea>
                                          
                                            

                                            <?php if($errors->has('late_sms')): ?>
                                                <span class="error text-danger"><?php echo e($errors->first('late_sms')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('communicate.student_absent_attendance_sms'); ?> <span></span></label>
                                            
                                            <textarea class="primary_input_field form-control<?php echo e($errors->has('absent') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="absent" maxlength="500"><?php echo e(isset($template)? $template->absent: old('absent')); ?></textarea>
                                          

                                            <?php if($errors->has('absent')): ?>
                                                <span class="error text-danger"><?php echo e($errors->first('absent')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('communicate.student_early_checkout_sms'); ?> <span></span></label>
                                            
                                            <textarea class="primary_input_field form-control<?php echo e($errors->has('er_checkout') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="er_checkout" maxlength="500"><?php echo e(isset($template)? $template->er_checkout: old('er_checkout')); ?></textarea>
                                           

                                            <?php if($errors->has('er_checkout')): ?>
                                                <span class="error text-danger"><?php echo e($errors->first('er_checkout')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('communicate.student_checkout_sms'); ?> <span></span></label>
                                            <textarea class="primary_input_field form-control<?php echo e($errors->has('st_checkout') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="st_checkout" maxlength="500"><?php echo e(isset($template)? $template->st_checkout: old('st_checkout')); ?></textarea>
                                       
                                            

                                            <?php if($errors->has('st_checkout')): ?>
                                                <span class="error text-danger"><?php echo e($errors->first('st_checkout')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('communicate.student_credentials_sms'); ?> <span></span></label>
                                            <textarea class="primary_input_field form-control<?php echo e($errors->has('st_credentials') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="st_credentials" maxlength="500"><?php echo e(isset($template)? $template->st_credentials: old('st_credentials')); ?></textarea>
                                        
                                            

                                            <?php if($errors->has('st_credentials')): ?>
                                                <span class="error text-danger"><?php echo e($errors->first('st_credentials')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('communicate.staff_credentials_sms'); ?> <span></span></label>
                                            
                                            <textarea class="primary_input_field form-control<?php echo e($errors->has('staff_credentials') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="staff_credentials" maxlength="500"><?php echo e(isset($template)? $template->staff_credentials: old('staff_credentials')); ?></textarea>
                                           

                                            <?php if($errors->has('staff_credentials')): ?>
                                                <span class="error text-danger"><?php echo e($errors->first('staff_credentials')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('communicate.holiday_sms'); ?> <span></span></label>
                                            
                                            <textarea class="primary_input_field form-control<?php echo e($errors->has('holiday') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="holiday" maxlength="500"><?php echo e(isset($template)? $template->holiday: old('holiday')); ?></textarea>
                                           

                                            <?php if($errors->has('holiday')): ?>
                                                <span class="error text-danger"><?php echo e($errors->first('holiday')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('communicate.leave_application_sms'); ?> <span></span></label>
                                            <textarea class="primary_input_field form-control<?php echo e($errors->has('leave_app') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="leave_app" maxlength="500"><?php echo e(isset($template)? $template->leave_app: old('leave_app')); ?></textarea>
                                         
                                            

                                            <?php if($errors->has('leave_app')): ?>
                                                <span class="error text-danger"><?php echo e($errors->first('leave_app')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('communicate.leave_approve_sms'); ?> <span></span></label>
                                            <textarea class="primary_input_field form-control<?php echo e($errors->has('approve_sms') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="approve_sms" maxlength="500"><?php echo e(isset($template)? $template->approve_sms: old('approve_sms')); ?></textarea>
                                          
                                            

                                            <?php if($errors->has('approve_sms')): ?>
                                                <span class="error text-danger"><?php echo e($errors->first('approve_sms')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('communicate.student_birthday_sms'); ?> <span></span></label>
                                            <textarea class="primary_input_field form-control<?php echo e($errors->has('birth_st') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="birth_st" maxlength="500"><?php echo e(isset($template)? $template->birth_st: old('birth_st')); ?></textarea>
                                            
                                            

                                            <?php if($errors->has('birth_st')): ?>
                                                <span class="error text-danger"><?php echo e($errors->first('birth_st')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('communicate.staff_birthday_sms'); ?> <span></span></label>
                                            <textarea class="primary_input_field form-control<?php echo e($errors->has('birth_staff') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="birth_staff" maxlength="500"><?php echo e(isset($template)? $template->birth_staff: old('birth_staff')); ?></textarea>
                                           
                                            

                                            <?php if($errors->has('birth_staff')): ?>
                                                <span class="error text-danger"><?php echo e($errors->first('birth_staff')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('communicate.cheque_bounce_sms'); ?> <span></span></label>
                                            
                                            <textarea class="primary_input_field form-control<?php echo e($errors->has('cheque_bounce') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="cheque_bounce" maxlength="500"><?php echo e(isset($template)? $template->cheque_bounce: old('cheque_bounce')); ?></textarea>
                                          

                                            <?php if($errors->has('cheque_bounce')): ?>
                                                <span class="error text-danger"><?php echo e($errors->first('cheque_bounce')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('communicate.library_book_issue_sms'); ?> <span></span></label>
                                            
                                            <textarea class="primary_input_field form-control<?php echo e($errors->has('l_issue_b') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="l_issue_b" maxlength="500"><?php echo e(isset($template)? $template->l_issue_b: old('l_issue_b')); ?></textarea>
                                          

                                            <?php if($errors->has('l_issue_b')): ?>
                                                <span class="error text-danger"><?php echo e($errors->first('l_issue_b')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('communicate.return_issue_books_sms'); ?> <span></span></label>
                                            

                                            <textarea class="primary_input_field form-control<?php echo e($errors->has('re_issue_book') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="re_issue_book" maxlength="500"><?php echo e(isset($template)? $template->re_issue_book: old('re_issue_book')); ?></textarea>
                                         
                                            <?php if($errors->has('re_issue_book')): ?>
                                                <span class="error text-danger"><?php echo e($errors->first('re_issue_book')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                

                               
	                           <?php 
                                  $tooltip = "";
                                  if(userPermission("sms-template-new-store") ){
                                        $tooltip = "";
                                    }else{
                                        $tooltip = "You have no permission to add";
                                    }
                                ?>
                                
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn fix-gr-bg submit" data-toggle="tooltip" title="<?php echo e($tooltip); ?>">
                                            <span class="ti-check"></span>
                                            <?php if(isset($certificate)): ?>
                                                <?php echo app('translator')->get('common.update'); ?>
                                            <?php else: ?>
                                                <?php echo app('translator')->get('common.save'); ?>
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
           
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\communicate\sms_template.blade.php ENDPATH**/ ?>
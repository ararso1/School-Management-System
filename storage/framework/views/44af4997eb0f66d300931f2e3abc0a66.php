<?php $__env->startSection('title'); ?> 
<?php echo app('translator')->get('student.student_promote'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20 up_breadcrumb">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('student.student_promote'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('student.student_information'); ?></a>
                <a href="#"><?php echo app('translator')->get('student.student_promote'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="main-title">
                        <h3 class="mb-30"><?php echo app('translator')->get('common.select_criteria'); ?> </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'student-current-search', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_promoteA'])); ?>

                            <div class="row">
                                <div class="col-lg-3">
                                    <select class="primary_select  form-control<?php echo e($errors->has('current_session') ? ' is-invalid' : ''); ?>" name="current_session" id="current_session">
                                        <option data-display="<?php echo app('translator')->get('student.select_academic_year'); ?> *" value=""><?php echo app('translator')->get('student.select_academic_year'); ?> *</option>
                                        <?php $__currentLoopData = $sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($session->id); ?>" <?php echo e(isset($current_session)? ($current_session == $session->id? 'selected':''):''); ?>><?php echo e($session->year); ?> [<?php echo e($session->title); ?>]</option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('current_session')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('current_session')); ?>

                                    </span>
                                    <?php endif; ?>                                  
                                </div>
                                <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                <div class="col-lg-3 mt-30-md">
                                    <select class="primary_select  form-control<?php echo e($errors->has('current_class') ? ' is-invalid' : ''); ?>" id="classSelectStudent" name="current_class">
                                        <option data-display="<?php echo app('translator')->get('student.select_current_class'); ?> *" value=""><?php echo app('translator')->get('student.select_current_class'); ?> *</option>
                                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($class->id); ?>" <?php echo e(isset($current_class)? ($current_class == $class->id? 'selected':''):''); ?>><?php echo e($class->class_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <div class="pull-right loader loader_style" id="select_class_loader">
                                        <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                    </div>
                                     <?php if($errors->has('current_class')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('current_class')); ?>

                                    </span>
                                    <?php endif; ?> 
                                </div>
                                <div class="col-lg-2 mt-30-md" id="sectionStudentDiv">
                                    <select class="primary_select  form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?>" id="sectionSelectStudent" name="section">
                                        <option data-display="<?php echo app('translator')->get('common.select_section'); ?> *" value=""><?php echo app('translator')->get('common.select_section'); ?></option>
                                    </select>
                                    <div class="pull-right loader loader_style" id="select_section_loader">
                                        <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                    </div>
                                    <?php if($errors->has('section')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('section')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>

                                <div class="col-lg-2 mt-30-md">
                                    <select class="primary_select form-control<?php echo e($errors->has('exam') ? ' is-invalid' : ''); ?>" name="exam">
                                        <option data-display="<?php echo app('translator')->get('exam.select_exam'); ?>*" value=""><?php echo app('translator')->get('exam.select_exam'); ?> *</option>
                                        <?php $__currentLoopData = $exams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($exam->id); ?>" <?php echo e(isset($exam_id)? ($exam_id == $exam->id? 'selected':''):''); ?>><?php echo e($exam->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('exam')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('exam')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-2 mt-30-md">
                                    <select class="primary_select  form-control<?php echo e($errors->has('result') ? ' is-invalid' : ''); ?>" name="result">
                                        <option data-display="<?php echo app('translator')->get('reports.result'); ?> *" value=""><?php echo app('translator')->get('reports.result'); ?></option>
                                        <option value="P"><?php echo app('translator')->get('student.pass'); ?></option>
                                        <option value="F"><?php echo app('translator')->get('student.fail'); ?></option>
                                         <option value="Null"><?php echo app('translator')->get('student.pass'); ?> & <?php echo app('translator')->get('student.fail'); ?></option>
                                    </select>
                                    <?php if($errors->has('result')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('result')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-12 mt-20 text-right">
                                    <button type="submit" class="primary-btn small fix-gr-bg" id="search_promote">
                                        <span class="ti-search pr-2"></span>
                                        <?php echo app('translator')->get('common.search'); ?>
                                    </button>
                                </div>
                            </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php if(isset($students)): ?>
    <section class="admin-visitor-area">
        <div class="container-fluid p-0">
            <div class="row mt-40">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-4 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-30"><?php echo app('translator')->get('student.promote_student_in_next_session'); ?></h3>
                            </div>
                        </div>
                    </div>

                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'student-promote-store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'student_promote_submit'])); ?>

                    <input type="hidden" name="current_session" value="<?php echo e($current_session); ?>">
                    <input type="hidden" name="current_class" value="<?php echo e($current_class); ?>">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table school-table-style" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th width="10%">
                                       
                                            <input type="checkbox" id="checkAll" class="common-checkbox" name="checkAll">
                                            <label for="checkAll"><?php echo app('translator')->get('common.all'); ?></label>
                                        </th>
                                        <th><?php echo app('translator')->get('student.admission_no'); ?></th>
                                        <th><?php echo app('translator')->get('common.class'); ?>/<?php echo app('translator')->get('common.section'); ?></th>
                                        <th><?php echo app('translator')->get('common.name'); ?></th>                                      
                                        <th><?php echo app('translator')->get('student.current_result'); ?></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $__currentLoopData = @$students['students'] ? @$students['students']: $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($student->result); ?>

                                    <?php
                                 
                                       if (@$student->result!='F') {
                                          $type='disabled';
                                       } else {
                                        $type='';
                                       }
                                       
                                  ?>
                                    <tr>
                                        <td>
                                            <input type="checkbox" id="student.<?php echo e($student->id); ?>" class="common-checkbox" name="student_checked[]" value="<?php echo e($student->id); ?>">
                                            <label for="student.<?php echo e($student->id); ?>"></label>
                                        </td>
                                        <td><?php echo e($student->admission_no); ?></td>
                                        
                                        
                                        <?php if($student->class_name): ?>
                                            <td><?php echo e(@$student->class_name !=""?@$student->class_name:""); ?> (<?php echo e(@$student->class_name !=""?@$student->class_name:""); ?>)</td>
                                        <?php else: ?>
                                             <td><?php echo e($student->class !=""?$student->class->class_name:""); ?></td>
                                        <?php endif; ?>
                                       
                                        <td><?php echo e(@$student->studentinfo ? $student->studentinfo->first_name .' '.$student->studentinfo->last_name : $student->first_name .' '.$student->last_name); ?></td>
                                     
                                        <td>
                                        
                                            <?php if(in_array($student->id,$passesdStudentIds)): ?>
                                            <input type="text" hidden  name="result[<?php echo e($student->id); ?>]" value="P">
                                                 <?php echo app('translator')->get('student.pass'); ?>
                                            <?php else: ?>             
                                                <input type="text" hidden  name="result[<?php echo e($student->id); ?>]" value="F">                              
                                                <?php echo app('translator')->get('student.fail'); ?> 
                                            
                                            <?php endif; ?>         
                                        </td>
                                       
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td colspan="5">
                                            <div class="row mt-30">
                                                <div class="col-lg-3">
                                                    <select class="primary_select  promote_session form-control<?php echo e($errors->has('promote_session') ? ' is-invalid' : ''); ?>" name="promote_session" id="promote_session">
                                                        <option data-display="<?php echo app('translator')->get('common.select_academic_year'); ?> *" value=""><?php echo app('translator')->get('common.select_academic_year'); ?> *</option>
                                                        <?php $__currentLoopData = $Upsessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if(@$current_session != $session->id): ?>
                                                          <option value="<?php echo e($session->id); ?>" <?php echo e(( old("promote_session") == $session->id ? "selected":"")); ?>><?php echo e($session->year); ?></option>
                                                        <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                    
                                                    <span class="text-danger d-none" role="alert" id="promote_session_error">
                                                        <strong><?php echo app('translator')->get('common.the_session_is_required'); ?></strong>
                                                    </span>
                                                </div>

                                              
                                                 <div class="col-lg-3 " id="select_class_div">
                                                    <select class="primary_select "  name="promote_class" id="select_class">
                                                        <option data-display="<?php echo app('translator')->get('common.select_class'); ?>" value=""><?php echo app('translator')->get('common.select_class'); ?></option>
                                                    </select>
                                                </div>

                                                 <div class="col-lg-3 " id="select_section_div">
                                                    <select class="primary_select " id="select_section" name="promote_section">
                                                        <option data-display="<?php echo app('translator')->get('common.select_section'); ?>" value=""><?php echo app('translator')->get('common.select_section'); ?></option>
                                                    </select>
                                                </div>
                                               
                                                <?php if(userPermission(82)): ?>
                                                <div class="col-lg-3 text-center">
                                                    <button type="submit" class="primary-btn fix-gr-bg" id="student_promote_submit">
                                                        <span class="ti-check"></span>
                                                        <?php echo app('translator')->get('student.promote'); ?>
                                                    </button>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    

                    <?php echo e(Form::close()); ?>

                </div>
            </div>
    </div>
</section>
<?php endif; ?>
<script>



</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\studentInformation\student_promote.blade.php ENDPATH**/ ?>
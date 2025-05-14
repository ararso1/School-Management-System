<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('homework.edit_home_work'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<style>
   .input-right-icon button.primary-btn-small-input {
      top: 50% !important;
   }
   .input-right-icon button {
      position: absolute;
      bottom: 20px;
      right: 6%;
   }

   html[dir="rtl"] .input-right-icon button {
      position: absolute;
      bottom: 20px;
      left: 50px;
      right: auto;
   }

   html[dir="rtl"]  .primary_input_field{
      position: relative;
   }

   html[dir="rtl"] .input-right-icon button.primary-btn-small-input {
      position: relative;
      left: -12px;
   }

   html[dir="rtl"] .homework_pages .col-auto button {
      top: -26px;
      bottom: auto;
   }
</style>
<section class="sms-breadcrumb mb-20">
   <div class="container-fluid">
      <div class="row justify-content-between">
         <h1><?php echo app('translator')->get('homework.edit_home_work'); ?></h1>
         <div class="bc-pages">
            <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
            <a href="<?php echo e(route('homework-list')); ?>"><?php echo app('translator')->get('homework.home_work_list'); ?></a>
            <a href="<?php echo e(route('homework_edit', [$homeworkList->id])); ?>"><?php echo app('translator')->get('homework.edit_home_work'); ?></a>
         </div>
      </div>
   </div>
</section>
<section class="admin-visitor-area">
   <div class="container-fluid p-0">
      <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'homework_update', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

      <div class="row">
         <div class="col-lg-12">
            <div class="white-box homework_pages">

               <div class="row">
                  <div class="col-lg-6">
                     <div class="main-title">
                        <h3 class="mb-30"><?php echo app('translator')->get('homework.edit_home_work'); ?></h3>
                     </div>
                  </div>
               </div>
               <div class="">
                  <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>"> 
                  <input type="hidden" name="id" value="<?php echo e($homeworkList->id); ?>"> 
                  <input type="hidden" name="course_id" value="<?php echo e($homeworkList->course_id); ?>"> 
                  <input type="hidden" name="class_id" value="<?php echo e($homeworkList->class_id); ?>"> 
                  <input type="hidden" name="section_id" value="<?php echo e($homeworkList->section_id); ?>"> 
                  <input type="hidden" name="subject_id" value="<?php echo e($homeworkList->subject_id); ?>">
                  
                <?php if(moduleStatusCheck('University')): ?>
                    <div class="row mb-30">
                        <?php if ($__env->exists('university::common.session_faculty_depart_academic_semester_level',['subject'=>true,])) echo $__env->make('university::common.session_faculty_depart_academic_semester_level',['subject'=>true,], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                <?php else: ?>
                  <div class="row mb-30">
                     <div class="col-lg-4">
                        <div class="primary_input">
                           <label class="primary_input_label" for=""><?php echo app('translator')->get('common.class'); ?><span class="text-danger"> *</span></label>
                           <select class="primary_select  form-control<?php echo e($errors->has('class_id') ? ' is-invalid' : ''); ?>" name="class_id" id="classSelectStudent">
                              <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value=""><?php echo app('translator')->get('common.select'); ?></option>
                              <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($value->id); ?>" <?php echo e($homeworkList->class_id == $value->id? 'selected':''); ?>><?php echo e($value->class_name); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </select>
                           
                           <?php if($errors->has('class_id')): ?>
                           <span class="text-danger invalid-select" role="alert">
                           <?php echo e($errors->first('class_id')); ?>

                           </span>
                           <?php endif; ?>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="primary_input" id="subjectSelecttDiv">
                           <label class="primary_input_label" for=""><?php echo app('translator')->get('common.subject'); ?> <span class="text-danger"> *</span></label>
                           <select class="primary_select  form-control<?php echo e($errors->has('subject_id') ? ' is-invalid' : ''); ?>" name="subject_id" id="subjectSelect">
                              <option data-display="Select Subject *" value=""><?php echo app('translator')->get('homework.subject'); ?> *</option>
                              <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($subject->subject->id); ?>" <?php echo e($homeworkList->subject_id == $subject->subject->id? 'selected':''); ?>><?php echo e($subject->subject->subject_name); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </select>
                           
                           <?php if($errors->has('subject_id')): ?>
                           <span class="text-danger invalid-select" role="alert">
                           <?php echo e($errors->first('subject_id')); ?>

                           </span>
                           <?php endif; ?>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="primary_input" id="sectionStudentDiv">
                           <label class="primary_input_label" for=""><?php echo app('translator')->get('common.section'); ?> <span class="text-danger"> *</span></label>
                           <select class="primary_select  form-control<?php echo e($errors->has('section_id') ? ' is-invalid' : ''); ?>" name="section_id" id="sectionSelectStudent">
                              <option data-display="<?php echo app('translator')->get('common.select_section'); ?> *" value=""><?php echo app('translator')->get('common.section'); ?> *</option>
                              <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($section->sectionName->id); ?>" <?php echo e($homeworkList->section_id == $section->sectionName->id? 'selected':''); ?>><?php echo e($section->sectionName->section_name); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </select>
                           
                           <?php if($errors->has('section_id')): ?>
                           <span class="text-danger invalid-select" role="alert">
                           <?php echo e($errors->first('section_id')); ?>

                           </span>
                           <?php endif; ?>
                        </div>
                     </div>
                  </div>
                <?php endif; ?>

                  <div class="row mb-30">
                     <div class="col-lg-3">
                        <div class="no-gutters input-right-icon">
                           <div class="col">
                              <div class="primary_input">
                                 <label class="primary_input_label" for=""><?php echo app('translator')->get('homework.home_work_date'); ?> <span class="text-danger"> *</span></label>
                                 <input class="primary_input_field  primary_input_field date form-control form-control<?php echo e($errors->has('homework_date') ? ' is-invalid' : ''); ?>" id="homework_date" type="text" name="homework_date" value="<?php echo e(date('m/d/Y', strtotime($homeworkList->homework_date))); ?>" readonly="true">
                                 <?php if($errors->has('homework_date')): ?>
                                 <span class="text-danger" >
                                 <?php echo e($errors->first('homework_date')); ?>

                                 </span>
                                 <?php endif; ?>
                              </div>
                           </div>
                           <div class="col-auto">
                              <button class="" type="button">
                                 <label class="m-0 p-0" for="homework_date">
                                    <i class="ti-calendar" id="homework_date_icon"></i>
                                 </label>
                              </button>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-3">
                        <div class="no-gutters input-right-icon">
                           <div class="col">
                              <div class="primary_input">
                                 <label class="primary_input_label" for=""><?php echo app('translator')->get('homework.submission_date'); ?> <span class="text-danger"> *</span></label>
                                 <input class="primary_input_field  primary_input_field date form-control form-control<?php echo e($errors->has('submission_date') ? ' is-invalid' : ''); ?>" id="submission_date" type="text" name="submission_date" value="<?php echo e(date('m/d/Y', strtotime($homeworkList->submission_date))); ?>" readonly="true">
                                 <?php if($errors->has('submission_date')): ?>
                                 <span class="text-danger" >
                                 <?php echo e($errors->first('submission_date')); ?>

                                 </span>
                                 <?php endif; ?>
                              </div>
                           </div>
                           <div class="col-auto">
                              <button class="" type="button">
                                 <label class="m-0 p-0" for="submission_date">
                                    <i class="ti-calendar" id="submission_date_icon"></i>
                                 </label>
                              </button>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-3">
                        <div class="row no-gutters input-right-icon">
                           <div class="col">
                              <div class="primary_input">
                                 <label class="primary_input_label" for=""><?php echo app('translator')->get('homework.marks'); ?> <span class="text-danger"> *</span></label>
                                 <input class="primary_input_field form-control<?php echo e($errors->has('marks') ? ' is-invalid' : ''); ?>" type="text" name="marks" autocomplete="off" value="<?php echo e($homeworkList->marks); ?>">
                                 <?php if($errors->has('marks')): ?>
                                 <span class="text-danger" >
                                 <?php echo e($errors->first('marks')); ?>

                                 </span>
                                 <?php endif; ?>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-3">
                        <div class="row no-gutters input-right-icon">
                           <div class="col">
                              <div class="primary_input">
                                 <label class="primary_input_label" for=""><?php echo app('translator')->get('homework.attach_file'); ?> <span class="text-danger"> *</span></label>
                                 <input class="primary_input_field" type="text" id="placeholderHomeworkName" placeholder="<?php echo e($homeworkList->file != ""? getFilePath3($homeworkList->file):__('common.file')); ?>" readonly>
                                 
                              </div>
                           </div>
                           <div class="col-auto">
                              <button class="primary-btn-small-input" type="button">
                              <label class="primary-btn small fix-gr-bg" for="homework_file"><?php echo app('translator')->get('common.browse'); ?></label>
                              <input type="file" class="d-none" name="homework_file" id="homework_file">
                              </button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row md-20">
                     <div class="col-lg-12">
                        <div class="primary_input">
                           <label class="primary_input_label" for=""><?php echo app('translator')->get('common.description'); ?> <span class="text-danger"> *</span> </label>
                           <textarea class="primary_input_field form-control<?php echo e($errors->has('description') ? ' is-invalid' : ''); ?>" cols="0" rows="4" name="description" id="description *"><?php echo e($homeworkList->description); ?></textarea>
                           
                           <?php if($errors->has('description')): ?>
                           <span class="text-danger" >
                           <?php echo e($errors->first('description')); ?>

                           </span>
                           <?php endif; ?>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row mt-40">
                  <div class="col-lg-12 text-center">
                     <button class="primary-btn fix-gr-bg">
                     <span class="ti-check"></span>
                     <?php echo app('translator')->get('homework.update_home_work'); ?>
                     </button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php echo e(Form::close()); ?>

   </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\homework\homeworkEdit.blade.php ENDPATH**/ ?>
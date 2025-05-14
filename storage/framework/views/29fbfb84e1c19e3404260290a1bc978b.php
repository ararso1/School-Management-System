<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('exam.exam'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('exam.exam'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('exam.examinations'); ?></a>
                <a href="#"><?php echo app('translator')->get('exam.exam'); ?></a>
            </div>
        </div>
    </div>
</section>

<section class="admin-visitor-area">
    <?php if(isset($exam)): ?>
        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'exam-setup-store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

        <?php else: ?>
        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'exam',
        'method' => 'PUT', 'enctype' => 'multipart/form-data'])); ?>

        <?php endif; ?>
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-title">
                            <h3 class="mb-30"><?php if(isset($exam)): ?>
                                    <?php echo app('translator')->get('common.add'); ?>
                                <?php else: ?>
                                    <?php echo app('translator')->get('common.update'); ?>
                                <?php endif; ?>
                                <?php echo app('translator')->get('exam.exam'); ?>
                            </h3>
                        </div>
                        
                        <div class="white-box">
                            <div class="add-visitor">
                                <div class="row">
                                    <div class="col-lg-12">
                                       
                                        <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                        
                                    </div>
                                </div>

                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('common.select_classes'); ?></label>
                                            <?php $h = 0; ?>
                                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="primary_input">
                                                <input type="checkbox" id="classes_<?php echo e(@@$class->id); ?>" class="common-checkbox" name="class_ids[]" value="<?php echo e(@@$class->id); ?>" <?php echo e((is_array(old('class_ids')) and in_array(@@$class->id, old('class_ids'))) ? ' checked' : ''); ?>>
                                                <label for="classes_<?php echo e(@@$class->id); ?>"><?php echo e(@@$class->class_name); ?></label>
                                            </div>
                                            <?php $h++; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </div>
                                    <div class="col-lg-12">

                                        <?php if($errors->has('class_ids')): ?>
                                            <span class="text-danger validate-textarea-checkbox" role="alert">
                                                <?php echo e($errors->first('class_ids')); ?>

                                            </span>
                                        <?php endif; ?>

                                    </div>
                                </div>

                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('common.select_section'); ?></label>
                                        <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="primary_input">
                                                <input type="checkbox" id="sections_<?php echo e(@$section->id); ?>" class="common-checkbox" name="section_ids[]" value="<?php echo e(@$section->id); ?>">
                                                <label for="sections_<?php echo e(@$section->id); ?>"><?php echo e(@$section->section_name); ?></label>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <div class="col-lg-12">

                                        <?php if($errors->has('section_ids')): ?>
                                            <span class="text-danger validate-textarea-checkbox" role="alert">
                                                <?php echo e($errors->first('section_ids')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>


                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('common.select_subjects'); ?></label>
                                        <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="primary_input">
                                                <input type="checkbox" id="subjects_<?php echo e(@$subject->id); ?>" class="common-checkbox" name="subjects_ids[]" value="<?php echo e(@$subject->id); ?>">
                                                <label for="subjects_<?php echo e(@$subject->id); ?>"><?php echo e(@$subject->subject_name); ?></label>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <div class="col-lg-12">

                                        <?php if($errors->has('subjects_ids')): ?>
                                            <span class="text-danger validate-textarea-checkbox" role="alert">
                                                <?php echo e($errors->first('subjects_ids')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="row mt-25">
                                    <div class="col-lg-12">

                                        <div class="primary_input">
                                            <input oninput="numberCheck(this)" class="primary_input_field form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"
                                            type="text" name="name" id="name" autocomplete="off" value="<?php echo e(isset($exam)? $exam->name:''); ?>" readonly="">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('exam.exam_terms'); ?></label>
                                            
                                            <?php if($errors->has('name')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('name')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div> 

                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <input type="hidden" name="exam_term_id" value="<?php echo e($exam->id); ?>">
                                        <select class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>" id="select_class" name="class">
                                            <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value=""><?php echo app('translator')->get('common.select_class'); ?> *</option>
                                            <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e(@ @$class->id); ?>" <?php echo e(isset($exam)? ($class->id == $exam->class_id? 'selected':''): (old('class') == $class->id? 'selected':'')); ?>><?php echo e(@ @$class->class_name); ?></option>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('class')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('class')); ?>

                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="row mt-25">
                                    <div class="col-lg-12 mt-30-md" id="select_section_div">
                                        <select class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?> select_section" id="select_section" name="section"  readonly="">
                                            <option data-display="<?php echo app('translator')->get('common.select_section'); ?> *" value=""><?php echo app('translator')->get('common.select_section'); ?> *</option>
                                            <?php if(isset($exam)): ?>
                                                <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e(@$section->id); ?>" <?php echo e(@$exam->section_id == @$section->id? 'selected': ''); ?>><?php echo e(@$section->section_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                        <?php if($errors->has('section')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('section')); ?>

                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="row mt-25">
                                    <div class="col-lg-12" id="select_subject_div">
                                        <select class="primary_select form-control<?php echo e($errors->has('subject') ? ' is-invalid' : ''); ?>" id="select_subject" name="subject"  readonly="">
                                            <option data-display="<?php echo app('translator')->get('common.select_subjects'); ?> *" value=""><?php echo app('translator')->get('common.select_subjects'); ?> *</option>
                                            <?php if(isset($exam)): ?>
                                                <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e(@$subject->id); ?>" <?php echo e(@$exam->subject_id == @$subject->id? 'selected': ''); ?>><?php echo e(@$subject->subject_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                        <?php if($errors->has('subject')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('subject')); ?>

                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div> 
                                <div class="row mt-25">
                                    <div class="col-lg-12">

                                        <div class="primary_input">
                                            <input class="primary_input_field form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"
                                                type="text" name="name" autocomplete="off" value="<?php echo e(isset($exam)? $exam->name:''); ?>">
                                            <input type="hidden" name="id" value="<?php echo e(isset($exam)? $exam->id: ''); ?>"  readonly="">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('exam.exam_name'); ?><span class="text-danger"> *</span></label>
                                            
                                            <?php if($errors->has('name')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('name')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-25">
                                    <div class="col-lg-12">

                                        <div class="primary_input">
                                            <input oninput="numberCheckWithDot(this)" class="primary_input_field form-control<?php echo e($errors->has('exam_mark') ? ' is-invalid' : ''); ?>"
                                            type="text" name="total_exam_mark" id="exam_mark_main" autocomplete="off" value="<?php echo e(isset($exam)? $exam->exam_mark:''); ?>" readonly="">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('exam.exam_mark'); ?></label>
                                            
                                            <?php if($errors->has('exam_mark')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('exam_mark')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div> 
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
               <div class="row">
                <div class="col-lg-4 no-gutters">
                    <div class="main-title">
                        <h3 class="mb-30"><?php echo app('translator')->get('exam.add_mark_distributions'); ?></h3>
                    </div>
                </div>
                <div class="offset-lg-6 col-lg-2 text-right col-md-6">
                    <button type="button" class="primary-btn small fix-gr-bg" onclick="addRowMark();" id="addRowBtn">
                        <span class="ti-plus pr-2"></span>
                        <?php echo app('translator')->get('common.add'); ?>
                    </button>
                </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
               <div class="white-box">
                   <table class="table" id="productTable">
                    <thead>
                      <tr>
                          <th><?php echo app('translator')->get('exam.exam_title'); ?></th>
                          <th><?php echo app('translator')->get('exam.exam_mark'); ?></th>
                          <th><?php echo app('translator')->get('common.action'); ?></th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr id="row1" class="0">
                            <td class="border-top-0">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">  
                                <div class="primary_input">
                                    <input class="primary_input_field form-control<?php echo e($errors->has('exam_title') ? ' is-invalid' : ''); ?>"
                                    type="text" id="exam_title" name="exam_title[]" autocomplete="off" value="<?php echo e(isset($editData)? $editData->exam_title : ''); ?>" placeholder="<?php echo app('translator')->get('exam.exam_title'); ?>">


                                </div>
                            </td>
                            <td class="border-top-0">
                                <div class="primary_input">
                                    <input class="primary_input_field form-control<?php echo e($errors->has('exam_mark') ? ' is-invalid' : ''); ?> exam_mark"
                                    type="text" id="exam_mark" name="exam_mark[]" autocomplete="off"   value="<?php echo e(isset($editData)? $editData->exam_mark : ''); ?>">
                                </div>
                            </td> 
                            <td>
                                 <button class="primary-btn icon-only bg-danger text-light" type="button">
                                     <span class="ti-trash"></span>
                                </button>
                               
                            </td>
                        </tr>
                        <tfoot>
                            <tr>
                               <th class="border-top-0"><?php echo app('translator')->get('exam.result'); ?></th>

                               <th class="border-top-0" id="totalMark">
                                 <input type="text" class="primary_input_field form-control" name="totalMark" readonly="true">
                               </th>
                               <th class="border-top-0"></th>
                           </tr>
                       </tfoot>

                   </tbody>
               </table>
           </div>
       </div>
   </div>
    <div class="row mt-30">
        <div class="col-lg-12">
            <div class="white-box">
                <div class="row mt-40">
                    <div class="col-lg-12 text-center">
                        <button class="primary-btn fix-gr-bg"> 
                            <span class="ti-check"></span>
                            <?php if(isset($exam)): ?>
                                <?php echo app('translator')->get('common.edit'); ?>
                            <?php else: ?>
                                <?php echo app('translator')->get('common.add'); ?>
                            <?php endif; ?>
                            <?php echo app('translator')->get('exam.mark_distribution'); ?>
                        </button>
                    </div>
                </div>
                
            </div>
        </div>
    </div>


        </div>
    </div>
</div>

<?php echo e(Form::close()); ?>



</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\examination\exam_setup.blade.php ENDPATH**/ ?>
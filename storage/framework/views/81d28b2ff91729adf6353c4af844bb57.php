
<?php if(count($subjects)): ?>
    <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div id="assign-subject_<?php echo e($subject->class_id); ?>">
        <div class="col-lg-12 mb-30" id="assign-subject-4">
            <div class="row mb-20 assignedSubject<?php echo e($subject->id); ?>"> 
                <div class="col-lg-3 mt-30-md"> 
                    <select class="primary_select form-control" name="subjects[]" id="subjects">
                        <option data-display="<?php echo e(@$subject->subject->subject_name); ?>" value="<?php echo e(@$subject->subject->id); ?>"><?php echo e(@$subject->subject->subject_name); ?></option>
                    </select> 
                </div> 
                <div class="col-lg-3 mt-30-md"> 
                <select class="nice-select primary_select form-control" name="teachers[]" id="teachers">; 
                    <option data-display="<?php echo app('translator')->get('common.select_teacher'); ?> *" value=""><?php echo app('translator')->get('common.select_teacher'); ?> * </option>
                        <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php if($subject->teacher_id == $teacher->id): ?> selected <?php endif; ?>   value="<?php echo e(@$teacher->id); ?>"><?php echo e(@$teacher->full_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select> 
                </div>

                <div class="col-lg-4 mt-30-md"> 
                    <select multiple="multiple" class="multypol_check_select active position-relative selectSectionss"  name="exams[]" id="selectSectionss" style="width:300px"> 
                        
                            <?php $__currentLoopData = getGlobalExamBySecClsSub($section_id,$class_id, $subject->subject_id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e(@$exam->id); ?>"><?php echo e(@$exam->GetGlobalExamTitle->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select> 
                    </div>
                <div class="col-lg-2"> 
                    <button class="primary-btn icon-only fix-gr-bg" type="button">
                        <span class="ti-trash" id="removeSubject" onclick="deleteSubject(<?php echo e($subject->id); ?>)"></span> 
                    </button> 
                </div>
            </div> 
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php else: ?> 
<div id="assign-subject_<?php echo e($class_id); ?>">
    <div class="col-lg-12 mb-30" id="assign-subject-4">
    </div>
</div>

<?php endif; ?> 
<?php echo $__env->make('backEnd.partials.multi_select_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>
     $('.primary_select').niceSelect('destroy');        
     $(".primary_select").niceSelect();
     $(function () {
            $("select[multiple].active.multypol_check_select").multiselect({
                columns: 1,
                placeholder: "Select",
                search: true,
                searchOptions: {
                default: "Select",
                },
                
                selectAll: true,
            });
        });
    
</script>
<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\global\ajax_assigned_subject_list.blade.php ENDPATH**/ ?>
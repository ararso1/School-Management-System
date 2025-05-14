<div class="modal-body">
    <?php if(isset($graduate)): ?>
        <?php echo e(Form::open(['class' => 'form-horizontal','route' => 'alumni.revert-as-student', 'method' => 'POST'])); ?>

        <input type="hidden" name="id" value="<?php echo e($graduate->id); ?>">
     
        <div class="row">
              <div class="col-lg-12">
                  <div class="row">
                      <div class="col-lg-12">
                          <div class="primary_input mt-2 pt-1 mb-20 text-center">
                                <i class="fa fa-warning fa-2x text-danger"></i>
                                <p class="text-danger">Are you sure you want to revert this graduated student back to their status as a regular student ?</p>
                            </div>
                      </div>  
                </div>
          </div>

          <div class="row mx-auto">
            <div class="col-lg-12 text-center">
                <button type="submit" class="primary-btn fix-gr-bg text-nowrap" data-toggle="tooltip">
                    <span class="ti-check"></span>
                    <?php echo app('translator')->get('common.update'); ?>
                </button>
            </div>
        </div> 
      <?php echo e(Form::close()); ?>

    </div>
    <?php endif; ?> <?php /**PATH C:\xampp\htdocs\resources\views\backEnd\graduate\inc\_revert_as_student_modal.blade.php ENDPATH**/ ?>
<div class="card">
    <div class="card-header" id="headingOne">
        <h2 class="mb-0">
            <a href="#" class="btn" type="button" data-toggle="collapse"
               data-target="#collapseOne" aria-expanded="true"
               aria-controls="collapseOne">
                <h5>Section 1: Getting started <i class="fa fa-info-circle information_icon "></i></h5>
                <span>02 Lectures</span>
            </a>
        </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
         data-parent="#accordion_ex">
        <div class="card-body">
            <div class="video_menu_list">
                <?php echo $__env->make('lms.lesson', ['content' => false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('lms.lesson', ['content' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('lms.online_exam', ['level' => 1], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- 2nd level::end  -->
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\resources\views\lms\chapter.blade.php ENDPATH**/ ?>
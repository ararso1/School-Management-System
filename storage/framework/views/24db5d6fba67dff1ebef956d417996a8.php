<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('exam.view_result'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>
<?php
    $user = Auth::user()->student;
    date_default_timezone_set($time_zone_setup->time_zone);
?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('exam.online_exam'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('exam.online_exam'); ?></a>
                <a href="<?php echo e(route('student_view_result')); ?>"><?php echo app('translator')->get('exam.view_result'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
        <div class="row">

            <div class="col-lg-12">
                <div class="white-box">
                    <div class="row">
                        <div class="col-lg-4 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-15"><?php echo app('translator')->get('exam.online_exam_view_result'); ?></h3>
                            </div>
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if (isset($component)) { $__componentOriginal163c8ba6efb795223894d5ffef5034f5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal163c8ba6efb795223894d5ffef5034f5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <table id="table_id" class="table" cellspacing="0" width="100%">
    
                                <thead> 
                                    <tr>
                                        <th><?php echo app('translator')->get('common.title'); ?></th>
                                        <th><?php echo app('translator')->get('common.time'); ?></th>
                                        <th><?php echo app('translator')->get('exam.total_marks'); ?></th>
                                        <th><?php echo app('translator')->get('exam.obtained_marks'); ?> </th>
                                        <th><?php echo app('translator')->get('reports.result'); ?></th>
                                        <th><?php echo app('translator')->get('common.status'); ?></th>
                                    </tr>
                                </thead>
    
                                <tbody>
                                    <?php $__currentLoopData = $result_views; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result_view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($result_view->onlineExam !=""?@$result_view->onlineExam->title:""); ?></td>
                                            <td  data-sort="<?php echo e(strtotime(@$result_view->onlineExam->date)); ?>" >
                                                <?php if(!empty(@$result_view->onlineExam)): ?>
                                               <?php echo e(@$result_view->onlineExam->date != ""? dateConvert(@$result_view->onlineExam->date):''); ?>

    
    
                                                 
                                                 <br> Time: <?php echo e(date('h:i A', strtotime(@$result_view->onlineExam->start_time)).' - '.date('h:i A', strtotime(@$result_view->onlineExam->end_time))); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php 
                                                $total_marks = 0;
                                                foreach($result_view->onlineExam->assignQuestions as $assignQuestion){
                                                    @$total_marks = $total_marks + @$assignQuestion->questionBank->marks;
                                                }
                                                echo @$total_marks;
                                                ?>
                                            </td>
                                            <td><?php echo e(@$result_view->total_marks); ?></td>
                                            <td>
                                                <?php
                                                if($total_marks > 0){
                                                    $result = @$result_view->total_marks * 100 / @$total_marks;
                                                } else{
                                                    $result = 0;
                                                }
                                                   
                                                    if(@$result >= @$result_view->onlineExam->percentage){
                                                        echo "Pass";  
                                                    }else{
                                                        echo "Fail";
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                 <?php
                                                    $startTime = strtotime($result_view->onlineExam->date . ' ' . $result_view->onlineExam->start_time);
                                                    $endTime = strtotime($result_view->onlineExam->date . ' ' . $result_view->onlineExam->end_time);
                                                    $now = date('h:i:s');
                                                    $now =  strtotime("now");
                                                ?>
    
                                                <?php if (isset($component)) { $__componentOriginalf5ee9bc45d6af00850b10ff7521278be = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf5ee9bc45d6af00850b10ff7521278be = $attributes; } ?>
<?php $component = App\View\Components\DropDown::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('drop-down'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\DropDown::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    
                                                        <?php if($now >= $endTime): ?>
                                                        <a class=" dropdown-item btn btn-success modalLink" data-modal-size="modal-lg" title="<?php echo app('translator')->get('exam.answer_script'); ?>"  href="<?php echo e(route('student_answer_script', [@$result_view->online_exam_id, @$result_view->student_id])); ?>" ><?php echo app('translator')->get('exam.answer_script'); ?></a>
                                                        <a class="dropdown-item" href="<?php echo e(route("student-online-exam-question-view", [$result_view->online_exam_id])); ?>"><?php echo app('translator')->get('exam.view_question'); ?></a>
                                                        
                                                        <?php else: ?>
                                                            <span class=" dropdown-item"><?php echo app('translator')->get('exam.Wait_Till_Exam_Finish'); ?></span>
                                                        <?php endif; ?>
                                                       </div>
                                                    </div>
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf5ee9bc45d6af00850b10ff7521278be)): ?>
<?php $attributes = $__attributesOriginalf5ee9bc45d6af00850b10ff7521278be; ?>
<?php unset($__attributesOriginalf5ee9bc45d6af00850b10ff7521278be); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf5ee9bc45d6af00850b10ff7521278be)): ?>
<?php $component = $__componentOriginalf5ee9bc45d6af00850b10ff7521278be; ?>
<?php unset($__componentOriginalf5ee9bc45d6af00850b10ff7521278be); ?>
<?php endif; ?>
                                                
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $attributes = $__attributesOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $component = $__componentOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__componentOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\school\resources\views/backEnd/studentPanel/student_view_result.blade.php ENDPATH**/ ?>
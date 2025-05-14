<?php $__env->startSection('title'); ?> 
<?php echo app('translator')->get('exam.online_exam_result'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>
<?php $__env->startPush('css'); ?>
<style>
    .QA_table.mt-30 {
        margin-top: 0 !important;
    }

</style>
<?php $__env->stopPush(); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('exam.online_exam'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('exam.exam'); ?></a>
                <a href="#"><?php echo app('translator')->get('exam.online_exam_result'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-12 student-details up_admin_visitor">
                <ul class="nav nav-tabs tabs_scroll_nav ml-0" role="tablist">

                <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="nav-item mb-0">
                        <a class="nav-link mb-0 <?php if($key== 0): ?> active <?php endif; ?> " href="#tab<?php echo e($key); ?>" role="tab" data-toggle="tab"><?php echo e($record->class->class_name); ?> (<?php echo e($record->section->section_name); ?>) </a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </ul>
                <!-- Tab panes -->
                <div class="tab-content mt-10">
                    <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div role="tabpanel" class="tab-pane fade  <?php if($key== 0): ?> active show <?php endif; ?>" id="tab<?php echo e($key); ?>">
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
                                        <?php
                                            $results = App\Models\StudentRecord::getInfixStudentTakeOnlineExamParent($record->student_id, $record->id);
                                        ?>
                                        <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result_view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        
                                            <tr>
                                                <td><?php echo e($result_view->onlineExam !=""?@$result_view->onlineExam->title:""); ?></td>
                                                <td  data-sort="<?php echo e(strtotime(@$result_view->onlineExam->date)); ?>" >
                                                    <?php if(!empty(@$result_view->onlineExam)): ?>
                                                <?php echo e(@$result_view->onlineExam->date != ""? dateConvert(@$result_view->onlineExam->date):''); ?>



                                                    <br> Time: <?php echo e(@$result_view->onlineExam->start_time.' - '.@$result_view->onlineExam->end_time); ?>

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
                                                    if($total_marks){
                                                        @$result = @$result_view->total_marks * 100 / @$total_marks;
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
                                                <?php if($now >= $endTime): ?>
                                                <?php if(moduleStatusCheck('OnlineExam')== TRUE): ?>
                                                    <a class="btn primary-btn" title="Answer Script"  href="<?php echo e(route('om-parent_answer_script', [@$result_view->online_exam_id, @$result_view->student_id, $record->id])); ?>" ><?php echo app('translator')->get('exam.answer_script'); ?></a>
                                                
                                                <?php else: ?>
                                                    <a class="btn primary-btn small  fix-gr-bg" data-modal-size="modal-lg" title="Answer Script"  href="<?php echo e(route('parent_answer_script', [@$result_view->online_exam_id, @$result_view->student_id])); ?>" ><?php echo app('translator')->get('exam.answer_script'); ?></a>
                                                
                                                <?php endif; ?>
                                                    
                                                <?php else: ?>
                                                    <span class="btn primary-btn small  fix-gr-bg" style="background:blue"><?php echo app('translator')->get('exam.Wait_Till_Exam_Finish'); ?></span>
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
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\parentPanel\parent_online_exam_result.blade.php ENDPATH**/ ?>
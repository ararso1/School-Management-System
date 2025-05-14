<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('exam.result_view'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
    <style>
        table.dataTable thead th {
            padding-left: 25px !important;
        }
        table.dataTable tbody th, table.dataTable tbody td {
            padding: 20px 10px 20px 20px !important;
        }
        table.dataTable thead .sorting_asc:after,
        table.dataTable thead .sorting:after,
        table.dataTable thead .sorting_desc:after{
            top: 10px !important;
            left: 10px !important;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('exam.examinations'); ?> </h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('exam.examinations'); ?></a>
                <a href="<?php echo e(route('online-exam')); ?>"><?php echo app('translator')->get('exam.online_exam'); ?></a>
                <a href="<?php echo e(route('online_exam_result', [$online_exam_question->id])); ?>"><?php echo app('translator')->get('exam.result_view'); ?></a>
            </div>
        </div>
    </div>
</section>

<section class="mt-20">
    <div class="container-fluid p-0">
        <div class="row mt-40">
            <div class="col-lg-6 col-md-6">
                <div class="main-title">
                    <h3 class="mb-0"><?php echo app('translator')->get('exam.result_view'); ?></h3>
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
                    <table id="table_id" class="table school-table-style" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get('student.admission_no'); ?></th>
                                <th><?php echo app('translator')->get('student.student'); ?></th>
                                <th><?php echo app('translator')->get('common.class_Sec'); ?></th>
                                <th><?php echo app('translator')->get('exam.exam'); ?></th>
                                <th><?php echo app('translator')->get('common.subject'); ?></th>
                                <th><?php echo app('translator')->get('exam.total_marks'); ?></th>
                                <th><?php echo app('translator')->get('exam.obtained_marks'); ?></th>
                                <th><?php echo app('translator')->get('reports.result'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                    
                                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($student->admission_no); ?></td>
                                    <td><?php echo e($student->full_name); ?></td>
                                    <td>
                                        <?php echo e(@$online_exam_question->class->class_name); ?> (<?php echo e(@$online_exam_question->section->section_name); ?>)
                                    </td>
                                    <td><?php echo e($online_exam_question->title); ?></td>
                                    <td><?php echo e($online_exam_question->subject!=""?$online_exam_question->subject->subject_name:""); ?></td>
                                    <td><?php echo e($total_marks); ?></td>
                                    <td>
                                        <?php if(in_array($student->id, $present_students)): ?>
                                            <?php
                                                $obtained_marks = App\SmOnlineExam::obtainedMarks($online_exam_question->id, $student->id);
                                                if($obtained_marks->status == 1){
                                                    echo "Waiting for marks";
                                                }else{
                                                    echo $obtained_marks->total_marks;
                                                }
                                            ?>
                                        <?php else: ?>
                                            <?php echo app('translator')->get('exam.absent'); ?>
                                        <?php endif; ?>
                                        
                                    </td>
                                    <td>
                                        <?php if(in_array($student->id, $present_students)): ?>
                                        <?php
                                        $result = $obtained_marks->total_marks * 100 / $total_marks;
                                        ?>
                                        <?php if($obtained_marks->status == 1): ?>
                                        <?php echo app('translator')->get('exam.marks_waiting_for'); ?>
                                        <?php else: ?>
                                        <?php if($result >= $online_exam_question->percentage): ?>
                                            <?php echo app('translator')->get('exam.pass'); ?>
                                        <?php else: ?>
                                            <?php echo app('translator')->get('exam.fail'); ?>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                            
                                        <?php else: ?>
    
                                            <?php echo app('translator')->get('exam.absent'); ?>
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
</section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\examination\online_exam_result_view.blade.php ENDPATH**/ ?>
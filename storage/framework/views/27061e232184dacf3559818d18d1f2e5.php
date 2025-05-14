<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('exam.online_exam'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('exam.examinations'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('exam.examinations'); ?></a>
                <a href="<?php echo e(route('online-exam')); ?>"><?php echo app('translator')->get('exam.online_exam'); ?></a>
                <a href="<?php echo e(route("manage_online_exam_question", [$online_exam->id])); ?>"><?php echo app('translator')->get('exam.online_exam_question'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-title m-0">
                            <h3 class="mb-30"> <?php echo app('translator')->get('exam.exam_details'); ?></h3>
                        </div>
                    </div>
                </div>
                <div class="row student-details mt-0">
                    <div class="col-lg-12">
                        <div class="student-meta-box">
                            <div class=" staff-meta-top"></div>
                            <div class="white-box">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-meta mt-20">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="value text-left">
                                                        <?php echo app('translator')->get('exam.title'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="name">
                                                        <?php echo e($online_exam->title); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-meta">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="value text-left">
                                                        <?php echo app('translator')->get('common.class'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="name">
                                                        <?php echo e(@$online_exam->class!=""?@$online_exam->class->class_name:""); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-meta">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="value text-left">
                                                        <?php echo app('translator')->get('common.section'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="name">
                                                        <?php echo e(@$online_exam->section !=""?@$online_exam->section->section_name:""); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-meta">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="value text-left">
                                                        <?php echo app('translator')->get('exam.subject'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="name">
                                                        <?php echo e(@$online_exam->subject!=""?@$online_exam->subject->subject_name:""); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-meta mt-20">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="value text-left">
                                                        <?php echo app('translator')->get('common.date'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="name">          
                                                    <?php echo e(@@$online_exam->date != ""? dateConvert(@@$online_exam->date):''); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-meta">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="value text-left">
                                                        <?php echo app('translator')->get('exam.time'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="name">
                                                        <?php echo e(@@$online_exam->start_time.' - '.@@$online_exam->end_time); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-meta">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="value text-left">
                                                        <?php echo app('translator')->get('exam.passing_percentage'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="name">
                                                        <?php echo e(@$online_exam->percentage); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 mb-30">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-title m-0 text-right">
                            <?php
                            $is_set_online_exam_questions = DB::table('sm_online_exam_question_assigns')
                                ->where('online_exam_id', $online_exam->id)
                                ->first();
                            ?>
                            <?php if(empty($is_set_online_exam_questions)): ?>
                                <?php if(userPermission('manage_online_exam_question')): ?>
                                    <a href="<?php echo e(route('online_exam_publish', $online_exam->id)); ?>" class="primary-btn small fix-gr-bg">
                                        <?php echo app('translator')->get('exam.published_now'); ?>
                                    </a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="white-box <?php if(empty($is_set_online_exam_questions)): ?> mt-20 <?php else: ?> mt-60 <?php endif; ?>">
                    <div class="row">
                    <div class="col-lg-4 no-gutters">
                        <div class="main-title">
                            <h3 class="mb-0"><?php echo app('translator')->get('exam.question_list'); ?></h3>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                <input type="hidden" id="online_exam_id_ajax" name="online_exam_id" value="<?php echo e(@$online_exam->id); ?>">

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
                            <table id="table_id" class="table pb-120" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><?php echo app('translator')->get('common.sl'); ?></th>
                                        <th><?php echo app('translator')->get('exam.group'); ?></th>
                                        <th><?php echo app('translator')->get('common.type'); ?></th>
                                        <th><?php echo app('translator')->get('exam.question'); ?></th>
                                        <th><?php echo app('translator')->get('exam.marks'); ?></th>
                                        <th><?php echo app('translator')->get('common.action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $total_marks = 0; ?>
                                    <?php $__currentLoopData = $question_banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question_bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $total_marks += $question_bank->mark; ?>
                                    <tr class="abc">
                                        <td>
                                            <input data-id="<?php echo e(@$question_bank->id); ?>" type="checkbox" id="question<?php echo e(@$question_bank->id); ?>" class="common-checkbox" name="questions[]" value="<?php echo e(@$question_bank->id); ?>" <?php echo e(in_array(@$question_bank->id, @@$already_assigned)? 'checked': ''); ?>>
                                            <label for="question<?php echo e(@$question_bank->id); ?>"></label>
                                        </td>
                                        <td><?php echo e(@$question_bank->questionGroup !=""?@$question_bank->questionGroup->title:""); ?></td>
                                        <td>
                                            <?php if(@$question_bank->type == "M"): ?>
                                                <?php echo e('Multiple Choice'); ?>

                                            <?php elseif(@$question_bank->type == "MI"): ?>
                                            <?php echo app('translator')->get('exam.multiple_image'); ?>
                                            <?php elseif(@$question_bank->type == "F"): ?>
                                                <?php echo e('Fill In The Blanks'); ?>

                                            <?php else: ?>
                                                <?php echo e('True False'); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e(@$question_bank->question); ?></td>
                                        <td><?php echo e(@$question_bank->marks); ?></td>
                                        <td>
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
                                                    <a class="dropdown-item modalLink" data-modal-size="modal-lg" title="View Question"  href="<?php echo e(route('view_online_question_modal', [$question_bank->id])); ?>" ><?php echo app('translator')->get('common.view'); ?></a>
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
                                    <!-- <tr>
                                        <td colspan="5" align="center">
                                            <button class="primary-btn fix-gr-bg">
                                                <span class="ti-check"></span>
                                                save Questions
                                            </button>
                                        </td>
                                    </tr> -->
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
<div class="modal fade admin-query" id="deleteOnlineExamQuestion" >
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo app('translator')->get('common.delete_item'); ?></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                </div>
                <div class="mt-40 d-flex justify-content-between">
                    <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                     <?php echo e(Form::open(['route' => 'online-exam-question-delete', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                     <input type="hidden" name="id" id="online_exam_question_id">
                    <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('common.delete'); ?></button>
                     <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startPush('script'); ?>
<script>
$(document).on('change','.common-checkbox',function (){
        let url = $("#url").val();
        let onlineExamId=$("#online_exam_id_ajax").val();
        let questionBankId = $(this).val();
        let checkbox='';
        if ($(this).is(':checked'))
            {
                checkbox = $(this).val();
            }
        $.ajax({
            type:"POST",
            dataType:"Json",
            data:{questions:questionBankId,online_exam_id:onlineExamId,checkbox:checkbox},
            url:url + "/" + "online-exam-question-assign",
            success:function(data){
                if (data == "success") {
                    toastr.success('Operation successful', 'Successful', {
                    timeOut: 5000
                    })
                } else {
                    toastr.error('Operation Failed', 'Failed', {
                    timeOut: 5000
                    })
                }
            }
        });
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\examination\manage_online_exam.blade.php ENDPATH**/ ?>
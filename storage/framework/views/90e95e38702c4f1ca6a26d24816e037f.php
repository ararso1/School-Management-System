<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('academics.class_routine'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('academics.academics'); ?></a>
                <a href="#"><?php echo app('translator')->get('academics.class_routine'); ?></a>
            </div>
        </div>
    </div>
</section>

<?php if(isset($class_times)): ?>
<section class="mt-20">
    <div class="container-fluid p-0">
        <div class="row mt-40">
            
                <div class="col-lg-4 no-gutters">
                    <div class="main-title">
                        <h3 class="mb-30"><?php echo app('translator')->get('academics.class_routine'); ?></h3>
                    </div>
                </div>
                <div class="col-lg-8 pull-right mb-30">
                    <a href="<?php echo e(route('print-teacher-routine', [$teacher_id])); ?>" class="primary-btn small fix-gr-bg pull-right" target="_blank"><i class="ti-printer"> </i> <?php echo app('translator')->get('common.print'); ?></a>
    
                </div>
            
        </div>

        <div class="row">
            <div class="col-lg-12">
                <table class="table school-table-style" cellspacing="0" width="100%">                 
                    <thead>
                        <tr>
                            <?php
                                $height= 0;
                                $tr = [];
                            ?>
                            <?php $__currentLoopData = $sm_weekends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sm_weekend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                                <?php if( $sm_weekend->teacherClassRoutine->count() >$height): ?>
                                    <?php
                                        $height =  $sm_weekend->teacherClassRoutine->count();
                                    ?>
                                <?php endif; ?>

                            <th><?php echo e(@$sm_weekend->name); ?></th>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        $used = [];
                        $tr=[];
            
                    ?>
                    <?php $__currentLoopData = $sm_weekends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sm_weekend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    
                        $i = 0;
                    ?>
                        <?php $__currentLoopData = $sm_weekend->teacherClassRoutine; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $routine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            if(!in_array($routine->id, $used)){
                                if(moduleStatusCheck('University')){
                                    $tr[$i][$sm_weekend->name][$loop->index]['subject']= $routine->unSubject ? $routine->unSubject->subject_name :'';
                                    $tr[$i][$sm_weekend->name][$loop->index]['subject_code']= $routine->unSubject ? $routine->unSubject->subject_code :'';
                                }
                                else
                                {
                                    $tr[$i][$sm_weekend->name][$loop->index]['subject']= $routine->subject ? $routine->subject->subject_name :'';
                                    $tr[$i][$sm_weekend->name][$loop->index]['subject_code']= $routine->subject ? $routine->subject->subject_code :'';
                                }
                                $tr[$i][$sm_weekend->name][$loop->index]['class_room']= $routine->classRoom ? $routine->classRoom->room_no : '';
                                $tr[$i][$sm_weekend->name][$loop->index]['teacher']= $routine->teacherDetail ? $routine->teacherDetail->full_name :'';
                                $tr[$i][$sm_weekend->name][$loop->index]['start_time']=  $routine->start_time;
                                $tr[$i][$sm_weekend->name][$loop->index]['end_time']= $routine->end_time;
                                $tr[$i][$sm_weekend->name][$loop->index]['class_name']= $routine->class ? $routine->class->class_name : '';
                                $tr[$i][$sm_weekend->name][$loop->index]['section_name']= $routine->section ? $routine->section->section_name : '';
                                $tr[$i][$sm_weekend->name][$loop->index]['is_break']= $routine->is_break;
                                $used[] = $routine->id;
                            } 
                                 
                            ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
                        <?php
                            
                            $i++;
                        ?>
            
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
                   <?php for($i = 0; $i < $height; $i++): ?>
                   <tr>
                    <?php $__currentLoopData = $tr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $days): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <?php $__currentLoopData = $sm_weekends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sm_weekend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td>
                            <?php
                                 $classes=gv($days,$sm_weekend->name);
                             ?>
                             <?php if($classes && gv($classes,$i)): ?>              
                               <?php if($classes[$i]['is_break']): ?>
                              <strong > <?php echo app('translator')->get('common.break'); ?> </strong>
                                 
                               <span class=""> (<?php echo e(date('h:i A', strtotime(@$classes[$i]['start_time']))); ?>  - <?php echo e(date('h:i A', strtotime(@$classes[$i]['end_time']))); ?>)  <br> </span> 
                                <?php else: ?>
                                <span class=""><?php echo e(date('h:i A', strtotime(@$classes[$i]['start_time']))); ?>  - <?php echo e(date('h:i A', strtotime(@$classes[$i]['end_time']))); ?>  <br> </span> 
                                    <span class="">  <strong>  <?php echo e($classes[$i]['subject']); ?> </strong>  (<?php echo e($classes[$i]['subject_code']); ?>) <br>  </span>            
                                    <?php if($classes[$i]['class_room']): ?>
                                        <span class=""> <strong><?php echo app('translator')->get('common.room'); ?> :</strong>     <?php echo e($classes[$i]['class_room']); ?>  <br>     </span>
                                    <?php endif; ?>    
                                    <?php if($classes[$i]['class_name']): ?>
                                    <span class=""> <?php echo e($classes[$i]['class_name']); ?>   <?php if($classes[$i]['section_name']): ?> ( <?php echo e($classes[$i]['section_name']); ?> )   <?php endif; ?>  <br> </span>
                                    <?php endif; ?>    
                                    
                                
            
                                 <?php endif; ?>
            
                            <?php endif; ?>
                            
                        </td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
              
                                
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   </tr>
            
                   <?php endfor; ?>
                    </tbody>
                    </table>
            </div>
        </div>
    </div>
</section>

<?php endif; ?>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\teacherPanel\view_class_routine.blade.php ENDPATH**/ ?>
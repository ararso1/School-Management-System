<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('reports.class_routine_report'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('reports.class_routine_report'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('reports.reports'); ?></a>
                <a href="#"><?php echo app('translator')->get('reports.class_routine_report'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12">
                    
                    <div class="white-box">

                        <div class="row">
                            <div class="col-lg-8 col-md-6">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php echo app('translator')->get('common.select_criteria'); ?> </h3>
                                </div>
                            </div>
                        </div>

                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'class_routine_reports', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

                            <div class="row">
                                <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                <?php if(moduleStatusCheck('University')): ?>
                                <?php if ($__env->exists('university::common.session_faculty_depart_academic_semester_level',['required' => ['USN','UF', 'UD', 'UA', 'US', 'USL', 'USEC'], 'hide' => ['USUB']])) echo $__env->make('university::common.session_faculty_depart_academic_semester_level',['required' => ['USN','UF', 'UD', 'UA', 'US', 'USL', 'USEC'], 'hide' => ['USUB']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php else: ?>
                                <div class="col-lg-6 mt-30-md col-md-6">
                                    <label class="primary_input_label" for=""><?php echo e(__('common.class')); ?><span class="text-danger"> *</span></label>
                                    <select class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>" id="select_class" name="class">
                                        <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value=""><?php echo app('translator')->get('common.select_class'); ?> *</option>
                                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($class->id); ?>"  <?php echo e(isset($class_id)? ($class_id == $class->id?'selected':''):''); ?>><?php echo e($class->class_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('class')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('class')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-6 mt-30-md col-md-6" id="select_section_div">
                                    <label class="primary_input_label" for=""><?php echo e(__('common.section')); ?><span class="text-danger"> *</span></label>
                                    <select class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?>" id="select_section" name="section">
                                        <option data-display="<?php echo app('translator')->get('common.select_section'); ?> *" value=""><?php echo app('translator')->get('common.select_section'); ?> *</option>
                                    </select>
                                    <div class="pull-right loader loader_style" id="select_section_loader">
                                        <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                    </div>
                                    <?php if($errors->has('section')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('section')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?>

                                <div class="col-lg-12 mt-20 text-right">
                                    <button type="submit" class="primary-btn small fix-gr-bg">
                                        <span class="ti-search pr-2"></span>
                                        <?php echo app('translator')->get('common.search'); ?>
                                    </button>
                                </div>
                            </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
    </div>
</section>

<?php if(isset($sm_routine_updates)): ?>
<section class="mt-20">
    <div class="container-fluid p-0">
        <div class="white-box mt-40">
            <div class="row">
                <div class="col-lg-4 no-gutters">
                    <div class="main-title">
                        <h3 class="mb-15"><?php echo app('translator')->get('reports.class_routine'); ?></h3>
                    </div>
                </div>
                <div class="col-lg-8 pull-right">
                    <?php if(moduleStatusCheck('University')): ?>
                    <a href="<?php echo e(route('university.academics.classRoutinePrint', [$un_semester_label_id, $un_section_id])); ?>" class="primary-btn small fix-gr-bg pull-right" target="_blank"><i class="ti-printer"> </i> <?php echo app('translator')->get('reports.print'); ?></a>
                    <?php else: ?>
                    <a href="<?php echo e(route('classRoutinePrint', [$class_id, $section_id])); ?>" class="primary-btn small fix-gr-bg pull-right" target="_blank"><i class="ti-printer"> </i> <?php echo app('translator')->get('reports.print'); ?></a>
                    <?php endif; ?> 
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                    <table id="default_table" class="table " cellspacing="0" width="100%">
                        <thead>
                           
                            <tr>
                               
                                <?php
                                    $height= 0;
                                    $tr = [];
                                ?>
                            <?php $__currentLoopData = $sm_weekends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sm_weekend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            $count = $sm_weekend->classRoutine()->where('class_id', $class_id)->where('section_id', $section_id)->count();
                            ?>
                              
                                <?php if( $count >$height): ?>
                                    <?php
                                        $height = $count;
                                    ?>
                                <?php endif; ?>
                
                                <th><?php echo e(@$sm_weekend->name); ?></th>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tr>
                        </thead>
    
                        <?php
                        $used = [];
                        $tr=[];
            
                        ?>
                        <?php $__currentLoopData = $sm_weekends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sm_weekend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        
                            $i = 0;
                        ?>
                        <?php $__currentLoopData = $sm_weekend->classRoutine()->where('class_id', $class_id)->where('section_id', $section_id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $routine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                            <?php
                            if(!in_array($routine->id, $used)){
    
                                if(moduleStatusCheck('University')){
                                    $tr[$i][$sm_weekend->name][$loop->index]['subject']= $routine->unSubject ? $routine->unSubject->subject_name :'';
                                    $tr[$i][$sm_weekend->name][$loop->index]['subject_code']= $routine->unSubject ? $routine->unSubject->subject_code :'';
                                }else{
                                    $tr[$i][$sm_weekend->name][$loop->index]['subject']= $routine->subject ? $routine->subject->subject_name :'';
                                    $tr[$i][$sm_weekend->name][$loop->index]['subject_code']= $routine->subject ? $routine->subject->subject_code :'';
                                }
    
                                $tr[$i][$sm_weekend->name][$loop->index]['class_room']= $routine->classRoom ? $routine->classRoom->room : '';
                                $tr[$i][$sm_weekend->name][$loop->index]['teacher']= $routine->teacherDetail ? $routine->teacherDetail->full_name :'';
                                $tr[$i][$sm_weekend->name][$loop->index]['start_time']=  $routine->start_time;
                                $tr[$i][$sm_weekend->name][$loop->index]['end_time']= $routine->end_time;
                                $tr[$i][$sm_weekend->name][$loop->index]['is_break']= $routine->is_break;
                                $used[] = $routine->id;
                            } 
                                 
                            ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
                        <?php
                            
                            $i++;
                        ?>
            
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <tbody>
                       
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
                                       <strong > <?php echo app('translator')->get('reports.break'); ?> </strong>
                                          
                                        <span class=""> (<?php echo e(date('h:i A', strtotime(@$classes[$i]['start_time']))); ?>  - <?php echo e(date('h:i A', strtotime(@$classes[$i]['end_time']))); ?>)  <br> </span> 
                                         <?php else: ?>
                                             <span class=""> <strong><?php echo app('translator')->get('common.subject'); ?> :</strong>   <?php echo e($classes[$i]['subject']); ?> (<?php echo e($classes[$i]['subject_code']); ?>) <br>  </span>            
                                             <?php if($classes[$i]['class_room']): ?>
                                                 <span class=""> <strong><?php echo app('translator')->get('common.room'); ?> :</strong>     <?php echo e($classes[$i]['class_room']); ?>  <br>     </span>
                                             <?php endif; ?>    
                                             <?php if($classes[$i]['teacher']): ?>
                                             <strong><?php echo app('translator')->get('common.teacher'); ?> :</strong>   <span class=""> <?php echo e($classes[$i]['teacher']); ?>  <br> </span>
                                             <?php endif; ?>           
                         
                                             <span class=""> <strong><?php echo app('translator')->get('common.time'); ?> :</strong> <?php echo e(date('h:i A', strtotime(@$classes[$i]['start_time']))); ?>  - <?php echo e(date('h:i A', strtotime(@$classes[$i]['end_time']))); ?>  <br> </span> 
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
        </div>
    </div>
</section>

<?php endif; ?>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\reports\class_routine_report.blade.php ENDPATH**/ ?>
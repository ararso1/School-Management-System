<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('homework.evaluation'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
    <style>
        .single-meta table th,.single-meta table td {
            vertical-align: middle;
        }

        .single-meta table tbody tr:hover {
            background: #fbfcff !important;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('homework.evaluation'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('homework.home_work'); ?></a>
                <a href="#"><?php echo app('translator')->get('homework.homework_list'); ?></a>
                <a href="#"><?php echo app('translator')->get('homework.evaluation'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
<div class="container-fluid mt-30">
    <div class="row">
        <div class="col-lg-12 student-details">
            <div class="student-meta-box">
                <div class="single-meta">
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'save-homework-evaluation-data', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                    <div class="row">
                        <div class="col-lg-9 col-md-9">
                            <div class="white-box">
                                <div class="table-responsive">
                                    <table id="" class="table table-condensed table-hover custome-radio-class" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th><?php echo app('translator')->get('student.admission_no'); ?></th>
                                                <th><?php echo app('translator')->get('student.student_name'); ?></th>
                                                <th><?php echo app('translator')->get('homework.marks'); ?></th>
                                                <th><?php echo app('translator')->get('homework.comments'); ?></th>
                                                <th><?php echo app('translator')->get('homework.home_work_status'); ?></th>
                                                <th><?php echo app('translator')->get('homework.download'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <?php
                                                    $submitted_student =  App\SmHomework::evaluationHomework($value->id, $homeworkDetails->id);
                                                    @$uploadedContent = App\SmHomework::uploadedContent(@$value->id, $homeworkDetails->id);
                                                    $file_paths=[];
                                                    foreach ($uploadedContent as $key => $files_row) {
                                                        $only_files=json_decode($files_row->file);
                                                        foreach ($only_files as $second_key => $upload_file_path) {
                                                            $file_paths[]= $upload_file_path;
                                                        }
                                                    }
                                                    $files_ext=[];
                                                    foreach ($file_paths as $key => $file) {
                                                        $files_ext[]=pathinfo($file, PATHINFO_EXTENSION);
                                                    }
                                                ?>

                                                <?php if($submitted_student != ""): ?>
                                                    <tr>
                                                        <td><?php echo e($submitted_student->studentInfo ?$submitted_student->studentInfo->admission_no:null); ?></td>
                                                        <td><?php echo e($submitted_student->studentInfo ?$submitted_student->studentInfo->full_name:''); ?></td>
                                                        <td>
                                                            <div class="primary_input">
                                                                <?php if($submitted_student->marks>0): ?>
                                                                <input class="primary_input_field form-control" min="0" max="<?php echo e($homeworkDetails->marks); ?>" type="number" step="0.01" name="marks[]" value="<?php echo e($submitted_student->marks); ?>">
                                                                
                                                                <label></label>
                                                                <?php if($errors->has('marks')): ?>
                                                                <span class="text-danger" >
                                                                    <?php echo e($errors->first('marks')); ?>

                                                                </span>
                                                                <?php endif; ?>
                                                                <?php else: ?>
                                                                <input class="primary_input_field form-control" min="0" max="<?php echo e($homeworkDetails->marks); ?>" type="number" step="0.01" name="marks[]" value="<?php echo e($submitted_student->marks); ?>">
                                                                
                                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('homework.marks'); ?></label>
                                                                <?php if($errors->has('marks')): ?>
                                                                <span class="text-danger" >
                                                                    <?php echo e($errors->first('marks')); ?>

                                                                </span>
                                                                <?php endif; ?>
                                                                <?php endif; ?> 
                                                            </div>
                                                            <input type="hidden" name="student_id[]" value="<?php echo e($submitted_student->studentInfo?$submitted_student->studentInfo->id:''); ?>">
                                                            <input type="hidden" name="homework_id" value="<?php echo e($homework_id); ?>">
                                                            
                                                        </td>
                                                        <td>
                                                            
                                                            <div class="d-flex flex-column">
                                                                <div class="mr-30">
                                                                    <input type="radio" id="buttonG<?php echo e($submitted_student->studentInfo?$submitted_student->studentInfo->id:''); ?>" class="common-radio" name="teacher_comments[<?php echo e($submitted_student->studentInfo?$submitted_student->studentInfo->id:''); ?>]" value="G" <?php echo e($submitted_student->teacher_comments == "G"? 'checked':''); ?> > &nbsp; &nbsp; &nbsp; &nbsp;<label for="buttonG<?php echo e($submitted_student->studentInfo?$submitted_student->studentInfo->id:''); ?>"><?php echo app('translator')->get('homework.good'); ?></label> &nbsp; &nbsp;
                                                                </div>
                                                                <div class="mr-30">
                                                                    <input type="radio" id="buttonNG<?php echo e($submitted_student->studentInfo?$submitted_student->studentInfo->id:''); ?>" class="common-radio" name="teacher_comments[<?php echo e($submitted_student->studentInfo?$submitted_student->studentInfo->id:''); ?>]" value="NG" <?php echo e($submitted_student->teacher_comments == "NG"? 'checked':''); ?>> &nbsp; &nbsp;<label class="nowrap" for="buttonNG<?php echo e($submitted_student->studentInfo?$submitted_student->studentInfo->id:''); ?>"><?php echo app('translator')->get('homework.not_good'); ?></label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="mr-30">
                                                                    <input type="radio" id="buttonC<?php echo e($submitted_student->studentInfo?$submitted_student->studentInfo->id:''); ?>" class="common-radio" name="homework_status[<?php echo e($submitted_student->studentInfo?$submitted_student->studentInfo->id:''); ?>]" value="C" <?php echo e($submitted_student->complete_status == "C"? 'checked':''); ?> checked> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<label for="buttonC<?php echo e($submitted_student->studentInfo?$submitted_student->studentInfo->id:''); ?>"><?php echo app('translator')->get('homework.completed'); ?></label> &nbsp; &nbsp;
                                                                </div>
                                                                <div class="mr-30">
                                                                    <input type="radio" id="buttonNC<?php echo e($submitted_student->studentInfo?$submitted_student->studentInfo->id:''); ?>" class="common-radio" name="homework_status[<?php echo e($submitted_student->studentInfo?$submitted_student->studentInfo->id:''); ?>]" value="NC" <?php echo e($submitted_student->complete_status == "NC"? 'checked':''); ?>>&nbsp; &nbsp; <label class="nowrap" for="buttonNC<?php echo e($submitted_student->studentInfo?$submitted_student->studentInfo->id:''); ?>"><?php echo app('translator')->get('homework.not_completed'); ?></label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            
                                                            
                                                            <?php if($uploadedContent->count() >0 ): ?>
                                                                
                                                                <?php if(in_array('jpg',$files_ext) || in_array('jpeg',$files_ext) || in_array('heic',$files_ext) || in_array('png',$files_ext) || in_array('mp4',$files_ext) || in_array('mp3',$files_ext) || in_array('mov',$files_ext) || in_array('pdf',$files_ext)): ?>
                                                                    
                                                                    <a class="dropdown-item viewSubmitedHomework" data-toggle="modal" data-target="#viewSubmitedHomework<?php echo e($value->id); ?>"
                                                                    href="#"> <span class="pl ti-download"></span></a>
                                                            
                                                                <?php else: ?>
                                                                <a class="dropdown-item " href="<?php echo e(route('download-uploaded-content-admin',[$homeworkDetails->id,$value->id])); ?>">
                                                                        <span class="pl ti-download"></span>
                                                                </a>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                <?php else: ?>

                                                    <tr>
                                                        <td><?php echo e($value->admission_no); ?></td>
                                                        <td><?php echo e($value->full_name); ?></td>
                                                        <td>
                                                            <div class="primary_input">
                                                                <input class="primary_input_field form-control" type="number" min="0" step="0.01" max="<?php echo e(@$homeworkDetails->marks); ?>" name="marks[]">
                                                                
                                                                <?php if($errors->has('marks')): ?>
                                                                    <span class="text-danger" >
                                                                        <?php echo e($errors->first('marks')); ?>

                                                                    </span>
                                                                <?php endif; ?>
                                                            </div>
                                                            <input type="hidden" name="student_id[]" value="<?php echo e($value->id); ?>">
                                                            <input type="hidden" name="homework_id" value="<?php echo e($homework_id); ?>">
                                                            
                                                        </td>
                                                        <td>
                                                            <div class="radio-btn-flex mb-1">
                                                                <input type="radio" id="buttonG<?php echo e($value->id); ?>" class="common-radio" name="teacher_comments[<?php echo e($value->id); ?>]" value="G" checked>
                                                                <label for="buttonG<?php echo e($value->id); ?>"><?php echo app('translator')->get('homework.good'); ?></label>
                                                            </div>
                                                            <br>
                                                            <div class="radio-btn-flex">
                                                                <input type="radio" id="buttonNG<?php echo e($value->id); ?>" class="common-radio" class="common-radio" name="teacher_comments[<?php echo e($value->id); ?>]" value="NG" checked>
                                                                <label class="nowrap" for="buttonNG<?php echo e($value->id); ?>"><?php echo app('translator')->get('homework.not_good'); ?></label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio-btn-flex mb-1">
                                                                <input type="radio" id="buttonC<?php echo e($value->id); ?>" class="common-radio" name="homework_status[<?php echo e($value->id); ?>]" value="C">
                                                                <label for="buttonC<?php echo e($value->id); ?>"><?php echo app('translator')->get('homework.completed'); ?></label>
                                                            </div>
                                                            <br>
                                                            <div class="radio-btn-flex">
                                                                <input type="radio" id="buttonNC<?php echo e($value->id); ?>" class="common-radio" name="homework_status[<?php echo e($value->id); ?>]" value="NC" checked>
                                                                <label class="nowrap" for="buttonNC<?php echo e($value->id); ?>"><?php echo app('translator')->get('homework.not_completed'); ?></label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <?php if($uploadedContent->count()>0 ): ?>
                                                                <?php if(in_array('jpg',$files_ext) || in_array('jpeg',$files_ext) || in_array('heic',$files_ext) || in_array('png',$files_ext) || in_array('mp4',$files_ext) || in_array('mp3',$files_ext) || in_array('mov',$files_ext) || in_array('pdf',$files_ext)): ?>
                                                                    <a class="dropdown-item viewSubmitedHomework" data-toggle="modal" data-target="#viewSubmitedHomework<?php echo e($value->id); ?>" href="#">
                                                                        <span class="pl ti-download"></span>
                                                                    </a>
                                                                <?php else: ?>
                                                                    <a class="dropdown-item " href="<?php echo e(route('download-uploaded-content-admin',[$homeworkDetails->id,$value->id])); ?>">
                                                                        <span class="pl ti-download"></span>
                                                                    </a>
                                                                    
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>

                                                <?php if($uploadedContent->count()>0 ): ?>
                                                    <div class="modal fade admin-query admin_view_modal" id="viewSubmitedHomework<?php echo e($value->id); ?>" >
                                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title"><?php echo app('translator')->get('homework.home_work_attach_file'); ?></h4>
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                </div>
                                                    
                                                                <div class="modal-body">
                                                                    <?php $__currentLoopData = $file_paths; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file_key=> $std_file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php
                                                                            $ext =strtolower(str_replace('"]','',pathinfo($std_file, PATHINFO_EXTENSION)));
                                                                            $attached_file=str_replace('"]','',$std_file);
                                                                            $attached_file=str_replace('["','',$attached_file);
                                                                            $preview_files=['jpg','jpeg','png','heic','mp4','mov','mp3','mp4','pdf'];
                                                                        
                                                                        ?>

                                                                            <?php if($ext=='jpg' || $ext=='jpeg' || $ext=='png' || $ext=='heic'): ?>
                                                                                <img class="img-responsive mt-20" style="max-width: 600px; height:auto" src="<?php echo e(asset($attached_file)); ?>">
                                                                                <?php elseif($ext=='mp4' || $ext=='mov'): ?>
                                                                                <video class="mt-20 video_play" width="100%"  controls>
                                                                                    <source src="<?php echo e(asset($attached_file)); ?>" type="video/mp4">
                                                                                    <source src="mov_bbb.ogg" type="video/ogg">
                                                                                    Your browser does not support HTML video.
                                                                                </video>
                                                                            <?php elseif($ext=='mp3'): ?>
                                                                            <audio class="mt-20 audio_play" controls  style="width: 100%">
                                                                                <source src="<?php echo e(asset($attached_file)); ?>" type="audio/ogg">
                                                                                <source src="horse.mp3" type="audio/mpeg">
                                                                            Your browser does not support the audio element.
                                                                            </audio>
                            
                                                                            <?php elseif($ext=='pdf'): ?>
                                                                            
                                                                            
                                                                            <object data='<?php echo e(asset($attached_file)); ?>' type="application/pdf" width="100%" height="800">
                                                                    
                                                                                <iframe src='<?php echo e(asset($attached_file)); ?>' width="100%"height="800">
                                                                                    <p>This browser does not support PDF!</p>
                                                                                </iframe>
                                                                    
                                                                            </object>
                                                                            <?php endif; ?>
                                                                            <?php if(!in_array($ext,$preview_files)): ?>
                                                                                
                                                                                <div class="alert alert-warning">
                                                                                    <?php echo e($ext); ?> File Not Previewable</a>.
                                                                                </div>
                                                                            <?php endif; ?>
                                                                            <div class="mt-40 d-flex justify-content-between">
                                                                                
                                                                                <?php
                                                                                    $set_filename=time().'_'.$file_key;
                                                                                ?>
                                                                                <a class="primary-btn tr-bg" download="<?php echo e($set_filename); ?>" href="<?php echo e(asset($attached_file)); ?>"> <span class="pl ti-download"> <?php echo app('translator')->get('homework.download'); ?></span></a> 
                                                                                
                                                                        </div>
                                                                        <hr>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </div>
                                                    
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
               
                            <div class="white-box mt-30">
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn fix-gr-bg" data-toggle="tooltip" title="">
                                            <span class="ti-check"></span>
                                            <?php echo app('translator')->get('homework.save_evaluation'); ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                        <div class="col-lg-3 col-md-3">
                            <div class="white-box">
                        <div class="col-lg-12">
                            <div class="row">

                                <h4 class="stu-sub-head"><?php echo app('translator')->get('homework.home_work_summary'); ?></h4>

                            </div>
                        </div> 

                    <div class="single-meta">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="value text-left">
                                        <?php echo app('translator')->get('homework.home_work_date'); ?>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="name">
                                    <?php if(isset($homeworkDetails)): ?>
                                    
                                    <?php echo e($homeworkDetails->homework_date != ""? dateConvert($homeworkDetails->homework_date):''); ?>


                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="single-meta">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="value text-left">
                                        <?php echo app('translator')->get('homework.submission_date'); ?>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="name">
                                    <?php if(isset($homeworkDetails)): ?>
                                   
                                     <?php echo e($homeworkDetails->submission_date != ""? dateConvert($homeworkDetails->submission_date):''); ?>


                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-meta">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="value text-left">
                                        <?php echo app('translator')->get('homework.evaluation_date'); ?>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="name">
                                    <?php if(@$homeworkDetails->evaluation_date != ""): ?>
                                  
                                        <?php echo e(@$homeworkDetails->evaluation_date != ""? dateConvert($homeworkDetails->evaluation_date):''); ?>

              
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="single-meta">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="value text-left">
                                        <?php echo app('translator')->get('homework.created_by'); ?>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="name">
                                   <?php if(isset($homeworkDetails)): ?>
                                   <?php echo e($homeworkDetails->users->full_name); ?>

                                   <?php endif; ?>
                               </div>
                           </div>
                       </div>
                   </div>

                   <div class="single-meta">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="value text-left">
                                    <?php echo app('translator')->get('homework.evaluated_by'); ?>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="name">
                                <?php if(isset($homeworkDetails)): ?>
                                <?php echo e(@$homeworkDetails->evaluatedBy->full_name); ?>

                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="single-meta">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="value text-left">
                            <?php if(moduleStatusCheck('University')): ?>
                                <?php echo app('translator')->get('university::un.semester_label'); ?>
                            <?php else: ?>
                                <?php echo app('translator')->get('common.class'); ?>
                            <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="name">
                               <?php if(moduleStatusCheck('University')): ?>
                                 <?php echo e(@$homeworkDetails->semesterlabel->name); ?> (<?php echo e(@$homeworkDetails->unAcademic->name); ?>)
                               <?php else: ?>
                                <?php echo e(@$homeworkDetails->classes->class_name); ?>

                               <?php endif; ?>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="single-meta">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="value text-left">
                            <?php if(moduleStatusCheck('University')): ?>
                            <?php echo app('translator')->get('university::un.department'); ?>
                            <?php else: ?>
                                <?php echo app('translator')->get('common.section'); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="name">
                            <?php if(moduleStatusCheck('University')): ?>
                                 <?php echo e(@$homeworkDetails->unDepartment->name); ?>

                               <?php else: ?>
                               <?php echo e(@$homeworkDetails->sections->section_name); ?>

                               <?php endif; ?>
                            
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="single-meta">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="value text-left">
                                <?php echo app('translator')->get('homework.subject'); ?>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="name">
                            <?php if(isset($homeworkDetails)): ?>
                            <?php echo e(@$homeworkDetails->subjects->subject_name); ?>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="single-meta">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="value text-left">
                                <?php echo app('translator')->get('homework.marks'); ?>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="name">
                            
                            <?php echo e(@$homeworkDetails->marks); ?>

                           
                        </div>
                    </div>
                </div>
            </div>

            <div class="single-meta">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="value text-left">
                            <?php echo app('translator')->get('homework.attach_file'); ?> 
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="name">
                            <?php if(@$homeworkDetails->file != ""): ?>
                                <?php
                                    $files_ext=pathinfo($homeworkDetails->file, PATHINFO_EXTENSION);
                                ?>
                                <?php if($files_ext=='jpg' || $files_ext=='jpeg' || $files_ext=='heic' || $files_ext=='png'|| $files_ext=='mp4'|| $files_ext=='mp3'|| $files_ext=='mov'|| $files_ext=='pdf'): ?>
                                    <a class="dropdown-item viewSubmitedHomework" data-toggle="modal" data-target="#viewHomeworkFile" href="#"> 
                                        <span class="pl ti-download"></span>
                                    </a>
                                    
                                <?php else: ?>
                                    <a href="<?php echo e(url(@$homeworkDetails->file)); ?>" download>
                                        <?php echo app('translator')->get('homework.download'); ?> 
                                        <span class="pl ti-download"></span>
                                    </a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="single-meta">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="value text-left">
                            <?php echo app('translator')->get('common.description'); ?> 
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="name">
                            <?php if(isset($homeworkDetails)): ?>
                                <?php echo e($homeworkDetails->description); ?>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade admin-query admin_view_modal" id="viewHomeworkFile" >
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><?php echo app('translator')->get('homework.home_work_file'); ?></h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                                <?php
                                    $std_file =$homeworkDetails->file;
                                    $ext =strtolower(str_replace('"]','',pathinfo($std_file, PATHINFO_EXTENSION)));
                                    $attached_file=str_replace('"]','',$std_file);
                                    $attached_file=str_replace('["','',$attached_file);
                                    $preview_files=['jpg','jpeg','png','heic','mp4','mov','mp3','mp4','pdf'];
                                ?>
                                <?php if($ext=='jpg' || $ext=='jpeg' || $ext=='png' || $ext=='heic'): ?>
                                    <img class="img-responsive mt-20" style="width: 100%; height:auto" src="<?php echo e(asset($attached_file)); ?>">
                                <?php elseif($ext=='mp4' || $ext=='mov'): ?>
                                    <video class="mt-20 video_play" width="100%"  controls>
                                        <source src="<?php echo e(asset($attached_file)); ?>" type="video/mp4">
                                        <source src="mov_bbb.ogg" type="video/ogg">
                                        Your browser does not support HTML video.
                                    </video>
                                <?php elseif($ext=='mp3'): ?>
                                    <audio class="mt-20 audio_play" controls  style="width: 100%">
                                        <source src="<?php echo e(asset($attached_file)); ?>" type="audio/ogg">
                                        <source src="horse.mp3" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                    </audio>
                                <?php elseif($ext=='pdf'): ?>
                                    <object data='<?php echo e(asset($attached_file)); ?>' type="application/pdf" width="100%" height="800">
                                        <iframe src='<?php echo e(asset($attached_file)); ?>' width="100%"height="800">
                                            <p>This browser does not support PDF!</p>
                                        </iframe>
                                    </object>
                                <?php endif; ?>
                                <?php if(!in_array($ext,$preview_files)): ?>
                                    <div class="alert alert-warning">
                                        <?php echo e($ext); ?> File Not Previewable</a>.
                                    </div>
                                <?php endif; ?>
                                <div class="mt-40 d-flex justify-content-between">
                                        
                                    <?php
                                        $set_filename=time().'_'.$std_file;
                                    ?>
                                    <a class="primary-btn tr-bg" download="<?php echo e($set_filename); ?>" href="<?php echo e(asset($attached_file)); ?>"> <span class="pl ti-download"> <?php echo app('translator')->get('homework.download'); ?></span></a> 
                                        
                                </div>
                                <hr>
                                </div>
            
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>


<?php $__env->startPush('script'); ?>
<script type="text/javascript">
    jQuery('.admin_view_modal').on('hidden.bs.modal', function (e) {
    //   console.log('closed');
    //   jQuery('#viewSubmitedHomework video').attr("src", jQuery("#viewSubmitedHomework  video").attr("src"));
      $('.video_play').get(0).play();
      $('.video_play').trigger('pause');
      
      $('.audio_play').get(0).play();
      $('.audio_play').trigger('pause');
    });
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\homework\evaluationHomework.blade.php ENDPATH**/ ?>
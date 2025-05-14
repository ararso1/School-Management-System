<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('exam.mark_sheet_report_student'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<style>
    th{
        border: 1px solid black;
        text-align: center;
    }
    td{
        text-align: center;
    }
    td.subject-name{
        text-align: left;
        padding-left: 10px !important;
    }
    table.marksheet{
        width: 100%;
        border: 1px solid var(--border_color) !important;
    }
    table.marksheet th{
        border: 1px solid var(--border_color) !important;
    }
    table.marksheet td{
        border: 1px solid var(--border_color) !important;
    }
    table.marksheet thead tr{
        border: 1px solid var(--border_color) !important;
    }
    table.marksheet tbody tr{
        border: 1px solid var(--border_color) !important;
    }

    .studentInfoTable{
        width: 100%;
        padding: 0px !important;
    }

    .studentInfoTable td{
        padding: 0px !important;
        text-align: left;
        padding-left: 15px !important;
    }
    h4{
        text-align: left !important;
    }
    hr{
        margin: 0px;
    }
    #grade_table th{
        border: 1px solid black;
        text-align: center;
        background: #351681;
        color: white;
    }
    #grade_table td{
        color: black;
        text-align: center !important;
        border: 1px solid black;
    }
</style>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.mark_sheet_report_student'); ?> </h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('reports.reports'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.mark_sheet_report_student'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    <div class="main-title">
                        <h3 class="mb-30"><?php echo app('translator')->get('common.select_criteria'); ?></h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?php if(session()->has('message-success') != ""): ?>
                    <?php if(session()->has('message-success')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session()->get('message-success')); ?>

                    </div>
                    <?php endif; ?>
                <?php endif; ?>
                 <?php if(session()->has('message-danger') != ""): ?>
                    <?php if(session()->has('message-danger')): ?>
                    <div class="alert alert-danger">
                        <?php echo e(session()->get('message-danger')); ?>

                    </div>
                    <?php endif; ?>
                <?php endif; ?>
                <div class="white-box">
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'mark_sheet_report_students', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

                        <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            
                            <div class="col-lg-3 mt-30-md">
                                <select class="primary_select form-control<?php echo e($errors->has('exam') ? ' is-invalid' : ''); ?>" name="exam">
                                    <option data-display="<?php echo app('translator')->get('exam.select_exam'); ?> *" value=""><?php echo app('translator')->get('exam.select_exam'); ?> *</option>
                                    <?php $__currentLoopData = $exams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($exam->id); ?>" <?php echo e(isset($exam_id)? ($exam_id == $exam->id? 'selected':''):''); ?>><?php echo e($exam->title); ?></option>
                                       
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('exam')): ?>
                                <span class="text-danger invalid-select" role="alert">
                                    <?php echo e($errors->first('exam')); ?>

                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-3 mt-30-md">
                                <select class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>" id="select_class" name="class">
                                    <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value=""><?php echo app('translator')->get('common.select_class'); ?> *</option>
                                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($class->id); ?>" <?php echo e(isset($class_id)? ($class_id == $class->id? 'selected':''):''); ?>><?php echo e($class->class_name); ?></option>
                                   
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('class')): ?>
                                <span class="text-danger invalid-select" role="alert">
                                    <?php echo e($errors->first('class')); ?>

                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-3 mt-30-md" id="select_section_div">
                                <select class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?> select_section" id="select_section" name="section">
                                    <option data-display="<?php echo app('translator')->get('common.select_section'); ?> *" value=""><?php echo app('translator')->get('common.select_section'); ?> *</option>
                                </select>
                                <?php if($errors->has('section')): ?>
                                <span class="text-danger invalid-select" role="alert">
                                    <?php echo e($errors->first('section')); ?>

                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-3 mt-30-md" id="select_student_div">
                                <select class="primary_select form-control<?php echo e($errors->has('student') ? ' is-invalid' : ''); ?>" id="select_student" name="student">
                                    <option data-display="<?php echo app('translator')->get('common.select_student'); ?> *" value=""><?php echo app('translator')->get('common.select_student'); ?> *</option>
                                </select>
                                <?php if($errors->has('student')): ?>
                                <span class="text-danger invalid-select" role="alert">
                                    <?php echo e($errors->first('student')); ?>

                                </span>
                                <?php endif; ?>
                            </div>

                            
                            <div class="col-lg-12 mt-20 text-right">
                                <button type="submit" class="primary-btn small fix-gr-bg">
                                    <span class="ti-search"></span>
                                    <?php echo app('translator')->get('common.search'); ?>
                                </button>
                            </div>
                        </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
</section>


<?php if(isset($is_result_available)): ?>              
<section class="student-details">
    <div class="container-fluid p-0">
        <div class="row mt-40">
            <div class="col-lg-4 no-gutters">
                <div class="main-title">
                    <h3 class="mb-30"><?php echo app('translator')->get('lang.mark_sheet_report'); ?></h3>
                </div>
            </div>
            <div class="col-lg-8 pull-right">
                <a href="<?php echo e(route('mark_sheet_report_print', [$input['exam_id'], $input['class_id'], $input['section_id'], $input['student_id']])); ?>" class="primary-btn small fix-gr-bg pull-right" target="_blank"><i class="ti-printer"> </i> <?php echo app('translator')->get('common.print'); ?></a>


            </div> 
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="white-box">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="single-report-admit">
                                <div class="card">
                                    <div class="card-header">
                                            <div class="d-flex">
                                                   
                                                    <div class="offset-2 col-lg-2">
                                                    <img class="logo-img" src="<?php echo e(generalSetting()->logo); ?>" alt="">
                                                    </div>
                                                    <div class="col-lg-6 ml-30">
                                                        <h3 class="text-white"> <?php echo e(isset(generalSetting()->school_name)?generalSetting()->school_name:'Infix School Management ERP'); ?> </h3> 
                                                        <p class="text-white mb-0"> <?php echo e(isset(generalSetting()->address)?generalSetting()->address:'Infix School Address'); ?> </p>
                                                        <p class="text-white mb-0">Email:  <?php echo e(isset($email)?$email:'hello@aorasoft.com'); ?> ,   Phone:  <?php echo e(isset(generalSetting()->phone)?generalSetting()->phone:'hello@aorasoft.com'); ?> </p> 
                                                    </div>
                                                    <div class="offset-2">
        
                                                    </div>
                                                </div>
                                        
                                        
                                        
                                    </div>
                                    <div class="card-body">
                                        <div class="col-md-12">
                                                <div class="row"> 
                                                    <div class="col-lg-8">
                                                        <div class="row"> 
                                                            <div class="col-lg-2">
                                                                <img class="report-admit-img"  src="<?php echo e(file_exists(@$studentDetails->student_photo) ? asset($studentDetails->student_photo) : asset('public/uploads/staff/demo/staff.jpg')); ?>" width="100" height="100" alt="<?php echo e(asset($studentDetails->student_photo)); ?>">
                                                            </div>
                                                            <div class="col-lg-8">
                                                                 <table class="table">
                                                                    <tr>
                                                                        <td>
                                                                            <h4><?php echo app('translator')->get('lang.student_information'); ?></h4>
                                                                            <table class="studentInfoTable">
                                                                                <tr>
                                                                                    <td class="font-weight-bold">
                                                                                        <?php echo app('translator')->get('student.student_name'); ?> :
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php echo e($student_detail->full_name); ?>

                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="font-weight-bold">
                                                                                        <?php echo app('translator')->get('student.father_name'); ?> :
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php echo e($student_detail->parents->fathers_name); ?>

                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="font-weight-bold">
                                                                                        <?php echo app('translator')->get('student.mother_name'); ?> :
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php echo e($student_detail->parents->mothers_name); ?>

                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="font-weight-bold">
                                                                                        <?php echo app('translator')->get('lang.roll_number'); ?> :
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php echo e($student_detail->roll_no); ?>

                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="font-weight-bold">
                                                                                        <?php echo app('translator')->get('student.admission_no'); ?> :
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php echo e($student_detail->admission_no); ?>

                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="font-weight-bold">
                                                                                        <?php echo app('translator')->get('common.date_of_birth'); ?> :
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php echo e($student_detail->date_of_birth != ""? dateConvert($student_detail->date_of_birth):''); ?>

                                                                                    </td>
                                                                                </tr>


                                                                            </table>
                                                                        </td>
                                                                        <td style="padding-left: 30px">
                                                                            <h4><?php echo app('translator')->get('lang.exam_info'); ?></h4>
                                                                            <table class="studentInfoTable">
                                                                                <tr>
                                                                                    <td class="font-weight-bold">
                                                                                       <?php echo app('translator')->get('onlineexam::onlineExam.exam_title'); ?> :
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php echo e($exam_details->title); ?>

                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="font-weight-bold">
                                                                                        <?php echo app('translator')->get('lang.academic_class'); ?> :
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php echo e($class_name->class_name); ?>

                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="font-weight-bold">
                                                                                        <?php echo app('translator')->get('lang.academic_section'); ?> :
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php echo e($section->section_name); ?>

                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-lg-4 text-black"> 
                                                        <?php $marks_grade=DB::table('sm_marks_grades')->where('academic_id', getAcademicId())->get(); ?>
                                                            <?php if(@$marks_grade): ?>
                                                            <table class="table  table-bordered table-striped text-black" id="grade_table">
                                                                <thead>
                                                                <tr>
                                                                    <th><?php echo app('translator')->get('reports.staring'); ?></th>
                                                                    <th><?php echo app('translator')->get('reports.ending'); ?></th>
                                                                    <th><?php echo app('translator')->get('exam.gpa'); ?></th>
                                                                    <th><?php echo app('translator')->get('exam.grade'); ?></th>
                                                                    <th><?php echo app('translator')->get('homework.evalution'); ?></th>
                                                                </tr>
                                                                </thead>
                                                                <tbody> 
                                                                <?php $__currentLoopData = $marks_grade; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade_d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <tr>
                                                                        <td><?php echo e($grade_d->percent_from); ?></td>
                                                                        <td><?php echo e($grade_d->percent_upto); ?></td>
                                                                        <td><?php echo e($grade_d->gpa); ?></td>
                                                                        <td><?php echo e($grade_d->grade_name); ?></td>
                                                                        <td class="text-left"><?php echo e($grade_d->description); ?></td>
                                                                    </tr>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </tbody>
                                                            </table>
                                                        <?php endif; ?> 
                                                    </div>
                                                    
        
                                                </div>
                                       
                                        <table class="w-100 mt-30 mb-20 table   table-bordered marksheet">
                                            <thead>
                                                <tr>
                                                    <th><?php echo app('translator')->get('common.sl'); ?></th>
                                                    <th><?php echo app('translator')->get('lang.subject_name'); ?></th>
                                                    <th><?php echo app('translator')->get('lang.subject_marks '); ?></th>
                                                    <th><?php echo app('translator')->get('lang.highest_marks'); ?></th>
                                                    <th><?php echo app('translator')->get('lang.obtained_marks'); ?></th>
                                                    <th><?php echo app('translator')->get('lang.letter_grade'); ?></th>
                                                    <th><?php echo app('translator')->get('lang.grade_point'); ?></th>
                                                    <?php if($optional_subject_setup!=''): ?>
                                                    <th><?php echo app('translator')->get('exam.gpa'); ?>
                                                    <hr>
                                                    <small><?php echo app('translator')->get('reports.without_additional'); ?></small>    
                                                    </th>
                                                    <th><?php echo app('translator')->get('exam.gpa'); ?> </th>
                                                    <?php else: ?>
                                                    <th><?php echo app('translator')->get('exam.gpa'); ?> </th>
                                                    <?php endif; ?>
                                                    <th><?php echo app('translator')->get('reports.result'); ?> </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            <?php $sum_gpa= 0;  $resultCount=1; $subject_count=1; $tota_grade_point=0; $this_student_failed=0; ?>
                                            <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                               
                                                <tr>
                                                    <td width='5%'><?php echo e($subject_count++); ?></td>
                                                    <td width='15%' class="subject-name"><?php echo e($data->subject->subject_name); ?> </td>
                                                    
                                                    <td width='10%'>
                                                        
                                                        <?php $subject_mark=App\SmAssignSubject::getSubjectMark($data->subject_id, $class_id, $section_id, $exam_type_id);

                                                         echo $subject_mark;
                                                         ?>

                                                    </td>
                                                    <td width='10%'>
                                                        
                                                        <?php $highest_mark=App\SmAssignSubject::getHighestMark($data->subject_id, $class_id, $section_id, $exam_type_id);

                                                        echo $highest_mark;
                                                         ?>

                                                    </td>
                                                    <td width='10%'>
                                                         <?php $tola_mark_by_subject=App\SmAssignSubject::getSumMark($student_detail->id, $data->subject_id, $class_id, $section_id, $exam_type_id);

                                                         echo $tola_mark_by_subject;
                                                         ?>
                                                    </td>
                                                    <td width='10%'>

                                                        <?php
                                                            $mark_grade = App\SmMarksGrade::where([['percent_from', '<=', $tola_mark_by_subject], ['percent_upto', '>=', $tola_mark_by_subject]])->first();

                                                        ?>
                                                        <?php echo e($mark_grade->grade_name); ?>

                                                    </td>
                                                    <td width='10%'>

                                                        <?php
                                                            $mark_grade = App\SmMarksGrade::where([['percent_from', '<=', $tola_mark_by_subject], ['percent_upto', '>=', $tola_mark_by_subject]])->first();
                                                            $tota_grade_point = $tota_grade_point + $mark_grade->gpa ;
                                                            if($mark_grade->gpa<1){
                                                                $this_student_failed =1;
                                                            }
                                                            $optional_subject_id='';
                                                            $countable_optional_gpa=0;
                                                        ?>
                                                        <?php if(@$optional_subject==$data->subject_id): ?>
                                                        (GPA above <?php echo e(@$optional_subject_setup->gpa_above); ?>)
                                                        <hr>
                                                        <?php if($optional_subject_setup!=''): ?>
                                                        <?php if($mark_grade->gpa > $optional_subject_setup->gpa_above): ?>
                                                        
                                                            <?php
                                                                $countable_optional_gpa = $mark_grade->gpa-$optional_subject_setup->gpa_above;
                                                                $optional_subject_id=$optional_subject;
                                                            ?>
                                                        <?php endif; ?>
                                                        <?php endif; ?>
                                                      
                                                        <?php endif; ?>
                                                        <?php if(@$optional_subject==$data->subject_id): ?>
                                                        
                                                            <?php echo e(@$mark_grade->gpa-$optional_subject_setup->gpa_above); ?>

                                                        <?php else: ?>
                                                            <?php echo e(@$mark_grade->gpa); ?>

                                                        <?php endif; ?> 
                                                       
                                                    </td>
                                                    
                                                    <?php if($optional_subject_setup!=''): ?>
                                                        <?php if($subject_count==2): ?>
                                                        <td rowspan="<?php echo e(count($subjects)); ?>" style="vertical-align: middle"><?php echo e(App\SmAssignSubject::get_student_result($student_detail->id, $data->subject_id, $class_id, $section_id, $exam_type_id,$optional_subject_id,$optional_subject_setup)); ?></td>
                                                      
                                                        
                                                         <?php endif; ?>
                                                    <?php endif; ?>
                                                    

                                                    <?php if($subject_count==2): ?>
                                                    <td  rowspan="<?php echo e(count($subjects)); ?>" style="vertical-align: middle"><?php echo e(App\SmAssignSubject::get_student_result_without_optional($student_detail->id, $data->subject_id, $class_id, $section_id, $exam_type_id,$optional_subject_id,$optional_subject_setup)); ?></td>
                                                       
                                                        <td rowspan="<?php echo e(count($subjects)); ?>" style="vertical-align: middle">
                                                            <?php
                                                                $gpa_result=App\SmAssignSubject::get_student_result_without_optional($student_detail->id, $data->subject_id, $class_id, $section_id, $exam_type_id,$optional_subject_id,$optional_subject_setup);
                                                                $result_grade=App\SmMarksGrade::where([['from', '<=', $gpa_result], ['up', '>=', $gpa_result]])->first();
                                                                echo $result_grade->grade_name;
                                                            ?>
                                                        
                                                        </td>
                                                        <?php endif; ?>
                                                   
                                                </tr>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </tbody>
                                        </table>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <p class="result-date">
                                                    <?php
                                                     $data = App\SmMarkStore::select('created_at')->where([
                                                        ['student_id',$student_detail->id],
                                                        ['class_id',$class_id],
                                                        ['section_id',$section_id],
                                                        ['exam_term_id',$exam_type_id],
                                                    ])->first();

                                                    ?>
                                                    <?php echo app('translator')->get('lang.date_of_publication_of_result'); ?> : <strong> <?php echo e(date_format(date_create($data->created_at),"F j, Y, g:i a")); ?></strong>
                                                </p>
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
</section>

<?php endif; ?>
            

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\reports\mark_sheet_report_old.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('exam.final_mark_sheet'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <style type="text/css">
        .single-report-admit table tr th {
            border: 1px solid #a2a8c5 !important;
            vertical-align: middle;
        }

        #grade_table th {
            border: 1px solid black;
            text-align: center;
            background: #351681;
            color: white;
        }

        #grade_table td {
            color: black;
            text-align: center !important;
            border: 1px solid black;
        }

        hr {
            margin: 0;
        }

        .table-bordered {
            border: 1px solid #a2a8c5;
        }

        .single-report-admit table tr th {
            font-weight: 500;
        }

        #grade_table th {
            border: 1px solid #dee2e6;
            border-top-style: solid;
            border-top-width: 1px;
            text-align: left;
            background: #351681;
            color: white;
            background: #f2f2f2;
            color: var(--base_color);
            font-size: 12px;
            font-weight: 500;
            text-transform: uppercase;
            border-top: 0px;
            padding: 5px 4px;
            background: transparent;
            border-bottom: 1px solid rgba(130, 139, 178, 0.15) !important;
        }

        #grade_table td {
            color: #828bb2;
            padding: 0 7px;
            font-weight: 400;
            background-color: transparent;
            border-right: 0;
            border-left: 0;
            text-align: left !important;
            border-bottom: 1px solid rgba(130, 139, 178, 0.15) !important;
        }

        .single-report-admit table tr th {
            border: 0;
            border-bottom: 1px solid rgba(67, 89, 187, 0.15) !important;
            text-align: left
        }

        .single-report-admit table thead tr th {
            border: 0 !important;
        }

        .single-report-admit table tbody tr:first-of-type td {
            border-top: 1px solid rgba(67, 89, 187, 0.15) !important;
        }

        .single-report-admit table tr td {
            vertical-align: middle;
            font-size: 12px;
            color: #828BB2;
            font-weight: 400;
            border: 0;
            border-bottom: 1px solid rgba(130, 139, 178, 0.15) !important;
            text-align: left
        }

        .single-report-admit table tbody tr th {
            border: 0 !important;
            border-bottom: 1px solid rgba(67, 89, 187, 0.15) !important;
        }

        .single-report-admit table.summeryTable tbody tr:first-of-type td,
        .single-report-admit table.comment_table tbody tr:first-of-type td {
            border-top: 0 !important;
        }

        /* new  style  */
        .single-report-admit {
        }

        .single-report-admit .student_marks_table {
            background: -webkit-linear-gradient(
                    90deg, #d8e6ff 0%, #ecd0f4 100%);
            background: -moz-linear-gradient(90deg, #d8e6ff 0%, #ecd0f4 100%);
            background: -o-linear-gradient(90deg, #d8e6ff 0%, #ecd0f4 100%);
            background: linear-gradient(
                    90deg, #d8e6ff 0%, #ecd0f4 100%);
        }

</style>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('reports.progress_card_report'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('exam.examination'); ?></a>
                <a href="#"><?php echo app('translator')->get('exam.final_mark_sheet'); ?></a>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area mb-40">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    <div class="main-title">
                        <h3 class="mb-30"><?php echo app('translator')->get('common.select_criteria'); ?> </h3>
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
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'finalMarkSheetSearch', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                    <div class="row">
                        <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                        <?php if(moduleStatusCheck('University')): ?>
                            <div class="col-lg-12">
                                <div class="row">
                                    <?php if ($__env->exists('university::common.session_faculty_depart_academic_semester_level',['mt'=>'mt-30','hide'=>['USUB'], 'required'=>['USEC']])) echo $__env->make('university::common.session_faculty_depart_academic_semester_level',['mt'=>'mt-30','hide'=>['USUB'], 'required'=>['USEC']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php else: ?>
                        <div class="col-lg-6 col-md-6 ">
                              <select class="primary_select  form-control<?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>"
                                      id="select_class" name="class">
                                  <option data-display="<?php echo app('translator')->get('student.select_class'); ?> *"
                                          value=""><?php echo app('translator')->get('student.select_class'); ?> *
                                  </option>
                                  <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cls): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($cls->id); ?>" <?php echo e(isset($class)? ($class->id == $cls->id? 'selected':''):''); ?>><?php echo e($cls->class_name); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                              <?php if($errors->has('class')): ?>
                                  <span class="text-danger invalid-select" role="alert">
                                      <?php echo e($errors->first('class')); ?>

                                  </span>
                              <?php endif; ?>
                        </div>

                          <div class="col-lg-6 col-md-6" id="select_section_div">
                              <select class="primary_select  form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?>"
                                      id="select_section" name="section">
                                  <option data-display="<?php echo app('translator')->get('student.select_section'); ?> *"
                                          value=""><?php echo app('translator')->get('student.select_section'); ?> *
                                  </option>
                                  <?php if(!is_null($section)): ?>
                                  <option value="<?php echo e($section->id); ?>" selected><?php echo e($section->section_name); ?></option>
                                    <?php endif; ?>
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

<?php if(isset($students)): ?>
    <?php if(moduleStatusCheck('University')): ?>
        <?php if ($__env->exists('university::exam.un_final_mark_sheet')) echo $__env->make('university::exam.un_final_mark_sheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <section class="student-details">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-lg-12 no-gutters">
                        <div class="main-title d-flex ">
                            <h3 class="mb-30 flex-fill"><?php echo app('translator')->get('exam.final_mark_sheet'); ?></h3>
                            <div class="print_button pull-right">
                                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' =>'finalMarkSheetPrint', 'method' => 'POST', 'enctype' => 'multipart/form-data','target' => '_blank'])); ?>


                                <input type="hidden" name="class" value="<?php echo e($class->id); ?>">
                                <input type="hidden" name="section" value="<?php echo e(@$section->id); ?>">
                                <button type="submit" class="primary-btn small fix-gr-bg"><i class="ti-printer"> </i> <?php echo app('translator')->get('common.print'); ?>
                                </button>
                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="white-box">
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="single-report-admit">
                                        <div class="card">
                                            <div class="card-header">
                                                    <div class="d-flex">
                                                            <div class="col-lg-2">
                                                            <img class="logo-img" src="<?php echo e(generalSetting()->logo); ?>" alt="<?php echo e(generalSetting()->school_name); ?>">
                                                            </div>
                                                            <div class="col-lg-6 ml-30">
                                                                <h3 class="text-white"> 
                                                                    <?php echo e(isset(generalSetting()->school_name)?generalSetting()->school_name:'Infix School Management ERP'); ?> 
                                                                </h3> 
                                                                <p class="text-white mb-0">
                                                                    <?php echo e(isset(generalSetting()->address)?generalSetting()->address:'Infix School Address'); ?> 
                                                                </p>
                                                                <p class="text-white mb-0">
                                                                    <?php echo app('translator')->get('common.email'); ?>:  <?php echo e(isset(generalSetting()->email)?generalSetting()->email:'hello@aorasoft.com'); ?>,   <?php echo app('translator')->get('common.phone'); ?>:  <?php echo e(isset(generalSetting()->phone)?generalSetting()->phone:'+96897002784'); ?> 
                                                                </p> 
                                                            </div>
                                                            <div class="offset-2">
                                                            </div>
                                                        </div>
                                            </div>
                                        <div class="card-body">
                                            <div class="student_marks_table">
                                                <div class="row">
                                                    <div class="col-lg-12 text-black"> 
                                                        <h3 style="border-bottm:1px solid #ddd; padding: 15px; text-align:center"> 
                                                            <?php echo app('translator')->get('exam.final_mark_sheet'); ?>
                                                            
                                                        </h3>
                                                        <div class="row mt-20">
                                                            <div class="col-lg-6">
                                                                <p class="mb-0">
                                                                    <?php echo app('translator')->get('common.academic_year'); ?> : &nbsp;<span class="primary-color fw-500"><?php echo e(@generalSetting()->academic_year->year); ?> [<?php echo e(@generalSetting()->academic_year->title); ?>]</span>
                                                                </p>

                                                                <p class="mb-0">
                                                                  <?php echo app('translator')->get('student.class'); ?> : <span class="primary-color fw-500"><?php echo e(@$class->class_name); ?></span>
                                                                </p>

                                                            </div>
                                                            <div class="col-lg-6">
                                                                  <p class="mb-0">
                                                                        <?php echo app('translator')->get('exam.examination'); ?> : <span class="primary-color fw-500">
                                                                            <?php if(count($result_setting)): ?>
                                                                              <?php $__currentLoopData = $result_setting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                              <?php echo e(@$exam->examTypeName->title); ?>,
                                                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php else: ?>
                                                                                <?php $__currentLoopData = examTypes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <?php echo e(@$exam->title); ?>,
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php endif; ?> 
                                                                        </span>
                                                                    </p>
                                                                  <p class="mb-0">
                                                                        <?php echo app('translator')->get('common.section'); ?> : 
                                                                            <span class="primary-color fw-500">
                                                                              <?php if(!is_null($section)): ?>
                                                                              <?php echo e($section->section_name); ?>

                                                                              <?php else: ?> 
                                                                                  <?php if(@$class->groupclassSections): ?>
                                                                                        <?php $__currentLoopData = $class->groupclassSections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <?php echo e(@$section->sectionName->section_name); ?> ,
                                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                  <?php endif; ?>
                                                                                  <?php endif; ?> 
                                                                            </span>
                                                                    </p>
                                                                
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                    
                                                    <table class="table mb-0 mt-20">
                                                      <thead>
                                                            <tr>
                                                                  <th class="pl-3"><?php echo app('translator')->get('common.name'); ?></th>
                                                                  <th><?php echo app('translator')->get('student.admission_no'); ?></th>
                                                                  <th><?php echo app('translator')->get('exam.id_no'); ?></th>
                                                                  <th><?php echo app('translator')->get('exam.position'); ?></th>
                                                                  <?php $__currentLoopData = $assigned_subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assigned_subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                  <th>
                                                                        <?php echo e(@$assigned_subject->subject->subject_name); ?>

                                                                  </th>
                                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                  <th><?php echo app('translator')->get('exam.average'); ?></th>
                                                                  <th><?php echo app('translator')->get('exam.result'); ?></th>
                                                                  <th><?php echo app('translator')->get('exam.grade'); ?></th>
                                                                 
                                                            </tr>  
                                                      </thead>
                                                      <tbody>
                                                        <?php $__currentLoopData = $finalMarkSheets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $finalMarkSheet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                  <td class="pl-3"><?php echo e(@$finalMarkSheet->get('student_name')); ?></td>
                                                                  <td><?php echo e(@$finalMarkSheet->get('admission_no')); ?></td>
                                                                  <td><?php echo e(@$finalMarkSheet->get('roll_no')); ?></td>
                                                                  <td><?php echo e($loop->iteration); ?></td>
                                                                  <?php $allsubjectMark = 0 ;  ?> 
                                                                  <?php $__currentLoopData = $finalMarkSheet->get('subjects'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                  <td>
                                                                       <?php echo e($subject->get('exam_mark')); ?> 
                                                                  </td>
                                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                 
                                                                  <td> <?php echo e(number_format($finalMarkSheet->get('avg_mark'),2)); ?></td>
                                                                  <td> <?php if($finalMarkSheet->get('avg_mark') >= avgSubjectPassMark($all_subject_ids)): ?>
                                                                        <?php echo app('translator')->get('exam.pass'); ?>
                                                                        <?php else: ?> 
                                                                        <?php echo app('translator')->get('exam.fail'); ?>
                                                                        <?php endif; ?> 
                                                                  </td>
                                                                  <td><?php echo e(getGrade($finalMarkSheet->get('avg_mark'),true)); ?></td>
                                                            </tr>
                                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                      </tbody>
                                                    </table>
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
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php if(moduleStatusCheck('University')): ?>
    <?php $__env->startPush('script'); ?>
        <script>
            $(document).ready(function() {
                $("#select_semester_label").on("change", function() {

                    var url = $("#url").val();
                    var i = 0;
                    let semester_id = $(this).val();
                    let academic_id = $('#select_academic').val();  
                    let session_id = $('#select_session').val();
                    let faculty_id = $('#select_faculty').val();
                    let department_id = $('#select_dept').val();
                    let un_semester_label_id = $('#select_semester_label').val();

                    if (session_id =='') {
                        setTimeout(function() {
                            toastr.error(
                            "Session Not Found",
                            "Error ",{
                                timeOut: 5000,
                        });}, 500);
                    
                        $("#select_semester option:selected").prop("selected", false)
                        return ;
                    }
                    if (department_id =='') {
                        setTimeout(function() {
                            toastr.error(
                            "Department Not Found",
                            "Error ",{
                                timeOut: 5000,
                        });}, 500);
                        $("#select_semester option:selected").prop("selected", false)

                        return ;
                    }
                    if (semester_id =='') {
                        setTimeout(function() {
                            toastr.error(
                            "Semester Not Found",
                            "Error ",{
                                timeOut: 5000,
                        });}, 500);
                        $("#select_semester option:selected").prop("selected", false)

                        return ;
                    }
                    if (academic_id =='') {
                        setTimeout(function() {
                            toastr.error(
                            "Academic Not Found",
                            "Error ",{
                                timeOut: 5000,
                        });}, 500);
                        return ;
                    }
                    if (un_semester_label_id =='') {
                        setTimeout(function() {
                            toastr.error(
                            "Semester Label Not Found",
                            "Error ",{
                                timeOut: 5000,
                        });}, 500);
                        return ;
                    }

                    var formData = {
                        semester_id : semester_id,
                        academic_id : academic_id,
                        session_id : session_id,
                        faculty_id : faculty_id,
                        department_id : department_id,
                        un_semester_label_id : un_semester_label_id,
                    };
                
                    // Get Student
                    $.ajax({
                        type: "GET",
                        data: formData,
                        dataType: "json",
                        url: url + "/university/" + "get-university-wise-student",
                        beforeSend: function() {
                            $('#select_un_student_loader').addClass('pre_loader').removeClass('loader');
                        },
                        success: function(data) {
                            var a = "";
                            $.each(data, function(i, item) {
                                if (item.length) {
                                    $("#select_un_student").find("option").not(":first").remove();
                                    $("#select_un_student_div ul").find("li").not(":first").remove();

                                    $.each(item, function(i, students) {
                                        console.log(students);
                                        $("#select_un_student").append(
                                            $("<option>", {
                                                value: students.student.id,
                                                text: students.student.full_name,
                                            })
                                        );

                                        $("#select_un_student_div ul").append(
                                            "<li data-value='" +
                                            students.student.id +
                                            "' class='option'>" +
                                            students.student.full_name +
                                            "</li>"
                                        );
                                    });
                                } else {
                                    $("#select_un_student_div .current").html("SELECT STUDENT *");
                                    $("#select_un_student").find("option").not(":first").remove();
                                    $("#select_un_student_div ul").find("li").not(":first").remove();
                                }
                            });
                        },
                        error: function(data) {
                            console.log("Error:", data);
                        },
                        complete: function() {
                            i--;
                            if (i <= 0) {
                                $('#select_un_student_loader').removeClass('pre_loader').addClass('loader');
                            }
                        }
                    });
                });
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php endif; ?>



<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\examination\finalMarkSheetList.blade.php ENDPATH**/ ?>
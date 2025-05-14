
<script>
    if ($(".niceSelectModal").length) {
        $(".niceSelectModal").niceSelect();
    }
</script>
<style>
        .nice-select.bb .current {
          bottom: 10px;
         }
</style>
<div class="container-fluid">
    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'add-new-class-routine-store',
                        'method' => 'POST', 'enctype' => 'multipart/form-data', 'name' => 'myForm', 'onsubmit' => "return validateAddNewroutine()"])); ?>

        <div class="row">
            <div class="col-lg-12">                              
               <input type="hidden" name="class_id" id="class_id" value="<?php echo e($class_id); ?>">
               <input type="hidden" name="section_id" id="section_id" value="<?php echo e($section_id); ?>">
             
                <div class="row mt-25">
                    <div class="col-lg-6">
                        <div class="row no-gutters input-right-icon">
                            <div class="col">
                                <div class="primary_input">
                                    <input class="primary_input_field form-control<?php echo e(@$errors->has('start_time') ? ' is-invalid' : ''); ?>" type="time" name="start_time" id="start_time">
                                    <label style="top: -13px;"><?php echo app('translator')->get('lang.start_time'); ?> <span class="text-danger"> *</span></label>
                                    
                                    <?php if($errors->has('start_time')): ?>
                                        <span class="text-danger" >
                                            <strong><?php echo e(@$errors->first('start_time')); ?>

                                        </span>
                                    <?php endif; ?>
                                    <span class="text-danger"  id="start_time_error"></span> 
                                </div>
                            </div>
                            
                        </div>                     
                    </div>
                    <div class="col-lg-6">
                        <div class="row no-gutters input-right-icon">
                            <div class="col">
                                <div class="primary_input">
                                    <input class="primary_input_field  form-control<?php echo e(@$errors->has('end_time') ? ' is-invalid' : ''); ?>" type="time" name="end_time" id="end_time">
                                    <label style="top: -13px;"><?php echo app('translator')->get('lang.end_time'); ?> <span class="text-danger"> *</span></label>
                                    
                                    <?php if($errors->has('start_time')): ?>
                                        <span class="text-danger" >
                                            <strong><?php echo e(@$errors->first('end_time')); ?>

                                        </span>
                                    <?php endif; ?>
                                    <span class="text-danger"  id="end_time_error"></span> 
                                </div>
                            </div>
                            
                        </div>                     
                    </div>
                </div>
                <div class="row mt-15">
                    <div class="col-lg-12">
                    
                        <div class="primary_input">
                            <input type="checkbox" id="isBreak" class="common-checkbox" value="1"
                             name="is_break"
                             <?php echo e(isset($class_time)? ($class_time->is_break == 1? 'checked':''):''); ?>

                             >
                                <label for="isBreak">Is Break</label>
                        </div>
                    </div>
                </div>
                <div class="row mt-25">
                    <div class="col-lg-12 mt-30-md">
                        <select class="primary_selectModal form-control" name="subject" id="subject" onchange="changeSubject()">
                            <option data-display="<?php echo app('translator')->get('common.select_subject'); ?> *" value=""><?php echo app('translator')->get('common.select_subject'); ?> *</option>
                            <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!in_array($subject->subject_id, $assinged_subject)): ?>
                                <option value="<?php echo e(@$subject->subject_id); ?>" <?php echo e(isset($subject_id)? ($subject_id == $subject->subject_id?'selected':''):''); ?>><?php echo e(@$subject->subject->subject_name); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <span class="text-danger"  id="subject_error"></span>                        
                    </div>
                </div>
                <div class="row mt-25" id="teacher-div">
                    <div class="col-lg-12 mt-30-md">
                        <select class="primary_selectModal form-control" name="teacher_id" id="teacher_name">
                            <option data-display="<?php echo app('translator')->get('common.select_teacher'); ?> *" value=""><?php echo app('translator')->get('common.select_teacher'); ?> *</option>
                            <?php if(isset($assigned_id)): ?>
                                <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                
                                    <option value="<?php echo e(@$teacher->id); ?>" <?php echo e(isset($teacher_detail)? ($teacher_detail->id == $teacher->id?'selected':''):''); ?>><?php echo e(@$teacher->full_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            
                        </select>
                        <div class="pull-right loader loader_style" id="select_teacher_loader">
                            <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                        </div>
                        <span class="text-danger"  id="teacher_error"></span>
                    </div>
                </div>

                <div class="row mt-25">
                    <div class="col-lg-12 mt-30-md">
                        <select class="primary_selectModal form-control" name="room" id="room"  onchange="changeRoom()">
                            <option data-display="<?php echo app('translator')->get('common.select_room'); ?> *" value=""><?php echo app('translator')->get('common.select_room'); ?> *</option>
                            <?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!in_array($room->id, $assinged_room)): ?>
                                <option value="<?php echo e(@$room->id); ?>" <?php echo e(isset($room_id)? ($room_id == $room->id?'selected':''):''); ?>><?php echo e(@$room->room_no); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <span class="text-danger"  id="room_error"></span>
                    </div>
                </div>

                <?php if(!isset($assigned_id)): ?>
                    <div class="row mt-25 pl-30"  id="otherdays">                    
                    </div>
               <?php endif; ?>
            </div>
            <div class="col-lg-12 text-center mt-40">
                <div class="mt-40 d-flex justify-content-between">
                    <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                    <button class="primary-btn fix-gr-bg submit" type="submit"><?php echo app('translator')->get('common.save_information'); ?></button>
                </div>
            </div>
        </div>
    <?php echo e(Form::close()); ?>

</div>
<?php $__env->startPush('script'); ?>
<script>
    // class routine get teacher
    function changeSubject() {
        var url = $('#url').val();
        var i = 0;
        var formData = {
            class_id: $('#class_id').val(),
            section_id: $('#section_id').val(),
            subject: $('#subject').val(),
            day: $('#day').val(),
            update_teacher_id: $('#update_teacher_id').val()
        };
       
        $.ajax({
            type: "GET",
            data: formData,
            dataType: 'json',
            url: url + '/' + 'get-class-teacher-ajax',

            beforeSend: function() {
                    $('#select_teacher_loader').addClass('pre_dloader');
                    $('#select_teacher_loader').removeClass('loader');
            },
            success: function (data) {       
                // $("#teacher_name").empty();
                  var a = "";                   
                  $.each(data, function(i, item) {
                      if (item.length) {
                          $("#teacher_name").find("option").not(":first").remove();
                          $("#teacher-div ul").find("li").not(":first").remove();

                          $.each(item, function(i, teacher) {
                              $("#teacher_name").append(
                                  $("<option>", {
                                      value: teacher.id,
                                      text: teacher.full_name,
                                  })
                              );
                              $("#teacher-div ul").append(
                                  "<li data-value='" +
                                  teacher.id +
                                  "' class='option'>" +
                                  teacher.full_name +
                                  "</li>"
                              );
                          });
                      } else {
                          $("#teacher-div .current").html("No Teahcer available *");
                          $("#teacher_name").find("option").not(":first").remove();
                          $("#teacher-div ul").find("li").not(":first").remove();
                      }
                  });
                
            
            },
            error: function (data) {
                console.log('Error:', data);
            },
            complete: function() {
                i--;
                if (i <= 0) {
                    $('#select_teacher_loader').removeClass('pre_dloader');
                    $('#select_teacher_loader').addClass('loader');
                }
            }
        });

    }
    function changeRoom(){
        var url = $('#url').val();
        var i = 0;
        var formData = {
            class_id: $('#class_id').val(),
            section_id: $('#section_id').val(),
            subject: $('#subject').val(),
            class_time_id: $('#class_time_id').val(),
            day: $('#day').val(),
            room_id: $('#room').val(),
            teacher_id: $('#teacher_id').val(),
            update_teacher_id: $('#update_teacher_id').val()
        };
        
        $.ajax({
            type: "GET",
            data: formData,
            dataType: 'json',
            url: url + '/' + 'get-other-days-ajax',

            beforeSend: function() {
                    $('#select_day_loader').addClass('pre_dloader');
                    $('#select_day_loader').removeClass('dloader');
            },

            success: function(data) {
                $("#otherdays").empty();
                var appendRow = "";
                appendRow += "<div class='row p-0'>";
                appendRow += "<div class='col-lg-4 p-0'>";
                appendRow += "<label><?php echo e(__('lang.select')); ?> day</label>";
                appendRow += "</div>";
                appendRow += "<div class='col-lg-8'>";
                appendRow += "<input type='checkbox' id='all_days' onclick='selectAll()' class='common-checkbox' name='all_days[]' value='0'>";
                appendRow += " <label for='all_days'><?php echo e(__('lang.select')); ?> <?php echo e(__('lang.all')); ?></label>";
                appendRow += "</div>";
                appendRow += "<div class='col-lg-12'>";
                appendRow += "<div class='row'>";

                $.each(data, function(i, item) {
                    $.each(item, function(i, day) {
                        appendRow += "<div class='col-lg-4 pr-0'>";
                        appendRow +="<input type='checkbox' id='days_" + day.id 
                                    +"' class='common-checkbox day-checkbox' name='day_ids[]' value='" +day.id +"'>";
                        appendRow +="<label for='days_" +day.id +"'>" +day.name +"</label>";
                        appendRow += "</div>";
                    });
                });
                appendRow += "</div>";
                appendRow += "</div>";
                appendRow += "<div class='col-lg-12'>";
                $("#otherdays").append(appendRow);
            },
            error: function(data) {
                console.log('Error:', data);
            },
            complete: function() {
                i--;
                if (i <= 0) {
                    $('#select_day_loader').removeClass('pre_dloader');
                    $('#select_day_loader').addClass('dloader');
                }
            }
        });
    }
    function selectAll(){
        $("#all_days").on("change", function() {
            $(".day-checkbox").prop("checked", this.checked);
        });

        $(".day-checkbox").on("change", function() {
            if ($(".day-checkbox:checked").length == $(".day-checkbox").length) {
                $("#all_days").prop("checked", true);
            } else {
                $("#all_days").prop("checked", false);
            }
        });
    }
</script>
<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\academics\add_new_class_routine_form.blade.php ENDPATH**/ ?>
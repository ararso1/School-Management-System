<?php $__env->startSection('title'); ?> 
<?php echo app('translator')->get('bulkprint::bulk.generate_id_card'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20 up_breadcrumb">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1> <?php echo app('translator')->get('bulkprint::bulk.generate_staff_id_card'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('bulkprint::bulk.bulk_print'); ?></a>
                <a href="#"> <?php echo app('translator')->get('bulkprint::bulk.staff_id_card'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-8 col-md-6">
                <div class="main-title">
                    <h3 class="mb-30"><?php echo app('translator')->get('common.select_criteria'); ?> </h3>
                </div>
            </div>
        </div>
        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'staff-id-card-bulk-print-search', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

        <div class="row">
            <div class="col-lg-12">
            <div class="white-box">
                <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            <div class="col-lg-6 mt-30-md">
                                 <select class="primary_select  form-control<?php echo e($errors->has('id_card') ? ' is-invalid' : ''); ?>" id="id_card_list" name="id_card">
                                    <option data-display=" <?php echo app('translator')->get('common.select_id_card'); ?> *" value=""> <?php echo app('translator')->get('common.select_id_card'); ?> *</option>
                                  <?php $__currentLoopData = $id_cards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id_card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <option value="<?php echo e($id_card->id); ?>"><?php echo e($id_card->title); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                             
                                <?php if($errors->has('id_card')): ?>
                                <span class="text-danger invalid-select" role="alert">
                                    <strong><?php echo e(@$errors->first('id_card')); ?>

                                </span>
                                <?php endif; ?>
                            </div>
                            
                            
                            <div class="col-lg-6 mt-30-md" id="id-card-div">
                                   <div class="col-lg-12 " id="selectSectionsDiv" style="margin-top: -25px;">
                                    <label for="checkbox" class="mb-2"><?php echo app('translator')->get('common.role'); ?> <span class="text-danger"> *</span></label>
                                        <select multiple id="selectSectionss" name="role_id[]" style="width:100%">
                                          
                                        </select>
                                        <div class="">
                                        <input type="checkbox" id="checkbox_section" class="common-checkbox">
                                        <label for="checkbox_section" class="mt-3"><?php echo app('translator')->get('common.select_all'); ?></label>
                                        </div>
                                        <?php if($errors->has('role_id')): ?>
                                            <span class="text-danger invalid-select" role="alert">
                                                <?php echo e($errors->first('role_id')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-20 text-right">
                                <button type="submit" class="primary-btn small fix-gr-bg">
                                    <span class="ti-search pr-2"></span>
                                    <?php echo app('translator')->get('common.search'); ?>
                                </button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <?php echo e(Form::close()); ?>

    </div>
</section>


<?php if(isset($students)): ?>
 <section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">

        <div class="row mt-40">  
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-2 no-gutters">
                        <div class="main-title">
                            <h3 class="mb-0"><?php echo app('translator')->get('common.student_list'); ?></h3>
                        </div>
                    </div>
                    <div class="col-lg-1">
                        <a href="javascript:;" id="genearte-id-card-print-button" class="primary-btn small fix-gr-bg" >
                            <?php echo app('translator')->get('bulkprint::bulk.generate'); ?>
                        </a>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-12">
                        <table class="table school-table-style" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="10%">
                                        <input type="checkbox" id="checkAll" class="common-checkbox generate-id-card-print-all" name="checkAll" value="">
                                        <label for="checkAll"><?php echo app('translator')->get('common.all'); ?></label>
                                    </th>
                                    <th><?php echo app('translator')->get('student.admission_no'); ?></th>
                                    <th><?php echo app('translator')->get('common.name'); ?></th>
                                    <th><?php echo app('translator')->get('common.class_Sec'); ?></th>
                                    <th><?php echo app('translator')->get('student.father_name'); ?></th>
                                    <th><?php echo app('translator')->get('common.date_of_birth'); ?></th>
                                    <th><?php echo app('translator')->get('common.gender'); ?></th>
                                    <th><?php echo app('translator')->get('common.mobile'); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                               <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <tr>
                                    <td>
                                        <input type="checkbox" id="student.<?php echo e(@$student->id); ?>" class="common-checkbox generate-id-card-print" name="student_checked[]" value="<?php echo e(@$student->id); ?>">
                                            <label for="student.<?php echo e(@$student->id); ?>"></label>
                                        </td>
                                    <td>
                                        <?php echo e(@$student->admission_no); ?>

                                    </td>
                                    <td><?php echo e(@$student->full_name); ?></td>
                                    <td><?php echo e(@$student->class !=""?@$student->class->class_name:""); ?> (<?php echo e(@$student->section!=""?@$student->section->section_name:""); ?>)</td>
                                    <td><?php echo e(@$student->parents !=""?@$student->parents->fathers_name:""); ?></td>
                                    <td> 
                                        <?php echo e(@$student->date_of_birth != ""? dateConvert(@$student->date_of_birth):''); ?>

                                    </td>
                                    <td><?php echo e(@$student->gender!=""?@$student->gender->base_setup_name:""); ?></td>
                                    <td><?php echo e(@$student->mobile); ?></td>
                                </tr>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php $__env->startSection('script'); ?>
<script>

$(document).ready(function() {
        $("#id_card_list").on("change", function() {
            $("#checkbox_section").prop("checked", false);
            var url = $("#url").val();
            var id = $(this).val();
          
            var formData = {
                id: id,
              
            };
            // console.log(formData);
            $("#selectSectionss").select2("val", "");
            // get section for student
            $.ajax({
                type: "GET",
                data: formData,
                dataType: "json",
                url: url + "/bulkprint/" + "ajaxRoleIdCard",
                success: function(data) {
                    var a = "";
                    $.each(data, function(i, item) {
                        if (item.length) {
                            $("#selectSectionss").find("option").remove();
                            $("#selectSectionsDiv ul").find("li").not(":first").remove();
                            $.each(item, function(i, role) {
                                $("#selectSectionss").append(
                                    $("<option>", {
                                        value: role.id,
                                        text: role.name,
                                    })
                                );
                                // $("#selectSectionsDiv ul").append("<li data-value='"+section.id+"' class='option'>"+section.section_name+"</li>");
                            });
                        } else {
                            $("#selectSectionsDiv .current").html("SELECT SECTION *");
                            $("#selectSectionss").find("option").not(":first").remove();
                            $("#selectSectionsDiv ul").find("li").not(":first").remove();
                        }
                    });
                },
                error: function(data) {
                    console.log("Error:", data);
                },
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Modules\BulkPrint\Resources\views\admin\staff_generate_id_card.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title'); ?> 
<?php echo app('translator')->get('common.add_student'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>
<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    <div class="main-title">
                        <h3 class="mb-30"><?php echo app('translator')->get('common.select_criteria'); ?></h3>
                    </div>
                </div>
                <div class="col-lg-4 text-md-right text-left col-md-6 mb-30-lg">
                    <a href="<?php echo e(route('student_admission')); ?>" class="primary-btn small fix-gr-bg">
                        <span class="ti-plus pr-2"></span>
                        <?php echo app('translator')->get('common.add_student'); ?>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="white-box">
                        <form>
                            <div class="row">
                                <div class="col-lg-6">
                                    <select class="primary_select ">
                                        <option data-display="Select Class"><?php echo app('translator')->get('common.select_class'); ?></option>
                                        <option value="1"><?php echo app('translator')->get('common.class'); ?>Class 1</option>
                                        <option value="2"><?php echo app('translator')->get('common.class'); ?>Class 2</option>
                                    </select>
                                </div>

                                <div class="col-lg-6 mt-30-md">
                                    <select class="primary_select ">
                                        <option data-display="Select Class">Select Section</option>
                                        <option value="1">Section 1</option>
                                        <option value="2">Section 2</option>
                                    </select>
                                </div>
                                <div class="col-lg-12 mt-20 text-right">
                                    <button type="submit" class="primary-btn small fix-gr-bg">
                                        <span class="ti-search pr-2"></span>
                                        search
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4 mt-30-md">
                    <div class="white-box">
                        <form>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="primary_input">
                                        <input class="primary_input_field" type="text" placeholder="Search By Keyword">
                                        
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-20 text-right">
                                    <button type="submit" class="primary-btn small tr-bg">
                                        <span class="ti-search pr-2"></span>
                                        search
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row mt-40">
                

                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-4 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-0">Student List</h3>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-12">
                            <table id="table_id" class="table" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Admission No.</th>
                                        <th>Name</th>
                                        <th>Class</th>
                                        <th>Fathers Name</th>
                                        <th>Date Of Birth</th>
                                        <th>Gender</th>
                                        <th>Type</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($student->admission_no); ?></td>
                                        <td><?php echo e($student->first_name.' '.$student->last_name); ?></td>
                                        <td><?php echo e($student->class != ""? $student->class->class_name:""); ?></td>
                                        <td><?php echo e($student->parents!=""?$student->parents->fathers_name:""); ?></td>
                                        <td>                                                                                
                                        <?php echo e($student->date_of_birth != ""? dateConvert($student->date_of_birth):''); ?>

                                        </td>
                                        <td><?php echo e($student->gender !=""?$student->gender->base_setup_name:""); ?></td>
                                        <td><?php echo e($student->type !=""?$student->type->type:""); ?></td>
                                        <td><?php echo e($student->mobile); ?></td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                    Edit
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="<?php echo e(route('student_details', [$student->id])); ?>">view</a>
                                                    <a class="dropdown-item" href="#">edit</a>
                                                    <a class="dropdown-item" href="#">delete</a>
                                                </div>
                                            </div>
                                        </td>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\studentInformation\student_list.blade.php ENDPATH**/ ?>
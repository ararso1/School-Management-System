<?php $__env->startSection('mainContent'); ?>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    <div class="main-title">
                        <h3 class="mb-30"><?php echo app('translator')->get('common.select_criteria'); ?> </h3>
                    </div>
                </div> 
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">
                        <form>
                            <div class="row">
                                <div class="col-lg-6">
                                    <select class="primary_select ">
                                        <option data-display="Select Class"><?php echo app('translator')->get('student.select_month'); ?></option>
                                        <option value="1"> <?php echo app('translator')->get('student.may'); ?> </option>
                                        <option value="2"> <?php echo app('translator')->get('student.june'); ?> </option>
                                    </select>
                                </div>

                                <div class="col-lg-6 mt-30-md">
                                    <select class="primary_select ">
                                        <option data-display="Select Class"><?php echo app('translator')->get('common.select_package'); ?></option>
                                        <option value="1"><?php echo app('translator')->get('common.infix_edu'); ?></option>
                                        <option value="2"><?php echo app('translator')->get('common.infix_clasified'); ?></option>
                                    </select>
                                </div>
                                <div class="col-lg-12 mt-20 text-right">
                                    <button type="submit" class="primary-btn small fix-gr-bg">
                                        <span class="ti-search pr-2"></span>
                                        <?php echo app('translator')->get('common.search'); ?>
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
                                <h3 class="mb-20"><?php echo app('translator')->get('common.purchase_list'); ?></h3>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-12">
                    		<div class="white-box">
                            <table id="table_id" class="table" cellspacing="0" width="100%">
                                <thead>
                              
                                    <tr>
                                        <th><?php echo app('translator')->get('common.sl_no'); ?>.</th> 
                                        <th><?php echo app('translator')->get('common.package'); ?></th>
                                        <th><?php echo app('translator')->get('common.purchase_date'); ?></th>
                                        <th><?php echo app('translator')->get('common.expaire_date'); ?></th>
                                        <th><?php echo app('translator')->get('fees.price'); ?></th>
                                        <th><?php echo app('translator')->get('fees.paid_amount'); ?></th>
                                        <th><?php echo app('translator')->get('fees.due_amount'); ?></th>
                                        <th><?php echo app('translator')->get('common.action'); ?></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $__currentLoopData = $ProductPurchase; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(@$p->id); ?></td>
                                        <td><?php echo e(@$p->package); ?></td> 
                                        <td><?php echo e(@$p->purchase_date); ?></td> 
                                        <td><?php echo e(@$p->expaire_date); ?></td> 
                                        <td><?php echo e(@$p->price); ?></td> 
                                        <td><?php echo e(@$p->paid_amount); ?></td> 
                                        <td><?php echo e(@$p->due_amount); ?></td> 
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                    <?php echo app('translator')->get('common.edit'); ?>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#"><?php echo app('translator')->get('common.view'); ?></a>
                                                    <a class="dropdown-item" href="#"><?php echo app('translator')->get('common.download'); ?></a> 
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

            
    </div>
</section>
  

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\customerPanel\customer_purchase.blade.php ENDPATH**/ ?>
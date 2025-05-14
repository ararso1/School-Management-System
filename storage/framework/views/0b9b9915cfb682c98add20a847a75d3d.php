
<div class="container-fluid">
    <div class="student-details">
        <div class="student-meta-box">
            <div class="single-meta">
                <div class="row">
                    <div class="col-lg-12 no-gutters">
                        <div class="main-title">
                            <h3 class="mb-0 text-center"><?php echo app('translator')->get('common.route'); ?>: <?php echo e(@$route->title); ?></h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="student-meta-box">
                            <div class="single-meta mt-20">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="value text-left">
                                            <?php echo app('translator')->get('transport.vehicle_no'); ?>:
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="name">
                                            <?php echo e(@$vehicle->vehicle_no); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-meta">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="value text-left">
                                            <?php echo app('translator')->get('transport.vehicle_model'); ?>:
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="name">
                                            <?php echo e(@$vehicle->vehicle_model); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-meta">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="value text-left">
                                            <?php echo app('translator')->get('transport.made'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="name">
                                            <?php echo e(@$vehicle->made_year); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if(!empty(@$vehicle->driver_id)): ?>
                
            
            <?php
                @$driver_info=App\SmStaff::where('id','=',@$vehicle->driver_id)->first();
            ?>
            <div class="single-meta">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="value text-left">
                            <?php echo app('translator')->get('transport.driver_name'); ?> 
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="name">
                            <?php echo e(@$driver_info->full_name); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="single-meta">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="value text-left">
                            <?php echo app('translator')->get('transport.driver_license'); ?>   
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="name">
                            <?php echo e(@$driver_info->driving_license); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="single-meta">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="value text-left">
                            <?php echo app('translator')->get('transport.driver_contact'); ?>  
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="name">
                          
                            <?php echo e(@$driver_info->emergency_mobile); ?>

                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
       <?php /**PATH C:\xampp\htdocs\resources\views/backEnd/studentPanel/student_transport_view_modal.blade.php ENDPATH**/ ?>
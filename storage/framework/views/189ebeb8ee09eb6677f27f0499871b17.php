<?php $__env->startSection('mainContent'); ?>
<section class="mb-40">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-4">
                <div class="main-title">
                    <h3 class="mb-30"><?php echo app('translator')->get('common.select_criteria'); ?> </h3>
                </div>
            </div>
            <div class="offset-lg-6 col-lg-2 text-right">
                <a href="<?php echo e(route('user_create')); ?>" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus pr-2"></span>
                    <?php echo app('translator')->get('common.add'); ?>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="white-box">
                    <form>
                        <div class="container-fluid p-0">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="row no-gutters input-right-icon">
                                        <div class="col">
                                            <div class="primary_input">
                                                <input class="primary_input_field  primary_input_field date form-control" id="startDate" type="text"
                                                    placeholder="Start Date">
                                                
                                            </div>
                                        </div>
                                        <button class="" type="button">
                                            <i class="ti-calendar" id="admission-date-icon"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="row no-gutters input-right-icon">
                                        <div class="col">
                                            <div class="primary_input">
                                                <input class="primary_input_field  primary_input_field date form-control" id="endDate" type="text" placeholder="End Date">
                                                
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button class="" type="button">
                                                <i class="ti-calendar" id="end-date-icon"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <select class="primary_select ">
                                        <option data-display="Source"><?php echo app('translator')->get('lang.source'); ?></option>
                                        <option value="1"><?php echo app('translator')->get('lang.front_office'); ?></option>
                                        <option value="2"><?php echo app('translator')->get('lang.advertisement'); ?></option>
                                        <option value="4"><?php echo app('translator')->get('lang.online_front_site'); ?></option>
                                        <option value="5"><?php echo app('translator')->get('lang.google_ads'); ?></option>
                                        <option value="6"><?php echo app('translator')->get('lang.admission_campaign'); ?></option>
                                    </select>
                                </div>

                                <div class="col-lg-3">
                                    <select class="primary_select ">
                                        <option data-display="Status"><?php echo app('translator')->get('common.status'); ?></option>
                                        <option value="1"><?php echo app('translator')->get('common.all'); ?></option>
                                        <option value="2"><?php echo app('translator')->get('lang.active'); ?></option>
                                        <option value="3"><?php echo app('translator')->get('lang.passive'); ?></option>
                                        <option value="4"><?php echo app('translator')->get('lang.dead'); ?></option>
                                        <option value="5"><?php echo app('translator')->get('lang.won'); ?></option>
                                        <option value="6"><?php echo app('translator')->get('lang.lost'); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="adminssion-query">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-4 no-gutters">
                <div class="main-title">
                    <h3 class="mb-0"><?php echo app('translator')->get('lang.user_details'); ?></h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table id="table_id" class="table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" value=""> <?php echo app('translator')->get('common.name'); ?>
                                    </label>
                                </div>
                            </th>
                            <th><?php echo app('translator')->get('common.phone'); ?></th>
                            <th><?php echo app('translator')->get('lang.source'); ?></th>
                            <th><?php echo app('translator')->get('lang.query_date'); ?></th>
                            <th><?php echo app('translator')->get('lang.last_follow_up_date'); ?></th>
                            <th><?php echo app('translator')->get('lang.next_follow_up_date'); ?></th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" value="">
                                        <?php echo app('translator')->get('lang.salmon_shashimi'); ?>
                                    </label>
                                </div>
                            </td>
                            <td>+44633331234</td>
                            <td>Front Offic</td>
                            <td>31st Oct, 2018</td>
                            <td>23rd Oct, 2018</td>
                            <td>31st Oct, 2018</td>
                            <td>Active</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                        <?php echo app('translator')->get('common.edit'); ?>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <button class="dropdown-item" type="button" data-toggle="modal" data-target="#editStudent"><?php echo app('translator')->get('common.edit'); ?></button>
                                        <button class="dropdown-item" type="button"><?php echo app('translator')->get('common.delete'); ?></button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\systemSettings\user\user.blade.php ENDPATH**/ ?>
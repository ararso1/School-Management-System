<?php $__env->startSection('title'); ?> 
        <?php echo app('translator')->get('academics.admin_section'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>
<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-title">
                            <h3><?php if(isset($section)): ?> 
                                    <?php echo app('translator')->get('common.edit'); ?>
                                <?php else: ?> 
                                    <?php echo app('translator')->get('common.add'); ?>
                                <?php endif; ?> 
                                <?php echo app('translator')->get('common.section'); ?>
                            </h3>
                        </div>
                        <?php if(isset($section)): ?>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'section_update', 'method' => 'POST'])); ?>

                        <?php else: ?>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'section_store', 'method' => 'POST'])); ?>

                        <?php endif; ?>
                        <div class="white-box">
                            <div class="add-visitor">
                                <div class="row  mt-25">
                                    <div class="col-lg-12">
                                       
                                        <div class="primary_input">
                                            <input class="primary_input_field form-control<?php echo e(@$errors->has('name') ? ' is-invalid' : ''); ?>" type="text" name="name" autocomplete="off" value="<?php echo e(isset($section)? $section->section_name: ''); ?>">
                                            <input type="hidden" name="id" value="<?php echo e(isset($section)? $section->id: ''); ?>">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('common.name'); ?> <span class="text-danger"> *</span></label>
                                            
                                            <?php if($errors->has('name')): ?>
                                                <span class="text-danger" >
                                                    <strong><?php echo e(@$errors->first('name')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn fix-gr-bg submit">
                                            <span class="ti-check"></span>
                                            <?php echo app('translator')->get('academics.save_content'); ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-4 no-gutters">
                        <div class="main-title">
                            <h3><?php echo app('translator')->get('common.section_list'); ?></h3>
                        </div>
                    </div>

                    <div class="offset-lg-4 col-md-4 d-flex justify-content-end">
                        <select class="primary_select tr-bg mr-10">
                            <option data-display="Column View"><?php echo app('translator')->get('academics.column_view'); ?></option>
                            <option value="Name"><?php echo app('translator')->get('common.name'); ?></option>
                            <option value="Position"><?php echo app('translator')->get('common.phone'); ?></option>
                            <option value="Source"><?php echo app('translator')->get('academics.source'); ?></option>
                            <option value="Query Date"><?php echo app('translator')->get('academics.source'); ?></option>
                            <option value="Last Follow Up Date"><?php echo app('translator')->get('academics.last_follow_up_date'); ?></option>
                            <option value="Next Follow Up Date"><?php echo app('translator')->get('academics.next_follow_up_date'); ?></option>
                            <option value="Status"><?php echo app('translator')->get('common.status'); ?></option>
                            <option value="Action"><?php echo app('translator')->get('common.action'); ?></option>
                            <option value="Restore Visibility"><?php echo app('translator')->get('academics.restore_visibility'); ?></option>
                        </select>
                        <select class="primary_select tr-bg">
                            <option data-display="Actions"><?php echo app('translator')->get('common.action'); ?></option>
                            <option value="1"><?php echo app('translator')->get('common.print'); ?></option>
                            <option value="2"><?php echo app('translator')->get('academics.export_to_csv'); ?></option>
                            <option value="3"><?php echo app('translator')->get('academics.export_to_excel'); ?></option>
                            <option value="4"><?php echo app('translator')->get('academics.export_to_pdf'); ?></option>
                            <option value="5"><?php echo app('translator')->get('academics.copy_table'); ?></option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        
                        <table id="table_id" class="table" cellspacing="0" width="100%">

                            <thead>
                               <?php if(session()->has('message-success-delete') != " " ||
                                session()->get('message-danger-delete') != ""): ?>
                                <tr>
                                    <td colspan="3">
                                         <?php if(session()->has('message-success-delete')): ?>
                                          <div class="alert alert-success">
                                              <?php echo e(session()->get('message-success-delete')); ?>

                                          </div>
                                        <?php elseif(session()->has('message-danger-delete')): ?>
                                          <div class="alert alert-danger">
                                              <?php echo e(session()->get('message-danger-delete')); ?>

                                          </div>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endif; ?>
                                <tr>
                                    <th><?php echo app('translator')->get('common.class'); ?></th>
                                    <th><?php echo app('translator')->get('common.action'); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(@$section->section_name); ?></td>
                                    <td>
                                        <?php if (isset($component)) { $__componentOriginalf5ee9bc45d6af00850b10ff7521278be = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf5ee9bc45d6af00850b10ff7521278be = $attributes; } ?>
<?php $component = App\View\Components\DropDown::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('drop-down'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\DropDown::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf5ee9bc45d6af00850b10ff7521278be)): ?>
<?php $attributes = $__attributesOriginalf5ee9bc45d6af00850b10ff7521278be; ?>
<?php unset($__attributesOriginalf5ee9bc45d6af00850b10ff7521278be); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf5ee9bc45d6af00850b10ff7521278be)): ?>
<?php $component = $__componentOriginalf5ee9bc45d6af00850b10ff7521278be; ?>
<?php unset($__componentOriginalf5ee9bc45d6af00850b10ff7521278be); ?>
<?php endif; ?>
                                                <a class="dropdown-item" href="<?php echo e(route('section_edit', [@$section->id])); ?>"><?php echo app('translator')->get('common.edit'); ?></a>
                                                <a class="dropdown-item" data-toggle="modal" data-target="#deleteSectionModal<?php echo e(@$section->id); ?>"  href="#"><?php echo app('translator')->get('common.delete'); ?></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                 <div class="modal fade" id="deleteSectionModal<?php echo e(@$section->id); ?>" role="dialog">
                                    <div class="modal-dialog">
                                    
                                      <!-- Modal content-->
                                      <div class="modal-content modalContent">
                                        <div class="modal-body removeBtn">
                                          <p><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?>?</p>
                                        </div>
                                        <div class="modal-footer compareFooter deleteButtonDiv">
                                            <button type="button" class="modalbtn btn-primary"><a href="<?php echo e(route('section_delete', [@$section->id])); ?>" class="text-light"><?php echo app('translator')->get('academics.yes'); ?></a></button>
                                            <button type="button" class="modalbtn btn-danger" data-dismiss="modal"><?php echo app('translator')->get('academics.no'); ?></button>
                                        </div>
                                      </div>
                                      
                                    </div>
                                  </div>
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
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\admin\admin.blade.php ENDPATH**/ ?>
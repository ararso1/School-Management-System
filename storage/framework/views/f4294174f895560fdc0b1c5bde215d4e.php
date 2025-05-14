<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('inventory.issue_item'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('inventory.issue_item'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('inventory.inventory'); ?></a>
                <a href="<?php echo e(route('issue-new-item')); ?>"><?php echo app('translator')->get('inventory.issue_item'); ?></a>
          </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-6">
                <div class="main-title">
                    <h3 class="mb-30">
                        <?php echo app('translator')->get('inventory.issue_item'); ?>
                    </h3>
                </div>
            </div>
        </div>

        <?php if(isset($editData)): ?>
        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => array('update-book-data',$editData->id), 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

        <?php else: ?>
        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'save-book-data',
        'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

        <?php endif; ?>

        <div class="row">
            <div class="col-lg-12">
                <?php echo $__env->make('backEnd.partials.alertMessage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
                <div class="white-box">
                    <div class="">
                        <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>"> 
                        <div class="row mb-30">
                            <div class="col-lg-3">
                                        <select class="primary_select  form-control<?php echo e($errors->has('member_type') ? ' is-invalid' : ''); ?>" name="member_type" id="member_type">
                                            <option data-display="Member Type *" value=""><?php echo app('translator')->get('common.member_type'); ?> *</option>
                                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(isset($editData)): ?>
                                            <option value="<?php echo e($value->id); ?>" <?php echo e($value->id == $editData->role_id? 'selected':''); ?>><?php echo e($value->name); ?></option>
                                            <?php else: ?>
                                            <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>

                                            <?php endif; ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('member_type')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('member_type')); ?>

                                        </span>
                                        <?php endif; ?>
                                    </div>

                            <div class="col-lg-3">
                                <div class="primary_input">
                                    <select class="primary_select  form-control<?php echo e($errors->has('subject') ? ' is-invalid' : ''); ?>" name="subject" id="subject">
                                        <option data-display="Select Subject *" value=""><?php echo app('translator')->get('common.select'); ?></option>
                                        <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($value->id); ?>"
                                        <?php if(isset($editData)): ?>
                                        <?php if($editData->subject == $value->id): ?>
                                        selected
                                        <?php endif; ?>
                                        <?php endif; ?>
                                        ><?php echo e($value->subject_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    
                                    <?php if($errors->has('subject')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('subject')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="primary_input">
                                    <input class="primary_input_field form-control<?php echo e($errors->has('type') ? ' is-invalid' : ''); ?>"
                                    type="text" name="book_number" autocomplete="off" value="<?php echo e(isset($editData)? $editData->book_number:''); ?>">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('inventory.book_none'); ?></label>
                                    
                                    <?php if($errors->has('book_number')): ?>
                                    <span class="text-danger" >
                                        <?php echo e($errors->first('book_number')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>


                        </div>

                        <div class="row mb-30">
                            <div class="col-lg-3">
                                <div class="primary_input">
                                    <input oninput="numberCheckWithDot(this)" class="primary_input_field form-control<?php echo e($errors->has('isbn_no') ? ' is-invalid' : ''); ?>"
                                    type="text" name="isbn_no" autocomplete="off" value="<?php echo e(isset($editData)? $editData->isbn_no:''); ?>">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('inventory.isbn_none'); ?></label>
                                    
                                    <?php if($errors->has('isbn_no')): ?>
                                    <span class="text-danger" >
                                        <?php echo e($errors->first('isbn_no')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="primary_input">
                                    <input class="primary_input_field form-control<?php echo e($errors->has('publisher_name') ? ' is-invalid' : ''); ?>"
                                    type="text" name="publisher_name" autocomplete="off" value="<?php echo e(isset($editData)? $editData->publisher_name:''); ?>">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('inventory.publisher_name'); ?></label>
                                    
                                    <?php if($errors->has('publisher_name')): ?>
                                    <span class="text-danger" >
                                        <?php echo e($errors->first('publisher_name')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="primary_input">
                                    <input class="primary_input_field form-control<?php echo e($errors->has('author_name') ? ' is-invalid' : ''); ?>"
                                    type="text" name="author_name" autocomplete="off" value="<?php echo e(isset($editData)? $editData->author_name:''); ?>">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('inventory.author_name'); ?></label>
                                    
                                    <?php if($errors->has('author_name')): ?>
                                    <span class="text-danger" >
                                        <?php echo e($errors->first('author_name')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="primary_input">
                                    <input class="primary_input_field form-control<?php echo e($errors->has('rack_number') ? ' is-invalid' : ''); ?>"
                                    type="text" name="rack_number" autocomplete="off" value="<?php echo e(isset($editData)? $editData->rack_number:''); ?>">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('inventory.rack_number'); ?> <span class="text-danger"> *</span> </label>
                                    
                                    <?php if($errors->has('rack_number')): ?>
                                    <span class="text-danger" >
                                        <?php echo e($errors->first('rack_number')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div>

                        <div class="row mb-30">

                            <div class="col-lg-3">
                                <div class="primary_input">
                                    <input oninput="numberCheck(this)" class="primary_input_field form-control<?php echo e($errors->has('quantity') ? ' is-invalid' : ''); ?>"
                                    type="text" name="quantity" autocomplete="off" value="<?php echo e(isset($editData)? $editData->quantity : ' '); ?>">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('inventory.quantity'); ?></label>
                                    
                                    <?php if($errors->has('quantity')): ?>
                                    <span class="text-danger" >
                                        <?php echo e($errors->first('quantity')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="primary_input">
                                    <input oninput="numberCheckWithDot(this)" class="primary_input_field form-control<?php echo e($errors->has('book_price') ? ' is-invalid' : ''); ?>"
                                    type="text" name="book_price" autocomplete="off" value="<?php echo e(isset($editData)? $editData->book_price : ''); ?>">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('inventory.book_price'); ?></label>
                                    
                                    <?php if($errors->has('book_price')): ?>
                                    <span class="text-danger" >
                                        <?php echo e($errors->first('book_price')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div>
                        <div class="row md-20">
                            <div class="col-lg-12">
                                <div class="primary_input">
                                    <textarea class="primary_input_field" cols="0" rows="4" name="details" id="details"><?php echo e(isset($editData) ? $editData->details : ''); ?>

                                    </textarea>
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('common.description'); ?> <span></span> </label>
                                    

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-40">
                        <div class="col-lg-12 text-center">
                            <button class="primary-btn fix-gr-bg">
                                <span class="ti-check"></span>
                                <?php if(isset($editData)): ?>
                                <?php echo app('translator')->get('common.update'); ?>
                                <?php else: ?>
                                <?php echo app('translator')->get('common.add'); ?>
                                <?php endif; ?>

                                <?php echo app('translator')->get('inventory.book'); ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo e(Form::close()); ?>

</div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\inventory\issueNewItem.blade.php ENDPATH**/ ?>
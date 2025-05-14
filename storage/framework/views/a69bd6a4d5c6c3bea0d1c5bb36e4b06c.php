<?php $__env->startSection('mainContent'); ?>
<link rel="stylesheet" href="<?php echo e(asset('/Modules/RolePermission/public/css/style.css')); ?>">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet" />
<style type="text/css">
    .erp_role_permission_area {
    display: block !important;
}
select {
  font-family: 'FontAwesome', 'sans-serif';
}
.single_permission {
    margin-bottom: 0px;
}
.erp_role_permission_area .single_permission .permission_body > ul > li ul {
    display: grid;
    margin-left: 25px;
    grid-template-columns: repeat(3, 1fr);
    /* grid-template-columns: repeat(auto-fill, minmax(100px, 1fr)); */
}
.erp_role_permission_area .single_permission .permission_body > ul > li ul li {
    margin-right: 20px;
   
}
.mesonary_role_header{
    column-count: 2;
    column-gap: 30px;
}
.single_role_blocks {
    display: inline-block;
    background: #fff;
    box-sizing: border-box;
    width: 100%;
    margin: 0 0 5px;
}
.erp_role_permission_area .single_permission .permission_body > ul > li {
  padding: 10px 25px 0px 25px;
}
.erp_role_permission_area .single_permission .permission_header {
  padding: 10px 25px 0px 25px;
  position: relative;
}
@media (min-width: 320px) and (max-width: 1199.98px) { 
    .mesonary_role_header{
    column-count: 1;
    column-gap: 30px;
}
 }
@media (min-width: 320px) and (max-width: 767.98px) { 
    .erp_role_permission_area .single_permission .permission_body > ul > li ul {
    grid-template-columns: repeat(2, 1fr);
    grid-gap:10px
    /* grid-template-columns: repeat(auto-fill, minmax(100px, 1fr)); */
}
 }




.permission_header{
    position: relative;
}

.arrow::after {
    position: absolute;
    content: "\e622";
    top: 50%;
    right: 12px;
    height: auto;
    font-family: 'themify';
    color: #fff;
    font-size: 18px;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
        transform: translateY(-50%);
    right: 22px;
}
.arrow.collapsed::after {
    content: "\e61a";
    color: #fff;
    font-size: 18px;
}
.erp_role_permission_area .single_permission .permission_header div {
    position: relative;
    top: -2px;
    position: relative;
    z-index: 999;
}
.erp_role_permission_area .single_permission .permission_header div.arrow {
    position: absolute;
    width: 100%;
    z-index: 0;
    left: 0;
    bottom: 0;
    top: 0;
    right: 0;
}
.erp_role_permission_area .single_permission .permission_header div.arrow i{
    color:#FFF;
    font-size: 20px;
}
</style>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('common.menu'); ?> </h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('common.menu_manage'); ?></a>
                <a href="#"><?php echo app('translator')->get('common.menu'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
        <?php if(isset($section)): ?>
          <?php if(userPermission(266)): ?>
        <div class="row">
            <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                <a href="<?php echo e(url('section')); ?>" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus pr-2"></span>
                    <?php echo app('translator')->get('common.add'); ?>
                </a>
            </div>
        </div>
        <?php endif; ?>
        <?php endif; ?>
        <div class="row">
             <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12">
                        
                        <?php if(isset($sidebar)): ?>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'menumanage.update', 'method' => 'POST'])); ?>

                       
                        <?php endif; ?>
                        <div class="white-box">
                            <div class="add-visitor">
                                <div class="row">
                                    <div class="col-lg-12">
                                       
                                        <div class="primary_input">
                                            <input class="primary_input_field form-control<?php echo e(@$errors->has('name') ? ' is-invalid' : ''); ?>" type="text" name="name" autocomplete="off" value="<?php echo e(isset($sidebar)? $sidebar->name: old('name')); ?>">
                                            <input type="hidden" name="id" value="<?php echo e(isset($sidebar)? $sidebar->id: ''); ?>">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('common.name'); ?> <span class="text-danger"> *</span></label>
                                            
                                            <?php if($errors->has('name')): ?>
                                                <span class="text-danger" >
                                                    <strong><?php echo e(@$errors->first('name')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row  mt-25">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <input class="primary_input_field form-control<?php echo e(@$errors->has('icon_class') ? ' is-invalid' : ''); ?>" type="text" name="icon_class" autocomplete="off" value="<?php echo e(isset($sidebar)? $sidebar->icon_class: old('icon_class')); ?>">
                                         
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('lang.icon_class'); ?></label>
                                            
                                            <?php if($errors->has('icon_class')): ?>
                                                <span class="text-danger" >
                                                    <strong><?php echo e(@$errors->first('icon_class')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>

                                    </div>
                                </div>
                           
                         
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <input class="primary_input_field form-control<?php echo e(@$errors->has('route') ? ' is-invalid' : ''); ?>" type="text" name="route" autocomplete="off" value="<?php echo e(isset($sidebar)? $sidebar->route: old('route')); ?>">
                                         
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('lang.route'); ?> </label>
                                            
                                            <?php if($errors->has('route')): ?>
                                                <span class="text-danger" >
                                                    <strong><?php echo e(@$errors->first('route')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>

                                    </div>
                                </div>
                               
                                <?php 
                                  $tooltip = "";
                                  if(userPermission(266)){
                                        $tooltip = "";
                                    }else{
                                        $tooltip = "You have no permission to add";
                                    }
                                ?>
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn fix-gr-bg" data-toggle="tooltip" title="<?php echo e(@$tooltip); ?>">
                                            <span class="ti-check"></span>
                                            <?php if(isset($sidebar)): ?>
                                                <?php echo app('translator')->get('common.update'); ?>
                                            <?php else: ?>
                                                <?php echo app('translator')->get('common.save'); ?>
                                            <?php endif; ?>
                                          
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
                    <div class="col-lg-12">
                        
                        <div class="erp_role_permission_area ">



                            <!-- single_permission  -->
                                    <?php if(count($all_sidebars)>0): ?>
                                   
                                   
                    
                                            <div  class="mesonary_role_header" >
                                               
                                                <?php $__currentLoopData = $all_sidebars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $module_info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                                                   <div class="single_role_blocks" data-id="menu<?php echo e($module_info->id); ?>">
                                                            <div class="single_permission" id="<?php echo e($module_info->id); ?>">
                    
                                                               <div class="permission_header d-flex align-items-center justify-content-between">
                    
                                                                   <div>
                                                                       
                                                                       <a href="<?php echo e(route('menumanage.edit',[$module_info->id])); ?>">  <i class="fa fa-edit"></i> </a>
                                                                       <label for="Main_Module_<?php echo e($key); ?>"><?php echo e($module_info->name); ?></label>
                                                                   </div>
                    
                                                                   <div class="arrow collapsed" data-toggle="collapse" data-target="#Role<?php echo e($module_info->id); ?>">
                    
                    
                                                                   </div>
                    
                                                               </div>
                    
                                                               <div id="Role<?php echo e($module_info->id); ?>" class="collapse">
                                                                       <div  class="permission_body">
                                                                               <ul>
                    
                    
                                                                                   <?php 
                    
                                                                                       $subModule= DB::table('sidebars')->where('parent_id',$module_info->infix_module_id)->where('active_status', 1)->get();
                                                                                   ?>
                                                                                       <?php $__currentLoopData = $subModule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    
                                                                                       <?php if(moduleStatusCheck('Saas') == TRUE && $row2->id == 547): ?>
                    
                                                                                       <?php else: ?>
                    
                    
                                                                                       <li>
                                                                                           <div class="submodule">
                                                                                                <a href="<?php echo e(route('menumanage.edit',[$row2->id])); ?>">  <i class="fa fa-edit"></i> </a>
                                                                                              
                                                                                               <label for="Sub_Module_<?php echo e($row2->id); ?>"><?php echo e($row2->name); ?></label>
                                                                                               <br>
                                                                                           </div>
                    
                                                                                       
                                                                                       </li>
                                                                                       <?php endif; ?>
                                                                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                   
                                                                               </ul>
                                                                       </div>
                                                               </div>
                                                         </div>
                                                   </div>
                    
                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    
                                             </div>
                           
                    
                                  
                    
                                         <?php else: ?> 
                                         <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' =>'menumanage.store.sidebar',
                                         'method' => 'POST'])); ?>

                    
                                         <input type="hidden" name="role_id" value="<?php echo e(@$role->id); ?>">
                    
                                         <div  class="mesonary_role_header" >
                                    
                                                 <?php $__currentLoopData = $all_modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                          <?php
                                                    
                                                             if (moduleStatusCheck('SaasRolePermission') == TRUE) {
                                                                 $module_info = Modules\RolePermission\Entities\InfixModuleInfo::where('module_id', $key)->first();
                                                                 $all_group_modules = Modules\RolePermission\Entities\InfixModuleInfo::where('module_id', $key)->where('id', '!=', $key)->get();
                                                             } else {
                                                                 $module_info = Modules\RolePermission\Entities\InfixModuleInfo::where('module_id', $key)->where('is_saas',0)->first();
                                                                 $all_group_modules = Modules\RolePermission\Entities\InfixModuleInfo::where('module_id', $key)->where('id', '!=', $key)->where('is_saas',0)->get();
                                                             }
                    
                                  
                    
                    
                    
                                                             $all_group_modules = Modules\RolePermission\Entities\InfixModuleInfo::where('module_id', $key)->where('id', '!=', $key)->where('active_status', 1)->get();
                    
                    
                    
                                                         ?>
                    
                                                             <div class="single_role_blocks" data-id="menu<?php echo e($module_info->id); ?>">
                                                                      <div class="single_permission" id="<?php echo e($module_info->id); ?>">
                    
                                                                         <div class="permission_header d-flex align-items-center justify-content-between">
                    
                                                                             <div>
                                                                                 <input type="checkbox" name="module_id[]" value="<?php echo e($module_info->id); ?>" id="Main_Module_<?php echo e($key); ?>" class="common-radio permission-checkAll main_module_id_<?php echo e($module_info->id); ?>" checked>
                                                                                 
                                                                                 <label for="Main_Module_<?php echo e($key); ?>"><?php echo e($module_info->name); ?></label>
                                                                             </div>
                    
                                                                             <div class="arrow collapsed" data-toggle="collapse" data-target="#Role<?php echo e($module_info->id); ?>">
                    
                    
                                                                             </div>
                    
                                                                         </div>
                    
                                                                         <div id="Role<?php echo e($module_info->id); ?>" class="collapse">
                                                                                 <div  class="permission_body">
                                                                                         <ul>
                    
                    
                                                                                             <?php 
                    
                                                                                                 $subModule= DB::table('infix_module_infos')->where('parent_id',$module_info->id)->where('active_status', 1)->get();
                                                                                             ?>
                                                                                                 <?php $__currentLoopData = $subModule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    
                                                                                                 <?php if(moduleStatusCheck('Saas') == TRUE && $row2->id == 547): ?>
                    
                                                                                                 <?php else: ?>
                    
                    
                                                                                                 <li>
                                                                                                     <div class="submodule">
                                                                                                         <input type="hidden"  name="parent_module_id[]" value="<?php echo e($row2->parent_id); ?>">
                    
                                                                                                         <input id="Sub_Module_<?php echo e($row2->id); ?>" name="child_module_id[]" value="<?php echo e($row2->id); ?>"  class="infix_csk common-radio  module_id_<?php echo e($module_info->id); ?> module_link" checked  type="checkbox">
                    
                                                                                                         <label for="Sub_Module_<?php echo e($row2->id); ?>"><?php echo e($row2->name); ?></label>
                                                                                                         <br>
                                                                                                     </div>
                    
                                                                                                 
                                                                                                 </li>
                                                                                                 <?php endif; ?>
                                                                                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                             
                                                                                         </ul>
                                                                                 </div>
                                                                         </div>
                                                                   </div>
                                                             </div>
                    
                                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    
                                          </div>
                        
                    
                                                             <div class="row mt-40">
                                                                 <div class="col-lg-12 text-center">
                                                                     <button class="primary-btn fix-gr-bg">
                                                                         <span class="ti-check"></span>
                                                                         <?php echo app('translator')->get('submit'); ?>
                                                                         
                                                                     </button>
                                                                 </div>
                                                             </div>
                    
                                      <?php echo e(Form::close()); ?>

                                         <?php endif; ?>
                    
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Modules\MenuManage\Resources\views\edit_sidebar_menu.blade.php ENDPATH**/ ?>
<?php $__env->startSection('mainContent'); ?>
<link rel="stylesheet" href="<?php echo e(asset('/Modules/RolePermission/public/css/style.css')); ?>">
<style type="text/css">
    .erp_role_permission_area {
    display: block !important;
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
<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('menumanage::menuManage.menu_position'); ?>
<?php $__env->stopSection(); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('menumanage::menuManage.menu'); ?> </h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('menumanage::menuManage.menu'); ?></a>
                <a href="#"><?php echo app('translator')->get('menumanage::menuManage.menu_position'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-10">
       
        <div class="row">        
            <div class="col-lg-12">
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
                                                                       <label for="Main_Module_<?php echo e($key); ?>"><?php echo e(@$module_info->name); ?></label>
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
                                                                                              
                                                                                               <label for="Sub_Module_<?php echo e($row2->id); ?>"><?php echo e($row2->name); ?>-<?php echo e($row2->id); ?></label>
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
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Modules\MenuManage\Resources\views\all_sidebar_menu.blade.php ENDPATH**/ ?>
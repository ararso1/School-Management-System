
<li>
    <a  href="javascript:void(0)" class="has-arrow" aria-expanded="false">       
        <div class="nav_icon_small">
            <span class="fas fa-bars"></span>
        </div>
        <div class="nav_title">
            <span><?php echo app('translator')->get('menumanage::menuManage.menu'); ?>  </span>
            
        </div>
    </a>
    <ul class="mm-collapse" id="subMenuPosition">            
            <li>
                <a href="<?php echo e(route('menumanage.index')); ?>"> <?php echo app('translator')->get('menumanage::menuManage.manage_position'); ?></a>
            </li>      
        
    </ul>
</li><?php /**PATH C:\xampp\htdocs\Modules\MenuManage\Resources\views\menu\sidebar.blade.php ENDPATH**/ ?>
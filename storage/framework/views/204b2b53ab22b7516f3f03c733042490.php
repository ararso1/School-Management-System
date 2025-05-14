<div class="chat_flow_list_wrapper ">
    <div class="box_header">
        <div class="main-title">
            <h3 class="m-0"><?php echo app('translator')->get('common.search_list'); ?></h3>
        </div>
    </div>
    <!-- chat_list  -->
    <div class="chat_flow_list">
        <div class="chat_flow_list_inner">
            <div class="serach_field_chat mb_30">
                <div class="search_inner">
                    <form action="<?php echo e(route('chat.user.search')); ?>" method="GET">
                        <div class="search_field">
                            <input type="text" name="keywords" placeholder="<?php echo app('translator')->get('chat::.chat.search_people_or_group'); ?>" value="<?php echo e(request('keywords')); ?>">
                        </div>
                        <button type="submit"> <i class="ti-search"></i> </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/ chat_list  -->
</div>
<?php /**PATH C:\xampp\htdocs\Modules\Chat\Resources\views\partials\_chat_list.blade.php ENDPATH**/ ?>
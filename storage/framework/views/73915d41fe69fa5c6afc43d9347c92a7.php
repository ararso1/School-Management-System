<?php $__env->startSection(config('pagebuilder.site_section')); ?>
<?php echo e(headerContent()); ?>

    <section class="bradcrumb_area" style="background-image:url('<?php echo e($newsPage->image != ""? $newsPage->image : '../img/client/common-banner1.jpg'); ?>')">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="bradcrumb_area_inner">
                        <h1><?php echo e(__('edulia.news')); ?> <span><a href="<?php echo e(url('/')); ?>"><?php echo e(__('edulia.home')); ?></a> / <?php echo e(__('edulia.news')); ?></span></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section_padding blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-md-12">
                    <div class="blog_card">
                        <div class="row">
                            <div class="col-lg-8 col-md-7 all_news_new">
                                <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="blog_card_wrapper">
                                        <?php if(file_exists($value->image)): ?>
                                            <div class="blog_card_wrapper_img"><img src="<?php echo e(asset($value->image)); ?>" alt="<?php echo e($value->news_title); ?>"></div>
                                        <?php endif; ?>
                                        <div class="blog_card_wrapper_content">
                                            <a href="<?php echo e(route('frontend.news-details',$value->id)); ?>" class='blog_card_wrapper_content_title'><?php echo e($value->news_title); ?></a>
                                            <p class="blog_card_wrapper_content_meta"><?php echo e(dateConvert($value->publish_date)); ?></p>
                                            <p><?php echo $value->news_body; ?></p>
                                            <a href="<?php echo e(route('frontend.news-details',$value->id)); ?>">+ <?php echo e(__('edulia.read_more')); ?></a>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="col-lg-4 col-md-5">
                                <div class="blog_widget">
                                    <div class="blog_widget_search">
                                        <label for="#" class='blog_widget_search_icon'><i class="far fa-search"></i></label>
                                        <input type="text" class="input-control-input" id="newsFrontSearch" placeholder='<?php echo e(__('edulia.search')); ?>…'>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <div class="events_loadmore">
                                    <a href="#" class="site_btn load_more_btn_news"><?php echo e(__('edulia.load_more')); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php echo e(footerContent()); ?>

<?php $__env->stopSection(); ?>
<?php if (! $__env->hasRenderedOnce('bbc7bbc3-c59d-460e-81d5-09046f4f7def')): $__env->markAsRenderedOnce('bbc7bbc3-c59d-460e-81d5-09046f4f7def');
$__env->startPush(config('pagebuilder.site_script_var')); ?>
    <script>
        $("#newsFrontSearch").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".blog_card_wrapper").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        $(document).on('click', '.load_more_btn_news', function (e) {
            e.preventDefault();
            var totalNews = $('.news_count').length;
            $.ajax({
                url: "<?php echo e(route('frontend.load-more-blog')); ?>",
                method: "POST",
                data: {
                    skip: totalNews,
                    _token: "<?php echo e(csrf_token()); ?>",
                },
                success: function (response) {
                    var hideButtonNew = $('#hide-button-new-news').val();
                    var countCourseNew = $('#count-news-new-news').val();
                    for (var count  in response) count++;
                        $(".all_news_new").append(response);

                    if(countCourseNew  >= hideButtonNew){
                        $('.load_more_btn_news').hide();
                    }else{
                        $('.load_more_btn_news').show();
                    }
                }
            })
        })
    </script>
<?php $__env->stopPush(); endif; ?>
<?php echo $__env->make(config('pagebuilder.site_layout'),['edit' => false ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\frontEnd\theme\edulia\news\all_news_list.blade.php ENDPATH**/ ?>
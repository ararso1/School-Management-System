<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('common.news'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('/')); ?>/Modules/News/public/assets/css/style.css" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1> <?php echo app('translator')->get('common.news_details'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('common.news'); ?></a>
                    <a href="#"><?php echo app('translator')->get('common.news_details'); ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="admin-visitor-area">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12">              
                    <div class="white-box">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 course__details">
                                <div class="text-center">
                                    <img class="img-fluid" src="<?php echo e(asset($news->image)); ?>" alt="">
                                </div>
                                <div class="course__details_title mt-5">
                                    <div class="single__details">
                                        <div class="details_content">
                                            <span><?php echo app('translator')->get('common.category'); ?></span>
                                            <h4 class="f_w_700"><?php echo e(@$news->newsCategory->title); ?></h4>
                                        </div>
                                    </div>
                                    <div class="single__details">
                                        <div class="details_content">
                                            <span><?php echo app('translator')->get('common.title'); ?></span>
                                            <h4 class="f_w_700"><?php echo e(@$news->title); ?></h4>
                                        </div>
                                    </div>
                                    <div class="single__details">
                                        <div class="details_content text-center">
                                            <span><?php echo app('translator')->get('common.tags'); ?></span>
                                            <div class="d-flex">
                                            <?php $__currentLoopData = $news->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <button class="btn btn-sm btn-primary ml-2"><i class="fa fa-tags"></i> <?php echo e($tag->title); ?> </button>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="user-news-description justify-between">
                                    <p> <?php echo $news->description; ?></p>
                                </div>
                            </div>                           
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="course_review_wrapper">
                                    <div class="course_cutomer_reviews">
                                        <div class="details_title">
                                            <h4 class="font_22 f_w_700"><?php echo app('translator')->get('common.comments'); ?></h4>
                                        </div>
                                        <div class="customers_reviews">
                                            <?php $__currentLoopData = $news->newsComments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="single_reviews">
                                                    <div class="thumb">
                                                        <?php if($comment->user->role_id == 2): ?>
                                                            <img class="img-fluid rounded-circle"
                                                                src="<?php echo e(asset($comment->user->student->student_photo)); ?>"
                                                                alt="<?php echo e(@$comment->user->first_name); ?>">
                                                        <?php elseif($comment->user->role_id == 3): ?>
                                                            <img class="img-fluid rounded-circle"
                                                                src="<?php echo e(asset($comment->user->parent->guardians_photo)); ?>"
                                                                alt="<?php echo e(@$comment->user->parent->first_name); ?>">
                                                        <?php else: ?>
                                                            <img class="img-fluid rounded-circle"
                                                                src="<?php echo e(!is_null($comment->user->staff->staff_photo) ? asset($comment->user->staff->staff_photo) : asset('public/uploads/staff/demo/staff.jpg')); ?>"
                                                                alt="<?php echo e(@$comment->user->staff->first_name); ?>">
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="review_content">
                                                        <h4 class="f_w_700"><?php echo e(@$comment->user->full_name); ?>

                                                        </h4>
                                                        <div class="rated_customer d-flex align-items-center">
                                                            <span><?php echo e(dateconvert($comment->created_at)); ?></span>
                                                        </div>
                                                        <p><?php echo e($comment->comment); ?></p>
                                                        <div class="replay_btn text-right">
                                                            <button class="primary-btn small fix-gr-bg" data-toggle="collapse" data-target="#mainComment<?php echo e($comment->id); ?>" aria-expanded="false" aria-controls="collapseExample">reply </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="comment_replay_wized">
                                                    <div class="col-lg-12 collapse" id="mainComment<?php echo e($comment->id); ?>">
                                                        <form action="<?php echo e(route('user-news-comment-reply.store')); ?>" method="post" class="">
                                                            <?php echo csrf_field(); ?>
                                                            <input type="hidden" name="news_id" value="<?php echo e(@$news->id); ?>">
                                                            <input type="hidden" name="comment_id" value="<?php echo e(@$comment->id); ?>">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="section_title3 mb_20">
                                                                        <h3><?php echo e(__('common.write_your_reply')); ?></h3>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-12">
                                                                    <div class="single_input mb_20">
                                                                        <textarea placeholder=" <?php echo e(__('common.write_your_answer')); ?>" name="reply" class="primary_textarea gray_input form-control"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-12 mb_30 ">
                                                                    <button type="submit" class="w-100 text-center mb_10 cart_store primary-btn fix-gr-bg height_50"> <?php echo e(__('common.submit')); ?></button>
                                                                </div>

                                                            </div>
                                                        </form>
                                                    </div>
                                                    
                                                    <?php $__currentLoopData = $comment->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="single_reviews">
                                                            <div class="thumb">
                                                                <?php if($reply->user->role_id == 2): ?>
                                                                    <img class="img-fluid rounded-circle" src="<?php echo e(asset($reply->user->student->student_photo)); ?>" alt="<?php echo e(@$reply->user->first_name); ?>">
                                                                <?php elseif($reply->user->role_id == 3): ?>
                                                                    <img class="img-fluid rounded-circle" src="<?php echo e(asset($reply->user->parent->guardians_photo)); ?>" alt="<?php echo e(@$reply->user->parent->first_name); ?>">
                                                                <?php else: ?>
                                                                    <img class="img-fluid rounded-circle" src=" <?php echo e(!is_null($reply->user->staff->staff_photo) ? asset($reply->user->staff->staff_photo) : asset('public/uploads/staff/demo/staff.jpg')); ?>" alt="<?php echo e(@$reply->user->staff->first_name); ?>">
                                                                <?php endif; ?>
                                                            </div>

                                                            <div class="review_content">
                                                                <h4 class="f_w_700">
                                                                    <?php echo e(@$reply->user->full_name); ?></h4>
                                                                <div class="rated_customer d-flex align-items-center">
                                                                    <span><?php echo e(dateconvert($reply->created_at)); ?></span>
                                                                </div>
                                                                <p><?php echo e($reply->reply); ?></p>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="conversition_box white-box">

                                    <div id="conversition_box"></div>

                                    <div class="row">
                                        <div class="col-lg-12 " id="mainComment0">
                                            <form action="<?php echo e(route('user-news-comment.store')); ?>" method="post" class="">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="news_id" value="<?php echo e(@$news->id); ?>">

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="section_title3 mb_20">
                                                            <h3><?php echo e(__('common.leave_a_comment')); ?></h3>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="single_input mb_25">
                                                            <textarea rows="4" placeholder="<?php echo e(__('common.leave_a_comment')); ?>" name="comment" class="form-control mb-25"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 mb_30">
                                                        <button type="submit" class="w-100 text-center mb_10 cart_store primary-btn fix-gr-bg height_50">
                                                            <i class="fa fa-comments"></i> <?php echo e(__('common.comment')); ?>

                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\userPdf\newsDetail.blade.php ENDPATH**/ ?>
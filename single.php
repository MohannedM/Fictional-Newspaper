<?php get_header();

while(have_posts()){
    the_post();
?> 


<!-- ##### Blog Area Start ##### -->
<div class="blog-area section-padding-0-80 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="blog-posts-area">

                        <!-- Single Featured Post -->
                        <div class="single-blog-post featured-post single-post">
                            <div class="post-thumb">
                                <a href="<?php echo esc_url(get_the_permalink()); ?>"><img src="<?php echo get_the_post_thumbnail_url(0, 'large'); ?>" alt=""></a>
                            </div>
                            <div class="post-data">
                                <a href="<?php echo get_the_category_rss(); ?>" class="post-catagory"><?php echo get_the_category_list(', '); ?></a>
                                <a href="<?php echo esc_url(get_the_permalink()); ?>" class="post-title my-3">
                                    <h6><?php the_title(); ?></h6>
                                </a>
                                <div class="post-meta">
                                    <p class="post-author">By <a href="<?php echo esc_url(get_author_posts_url(get_the_author_ID())); ?>"><?php echo get_the_author(); ?></a></p>
                                    <p><?php the_content(); ?></p>
                                    <div class="newspaper-post-like d-flex align-items-center justify-content-between">
                                        <!-- Tags -->
                                        <?php if(has_tag()){ ?>
                                        <div class="newspaper-tags d-flex">
                                            <span>Tags:</span>
                                            <ul class="d-flex">
                                                <?php foreach(get_the_tags() as $index => $tag): ?>
                                                    <li><a href="<?php echo get_tag_link($tag); ?>"><?php echo get_tag($tag)->name; ?></a></li>
                                                    <?php echo count(get_the_tags()) > 1 && count(get_the_tags()) > $index + 1 ? ', ' : ''; ?> 
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                        <?php } ?>

                                        <!-- Post Like & Post Comment -->
                                        <div class="d-flex align-items-center">
                                            <a href="#" data-postid="<?php echo get_the_ID(); ?>" data-exists="<?php echo userLikes(get_the_ID())->found_posts ? 'yes' : 'no'; ?>" data-likeid="<?php echo userLikes(get_the_ID())->found_posts ? userLikes(get_the_ID())->posts[0]->ID : ''; ?>" class="post-like"><i class="fa fa-heart-o"></i><i class="fa fa-heart"></i><span class="like-count"><?php echo likesOfPost(get_the_ID())->found_posts; ?></span></a>
                                            <a href="<?php echo esc_url(get_the_permalink()); ?>" class="post-comment"><img src="<?php echo get_theme_file_uri("/img/core-img/chat.png");?>" alt=""> <span>10</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- About Author -->
                        <div class="blog-post-author d-flex">
                            <div class="author-thumbnail">
                                <img src="img/bg-img/32.jpg" alt="">
                            </div>
                            <div class="author-info">
                                <a href="#" class="author-name">James Smith, <span>The Author</span></a>
                                <p>Donec turpis erat, scelerisque id euismod sit amet, fermentum vel dolor. Nulla facilisi. Sed pellen tesque lectus et accu msan aliquam. Fusce lobortis cursus quam, id mattis sapien.</p>
                            </div>
                        </div>

<?php

$comments = get_comments([
    'post_id'=>get_the_ID(),
    'number'=>10
]);

?>


                        <!-- Comment Area Start -->
                        <div class="comment_area clearfix mt-5">
                            <h5 class="title"><?php echo count($comments); ?> Comments</h5>

                            <ol>
                            <?php foreach($comments as $comment){ ?>
                                <!-- Single Comment Area -->
                                <li class="single_comment_area">
                                    <!-- Comment Content -->
                                    <div class="comment-content d-flex">
                                        <!-- Comment Author -->
                                        <div class="comment-author">
                                            <img src="<?php echo get_avatar_url($comment->comment_author); ?>" alt="author">
                                        </div>
                                        <!-- Comment Meta -->
                                        <div class="comment-meta">
                                            <a href="#" class="post-author"><?php $comment->comment_author; ?></a>
                                            <a href="#" class="post-date"><?php echo $comment->comment_date; ?> </a>
                                            <p><?php echo $comment->comment_content; ?> </p>
                                        </div>
                                    </div>
                                </li>
                                    <?php } ?>



                            </ol>
                        </div>

                        
                        <div class="post-a-comment-area section-padding-80-0">
                            <!-- Reply Form -->
                            <div class="contact-form-area">

                            <?php comment_form([
                                'title_reply'=>'Leave a comment',
                                'comment_field'=>'<textarea name="comment" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>',
                                'class_submit'=>'btn newspaper-btn mt-30 w-100'
                            ]); ?>
                            


                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="blog-sidebar-area">

                        <!-- Latest Posts Widget -->
                        <div class="latest-posts-widget mb-50">

                            <?php get_template_part('template-parts/content', 'featured'); ?>   

                        </div>

                        <!-- Popular News Widget -->
                        <?php get_template_part('template-parts/content', 'popular'); ?>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Blog Area End ##### -->

<?php } get_footer(); ?>
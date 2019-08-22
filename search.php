<?php get_header();

?>

 <!-- ##### Blog Area Start ##### -->
 <div class="blog-area section-padding-0-80 mt-5">
        <div class="container">
            <h4 class="my-5"><?php echo have_posts() ? 'Results for &ldquo;' . get_search_query() . '&rdquo;' : 'No results for  &ldquo;' . get_search_query() . '&rdquo;'; ?></h4>
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="blog-posts-area">

                    <?php
                    if(have_posts()){
                    while(have_posts()){
                    the_post();
                    ?>
                        <!-- Single Featured Post -->
                        <div class="single-blog-post featured-post mb-30">
                            <div class="post-thumb">
                                <a href="<?php echo esc_url(get_permalink()); ?>"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt=""></a>
                            </div>
                            <div class="post-data">
                                <a href="<?php echo get_the_category_rss(); ?>" class="post-catagory"><?php echo get_the_category_list(', '); ?></a>
                                <a href="<?php echo esc_url(get_permalink()); ?>" class="post-title">
                                    <h6><?php the_title(); ?></h6>
                                </a>
                                <div class="post-meta">
                                    <p class="post-author">By <a href="<?php echo esc_url(get_author_posts_url(get_the_author_ID())); ?>"><?php echo get_the_author(); ?></a></p>
                                    <p class="post-excerp"><?php echo has_excerpt() ? get_the_excerpt() : wp_trim_words(get_the_content(), 30); ?></p>
                                        <!-- Post Like & Post Comment -->
                                        <div class="d-flex align-items-center">
                                            <a href="#" class="post-like"><img src="<?php echo get_theme_file_uri("/img/core-img/like.png");?>" alt=""> <span>392</span></a>
                                            <a href="#" class="post-comment"><img src="<?php echo get_theme_file_uri("/img/core-img/chat.png");?>" alt=""> <span>10</span></a>
                                        </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                }
                    
                    ?>

                   

                      
                    </div>

                    <?php
                    
                     echo paginate_links(); ?>

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



<?php
get_footer(); ?>
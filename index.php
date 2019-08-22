<?php get_header() ?> 



    <!-- ##### Featured Post Area Start ##### -->
    <div class="featured-post-area mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-8">
                    <div class="row">
                    <?php 
                    $fiestPartQuery = new WP_Query([
                    'posts_per_page'=>7,
                    'orderby'=>'date',
                    'order'=>'ASC'
                    ]);
                    $i = 1;

                    while($fiestPartQuery->have_posts()){
                        $fiestPartQuery->the_post();
                        if($i == 1){
                    ?>

                        <!-- Single Featured Post -->
                        <div class="col-12 col-lg-7">
                            <div class="single-blog-post featured-post">
                                <div class="post-thumb">
                                    <a href="<?php the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url();?>" alt=""></a>
                                </div>
                                <div class="post-data">
                                    <a href="<?php get_the_category_rss(); ?>" class="post-catagory"><?php echo get_the_category_list(', '); ?></a>
                                    <a href="<?php the_permalink(); ?>" class="post-title">
                                        <h6><?php echo get_the_title(); ?></h6>
                                    </a>
                                    <div class="post-meta">
                                        <p class="post-author">By <?php the_author_posts_link(); ?></p>
                                        <p class="post-excerp"><?php echo has_excerpt() ? get_the_excerpt() : wp_trim_words(get_the_content(), 10); ?></p>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php }
                        if($i == 2){ ?>

                        <div class="col-12 col-lg-5">
                            <!-- Single Featured Post -->
                            <div class="single-blog-post featured-post-2">
                                <div class="post-thumb">
                                    <a href="<?php the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url();?>" alt=""></a>
                                </div>
                                <div class="post-data">
                                    <a href="<?php echo get_the_category_rss(); ?>" class="post-catagory"><?php echo get_the_category_list(', '); ?></a>
                                    <div class="post-meta">
                                        <a href="<?php the_permalink(); ?>" class="post-title">
                                            <h6><?php echo wp_trim_words(get_the_content(), 9); ?></h6>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        <?php }
                        if($i == 3){
                        ?>
                            <!-- Single Featured Post -->
                            <div class="single-blog-post featured-post-2">
                                <div class="post-thumb">
                                    <a href="<?php the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url();?>" alt=""></a>
                                </div>
                                <div class="post-data">
                                    <a href="<?php echo get_the_category_rss(); ?>" class="post-catagory"><?php echo get_the_category_list(', '); ?></a>
                                    <div class="post-meta">
                                        <a href="<?php the_permalink(); ?>" class="post-title">
                                            <h6><?php echo wp_trim_words(get_the_content(), 9); ?></h6>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">


<?php get_template_part('template-parts/content', 'featured'); ?>

                </div>
            </div>
        </div>
    </div>
    <!-- ##### Featured Post Area End ##### -->

    <!-- ##### Popular News Area Start ##### -->
    <div class="popular-news-area section-padding-80-50">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="section-heading">
                        <h6>Popular News</h6>
                    </div>

                    <div class="row">
                        <?php } if($i > 3 && $i <= 7){ ?>
                        <!-- Single Post -->
                        <div class="col-12 col-md-6">
                            <div class="single-blog-post style-3">
                                <div class="post-thumb">
                                    <a href="<?php the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url();?>" alt=""></a>
                                </div>
                                <div class="post-data">
                                    <a href="<?php echo get_the_category_rss(); ?>" class="post-catagory"><?php echo get_the_category_list(', '); ?></a>
                                    <a href="<?php the_permalink(); ?>" class="post-title">
                                        <h6><?php echo wp_trim_words(get_the_content(), 18); ?></h6>
                                    </a>
                                </div>
                            </div>
                        </div>
<?php 

}
$i++;
} wp_reset_postdata();
?>
                    </div>
                </div>


                <div class="col-12 col-lg-4">
                    <div class="section-heading">
                        <h6>Info</h6>
                    </div>
                    <!-- Popular News Widget -->
<?php get_template_part('template-parts/content', 'popular'); ?>

                </div>
            </div>
        </div>
    </div>
    <!-- ##### Popular News Area End ##### -->

    <!-- ##### Video Post Area Start ##### -->
    <div class="video-post-area bg-img bg-overlay" style="background-image: url(img/bg-img/bg1.jpg);">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Single Video Post -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single-video-post">
                        <img src="<?php echo get_theme_file_uri("/img/bg-img/video1.jpg");?>" alt="">
                        <!-- Video Button -->
                        <div class="videobtn">
                            <a href="https://www.youtube.com/watch?v=5BQr-j3BBzU" class="videoPlayer"><i class="fa fa-play" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Single Video Post -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single-video-post">
                        <img src="<?php echo get_theme_file_uri("/img/bg-img/video2.jpg");?>" alt="">
                        <!-- Video Button -->
                        <div class="videobtn">
                            <a href="https://www.youtube.com/watch?v=5BQr-j3BBzU" class="videoPlayer"><i class="fa fa-play" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Single Video Post -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single-video-post">
                        <img src="<?php echo get_theme_file_uri("/img/bg-img/video3.jpg");?>" alt="">
                        <!-- Video Button -->
                        <div class="videobtn">
                            <a href="https://www.youtube.com/watch?v=5BQr-j3BBzU" class="videoPlayer"><i class="fa fa-play" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Video Post Area End ##### -->

    <!-- ##### Editorial Post Area Start ##### -->
    <div class="editors-pick-post-area section-padding-80-50">
        <div class="container">
            <div class="row">
                <!-- Editors Pick -->
                <div class="col-12 col-lg-12">
                    <div class="section-heading">
                        <h6>Editor’s Pick</h6>
                    </div>

                    <div class="row">
                        <?php 

                        $editorPick = new WP_Query([
                           'post_type'=>'post',
                           'posts_per_page'=>6,
                           'orderby'=>'meta_value_num',
                           'meta_key'=>'priority',
                           'order'=>'ASC',
                           'meta_query'=>[
                               [
                                   'key'=>'priority',
                                   'compare'=>'>=',
                                   'value'=>1
                               ]
                           ]  
                        ]);
                        while($editorPick->have_posts()){
                            $editorPick->the_post();
                        ?>

                        <!-- Single Post -->
                        <div class="col-12 col-sm-6 col-lg-4">
                            <div class="single-blog-post">
                                <div class="post-thumb">
                                    <a href="<?php the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(0,'potrait');?>" alt=""></a>
                                </div>
                                <div class="post-data">
                                    <a href="<?php the_permalink(); ?>" class="post-title">
                                        <h6><?php echo wp_trim_words(get_the_content(), 9); ?></h6>
                                    </a>
                                    <div class="post-meta">
                                        <div class="post-date"><a href="<?php the_permalink(); ?>"><?php echo get_the_date('M, d, Y'); ?></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } wp_reset_postdata(); ?>


                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- ##### Editorial Post Area End ##### -->

<?php get_footer(); ?>
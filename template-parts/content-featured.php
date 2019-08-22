<?php $featuredPosts = new WP_Query([
                    'post_type'=>'post',
                    'posts_per_page'=>6,
                    'orderby'=>'date',
                    'order'=>'ASC',
                    'meta_query'=>[
                        [
                            'key'=>'featured',
                            'compare'=>'=',
                            'value'=>true
                        ]
                    ]    
                ]);
                
                while($featuredPosts->have_posts()){
                    $featuredPosts->the_post();
                    ?>

                <!-- Single Featured Post -->
                <div class="single-blog-post small-featured-post d-flex">
                    <div class="post-thumb">
                        <a href="<?php echo esc_url(get_the_permalink()); ?>"><img src="<?php echo get_the_post_thumbnail_url();?>" alt=""></a>
                    </div>
                    <div class="post-data">
                        <a href="<?php echo get_the_category_rss(); ?>" class="post-catagory"><?php echo get_the_category_list(', '); ?></a>
                        <div class="post-meta">
                            <a href="<?php echo esc_url(get_the_permalink()); ?>" class="post-title">
                                <h6><?php echo wp_trim_words(get_the_content(), 10); ?></h6>
                            </a>
                            <p class="post-date"> <span><?php echo get_the_date('M d'); ?></span></p>
                        </div>
                    </div>
                </div>


                <?php } wp_reset_postdata(); ?>
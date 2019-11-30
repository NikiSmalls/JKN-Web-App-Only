<div class="container">
    <div class="row main-blog">
        <div class="col-sm-9 col-xs-12">
            <?php while ( have_posts() ) : the_post(); ?>
            <!-- Blog Start -->
            <div class="blog-section">
                        <div class="row">
                            <?php if(has_post_thumbnail()): ?>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="blog-thumbnail">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail( 'child-education-blog-image', array('class' => '') ); ?>
                                        </a>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="<?php if(has_post_thumbnail()){ echo 'col-sm-6 col-xs-12'; }else{echo 'col-sm-12 col-xs-12';} ?>">
                                <div class="post-content">
                                    <h1 class="blog-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                                    <?php the_excerpt(); 
                                    if ( 'post' === get_post_type() ) { ?>
                                    <ul class="post-list-type">
                                        <li><span class="post-icon icon-1"></span><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html(ucfirst(get_the_author())); ?></a></li>
                                        <li><span class="post-icon icon-3"></span><a href="<?php echo esc_url(comments_link()); ?>"><?php echo sprintf('%s',get_comments_number()); esc_html_e(' Comments','child-education'); ?></a></li>
                                    </ul>
                                    <h2 class="post-date"><?php echo esc_html(get_the_date(get_option( 'date_format' ))); ?></h2>
                                    <?php } ?>
                                    <a href="<?php the_permalink(); ?>" class="read-more"><?php esc_html_e('Read More','child-education'); ?></a>
                                </div>
                            </div>
                        </div> 
            </div>
            <?php endwhile; ?>
            <!-- Blog End -->
            <!--Pagination Start-->
            <?php the_posts_pagination( array(
                'type'  => 'list',
                'screen_reader_text' => ' ',
                'prev_text'          => esc_html__( 'Previous', 'child-education' ),
                'next_text'          => esc_html__('Next','child-education'),
            ) ); ?>
            <!--Pagination End-->
        </div>
        <?php get_sidebar(); ?>
    </div>    
</div>
<?php get_footer();
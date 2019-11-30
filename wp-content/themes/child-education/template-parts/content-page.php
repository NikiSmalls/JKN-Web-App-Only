<?php
/**
 * The template for displaying single page
 * @package Child Education
 */ ?>
<div class="col-sm-9 col-xs-12">
    <!--Blog-1-->
    <?php while ( have_posts() ) : the_post(); ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class('blog-section single-section'); ?>>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <?php if(has_post_thumbnail()): ?>
                        <div class="blog-thumbnail">
                            <?php the_post_thumbnail( 'full' ); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-sm-12 col-xs-12">
                    <div class="post-content">
                        <h1 class="blog-post-title"><?php the_title(); ?></h1>
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>  
        </div>
        <?php wp_link_pages( array(
            'before'      => '<div class="single-pagination">'.esc_html__( 'Pages:', 'child-education' ),
            'after'       => '</div>',
            'link_before' => '',
            'link_after'  => '',
            'separator'   => ' ',
        ) );
        comments_template('', true);
        endwhile; ?>
</div>
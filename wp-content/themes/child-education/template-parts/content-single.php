<?php
/**
 * The template for displaying single post page
 * @package Child Education
 */ ?>
<div class="col-sm-9 col-xs-12">
    <!--Blog-1-->
    <?php while ( have_posts() ) : the_post(); ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class('blog-section single-section'); ?>>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <?php if(has_post_thumbnail()): ?>
                        <div class="blog-thumbnail single-content-img">
                            <?php the_post_thumbnail( 'full' ); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-sm-12 col-xs-12">
                    <div class="post-content single-content">
                        <?php the_content(); ?>
                        <ul class="post-list-type single-list-type">
                            <li><span class="post-icon icon-1"></span><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html(ucfirst(get_the_author())); ?></a></li>
                            <li><span class="post-icon icon-3"></span><a href="<?php echo esc_url(comments_link()); ?>"><?php echo get_comments_number(); esc_html_e(' Comments','child-education'); ?></a></li>
                        </ul>
                        <h2 class="post-date"><?php echo esc_html(get_the_date(get_option( 'date_format' ))); ?></h2>
                        <h4 class="post-tag">
                            <i class="fa fa-tags" aria-hidden="true"></i> : <?php echo sprintf('%s',wp_kses_post(get_the_tag_list('', ',' ))); ?>
                        </h4>
                        <h4 class="post-category">
                            <?php echo sprintf( '%1$s %2$s',esc_html__('Categories :','child-education'),wp_kses_post(get_the_category_list(', ',''))); ?>
                        </h4>
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
        the_post_navigation( array(
            'prev_text'             => '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'.esc_html__( ' Previous', 'child-education' ),
            'next_text'             => esc_html__( 'Next ', 'child-education' ).'<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
            'screen_reader_text'    => ' ',
        ) );
        comments_template('', true);
        endwhile; ?>
</div>
<?php
/**
 * The template for displaying blog
 * @package Child Education
 */
get_header(); ?>
<div class="blog-wrap" >
    <div class="container">
        <div class="blog-title">
            <h2>
                <b><?php if(!empty(esc_html(get_option( 'page_for_posts' ))) ):
                    echo esc_html(get_the_title(get_option( 'page_for_posts' )));
                else:
                    esc_html_e('BLOG','child-education');
                endif; ?></b>
                <?php echo child_education_custom_breadcrumbs(); ?>
            </h2>
        </div>
    </div>
</div>
<div class="container">
    <div class="row main-blog">
        <!--Blog-Post Area-->
        <?php if ( have_posts() ) :
            get_template_part('template-parts/content');
        endif; ?>
        <!--Sidebar Start-->
        <?php get_sidebar(); ?>
        <!--Sidebar End-->        
    </div>
</div>
<?php get_footer();
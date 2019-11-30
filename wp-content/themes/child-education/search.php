<?php
/**
 * The template for displaying search result
 * @package Child Education
 */
get_header(); 
if ( have_posts() ) : ?>
<div class="blog-wrap">
    <div class="container">
        <div class="blog-title">
            <h2>
                <b><?php echo esc_html__('Search results for : ', 'child-education') . get_search_query(false); ?></b>
                <?php echo child_education_custom_breadcrumbs(); ?>
            </h2>
        </div>
    </div>
</div>
    <?php get_template_part( 'template-parts/content', 'search' ); 
    else: 
        get_template_part( 'template-parts/content', 'none' );  ?>
    <?php endif; ?>
<?php get_footer();
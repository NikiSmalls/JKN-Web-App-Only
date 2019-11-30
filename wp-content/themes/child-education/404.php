<?php
/**
 * The template for displaying 404 pages (not found)
 * @package Child Education
 */
get_header(); ?>
 <div class="blog-wrap">
    <div class="container">
        <div class="blog-title">
            <h2>
                <b><?php _e( '404 Page Not Found', 'child-education' ); ?></b>
                <?php echo child_education_custom_breadcrumbs(); ?>
            </h2>
        </div>
    </div>
</div>
<div class="container">
	<div class="row main-blog">
        <div class="col-sm-9 col-xs-12">
    	    <!-- Blog Start -->
        	<div class="blog-section">
    	        <h4><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'child-education');?></h4>
    	        <?php get_search_form(); ?>
    	    </div>
    	    <!-- Blog End -->
    	</div>
        <?php get_sidebar(); ?>
    </div>    
</div>

<?php get_footer();

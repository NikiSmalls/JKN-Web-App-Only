<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * @package child-education
 */
?>
<div class="blog-wrap">
    <div class="container">
        <div class="blog-title">
            <h2>
                <b><?php _e( 'Nothing Found', 'child-education' ); ?></b>
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
		        <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
				<h4><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'child-education' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></h4>

				<?php elseif ( is_search() ) : ?>
				<h2 class="no-match-title"><i class="fa fa-thumbs-down" aria-hidden="true"></i> <?php _e('Nothing Found','child-education'); ?> </h2>
				<h5 class="no-match-text"><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'child-education' ); ?></h5>
				<div class="child-education-search-form">
					<?php get_search_form(); ?>
				</div>
				<?php else : ?>
				<h4><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'child-education' ); ?></h4>
				<?php get_search_form(); ?>
				<?php endif; ?>
	        </div>
	    </div>
	     <?php get_sidebar();?>
	</div>     
</div>
  	
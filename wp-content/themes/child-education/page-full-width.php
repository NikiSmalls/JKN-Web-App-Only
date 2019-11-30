<?php
/**
 * Template Name: Full Width
 * @package Child Education
 */
get_header(); ?>
<div class="container">
    <!-- <div class="row main-blog"> -->
        <!--Blog-Post Area-->
        <?php if ( have_posts() ) :
            get_template_part('template-parts/content-full','page');
        endif; ?>
        
    <!-- </div> -->
</div>
<?php get_footer();
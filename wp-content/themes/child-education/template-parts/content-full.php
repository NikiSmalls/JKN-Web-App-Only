<?php
/**
 * The template for displaying archive pages like categories, tags, authors, months
 * @package Child Education
 */ ?>
<div class="col-sm-12 col-xs-12">
    <?php while ( have_posts() ) : the_post(); ?>
        <!-- Page Start -->
            <div class="row">                
                <div class="col-sm-12 col-xs-12">
                    <div class="page-content">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>  
        <!-- Page End -->
    <?php endwhile; ?>
</div>
<?php
/**
 * The template for displaying search results pages.
 *
 * @package Avid Magazine
 */

get_header(); ?>
<div class="post-list content-area">
    <div class="container">
        <section id="primary">
            <main id="main" class="site-main" role="main">

                <?php if ( have_posts() ) : ?>

                        <h4><?php printf( esc_html__( 'Search Results for: %s', 'avid-magazine' ), '<span>' . get_search_query() . '</span>' ); ?></h4>

                    <?php /* Start the Loop */ ?>
                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php
                        /**
                         * Run the loop for the search to output the results.
                         * If you want to overload this in a child theme then include a file
                         * called content-search.php and that will be used instead.
                         */
                        get_template_part( 'template-parts/content', 'search' );
                        ?>

                    <?php endwhile; ?>

                    <?php the_posts_navigation(); ?>

                <?php else : ?>

                    <?php get_template_part( 'template-parts/content', 'none' ); ?>

                <?php endif; ?>

            </main><!-- #main -->
        </section><!-- #primary -->
    </div>
</div>
<?php get_footer(); ?>
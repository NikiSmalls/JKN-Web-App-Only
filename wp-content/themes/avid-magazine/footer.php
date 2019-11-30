<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Avid Magazine
 */

?>
	<footer class="main">
		<div class="container">
		<?php dynamic_sidebar( 'footer-1' ); ?>
	</div>
	</footer>
		<div class="copyright text-center spacer">
			<?php esc_html_e( "Powered by", 'avid-magazine' ); ?> <a href="<?php echo esc_url( 'http://wordpress.org/' ); ?>"><?php esc_html_e( "WordPress", 'avid-magazine' ); ?></a> | <a href="<?php echo esc_url( 'https://avidthemes.com/downloads/free-avid-magazine-wordpress-theme/' ); ?>" target="_blank"  rel="nofollow"><?php esc_html_e( 'Avid Magazine by Avidthemes','avid-magazine' ); ?></a>
		</div>
		<div class="scroll-top-wrapper"> <span class="scroll-top-inner"><i class="fa fa-2x fa-angle-up"></i></span></div> 
		
		<?php wp_footer(); ?>
	</body>
</html>
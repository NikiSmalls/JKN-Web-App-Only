<?php 
$footer_widget_style = esc_html(get_theme_mod('footer_widget_style',3));
$hide_footer_widget_bar = esc_html(get_theme_mod('hide_footer_widget_bar',1));

if(($hide_footer_widget_bar == 1) || ($hide_footer_widget_bar == '')) { 
	$footer_widget_style = $footer_widget_style+1;
	$footer_column_value = floor(12/($footer_widget_style));  ?>
	<div class="footer-wrap">
		<div class="container">
			<div class="row">
				<?php $k = 1;
	                for( $i=0; $i<$footer_widget_style; $i++) {
	                    if (is_active_sidebar('footer-'.$k)) { ?>
	                        <div class="col-md-<?php echo esc_attr($footer_column_value); ?> col-sm-<?php echo esc_attr($footer_column_value); ?> col-xs-12"><?php dynamic_sidebar('footer-'.$k); ?>
	                        </div>
	                	<?php }
	                    $k++;
	             	} ?>			
			</div>
		</div>
	</div>
<?php } ?>
<div class="sub-footer"><!--Sub-Footer-->
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-xs-12">
				<div class="copy-right-text">
					<p><?php echo wp_kses_post(get_theme_mod('footer_copyright_text')); ?> <?php esc_html_e('Powered By ','child-education'); ?><a href="<?php echo esc_url('https://hippothemes.com/wordpress-themes/child-education/'); ?>"><?php esc_html_e('Child Education WordPress Theme','child-education'); ?></a></p>
				</div>
			</div>
			<div class="col-sm-4 col-xs-12">
				<div class="footer-social-icon">
					<ul>
						<?php for($i=1;$i<=5;$i++):
                        if (get_theme_mod('child_education_social_icon'.$i) != '' && get_theme_mod('child_education_social_link'.$i) != '') { ?>
                        	<li><a target="_blank" href="<?php echo esc_url(get_theme_mod('child_education_social_link'.$i)); ?>"><i class="fa <?php echo esc_attr(get_theme_mod('child_education_social_icon'.$i)); ?>"></i></a></li>
                        <?php }
                        endfor; ?>
						<?php ?>
					</ul>
            	</div>
			</div>
		</div>
	</div>
</div>
<?php wp_footer(); ?>
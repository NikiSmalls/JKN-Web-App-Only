<?php 
/**
 * The template for displaying sidebar
 * @package Child Education
 */  
if (is_active_sidebar('sidebar-1')) { ?>
	<div class="col-sm-3 col-xs-12">
		<div class="sidebar-section">
		    <?php dynamic_sidebar('sidebar-1'); ?>
		</div>
	</div>
<?php } ?>
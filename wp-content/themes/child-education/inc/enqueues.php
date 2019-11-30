<?php function child_education_enqueues(){
	wp_enqueue_style( 'child-education-google-fonts-rancho', '//fonts.googleapis.com/css?family=Rancho', array(), null );
	wp_enqueue_style( 'child-education-google-fonts-overlock', '//fonts.googleapis.com/css?family=Overlock:400,400i,700,700i,900,900i', array(), null );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/assets/css/bootstrap.css', array(), null );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/css/font-awesome.css', array(), null );	
	wp_enqueue_style('child-education-custom-style',get_template_directory_uri() . '/assets/css/default.css', array(), null);
	
		
	if ( is_singular() ) wp_enqueue_script( "comment-reply" );
	wp_enqueue_script('bootstrap',get_template_directory_uri().'/assets/js/bootstrap.js', array('jquery'), null, true);
	child_education_dynamic_styles();
}
add_action('wp_enqueue_scripts','child_education_enqueues');
include get_template_directory().'/inc/theme-customization.php';
include get_template_directory().'/inc/breadcumbs.php';
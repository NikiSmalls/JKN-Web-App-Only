<?php
/**
 * Demo configuration
 *
 * @package Avid Magazine
 */

$config = array(
	'ocdi'           => array(
		array(
			'import_file_name'             => esc_html__( 'Import - Layout One', 'avid-magazine' ),
			'local_import_file'            => trailingslashit( get_stylesheet_directory() ) . 'inc/demo/content-1.xml',
      		'local_import_widget_file'     => trailingslashit( get_stylesheet_directory() ) . 'inc/demo/widget-1.wie',
      		'local_import_customizer_file' => trailingslashit( get_stylesheet_directory() ) . 'inc/demo/customizer-1.dat',
      		'import_notice'					=> esc_html__( 'It will overwrite your settings', 'avid-magazine' ),
      		'preview_url'					=> esc_url( 'https://avidthemes.com/demo/avid-magazine-pro/' ),
      		'import_preview_image_url'		=> esc_url( 'https://avidthemes.com/wp-content/uploads/edd/avid-magazine.jpg' )
		),
	),
);

Avid_Magazine_Demo::init( apply_filters( 'avid_magazine_demo_filter', $config ) );
<?php
/**
 * Homepage Settings
 *
 * @package Avid Magazine
 */

add_action( 'customize_register', 'avid_magazine_customize_register_theme_options_panel' );

function avid_magazine_customize_register_theme_options_panel( $wp_customize ) {
	$wp_customize->add_panel( 'avid_magazine_theme_options_panel', array(
	    'priority'    => 12,
	    'title'       => esc_html__( 'Theme Options', 'avid-magazine' ),
	    'description' => esc_html__( 'Theme Options', 'avid-magazine' ),
	) );
}
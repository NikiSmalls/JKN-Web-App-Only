<?php
/**
 * Header Settings
 *
 * @package Avid Magazine
 */

add_action( 'customize_register', 'avid_magazine_customize_register_header_panel' );

function avid_magazine_customize_register_header_panel( $wp_customize ) {
	$wp_customize->add_panel( 'avid_magazine_header_panel', array(
	    'priority'    => 11,
	    'title'       => esc_html__( 'Header Options', 'avid-magazine' ),
	    'description' => esc_html__( 'Header Options', 'avid-magazine' ),
	) );
}
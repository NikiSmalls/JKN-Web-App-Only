<?php
/**
 * General Settings
 *
 * @package Avid Magazine
 */

add_action( 'customize_register', 'avid_magazine_customize_register_general_panel' );

function avid_magazine_customize_register_general_panel( $wp_customize ) {
	$wp_customize->add_panel( 'avid_magazine_general_panel', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'General Options', 'avid-magazine' ),
	    'description' => esc_html__( 'General Options', 'avid-magazine' ),
	) );
}
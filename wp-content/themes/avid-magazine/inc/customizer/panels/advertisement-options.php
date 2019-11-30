<?php
/**
 * Advertisement Settings
 *
 * @package Avid Magazine
 */

add_action( 'customize_register', 'avid_magazine_customize_register_ad_panel' );

function avid_magazine_customize_register_ad_panel( $wp_customize ) {
	$wp_customize->add_panel( 'avid_magazine_ad_panel', array(
	    'priority'    => 13,
	    'title'       => esc_html__( 'Advertisement Options', 'avid-magazine' ),
	    'description' => esc_html__( 'Advertisement Options', 'avid-magazine' ),
	) );
}
<?php
/**
 * Footer Settings
 *
 * @package Avid Magazine
 */

add_action( 'customize_register', 'avid_magazine_customize_register_footer_section' );

function avid_magazine_customize_register_footer_section( $wp_customize ) {

    $wp_customize->add_section( 'avid_magazine_footer_section', array(
        'title'          => esc_html__( 'Footer / Copyright', 'avid-magazine' ),
        'description'    => esc_html__( 'Footer / Copyright :', 'avid-magazine' ),
        'panel'          => 'avid_magazine_general_panel',
        'priority'       => 170,        
    ) );

    $wp_customize->add_setting( 'copyright_edit_option', array(  
        'sanitize_callback' => 'sanitize_text_field',
        'default'     => '',
    ) );

    $wp_customize->add_control( new Avid_Magazine_Custom_Text( $wp_customize, 'copyright_edit_option', array(
        'label' => esc_html__( 'Footer Copyright text can be edited in Pro Version.','avid-magazine' ),
        'section' => 'avid_magazine_footer_section',
        'settings' => 'copyright_edit_option',
    ) ) );

    
}
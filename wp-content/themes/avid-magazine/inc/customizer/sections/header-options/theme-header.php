<?php
/**
 * Header Layout Settings
 *
 * @package Avid Magazine
 */

add_action( 'customize_register', 'avid_magazine_theme_header_layout_section' );

function avid_magazine_theme_header_layout_section( $wp_customize ) {

    $wp_customize->add_section( 'avid_magazine_theme_header_layout_section', array(
        'title'          => esc_html__( 'Theme Header Options', 'avid-magazine' ),
        'description'    => esc_html__( 'Theme Header Options', 'avid-magazine' ),
        'panel'          => 'avid_magazine_header_panel',
        'priority'       => 2,
        'capability'     => 'edit_theme_options',
    ) );


    $wp_customize->add_setting( 'avid_magazine_header_sticky_menu_option', array(
      'sanitize_callback'     =>  'avid_magazine_sanitize_checkbox',
      'default'               =>  false
    ) );

    $wp_customize->add_control( new Avid_Magazine_Toggle_Control( $wp_customize, 'avid_magazine_header_sticky_menu_option', array(
      'label' => esc_html__( 'Enable Sticky Menu?','avid-magazine' ),
      'section' => 'avid_magazine_theme_header_layout_section',
      'settings' => 'avid_magazine_header_sticky_menu_option',
      'type'=> 'toggle',
    ) ) );

    $wp_customize->add_setting( 'header_search_display_option', array(
        'sanitize_callback'     =>  'avid_magazine_sanitize_checkbox',
        'default'               =>  false
    ) );
            
    $wp_customize->add_control( new Avid_Magazine_Toggle_Control( $wp_customize, 'header_search_display_option', array(
        'label' => esc_html__( 'Hide / Show Header Search','avid-magazine' ),
        'section' => 'avid_magazine_theme_header_layout_section',
        'settings' => 'header_search_display_option',
        'type'=> 'toggle',
    ) ) );

    
    $wp_customize->add_setting( 'avid_magazine_header_layouts', array(  
        'sanitize_callback' => 'avid_magazine_sanitize_choices',
        'default'     => 'four',
    ) );

    $wp_customize->add_control( new Avid_Magazine_Radio_Image_Control( $wp_customize, 'avid_magazine_header_layouts', array(
        'label' => esc_html__( 'Header Layout','avid-magazine' ),
        'description'   => esc_html__( 'More layout options availabe in Pro Version.', 'avid-magazine' ),
        'section' => 'avid_magazine_theme_header_layout_section',
        'settings' => 'avid_magazine_header_layouts',
        'type'=> 'radio-image',
        'choices'     => array(
            'four'   => get_stylesheet_directory_uri() . '/images/homepage/header-layouts/header-layout-four.jpg'
        ),
    ) ) );

}
<?php
/**
 * Headline Settings
 *
 * @package Avid Magazine
 */

add_action( 'customize_register', 'avid_magazine_theme_headline_section' );

function avid_magazine_theme_headline_section( $wp_customize ) {

    $wp_customize->add_section( 'avid_magazine_theme_headline_section', array(
        'title'          => esc_html__( 'Headline Options', 'avid-magazine' ),
        'description'    => esc_html__( 'Headline Options', 'avid-magazine' ),
        'panel'          => 'avid_magazine_header_panel',
        'priority'       => 2,
        'capability'     => 'edit_theme_options',
    ) );


    $wp_customize->add_setting( 'theme_headline_display_option', array(
        'sanitize_callback'     =>  'avid_magazine_sanitize_checkbox',
        'default'               =>  false
    ) );
            
    $wp_customize->add_control( new Avid_Magazine_Toggle_Control( $wp_customize, 'theme_headline_display_option', array(
        'label' => esc_html__( 'Hide / Show Headline','avid-magazine' ),
        'section' => 'avid_magazine_theme_headline_section',
        'settings' => 'theme_headline_display_option',
        'type'=> 'toggle',
    ) ) );

    $wp_customize->add_setting( 'headline_title', array(
        'sanitize_callback'     =>  'sanitize_text_field',
        'default'               =>  ''
    ) );

    $wp_customize->add_control( 'headline_title', array(
        'label' => esc_html__( 'Title', 'avid-magazine' ),
        'section' => 'avid_magazine_theme_headline_section',
        'settings' => 'headline_title',
        'type'=> 'text',
    ) );


    $wp_customize->add_setting( 'theme_headline_category', array(
        'capability'  => 'edit_theme_options',        
        'sanitize_callback' => 'avid_magazine_sanitize_category',
        'default'     => '',
    ) );

    $wp_customize->add_control( new Avid_Magazine_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'theme_headline_category', array(
        'label' => esc_html__( 'Choose Category', 'avid-magazine' ),
        'section' => 'avid_magazine_theme_headline_section',
        'settings' => 'theme_headline_category',
        'type'=> 'dropdown-taxonomies',
        'taxonomy'  =>  'category'
    ) ) );

    $wp_customize->add_setting( 'number_of_headline_posts', array(
        'sanitize_callback'     =>  'sanitize_text_field',
        'default'               =>  3
    ) );

    $wp_customize->add_control( 'number_of_headline_posts', array(
        'label' => esc_html__( 'Number of posts', 'avid-magazine' ),
        'section' => 'avid_magazine_theme_headline_section',
        'settings' => 'number_of_headline_posts',
        'type'=> 'text',
        'description'   =>  'put -1 for unlimited'
    ) );

    
    $wp_customize->add_setting( 'avid_magazine_headline_layouts', array(  
        'sanitize_callback' => 'avid_magazine_sanitize_choices',
        'default'     => 'one',
    ) );

    $wp_customize->add_control( new Avid_Magazine_Radio_Image_Control( $wp_customize, 'avid_magazine_headline_layouts', array(
        'label' => esc_html__( 'Headline Layout','avid-magazine' ),
        'description'   => esc_html__( 'More layout options availabe in Pro Version.', 'avid-magazine' ),
        'section' => 'avid_magazine_theme_headline_section',
        'settings' => 'avid_magazine_headline_layouts',
        'type'=> 'radio-image',
        'choices'     => array(
            'one'   => get_stylesheet_directory_uri() . '/images/homepage/headline-layouts/headline-layout-one.jpg',
        ),
    ) ) );

}
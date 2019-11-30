<?php
/**
 * Featured Settings
 *
 * @package Avid Magazine
 */

add_action( 'customize_register', 'avid_magazine_customize_register_featured_lifestyle' );

function avid_magazine_customize_register_featured_lifestyle( $wp_customize ) {
	$wp_customize->add_section( 'avid_magazine_featured_lifestyle_sections', array(
	    'title'          => esc_html__( 'Featured Section', 'avid-magazine' ),
	    'description'    => esc_html__( 'Featured Section :', 'avid-magazine' ),
	    'panel'          => 'avid_magazine_theme_options_panel',
	) );

    $wp_customize->add_setting( 'featured_lifestyle_display_option', array(
      'sanitize_callback'     =>  'avid_magazine_sanitize_checkbox',
      'default'               =>  false
    ) );

    $wp_customize->add_control( new Avid_Magazine_Toggle_Control( $wp_customize, 'featured_lifestyle_display_option', array(
      'label' => esc_html__( 'Hide / Show','avid-magazine' ),
      'section' => 'avid_magazine_featured_lifestyle_sections',
      'settings' => 'featured_lifestyle_display_option',
      'type'=> 'toggle',
    ) ) );

    $wp_customize->add_setting( 'featured_lifestyle_category', array(
        'capability'  => 'edit_theme_options',        
        'sanitize_callback' => 'avid_magazine_sanitize_category',
        'default'     => '',
    ) );

    $wp_customize->add_control( new Avid_Magazine_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'featured_lifestyle_category', array(
        'label' => esc_html__( 'Choose Category', 'avid-magazine' ),
        'section' => 'avid_magazine_featured_lifestyle_sections',
        'settings' => 'featured_lifestyle_category',
        'type'=> 'dropdown-taxonomies',
        'taxonomy'  =>  'category'
    ) ) );

    $wp_customize->add_setting( 'featured_lifestyle_section_title', array(
        'sanitize_callback'     =>  'sanitize_text_field',
        'default'               =>  ''
    ) );

    $wp_customize->add_control( 'featured_lifestyle_section_title', array(
        'label' => esc_html__( 'Title', 'avid-magazine' ),
        'section' => 'avid_magazine_featured_lifestyle_sections',
        'settings' => 'featured_lifestyle_section_title',
        'type'=> 'text',
    ) );


    $wp_customize->add_setting( 'avid_magazine_featured_layouts', array(  
        'sanitize_callback' => 'avid_magazine_sanitize_choices',
        'default'     => 'three',
        'transport'   => 'postMessage'
    ) );

    $wp_customize->add_control( new Avid_Magazine_Radio_Image_Control( $wp_customize, 'avid_magazine_featured_layouts', array(
        'label' => esc_html__( 'Featured Layout','avid-magazine' ),
        'description'   => esc_html__( 'More layout options availabe in Pro Version.', 'avid-magazine' ),
        'section' => 'avid_magazine_featured_lifestyle_sections',
        'settings' => 'avid_magazine_featured_layouts',
        'type'=> 'radio-image',
        'choices'     => array(
            'three'   => get_stylesheet_directory_uri() . '/images/homepage/featured-layouts/featured-layout-three.jpg',
        ),
    ) ) );


    $wp_customize->add_setting( 'featured_fullwidth_option', array(
      'sanitize_callback'     =>  'avid_magazine_sanitize_checkbox',
      'default'               =>  false
    ) );

    $wp_customize->add_control( new Avid_Magazine_Toggle_Control( $wp_customize, 'featured_fullwidth_option', array(
      'label' => esc_html__( 'Fullwidth Display?','avid-magazine' ),
      'section' => 'avid_magazine_featured_lifestyle_sections',
      'settings' => 'featured_fullwidth_option',
      'type'=> 'toggle',
    ) ) );

    $wp_customize->add_setting( 'number_of_featured_posts', array(
        'sanitize_callback'     =>  'avid_magazine_sanitize_select',
        'default'               =>  '5'
    ) );


    $wp_customize->add_control( new Avid_Magazine_Select_Control( $wp_customize, 'number_of_featured_posts', array(
        'label' => esc_html__( 'Number of posts', 'avid-magazine' ),
        'section' => 'avid_magazine_featured_lifestyle_sections',
        'settings' => 'number_of_featured_posts',
        'type'=> 'select',
        'choices'     => array(
            '3' => '3',
            '4' => '4',
            '5' => '5',
            '6' => '6',
            '7' => '7',
            '8' => '8',
            '9' => '9',
            '10' => '10',
        ),
    ) ) );


    $wp_customize->add_setting( 'featured_lifestyle_show_hide_details', array(
        'capability'  => 'edit_theme_options',        
        'sanitize_callback' => 'avid_magazine_sanitize_array',
        'default'     => array( 'date', 'categories', 'tags' ),
    ) );

    $wp_customize->add_control( new Avid_Magazine_Multi_Check_Control( $wp_customize, 'featured_lifestyle_show_hide_details', array(
        'label' => esc_html__( 'Hide / Show Details', 'avid-magazine' ),
        'section' => 'avid_magazine_featured_lifestyle_sections',
        'settings' => 'featured_lifestyle_show_hide_details',
        'type'=> 'multi-check',
        'choices'     => array(
            'author' => esc_html__( 'Show post author', 'avid-magazine' ),
            'date' => esc_html__( 'Show post date', 'avid-magazine' ),     
            'categories' => esc_html__( 'Show Categories', 'avid-magazine' ),
            'tags' => esc_html__( 'Show Tags', 'avid-magazine' ),
            'number_of_comments' => esc_html__( 'Show number of comments', 'avid-magazine' ),
            'description'   =>  esc_html__( 'Show description', 'avid-magazine' ),
            'read-more'   =>  esc_html__( 'Show Read More', 'avid-magazine' ),
        ),
    ) ) );

}
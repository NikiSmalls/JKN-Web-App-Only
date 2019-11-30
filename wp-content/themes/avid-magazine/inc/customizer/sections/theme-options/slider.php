<?php
/**
 * Recommended Trips Settings
 *
 * @package Avid Magazine
 */


add_action( 'customize_register', 'avid_magazine_customize_register_slider_section' );
function avid_magazine_customize_register_slider_section( $wp_customize ) {
    
	$wp_customize->add_section( 'avid_magazine_slider_sections', array(
	    'title'          => esc_html__( 'Slider Posts', 'avid-magazine' ),
	    'description'    => esc_html__( 'Slider Posts :', 'avid-magazine' ),
	    'panel'          => 'avid_magazine_theme_options_panel',
	) );

    $wp_customize->add_setting( 'slider_display_option', array(
        'capability'  => 'edit_theme_options',
        'sanitize_callback'     =>  'avid_magazine_sanitize_checkbox',
        'default'               =>  false
    ) );

    $wp_customize->add_control( new Avid_Magazine_Toggle_Control( $wp_customize, 'slider_display_option', array(
        'label' => esc_html__( 'Hide / Show','avid-magazine' ),
        'section' => 'avid_magazine_slider_sections',
        'settings' => 'slider_display_option',
        'type'=> 'toggle',
    ) ) );

    $wp_customize->add_setting( 'slider_category', array(
        'capability'  => 'edit_theme_options',        
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( new Avid_Magazine_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'slider_category', array(
        'label' => esc_html__( 'Choose category', 'avid-magazine' ),
        'section' => 'avid_magazine_slider_sections',
        'settings' => 'slider_category',
        'type'=> 'dropdown-taxonomies',
    ) ) );


    $wp_customize->add_setting( 'number_of_slider', array(
        'sanitize_callback'     =>  'sanitize_text_field',
        'default'               =>  3
    ) );

    $wp_customize->add_control( 'number_of_slider', array(
        'label' => esc_html__( 'Number of posts', 'avid-magazine' ),
        'section' => 'avid_magazine_slider_sections',
        'settings' => 'number_of_slider',
        'type'=> 'text',
        'description'   =>  'put -1 for unlimited'
    ) );


    $wp_customize->add_setting( 'avid_magazine_slider_layouts', array(  
        'sanitize_callback' => 'avid_magazine_sanitize_choices',
        'default'     => 'two',
        'transport'   => 'postMessage'
    ) );

    $wp_customize->add_control( new Avid_Magazine_Radio_Image_Control( $wp_customize, 'avid_magazine_slider_layouts', array(
        'label' => esc_html__( 'Slider Layout','avid-magazine' ),
        'description'   => esc_html__( 'More layout options availabe in Pro Version.', 'avid-magazine' ),
        'section' => 'avid_magazine_slider_sections',
        'settings' => 'avid_magazine_slider_layouts',
        'type'=> 'radio-image',
        'choices'     => array(
            'two'   => get_stylesheet_directory_uri() . '/images/homepage/slider-layouts/slider-layout-two.jpg',
        ),
    ) ) );
    

    $wp_customize->add_setting( 'slider_details_show_hide', array(
        'capability'  => 'edit_theme_options',        
        'sanitize_callback' => 'avid_magazine_sanitize_array',
        'default'     => array( 'date', 'categories', 'summary', 'readmore' ),
    ) );


    $wp_customize->add_control( new Avid_Magazine_Multi_Check_Control( $wp_customize, 'slider_details_show_hide', array(
        'label' => esc_html__( 'Hide / Show Details', 'avid-magazine' ),
        'section' => 'avid_magazine_slider_sections',
        'settings' => 'slider_details_show_hide',
        'type'=> 'multi-check',
        'choices'     => array(            
            'date' => esc_html__( 'Show post date', 'avid-magazine' ),     
            'categories' => esc_html__( 'Show Categories', 'avid-magazine' ),
            'summary' => esc_attr__( 'Show Summary', 'avid-magazine' ),
            'tags' => esc_html__( 'Show Tags', 'avid-magazine' ),            
            'readmore' => esc_html__( 'Show Read More', 'avid-magazine' ),
        ),
    ) ) );

}
<?php

/**
 * Fonts Settings
 *
 * @package Avid Magazine
 */


add_action( 'customize_register', 'avid_magazine_customize_register_fonts_section' );
function avid_magazine_customize_register_fonts_section( $wp_customize ) {

    $wp_customize->add_section( 'avid_magazine_fonts_section', array(
        'title'          => esc_html__( 'Fonts', 'avid-magazine' ),
        'description'    => esc_html__( 'Fonts :', 'avid-magazine' ),
        'panel'          => 'avid_magazine_general_panel',
        'priority'       => 2,        
    ) );
}

add_action( 'customize_register', 'avid_magazine_customize_font_family' );

function avid_magazine_customize_font_family( $wp_customize ) {
            
    $wp_customize->add_setting( 'font_family', array(
        'transport' => 'postMessage',
        'default'     => 'Montserrat',
        'sanitize_callback' => 'avid_magazine_sanitize_google_fonts',
    ) );

    $wp_customize->add_control( 'font_family', array(
        'settings'    => 'font_family',
        'label'       =>  esc_html__( 'Choose Font Family For Your Site', 'avid-magazine' ),
        'section'     => 'avid_magazine_fonts_section',
        'type'        => 'select',
        'choices'     => google_fonts(),
        'priority'    => 100
    ) );
}


add_action( 'customize_register', 'avid_magazine_customize_font_size' );

function avid_magazine_customize_font_size( $wp_customize ) {
    $wp_customize->add_setting( 'font_size', array(
      'transport' => 'postMessage',
      'default'     => '14px',
      'sanitize_callback' => 'avid_magazine_sanitize_select',
    ) );
    
    $wp_customize->add_control( 'font_size', array(
        'settings'    => 'font_size',
        'label'       =>  esc_html__( 'Choose Font Size', 'avid-magazine' ),
        'section'     => 'avid_magazine_fonts_section',
        'type'        => 'select',
        'default'     => '13px',
        'choices'     =>  array(             
                        '13px' => '13px',
                        '14px' => '14px',
                        '15px' => '15px',
                        '16px' => '16px',
                        '17px' => '17px',
                        '18px' => '18px',
                    ),
        'priority'    =>  101
      ) );
}

add_action( 'customize_register', 'avid_magazine_font_weight' );

function avid_magazine_font_weight( $wp_customize ) {

    $wp_customize->add_setting( 'avid_magazine_font_weight', array(
        'default'           => 500,
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage',
    ) );

    $wp_customize->add_control( new Avid_Magazine_Slider_Control( $wp_customize, 'avid_magazine_font_weight', array(
        'section' => 'avid_magazine_fonts_section',
        'settings' => 'avid_magazine_font_weight',
        'label'   => esc_html__( 'Font Weight', 'avid-magazine' ),
        'priority' => 102,
        'choices'     => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
    ) ) );
}

add_action( 'customize_register', 'avid_magazine_line_height' );

function avid_magazine_line_height( $wp_customize ) {

    $wp_customize->add_setting( 'avid_magazine_line_height', array(
        'default'           => 22,
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage',
    ) );

    $wp_customize->add_control( new Avid_Magazine_Slider_Control( $wp_customize, 'avid_magazine_line_height', array(
        'section' => 'avid_magazine_fonts_section',
        'settings' => 'avid_magazine_line_height',
        'label'   => esc_html__( 'Line Height', 'avid-magazine' ),
        'priority' => 102,
        'choices'     => array(
            'min'  => 13,
            'max'  => 53,
            'step' => 1,
        ),
    ) ) );

}

add_action( 'customize_register', 'avid_magazine_heading_options' );
function avid_magazine_heading_options( $wp_customize ) {
            
    $wp_customize->add_setting( 'heading_options_text', array(
      'default' => '',
      'type' => 'customtext',
      'capability' => 'edit_theme_options',
      'transport' => 'refresh',
      'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( new Avid_Magazine_Custom_Text( $wp_customize, 'heading_options_text', array(
        'label' => esc_html__( 'Heading Options :', 'avid-magazine' ),
        'section' => 'avid_magazine_fonts_section',
        'settings' => 'heading_options_text',
        'priority'    => 103
    ) ) );
}


add_action( 'customize_register', 'avid_magazine_heading_font_family' );

function avid_magazine_heading_font_family( $wp_customize ) {

    $wp_customize->add_setting( 'heading_font_family', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'avid_magazine_sanitize_google_fonts',
        'default'     => 'Poppins',
    ) );

    $wp_customize->add_control( 'heading_font_family', array(
        'settings'    => 'heading_font_family',
        'label'       =>  esc_html__( 'Font Family', 'avid-magazine' ),
        'section'     => 'avid_magazine_fonts_section',
        'type'        => 'select',
        'choices'     => google_fonts(),
        'priority'    => 103
    ) );

}


add_action( 'customize_register', 'avid_magazine_heading_font_weight' );

function avid_magazine_heading_font_weight( $wp_customize ) {

    $wp_customize->add_setting( 'heading_font_weight', array(
        'default'           => 600,
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage',
    ) );

    $wp_customize->add_control( new Avid_Magazine_Slider_Control( $wp_customize, 'heading_font_weight', array(
        'section' => 'avid_magazine_fonts_section',
        'settings' => 'heading_font_weight',
        'label'   => esc_html__( 'Font Weight', 'avid-magazine' ),
        'priority' => 103,
        'choices'     => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
    ) ) );

}


add_action( 'customize_register', 'avid_magazine_heading_font_style' );

function avid_magazine_heading_font_style( $wp_customize ) {
    $default_size = array(
        '1' =>  32,
        '2' =>  28,
        '3' =>  24,
        '4' =>  21,
        '5' =>  15,
        '6' =>  12,
    );

    for( $i = 1; $i <= 6 ; $i++ ) {

        $wp_customize->add_setting( 'avid_magazine_heading_' . $i . '_size', array(
            'default'           => $default_size[$i],
            'sanitize_callback' => 'absint',
            'transport' => 'postMessage',
        ) );

        $wp_customize->add_control( 'avid_magazine_heading_' . $i . '_size', array(
            'type'  => 'number',
            'section'   => 'avid_magazine_fonts_section',
            'label' => esc_html__( 'Heading ', 'avid-magazine' ) . $i . esc_html__(' Size', 'avid-magazine' ),
            'priority' => 104,        
            'input_attrs' => array(
                'min' => 10,
                'max' => 50,
                'step'  =>  1
            ),
        ) );
    }
}
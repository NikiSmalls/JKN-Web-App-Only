<?php
/**
 * Colors Settings
 *
 * @package Avid Magazine
 */


add_action( 'customize_register', 'avid_magazine_change_colors_panel' );

function avid_magazine_change_colors_panel( $wp_customize)  {
    $wp_customize->get_section( 'colors' )->priority = 1;
    $wp_customize->get_section( 'colors' )->panel = 'avid_magazine_general_panel';
}


add_action( 'customize_register', 'avid_magazine_customize_color_options' );

function avid_magazine_customize_color_options( $wp_customize ) {
            
    $wp_customize->add_setting( 'primary_colors', array(
        'default'     => '#999',
        'transport'   => 'postMessage',
        'sanitize_callback' => 'avid_magazine_sanitize_hex_color'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_colors', array(
        'label'      => esc_html__( 'Primary Color', 'avid-magazine' ),
        'section'    => 'colors',
        'settings'   => 'primary_colors',
        'priority'   => 1
    ) ) );

    $wp_customize->add_setting( 'secondary_colors', array(
        'default'     => '#ff0000',
        'transport'   => 'postMessage',
        'sanitize_callback' => 'avid_magazine_sanitize_hex_color'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secondary_colors', array(
        'label'      => esc_html__( 'Secondary Color', 'avid-magazine' ),
        'section'    => 'colors',
        'settings'   => 'secondary_colors',
        'priority'   => 2
    ) ) );

    $wp_customize->add_setting( 'font_color', array(
        'transport'   => 'postMessage',
        'default'     => '#333',
        'sanitize_callback' => 'avid_magazine_sanitize_hex_color'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'font_color', array(
        'label'      => esc_html__( 'Font', 'avid-magazine' ),
        'section'    => 'colors',
        'settings'   => 'font_color',
        'priority'   => 3
    ) ) );

    $wp_customize->add_setting( 'menu_font_color', array(
        'default'     => '#aaa',
        'transport'   => 'postMessage',
        'sanitize_callback' => 'avid_magazine_sanitize_hex_color'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_font_color', array(
        'label'      => esc_html__( 'Menu', 'avid-magazine' ),
        'section'    => 'colors',
        'settings'   => 'menu_font_color',
        'priority'   => 4
    ) ) );

    $wp_customize->add_setting( 'menu_background_color', array(
        'default'     => '#ececec',
        'transport'   => 'postMessage',
        'sanitize_callback' => 'avid_magazine_sanitize_hex_color'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_background_color', array(
        'label'      => esc_html__( 'Menu Background', 'avid-magazine' ),
        'section'    => 'colors',
        'settings'   => 'menu_background_color',
        'priority'   => 4
    ) ) );

    $wp_customize->add_setting( 'heading_title_color', array(
        'default'     => '#2173ce',
        'transport'   => 'postMessage',
        'sanitize_callback' => 'avid_magazine_sanitize_hex_color'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'heading_title_color', array(
        'label'      => esc_html__( 'Heading Title', 'avid-magazine' ),
        'section'    => 'colors',
        'settings'   => 'heading_title_color',
        'priority'   => 5
    ) ) );

    $wp_customize->add_setting( 'heading_link_color', array(
        'default'     => '#ce106d',
        'transport'   => 'postMessage',
        'sanitize_callback' => 'avid_magazine_sanitize_hex_color'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'heading_link_color', array(
        'label'      => esc_html__( 'Heading Link', 'avid-magazine' ),
        'section'    => 'colors',
        'settings'   => 'heading_link_color',
        'priority'   => 6
    ) ) );


    $wp_customize->add_setting( 'button_color', array(
        'default'     => '#2173ce',
        'transport'   => 'postMessage',
        'sanitize_callback' => 'avid_magazine_sanitize_hex_color'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_color', array(
        'label'      => esc_html__( 'Button Color', 'avid-magazine' ),
        'section'    => 'colors',
        'settings'   => 'button_color',
        'priority'   => 7
    ) ) );

    $wp_customize->add_setting( 'footer_background_color', array(
        'default'     => '#ececec',
        'transport'   => 'postMessage',
        'sanitize_callback' => 'avid_magazine_sanitize_hex_color'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_background_color', array(
        'label'      => esc_html__( 'Footer Background', 'avid-magazine' ),
        'section'    => 'colors',
        'settings'   => 'footer_background_color',
        'priority'   => 7
    ) ) );

}
<?php
/**
 * Pages Settings
 *
 * @package Avid Magazine
 */
add_action( 'customize_register', 'avid_magazine_customize_register_pages_section' );

function avid_magazine_customize_register_pages_section( $wp_customize ) {

  $wp_customize->add_section( 'avid_magazine_pages_sections', array(
    'title'          => esc_html__( 'Pages Section', 'avid-magazine' ),
    'description'    => esc_html__( 'Pages section :', 'avid-magazine' ),
    'panel'          => 'avid_magazine_theme_options_panel',
  ) );

  $wp_customize->add_setting( 'pages_display_option', array(
      'sanitize_callback'     =>  'avid_magazine_sanitize_checkbox',
      'default'               =>  false
  ) );

  $wp_customize->add_control( new Avid_Magazine_Toggle_Control( $wp_customize, 'pages_display_option', array(
      'label' => esc_html__( 'Hide / Show','avid-magazine' ),
      'section' => 'avid_magazine_pages_sections',
      'settings' => 'pages_display_option',
      'type'=> 'toggle',
  ) ) );

  $wp_customize->add_setting( new Avid_Magazine_Repeater_Setting( $wp_customize, 'pages', array(
    'default' => '',
    'sanitize_callback' => array( 'Avid_Magazine_Repeater_Setting', 'sanitize_repeater_setting' ),
  ) ) );

  $page_query = get_pages();
  $pages = array();
  $pages[ '' ] = esc_attr__( "-- Select --", 'avid-magazine' );
  foreach ( $page_query as $page ) {
    $pages[ $page->ID ] = $page->post_title;
  }
  
  
    
  $wp_customize->add_control( new Avid_Magazine_Control_Repeater( $wp_customize, 'pages', array(
    'section' => 'avid_magazine_pages_sections',
    'settings'    => 'pages',
    'label'   => esc_html__( 'Pages :', 'avid-magazine' ),
    'row_label' => array(
      'type' => 'text',
      'value' => esc_html__( 'Page', 'avid-magazine' ),
    ),
    'button_label' => esc_attr__( 'New Page', 'avid-magazine' ),
    'fields' => array(
      'page' => array(
        'type'        => 'select',
        'default'     => '',
        'label'       => esc_html__( 'Select a page', 'avid-magazine' ),
        'choices' => $pages
      )
    )                   
  ) ) );

}
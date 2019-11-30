<?php
/**
 * Category Display Settings
 *
 * @package Avid Magazine
 */


function get_dropdown_categories() {
  $terms = get_terms( 'category' );
  $cat = array();
  if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
    foreach ( $terms as $term ) {
      $cat[ $term->term_id ] = $term->name;
    }
  }
  return $cat;
}

add_action( 'customize_register', 'avid_magazine_customize_register_category_display' );

function avid_magazine_customize_register_category_display( $wp_customize ) {
	$wp_customize->add_section( 'avid_magazine_category_display_sections', array(
	    'title'          => esc_html__( 'Category Display Section', 'avid-magazine' ),
	    'description'    => esc_html__( 'Category Display Section :', 'avid-magazine' ),
	    'panel'          => 'avid_magazine_theme_options_panel',
	) );

    $wp_customize->add_setting( 'category_display_option', array(
      'sanitize_callback'     =>  'avid_magazine_sanitize_checkbox',
      'default'               =>  false
    ) );

    $wp_customize->add_control( new Avid_Magazine_Toggle_Control( $wp_customize, 'category_display_option', array(
      'label' => esc_html__( 'Hide / Show','avid-magazine' ),
      'section' => 'avid_magazine_category_display_sections',
      'settings' => 'category_display_option',
      'type'=> 'toggle',
    ) ) );

    $wp_customize->add_setting( new Avid_Magazine_Repeater_Setting( $wp_customize, 'category_display_block', array(
        'default'     => '',
    'sanitize_callback' => array( 'Avid_Magazine_Repeater_Setting', 'sanitize_repeater_setting' ),
    ) ) );

    $wp_customize->add_control( new Avid_Magazine_Control_Repeater( $wp_customize, 'category_display_block', array(
      'label' => esc_html__( 'Categories :','avid-magazine' ),
      'section' => 'avid_magazine_category_display_sections',
      'settings' => 'category_display_block',
      'type'=> 'repeater',
      'row_label' => array(
        'type'  => 'field',
        'value' => esc_attr__( 'Category', 'avid-magazine' ),
        'field' => 'category_block_title',
      ),
      'fields' => array(
        'category_block_title' => array(
          'type'        => 'text',
          'label'       => esc_attr__( 'Title', 'avid-magazine' ),
          'description' => esc_attr__( 'This will be the label.', 'avid-magazine' ),
          'default'     => '',
        ),
        'category' => array(
          'type'        => 'select',
          'label'       => esc_attr__( 'Category', 'avid-magazine' ),
          'choices'     =>  get_dropdown_categories()
        ),
        'layout' => array(
          'type'      => 'select',
          'default'   =>  '1',
          'label'     => esc_attr__( 'Layouts', 'avid-magazine' ),
          'choices'   => array(
              '1' => 'Layout 1',
              '2' => 'Layout 2',
              '3' => 'Layout 3',
              '4' => 'Layout 4',
          )
        ),
        'number_of_posts' => array(
          'type'        => 'text',
          'label'       => esc_attr__( 'Number of posts', 'avid-magazine' ),
          'description' =>  esc_attr__( 'Put -1 for unlimited', 'avid-magazine' )
        ),     
      )

    ) ) );

    $wp_customize->add_setting( 'category_display_show_hide_details', array(
        'capability'  => 'edit_theme_options',        
        'sanitize_callback' => 'avid_magazine_sanitize_array',
        'default'     => array( 'date', 'categories', 'tags' ),
    ) );

    $wp_customize->add_control( new Avid_Magazine_Multi_Check_Control( $wp_customize, 'category_display_show_hide_details', array(
        'label' => esc_html__( 'Hide / Show Details :', 'avid-magazine' ),
        'section' => 'avid_magazine_category_display_sections',
        'settings' => 'category_display_show_hide_details',
        'type'=> 'multi-check',
        'choices'     => array(
            'author' => esc_html__( 'Show post author', 'avid-magazine' ),
            'date' => esc_html__( 'Show post date', 'avid-magazine' ),     
            'categories' => esc_html__( 'Show Categories', 'avid-magazine' ),
            'tags' => esc_html__( 'Show Tags', 'avid-magazine' ),
            'number_of_comments' => esc_html__( 'Show number of comments', 'avid-magazine' ),
            'read-more'   =>  esc_html__( 'Show Read More', 'avid-magazine' ),
        ),
    ) ) );
    

}
<?php
/**
 * Drag & Drop Sections
 *
 * @package Avid Magazine
 */
add_action( 'customize_register', 'avid_magazine_drag_and_drop_sections' );

function avid_magazine_drag_and_drop_sections( $wp_customize ) {

	$wp_customize->add_section( 'avid_magazine_sort_homepage_sections', array(
	    'title'          => esc_html__( 'Drag & Drop', 'avid-magazine' ),
	    'description'    => esc_html__( 'Drag & Drop', 'avid-magazine' ),
	    'panel'          => 'avid_magazine_theme_options_panel',
	) );

	
	$default = array( 'slider', 'pages', 'blog-list', 'category-display' );

	$choices = array(
		'slider' => esc_html__( 'Slider Section', 'avid-magazine' ),
		'pages' => esc_html__( 'Pages Section', 'avid-magazine' ),
		'blog-list' => esc_html__( 'Blog List Section', 'avid-magazine' ),
		'category-display' => esc_html__( 'Category Display Section', 'avid-magazine' ),
	);
	

	$wp_customize->add_setting( 'avid_magazine_sort_homepage', array(
        'capability'  => 'edit_theme_options',
        'sanitize_callback'	=> 'avid_magazine_sanitize_array',
        'default'     => $default
    ) );

    $wp_customize->add_control( new Avid_Magazine_Control_Sortable( $wp_customize, 'avid_magazine_sort_homepage', array(
        'label' => esc_html__( 'Drag and Drop Sections to rearrange.', 'avid-magazine' ),
        'section' => 'avid_magazine_sort_homepage_sections',
        'settings' => 'avid_magazine_sort_homepage',
        'type'=> 'sortable',
        'choices'     => $choices
    ) ) );

}
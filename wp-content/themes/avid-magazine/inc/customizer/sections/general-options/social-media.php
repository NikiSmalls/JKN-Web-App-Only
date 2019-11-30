<?php
/**
 * Social Media Sections
 *
 * @package Avid Magazine
 */
add_action( 'customize_register', 'avid_magazine_social_media_sections' );

function avid_magazine_social_media_sections( $wp_customize ) {

	$wp_customize->add_section( 'avid_magazine_social_media_sections', array(
	    'title'          => esc_html__( 'Social Media', 'avid-magazine' ),
	    'description'    => esc_html__( 'Social Media', 'avid-magazine' ),
	    'priority'       => 2,
	    'panel'			 => 'avid_magazine_general_panel',
	) );

	$wp_customize->add_setting( new Avid_Magazine_Repeater_Setting( $wp_customize, 'avid_magazine_social_media', array(
        'default'     => '',
		'sanitize_callback' => array( 'Avid_Magazine_Repeater_Setting', 'sanitize_repeater_setting' ),
    ) ) );
    
    $wp_customize->add_control( new Avid_Magazine_Control_Repeater( $wp_customize, 'avid_magazine_social_media', array(
		'section' => 'avid_magazine_social_media_sections',
		'settings'    => 'avid_magazine_social_media',
		'label'	  => esc_html__( 'Social Links', 'avid-magazine' ),
		'fields' => array(
			'social_media_title' => array(
				'type'        => 'text',
				'label'       => esc_html__( 'Social Media Title', 'avid-magazine' ),
				'description' => esc_html__( 'This will be the label.', 'avid-magazine' ),
				'default'     => '',
			),
			'social_media_link' => array(
				'type'      => 'url',
				'label'     => esc_html__( 'Social Media Links', 'avid-magazine' ),
		        'default'   => '',
			),			
		),
        'row_label' => array(
			'type'  => 'field',
			'value' => esc_html__('Social Media', 'avid-magazine' ),
			'field' => 'social_media_title',
		),                        
	) ) );
	
}
<?php

/**
 * Pagination Settings
 *
 * @package Avid Magazine
 */


add_action( 'customize_register', 'avid_magazine_customize_register_pagination_section' );
function avid_magazine_customize_register_pagination_section( $wp_customize ) {

    $wp_customize->add_section( 'avid_magazine_pagination_section', array(
        'title'          => esc_html__( 'Pagination', 'avid-magazine' ),
        'description'    => esc_html__( 'Pagination :', 'avid-magazine' ),
        'panel'          => 'avid_magazine_general_panel',
        'priority'       => 3,        
    ) );
}

add_action( 'customize_register', 'avid_magazine_customize_pagination' );

function avid_magazine_customize_pagination( $wp_customize ) {

    $wp_customize->add_setting( 'pagination_type', array(
        'capability'  => 'edit_theme_options',        
        'sanitize_callback' => 'avid_magazine_sanitize_choices',
        'default'     => 'ajax-loadmore',
    ) );

    $wp_customize->add_control( new Avid_Magazine_Radio_Buttonset_Control( $wp_customize, 'pagination_type', array(
        'label' => esc_html__( 'Pagination Type :', 'avid-magazine' ),
        'section' => 'avid_magazine_pagination_section',
        'settings' => 'pagination_type',
        'type'=> 'radio-buttonset',
        'choices'     => array(
            'ajax-loadmore' => esc_html__( 'Ajax Loadmore', 'avid-magazine' ),
            'number-pagination'    =>  esc_html__( 'Number Pagination', 'avid-magazine' ),      
        ),
    ) ) );            
    
}
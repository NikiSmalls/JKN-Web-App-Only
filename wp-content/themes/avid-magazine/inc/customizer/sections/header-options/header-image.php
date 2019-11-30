<?php
/**
 * Header Image Settings
 *
 * @package Avid Magazine
 */


add_action( 'customize_register', 'avid_magazine_change_header_image_panel' );

function avid_magazine_change_header_image_panel( $wp_customize)  {
    $wp_customize->get_section( 'header_image' )->priority = 1;
    $wp_customize->get_section( 'header_image' )->panel = 'avid_magazine_header_panel';
}
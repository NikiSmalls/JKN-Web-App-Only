<?php
/**
 * Background Settings
 *
 * @package Avid Magazine
 */


add_action( 'customize_register', 'avid_magazine_change_background_panel' );

function avid_magazine_change_background_panel( $wp_customize)  {
    $wp_customize->get_section( 'background_image' )->priority = 4;
    $wp_customize->get_section( 'background_image' )->panel = 'avid_magazine_general_panel';
}
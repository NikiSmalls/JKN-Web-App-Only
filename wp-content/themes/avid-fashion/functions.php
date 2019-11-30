<?php
function avid_fashion_enqueue_child_styles() {
    wp_enqueue_style(
        'avid-fashion-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'bootstrap' ),
        wp_get_theme()->get('Version') );


}
add_action( 'wp_enqueue_scripts', 'avid_fashion_enqueue_child_styles' );
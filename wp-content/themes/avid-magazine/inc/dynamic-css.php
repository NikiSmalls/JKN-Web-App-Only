<?php
function avid_magazine_dynamic_css() {
    wp_enqueue_style(
        'avid-magazine-dynamic-css', get_template_directory_uri() . '/css/dynamic.css'
    );

        $site_title_color = get_theme_mod( 'site_title_color_option', '#000' );

        $primary_color = get_theme_mod( 'primary_colors', '#999' );
        $secondary_color = get_theme_mod( 'secondary_colors', '#ff0000' );
        $font_color = get_theme_mod( 'font_color', '#333' );
        $menu_font_color = get_theme_mod( 'menu_font_color', '#aaa' );
        $menu_background_color = get_theme_mod( 'menu_background_color', '#ececec' );
        $heading_title_color = get_theme_mod( 'heading_title_color', '#2173ce' );
        $heading_link_color = get_theme_mod( 'heading_link_color', '#ce106d' );
        $button_color = get_theme_mod( 'button_color', '#2173ce' );
        $footer_background_color = get_theme_mod( 'footer_background_color', '#ececec' );

        $font_family = esc_attr( get_theme_mod( 'font_family', 'Montserrat' ) );
        $font_size = esc_attr( get_theme_mod( 'font_size', '14px' ) );
        $font_weight = absint( get_theme_mod( 'avid_magazine_font_weight', 500 ) );
        $line_height = absint( get_theme_mod( 'avid_magazine_line_height', 22 ) );
       
        $site_identity_font_family = esc_attr( get_theme_mod( 'site_identity_font_family', 'Poppins' ) );
        $logo_font_size = absint( get_theme_mod( 'avid_magazine_logo_size', 30 ) );
        $logo_size = absint( $logo_font_size * 2 );
        $header_image_height = absint( get_theme_mod( 'header_image_height', 30 ) );

        $heading_font_family = esc_attr( get_theme_mod( 'heading_font_family', 'Poppins' ) );
        $heading_font_weight = esc_attr( get_theme_mod( 'heading_font_weight', 600 ) );


        $default_size = array(
                '1' =>  32,
                '2' =>  28,
                '3' =>  24,
                '4' =>  21,
                '5' =>  15,
                '6' =>  12,
        );

        for( $i = 1; $i <= 6 ; $i++ ) {
            $heading[$i] = absint( get_theme_mod( 'avid_magazine_heading_' . $i . '_size', absint( $default_size[$i] ) ) );
        }


        $dynamic_css = "
                body{ font: $font_weight $font_size/$line_height"."px $font_family; color: $font_color; }
                header .logo img{ height: {$logo_size}"."px; }
                header .logo h1{ font-size: {$logo_font_size}"."px; font-family: {$site_identity_font_family}; }
                section.top-bar{padding: {$header_image_height}" . "px 0;}
                header .logo h1, header .logo h2{color: $site_title_color !important;}
                
                
                h1{ font: $heading_font_weight {$heading[1]}"."px $heading_font_family }
                h2{ font: $heading_font_weight {$heading[2]}"."px $heading_font_family }
                h3{ font: $heading_font_weight {$heading[3]}"."px $heading_font_family }
                h4{ font: $heading_font_weight {$heading[4]}"."px $heading_font_family }
                h5{ font: $font_weight {$heading[5]}"."px $font_family }
                h6{ font: $font_weight {$heading[6]}"."px $font_family }

                .navbar-nav > li > a {color: $menu_font_color;}

                header .main-nav{background-color: $menu_background_color;}                
                footer.main{background-color: $footer_background_color;}


                /*Heading Title*/
                h1,h2,h3,h4,h5,h6{color: $heading_title_color;}

                /*Heading Link*/
                h2 a, h3 a, h4 a,h2 a:visited, h3 a:visited, h4 a:visited{color: $heading_link_color;}


                
                /* Primary Colors */
                header .navbar-nav .dropdown-menu > li > a:hover{color: $primary_color;}
                h3 a:hover,h4 a:hover{color: $primary_color !important;}
                .pri-bg-color,.dropdown-menu > .active > a, .navbar-nav > .active > a,.navbar-nav > .active > a, .navbar-nav > .active > a:hover,.current-menu-parent,h5.widget-title:after, .section-heading:after{background-color: $primary_color;}

                /* Secondary Colors */
                a,a:visited,a.readmore,button.loadmore{color: $secondary_color;}

                


                /*buttons*/
                header .search-submit,.widget .profile-link,
                .woocommerce #respond input#submit.alt, .woocommerce a.button.alt,
                .woocommerce button.button.alt, .woocommerce input.button.alt,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button,
                .woocommerce input.button,form#wte_enquiry_contact_form input#enquiry_submit_button,#blossomthemes-email-newsletter-626 input.subscribe-submit-626,
                .jetpack_subscription_widget,.widget_search,.search-submit,.widget-instagram .owl-carousel .owl-nav .owl-prev,
                .widget-instagram .owl-carousel .owl-nav .owl-next,.widget_search input.search-submit, .featured-layout h6.category a
                {background-color: $button_color;}

               
        ";
        wp_add_inline_style( 'avid-magazine-dynamic-css', $dynamic_css );
}
add_action( 'wp_enqueue_scripts', 'avid_magazine_dynamic_css' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class();?>>
    <!--//// Start Header ////-->
    <header>
        <nav class="home-nav ">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 top-menu">
                        <div class="header-logo">
                            <?php if(!empty(has_custom_logo())){
                                the_custom_logo();
                            }                           
                            $scroll_logo=get_theme_mod('scroll_logo');
                            $scroll_logo=wp_get_attachment_url($scroll_logo);
                            if($scroll_logo == ''){
                                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                                    $scroll_logo = wp_get_attachment_url( $custom_logo_id , 'full' );
                            }
                            if($scroll_logo != ''){ ?>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="custom-logo-link" rel="home" itemprop="url">
                                    <img class="img-responsive logo-dark" src="<?php echo esc_url($scroll_logo); ?>" alt="<?php esc_attr_e('Logo','child-education'); ?>">
                                </a>
                            <?php }
                            if(get_theme_mod('header_text',true)){
                                echo '<a href='.esc_url( home_url( '/' ) ).' title='.esc_attr( get_bloginfo( 'name', 'display' ) ).' rel="home" alt="'.esc_attr('Menu Style','child-education').'" class="header-logo-tagline" ><h3 class="site-title">'.esc_html(get_bloginfo('name')).'</h3><span class="site-description">'.esc_html(get_bloginfo('description')).'</span></a>';
                                } ?>
                        </div>
                        <div id="cssmenu">
                            <?php $child_education_defaults = array(
                                'theme_location' => 'primary',
                                'container' => 'ul',
                                'items_wrap' => '<ul id="menu-main-menu" class="menu">%3$s</ul>',
                            );
                            wp_nav_menu($child_education_defaults); ?>  
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <!--//// end Header ////-->
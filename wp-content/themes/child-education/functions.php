<?php
function child_education_setup() {
	load_theme_textdomain( 'child-education',get_template_directory() . '/languages' );
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'child-education-blog-image', $width = 460, $height = 245, true );
	
	register_nav_menus( array(
		'primary'    => esc_html__( 'Top Menu', 'child-education' ),
	) );
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
		'flex-height' => true,
		'header-text' => array( 'site-title','site-description'),
	) );
	$child_education_defaults = array(
		'default-image'          => get_template_directory_uri().'/assets/images/blog-bg.jpg',
		'width'                  => 0,
		'height'                 => 0,
		'flex-height'            => 1400,
		'flex-width'             => 800,
		'uploads'                => true,
		'random-default'         => false,
		'header-text'            => false,
		'default-text-color'     => '',
		'wp-head-callback'       => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	);
	register_default_headers( array(
    'default-image' => array(
        'url'           => get_template_directory_uri().'/assets/images/blog-bg.jpg',
        'thumbnail_url' => get_template_directory_uri().'/assets/images/blog-bg.jpg',
        'description'   => __( 'Default Header Image', 'child-education' )
    ),
) );
	add_theme_support( 'custom-header', $child_education_defaults );
	add_filter('siteorigin_widgets_active_widgets', 'child_education_active_widgets');
	function child_education_active_widgets($active){
  	
    //Bundled Widgets
    $active['video'] = true;
    $active['testimonial'] = true;
    $active['taxonomy'] = true;
    $active['social-media-buttons'] = true;
    $active['simple-masonry'] = true;
    $active['slider'] = true;
    $active['cta'] = true;
    $active['contact'] = true;
    $active['features'] = true;
    $active['headline'] = true;
    $active['hero'] = true;
    $active['icon'] = true;
    $active['image-grid'] = true;
    $active['price-table'] = true;
    $active['layout-slider'] = true;
  	$active['key-features-widget'] = true;
  	$active['showcase-image-widget'] = true;
  	return $active;
  }

}
add_action( 'after_setup_theme', 'child_education_setup' );
function child_education_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'child_education_content_width', 640 );
}
add_action( 'after_setup_theme', 'child_education_content_width', 0 );

add_filter('get_custom_logo','child_education_change_logo_class');
function child_education_change_logo_class($html)
{
	$html = str_replace('class="custom-logo"', 'class="img-responsive logo-fixed"', $html);
	$html = str_replace('width=', 'original-width=', $html);
	$html = str_replace('height=', 'original-height=', $html);
	$html = str_replace('class="custom-logo-link"', 'class="img-responsive logo-fixed"', $html);
	return $html;
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function child_education_widgets_init() {
	register_sidebar( array(
		'name'          		=> esc_html__( 'Sidebar', 'child-education' ),
		'id'            		=> 'sidebar-1',
		'description'   		=> esc_html__( 'Add widgets here to appear in your sidebar.', 'child-education' ),
		'before_widget' 		=> '<div id="%1$s" class="widget sidebar-content %2$s">',
		'after_widget'  		=> '</div>',
		'before_title'  		=> '<div class="sidebar-title"><h3>',
		'after_title'   		=> '</h3></div>',
	) );
	register_sidebar( array(
		'name'          		=> __( 'Footer 1', 'child-education' ),
		'id'            		=> 'footer-1',
		'description'			=> esc_html__( 'Add widgets here to appear in your footer.', 'child-education' ),
		'before_widget' 		=> '<div id="%1$s" class="%2$s footer-grid">',
		'after_widget'  		=> '</div>',
		'before_title'  		=> '<h5 class="footer-title">',
		'after_title'   		=> '</h5>',
	) );
	register_sidebar( array(
		'name'          		=> esc_html__( 'Footer 2', 'child-education' ),
		'id'            		=> 'footer-2',
		'description'   		=> esc_html__( 'Add widgets here to appear in your footer.', 'child-education' ),
		'before_widget' 		=> '<div id="%1$s" class="%2$s footer-grid">',
		'after_widget'  		=> '</div>',
		'before_title'  		=> '<h5 class="footer-title">',
		'after_title'   		=> '</h5>',
	) );
	register_sidebar( array(
		'name'          		=> esc_html__( 'Footer 3', 'child-education' ),
		'id'            		=> 'footer-3',
		'description'   		=> esc_html__( 'Add widgets here to appear in your footer.', 'child-education' ),
		'before_widget' 		=> '<div id="%1$s" class="%2$s footer-grid">',
		'after_widget'  		=> '</div>',
		'before_title'  		=> '<h5 class="footer-title">',
		'after_title'   		=> '</h5>',
	) );
	register_sidebar( array(
		'name'          		=> esc_html__( 'Footer 4', 'child-education' ),
		'id'            		=> 'footer-4',
		'description'   		=> esc_html__( 'Add widgets here to appear in your footer.', 'child-education' ),
		'before_widget' 		=> '<div id="%1$s" class="%2$s footer-grid">',
		'after_widget'  		=> '</div>',
		'before_title'  		=> '<h5 class="footer-title">',
		'after_title'   		=> '</h5>',
	) );
}
add_action( 'widgets_init', 'child_education_widgets_init' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 */
function child_education_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}
	return ' &hellip; ';
}
add_filter( 'excerpt_more', 'child_education_excerpt_more' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function child_education_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}	
add_action( 'wp_head', 'child_education_pingback_header' );
add_action( 'admin_menu', 'child_education_admin_menu');
function child_education_admin_menu( ) {
    add_theme_page( __('Pro Feature','child-education'), __('Child Education Pro','child-education'), 'manage_options', 'child-education-pro-buynow', 'child_education_pro_buy_now', 300 ); 
  
}
function child_education_pro_buy_now(){ ?>  
<div class="child_education_pro_version">
	  <a href="<?php echo esc_url('https://hippothemes.com/wordpress-themes/child-education-pro/'); ?>" target="_blank">
	    <img src ="<?php echo esc_url('https://s3.amazonaws.com/hippothemesdotcom/wp-content/uploads/Child-EducationProFree.png') ?>" width="100%" height="auto" />
	  </a>
</div>
<?php }

add_action( 'tgmpa_register', 'child_education_action_tgm_plugin_active_register_required_plugins' );
function child_education_action_tgm_plugin_active_register_required_plugins() {
    if(class_exists('Child_Education_TGM_Plugin_Activation')){
      $plugins = array(
        array(
           'name'      => __('Page Builder by SiteOrigin','child-education'),
           'slug'      => 'siteorigin-panels',
           'required'  => false,
        ),
        array(
           'name'      => __('SiteOrigin Widgets Bundle','child-education'),
           'slug'      => 'so-widgets-bundle',
           'required'  => false,
        ), 
        array(
           'name'      => __('Contact Form 7','child-education'),
           'slug'      => 'contact-form-7',
           'required'  => false,
        ),       
      );
      $config = array(
        'default_path' => '',
        'menu'         => 'PowerPress-install-plugins',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => '',
        'strings'      => array(
           'page_title'                      => __( 'Install Recommended Plugins', 'child-education' ),
           'menu_title'                      => __( 'Install Plugins', 'child-education' ),
           'installing'                      => __( 'Installing Plugin: %s', 'child-education' ), 
           'oops'                            => __( 'Something went wrong with the plugin API.', 'child-education' ),
           'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.','child-education' ), 
           'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.','child-education' ), 
           'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.','child-education' ), 
           'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.','child-education' ), 
           'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.','child-education' ), 
           'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.','child-education' ), 
           'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.','child-education' ), 
           'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.','child-education' ), 
           'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins','child-education' ),
           'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins','child-education' ),
           'return'                          => __( 'Return to Required Plugins Installer', 'child-education' ),
           'plugin_activated'                => __( 'Plugin activated successfully.', 'child-education' ),
           'complete'                        => __( 'All plugins installed and activated successfully. %s', 'child-education' ), 
           'nag_type'                        => 'updated'
        )
      );
      child_education_tgm( $plugins, $config );
    }
}
include get_template_directory().'/inc/enqueues.php';
include_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
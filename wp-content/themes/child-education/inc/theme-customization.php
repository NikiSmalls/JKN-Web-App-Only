<?php
/**
* Customization options
**/
function child_education_customize_register( $wp_customize ) {
  /*------Scroll Logo Option---------*/
$wp_customize->add_setting(
    'scroll_logo',
    array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'scroll_logo', array(
    'section'     => 'title_tagline',
    'label'       => __( 'Upload Scroll Logo' ,'child-education'),
    'description' => __('Logo Size (120 * 60)','child-education'),
    'flex_width'  => true,
    'flex_height' => true,
    'width'       => 120,
    'height'      => 50,
    'priority'    => 10,
    'default-image' => '',
) ) );
$wp_customize->add_setting(
  'logo_height',
  array(
    'default' => 45,
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
  );
$wp_customize->add_control(
  'logo_height',
  array(
    'section' => 'title_tagline',
    'label'      => __('Enter Logo Size', 'child-education'),
    'description' => __("Use if you want to increase or decrease logo size (optional) Don't include `px` in the string. e.g. 20 (default: 10px)",'child-education'),
    'type'       => 'text',
    )
  );
$wp_customize->add_setting('header_fix', array(
        'default' => false,  
        'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('header_fix', array(
      'label'   => esc_html__('Header Fix','child-education'),
      'section' => 'title_tagline',
      'type'    => 'checkbox',
      'priority' => 20
  ));	
  /*----------end---------------*/
  $wp_customize->add_setting(
    'child_education_theme_color',
    array(
      'default'           => '#02b3a2',
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_hex_color',
  ) );
  $wp_customize->add_control(
    new WP_Customize_Color_Control( $wp_customize,
      'child_education_theme_color',
      array(
        'label'   => esc_html__( 'Theme Color', 'child-education' ),
        'section' => 'colors',
      )
  ) );
  $wp_customize->add_setting(
    'child_education_secondary_color',
    array(
      'default'           => '#29335c',
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_hex_color',
  ) );
  $wp_customize->add_control(
    new WP_Customize_Color_Control( $wp_customize,
      'child_education_secondary_color',
      array(
        'label'   => esc_html__( 'Secondary Theme Color', 'child-education' ),
        'section' => 'colors',
      )
  ) );
  $wp_customize->add_panel(
    'footer',
    array(
        'title' => esc_html__( 'Footer', 'child-education' ),
        'description' => esc_html__('Footer options','child-education'),
        'priority' => 120, 
    )
);
$wp_customize->add_section( 
  'footer_copyright_section' , 
  array(
    'title'       => esc_html__( 'Copyright Area', 'child-education' ),
    'priority'    => 32,
    'capability'     => 'edit_theme_options',
    'panel' => 'footer'
) );

$wp_customize->add_setting(
    'footer_copyright_text',
    array(
        'default' => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'wp_kses_post',
        'priority' => 20, 
    )
);
$wp_customize->add_control(
    'footer_copyright_text',
    array(
        'section' => 'footer_copyright_section',                
        'label'   => esc_html__('Your Copyright Text','child-education'),
        'type'    => 'textarea',
    )
);
$wp_customize->add_section( 'footer_widget_area' , array(
    'title'       => __( 'Footer Widget Area', 'child-education' ),
    'priority'    => 135,
    'capability'     => 'edit_theme_options',
    'panel' => 'footer'
) );
$wp_customize->add_setting(
  'hide_footer_widget_bar',
  array(
      'default' => '1',
      'capability'     => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_text_field',
      'priority' => 20, 
  )
);
$wp_customize->add_control(
  'hide_footer_widget_bar',
  array(
    'section' => 'footer_widget_area',                
    'label'   => __('Hide Widget Area','child-education'),
    'type'    => 'select',
    'choices' => array(
        "1"   => esc_html__( "Show", 'child-education' ),
        "2"   => esc_html__( "Hide", 'child-education' ),
    ),
  )
);
$wp_customize->add_setting(
  'footer_widget_style',
  array(
      'default' => '3',
      'capability'     => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_text_field',
      'priority' => 20, 
  )
);
$wp_customize->add_control(
  'footer_widget_style',
  array(
      'section' => 'footer_widget_area',                
      'label'   => __('Select Widget Area','child-education'),
      'type'    => 'select',
      'choices'        => array(
          "1"   => esc_html__( "2 column", 'child-education' ),
          "2"   => esc_html__( "3 column", 'child-education' ),
          "3"   => esc_html__( "4 column", 'child-education' )
      ),
  )
);
  $wp_customize->add_section(
    'child_education_footer_socials',
    array(
      'title' => esc_html__('Social Accounts','child-education'),
      'description' => __( 'In first input box, you need to add Font Awesome class which you can find <a target="_blank" href="https://fontawesome.bootstrapcheatsheets.com/">here</a>. For example ( <b>fa-facebook</b> ) and in second input box, you need to add your social media profile URL.<br /> Leave it empty to hide the icon.' , 'child-education'),
      'panel' => 'footer',
      'priority' => 25
    )
  );
  $child_education_social_icon = array();
  for($i=1;$i <= 5;$i++):  
    $child_education_social_icon[] =  array( 'slug'=>sprintf('child_education_social_icon%d',$i),   
      'default' => '',   
      'label' => sprintf(esc_html__( 'Social Account %s', 'child-education' ),$i),   
      'priority' => sprintf('%d',$i) );  
  endfor;
  foreach($child_education_social_icon as $child_education_social_icons){
    $wp_customize->add_setting(
      $child_education_social_icons['slug'],
      array(
        'default' => '',
        'capability'     => 'edit_theme_options',
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
      )
    );
    $wp_customize->add_control(
      $child_education_social_icons['slug'],
      array(
        'type'  => 'text',
        'section' => 'child_education_footer_socials',
        'input_attrs' => array( 'placeholder' => esc_attr__('Enter Icon','child-education') ),
        'label'      =>   $child_education_social_icons['label'],
        'priority' => $child_education_social_icons['priority']
      )
    );
  }
  $child_education_social_link = array();
  for($i=1;$i <= 5;$i++):  
    $child_education_social_link[] =  array( 'slug'=>sprintf('child_education_social_link%d',$i),   
      'default' => '',   
      'label' => sprintf(esc_html__( 'Social Link %s', 'child-education' ),$i),   
      'priority' => sprintf('%d',$i) );  
  endfor;
  foreach($child_education_social_link as $child_education_social_icons){
    $wp_customize->add_setting(
      $child_education_social_icons['slug'],
      array(
        'default' => '',
        'capability'     => 'edit_theme_options',
        'type' => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
      )
    );
    $wp_customize->add_control(
      $child_education_social_icons['slug'],
      array(
        'type'  => 'text',
        'section' => 'child_education_footer_socials',
        'priority' => $child_education_social_icons['priority'],
        'input_attrs' => array( 'placeholder' => esc_html__('Enter URL','child-education')),
      )
    );
  }
}
add_action( 'customize_register', 'child_education_customize_register' );
/**
 * Add Dynamic styling from theme
 */
function child_education_dynamic_styles() {
    wp_enqueue_script('child-education-menu-js',get_template_directory_uri().'/assets/js/menu.js', array('jquery'), null, true);
    wp_enqueue_style( 'child-education-style', get_stylesheet_uri(), array());
        $custom_css='';
        
        if(has_header_image()){
         
          $url = get_header_image();
          $custom_css .= ".blog-wrap{background-image:url(".esc_url_raw($url).");}";
      }

      $custom_css .= "*::selection,.footer-grid option,.sidebar-content ul li:hover:before,.sidebar-post-image a,.sidebar-section .tagcloud a.tag-cloud-link:hover,.footer-grid .tagcloud a.tag-cloud-link:hover,.wpcf7-submit:hover,.comment-form input[type='submit']:hover,.comment-form input[type='submit']:focus,.footer-grid option,.footer-grid #wp-calendar caption,.textwidget a.tag-box:hover,.sub-footer, #cssmenu ul ul li:hover > a,#cssmenu ul ul li a:hover, .home-nav.fixed-header, .btn-default:hover{background:".esc_attr(get_theme_mod('child_education_theme_color','#02b3a2')).";}
      .blog-title h2 b,a.page-numbers:after,.sidebar-title h3,blockquote,#cssmenu > ul > li.has-sub:hover > a::after, .btn-default:hover{border-color: ".esc_attr(get_theme_mod('child_education_theme_color','#02b3a2')).";}
      .blog-title h2 ul li a:hover,.post-content a.read-more:hover,.current,a.page-numbers:focus,a.page-numbers:hover,.sidebar-content ul li a:hover,.footer-grid ul li a:hover,#wp-calendar td#today,#wp-calendar tbody td a,#wp-calendar tfoot td a,.sidebar-post-text a:hover,.sidebar-post-text span,.single-content h1 a,.single-content h4.post-tag a:hover,.comment-area .reply a,.comment-respond a:hover,.comment-respond p,.single-content h4.post-tag a[rel='tag']:hover,.single-content h4.post-category a:hover,.nav-links .nav-previous a:hover,.nav-links .nav-next a:hover,.textwidget ul li a:hover, .post-content h1.blog-post-title a, #cssmenu > ul > li:hover > a, #cssmenu > ul > li.active > a,#cssmenu ul ul li a{color: ".esc_attr(get_theme_mod('child_education_theme_color','#02b3a2')).";}
      .blackMenu #cssmenu ul li a, .post-content h2 a, .comment-area .comment-author b a, .comment-area .comment-date a :hover, .copy-right-text p a:hover,.footer-social-icon ul li a:hover{color: ".esc_attr(get_theme_mod('child_education_secondary_color','#29335c')).";}
      .footer-wrap,.sidebar-title h3,.comment-form input[type='submit'], .wpcf7-submit, #wp-calendar caption{background: ".esc_attr(get_theme_mod('child_education_secondary_color','#29335c')).";  }";
        $logo_height = (get_theme_mod('logo_height'))?(get_theme_mod('logo_height')):55;
        $custom_css .=".header-logo .logo-fixed img, .header-logo .custom-logo-link .logo-dark {
          max-height: ".esc_attr($logo_height)."px;
        }
        .blog-wrap{  background-color:".esc_attr(get_theme_mod('child_education_secondary_color','#29335c'))."; }
        ";
        $custom_css .="@media (max-width: 1024px) {
          #cssmenu ul ul li a {color: ".esc_attr(get_theme_mod('child_education_secondary_color','#29335c')).";}
          #cssmenu ul {background: ".esc_attr(get_theme_mod('child_education_theme_color','#02b3a2')).";}
        }";

        wp_add_inline_style( 'child-education-style', $custom_css );
        $header_fix = get_theme_mod('header_fix',0);
        $script_js = '';
        if($header_fix == 1){
 			$script_js.="jQuery(window).scroll(function() { if (jQuery(window).scrollTop()> 50) {jQuery('.home-nav').addClass('fixed-header', 1000, 'easeInOutSine');jQuery('.default-heading').removeClass('default-heading-fixed', 1000, 'easeInOutSine');} else {  jQuery('.home-nav').removeClass('fixed-header', 1000, 'easeInOutSine');}});";	        
        }
        wp_add_inline_script( 'child-education-menu-js', $script_js );
}		
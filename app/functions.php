<?php
// Include Kirki for customizer options and global content
require_once get_template_directory() . '/inc/kirki/include-kirki.php';

// Enqueue a script with jQuery as a dependency.
function include_flyrbord_scripts() {
    // Theme scripts
    wp_enqueue_script( 'flyrbord-scripts', get_template_directory_uri() . '/js/bundle.js', array( 'jquery' ) );

    // Theme stylesheets
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_style( 'flyrbord-style', get_template_directory_uri() . '/css/bundle.css' );
}
add_action( 'wp_enqueue_scripts', 'include_flyrbord_scripts' );

// Add theme support for basic wp features
add_theme_support( 'menus' );
add_theme_support( 'custom-logo' );
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );
add_theme_support( 'html5', array( 'search-form' ) );

// Add woo commerce support
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

// If shop sidebar has widgets, update the number of products
// displayed per row to 3
if ( is_active_sidebar( 'shop_sidebar' ) ) {
  // Change number or products per row to 3
  add_filter('loop_shop_columns', 'loop_columns');
  if (!function_exists('loop_columns')) {
    function loop_columns() {
      return 3; // 3 products per row
    }
  }
}

// Add custom image sizes
add_image_size( 'post-listing', 900, 506, true );
add_image_size( 'menu-logo', 120, 120, false );

// Create theme menu locations
register_nav_menus( array(
	'main_navigation_menu' => 'Main Navigation Menu',
) );

// Include Kirki customizer fields and options
require_once( get_template_directory() . '/inc/kirki/custom-fields.php' );

// Include better comments file
require_once( get_template_directory() .'/inc/template-partials/post-comments.php' );

// Include woo commerce hooks
require_once( get_template_directory() . '/inc/woocommerce/hooks.php' );

// Register theme widget areas
function flyrbord_widgets_init() {

	register_sidebar( array(
		'name'          => 'Footer',
		'id'            => 'footer',
		'before_widget' => '<div class="footer-widget col-sm-12 center-block">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

  register_sidebar( array(
    'name'          => 'Blog Sidebar',
    'id'            => 'blog_sidebar',
    'before_widget' => '<div class="col-sm-12 blog-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
  ) );

  register_sidebar( array(
    'name'          => 'Shop Sidebar',
    'id'            => 'shop_sidebar',
    'before_widget' => '<div class="col-sm-12 shop-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
  ) );
}

add_action( 'widgets_init', 'flyrbord_widgets_init' );

// Remove static front page option from customizer
add_action('customize_register', 'themename_customize_register');
function themename_customize_register($wp_customize) {
  $wp_customize->remove_section( 'static_front_page' );
}

// Remove additional css option from customizer
function mycustomfunc_remove_css_section( $wp_customize ) {
	$wp_customize->remove_section( 'custom_css' );
}
add_action( 'customize_register', 'mycustomfunc_remove_css_section', 15 );

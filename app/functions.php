<?php
/**
 * Enqueue a script with jQuery as a dependency.
 */
function include_hugoandlily_scripts() {
    // These scripts
    wp_enqueue_script( 'hugoandlily-scripts', get_template_directory_uri() . '/js/main.js', array( 'jquery' ) );

    // Theme stylesheets
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_style( 'hugoandlily-style', get_template_directory_uri() . '/css/main.css' );
}
add_action( 'wp_enqueue_scripts', 'include_hugoandlily_scripts' );

/**
 * Add theme support for basic features
 */
 add_theme_support( 'menus' );
 add_theme_support( 'custom-logo' );
 add_theme_support( 'wc-product-gallery-zoom' );
 add_theme_support( 'wc-product-gallery-lightbox' );
 add_theme_support( 'wc-product-gallery-slider' );

/**
 * Add Qoo Commerce support
 */
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

/**
 * Add Custom image sizes
 */
add_image_size( 'menu-logo', 120, 120, false );


/**
 * Create custom menu locations
 */
register_nav_menus( array(
	'main_navigation_menu' => 'Main Navigation Menu',
) );

/**
 * Register widget areas
 *
 */
function hugoandlily_widgets_init() {

	register_sidebar( array(
		'name'          => 'Footer Left',
		'id'            => 'footer_left',
		'before_widget' => '<div class="footer-widget-container">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

  register_sidebar( array(
    'name'          => 'Footer Center',
    'id'            => 'footer_center',
    'before_widget' => '<div class="footer-widget-container">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
  ) );

  register_sidebar( array(
    'name'          => 'Footer Right',
    'id'            => 'footer_right',
    'before_widget' => '<div class="footer-widget-container">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
  ) );

}
add_action( 'widgets_init', 'hugoandlily_widgets_init' );

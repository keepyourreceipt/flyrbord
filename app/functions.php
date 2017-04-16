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

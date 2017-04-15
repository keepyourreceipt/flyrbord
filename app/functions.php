<?php
/**
 * Enqueue a script with jQuery as a dependency.
 */
function include_hugoandlily_scripts() {
    wp_enqueue_script( 'hugoandlily-scripts', get_template_directory_uri() . '/js/main.js', array( 'jquery' ) );

    wp_enqueue_style( 'style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'include_hugoandlily_scripts' );


add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

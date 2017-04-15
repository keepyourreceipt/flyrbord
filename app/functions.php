<?php
/**
 * Enqueue a script with jQuery as a dependency.
 */
function include_hugoandlily_scripts() {
    wp_enqueue_script( 'hugoandlily-scripts', get_template_directory_uri() . '/js/main.js', array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'include_hugoandlily_scripts' );

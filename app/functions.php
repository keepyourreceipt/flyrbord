<?php
/**
 * Enqueue a script with jQuery as a dependency.
 */
function include_flyrbord_scripts() {
    wp_enqueue_script( 'flyrbord-scripts', get_template_directory_uri() . '/js/main.js', array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'include_flyrbord_scripts' );

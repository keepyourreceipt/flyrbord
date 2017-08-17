<?php
/**
 * Include Kirki for customizer options and global content
 */
require_once get_template_directory() . '/inc/kirki/include-kirki.php';

/**
 * Enqueue a script with jQuery as a dependency.
 */
function include_flyrbord_scripts() {
    // These scripts
    wp_enqueue_script( 'flyrbord-scripts', get_template_directory_uri() . '/js/bundle.js', array( 'jquery' ) );

    // Theme stylesheets
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_style( 'flyrbord-style', get_template_directory_uri() . '/css/bundle.css' );
}
add_action( 'wp_enqueue_scripts', 'include_flyrbord_scripts' );

/**
 * Add theme support for basic features
 */
 add_theme_support( 'menus' );
 add_theme_support( 'custom-logo' );
 add_theme_support( 'wc-product-gallery-zoom' );
 add_theme_support( 'wc-product-gallery-lightbox' );
 add_theme_support( 'wc-product-gallery-slider' );

add_image_size( 'post-listing', 900, 506, true );

// Clear checkout floats
function clearfix() {
  echo "<div style='clear: both;'></div>";
}
add_action( 'woocommerce_after_checkout_form', 'clearfix' );

// Wrap checkout columns in containing divs
function wrap_woocommerce_checkout_form() {
  echo "<div class='woocommerce-checkout-form-column col-sm-6'>";
}
add_action( 'woocommerce_checkout_before_customer_details', 'wrap_woocommerce_checkout_form' );
add_action( 'woocommerce_checkout_after_customer_details', 'clearfix' );
add_action( 'woocommerce_checkout_after_customer_details', 'output_closing_div_tag' );

add_action( 'woocommerce_checkout_after_customer_details', 'wrap_woocommerce_checkout_form' );
add_action( 'woocommerce_checkout_after_order_review', 'output_closing_div_tag' );

// Wrap woocommerce checout form in containing div
function start_checkout_form_wrap() {
  echo "<div class='woocommerce-checkout-form row'>";
}
add_action( 'woocommerce_before_checkout_form', 'start_checkout_form_wrap' );
add_action( 'woocommerce_after_checkout_form', 'output_closing_div_tag' );


// Adjust login form column width
function start_login_form_wrap() {
  echo "<div class='col-sm-6 col-sm-offset-3 woocommerce-login-form'>";
}
add_action( 'woocommerce_before_customer_login_form', 'start_login_form_wrap' );
add_action( 'woocommerce_after_customer_login_form', 'output_closing_div_tag' );

function start_small_column_wrap() {
  echo "<div class='col-sm-10 col-sm-offset-1'>";
}
add_action( 'woocommerce_before_cart', 'start_small_column_wrap' );


function output_closing_div_tag() {
  echo "</div>";
}
add_action( 'woocommerce_after_cart', 'output_closing_div_tag' );

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

}
add_action( 'widgets_init', 'flyrbord_widgets_init' );


// Remove woo commerce skus
function sv_remove_product_page_skus( $enabled ) {
    if ( ! is_admin() && is_product() ) {
        return false;
    }

    return $enabled;
}
add_filter( 'wc_product_sku_enabled', 'sv_remove_product_page_skus' );

add_action( 'woocommerce_after_shop_loop_item', 'remove_add_to_cart_buttons', 1 );

   function remove_add_to_cart_buttons() {
     if( is_product_category() || is_shop()) {
       remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
     }
   }

// Change number or products per row to 3
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 4; // 3 products per row
	}
}

if(class_exists('Kirki')) {
  Kirki::add_config( 'flyrbord', array(
  	'capability'    => 'edit_theme_options',
  	'option_type'   => 'theme_mod',
  ) );

  Kirki::add_section( 'top_bar', array(
      'title'          => __( 'Top Bar' ),
      'description'    => __( 'Manage content displayed above the main menu' ),
      'panel'          => '', // Not typically needed.
      'priority'       => 20,
      'capability'     => 'edit_theme_options',
      'theme_supports' => '', // Rarely needed.
  ) );

  Kirki::add_field( 'flyrbord', array(
    'type'        => 'toggle',
  	'settings'    => 'show_top_bar',
  	'label'       => __( 'Show bar above main menu', 'flyrbord' ),
  	'section'     => 'top_bar',
  	'default'     => '1',
  	'priority'    => 10,
  ) );

  Kirki::add_field( 'flyrbord', array(
  	'type'     => 'text',
  	'settings' => 'announcement_text',
  	'label'    => __( 'Special Announcement', 'flyrbord' ),
  	'section'  => 'top_bar',
  	'default'  => esc_attr__( '', 'flyrbord' ),
  	'priority' => 10,
  ) );


  Kirki::add_section( 'social_media', array(
      'title'          => __( 'Social Media' ),
      'description'    => __( 'Add / edit links to your social media accounts. Note: to remove an account, leave the field empty' ),
      'panel'          => '', // Not typically needed.
      'priority'       => 160,
      'capability'     => 'edit_theme_options',
      'theme_supports' => '', // Rarely needed.
  ) );

  Kirki::add_field( 'flyrbord', array(
    'type'     => 'text',
    'settings' => 'facebook_account_link',
    'label'    => __( 'Facebook', 'flyrbord' ),
    'section'  => 'social_media',
    'default'  => esc_attr__( '', 'flyrbord' ),
    'priority' => 10,
  ) );

  Kirki::add_field( 'flyrbord', array(
    'type'     => 'text',
    'settings' => 'twitter_account_link',
    'label'    => __( 'Twitter', 'flyrbord' ),
    'section'  => 'social_media',
    'default'  => esc_attr__( '', 'flyrbord' ),
    'priority' => 10,
  ) );

  Kirki::add_field( 'flyrbord', array(
    'type'     => 'text',
    'settings' => 'pinterest_account_link',
    'label'    => __( 'Pinterest', 'flyrbord' ),
    'section'  => 'social_media',
    'default'  => esc_attr__( '', 'flyrbord' ),
    'priority' => 10,
  ) );

  Kirki::add_field( 'flyrbord', array(
    'type'     => 'text',
    'settings' => 'instagram_account_link',
    'label'    => __( 'Instagram', 'flyrbord' ),
    'section'  => 'social_media',
    'default'  => esc_attr__( '', 'flyrbord' ),
    'priority' => 10,
  ) );

  Kirki::add_field( 'flyrbord', array(
    'type'     => 'text',
    'settings' => 'linkedin_account_link',
    'label'    => __( 'LinkedIn', 'flyrbord' ),
    'section'  => 'social_media',
    'default'  => esc_attr__( '', 'flyrbord' ),
    'priority' => 10,
  ) );

  Kirki::add_section( 'contact_info', array(
      'title'          => __( 'Contact Info' ),
      'description'    => __( 'Add / edit company contact info' ),
      'panel'          => '', // Not typically needed.
      'priority'       => 220,
      'capability'     => 'edit_theme_options',
      'theme_supports' => '', // Rarely needed.
  ) );

  Kirki::add_field( 'flyrbord', array(
    'type'     => 'text',
    'settings' => 'phone_number',
    'label'    => __( 'Phone Number', 'flyrbord' ),
    'section'  => 'contact_info',
    'default'  => esc_attr__( '', 'flyrbord' ),
    'priority' => 10,
  ) );

  Kirki::add_field( 'flyrbord', array(
    'type'     => 'text',
    'settings' => 'public_email',
    'label'    => __( 'Public Email', 'flyrbord' ),
    'section'  => 'contact_info',
    'default'  => esc_attr__( '', 'flyrbord' ),
    'priority' => 10,
  ) );
}

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

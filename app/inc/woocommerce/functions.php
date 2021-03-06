<?php

/***********************************************************
* Customize Woocommerce output and options
************************************************************/

// Display three items on WooCommerce product archive templates
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
  function loop_columns() {
    return 3;
  }
}

// Customize WooCommerce no shipping method checkout notification text
add_filter( 'woocommerce_no_shipping_available_html', 'my_custom_no_shipping_message' );
add_filter( 'woocommerce_cart_no_shipping_available_html', 'my_custom_no_shipping_message' );
function my_custom_no_shipping_message( $message ) {
	return __( 'Delivery is available to select ZIP codes in NH and MA. Full list of the ZIP codes on <a href="/delivery-area">our delivery area</a> page.' );
}

// Remove the sorting dropdown from Woocommerce
remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_catalog_ordering', 30 );

// Removes showing results
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

// Remove woo commerce skus
function sv_remove_product_page_skus( $enabled ) {
    if ( ! is_admin() && is_product() ) {
        return false;
    }
    return $enabled;
}

// Add custom button label text on product archive page
add_filter( 'woocommerce_product_add_to_cart_text', 'woo_archive_custom_cart_button_text' );
function woo_archive_custom_cart_button_text() {
    return __( 'Select Options', 'woocommerce' );
}

// Remove SKU number from product page(s)
add_filter( 'wc_product_sku_enabled', 'sv_remove_product_page_skus' );

// Remove page title from shop pages
add_filter( 'woocommerce_show_page_title' , 'hide_page_title' );
function hide_page_title() {
	return false;
}

// Force woocommerce button to use permalink URL vs. AJAX add to cart
if ( ! function_exists('woocommerce_template_loop_add_to_cart') ) {
  function woocommerce_template_loop_add_to_cart() {
    global $product;
    echo '<a href="'. get_permalink() .'" rel="nofollow" class="button product_type_variable add_to_cart_button">More Info</a>';
 }
}

/***********************************************************
* Custom markup and section wrappers
************************************************************/

// Wrap checkout columns in containing divs
function wrap_woocommerce_checkout_form() {
  echo "<div class='woocommerce-checkout-form-column col-sm-6'>";
}

// Wrap woocommerce checout form in containing div
function start_checkout_form_wrap() {
  echo "<div class='woocommerce-checkout-form row'>";
}

// Adjust login form column width
function start_login_form_wrap() {
  echo "<div class='col-sm-6 col-sm-offset-3 woocommerce-login-form'>";
}

// Display shop sidebar
function shop_sidebar() {
  dynamic_sidebar( 'shop_sidebar' );
}

// Add openning div with class row
function row() {
  echo "<div class='row'>";
}

// Add bootstrap grid classes
function col_sm_12() {
  echo "<div class='col-sm-12'>";
}

function col_sm_8() {
  echo "<div class='col-sm-8'>";
}

function col_sm_8_has_sidebar() {
  echo "<div class='col-sm-8 has-sidebar'>";
}

function col_sm_6() {
  echo "<div class='col-sm-6'>";
}

function col_sm_4() {
  echo "<div class='col-sm-4'>";
}

// Utility - clear floats
function clearfix() {
  echo "<div style='clear: both;'></div>";
}

// Utility - add closing div
function closing_div() {
  echo "</div>";
}

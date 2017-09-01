<?php

// Change "shipping" to "delivery" in woo commerce checkout
add_filter('gettext', 'translate_reply');
add_filter('ngettext', 'translate_reply');

function translate_reply($translated) {
  $translated = str_ireplace('Shipping', 'Delivery', $translated);
  return $translated;
}

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
  echo "<div class='col-sm-12'>";
}
add_action( 'woocommerce_before_cart', 'start_small_column_wrap' );


function output_closing_div_tag() {
  echo "</div>";
}
add_action( 'woocommerce_after_cart', 'output_closing_div_tag' );

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

<?php

/***********************************************************
* Customize Woocommerce output and options
************************************************************/

// If has shop sidebar, set number of products per row to 3
if ( is_active_sidebar( 'shop_sidebar' ) ) {
  add_filter('loop_shop_columns', 'loop_columns');
  if (!function_exists('loop_columns')) {
    function loop_columns() {
      return 3;
    }
  }
}

// Remove woo commerce skus
function sv_remove_product_page_skus( $enabled ) {
    if ( ! is_admin() && is_product() ) {
        return false;
    }
    return $enabled;
}

// Remove add to cart buttons on the product page(s)
function remove_add_to_cart_buttons() {
  if( is_product_category() || is_shop()) {
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
  }
}


/***********************************************************
* Custom markup and section wrappers
************************************************************/

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

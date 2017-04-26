<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="main-menu container-fluid">
      <div class="row">
        <div class="container">
          <div class="row">
            <div class="main-menu-logo col-xs-6 col-sm-6 col-md-3">
              <?php
                if ( get_theme_mod( 'custom_logo' ) ) {
                  $custom_logo_id = get_theme_mod( 'custom_logo' );
                  $image = wp_get_attachment_image_src( $custom_logo_id , 'menu-logo' );
                  ?>
                  <a href="<?php echo get_home_url(); ?>">
                    <img class="menu-logo" src="<?php echo $image[0]; ?>" alt="Logo">
                  </a>
                <?php } ?>
              </div>
              <div class="main-menu-items col-sm-9 hidden-xs hidden-sm">
                <?php wp_nav_menu( array(
                    'theme_location' => 'main_navigation_menu',
                    'container'=> false,
                    'fallback_cb' => 'default_header_nav'
                  )); ?>
                <?php
                  global $woocommerce;
                  $cart_url = $woocommerce->cart->get_cart_url();
                ?>
                <span class="cart-divider">&nbsp;|&nbsp;</span>
                <a href="<?php echo $cart_url; ?>">
                  <span class="glyphicon glyphicon-shopping-cart"></span>
                  <?php
                    $products_in_cart = $woocommerce->cart->cart_contents;
                    $product_count = count( $products_in_cart );
                  ?>
                  <span>
                    <?php echo $product_count; ?>
                  </span>
                </a>
              </div>
              <div class="mobile-menu-toggle open col-xs-6 col-sm-6 visible-xs visible-sm">
                <span>MENU</span>&nbsp;<span class="glyphicon glyphicon-menu-hamburger"></span>
              </div>
          </div>
        </div>
      </div>
    </div>

    <div class="mobile-menu visible-xs visible-sm">
      <div class="mobile-menu-toggle close">
        <span>CLOSE</span>&nbsp;<span class="glyphicon glyphicon-remove"></span>
      </div>
      <h4>Menu</h4>
      <?php wp_nav_menu( array( 'theme_location' => 'main_navigation_menu', 'fallback_cb' => 'default_header_nav') ); ?>
    </div>

    <div class="page-content">
      <div class="container">

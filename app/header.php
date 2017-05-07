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

    <div class="pre-loader" style="display: block; position: fixed; top: 0px; left: 0px; width: 100vw; height: 100vh; background: #fff; z-index: 999;"></div>

    <div class="announcement-bar container-fluid">
      <div class="row">
        <div class="container">
          <div class="row">
            <?php $announcement_text = get_theme_mod( 'announcement_text', '' ); ?>
            <?php if ( $announcement_text ) { ?>
              <div class="col-sm-6">
                <p><?php echo $announcement_text; ?></p>
              </div>
            <?php } ?>
            <?php if ( $announcement_text ) {
              $contact_classes = "col-sm-6 text-right hidden-xs hidden-sm";
            } else {
              $contact_classes = "col-sm-12 text-right hidden-xs hidden-sm";
            } ?>
            <div class="<?php echo $contact_classes; ?>">
              <a href="mailto:info@example.com">sales@example.com</a>
              <a href="tel:5555555555">555-555-5555</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="main-menu container-fluid">
      <div class="row">
        <div class="container">
          <div class="row">
            <div class="main-menu-logo col-xs-6 col-sm-6 col-md-2">
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
              <div class="main-menu-items col-sm-8 hidden-xs hidden-sm center-text">
                <?php wp_nav_menu( array(
                    'theme_location' => 'main_navigation_menu',
                    'container'=> false,
                    'fallback_cb' => 'default_header_nav'
                  )); ?>
              </div>
              <div class="main-menu-tools hidden-xs hidden-sm col-sm-2 text-right">
                <?php
                  global $woocommerce;
                  $cart_url = $woocommerce->cart->get_cart_url();
                ?>
                <a href="<?php echo $cart_url; ?>">
                  <span class="glyphicon glyphicon-shopping-cart"></span>
                  <?php
                    $products_in_cart = $woocommerce->cart->cart_contents;
                    $product_count = count( $products_in_cart );
                  ?>
                  <span>
                    (<?php echo $product_count; ?>)
                  </span>
                </a>
                <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">
                  <span class="glyphicon glyphicon-user"></span>
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

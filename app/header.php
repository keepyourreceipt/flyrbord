<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <div class="pre-loader" style="display: block; position: fixed; top: 0px; left: 0px; width: 100vw; height: 100vh; background: #fff; z-index: 999;"></div>

    <div class="container-fluid announcement-bar">
      <div class="row">
        <div class="container">
          <div class="row">
            <?php $announcement_text = get_theme_mod( 'announcement_text', '' ); ?>
            <?php if ( $announcement_text ) { ?>
              <div class="col-xs-12 content">
                <p><?php echo $announcement_text; ?></p>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>

    <div class="main-menu container-fluid">
      <div class="row">
        <div class="container">
          <div class="row content">
            <div class="main-menu-logo col-xs-6 col-sm-6 col-md-2 navigation-logo">
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
              <div class="main-menu-items col-sm-8 hidden-xs hidden-sm center-text navigation-links">
                <?php wp_nav_menu( array(
                    'theme_location' => 'main_navigation_menu',
                    'container'=> false,
                    'fallback_cb' => 'default_header_nav'
                  )); ?>
              </div>
              <div class="col-sm-2 text-right navigation-search">
                <span>Search&nbsp;<i class="fa fa-search" aria-hidden="true"></i></span>
              </div>
              <div class="mobile-menu-toggle open col-xs-6 col-sm-6 visible-xs visible-sm">
                <i class="fa fa-circle-o" aria-hidden="true"></i>&nbsp;<span>MENU</span>
              </div>
          </div>
        </div>
      </div>
    </div>

    <div class="navigation-search-form">
      <?php // get_search_form(); ?>
    </div>

    <div class="mobile-menu visible-xs visible-sm">
      <div class="mobile-menu-toggle close">
        <span>CLOSE</span>&nbsp;<i class="fa fa-times" aria-hidden="true"></i>
      </div>
      <h4>Menu</h4>
      <?php wp_nav_menu( array( 'theme_location' => 'main_navigation_menu', 'fallback_cb' => 'default_header_nav') ); ?>
    </div>

    <div class="page-content">
      <div class="container">

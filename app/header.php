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
            <div class="main-menu-logo col-sm-3">
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
              <div class="main-menu-items col-sm-9">
                <?php wp_nav_menu( array( 'theme_location' => 'main_navigation_menu', 'fallback_cb' => 'default_header_nav') ); ?>
              </div>
          </div>
        </div>
      </div>
    </div>

    <div class="page-content">
      <div class="container">

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

    <div class="menu">
      <?php
        if ( get_theme_mod( 'custom_logo' ) ) {
          $custom_logo_id = get_theme_mod( 'custom_logo' );
          $image = wp_get_attachment_image_src( $custom_logo_id , 'menu-logo' );
          ?>
          <div class="menu-logo-container">
            <img class="menu-logo" src="<?php echo $image[0]; ?>" alt="Logo">
          </div>
        <?php } ?>

        <?php
      	wp_nav_menu(array(
      		'theme_location' => 'main_navigation_menu',
      		'container' => "div",
          'container_class' => "menu-items-container",
      		'menu_class' => 'menu-items',
      		'fallback_cb' => 'default_header_nav',
      	));
      ?>
    </div>

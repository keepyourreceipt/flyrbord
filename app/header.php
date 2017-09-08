<!doctype html>
<html class="no-js" lang="">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <title><?php wp_title( '|', true, 'right' ); ?></title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <?php get_template_part('inc/elementor/global', 'font-support'); ?>
    <?php get_template_part('inc/elementor/global', 'color-support'); ?>

    <div class="pre-loader" style="display: block; position: fixed; top: 0px; left: 0px; width: 100vw; height: 100vh; background: #fff; z-index: 999;"></div>
    <?php
      if (
        // Check if values exist for top bar elements
        get_theme_mod( 'announcement_text', '' ) ||
        get_theme_mod( 'phone_number', '' ) ||
        get_theme_mod( 'public_email', '' ) ) {
          // Include top bar template
          get_template_part( 'inc/template-partials/top', 'bar' );
        }

      // Include navigation template
      get_template_part( 'inc/template-partials/default', 'navigation' );
    ?>

    <!-- Begin main page content -->
    <main class="page-content">
      <div class="container">

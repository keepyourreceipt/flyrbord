<?php global $WooCommerceIsActive; ?>
<div class="main-menu color-scheme-<?php echo get_theme_mod( 'menu_color_scheme', '' ); ?>">
  <div class="content">

    <!-- <div class="mobile-menu-toggle">
      <i class="fa fa-align-left" aria-hidden="true"></i>
    </div> -->

    <div class="logo">
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

    <?php wp_nav_menu( array(
      'theme_location' => 'main_navigation_menu',
      'fallback_cb' => 'default_header_nav',
      'container' => 'div',
      'container_class' => 'links',
      // 'walker' => new Flyrbord_Desktop_Nav_Walker()
    )); ?>

    <div class="tools">
      <?php
      // Check if WooCommerce is active
      if ( $WooCommerceIsActive ) { ?>

        <?php if ( is_user_logged_in() ) { ?>
          <a class="logout" href="<?php echo wp_logout_url( home_url() ); ?>">
            <span>Logout</span>
          </a>
        <?php } else { ?>
          <a class="login" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">
            <span>Login</span>
          </a>
        <?php } ?>

        <a href="<?php echo wc_get_cart_url(); ?>" class="cart">
          <?php $cart_count = WC()->cart->get_cart_contents_count(); ?>
          <span>
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            <span class=""><?php if ( $cart_count > 0 ) { echo "(" . $cart_count . ")"; } ?><span>
          </span>
        </a>

      <?php
        // If WooCommerce is not active, adjust menu as needed
        } else { ?>
          <a class="search" href="<?php echo get_search_link(); ?>">
            <i class="fa fa-search"></i>
          </a>
      <?php } ?>

    </div>
  </div> <!-- End desktop menu -->
</div>

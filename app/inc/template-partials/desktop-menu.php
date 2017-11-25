<?php global $WooCommerceIsActive; ?>
<div class="main-menu color-scheme-<?php echo get_theme_mod( 'menu_color_scheme', '' ); ?> hidden-xs">
  <div class="content">

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
      'walker' => new Flyrbord_Desktop_Nav_Walker()
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
          <?php if ( get_theme_mod( 'facebook_account_link' ) ) { ?>
              <a href="<?php echo get_theme_mod( 'facebook_account_link' ); ?>" target="_blank">
                <i class="fa fa-facebook-official" aria-hidden="true"></i>
              </a>
          <?php } ?>
          <?php if ( get_theme_mod( 'twitter_account_link' ) ) { ?>
              <a href="<?php echo get_theme_mod( 'twitter_account_link' ); ?>" target="_blank">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
          <?php } ?>
          <?php if ( get_theme_mod( 'instagram_account_link' ) ) { ?>
              <a href="<?php echo get_theme_mod( 'instagram_account_link' ); ?>" target="_blank">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
          <?php } ?>
          <?php if ( get_theme_mod( 'pinterest_account_link' ) ) { ?>
              <a href="<?php echo get_theme_mod( 'pinterest_account_link' ); ?>" target="_blank">
                <i class="fa fa-pinterest-p" aria-hidden="true"></i>
              </a>
          <?php } ?>
          <?php if ( get_theme_mod( 'linkedin_account_link' ) ) { ?>
              <a href="<?php echo get_theme_mod( 'linked_account_link' ); ?>" target="_blank">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
              </a>
          <?php } ?>
          <?php
            $street_address = strtolower( get_theme_mod( 'street_address', '' ) );
            $map_url = "https://www.google.com/maps/place/" . str_replace(" ", "+", $street_address) . "/";
          ?>
          <?php if ( $street_address ) { ?>
            <a href="<?php echo $map_url; ?>" target="_blank">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
            </a>
          <?php } ?>
          <?php if ( get_theme_mod( 'show_search_icon', '' ) ) { ?>
            <a class="search" href="<?php echo get_search_link(); ?>">
              <i class="fa fa-search"></i>
            </a>
          <?php } ?>
      <?php } ?>

    </div>
  </div> <!-- End desktop menu -->
</div>

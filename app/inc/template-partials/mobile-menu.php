<?php global $WooCommerceIsActive; ?>
<div class="main-menu-mobile color-scheme-<?php echo get_theme_mod( 'menu_color_scheme', '' ); ?> visible-xs">
  <div class="content">
    <div class="title-bar">

      <div class="menu-toggle">
        <span class="bar one"></span>
        <span class="bar two"></span>
        <span class="bar three"></span>
      </div>

      <div class="logo">
        <?php
          if ( get_theme_mod( 'custom_logo' ) ) {
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $image = wp_get_attachment_image_src( $custom_logo_id , 'menu-logo' );
            ?>
            <a href="<?php echo  get_home_url(); ?>">
              <img class="menu-logo" src="<?php echo $image[0]; ?>" alt="Logo">
            </a>
          <?php } ?>
      </div>

      <div class="phone-icon">
        <?php $phone_number = preg_replace('/[^0-9]/', '', get_theme_mod( 'phone_number', '' )); ?>
        <a href="tel:<?php echo $phone_number; ?>">
          <i class="fa fa-phone" aria-hidden="true"></i>
        </a>
      </div>
    </div>

    <div class="menu-container">
      <?php wp_nav_menu( array(
        'theme_location' => 'main_navigation_menu',
        'fallback_cb' => 'default_header_nav',
        'container' => 'div',
        'container_class' => 'mobile-links',
        'walker' => new Flyrbord_Desktop_Nav_Walker()
      )); ?>
    </div>
  </div>
</div>

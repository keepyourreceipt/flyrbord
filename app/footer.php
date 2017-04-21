
  </div><!-- /.page-content -->
  <footer>

    <?php if ( is_active_sidebar( 'footer_left' ) ) { ?>
    	<?php dynamic_sidebar( 'footer_left' ); ?>
    <?php } ?>

    <?php if ( is_active_sidebar( 'footer_center' ) ) { ?>
      <?php dynamic_sidebar( 'footer_center' ); ?>
    <?php } ?>

    <?php if ( is_active_sidebar( 'footer_right' ) ) { ?>
      <?php dynamic_sidebar( 'footer_right' ); ?>
    <?php } ?>

  </footer>

  <footer class="copyright">
    <?php
      if ( get_theme_mod( 'custom_logo' ) ) {
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $image = wp_get_attachment_image_src( $custom_logo_id , 'menu-logo' );
        ?>
        <a href="<?php echo get_home_url(); ?>">
          <img class="menu-logo" src="<?php echo $image[0]; ?>" alt="Logo">
        </a>
    <?php } ?>
    &copy; Copyright <?php echo date( "Y" ); ?><?php echo get_bloginfo("name"); ?>
  </footer>
  <?php wp_footer(); ?>
  </body>
</html>

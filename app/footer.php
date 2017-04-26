
    </div><!-- /.container -->
  </div><!-- /.page-content -->

  <footer>
    <div class="container-fluid">
      <div class="row">
        <div class="container">
          <div class="row">
            <?php if ( is_active_sidebar( 'footer' ) ) { ?>
            	<?php dynamic_sidebar( 'footer' ); ?>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
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
    Copyright <?php echo date( "Y" ); ?><?php echo get_bloginfo("name"); ?>
  </footer>
  <?php wp_footer(); ?>
  </body>
</html>

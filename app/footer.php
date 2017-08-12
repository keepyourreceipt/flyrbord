
    </div><!-- /.container -->
  </main><!-- /.page-content -->

  <footer>
    <div class="container-fluid">
      <div class="row">
        <div class="container">
          <div class="row">
            <?php if ( is_active_sidebar( 'footer' ) ) { ?>
            	<?php dynamic_sidebar( 'footer' ); ?>
            <?php } ?>
          </div>
          <div class="row">
            <div class="col-sm-12 social-media-icons">
              <?php if ( get_theme_mod( 'facebook_account_link' ) ) { ?>
                  <a href="<?php echo get_theme_mod( 'facebook_account_link' ); ?>"><i class="fa fa-facebook-official" aria-hidden="true"></i>
              <?php } ?>
              <?php if ( get_theme_mod( 'twitter_account_link' ) ) { ?>
                  <a href="<?php echo get_theme_mod( 'twitter_account_link' ); ?>"><i class="fa fa-twitter" aria-hidden="true"></i>
              <?php } ?>
              <?php if ( get_theme_mod( 'instagram_account_link' ) ) { ?>
                  <a href="<?php echo get_theme_mod( 'instagram_account_link' ); ?>"><i class="fa fa-instagram" aria-hidden="true"></i>
              <?php } ?>
              <?php if ( get_theme_mod( 'pinterest_account_link' ) ) { ?>
                  <a href="<?php echo get_theme_mod( 'pinterest_account_link' ); ?>"><i class="fa fa-pinterest-p" aria-hidden="true"></i>
              <?php } ?>
              <?php if ( get_theme_mod( 'linkedin_account_link' ) ) { ?>
                  <a href="<?php echo get_theme_mod( 'linked_account_link' ); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i>
              <?php } ?>
            </div>
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


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
                  <a href="<?php echo get_theme_mod( 'facebook_account_link' ); ?>">
                    <i class="fa fa-facebook-official" aria-hidden="true"></i>
                  </a>
              <?php } ?>
              <?php if ( get_theme_mod( 'twitter_account_link' ) ) { ?>
                  <a href="<?php echo get_theme_mod( 'twitter_account_link' ); ?>">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                  </a>
              <?php } ?>
              <?php if ( get_theme_mod( 'instagram_account_link' ) ) { ?>
                  <a href="<?php echo get_theme_mod( 'instagram_account_link' ); ?>">
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                  </a>
              <?php } ?>
              <?php if ( get_theme_mod( 'pinterest_account_link' ) ) { ?>
                  <a href="<?php echo get_theme_mod( 'pinterest_account_link' ); ?>">
                    <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                  </a>
              <?php } ?>
              <?php if ( get_theme_mod( 'linkedin_account_link' ) ) { ?>
                  <a href="<?php echo get_theme_mod( 'linked_account_link' ); ?>">
                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                  </a>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <footer class="copyright">    
    Copyright <?php echo date( "Y" ); ?><?php echo get_bloginfo("name"); ?>
  </footer>
  <?php wp_footer(); ?>
  <?php
    // Include google analytics if set in customizer
    if( get_theme_mod( 'google_analytics' ) ) {
      echo get_theme_mod( 'google_analytics', '' );
    }
  ?>
  </body>
</html>

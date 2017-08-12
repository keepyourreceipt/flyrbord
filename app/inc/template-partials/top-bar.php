<div class="container-fluid top-bar">
  <div class="row">
    <div class="container">
      <div class="row">

        <?php if ( get_theme_mod( 'announcement_text', '' ) ) { ?>
          <div class="col-xs-12 col-sm-12 col-md-8 announcement-text">
            <p><?php echo get_theme_mod( 'announcement_text', '' ); ?></p>
          </div>
        <?php } ?>

        <?php if ( get_theme_mod( 'phone_number', '' ) || get_theme_mod( 'public_email', '' ) ) { ?>
          <div class="col-xs-12 col-sm-4 contact-info hidden-xs hidden-sm">
            <?php if ( get_theme_mod( 'phone_number', '' ) ) { ?>
              <span class="phone-number"><i class="fa fa-mobile" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo get_theme_mod( 'phone_number', '' ); ?></span>
            <?php } ?>
            <?php if ( get_theme_mod( 'public_email', '' ) ) { ?>
              <span class="public-email"><i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo get_theme_mod( 'public_email', '' ); ?></span>
            <?php } ?>
          </div>
        <?php } ?>

      </div>
    </div>
  </div>
</div>

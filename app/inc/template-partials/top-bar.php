<div class="top-bar">
  <div class="content">
    <?php
      $hours_field_name = strtolower( date("l") ) . "_hours";
      $todays_hours = get_theme_mod( $hours_field_name, '' );
    ?>
    <div class="business-hours">
      <?php if ( $todays_hours ) { ?>
        <p><?php echo date("l"); ?>'s hours: <?php echo $todays_hours; ?></p>
      <?php } else { ?>
        <p><?php echo date("l"); ?>'s hours: CLOSED</p>
      <?php } ?>
    </div>

    <?php if ( get_theme_mod( 'phone_number', '' ) || get_theme_mod( 'public_email', '' ) ) { ?>
      <div class="contact-info">
        <?php if ( get_theme_mod( 'phone_number', '' ) ) { ?>
          <?php $phone_number = preg_replace('/[^0-9]/', '', get_theme_mod( 'phone_number', '' )); ?>
          <span class="phone-number">P: <a href="tel:<?php echo $phone_number; ?>"><?php echo get_theme_mod( 'phone_number', '' ); ?></a></span>
        <?php } ?>
        <?php if ( get_theme_mod( 'public_email', '' ) ) { ?>
          <span class="public-email">E: <a href="mailto:<?php echo get_theme_mod( 'public_email', '' ); ?>"><?php echo get_theme_mod( 'public_email', '' ); ?></a></span>
        <?php } ?>
      </div>
    <?php } ?>
  </div>
</div>

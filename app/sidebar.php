<?php ?>
<?php if ( is_active_sidebar( 'sidebar-left' ) && ! is_woocommerce() ) { ?>
  <?php dynamic_sidebar( 'sidebar-left' ); ?>
<?php } ?>

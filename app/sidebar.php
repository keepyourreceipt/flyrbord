<?php global $WooCommerceIsActive; ?>
<?php if( $WooCommerceIsActive && ! is_woocommerce() ) { ?>
  <div class="col-sm-4 sidebar">
    <div class="row">
      <?php dynamic_sidebar( 'blog_sidebar' ); ?>
    </div>
  </div><!-- end sidebar -->
<?php } else { ?>
  <div class="col-sm-4 sidebar">
    <div class="row">
      <?php dynamic_sidebar( 'blog_sidebar' ); ?>
    </div>
  </div><!-- end sidebar -->
<?php } ?>

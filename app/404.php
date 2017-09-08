<?php get_header(); ?>

<?php
  $text_heading = get_theme_mod( 'four_oh_four_heading', '' );
  if ( ! $text_heading ) {
    // If no custom value is set, output the default message
    $text_heading = "404. The page you're looking for could not be found.";
  }

  $text_message = get_theme_mod( 'four_oh_four_message', '' );
  if ( ! $text_message ) {
    // If no custom value is set, output the default message
    $text_message = "Please check the address and try again. If you believe you're reached this page in error, please feel free to contact us.";
  }
?>

<div class="row">
  <div class="divider sm"></div>
  <div class="col-sm-8 col-sm-offset-2 text-center">
    <h2><?php echo $text_heading; ?></h2>
    <p><?php echo $text_message; ?></p>
  </div>
</div>

<div class="row">
  <div class="col-sm-4 col-sm-offset-4 text-center">
    <div class="divider xs"></div>
    <?php get_search_form(); ?>
  </div>
</div>

<?php get_footer(); ?>

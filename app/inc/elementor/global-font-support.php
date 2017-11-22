<?php
// Get global fonts as set in the elementor gloabl
// settings panel, and output associated styles
if( get_option('elementor_scheme_typography') ) {
    $global_fonts = get_option('elementor_scheme_typography');

    // Set system font names - do not try to include these fornts
    // from the Google fonts API
    $system_fonts = array("Arial", "Tahoma", "Verdana", "Helvetica", "Times New Roman", "Trebuchet MS", "Georgia");

    // Loop through selected fronts
    foreach( $global_fonts as $global_font ) {

      // If the selected font is not a system font, include the
      // Google Fonts API / stylesheet URL
      if ( !in_array( $global_font, $system_fonts ) ) {
        $font_name_and_styles = str_replace( ' ', '+', $global_font['font_family'] ) . ':100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic';
        echo '<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=' . $font_name_and_styles . '">';
      }
    }

    // Get selected fonts and font weights
    if ( $global_fonts[1] ) {
      $primary_headline = $global_fonts[1];
      $primary_headline_font_family = $primary_headline['font_family'];
      $primary_headline_font_weight = $primary_headline['font_weight'];
    }

    if ( $global_fonts[2] ) {
      $secondary_headline = $global_fonts[2];
      $secondary_headline_font_family = $secondary_headline['font_family'];
      $secondary_headline_font_weight = $secondary_headline['font_weight'];
    }

    if ( $global_fonts[3] ) {
      $body_text = $global_fonts[3];
      $body_text_font_family = $body_text['font_family'];
      $body_text_font_weight = $body_text['font_weight'];
    }

    if ( $global_fonts[4] ) {
      $accent_text = $global_fonts[4];
      $accent_text_font_family = $accent_text['font_family'];
      $accent_text_font_weight = $accent_text['font_weight'];
    }
}
?>

<?php if ( $primary_headline ) { ?>
  <!-- Global font styles -->
  <style>
    body,
    p,
    a {
      font-family: <?php echo $body_text_font_family; ?>;
      font-weight: <?php echo $body_text_font_weight; ?>;
    }

    .main-menu li.menu-item a {
      font-family: <?php echo $body_text_font_family; ?>;
    }

    h1, h2, h3,
    h1 a, h2 a, h3 a {
      font-family: <?php echo $primary_headline_font_family; ?>;
      font-weight: <?php echo $primary_headline_font_weight; ?>;
    }

    h4, h5 {
      font-family: <?php echo $secondary_headline_font_family; ?>;
      font-weight: <?php echo $secondary_headline_font_weight; ?>;
    }

    h6 {
      font-family: <?php echo $accent_text_font_family; ?>;
      font-weight: <?php echo $accent_text_font_weight; ?>;
    }

  </style>
<?php } ?>

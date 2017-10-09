<?php
// Get global colors as set in the elementor gloabl
// settings panel, and output associated styles
if ( get_option('elementor_scheme_color') ) {
  $global_colors = get_option( 'elementor_scheme_color' );

  if ( $global_colors[1] ) {
    $primary_color = $global_colors[1];
  }

  if ( $global_colors[2] ) {
    $secondary_color = $global_colors[2];
  }

  if ( $global_colors[3] ) {
    $text_color = $global_colors[3];
  }

  if ( $global_colors[4] ) {
    $accent_color = $global_colors[4];
  }
}
?>

<style>
.woocommerce #content input.button.alt:hover,
.woocommerce #respond input#submit.alt:hover,
.woocommerce a.button.alt:hover,
.woocommerce button.button.alt:hover,
.woocommerce input.button.alt:hover,
.woocommerce-page #content input.button.alt:hover,
.woocommerce-page #respond input#submit.alt:hover,
.woocommerce-page a.button.alt:hover,
.woocommerce-page button.button.alt:hover,
.woocommerce-page input.button.alt:hover,
input[type="submit"] {
  background:<?php echo $accent_color; ?> !important;
  background-color:<?php echo $accent_color; ?> !important;
  color: white !important;
  text-shadow: transparent !important;
  box-shadow: none;
}

.woocommerce #content input.button:hover,
.woocommerce #respond input#submit:hover,
.woocommerce a.button:hover,
.woocommerce button.button:hover,
.woocommerce input.button:hover,
.woocommerce-page #content input.button:hover,
.woocommerce-page #respond input#submit:hover,
.woocommerce-page a.button:hover,
.woocommerce-page button.button:hover,
.woocommerce-page input.button:hover {
  background:<?php echo $accent_color; ?> !important;
  background-color:<?php echo $accent_color; ?> !important;
  color: white !important;
  text-shadow: transparent !important;
  box-shadow: none;
  border-color: #ca0606 !important;
}

.woocommerce #content input.button,
.woocommerce #respond input#submit,
.woocommerce a.button, .woocommerce button.button,
.woocommerce input.button,
.woocommerce-page #content input.button,
.woocommerce-page #respond input#submit,
.woocommerce-page a.button,
.woocommerce-page button.button,
.woocommerce-page input.button {
  background: <?php echo $accent_color; ?> !important;
  color: white !important;
  text-shadow: transparent !important;
  border-color: #ca0606 !important;
}

.woocommerce #content input.button.alt:hover,
.woocommerce #respond input#submit.alt:hover,
.woocommerce a.button.alt:hover,
.woocommerce button.button.alt:hover,
.woocommerce input.button.alt:hover,
.woocommerce-page #content input.button.alt:hover,
.woocommerce-page #respond input#submit.alt:hover,
.woocommerce-page a.button.alt:hover,
.woocommerce-page button.button.alt:hover,
.woocommerce-page input.button.alt:hover {
  background: <?php echo $accent_color; ?> !important;
  box-shadow: none;
  text-shadow: transparent !important;
  color: white !important;
  border-color: #ca0606 !important;
}

.ninja-forms-field[type="button"] {
  color: #fff;
  background-color: <?php echo $accent_color; ?>;
  border: none;
}

.woocommerce span.onsale {
  background-color: <?php echo $accent_color; ?>;
}

.woocommerce-info,
.woocommerce-message {
  border-top-color: <?php echo $accent_color; ?>;
}

.woocommerce-info::before,
.woocommerce-message::before,
.stock.in-stock,
body a {
  color: <?php echo $accent_color; ?>;
}

body a:hover {
  color: <?php echo $text_color; ?>;
}

p,
strong,
em,
ul,
li,
div.nf-field-label label,
form label,
.select2-container--default .select2-selection--single .select2-selection__rendered,
.nf-field-element select {
  color: <?php echo $text_color; ?>;
}

h1,
h2,
h1 a,
h2 a {
  color: <?php echo $primary_color; ?>;
  text-decoration: none;
}

h3,
h4,
h5,
h6,
h3 a,
h4 a,
h5 a,
h6 a {
  color: <?php echo $secondary_color; ?>;
  text-decoration: none;
}

</style>

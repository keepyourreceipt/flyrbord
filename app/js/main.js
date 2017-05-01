jQuery( document ).ready(function( $ ) {

  function toggleMobileMenu() {
    var mobileMenu = $('.mobile-menu');
    mobileMenu.toggleClass( 'active' );
  }

  $('.mobile-menu-toggle > span').on('click', function() {
    toggleMobileMenu();
  });

  // Standardize for styles
  $('.woocommerce form input[type="text"], .woocommerce form input[type="password"], .woocommerce form input[type="email"], .woocommerce form input[type="select"], .woocommerce form select, .woocommerce form textarea').addClass( 'form-control' );

});

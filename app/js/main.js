jQuery( document ).ready(function( $ ) {

  function toggleMobileMenu() {
    var mobileMenu = $('.mobile-menu');
    mobileMenu.toggleClass( 'active' );
  }

  $('.mobile-menu-toggle > span').on('click', function() {
    toggleMobileMenu();
  });

  $('.woocommerce-checkout input, .woocommerce-checkout select, .input-text').addClass( 'form-control' );

});

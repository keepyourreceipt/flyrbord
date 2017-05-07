jQuery( document ).ready(function( $ ) {

  // Hide pre-loader
  $('.pre-loader').fadeOut(400);

  function toggleMobileMenu() {
    var mobileMenu = $('.mobile-menu');
    mobileMenu.toggleClass( 'active' );
  }

  $('.mobile-menu-toggle > span').on('click', function() {
    toggleMobileMenu();
  });

  // Add form classes to checkout form
  $('.woocommerce-checkout input, .woocommerce-checkout select, .input-text').addClass( 'form-control' );

});

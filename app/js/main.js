jQuery( document ).ready(function( $ ) {

  function toggleMobileMenu() {
    var mobileMenu = $('.mobile-menu');
    mobileMenu.toggleClass( 'active' );
  }

  $('.mobile-menu-toggle > span').on('click', function() {
    toggleMobileMenu();
  });

});

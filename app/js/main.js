jQuery( document ).ready(function( $ ) {

  // Hide pre-loader when page is loaded
  $('.pre-loader').fadeOut(400);

  // Toggle mobile menu on click
  $('.mobile-menu-toggle > span').on('click', function() {
    toggleMobileMenu();
  });

  function toggleMobileMenu() {
    // Get reference to the mobile menu container
    var mobileMenu = $('.mobile-menu');

    // Toggle mobile menu container
    mobileMenu.toggleClass( 'active' );
  }

  // Toggle sub-menu on hover
  $('ul.menu > li').hover(
    function() {
      $( this ).find('.sub-menu').stop().slideDown(100);
    }, function() {
      $( this ).find('.sub-menu').stop().fadeOut(50);
    }
  );




  // Add form classes to checkout form
  $('.woocommerce-checkout input, .woocommerce-checkout select, .input-text, .comment-form-comment textarea').addClass( 'form-control' );

});

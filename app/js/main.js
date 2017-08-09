jQuery( document ).ready(function( $ ) {

  init();

  function toggleMobileMenu() {
    var mobileMenu = $('.mobile-menu');

    mobileMenu.toggleClass( 'active' );
  }

  function toggleDesktopNavigation() {
    $('ul.menu > li').mouseleave( function() {
      $( this ).find('.sub-menu').stop().fadeOut(100);
    });

    $('ul.menu > li').on('mouseenter', function(e){
        var timer = setTimeout(function() {
            var target = $( e.target );
            target.parent().find('.sub-menu').stop().slideDown(125);
        },  250);
        $(this).data('hoverTimer', timer);
    }).on('mouseleave', $('ul.menu > li'), function(e){
        clearTimeout($(this).data('hoverTimer'));
    });
  }

  function init() {
    // Hide pre-loader when page is loaded
    $('.pre-loader').fadeOut(400);

    // Toggle mobile menu on click
    $('.mobile-menu-toggle > span').on('click', function() {
      toggleMobileMenu();
    });

    // Setup menu functionality
    toggleDesktopNavigation();

    // Add form classes to checkout form
    $('.woocommerce-checkout input, .woocommerce-checkout select, .input-text, .comment-form-comment textarea').addClass( 'form-control' );

  }

});

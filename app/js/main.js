jQuery( document ).ready(function( $ ) {

  // Setup theme functions (see function definitions below)
  init();

  function toggleMobileMenu() {
    // On click, toggle mobile menu open and closed
    var mobileMenu = $('.mobile-menu');
    mobileMenu.toggleClass( 'active' );
  }

  function toggleDesktopNavigation() {
    // On mouse leave, remove the active sub-menu class to
    // close the active sub-menu
    $('ul.menu > li').mouseleave( function() {
      $( this ).find('.sub-menu').removeClass('active');
    });

    // On mouse enter, delay event trigger to open sub-menu
    $('ul.menu > li').on('mouseenter', function(e){
        var timer = setTimeout(function() {
            var target = $( e.target );
            target.parent().find('.sub-menu').addClass('active');
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
  }

});

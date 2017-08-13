jQuery( document ).ready(function( $ ) {

  // Setup theme functions (see function definitions below)
  init();

  // Toggle mobile menu on click
  $('.mobile-menu-toggle').click(function() {
    $('.mobile-menu').slideToggle();
  });

  function toggleDesktopNavigation() {
    // On mouse leave, remove the active sub-menu class to
    // close the active sub-menu
    $('ul.menu > li').not('.mobile-menu').mouseleave( function() {
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

  $('ul.mobile-menu > li.menu-item-has-children').not('a').click(function() {
    $(this).find('.sub-menu').slideToggle();
  });

  function init() {
    // Hide pre-loader when page is loaded
    $('.pre-loader').fadeOut(400);

    // Setup menu functionality
    toggleDesktopNavigation();
  }

});

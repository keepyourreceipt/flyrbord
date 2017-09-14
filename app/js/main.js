jQuery( document ).ready(function( $ ) {

  init();

  function init() {
    // Setup theme scripts
    hidePreloader();
    desktopNavigationDropdown();
    toggleMobileMenu();
    toggleMobileSubMenu();
    addCustomWCSortingClass();
    addToCartButtonIcon();
  }

  function hidePreloader() {
    // Hide pre-loader when page is loaded
    var $preloader = $('.pre-loader');
    if ( $preloader.length ) {
        $preloader.fadeOut(400);
    }
  }

  function addToCartButtonIcon() {
    // Add a crt button to the product archive buttons
    if ( $('.products .product a.button').length ) {
      var $buttons = $('.products .product a.button');
      $buttons.each(function() {
        $(this).prepend('<i class="fa fa-shopping-cart" aria-hidden="true"></i>');
      });
    }
  }

  function desktopNavigationDropdown() {
    // On mouse leave, remove the active sub-menu class to close the active sub-menu
    var $activeMenuItem = $('ul.menu > li').not('.mobile-menu');
    $activeMenuItem.mouseleave( function() {
      $( this ).find('.sub-menu').removeClass('active');
    });

    // On mouse enter, delay event trigger to open sub-menu
    $('ul.menu > li').on('mouseenter', function(e){
        var timer = setTimeout(function() {
            var target = $( e.target );
            target.parent().find('.sub-menu').addClass('active');
        },  150);
        $(this).data('hoverTimer', timer);
    }).on('mouseleave', $('ul.menu > li'), function(e){
        clearTimeout($(this).data('hoverTimer'));
    });
  }

  function toggleMobileMenu() {
    // Toggle mobile menu on click
    var $toggle = $('.mobile-menu-toggle');
    var $toggleIcon = $toggle.children('i');
    var $menu = $('.mobile-menu');
    if ( $toggle.length && $menu.length ) {
      $toggle.click(function() {
        $menu.slideToggle();
        // Toggle icon with menu interaction
        if ( $toggleIcon.hasClass('fa-align-left') ) {
          $toggleIcon.attr('class', '').addClass('fa fa-times');
        } else {
          $toggleIcon.attr('class', '').addClass('fa fa-align-left');
        }
      });
    }
  }

  function toggleMobileSubMenu() {
    // Toggle navigation sub-menus in mobile
    var $toggleElement = $('ul.mobile-menu > li.menu-item-has-children').not('a');
    if ( $toggleElement.length ) {
      $toggleElement.click(function() {
        $(this).find('.sub-menu').slideToggle();
      });
    }
  }

  function addCustomWCSortingClass() {
    // Add custom classes to woocommerce product sorting dropdown
    var $element = $('.woocommerce-page select.orderby');
    if ( $element.length ) {
      $element.addClass('form-control');
    }
  }

});

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
    addDesktopSubMenuClasses();
    fancyNumField();
    multiColumnNavDropdown();
    wrapWooCommerceCheckoutNotifications();
  }

  function fancyNumField() {
    var $wcQuantityContainer = $('.product div.quantity');

    // If Wooommerce quantity field exists on page
    if ( $wcQuantityContainer.length ) {
      $wcQuantityContainer.each(function() {

        // Get reference to num field element and it's value
        var $numField = $(this).find('input[type="number"]');
        var $numFieldValue;

        // $(this).prepend('<input type="tel" value="' + $realNumValue + '" class="fancyNumField number">');
        $(this).prepend('<span class="fancyNumField downArrow"><i class="fa fa-minus" aria-hidden="true"></i></span>');

        // Display number field value and incrementing arrows
        $(this).append('<span class="fancyNumField upArrow"><i class="fa fa-plus" aria-hidden="true"></i></span>');

        // Un click, update the value on the number field as needed
        $(this).find('.fancyNumField.upArrow').click(function() {
          $numFieldValue = parseInt($numField.val()) + 1;
          $numField.val( $numFieldValue.toString() );
        });

        $(this).find('.fancyNumField.downArrow').click(function() {
          $numFieldValue = parseInt($numField.val()) - 1;

          // If num equal to or greater than 1, adjust the value
          // this protects from zero or negative quantity values
          if ( $numFieldValue > 0 ) {
            $numField.val( $numFieldValue.toString() );
          }
        });

      });
    }
  }

  function hidePreloader() {
    // Hide pre-loader when page is loaded
    var $preloader = $('.pre-loader');
    if ( $preloader.length ) {
        $preloader.fadeOut(400);
    }
  }

  function addDesktopSubMenuClasses() {
    var $subMenuItems = $('.main-menu ul.menu > li.menu-item > ul.sub-menu li');
    $subMenuItems.each(function() {
      if ( $(this).hasClass('menu-item-has-children') ) {
        var $numberOfSubMenuItems = $(this).siblings().length + 1;
        var $subMenuContainerWidth;

        // Sub-menu container should have a max of 4 columns
        if ( $numberOfSubMenuItems <= 4 ) {
          $subMenuContainerWidth = $(this).outerWidth() * $numberOfSubMenuItems;
        } else if ( $numberOfSubMenuItems > 4 ) {
          $subMenuContainerWidth = $(this).outerWidth() * 4;
        }
      }
    });
  }

  function multiColumnNavDropdown() {
    var topLevelSubMenu = $('.main-menu > .content > .links > ul.menu > li.menu-item > ul.sub-menu');
    topLevelSubMenu.each(function(){
      var nestedSubMenu = $(this).find('ul.sub-menu');
      if( nestedSubMenu.length > 1 ) {
        var subMenuContainerWidth = 0;
        nestedSubMenu.each(function() {
          subMenuContainerWidth += $(this).outerWidth();
        });
        $(this).css('width', subMenuContainerWidth + 30 + "px");
      }
    });
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

  function wrapWooCommerceCheckoutNotifications() {
    // Wrap WooCommerce checkout notifications with bootstrap grid classes
    $("body").bind("DOMSubtreeModified", function() {
      if ( $(this).find('.woocommerce-NoticeGroup').length ) {
        $(this).find('.woocommerce-NoticeGroup').addClass('col-sm-12');
        var shippingErrorMessage = $('.woocommerce-NoticeGroup ul > li:contains("No shipping method")');
        if ( shippingErrorMessage.length ) {
          shippingErrorMessage.text("Oh no! We're not currently delivering to your ZIP code. Please contact us for more info.");
        }
      }
    });
  }

});

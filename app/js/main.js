jQuery( document ).ready(function( $ ) {

  init();

  function init() {
    // Setup theme scripts
    hidePreloader();
    toggleMobileMenu();
    multiLevelMobileMenu();
    addCustomWCSortingClass();
    addToCartButtonIcon();
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

  function toggleMobileMenu() {
    // Toggle mobile menu on click
    var menuToggle = $('.main-menu-mobile .title-bar .menu-toggle');
    var menuContainer = $('.main-menu-mobile .menu-container');

    menuContainer.hide();

    menuToggle.on('click', function() {
      menuContainer.slideToggle();
    });
  }

  function multiLevelMobileMenu() {
    // Toggle navigation sub-menus in mobile
    $('.main-menu-mobile ul.menu > li.menu-item-has-children > ul.sub-menu').hide();
    $('.main-menu-mobile ul.menu > li.menu-item-has-children').prepend('<span class="menu-toggle"></span>');
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

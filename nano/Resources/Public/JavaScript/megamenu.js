/**
 * Clever Mega Menu
 * @author Cleversoft
 */
;window.clevermenu = {};

function clever_sub_menu_width( selector ) {
  var w = selector.outerWidth();

  if ( w > jQuery( window ).width() ) {
  	w = jQuery( window ).width();
  }

  return w;
}

(function( clevermenu, $ ) {

    clevermenu = clevermenu || {};

    $.extend( clevermenu, {
      options : {
        vmenu_sub_width_default: 600,
        break_point: 992,
        selector : {
          megaMenuSelector                : ".js-cmm",
          subMegaMenuContainerSelector    : ".js-cmm-container",
          subMegaMenuWrapperSelector      : ".js-cmm-wrapper"
        }
      },
      MegaMenu : {
        init: function() {
          $( clevermenu.options.selector.megaMenuSelector ).each( function() {
            var options_data = {"menuStyle":"horizontal", "parentSelector":".js-cmm", "breakPoint":"1025"};

            if ( isNaN( options_data.breakPoint ) || options_data.breakPoint <= 0 ) {
                options_data.breakPoint = clevermenu.options.break_point;
            }

            clevermenu.MegaMenu.build( $( this ) );

            if( $( window ).width() < options_data.breakPoint  ) {
            	clevermenu.MegaMenu.mobile( $( this ) );
            }
          });
        },
        build: function( menu ) {
        	var options_data = menu.data( 'options' );

        	$( 'li.js-cmm-mega', menu ).each( function () {
            var item = $( this ),
              settings = $( this ).data( 'settings' ),
              subMegaMenuContainer = $( clevermenu.options.selector.subMegaMenuContainerSelector, $( this ) ),
              left = 0,
              right = 0,
              menuOffset =  $( menu ).offset(),
              itemOffset =  $( this ).offset();

            // Sub menu width
            if ( isNaN( settings.width ) || settings.width <= 0 ) {
            	settings.width = clever_sub_menu_width( menu );
            }

            if ( settings.width > 0 && settings.layout != 'full' ) {
            	subMegaMenuContainer.width( settings.width );
            }

            switch ( settings.layout ) {
              case 'center' :
                subMegaMenuContainer.css( { 'left': ( - ( ( settings.width - item.width() ) / 2 ) ) + 'px', 'right': 'auto' } );
                break;
              case 'full' :
                var parentWidth = clever_sub_menu_width( menu );

                if( menu.parents( options_data.parentSelector ).length ) {
                	parentWidth = clever_sub_menu_width( menu.parents( options_data.parentSelector ) );
                }

                if ( $( options_data.parentSelector ).length ) {
                	var parentOffset = $( options_data.parentSelector ).offset();
                } else {
                	var parentOffset = menuOffset;
                }

                subMegaMenuContainer.parent().css( { 'position': 'static' } );

                if ( parentWidth > menu.outerWidth() ) {
                	subMegaMenuContainer.css( {'width': parentWidth, 'left': ( - ( menuOffset.left - parentOffset.left ) ) + 'px'} );
                }
                else {
                	subMegaMenuContainer.css( {'width': menu.outerWidth()} );
                }
                break;
            }
          });
        },
        mobile: function( menu ){

          var dropdownToggle = $( '<button />', { 'class': 'js-cmm-dropdown-toggle', 'aria-pressed': false }).append( '<i class="fa fa-angle-right"></i>' );
          
          /* Item toggled */
          menu.find( '.cmm-item-has-children button' ).remove();
          menu.find( '.cmm-item-has-children > a' ).after( dropdownToggle );

          // Set the active submenu dropdown toggle button initial state.
          menu.find( '.current-menu-ancestor > button' )
            .addClass( 'toggled-on' )
            .attr( 'aria-pressed', 'true' );

          // Set the active submenu initial state.
          menu.find( '.current-menu-ancestor > .sub-menu' ).addClass( 'toggled-on' );

          menu.find( '.js-cmm-dropdown-toggle' ).on( 'click', function( e ) {
            var _this = $( this );

            e.preventDefault();

            _this.toggleClass( 'toggled-on' );
            _this.next( '.children, .js-cmm-submenu, .js-cmm-sub-container, .js-cmm-content-container' ).toggleClass( 'toggled-on' );

            _this.attr( 'aria-pressed', _this.attr( 'aria-pressed' ) === 'false' ? 'true' : 'false' );
          });
        }
      }
    });

}).apply( this, [window.clevermenu, jQuery] );

(function( clevermenu, $ ) {
  "use strict";

  function clevermenu_init() {
    // Mega Menu
    if ( typeof clevermenu.MegaMenu !== 'undefined' ) {
    	clevermenu.MegaMenu.init();
    }
  }

  $(document).ready( function() {
  	clevermenu_init();
  });

  $(window).resize( function() {
  	clevermenu_init();
  })

}).apply( this, [window.clevermenu, jQuery] );
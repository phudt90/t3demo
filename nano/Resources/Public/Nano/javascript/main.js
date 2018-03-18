/*
    * responsiveMenu
    * responsiveMenuMega
    * searchButton
    * slider
    * slideProduct
    * slideCounter
    * slideMostViewer
    * slideMostViewer_s2
    * slideMostViewer_s3
    * slideMostViewer_s4
    * slideBrand
    * slideAccessories
    * slideTeam
    * slideBrand_s2
    * slideProduct_s2
    * slider_s2
    * slideProduct_s3
    * slideProduct_s4
    * slideProduct_s5
    * slideProduct_s6
    * slideTestimonial
    * CountDown
    * CountDown_s2
    * tabImagebox
    * tabImagebox_s2
    * tabProductDetail
    * tabElement
    * tabSortproduct
    * overlay
    * FilterPrice();
    * toggleWidget
    * toggleCatlist
    * toggleDropdown
    * toggleLocation
    * showSuggestions
    * showAllcat
    * accordionToggle
    * flexProduct
    * progressBar
    * detectViewport
    * progressCircle
    * BrandsIsotope
    * scrollbarCheckbox
    * scrollbarLocation
    * scrollbarTableCart
    * scrollbarWishlist
    * scrollbarCategories
    * scrollbarSearch
    * googleMap
    * googleMap_s2
    * goTop
    * zoomImage
    * popup
**/

;(function($) {

   'use strict'
        var isMobile = {
            Android: function() {
                return navigator.userAgent.match(/Android/i);
            },
            BlackBerry: function() {
                return navigator.userAgent.match(/BlackBerry/i);
            },
            iOS: function() {
                return navigator.userAgent.match(/iPhone|iPad|iPod/i);
            },
            Opera: function() {
                return navigator.userAgent.match(/Opera Mini/i);
            },
            Windows: function() {
                return navigator.userAgent.match(/IEMobile/i);
            },
            any: function() {
                return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
            }
        }; // is Mobile

        var responsiveMenu = function() {
            var menuType = 'desktop';

            $(window).on('load resize', function() {
                var currMenuType = 'desktop';

                if ( matchMedia( 'only screen and (max-width: 991px)' ).matches ) {
                    currMenuType = 'mobile';
                }

                if ( currMenuType !== menuType ) {
                    menuType = currMenuType;

                    if ( currMenuType === 'mobile' ) {
                        var $mobileMenu = $('#mainnav').attr('id', 'mainnav-mobi').hide();
                        var hasChildMenu = $('#mainnav-mobi').find('li:has(ul)');
                        var hasChildMenuMega = $('#mainnav-mobi').find('li:has(div.submenu)');

                        $('#header').after($mobileMenu);
                        hasChildMenu.children('ul').hide();
                        hasChildMenu.children('a').after('<span class="btn-submenu"></span>');
                        hasChildMenuMega.children('div.submenu').hide();
                        $('ul.submenu-child').hide();
                        hasChildMenuMega.find('h3').append('<span class="btn-submenu-child"></span>');
                        $('.btn-menu').removeClass('active');

                    } else {
                        var $desktopMenu = $('#mainnav-mobi').attr('id', 'mainnav').removeAttr('style');
                        $desktopMenu.find('.submenu').removeAttr('style');
                        $('#header').find('.nav-wrap').append($desktopMenu);
                        $('.btn-submenu').remove();
                        $('ul.submenu-child').show();
                        $('h3').children('span').removeClass('btn-submenu-child');
                    }
                }
            });

            $('.btn-menu').on('click', function() {         
                $('#mainnav-mobi').slideToggle(300);
                $(this).toggleClass('active');
                return false;
            });

            $(document).on('click', '#mainnav-mobi li.has-mega-menu .row .btn-submenu-child', function(e) {
                $(this).toggleClass('active').parent('h3.cat-title').next('.submenu-child').slideToggle(400);
                e.stopImmediatePropagation();
                return false;
            });

            $(document).on('click', '#mainnav-mobi li .btn-submenu', function(e) {
                $(this).toggleClass('active').next('.submenu').slideToggle(400);
                e.stopImmediatePropagation();
                return false;
            });

        }; // Responsive Menu       

        var responsiveMenuMega_S2 = function() {
            var menuType = 'desktop';

            $(window).on('load resize', function() {
                var currMenuType = 'desktop';

                if ( matchMedia( 'only screen and (max-width: 991px)' ).matches ) {
                    currMenuType = 'mobile';
                }

                if ( currMenuType !== menuType ) {
                    menuType = currMenuType;

                    if ( $('body').hasClass('grid') ) {
                        if (currMenuType === 'mobile') {
                            var $mobileMenuMegaV2 = $('#mega-menu').attr('id', 'mega-mobile').hide();
                            var ChildMenuMegaV2 = $('.header-bottom').find('.grid-right');
                            var ChildDropmenuV2 = $('.drop-menu').children('.one-third');

                            $('.btn-mega').hide();
                            $('#header').after($mobileMenuMegaV2);
                            ChildMenuMegaV2.append('<div class="btn-menu-mega"><span></span></div>');

                            $('.drop-menu').hide();
                            $mobileMenuMegaV2.find('.dropdown').append('<span class="btn-dropdown"></span>');

                            ChildDropmenuV2.children('ul').hide();
                            $('.drop-menu').find('.cat-title').append('<span class="btn-dropdown-child"></span>');

                        } else {
                            var $desktopMenuMegaV2 = $('#mega-mobile').attr('id', 'mega-menu').removeAttr('style');

                            $desktopMenuMegaV2.find('.drop-menu').removeAttr('style');
                            $('.header-bottom.style1').find('.grid-left').append($desktopMenuMegaV2);
                        }
                    };

                };
                
            });


            $(document).on('click', '#mega-mobile ul.menu li a .btn-dropdown', function(e) {
                $(this).toggleClass('active').closest('li').children('.drop-menu').slideToggle(400);
                e.stopImmediatePropagation();
                return false;
            });

            $(document).on('click', '#mega-mobile .btn-dropdown-child', function(e) {
                $(this).toggleClass('active').closest('.one-third').children('ul').slideToggle(400);
                e.stopImmediatePropagation();
                return false;
            });

        }; // Responsive Menu Mega S2

        var responsiveMenuMega = function() {
            var menuType = 'desktop';

            $(window).on('load resize', function() {
                var currMenuType = 'desktop';

                if ( matchMedia( 'only screen and (max-width: 991px)' ).matches ) {
                    currMenuType = 'mobile';
                }

                if ( currMenuType !== menuType ) {
                    menuType = currMenuType;

                    if ( currMenuType === 'mobile' ) {
                        var $mobileMenuMega = $('#mega-menu').attr('id', 'mega-mobile').hide();
                        var ChildMenuMega = $('.header-bottom').find('.col-2');
                        var ChildDropmenu = $('.drop-menu').children('.one-third');

                        $('.btn-mega').hide();
                        $('#header').after($mobileMenuMega);
                        ChildMenuMega.append('<div class="btn-menu-mega"><span></span></div>');

                        $('.drop-menu').hide();
                        $mobileMenuMega.find('.dropdown').append('<span class="btn-dropdown"></span>');

                        ChildDropmenu.children('ul').hide();
                        $('.drop-menu').find('.cat-title').append('<span class="btn-dropdown-child"></span>');

                    } else {
                        var $desktopMenuMega = $('#mega-mobile').attr('id', 'mega-menu').removeAttr('style');

                        $('.btn-mega').show();
                        $desktopMenuMega.find('.drop-menu').removeAttr('style');
                        $('.header-bottom').find('.col-2').append($desktopMenuMega);
                        $('.btn-menu-mega').remove();
                        $('.btn-dropdown-child').remove();
                        $('.drop-menu').children('.one-third').children('ul').show();
                    }
                }
            });

            $(document).on('click', '.btn-menu-mega', function() {       
                $('#mega-mobile').slideToggle(300);
                $(this).toggleClass('active');
                return false;
            });

            $(document).on('click', '#mega-mobile ul.menu li a .btn-dropdown', function(e) {
                $(this).toggleClass('active').closest('li').children('.drop-menu').slideToggle(400);
                e.stopImmediatePropagation();
                return false;
            });

            $(document).on('click', '#mega-mobile .btn-dropdown-child', function(e) {
                $(this).toggleClass('active').closest('.one-third').children('ul').slideToggle(400);
                e.stopImmediatePropagation();
                return false;
            });

            
        }; // Responsive Menu Mega

        var searchButton = function() {
            var showsearch = $('.show-search button');
            showsearch.on('click',function() {
                $('.show-search').parent('div').children('.top-search.style1').toggleClass('active');
                showsearch.toggleClass('active');
            });
        }; // Show Search

        var searchFilterbox = function(){
			var buttonFilter=$('.filter');
				buttonFilter.on('click',function(){
					$('.box-filter').toggleClass('active');
				});
			};

        var tabImagebox = function() {
            var speed = 1000;
            $('.flat-imagebox').each(function() {
                $(this).find('.tab-list').children().first().addClass('active'),
                $(this).find('.box-product').children('.row').first().show().siblings().hide(),
                $(this).find('.tab-list').children('li').on('click', function(e){
                    var liActive = $(this).index();
                    $(this).addClass('active').siblings().removeClass('active');
                    $(this).addClass('active').closest('.flat-imagebox').find('.box-product').children('.row').eq(liActive).fadeIn(1000).show().siblings().hide();
                    e.preventDefault();
                });
            });
        }; // Tab Imagebox

        var tabImagebox_s2 = function() {
            var speed = 1000;
            $('.flat-imagebox').each(function() {
                $(this).find('.tab-list').children().first().addClass('active'),
                $(this).find('.tab-item').children('.row').first().show().siblings().hide(),
                $(this).find('.tab-list').children('li').on('click', function(e){
                    var liActive = $(this).index();
                    $(this).addClass('active').siblings().removeClass('active');
                    $(this).addClass('active').closest('.flat-imagebox').find('.tab-item').children('.row').eq(liActive).fadeIn(1000).show().siblings().hide();
                    e.preventDefault();
                });
            });
        }; // Tab Imagebox

        var tabProductDetail = function() {
            $('.flat-product-content').each(function() {
                $(this).find('ul.product-detail-bar').children().first().addClass('active');
                $(this).find('.container').children('.row').first().show().siblings().hide();
                $(this).find('ul.product-detail-bar').children('li').on('click', function(e) {
                    var liActive = $(this).index();
                    $(this).addClass('active').siblings().removeClass('active');
                     $(this).closest('.flat-product-content').find('.container').children('.row').eq(liActive).fadeIn(1000).show().siblings().hide();
                    e.preventDefault();
                });
            });
            $('.flat-product-content.style2').each(function() {
                $(this).find('ul.product-detail-bar').children().first().addClass('active');
                $(this).find('.col-md-12').children('div.row').first().show().siblings().hide();
                $(this).find('ul.product-detail-bar').children('li').on('click', function(e) {
                    var liActive = $(this).index();
                    $(this).addClass('active').siblings().removeClass('active');
                     $(this).closest('.flat-product-content.style2').find('.col-md-12').children('div.row').eq(liActive).fadeIn(1000).show().siblings().hide();
                    e.preventDefault();
                });
            });
        }; // Tab Productdetail

        var tabSortproduct = function() {
            $('.wrap-imagebox').each(function() {
                $(this).find('ul.icons').children('li').first().addClass('active');
                $(this).find('.tab-product').children('.sort-box').first().show().siblings().hide();
                $(this).find('ul.icons').children('li').on('click', function(e) {
                    var liActive = $(this).index();
                    $(this).addClass('active').siblings().removeClass('active');
                     $(this).closest('.wrap-imagebox').find('.tab-product').children('.sort-box').eq(liActive).fadeIn(1000).show().siblings().hide();
                    e.preventDefault();
                });
            });
        }; // Tab Sort Product

        var tabElement = function() {
            $('.flat-tab').each(function() {
                $(this).find('ul.tab-list').children().first().addClass('active');
                $(this).find('.tab-content').children('.tab-item').first().show().siblings().hide();
                $(this).find('ul.tab-list').children('li').on('click', function(e) {
                    var liActive = $(this).index();
                    $(this).addClass('active').siblings().removeClass('active');
                     $(this).closest('.flat-tab').find('.tab-content').children('.tab-item').eq(liActive).fadeIn(1000).show().siblings().hide();
                    e.preventDefault();
                });
            });
        }; // Tab Element

        var toggleWidget = function() {
            $( ".widget .widget-title h3 span" ).on('click', function() {
                $(this).toggleClass('active');
              $(this).closest('.widget').children('.widget-content').slideToggle(300);
            });
        }; // Toggle Widget

        var toggleCatlist = function() {
            $('.cat-list.style1').each(function() {
                $(this).children('li').children('ul.cat-child').hide();
                // $(this).children('li').children('ul.cat-child').first().show()
                $( ".cat-list.style1 li span" ).on('click', function() {
                    $(this).parent('li').toggleClass('active');
                    $(this).toggleClass('active');
                    $(this).parent('li').children('ul.cat-child').slideToggle(300);
                    // var liActive = $(this).index(),
                    // contentActive = $(this).parent('li').siblings().removeClass('active').children('ul-cat-child').eq(liActive);
                    // contentActive.addClass('active').parent('li').fadeIn("slow");
                    // contentActive.parent('li').siblings().removeClass('active');
                    // $(this).parent('li').addClass('active').children('.ul-cat-child').eq(liActive).siblings().hide();
                });
            })
        }; // Toggle Cat List

        var toggleDropdown = function() {
            $( ".form-box .form-box-content .dropdown-title" ).on('click', function() {
                $(this).toggleClass('active');
                $(this).parent('.form-box-content').children('ul').slideToggle(300);
            });
        }; // Toggle Dropdown

        var toggleLocation = function() {
            $( ".location .location-content .select-location select" ).on('click', function() {
                $(this).toggleClass('active');
                $(this).closest('.location-content').children('ul.location-list').slideToggle(300);
            });
        }; // Toggle Location

        var showSuggestions = function() {
            $( ".top-search form.form-search .box-search" ).each(function() {
                $( "form.form-search .box-search input" ).on('focus', (function() {
                    $(this).closest('.boxed').children('.overlay').css({
                        opacity: '1',
                        display: 'block'
                    });
                    $(this).parent('.box-search').children('.search-suggestions').css({
                        opacity: '1',
                        visibility: 'visible',
                        top: '77px'
                    });
                }));
                $( "form.form-search .box-search input" ).on('blur', (function() {
                    $(this).closest('.boxed').children('.overlay').css({
                        opacity: '0',
                        display: 'none'
                    });
                    $(this).parent('.box-search').children('.search-suggestions').css({
                        opacity: '0',
                        visibility: 'hidden',
                        top: '100px'
                    });
                }));
            });

            $( ".top-search.style1 form.form-search .box-search" ).each(function() {
                $( "form.form-search .box-search input" ).on('focus', (function() {
                    $(this).closest('.boxed').children('.overlay').css({
                        opacity: '1',
                        display: 'block'
                    });
                    $(this).parent('.box-search').children('.search-suggestions').css({
                        opacity: '1',
                        visibility: 'visible',
                        top: '50px'
                    });
                }));
            });
        }; // Toggle Location

        var showAllcat = function() {
            $('.cat-wrap').each(function() {
                $(this).on('click', function() {
                    $(this).children('.all-categories').toggleClass('show');
                });
            });
        };


        var accordionToggle = function() {
            var speed = {duration: 400};
            $('.toggle-content').hide();
            $('.accordion-toggle .toggle-title.active').siblings('.toggle-content').show();
            $('.accordion').find('.toggle-title').on('click', function() {
                $(this).toggleClass('active');
                $(this).next().slideToggle(speed);
                $(".toggle-content").not($(this).next()).slideUp(speed);
                if ($(this).is('.active')) {
                    $(this).closest('.accordion').find('.toggle-title.active').toggleClass('active')
                    $(this).toggleClass('active');
                };
            });
        }; // Accordion Toggle

        var goTop = function(){
            var gotop = $('.btn-scroll');
            gotop.on('click', function() {
                $('html, body').animate({ scrollTop: 0}, 800, 'easeInOutExpo');
                return false;
            });
        }; // Go Top

        var overlay = function(){
            var megaMenu = $('ul.menu li');
            megaMenu.on('mouseover', function() {
                $(this).closest('.boxed').children('.overlay').css({
                    opacity: '1',
                    display: 'block',
                });
            });
            megaMenu.on('mouseleave', function() {
                $(this).closest('.boxed').children('.overlay').css({
                    opacity: '0',
                    display: 'none',
                });
            });
        }; // Overlay
   
    var widgetSearchByTerms = function() {
    	var vmodelOptions = $('#SearchFieldVehicalModel').data('options');
    	var vbrand = $('#SearchFieldVehicalBrand').select2({
    		language: 'vi'
    	});
    	var vmodel = $('#SearchFieldVehicalModel').select2({
    		language: 'vi'
    	});
    	
    	vbrand.on('select2:select', function(e) {
    		var parent = e.params.data.id;
    		var results = _.filter(vmodelOptions, function(obj) {
    			return obj.parent == parent;
    		});
    		vmodel.empty().trigger("change");
    		setTimeout(function() {
    			vmodel.select2({data: results, language: 'vi'});
    			vmodel.val(null).trigger('change');
    		}, 100);
    	});
    	
    	$('#NanoTopSearch form').on('submit', function(e) {
    		e.preventDefault();
    		var vbrandValue = vbrand.val();
    		var vmodelValue = vmodel.val();
    		var href = '';
    		if(vmodelValue) {
    			href = $(this).find('input[name="vmodels\['+vmodelValue+'\]"]').attr('value');
    		} else if(vbrandValue) {
    			href = $(this).find('input[name="vbrands\['+vbrandValue+'\]"]').attr('value');
    		}
    		if(href != '') {
    			window.location.href = href;
    		}
    	});
    }

	    // Dom Ready
	$(document).ready(function() {
		// Nano functions
		widgetSearchByTerms();
		
		// Theme functions
		responsiveMenu();
		responsiveMenuMega_S2();
		responsiveMenuMega();
		searchButton();
		searchFilterbox();
		tabImagebox();
		tabImagebox_s2();
		tabProductDetail();
		tabElement();
		tabSortproduct();
		overlay();
		toggleWidget();
		toggleCatlist();
		toggleDropdown();
		toggleLocation();
		showSuggestions();
		showAllcat();
		accordionToggle();
		goTop();
	});

})(jQuery);
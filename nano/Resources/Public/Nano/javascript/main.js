;(function($) {

	'use strict'
	var isMobile = {
		Android : function() {
			return navigator.userAgent.match(/Android/i);
		},
		BlackBerry : function() {
			return navigator.userAgent.match(/BlackBerry/i);
		},
		iOS : function() {
			return navigator.userAgent.match(/iPhone|iPad|iPod/i);
		},
		Opera : function() {
			return navigator.userAgent.match(/Opera Mini/i);
		},
		Windows : function() {
			return navigator.userAgent.match(/IEMobile/i);
		},
		any : function() {
			return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS()
					|| isMobile.Opera() || isMobile.Windows());
		}
	}; // is Mobile

	var responsiveMenu = function() {
		var menuType = 'desktop';
		
		$(window).on('load resize', function() {
			var currMenuType = 'desktop';

			if (matchMedia('only screen and (max-width: 991px)').matches) {
				currMenuType = 'mobile';
			}

			if (currMenuType !== menuType) {
				menuType = currMenuType;

				if (currMenuType === 'mobile') {
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
					var $desktopMenu = $('#mainnav-mobi').attr('id', 'mainnav')
							.removeAttr('style');
					$desktopMenu.find('.submenu').removeAttr('style');
					$('#header').find('.nav-wrap').append($desktopMenu);
					$('.btn-submenu').remove();
					$('ul.submenu-child').show();
					$('h3').children('span').removeClass('btn-submenu-child');
				}
			}
			
			if(!$('.nav-wrap').hasClass('loaded')) {
				$('.nav-wrap').toggleClass('loaded');
			}
		});

		$('.btn-menu').on('click', function() {
			$('#mainnav-mobi').slideToggle(300);
			$(this).toggleClass('active');
			return false;
		});

		$(document).on('click', '#mainnav-mobi li.has-mega-menu .row .btn-submenu-child', function(e) {
			$(this).toggleClass('active').parent('h3.cat-title').next(
					'.submenu-child').slideToggle(400);
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

			if (matchMedia('only screen and (max-width: 991px)').matches) {
				currMenuType = 'mobile';
			}

			if (currMenuType !== menuType) {
				menuType = currMenuType;

				if ($('body').hasClass('grid')) {
					if (currMenuType === 'mobile') {
						var $mobileMenuMegaV2 = $('#mega-menu').attr('id',
								'mega-mobile').hide();
						var ChildMenuMegaV2 = $('.header-bottom').find('.grid-right');
						var ChildDropmenuV2 = $('.drop-menu').children('.one-third');

						$('.btn-mega').hide();
						$('#header').after($mobileMenuMegaV2);
						ChildMenuMegaV2
								.append('<div class="btn-menu-mega"><span></span></div>');

						$('.drop-menu').hide();
						$mobileMenuMegaV2.find('.dropdown').append(
								'<span class="btn-dropdown"></span>');

						ChildDropmenuV2.children('ul').hide();
						$('.drop-menu').find('.cat-title').append(
								'<span class="btn-dropdown-child"></span>');

					} else {
						var $desktopMenuMegaV2 = $('#mega-mobile').attr('id',
								'mega-menu').removeAttr('style');

						$desktopMenuMegaV2.find('.drop-menu').removeAttr('style');
						$('.header-bottom.style1').find('.grid-left').append(
								$desktopMenuMegaV2);
					}
				};

			};

		});

		$(document).on('click', '#mega-mobile ul.menu li a .btn-dropdown', function(e) {
			$(this).toggleClass('active').closest('li').children('.drop-menu')
					.slideToggle(400);
			e.stopImmediatePropagation();
			return false;
		});

		$(document).on('click', '#mega-mobile .btn-dropdown-child', function(e) {
			$(this).toggleClass('active').closest('.one-third').children('ul')
					.slideToggle(400);
			e.stopImmediatePropagation();
			return false;
		});

	}; // Responsive Menu Mega S2

	var responsiveMenuMega = function() {
		var menuType = 'desktop';

		$(window).on('load resize', function() {
			var currMenuType = 'desktop';

			if (matchMedia('only screen and (max-width: 991px)').matches) {
				currMenuType = 'mobile';
			}

			if (currMenuType !== menuType) {
				menuType = currMenuType;

				if (currMenuType === 'mobile') {
					var $mobileMenuMega = $('#mega-menu').attr('id', 'mega-mobile')
							.hide();
					var ChildMenuMega = $('.header-bottom').find('.col-2');
					var ChildDropmenu = $('.drop-menu').children('.one-third');

					$('.btn-mega').hide();
					$('#header').after($mobileMenuMega);
					ChildMenuMega
							.append('<div class="btn-menu-mega"><span></span></div>');

					$('.drop-menu').hide();
					$mobileMenuMega.find('.dropdown').append(
							'<span class="btn-dropdown"></span>');

					ChildDropmenu.children('ul').hide();
					$('.drop-menu').find('.cat-title').append(
							'<span class="btn-dropdown-child"></span>');

				} else {
					var $desktopMenuMega = $('#mega-mobile').attr('id', 'mega-menu')
							.removeAttr('style');

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
			$(this).toggleClass('active').closest('li').children('.drop-menu')
					.slideToggle(400);
			e.stopImmediatePropagation();
			return false;
		});

		$(document).on('click', '#mega-mobile .btn-dropdown-child', function(e) {
			$(this).toggleClass('active').closest('.one-third').children('ul')
					.slideToggle(400);
			e.stopImmediatePropagation();
			return false;
		});

	}; // Responsive Menu Mega


	var overlay = function() {
		var megaMenu = $('#mega-menu ul.menu li');
		megaMenu.on('mouseover', function() {
			$(this).closest('.boxed').children('.overlay').css({
				opacity : '1',
				display : 'block',
			});
		});
		megaMenu.on('mouseleave', function() {
			$(this).closest('.boxed').children('.overlay').css({
				opacity : '0',
				display : 'none',
			});
		});
	};
	
	var goTop = function() {
		let gotop = $('.btn-scroll');
		gotop.on('click', function(e) {
			e.preventDefault();
			let duration = 500;
			$('html, body').animate({
				scrollTop: 0
			}, duration);
		});
	};

	var widgetSearchByTerms = function() {
		var vmodelOptions = $('#SearchFieldVehicalModel').data('options');
		var defaultOptions = {language: 'vi'};
		var vbrand = $('#SearchFieldVehicalBrand').select2(defaultOptions);
		var vmodel = $('#SearchFieldVehicalModel').select2(defaultOptions);

		vbrand.on('select2:select', function(e) {
			var parent = e.params.data.id;
			var results = _.filter(vmodelOptions, function(obj) {
				return obj.parent == parent;
			});
			vmodel.empty().trigger("change");
			setTimeout(function() {
				vmodel.select2({
					data : results,
					language : 'vi'
				});
				vmodel.val(null).trigger('change');
			}, 100);
		});

		$('#NanoTopSearch form').on('submit', function(e) {
			e.preventDefault();
			var vbrandValue = vbrand.val();
			var vmodelValue = vmodel.val();
			var href = '';
			if (vmodelValue) {
				href = $(this).find('input[name="vmodels\[' + vmodelValue + '\]"]')
						.attr('value');
			} else if (vbrandValue) {
				href = $(this).find('input[name="vbrands\[' + vbrandValue + '\]"]')
						.attr('value');
			}
			if (href != '') {
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
		
		overlay();
		goTop();
	});

})(jQuery);
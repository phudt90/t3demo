var Layout = function() {

	var handleHeaderSearch2 = function() {
		let vmodelOptions = $('.q-search .fc-vmodel').data('options');
		let vbrand = $('.q-search .fc-vbrand').select2({
			language: 'vi',
			placeholder: "-- Chọn thương hiệu xe --",
			allowClear: true
		});
		let vmodel = $('.q-search .fc-vmodel').select2({
			language: 'vi',
			placeholder: "-- Chọn dòng xe --",
			allowClear: true
		});
		
		vbrand.on('select2:select', function(e) {
			vmodel.empty().trigger("change");
			vmodel.select2({
				data : _.filter(vmodelOptions, function(obj) {
					return obj.parent == e.params.data.id;
				}),
				language : 'vi',
				placeholder: "-- Chọn dòng xe --",
				allowClear: true
			});
			vmodel.val(null).trigger('change');
		});
		
		$('#header form.form-search').on('submit', function(e) {
			e.preventDefault();
			let $_form = $(this);
			let vbrandUid = vbrand.val();
			let vmodelUid = vmodel.val();
			var href = '';
			if (vmodelUid) {
				href = $_form.find('input[name="vmodels\[' + vmodelUid + '\]"]').attr('value');
			} else if (vbrandUid) {
				href = $_form.find('input[name="vbrands\[' + vbrandUid + '\]"]').attr('value');
			}
			if (href != '') {
				window.location.href = href;
			}
		});
	};

	// Handles the go to top button at the footer
	var handleGoTop = function() {
		var offset = 300;
		var duration = 500;

		if (navigator.userAgent.match(/iPhone|iPad|iPod/i)) { // ios supported
			$(window).bind("touchend touchcancel touchleave", function(e) {
				if ($(this).scrollTop() > offset) {
					$('.scroll-to-top').fadeIn(duration);
				} else {
					$('.scroll-to-top').fadeOut(duration);
				}
			});
		} else { // general 
			$(window).scroll(function() {
				if ($(this).scrollTop() > offset) {
					$('.scroll-to-top').fadeIn(duration);
				} else {
					$('.scroll-to-top').fadeOut(duration);
				}
			});
		}

		$('.scroll-to-top').click(function(e) {
			e.preventDefault();
			$('html, body').animate({
				scrollTop : 0
			}, duration);
			return false;
		});
	};
	
	var handleFlexSlider = function() {
		$('.flexslider').each(function() {
			var _self = $(this);
			var speed = _self.data('speed');
			var controlNav = _self.data('controlnav');
			
			_self.flexslider({
				animation : "slide",
				controlNav: controlNav,
				slideshowSpeed: speed,
				directionNav: false,
			});
		});
	};
	
	var handleZoomImages = function() {
		$('.product .zoom').each(function() {
			var self = $(this);
			var thumbUrl = self.parent().data('zoom');
			self.zoom({
				url: thumbUrl,
			});
		});
	};
	
	var handleTouchSpin = function() {
		$('.touchspin_cart').each(function() {
			$(this).TouchSpin({
	      min: 1,
	      max: 100,
	      step: 1,
	      decimals: 0,
	      buttondown_class: 'btn btn-default',
	      buttonup_class: 'btn btn-default',
			});
		});
	};
	
	var handleAddToCart = function() {
		$('.btn-add-cart a').click(function(e) {
			e.preventDefault();
			var _self = $(this);
			$.ajax({
				url: _self.attr('href'),
				dataType: 'html',
				beforeSend: function() {
					_self.attr('disabled', true);
				},	
				complete: function() {
					_self.attr('disabled', false);
				},				
				success: function(html) {
					$('#minicart').html(html);
					let duration = 300;
					$('html, body').animate({
						scrollTop: 0
					}, duration);
				},
				error: function(xhr, ajaxOptions, thrownError) {
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
			});
		})
	};

	var handleCarouselProducts = function() {
    $(".w-carousel-products").owlCarousel({
      items: 4,
      margin: 30,
      loop: true,
      nav: true,
      navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
      navElement: 'div',
      dots: true,
      responsive : {
        0: {
          items: 1,
          nav: false,
        },
        480: {
          items: 1,
          nav: false,
        },
        768: {
          items: 2,
          nav: true,
        },
        1024: {
          items: 3
        },
        1200: {
          items: 4
        }
      }
    });
  };

	return {
		init : function() {
			handleAddToCart();
			handleFlexSlider();
			handleHeaderSearch2();
			handleZoomImages();
			handleTouchSpin();
			handleCarouselProducts();
		}
	};
}();

jQuery(document).ready(function() {
	Layout.init();
});

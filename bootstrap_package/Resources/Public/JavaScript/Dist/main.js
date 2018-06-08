var Layout = function() {

	var handleHeaderSearch = function() {
		$.typeahead({
	    input: '.js-autocomplete-input',
	    minLength: 1,
	    order: "desc",
	    source: {
	    	data: [
          "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda",
          "Argentina", "Armenia", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh",
          "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia",
          "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burma",
          "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Central African Republic", "Chad",
          "Chile", "China", "Colombia", "Comoros", "Congo, Democratic Republic", "Congo, Republic of the",
          "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti",
          "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador",
          "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Fiji", "Finland", "France", "Gabon",
          "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Greenland", "Grenada", "Guatemala", "Guinea",
          "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hong Kong", "Hungary", "Iceland", "India",
          "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan",
          "Kazakhstan", "Kenya", "Kiribati", "Korea, North", "Korea, South", "Kuwait", "Kyrgyzstan", "Laos",
          "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg",
          "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands",
          "Mauritania", "Mauritius", "Mexico", "Micronesia", "Moldova", "Mongolia", "Morocco", "Monaco",
          "Mozambique", "Namibia", "Nauru", "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger",
          "Nigeria", "Norway", "Oman", "Pakistan", "Panama", "Papua New Guinea", "Paraguay", "Peru",
          "Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Samoa", "San Marino",
          "Sao Tome", "Saudi Arabia", "Senegal", "Serbia and Montenegro", "Seychelles", "Sierra Leone",
          "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "Spain",
          "Sri Lanka", "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan",
          "Tajikistan", "Tanzania", "Thailand", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey",
          "Turkmenistan", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States",
          "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe"
        ]
	    },
	    callback: {
        
	    },
	    debug: true
		});
	};
	
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
	
	var handleFlexImages = function() {
		$('.product .flexslider').flexslider({
			animation : "slide",
			controlNav : "thumbnails",
			directionNav: false
		});
	};
	
	var handleFlexSlider = function() {
		$('.flexslider').each(function() {
			let _self = $(this);
			let speed = _self.data('speed');
			let controlNav = _self.data('controlnav');
			
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
			let self = $(this);
			let thumbUrl = self.parent().data('zoom');
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
			let _self = $(this);
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

	return {
		init : function() {
			handleAddToCart();
			handleFlexSlider();
			handleHeaderSearch2();
			handleZoomImages();
			handleTouchSpin();
		}
	};
}();

jQuery(document).ready(function() {
	Layout.init();
});

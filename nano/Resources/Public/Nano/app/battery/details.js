;(function($) {

	'use strict'
	

	var flexImages = function() {
		$('.flat-product-detail .flexslider').flexslider({
			animation : "slide",
			controlNav : "thumbnails"
		});
	};
	
	var zoomImages = function() {
		$('.flat-product-detail .zoom').each(function() {
			let self = $(this);
			let thumbUrl = self.parent().data('thumb');
			self.zoom({
				url: thumbUrl,
			});
		});
	};
	
	$(document).ready(function() {
		flexImages();
		zoomImages();
	});

})(jQuery);
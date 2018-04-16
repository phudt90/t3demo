lib.cartProduct = COA
lib.cartProduct.addToCartButton = TEXT
lib.cartProduct.addToCartButton {
	value = Thêm vào giỏ
	typolink {
		parameter = {$plugin.cartPid}
		ATagBeforeWrap = 1
		useCacheHash = 0
		additionalParams.field = uid
		additionalParams.wrap = &type=231990&tx_nano_pageshoppingcart[controller]=Cart&tx_nano_pageshoppingcart[action]=addProduct&tx_nano_pageshoppingcart[product]=|
	}
}
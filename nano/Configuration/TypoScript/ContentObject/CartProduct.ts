lib.cartProduct = COA
lib.cartProduct.addToCartButton = COA
lib.cartProduct.addToCartButton {
	5 = LOAD_REGISTER
	5 {
		productUid = TEXT
		productUid.current = 1
	}
	
	10 = TEXT
	10.insertData = 1
	10.data = register:productUid
	
	20 = USER
	20 {
		userFunc = TYPO3\CMS\Extbase\Core\Bootstrap->run
	  vendorName = ELCA
	  extensionName = Nano
	  pluginName = PageShoppingCart
	  controller = Cart
	  action = addToCart
	  productUid < lib.cartProduct.addToCartButton.10
	  switchableControllerActions {
	  	Cart {
	  		1 = addToCart
	  	}
	  }
	  view < plugin.tx_nano_pageshopingcart.view
	  settings < plugin.tx_nano_pageshopingcart.settings
	  settings {
	  	singleNews.current = 1
			useStdWrap = singleNews
	  }
	}
	
	90 = RESTORE_REGISTER
}
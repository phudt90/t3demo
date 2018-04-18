<INCLUDE_TYPOSCRIPT: source="FILE:EXT:nano/Configuration/TypoScript/Extension/Cart/CartProduct.ts">
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:nano/Configuration/TypoScript/Extension/Cart/MiniCart.ts">

plugin.tx_nano_pageshoppingcart {
  mvc {
  	callDefaultActionIfActionCantBeResolved = 0
	}
	
  features {
  	skipDefaultArguments = 0
  	requireCHashArgumentForActionArguments = 0
  }
  
  persistence {
  	storagePid = {$plugin.storagePid}
  }
  
  view {
		templateRootPaths.0 = EXT:nano/Resources/Private/Templates/Page/
    partialRootPaths.0 = EXT:nano/Resources/Private/Partials/Page/
    layoutRootPaths.0 = EXT:nano/Resources/Private/Layouts/Page/
	}
	
	settings {
		cartPid = {$plugin.cartPid}
		checkoutPid = {$plugin.checkoutPid}
		detailsPid = {$plugin.detailsPid}
		orderStoragePid = {$plugin.orderStoragePid}
		checkoutFormUid = {$plugin.checkoutFormUid}
	}
}

widget_ajax_addtocart = PAGE
widget_ajax_addtocart {
  typeNum = 231990
 
  config {
    disableAllHeaderCode = 1
    additionalHeaders = Content-type:application/html
    xhtml_cleaning = 0
    debug = 0
    no_cache = 1
    admPanel = 0
  }
 
  10 = USER
  10 {
    userFunc = TYPO3\CMS\Extbase\Core\Bootstrap->run
    vendorName = ELCA
    extensionName = Nano
    pluginName = PageShoppingCart    
    switchableControllerActions {
			Cart {
				1 = addProduct
			}
		}
		
		view {
			templateRootPaths.0 = EXT:nano/Resources/Private/Templates/Page/
	    partialRootPaths.0 = EXT:nano/Resources/Private/Partials/Page/
	    layoutRootPaths.0 = EXT:nano/Resources/Private/Layouts/Page/
		}
		settings {
			cartPid = {$plugin.cartPid}
			checkoutPid = {$plugin.checkoutPid}
			orderStoragePid = {$plugin.orderStoragePid}
			checkoutFormUid = {$plugin.checkoutFormUid}
		}
  }
}

config.tx_extbase.persistence.classes {
  ELCA\Nano\Domain\Model\OrderProduct {
    mapping {
      tableName = tx_nano_domain_model_order_product
    }
  }
}